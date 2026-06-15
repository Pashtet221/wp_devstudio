<?php
/*
Template Name: Услуга — Сайт-визитка
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
					<div class="gl-service-pill">Сайты на WordPress</div>
					<h1 class="gl-service-title"><?php the_title(); ?></h1>
					<p class="gl-service-subtitle">
						Создание сайта-визитки на WordPress для бизнеса, услуг, личного бренда или компании.
						Делаю аккуратные и современные сайты, которые помогают представить компанию, показать преимущества,
						услуги, кейсы и контакты в понятной и продающей форме.
					</p>

					<ul class="gl-service-points">
						<li>Современная структура под услуги, компанию или специалиста</li>
						<li>Адаптивный сайт, который хорошо выглядит на телефоне и на компьютере</li>
						<li>Блоки преимуществ, услуг, кейсов, отзывов и контактов</li>
						<li>WordPress-админка для удобного редактирования контента</li>
					</ul>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить сайт-визитку</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="#service-faq">Частые вопросы</a>
					</div>
				</div>

				<div class="gl-service-hero__side">
					<p class="gl-service-side__label">Стоимость</p>
					<p class="gl-service-side__price">от 45 000 ₽</p>
					<p class="gl-service-side__text">
						Финальная стоимость зависит от количества блоков, страниц, сложности дизайна,
						контента и дополнительных функций.
					</p>

					<ul class="gl-service-side__list">
						<li>Подходит для компании, специалиста, услуг или небольшого бренда</li>
						<li>WordPress-сайт с возможностью дальнейшего развития</li>
						<li>Понятная структура для клиента и удобная админка для вас</li>
						<li>Можно расширить до корпоративного сайта или лендинга с доп. блоками</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит</div>
				<h2>Сайт-визитка, который помогает нормально представить бизнес и получить заявку</h2>
				<p>
					Сайт-визитка нужен, когда важно быстро и понятно рассказать о компании, услугах,
					формате работы, преимуществах и способах связи. Такой сайт помогает повысить доверие,
					собрать заявки и дать клиенту удобную точку входа в ваш бизнес.
				</p>
			</div>

			<div class="gl-service-grid-3">
				<div class="gl-service-card">
					<h3>Главная и структура</h3>
					<p>
						Разработка главной страницы, первого экрана, блоков о компании, услугах,
						преимуществах, кейсах, отзывах, FAQ и контактах в логичной последовательности.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Дизайн и адаптивность</h3>
					<p>
						Аккуратная современная верстка под ваш стиль, корректное отображение на телефоне,
						планшете и компьютере, а также удобное восприятие информации.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Контент и управление</h3>
					<p>
						Сайт на WordPress, чтобы вы могли редактировать тексты, изображения и базовые блоки
						без сложной технической работы и постоянного обращения к разработчику.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит в стоимость</div>
				<h2>Базовый состав работ по сайту-визитке</h2>
				<p>
					Ниже — типовой набор работ, который входит в создание сайта-визитки.
					Если нужен расширенный функционал, дополнительные страницы или нестандартные блоки,
					это можно добавить отдельно.
				</p>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<h3>Основная часть сайта</h3>
					<ul class="gl-service-list">
						<li>Установка и настройка WordPress</li>
						<li>Главная страница сайта-визитки</li>
						<li>Страница контактов</li>
						<li>Форма обратной связи</li>
						<li>Базовая адаптивность под мобильные устройства</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Контент и блоки</h3>
					<ul class="gl-service-list">
						<li>Блок о компании или специалисте</li>
						<li>Блок услуг или направлений работы</li>
						<li>Преимущества, кейсы или отзывы</li>
						<li>CTA-блоки для заявок и связи</li>
						<li>Подготовка к дальнейшему расширению сайта</li>
					</ul>
				</div>
			</div>

			<div class="gl-service-includes-note">
				<p>
					Если нужен блог, дополнительные страницы услуг, сложные формы, мультиязычность,
					интеграции или нестандартная логика — это рассчитывается отдельно после разбора проекта.
				</p>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Когда подходит</div>
				<h2>В каких случаях сайт-визитка — правильное решение</h2>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужно быстро и понятно представить компанию или услуги</li>
						<li>Нужен аккуратный сайт без сложного каталога и магазина</li>
						<li>Важно повысить доверие и показать портфолио, опыт или кейсы</li>
						<li>Нужен сайт для заявок, звонков и связи с клиентами</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужен сайт для специалиста, студии, компании или локального бизнеса</li>
						<li>Нужна база для дальнейшего расширения проекта</li>
						<li>Нужен современный сайт вместо устаревшей страницы или соцсетей</li>
						<li>Важно, чтобы сайт был удобен и для клиента, и для владельца</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Этапы работы</div>
				<h2>Как проходит разработка сайта-визитки</h2>
				<p>
					Сначала определяем задачу сайта, структуру и ключевые блоки.
					После этого собираю сайт на WordPress, оформляю страницы, подключаю формы и
					проверяю итоговый результат перед запуском.
				</p>
			</div>

			<div class="gl-service-steps">
				<div class="gl-service-step">
					<div class="gl-service-step__num">01</div>
					<h3>Разбор задачи</h3>
					<p>Определяю, для кого сайт, какие услуги нужно показать и какое действие должен сделать посетитель.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">02</div>
					<h3>Структура и контент</h3>
					<p>Продумываю блоки, последовательность информации, CTA и общую логику страницы или небольшого сайта.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">03</div>
					<h3>Сборка сайта</h3>
					<p>Верстаю и настраиваю сайт на WordPress, подключаю формы, блоки и основные страницы.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">04</div>
					<h3>Проверка и запуск</h3>
					<p>Проверяю отображение, адаптивность, работу форм и общий вид сайта перед публикацией.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section" id="service-faq">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">FAQ</div>
				<h2>Частые вопросы по сайту-визитке</h2>
			</div>

			<div class="gl-service-faq">
				<div class="gl-service-faq__item">
					<h3>Чем сайт-визитка отличается от лендинга?</h3>
					<p>
						Сайт-визитка обычно более универсален: он может включать несколько страниц,
						информацию о компании, услугах, кейсах, контактах и быть базой для дальнейшего роста.
						Лендинг чаще строится под одну конкретную цель или оффер.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли потом расширить сайт-визитку?</h3>
					<p>
						Да, на WordPress сайт-визитку можно развивать дальше: добавлять страницы услуг,
						блог, кейсы, формы, дополнительные секции и другой функционал.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Сколько стоит сайт-визитка?</h3>
					<p>
						Стоимость зависит от количества страниц, блоков, сложности дизайна и состава работ.
						Если нужен базовый сайт для презентации услуг, цена обычно ниже, чем у корпоративного сайта или магазина.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Смогу ли я сам менять тексты и изображения?</h3>
					<p>
						Да, сайт делается на WordPress, поэтому тексты, изображения и часть контента
						можно будет редактировать через админку.
					</p>
				</div>
			</div>

			<div class="gl-service-cta">
				<div class="gl-service-cta__box">
					<h2>Нужен аккуратный сайт-визитка, который будет вызывать доверие и приводить заявки?</h2>
					<p>
						Опишите, чем вы занимаетесь, какие услуги нужно показать и что должно быть на сайте.
						Я предложу структуру, формат реализации и скажу, как лучше собрать сайт на WordPress под вашу задачу.
					</p>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить проект</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="/services/">Все услуги</a>
					</div>
				</div>

				<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

				<?php echo do_shortcode('[gl_related_services_slider]'); ?>

				<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по сайтам на WordPress" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>