<?php
/*
Template Name: Услуга (WP Dev Studio)
*/
get_header();

/**
 * Хелпер: meta из ACF или произвольных полей
 */
function wpds_get_meta(string $key, $default = '') {
  if (function_exists('get_field')) {
    $val = get_field($key);
    return ($val !== null && $val !== '') ? $val : $default;
  }
  $val = get_post_meta(get_the_ID(), $key, true);
  return ($val !== '') ? $val : $default;
}

/**
 * Данные услуги
 */
$post_id = get_the_ID();

$title      = (string) wpds_get_meta('service_h1', get_the_title($post_id), $post_id);
$subtitle   = (string) wpds_get_meta('service_subtitle', 'Разработка на WordPress под задачу: дизайн, код, скорость, SEO и нестандартный функционал.', $post_id);
$price_from = (string) wpds_get_meta('service_price_from', 'От 35 000 ₽', $post_id);
$time_from  = (string) wpds_get_meta('service_time_from', 'от 7 дней', $post_id);
$cta_text   = (string) wpds_get_meta('service_cta_text', 'Обсудить задачу', $post_id);
$cta_link   = (string) wpds_get_meta('service_cta_link', '#bottom-form', $post_id);


$tg_url     = (string) wpds_get_meta('service_tg_url', 'https://t.me/+79250404189'); // поменяй/заполни в ACF
$contacts_url = home_url('/contacts/');

$bullets = (string) wpds_get_meta('service_bullets',
  "Индивидуальная верстка без шаблонов\nЧистый код и высокая скорость\nПодготовка к SEO и аналитике\nПоддержка и развитие"
);
$bullets_arr = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $bullets))));

$included = (string) wpds_get_meta('service_included',
  "Техническое задание и структура\nАдаптивная верстка\nНатяжка на WordPress\nФормы/интеграции\nБазовая SEO-настройка\nОптимизация скорости"
);
$included_arr = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $included))));

$steps = (string) wpds_get_meta('service_steps',
  "Бриф и оценка\nПрототип/структура\nВерстка и сборка\nИнтеграции и наполнение\nТестирование\nЗапуск + поддержка"
);
$steps_arr = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $steps))));

$faq_q = (string) wpds_get_meta('service_faq_q',
  "Что нужно, чтобы начать?\nСколько правок включено?\nВы даёте гарантию?\nМожно ли поэтапную оплату?"
);
$faq_a = (string) wpds_get_meta('service_faq_a',
  "Коротко: ссылка на пример/референсы, описание задачи, материалы (тексты/фото) и доступы (если есть текущий сайт).\nОбычно включаю разумный пакет правок на каждом этапе. Если правки меняют ТЗ — согласуем отдельно.\nДа. Исправляю баги после запуска в гарантийный период, если не менялось ТЗ/плагины/окружение.\nДа, чаще всего работаю по 2–3 этапам: предоплата → готовый этап → финал."
);

$faq_q_arr = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $faq_q))));
$faq_a_arr = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $faq_a))));

$faq_pairs = [];
$max = min(count($faq_q_arr), count($faq_a_arr));
for ($i = 0; $i < $max; $i++) {
  $faq_pairs[] = ['q' => $faq_q_arr[$i], 'a' => $faq_a_arr[$i]];
}

/**
 * Featured image + alt корректно
 */
$thumb_id  = get_post_thumbnail_id($post_id);
$featured  = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'full') : '';
$feat_alt  = $thumb_id ? (string) get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
if ($feat_alt === '') $feat_alt = $title;

/**
 * SEO: canonical + robots + JSON-LD (Service) + FAQ schema
 * canonical на конкретную услугу обычно сам делает WP/SEO-плагин,
 * но мы добавляем на всякий случай (не ломает).
 */
$canonical_url = get_permalink($post_id);

add_action('wp_head', function() use ($canonical_url, $title, $subtitle, $featured) {
  echo '<link rel="canonical" href="' . esc_url($canonical_url) . "\" />\n";
  echo "<meta name=\"robots\" content=\"index,follow\" />\n";

  // Небольшой OG минимум на случай отсутствия SEO-плагина (можешь убрать, если дублируется RankMath/Yoast)
  echo '<meta property="og:type" content="article" />' . "\n";
  echo '<meta property="og:title" content="' . esc_attr(wp_strip_all_tags($title)) . "\" />\n";
  echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($subtitle)) . "\" />\n";
  echo '<meta property="og:url" content="' . esc_url($canonical_url) . "\" />\n";
  if ($featured) {
    echo '<meta property="og:image" content="' . esc_url($featured) . "\" />\n";
  }
}, 1);

/**
 * JSON-LD: Service (плюс Offer в упрощённом виде)
 * Важно: цены у тебя текстом ("От 35 000 ₽"), поэтому Offer — без amount/currency,
 * чтобы не накосячить валидатором.
 */
$service_schema = [
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => wp_strip_all_tags($title),
  'description' => wp_strip_all_tags($subtitle),
  'url'      => $canonical_url,
  'provider' => [
    '@type' => 'Organization',
    'name'  => get_bloginfo('name'),
    'url'   => home_url('/'),
  ],
  'areaServed' => 'RU',
  'termsOfService' => $contacts_url,
];
if ($featured) {
  $service_schema['image'] = $featured;
}

// FAQ schema соберём отдельно (ниже в выводе, чтобы не плодить два скрипта без надобности)
?>

<main class="wpds-service" itemscope itemtype="https://schema.org/WebPage">

  <!-- Service schema -->
  <script type="application/ld+json">
  <?php echo wp_json_encode($service_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
  </script>

  <section class="wpds-service__hero">
    <div class="wpds-service__container">
      <div class="wpds-service__heroInner">

        <div class="wpds-service__heroText">
          <div class="wpds-service__kicker">Услуга</div>

          <h1 class="wpds-service__title"><?php echo esc_html($title); ?></h1>
          <p class="wpds-service__subtitle"><?php echo esc_html($subtitle); ?></p>

          <div class="wpds-service__quick" aria-label="Ключевые параметры">
            <div class="wpds-service__quickItem">
              <div class="wpds-service__quickLabel">Стоимость</div>
              <div class="wpds-service__quickValue"><?php echo esc_html($price_from); ?></div>
            </div>
            <div class="wpds-service__quickItem">
              <div class="wpds-service__quickLabel">Срок</div>
              <div class="wpds-service__quickValue"><?php echo esc_html($time_from); ?></div>
            </div>
            <div class="wpds-service__quickItem">
              <div class="wpds-service__quickLabel">Формат</div>
              <div class="wpds-service__quickValue">Под ключ</div>
            </div>
          </div>

          <div class="wpds-service__actions">
            <a class="wpds-service__btn wpds-service__btn--primary" href="<?php echo esc_url($cta_link); ?>">
              <?php echo esc_html($cta_text); ?> <span aria-hidden="true">→</span>
            </a>
            <a class="wpds-service__btn" href="<?php echo esc_url($contacts_url); ?>">
              Контакты
            </a>
          </div>

          <?php if (!empty($bullets_arr)): ?>
            <ul class="wpds-service__bullets" aria-label="Преимущества">
              <?php foreach ($bullets_arr as $b): ?>
                <li><?php echo esc_html($b); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <aside class="wpds-service__heroCard" aria-label="Превью услуги">
          <div class="wpds-service__preview">
            <?php if ($featured): ?>
              <img
                src="<?php echo esc_url($featured); ?>"
                alt="<?php echo esc_attr($feat_alt); ?>"
                loading="lazy"
                decoding="async"
              >
            <?php else: ?>
              <div class="wpds-service__previewPlaceholder" aria-hidden="true">
                <div class="wpds-service__previewBrand">WPDevStudio</div>
                <div class="wpds-service__previewHint">Добавьте обложку услуги (featured image)</div>
              </div>
            <?php endif; ?>
          </div>

          <div class="wpds-service__cardNote">
            Хочешь точную оценку? Пришли пример/референс и требования — скажу стоимость и сроки в день обращения.
          </div>
        </aside>

      </div>
    </div>
  </section>

  <section class="wpds-service__section">
    <div class="wpds-service__container">
      <div class="wpds-service__grid2">

        <div class="wpds-service__panel">
          <h2 class="wpds-service__h2">Что входит</h2>
          <?php if (!empty($included_arr)): ?>
            <ul class="wpds-service__list">
              <?php foreach ($included_arr as $item): ?>
                <li><?php echo esc_html($item); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <div class="wpds-service__panel">
          <h2 class="wpds-service__h2">Как работаем</h2>
          <?php if (!empty($steps_arr)): ?>
            <ol class="wpds-service__steps">
              <?php foreach ($steps_arr as $s): ?>
                <li><span class="wpds-service__stepDot" aria-hidden="true"></span><?php echo esc_html($s); ?></li>
              <?php endforeach; ?>
            </ol>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>

  <section class="wpds-service__section">
    <div class="wpds-service__container">
      <div class="wpds-service__panel">
        <h2 class="wpds-service__h2">Описание</h2>

        <div class="wpds-service__content">
          <?php
          while (have_posts()) : the_post();
            the_content();
          endwhile;
          ?>
        </div>

      </div>
    </div>
  </section>

  <?php if (!empty($faq_pairs)): ?>
    <section class="wpds-service__section">
      <div class="wpds-service__container">
        <div class="wpds-service__panel">
          <h2 class="wpds-service__h2">FAQ</h2>

          <div class="wpds-faq">
            <?php foreach ($faq_pairs as $idx => $row): ?>
              <details class="wpds-faq__item" <?php echo ($idx === 0) ? 'open' : ''; ?>>
                <summary class="wpds-faq__q"><?php echo esc_html($row['q']); ?></summary>
                <div class="wpds-faq__a"><?php echo nl2br(esc_html($row['a'])); ?></div>
              </details>
            <?php endforeach; ?>
          </div>

          <?php
          // FAQ schema (валидная версия)
          $schema_items = [];
          foreach ($faq_pairs as $row) {
            $schema_items[] = [
              '@type' => 'Question',
              'name'  => wp_strip_all_tags($row['q']),
              'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags($row['a']),
              ],
            ];
          }
          ?>
          <script type="application/ld+json">
          <?php echo wp_json_encode([
            '@context' => 'https://schema.org',
            '@type'    => 'FAQPage',
            'mainEntity' => $schema_items,
          ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
          </script>

        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="wpds-service__cta" id="bottom-form">
    <div class="wpds-service__container">
      <div class="wpds-service__ctaInner">
        <div class="wpds-service__ctaText">
          <div class="wpds-service__ctaTitle">Нужна разработка на WordPress?</div>
          <div class="wpds-service__ctaSub">
            Опиши задачу и пришли ссылки на примеры — я отвечу со стоимостью и сроками.
          </div>
        </div>

        <div class="wpds-service__ctaActions">
          <a class="wpds-service__btn wpds-service__btn--primary" href="<?php echo esc_url($contacts_url); ?>">
            Оставить заявку <span aria-hidden="true">→</span>
          </a>

          <?php if (!empty($tg_url) && $tg_url !== 'https://t.me/'): ?>
            <a class="wpds-service__btn" href="<?php echo esc_url($tg_url); ?>" target="_blank" rel="noopener noreferrer">
              Написать в Telegram
            </a>
          <?php else: ?>
            <a class="wpds-service__btn" href="<?php echo esc_url($contacts_url); ?>">
              Написать сообщение
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

</main>

<style>
  .wpds-service{
  --bg: var(--wpds-bg, #0b0f17);
  --panel: var(--wpds-panel, rgba(255,255,255,.06));
  --panel2: var(--wpds-panel2, rgba(255,255,255,.08));
  --stroke: var(--wpds-stroke, rgba(255,255,255,.12));
  --text: var(--wpds-text, rgba(255,255,255,.92));
  --muted: var(--wpds-muted, rgba(255,255,255,.66));
  --muted2: var(--wpds-muted2, rgba(255,255,255,.52));
  --accent: var(--wpds-accent, #7c5cff);

  background:
    radial-gradient(1200px 700px at 20% 0%, rgba(124,92,255,.20), transparent 55%),
    radial-gradient(900px 600px at 85% 10%, rgba(0,209,255,.14), transparent 55%),
    var(--bg);
  color: var(--text);
}

.wpds-service__container{
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}

.wpds-service__hero{
  padding: 64px 0 18px;
}

.wpds-service__heroInner{
  display: grid;
  grid-template-columns: 1.35fr .65fr;
  gap: 18px;
  align-items: start;
}

.wpds-service__kicker{
  display:inline-flex;
  padding: 8px 12px;
  border-radius: 999px;
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  color: var(--muted);
  font-size: 13px;
}

.wpds-service__title{
  margin: 14px 0 10px;
  font-size: clamp(28px, 3.4vw, 44px);
  line-height: 1.1;
  letter-spacing: -.3px;
}

.wpds-service__subtitle{
  margin: 0 0 16px;
  color: var(--muted);
  font-size: 16px;
  line-height: 1.55;
  max-width: 68ch;
}

.wpds-service__quick{
  display: grid;
  grid-template-columns: repeat(3, minmax(0,1fr));
  gap: 10px;
  margin: 0 0 14px;
}

.wpds-service__quickItem{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  border-radius: 14px;
  padding: 10px 12px;
}

.wpds-service__quickLabel{
  font-size: 12px;
  color: var(--muted2);
  margin-bottom: 4px;
}

.wpds-service__quickValue{
  font-weight: 700;
  font-size: 14px;
}

.wpds-service__actions{
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 14px;
}

.wpds-service__btn{
  display:inline-flex;
  align-items:center;
  gap: 8px;
  padding: 12px 14px;
  border-radius: 14px;
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  color: #fff;
  text-decoration: none;
  transition: transform .15s ease, filter .15s ease, background .15s ease;
}
.wpds-service__btn:hover{ transform: translateY(-1px); background: rgba(255,255,255,.06); }

.wpds-service__btn--primary{
  background: linear-gradient(180deg, rgba(124,92,255,.95), rgba(124,92,255,.75));
  border-color: rgba(124,92,255,.45);
}
.wpds-service__btn--primary:hover{ filter: brightness(1.05); }

.wpds-service__bullets{
  margin: 0;
  padding-left: 18px;
  color: var(--muted);
  line-height: 1.7;
}

.wpds-service__heroCard{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.04);
  border-radius: 18px;
  overflow: hidden;
  backdrop-filter: blur(10px);
}

.wpds-service__preview{
  aspect-ratio: 16/10;
  background: rgba(255,255,255,.02);
  overflow: hidden;
}

.wpds-service__preview img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transform: scale(1.01);
}

.wpds-service__previewPlaceholder{
  height: 100%;
  display: grid;
  place-items: center;
  text-align: center;
  background:
    radial-gradient(600px 260px at 20% 0%, rgba(124,92,255,.25), transparent 55%),
    radial-gradient(520px 240px at 80% 10%, rgba(0,209,255,.18), transparent 55%),
    rgba(255,255,255,.03);
}
.wpds-service__previewBrand{
  font-weight: 800;
  letter-spacing: .3px;
  opacity: .9;
}
.wpds-service__previewHint{
  margin-top: 6px;
  font-size: 12px;
  color: var(--muted2);
}

.wpds-service__cardNote{
  padding: 12px 14px 14px;
  color: var(--muted);
  font-size: 13px;
  line-height: 1.55;
  border-top: 1px solid var(--stroke);
}

.wpds-service__section{
  padding: 16px 0 0;
}

.wpds-service__grid2{
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

.wpds-service__panel{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.03);
  border-radius: 18px;
  padding: 16px;
}

.wpds-service__h2{
  margin: 0 0 10px;
  font-size: 18px;
  letter-spacing: -.2px;
}

.wpds-service__list{
  margin: 0;
  padding-left: 18px;
  color: var(--muted);
  line-height: 1.75;
}

.wpds-service__steps{
  margin: 0;
  padding-left: 0;
  list-style: none;
  display: grid;
  gap: 10px;
}
.wpds-service__steps li{
  display: grid;
  grid-template-columns: 14px 1fr;
  gap: 10px;
  align-items: start;
  color: var(--muted);
  line-height: 1.6;
}
.wpds-service__stepDot{
  width: 10px;
  height: 10px;
  margin-top: 6px;
  border-radius: 50%;
  background: rgba(124,92,255,.7);
  box-shadow: 0 0 0 3px rgba(124,92,255,.18);
}

.wpds-service__content{
  color: var(--muted);
  line-height: 1.75;
}
.wpds-service__content a{ color: #fff; text-decoration: underline; text-decoration-color: rgba(255,255,255,.25); }
.wpds-service__content h2, .wpds-service__content h3{ color: var(--text); }

.wpds-faq{
  display: grid;
  gap: 10px;
}

.wpds-faq__item{
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.02);
  border-radius: 16px;
  padding: 12px 12px;
}
.wpds-faq__q{
  cursor: pointer;
  font-weight: 700;
  color: var(--text);
  list-style: none;
}
.wpds-faq__q::-webkit-details-marker{ display:none; }
.wpds-faq__a{
  margin-top: 10px;
  color: var(--muted);
  line-height: 1.7;
}

.wpds-service__cta{
  padding: 18px 0 70px;
}

.wpds-service__ctaInner{
  border: 1px solid rgba(124,92,255,.28);
  background: radial-gradient(900px 300px at 20% 0%, rgba(124,92,255,.22), transparent 55%),
              rgba(255,255,255,.03);
  border-radius: 20px;
  padding: 18px;
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 16px;
  align-items: center;
}

.wpds-service__ctaTitle{
  font-weight: 800;
  font-size: 18px;
  margin-bottom: 6px;
}
.wpds-service__ctaSub{
  color: var(--muted);
  line-height: 1.6;
}

.wpds-service__ctaActions{
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  justify-content: flex-end;
}

@media (max-width: 980px){
  .wpds-service__heroInner{ grid-template-columns: 1fr; }
  .wpds-service__grid2{ grid-template-columns: 1fr; }
  .wpds-service__ctaInner{ grid-template-columns: 1fr; }
  .wpds-service__ctaActions{ justify-content: flex-start; }
}
@media (max-width: 620px){
  .wpds-service__hero{ padding: 44px 0 14px; }
  .wpds-service__quick{ grid-template-columns: 1fr; }
}

</style>

<?php get_footer(); ?>
