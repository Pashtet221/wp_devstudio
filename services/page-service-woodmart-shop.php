<?php
/*
Template Name: Услуга — Интернет-магазин на Woodmart
Template Post Type: service, page
*/

defined('ABSPATH') || exit;

get_header();

?>

<style>
	:root {
		--wm-bg: #f6faf7;
		--wm-surface: rgba(255,255,255,.96);
		--wm-heading: var(--gl-color-heading, #1A1A1A);
		--wm-text: var(--gl-color-text, #2B2B2B);
		--wm-muted: var(--gl-color-subtitle, #6B7280);
		--wm-line: #e4ece6;
		--wm-accent: var(--gl-color-accent, #2cbc63);
		--wm-accent-2: var(--gl-color-accent-2, #1ea751);
		--wm-radius-xl: 30px;
		--wm-radius-lg: 24px;
		--wm-radius-md: 18px;
		--wm-shadow: 0 18px 50px rgba(16,24,40,.06);
		--wm-shadow-soft: 0 10px 30px rgba(16,24,40,.05);
		--wm-container: 1280px;
	}

	.wm-page {
		padding: 0 0 88px;
		background:
			radial-gradient(circle at top left, rgba(44,188,99,.08), transparent 28%),
			linear-gradient(180deg, #f8fbf9 0%, #f4f7f5 100%);
		color: var(--wm-text);
	}

	.wm-container {
		max-width: var(--wm-container);
		margin: 0 auto;
		padding: 0 20px;
	}

	.wm-hero {
		padding: 56px 0 28px;
	}

	.wm-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1.15fr) minmax(320px, .85fr);
		gap: 24px;
		align-items: stretch;
	}

	.wm-box {
		background: var(--wm-surface);
		border: 1px solid var(--wm-line);
		border-radius: var(--wm-radius-xl);
		box-shadow: var(--wm-shadow);
	}

	.wm-hero__main {
		padding: 38px;
	}

	.wm-hero__side {
		padding: 28px;
		display: flex;
		flex-direction: column;
		gap: 18px;
	}

	.wm-pill,
	.wm-eyebrow {
		display: inline-flex;
		align-items: center;
		min-height: 34px;
		padding: 0 14px;
		border-radius: 999px;
		background: rgba(44,188,99,.1);
		color: var(--wm-accent-2);
		font-size: 13px;
		font-weight: 700;
		letter-spacing: .04em;
		text-transform: uppercase;
		margin-bottom: 16px;
	}

	.wm-title {
		margin: 0 0 16px;
		font-size: clamp(34px, 5vw, 58px);
		line-height: 1.02;
		letter-spacing: -.03em;
		color: var(--wm-heading);
	}

	.wm-subtitle {
		margin: 0 0 24px;
		max-width: 780px;
		font-size: 18px;
		line-height: 1.75;
		color: var(--wm-muted);
	}

	.wm-points {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 12px;
		margin: 0 0 26px;
		padding: 0;
		list-style: none;
	}

	.wm-points li {
		display: flex;
		gap: 10px;
		padding: 14px 16px;
		background: #fff;
		border: 1px solid #e9efeb;
		border-radius: 16px;
		box-shadow: var(--wm-shadow-soft);
		font-size: 15px;
		line-height: 1.55;
	}

	.wm-points li:before,
	.wm-list li:before {
		content: "";
		flex: 0 0 9px;
		width: 9px;
		height: 9px;
		margin-top: 7px;
		border-radius: 50%;
		background: var(--wm-accent);
	}

	.wm-actions {
		display: flex;
		flex-wrap: wrap;
		gap: 14px;
	}

	.wm-btn {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-height: 48px;
		padding: 0 20px;
		border-radius: 12px;
		font-size: 15px;
		font-weight: 700;
		text-decoration: none;
		transition: .2s ease;
	}

	.wm-btn--primary {
		background: var(--wm-accent);
		color: #fff;
		box-shadow: 0 14px 30px rgba(44,188,99,.2);
	}

	.wm-btn--primary:hover {
		background: var(--wm-accent-2);
		color: #fff;
		transform: translateY(-1px);
	}

	.wm-btn--secondary {
		background: transparent;
		border: 1px solid var(--wm-accent);
		color: var(--wm-accent);
	}

	.wm-btn--secondary:hover {
		background: var(--wm-accent);
		color: #fff;
		transform: translateY(-1px);
	}

	.wm-side-label {
		margin: 0;
		font-size: 13px;
		font-weight: 800;
		letter-spacing: .04em;
		text-transform: uppercase;
		color: #9ca3af;
	}

	.wm-side-price {
		margin: 0;
		font-size: 34px;
		line-height: 1.05;
		font-weight: 900;
		color: var(--wm-heading);
	}

	.wm-side-text {
		margin: 0;
		font-size: 15px;
		line-height: 1.7;
		color: var(--wm-muted);
	}

	.wm-section {
		padding: 28px 0;
	}

	.wm-head {
		max-width: 860px;
		margin: 0 0 24px;
	}

	.wm-head h2 {
		margin: 0 0 12px;
		font-size: clamp(28px, 4vw, 42px);
		line-height: 1.1;
		letter-spacing: -.02em;
		color: var(--wm-heading);
	}

	.wm-head p {
		margin: 0;
		font-size: 17px;
		line-height: 1.75;
		color: var(--wm-muted);
	}

	.wm-grid-3 {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 22px;
	}

	.wm-grid-2 {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 22px;
	}

	.wm-card {
		padding: 28px;
		background: var(--wm-surface);
		border: 1px solid var(--wm-line);
		border-radius: var(--wm-radius-lg);
		box-shadow: var(--wm-shadow-soft);
	}

	.wm-card h3 {
		margin: 0 0 12px;
		font-size: 22px;
		line-height: 1.2;
		color: var(--wm-heading);
	}

	.wm-card p {
		margin: 0;
		font-size: 15px;
		line-height: 1.75;
		color: var(--wm-muted);
	}

	.wm-list {
		margin: 0;
		padding: 0;
		list-style: none;
		display: grid;
		gap: 12px;
	}

	.wm-list li {
		display: flex;
		gap: 10px;
		font-size: 15px;
		line-height: 1.7;
		color: var(--wm-text);
	}

	.wm-demo-grid {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 20px;
	}

	.wm-demo {
		overflow: hidden;
		background: #fff;
		border: 1px solid var(--wm-line);
		border-radius: 24px;
		box-shadow: var(--wm-shadow-soft);
	}

	.wm-demo__image {
		display: block;
		aspect-ratio: 4 / 3;
		background: #edf3ef;
		overflow: hidden;
	}

	.wm-demo__image img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		display: block;
		transition: .25s ease;
	}

	.wm-demo:hover .wm-demo__image img {
		transform: scale(1.04);
	}

	.wm-demo__body {
		padding: 20px;
	}

	.wm-demo__body h3 {
		margin: 0 0 8px;
		font-size: 19px;
		color: var(--wm-heading);
	}

	.wm-demo__body p {
		margin: 0 0 16px;
		font-size: 14px;
		line-height: 1.65;
		color: var(--wm-muted);
	}

	.wm-demo__link {
		font-size: 14px;
		font-weight: 800;
		color: var(--wm-accent-2);
		text-decoration: none;
	}

	.wm-steps {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 18px;
	}

	.wm-step {
		padding: 24px;
		background: #fff;
		border: 1px solid #e7eee9;
		border-radius: 22px;
		box-shadow: var(--wm-shadow-soft);
	}

	.wm-step__num {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 42px;
		height: 42px;
		margin-bottom: 16px;
		border-radius: 12px;
		background: #ecfdf3;
		color: var(--wm-accent-2);
		font-size: 16px;
		font-weight: 900;
	}

	.wm-step h3 {
		margin: 0 0 10px;
		font-size: 18px;
		color: var(--wm-heading);
	}

	.wm-step p {
		margin: 0;
		font-size: 15px;
		line-height: 1.7;
		color: var(--wm-muted);
	}

	.wm-price {
		position: relative;
		padding: 30px;
		background: #fff;
		border: 1px solid var(--wm-line);
		border-radius: 26px;
		box-shadow: var(--wm-shadow-soft);
	}

	.wm-price__name {
		margin: 0 0 10px;
		font-size: 22px;
		color: var(--wm-heading);
	}

	.wm-price__value {
		margin: 0 0 14px;
		font-size: 32px;
		font-weight: 900;
		color: var(--wm-heading);
	}

	.wm-price__text {
		margin: 0 0 18px;
		font-size: 15px;
		line-height: 1.7;
		color: var(--wm-muted);
	}

	.wm-faq {
		display: grid;
		gap: 16px;
	}

	.wm-faq__item {
		padding: 24px 26px;
		background: var(--wm-surface);
		border: 1px solid var(--wm-line);
		border-radius: 22px;
		box-shadow: var(--wm-shadow-soft);
	}

	.wm-faq__item h3 {
		margin: 0 0 10px;
		font-size: 19px;
		color: var(--wm-heading);
	}

	.wm-faq__item p {
		margin: 0;
		font-size: 15px;
		line-height: 1.75;
		color: var(--wm-muted);
	}

	.wm-cta {
		padding: 36px;
		background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
		border-radius: 30px;
		box-shadow: 0 24px 60px rgba(17,24,39,.16);
	}

	.wm-cta h2 {
		margin: 0 0 12px;
		font-size: clamp(28px, 4vw, 40px);
		line-height: 1.1;
		color: #fff;
	}

	.wm-cta p {
		margin: 0 0 22px;
		max-width: 780px;
		font-size: 17px;
		line-height: 1.75;
		color: rgba(255,255,255,.78);
	}

	@media (max-width: 1100px) {
		.wm-hero__grid,
		.wm-grid-3,
		.wm-demo-grid,
		.wm-steps {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	@media (max-width: 767px) {
		.wm-page {
			padding-bottom: 64px;
		}

		.wm-hero {
			padding-top: 38px;
		}

		.wm-hero__grid,
		.wm-grid-3,
		.wm-grid-2,
		.wm-demo-grid,
		.wm-steps,
		.wm-points {
			grid-template-columns: 1fr;
		}

		.wm-hero__main,
		.wm-hero__side,
		.wm-card,
		.wm-price,
		.wm-faq__item,
		.wm-cta {
			padding: 24px;
		}

		.wm-actions {
			flex-direction: column;
		}

		.wm-btn {
			width: 100%;
		}
	}
</style>

<main class="wm-page">

	<section class="wm-hero">
		<div class="wm-container">
			<div class="wm-hero__grid">
				<div class="wm-box wm-hero__main">
					<div class="wm-pill">Интернет-магазин на Woodmart</div>

					<h1 class="wm-title"><?php the_title(); ?></h1>

					<p class="wm-subtitle">
						Создам интернет-магазин на WordPress, WooCommerce и Woodmart: подберу подходящий шаблон,
						адаптирую его под ваш бизнес, настрою каталог, карточки товаров, корзину, оформление заказа,
						оплату, доставку и базовую структуру для дальнейшего продвижения.
					</p>

					<ul class="wm-points">
						<li>Быстрый запуск магазина на готовой премиальной базе Woodmart</li>
						<li>Адаптация дизайна под вашу нишу, товары и фирменный стиль</li>
						<li>Настройка WooCommerce, каталога, фильтров, корзины и checkout</li>
						<li>Возможность дальнейших доработок и разработки кастомного функционала</li>
					</ul>

					<div class="wm-actions">
						<a class="wm-btn wm-btn--primary" href="/contacts/">Обсудить магазин</a>
						<a class="wm-btn wm-btn--secondary" href="#woodmart-demos">Смотреть примеры</a>
					</div>
				</div>

				<aside class="wm-box wm-hero__side">
					<p class="wm-side-label">Стоимость</p>
					<p class="wm-side-price">от 45 000 ₽</p>
					<p class="wm-side-text">
						Цена зависит от выбранного шаблона, количества страниц, объема каталога,
						необходимых доработок, оплаты, доставки и дополнительных функций.
					</p>

					<ul class="wm-list">
						<li>Подбор подходящего демо Woodmart под нишу</li>
						<li>Настройка WordPress и WooCommerce</li>
						<li>Адаптация главной, каталога и карточки товара</li>
						<li>Подготовка магазина к запуску</li>
					</ul>
				</aside>
			</div>
		</div>
	</section>

	<section class="wm-section">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">Почему Woodmart</div>
				<h2>Готовая основа, которую можно быстро превратить в нормальный интернет-магазин</h2>
				<p>
					Woodmart подходит, когда нужен не полностью индивидуальный дизайн с нуля,
					а аккуратный и современный магазин на проверенной WooCommerce-теме.
					Это позволяет быстрее запустить проект и не тратить бюджет на разработку каждой секции с нуля.
				</p>
			</div>

			<div class="wm-grid-3">
				<div class="wm-card">
					<h3>Быстрее запуск</h3>
					<p>
						Берем подходящий демо-шаблон, меняем структуру, цвета, блоки, тексты и изображения под ваш бизнес.
					</p>
				</div>

				<div class="wm-card">
					<h3>Готовая WooCommerce-база</h3>
					<p>
						В теме уже есть решения для каталога, карточек товаров, фильтров, корзины, избранного и сравнения.
					</p>
				</div>

				<div class="wm-card">
					<h3>Можно дорабатывать</h3>
					<p>
						Если стандартных возможностей не хватает, можно добавить кастомные поля, блоки, фильтры, логику и плагины.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="wm-section" id="woodmart-demos">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">Примеры шаблонов</div>
				<h2>Можно выбрать подходящий шаблон Woodmart и адаптировать его под ваш магазин</h2>
				<p>
					Ниже можно разместить изображения понравившихся демо Woodmart, ссылки на оригинальные примеры
					и короткое описание, для какой ниши подходит каждый вариант.
				</p>
			</div>

			
			
			<div class="woodmart-container">
					<div class="wd-landing-side">
								<form role="search" class="wd-landing-search searchform">
			<input type="text" aria-label="Search" name="wd-landing-search" placeholder="Search demos by keyword (e.g. 'books')">

			<a href="#" class="wd-clear-search wd-hide" rel="nofollow"></a>

			<button type="submit" class="searchsubmit">
				<span>
					Search				</span>
			</button>
		</form>
								<div class="wd-nav-tabs-wrapper wd-nav-tabs-land-wrapper">
									<ul class="wd-landing-cats wd-nav wd-nav-tabs wd-style-background">
							
				<li class="wd-active" data-slug="all">
					<a href="#">
					<span class="nav-link-text">
						All					</span>

						<span class="wd-landing-cat-count">
													100											</span>
					</a>
				</li>
							
				<li class="" data-slug="electronics">
					<a href="#">
					<span class="nav-link-text">
						Electronics					</span>

						<span class="wd-landing-cat-count">
													17											</span>
					</a>
				</li>
							
				<li class="" data-slug="furniture">
					<a href="#">
					<span class="nav-link-text">
						Furniture					</span>

						<span class="wd-landing-cat-count">
													19											</span>
					</a>
				</li>
							
				<li class="" data-slug="fashion">
					<a href="#">
					<span class="nav-link-text">
						Fashion					</span>

						<span class="wd-landing-cat-count">
													23											</span>
					</a>
				</li>
							
				<li class="" data-slug="food">
					<a href="#">
					<span class="nav-link-text">
						Food					</span>

						<span class="wd-landing-cat-count">
													11											</span>
					</a>
				</li>
							
				<li class="" data-slug="mega-store">
					<a href="#">
					<span class="nav-link-text">
						Mega Store					</span>

						<span class="wd-landing-cat-count">
													16											</span>
					</a>
				</li>
							
				<li class="" data-slug="service">
					<a href="#">
					<span class="nav-link-text">
						Service					</span>

						<span class="wd-landing-cat-count">
													14											</span>
					</a>
				</li>
							
				<li class="" data-slug="corporate">
					<a href="#">
					<span class="nav-link-text">
						Corporate					</span>

						<span class="wd-landing-cat-count">
													15											</span>
					</a>
				</li>
							
				<li class="" data-slug="landing">
					<a href="#">
					<span class="nav-link-text">
						Landing					</span>

						<span class="wd-landing-cat-count">
													17											</span>
					</a>
				</li>
					</ul>
								</div>
					</div>
					<div class="wd-landing-content">
						<div class="wd-landing-notices wd-hide">
	<div class="wd-hide-md-sm wd-hide-sm">
		Не можете определиться с шаблоном? Вы можете комбинировать любые секции из разных демо и создать собственный уникальный интернет-магазин под ваш бизнес. Доступно более 400 готовых секций и вариантов оформления.
	</div>

	<div class="wd-hide-lg">
		По вашему запросу шаблоны не найдены.
	</div>
</div>
						<div class="wd-grid-g wd-landing-grid" style="--wd-col-lg: 4;--wd-col-md: 3;--wd-col-sm: 2;--wd-gap-lg: 30px;--wd-gap-sm: 10px;">
															<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/home/" data-cats="all furniture" data-search="all furniture Default slider decor lighting storage toys tables furniture chairs interiors shop home seating">
				<div class="wd-landing-item-thumb">
					<img decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/06/demo-default-130x109.jpg 130w" sizes="(max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Default					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/vegetables/" data-cats="all food mega-store" data-search="all food mega-store Vegetables green farm slider organic healthy vegetables megamarket food groceries eco fresh natural vitamins grocery">
				<div class="wd-landing-item-thumb">
					<img decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-vegetables-1-130x109.jpg 130w" sizes="(max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Vegetables					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label hot">
					<span>
						hot					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/furniture2/" data-cats="all furniture mega-store" data-search="all furniture mega-store Furniture 2 furniture home shop seating interiors slider lighting storage tables beds decor chairs">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-furniture-2-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Furniture 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label hot">
					<span>
						hot					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/fashion-2/" data-cats="fashion" data-search="fashion Fashion 2 outfits accessories slider apparel wear clothing fashion style">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/fashion-2-preview-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Fashion 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label new">
					<span>
						new					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/electronics-3/" data-cats="mega-store" data-search="mega-store Electronics 3 accessories video gadget gadgets slider computer marketplace appliances devices tech electronics audio">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/electronics-3-preview-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Electronics 3					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label new">
					<span>
						new					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/perfumes/" data-cats="fashion" data-search="fashion Perfumes unisex eau-de-parfum niche fragrance floral essential-oils gift-sets long-lasting musk oriental luxury woody">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/perfumes-preview-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Perfumes					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label new">
					<span>
						new					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/marketplace2/" data-cats="electronics mega-store" data-search="electronics mega-store Marketplace 2 phone marketplace accessories">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-megamarket-2-min-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Marketplace 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label hot">
					<span>
						hot					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/makeup/" data-cats="fashion" data-search="fashion Makeup cosmetics beauty makeup">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/11/makeup-550x460-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Makeup					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/mega-electronics/" data-cats="all electronics mega-store" data-search="all electronics mega-store Mega Electronics gadget gadgets computer marketplace slider appliances devices tech electronics accessories audio video">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/02/demo-mega-electronics-550x460-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Mega Electronics					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label hot">
					<span>
						hot					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/megamarket/" data-cats="all mega-store" data-search="all mega-store Megamarket marketplace shop slider megamarket ecommerce plumbing retail">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2022/06/demo-marketplace-min-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Megamarket					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/pets/" data-cats="food mega-store" data-search="food mega-store Pets cats pet-food grooming organic small-pets veterinary healthy collars kitten puppy toys dogs accessories">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/pets-optimized-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Pets					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/pottery/" data-cats="all" data-search="all Pottery ceramics handmade clay handcrafted produce craft wheel decor pottery slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/08/demo-pottery-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Pottery					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/merchandise/" data-cats="fashion" data-search="fashion Merchandise gaming lifestyle hoodies backpaks apparel souvenirs printed merch geek">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2026/02/merchandise-preview-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Merchandise					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label new">
					<span>
						new					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/handmade-bags/" data-cats="fashion" data-search="fashion Handmade Bags bags leather">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/handmade-bags-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Handmade Bags					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/t-shirts-prints/" data-cats="fashion service" data-search="fashion service T-shirts printing shirt">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/t-shirts-prints-large-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						T-shirts					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/pills/" data-cats="all" data-search="all Pills pharmacy supplements capsules medication drugs treatment vitamins health">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/03/demo-pills-min-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Pills					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/organic-farm/" data-cats="all food" data-search="all food Organic Farm organic produce healthy craft milk food local cheese eco dairy fresh natural green farm">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-farm-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Organic Farm					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/accessories/" data-cats="all electronics mega-store" data-search="all electronics mega-store Accessories devices tech electronics accessories phones smartwatches cases slider chargers gadget gadgets wearables bands">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2022/09/demo-accessories-2-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Accessories					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
								<div class="wd-landing-demo-label hot">
					<span>
						hot					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/games/" data-cats="all mega-store" data-search="all mega-store Games consoles software digitals keys slider games digital gaming videogames">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-white-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Games					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/games/home-dark/" data-cats="all mega-store" data-search="all mega-store Games Dark videogames consoles software digitals keys slider games digital gaming">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/09/demo-games-dark-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Games Dark					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/plants/" data-cats="all" data-search="all Plants botany nature foliage herbs plants greenery slider garden flora">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-plants-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Plants					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/kids/" data-cats="all fashion" data-search="all fashion Kids gifts kids apparel children accessories fashion baby slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/01/demo-kids-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Kids					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/christmas-2/" data-cats="mega-store" data-search="mega-store Christmas 2 holidays gifts celebrations seasonal toys">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/Christmas-2-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Christmas 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/barbershop/" data-cats="fashion service landing" data-search="fashion service landing Barbershop hairdresser hair-care barbershop">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/barbershop-large-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Barbershop					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-hemp-shoes/demo/hemp-shoes/" data-cats="fashion landing" data-search="fashion landing Hemp Shoes handmade handcrafted shoes hemp">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/06/hemp-shoes-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Hemp Shoes					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-retail/demo/retail/" data-cats="all electronics mega-store" data-search="all electronics mega-store Retail deals vendors slider retail boutique marketplace merchandise">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Retail					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-decor/demo/decor/" data-cats="all furniture" data-search="all furniture Decor furniture home lighting bottles slider minimalism decor interiors">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-decor-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Decor					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-black-friday/demo/black-friday/" data-cats="all electronics mega-store" data-search="all electronics mega-store Black Friday deals vendors sales black-friday retail boutique marketplace slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-black_friday-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Black Friday					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/handmade/" data-cats="all furniture" data-search="all furniture Handmade vendors grid handcrafted craft retail minimalism marketplace diy custom creative multivendor produce dokan">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-handmade-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Handmade					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-fashion-minimalism/demo/fashion-minimalism/" data-cats="all fashion" data-search="all fashion Fashion Minimalism simple apparel wear clothing accessories slider fashion minimalism style outfits">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-minimalism-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Fashion Minimalism					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-fashion-colored/demo/fashion-colored/" data-cats="all fashion" data-search="all fashion Fashion Color accessories wear clothing slider style outfits apparel fashion">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-color-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Fashion Color					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-marketplace/demo/marketplace/" data-cats="all electronics furniture fashion mega-store" data-search="all electronics furniture fashion mega-store Marketplace shop vendors listings grid electronics shopping sellers retail marketplace products furniture deals">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-marketplace-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Marketplace					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-electronics/demo/electronics/" data-cats="all electronics" data-search="all electronics Electronics electronics devices hardware appliances slider tech smart audio gadgets computer">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-electronics-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Electronics					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/vinyls/" data-cats="electronics" data-search="electronics Vinyls ">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2025/10/vinyls-optimized-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Vinyls					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-glasses/demo/glasses/" data-cats="all fashion" data-search="all fashion Glasses optics shades sunglasses prescription slider eyewear fashion minimalism frames style lenses vision">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-glasses-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Glasses					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-retail-2/demo/retail-2/" data-cats="all electronics mega-store" data-search="all electronics mega-store Retail 2 deals shopping vendors grid sellers retail marketplace products">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-retail-2-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Retail 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-tools/demo/tools/" data-cats="all electronics" data-search="all electronics Tools workshop repair machinery handtools grid equipment diy construction tools power">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-tools-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Tools					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-coffee/demo/coffee/" data-cats="all food" data-search="all food Coffee drinks aroma beverages food latte roastery caffeine coffee brew beans slider espresso">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-coffee-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Coffee					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-electronics-2/demo/electronics-2/" data-cats="all electronics" data-search="all electronics Electronics 2 computer slider devices appliances hardware tech electronics smart audio gadgets">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-electronics-2-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Electronics 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-fashion/demo/fashion/" data-cats="all fashion" data-search="all fashion Fashion apparel fashion accessories shoes wear clothing style slider outfits">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-fashion-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Fashion					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-books/demo/books/" data-cats="all" data-search="all Books authors stories slider bookstore books reading literature novels fiction">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-books-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Books					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-shoes/demo/shoes/" data-cats="all fashion" data-search="all fashion Shoes sandals shoes fashion footwear style sneakers boots slider heels">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-shoes-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Shoes					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-sport/demo/sport/" data-cats="all" data-search="all Sport exercise apparel active athletics supplements powerlifting equipment fitness bodybuilding slider gear sport sneakers gym training">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-sport-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Sport					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-hardware/?opt=hardware" data-cats="all electronics" data-search="all electronics Hardware hardware electronics dark components graphics motherboards memory upgrades computer peripherals slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-hardware-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Hardware					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-food/demo/food/" data-cats="all food service" data-search="all food service Food service dishes slider restaurant meals dining kitchen cuisine flavors food chef menu eatery">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-food-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Food					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-fashion-flat/demo/flat/" data-cats="all fashion" data-search="all fashion Fashion Flat apparel fashion wear minimalism clothing slider style outfits">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-fashion-flat-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Fashion Flat					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-bikes/demo/bikes/" data-cats="all" data-search="all Bikes brakes training bike parts cycling ride wheels pedals outdoor components slider helmets gear sport frames tires bicycle">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-bikes-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Bikes					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-wine/demo/wine/" data-cats="all food" data-search="all food Wine alcohol spirits vineyard grapes bottles wine drinks sommelier slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-wine-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Wine					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-lingerie/demo/lingerie/" data-cats="all fashion" data-search="all fashion Lingerie bras panties corsets silk fashion intimates nightwear sleepwear slider lingerie">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lingerie-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Lingerie					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-watches/demo/watch/" data-cats="all fashion" data-search="all fashion Watches watches chronograph collection fashion accessories minimalism style timepieces clocks design slider bands">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-watches-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Watches					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-motorcycle/demo/motorcycle/" data-cats="all" data-search="all Motorcycle bike parts motorcycle grid riding customization chassis helmets scooters slider gear tires">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-motorcycle-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Motorcycle					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-minimalism/demo/minimalism/" data-cats="all furniture fashion" data-search="all furniture fashion Minimalism simple shoes minimalism decor slider clean design modern watches compact">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-minimalism-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Minimalism					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-grocery/demo/grocery/" data-cats="all food mega-store" data-search="all food mega-store Grocery produce food vegetables local meats cheese fruits supplies dairy fresh slider snacks grocery organic marketplace">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-grocery-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Grocery					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/home-cars/demo/cars/" data-cats="all service" data-search="all service Cars diagnostics repair inspection engines cars oil fluids tuning mechanics tires upgrades auto checkup workshop parts service fixes">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cars-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Cars					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-sweets-bakery/demo/sweets-bakery/" data-cats="all food service" data-search="all food service Bakery bread cookies donuts slider muffins croissants bakery pies sweets fresh oven macaroon waffles food">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/demo-bakery-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Bakery					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-drinks/demo/drinks/" data-cats="all food" data-search="all food Drinks beverages alcohol malts whiskey spirits gin slider vodka bourbon cocktails bottles liquor drinks rum">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-drinks-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Drinks					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-medical-marijuana/demo/medical-marijuana/" data-cats="all" data-search="all Marijuana pharmacy herbs cannabis canabis oil medication weed smoking extracts slider marijuana">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/medical-marijuana-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Marijuana					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-organic/demo/organic/" data-cats="all food" data-search="all food Organic grains healthy nutrition local grid eco fruits slider natural juice superfood green pure food produce">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-organic-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Organic					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-medical/demo/medical/" data-cats="all service" data-search="all service Medical therapy medical wellness pharmacy clinic diagnosis medication doctor treatment slider health">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-medical-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Medical					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-flowers/demo/flowers/" data-cats="all service" data-search="all service Flowers slider bouquet floral plants fresh blossoms flowers greenery wedding natural garden gifts">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-flowers-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Flowers					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-furniture/demo/furniture/" data-cats="all furniture" data-search="all furniture Furniture seating slider decor storage tables furniture chairs interiors shop home">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-furniture-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Furniture					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-cosmetics/demo/cosmetics/" data-cats="all fashion" data-search="all fashion Cosmetics face wellness herbal slider makeup eco natural creams health serums pure skincare lotions organic cosmetics beauty">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-cosmetics-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Cosmetics					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-alternative-energy/demo/alternative-energy/" data-cats="all electronics corporate" data-search="all electronics corporate Alternative Energy environment slider innovation energy solar electronics eco wind battery renewable efficiency solutions power green technology">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-alternative-energy-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Alternative Energy					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-toys/demo/toys/" data-cats="all" data-search="all Toys figures dolls children play games toys fun slider gifts kids">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-toys-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Toys					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-camping/demo/camping/" data-cats="all" data-search="all Camping sleepingbags slider adventure backpacks boxed camping outdoor travel equipment tourism gear tents hiking">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-camping-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Camping					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-travel/demo/travel/" data-cats="all service corporate" data-search="all service corporate Travel holidays adventure cruises rentals travel tourism tours trips bookings hotels services">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-travel-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Travel					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-jewellery/demo/jewellery/" data-cats="all fashion" data-search="all fashion Jewellery gold earrings jewellery collection fashion accessories slider rings necklaces diamonds silver luxury">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-jewellery-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Jewellery					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-christmas/demo/christmas/" data-cats="all" data-search="all Christmas wrapping surprise celebrations toys seasonal gifts santa christmas holidays wish">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/maintenance-xmas-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Christmas					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-food-delivery/demo/food-delivery/" data-cats="food service landing" data-search="food service landing Food Delivery eatery dishes food service catering restaurant local landing meals cuisine snacks">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/food-delivery-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Food Delivery					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-event-agency/demo/event-agency/" data-cats="service corporate landing" data-search="service corporate landing Event Agency picture slider service landing celebrations events photo wedding shoots agency studio creative">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/event-agency-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Event Agency					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-architecture-studio/demo/architecture-studio/" data-cats="corporate landing" data-search="corporate landing Architecture Studio planning design interiors buildings concepts slider landing agency studio creative">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/architecture-studio-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Architecture Studio					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-developer/demo/developer/" data-cats="corporate landing" data-search="corporate landing Developer technology portfolio coding innovation digitals programming development landing engineering profile personal">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2023/04/developer-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Developer					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-repair/demo/repair/" data-cats="all service corporate landing" data-search="all service corporate landing Repair renovation interiors restoration service landing project flooring revamp">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-repair-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Repair					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-lawyer/demo/lawyer/" data-cats="all service corporate landing" data-search="all service corporate landing Lawyer services portfolio attorney lawyer advocate jurist personal landing">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-lawyers-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Lawyer					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-corporate-2/demo/corporate-2/" data-cats="all corporate landing" data-search="all corporate landing Corporate 2 slider landing services corporate consulting business enterprise solutions company">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-2-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Corporate 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-smart-home/demo/smart-home/" data-cats="all electronics" data-search="all electronics Smart Home appliances innovation devices smart automation security technology">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-smart-home-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Smart Home					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-school/demo/school/" data-cats="all service landing" data-search="all service landing School kids knowledge lessons landing services courses children education learning students classes teachers">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demos-school-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						School					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-beauty/demo/beauty/" data-cats="all fashion service corporate landing" data-search="all fashion service corporate landing Beauty hair landing cosmetics beauty face services wellness makeup creams health skincare lotions pure">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-beauty-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Beauty					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-real-estate/demo/real-estate/" data-cats="all corporate landing" data-search="all corporate landing Real Estate realestate property homes rentals apartments relocation housing agents landing">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-real-estate-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Real Estate					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-landing-gadget/demo/landing-gadget/" data-cats="all electronics landing" data-search="all electronics landing Landing Gadget promotion devices brand tech smart landing gadget mobile phone">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-landing-gadget-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Landing Gadget					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-corporate/demo/corporate/" data-cats="all corporate landing" data-search="all corporate landing Corporate slider corporate consulting business solutions enterprise landing company services">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-corporate-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Corporate					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/magazine/" data-cats="all corporate" data-search="all corporate Magazine lifestyle magazine articles blog trends journal reviews posts">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-magazine-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Magazine					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-digitals/demo/digitals/" data-cats="all electronics" data-search="all electronics Digitals files subscriptions plugins digitals software slider courses online downloads assets design content portfolio">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-digitals-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Digitals					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-mobile-app/?opt=mobile_app" data-cats="all corporate landing" data-search="all corporate landing Mobile App design digitals application interface landing features technology mobile">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-mobile-app-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Mobile App					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/demo-dark/?opt=dark" data-cats="all furniture" data-search="all furniture Dark home slider seating lighting toys storage tables decor chairs furniture interiors shop">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/demo-dark-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Dark					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/home-rtl/?rtl" data-cats="all furniture" data-search="all furniture RTL rtl hebrew right-to-left righttoleft slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/demo-rtl-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						RTL					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-basic/?opt=layout_basic" data-cats="all furniture" data-search="all furniture Basic simple furniture slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/04/basic-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Basic					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-boxed/?opt=layout_boxed" data-cats="all furniture" data-search="all furniture Layout boxed boxed decor chairs furniture slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/layout-boxed-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Layout boxed					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-categories/?opt=layout_categories" data-cats="all furniture" data-search="all furniture Categories decor grid chairs furniture">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/categories-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Categories					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/landing/?opt=layout_landing" data-cats="all furniture landing" data-search="all furniture landing Landing furniture chairs brand landing">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/landing-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Landing					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-lookbook/?opt=layout_lookbook" data-cats="all furniture" data-search="all furniture Lookbook furniture decor grid slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/lookbook-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Lookbook					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-video/?opt=layout_video" data-cats="all furniture" data-search="all furniture Shaders slider chairs interiors slider furniture design">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2024/02/video-1-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Shaders slider					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-parallax/?opt=layout_parallax" data-cats="all furniture landing" data-search="all furniture landing Parallax interiors slider landing furniture decor design">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/parallax-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Parallax					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/infinite-scrolling/?opt=layout_infinite" data-cats="all furniture" data-search="all furniture Infinite scrolling furniture slider">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/infinite-scrolling-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Infinite scrolling					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-grid-2/?opt=layout_grid2" data-cats="all furniture" data-search="all furniture Grid furniture decor lighting trends onepage">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/grid-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Grid					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/layout-digital-portfolio/?opt=layout_digital_portfolio" data-cats="all electronics" data-search="all electronics Digital portfolio content files portfolio subscriptions digitals plugins design online art software courses downloads assets">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/digital-portfolio-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Digital portfolio					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/christmas-maintenance/?opt=maintenance_xmas" data-cats="all corporate" data-search="all corporate Maintenance Xmas christmas maintenance">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-xmass-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Maintenance Xmas					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/maintenance/?opt=maintenance" data-cats="all furniture" data-search="all furniture Maintenance maintenance furniture decor interiors">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Maintenance					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/maintenance-2/?opt=maintenance2" data-cats="all corporate" data-search="all corporate Maintenance 2 auto maintenance cars">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-2-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Maintenance 2					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
								<a class="wd-landing-item wd-col wd-active wd-anim" target="_blank" href="https://woodmart.xtemos.com/maintenance-3/?demo=fashion-colored&amp;opt=disable_popup" data-cats="all fashion" data-search="all fashion Maintenance 3 fashion maintenance style">
				<div class="wd-landing-item-thumb">
					<img loading="lazy" decoding="async" width="550" height="460" src="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3.jpg" class="attachment-full size-full" alt="" srcset="https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3.jpg 550w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-359x300.jpg 359w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-150x125.jpg 150w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-290x243.jpg 290w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-100x84.jpg 100w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-430x360.jpg 430w, https://woodmart.xtemos.com/wp-content/uploads/2021/12/maintenance-3-130x109.jpg 130w" sizes="auto, (max-width: 550px) 100vw, 550px">				</div>
				<div class="wd-landing-item-content">
					<span class="title">
						Maintenance 3					</span>
					<span class="wd-live-preview">
						<svg width="30" height="18" viewBox="0 0 33 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="xts-svg-line" stroke="#333" stroke-width="1" d="M1 9L31 9"></path>
							<path class="xts-svg-arrow" stroke="#333" stroke-width="1" d="M25 14.9995L31.0104 8.9891L25.0002 2.97887"></path>
						</svg>
						<span>Live preview</span>
					</span>
				</div>
							</a>
										</div>
					</div>
				</div>


<style>
.woodmart-container {
	max-width: 1920px;
	margin: 0 auto;
	padding: 55px 20px;
	display: grid;
	grid-template-columns: 340px 1fr;
	gap: 55px;
}

.wd-landing-side {
	position: sticky;
	top: 30px;
	align-self: start;
}

.wd-landing-search {
	position: relative;
	margin-bottom: 22px;
}

.wd-landing-search input {
	height: 54px;
	padding: 0 55px 0 22px;
	border: 1px solid #e5e5e5;
	border-radius: 28px;
	background: #fff;
	font-size: 16px;
	outline: none;
}

.wd-landing-search button {
	position: absolute;
	right: 6px;
	top: 6px;
	width: 42px;
	height: 42px;
	border: 0;
	border-radius: 50%;
	background: transparent;
	font-size: 0;
	cursor: pointer;
}

.wd-landing-search button:before {
	content: "⌕";
	font-size: 30px;
	color: #333;
	line-height: 1;
}

.wd-landing-cats {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
	flex-direction: column;
	gap: 7px;
}

.wd-landing-cats li a {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 14px 18px;
	border-radius: 26px;
	color: #777;
	text-decoration: none;
	font-size: 15px;
	font-weight: 700;
	transition: .2s ease;
}

.wd-landing-cats li.wd-active a {
	background: #e7f3cd;
	color: #252525;
}

.wd-landing-cat-count {
	min-width: 34px;
	height: 26px;
	padding: 0 9px;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	border-radius: 20px;
	background: #e3e3e3;
	color: #777;
	font-size: 14px;
	font-weight: 700;
}

.wd-landing-cats li.wd-active .wd-landing-cat-count {
	background: #8fbd25;
	color: #fff;
}

.wd-landing-grid {
	display: grid !important;
	grid-template-columns: repeat(3, minmax(0, 1fr));
	gap: 38px;
}

.wd-landing-item {
	position: relative;
	display: block;
	color: #202020;
	text-decoration: none;
	transition: .25s ease;
}

.wd-landing-item:hover {
	transform: translateY(-4px);
}

.wd-landing-item-thumb {
	overflow: hidden;
	border-radius: 6px;
	background: #fff;
	box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
}

.wd-landing-item-thumb img {
	width: 100%;
	height: auto;
	display: block;
}

.wd-landing-item-content {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 18px;
	padding-top: 18px;
}

.wd-landing-item-content .title {
	font-size: 15px;
	font-weight: 800;
	line-height: 1.2;
}

.wd-live-preview {
	display: flex;
	align-items: center;
	gap: 10px;
	color: #222;
	font-size: 12px;
	font-weight: 700;
	white-space: nowrap;
	opacity: 0;
	transform: translateX(-8px);
	transition: .2s ease;
}

.wd-landing-item:hover .wd-live-preview {
	opacity: 1;
	transform: translateX(0);
}

.wd-live-preview svg {
	width: 26px;
}

.wd-landing-demo-label {
	position: absolute;
	top: 12px;
	right: 12px;
	z-index: 2;
}

.wd-landing-demo-label span {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 32px;
	padding: 0 13px;
	border-radius: 18px;
	color: #fff;
	font-size: 15px;
	font-weight: 700;
	text-transform: none;
}

.wd-landing-demo-label.hot span {
	background: #ff3b30;
}

.wd-landing-demo-label.new span {
	background: #2f80ed;
}

.wd-hide,
.wd-landing-item.is-hidden {
	display: none !important;
}

.wd-landing-notices {
	padding: 30px;
	border-radius: 16px;
	background: #fff;
	font-size: 18px;
	font-weight: 700;
	text-align: center;
}

@media (max-width: 1200px) {
	.woodmart-container {
		grid-template-columns: 280px 1fr;
		gap: 35px;
	}

	.wd-landing-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

@media (max-width: 768px) {
	.woodmart-container {
		display: block;
		padding: 25px 15px;
	}

	.wd-landing-side {
		position: static;
		margin-bottom: 25px;
	}

	.wd-landing-cats {
		flex-direction: row;
		overflow-x: auto;
		padding-bottom: 8px;
	}

	.wd-landing-cats li {
		flex: 0 0 auto;
	}

	.wd-landing-grid {
		grid-template-columns: 1fr;
		gap: 26px;
	}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const translations = {
		'All': 'Все',
		'Electronics': 'Электроника',
		'Furniture': 'Мебель',
		'Fashion': 'Мода',
		'Food': 'Еда',
		'Mega Store': 'Мегамаркет',
		'Service': 'Услуги',
		'Corporate': 'Корпоративные',
		'Landing': 'Лендинги',
		'Search': 'Поиск',
		'Live preview': 'Смотреть демо',
		'hot': 'Хит',
		'new': 'New',

		'Default': 'Универсальный магазин',
		'Vegetables': 'Овощи и продукты',
		'Furniture 2': 'Мебель 2',
		'Fashion 2': 'Одежда и мода',
		'Electronics 3': 'Электроника 3',
		'Perfumes': 'Парфюмерия',
		'Marketplace 2': 'Маркетплейс 2',
		'Makeup': 'Косметика',
		'Mega Electronics': 'Мега электроника',
		'Megamarket': 'Мегамаркет',
		'Pets': 'Товары для животных',
		'Pottery': 'Керамика',
		'Merchandise': 'Мерч',
		'Handmade Bags': 'Сумки ручной работы',
		'T-shirts': 'Футболки',
		'Pills': 'Аптека',
		'Organic Farm': 'Фермерские продукты',
		'Accessories': 'Аксессуары',
		'Games': 'Игры',
		'Games Dark': 'Игры Dark',
		'Plants': 'Растения',
		'Kids': 'Детские товары',
		'Christmas 2': 'Новогодний магазин',
		'Barbershop': 'Барбершоп',
		'Hemp Shoes': 'Обувь',
		'Retail': 'Ритейл',
		'Decor': 'Декор',
		'Black Friday': 'Черная пятница'
	};

	document.querySelectorAll('.nav-link-text, .wd-live-preview span, .wd-landing-demo-label span, .wd-landing-item-content .title, .searchsubmit span').forEach(el => {
		const text = el.textContent.trim();
		if (translations[text]) {
			el.textContent = translations[text];
		}
	});

	const searchInput = document.querySelector('input[name="wd-landing-search"]');
	const form = document.querySelector('.wd-landing-search');
	const tabs = document.querySelectorAll('.wd-landing-cats li');
	const items = document.querySelectorAll('.wd-landing-item');
	const notice = document.querySelector('.wd-landing-notices');

	if (searchInput) {
		searchInput.placeholder = 'Поиск шаблонов, например: электроника';
	}

	let activeCategory = 'all';
	let searchValue = '';

	function normalize(value) {
		return String(value || '').toLowerCase().trim();
	}

	function filterItems() {
		let visibleCount = 0;

		items.forEach(item => {
			const cats = normalize(item.dataset.cats).split(/\s+/);
			const search = normalize(item.dataset.search + ' ' + item.textContent);

			const categoryMatch = activeCategory === 'all' || cats.includes(activeCategory);
			const searchMatch = !searchValue || search.includes(searchValue);

			if (categoryMatch && searchMatch) {
				item.classList.remove('is-hidden');
				visibleCount++;
			} else {
				item.classList.add('is-hidden');
			}
		});

		if (notice) {
			notice.classList.toggle('wd-hide', visibleCount > 0);
		}
	}

	tabs.forEach(tab => {
		tab.addEventListener('click', function (e) {
			e.preventDefault();

			tabs.forEach(item => item.classList.remove('wd-active'));
			this.classList.add('wd-active');

			activeCategory = this.dataset.slug || 'all';
			filterItems();
		});
	});

	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
		});
	}

	if (searchInput) {
		searchInput.addEventListener('input', function () {
			searchValue = normalize(this.value);
			filterItems();
		});
	}

	filterItems();
});
</script>
			
			
			
			
			
			
			
			
			
		</div>
	</section>

	<section class="wm-section">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">Что входит</div>
				<h2>Что я делаю в рамках разработки магазина на Woodmart</h2>
			</div>

			<div class="wm-grid-2">
				<div class="wm-card">
					<h3>Настройка сайта</h3>
					<ul class="wm-list">
						<li>Установка WordPress, WooCommerce и Woodmart</li>
						<li>Настройка дочерней темы</li>
						<li>Импорт выбранного демо-шаблона</li>
						<li>Настройка основных страниц сайта</li>
						<li>Адаптация цветов, шрифтов, меню и визуального стиля</li>
					</ul>
				</div>

				<div class="wm-card">
					<h3>Каталог и товары</h3>
					<ul class="wm-list">
						<li>Создание категорий и подкатегорий</li>
						<li>Настройка карточки товара</li>
						<li>Настройка атрибутов и вариаций</li>
						<li>Базовая настройка фильтров и сортировки</li>
						<li>Добавление тестовых товаров для проверки структуры</li>
					</ul>
				</div>

				<div class="wm-card">
					<h3>Покупка и оформление заказа</h3>
					<ul class="wm-list">
						<li>Настройка корзины и checkout</li>
						<li>Настройка способов оплаты</li>
						<li>Настройка доставки или самовывоза</li>
						<li>Проверка писем WooCommerce</li>
						<li>Тестирование оформления заказа</li>
					</ul>
				</div>

				<div class="wm-card">
					<h3>Техническая подготовка</h3>
					<ul class="wm-list">
						<li>Базовая SEO-структура страниц</li>
						<li>Настройка ЧПУ, хлебных крошек и базовой навигации</li>
						<li>Проверка мобильной версии</li>
						<li>Удаление лишних демо-блоков</li>
						<li>Подготовка сайта к наполнению и запуску</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="wm-section">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">Этапы</div>
				<h2>Как проходит работа</h2>
				<p>
					Сначала выбираем направление и подходящий шаблон, затем адаптирую его под ваш бизнес,
					настраиваю WooCommerce и проверяю весь путь клиента от каталога до оформления заказа.
				</p>
			</div>

			<div class="wm-steps">
				<div class="wm-step">
					<div class="wm-step__num">01</div>
					<h3>Разбор задачи</h3>
					<p>Обсуждаем нишу, товары, структуру каталога, нужные страницы, оплату, доставку и примеры дизайна.</p>
				</div>

				<div class="wm-step">
					<div class="wm-step__num">02</div>
					<h3>Выбор шаблона</h3>
					<p>Подбираем подходящий демо-вариант Woodmart и определяем, какие блоки нужно оставить или изменить.</p>
				</div>

				<div class="wm-step">
					<div class="wm-step__num">03</div>
					<h3>Сборка магазина</h3>
					<p>Настраиваю тему, страницы, каталог, карточку товара, корзину, checkout и основные элементы магазина.</p>
				</div>

				<div class="wm-step">
					<div class="wm-step__num">04</div>
					<h3>Проверка и запуск</h3>
					<p>Проверяю адаптивность, оформление заказа, формы, письма, базовую SEO-структуру и готовность к запуску.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="wm-section">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">Стоимость</div>
				<h2>Примерные варианты стоимости</h2>
				<p>
					Точная цена зависит от объема работ. Ниже можно использовать ориентиры,
					чтобы клиенту было проще понять порядок бюджета.
				</p>
			</div>

			<div class="wm-grid-3">
				<div class="wm-price">
					<h3 class="wm-price__name">Базовый запуск</h3>
					<p class="wm-price__value">от 45 000 ₽</p>
					<p class="wm-price__text">
						Подходит, если нужно быстро запустить аккуратный магазин на готовом демо Woodmart.
					</p>
					<ul class="wm-list">
						<li>Установка и настройка темы</li>
						<li>Импорт демо-шаблона</li>
						<li>Базовые страницы</li>
						<li>Каталог и карточка товара</li>
						<li>Базовая настройка WooCommerce</li>
					</ul>
				</div>

				<div class="wm-price">
					<h3 class="wm-price__name">Оптимальный магазин</h3>
					<p class="wm-price__value">от 70 000 ₽</p>
					<p class="wm-price__text">
						Подходит для нормального запуска с адаптацией структуры, контента, каталога и сценария покупки.
					</p>
					<ul class="wm-list">
						<li>Адаптация главной страницы</li>
						<li>Настройка каталога и фильтров</li>
						<li>Настройка checkout</li>
						<li>Оплата и доставка</li>
						<li>Проверка мобильной версии</li>
					</ul>
				</div>

				<div class="wm-price">
					<h3 class="wm-price__name">С доработками</h3>
					<p class="wm-price__value">от 100 000 ₽</p>
					<p class="wm-price__text">
						Подходит, если нужен магазин на Woodmart, но с дополнительной логикой, полями или кастомными функциями.
					</p>
					<ul class="wm-list">
						<li>Кастомные блоки и поля</li>
						<li>Нестандартная карточка товара</li>
						<li>Дополнительная логика WooCommerce</li>
						<li>Интеграции с сервисами</li>
						<li>Разработка функций под задачу</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="wm-section" id="woodmart-faq">
		<div class="wm-container">
			<div class="wm-head">
				<div class="wm-eyebrow">FAQ</div>
				<h2>Частые вопросы</h2>
			</div>

			<div class="wm-faq">
				<div class="wm-faq__item">
					<h3>Woodmart — это шаблонный сайт?</h3>
					<p>
						База действительно берется из готовой темы, но итоговый сайт можно сильно адаптировать:
						изменить структуру, блоки, цвета, карточку товара, каталог, checkout и отдельные функции.
					</p>
				</div>

				<div class="wm-faq__item">
					<h3>Чем это отличается от индивидуальной разработки?</h3>
					<p>
						Магазин на Woodmart обычно быстрее и дешевле, потому что не нужно разрабатывать весь дизайн и интерфейс с нуля.
						Индивидуальная разработка нужна, когда требуется полностью уникальная структура и нестандартная логика.
					</p>
				</div>

				<div class="wm-faq__item">
					<h3>Можно ли потом дорабатывать магазин?</h3>
					<p>
						Да. Можно добавлять новые блоки, менять карточку товара, подключать оплату, доставку, CRM,
						создавать кастомные плагины и расширять WooCommerce под конкретные задачи.
					</p>
				</div>

				<div class="wm-faq__item">
					<h3>Что нужно от клиента для старта?</h3>
					<p>
						Нужно понять нишу, примерный каталог, желаемый стиль, способы оплаты и доставки,
						а также выбрать понравившиеся примеры Woodmart или похожие сайты.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="wm-section">
		<div class="wm-container">
			<div class="wm-cta">
				<h2>Хотите запустить интернет-магазин на Woodmart без лишней сложности?</h2>
				<p>
					Напишите, какая у вас ниша, сколько примерно товаров, нужна ли оплата, доставка,
					фильтры и дополнительные функции. Я предложу подходящий вариант реализации и примерную стоимость.
				</p>

				<div class="wm-actions">
					<a class="wm-btn wm-btn--primary" href="/contacts/">Рассчитать стоимость</a>
					<a class="wm-btn wm-btn--secondary" href="/services/">Все услуги</a>
				</div>
			</div>

			<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

			<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по интернет-магазинам" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>