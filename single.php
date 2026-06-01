<?php get_header(); ?>

<?php
$post_id = get_the_ID();

/**
 * ACF-safe getter (или default)
 */
function ds_acf_get(string $key, $default = '') {
  if (function_exists('get_field')) {
    $v = get_field($key);
    if ($v !== null && $v !== '' && $v !== false) return $v;
  }
  return $default;
}

/**
 * Нормализация изображения (ACF image array / url / id)
 * Возвращает:
 *  - full: оригинал/полный
 *  - thumb: миниатюра
 *  - alt: alt
 */
function ds_normalize_image($img, string $fallback_url = '', string $fallback_alt = ''): array {
  $out = ['full'=>'','thumb'=>'','alt'=>$fallback_alt];

  // ACF image array
  if (is_array($img)) {
    $id = (int)($img['ID'] ?? 0);
    $out['alt'] = (string)($img['alt'] ?? ($img['title'] ?? $fallback_alt));

    if ($id) {
      if (function_exists('wp_get_original_image_url')) {
        $out['full'] = (string) wp_get_original_image_url($id);
      }
      if (!$out['full']) $out['full'] = (string) wp_get_attachment_image_url($id, 'full');

      $out['thumb'] = (string) wp_get_attachment_image_url($id, 'medium_large');
      if (!$out['thumb']) $out['thumb'] = (string) wp_get_attachment_image_url($id, 'large');
      if (!$out['thumb']) $out['thumb'] = $out['full'];

      return $out;
    }

    $url = (string)($img['url'] ?? $fallback_url);
    $out['full']  = $url;
    $out['thumb'] = (string)($img['sizes']['medium_large'] ?? ($img['sizes']['large'] ?? $url));
    if (!$out['thumb']) $out['thumb'] = $url;

    return $out;
  }

  // ID
  if (is_numeric($img) && (int)$img > 0) {
    $id = (int)$img;

    if (function_exists('wp_get_original_image_url')) {
      $out['full'] = (string) wp_get_original_image_url($id);
    }
    if (!$out['full']) $out['full'] = (string) wp_get_attachment_image_url($id, 'full');

    $out['thumb'] = (string) wp_get_attachment_image_url($id, 'medium_large');
    if (!$out['thumb']) $out['thumb'] = (string) wp_get_attachment_image_url($id, 'large');
    if (!$out['thumb']) $out['thumb'] = $out['full'];

    $alt = (string) get_post_meta($id, '_wp_attachment_image_alt', true);
    if ($alt) $out['alt'] = $alt;

    return $out;
  }

  // URL string
  if (is_string($img) && $img) {
    $out['full'] = $img;
    $out['thumb'] = $img;
    return $out;
  }

  // fallback
  $out['full']  = $fallback_url;
  $out['thumb'] = $fallback_url;
  return $out;
}

/**
 * ГАЛЕРЕЯ: реальные изображения из ACF repeater `case_gallery`
 */
$gallery = function_exists('get_field') ? get_field('case_gallery') : [];
if (!is_array($gallery)) $gallery = [];

$g = [];
foreach ($gallery as $row) {
  if (!is_array($row)) continue;

  $img = $row['image'] ?? '';
  $alt = (string)($row['alt'] ?? '');

  $fallback_url = '';
  if (is_array($img) && !empty($img['url'])) $fallback_url = (string)$img['url'];
  elseif (is_string($img)) $fallback_url = $img;

  $norm = ds_normalize_image($img, $fallback_url, $alt);
  if (empty($norm['full'])) continue;

  $g[] = [
    'image' => $norm['full'],
    'thumb' => $norm['thumb'] ?: $norm['full'],
    'alt'   => $alt ?: ($norm['alt'] ?? ''),
  ];
}
$g = array_values($g);
$g = array_slice($g, 0, 5);

/** JS items: только реальные картинки */
$lb_items = array_values(array_filter($g, function($it){
  return !empty($it['image']);
}));

/**
 * SUMMARY (ACF)
 */
$case_client   = (string) ds_acf_get('case_client', 'Проект / клиент');
$case_geo      = (string) ds_acf_get('case_geo', 'Россия / СНГ');
$case_duration = (string) ds_acf_get('case_duration', '—');
$case_stack    = (string) ds_acf_get('case_stack', 'WordPress / PHP / ACF');

$r1v = (string) ds_acf_get('case_result_1_value', '+48%');
$r1k = (string) ds_acf_get('case_result_1_label', 'показатель 1');
$r2v = (string) ds_acf_get('case_result_2_value', '−35%');
$r2k = (string) ds_acf_get('case_result_2_label', 'показатель 2');
$r3v = (string) ds_acf_get('case_result_3_value', '3');
$r3k = (string) ds_acf_get('case_result_3_label', 'показатель 3');

$demo_note = (string) ds_acf_get('case_demo_note', 'Демо / доступ по запросу');

$case_site_url = (string) ds_acf_get('case_site_url', '');
$case_site_url = $case_site_url ? esc_url($case_site_url) : '';

/**
 * CONTENT blocks
 */
$task_items = function_exists('get_field') ? get_field('case_task') : [];
if (!is_array($task_items)) $task_items = [];

$done_cards = function_exists('get_field') ? get_field('case_done') : [];
if (!is_array($done_cards)) $done_cards = [];

$results_text = (string) ds_acf_get('case_results_text',
  "Платформа готова к росту: удобная публикация, быстрый каталог с фильтрами,\n".
  "модерация и монетизация. Снизили нагрузку на админа и улучшили качество объявлений."
);

$tech = function_exists('get_field') ? get_field('case_tech') : [];
if (!is_array($tech)) $tech = [];

$review_text   = (string) ds_acf_get('case_review_text', '«Получили удобный результат, всё работает стабильно и быстро.»');
$review_author = (string) ds_acf_get('case_review_author', '— Клиент');

/**
 * ЛИД (excerpt)
 */
$lead = has_excerpt($post_id)
  ? get_the_excerpt($post_id)
  : wp_trim_words(wp_strip_all_tags(strip_shortcodes((string)get_post_field('post_content', $post_id))), 28, '…');

/**
 * SEO: canonical + robots + schemas + og
 */
$canonical_url = get_permalink($post_id);
$site_name = get_bloginfo('name');
$published = get_the_date('c', $post_id);
$modified  = get_the_modified_date('c', $post_id);

$thumb_id = get_post_thumbnail_id($post_id);
$featured_url = $thumb_id ? (string) wp_get_attachment_image_url($thumb_id, 'full') : '';

$primary_image = '';
if (!empty($g) && !empty($g[0]['image'])) $primary_image = (string)$g[0]['image'];
if (!$primary_image) $primary_image = $featured_url;

add_action('wp_head', function() use ($canonical_url, $lead, $primary_image, $site_name) {
  echo '<link rel="canonical" href="' . esc_url($canonical_url) . "\" />\n";
  echo "<meta name=\"robots\" content=\"index,follow\" />\n";

  echo '<meta property="og:type" content="article" />' . "\n";
  echo '<meta property="og:url" content="' . esc_url($canonical_url) . "\" />\n";
  echo '<meta property="og:site_name" content="' . esc_attr($site_name) . "\" />\n";
  echo '<meta property="og:title" content="' . esc_attr(wp_strip_all_tags(get_the_title())) . "\" />\n";
  echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($lead)) . "\" />\n";
  if ($primary_image) {
    echo '<meta property="og:image" content="' . esc_url($primary_image) . "\" />\n";
  }
}, 1);

$breadcrumbs_schema = [
  '@context' => 'https://schema.org',
  '@type'    => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'Главная','item'=>home_url('/')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Кейсы','item'=>home_url('/cases/')],
    ['@type'=>'ListItem','position'=>3,'name'=>wp_strip_all_tags(get_the_title($post_id)),'item'=>$canonical_url],
  ],
];

$article_schema = [
  '@context' => 'https://schema.org',
  '@type'    => 'Article',
  'headline' => wp_strip_all_tags(get_the_title($post_id)),
  'description' => wp_strip_all_tags($lead),
  'datePublished' => $published,
  'dateModified'  => $modified,
  'mainEntityOfPage' => ['@type'=>'WebPage','@id'=>$canonical_url],
  'publisher' => [
    '@type'=>'Organization',
    'name'=>$site_name,
    'url'=>home_url('/'),
  ],
];
if ($primary_image) $article_schema['image'] = [$primary_image];
?>

<main class="casePage" itemscope itemtype="https://schema.org/Article">

  <!-- JSON-LD -->
  <script type="application/ld+json">
  <?php echo wp_json_encode($breadcrumbs_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
  </script>

  <script type="application/ld+json">
  <?php echo wp_json_encode($article_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
  </script>

  <!-- HERO / TOP -->
  <section class="caseTop">
    <div class="container">

      <nav class="breadcrumbs" aria-label="Хлебные крошки">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs__link">Главная</a>
        <span class="breadcrumbs__sep">/</span>
        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="breadcrumbs__link">Кейсы</a>
        <span class="breadcrumbs__sep">/</span>
        <span class="breadcrumbs__current"><?php echo esc_html(get_the_title($post_id)); ?></span>
      </nav>

      <div class="caseMeta" aria-label="Метаданные">
        <a class="chip" href="<?php echo esc_url(home_url('/cases/')); ?>">Кейсы</a>
        <span class="caseMeta__dot">•</span>
        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d', $post_id)); ?>" class="caseMeta__item">
          <?php echo esc_html(get_the_date('d M Y', $post_id)); ?>
        </time>
        <span class="caseMeta__dot">•</span>
        <span class="caseMeta__item">
          <?php
            $readMin = function_exists('ds_reading_time_minutes') ? (int) ds_reading_time_minutes($post_id) : 9;
            echo (int) max(1, $readMin);
          ?>
          мин. чтения
        </span>
        <span class="caseMeta__dot">•</span>
        <span class="caseMeta__item">
          <?php
            $views = (int) get_post_meta($post_id, 'views_count', true);
            echo number_format_i18n(max(0, $views));
          ?>
          просмотров
        </span>
      </div>

      <h1 class="h1" itemprop="headline"><?php echo esc_html(get_the_title($post_id)); ?></h1>
      <p class="lead" itemprop="description"><?php echo esc_html($lead); ?></p>

      <div class="caseProduct">

        <!-- Gallery -->
        <?php if (!empty($g)): ?>
          <section class="gallery" aria-label="Галерея кейса">

            <?php foreach ($g as $i => $it): ?>
              <input class="gallery__radio" type="radio" name="g" id="g<?php echo $i + 1; ?>" <?php echo $i === 0 ? 'checked' : ''; ?>>
            <?php endforeach; ?>

            <div class="gallery__stage is-screenshot">
              <?php foreach ($g as $i => $it): ?>
                <figure class="gallery__slide s<?php echo $i + 1; ?>">
                  <button
                    class="gallery__zoom"
                    type="button"
                    data-index="<?php echo (int)$i; ?>"
                    aria-label="Открыть изображение <?php echo (int)($i+1); ?> в просмотрщике"
                  >
                    <img
                      class="gallery__img"
                      src="<?php echo esc_url($it['image']); ?>"
                      alt="<?php echo esc_attr($it['alt'] ?: ('Скриншот ' . ($i + 1))); ?>"
                      loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                      decoding="async"
                    />
                  </button>
                </figure>
              <?php endforeach; ?>
            </div>

            <div class="gallery__thumbs" role="tablist" aria-label="Миниатюры">
              <?php foreach ($g as $i => $it): ?>
                <label class="thumb" for="g<?php echo $i + 1; ?>" role="tab">
                  <img
                    class="thumb__img"
                    src="<?php echo esc_url($it['thumb']); ?>"
                    alt="Миниатюра: <?php echo (int)($i + 1); ?>"
                    loading="lazy"
                    decoding="async"
                  />
                  <button
                    class="thumb__zoom"
                    type="button"
                    data-index="<?php echo (int)$i; ?>"
                    aria-label="Открыть миниатюру <?php echo (int)($i+1); ?> в просмотрщике"
                  ></button>
                </label>
              <?php endforeach; ?>
            </div>

          </section>
        <?php endif; ?>

        <!-- Info -->
        <aside class="caseSummary" aria-label="Описание кейса">
          <div class="caseSummary__card">

            <div class="caseSummary__chips" aria-label="Теги">
              <?php
              $chips = (array) ds_acf_get('case_chips', ['Кейс', 'WordPress', 'UX/UI', 'Интеграции']);
              $chips = array_slice(array_values(array_filter(array_map('trim', $chips))), 0, 6);
              foreach ($chips as $chip) {
                echo '<span class="tag">' . esc_html($chip) . '</span>';
              }
              ?>
            </div>

            <dl class="facts">
              <div class="facts__row">
                <dt class="facts__k">Клиент</dt>
                <dd class="facts__v"><?php echo esc_html($case_client); ?></dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Гео</dt>
                <dd class="facts__v"><?php echo esc_html($case_geo); ?></dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Срок</dt>
                <dd class="facts__v"><?php echo esc_html($case_duration); ?></dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Стек</dt>
                <dd class="facts__v"><?php echo esc_html($case_stack); ?></dd>
              </div>
            </dl>

            <div class="resultBox" aria-label="Результаты">
              <div class="resultBox__title">Результат</div>
              <div class="resultBox__grid">
                <div class="metric">
                  <div class="metric__v"><?php echo esc_html($r1v); ?></div>
                  <div class="metric__k"><?php echo esc_html($r1k); ?></div>
                </div>
                <div class="metric">
                  <div class="metric__v"><?php echo esc_html($r2v); ?></div>
                  <div class="metric__k"><?php echo esc_html($r2k); ?></div>
                </div>
                <div class="metric">
                  <div class="metric__v"><?php echo esc_html($r3v); ?></div>
                  <div class="metric__k"><?php echo esc_html($r3k); ?></div>
                </div>
              </div>
            </div>

            <div class="actions">
              <a class="btn btn--primary btn--block" href="#lead">Оценить ваш проект</a>

              <?php if ($case_site_url): ?>
                <a class="btn btn--ghost btn--block"
                  href="<?php echo esc_url($case_site_url); ?>"
                  target="_blank" rel="noopener nofollow">
                  Открыть сайт
                </a>
              <?php endif; ?>

              <a class="btn btn--ghost btn--block" href="<?php echo esc_url(home_url('/cases/')); ?>">
                Смотреть другие кейсы
              </a>
            </div>

            <div class="caseSummary__foot">
              <span class="muted"><?php echo esc_html($demo_note); ?></span>
              <span class="muted">•</span>
              <a class="link" href="<?php echo esc_url($canonical_url); ?>" onclick="navigator.share && navigator.share({title: document.title, url: this.href}); return false;">
                Поделиться
              </a>
            </div>

          </div>
        </aside>

      </div>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="caseBody">
    <div class="container caseBody__grid">

      <article class="content" itemprop="articleBody">
        <h2 class="h2">Задача</h2>
        <?php if (!empty($task_items)): ?>
          <ul class="list">
            <?php foreach ($task_items as $row):
              $txt = is_array($row) ? (string)($row['text'] ?? '') : (string)$row;
              $txt = trim($txt);
              if ($txt === '') continue;
            ?>
              <li><?php echo esc_html($txt); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="muted">Задачи описаны в проектной документации — по запросу расскажу подробнее.</p>
        <?php endif; ?>

        <h2 class="h2">Что сделали</h2>
        <div class="cards">
          <?php if (!empty($done_cards)): ?>
            <?php foreach ($done_cards as $c):
              if (!is_array($c)) continue;
              $t = trim((string)($c['title'] ?? ''));
              $p = trim((string)($c['text'] ?? ''));
              if ($t === '' && $p === '') continue;
            ?>
              <section class="card">
                <?php if ($t !== ''): ?>
                  <h3 class="h3"><?php echo esc_html($t); ?></h3>
                <?php endif; ?>
                <?php if ($p !== ''): ?>
                  <p><?php echo esc_html($p); ?></p>
                <?php endif; ?>
              </section>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="muted">Список работ доступен по запросу — подготовлю краткий план и смету.</p>
          <?php endif; ?>
        </div>

        <h2 class="h2">Результаты</h2>
        <div class="callout">
          <div class="callout__badge">Итог</div>
          <p class="callout__text"><?php echo nl2br(esc_html($results_text)); ?></p>
        </div>

        <h2 class="h2">Технологии</h2>
        <div class="pillRow">
          <?php if (!empty($tech)): ?>
            <?php foreach ($tech as $row):
              $txt = is_array($row) ? (string)($row['text'] ?? '') : (string)$row;
              $txt = trim($txt);
              if ($txt === '') continue;
            ?>
              <span class="pill"><?php echo esc_html($txt); ?></span>
            <?php endforeach; ?>
          <?php else: ?>
            <span class="pill">WordPress</span>
            <span class="pill">PHP</span>
            <span class="pill">ACF</span>
          <?php endif; ?>
        </div>

        <h2 class="h2">Отзыв</h2>
        <blockquote class="quote">
          <p><?php echo esc_html($review_text); ?></p>
          <footer><?php echo esc_html($review_author); ?></footer>
        </blockquote>
      </article>

      <aside class="side">
        <div class="sideCard" id="lead">
          <h3 class="h3">Нужен проект под вашу нишу?</h3>
          <p class="muted">Оставьте контакты — предложу архитектуру, сроки и варианты монетизации.</p>

          <div class="TariffsWithForm_formWrapper__5qdfc" style="background: #232834;">
            <strong class="TariffsWithForm_formTitle__rWWca">Не нашли нужный формат?</strong>
            <p class="TariffsWithForm_formSubtitle__dJAkn">
              Опишите задачу в форме ниже — подберём решение и рассчитаем точную стоимость.
            </p>

            <aside class="sticky-form">
              <?php echo do_shortcode('[smart_contact_form]'); ?>
            </aside>
          </div>
        </div>

        <div class="sideCard sideCard--ghost">
          <h3 class="h3">Другие кейсы</h3>

          <?php
          $related = new WP_Query([
            'post_type'      => 'case',
            'posts_per_page' => 3,
            'post__not_in'   => [$post_id],
            'orderby'        => 'date',
            'order'          => 'DESC',
            'no_found_rows'  => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
          ]);
          ?>

          <?php if ($related->have_posts()): ?>
            <?php while ($related->have_posts()): $related->the_post(); ?>
              <a class="miniCase" href="<?php the_permalink(); ?>">
                <span class="miniCase__t"><?php the_title(); ?></span>
                <time class="miniCase__m muted" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                  <?php echo esc_html(get_the_date('d M Y')); ?>
                </time>
              </a>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php else: ?>
            <p class="muted" style="margin:0;">Пока нет других кейсов.</p>
          <?php endif; ?>

        </div>
      </aside>

    </div>
  </section>
</main>

<style>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap");

:root{
  --bg:#ffffff;
  --text:#111213;
  --muted:#6b7280;
  --line:#e7e7ea;
  --soft:#f6f7f9;
  --soft2:#f1f2f5;
  --shadow: 0 14px 40px rgba(16,24,40,.08);
  --accent:#e01b24;
  --accent2:#c9151d;
  --radius:18px;
  --radius2:22px;
  --container:1180px;
}

img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
.container{max-width:var(--container);margin:0 auto;padding:0 20px}

.h1{font-size:44px;line-height:1.05;margin:10px 0 12px;letter-spacing:-.02em}
.h2{font-size:26px;line-height:1.2;margin:34px 0 14px}
.h3{font-size:18px;line-height:1.25;margin:0 0 10px}
.lead{font-size:18px;color:#2a2d33;max-width:72ch;margin:0 0 26px}
.muted{color:var(--muted)}
.link{color:var(--accent)}
.link:hover{color:var(--accent2)}

/* Buttons */
.btn{
  display:inline-flex;align-items:center;justify-content:center;
  gap:10px;
  padding:12px 16px;
  border-radius:14px;
  font-weight:600;
  border:1px solid transparent;
  transition:.18s ease;
  white-space:nowrap;
}
.btn--primary{background:var(--accent);color:#fff}
.btn--primary:hover{background:var(--accent2);transform:translateY(-1px)}
.btn--ghost{background:#fff;border-color:var(--line)}
.btn--ghost:hover{border-color:#d0d3da;transform:translateY(-1px)}
.btn--block{width:100%}

/* Top */
.caseTop{padding:26px 0 26px}
.breadcrumbs{display:flex;flex-wrap:wrap;gap:8px;color:var(--muted);font-size:14px}
.breadcrumbs__sep{opacity:.5}
.breadcrumbs__link:hover{color:var(--accent)}
.breadcrumbs__current{color:#2a2d33}

.caseMeta{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin:12px 0 12px}
.caseMeta__dot{opacity:.35}
.caseMeta__item{color:var(--muted);font-size:14px}

.chip{
  display:inline-flex;align-items:center;justify-content:center;
  height:28px;padding:0 12px;border-radius:999px;
  background:var(--soft);border:1px solid var(--line);
  font-weight:600;font-size:13px;color:#2a2d33;
}

/* Product-like layout */
.caseProduct{
  display:grid;
  grid-template-columns: 1.2fr .8fr;
  gap:28px;
  align-items:start;
  margin-top:18px;
}

/* Gallery */
.gallery{min-width:0}
.gallery__radio{position:absolute;opacity:0;pointer-events:none}
.gallery__stage{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  overflow:hidden;
  background:var(--soft2);
  box-shadow:var(--shadow);
  aspect-ratio: 16 / 10;
  position:relative;
}
.gallery__slide{position:absolute;inset:0;opacity:0;transition:.2s ease}
.gallery__img{width:100%;height:100%;object-fit:cover}

/* ВАЖНО: кнопка над изображением, чтобы клик всегда ловился */
.gallery__zoom{
  all:unset;
  display:block;
  width:100%;
  height:100%;
  cursor:zoom-in;
}

#g1:checked ~ .gallery__stage .s1,
#g2:checked ~ .gallery__stage .s2,
#g3:checked ~ .gallery__stage .s3,
#g4:checked ~ .gallery__stage .s4,
#g5:checked ~ .gallery__stage .s5{opacity:1}

.gallery__thumbs{
  margin-top:12px;
  display:grid;
  grid-template-columns: repeat(5, 1fr);
  gap:10px;
}
.thumb{
  position:relative;
  border:1px solid var(--line);
  border-radius:14px;
  overflow:hidden;
  background:#fff;
  cursor:pointer;
  transition:.18s ease;
}
.thumb:hover{transform:translateY(-1px);border-color:#d0d3da}
.thumb__img{width:100%;height:76px;object-fit:cover}

/* прозрачная кнопка поверх миниатюры для lightbox */
.thumb__zoom{
  position:absolute;
  inset:0;
  background:transparent;
  border:0;
  cursor:zoom-in;
}

#g1:checked ~ .gallery__thumbs label[for="g1"],
#g2:checked ~ .gallery__thumbs label[for="g2"],
#g3:checked ~ .gallery__thumbs label[for="g3"],
#g4:checked ~ .gallery__thumbs label[for="g4"],
#g5:checked ~ .gallery__thumbs label[for="g5"]{
  border-color: rgba(224,27,36,.6);
  box-shadow: 0 0 0 3px rgba(224,27,36,.14);
}

/* Summary */
.caseSummary{position:sticky;top:96px}
.caseSummary__card{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  padding:18px;
  box-shadow:var(--shadow);
  background:#fff;
}
.caseSummary__chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:14px}
.tag{
  padding:6px 10px;
  border-radius:999px;
  border:1px solid var(--line);
  background:var(--soft);
  font-weight:600;
  font-size:13px;
}
.facts{margin:0 0 14px}
.facts__row{display:flex;justify-content:space-between;gap:14px;padding:10px 0;border-top:1px solid var(--line)}
.facts__row:first-child{border-top:0;padding-top:0}
.facts__k{color:var(--muted);font-size:14px}
.facts__v{font-weight:600;font-size:14px;text-align:right}

.resultBox{
  border:1px solid rgba(224,27,36,.22);
  background:rgba(224,27,36,.06);
  border-radius:18px;
  padding:14px;
  margin:14px 0;
}
.resultBox__title{font-weight:700;margin-bottom:10px}
.resultBox__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
.metric{
  background:#fff;
  border:1px solid var(--line);
  border-radius:16px;
  padding:12px;
  text-align:center;
}
.metric__v{font-size:20px;font-weight:800;letter-spacing:-.02em}
.metric__k{font-size:13px;color:var(--muted)}

.actions{display:grid;gap:10px;margin-top:12px}
.caseSummary__foot{margin-top:14px;display:flex;gap:10px;align-items:center;font-size:13px}

/* Body */
.caseBody{padding:10px 0 60px}
.caseBody__grid{display:grid;grid-template-columns: 1.2fr .8fr;gap:28px;align-items:start}
.content{min-width:0}

.list{margin:0;padding-left:18px}
.list li{margin:10px 0}

.cards{display:grid;grid-template-columns:repeat(2, minmax(0,1fr));gap:14px}
.card{
  border:1px solid var(--line);
  border-radius:18px;
  padding:16px;
  background:#fff;
  box-shadow: 0 10px 30px rgba(16,24,40,.05);
}

.callout{
  border:1px solid var(--line);
  border-radius:18px;
  padding:16px;
  background:linear-gradient(180deg, rgba(224,27,36,.06), rgba(224,27,36,.02));
}
.callout__badge{
  display:inline-flex;
  height:26px;align-items:center;
  padding:0 10px;
  border-radius:999px;
  background:#fff;
  border:1px solid rgba(224,27,36,.25);
  color:var(--accent);
  font-weight:700;
  font-size:12px;
  margin-bottom:10px;
}
.callout__text{margin:0}

.pillRow{display:flex;flex-wrap:wrap;gap:10px}
.pill{
  border:1px solid var(--line);
  background:var(--soft);
  border-radius:999px;
  padding:8px 12px;
  font-weight:600;
  font-size:13px;
}

.quote{
  margin:0;
  border-left:4px solid var(--accent);
  padding:12px 14px;
  background:var(--soft);
  border-radius:14px;
}
.quote p{margin:0 0 10px}
.quote footer{color:var(--muted);font-size:14px}

/* Side */
.side{position:sticky;top:96px;display:grid;gap:14px}
.sideCard{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  padding:18px;
  background:#fff;
  box-shadow:var(--shadow);
}
.sideCard--ghost{background:var(--soft);box-shadow:none}

.miniCase{
  display:block;
  padding:12px 0;
  border-top:1px solid rgba(0,0,0,.06);
}
.miniCase:first-of-type{border-top:0;padding-top:0}
.miniCase__t{display:block;font-weight:700}
.miniCase:hover .miniCase__t{color:var(--accent)}

/* Responsive */
@media (max-width: 980px){
  .h1{font-size:34px}
  .caseProduct{grid-template-columns:1fr}
  .caseSummary{position:relative;top:auto}
  .caseBody__grid{grid-template-columns:1fr}
  .side{position:relative;top:auto}
  .cards{grid-template-columns:1fr}
  .gallery__thumbs{grid-template-columns:repeat(5, minmax(0,1fr))}
}
@media (max-width: 520px){
  .h1{font-size:28px}
  .gallery__thumbs{grid-template-columns:repeat(3, minmax(0,1fr))}
  .resultBox__grid{grid-template-columns:1fr}
}
</style>

<!-- LightBox -->
<div class="lb" id="caseLightbox" aria-hidden="true">
  <button class="lb__close" type="button" aria-label="Закрыть">✕</button>
  <button class="lb__nav lb__prev" type="button" aria-label="Предыдущее">‹</button>
  <button class="lb__nav lb__next" type="button" aria-label="Следующее">›</button>

  <div class="lb__scroll">
    <figure class="lb__figure">
      <img class="lb__img" alt="">
      <figcaption class="lb__cap"></figcaption>
    </figure>
  </div>
</div>

<style>
.lb{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.86);
  display:none;
  z-index:9999;
}
.lb.is-open{display:block}

.lb__scroll{
  position:absolute;
  inset:0;
  overflow:auto;
  -webkit-overflow-scrolling: touch;
  padding:24px;
  display:flex;
  justify-content:center;
  align-items:flex-start;
}

.lb__figure{
  margin:0;
  width:min(1200px, 96vw);
  display:flex;
  flex-direction:column;
  gap:10px;
  align-items:center;
}

.lb__img{
  width:100%;
  height:auto;
  max-height:none;
  object-fit:initial;
  border-radius:14px;
  box-shadow:0 24px 80px rgba(0,0,0,.45);
  image-rendering:auto;
  transition: opacity .15s ease;
}

.lb__cap{
  color:rgba(255,255,255,.82);
  font-size:14px;
  text-align:center;
  max-width:90ch;
  padding-bottom:18px;
}

.lb__close{
  position:fixed;
  top:14px;
  right:14px;
  width:44px;
  height:44px;
  border-radius:12px;
  border:1px solid rgba(255,255,255,.18);
  background:rgba(255,255,255,.08);
  color:#fff;
  font-size:20px;
  cursor:pointer;
  z-index:10000;
}
.lb__close:hover{background:rgba(255,255,255,.12)}

.lb__nav{
  position:fixed;
  top:50%;
  transform:translateY(-50%);
  width:46px;
  height:46px;
  border-radius:14px;
  border:1px solid rgba(255,255,255,.18);
  background:rgba(255,255,255,.08);
  color:#fff;
  font-size:34px;
  line-height:1;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  z-index:10000;
}
.lb__nav:hover{background:rgba(255,255,255,.12)}
.lb__prev{left:14px}
.lb__next{right:14px}

.gallery__img, .thumb__img{cursor:zoom-in}
</style>

<script>
window.CASE_GALLERY = <?php echo wp_json_encode($lb_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
</script>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const items = Array.isArray(window.CASE_GALLERY) ? window.CASE_GALLERY.filter(it => it && it.image) : [];
  if (!items.length) return;

  const lb = document.getElementById('caseLightbox');
  if (!lb) return;

  const lbImg = lb.querySelector('.lb__img');
  const lbCap = lb.querySelector('.lb__cap');
  const btnClose = lb.querySelector('.lb__close');
  const btnPrev  = lb.querySelector('.lb__prev');
  const btnNext  = lb.querySelector('.lb__next');

  let index = 0;
  let lastFocus = null;

  const clamp = (i) => Math.max(0, Math.min(items.length - 1, i));

  function preload(i){
    const it = items[clamp(i)];
    if (!it || !it.image) return;
    const im = new Image();
    im.decoding = 'async';
    im.src = it.image;
  }

  function updateNav(){
    const one = items.length <= 1;
    btnPrev.style.display = one ? 'none' : '';
    btnNext.style.display = one ? 'none' : '';
  }

  function setImage(src, alt){
    lbCap.textContent = alt || '';
    lbImg.alt = alt || '';

    lbImg.style.opacity = '0';
    lbImg.onload = () => { lbImg.style.opacity = '1'; };
    lbImg.onerror = () => { lbImg.style.opacity = '1'; };

    lbImg.src = '';
    void lbImg.offsetHeight;
    lbImg.src = src;

    preload(index - 1);
    preload(index + 1);
  }

  function render(){
    const it = items[index];
    if (!it) return;
    setImage(it.image, it.alt || '');
  }

  function openAt(i){
    index = clamp(i);
    lastFocus = document.activeElement;

    updateNav();
    render();

    lb.classList.add('is-open');
    lb.setAttribute('aria-hidden','false');
    document.body.style.overflow = 'hidden';

    // переводим фокус на close
    btnClose.focus({preventScroll:true});
  }

  function close(){
    lb.classList.remove('is-open');
    lb.setAttribute('aria-hidden','true');
    document.body.style.overflow = '';
    lbImg.src = '';
    if (lastFocus && typeof lastFocus.focus === 'function') lastFocus.focus();
  }

  function prev(){
    if (items.length <= 1) return;
    index = (index - 1 + items.length) % items.length;
    render();
  }

  function next(){
    if (items.length <= 1) return;
    index = (index + 1) % items.length;
    render();
  }

  // Делегирование кликов по кнопкам зума
  document.addEventListener('click', function(e){
    const z = e.target.closest('.gallery__zoom, .thumb__zoom');
    if (!z) return;

    e.preventDefault();
    e.stopPropagation();

    const i = parseInt(z.getAttribute('data-index') || '0', 10);
    openAt(Number.isFinite(i) ? i : 0);
  }, true);

  btnClose.addEventListener('click', close);
  btnPrev.addEventListener('click', prev);
  btnNext.addEventListener('click', next);

  lb.addEventListener('click', (e) => {
    if (e.target === lb) close();
  });

  document.addEventListener('keydown', (e) => {
    if (!lb.classList.contains('is-open')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'ArrowRight') next();
  });

  let startX = null;
  lb.addEventListener('touchstart', (e) => {
    if (!lb.classList.contains('is-open')) return;
    startX = e.touches[0].clientX;
  }, {passive:true});

  lb.addEventListener('touchend', (e) => {
    if (!lb.classList.contains('is-open') || startX === null) return;
    const endX = e.changedTouches[0].clientX;
    const dx = endX - startX;
    startX = null;
    if (Math.abs(dx) < 40) return;
    dx > 0 ? prev() : next();
  }, {passive:true});

  updateNav();
});
</script>

<?php get_footer(); ?>
