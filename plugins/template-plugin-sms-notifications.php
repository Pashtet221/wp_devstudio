<?php
/**
 * Landing page for the WooCommerce SMS notifications plugin.
 *
 * @package WPDevStudio
 */

defined('ABSPATH') || exit;

$plugin_id   = get_queried_object_id();
$plugin_name = get_the_title($plugin_id) ?: 'СМС-уведомления для WooCommerce';

get_header();
?>

<main class="pluginLanding pluginLanding--sms" id="plugin-<?php echo esc_attr($plugin_id); ?>">
	<div class="pluginLanding__container">
		<nav class="pluginBreadcrumbs" aria-label="Хлебные крошки">
			<a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>→</span>
			<a href="<?php echo esc_url(home_url('/plugins/')); ?>">Плагины</a><span>→</span>
			<span><?php echo esc_html($plugin_name); ?></span>
		</nav>

		<section class="pluginHero pluginSmsHero" aria-labelledby="plugin-title">
			<div class="pluginHero__copy">
				<span class="pluginEyebrow">WordPress + WooCommerce + SMS</span>
				<h1 id="plugin-title"><?php echo esc_html($plugin_name); ?></h1>
				<p class="pluginHero__lead">Получайте заявки и важные события магазина прямо в телефоне. Плагин отправляет понятные СМС владельцу и клиенту без привязки к одному оператору.</p>
				<div class="pluginSmsTags"><span>Новый заказ</span><span>Смена статуса</span><span>Новая заявка</span><span>Произвольные события</span></div>
			</div>

			<div class="pluginSmsPhone" aria-label="Пример СМС-уведомления">
				<div class="pluginSmsPhone__speaker"></div>
				<div class="pluginSmsPhone__screen">
					<small>WPDevStudio SMS · сейчас</small>
					<strong>Новый заказ №1482</strong>
					<p>Анна, +7 999 123-45-67<br>Доставка: Москва<br>Сумма: 8 490 ₽</p>
					<span>Заказ уже появился в WooCommerce</span>
				</div>
			</div>

			<aside class="pluginOrderCard">
				<span class="pluginOrderCard__label">Подключение под ваш сайт</span>
				<div class="pluginOrderCard__price">по запросу</div>
				<p>Подберу СМС-шлюз, подключу API и настрою нужные события и шаблоны сообщений.</p>
				<a class="pluginButton" href="<?php echo esc_url(home_url('/contacts/')); ?>">Обсудить подключение</a>
				<ul class="pluginChecks"><li>Безопасное хранение API-ключа</li><li>Журнал отправки</li><li>Тестирование событий</li><li>Инструкция по работе</li></ul>
			</aside>
		</section>

		<div class="pluginContent">
			<section class="pluginSection"><span class="pluginSection__number">01</span><h2>Какие уведомления отправляет</h2>
				<div class="pluginFeatureGrid">
					<article><span>ЗАКАЗЫ</span><h3>Новый заказ владельцу</h3><p>Номер, имя, телефон, сумма и способ доставки приходят сразу после оформления.</p></article>
					<article><span>КЛИЕНТЫ</span><h3>Статус заказа покупателю</h3><p>Оплата принята, заказ собран или передан в доставку — текст зависит от статуса.</p></article>
					<article><span>ЗАЯВКИ</span><h3>Формы WordPress</h3><p>Можно подключить заявки с сайта и передать в СМС только действительно важные поля.</p></article>
					<article><span>СЦЕНАРИИ</span><h3>Свои события</h3><p>Оповещения о низком остатке, ошибке оплаты или другом событии через хуки WordPress.</p></article>
				</div>
			</section>

			<section class="pluginSection"><span class="pluginSection__number">02</span><h2>Как это работает</h2>
				<ol class="pluginSteps"><li><b>Событие</b><span>WooCommerce получает заказ или меняет его статус.</span></li><li><b>Шаблон</b><span>Плагин собирает сообщение из выбранных полей.</span></li><li><b>СМС-шлюз</b><span>Запрос безопасно уходит провайдеру по API.</span></li><li><b>Доставка</b><span>Результат записывается в журнал для проверки.</span></li></ol>
			</section>

			<section class="pluginSection pluginCompatibility"><span class="pluginSection__number">03</span><h2>Настройка без лишнего шума</h2>
				<div class="pluginCompatibility__grid"><div><span>Получатели</span><strong>Владелец, менеджеры, покупатель</strong></div><div><span>Каналы</span><strong>СМС-провайдер с HTTP API</strong></div><div><span>Магазин</span><strong>WooCommerce</strong></div><div><span>Контроль</span><strong>Логи, тестовая отправка, статусы</strong></div></div>
				<div class="pluginProse pluginCompatibility__note"><p>Плагин не отправляет данные сторонним сервисам сам по себе: провайдер и перечень полей согласуются до подключения. В сообщениях можно исключить персональные данные и оставить только номер заказа и сумму.</p></div>
			</section>
		</div>

		<section class="pluginFinalCta"><div><span>Хотите получать заказы в СМС?</span><h2>Подключу уведомления под процессы вашего магазина</h2><p>Уточним провайдера, получателей, события и тексты сообщений до начала работ.</p></div><a class="pluginButton pluginButton--light" href="<?php echo esc_url(home_url('/contacts/')); ?>">Оставить заявку</a></section>
	</div>
</main>

<?php get_footer();
