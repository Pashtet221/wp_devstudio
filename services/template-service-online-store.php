<?php
/*
Template Name: Услуга — Разработка интернет-магазина
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
					<div class="gl-service-pill">Интернет-магазины WooCommerce</div>
					<h1 class="gl-service-title"><?php the_title(); ?></h1>
					<p class="gl-service-subtitle">
						Разработка интернет-магазина на WordPress и WooCommerce с удобным каталогом, понятной карточкой товара,
						оформлением заказа и продуманной структурой под продажи. Делаю не просто сайт, а магазин,
						который удобно развивать и дорабатывать под ваш бизнес.
					</p>

					<ul class="gl-service-points">
						<li>Разработка магазина с нуля под ваш каталог и сценарий продаж</li>
						<li>Удобная карточка товара, корзина и checkout без перегруза</li>
						<li>Категории, фильтры, поиск, личный кабинет и базовая SEO-структура</li>
						<li>Готовность к дальнейшим доработкам, интеграциям и росту проекта</li>
					</ul>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить интернет-магазин</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="#service-faq">Частые вопросы</a>
					</div>
				</div>

				<div class="gl-service-hero__side">
					<p class="gl-service-side__label">Стоимость</p>
					<p class="gl-service-side__price">от 120 000 ₽</p>
					<p class="gl-service-side__text">
						Итоговая стоимость зависит от объема каталога, сложности дизайна, количества страниц,
						функционала WooCommerce и необходимых интеграций.
					</p>

					<ul class="gl-service-side__list">
						<li>Индивидуальная структура магазина под ваш проект</li>
						<li>WordPress + WooCommerce + кастомная тема без перегруженных решений</li>
						<li>Возможность расширять магазин без пересборки с нуля</li>
						<li>Подходит для товаров, услуг, сложных карточек и нестандартной логики</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит</div>
				<h2>Разработка интернет-магазина под продажи, а не просто под красивую витрину</h2>
				<p>
					Продумываю структуру магазина так, чтобы покупателю было легко найти товар, понять его преимущества,
					оформить заказ и вернуться снова. Магазин строится на WordPress и WooCommerce с учетом реальных задач бизнеса,
					а не только базовой установки шаблона.
				</p>
			</div>

			<div class="gl-service-grid-3">
				<div class="gl-service-card">
					<h3>Каталог и структура</h3>
					<p>
						Создание категорий, подкатегорий, фильтров, страниц каталога, навигации и логики,
						чтобы магазин был понятным для клиента и удобным для администрирования.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Карточка товара и покупка</h3>
					<p>
						Проработка карточки товара, фото, описаний, характеристик, вариаций, связанных товаров,
						корзины и оформления заказа с учетом реального пути клиента к покупке.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Функции и интеграции</h3>
					<p>
						Подключение оплаты, доставки, дополнительных полей, уведомлений, форм, CRM, API,
						а также разработка нестандартного функционала под ваш магазин.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Для кого подходит</div>
				<h2>Когда стоит заказывать разработку интернет-магазина</h2>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужен магазин с нуля под товары, категории и понятную структуру</li>
						<li>Шаблонные решения не подходят под ваш товар или сценарий продаж</li>
						<li>Нужен WooCommerce с кастомной логикой и удобным интерфейсом</li>
						<li>Важно сразу заложить основу под SEO, рекламу и развитие проекта</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужен магазин, который можно дальше масштабировать</li>
						<li>Планируются интеграции с оплатой, доставкой, CRM или внешними сервисами</li>
						<li>Нужен аккуратный магазин без перегруза лишними функциями</li>
						<li>Важно, чтобы магазин выглядел профессионально и помогал продавать</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Этапы работы</div>
				<h2>Как проходит разработка интернет-магазина</h2>
				<p>
					Сначала определяем задачи, каталог, структуру и сценарии покупки. После этого проектируем страницы,
					собираем магазин на WordPress и WooCommerce, подключаем нужные функции и тестируем итоговую логику.
				</p>
			</div>

			<div class="gl-service-steps">
				<div class="gl-service-step">
					<div class="gl-service-step__num">01</div>
					<h3>Разбор задачи</h3>
					<p>Понимаю, какие товары продаются, как устроен каталог, что важно для клиента и какие функции нужны магазину.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">02</div>
					<h3>Структура и логика</h3>
					<p>Продумываю каталог, карточку товара, фильтры, корзину, checkout и ключевые экраны магазина.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">03</div>
					<h3>Разработка</h3>
					<p>Собираю магазин на WordPress и WooCommerce, настраиваю шаблоны, функции, страницы и интеграции.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">04</div>
					<h3>Проверка и запуск</h3>
					<p>Тестирую оформление заказа, карточки, формы, адаптивность и общую логику перед запуском проекта.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section" id="service-faq">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">FAQ</div>
				<h2>Частые вопросы по разработке интернет-магазина</h2>
			</div>

			<div class="gl-service-faq">
				<div class="gl-service-faq__item">
					<h3>На чем вы разрабатываете интернет-магазины?</h3>
					<p>
						Основной стек — WordPress и WooCommerce. Это гибкая база для интернет-магазина, которую можно дорабатывать,
						расширять и адаптировать под конкретные задачи бизнеса.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли сделать не шаблонный, а более индивидуальный магазин?</h3>
					<p>
						Да. Магазин можно собрать на кастомной теме или глубоко переработать под нужную структуру, карточки товара,
						страницы каталога, фильтры и оформление заказа.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Сколько стоит разработка интернет-магазина?</h3>
					<p>
						Цена зависит от объема страниц, каталога, дизайна, WooCommerce-функционала и интеграций.
						Для более точной оценки нужно понять состав проекта и задачи магазина.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли потом дорабатывать магазин?</h3>
					<p>
						Да, это одна из причин, почему WordPress и WooCommerce удобны для бизнеса. Можно добавлять новые функции,
						изменять карточки товаров, улучшать checkout, подключать сервисы и развивать магазин поэтапно.
					</p>
				</div>
			</div>

			<div class="gl-service-cta">
				<div class="gl-service-cta__box">
					<h2>Нужен интернет-магазин, который будет не просто выглядеть, а реально продавать?</h2>
					<p>
						Опишите задачу, нишу, каталог и то, какой магазин вам нужен. Я предложу структуру, подход по разработке
						и скажу, как лучше реализовать проект на WordPress и WooCommerce под ваш бизнес.
					</p>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить проект</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="/services/">Все услуги</a>
					</div>
				</div>
				
				
				
				
				
				
				<section class="gl-service-section">
	<div class="gl-service-container">
		<div class="gl-service-head">
			<div class="gl-service-head__eyebrow">Стоимость</div>
			<h2>Что входит в разработку интернет-магазина</h2>
			<p>
				Базовая стоимость включает полный набор работ для запуска интернет-магазина:
				структура, WooCommerce, страницы, каталог и базовый функционал. Ниже — что именно вы получаете.
			</p>
		</div>

		<div class="gl-service-grid-2">
			<div class="gl-service-card">
				<h3>Основа интернет-магазина</h3>
				<ul class="gl-service-list">
					<li>Установка и настройка WordPress и WooCommerce</li>
					<li>Создание структуры сайта и каталога</li>
					<li>Главная страница, каталог, карточка товара</li>
					<li>Корзина и оформление заказа (checkout)</li>
					<li>Базовая адаптивность под мобильные устройства</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Каталог и товары</h3>
				<ul class="gl-service-list">
					<li>Создание категорий и подкатегорий</li>
					<li>Настройка карточки товара</li>
					<li>Добавление тестовых товаров</li>
					<li>Работа с вариациями (размеры, цвета и т.д.)</li>
					<li>Базовая настройка фильтров и сортировки</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Покупка и логика заказа</h3>
				<ul class="gl-service-list">
					<li>Настройка корзины и оформления заказа</li>
					<li>Подключение онлайн-оплаты (по необходимости)</li>
					<li>Настройка доставки (СДЭК, самовывоз и т.д.)</li>
					<li>Письма уведомлений о заказе</li>
					<li>Личный кабинет пользователя</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Техническая часть</h3>
				<ul class="gl-service-list">
					<li>Базовая SEO-структура страниц</li>
					<li>Чистая верстка без перегруженных шаблонов</li>
					<li>Подготовка к дальнейшим доработкам</li>
					<li>Настройка админки под удобную работу</li>
					<li>Проверка перед запуском</li>
				</ul>
			</div>
		</div>

		<div class="gl-service-includes-note">
			<p>
				Каждый проект может отличаться по объему. Если нужен расширенный функционал,
				интеграции или сложная логика — это рассчитывается отдельно после разбора задачи.
			</p>
		</div>
	</div>
</section>
				
<style>
	.gl-service-includes-note {
	margin-top: 28px;
	padding: 20px 24px;
	background: #f8fbf9;
	border: 1px solid #e6efe9;
	border-radius: 18px;
	font-size: 15px;
	line-height: 1.7;
	color: var(--gl-color-subtitle, #6b7280);
}
</style>
	
<div class="gl-service-actions" style="margin-top:20px;">
	<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">
		Рассчитать стоимость магазина
	</a>
</div>
				
				

				<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

				<?php echo do_shortcode('[gl_related_services_slider]'); ?>

				<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по интернет-магазинам" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>