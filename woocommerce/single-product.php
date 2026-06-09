<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<section class="kworkPage">
  <div class="kworkContainer">

    <!-- TOP -->
    <div class="kworkTop">
      <?php if (function_exists('woocommerce_breadcrumb')) : ?>
  <nav class="kworkCrumbs" aria-label="Хлебные крошки">
    <?php
      woocommerce_breadcrumb([
        'delimiter'   => '<span>/</span>',
        'wrap_before' => '',
        'wrap_after'  => '',
        'before'      => '',
        'after'       => '',
        'home'        => 'Главная',
      ]);
    ?>
  </nav>
<?php endif; ?>

      <?php
global $product;
if (!$product || !is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}

$avg   = 0;
$count = 0;

if ($product) {
  $avg   = (float) $product->get_average_rating();
  $count = (int) $product->get_review_count();
}

// fallback если отзывов ещё нет
$display_avg   = $avg > 0 ? number_format($avg, 1) : '0.0';
$display_count = $count;
?>

<div class="kworkTitleRow">
  <h1 class="kworkTitle"><?php echo esc_html(get_the_title()); ?></h1>

  <div class="kworkRating" aria-label="Рейтинг <?php echo esc_attr($display_avg); ?> из 5">

    <div class="kworkStars" aria-hidden="true">
      <?php
      // если Woo умеет — используем его разметку
      if (function_exists('wc_get_rating_html') && $avg > 0) {
        echo wc_get_rating_html($avg);
      } else {
        echo '★★★★★';
      }
      ?>
    </div>

    <div class="kworkRatingMeta">
      <b><?php echo esc_html($display_avg); ?></b>
      <span class="kworkDot">•</span>
      <a class="kworkRatingLink" href="#reviews">
        <?php echo esc_html(
          sprintf(
            _n('%s отзыв', '%s отзывов', $display_count, 'woocommerce'),
            $display_count
          )
        ); ?>
      </a>
    </div>

  </div>
</div>

    </div>

    <!-- GRID -->
    <div class="kworkGrid">

      <!-- LEFT -->
      <main class="kworkLeft">

<?php
global $product;
if (!$product || !is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}
if (!$product) return;

$items = [];

/** 1) Видео VK из ACF — field name: product_youtube_video */
$video_url = '';
if (function_exists('get_field')) {
  $video_url = trim((string) get_field('product_youtube_video', get_the_ID()));
}

// Legacy fallback: поддерживаем старое meta-поле, если ACF ещё не заполнено.
if (!$video_url) {
  $video_url = trim((string) get_post_meta(get_the_ID(), 'product_video', true));
}

if ($video_url) {
  $items[] = [
    'type' => 'video',
    'url'  => $video_url,
    'thumb'=> '',
    'title'=> 'Видео товара',
  ];
}

/** 2) Изображения: featured + gallery */
$featured_id = (int) $product->get_image_id();
$gallery_ids = (array) $product->get_gallery_image_ids();

$img_ids = [];
if ($featured_id) $img_ids[] = $featured_id;
if (!empty($gallery_ids)) $img_ids = array_merge($img_ids, $gallery_ids);
$img_ids = array_values(array_unique(array_filter(array_map('intval', $img_ids))));

foreach ($img_ids as $id) {
  $full  = wp_get_attachment_image_url($id, 'full');
  $thumb = wp_get_attachment_image_url($id, 'thumbnail');
  if (!$full) continue;

  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
  if (!$alt) $alt = get_the_title($id);

  $items[] = [
    'type'  => 'image',
    'full'  => $full,
    'thumb' => $thumb ?: $full,
    'alt'   => $alt,
  ];
}

/** Фолбэк если вообще нет картинок */
if (empty($items)) {
  $items[] = [
    'type'  => 'image',
    'full'  => '',
    'thumb' => '',
    'alt'   => get_the_title(),
  ];
}

/** Если видео есть, но thumb пустой — делаем thumb из featured */
if (!empty($items) && $items[0]['type'] === 'video' && empty($items[0]['thumb'])) {
  if ($featured_id) {
    $items[0]['thumb'] = wp_get_attachment_image_url($featured_id, 'thumbnail');
  }
}
?>

<div class="kworkCover">
  <div class="kworkGallery" data-kwork-gallery>

    <!-- MAIN -->
    <div class="kworkGalleryMain" aria-label="Галерея товара">
      <?php foreach ($items as $i => $it) : ?>
        <div class="kworkSlide <?php echo $i === 0 ? 'is-active' : ''; ?>" data-slide="<?php echo esc_attr($i); ?>">
          <?php if ($it['type'] === 'image') : ?>

            <?php if (!empty($it['full'])) : ?>
              <img
                src="<?php echo esc_url($it['full']); ?>"
                alt="<?php echo esc_attr($it['alt'] ?? ''); ?>"
                loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
              />
            <?php else: ?>
              <div class="kworkSlideFallback">
                <?php echo esc_html(get_the_title()); ?>
              </div>
            <?php endif; ?>

          <?php else: ?>
            <?php
              $url = $it['url'];
              $embed_html = '';

              // VK Video
              if (function_exists('wpds_vk_video_embed_url') && wpds_vk_video_embed_url($url)) {
                $embed_html = '<iframe loading="lazy" src="' . esc_url(wpds_vk_video_embed_url($url)) . '" title="VK video" frameborder="0" allow="autoplay; encrypted-media; fullscreen; picture-in-picture; screen-wake-lock;" allowfullscreen></iframe>';
              }
              // Vimeo
              else if (preg_match('~vimeo\.com/(\d+)~i', $url, $m)) {
                $vm_id = $m[1];
                $embed_html = '<iframe loading="lazy" src="https://player.vimeo.com/video/' . esc_attr($vm_id) . '" title="Vimeo video" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
              }
              // mp4/webm/ogg
              else if (preg_match('~\.(mp4|webm|ogg)(\?.*)?$~i', $url)) {
                $embed_html = '<video controls preload="metadata"><source src="' . esc_url($url) . '"></video>';
              }
              // oEmbed
              else {
                $oembed = wp_oembed_get($url);
                if ($oembed) $embed_html = $oembed;
              }
            ?>

            <div class="kworkVideoWrap">
              <?php echo $embed_html ? $embed_html : '<div class="kworkSlideFallback">Видео недоступно</div>'; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>

      <button class="kworkNav kworkNav--prev" type="button" aria-label="Предыдущее" data-kwork-prev>‹</button>
      <button class="kworkNav kworkNav--next" type="button" aria-label="Следующее" data-kwork-next>›</button>
    </div>

    <!-- THUMBS -->
    <div class="kworkGalleryThumbs" aria-label="Миниатюры">
      <?php foreach ($items as $i => $it) : ?>
        <?php
          $thumb = '';
          if ($it['type'] === 'image') $thumb = $it['thumb'] ?? $it['full'] ?? '';
          else $thumb = $it['thumb'] ?? '';
        ?>
        <button
          class="kworkThumb <?php echo $i === 0 ? 'is-active' : ''; ?>"
          type="button"
          data-kwork-thumb="<?php echo esc_attr($i); ?>"
          aria-label="<?php echo $it['type'] === 'video' ? 'Видео' : 'Изображение ' . ($i+1); ?>"
        >
          <?php if ($thumb) : ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" />
          <?php else: ?>
            <span class="kworkThumbFallback"><?php echo $it['type'] === 'video' ? '▶' : '•'; ?></span>
          <?php endif; ?>

          <?php if ($it['type'] === 'video') : ?>
            <span class="kworkThumbPlay" aria-hidden="true">▶</span>
          <?php endif; ?>
        </button>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<style>
/* ===== Gallery (no red, no overlay text, taller main) ===== */

.kworkCover{
  border-radius: var(--radius2);
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
  margin-bottom: var(--gap);
  background: transparent;
}

.kworkGallery{
  display: grid;
  gap: 12px;
  padding: 0; /* чтобы главное изображение выглядело больше */
}

.kworkGalleryMain{
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  min-height: 440px; /* ↑ больше по высоте */
  background: rgba(255,255,255,.03);
  border: 1px solid var(--border);
}

.kworkSlide{
  position: absolute;
  inset: 0;
  opacity: 0;
  pointer-events: none;
  transition: opacity .22s ease;
}
.kworkSlide.is-active{
  opacity: 1;
  pointer-events: auto;
}

.kworkSlide img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Видео */
.kworkVideoWrap,
.kworkVideoWrap iframe,
.kworkVideoWrap video{
  width: 100%;
  height: 100%;
}
.kworkVideoWrap iframe{ border: 0; }
.kworkVideoWrap video{
  object-fit: cover;
  background: #000;
}

.kworkSlideFallback{
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--muted);
  padding: 18px;
  text-align: center;
}

/* Nav */
.kworkNav{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 42px;
  height: 42px;
  border-radius: 16px;
  border: 1px solid var(--border);
  background: rgba(0,0,0,.28);
  color: rgba(255,255,255,.92);
  cursor: pointer;
  z-index: 5;
}
.kworkNav:hover{ background: rgba(0,0,0,.38); }
.kworkNav--prev{ left: 10px; }
.kworkNav--next{ right: 10px; }

/* Thumbs */
.kworkGalleryThumbs{
  display: flex;
  gap: 10px;
  overflow: auto;
  padding: 2px 2px 6px;
}

.kworkThumb{
  position: relative;
  width: 92px;
  height: 62px;
  flex: 0 0 auto;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.06);
  cursor: pointer;
  padding: 0;
}

.kworkThumb img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  opacity: .92;
}

.kworkThumb.is-active{
  border-color: rgba(224,27,36,.55);
  box-shadow: 0 10px 22px rgba(0,0,0,.25);
}

.kworkThumbPlay{
  position: absolute;
  inset: auto 8px 8px auto;
  width: 20px;
  height: 20px;
  border-radius: 8px;
  background: rgba(0,0,0,.45);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  color: rgba(255,255,255,.92);
}

.kworkThumbFallback{
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--muted);
}

/* Responsive */
@media (max-width: 1024px){
  .kworkGalleryMain{ min-height: 360px; }
}
@media (max-width: 560px){
  .kworkGalleryMain{ min-height: 280px; }
  .kworkThumb{ width: 82px; height: 56px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const root = document.querySelector('[data-kwork-gallery]');
  if (!root) return;

  const slides = Array.from(root.querySelectorAll('.kworkSlide'));
  const thumbs = Array.from(root.querySelectorAll('[data-kwork-thumb]'));
  const prevBtn = root.querySelector('[data-kwork-prev]');
  const nextBtn = root.querySelector('[data-kwork-next]');

  let index = 0;

  function stopActiveVideo() {
    const active = slides[index];
    if (!active) return;

    const video = active.querySelector('video');
    if (video) video.pause();

    const iframe = active.querySelector('iframe');
    if (iframe) {
      const src = iframe.getAttribute('src');
      iframe.setAttribute('src', src);
    }
  }

  function setActive(i) {
    if (!slides.length) return;

    if (i < 0) i = slides.length - 1;
    if (i >= slides.length) i = 0;

    stopActiveVideo();

    slides.forEach(s => s.classList.remove('is-active'));
    thumbs.forEach(t => t.classList.remove('is-active'));

    index = i;

    if (slides[index]) slides[index].classList.add('is-active');
    const t = root.querySelector('[data-kwork-thumb="' + index + '"]');
    if (t) t.classList.add('is-active');
  }

  thumbs.forEach(btn => {
    btn.addEventListener('click', () => setActive(parseInt(btn.dataset.kworkThumb, 10)));
  });

  if (prevBtn) prevBtn.addEventListener('click', () => setActive(index - 1));
  if (nextBtn) nextBtn.addEventListener('click', () => setActive(index + 1));

  setActive(0);
});
</script>


		  
		  
	<?php
$demo_url = function_exists('get_field') ? get_field('demo_url') : '';
?>

<?php if ($demo_url): ?>
  <div class="plugin-demo-box">
    <div class="plugin-demo-info">
      <div class="plugin-demo-title">Live demo</div>
      <div class="plugin-demo-subtitle">
        Протестируйте плагин в реальной админке WordPress
      </div>
    </div>

    <a
      href="<?php echo esc_url($demo_url); ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="btn-demo"
    >
      Открыть демо
      <span class="btn-demo-arrow">→</span>
    </a>
  </div>

  <div class="plugin-demo-note">
    Тестовая среда. Изменения периодически сбрасываются.
  </div>
<?php endif; ?>

<style>
	/* ===============================
   DEMO BLOCK (DARK THEME)
================================ */
.btn-demo--static{
	/* ПОЛНОСТЬЮ НЕИНТЕРАКТИВНО */
  cursor: default !important;
  pointer-events: none !important;
  user-select: none;	
}
	
.plugin-demo-box {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;

  padding: 20px 22px;
  margin-top: 28px;

  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;

  background: linear-gradient(
    180deg,
    rgba(255,255,255,0.04),
    rgba(255,255,255,0.01)
  );
}

/* INFO */
.plugin-demo-info {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.plugin-demo-title {
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.55);
}

.plugin-demo-subtitle {
  font-size: 15px;
  line-height: 1.5;
  color: rgba(255,255,255,0.9);
  max-width: 420px;
}

/* BUTTON */
.btn-demo {
  display: inline-flex;
  align-items: center;
  gap: 10px;

  padding: 12px 20px;
  border-radius: 12px;

  font-size: 15px;
  font-weight: 500;

  background: #ffffff;
  color: #0e0e0e;
  text-decoration: none;

  transition: all 0.25s ease;
  white-space: nowrap;
}

.btn-demo-arrow {
  font-size: 16px;
  transition: transform 0.25s ease;
}

/* HOVER */
.btn-demo:hover {
  background: #f2f2f2;
  transform: translateY(-1px);
}

.btn-demo:hover .btn-demo-arrow {
  transform: translateX(4px);
}

/* NOTE */
.plugin-demo-note {
  margin-top: 10px;
  padding-left: 6px;

  font-size: 13px;
  line-height: 1.5;
  color: rgba(255,255,255,0.45);
}

.plugin-demo-note::before {
  content: "•";
  margin-right: 8px;
  opacity: 0.6;
}

/* MOBILE */
@media (max-width: 640px) {
  .plugin-demo-box {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
  }

  .btn-demo {
    width: 100%;
    justify-content: center;
  }
}
</style>
		  
		  
		  

        <!-- ABOUT -->
        <section class="kworkCard">
          <h2 class="kworkH2">Об этой услуге</h2>
         
            <?php
global $product;
if (!$product || !is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}

// short description = "Краткое описание" в товаре
$short = $product ? $product->get_short_description() : '';

// full description = основное описание (контент товара)
$full  = apply_filters('the_content', get_post_field('post_content', get_the_ID()));
?>

<div class="kworkProse">
  <?php
  // 1) Краткое описание (если заполнено)
  if (!empty(trim(wp_strip_all_tags($short)))) {
    echo wp_kses_post(wpautop($short));
  }

  // 2) Полное описание (если заполнено)
  if (!empty(trim(wp_strip_all_tags($full)))) {
    echo wp_kses_post($full);
  }

  // 3) Фолбэк, если пусто (чтобы блок не был пустым)
  if (empty(trim(wp_strip_all_tags($short))) && empty(trim(wp_strip_all_tags($full)))) {
    echo '<p>Описание товара пока не заполнено.</p>';
  }
  ?>
</div>

    
      
        </section>

        <!-- REQUIREMENTS -->
<section class="kworkCard">
  <h2 class="kworkH2">Что нужно для заказа</h2>
  <div class="kworkProse">
    <?php
      $requirements = '';

      if (function_exists('get_field')) {
        $requirements = get_field('chto_nuzhno_dlya_zakaza'); // ACF WYSIWYG
      }

      // Если поле пустое — фолбэк, чтобы блок не был пустым
      if (empty(trim(wp_strip_all_tags((string)$requirements)))) {
        $requirements = '<ul>
          <li>Кратко опиши задачу и ожидаемый результат</li>
          <li>Версии WordPress и PHP</li>
          <li>Список ключевых плагинов</li>
          <li>Тема/конструктор (Elementor и т. п.)</li>
          <li>Ссылка на сайт или тестовый доступ (если нужно)</li>
        </ul>';
      }

      /**
       * Важно:
       * - WYSIWYG в ACF обычно уже возвращает HTML
       * - apply_filters('the_content', ...) добавит wpautop и обработает shortcodes
       * - wp_kses_post оставит только безопасные теги
       */
      echo wp_kses_post(apply_filters('the_content', $requirements));
    ?>
  </div>
</section>


 <?php if (function_exists('have_rows') && have_rows('faq')) : ?>
<section class="kworkCard">
  <h2 class="kworkH2">FAQ</h2>

  <div class="kworkFaq">
    <?php
    $i = 0;
    while (have_rows('faq')) : the_row();
      $question = get_sub_field('vopros');
      $answer   = get_sub_field('otvet');

      if (empty(trim($question)) && empty(trim(wp_strip_all_tags($answer)))) {
        continue;
      }

      $is_open = ($i === 0); // первый открыт
    ?>
      <details class="kworkFaqItem" <?php echo $is_open ? 'open' : ''; ?>>
        <summary><?php echo esc_html($question); ?></summary>

        <div class="kworkProse">
          <?php echo wp_kses_post(apply_filters('the_content', $answer)); ?>
        </div>
      </details>
    <?php
      $i++;
    endwhile;
    ?>
  </div>
</section>
<?php endif; ?>


        <!-- REVIEWS -->
<?php
global $product;
if (!$product || !is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}
if (!$product) return;

$product_id = $product->get_id();

// Сколько отзывов выводить
$reviews_per_page = 6;

// Берём отзывы (comments типа review)
$comments = get_comments([
  'post_id' => $product_id,
  'status'  => 'approve',
  'type'    => 'review',
  'number'  => $reviews_per_page,
  'orderby' => 'comment_date_gmt',
  'order'   => 'DESC',
]);

$total_reviews = (int) get_comments([
  'post_id' => $product_id,
  'status'  => 'approve',
  'type'    => 'review',
  'count'   => true,
]);

$ratings_enabled = function_exists('wc_review_ratings_enabled') ? wc_review_ratings_enabled() : false;
?>

<section class="kworkCard" id="reviews">
  <div class="kworkReviewsTop">
    <h2 class="kworkH2">Отзывы</h2>

    <button class="kworkBtn kworkBtn--ghost kworkBtn--inline" type="button" data-review-open>
      Оставить отзыв
    </button>
  </div>

  <div class="kworkReviews">

    <?php if (!empty($comments)) : ?>
      <?php foreach ($comments as $c) :
        $author = $c->comment_author ? $c->comment_author : 'Пользователь';
        $date_human = human_time_diff(strtotime($c->comment_date_gmt), current_time('timestamp', true)) . ' назад';
        $rating = (int) get_comment_meta($c->comment_ID, 'rating', true);

        // Инициалы
        $initials = mb_substr($author, 0, 2, 'UTF-8');
        $initials = mb_strtoupper($initials, 'UTF-8');
      ?>
        <article class="kworkReview">
          <div class="kworkReviewHead">
            <div class="kworkAvatar"><?php echo esc_html($initials); ?></div>

            <div class="kworkReviewMeta">
              <div class="kworkReviewName"><?php echo esc_html($author); ?></div>
              <div class="kworkReviewSub"><?php echo esc_html($date_human); ?></div>
            </div>

            <?php if ($ratings_enabled && $rating > 0) : ?>
              <div class="kworkReviewStars" aria-label="<?php echo esc_attr($rating . ' из 5'); ?>">
                <?php echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="kworkReviewBody">
            <?php echo wp_kses_post(wpautop($c->comment_content)); ?>
          </div>
        </article>
      <?php endforeach; ?>

    <?php else: ?>
      <div class="kworkEmpty">
        Пока нет отзывов. Будьте первым — это поможет другим выбрать решение.
      </div>
    <?php endif; ?>

  </div>

  <?php if ($total_reviews > $reviews_per_page) : ?>
    <a class="kworkBtn kworkBtn--ghost" href="<?php echo esc_url(get_permalink($product_id) . '#reviews'); ?>">
      Показать ещё
    </a>
  <?php endif; ?>
</section>

<!-- POPUP: оставить отзыв -->
<div class="kworkModal" id="kworkReviewModal" aria-hidden="true">
  <div class="kworkModal__overlay" data-review-close></div>

  <div class="kworkModal__panel" role="dialog" aria-modal="true" aria-label="Оставить отзыв">
    <button class="kworkModal__close" type="button" aria-label="Закрыть" data-review-close>✕</button>

    <div class="kworkModal__head">
      <div class="kworkModal__title">Оставить отзыв</div>
      <div class="kworkModal__sub"><?php echo esc_html(get_the_title($product_id)); ?></div>
    </div>

    <div class="kworkModal__body">
      <?php
      /**
       * WooCommerce форма отзывов.
       * Важно: она отправляет обычный комментарий (review) и Woo сам сохранит rating.
       */
      if (comments_open($product_id)) :
        // Перед выводом формы Woo ожидает глобалы:
        global $post;
        $post = get_post($product_id);
        setup_postdata($post);

        // Выводим стандартный template comments Woo, но только форму:
        // 1) Заготовим поля comment_form
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = $req ? " aria-required='true'" : "";

        $fields = [
          'author' =>
            '<p class="comment-form-author">
              <label for="author">Имя' . ($req ? ' <span class="required">*</span>' : '') . '</label>
              <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />
            </p>',
          'email' =>
            '<p class="comment-form-email">
              <label for="email">Email' . ($req ? ' <span class="required">*</span>' : '') . '</label>
              <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />
            </p>',
        ];

        $comment_field = '';

        if ($ratings_enabled) {
          $comment_field .=
            '<p class="comment-form-rating">
              <label for="rating">Оценка</label>
              <select name="rating" id="rating" required>
                <option value="">Выберите...</option>
                <option value="5">5 — Отлично</option>
                <option value="4">4 — Хорошо</option>
                <option value="3">3 — Нормально</option>
                <option value="2">2 — Плохо</option>
                <option value="1">1 — Очень плохо</option>
              </select>
            </p>';
        }

        $comment_field .=
          '<p class="comment-form-comment">
            <label for="comment">Отзыв</label>
            <textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
          </p>';

        comment_form([
          'title_reply'          => '',
          'title_reply_to'       => '',
          'label_submit'         => 'Отправить отзыв',
          'comment_notes_before' => '',
          'comment_notes_after'  => '',
          'logged_in_as'         => '',
          'fields'               => $fields,
          'comment_field'        => $comment_field,
          'class_form'           => 'kworkReviewForm',
          'class_submit'         => 'kworkBtn kworkBtn--primary',
        ], $product_id);

        wp_reset_postdata();
      else: ?>
        <div class="kworkEmpty">Отзывы для этого товара отключены.</div>
      <?php endif; ?>
    </div>
  </div>
</div>

<style>
/* Верхняя строка "Отзывы" + кнопка */
.kworkReviewsTop{
  display:flex;
  align-items:center;
  justify-content: space-between;
  gap:12px;
  margin-bottom: 10px;
}
.kworkBtn--inline{
  width: auto;
  height: 40px;
  padding: 0 14px;
  border-radius: 14px;
}

/* Пустое состояние */
.kworkEmpty{
  color: var(--muted);
  border: 1px solid var(--border);
  background: rgba(255,255,255,.04);
  border-radius: 16px;
  padding: 14px;
}

/* Modal */
.kworkModal{
  position: fixed;
  inset: 0;
  z-index: 9999;
  display: none;
}
.kworkModal.is-open{ display:block; }

.kworkModal__overlay{
  position:absolute;
  inset:0;
  background: rgba(0,0,0,.62);
  backdrop-filter: blur(6px);
}

.kworkModal__panel{
  position:absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: min(720px, calc(100% - 24px));
  border-radius: 22px;
  border: 1px solid var(--border);
  background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.06));
  box-shadow: var(--shadow);
  overflow: hidden;
}

.kworkModal__close{
  position:absolute;
  right: 12px;
  top: 12px;
  width: 40px;
  height: 40px;
  border-radius: 14px;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.06);
  color: rgba(255,255,255,.92);
  cursor:pointer;
}

.kworkModal__head{
  padding: 18px 18px 10px;
}
.kworkModal__title{
  font-size: 18px;
  font-weight: 850;
  letter-spacing: -0.01em;
}
.kworkModal__sub{
  margin-top: 4px;
  font-size: 13px;
  color: var(--muted2);
}

.kworkModal__body{
  padding: 0 18px 18px;
}

/* Form styling */
.kworkReviewForm p{
  margin: 10px 0;
}
.kworkReviewForm label{
  display:block;
  font-size: 13px;
  color: var(--muted2);
  margin-bottom: 6px;
}
.kworkReviewForm input,
.kworkReviewForm textarea,
.kworkReviewForm select{
  width: 100%;
  border-radius: 14px;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.05);
  color: rgba(255,255,255,.92);
  padding: 10px 12px;
  outline: none;
}
.kworkReviewForm textarea{ resize: vertical; min-height: 120px; }
.kworkReviewForm select{ height: 44px; }

.kworkReviewForm .kworkBtn{
  margin-top: 6px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const modal = document.getElementById('kworkReviewModal');
  const openBtn = document.querySelector('[data-review-open]');
  const closeEls = document.querySelectorAll('[data-review-close]');

  function openModal(){
    if (!modal) return;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.documentElement.style.overflow = 'hidden';
  }

  function closeModal(){
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.documentElement.style.overflow = '';
  }

  if (openBtn) openBtn.addEventListener('click', openModal);
  closeEls.forEach(el => el.addEventListener('click', closeModal));

  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') closeModal();
  });
});
</script>

		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  

        <!-- SIMILAR -->
        <?php
global $product;
if (!$product || !is_a($product, 'WC_Product')) return;

$product_id = $product->get_id();

/**
 * Получаем похожие товары (по категориям)
 */
$related_ids = wc_get_related_products($product_id, 3);

if (!empty($related_ids)) :
?>

<section class="kworkCard">
  <h2 class="kworkH2">Похожие услуги</h2>

  <div class="kworkGridCards">

    <?php foreach ($related_ids as $related_id) :
      $related = wc_get_product($related_id);
      if (!$related) continue;

      $link  = get_permalink($related_id);
      $title = $related->get_name();

      // Цена
      if ($related->is_type('variable')) {
        $price_html = $related->get_price_html();
      } else {
        $price_html = wc_price($related->get_price());
      }

      // Миниатюра
      $thumb_id = $related->get_image_id();
      $thumb = $thumb_id
        ? wp_get_attachment_image_url($thumb_id, 'medium')
        : wc_placeholder_img_src();

      // Срок (если есть ACF поле delivery_time)
      $delivery = '';
      if (function_exists('get_field')) {
        $delivery = get_field('delivery_time', $related_id);
      }
    ?>

      <a class="kworkMiniCard" href="<?php echo esc_url($link); ?>">
        <div class="kworkMiniThumb">
          <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
        </div>

        <div class="kworkMiniTitle">
          <?php echo esc_html($title); ?>
        </div>

        <div class="kworkMiniMeta">
          <b><?php echo wp_kses_post($price_html); ?></b>
          <?php if ($delivery): ?>
            • <?php echo esc_html($delivery); ?>
          <?php endif; ?>
        </div>
      </a>

    <?php endforeach; ?>

  </div>
</section>

<?php endif; ?>

<style>
	/* карточка */
.kworkMiniCard {
  display: block;
  border: 1px solid var(--border);
  border-radius: 18px;
  overflow: hidden;
  background: rgba(255,255,255,.05);
  transition: transform .15s ease, border-color .15s ease;
}

.kworkMiniCard:hover {
  transform: translateY(-2px);
  border-color: rgba(224,27,36,.4);
}

/* контейнер изображения */
.kworkMiniThumb {
  position: relative;
  width: 100%;
  height: 120px; /* ✅ ГЛАВНОЕ — фиксируем высоту */
  overflow: hidden;
  border-bottom: 1px solid var(--border);
  background: rgba(255,255,255,.04);
}

/* само изображение */
.kworkMiniThumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;   /* аккуратная обрезка */
  display: block;
}

/* текст */
.kworkMiniTitle {
  font-weight: 700;
  font-size: 14px;
  line-height: 1.3;
  padding: 10px 12px 4px;
  color: rgba(255,255,255,.95);
}

.kworkMiniMeta {
  padding: 0 12px 12px;
  font-size: 13px;
  color: var(--muted2);
}

.kworkMiniMeta b {
  color: rgba(255,255,255,.9);
}

</style>
		  
		  
		  
		  
		  

      </main>

      <!-- RIGHT -->
      <aside class="kworkRight">

       <?php
global $product;

if (!$product || !is_a($product, 'WC_Product')) return;

// Получаем вариации
$available_variations = $product->is_type('variable')
  ? $product->get_available_variations()
  : [];

// Атрибуты
$attributes = $product->get_attributes();
$addons_raw = isset($attributes['addons']) ? $attributes['addons']->get_options() : [];
?>

<div class="kworkOrderCard" data-product-id="<?php echo esc_attr($product->get_id()); ?>">

  <!-- PRICE -->
  <div class="kworkOrderTop">
    <div class="kworkOrderPrice">
      <span class="kworkOrderPriceLabel">Стоимость</span>
      <span class="kworkOrderPriceValue" id="kwork-price">
        <?php echo wp_kses_post($product->get_price_html()); ?>
      </span>
    </div>

    <div class="kworkOrderBadge">
      <?php echo esc_html($product->is_type('variable') ? 'Выберите пакет' : 'Готово'); ?>
    </div>
  </div>

 <?php
// Safety
global $product;
if (!$product || !is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}
if (!$product) return;

// Вариации
$available_variations = $product->is_type('variable') ? $product->get_available_variations() : [];

// Допы (атрибут addons: "Установка (+500)" и т.п.)
$attributes = $product->get_attributes();
$addons_raw = [];
if (!empty($attributes['addons']) && is_object($attributes['addons'])) {
  $addons_raw = $attributes['addons']->get_options();
}
?>

<!-- ПАКЕТЫ -->
<?php if ($product->is_type('variable') && !empty($available_variations)) : ?>
  <?php
    // Default attributes товара (если ты их выставил в админке)
    $default_attrs = $product->get_default_attributes(); // например ['pa_paket' => 'standart']
  ?>

  <div class="kworkOptionGroup">
    <div class="kworkOptionTitle">Пакет</div>

    <div class="kworkPackages" id="kworkPackages">
      <?php foreach ($available_variations as $index => $variation) :

        $variation_id = (int) $variation['variation_id'];
        $attrs = isset($variation['attributes']) && is_array($variation['attributes']) ? $variation['attributes'] : [];

        // Берём первый атрибут вариации (обычно пакет один) — если их несколько, скажи, сделаю по конкретному ключу.
        $attr_key = $attrs ? array_key_first($attrs) : '';
        $attr_val = ($attr_key && isset($attrs[$attr_key])) ? (string) $attrs[$attr_key] : '';

        // Определяем человеко-понятный label
        $label = '';

        // taxonomy attribute: attribute_pa_paket -> taxonomy pa_paket
        if ($attr_key && strpos($attr_key, 'attribute_pa_') === 0) {
          $tax = str_replace('attribute_', '', $attr_key); // pa_paket
          $term = get_term_by('slug', $attr_val, $tax);
          if ($term && !is_wp_error($term)) {
            $label = $term->name; // Русское название термина
          }
        }

        // custom attribute: attribute_paket (не таксономия)
        if (!$label && $attr_val) {
          $label = $attr_val; // как есть
        }

        if (!$label) {
          $label = 'Пакет';
        }

        $price_num  = isset($variation['display_price']) ? (float) $variation['display_price'] : 0;
        $price_html = wc_price($price_num);

        $desc = isset($variation['variation_description']) ? (string) $variation['variation_description'] : '';
        if (trim(wp_strip_all_tags($desc)) === '') {
          $desc = '<ul><li>Заполни "Описание" у вариации, чтобы здесь был список преимуществ.</li></ul>';
        }

        // Определяем: надо ли выбрать по умолчанию
        $is_default = false;

        // 1) Если у товара есть default_attributes — сравниваем по ключу (pa_paket / paket)
        if (!empty($default_attrs) && $attr_key) {
          // $attr_key вида attribute_pa_paket => нам нужен pa_paket
          $norm_key = str_replace('attribute_', '', $attr_key); // pa_paket
          if (isset($default_attrs[$norm_key]) && (string)$default_attrs[$norm_key] === (string)$attr_val) {
            $is_default = true;
          }
        }

        // 2) Если default не найден — выбираем первую вариацию
        if (empty($default_attrs) && $index === 0) {
          $is_default = true;
        }
      ?>

        <div class="kworkPackageItem <?php echo $is_default ? 'is-open is-selected' : ''; ?>"
             data-variation-id="<?php echo esc_attr($variation_id); ?>"
             data-price="<?php echo esc_attr($price_num); ?>">

          <label class="kworkPackage">
            <input
              type="radio"
              name="kwork_package"
              value="<?php echo esc_attr($variation_id); ?>"
              data-price="<?php echo esc_attr($price_num); ?>"
              <?php checked($is_default); ?>
            >
            <span class="kworkPackageName"><?php echo esc_html($label); ?></span>
            <span class="kworkPackagePrice"><?php echo wp_kses_post($price_html); ?></span>
            <span class="kworkPackageChevron" aria-hidden="true"></span>
          </label>

          <div class="kworkPackageDetails" aria-hidden="<?php echo $is_default ? 'false' : 'true'; ?>" style="<?php echo $is_default ? 'max-height:999px;' : ''; ?>">
            <div class="kworkPackageDetailsInner">
              <?php echo wp_kses_post($desc); ?>
            </div>
          </div>

        </div>

      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>



<!-- ДОП УСЛУГИ -->
<?php if (!empty($addons_raw)) : ?>
  <div class="kworkOptionGroup">
    <div class="kworkOptionTitle">Дополнительные услуги</div>

    <div class="kworkAddons" id="kworkAddons">
      <?php foreach ($addons_raw as $addon) :

        // Парсим "Установка (+500)" / "Установка +500" / "Установка (500)"
        $addon_str = (string) $addon;
        $label = trim($addon_str);
        $price = 0;

        // 1) вариант: "Текст (+500)" или "Текст (500)"
        if (preg_match('/^(.*?)[\(\[]\s*\+?\s*([\d\s]+)\s*[\)\]]/u', $addon_str, $m)) {
          $label = trim($m[1]);
          $price = (int) preg_replace('/\s+/', '', $m[2]);
        }
        // 2) вариант: "Текст +500"
        else if (preg_match('/^(.*?)\+\s*([\d\s]+)/u', $addon_str, $m2)) {
          $label = trim($m2[1]);
          $price = (int) preg_replace('/\s+/', '', $m2[2]);
        }

        $price_html = $price ? wc_price($price) : '';
      ?>
        <label class="kworkAddon">
          <input type="checkbox"
                 class="kwork-addon"
                 data-price="<?php echo esc_attr($price); ?>"
                 data-label="<?php echo esc_attr($label); ?>">
          <span class="kworkAddonLabel"><?php echo esc_html($label); ?></span>
          <?php if ($price > 0) : ?>
            <span class="kworkAddonPrice">+<?php echo wp_kses_post($price_html); ?></span>
          <?php else: ?>
            <span class="kworkAddonPrice"></span>
          <?php endif; ?>
        </label>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>


<!-- ADD TO CART -->
<form class="cart kworkCartForm" method="post" enctype="multipart/form-data" id="kworkCartForm">
  <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
  <input type="hidden" name="variation_id" id="kwork_variation_id" value="">

  <!-- если нужно будет сохранить допы в заказ — позже добавим hidden input -->
  <button type="submit" class="kworkBtn kworkBtn--primary" id="kworkBuyBtn" disabled>
    Выберите пакет
  </button>

  <div class="kworkFormHint" id="kworkHint" aria-live="polite">
    Выберите пакет, чтобы продолжить.
  </div>
</form>

<div class="kworkGuarantee">
  <div class="kworkGuaranteeIcon">✓</div>
  <div class="kworkGuaranteeText">
    <b>Гарантия результата</b>
    <span>Если решение не подойдёт — подберу альтернативу.</span>
  </div>
</div>


<style>
/* Пакеты — контейнер */
.kworkPackages{ display:grid; gap:12px; }

/* Обертка вариации */
.kworkPackageItem{
  border: 1px solid var(--border);
  border-radius: 18px;
  background: rgba(255,255,255,.05);
  overflow: hidden;
  transition: border-color .18s ease, background .18s ease;
}

/* Шапка пакета */
.kworkPackage{
  display:flex;
  align-items:center;
  gap: 12px;
  padding: 14px 14px;
  cursor:pointer;
}
.kworkPackage input[type="radio"]{
  width: 18px;
  height: 18px;
  accent-color: var(--accent);
}
.kworkPackageName{
  font-weight: 850;
  letter-spacing: -0.01em;
  color: rgba(255,255,255,.92);
}
.kworkPackagePrice{
  margin-left: auto;
  font-weight: 900;
  color: rgba(255,255,255,.92);
}
.kworkPackageChevron{
  width: 10px;
  height: 10px;
  border-right: 2px solid rgba(255,255,255,.55);
  border-bottom: 2px solid rgba(255,255,255,.55);
  transform: rotate(45deg);
  margin-left: 6px;
  transition: transform .22s ease, opacity .22s ease;
  opacity: .85;
}

/* Панель описания */
.kworkPackageDetails{
  max-height: 0;
  opacity: 0;
  transform: translateY(-6px);
  transition: max-height .28s ease, opacity .22s ease, transform .22s ease;
  border-top: 1px solid var(--border);
}
.kworkPackageDetailsInner{
  padding: 12px 14px 14px;
  color: var(--muted);
  font-size: 14px;
  line-height: 1.55;
}
.kworkPackageDetailsInner ul{
  margin: 0;
  padding-left: 18px;
}
.kworkPackageDetailsInner li{ margin: 6px 0; }

/* Открыто */
.kworkPackageItem.is-open{
  border-color: rgba(224,27,36,.35);
  background: rgba(224,27,36,.06);
}
.kworkPackageItem.is-open .kworkPackageChevron{
  transform: rotate(225deg);
  opacity: 1;
}
.kworkPackageItem.is-open .kworkPackageDetails{
  opacity: 1;
  transform: translateY(0);
}

/* Допы */
.kworkAddons{ display:grid; gap:10px; }
.kworkAddon{
  display:flex;
  align-items:center;
  gap: 10px;
  padding: 12px 12px;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.05);
  border-radius: 16px;
  cursor: pointer;
}
.kworkAddon input{
  width: 18px;
  height: 18px;
  accent-color: var(--accent);
}
.kworkAddonLabel{ color: rgba(255,255,255,.88); font-weight: 650; }
.kworkAddonPrice{ margin-left: auto; color: var(--muted); font-weight: 750; }

/* Подсказка под кнопкой */
.kworkFormHint{
  margin-top: 10px;
  font-size: 13px;
  color: var(--muted2);
}
.kworkBtn[disabled]{
  opacity: .65;
  cursor: not-allowed;
  transform: none !important;
}
	
.kworkOrderBadge--time{
  display:flex;
  align-items:center;
  gap:8px;
  padding:7px 12px;
  border-radius:999px;
  border:1px solid rgba(224,27,36,.35);
  background: rgba(224,27,36,.10);
  color: rgba(255,255,255,.92);
  font-size:13px;
  font-weight:600;
  line-height:1;
}

.kworkOrderBadge--time i{
  font-size:14px;
  color: rgba(255,255,255,.95);
}

#kworkCartForm {
  margin-top: 15px;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
  const priceEl = document.getElementById('kwork-price');           // твой элемент цены вверху
  const variationInput = document.getElementById('kwork_variation_id');
  const buyBtn = document.getElementById('kworkBuyBtn');
  const hintEl = document.getElementById('kworkHint');

  const packageRadios = Array.from(document.querySelectorAll('input[name="kwork_package"]'));
  const packageItems  = Array.from(document.querySelectorAll('.kworkPackageItem'));
  const addonChecks   = Array.from(document.querySelectorAll('.kwork-addon'));

  let basePrice = 0;
  let selectedVariationId = '';

  function closeAllPackages() {
    packageItems.forEach(item => {
      item.classList.remove('is-open');
      const panel = item.querySelector('.kworkPackageDetails');
      if (panel) {
        panel.style.maxHeight = '0px';
        panel.setAttribute('aria-hidden', 'true');
      }
    });
  }

  function openPackage(variationId) {
    const item = document.querySelector('.kworkPackageItem[data-variation-id="' + variationId + '"]');
    if (!item) return;

    const panel = item.querySelector('.kworkPackageDetails');
    const inner = item.querySelector('.kworkPackageDetailsInner');

    item.classList.add('is-open');
    if (panel && inner) {
      panel.setAttribute('aria-hidden', 'false');
      panel.style.maxHeight = inner.scrollHeight + 'px';
    }
  }

  function addonsSum() {
    let sum = 0;
    addonChecks.forEach(ch => {
      if (ch.checked) sum += parseFloat(ch.dataset.price || 0);
    });
    return sum;
  }

  function formatRub(n) {
    return n.toLocaleString('ru-RU') + ' ₽';
  }

  function recalcTotal() {
    const total = basePrice + addonsSum();
    if (priceEl && basePrice > 0) {
      // обновляем отображаемую цену (без HTML wc_price — зато стабильно)
      priceEl.textContent = formatRub(total);
    }
    // можно подсказку обновлять
    if (hintEl && basePrice > 0) {
      hintEl.textContent = 'Итоговая стоимость с доп. услугами: ' + formatRub(total);
    }
  }

  function setReadyState(isReady) {
    if (!buyBtn) return;
    buyBtn.disabled = !isReady;

    if (isReady) {
      buyBtn.textContent = 'Купить';
      if (hintEl) hintEl.textContent = 'Вы можете добавить услугу в корзину.';
    } else {
      buyBtn.textContent = 'Выберите пакет';
      if (hintEl) hintEl.textContent = 'Выберите пакет, чтобы продолжить.';
    }
  }

  // Выбор пакета
  packageRadios.forEach(radio => {
    radio.addEventListener('change', function () {
      selectedVariationId = this.value;
      basePrice = parseFloat(this.dataset.price || 0);

      if (variationInput) variationInput.value = selectedVariationId;

      closeAllPackages();
      openPackage(selectedVariationId);

      setReadyState(!!selectedVariationId);
      recalcTotal();
    });
  });

  // Допы
  addonChecks.forEach(ch => {
    ch.addEventListener('change', function () {
      if (basePrice > 0) recalcTotal();
    });
  });

  // Если после перезагрузки что-то чекнуто — восстановим
  const prechecked = packageRadios.find(r => r.checked);
  if (prechecked) {
    selectedVariationId = prechecked.value;
    basePrice = parseFloat(prechecked.dataset.price || 0);
    if (variationInput) variationInput.value = selectedVariationId;

    closeAllPackages();
    openPackage(selectedVariationId);
    setReadyState(true);
    recalcTotal();
  } else {
    setReadyState(false);
  }

  // UX: пересчитать высоту раскрытого блока при ресайзе (чтобы не обрезало)
  window.addEventListener('resize', function () {
    if (!selectedVariationId) return;
    const item = document.querySelector('.kworkPackageItem[data-variation-id="' + selectedVariationId + '"]');
    if (!item) return;
    const panel = item.querySelector('.kworkPackageDetails');
    const inner = item.querySelector('.kworkPackageDetailsInner');
    if (panel && inner) {
      panel.style.maxHeight = inner.scrollHeight + 'px';
    }
  });
});
</script>


       

      </aside>
    </div>
  </div>
</section>

<style>
  /* ============== базовые переменные (под clean/dark) ============== */
:root{
  --bg: #0b0d10;
  --panel: rgba(255,255,255,.06);
  --card: rgba(255,255,255,.08);
  --card2: rgba(255,255,255,.10);
  --border: rgba(255,255,255,.10);
  --text: rgba(255,255,255,.92);
  --muted: rgba(255,255,255,.62);
  --muted2: rgba(255,255,255,.45);
  --white: #fff;

  --accent: #e01b24; /* под твой красный */
  --accent2: rgba(224,27,36,.16);

  --radius: 18px;
  --radius2: 22px;

  --shadow: 0 14px 36px rgba(0,0,0,.35);
  --shadow2: 0 10px 26px rgba(0,0,0,.28);

  --container: 1160px;
  --gap: 22px;
}

/* ============== контейнер/фон ============== */
.kworkPage{
  background: radial-gradient(1200px 600px at 20% -10%, rgba(224,27,36,.12), transparent 60%),
              radial-gradient(900px 500px at 90% 10%, rgba(255,255,255,.06), transparent 60%),
              var(--bg);
  color: var(--text);
  padding: 34px 0 60px;
  font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

.kworkContainer{
  width: min(var(--container), calc(100% - 32px));
  margin: 0 auto;
}

/* ============== top ============== */
.kworkTop{
  margin-bottom: 18px;
}

.kworkCrumbs{
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  align-items: center;
  font-size: 13px;
  color: var(--muted2);
  margin-bottom: 14px;
}
.kworkCrumbs a{
  color: var(--muted);
  text-decoration: none;
}
.kworkCrumbs a:hover{ color: var(--white); }
.kworkCrumbs span{ opacity: .8; }

.kworkTitleRow{
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 18px;
}

.kworkTitle{
  font-size: 32px;
  line-height: 1.12;
  margin: 0;
  letter-spacing: -0.02em;
}

.kworkRating{
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border: 1px solid var(--border);
  background: var(--panel);
  border-radius: 999px;
  box-shadow: var(--shadow2);
  white-space: nowrap;
}
.kworkStars{
  color: #ffd54a;
  font-size: 14px;
  letter-spacing: 1px;
}
.kworkRatingMeta{
  font-size: 13px;
  color: var(--muted);
  display: flex;
  align-items: center;
  gap: 8px;
}
.kworkRatingMeta b{ color: var(--white); }
.kworkDot{ opacity: .7; }
.kworkRatingLink{
  color: var(--white);
  text-decoration: none;
  border-bottom: 1px dashed rgba(255,255,255,.35);
}
.kworkRatingLink:hover{
  border-bottom-color: rgba(255,255,255,.7);
}

/* ============== grid layout ============== */
.kworkGrid{
  display: grid;
  grid-template-columns: 1fr 360px;
  gap: var(--gap);
  align-items: start;
}

/* ============== common card ============== */
.kworkCard{
  background: linear-gradient(180deg, var(--card), var(--panel));
  border: 1px solid var(--border);
  border-radius: var(--radius2);
  box-shadow: var(--shadow);
  padding: 18px 18px;
}

.kworkH2{
  font-size: 18px;
  margin: 0 0 12px;
  letter-spacing: -0.01em;
}

.kworkProse{
  color: var(--muted);
  font-size: 15px;
  line-height: 1.55;
}
.kworkProse p{ margin: 0 0 10px; }
.kworkProse ul{
  margin: 10px 0 0;
  padding-left: 18px;
}
.kworkProse li{ margin: 6px 0; }

.kworkNote{
  margin-top: 12px;
  padding: 12px 12px;
  border-radius: 14px;
  border: 1px solid rgba(224,27,36,.22);
  background: rgba(224,27,36,.08);
  color: var(--muted);
}
.kworkNote b{ color: var(--white); }

/* ============== cover ============== */
.kworkCover{
  border-radius: var(--radius2);
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
  margin-bottom: var(--gap);
  min-height: 260px;

  background:
    radial-gradient(900px 380px at 20% 20%, rgba(255,255,255,.12), transparent 55%),
    linear-gradient(135deg, rgba(224,27,36,.92), rgba(224,27,36,.70));
}

.kworkCoverInner{
  padding: 22px;
  min-height: 260px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.kworkCoverBadge{
  align-self: flex-start;
  background: rgba(0,0,0,.22);
  color: rgba(255,255,255,.92);
  border: 1px solid rgba(255,255,255,.22);
  padding: 8px 10px;
  border-radius: 999px;
  font-size: 13px;
}
.kworkCoverText{
  padding-bottom: 6px;
}
.kworkCoverTitle{
  font-size: 36px;
  line-height: 1.08;
  letter-spacing: -0.02em;
  font-weight: 800;
  color: var(--white);
}
.kworkCoverSubtitle{
  font-size: 28px;
  letter-spacing: -0.02em;
  font-weight: 800;
  color: rgba(255,255,255,.94);
  margin-top: 4px;
}

/* ============== left spacing ============== */
.kworkLeft{
  display: grid;
  gap: var(--gap);
}

/* ============== FAQ ============== */
.kworkFaq{
  display: grid;
  gap: 10px;
}
.kworkFaqItem{
  border: 1px solid var(--border);
  border-radius: 16px;
  background: rgba(255,255,255,.05);
  padding: 12px 12px;
}
.kworkFaqItem summary{
  cursor: pointer;
  font-weight: 600;
  color: rgba(255,255,255,.88);
  list-style: none;
}
.kworkFaqItem summary::-webkit-details-marker{ display:none; }
.kworkFaqItem .kworkProse{
  margin-top: 8px;
}

/* ============== reviews ============== */
.kworkReviews{
  display: grid;
  gap: 12px;
  margin-bottom: 12px;
}
.kworkReview{
  border: 1px solid var(--border);
  background: rgba(255,255,255,.05);
  border-radius: 18px;
  padding: 14px 14px;
}
.kworkReviewHead{
  display:flex;
  align-items:center;
  gap: 12px;
  margin-bottom: 8px;
}
.kworkAvatar{
  width: 40px; height: 40px;
  border-radius: 12px;
  background: rgba(255,255,255,.10);
  border: 1px solid var(--border);
  display:flex; align-items:center; justify-content:center;
  font-weight: 700;
  color: rgba(255,255,255,.9);
}
.kworkReviewMeta{ flex: 1; }
.kworkReviewName{ font-weight: 700; color: rgba(255,255,255,.92); }
.kworkReviewSub{ font-size: 13px; color: var(--muted2); margin-top: 2px; }
.kworkReviewStars{ color:#ffd54a; font-size: 13px; letter-spacing: 1px; }
.kworkReviewBody{ color: var(--muted); line-height: 1.55; }

/* ============== mini cards ============== */
.kworkGridCards{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
}
.kworkMiniCard{
  display: block;
  text-decoration: none;
  color: inherit;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.05);
  border-radius: 18px;
  padding: 12px;
  transition: transform .15s ease, border-color .15s ease, background .15s ease;
}
.kworkMiniCard:hover{
  transform: translateY(-2px);
  border-color: rgba(224,27,36,.35);
  background: rgba(224,27,36,.06);
}
.kworkMiniThumb{
  height: 88px;
  border-radius: 14px;
  background: rgba(255,255,255,.08);
  border: 1px solid var(--border);
  margin-bottom: 10px;
}
.kworkMiniTitle{
  font-weight: 700;
  font-size: 14px;
  color: rgba(255,255,255,.92);
  line-height: 1.25;
  margin-bottom: 6px;
}
.kworkMiniMeta{
  font-size: 13px;
  color: var(--muted2);
}
.kworkMiniMeta b{ color: rgba(255,255,255,.88); }

/* ============== right (sticky) ============== */
.kworkRight{
  position: sticky;
  top: 18px;
  display: grid;
  gap: 14px;
}

.kworkOrderCard{
  background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.06));
  border: 1px solid var(--border);
  border-radius: var(--radius2);
  box-shadow: var(--shadow);
  padding: 16px;
}

.kworkOrderTop{
  display:flex;
  align-items:flex-start;
  justify-content: space-between;
  gap: 12px;
  margin-bottom: 12px;
}
.kworkOrderPrice{
  display:flex;
  flex-direction: column;
  gap: 4px;
}
.kworkOrderPriceLabel{
  font-size: 13px;
  color: var(--muted2);
}
.kworkOrderPriceValue{
  font-size: 28px;
  font-weight: 850;
  letter-spacing: -0.02em;
  color: var(--white);
}
.kworkOrderBadge{
  font-size: 12px;
  padding: 7px 10px;
  border-radius: 999px;
  border: 1px solid rgba(224,27,36,.30);
  background: rgba(224,27,36,.10);
  color: rgba(255,255,255,.92);
}

.kworkOrderInfo{
  display:grid;
  gap: 8px;
  margin: 10px 0 14px;
  color: var(--muted);
  font-size: 14px;
}
.kworkOrderInfoItem{
  display:flex;
  gap: 10px;
  align-items:flex-start;
}
.kworkDotIcon{
  width: 8px; height: 8px;
  border-radius: 99px;
  background: var(--accent);
  margin-top: 7px;
  flex: 0 0 8px;
}

.kworkOrderQty{
  margin: 10px 0 12px;
}
.kworkLabel{
  display:block;
  font-size: 13px;
  color: var(--muted2);
  margin-bottom: 8px;
}
.kworkQty{
  display:flex;
  align-items:center;
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  background: rgba(255,255,255,.05);
}
.kworkQtyBtn{
  width: 44px; height: 44px;
  border: 0;
  background: transparent;
  color: rgba(255,255,255,.88);
  font-size: 18px;
  cursor: pointer;
}
.kworkQtyBtn:hover{ background: rgba(255,255,255,.06); }
.kworkQtyInput{
  width: 100%;
  height: 44px;
  border: 0;
  outline: none;
  background: transparent;
  color: rgba(255,255,255,.9);
  text-align: center;
  font-weight: 650;
  font-size: 15px;
}

/* buttons */
.kworkBtn{
  width: 100%;
  height: 46px;
  border-radius: 16px;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.06);
  color: rgba(255,255,255,.92);
  font-weight: 750;
  letter-spacing: -0.01em;
  cursor: pointer;
  box-shadow: 0 10px 22px rgba(0,0,0,.25);
  transition: transform .15s ease, background .15s ease, border-color .15s ease;
}
.kworkBtn:hover{ transform: translateY(-1px); }
.kworkBtn--primary{
  background: linear-gradient(135deg, rgba(224,27,36,.95), rgba(224,27,36,.72));
  border-color: rgba(224,27,36,.55);
}
.kworkBtn--primary:hover{
  background: linear-gradient(135deg, rgba(224,27,36,1), rgba(224,27,36,.78));
}
.kworkBtn--ghost{
  background: rgba(255,255,255,.05);
}
.kworkBtn--ghost:hover{
  border-color: rgba(224,27,36,.40);
  background: rgba(224,27,36,.06);
}

.kworkGuarantee{
  margin-top: 12px;
  display:flex;
  gap: 10px;
  align-items:flex-start;
  border: 1px solid rgba(255,255,255,.10);
  background: rgba(255,255,255,.04);
  border-radius: 18px;
  padding: 12px;
}
.kworkGuaranteeIcon{
  width: 28px; height: 28px;
  border-radius: 10px;
  background: rgba(224,27,36,.14);
  border: 1px solid rgba(224,27,36,.25);
  display:flex; align-items:center; justify-content:center;
  color: rgba(255,255,255,.92);
  font-weight: 900;
}
.kworkGuaranteeText{
  display:flex;
  flex-direction: column;
  gap: 2px;
  color: var(--muted);
  font-size: 13px;
}
.kworkGuaranteeText b{ color: rgba(255,255,255,.92); }

/* seller */
.kworkSeller{
  padding: 16px;
}
.kworkSellerHead{
  display:flex;
  gap: 12px;
  align-items:center;
  margin-bottom: 12px;
}
.kworkSellerAvatar{
  width: 54px; height: 54px;
  border-radius: 18px;
  border: 1px solid var(--border);
  background: rgba(255,255,255,.08);
}
.kworkSellerName{
  font-weight: 850;
  letter-spacing: -0.01em;
}
.kworkSellerRole{
  font-size: 13px;
  color: var(--muted2);
  margin-top: 2px;
}
.kworkSellerStats{
  display:grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 12px;
}
.kworkSellerStat{
  border: 1px solid var(--border);
  background: rgba(255,255,255,.05);
  border-radius: 16px;
  padding: 10px;
  display:flex;
  flex-direction: column;
  gap: 4px;
}
.kworkSellerStat span{
  font-size: 12px;
  color: var(--muted2);
}
.kworkSellerStat b{
  color: rgba(255,255,255,.92);
  font-size: 14px;
}

/* ============== responsive ============== */
@media (max-width: 1024px){
  .kworkGrid{
    grid-template-columns: 1fr;
  }
  .kworkRight{
    position: static;
  }
  .kworkGridCards{
    grid-template-columns: repeat(2, 1fr);
  }
  .kworkTitleRow{
    flex-direction: column;
    align-items: flex-start;
  }
}
@media (max-width: 560px){
  .kworkTitle{ font-size: 26px; }
  .kworkGridCards{ grid-template-columns: 1fr; }
  .kworkCoverTitle{ font-size: 28px; }
  .kworkCoverSubtitle{ font-size: 22px; }
}

</style>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
