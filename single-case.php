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

		if (is_string($image)) {
			$result['url'] = $image;
		}

		return $result;
	}
}

$hero_image  = wpds_case_image(wpds_case_field('case_hero_image', get_post_thumbnail_id($post_id)), 'full');
$client_logo = wpds_case_image(wpds_case_field('case_client_logo'), 'medium');
$site_url    = (string) wpds_case_field('case_site_url');
$task_text   = (string) wpds_case_field('case_task_text');
$intro_text  = (string) wpds_case_field('case_intro_text');
$summary     = wpds_case_field('case_summary_items', []);

if (!is_array($summary)) {
	$summary = [];
}

$summary = array_values(array_filter($summary, static function ($item) {
	return is_array($item) && (trim((string) ($item['label'] ?? '')) !== '' || trim((string) ($item['value'] ?? '')) !== '');
}));

if (!$intro_text) {
	$intro_text = has_excerpt($post_id)
		? get_the_excerpt($post_id)
		: wp_trim_words(wp_strip_all_tags(strip_shortcodes((string) get_post_field('post_content', $post_id))), 42, '…');
}

$default_summary = [
	['label' => 'Тип проекта', 'value' => 'Разработка сайта'],
	['label' => 'Платформа', 'value' => 'WordPress'],
	['label' => 'Работы', 'value' => 'UX/UI, верстка, интеграция'],
	['label' => 'Статус', 'value' => 'Запущен'],
];

if (empty($summary)) {
	$summary = $default_summary;
}
?>

<main class="wpds-case">
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
				<p class="wpds-case-hero__eyebrow">Наши кейсы</p>
				<h1 class="wpds-case-hero__title"><?php the_title(); ?></h1>

				<?php if ($site_url) : ?>
					<a class="wpds-case-hero__link" href="<?php echo esc_url($site_url); ?>" target="_blank" rel="nofollow noopener">Посмотреть сайт</a>
				<?php endif; ?>
			</div>

			<?php if ($hero_image['url']) : ?>
				<figure class="wpds-case-hero__mockup">
					<img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt'] ?: get_the_title($post_id)); ?>" loading="eager" decoding="async">
				</figure>
			<?php endif; ?>
		</div>
	</section>

	<section class="wpds-case-summary" aria-label="Краткая информация о проекте">
		<div class="wpds-case__container wpds-case-summary__grid">
			<?php foreach (array_slice($summary, 0, 4) as $item) : ?>
				<div class="wpds-case-summary__item">
					<span class="wpds-case-summary__icon" aria-hidden="true"></span>
					<div>
						<?php if (!empty($item['label'])) : ?><span><?php echo esc_html($item['label']); ?></span><?php endif; ?>
						<?php if (!empty($item['value'])) : ?><strong><?php echo esc_html($item['value']); ?></strong><?php endif; ?>
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

			<?php if ($client_logo['url']) : ?>
				<div class="wpds-case-about__logo">
					<img src="<?php echo esc_url($client_logo['url']); ?>" alt="<?php echo esc_attr($client_logo['alt'] ?: 'Логотип клиента'); ?>" loading="lazy" decoding="async">
				</div>
			<?php endif; ?>
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
			<h2 class="wpds-case-content__title"><span aria-hidden="true">▣</span> Что делали:</h2>
			<article class="wpds-case-content__body">
				<?php the_content(); ?>
			</article>
		</div>
	</section>
</main>

<style>
.wpds-case{--case-accent:#df6a2e;--case-text:#111827;--case-muted:#667085;--case-line:#eceff3;--case-soft:#f8fafc;color:var(--case-text);background:#fff;font-family:Inter,Arial,sans-serif;overflow:hidden}.wpds-case__container{width:min(1120px,calc(100% - 40px));margin:0 auto}.wpds-case-hero{position:relative;padding:16px 0 88px}.wpds-case-hero__bg{position:absolute;inset:70px max(20px,calc((100vw - 1120px)/2)) 0;border-radius:4px;background:linear-gradient(135deg,rgba(229,113,55,.72),rgba(237,160,111,.68));min-height:360px}.wpds-case-hero__bg:before,.wpds-case-hero__bg:after{content:"";position:absolute;width:150px;height:150px;background:var(--case-accent);clip-path:polygon(0 0,100% 22%,26% 100%);opacity:.95}.wpds-case-hero__bg:before{left:-90px;top:-20px}.wpds-case-hero__bg:after{right:-85px;top:120px;transform:rotate(12deg)}.wpds-case-breadcrumbs{position:relative;z-index:2;display:flex;gap:8px;align-items:center;margin:0 0 18px;color:rgba(17,24,39,.58);font-size:13px}.wpds-case-breadcrumbs a{color:inherit;text-decoration:none}.wpds-case-breadcrumbs a:hover{color:var(--case-accent)}.wpds-case-hero__panel{position:relative;z-index:2;max-width:760px;margin:0 auto;text-align:center;color:#fff;padding-top:24px}.wpds-case-hero__eyebrow{margin:0 0 8px;text-transform:uppercase;letter-spacing:.16em;font-weight:700;font-size:12px}.wpds-case-hero__title{margin:0;font-size:clamp(28px,4vw,42px);line-height:1.12;font-weight:800}.wpds-case-hero__link{display:inline-flex;margin-top:18px;padding:10px 22px;border:1px solid rgba(255,255,255,.7);border-radius:999px;color:#fff;text-decoration:none;font-size:14px;font-weight:700}.wpds-case-hero__mockup{position:relative;z-index:3;width:min(640px,86vw);margin:28px auto -94px}.wpds-case-hero__mockup img{width:100%;height:auto;filter:drop-shadow(0 22px 24px rgba(15,23,42,.28))}.wpds-case-summary{padding:72px 0 24px}.wpds-case-summary__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.wpds-case-summary__item{display:flex;align-items:center;gap:12px;min-height:76px;padding:18px 22px;border:1px solid var(--case-line);border-radius:4px;background:#fff;box-shadow:0 12px 32px rgba(16,24,40,.04)}.wpds-case-summary__icon{width:16px;height:16px;border-left:3px solid var(--case-accent);border-top:3px solid var(--case-accent);display:block}.wpds-case-summary__item span:not(.wpds-case-summary__icon){display:block;color:var(--case-muted);font-size:12px;line-height:1.3}.wpds-case-summary__item strong{display:block;margin-top:2px;font-size:14px;line-height:1.3}.wpds-case-about{padding:0 0 24px}.wpds-case-about__card{display:grid;grid-template-columns:minmax(0,1fr) 220px;gap:32px;padding:28px 34px;border:1px solid var(--case-line);border-radius:8px;background:#fff;box-shadow:0 18px 50px rgba(16,24,40,.05)}.wpds-case-about h2,.wpds-case-task h2{margin:0 0 16px;font-size:24px;line-height:1.25}.wpds-case-about p,.wpds-case-task p{margin:0;color:#243041;font-size:16px;line-height:1.8}.wpds-case-about__logo{display:flex;align-items:center;justify-content:center;border-left:1px solid var(--case-line);padding-left:28px}.wpds-case-about__logo img{max-width:170px;max-height:90px}.wpds-case-task{padding:0 0 48px}.wpds-case-task__box{position:relative;padding:24px 34px;border:1px solid var(--case-line);border-radius:8px;background:#fff}.wpds-case-task__box:before{content:"";position:absolute;left:34px;top:-8px;width:10px;height:10px;border-radius:50%;background:var(--case-accent)}.wpds-case-content{padding:4px 0 80px}.wpds-case-content__title{display:flex;align-items:center;gap:10px;margin:0 0 28px;color:var(--case-accent);font-size:24px;line-height:1.25}.wpds-case-content__body{max-width:1000px}.wpds-case-content__body>:first-child{margin-top:0}.wpds-case-content__body h2,.wpds-case-content__body h3{margin:34px 0 14px;line-height:1.25;color:var(--case-text)}.wpds-case-content__body h2{font-size:22px}.wpds-case-content__body h3{font-size:18px}.wpds-case-content__body p{margin:0 0 22px;color:#243041;font-size:16px;line-height:1.8}.wpds-case-content__body figure{margin:34px auto 26px;padding:34px;background:var(--case-soft);text-align:center}.wpds-case-content__body img{display:block;max-width:100%;height:auto;margin:0 auto}.wpds-case-content__body ul,.wpds-case-content__body ol{margin:0 0 24px;padding-left:22px;line-height:1.8}.wpds-case-content__body a{color:var(--case-accent)}@media (max-width:900px){.wpds-case-hero__bg{inset:54px 20px 0}.wpds-case-summary__grid{grid-template-columns:repeat(2,1fr)}.wpds-case-about__card{grid-template-columns:1fr}.wpds-case-about__logo{border-left:0;border-top:1px solid var(--case-line);padding:24px 0 0}}@media (max-width:560px){.wpds-case__container{width:min(100% - 28px,1120px)}.wpds-case-hero{padding-bottom:62px}.wpds-case-hero__mockup{margin-bottom:-70px}.wpds-case-summary{padding-top:56px}.wpds-case-summary__grid{grid-template-columns:1fr}.wpds-case-about__card,.wpds-case-task__box{padding:22px}.wpds-case-content__body figure{padding:18px;margin-left:-14px;margin-right:-14px}.wpds-case-breadcrumbs{font-size:12px;overflow:auto;white-space:nowrap}}
</style>

<?php
get_footer();
