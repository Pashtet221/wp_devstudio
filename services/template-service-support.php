<?php
/*
Template Name: Услуга — Техническая поддержка сайта
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

	.gl-service-includes-note {
		margin-top: 28px;
		padding: 20px 24px;
		background: #f8fbf9;
		border: 1px solid #e6efe9;
		border-radius: 18px;
		font-size: 15px;
		line-height: 1.7;
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
					<div class="gl-service-pill">Поддержка WordPress</div>
					<h1 class="gl-service-title"><?php the_title(); ?></h1>
					<p class="gl-service-subtitle">
						Техническая поддержка сайта на WordPress и WooCommerce: исправление ошибок, обновления,
						контроль работоспособности, резервные копии, доработки и помощь по текущим задачам.
						Подходит для сайтов, которым нужна стабильная работа и регулярное сопровождение.
					</p>

					<ul class="gl-service-points">
						<li>Исправление ошибок и поддержание сайта в рабочем состоянии</li>
						<li>Обновление WordPress, темы, плагинов и проверка после обновлений</li>
						<li>Поддержка WooCommerce, заказов, форм, писем и пользовательских сценариев</li>
						<li>Регулярные правки, консультации и техническая помощь по сайту</li>
					</ul>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить поддержку</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="#service-faq">Частые вопросы</a>
					</div>
				</div>

				<div class="gl-service-hero__side">
					<p class="gl-service-side__label">Стоимость</p>
					<p class="gl-service-side__price">от 10 000 ₽ / мес</p>
					<p class="gl-service-side__text">
						Стоимость зависит от количества задач, частоты обращений, типа сайта
						и объема технических работ по сопровождению.
					</p>

					<ul class="gl-service-side__list">
						<li>Подходит для корпоративных сайтов, услуг, блогов и WooCommerce</li>
						<li>Можно работать по задачам или на постоянной основе</li>
						<li>Регулярная поддержка без необходимости искать нового разработчика каждый раз</li>
						<li>Удобно, если сайт уже запущен и его нужно сопровождать</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит</div>
				<h2>Поддержка сайта, чтобы он не простаивал и не ломался в самый неудобный момент</h2>
				<p>
					После запуска сайту часто требуется не только разовая доработка, но и нормальное техническое сопровождение:
					обновления, мелкие правки, контроль ошибок, помощь по WooCommerce, формам, интеграциям и текущим задачам.
				</p>
			</div>

			<div class="gl-service-grid-3">
				<div class="gl-service-card">
					<h3>Техническая стабильность</h3>
					<p>
						Обновление WordPress, плагинов и темы, устранение конфликтов после обновлений,
						исправление багов и проверка основных сценариев работы сайта.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Поддержка функционала</h3>
					<p>
						Помощь с формами, блоками, страницами, WooCommerce, заказами, письмами,
						карточками товаров, фильтрами, личным кабинетом и текущими правками.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Сопровождение проекта</h3>
					<p>
						Резервные копии, мелкие доработки, консультации, контроль состояния сайта
						и постепенное развитие проекта без хаотичных точечных решений.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит в стоимость</div>
				<h2>Что обычно входит в техническую поддержку сайта</h2>
				<p>
					Ниже — типовой состав работ по сопровождению сайта на WordPress.
					Формат можно подстроить под задачи проекта: разовые работы, пакет часов или ежемесячная поддержка.
				</p>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<h3>Базовое сопровождение</h3>
					<ul class="gl-service-list">
						<li>Обновление WordPress, темы и плагинов</li>
						<li>Проверка работоспособности сайта после обновлений</li>
						<li>Исправление мелких ошибок и багов</li>
						<li>Контроль форм, ключевых страниц и базового функционала</li>
						<li>Консультации по текущим вопросам по сайту</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Поддержка WordPress и WooCommerce</h3>
					<ul class="gl-service-list">
						<li>Правки контента, блоков и отдельных страниц</li>
						<li>Помощь по WooCommerce, заказам и письмам</li>
						<li>Поддержка корзины, checkout и карточек товара</li>
						<li>Диагностика конфликтов плагинов и ошибок</li>
						<li>Подготовка сайта к дальнейшим доработкам</li>
					</ul>
				</div>
			</div>

			<div class="gl-service-includes-note">
				<p>
					Сложные доработки, разработка нового функционала, крупные интеграции,
					редизайн страниц, серьезная переработка WooCommerce или нестандартная логика
					обычно оцениваются отдельно от регулярной технической поддержки.
				</p>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Когда подходит</div>
				<h2>В каких случаях нужна техническая поддержка сайта</h2>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Сайт уже работает, но ему нужны регулярные правки и сопровождение</li>
						<li>Не хочется каждый раз искать нового разработчика под мелкие задачи</li>
						<li>Нужно безопасно обновлять WordPress и плагины</li>
						<li>Важно быстро решать ошибки и технические проблемы</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Сайт работает на WooCommerce и требует внимания к заказам и логике покупки</li>
						<li>Нужны постоянные небольшие изменения по страницам и контенту</li>
						<li>Нужно сопровождение после запуска проекта</li>
						<li>Важно, чтобы сайт оставался стабильным и готовым к развитию</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Как проходит работа</div>
				<h2>Понятный формат сопровождения сайта</h2>
				<p>
					Сначала разбираем текущий сайт, техническое состояние и типовые задачи.
					После этого определяем удобный формат поддержки: по задачам, по часам или на ежемесячной основе.
				</p>
			</div>

			<div class="gl-service-steps">
				<div class="gl-service-step">
					<div class="gl-service-step__num">01</div>
					<h3>Разбор сайта</h3>
					<p>Смотрю, как устроен сайт, какие плагины и тема используются, где могут быть слабые места и риски.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">02</div>
					<h3>Формат поддержки</h3>
					<p>Определяем, какие задачи будут регулярными, что входит в сопровождение и как удобнее организовать работу.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">03</div>
					<h3>Текущие задачи</h3>
					<p>Выполняю обновления, исправления, правки и технические действия по сайту в рамках поддержки.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">04</div>
					<h3>Стабильная работа</h3>
					<p>Сайт поддерживается в нормальном состоянии, а новые задачи решаются без постоянной суеты и накопления проблем.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section" id="service-faq">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">FAQ</div>
				<h2>Частые вопросы по технической поддержке</h2>
			</div>

			<div class="gl-service-faq">
				<div class="gl-service-faq__item">
					<h3>Что входит в техническую поддержку сайта?</h3>
					<p>
						Обычно это обновления WordPress, темы и плагинов, исправление ошибок, мелкие доработки,
						контроль ключевых функций сайта, помощь по WooCommerce и текущим техническим вопросам.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли поддерживать сайт, который делал другой разработчик?</h3>
					<p>
						Да, в большинстве случаев это возможно. Перед началом я смотрю структуру сайта,
						тему, плагины и общее состояние проекта, чтобы понять, как безопасно вести поддержку.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Поддержка идет по задачам или по абонентке?</h3>
					<p>
						Возможны оба варианта. Можно работать по разовым запросам, пакету часов
						или на ежемесячной основе, если задач по сайту становится много и они повторяются.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Подходит ли поддержка для WooCommerce-магазина?</h3>
					<p>
						Да. Поддержка особенно полезна для WooCommerce, потому что интернет-магазины чаще требуют
						обновлений, проверки оформления заказа, писем, корзины, карточек товаров и пользовательской логики.
					</p>
				</div>
			</div>

			<div class="gl-service-cta">
				<div class="gl-service-cta__box">
					<h2>Нужен разработчик, который будет нормально сопровождать сайт, а не просто чинить проблемы по факту?</h2>
					<p>
						Опишите, какой у вас сайт, какие задачи возникают регулярно и что сейчас беспокоит больше всего.
						Я предложу подходящий формат технической поддержки и скажу, как лучше организовать сопровождение.
					</p>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить поддержку</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="/services/">Все услуги</a>
					</div>
				</div>

				<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

				<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по поддержке WordPress и WooCommerce" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>