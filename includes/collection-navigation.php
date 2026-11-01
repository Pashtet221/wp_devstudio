<?php
/** Shared URLs and head metadata for the blog and case collections. */
defined('ABSPATH') || exit;

function wpds_collection_url(string $base, int $page = 1, array $filters = []): string {
    $page = max(1, $page);
    $filters = array_filter($filters, static function ($value) {
        return $value !== '' && $value !== null && $value !== 0;
    });
    if ($page > 1) {
        if (get_option('permalink_structure') && !wp_parse_url($base, PHP_URL_QUERY)) {
            global $wp_rewrite;
            $pagination_base = $wp_rewrite->pagination_base ?: 'page';
            $base = trailingslashit($base) . user_trailingslashit($pagination_base . '/' . $page, 'paged');
        } else {
            $filters['paged'] = $page;
        }
    }
    return $filters ? add_query_arg($filters, $base) : $base;
}

function wpds_collection_pagination(string $base, array $filters = []): array {
    if (get_option('permalink_structure') && !wp_parse_url($base, PHP_URL_QUERY)) {
        global $wp_rewrite;
        return [
            'base' => wpds_collection_url(trailingslashit($base) . '%_%', 1, $filters),
            'format' => user_trailingslashit(($wp_rewrite->pagination_base ?: 'page') . '/%#%', 'paged'),
        ];
    }
    return ['base' => str_replace('999999999', '%#%', wpds_collection_url($base, 999999999, $filters)), 'format' => ''];
}

function wpds_collection_seo(string $canonical, bool $filtered, string $prev = '', string $next = ''): void {
    add_filter('rank_math/frontend/canonical', static function () use ($canonical) { return $canonical; });
    add_filter('wpseo_canonical', static function () use ($canonical) { return $canonical; });
    if ($filtered) {
        add_filter('rank_math/frontend/robots', static function ($robots) {
            $robots['index'] = 'noindex';
            return $robots;
        });
        add_filter('wpseo_robots', static function () { return 'noindex, follow'; });
        add_filter('wp_robots', static function ($robots) {
            unset($robots['index']);
            $robots['noindex'] = true;
            return $robots;
        });
    }
    // Let the installed SEO plugin own canonical and robots output.
    if (!function_exists('wpds_theme_seo_plugin_active') || !wpds_theme_seo_plugin_active()) {
        remove_action('wp_head', 'rel_canonical');
        add_action('wp_head', static function () use ($canonical) {
            echo '<link rel="canonical" href="' . esc_url($canonical) . '" />' . "\n";
        });
    }
    add_action('wp_head', static function () use ($prev, $next) {
        if ($prev) { echo '<link rel="prev" href="' . esc_url($prev) . '" />' . "\n"; }
        if ($next) { echo '<link rel="next" href="' . esc_url($next) . '" />' . "\n"; }
    });
}
