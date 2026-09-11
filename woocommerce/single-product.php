<?php
/**
 * Single plugin landing page.
 *
 * WooCommerce remains the source of the URL, content, media, price and schema,
 * while the conversion action is a consultation request instead of checkout.
 *
 * @package WPDevStudio
 */

defined('ABSPATH') || exit;

global $product;

if (!$product instanceof WC_Product) {
	$product = wc_get_product(get_the_ID());
}

if (!$product) {
	return;
}

$product_id    = $product->get_id();
$product_name  = $product->get_name();
$short         = $product->get_short_description();
$description   = get_post_field('post_content', $product_id);
$delivery_time = function_exists('get_field') ? trim((string) get_field('delivery_time', $product_id)) : '';
$delivery_time = $delivery_time ?: 'от 1 рабочего дня';
$demo_url      = function_exists('get_field') ? trim((string) get_field('demo_url', $product_id)) : '';
$requirements  = function_exists('get_field') ? (string) get_field('chto_nuzhno_dlya_zakaza', $product_id) : '';
$price         = $product->is_type('variable') ? (float) $product->get_variation_price('min', true) : (float) $product->get_price();
$price_label   = $price > 0 ? 'от ' . wp_strip_all_tags(wc_price($price)) : 'по запросу';
$image_ids     = array_values(array_unique(array_filter(array_merge([$product->get_image_id()], $product->get_gallery_image_ids()))));

$attributes = [];
foreach ($product->get_attributes() as $attribute) {
	if (!$attribute instanceof WC_Product_Attribute || !$attribute->get_visible()) {
		continue;
	}
	$values = wc_get_product_terms($product_id, $attribute->get_name(), ['fields' => 'names']);
	if (!$attribute->is_taxonomy()) {
		$values = $attribute->get_options();
	}
	if ($values) {
		$attributes[] = [
			'label'  => wc_attribute_label($attribute->get_name()),
			'values' => implode(', ', $values),
		];
	}
}

get_header('shop');
do_action('woocommerce_before_single_product');
?>

<main class="pluginLanding" id="product-<?php echo esc_attr($product_id); ?>">
	<div class="pluginLanding__container">
		<?php if (function_exists('woocommerce_breadcrumb')) : ?>
			<nav class="pluginBreadcrumbs" aria-label="Хлебные крошки">
				<?php woocommerce_breadcrumb(['delimiter' => '<span>→</span>', 'wrap_before' => '', 'wrap_after' => '']); ?>
			</nav>
		<?php endif; ?>

		<section class="pluginHero" aria-labelledby="plugin-title">
			<div class="pluginHero__copy">
				<span class="pluginEyebrow">Готовое решение для WordPress</span>
				<h1 id="plugin-title"><?php echo esc_html($product_name); ?></h1>
				<?php if ($short) : ?>
					<div class="pluginHero__lead"><?php echo wp_kses_post(wpautop($short)); ?></div>
				<?php endif; ?>
				<p class="pluginHero__service">Плагин, установка и настройка под ваш сайт</p>
				<div class="pluginHero__mobileAction">
					<strong><?php echo esc_html($price_label); ?></strong>
					<button class="pluginButton js-plugin-order-open" type="button">Заказать плагин</button>
				</div>
			</div>

			<div class="pluginGallery" data-plugin-gallery>
				<div class="pluginGallery__stage">
					<?php if ($image_ids) : ?>
						<?php foreach ($image_ids as $index => $image_id) : ?>
							<?php echo wp_get_attachment_image($image_id, 'full', false, [
								'class'   => 'pluginGallery__image' . (0 === $index ? ' is-active' : ''),
								'loading' => 0 === $index ? 'eager' : 'lazy',
								'data-plugin-slide' => $index,
							]); ?>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="pluginGallery__placeholder">Демонстрация <?php echo esc_html($product_name); ?></div>
					<?php endif; ?>
				</div>
				<?php if (count($image_ids) > 1) : ?>
					<div class="pluginGallery__thumbs" aria-label="Галерея плагина">
						<?php foreach ($image_ids as $index => $image_id) : ?>
							<button class="pluginGallery__thumb<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" data-plugin-thumb="<?php echo esc_attr($index); ?>" aria-label="Показать изображение <?php echo esc_attr($index + 1); ?>">
								<?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
							</button>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<aside class="pluginOrderCard">
				<span class="pluginOrderCard__label">Стоимость внедрения</span>
				<div class="pluginOrderCard__price"><?php echo esc_html($price_label); ?></div>
				<p>В стоимость входит установка и базовая настройка плагина.</p>
				<div class="pluginOrderCard__term"><span>Срок</span><strong><?php echo esc_html($delivery_time); ?></strong></div>
				<button class="pluginButton js-plugin-order-open" type="button">Заказать плагин</button>
				<ul class="pluginChecks">
					<li>Установка на сайт</li><li>Базовая настройка</li><li>Проверка мобильной версии</li><li>Техническая поддержка</li>
				</ul>
				<small>После заявки уточню особенности сайта и подтвержу итоговую стоимость.</small>
			</aside>
		</section>

		<div class="pluginContent">
			<section class="pluginSection">
				<span class="pluginSection__number">01</span><h2>Что делает плагин</h2>
				<div class="pluginProse"><?php echo $description ? wp_kses_post(apply_filters('the_content', $description)) : '<p>Решение расширяет возможности WordPress и настраивается с учётом особенностей вашего сайта.</p>'; ?></div>
			</section>

			<section class="pluginSection pluginSection--tint">
				<span class="pluginSection__number">02</span><h2>Что входит в стоимость</h2>
				<div class="pluginFeatureGrid">
					<article><span>01</span><h3>Проверка сайта</h3><p>Проверю тему, версии WordPress, PHP и ключевых плагинов.</p></article>
					<article><span>02</span><h3>Установка</h3><p>Установлю решение без нарушения текущей работы сайта.</p></article>
					<article><span>03</span><h3>Настройка</h3><p>Настрою плагин под вашу задачу и внешний вид проекта.</p></article>
					<article><span>04</span><h3>Тестирование</h3><p>Проверю результат на компьютере и мобильных устройствах.</p></article>
				</div>
			</section>

			<section class="pluginSection">
				<span class="pluginSection__number">03</span><h2>Как проходит подключение</h2>
				<ol class="pluginSteps"><li><b>Заявка</b><span>Вы оставляете контакт и адрес сайта.</span></li><li><b>Проверка</b><span>Я проверяю совместимость и уточняю детали.</span></li><li><b>Установка</b><span>Устанавливаю и настраиваю решение.</span></li><li><b>Готово</b><span>Тестируем результат и передаём готовый функционал.</span></li></ol>
			</section>

			<section class="pluginSection pluginCompatibility">
				<span class="pluginSection__number">04</span><h2>Совместимость</h2>
				<div class="pluginCompatibility__grid">
					<div><span>Платформа</span><strong>WordPress</strong></div>
					<?php foreach ($attributes as $attribute) : ?><div><span><?php echo esc_html($attribute['label']); ?></span><strong><?php echo esc_html($attribute['values']); ?></strong></div><?php endforeach; ?>
				</div>
				<?php if ($requirements) : ?><div class="pluginProse pluginCompatibility__note"><?php echo wp_kses_post(apply_filters('the_content', $requirements)); ?></div><?php endif; ?>
				<?php if ($demo_url) : ?><a class="pluginTextLink" href="<?php echo esc_url($demo_url); ?>" target="_blank" rel="noopener noreferrer">Открыть демонстрацию <span>↗</span></a><?php endif; ?>
			</section>

			<?php if (function_exists('have_rows') && have_rows('faq', $product_id)) : ?>
				<section class="pluginSection"><span class="pluginSection__number">05</span><h2>Частые вопросы</h2><div class="pluginFaq">
					<?php while (have_rows('faq', $product_id)) : the_row(); $question = get_sub_field('vopros'); $answer = get_sub_field('otvet'); if (!$question) { continue; } ?>
						<details><summary><?php echo esc_html($question); ?><span>+</span></summary><div class="pluginProse"><?php echo wp_kses_post(apply_filters('the_content', $answer)); ?></div></details>
					<?php endwhile; ?>
				</div></section>
			<?php endif; ?>

			<?php $related_ids = wc_get_related_products($product_id, 4); if ($related_ids) : ?>
				<section class="pluginSection"><span class="pluginSection__number">06</span><h2>Другие готовые решения</h2><div class="pluginRelated">
					<?php foreach ($related_ids as $related_id) : $related = wc_get_product($related_id); if (!$related) { continue; } ?>
						<a href="<?php echo esc_url(get_permalink($related_id)); ?>"><div class="pluginRelated__image"><?php echo $related->get_image('woocommerce_thumbnail'); ?></div><span>WordPress-плагин</span><h3><?php echo esc_html($related->get_name()); ?></h3><b><?php echo wp_kses_post($related->get_price_html()); ?></b></a>
					<?php endforeach; ?>
				</div></section>
			<?php endif; ?>
		</div>

		<section class="pluginFinalCta">
			<div><span>Нужен этот плагин на вашем сайте?</span><h2>Установлю и настрою <?php echo esc_html($product_name); ?></h2><p>Расскажите о сайте — отвечу, проверю совместимость и назову точную стоимость.</p></div>
			<button class="pluginButton pluginButton--light js-plugin-order-open" type="button">Оставить заявку</button>
		</section>
	</div>
</main>

<div class="pluginModal" id="pluginOrderModal" aria-hidden="true">
	<div class="pluginModal__backdrop" data-plugin-order-close></div>
	<div class="pluginModal__dialog" role="dialog" aria-modal="true" aria-labelledby="plugin-order-title">
		<button class="pluginModal__close" type="button" data-plugin-order-close aria-label="Закрыть">×</button>
		<span class="pluginEyebrow">Заявка на готовое решение</span>
		<h2 id="plugin-order-title">Заказать <?php echo esc_html($product_name); ?></h2>
		<p>Свяжусь с вами для уточнения деталей установки и настройки.</p>
		<form class="pluginOrderForm" data-plugin-order-form>
			<input type="hidden" name="action" value="wpds_plugin_request">
			<input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('wpds_plugin_request')); ?>">
			<input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>">
			<input type="hidden" name="product_name" value="<?php echo esc_attr($product_name); ?>">
			<input type="hidden" name="page_url" value="<?php echo esc_url(get_permalink($product_id)); ?>">
			<label>Имя <input type="text" name="name" autocomplete="name" required></label>
			<label>Телефон / Telegram <input type="text" name="contact" autocomplete="tel" required></label>
			<label>Email <input type="email" name="email" autocomplete="email" required></label>
			<label>Адрес сайта <span>необязательно</span><input type="url" name="website" placeholder="https://"></label>
			<label>Комментарий <span>необязательно</span><textarea name="comment" rows="4"></textarea></label>
			<label class="pluginOrderForm__trap" aria-hidden="true">Компания <input type="text" name="company" tabindex="-1" autocomplete="off"></label>
			<button class="pluginButton" type="submit">Отправить заявку</button>
			<div class="pluginOrderForm__status" aria-live="polite"></div>
		</form>
	</div>
</div>

<?php
do_action('woocommerce_after_single_product');
get_footer('shop');
