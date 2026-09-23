<?php
/**
 * Lightweight, local anti-spam primitives for lead forms.
 *
 * @package WPDevStudio
 */

defined('ABSPATH') || exit;

/** Return the visitor IP, trusting forwarded headers only for configured proxies. */
function wpds_form_client_ip() {
	$remote = isset($_SERVER['REMOTE_ADDR']) ? trim((string) wp_unslash($_SERVER['REMOTE_ADDR'])) : '';
	$remote = filter_var($remote, FILTER_VALIDATE_IP) ? $remote : '0.0.0.0';
	$trusted_proxies = (array) apply_filters('wpds_form_trusted_proxies', []);

	if (in_array($remote, $trusted_proxies, true) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$forwarded = explode(',', (string) wp_unslash($_SERVER['HTTP_X_FORWARDED_FOR']));
		$candidate = trim($forwarded[0]);
		if (filter_var($candidate, FILTER_VALIDATE_IP)) {
			return $candidate;
		}
	}

	return $remote;
}

/** Create a signed render-time token; the timestamp cannot be changed by a client. */
function wpds_form_time_token($form_id) {
	$timestamp = time();
	$payload = $form_id . '|' . $timestamp;
	return $timestamp . '.' . hash_hmac('sha256', $payload, wp_salt('nonce'));
}

/** Verify the signed render-time token and return its age, or false. */
function wpds_form_time_token_age($token, $form_id) {
	if (!is_string($token) || !preg_match('/^(\d{10})\.([a-f0-9]{64})$/', $token, $matches)) {
		return false;
	}

	$timestamp = (int) $matches[1];
	$expected = hash_hmac('sha256', $form_id . '|' . $timestamp, wp_salt('nonce'));
	if (!hash_equals($expected, $matches[2])) {
		return false;
	}

	$age = time() - $timestamp;
	return ($age >= 0 && $age <= 12 * HOUR_IN_SECONDS) ? $age : false;
}

/** Hash an IP before using it in transient keys or diagnostic logs. */
function wpds_form_ip_hash($ip) {
	return substr(hash_hmac('sha256', (string) $ip, wp_salt('auth')), 0, 20);
}

/**
 * Consume one admissible attempt. Returns false when either window is full.
 * Expiring transients ensure counters do not accumulate indefinitely.
 */
function wpds_form_rate_limit($form_id, $ip) {
	$hash = wpds_form_ip_hash($ip);
	$windows = [
		['suffix' => 'burst', 'limit' => 2, 'ttl' => MINUTE_IN_SECONDS],
		['suffix' => 'regular', 'limit' => 3, 'ttl' => 10 * MINUTE_IN_SECONDS],
	];

	foreach ($windows as $window) {
		$key = 'wpds_fr_' . md5($form_id . '|' . $hash . '|' . $window['suffix']);
		$count = (int) get_transient($key);
		if ($count >= $window['limit']) {
			return false;
		}
	}

	foreach ($windows as $window) {
		$key = 'wpds_fr_' . md5($form_id . '|' . $hash . '|' . $window['suffix']);
		$count = (int) get_transient($key);
		set_transient($key, $count + 1, $window['ttl']);
	}

	return true;
}

/** Build a privacy-safe key for duplicate detection. */
function wpds_form_fingerprint($form_id, array $values) {
	$normalized = array_map(static function ($value) {
		$value = mb_strtolower(trim((string) $value));
		return preg_replace('/\s+/u', ' ', $value);
	}, $values);

	return 'wpds_fd_' . hash_hmac('sha256', $form_id . '|' . implode('|', $normalized), wp_salt('auth'));
}

/** Log a throttled, privacy-safe diagnostic only when WordPress debugging is enabled. */
function wpds_form_log_block($reason, $score, $ip) {
	if (!defined('WP_DEBUG') || !WP_DEBUG) {
		return;
	}

	$key = 'wpds_fl_' . md5($reason . '|' . wpds_form_ip_hash($ip));
	if (get_transient($key)) {
		return;
	}

	set_transient($key, 1, 5 * MINUTE_IN_SECONDS);
	$ua = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'])) : '';
	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log -- debug-only, throttled and contains no submitted personal data.
	error_log(sprintf('[WPDS form] reason=%s score=%d ip=%s ua=%s', sanitize_key($reason), (int) $score, wpds_form_ip_hash($ip), mb_substr($ua, 0, 120)));
}
