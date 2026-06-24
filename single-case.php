<?php
/**
 * Single Case template.
 *
 * @package WPDevStudio
 */

get_header();

$post_id = get_the_ID();

if (!function_exists('wpds_case_field')) {
	function wpds_case_field(string $key, $default = '') {
		if (function_exists('get_field')) {
			$value = get_field($key);

			if ($value !== null && $value !== '' && $value !== false) {
				return $value;
			}
		}

		return $default;
	}
}

if (!function_exists('wpds_case_normalize_color')) {
	function wpds_case_normalize_color($color, string $default = '#df6a2e'): string {
		if (is_array($color)) {
			if (!empty($color['hex'])) {
				return (string) $color['hex'];
			}

			if (isset($color['red'], $color['green'], $color['blue'])) {
				$alpha = isset($color['alpha']) ? (float) $color['alpha'] : 1;

				return 'rgba(' . (int) $color['red'] . ',' . (int) $color['green'] . ',' . (int) $color['blue'] . ',' . $alpha . ')';
			}

			return $default;
		}

		if (is_string($color) && trim($color) !== '') {
			return trim($color);
		}

		return $default;
	}
}

if (!function_exists('wpds_case_image')) {
	function wpds_case_image($image, string $size = 'full'): array {
		$result = [
			'url' => '',
			'alt' => '',
		];

		if (is_array($image)) {
			$result['url'] = (string) ($image['sizes'][$size] ?? $image['url'] ?? '');
			$result['alt'] = (string) ($image['alt'] ?? $image['title'] ?? '');

			return $result;
		}

		if (is_numeric($image) && (int) $image > 0) {
			$attachment_id = (int) $image;

			$result['url'] = (string) wp_get_attachment_image_url($attachment_id, $size);
			$result['alt'] = (string) get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

			return $result;
		}

		if (is_string($image) && trim($image) !== '') {
			$result['url'] = trim($image);
		}

		return $result;
	}
}

if (!function_exists('wpds_case_pretty_domain')) {
	function wpds_case_pretty_domain(string $url): string {
		$host = (string) wp_parse_url($url, PHP_URL_HOST);

		if (!$host) {
			$host = preg_replace('#^https?://#', '', $url);
			$host = strtok($host, '/');
		}

		$host = preg_replace('#^www\.#', '', (string) $host);

		return $host ?: $url;
	}
}

$case_accent = wpds_case_normalize_color(wpds_case_field('case_accent_color'), '#df6a2e');

$hero_image = wpds_case_image(get_post_thumbnail_id($post_id), 'full');
$site_url   = (string) wpds_case_field('case_site_url');
$site_host  = $site_url ? wpds_case_pretty_domain($site_url) : '';

$task_text  = (string) wpds_case_field('case_task_text');
$intro_text = (string) wpds_case_field('case_intro_text');
$summary    = wpds_case_field('case_summary_items', []);

if (!is_array($summary)) {
	$summary = [];
}

$summary = array_values(array_filter($summary, static function ($item) {
	if (!is_array($item)) {
		return false;
	}

	$label = trim((string) ($item['label'] ?? ''));
	$value = trim((string) ($item['value'] ?? ''));
	$icon  = $item['icon'] ?? '';

	return $label !== '' || $value !== '' || !empty($icon);
}));

if (!$intro_text) {
	$intro_text = has_excerpt($post_id)
		? get_the_excerpt($post_id)
		: wp_trim_words(wp_strip_all_tags(strip_shortcodes((string) get_post_field('post_content', $post_id))), 42, '…');
}

$default_summary = [
	[
		'icon'  => '',
		'label' => 'Год',
		'value' => date('Y'),
	],
	[
		'icon'  => '',
		'label' => 'Платформа',
		'value' => 'WordPress',
	],
	[
		'icon'  => '',
		'label' => 'Работы',
		'value' => 'UX/UI, верстка, интеграция',
	],
	[
		'icon'  => '',
		'label' => 'Статус',
		'value' => 'Запущен',
	],
];

if (empty($summary)) {
	$summary = $default_summary;
}
?>

<main class="wpds-case" style="--case-accent: <?php echo esc_attr($case_accent); ?>;">
	<section class="wpds-case-hero">
		<div class="wpds-case-hero__bg" aria-hidden="true"></div>

		<div class="wpds-case__container">
			<nav class="wpds-case-breadcrumbs" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
				<span>/</span>
				<a href="<?php echo esc_url(home_url('/cases/')); ?>">Кейсы</a>
				<span>/</span>
				<span><?php the_title(); ?></span>
			</nav>

			<div class="wpds-case-hero__panel">
				<h1 class="wpds-case-hero__title"><?php the_title(); ?></h1>

				<?php if ($site_url) : ?>
					<div class="wpds-case-hero__site">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link-icon lucide-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>

						<a href="<?php echo esc_url($site_url); ?>" target="_blank" rel="nofollow noopener">
							<?php echo esc_html($site_host); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($hero_image['url']) : ?>
				<figure class="wpds-case-hero__mockup">
					<div class="wpds-case-laptop">
						<div class="wpds-case-laptop__screen">
							<img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt'] ?: get_the_title($post_id)); ?>" loading="eager" decoding="async">
							<span class="wpds-case-laptop__label">MacBook Pro</span>
						</div>
						<div class="wpds-case-laptop__base"></div>
					</div>
				</figure>
			<?php endif; ?>
		</div>
	</section>

	<section class="wpds-case-summary" aria-label="Краткая информация о проекте">
		<div class="wpds-case__container wpds-case-summary__grid">
			<?php foreach (array_slice($summary, 0, 4) as $item) : ?>
				<?php
				$summary_icon = wpds_case_image($item['icon'] ?? '', 'thumbnail');
				?>

				<div class="wpds-case-summary__item">
					<?php if (!empty($summary_icon['url'])) : ?>
						<span class="wpds-case-summary__icon" aria-hidden="true">
							<img src="<?php echo esc_url($summary_icon['url']); ?>" alt="" loading="lazy" decoding="async">
						</span>
					<?php endif; ?>

					<div class="wpds-case-summary__text">
						<?php if (!empty($item['label'])) : ?>
							<span><?php echo esc_html($item['label']); ?></span>
						<?php endif; ?>

						<?php if (!empty($item['value'])) : ?>
							<strong><?php echo esc_html($item['value']); ?></strong>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="wpds-case-about">
		<div class="wpds-case__container wpds-case-about__card">
			<div class="wpds-case-about__content">
				<h2>О клиенте</h2>

				<?php if ($intro_text) : ?>
					<p><?php echo wp_kses_post(nl2br($intro_text)); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php if ($task_text) : ?>
		<section class="wpds-case-task">
			<div class="wpds-case__container wpds-case-task__box">
				<h2>Задача</h2>
				<p><?php echo wp_kses_post(nl2br($task_text)); ?></p>
			</div>
		</section>
	<?php endif; ?>

	<section class="wpds-case-content">
		<div class="wpds-case__container">
			<h2 class="wpds-case-content__title">
				<span aria-hidden="true">▣</span>
				Что делали:
			</h2>

			<article class="wpds-case-content__body">
				<?php the_content(); ?>
			</article>
		</div>
	</section>
</main>

<style>
.wpds-case {
	--case-text: #111827;
	--case-muted: #667085;
	--case-line: #eceff3;
	--case-soft: #f8fafc;
	color: var(--case-text);
	background: #fff;
	overflow: hidden;
}

.wpds-case__container {
	width: min(1600px, calc(100% - 180px));
	margin: 0 auto;
}

.wpds-case-hero {
	position: relative;
	padding: 16px 0 128px;
}

.wpds-case-hero__bg {
	position: absolute;
	inset: 74px max(92px, calc((100vw - 1600px) / 2)) 0;
	border-radius: 8px;
	background:
		linear-gradient(90deg, rgba(255,255,255,.05) 1px, transparent 1px),
		linear-gradient(135deg, color-mix(in srgb, var(--case-accent) 90%, #000), color-mix(in srgb, var(--case-accent) 68%, #fff));
	background-size: 190px 100%, auto;
	min-height: 610px;
}

.wpds-case-hero__bg:before,
.wpds-case-hero__bg:after {
	content: "";
	position: absolute;
	pointer-events: none;
	opacity: .32;
}

.wpds-case-hero__bg:before {
	left: 0;
	bottom: 0;
	width: 420px;
	height: 420px;
	background: color-mix(in srgb, var(--case-accent) 64%, #fff);
	clip-path: polygon(0 38%, 100% 0, 36% 100%, 0 100%);
}

.wpds-case-hero__bg:after {
	right: 0;
	top: 70px;
	width: 420px;
	height: 420px;
	background: rgba(255,255,255,.22);
	clip-path: polygon(52% 0, 100% 28%, 100% 100%, 0 52%);
}

.wpds-case-breadcrumbs {
	position: relative;
	z-index: 5;
	display: flex;
	gap: 10px;
	align-items: center;
	justify-content: center;
	margin: 0 0 28px;
	color: #667085;
	font-size: 15px;
	line-height: 1.3;
}

.wpds-case-breadcrumbs a {
	color: #46516f;
	text-decoration: none;
}

.wpds-case-breadcrumbs a:hover {
	color: var(--case-accent);
}

.wpds-case-hero__panel {
	position: relative;
	z-index: 3;
	max-width: 1180px;
	margin: 0 auto;
	text-align: center;
	color: #fff;
	padding-top: 40px;
}

.wpds-case-hero__title {
	margin: 0 auto;
	max-width: 1180px;
	font-size: clamp(42px, 3.2vw, 64px);
	line-height: 1.1;
	font-weight: 800;
	letter-spacing: -0.035em;
}

.wpds-case-hero__site {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 12px;
	margin-top: 26px;
	color: rgba(255,255,255,.96);
	font-size: 24px;
	line-height: 1.25;
	font-weight: 500;
}

.wpds-case-hero__site svg {
	flex-shrink: 0;
	width: 20px;
	height: 20px;
}

.wpds-case-hero__site a {
	color: inherit;
	text-decoration: none;
	transition: opacity .2s ease;
}

.wpds-case-hero__site a:hover {
	opacity: .78;
}

.wpds-case-hero__mockup {
	position: relative;
	z-index: 4;
	width: min(900px, 70vw);
	margin: 60px auto -120px;
	padding: 0;
}

.wpds-case-laptop {
	position: relative;
	width: 100%;
}

.wpds-case-laptop__screen {
	position: relative;
	aspect-ratio: 16 / 9.8;
	padding: 18px 18px 40px;
	border-radius: 22px 22px 14px 14px;
	background: #070707;
	box-shadow: 0 24px 42px rgba(15,23,42,.35);
}

.wpds-case-laptop__screen:before {
	content: "";
	position: absolute;
	top: 8px;
	left: 50%;
	width: 6px;
	height: 6px;
	border-radius: 50%;
	background: #1f2937;
	transform: translateX(-50%);
}

.wpds-case-laptop__screen img {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: top center;
	border-radius: 4px;
	filter: none;
}

.wpds-case-laptop__label {
	position: absolute;
	left: 50%;
	bottom: 17px;
	transform: translateX(-50%);
	color: rgba(255,255,255,.72);
	font-size: 12px;
	line-height: 1;
}

.wpds-case-laptop__base {
	position: relative;
	width: 112%;
	height: 20px;
	margin-left: -6%;
	border-radius: 0 0 40px 40px;
	background: linear-gradient(180deg, #d8dde3 0%, #8b949e 100%);
	box-shadow: 0 14px 24px rgba(15,23,42,.25);
}

.wpds-case-laptop__base:before {
	content: "";
	position: absolute;
	top: 0;
	left: 50%;
	width: 120px;
	height: 8px;
	border-radius: 0 0 12px 12px;
	background: rgba(255,255,255,.35);
	transform: translateX(-50%);
}

.wpds-case-summary {
	padding: 64px 0 20px;
}

.wpds-case-summary__grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 18px;
}

.wpds-case-summary__item {
	display: flex;
	align-items: center;
	gap: 12px;
	min-height: 78px;
	padding: 16px 18px;
	border: 1px solid var(--case-line);
	border-radius: 8px;
	background: rgb(249, 249, 249);
	box-shadow: 0 8px 22px rgba(16,24,40,.035);
}

.wpds-case-summary__icon {
	width: 28px;
	height: 28px;
	flex: 0 0 28px;
	display: flex;
	align-items: center;
	justify-content: center;
	color: var(--case-accent);
}

.wpds-case-summary__icon img,
.wpds-case-summary__icon svg {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: contain;
}

.wpds-case-summary__icon svg,
.wpds-case-summary__icon svg * {
	stroke: var(--case-accent) !important;
	color: var(--case-accent) !important;
}

.wpds-case-summary__icon svg [fill]:not([fill="none"]) {
	fill: var(--case-accent) !important;
}

/* Для SVG через <img> — делает иконку чёрной/однотонной */
.wpds-case-summary__icon img {
	filter: invert(48%) sepia(89%) saturate(1429%) hue-rotate(347deg) brightness(93%) contrast(89%);
}
.wpds-case-summary__text {
	min-width: 0;
}

.wpds-case-summary__text span {
	display: block;
	color: var(--case-muted);
	font-size: 13px;
	line-height: 1.25;
}

.wpds-case-summary__text strong {
	display: block;
	margin-top: 3px;
	font-size: 16px;
	line-height: 1.25;
	font-weight: 500;
}

.wpds-case-about {
	padding: 0 0 24px;
}

.wpds-case-about__card {
	padding: 28px 34px;
	border: 1px solid var(--case-line);
	border-radius: 8px;
	background: rgb(249, 249, 249);
	box-shadow: 0 18px 50px rgba(16,24,40,.05);
}

.wpds-case-about h2,
.wpds-case-task h2 {
	margin: 0 0 16px;
	font-size: 24px;
	line-height: 1.25;
}

.wpds-case-about p,
.wpds-case-task p {
	margin: 0;
	color: #243041;
	font-size: 16px;
	line-height: 1.8;
}

.wpds-case-task {
	padding: 0 0 48px;
}

.wpds-case-task__box {
	position: relative;
	padding: 24px 34px;
	border: 1px solid var(--case-line);
	border-radius: 8px;
	background: rgb(249, 249, 249);
}

.wpds-case-task__box:before {
	content: "";
	position: absolute;
	left: 34px;
	top: -8px;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background: var(--case-accent);
}

.wpds-case-content {
	padding: 4px 0 80px;
}

.wpds-case-content__title {
	display: flex;
	align-items: center;
	gap: 10px;
	margin: 0 0 28px;
	color: var(--case-accent);
	font-size: 24px;
	line-height: 1.25;
}

.wpds-case-content__body {
	max-width: 1000px;
}

.wpds-case-content__body > :first-child {
	margin-top: 0;
}

.wpds-case-content__body h2,
.wpds-case-content__body h3 {
	margin: 34px 0 14px;
	line-height: 1.25;
	color: var(--case-text);
}

.wpds-case-content__body h2 {
	font-size: 22px;
}

.wpds-case-content__body h3 {
	font-size: 18px;
}

.wpds-case-content__body p {
	margin: 0 0 22px;
	color: #243041;
	font-size: 16px;
	line-height: 1.8;
}

.wpds-case-content__body figure {
	margin: 34px auto 26px;
	padding: 34px;
	background: var(--case-soft);
	text-align: center;
}

.wpds-case-content__body img {
	display: block;
	max-width: 100%;
	height: auto;
	margin: 0 auto;
}

.wpds-case-content__body ul,
.wpds-case-content__body ol {
	margin: 0 0 24px;
	padding-left: 22px;
	line-height: 1.8;
}

.wpds-case-content__body a {
	color: var(--case-accent);
}

@media (max-width: 1200px) {
	.wpds-case__container {
		width: min(1120px, calc(100% - 40px));
	}

	.wpds-case-hero__bg {
		inset: 74px 40px 0;
	}

	.wpds-case-hero__mockup {
		width: min(820px, 78vw);
	}
}

@media (max-width: 900px) {
	.wpds-case-hero {
		padding-bottom: 88px;
	}

	.wpds-case-hero__bg {
		inset: 54px 20px 0;
		min-height: 520px;
	}

	.wpds-case-hero__title {
		font-size: clamp(32px, 7vw, 48px);
	}

	.wpds-case-hero__site {
		font-size: 20px;
	}

	.wpds-case-hero__mockup {
		width: min(760px, 86vw);
		margin-top: 42px;
	}

	.wpds-case-summary__grid {
		grid-template-columns: repeat(2, 1fr);
		gap: 14px;
	}

	.wpds-case-summary__item {
		min-height: 70px;
		padding: 14px 16px;
	}

	.wpds-case-summary__icon {
		width: 26px;
		height: 26px;
		flex-basis: 26px;
	}

	.wpds-case-summary__text span {
		font-size: 12px;
	}

	.wpds-case-summary__text strong {
		font-size: 15px;
	}
}

@media (max-width: 560px) {
	.wpds-case__container {
		width: min(100% - 28px, 1120px);
	}

	.wpds-case-hero {
		padding-bottom: 62px;
	}

	.wpds-case-hero__bg {
		inset: 54px 14px 0;
		min-height: 430px;
	}

	.wpds-case-breadcrumbs {
		font-size: 12px;
		justify-content: flex-start;
		overflow: auto;
		white-space: nowrap;
	}

	.wpds-case-hero__panel {
		padding-top: 28px;
	}

	.wpds-case-hero__title {
		font-size: 30px;
	}

	.wpds-case-hero__site {
		margin-top: 18px;
		font-size: 17px;
	}

	.wpds-case-hero__mockup {
		width: min(100%, 92vw);
		margin: 34px auto -70px;
	}

	.wpds-case-laptop__screen {
		padding: 10px 10px 28px;
		border-radius: 16px 16px 10px 10px;
	}

	.wpds-case-laptop__label {
		bottom: 11px;
		font-size: 10px;
	}

	.wpds-case-laptop__base {
		height: 14px;
	}

	.wpds-case-summary {
		padding-top: 48px;
	}

	.wpds-case-summary__grid {
		grid-template-columns: 1fr;
	}

	.wpds-case-summary__item {
		min-height: 64px;
		padding: 13px 15px;
	}

	.wpds-case-summary__icon {
		width: 24px;
		height: 24px;
		flex-basis: 24px;
	}

	.wpds-case-about__card,
	.wpds-case-task__box {
		padding: 22px;
	}

	.wpds-case-content__body figure {
		padding: 18px;
		margin-left: -14px;
		margin-right: -14px;
	}
}
</style>

<?php
get_footer();