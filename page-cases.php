<?php
/**
 * Template Name: Кейсы (архив)
 */
get_header();

/**
 * НАСТРОЙКИ (под себя)
 */
$post_type = 'case';        // CPT кейсов
$tax       = 'case_cat';    // таксономия категорий кейсов

/**
 * Фильтры из URL
 */
$active_term = isset($_GET['cat']) ? sanitize_text_field((string) $_GET['cat']) : '';
$search      = isset($_GET['q'])   ? sanitize_text_field((string) $_GET['q'])   : '';
$paged       = max(1, (int) get_query_var('paged'));

/**
 * Тянем категории
 */
$terms = get_terms([
  'taxonomy'   => $tax,
  'hide_empty' => true,
]);

/**
 * WP_Query
 */
$args = [
  'post_type'              => $post_type,
  'post_status'            => 'publish',
  'posts_per_page'         => 9,
  'paged'                  => $paged,
  's'                      => $search,
  'no_found_rows'          => false, // нужна пагинация
  'ignore_sticky_posts'    => true,
  'update_post_meta_cache' => false,
  'update_post_term_cache' => true,
];

if ($active_term !== '') {
  $args['tax_query'] = [[
    'taxonomy' => $tax,
    'field'    => 'slug',
    'terms'    => $active_term,
  ]];
}

$q = new WP_Query($args);

/**
 * Хелпер: ссылка без мусора (с сохранением нужных параметров)
 */
function wpds_cases_url(array $params = []): string {
  $base = get_permalink();

  $current = [];
  if (!empty($_GET['cat'])) $current['cat'] = sanitize_text_field((string) $_GET['cat']);
  if (!empty($_GET['q']))   $current['q']   = sanitize_text_field((string) $_GET['q']);
  if (!empty($_GET['paged'])) $current['paged'] = max(1, (int) $_GET['paged']);

  $merged = array_merge($current, $params);

  // удалить пустые / null / 0 paged
  foreach ($merged as $k => $v) {
    if ($v === '' || $v === null) unset($merged[$k]);
  }
  if (isset($merged['paged']) && (int)$merged['paged'] <= 1) unset($merged['paged']);

  return !empty($merged) ? add_query_arg($merged, $base) : $base;
}

/**
 * SEO: canonical + robots + rel prev/next + (опционально) 301 нормализация URL
 */
$base_url = get_permalink();

$qs = [];
if ($active_term !== '') $qs['cat'] = $active_term;
if ($search !== '')      $qs['q']   = $search;
if ($paged > 1)          $qs['paged'] = $paged;

$canonical_url = !empty($qs) ? add_query_arg($qs, $base_url) : $base_url;

// (Опционально) 301 редирект на нормализованный URL без мусора
$current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$current_url = preg_replace('~#.*$~', '', $current_url);

if (!wp_doing_ajax()) {
  $normalized_current   = esc_url_raw($current_url);
  $normalized_canonical = esc_url_raw($canonical_url);

  if ($normalized_current && $normalized_canonical && $normalized_current !== $normalized_canonical) {
    wp_safe_redirect($normalized_canonical, 301);
    exit;
  }
}

add_action('wp_head', function() use ($canonical_url, $paged, $q, $active_term, $search, $base_url) {
  // canonical
  echo '<link rel="canonical" href="' . esc_url($canonical_url) . "\" />\n";

  // Обычно фильтры/поиск (GET) лучше noindex, чтобы не плодить дубли.
  // Если хочешь индексировать фильтрованные страницы — убери это условие.
  if ($active_term !== '' || $search !== '') {
    echo "<meta name=\"robots\" content=\"noindex,follow\" />\n";
  }

  // prev/next
  $total = (int) $q->max_num_pages;

  if ($total > 1) {
    if ($paged > 1) {
      $prev_args = [];
      if ($active_term !== '') $prev_args['cat'] = $active_term;
      if ($search !== '')      $prev_args['q']   = $search;
      if (($paged - 1) > 1)    $prev_args['paged'] = $paged - 1;

      $prev_url = !empty($prev_args) ? add_query_arg($prev_args, $base_url) : $base_url;
      echo '<link rel="prev" href="' . esc_url($prev_url) . "\" />\n";
    }

    if ($paged < $total) {
      $next_args = [];
      if ($active_term !== '') $next_args['cat'] = $active_term;
      if ($search !== '')      $next_args['q']   = $search;
      $next_args['paged']      = $paged + 1;

      $next_url = add_query_arg($next_args, $base_url);
      echo '<link rel="next" href="' . esc_url($next_url) . "\" />\n";
    }
  }
}, 1);
?>

<section class="wpds-cases" itemscope itemtype="https://schema.org/CollectionPage">
  <div class="wpds-container">

    <header class="wpds-cases__hero">
      <div class="wpds-cases__hero-left">
        <h1 class="wpds-h1"><?php echo esc_html(get_the_title()); ?></h1>
        <p class="wpds-subtitle">
          Подборка проектов: сайты, WooCommerce, кастомные модули, каталоги/доски объявлений, оптимизация и интеграции.
        </p>
      </div>
    </header>

    <div class="wpds-cases__toolbar">
      <form class="wpds-cases__search" method="get" action="<?php echo esc_url(get_permalink()); ?>">
        <label class="screen-reader-text" for="wpds-cases-q">Поиск по кейсам</label>
        <input
          id="wpds-cases-q"
          type="search"
          name="q"
          value="<?php echo esc_attr($search); ?>"
          placeholder="Поиск по кейсам…"
          class="wpds-input"
        />
        <?php if ($active_term !== ''): ?>
          <input type="hidden" name="cat" value="<?php echo esc_attr($active_term); ?>">
        <?php endif; ?>
        <button class="wpds-btn wpds-btn--ghost" type="submit">Найти</button>

        <?php if ($active_term !== '' || $search !== ''): ?>
          <a class="wpds-btn wpds-btn--ghost" href="<?php echo esc_url(get_permalink()); ?>">Сбросить</a>
        <?php endif; ?>
      </form>

      <nav class="wpds-cases__filters" aria-label="Фильтр кейсов">
        <a class="wpds-pill <?php echo ($active_term === '') ? 'is-active' : ''; ?>"
           href="<?php echo esc_url(wpds_cases_url(['cat' => '', 'paged' => 1])); ?>">
          Все
        </a>

        <?php if (!is_wp_error($terms) && !empty($terms)): ?>
          <?php foreach ($terms as $t): ?>
            <a class="wpds-pill <?php echo ($active_term === $t->slug) ? 'is-active' : ''; ?>"
               href="<?php echo esc_url(wpds_cases_url(['cat' => $t->slug, 'paged' => 1])); ?>">
              <?php echo esc_html($t->name); ?>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </nav>
    </div>

    <?php if ($q->have_posts()): ?>
      <div class="wpds-cases__grid" itemscope itemtype="https://schema.org/ItemList">
        <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderDescending" />

        <?php $pos = 0; ?>
        <?php while ($q->have_posts()): $q->the_post(); ?>
          <?php
            $pos++;
            $post_id = get_the_ID();

            // Картинка + корректный alt
            $thumb_id  = get_post_thumbnail_id($post_id);
            $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : '';
            $thumb_alt = $thumb_id ? (string) get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
            if ($thumb_alt === '') $thumb_alt = get_the_title($post_id);

            $item_terms = get_the_terms($post_id, $tax);

            // Эксперт: берем excerpt, если пусто — делаем из контента, без html
            $excerpt = get_the_excerpt($post_id);
            if (!$excerpt) {
              $excerpt = wp_strip_all_tags(get_the_content(null, false, $post_id));
            }
            $excerpt = wp_trim_words($excerpt, 22, '…');
          ?>

          <article class="wpds-card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="<?php echo (int) $pos; ?>" />

            <a class="wpds-card__media" href="<?php the_permalink(); ?>" itemprop="url">
              <?php if ($thumb_url): ?>
                <img
                  loading="lazy"
                  decoding="async"
                  src="<?php echo esc_url($thumb_url); ?>"
                  alt="<?php echo esc_attr($thumb_alt); ?>"
                >
              <?php else: ?>
                <div class="wpds-card__placeholder" aria-hidden="true"></div>
              <?php endif; ?>
            </a>

            <div class="wpds-card__body">
              <?php if (!empty($item_terms) && !is_wp_error($item_terms)): ?>
                <div class="wpds-card__tags" aria-label="Теги кейса">
                  <?php
                    $max = 3; $i = 0;
                    foreach ($item_terms as $it) {
                      if ($i++ >= $max) break;
                      echo '<span class="wpds-tag">'.esc_html($it->name).'</span>';
                    }
                  ?>
                </div>
              <?php endif; ?>

              <h3 class="wpds-card__title" itemprop="name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>

              <?php if ($excerpt): ?>
                <p class="wpds-card__text" itemprop="description"><?php echo esc_html($excerpt); ?></p>
              <?php endif; ?>

              <div class="wpds-card__footer">
                <time class="wpds-muted" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                  <?php echo esc_html(get_the_date('d M Y')); ?>
                </time>
                <a class="wpds-link" href="<?php the_permalink(); ?>">Смотреть →</a>
              </div>
            </div>
          </article>

        <?php endwhile; wp_reset_postdata(); ?>
      </div>

      <?php
        $pagination = paginate_links([
          'total'     => $q->max_num_pages,
          'current'   => $paged,
          'type'      => 'array',
          'prev_text' => '←',
          'next_text' => '→',
        ]);
      ?>

      <?php if (!empty($pagination)): ?>
        <nav class="wpds-cases__pagination" aria-label="Пагинация кейсов">
          <?php foreach ($pagination as $link): ?>
            <span class="wpds-cases__page"><?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
          <?php endforeach; ?>
        </nav>
      <?php endif; ?>

    <?php else: ?>
      <div class="wpds-empty">
        <h3>Ничего не найдено</h3>
        <p>Попробуйте изменить фильтр или запрос.</p>
        <a class="wpds-btn wpds-btn--ghost" href="<?php echo esc_url(get_permalink()); ?>">Сбросить</a>
      </div>
    <?php endif; ?>

    <section class="wpds-cta" id="cases-request">
      <div class="wpds-cta__inner">
        <div class="wpds-cta__text">
          <h2 class="wpds-h2">Не нашли нужный формат?</h2>
          <p class="wpds-subtitle">Опишите задачу — подберём решение и рассчитаем точную стоимость.</p>
        </div>
        <div class="wpds-cta__actions">
          <a class="wpds-btn wpds-btn--primary" href="<?php echo esc_url(home_url('/contacts/')); ?>">Оставить заявку</a>
          <a class="wpds-btn wpds-btn--ghost" href="<?php echo esc_url(home_url('/prices/')); ?>">Посмотреть цены</a>
        </div>
      </div>
    </section>

  </div>
</section>


<style>
  /* ====== WP Dev Studio: Cases ====== */
.wpds-container{
  width:min(1160px, calc(100% - 40px));
  margin-inline:auto;
}

.wpds-cases{ padding: 48px 0 72px; }
.wpds-h1{ font-size: clamp(32px, 4vw, 54px); line-height: 1.05; letter-spacing: -0.02em; margin: 0; }
.wpds-h2{ font-size: clamp(24px, 3vw, 34px); line-height: 1.15; margin: 0 0 10px; }
.wpds-subtitle{ margin: 14px 0 0; opacity: .8; max-width: 68ch; }
.wpds-muted{ opacity: .65; font-size: 14px; }

.wpds-cases__hero{
  display:flex; gap: 24px; align-items:flex-end; justify-content:space-between;
  padding-bottom: 22px; border-bottom: 1px solid rgba(0,0,0,.08);
}
.wpds-cases__hero-right{ display:flex; gap: 12px; flex-wrap: wrap; }

.wpds-cases__toolbar{
  display:flex; gap: 16px; align-items:center; justify-content:space-between;
  padding: 18px 0 22px;
}

.wpds-cases__search{ display:flex; gap: 10px; align-items:center; flex: 1; max-width: 520px; }
.wpds-input{
  width: 100%;
  height: 46px;
  padding: 0 14px;
  border-radius: 14px;
  border: 1px solid rgba(0,0,0,.10);
  background: rgba(255,255,255,.9);
  outline: none;
}
.wpds-input:focus{ border-color: rgba(0,0,0,.22); }

.wpds-cases__filters{ display:flex; gap: 10px; flex-wrap: wrap; justify-content:flex-end; }

.wpds-pill{
  display:inline-flex; align-items:center; justify-content:center;
  height: 40px; padding: 0 14px;
  border-radius: 999px;
  border: 1px solid rgba(0,0,0,.10);
  text-decoration:none;
  color: inherit;
  font-size: 14px;
  opacity: .85;
  transition: transform .15s ease, opacity .15s ease, border-color .15s ease;
}
.wpds-pill:hover{ transform: translateY(-1px); opacity: 1; border-color: rgba(0,0,0,.20); }
.wpds-pill.is-active{
  opacity: 1;
  border-color: rgba(0,0,0,.35);
}

.wpds-btn{
  display:inline-flex; align-items:center; justify-content:center;
  height: 46px; padding: 0 16px;
  border-radius: 14px;
  border: 1px solid rgba(0,0,0,.12);
  text-decoration:none;
  color: inherit;
  background: transparent;
  cursor:pointer;
  transition: transform .15s ease, border-color .15s ease, opacity .15s ease;
}
.wpds-btn:hover{ transform: translateY(-1px); border-color: rgba(0,0,0,.22); }

.wpds-btn--primary{
  border-color: transparent;
  color: #fff;
  background: #111;
}
.wpds-btn--primary:hover{ opacity: .92; }

.wpds-btn--ghost{ background: rgba(0,0,0,.04); }

.wpds-link{
  text-decoration:none;
  font-weight: 600;
  color: inherit;
}
.wpds-link:hover{ opacity: .8; }

.wpds-cases__grid{
  display:grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
  padding-top: 10px;
}

.wpds-card{
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 18px;
  overflow: hidden;
  background: rgba(255,255,255,.85);
  box-shadow: 0 10px 30px rgba(0,0,0,.04);
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}
.wpds-card:hover{
  transform: translateY(-2px);
  border-color: rgba(0,0,0,.16);
  box-shadow: 0 16px 50px rgba(0,0,0,.07);
}

.wpds-card__media{ display:block; aspect-ratio: 16/10; background: rgba(0,0,0,.04); }
.wpds-card__media img{ width:100%; height:100%; object-fit: cover; display:block; }
.wpds-card__placeholder{ width:100%; height:100%; background: linear-gradient(135deg, rgba(0,0,0,.05), rgba(0,0,0,.02)); }

.wpds-card__body{ padding: 16px 16px 14px; }
.wpds-card__tags{ display:flex; gap: 8px; flex-wrap: wrap; margin-bottom: 10px; }
.wpds-tag{
  display:inline-flex;
  padding: 6px 10px;
  border-radius: 999px;
  font-size: 12px;
  background: rgba(0,0,0,.05);
  border: 1px solid rgba(0,0,0,.06);
  opacity: .9;
}
.wpds-card__title{ margin: 0 0 8px; font-size: 18px; line-height: 1.25; letter-spacing: -0.01em; }
.wpds-card__title a{ color: inherit; text-decoration:none; }
.wpds-card__title a:hover{ opacity: .85; }

.wpds-card__text{ margin: 0 0 12px; opacity: .78; font-size: 14px; line-height: 1.5; }
.wpds-card__footer{ display:flex; align-items:center; justify-content:space-between; gap: 12px; }

.wpds-cases__pagination{
  padding-top: 24px;
  display:flex;
  justify-content:center;
}
.wpds-cases__pagination .page-numbers{
  display:inline-flex;
  min-width: 40px;
  height: 40px;
  align-items:center;
  justify-content:center;
  border-radius: 12px;
  border: 1px solid rgba(0,0,0,.10);
  text-decoration:none;
  color: inherit;
  margin: 0 6px;
}
.wpds-cases__pagination .page-numbers.current{
  background: rgba(0,0,0,.10);
  border-color: rgba(0,0,0,.18);
}

.wpds-empty{
  padding: 36px;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 18px;
  background: rgba(0,0,0,.03);
}

.wpds-cta{ margin-top: 38px; }
.wpds-cta__inner{
  display:flex; align-items:center; justify-content:space-between; gap: 18px;
  padding: 22px;
  border-radius: 20px;
  border: 1px solid rgba(0,0,0,.08);
  background: rgba(0,0,0,.03);
}
.wpds-cta__actions{ display:flex; gap: 10px; flex-wrap: wrap; }

@media (max-width: 980px){
  .wpds-cases__grid{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .wpds-cases__toolbar{ flex-direction: column; align-items: stretch; }
  .wpds-cases__filters{ justify-content:flex-start; }
  .wpds-cases__search{ max-width: none; }
}
@media (max-width: 640px){
  .wpds-cases__hero{ flex-direction: column; align-items:flex-start; }
  .wpds-cases__grid{ grid-template-columns: 1fr; }
  .wpds-cta__inner{ flex-direction: column; align-items:flex-start; }
}
</style>

<?php get_footer(); ?>
