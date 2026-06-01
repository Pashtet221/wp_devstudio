<?php
/*
Template Name: Услуга — Разработка маркетплейса
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
					<div class="gl-service-pill">Маркетплейсы и платформы</div>
					<h1 class="gl-service-title"><?php the_title(); ?></h1>
					<p class="gl-service-subtitle">
						Разработка маркетплейса на WordPress под ваш сценарий работы: объявления, товары, заказы,
						отклики, роли пользователей, личные кабинеты, оплата, баланс и кастомная логика платформы.
						Подходит для сервисов, каталогов исполнителей, маркетплейсов услуг и нишевых площадок.
					</p>

					<ul class="gl-service-points">
						<li>Платформа с ролями пользователей и личными кабинетами</li>
						<li>Логика откликов, заказов, публикаций и модерации</li>
						<li>Гибкая разработка на WordPress, WooCommerce, HivePress и кастомных решениях</li>
						<li>Основа под дальнейшее развитие, платежи и автоматизацию процессов</li>
					</ul>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить маркетплейс</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="#service-faq">Частые вопросы</a>
					</div>
				</div>

				<div class="gl-service-hero__side">
					<p class="gl-service-side__label">Стоимость</p>
					<p class="gl-service-side__price">от 180 000 ₽</p>
					<p class="gl-service-side__text">
						Стоимость зависит от механики платформы, количества ролей, сценариев взаимодействия,
						эскроу, балансов, кабинетов и интеграций.
					</p>

					<ul class="gl-service-side__list">
						<li>Подходит для маркетплейсов товаров, услуг, исполнителей и заявок</li>
						<li>Можно начать с MVP и дальше развивать проект поэтапно</li>
						<li>Поддержка сложной логики и нестандартных сценариев</li>
						<li>Разработка под бизнес-модель, а не только под шаблон</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит</div>
				<h2>Разработка маркетплейса под вашу модель взаимодействия</h2>
				<p>
					Маркетплейс — это не просто каталог. Здесь важно продумать роли пользователей, сценарии публикации,
					откликов, выбора исполнителя, заказов, оплаты, статусов и общей логики платформы.
					Я собираю такие проекты под конкретную задачу, а не только на стандартных шаблонах.
				</p>
			</div>

			<div class="gl-service-grid-3">
				<div class="gl-service-card">
					<h3>Роли и кабинеты</h3>
					<p>
						Настройка ролей заказчика, исполнителя, продавца, покупателя или администратора,
						а также логики личных кабинетов, профилей, балансов, статусов и прав доступа.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Сценарии взаимодействия</h3>
					<p>
						Публикация объявлений, заказов или товаров, отклики, выбор исполнителя, модерация,
						этапы сделки, подтверждение выполнения и другие механики под вашу платформу.
					</p>
				</div>

				<div class="gl-service-card">
					<h3>Платежи и логика платформы</h3>
					<p>
						Оплата через WooCommerce, комиссии, статусы заказов, заявки на вывод средств,
						эскроу-сценарии, ручные и автоматические действия, а также подготовка к будущим доработкам.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Что входит в стоимость</div>
				<h2>Базовый состав работ по маркетплейсу</h2>
				<p>
					Ниже — типовой набор того, что обычно входит в разработку MVP или первой рабочей версии маркетплейса.
					Финальный состав зависит от вашей бизнес-модели и сценариев платформы.
				</p>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<h3>Основа платформы</h3>
					<ul class="gl-service-list">
						<li>Установка и настройка WordPress</li>
						<li>Подключение WooCommerce / HivePress / нужных расширений</li>
						<li>Настройка ролей пользователей и базовых кабинетов</li>
						<li>Основные страницы платформы и навигация</li>
						<li>Базовая адаптивность под мобильные устройства</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<h3>Функциональная логика</h3>
					<ul class="gl-service-list">
						<li>Публикация объявлений, заказов или предложений</li>
						<li>Отклики, заявки или взаимодействие между ролями</li>
						<li>Статусы сущностей и базовая модерация</li>
						<li>Настройка уведомлений и ключевых сценариев</li>
						<li>Подготовка к дальнейшему масштабированию</li>
					</ul>
				</div>
			</div>

			<div class="gl-service-includes-note">
				<p>
					Если нужен эскроу, сложные финансовые сценарии, автоматические выплаты, реферальная система,
					чат, подписки, рейтинги, комиссии, API-интеграции или многоуровневая бизнес-логика —
					это оценивается отдельно после разбора проекта.
				</p>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Для каких проектов</div>
				<h2>Когда нужна разработка маркетплейса</h2>
			</div>

			<div class="gl-service-grid-2">
				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужна платформа для заказчиков и исполнителей</li>
						<li>Нужен маркетплейс товаров с личными кабинетами продавцов</li>
						<li>Нужна площадка с публикацией объявлений, услуг или заказов</li>
						<li>Нужен MVP для запуска и проверки бизнес-гипотезы</li>
					</ul>
				</div>

				<div class="gl-service-card">
					<ul class="gl-service-list">
						<li>Нужен кастомный проект на WordPress, а не закрытая SaaS-платформа</li>
						<li>Важно заложить возможность развития и поэтапной доработки</li>
						<li>Нужны роли пользователей, кабинеты, статусы и сценарии взаимодействия</li>
						<li>Требуется гибкая настройка логики под конкретный рынок или нишу</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">Этапы работы</div>
				<h2>Как проходит разработка маркетплейса</h2>
				<p>
					Сначала разбираю бизнес-модель и основные пользовательские сценарии. После этого проектируем механику платформы,
					выбираем базу реализации и собираем первую рабочую версию с возможностью дальнейшего развития.
				</p>
			</div>

			<div class="gl-service-steps">
				<div class="gl-service-step">
					<div class="gl-service-step__num">01</div>
					<h3>Разбор модели</h3>
					<p>Определяю роли пользователей, путь заказчика и исполнителя, механику платформы и ключевые действия внутри сервиса.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">02</div>
					<h3>Проектирование логики</h3>
					<p>Продумываю публикации, отклики, кабинеты, модерацию, статусы, платежные сценарии и общую структуру платформы.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">03</div>
					<h3>Разработка MVP</h3>
					<p>Собираю первую рабочую версию маркетплейса, на которой уже можно тестировать гипотезу и запускать проект.</p>
				</div>

				<div class="gl-service-step">
					<div class="gl-service-step__num">04</div>
					<h3>Проверка и развитие</h3>
					<p>Тестирую сценарии, правлю узкие места и готовлю проект к следующему этапу — росту, автоматизации и расширению функций.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gl-service-section" id="service-faq">
		<div class="gl-service-container">
			<div class="gl-service-head">
				<div class="gl-service-head__eyebrow">FAQ</div>
				<h2>Частые вопросы по разработке маркетплейса</h2>
			</div>

			<div class="gl-service-faq">
				<div class="gl-service-faq__item">
					<h3>Можно ли сделать маркетплейс на WordPress?</h3>
					<p>
						Да, если архитектура проекта подобрана правильно. WordPress подходит для MVP, нишевых маркетплейсов,
						сервисов объявлений, платформ с ролями пользователей и проектов, которые нужно развивать постепенно.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли реализовать отклики, выбор исполнителя и оплату после выбора?</h3>
					<p>
						Да, такие сценарии можно собрать на базе WordPress, WooCommerce, HivePress и кастомной логики.
						Именно здесь важна не только установка плагинов, но и грамотная настройка самой механики проекта.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Сколько стоит разработка маркетплейса?</h3>
					<p>
						Стоимость зависит от числа ролей, логики взаимодействия, кабинетов, финансовых сценариев, модерации и интеграций.
						Маркетплейсы почти всегда оцениваются после разбора идеи и структуры платформы.
					</p>
				</div>

				<div class="gl-service-faq__item">
					<h3>Можно ли начать с MVP, а потом развивать проект?</h3>
					<p>
						Да, это один из лучших подходов. Сначала собирается рабочая база с ключевой логикой, а затем поэтапно
						добавляются новые функции, кабинеты, автоматизация, выплаты и другие сценарии.
					</p>
				</div>
			</div>

			<div class="gl-service-cta">
				<div class="gl-service-cta__box">
					<h2>Нужен маркетплейс под вашу бизнес-модель, а не просто набор плагинов?</h2>
					<p>
						Опишите идею проекта, роли пользователей и основной сценарий взаимодействия.
						Я предложу подход к реализации, подберу техническую базу и скажу, как лучше собрать маркетплейс на WordPress.
					</p>

					<div class="gl-service-actions">
						<a class="gl-service-btn gl-service-btn--primary" href="/contacts/">Обсудить проект</a>
						<a class="gl-service-btn gl-service-btn--secondary" href="/services/">Все услуги</a>
					</div>
				</div>
				
				
				
				
				<section class="gl-service-section">
	<div class="gl-service-container">
		<div class="gl-service-head">
			<div class="gl-service-head__eyebrow">Что входит в стоимость</div>
			<h2>Что обычно входит в разработку маркетплейса</h2>
			<p>
				Базовая стоимость включает сборку первой рабочей версии платформы с основной логикой,
				ролями пользователей, личными кабинетами и ключевыми сценариями взаимодействия.
				Ниже — типовой состав работ для MVP или стартовой версии проекта.
			</p>
		</div>

		<div class="gl-service-grid-2">
			<div class="gl-service-card">
				<h3>Основа платформы</h3>
				<ul class="gl-service-list">
					<li>Установка и настройка WordPress</li>
					<li>Подключение WooCommerce, HivePress или нужной базы проекта</li>
					<li>Создание основных страниц платформы</li>
					<li>Базовая структура маркетплейса и навигация</li>
					<li>Адаптивность под мобильные устройства</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Роли и кабинеты</h3>
				<ul class="gl-service-list">
					<li>Настройка ролей пользователей</li>
					<li>Личные кабинеты для разных типов участников</li>
					<li>Профили пользователей и базовые поля</li>
					<li>Разграничение доступа по ролям</li>
					<li>Подготовка к дальнейшему расширению логики кабинетов</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Сценарии взаимодействия</h3>
				<ul class="gl-service-list">
					<li>Публикация объявлений, заказов или предложений</li>
					<li>Отклики, заявки или ответы между пользователями</li>
					<li>Базовые статусы сущностей и этапов работы</li>
					<li>Модерация или ручное управление ключевыми действиями</li>
					<li>Уведомления по основным сценариям платформы</li>
				</ul>
			</div>

			<div class="gl-service-card">
				<h3>Техническая и бизнес-логика</h3>
				<ul class="gl-service-list">
					<li>Подключение базовой логики оплаты при необходимости</li>
					<li>Подготовка проекта к комиссиям, выплатам и эскроу-сценариям</li>
					<li>Чистая структура проекта для будущих доработок</li>
					<li>Тестирование основных пользовательских сценариев</li>
					<li>Подготовка платформы к запуску MVP</li>
				</ul>
			</div>
		</div>

		<div class="gl-service-includes-note">
			<p>
				Сложные финансовые сценарии, автоматические выплаты, рейтинги, чат, подписки, реферальная система,
				сложная модерация, интеграции с внешними сервисами и нестандартная бизнес-логика
				обычно рассчитываются отдельно после подробного разбора проекта.
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

				<?php echo do_shortcode('[gl_related_cases_slider]'); ?>

				<?php echo do_shortcode('[gl_related_blog_slider title="Полезные статьи по маркетплейсам и WooCommerce" button_text="Смотреть статьи" button_url="/blog/"]'); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>