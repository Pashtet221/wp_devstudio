<?php
/**
 * Template Name: Кейс — редизайн сайта
 * Template Post Type: case
 */

defined('ABSPATH') || exit;

get_header();

$case_site_url              = get_field('case_site_url');
$case_result_text           = get_field('case_result_text');
$case_task_text             = get_field('case_task_text');
$case_solution_text         = get_field('case_solution_text');
$case_comparison_slides     = get_field('case_comparison_slides');
?>

<style>
.case-redesign {
	background: #f6f7fb;
	color: #111827;
	overflow: hidden;
}

.case-redesign * {
	box-sizing: border-box;
}

.case-redesign .container {
	width: min(1180px, calc(100% - 32px));
	margin: 0 auto;
}

/* HERO */

.case-redesign__hero {
	position: relative;
	padding: 90px 0 70px;
	background:
		radial-gradient(circle at 15% 20%, rgba(37, 99, 235, 0.16), transparent 34%),
		radial-gradient(circle at 85% 10%, rgba(15, 23, 42, 0.12), transparent 32%),
		linear-gradient(135deg, #ffffff 0%, #eef2ff 100%);
}

.case-redesign__badge {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 9px 14px;
	margin-bottom: 22px;
	border-radius: 999px;
	background: #111827;
	color: #fff;
	font-size: 14px;
	font-weight: 600;
}

.case-redesign__hero-grid {
	display: grid;
	grid-template-columns: 1.05fr .95fr;
	gap: 42px;
	align-items: center;
}

.case-redesign__title {
	margin: 0 0 22px;
	font-size: clamp(36px, 5vw, 44px);
	line-height: .95;
	letter-spacing: -0.055em;
	color: #0f172a;
}

.case-redesign__lead {
	max-width: 720px;
	margin: 0 0 32px;
	color: #475569;
	font-size: 20px;
	line-height: 1.6;
}

.case-redesign__actions {
	display: flex;
	flex-wrap: wrap;
	gap: 14px;
}

.case-redesign__btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 52px;
	padding: 14px 22px;
	border-radius: 14px;
	background: #2563eb;
	color: #fff;
	text-decoration: none;
	font-weight: 700;
	transition: .2s ease;
}

.case-redesign__btn:hover {
	transform: translateY(-2px);
	background: #1d4ed8;
	color: #fff;
}

.case-redesign__btn--dark {
	background: #111827;
}

.case-redesign__btn--dark:hover {
	background: #020617;
}

.case-redesign__mockup {
	position: relative;
	padding: 14px;
	border-radius: 30px;
	background: rgba(255,255,255,.72);
	box-shadow: 0 24px 80px rgba(15, 23, 42, .14);
	backdrop-filter: blur(18px);
}

.case-redesign__mockup img {
	display: block;
	width: 100%;
	height: auto;
	border-radius: 22px;
}

/* STATS */

.case-redesign__stats {
	padding: 34px 0 0;
}

.case-redesign__stats-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 16px;
}

.case-redesign__stat {
	padding: 24px;
	border-radius: 22px;
	background: #fff;
	box-shadow: 0 14px 40px rgba(15, 23, 42, .07);
}

.case-redesign__stat-number {
	display: block;
	margin-bottom: 8px;
	font-size: 34px;
	line-height: 1;
	font-weight: 800;
	letter-spacing: -0.04em;
	color: #111827;
}

.case-redesign__stat-label {
	color: #64748b;
	font-size: 15px;
	line-height: 1.45;
}

/* COMMON */

.case-redesign__section {
	padding: 72px 0;
}

.case-redesign__section-title {
	max-width: 820px;
	margin: 0 0 18px;
	font-size: clamp(30px, 4vw, 48px);
	line-height: 1.04;
	letter-spacing: -0.045em;
	color: #111827;
}

.case-redesign__section-text {
	max-width: 780px;
	margin: 0;
	color: #475569;
	font-size: 18px;
	line-height: 1.7;
}

.case-redesign__cards {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 18px;
	margin-top: 34px;
}

.case-redesign__card {
	padding: 28px;
	border-radius: 26px;
	background: #fff;
	box-shadow: 0 16px 48px rgba(15, 23, 42, .07);
}

.case-redesign__card-num {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 42px;
	height: 42px;
	margin-bottom: 18px;
	border-radius: 14px;
	background: #eff6ff;
	color: #2563eb;
	font-weight: 800;
}

.case-redesign__card h3 {
	margin: 0 0 12px;
	font-size: 22px;
	letter-spacing: -0.03em;
}

.case-redesign__card p {
	margin: 0;
	color: #64748b;
	line-height: 1.65;
}

/* COMPARISON SECTION */

.case-redesign__before-after {
	padding: 80px 0;
	background: #0f172a;
	color: #fff;
}

.case-redesign__before-after .case-redesign__section-title {
	color: #fff;
}

.case-redesign__before-after .case-redesign__section-text {
	color: #cbd5e1;
}

.case-comparison-slider {
	margin-top: 38px;
}

.case-comparison-slider__nav {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	margin-bottom: 22px;
}

.case-comparison-slider__tab {
	border: 1px solid rgba(255,255,255,.14);
	background: rgba(255,255,255,.06);
	color: #cbd5e1;
	padding: 11px 15px;
	border-radius: 999px;
	font-size: 14px;
	font-weight: 700;
	cursor: pointer;
	transition: .2s ease;
}

.case-comparison-slider__tab:hover,
.case-comparison-slider__tab.is-active {
	background: #2563eb;
	border-color: #2563eb;
	color: #fff;
}

.case-comparison-slider__slides {
	position: relative;
}

.case-comparison-slider__slide {
	display: none;
}

.case-comparison-slider__slide.is-active {
	display: block;
}

.case-comparison-slider__head {
	margin-bottom: 18px;
	padding: 24px;
	border-radius: 24px;
	background: rgba(255,255,255,.06);
	border: 1px solid rgba(255,255,255,.08);
}

.case-comparison-slider__head h3 {
	margin: 0 0 8px;
	color: #fff;
	font-size: 28px;
	letter-spacing: -0.035em;
}

.case-comparison-slider__head p {
	margin: 0;
	max-width: 760px;
	color: #cbd5e1;
	font-size: 16px;
	line-height: 1.6;
}

.case-comparison-slider__arrows {
	display: flex;
	gap: 10px;
	margin-top: 18px;
}

.case-comparison-slider__arrow {
	width: 46px;
	height: 46px;
	border: 1px solid rgba(255,255,255,.14);
	border-radius: 999px;
	background: rgba(255,255,255,.06);
	color: #fff;
	font-size: 22px;
	cursor: pointer;
	transition: .2s ease;
}

.case-comparison-slider__arrow:hover {
	background: #2563eb;
	border-color: #2563eb;
}

/* BEFORE AFTER INSIDE SLIDE */

.ba-slider {
	position: relative;
	border-radius: 30px;
	overflow: hidden;
	background: #020617;
	box-shadow: 0 28px 80px rgba(0, 0, 0, .35);
	user-select: none;
}

.ba-slider__top {
	display: flex;
	justify-content: space-between;
	align-items: center;
	gap: 16px;
	padding: 16px 18px;
	background: rgba(2, 6, 23, .92);
	border-bottom: 1px solid rgba(255,255,255,.08);
}

.ba-slider__hint {
	margin: 0;
	color: #cbd5e1;
	font-size: 14px;
	line-height: 1.4;
}

.ba-slider__labels {
	display: flex;
	gap: 8px;
	flex-shrink: 0;
}

.ba-slider__label {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 8px 12px;
	border-radius: 999px;
	background: rgba(255,255,255,.1);
	color: #fff;
	font-size: 13px;
	font-weight: 700;
}

.ba-slider__label--before {
	background: rgba(148, 163, 184, .18);
}

.ba-slider__label--after {
	background: rgba(37, 99, 235, .85);
}

.ba-slider__viewport {
	position: relative;
	width: 100%;
	height: min(780px, 76vh);
	overflow-y: auto;
	overflow-x: hidden;
	background: #020617;
	scrollbar-width: thin;
	scrollbar-color: #2563eb #020617;
}

.ba-slider__viewport::-webkit-scrollbar {
	width: 11px;
}

.ba-slider__viewport::-webkit-scrollbar-track {
	background: #020617;
}

.ba-slider__viewport::-webkit-scrollbar-thumb {
	background: #2563eb;
	border-radius: 999px;
	border: 2px solid #020617;
}

.ba-slider__canvas {
	position: relative;
	width: 100%;
	min-height: 420px;
}

.ba-slider__image {
	display: block;
	width: 100%;
	height: auto;
	max-width: none;
	user-select: none;
	pointer-events: none;
}

.ba-slider__image--before {
	position: relative;
	z-index: 1;
}

.ba-slider__after-wrap {
	position: absolute;
	top: 0;
	left: 0;
	width: 50%;
	height: 100%;
	overflow: hidden;
	z-index: 2;
	pointer-events: none;
}

.ba-slider__after-wrap .ba-slider__image {
	width: var(--ba-image-width, 100%);
	max-width: none;
}

.ba-slider__line {
	position: absolute;
	top: 0;
	left: 50%;
	width: 3px;
	height: 100%;
	background: #fff;
	z-index: 4;
	transform: translateX(-50%);
	pointer-events: none;
	box-shadow: 0 0 18px rgba(0,0,0,.35);
}

.ba-slider__handle {
	position: sticky;
	top: 50%;
	left: 50%;
	z-index: 8;
	width: 58px;
	height: 58px;
	margin-top: -29px;
	border-radius: 999px;
	background: #fff;
	color: #111827;
	display: flex;
	align-items: center;
	justify-content: center;
	transform: translateX(-50%);
	box-shadow: 0 14px 40px rgba(0,0,0,.32);
	font-weight: 900;
	pointer-events: none;
}

.ba-slider__range-wrap {
	position: sticky;
	bottom: 0;
	z-index: 9;
	padding: 14px 18px;
	background: linear-gradient(180deg, rgba(2,6,23,0), rgba(2,6,23,.96) 35%);
}

.ba-slider__range {
	display: block;
	width: 100%;
	margin: 0;
	cursor: ew-resize;
	accent-color: #2563eb;
}

/* CONTENT */

.case-redesign__content {
	padding: 72px 0;
	background: #fff;
}

.case-redesign__content-body {
	margin: 0 auto;
	color: #334155;
	font-size: 18px;
	line-height: 1.8;
}

.case-redesign__content-body h2,
.case-redesign__content-body h3 {
	color: #111827;
	letter-spacing: -0.035em;
}

/* CTA */

.case-redesign__cta {
	padding: 78px 0;
	background:
		radial-gradient(circle at 10% 20%, rgba(37, 99, 235, .25), transparent 35%),
		linear-gradient(135deg, #111827 0%, #020617 100%);
	color: #fff;
}

.case-redesign__cta-box {
	display: grid;
	grid-template-columns: 1fr auto;
	gap: 28px;
	align-items: center;
}

.case-redesign__cta h2 {
	margin: 0 0 14px;
	font-size: clamp(30px, 4vw, 52px);
	line-height: 1.04;
	letter-spacing: -0.045em;
}

.case-redesign__cta p {
	margin: 0;
	max-width: 680px;
	color: #cbd5e1;
	font-size: 18px;
	line-height: 1.65;
}

/* RESPONSIVE */

@media (max-width: 900px) {
	.case-redesign__hero {
		padding: 58px 0 50px;
	}

	.case-redesign__hero-grid,
	.case-redesign__cta-box {
		grid-template-columns: 1fr;
	}

	.case-redesign__stats-grid,
	.case-redesign__cards {
		grid-template-columns: 1fr;
	}

	.case-redesign__section {
		padding: 54px 0;
	}

	.case-redesign__before-after {
		padding: 58px 0;
	}

	.case-redesign__lead {
		font-size: 17px;
	}

	.ba-slider__viewport {
		height: min(680px, 72vh);
	}

	.ba-slider__top {
		align-items: flex-start;
		flex-direction: column;
	}

	.ba-slider__labels {
		width: 100%;
		justify-content: space-between;
	}
}

@media (max-width: 560px) {
	.case-redesign .container {
		width: min(100% - 22px, 1180px);
	}

	.case-redesign__title {
		font-size: 38px;
	}

	.case-redesign__btn {
		width: 100%;
	}

	.case-redesign__card,
	.case-redesign__stat {
		padding: 22px;
	}

	.case-comparison-slider__nav {
		overflow-x: auto;
		flex-wrap: nowrap;
		padding-bottom: 6px;
	}

	.case-comparison-slider__tab {
		flex: 0 0 auto;
	}

	.case-comparison-slider__head {
		padding: 18px;
	}

	.case-comparison-slider__head h3 {
		font-size: 23px;
	}

	.ba-slider,
	.case-redesign__mockup {
		border-radius: 22px;
	}

	.ba-slider__viewport {
		height: min(560px, 70vh);
	}

	.ba-slider__handle {
		width: 48px;
		height: 48px;
		margin-top: -24px;
	}

	.ba-slider__top,
	.ba-slider__range-wrap {
		padding-left: 14px;
		padding-right: 14px;
	}
}
</style>

<main class="case-redesign">
	<?php while (have_posts()) : the_post(); ?>

		<section class="case-redesign__hero">
			<div class="container">
				<div class="case-redesign__hero-grid">
					<div>
						<div class="case-redesign__badge">Кейс по редизайну интернет-магазина</div>

						<h1 class="case-redesign__title"><?php the_title(); ?></h1>

						<div class="case-redesign__lead">
							<?php
							if (has_excerpt()) {
								echo wp_kses_post(get_the_excerpt());
							} else {
								echo 'Обновили визуальную подачу, структуру страниц и пользовательский путь интернет-магазина: от главной страницы и каталога до карточки товара, корзины и оформления заказа.';
							}
							?>
						</div>

						<div class="case-redesign__actions">
							<?php if ($case_site_url) : ?>
								<a class="case-redesign__btn" href="<?php echo esc_url($case_site_url); ?>" target="_blank" rel="nofollow noopener">
									Смотреть сайт
								</a>
							<?php endif; ?>

							<a class="case-redesign__btn case-redesign__btn--dark" href="/contacts/">
								Обсудить редизайн
							</a>
						</div>
					</div>

					<?php if (has_post_thumbnail()) : ?>
						<div class="case-redesign__mockup">
							<?php the_post_thumbnail('large'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="case-redesign__stats">
					<div class="case-redesign__stats-grid">
						<div class="case-redesign__stat">
							<span class="case-redesign__stat-number">01</span>
							<span class="case-redesign__stat-label">Обновили ключевые страницы магазина и сделали визуальную подачу современнее.</span>
						</div>

						<div class="case-redesign__stat">
							<span class="case-redesign__stat-number">02</span>
							<span class="case-redesign__stat-label">Упростили путь пользователя от выбора товара до оформления заказа.</span>
						</div>

						<div class="case-redesign__stat">
							<span class="case-redesign__stat-number">03</span>
							<span class="case-redesign__stat-label">Сохранили контентную основу и подготовили магазин к дальнейшему развитию.</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="case-redesign__section">
			<div class="container">
				<h2 class="case-redesign__section-title">Задача проекта</h2>

				<p class="case-redesign__section-text">
					<?php
					if ($case_task_text) {
						echo wp_kses_post($case_task_text);
					} else {
						echo 'Интернет-магазин выглядел устаревшим, хуже презентовал товары и не создавал нужного доверия у покупателей. Нужно было обновить дизайн ключевых страниц, улучшить структуру и сделать покупательский путь более понятным.';
					}
					?>
				</p>

				<div class="case-redesign__cards">
					<div class="case-redesign__card">
						<span class="case-redesign__card-num">1</span>
						<h3>Визуальное обновление</h3>
						<p>Собрали более современную подачу, усилили карточки, блоки доверия, товарные секции и коммерческие акценты.</p>
					</div>

					<div class="case-redesign__card">
						<span class="case-redesign__card-num">2</span>
						<h3>Удобный путь покупки</h3>
						<p>Проработали путь от главной страницы и каталога до карточки товара, корзины и оформления заказа.</p>
					</div>

					<div class="case-redesign__card">
						<span class="case-redesign__card-num">3</span>
						<h3>Адаптивность</h3>
						<p>Подготовили аккуратное отображение на мобильных устройствах, чтобы магазин нормально работал с трафиком со смартфонов.</p>
					</div>
				</div>
			</div>
		</section>

		<?php if (!empty($case_comparison_slides)) : ?>
			<section class="case-redesign__before-after">
				<div class="container">
					<h2 class="case-redesign__section-title">Что изменилось в интернет-магазине</h2>
					<p class="case-redesign__section-text">
						Сравнение ключевых страниц магазина до и после редизайна. Можно переключаться между страницами и внутри каждой смотреть полный длинный скриншот.
					</p>

					<div class="case-comparison-slider" data-comparison-slider>
						<div class="case-comparison-slider__nav">
							<?php foreach ($case_comparison_slides as $index => $slide) : ?>
								<?php
								$slide_title = !empty($slide['slide_title']) ? $slide['slide_title'] : 'Страница ' . ($index + 1);
								?>
								<button
									type="button"
									class="case-comparison-slider__tab <?php echo $index === 0 ? 'is-active' : ''; ?>"
									data-comparison-tab="<?php echo esc_attr($index); ?>"
								>
									<?php echo esc_html($slide_title); ?>
								</button>
							<?php endforeach; ?>
						</div>

						<div class="case-comparison-slider__slides">
							<?php foreach ($case_comparison_slides as $index => $slide) : ?>
								<?php
								$slide_title       = !empty($slide['slide_title']) ? $slide['slide_title'] : 'Страница ' . ($index + 1);
								$slide_description = !empty($slide['slide_description']) ? $slide['slide_description'] : '';
								$before            = !empty($slide['slide_before_image']) ? $slide['slide_before_image'] : '';
								$after             = !empty($slide['slide_after_image']) ? $slide['slide_after_image'] : '';

								if (!$before || !$after) {
									continue;
								}
								?>

								<div
									class="case-comparison-slider__slide <?php echo $index === 0 ? 'is-active' : ''; ?>"
									data-comparison-slide="<?php echo esc_attr($index); ?>"
								>
									<div class="case-comparison-slider__head">
										<h3><?php echo esc_html($slide_title); ?></h3>

										<?php if ($slide_description) : ?>
											<p><?php echo esc_html($slide_description); ?></p>
										<?php endif; ?>

										<div class="case-comparison-slider__arrows">
											<button type="button" class="case-comparison-slider__arrow" data-comparison-prev aria-label="Предыдущая страница">‹</button>
											<button type="button" class="case-comparison-slider__arrow" data-comparison-next aria-label="Следующая страница">›</button>
										</div>
									</div>

									<div class="ba-slider" data-ba-slider>
										<div class="ba-slider__top">
											<p class="ba-slider__hint">
												Прокручивайте блок вниз, чтобы посмотреть полный скриншот страницы. Ползунок сравнивает старую и новую версию.
											</p>

											<div class="ba-slider__labels">
												<span class="ba-slider__label ba-slider__label--before">До</span>
												<span class="ba-slider__label ba-slider__label--after">После</span>
											</div>
										</div>

										<div class="ba-slider__viewport" data-ba-viewport>
											<div class="ba-slider__canvas" data-ba-canvas>
												<?php
												echo wp_get_attachment_image(
													$before,
													'full',
													false,
													[
														'class'    => 'ba-slider__image ba-slider__image--before',
														'loading'  => 'lazy',
														'decoding' => 'async',
													]
												);
												?>

												<div class="ba-slider__after-wrap" data-ba-after>
													<?php
													echo wp_get_attachment_image(
														$after,
														'full',
														false,
														[
															'class'    => 'ba-slider__image ba-slider__image--after',
															'loading'  => 'lazy',
															'decoding' => 'async',
														]
													);
													?>
												</div>

												<div class="ba-slider__line" data-ba-line></div>
												<div class="ba-slider__handle" data-ba-handle>↔</div>
											</div>

											<div class="ba-slider__range-wrap">
												<input class="ba-slider__range" data-ba-range type="range" min="0" max="100" value="50" aria-label="Сравнение до и после">
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<section class="case-redesign__section">
			<div class="container">
				<h2 class="case-redesign__section-title">Что было сделано</h2>

				<p class="case-redesign__section-text">
					<?php
					if ($case_solution_text) {
						echo wp_kses_post($case_solution_text);
					} else {
						echo 'Переработали главную страницу, каталог, карточку товара, корзину, оформление заказа, блоки доверия и коммерческую структуру. Сделали магазин более аккуратным, понятным и готовым к продвижению.';
					}
					?>
				</p>
			</div>
		</section>

		<section class="case-redesign__content">
			<div class="container">
				<div class="case-redesign__content-body">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

		<section class="case-redesign__section">
			<div class="container">
				<h2 class="case-redesign__section-title">Результат</h2>

				<p class="case-redesign__section-text">
					<?php
					if ($case_result_text) {
						echo wp_kses_post($case_result_text);
					} else {
						echo 'После редизайна интернет-магазин стал выглядеть современнее, лучше презентует товары и понятнее ведёт пользователя к покупке. Ключевые страницы стали визуально чище, удобнее и коммерчески сильнее.';
					}
					?>
				</p>
			</div>
		</section>

		<section class="case-redesign__cta">
			<div class="container">
				<div class="case-redesign__cta-box">
					<div>
						<h2>Хотите обновить свой интернет-магазин?</h2>
						<p>Можно сохранить товары, категории и контент, но привести магазин к современному виду, улучшить мобильную версию и сделать путь к покупке понятнее.</p>
					</div>

					<a class="case-redesign__btn" href="/contacts/">
						Обсудить проект
					</a>
				</div>
			</div>
		</section>

	<?php endwhile; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
	function initBeforeAfterSliders(scope) {
		const sliders = scope.querySelectorAll('[data-ba-slider]');

		sliders.forEach(function (slider) {
			const range = slider.querySelector('[data-ba-range]');
			const after = slider.querySelector('[data-ba-after]');
			const line = slider.querySelector('[data-ba-line]');
			const handle = slider.querySelector('[data-ba-handle]');
			const canvas = slider.querySelector('[data-ba-canvas]');

			if (!range || !after || !line || !handle || !canvas) {
				return;
			}

			function refreshImageWidth() {
				canvas.style.setProperty('--ba-image-width', canvas.offsetWidth + 'px');
			}

			function updateSlider(value) {
				const percent = value + '%';

				after.style.width = percent;
				line.style.left = percent;
				handle.style.left = percent;

				refreshImageWidth();
			}

			if (!slider.dataset.baReady) {
				range.addEventListener('input', function () {
					updateSlider(this.value);
				});

				slider.dataset.baReady = 'true';
			}

			const images = slider.querySelectorAll('img');

			images.forEach(function (img) {
				if (img.complete) {
					refreshImageWidth();
					updateSlider(range.value);
				} else {
					img.addEventListener('load', function () {
						refreshImageWidth();
						updateSlider(range.value);
					}, { once: true });
				}
			});

			refreshImageWidth();
			updateSlider(range.value);
		});
	}

	function activateComparisonSlide(slider, index) {
		const tabs = slider.querySelectorAll('[data-comparison-tab]');
		const slides = slider.querySelectorAll('[data-comparison-slide]');

		if (!slides.length) {
			return;
		}

		if (index < 0) {
			index = slides.length - 1;
		}

		if (index >= slides.length) {
			index = 0;
		}

		tabs.forEach(function (tab) {
			tab.classList.remove('is-active');
		});

		slides.forEach(function (slide) {
			slide.classList.remove('is-active');
		});

		const activeTab = slider.querySelector('[data-comparison-tab="' + index + '"]');
		const activeSlide = slider.querySelector('[data-comparison-slide="' + index + '"]');

		if (activeTab) {
			activeTab.classList.add('is-active');
		}

		if (activeSlide) {
			activeSlide.classList.add('is-active');
			initBeforeAfterSliders(activeSlide);
		}

		slider.dataset.activeIndex = index;
	}

	const comparisonSliders = document.querySelectorAll('[data-comparison-slider]');

	comparisonSliders.forEach(function (slider) {
		const tabs = slider.querySelectorAll('[data-comparison-tab]');

		slider.dataset.activeIndex = '0';

		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				const index = parseInt(this.getAttribute('data-comparison-tab'), 10);
				activateComparisonSlide(slider, index);
			});
		});

		slider.addEventListener('click', function (event) {
			const prev = event.target.closest('[data-comparison-prev]');
			const next = event.target.closest('[data-comparison-next]');

			if (!prev && !next) {
				return;
			}

			const currentIndex = parseInt(slider.dataset.activeIndex || '0', 10);
			const nextIndex = next ? currentIndex + 1 : currentIndex - 1;

			activateComparisonSlide(slider, nextIndex);
		});

		activateComparisonSlide(slider, 0);
	});

	initBeforeAfterSliders(document);

	window.addEventListener('resize', function () {
		initBeforeAfterSliders(document);
	});
});
</script>

<?php get_footer(); ?>