<?php
/**
 * Landing page: converting an existing front end into a WooCommerce store.
 *
 * WordPress automatically selects this template for the page with the
 * `perenos-verstki-na-wordpress` slug.
 *
 * @package WPDevStudio
 */

defined('ABSPATH') || exit;

$contact_url = home_url('/contacts/');
$page_url    = get_permalink();
$seo_title   = 'Перенос HTML-вёрстки на WordPress и WooCommerce под ключ';
$seo_desc    = 'Перенесу готовую HTML/CSS/JS-вёрстку на WordPress и WooCommerce с сохранением дизайна. Каталог, карточки товаров, корзина, личный кабинет, оплата и доставка.';
$seo_keys    = 'перенос вёрстки на WordPress, перенос HTML на WordPress, интеграция WooCommerce, разработка темы WordPress, перенос сайта на WooCommerce';

// SEO fallback for installations where an SEO plugin has not supplied the tags yet.
add_filter('pre_get_document_title', static function () use ($seo_title) {
	return $seo_title;
});
add_action('wp_head', static function () use ($seo_desc, $seo_keys, $page_url) {
	echo '<meta name="description" content="' . esc_attr($seo_desc) . '">' . "\n";
	echo '<meta name="keywords" content="' . esc_attr($seo_keys) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url($page_url) . '">' . "\n";
}, 1);

get_header();

$service_schema = [
	'@context'    => 'https://schema.org',
	'@type'       => 'Service',
	'name'        => 'Перенос готовой HTML-вёрстки на WordPress и WooCommerce',
	'description' => 'Интеграция готовой HTML/CSS/JS-вёрстки в кастомную тему WordPress с подключением каталога, корзины, оплаты и доставки WooCommerce.',
	'url'         => $page_url,
	'provider'    => [
		'@type' => 'Organization',
		'name'  => get_bloginfo('name'),
		'url'   => home_url('/'),
	],
	'areaServed'  => 'RU',
];

$faq = [
	[
		'question' => 'Что нужно для оценки переноса?',
		'answer'   => 'Пришлите архив или ссылку на HTML-вёрстку и опишите нужные функции магазина, способы оплаты, доставки и внешние интеграции.',
	],
	[
		'question' => 'Сохранится ли исходный дизайн?',
		'answer'   => 'Да. Вёрстка становится основой кастомной темы: внешний вид и адаптив сохраняются, а статические данные заменяются динамическими данными WordPress и WooCommerce.',
	],
	[
		'question' => 'Можно ли перенести нестандартную корзину и оформление заказа?',
		'answer'   => 'Можно. Перед началом я проверю интерфейс, совместимость сценариев с WooCommerce и отдельно оценю нестандартную логику.',
	],
];
?>

<main class="transfer-service">
	<script type="application/ld+json"><?php echo wp_json_encode($service_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>

	<section class="transfer-service__hero">
		<div class="transfer-service__container transfer-service__hero-grid">
			<div>
				<p class="transfer-service__eyebrow">WordPress + WooCommerce</p>
				<h1>Перенос готовой HTML-вёрстки на WordPress и WooCommerce</h1>
				<p class="transfer-service__lead">Вёрстка уже готова? Превращу её в полноценный интернет-магазин: сохраню дизайн и адаптив, разработаю кастомную тему и подключу каталог, корзину, оформление заказа, оплату и доставку.</p>
				<div class="transfer-service__actions">
					<a class="transfer-service__button transfer-service__button--primary" href="#transfer-estimate">Получить оценку <span aria-hidden="true">→</span></a>
					<a class="transfer-service__button" href="<?php echo esc_url($contact_url); ?>">Обсудить проект</a>
				</div>
				<ul class="transfer-service__facts" aria-label="Основные преимущества">
					<li>Без повторной разработки дизайна</li>
					<li>Управление товарами из админки</li>
					<li>Готовность к развитию и SEO</li>
				</ul>
			</div>

			<div class="transfer-service__visual" aria-label="Схема переноса вёрстки">
				<div class="transfer-service__code-card">
					<span></span><span></span><span></span>
					<code>&lt;section class="catalog"&gt;</code>
					<code>&nbsp;&nbsp;&lt;article class="product"&gt;</code>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;HTML / CSS / JS</code>
					<code>&nbsp;&nbsp;&lt;/article&gt;</code>
				</div>
				<div class="transfer-service__flow"><span>Готовый frontend</span><b>→</b><span>Кастомная тема</span><b>→</b><span>WooCommerce</span></div>
			</div>
		</div>
	</section>

	<section class="transfer-service__section">
		<div class="transfer-service__container">
			<p class="transfer-service__eyebrow">Не новая тема, а ваша вёрстка</p>
			<h2>Внешний вид остаётся прежним — сайт становится динамическим</h2>
			<p class="transfer-service__intro">HTML/CSS/JS интегрируется в кастомную WordPress-тему. Товары, категории, цены и остатки переходят под управление WooCommerce, корзина начинает работать, а заказы поступают в административную панель.</p>
			<div class="transfer-service__compare">
				<article><strong>До переноса</strong><h3>Статичная вёрстка</h3><p>Готовый интерфейс без управления каталогом, заказами и клиентами.</p></article>
				<div class="transfer-service__compare-arrow" aria-hidden="true">→</div>
				<article><strong>После переноса</strong><h3>Рабочий интернет-магазин</h3><p>Ваша вёрстка с CMS, WooCommerce и понятным управлением из админки.</p></article>
			</div>
		</div>
	</section>

	<section class="transfer-service__section transfer-service__section--muted">
		<div class="transfer-service__container">
			<p class="transfer-service__eyebrow">Объём работ</p>
			<h2>Что можно подключить</h2>
			<div class="transfer-service__cards">
				<article><span>01</span><h3>Каталог и товары</h3><p>Категории, карточки, вариации, атрибуты, остатки, поиск, фильтры, избранное и сравнение.</p></article>
				<article><span>02</span><h3>Покупка и оплата</h3><p>Корзина, checkout, личный кабинет, промокоды, банковские карты и СБП.</p></article>
				<article><span>03</span><h3>Доставка и уведомления</h3><p>Расчёт доставки, пункты выдачи, статусы заказа и фирменные email-письма.</p></article>
				<article><span>04</span><h3>Интеграции</h3><p>CRM, аналитика, импорт товаров и обмен данными с внешними API.</p></article>
			</div>
		</div>
	</section>

	<section class="transfer-service__section">
		<div class="transfer-service__container transfer-service__split">
			<div>
				<p class="transfer-service__eyebrow">Почему это выгодно</p>
				<h2>Вы не оплачиваете дизайн и frontend повторно</h2>
				<p class="transfer-service__intro">Работа начинается сразу с архитектуры темы и интеграции WooCommerce. Это сокращает путь до запуска, но сохраняет качество backend-разработки и тестирования магазина.</p>
			</div>
			<div class="transfer-service__price">
				<span>Ориентир по бюджету</span>
				<strong>от 80 000 ₽</strong>
				<p>Точная стоимость зависит от количества шаблонов, checkout, фильтров, вариантов товара и интеграций.</p>
			</div>
		</div>
	</section>

	<section class="transfer-service__section transfer-service__section--muted">
		<div class="transfer-service__container">
			<p class="transfer-service__eyebrow">Этапы</p>
			<h2>Как проходит перенос</h2>
			<ol class="transfer-service__steps">
				<li><span>1</span><div><h3>Аудит вёрстки</h3><p>Проверяю комплект страниц, адаптив, JavaScript и качество исходного кода.</p></div></li>
				<li><span>2</span><div><h3>Проектирование темы</h3><p>Определяю динамические зоны, шаблоны WooCommerce и модель управления контентом.</p></div></li>
				<li><span>3</span><div><h3>Интеграция</h3><p>Собираю кастомную тему, связываю интерфейс с каталогом и подключаю сервисы.</p></div></li>
				<li><span>4</span><div><h3>Тестирование и запуск</h3><p>Проверяю адаптив, заказы, оплату, доставку, скорость и корректность системных страниц.</p></div></li>
			</ol>
		</div>
	</section>

	<section class="transfer-service__section">
		<div class="transfer-service__container">
			<p class="transfer-service__eyebrow">Вопросы</p>
			<h2>Часто спрашивают</h2>
			<div class="transfer-service__faq">
				<?php foreach ($faq as $index => $item) : ?>
					<details<?php echo 0 === $index ? ' open' : ''; ?>>
						<summary><?php echo esc_html($item['question']); ?></summary>
						<p><?php echo esc_html($item['answer']); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
			<script type="application/ld+json"><?php echo wp_json_encode([
				'@context' => 'https://schema.org',
				'@type' => 'FAQPage',
				'mainEntity' => array_map(static function ($item) {
					return ['@type' => 'Question', 'name' => $item['question'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['answer']]];
				}, $faq),
			], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
		</div>
	</section>

	<section class="transfer-service__cta" id="transfer-estimate">
		<div class="transfer-service__container transfer-service__cta-inner">
			<div><p class="transfer-service__eyebrow">Бесплатная предварительная оценка</p><h2>Пришлите готовую вёрстку</h2><p>Проверю структуру, количество шаблонов и нужные интеграции, после чего назову стоимость и срок переноса.</p></div>
			<a class="transfer-service__button transfer-service__button--primary" href="<?php echo esc_url($contact_url); ?>">Отправить проект <span aria-hidden="true">→</span></a>
		</div>
	</section>
</main>

<style>
.transfer-service{--ts-bg:#090e18;--ts-panel:#111a2a;--ts-line:rgba(255,255,255,.12);--ts-text:#f7f8fc;--ts-muted:#aab4c8;--ts-accent:#8268ff;background:var(--ts-bg);color:var(--ts-text)}
.transfer-service *{box-sizing:border-box}.transfer-service__container{width:min(1180px,calc(100% - 40px));margin:auto}.transfer-service__hero{padding:96px 0 80px;background:radial-gradient(circle at 80% 10%,rgba(49,205,255,.17),transparent 32%),radial-gradient(circle at 12% 15%,rgba(130,104,255,.24),transparent 36%)}
.transfer-service__hero-grid{display:grid;grid-template-columns:1.12fr .88fr;align-items:center;gap:68px}.transfer-service__eyebrow{margin:0 0 16px;color:#9d8dff;font-size:13px;font-weight:800;letter-spacing:.12em;text-transform:uppercase}.transfer-service h1{max-width:780px;margin:0 0 24px;font-size:clamp(38px,5.4vw,70px);line-height:1.03;letter-spacing:-.045em}.transfer-service h2{max-width:800px;margin:0 0 20px;font-size:clamp(30px,4vw,48px);line-height:1.08;letter-spacing:-.035em}.transfer-service h3{margin:8px 0;font-size:21px}.transfer-service p{color:var(--ts-muted);line-height:1.7}.transfer-service__lead{max-width:700px;margin:0;font-size:19px}.transfer-service__actions{display:flex;flex-wrap:wrap;gap:12px;margin:32px 0}.transfer-service__button{display:inline-flex;align-items:center;justify-content:center;gap:10px;min-height:52px;padding:13px 20px;border:1px solid var(--ts-line);border-radius:12px;color:#fff!important;text-decoration:none!important;font-weight:750;transition:.2s ease}.transfer-service__button:hover{transform:translateY(-2px);background:rgba(255,255,255,.06)}.transfer-service__button--primary{border-color:transparent;background:linear-gradient(135deg,#7657ff,#4e9fff);box-shadow:0 15px 40px rgba(93,91,255,.28)}
.transfer-service__facts{display:flex;flex-wrap:wrap;gap:12px 26px;margin:0;padding:0;list-style:none;color:var(--ts-muted);font-size:14px}.transfer-service__facts li:before{content:'✓';margin-right:8px;color:#6ee7b7}.transfer-service__visual{padding:18px;border:1px solid var(--ts-line);border-radius:24px;background:rgba(17,26,42,.72);box-shadow:0 28px 80px rgba(0,0,0,.35);transform:rotate(1deg)}.transfer-service__code-card{padding:22px;border-radius:16px;background:#070b12}.transfer-service__code-card>span{display:inline-block;width:8px;height:8px;margin-right:5px;border-radius:50%;background:#ff7185}.transfer-service__code-card>span:nth-child(2){background:#ffd166}.transfer-service__code-card>span:nth-child(3){background:#68e0a5}.transfer-service__code-card code{display:block;margin-top:15px;color:#a9b7d0;font-size:13px}.transfer-service__flow{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:20px 4px 2px;color:#c4ccdb;font-size:12px}.transfer-service__flow b{color:#8268ff}
.transfer-service__section{padding:88px 0}.transfer-service__section--muted{background:#0d1421}.transfer-service__intro{max-width:800px;margin:0;font-size:18px}.transfer-service__compare{display:grid;grid-template-columns:1fr auto 1fr;gap:22px;align-items:center;margin-top:38px}.transfer-service__compare article,.transfer-service__cards article,.transfer-service__price{height:100%;padding:26px;border:1px solid var(--ts-line);border-radius:18px;background:var(--ts-panel)}.transfer-service__compare strong{color:#9d8dff;font-size:13px;text-transform:uppercase}.transfer-service__compare-arrow{font-size:30px;color:#8268ff}.transfer-service__cards{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:36px}.transfer-service__cards article>span{color:#8069ef;font-weight:800}.transfer-service__cards p,.transfer-service__compare p{margin-bottom:0}.transfer-service__split{display:grid;grid-template-columns:1.4fr .6fr;gap:70px;align-items:center}.transfer-service__price span{display:block;color:var(--ts-muted)}.transfer-service__price strong{display:block;margin:8px 0;font-size:34px}.transfer-service__price p{margin:0;font-size:14px}
.transfer-service__steps{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:36px 0 0;padding:0;list-style:none}.transfer-service__steps li{display:flex;gap:18px;padding:24px;border:1px solid var(--ts-line);border-radius:18px;background:var(--ts-panel)}.transfer-service__steps li>span{display:grid;flex:0 0 40px;height:40px;place-items:center;border-radius:50%;background:rgba(130,104,255,.16);color:#a996ff;font-weight:800}.transfer-service__steps h3,.transfer-service__steps p{margin-top:0}.transfer-service__steps p{margin-bottom:0}.transfer-service__faq{display:grid;gap:12px;max-width:900px;margin-top:34px}.transfer-service__faq details{padding:20px 24px;border:1px solid var(--ts-line);border-radius:14px;background:var(--ts-panel)}.transfer-service__faq summary{cursor:pointer;font-size:18px;font-weight:750}.transfer-service__faq p{margin-bottom:0}.transfer-service__cta{padding:40px 0 90px}.transfer-service__cta-inner{display:flex;align-items:center;justify-content:space-between;gap:40px;padding:44px;border:1px solid rgba(130,104,255,.38);border-radius:24px;background:radial-gradient(circle at 10% 0,rgba(130,104,255,.22),transparent 50%),var(--ts-panel)}.transfer-service__cta h2{margin-bottom:8px}.transfer-service__cta p{max-width:720px;margin-bottom:0}
@media(max-width:960px){.transfer-service__hero-grid,.transfer-service__split{grid-template-columns:1fr}.transfer-service__hero{padding-top:68px}.transfer-service__cards{grid-template-columns:1fr 1fr}.transfer-service__visual{max-width:650px}.transfer-service__cta-inner{align-items:flex-start;flex-direction:column}}
@media(max-width:640px){.transfer-service__container{width:min(100% - 28px,1180px)}.transfer-service__hero,.transfer-service__section{padding:58px 0}.transfer-service h1{font-size:38px}.transfer-service__cards,.transfer-service__steps,.transfer-service__compare{grid-template-columns:1fr}.transfer-service__compare-arrow{transform:rotate(90deg);text-align:center}.transfer-service__flow{align-items:flex-start;flex-direction:column}.transfer-service__flow b{transform:rotate(90deg)}.transfer-service__cta-inner{padding:28px}.transfer-service__button{width:100%}}
</style>

<?php get_footer(); ?>
