<?php
/*
Template Name: Блог (архив)
*/
get_header();

/**
 * Параметры
 */
$paged = max(1, (int) get_query_var('paged'));

$selected_cat = isset($_GET['cat']) ? (int) $_GET['cat'] : 0;
$search_q_raw = isset($_GET['s']) ? (string) $_GET['s'] : '';
$search_q     = sanitize_text_field($search_q_raw);

/**
 * (Опционально) Нормализация URL: убираем пустые параметры, мусор и т.п.
 * Если не хочешь редиректы — закомментируй блок.
 */
$base_url = get_permalink();
$qs = [];
if ($selected_cat > 0) $qs['cat'] = $selected_cat;
if ($search_q !== '') $qs['s'] = $search_q;
if ($paged > 1) $qs['paged'] = $paged;

$canonical_url = $base_url;
if (!empty($qs)) {
  $canonical_url = add_query_arg($qs, $base_url);
}

// если пришли с мусорными параметрами — редиректим на нормальный канонический URL
$current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$current_url_no_hash = preg_replace('~#.*$~', '', $current_url);

if (wp_doing_ajax() === false) {
  // сравниваем без отличий типа &amp; и т.п.
  $normalized_current = esc_url_raw($current_url_no_hash);
  $normalized_canonical = esc_url_raw($canonical_url);

  if ($normalized_current && $normalized_canonical && $normalized_current !== $normalized_canonical) {
    wp_safe_redirect($normalized_canonical, 301);
    exit;
  }
}

/**
 * WP_Query
 */
$args = [
  'post_type'              => 'post',
  'post_status'            => 'publish',
  'ignore_sticky_posts'    => true,
  'paged'                  => $paged,
  's'                      => $search_q,
  'no_found_rows'          => false, // нужна пагинация
  'update_post_meta_cache' => false,
  'update_post_term_cache' => true,
];

if ($selected_cat) {
  $args['cat'] = $selected_cat;
}

$q = new WP_Query($args);

/**
 * Хелпер: время чтения (примерно)
 */
function wpds_reading_time($post_id): string {
  $content = get_post_field('post_content', $post_id);
  $words   = str_word_count(wp_strip_all_tags($content));
  $mins    = max(1, (int) ceil($words / 200)); // 200 wpm
  return $mins . ' min read';
}

/**
 * SEO: canonical + robots + rel prev/next
 * (Через wp_head, чтобы работало без правок header.php)
 */
add_action('wp_head', function() use ($canonical_url, $paged, $q, $selected_cat, $search_q) {
  // Canonical
  echo '<link rel="canonical" href="' . esc_url($canonical_url) . "\" />\n";

  // Для фильтров/поиска обычно лучше noindex, чтобы не плодить тонны страниц в индексе
  // (Если ты ХОЧЕШЬ индексировать категории/поиск — убери этот блок или сделай условие мягче)
  if ($selected_cat || $search_q) {
    echo "<meta name=\"robots\" content=\"noindex,follow\" />\n";
  }

  // rel prev/next для пагинации
  $total = (int) $q->max_num_pages;

  if ($total > 1) {
    if ($paged > 1) {
      $prev_url = add_query_arg(array_filter([
        'cat'   => $selected_cat ?: null,
        's'     => $search_q ?: null,
        'paged' => ($paged - 1) > 1 ? ($paged - 1) : null,
      ]), get_permalink());

      echo '<link rel="prev" href="' . esc_url($prev_url) . "\" />\n";
    }

    if ($paged < $total) {
      $next_url = add_query_arg(array_filter([
        'cat'   => $selected_cat ?: null,
        's'     => $search_q ?: null,
        'paged' => $paged + 1,
      ]), get_permalink());

      echo '<link rel="next" href="' . esc_url($next_url) . "\" />\n";
    }
  }
}, 1);
?>

<main class="wpds-blog" itemscope itemtype="https://schema.org/CollectionPage">
  <section class="wpds-blog__hero">
    <div class="wpds-blog__container">
      <div class="wpds-blog__heroInner">
        <div class="wpds-blog__heroText">
          <div class="wpds-blog__kicker">WP Dev Studio</div>
          <h1 class="wpds-blog__title"><?php echo esc_html(get_the_title()); ?></h1>
          <p class="wpds-blog__subtitle">
            Экспертные материалы про WordPress, WooCommerce, скорость, архитектуру и нестандартные интеграции.
          </p>
        </div>

        <div class="wpds-blog__heroPanel">
          <form class="wpds-blog__search" method="get" action="<?php echo esc_url(get_permalink()); ?>">
            <input
              class="wpds-blog__searchInput"
              type="search"
              name="s"
              value="<?php echo esc_attr($search_q); ?>"
              placeholder="Поиск по статьям…"
              aria-label="Поиск"
            />
            <?php if ($selected_cat): ?>
              <input type="hidden" name="cat" value="<?php echo (int) $selected_cat; ?>" />
            <?php endif; ?>
            <button class="wpds-blog__searchBtn" type="submit">Найти</button>
          </form>

          <form class="wpds-blog__filters" method="get" action="<?php echo esc_url(get_permalink()); ?>">
            <?php if ($search_q): ?>
              <input type="hidden" name="s" value="<?php echo esc_attr($search_q); ?>" />
            <?php endif; ?>

            <label class="wpds-blog__filterLabel">
              <span class="wpds-blog__filterText">Категория</span>
              <?php
                wp_dropdown_categories([
                  'show_option_all' => 'Все рубрики',
                  'hide_empty'      => 1,
                  'name'            => 'cat',
                  'selected'        => $selected_cat,
                  'class'           => 'wpds-blog__select',
                ]);
              ?>
            </label>

            <button class="wpds-blog__applyBtn" type="submit">Применить</button>

            <?php if ($selected_cat || $search_q): ?>
              <a class="wpds-blog__reset" href="<?php echo esc_url(get_permalink()); ?>">Сбросить</a>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="wpds-blog__content">
    <div class="wpds-blog__container">
      <?php if ($q->have_posts()): ?>

        <!-- Лёгкая микроразметка списка -->
        <div class="wpds-blog__grid" itemscope itemtype="https://schema.org/ItemList">
          <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderDescending" />

          <?php $pos = 0; ?>
          <?php while ($q->have_posts()): $q->the_post(); ?>
            <?php
              $pos++;
              $post_id = get_the_ID();

              $thumb_id = get_post_thumbnail_id($post_id);
              $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : '';
              $thumb_alt = $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
              if (!$thumb_alt) $thumb_alt = get_the_title($post_id);

              $cats    = get_the_category($post_id);
              $catName = !empty($cats) ? $cats[0]->name : '';
              $catLink = !empty($cats) ? get_category_link($cats[0]->term_id) : '';

              $excerpt = get_the_excerpt($post_id);
              if (!$excerpt) {
                $excerpt = wp_strip_all_tags(get_the_content(null, false, $post_id));
              }
              $excerpt = wp_trim_words($excerpt, 22, '…');
            ?>

            <article class="wpds-card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <meta itemprop="position" content="<?php echo (int) $pos; ?>" />

              <a class="wpds-card__cover" href="<?php the_permalink(); ?>" itemprop="url">
                <?php if ($thumb_url): ?>
                  <img
                    class="wpds-card__img"
                    src="<?php echo esc_url($thumb_url); ?>"
                    alt="<?php echo esc_attr($thumb_alt); ?>"
                    loading="lazy"
                    decoding="async"
                  />
                <?php else: ?>
                  <div class="wpds-card__img wpds-card__img--placeholder">
                    <span>WPDevStudio</span>
                  </div>
                <?php endif; ?>
              </a>

              <div class="wpds-card__body">
                <div class="wpds-card__meta">
                  <time class="wpds-card__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(get_the_date('d.m.Y')); ?>
                  </time>

                  <span class="wpds-card__dot">•</span>

                  <span class="wpds-card__read">
                    <?php echo esc_html(wpds_reading_time($post_id)); ?>
                  </span>

                  <?php if ($catName && $catLink): ?>
                    <span class="wpds-card__dot">•</span>
                    <a class="wpds-card__cat" href="<?php echo esc_url($catLink); ?>">
                      <?php echo esc_html($catName); ?>
                    </a>
                  <?php endif; ?>
                </div>

                <h2 class="wpds-card__title" itemprop="name">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <p class="wpds-card__excerpt" itemprop="description">
                  <?php echo esc_html($excerpt); ?>
                </p>

                <div class="wpds-card__footer">
                  <a class="wpds-card__more" href="<?php the_permalink(); ?>">
                    Читать <span aria-hidden="true">→</span>
                  </a>
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
          <nav class="wpds-blog__pagination" aria-label="Пагинация">
            <?php foreach ($pagination as $link): ?>
              <div class="wpds-blog__page"><?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
            <?php endforeach; ?>
          </nav>
        <?php endif; ?>

      <?php else: ?>
        <div class="wpds-blog__empty">
          <div class="wpds-blog__emptyTitle">Ничего не найдено</div>
          <div class="wpds-blog__emptyText">Попробуй изменить запрос или выбрать другую рубрику.</div>
          <a class="wpds-blog__reset" href="<?php echo esc_url(get_permalink()); ?>">Сбросить фильтры</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>


<style>
  /* Изолированные стили блога (тёмный премиум-минимализм) */
.wpds-blog{
  --bg: var(--wpds-bg, #0b0f17);
  --panel: var(--wpds-panel, rgba(255,255,255,.06));
  --panel2: var(--wpds-panel2, rgba(255,255,255,.08));
  --stroke: var(--wpds-stroke, rgba(255,255,255,.12));
  --text: var(--wpds-text, rgba(255,255,255,.92));
  --muted: var(--wpds-muted, rgba(255,255,255,.66));
  --muted2: var(--wpds-muted2, rgba(255,255,255,.52));
  --accent: var(--wpds-accent, #7c5cff);

  background: radial-gradient(1200px 700px at 20% 0%, rgba(124,92,255,.20), transparent 55%),
              radial-gradient(900px 600px at 85% 10%, rgba(0,209,255,.14), transparent 55%),
              var(--bg);
  color: var(--text);
}

.wpds-blog__container{
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}

.wpds-blog__hero{
  padding: 64px 0 26px;
}

.wpds-blog__heroInner{
  display: grid;
  grid-template-columns: 1.35fr .65fr;
  gap: 24px;
  align-items: start;
}

.wpds-blog__kicker{
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-size: 13px;
  color: var(--muted);
  letter-spacing: .2px;
  padding: 8px 12px;
  border: 1px solid var(--stroke);
  border-radius: 999px;
  background: rgba(255,255,255,.03);
}

.wpds-blog__title{
  margin: 14px 0 10px;
  font-size: clamp(28px, 3.4vw, 44px);
  line-height: 1.1;
  letter-spacing: -.3px;
}

.wpds-blog__subtitle{
  margin: 0;
  color: var(--muted);
  font-size: 16px;
  line-height: 1.55;
  max-width: 62ch;
}

.wpds-blog__heroPanel{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.04);
  border-radius: 18px;
  padding: 14px;
  backdrop-filter: blur(10px);
}

.wpds-blog__search{
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 10px;
  margin-bottom: 12px;
}

.wpds-blog__searchInput{
  height: 44px;
  border-radius: 12px;
  border: 1px solid var(--stroke);
  background: rgba(0,0,0,.18);
  color: var(--text);
  padding: 0 14px;
  outline: none;
}

.wpds-blog__searchInput::placeholder{ color: var(--muted2); }

.wpds-blog__searchBtn,
.wpds-blog__applyBtn{
  height: 44px;
  padding: 0 14px;
  border-radius: 12px;
  border: 1px solid var(--stroke);
  background: linear-gradient(180deg, rgba(124,92,255,.95), rgba(124,92,255,.75));
  color: #fff;
  cursor: pointer;
  transition: transform .15s ease, filter .15s ease;
}
.wpds-blog__searchBtn:hover,
.wpds-blog__applyBtn:hover{
  transform: translateY(-1px);
  filter: brightness(1.05);
}

.wpds-blog__filters{
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 10px;
  align-items: end;
}

.wpds-blog__filterLabel{
  display: grid;
  gap: 6px;
}

.wpds-blog__filterText{
  font-size: 12px;
  color: var(--muted2);
}

.wpds-blog__select{
  width: 100%;
  height: 44px;
  border-radius: 12px;
  border: 1px solid var(--stroke);
  background: rgba(0,0,0,.18);
  color: var(--text);
  padding: 0 12px;
  outline: none;
}

.wpds-blog__reset{
  display: inline-flex;
  margin-top: 10px;
  color: var(--muted);
  text-decoration: none;
  font-size: 13px;
}
.wpds-blog__reset:hover{ color: var(--text); }

.wpds-blog__content{
  padding: 16px 0 70px;
}

.wpds-blog__grid{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
}

.wpds-card{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  border-radius: 18px;
  overflow: hidden;
  transition: transform .18s ease, background .18s ease, border-color .18s ease;
}
.wpds-card:hover{
  transform: translateY(-3px);
  background: rgba(255,255,255,.045);
  border-color: rgba(255,255,255,.18);
}

.wpds-card__cover{
  display: block;
  position: relative;
  aspect-ratio: 16 / 9;
  overflow: hidden;
}

.wpds-card__img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transform: scale(1.01);
  transition: transform .25s ease;
}
.wpds-card:hover .wpds-card__img{ transform: scale(1.05); }

.wpds-card__img--placeholder{
  display: grid;
  place-items: center;
  background: radial-gradient(600px 260px at 20% 0%, rgba(124,92,255,.25), transparent 55%),
              radial-gradient(520px 240px at 80% 10%, rgba(0,209,255,.18), transparent 55%),
              rgba(255,255,255,.03);
  color: rgba(255,255,255,.75);
  font-weight: 700;
  letter-spacing: .3px;
}

.wpds-card__body{
  padding: 14px 14px 16px;
}

.wpds-card__meta{
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  align-items: center;
  font-size: 12px;
  color: var(--muted2);
}

.wpds-card__dot{ opacity: .7; }

.wpds-card__cat{
  color: rgba(255,255,255,.78);
  text-decoration: none;
  border-bottom: 1px dashed rgba(255,255,255,.22);
}
.wpds-card__cat:hover{ color: #fff; border-bottom-color: rgba(255,255,255,.45); }

.wpds-card__title{
  margin: 10px 0 8px;
  font-size: 18px;
  line-height: 1.25;
  letter-spacing: -.2px;
}
.wpds-card__title a{
  color: var(--text);
  text-decoration: none;
}
.wpds-card__title a:hover{ color: #fff; }

.wpds-card__excerpt{
  margin: 0 0 12px;
  color: var(--muted);
  font-size: 14px;
  line-height: 1.55;
}

.wpds-card__footer{
  display: flex;
  justify-content: flex-start;
}

.wpds-card__more{
  display: inline-flex;
  gap: 8px;
  align-items: center;
  text-decoration: none;
  color: #fff;
  font-size: 13px;
  padding: 10px 12px;
  border-radius: 12px;
  background: rgba(124,92,255,.22);
  border: 1px solid rgba(124,92,255,.34);
}
.wpds-card__more:hover{
  background: rgba(124,92,255,.28);
  border-color: rgba(124,92,255,.45);
}

.wpds-blog__pagination{
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: center;
  margin-top: 22px;
}

.wpds-blog__page .page-numbers{
  display: inline-flex;
  min-width: 42px;
  height: 42px;
  padding: 0 12px;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  color: var(--text);
  text-decoration: none;
  font-size: 14px;
}
.wpds-blog__page .page-numbers:hover{
  background: rgba(255,255,255,.06);
  border-color: rgba(255,255,255,.18);
}
.wpds-blog__page .page-numbers.current{
  background: rgba(124,92,255,.25);
  border-color: rgba(124,92,255,.5);
}

.wpds-blog__empty{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  border-radius: 18px;
  padding: 18px;
  text-align: center;
}
.wpds-blog__emptyTitle{
  font-weight: 700;
  font-size: 18px;
  margin-bottom: 6px;
}
.wpds-blog__emptyText{
  color: var(--muted);
  margin-bottom: 10px;
}

/* Адаптив */
@media (max-width: 980px){
  .wpds-blog__heroInner{ grid-template-columns: 1fr; }
  .wpds-blog__grid{ grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 620px){
  .wpds-blog__hero{ padding: 44px 0 18px; }
  .wpds-blog__grid{ grid-template-columns: 1fr; }
  .wpds-blog__filters{ grid-template-columns: 1fr; }
}

</style>

<?php get_footer(); ?>
