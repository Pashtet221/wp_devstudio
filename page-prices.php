<?php
/**
 * Template Name: Цены
 * Template Post Type: page
 *
 * Commercial prices landing page.
 *
 * @package WPDevStudio
 */

get_header();

$contacts_url   = home_url( '/contacts/' );
$calculator_url = home_url( '/#site-calculator' );
$shop_url       = home_url( '/services/razrabotka-internet-magazina-na-wordpress-i-woocommerce-pod-vash-biznes/' );
$services_url   = home_url( '/services/' );

$featured_services = array(
	array(
		'title'       => 'Интернет-магазин WooCommerce',
		'price'       => 'от 120 000 ₽',
		'description' => 'Кастомный интернет-магазин с каталогом, карточкой товара, корзиной, оформлением заказа и необходимыми интеграциями.',
		'url'         => $shop_url,
	),
	array(
		'title'       => 'Доработка WordPress / WooCommerce',
		'price'       => 'от 10 000 ₽',
		'description' => 'Новый функционал, исправление существующего проекта, переработка интерфейсов и бизнес-логики.',
		'url'         => home_url( '/services/dorabotka-sajta-na-wordpress-i-woocommerce-pravki-dorabotka-funkczionala/' ),
	),
	array(
		'title'       => 'Кастомная WordPress-тема',
		'price'       => 'от 70 000 ₽',
		'description' => 'Разработка темы по индивидуальному дизайну без использования готовых шаблонов.',
		'url'         => $services_url,
	),
	array(
		'title'       => 'Разработка WordPress-плагина',
		'price'       => 'от 45 000 ₽',
		'description' => 'Разработка отдельного функционального модуля, интеграции или бизнес-инструмента под конкретную задачу.',
		'url'         => home_url( '/uslugi/razrabotka-plaginov-pod-vashi-zadachi/' ),
	),
);

$price_categories = array(
	'Разработка сайтов'                 => array(
		array( 'Лендинг на WordPress', 'от 45 000 ₽' ),
		array( 'Корпоративный сайт', 'от 70 000 ₽' ),
		array( 'Каталог товаров без онлайн-оплаты', 'от 80 000 ₽' ),
		array( 'Интернет-магазин WooCommerce', 'от 120 000 ₽' ),
		array( 'Сложный WooCommerce-магазин', 'от 180 000 ₽' ),
		array( 'Маркетплейс / сайт объявлений', 'от 150 000 ₽' ),
		array( 'Разработка сайта по готовому дизайну Figma', 'от 60 000 ₽' ),
		array( 'Перенос существующего сайта на WordPress', 'от 50 000 ₽' ),
	),
	'WordPress и WooCommerce'           => array(
		array( 'Доработка существующего WordPress-сайта', 'от 10 000 ₽' ),
		array( 'Доработка WooCommerce-магазина', 'от 15 000 ₽' ),
		array( 'Кастомная тема WordPress', 'от 70 000 ₽' ),
		array( 'Кастомная тема WooCommerce', 'от 100 000 ₽' ),
		array( 'Кастомизация готовой темы', 'от 30 000 ₽' ),
		array( 'Настройка Woodmart / аналогичной темы', 'от 30 000 ₽' ),
		array( 'Переработка карточки товара', 'от 20 000 ₽' ),
		array( 'Переработка каталога', 'от 20 000 ₽' ),
		array( 'Кастомная корзина WooCommerce', 'от 20 000 ₽' ),
		array( 'Кастомный Checkout', 'от 25 000 ₽' ),
		array( 'Личный кабинет покупателя', 'от 25 000 ₽' ),
		array( 'AJAX-фильтрация каталога', 'от 25 000 ₽' ),
		array( 'AJAX-корзина', 'от 15 000 ₽' ),
		array( 'Быстрый просмотр товара', 'от 10 000 ₽' ),
		array( 'Wishlist / избранное', 'от 10 000 ₽' ),
		array( 'Кастомная система скидок', 'от 20 000 ₽' ),
		array( 'Работа с вариативными товарами', 'от 15 000 ₽' ),
	),
	'Плагины и нестандартный функционал' => array(
		array( 'Кастомный WordPress-плагин', 'от 45 000 ₽' ),
		array( 'Небольшой функциональный плагин', 'от 20 000 ₽' ),
		array( 'WooCommerce-плагин', 'от 35 000 ₽' ),
		array( 'Расширение существующего плагина', 'от 15 000 ₽' ),
		array( 'Интеграция стороннего API', 'от 25 000 ₽' ),
		array( 'REST API интеграция', 'от 25 000 ₽' ),
		array( 'Автоматизация бизнес-процессов', 'от 30 000 ₽' ),
		array( 'Интеграция внешней CRM / ERP', 'от 35 000 ₽' ),
		array( 'Импорт данных из внешней системы', 'от 20 000 ₽' ),
		array( 'Экспорт данных / создание фида', 'от 15 000 ₽' ),
	),
	'Оплата и доставка'                 => array(
		array( 'Подключение платёжной системы', 'от 15 000 ₽' ),
		array( 'Интеграция СБП', 'от 15 000 ₽' ),
		array( 'Нестандартная логика способов оплаты', 'от 15 000 ₽' ),
		array( 'Интеграция службы доставки', 'от 20 000 ₽' ),
		array( 'Интеграция СДЭК', 'от 20 000 ₽' ),
		array( 'Карта пунктов выдачи', 'от 20 000 ₽' ),
		array( 'Интеграция DaData', 'от 12 000 ₽' ),
		array( 'Кастомный расчёт доставки', 'от 20 000 ₽' ),
		array( 'Интеграция нескольких служб доставки', 'от 35 000 ₽' ),
	),
	'Каталог и данные'                  => array(
		array( 'Импорт товаров', 'от 15 000 ₽' ),
		array( 'Перенос каталога с другого сайта', 'от 20 000 ₽' ),
		array( 'Настройка WP All Import', 'от 15 000 ₽' ),
		array( 'Автоматический импорт / синхронизация', 'от 25 000 ₽' ),
		array( 'YML-фид', 'от 15 000 ₽' ),
		array( 'Google Merchant Feed', 'от 15 000 ₽' ),
		array( 'Яндекс Товары / Merchant-интеграция', 'от 15 000 ₽' ),
		array( 'Массовая обработка товаров', 'от 15 000 ₽' ),
		array( 'Синхронизация цен и остатков', 'от 30 000 ₽' ),
	),
	'Интерфейс и контент'               => array(
		array( 'Верстка страницы по Figma', 'от 10 000 ₽' ),
		array( 'Кастомный Gutenberg / ACF-блок', 'от 8 000 ₽' ),
		array( 'ACF-конструктор страниц', 'от 25 000 ₽' ),
		array( 'Переработка Header', 'от 15 000 ₽' ),
		array( 'Переработка Footer', 'от 10 000 ₽' ),
		array( 'Адаптивная верстка существующей страницы', 'от 10 000 ₽' ),
		array( 'Popup / модальное окно', 'от 8 000 ₽' ),
		array( 'AJAX-форма', 'от 10 000 ₽' ),
		array( 'Интерактивный калькулятор', 'от 20 000 ₽' ),
	),
	'Технические работы'                => array(
		array( 'Диагностика WordPress-сайта', 'от 5 000 ₽' ),
		array( 'Исправление ошибок', 'от 5 000 ₽' ),
		array( 'Оптимизация скорости', 'от 20 000 ₽' ),
		array( 'Миграция сайта', 'от 10 000 ₽' ),
		array( 'Настройка редиректов', 'от 5 000 ₽' ),
		array( 'Техническая SEO-доработка', 'от 15 000 ₽' ),
		array( 'Schema.org / структурированные данные', 'от 10 000 ₽' ),
		array( 'Настройка Cron / фоновых задач', 'от 10 000 ₽' ),
		array( 'Исправление конфликтов плагинов', 'от 10 000 ₽' ),
	),
);

$budget_examples = array(
	array( 'WooCommerce-магазин', '120 000–180 000 ₽', array( 'Индивидуальная верстка', 'Каталог и фильтры', 'Карточка товара', 'Корзина и checkout', 'Оплата, доставка и базовые интеграции' ) ),
	array( 'Развитие существующего магазина', '30 000–100 000 ₽', array( 'Новый функционал', 'Изменение checkout', 'Система скидок', 'Интеграция API и доставка', 'Автоматизация' ) ),
	array( 'Кастомный WordPress-плагин', '45 000–100 000+ ₽', array( 'Стоимость зависит от количества интерфейсов, интеграций и бизнес-логики.' ) ),
	array( 'Сложный WooCommerce-проект', 'от 180 000 ₽', array( 'Для магазинов с большим количеством нестандартного функционала, интеграциями и индивидуальной архитектурой.' ) ),
);

$factors = array(
	array( 'Объём проекта', 'Количество страниц, шаблонов и пользовательских сценариев.' ),
	array( 'Дизайн', 'Готовый дизайн или разработка интерфейса в процессе проекта.' ),
	array( 'WooCommerce-функционал', 'Каталог, вариации, корзина, checkout, скидки и личный кабинет.' ),
	array( 'Интеграции', 'Оплата, доставка, CRM, ERP, API и сторонние сервисы.' ),
	array( 'Состояние существующего сайта', 'При доработке необходимо учитывать архитектуру темы и качество текущего кода.' ),
	array( 'Нестандартная логика', 'Индивидуальные бизнес-процессы, автоматизация и сложные пользовательские сценарии.' ),
);

$steps = array(
	array( '01', 'Задача', 'Клиент описывает задачу и предоставляет необходимые материалы.' ),
	array( '02', 'Оценка', 'Изучается проект и определяется объём работ.' ),
	array( '03', 'Стоимость', 'Фиксируются стоимость, сроки и этапы.' ),
	array( '04', 'Разработка', 'Работа выполняется по согласованному объёму с тестированием результата.' ),
);

$faq = array(
	array( 'Почему указана цена «от»?', 'Потому что стоимость зависит от объёма функционала, количества шаблонов, интеграций и состояния существующего сайта.' ),
	array( 'Можно ли получить точную стоимость до начала работы?', 'Да. После изучения задачи определяется объём работ и формируется оценка проекта.' ),
	array( 'Можно ли заказать только небольшую доработку?', 'Да. Можно обратиться как за полноценной разработкой, так и за отдельной доработкой WordPress или WooCommerce.' ),
	array( 'Работаете ли вы с уже существующими сайтами?', 'Да. Можно дорабатывать действующие WordPress- и WooCommerce-проекты, включая кастомные темы и плагины.' ),
	array( 'Можно ли разбить крупный проект на этапы?', 'Да. Для крупных проектов разработка и оплата могут быть разделены на согласованные этапы.' ),
	array( 'Что делать, если моей задачи нет в прайс-листе?', 'Отправить описание задачи. Нестандартные проекты оцениваются индивидуально.' ),
);
?>

<main class="wpds-prices">
	<section class="wpds-prices__hero" aria-labelledby="prices-title">
		<div class="wpds-prices__container">
			<p class="wpds-prices__eyebrow">Стоимость разработки</p>
			<h1 id="prices-title">Цены на разработку WordPress и WooCommerce</h1>
			<p class="wpds-prices__hero-text">Ориентировочная стоимость разработки сайтов, интернет-магазинов, плагинов, интеграций и доработок WordPress. Точная цена рассчитывается после изучения задачи.</p>
			<div class="wpds-prices__actions">
				<a class="wpds-prices__button wpds-prices__button--primary" href="#project-calculation">Рассчитать стоимость</a>
				<a class="wpds-prices__button wpds-prices__button--secondary" href="<?php echo esc_url( $contacts_url ); ?>">Обсудить проект</a>
			</div>
			<p class="wpds-prices__free"><span aria-hidden="true">✓</span> Предварительная оценка — бесплатно</p>
		</div>
	</section>

	<section class="wpds-prices__section" aria-labelledby="prices-services-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__heading">
				<p class="wpds-prices__kicker">Основные направления</p>
				<h2 id="prices-services-title">Сколько стоит разработка</h2>
				<p>Стоимость зависит от объёма проекта, дизайна, количества шаблонов, интеграций и нестандартной бизнес-логики. Ниже указаны ориентировочные цены, позволяющие оценить бюджет до обсуждения проекта.</p>
			</div>
			<div class="wpds-prices__featured-grid">
				<?php foreach ( $featured_services as $index => $service ) : ?>
					<article class="wpds-prices__service-card<?php echo 0 === $index ? ' wpds-prices__service-card--accent' : ''; ?>">
						<p class="wpds-prices__card-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></p>
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="wpds-prices__price"><?php echo esc_html( $service['price'] ); ?></p>
						<p><?php echo esc_html( $service['description'] ); ?></p>
						<a href="<?php echo esc_url( $service['url'] ); ?>">Подробнее <span aria-hidden="true">→</span></a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="wpds-prices__section wpds-prices__section--muted" id="price-list" aria-labelledby="price-list-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__heading wpds-prices__heading--row">
				<div><p class="wpds-prices__kicker">Типовые задачи</p><h2 id="price-list-title">Прайс-лист</h2></div>
				<p>Ориентировочная стоимость типовых работ. Финальная цена зависит от технического задания и состояния существующего проекта.</p>
			</div>
			<nav class="wpds-prices__category-nav" aria-label="Категории прайс-листа">
				<?php foreach ( array_keys( $price_categories ) as $category_index => $category_name ) : ?>
					<a href="#price-category-<?php echo esc_attr( $category_index + 1 ); ?>"><?php echo esc_html( $category_name ); ?></a>
				<?php endforeach; ?>
			</nav>
			<div class="wpds-prices__price-list">
				<?php foreach ( $price_categories as $category_name => $rows ) : $category_index = array_search( $category_name, array_keys( $price_categories ), true ); ?>
					<details class="wpds-prices__price-category" id="price-category-<?php echo esc_attr( $category_index + 1 ); ?>" <?php echo 1 === $category_index ? 'open' : ''; ?>>
						<summary><h3><?php echo esc_html( $category_name ); ?></h3><span><?php echo esc_html( count( $rows ) ); ?> услуг</span><i aria-hidden="true"></i></summary>
						<div class="wpds-prices__price-table">
							<div class="wpds-prices__price-head" aria-hidden="true"><span>Услуга</span><span>Стоимость</span></div>
							<?php foreach ( $rows as $row ) : ?>
								<div class="wpds-prices__price-row"><span><?php echo esc_html( $row[0] ); ?></span><strong><?php echo esc_html( $row[1] ); ?></strong></div>
							<?php endforeach; ?>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
			<aside class="wpds-prices__notice">
				<div class="wpds-prices__notice-mark" aria-hidden="true">i</div>
				<div><h3>Цены являются ориентировочными</h3><p>Каждый WordPress- и WooCommerce-проект отличается по архитектуре, количеству интеграций и состоянию существующего кода. Поэтому точная стоимость определяется после изучения задачи. Перед началом работ фиксируются объём, стоимость и этапы разработки.</p><p><strong>Небольшие задачи и технические доработки могут рассчитываться по фактическому объёму работ.</strong></p></div>
			</aside>
		</div>
	</section>

	<section class="wpds-prices__section" aria-labelledby="budget-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__heading"><p class="wpds-prices__kicker">Ориентиры бюджета</p><h2 id="budget-title">Примеры стоимости проектов</h2></div>
			<div class="wpds-prices__budget-grid">
				<?php foreach ( $budget_examples as $example ) : ?>
					<article class="wpds-prices__budget-card"><h3><?php echo esc_html( $example[0] ); ?></h3><p class="wpds-prices__price"><?php echo esc_html( $example[1] ); ?></p><ul><?php foreach ( $example[2] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="wpds-prices__section wpds-prices__section--dark" aria-labelledby="factors-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__heading"><p class="wpds-prices__kicker">Прозрачная оценка</p><h2 id="factors-title">От чего зависит стоимость</h2></div>
			<ol class="wpds-prices__factor-grid">
				<?php foreach ( $factors as $index => $factor ) : ?><li><span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><div><h3><?php echo esc_html( $factor[0] ); ?></h3><p><?php echo esc_html( $factor[1] ); ?></p></div></li><?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wpds-prices__section" aria-labelledby="steps-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__heading wpds-prices__heading--row"><div><p class="wpds-prices__kicker">Процесс</p><h2 id="steps-title">Как начинается работа</h2></div><p>Для крупных проектов разработка и оплата могут быть разделены на согласованные этапы.</p></div>
			<ol class="wpds-prices__steps">
				<?php foreach ( $steps as $step ) : ?><li><span><?php echo esc_html( $step[0] ); ?></span><h3><?php echo esc_html( $step[1] ); ?></h3><p><?php echo esc_html( $step[2] ); ?></p></li><?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wpds-prices__section wpds-prices__calculator" id="project-calculation" aria-labelledby="calculation-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__calculator-inner">
				<div><p class="wpds-prices__kicker">Онлайн-оценка</p><h2 id="calculation-title">Рассчитайте примерную стоимость проекта</h2><p>Ответьте на несколько вопросов, чтобы получить предварительную оценку бюджета.</p></div>
				<a class="wpds-prices__button wpds-prices__button--light" href="<?php echo esc_url( $calculator_url ); ?>">Перейти к калькулятору <span aria-hidden="true">→</span></a>
			</div>
			<p class="wpds-prices__calculator-note">Используется действующий калькулятор сайта — без повторного ввода данных и дублирования формы.</p>
		</div>
	</section>

	<section class="wpds-prices__section" aria-labelledby="faq-title">
		<div class="wpds-prices__container wpds-prices__faq-layout">
			<div class="wpds-prices__heading"><p class="wpds-prices__kicker">FAQ</p><h2 id="faq-title">Частые вопросы</h2><p>Коротко отвечаем на вопросы об оценке и формате работы.</p></div>
			<div class="wpds-prices__faq">
				<?php foreach ( $faq as $index => $item ) : ?><details<?php echo 0 === $index ? ' open' : ''; ?>><summary><span><?php echo esc_html( $item[0] ); ?></span><i aria-hidden="true"></i></summary><p><?php echo esc_html( $item[1] ); ?></p></details><?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="wpds-prices__section wpds-prices__final" aria-labelledby="final-title">
		<div class="wpds-prices__container">
			<div class="wpds-prices__final-inner"><div><h2 id="final-title">Есть задача по WordPress или WooCommerce?</h2><p>Опишите проект — я изучу задачу и предложу подходящий вариант реализации с предварительной оценкой стоимости.</p></div><div class="wpds-prices__actions"><a class="wpds-prices__button wpds-prices__button--primary" href="<?php echo esc_url( $contacts_url ); ?>">Обсудить проект</a><a class="wpds-prices__button wpds-prices__button--secondary" href="#project-calculation">Рассчитать стоимость</a></div></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
