<?php
defined('ABSPATH') || exit;

if (!function_exists('wpds_render_service_template')) {
	function wpds_render_service_template(array $service): void {
		$defaults = [
			'badge' => 'WordPress',
			'title' => get_the_title(),
			'subtitle' => '',
			'price' => 'по оценке задачи',
			'cta' => 'Обсудить задачу',
			'points' => [],
		];
		$service = array_merge($defaults, $service);
		$points = array_values(array_filter((array) $service['points']));
		get_header();
		?>
		<style>
			.wpds-service-lite{padding:56px 20px 88px;background:linear-gradient(180deg,#f8fbf9 0%,#f4f7f5 100%);color:var(--gl-color-text,#2b2b2b)}.wpds-service-lite__container{max-width:1180px;margin:0 auto}.wpds-service-lite__hero,.wpds-service-lite__card{background:#fff;border:1px solid #e4ece6;border-radius:28px;box-shadow:0 18px 50px rgba(16,24,40,.06)}.wpds-service-lite__hero{display:grid;grid-template-columns:minmax(0,1fr) 320px;gap:24px;padding:36px}.wpds-service-lite__badge{display:inline-flex;margin-bottom:16px;padding:8px 14px;border-radius:999px;background:rgba(44,188,99,.1);color:var(--gl-color-accent,#2cbc63);font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.04em}.wpds-service-lite h1{margin:0 0 16px;font-size:clamp(34px,5vw,58px);line-height:1.04;color:var(--gl-color-heading,#1a1a1a)}.wpds-service-lite__lead{margin:0;max-width:760px;font-size:18px;line-height:1.75;color:var(--gl-color-subtitle,#6b7280)}.wpds-service-lite__side{padding:24px;border-radius:22px;background:#f8fbf9;border:1px solid #e8efea}.wpds-service-lite__label{margin:0 0 8px;color:#9ca3af;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.04em}.wpds-service-lite__price{margin:0 0 16px;font-size:32px;font-weight:800;color:var(--gl-color-heading,#1a1a1a)}.wpds-service-lite__btn{display:inline-flex;align-items:center;justify-content:center;min-height:48px;padding:0 20px;border-radius:12px;background:var(--gl-color-accent,#2cbc63);color:#fff;font-weight:700;text-decoration:none}.wpds-service-lite__section{margin-top:28px}.wpds-service-lite__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.wpds-service-lite__card{padding:28px}.wpds-service-lite__card h2,.wpds-service-lite__card h3{margin:0 0 14px;color:var(--gl-color-heading,#1a1a1a)}.wpds-service-lite__list{margin:0;padding:0;list-style:none;display:grid;gap:12px}.wpds-service-lite__list li{padding-left:24px;position:relative;line-height:1.65}.wpds-service-lite__list li:before{content:"";position:absolute;left:0;top:.7em;width:10px;height:10px;border-radius:50%;background:var(--gl-color-accent,#2cbc63)}@media(max-width:820px){.wpds-service-lite__hero{grid-template-columns:1fr;padding:24px}.wpds-service-lite__grid{grid-template-columns:1fr}}
		</style>
		<main class="wpds-service-lite">
			<div class="wpds-service-lite__container">
				<section class="wpds-service-lite__hero">
					<div>
						<div class="wpds-service-lite__badge"><?php echo esc_html($service['badge']); ?></div>
						<h1><?php echo esc_html($service['title']); ?></h1>
						<p class="wpds-service-lite__lead"><?php echo esc_html($service['subtitle']); ?></p>
					</div>
					<aside class="wpds-service-lite__side">
						<p class="wpds-service-lite__label">Стоимость</p>
						<p class="wpds-service-lite__price"><?php echo esc_html($service['price']); ?></p>
						<a class="wpds-service-lite__btn" href="/contacts/"><?php echo esc_html($service['cta']); ?></a>
					</aside>
				</section>

				<section class="wpds-service-lite__section">
					<div class="wpds-service-lite__grid">
						<div class="wpds-service-lite__card">
							<h2>Что входит в услугу</h2>
							<ul class="wpds-service-lite__list">
								<?php foreach ($points as $point) : ?>
									<li><?php echo esc_html($point); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="wpds-service-lite__card">
							<h2>Как работаем</h2>
							<ul class="wpds-service-lite__list">
								<li>Разбираю задачу, текущий сайт, ограничения и ожидаемый результат.</li>
								<li>Предлагаю техническое решение, сроки и понятный состав работ.</li>
								<li>Реализую, тестирую на ключевых сценариях и передаю результат.</li>
								<li>Объясняю, как пользоваться решением и что можно развивать дальше.</li>
							</ul>
						</div>
					</div>
				</section>

				<section class="wpds-service-lite__section wpds-service-lite__card">
					<h2>Нужна услуга «<?php echo esc_html($service['title']); ?>»?</h2>
					<p class="wpds-service-lite__lead">Опишите задачу, пришлите ссылку на сайт и желаемый результат — подготовлю план работ и оценку реализации.</p>
					<p style="margin-top:20px"><a class="wpds-service-lite__btn" href="/contacts/">Получить консультацию</a></p>
				</section>

				<section class="wpds-service-lite__section" aria-label="Релевантные материалы">
					<?php echo do_shortcode('[gl_related_cases_slider]'); ?>
					<?php echo do_shortcode('[gl_related_services_slider]'); ?>
					<?php echo do_shortcode('[gl_related_blog_slider]'); ?>
				</section>
			</div>
		</main>
		<?php
		get_footer();
	}
}
