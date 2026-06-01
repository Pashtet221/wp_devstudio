<?php
/**
 * Template Name: Контакты (WP Dev Studio)
 * Template Post Type: page
 */

get_header();

$theme_uri = get_template_directory_uri();

/**
 * НАСТРОЙКИ (поменяй под себя)
 */
$ds_email   = 'info@wpdevstudio.ru';
$ds_phone_e164 = '+79250404189'; // телефон в международном формате
$ds_phone_raw  = '79250404189';  // телефон только цифры (для wa.me)
$ds_tg      = 'https://t.me/+79250404189';     // замени на корректный tg username/link
$ds_whats   = 'https://wa.me/79250404189';     // замени при необходимости
$ds_site    = home_url('/');

/**
 * Форма (любой шорткод)
 * В исходнике у тебя был [smart_contact_form], оставлю его как дефолт.
 * Если хочешь CF7 — просто поменяй строку.
 */
$ds_form_sc = '[smart_contact_form]';

/**
 * Карта (опционально) — если вставляешь iframe, ОБЯЗАТЕЛЬНО через wp_kses
 */
$ds_map_iframe = ''; // '<iframe ...></iframe>';

/**
 * SEO: canonical + robots + OpenGraph (минимально) + JSON-LD ContactPage
 * Важно: если у тебя RankMath/Yoast — они обычно сами генерят canonical/og.
 * Чтобы не было дублей тегов: оставь этот блок, но при желании можно отключить OG часть.
 */
$canonical_url = get_permalink();

add_action('wp_head', function() use (
  $canonical_url,
  $ds_email,
  $ds_site,
  $ds_phone_e164,
  $ds_tg,
  $ds_whats
) {
  // Canonical
  echo '<link rel="canonical" href="' . esc_url($canonical_url) . "\" />\n";

  // Robots (контакты обычно index,follow)
  echo "<meta name=\"robots\" content=\"index,follow\" />\n";

  // OpenGraph (легкий минимум — полезно, если нет SEO-плагина)
  $title = wp_strip_all_tags(get_the_title());
  $desc  = 'Контакты WP Dev Studio: напишите в Telegram/WhatsApp или оставьте заявку через форму.';

  echo '<meta property="og:type" content="website" />' . "\n";
  echo '<meta property="og:title" content="' . esc_attr($title) . "\" />\n";
  echo '<meta property="og:description" content="' . esc_attr($desc) . "\" />\n";
  echo '<meta property="og:url" content="' . esc_url($canonical_url) . "\" />\n";
  echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . "\" />\n";

  // JSON-LD: ContactPage (Google любит структурированные контактные данные)
  $schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'ContactPage',
    'name'     => $title,
    'url'      => $canonical_url,
    'mainEntity' => [
      '@type' => 'Organization',
      'name'  => get_bloginfo('name'),
      'url'   => $ds_site,
      'email' => $ds_email,
      'telephone' => $ds_phone_e164,
      'contactPoint' => [
        [
          '@type' => 'ContactPoint',
          'contactType' => 'customer support',
          'email' => $ds_email,
          'telephone' => $ds_phone_e164,
          'availableLanguage' => ['ru', 'en'],
        ],
      ],
      'sameAs' => array_values(array_filter([$ds_tg, $ds_whats])),
    ],
  ];

  echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}, 1);

/**
 * Хелпер: безопасно рендерить iframe карты
 */
function wpds_safe_map_iframe(string $iframe): string {
  if ($iframe === '') return '';
  $allowed = [
    'iframe' => [
      'src'             => true,
      'width'           => true,
      'height'          => true,
      'style'           => true,
      'allowfullscreen' => true,
      'loading'         => true,
      'referrerpolicy'  => true,
      'allow'           => true,
      'title'           => true,
    ],
    'div' => [
      'class' => true,
      'style' => true,
    ],
  ];
  return wp_kses($iframe, $allowed);
}

/**
 * Хелпер: сделать «чистую» ссылку телефона для tel:
 */
function wpds_tel_href(string $e164): string {
  $clean = preg_replace('~[^0-9\+]~', '', $e164);
  return 'tel:' . $clean;
}
?>

<main id="primary" class="ds-contacts" itemscope itemtype="https://schema.org/ContactPage">

  <section class="ds-hero">
    <div class="ds-container">
      <div class="ds-hero__grid">

        <div class="ds-hero__left">
          <h1 class="ds-h1" itemprop="name"><?php echo esc_html(get_the_title()); ?></h1>
          <p class="ds-lead" itemprop="description">
            Напишите мне — отвечу, уточню задачу и предложу оптимальный вариант реализации.
          </p>

          <div class="ds-actions">
            <a class="ds-btn ds-btn--primary" href="#contact-form">Написать</a>
            <a class="ds-btn ds-btn--ghost" href="<?php echo esc_url($ds_site); ?>">На главную</a>
          </div>

          <div class="ds-chips" aria-label="Темы">
            <span class="ds-chip">WordPress</span>
            <span class="ds-chip">WooCommerce</span>
            <span class="ds-chip">Плагины</span>
            <span class="ds-chip">Интеграции</span>
            <span class="ds-chip">Оптимизация</span>
          </div>
        </div>

        <aside class="ds-hero__right">
          <div class="ds-card ds-card--accent" itemscope itemtype="https://schema.org/Organization">
            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <meta itemprop="url" content="<?php echo esc_url($ds_site); ?>">

            <div class="ds-card__title">Контакты</div>

            <div class="ds-kv">
              <div class="ds-kv__k">Email</div>
              <div class="ds-kv__v">
                <a itemprop="email" href="mailto:<?php echo esc_attr($ds_email); ?>">
                  <?php echo esc_html($ds_email); ?>
                </a>
              </div>
            </div>

            <div class="ds-kv">
              <div class="ds-kv__k">Телефон</div>
              <div class="ds-kv__v">
                <a itemprop="telephone" href="<?php echo esc_url(wpds_tel_href($ds_phone_e164)); ?>">
                  <?php echo esc_html($ds_phone_e164); ?>
                </a>
              </div>
            </div>

            <div class="ds-kv">
              <div class="ds-kv__k">Telegram</div>
              <div class="ds-kv__v">
                <a href="<?php echo esc_url($ds_tg); ?>" target="_blank" rel="noopener noreferrer">
                  Открыть чат
                </a>
              </div>
            </div>

            <div class="ds-kv">
              <div class="ds-kv__k">WhatsApp</div>
              <div class="ds-kv__v">
                <a href="<?php echo esc_url($ds_whats); ?>" target="_blank" rel="noopener noreferrer">
                  Написать
                </a>
              </div>
            </div>

            <div class="ds-note">
              Обычно отвечаю в течение дня. Если задача срочная — укажи это в сообщении.
            </div>
          </div>
        </aside>

      </div>
    </div>
  </section>

  <section class="ds-section">
    <div class="ds-container ds-grid2">

      <div class="ds-card">
        <div class="ds-card__title">Что лучше написать</div>
        <ul class="ds-list">
          <li>Ссылку на сайт / макет / пример</li>
          <li>Что нужно сделать и сроки</li>
          <li>Нужны ли интеграции (CRM, платежи, импорт)</li>
          <li>Доступы (если есть) и текущая платформа</li>
        </ul>
      </div>

      <div class="ds-card">
  <div class="ds-card__title">Формат работы</div>
  <ul class="ds-list">
    <li>Работаем полностью онлайн — без привязки к офису</li>
    <li>Сотрудничаем с клиентами из России, Беларуси и Европы</li>
    <li>Оцениваю задачу и предлагаю понятный план работ</li>
    <li>Аккуратная реализация без «ломающих» правок</li>
    <li>Тестирование и короткая инструкция по результату</li>
    <li>Поддержка после внедрения</li>
  </ul>
</div>
		
		
    </div>
  </section>

  <section class="ds-section" id="contact-form">
    <div class="ds-container">

      <div class="ds-section__head">
        <h2 class="ds-h2">Связаться</h2>
        <p class="ds-muted">Заполните форму — отвечу и уточню детали.</p>
      </div>

      <div class="ds-card ds-formCard" style="max-width: 550px;">
        <?php echo do_shortcode($ds_form_sc); ?>

        <div class="ds-formHint">
          Или напишите в
          <a href="<?php echo esc_url($ds_tg); ?>" target="_blank" rel="noopener noreferrer">Telegram</a>
          / <a href="<?php echo esc_url($ds_whats); ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a>.
        </div>
      </div>

      <p class="ds-muted" style="margin-top:14px;">
        Нажимая «Отправить», вы соглашаетесь с обработкой персональных данных.
      </p>

    </div>
  </section>

  <?php if (!empty($ds_map_iframe)) : ?>
    <section class="ds-section">
      <div class="ds-container">

        <div class="ds-section__head">
          <h2 class="ds-h2">Где я нахожусь</h2>
          <p class="ds-muted">Работаю удалённо, но можем созвониться в удобное время.</p>
        </div>

        <div class="ds-card ds-map">
          <?php echo wpds_safe_map_iframe($ds_map_iframe); ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

  <?php
  /**
   * Контент страницы из редактора (если добавляешь блоки ниже)
   */
  if (have_posts()) :
    while (have_posts()) : the_post();
      $content = trim((string) get_the_content());
      if ($content) : ?>
        <section class="ds-section">
          <div class="ds-container">
            <div class="ds-card">
              <?php the_content(); ?>
            </div>
          </div>
        </section>
      <?php endif;
    endwhile;
  endif;
  ?>

</main>

<style>
  :root{
    --ds-accent:#cc1616;
    --ds-bg:#0f1216;
    --ds-card:#121722;
    --ds-text:#e9eef6;
    --ds-muted:rgba(233,238,246,.72);
    --ds-border:rgba(255,255,255,.08);
  }

  .ds-contacts{background:var(--ds-bg); color:var(--ds-text); min-height:60vh}
  .ds-container{max-width:1140px; margin:0 auto; padding:0 18px}
  .ds-section{padding:44px 0}
  .ds-hero{padding:54px 0 26px; border-bottom:1px solid var(--ds-border)}
  .ds-hero__grid{display:grid; grid-template-columns: 1.3fr .9fr; gap:22px; align-items:stretch}
  .ds-h1{font-size:40px; line-height:1.1; margin:0}
  .ds-h2{font-size:26px; line-height:1.15; margin:0}
  .ds-lead{margin:12px 0 18px; color:var(--ds-muted); font-size:16px; line-height:1.55}
  .ds-muted{color:var(--ds-muted); margin:8px 0 0}
  .ds-actions{display:flex; gap:12px; flex-wrap:wrap; margin:0 0 18px}

  .ds-btn{
    display:inline-flex; align-items:center; justify-content:center;
    height:44px; padding:0 16px; border-radius:12px;
    text-decoration:none; font-weight:700; letter-spacing:.2px;
    border:1px solid var(--ds-border);
    color:var(--ds-text);
    transition: transform .12s ease, border-color .12s ease, background .12s ease;
  }
  .ds-btn:hover{transform:translateY(-1px); border-color:rgba(204,22,22,.35)}
  .ds-btn--primary{
    background:var(--ds-accent);
    border-color:rgba(204,22,22,.55);
    color:#fff;
  }
  .ds-btn--primary:hover{border-color:rgba(204,22,22,.85)}
  .ds-btn--ghost{background:transparent}

  .ds-chips{display:flex; gap:10px; flex-wrap:wrap}
  .ds-chip{
    border:1px solid var(--ds-border);
    background:rgba(255,255,255,.02);
    border-radius:999px;
    padding:8px 12px;
    font-size:12px;
    color:var(--ds-muted);
  }

  .ds-card{
    background:var(--ds-card);
    border:1px solid var(--ds-border);
    border-radius:16px;
    padding:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.25);
  }
  .ds-card--accent{
    border-color:rgba(204,22,22,.30);
    box-shadow:0 14px 40px rgba(204,22,22,.06), 0 10px 30px rgba(0,0,0,.25);
  }
  .ds-card__title{font-weight:800; font-size:14px; letter-spacing:.3px; text-transform:uppercase; color:rgba(233,238,246,.92); margin-bottom:12px}

  .ds-kv{display:grid; grid-template-columns:110px 1fr; gap:12px; padding:10px 0; border-top:1px solid var(--ds-border)}
  .ds-kv:first-of-type{border-top:0}
  .ds-kv__k{color:var(--ds-muted); font-size:13px}
  .ds-kv__v a{color:#fff; text-decoration:none; border-bottom:1px dashed rgba(204,22,22,.55)}
  .ds-kv__v a:hover{border-bottom-color:rgba(204,22,22,.95)}
  .ds-note{margin-top:12px; color:var(--ds-muted); font-size:13px; line-height:1.5}

  .ds-grid2{display:grid; grid-template-columns:1fr 1fr; gap:22px}
  .ds-list{margin:0; padding-left:18px; color:var(--ds-muted); line-height:1.65}
  .ds-list li{margin:6px 0}

  .ds-section__head{margin-bottom:16px}

  .ds-formCard :where(input, textarea, select){
    width:100%;
    background:rgba(255,255,255,.03);
    border:1px solid rgba(255,255,255,.10);
    color:var(--ds-text);
    border-radius:12px;
    padding:12px 12px;
    outline:none;
  }
  .ds-formCard :where(input, textarea, select):focus{
    border-color:rgba(204,22,22,.55);
    box-shadow:0 0 0 4px rgba(204,22,22,.10);
  }
  .ds-formHint{margin-top:12px; color:var(--ds-muted); font-size:13px}
  .ds-formHint a{color:#fff; border-bottom:1px dashed rgba(204,22,22,.55); text-decoration:none}
  .ds-formHint a:hover{border-bottom-color:rgba(204,22,22,.95)}

  .ds-map{padding:0; overflow:hidden}
  .ds-map iframe{display:block; width:100%; height:360px; border:0}

  @media (max-width: 980px){
    .ds-hero__grid{grid-template-columns:1fr; }
    .ds-h1{font-size:34px}
    .ds-grid2{grid-template-columns:1fr}
  }
</style>

<?php get_footer(); ?>
