<?php
/*
Template Name: Услуга — Перенос интернет-магазина с Magento на WooCommerce
Template Post Type: service
*/
defined('ABSPATH') || exit;

get_header();
?>

<style>
	:root {
		--srv-bg: #f6faf7;
		--srv-surface: rgba(255, 255, 255, 0.94);
		--srv-heading: var(--gl-color-heading, #1A1A1A);
		--srv-text: var(--gl-color-text, #2B2B2B);
		--srv-subtitle: var(--gl-color-subtitle, #6B7280);
		--srv-helper: var(--gl-color-helper, #9CA3AF);
		--srv-line: #e4ece6;
		--srv-accent: var(--gl-color-accent, #2cbc63);
		--srv-accent-2: var(--gl-color-accent-2, #1ea751);
		--srv-radius-xl: 30px;
		--srv-radius-lg: 24px;
		--srv-radius-md: 18px;
		--srv-shadow: 0 18px 50px rgba(16, 24, 40, 0.06);
		--srv-shadow-soft: 0 10px 30px rgba(16, 24, 40, 0.05);
		--srv-container: 1280px;
	}

	.gl-service-page {
		padding: 0 0 88px;
		background:
			radial-gradient(circle at top left, rgba(44, 188, 99, 0.08), transparent 26%),
			linear-gradient(180deg, #f8fbf9 0%, #f4f7f5 100%);
		color: var(--srv-text);
	}

	.gl-service-container {
		max-width: var(--srv-container);
		margin: 0 auto;
		padding: 0 20px;
	}

	.gl-service-hero {
		padding: 56px 0 28px;
	}

	.gl-service-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
		gap: 24px;
		align-items: stretch;
	}

	.gl-service-hero__main,
	.gl-service-hero__side {
		background: var(--srv-surface);
		border: 1px solid var(--srv-line);
		border-radius: var(--srv-radius-xl);
		box-shadow: var(--srv-shadow);
	}

	.gl-service-hero__main {
		padding: 38px;
	}

	.gl-service-hero__side {
		padding: 28px;
		display: flex;
		flex-direction: column;
		gap: 18px;
	}

	.gl-service-pill {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-height: 34px;
		padding: 0 14px;
		border-radius: 999px;
		background: rgba(44, 188, 99, 0.10);
		color: var(--srv-accent-2);
		font-size: 13px;
		font-weight: 700;
		letter-spacing: 0.04em;
		text-transform: uppercase;
		margin-bottom: 16px;
	}

	.gl-service-title {
		margin: 0 0 16px;
		font-size: clamp(34px, 5vw, 58px);
		line-height: 1.02;
		letter-spacing: -0.03em;
		color: var(--srv-heading);
	}

	.gl-service-subtitle {
		margin: 0 0 22px;
		max-width: 760px;
		font-size: 18px;
		line-height: 1.75;
		color: var(--srv-subtitle);
	}

	.gl-service-points {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 12px;
		margin: 0 0 26px;
		padding: 0;
		list-style: none;
	}

	.gl-service-points li {
		display: flex;
		align-items: flex-start;
		gap: 10px;
		padding: 14px 16px;
		background: #fff;
		border: 1px solid #e9efeb;
		border-radius: 16px;
		box-shadow: var(--srv-shadow-soft);
		font-size: 15px;
		line-height: 1.55;
	}

	.gl-service-points li::before {
		content: "";
		flex: 0 0 10px;
		width: 10px;
		height: 10px;
		margin-top: 7px;
		border-radius: 50%;
		background: var(--srv-accent);
	}

	.gl-service-actions {
		display: flex;
		flex-wrap: wrap;
		gap: 14px;
	}

	.gl-service-btn {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-height: 48px;
		padding: 0 20px;
		border-radius: 12px;
		font-size: 15px;
		font-weight: 600;
		line-height: 1;
		text-decoration: none;
		transition: .2s ease;
	}

	.gl-service-btn--primary {
		background: var(--srv-accent);
		color: #fff;
		box-shadow: 0 14px 30px rgba(44, 188, 99, 0.20);
	}

	.gl-service-btn--primary:hover {
		background: var(--srv-accent-2);
		color: #fff;
		transform: translateY(-1px);
	}

	.gl-service-btn--secondary {
		background: transparent;
		border: 1px solid var(--srv-accent);
		color: var(--srv-accent);
	}

	.gl-service-btn--secondary:hover {
		background: var(--srv-accent);
		color: #fff;
		transform: translateY(-1px);
	}

	.gl-service-side__label {
		margin: 0;
		font-size: 13px;
		font-weight: 700;
		letter-spacing: 0.04em;
		text-transform: uppercase;
		color: var(--srv-helper);
	}

	.gl-service-side__price {
		margin: 0;
		font-size: 34px;
		line-height: 1.05;
		font-weight: 800;
		color: var(--srv-heading);
	}

	.gl-service-side__text {
		margin: 0;
		font-size: 15px;
		line-height: 1.7;
		color: var(--srv-subtitle);
	}

	.gl-service-side__list {
		margin: 0;
		padding: 0;
		list-style: none;
		display: grid;
		gap: 10px;
	}

	.gl-service-side__list li {
		padding: 13px 14px;
		background: #f8fbf9;
		border: 1px solid #e8efea;
		border-radius: 14px;
		font-size: 14px;
		line-height: 1.55;
	}

	.gl-service-section {
		padding: 26px 0;
	}

	.gl-service-head {
		max-width: 820px;
		margin: 0 0 24px;
	}

	.gl-service-head__eyebrow {
		display: inline-flex;
		align-items: center;
		min-height: 32px;
		padding: 0 12px;
		margin-bottom: 14px;
		border-radius: 999px;
		background: rgba(44, 188, 99, 0.10);
		color: var(--srv-accent-2);
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.04em;
		text-transform: uppercase;
	}

	.gl-service-head h2 {
		margin: 0 0 12px;
		font-size: clamp(28px, 4vw, 42px);
		line-height: 1.1;
		letter-spacing: -0.02em;
		color: var(--srv-heading);
	}

	.gl-service-head p {
		margin: 0;
		font-size: 17px;
		line-height: 1.75;
		color: var(--srv-subtitle);
	}

	.gl-service-grid-3 {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 22px;
	}

	.gl-service-grid-2 {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 22px;
	}

	.gl-service-card {
		padding: 28px;
		background: var(--srv-surface);
		border: 1px solid var(--srv-line);
		border-radius: var(--srv-radius-lg);
		box-shadow: var(--srv-shadow-soft);
	}

	.gl-service-card h3 {
		margin: 0 0 12px;
		font-size: 22px;
		line-height: 1.2;
		color: var(--srv-heading);
	}

	.gl-service-card p {
		margin: 0;
		font-size: 15px;
		line-height: 1.75;
		color: var(--srv-subtitle);
	}

	.gl-service-list {
		margin: 0;
		padding: 0;
		list-style: none;
		display: grid;
		gap: 12px;
	}

	.gl-service-list li {
		position: relative;
		padding-left: 22px;
		font-size: 15px;
		line-height: 1.75;
		color: var(--srv-text);
	}

	.gl-service-list li::before {
		content: "";
		position: absolute;
		top: 11px;
		left: 0;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: var(--srv-accent);
	}

	.gl-service-steps {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 18px;
	}

	.gl-service-step {
		padding: 24px;
		background: #fff;
		border: 1px solid #e7eee9;
		border-radius: 22px;
		box-shadow: var(--srv-shadow-soft);
	}

	.gl-service-step__num {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 42px;
		height: 42px;
		margin-bottom: 16px;
		border-radius: 12px;
		background: #ecfdf3;
		color: var(--srv-accent-2);
		font-size: 16px;
		font-weight: 800;
	}

	.gl-service-step h3 {
		margin: 0 0 10px;
		font-size: 18px;
		line-height: 1.25;
		color: var(--srv-heading);
	}

	.gl-service-step p {
		margin: 0;
		font-size: 15px;
		line-height: 1.7;
		color: var(--srv-subtitle);
	}

	.gl-service-faq {
		display: grid;
		gap: 16px;
	}

	.gl-service-faq__item {
		padding: 24px 26px;
		background: var(--srv-surface);
		border: 1px solid var(--srv-line);
		border-radius: 22px;
		box-shadow: var(--srv-shadow-soft);
	}

	.gl-service-faq__item h3 {
		margin: 0 0 10px;
		font-size: 19px;
		line-height: 1.3;
		color: var(--srv-heading);
	}

	.gl-service-faq__item p {
		margin: 0;
		font-size: 15px;
		line-height: 1.75;
		color: var(--srv-subtitle);
	}

	.gl-service-cta {
		padding: 34px 0 0;
	}

	.gl-service-cta__box {
		padding: 36px;
		background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
		border-radius: 30px;
		box-shadow: 0 24px 60px rgba(17, 24, 39, 0.16);
	}

	.gl-service-cta__box h2 {
		margin: 0 0 12px;
		font-size: clamp(28px, 4vw, 40px);
		line-height: 1.1;
		color: #fff;
		letter-spacing: -0.02em;
	}

	.gl-service-cta__box p {
		margin: 0 0 22px;
		max-width: 780px;
		font-size: 17px;
		line-height: 1.75;
		color: rgba(255,255,255,0.78);
	}

	@media (max-width: 1100px) {
		.gl-service-hero__grid,
		.gl-service-grid-3,
		.gl-service-steps {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	@media (max-width: 767px) {
		.gl-service-page {
			padding-bottom: 64px;
		}

		.gl-service-hero {
			padding-top: 38px;
		}

		.gl-service-hero__grid,
		.gl-service-grid-3,
		.gl-service-grid-2,
		.gl-service-steps,
		.gl-service-points {
			grid-template-columns: 1fr;
		}

		.gl-service-hero__main,
		.gl-service-hero__side,
		.gl-service-card,
		.gl-service-faq__item,
		.gl-service-cta__box {
			padding: 24px;
		}

		.gl-service-actions {
			flex-direction: column;
		}

		.gl-service-btn {
			width: 100%;
		}
	}
</style>

<main class="gl-service-page">
	<section class="gl-service-hero">
		<div class="gl-service-container">
			<div class="gl-service-hero__grid">
				<div class="gl-service-hero__main">
					<div class="gl-service-pill">Миграция Magento → WooCommerce</div>
					<h1 class="gl-service-title"><?php the_title(); ?></h1>

					<p class="gl-service-subtitle">
						Перенос интернет-магазина с Magento на WooCommerce с сохранением структуры,
						товаров, категорий, изображений, производителей, характеристик и ключевой логики магазина.
						Помогаю перейти на более гибкую платформу, которую проще развивать, дорабатывать,
						интегрировать с сервисами и адаптировать под задачи бизнеса.
					</p>

					<ul class="gl-service-points">
						<li>Перенос товаров, категорий, изображений и характеристик</li>
						<li>Перенос производителей, атрибутов, описаний и цен</li>
						<li>Настройка WooCommerce, карточек товаров, корзины и checkout</li>
						<li>Подготовка магазина к SEO, интеграциям и дальнейшему развитию</li>
					</ul>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить перенос</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="#service-faq">Частые вопросы</a>
					</div>
				</div>

				<div class="gl-service-hero__side">
					<p class="gl-service-side__label">Стоимость</p>
					<p class="gl-service-side__price">от 70 000 ₽</p>
					<p class="gl-service-side__text">
						Итоговая цена зависит от объема каталога, количества товаров, структуры категорий,
						используемых модулей Magento, фильтров, способов оплаты, доставки и нужных доработок.
					</p>

					<ul class="gl-service-side__list">
						<li>Перенос с Magento на WooCommerce</li>
						<li>Сохранение товаров, категорий, изображений и характеристик</li>
						<li>Настройка удобной админки для управления магазином</li>
						<li>Возможность обновить дизайн и улучшить путь покупателя</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит</div>
				<h2>Перенос магазина с Magento на WooCommerce без потери каталога и структуры</h2>
				<p>
					Перенос с Magento — это не просто выгрузка товаров. Важно правильно перенести каталог,
					категории, изображения, атрибуты, характеристики, URL-структуру, формы заказа и базовую логику,
					чтобы новый магазин на WooCommerce был удобен для покупателей и прост в управлении для администратора.
				</p>
			</div>

			<div class="gl-service-grid-3">
				<div class="gl-service-card">
					<h3>Аудит Magento</h3>
					<p>
						Проверяю текущий магазин на Magento: структуру каталога, товары, категории, производителей,
						фильтры, модули, способы оплаты, доставки и важные страницы.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Перенос каталога</h3>
					<p>
						Переношу товары, категории, изображения, описания, цены, атрибуты, характеристики,
						производителей и другую важную информацию в WooCommerce.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Новая база на WordPress</h3>
					<p>
						Настраиваю WooCommerce, карточки товаров, каталог, корзину, оформление заказа,
						личный кабинет, базовые страницы и административную часть магазина.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Для кого подходит</div>
				<h2>Когда стоит переносить магазин с Magento на WooCommerce</h2>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Текущий магазин на Magento сложно дорабатывать и развивать</li>
						<li>Не хватает гибкости в дизайне, карточках товаров и структуре страниц</li>
						<li>Нужно перейти на WooCommerce и получить более удобную систему управления</li>
						<li>Магазин выглядит устаревшим или требует полной технической пересборки</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужна удобная админка для товаров, категорий, заказов и контента</li>
						<li>Планируются новые фильтры, оплата, доставка, CRM, API или интеграции</li>
						<li>Нужно сохранить каталог, но обновить техническую основу магазина</li>
						<li>Важно получить магазин, который проще продвигать, масштабировать и дорабатывать</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Этапы работы</div>
				<h2>Как проходит перенос магазина с Magento на WooCommerce</h2>
				<p>
					Сначала разбираю текущий магазин и структуру данных, затем подготавливаю новую базу на WordPress,
					переношу каталог, настраиваю WooCommerce и проверяю работу магазина перед запуском.
				</p>
			</div>

			<div class="gl-service-steps">
				<div class="gl-service-step">
					<div class="gl-service-step__num">01</div>
					<h3>Аудит Magento</h3>
					<p>Проверяю каталог, товары, категории, производителей, модули, ссылки, фильтры и важный функционал.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">02</div>
					<h3>Подготовка WordPress</h3>
					<p>Разворачиваю WordPress, WooCommerce, структуру каталога, шаблоны страниц и базовые настройки.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">03</div>
					<h3>Перенос данных</h3>
					<p>Переношу товары, категории, изображения, описания, цены, атрибуты, характеристики и основной контент.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">04</div>
					<h3>Проверка и запуск</h3>
					<p>Тестирую каталог, карточки, корзину, checkout, адаптивность, формы, заказы и базовую логику покупки.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Стоимость</div>
				<h2>Что входит в перенос интернет-магазина</h2>
				<p>
					Базовый перенос включает подготовку WordPress, настройку WooCommerce,
					перенос основной структуры магазина, каталога и проверку работоспособности после миграции.
				</p>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<h3>Перенос структуры</h3>
					<ul class="gl-service-list">
						<li>Анализ старого магазина на Magento</li>
						<li>Создание структуры на WordPress</li>
						<li>Перенос основных страниц</li>
						<li>Перенос категорий и подкатегорий</li>
						<li>Настройка меню, навигации и базовых разделов</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Каталог и товары</h3>
					<ul class="gl-service-list">
						<li>Перенос товаров в WooCommerce</li>
						<li>Перенос изображений товаров</li>
						<li>Перенос описаний, цен и артикулов</li>
						<li>Настройка атрибутов и характеристик</li>
						<li>Базовая настройка фильтров, сортировки и категорий</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Покупка и оформление</h3>
					<ul class="gl-service-list">
						<li>Настройка корзины</li>
						<li>Настройка оформления заказа</li>
						<li>Настройка писем о заказе</li>
						<li>Подключение оплаты по необходимости</li>
						<li>Настройка доставки по необходимости</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Техническая часть</h3>
					<ul class="gl-service-list">
						<li>Базовая SEO-структура</li>
						<li>Настройка редиректов по необходимости</li>
						<li>Проверка адаптивности</li>
						<li>Проверка карточек, корзины и оформления заказа</li>
						<li>Подготовка сайта к дальнейшим доработкам</li>
					</ul>
				</div>
			</div>

			<div class="gl-service-includes-note">
				<p>
					Если на старом сайте много товаров, сложные фильтры, нестандартные модули Magento,
					мультиязычность, личные кабинеты, интеграции или требуется сохранение URL-структуры —
					это оценивается отдельно после анализа магазина.
				</p>
			</div>
		</div>
	</section>

	<section class="gl-service-section" id="service-faq">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">FAQ</div>
				<h2>Частые вопросы по переносу с Magento на WooCommerce</h2>
			</div>

			<div class="gl-service-faq">
				<div class="gl-service-faq__item">
					<h3>Можно ли перенести товары из Magento в WooCommerce?</h3>
					<p>
						Да. Можно перенести товары, категории, изображения, описания, цены,
						артикулы, характеристики, атрибуты, производителей и другие данные,
						если они доступны в базе, выгрузке или админке магазина.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Сохранится ли дизайн старого магазина?</h3>
					<p>
						Можно воссоздать текущий дизайн на WordPress или сделать новый, более современный вариант.
						Часто перенос с Magento на WooCommerce используют как возможность обновить интерфейс,
						улучшить карточку товара, каталог и оформление заказа.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли сохранить старые ссылки?</h3>
					<p>
						Да, по возможности можно сохранить важные URL или настроить 301-редиректы,
						чтобы снизить риски потери SEO-позиций после переезда.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Сколько стоит перенос магазина с Magento?</h3>
					<p>
						Стоимость зависит от количества товаров, структуры каталога, состояния старого магазина,
						используемых модулей, объема контента и дополнительных функций.
						После анализа можно дать точную оценку.
					</p>
				</div>
			</div>

			<div class="gl-service-cta">
				<div class="gl-service-cta__box">
					<h2>Хотите перенести магазин с Magento на WooCommerce без потери каталога и структуры?</h2>
					<p>
						Пришлите ссылку на текущий магазин, примерный объем товаров и список важных функций.
						Я посмотрю проект и предложу понятный вариант переноса на WordPress и WooCommerce.
					</p>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Рассчитать перенос</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="/services/">Все услуги</a>
					</div>
				</div>

				<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

				<?php echo do_shortcode('[gl_related_services_slider]'); ?>

				<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по интернет-магазинам" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>