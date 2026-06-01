<?php
/**
 * Template Name: Партнёрская программа (Плагины)
 * Description: Упрощённая партнёрка вручную для продаж плагинов (ref + купон).
 */

defined('ABSPATH') || exit;

get_header();

// ====== НАСТРОЙКИ (поменяй под себя) ======
$affiliate_percent = 25; // % комиссии
$cookie_days       = 90; // срок фиксации (текстом)
$claim_days        = 7;  // в течение скольких дней партнёр может заявить продажу
$payout_period     = 'раз в неделю'; // как платишь

$telegram_url  = 'https://t.me/+79250404189'; // <-- замени
$email         = 'paveldamut4@gmail.com';       // <-- замени

// Список плагинов (можешь добавить/убрать)
$plugins = [
  [
    'title' => 'HivePress Map Listings',
    'price' => '3 500 ₽ – 18 000 ₽',
    'desc'  => 'Объявления на карте для HivePress. Установка, настройка, интеграции.',
    'url'   => home_url('/plugins/hivepress-map-listings/'),
  ],
  [
    'title' => 'WPDev AI Autopost',
    'price' => '—',
    'desc'  => 'Автогенерация и публикация статей через AI по расписанию.',
    'url'   => home_url('/plugins/ai-autopost/'),
  ],
  [
    'title' => 'Hyper Optimizer Pro',
    'price' => '—',
    'desc'  => 'Оптимизация скорости и производительности WordPress.',
    'url'   => home_url('/plugins/hyper-optimizer-pro/'),
  ],
];

// Получаем ref из URL для демонстрации партнёру (НЕ храним, просто показываем пример)
$ref = isset($_GET['ref']) ? sanitize_text_field(wp_unslash($_GET['ref'])) : '';
$example_ref_link = $ref
  ? add_query_arg(['ref' => rawurlencode($ref)], home_url('/plugins/'))
  : add_query_arg(['ref' => 'partner_name'], home_url('/plugins/'));

?>
<style>
  /* ===== WPDev Affiliate (Dark) – full rewrite ===== */
  :root{
    --aff-bg-main: #070b09;
    --aff-bg-2: #0a100c;

    --aff-card: rgba(255,255,255,.06);
    --aff-card-2: rgba(255,255,255,.045);
    --aff-border: rgba(255,255,255,.10);
    --aff-border-2: rgba(255,255,255,.14);

    --aff-text: rgba(255,255,255,.94);
    --aff-muted: rgba(255,255,255,.64);

    --aff-accent: #27c47d;
    --aff-accent-2: #1f7f4c;

    --aff-radius: 22px;
    --aff-radius-sm: 16px;
    --aff-shadow: 0 24px 70px rgba(0,0,0,.55);
    --aff-shadow-soft: 0 16px 40px rgba(0,0,0,.35);

    --aff-max: 1180px;
    --aff-pad-x: 20px;

    --aff-fast: .14s;
    --aff-mid: .22s;
  }

  /* ===== Layout ===== */
  .aff-page{
    padding: clamp(44px, 6.2vw, 110px) 0;
    background:
      radial-gradient(1200px 700px at 12% 8%, rgba(39,196,125,.16), transparent 62%),
      radial-gradient(900px 600px at 90% 20%, rgba(39,196,125,.10), transparent 64%),
      radial-gradient(700px 500px at 60% 105%, rgba(39,196,125,.06), transparent 60%),
      linear-gradient(180deg, var(--aff-bg-main), var(--aff-bg-2));
  }
  .aff-wrap{
    max-width: var(--aff-max);
    margin: 0 auto;
    padding: 0 var(--aff-pad-x);
  }

  .aff-section{ margin-top: clamp(24px, 4.2vw, 46px); }
  .aff-h2{
    margin: 0 0 14px;
    color: var(--aff-text);
    font-size: clamp(20px, 2.6vw, 30px);
    letter-spacing: -.01em;
  }
  .aff-sub{
    margin: 0 0 18px;
    color: var(--aff-muted);
    line-height: 1.75;
    font-size: 15.5px;
  }

  /* ===== Glass surfaces ===== */
  .aff-hero,
  .aff-panel,
  .aff-card,
  .aff-step,
  details.aff-faq,
  .aff-contact{
    border-radius: calc(var(--aff-radius) + 2px);
    border: 1px solid var(--aff-border);
    background:
      linear-gradient(180deg, rgba(255,255,255,.07), rgba(255,255,255,.03));
    box-shadow: var(--aff-shadow-soft);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
  }

  /* ===== Hero ===== */
  .aff-hero{
    padding: clamp(26px, 4.8vw, 54px);
    box-shadow: var(--aff-shadow);
    overflow: hidden;
    position: relative;
  }

  .aff-hero::before{
    content:"";
    position:absolute;
    inset:-2px;
    pointer-events:none;
    background:
      radial-gradient(900px 520px at 10% 10%, rgba(39,196,125,.22), transparent 60%),
      radial-gradient(700px 420px at 90% 15%, rgba(39,196,125,.12), transparent 62%);
    opacity:.95;
    filter: blur(.2px);
  }
  .aff-hero > *{ position: relative; }

  .aff-hero__grid{
    display: grid;
    grid-template-columns: 1.12fr .88fr;
    gap: 28px;
    align-items: start;
  }

  .aff-kicker{
    display: inline-flex;
    gap: 10px;
    align-items: center;
    padding: 8px 12px;
    border-radius: 999px;
    background: rgba(39,196,125,.14);
    border: 1px solid rgba(39,196,125,.26);
    color: var(--aff-text);
    font-size: 13px;
    font-weight: 900;
    letter-spacing: .02em;
    margin-bottom: 14px;
  }

  .aff-title{
    margin: 0 0 12px;
    color: var(--aff-text);
    font-size: clamp(30px, 4.2vw, 46px);
    line-height: 1.12;
    letter-spacing: -.02em;
  }

  .aff-lead{
    margin: 0 0 18px;
    color: var(--aff-muted);
    font-size: 16.5px;
    line-height: 1.75;
  }
  .aff-lead b, .aff-lead strong{ color: var(--aff-text); }

  /* ===== Buttons / links ===== */
  .aff-ctaRow{
    display:flex;
    flex-wrap:wrap;
    gap: 12px;
    align-items:center;
  }

  .aff-btn{
    display: inline-flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
    padding: 12px 16px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 900;
    color: var(--aff-text);
    background: rgba(255,255,255,.045);
    border: 1px solid rgba(255,255,255,.14);
    transition:
      transform var(--aff-fast) ease,
      box-shadow var(--aff-fast) ease,
      background var(--aff-fast) ease,
      border-color var(--aff-fast) ease;
    will-change: transform;
  }
  .aff-btn:hover{
    transform: translateY(-2px);
    border-color: rgba(255,255,255,.22);
    background: rgba(255,255,255,.06);
    box-shadow: 0 16px 36px rgba(0,0,0,.35);
  }
  .aff-btn:active{ transform: translateY(-1px); }

  .aff-btn--accent{
    color: #fff;
    border: none;
    background: linear-gradient(135deg, #2fe38a, var(--aff-accent-2));
    box-shadow: 0 14px 30px rgba(39,196,125,.28);
  }
  .aff-btn--accent:hover{
    box-shadow: 0 20px 44px rgba(39,196,125,.36);
  }

  .aff-link{
    color: var(--aff-text);
    text-decoration: none;
    font-weight: 900;
    border-bottom: 1px dashed rgba(255,255,255,.22);
    transition: border-color var(--aff-fast) ease, opacity var(--aff-fast) ease;
  }
  .aff-link:hover{ border-bottom-color: rgba(255,255,255,.45); opacity: .95; }

  /* ===== Panel / metrics ===== */
  .aff-panel{
    padding: 18px;
    border-radius: var(--aff-radius);
  }
  .aff-metrics{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
  }
  .aff-metric{
    border-radius: var(--aff-radius-sm);
    padding: 14px;
    background: var(--aff-card-2);
    border: 1px solid rgba(255,255,255,.10);
  }
  .aff-metric__val{
    color: var(--aff-text);
    font-weight: 900;
    font-size: 18px;
    margin: 0 0 6px;
  }
  .aff-metric__lbl{
    color: var(--aff-muted);
    font-size: 13.5px;
    margin: 0;
    line-height: 1.45;
  }

  /* ===== Steps ===== */
  .aff-steps{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
  }
  .aff-step{
    padding: 16px;
    min-height: 124px;
    border-radius: var(--aff-radius);
  }
  .aff-step__n{
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 999px;
    background: rgba(39,196,125,.18);
    border: 1px solid rgba(39,196,125,.30);
    color: var(--aff-text);
    font-weight: 900;
    margin-bottom: 10px;
  }
  .aff-step__t{
    margin: 0 0 6px;
    color: var(--aff-text);
    font-weight: 900;
  }
  .aff-step__d{
    margin: 0;
    color: var(--aff-muted);
    line-height: 1.65;
    font-size: 14.5px;
  }

  /* ===== Products cards ===== */
  .aff-products{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
  }

  .aff-card{
    padding: 16px;
    border-radius: var(--aff-radius);
    display: flex;
    flex-direction: column;
    gap: 10px;
    min-height: 220px;
    transition: transform var(--aff-mid) ease, box-shadow var(--aff-mid) ease, border-color var(--aff-mid) ease;
    position: relative;
    overflow: hidden;
  }
  .aff-card::before{
    content:"";
    display:block;
    height: 3px;
    width: 100%;
    border-radius: 999px;
    background: linear-gradient(90deg, transparent, rgba(39,196,125,.95), transparent);
    opacity: .75;
    margin-bottom: 10px;
  }
  .aff-card:hover{
    transform: translateY(-4px);
    border-color: rgba(255,255,255,.18);
    box-shadow: 0 32px 80px rgba(0,0,0,.65);
  }

  .aff-card__top{
    display: flex;
    justify-content: space-between;
    gap: 12px;
    align-items: flex-start;
  }
  .aff-card__title{
    margin: 0;
    color: var(--aff-text);
    font-weight: 900;
    line-height: 1.3;
    font-size: 16px;
  }
  .aff-price{
    margin: 0;
    color: #fff;
    background: rgba(39,196,125,.18);
    border: 1px solid rgba(39,196,125,.32);
    border-radius: 999px;
    padding: 7px 10px;
    font-weight: 900;
    white-space: nowrap;
    font-size: 13px;
  }
  .aff-card__desc{
    margin: 0;
    color: var(--aff-muted);
    line-height: 1.65;
    font-size: 14.5px;
  }
  .aff-card__actions{
    margin-top: auto;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  /* ===== FAQ ===== */
  details.aff-faq{
    border-radius: 18px;
    padding: 14px 14px;
    margin-bottom: 10px;
  }
  details.aff-faq summary{
    cursor: pointer;
    color: var(--aff-text);
    font-weight: 900;
    list-style: none;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
  }
  details.aff-faq summary::-webkit-details-marker{ display:none; }
  details.aff-faq p{
    margin: 10px 0 0;
    color: var(--aff-muted);
    line-height: 1.75;
  }

  /* ===== Contact ===== */
  .aff-contact{
    padding: 18px;
    border-radius: calc(var(--aff-radius) + 6px);
    background:
      radial-gradient(700px 260px at 10% 0%, rgba(39,196,125,.18), transparent 70%),
      linear-gradient(180deg, rgba(255,255,255,.07), rgba(255,255,255,.03));
  }
  .aff-contact__row{
    display:flex;
    flex-wrap:wrap;
    gap: 10px;
    align-items:center;
    justify-content:space-between;
  }
  .aff-contact__text{
    color: var(--aff-muted);
    margin: 0;
    line-height: 1.7;
  }
  .aff-badges{ display:flex; gap: 10px; flex-wrap:wrap; align-items:center; }
  .aff-badge{
    padding: 8px 10px;
    border-radius: 999px;
    background: rgba(255,255,255,.045);
    border: 1px solid rgba(255,255,255,.12);
    color: var(--aff-text);
    font-weight: 900;
    font-size: 13px;
  }

  /* ===== Code block ===== */
  .aff-code{
    background: rgba(0,0,0,.28);
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 14px;
    padding: 12px 14px;
    color: rgba(255,255,255,.92);
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: 13px;
    overflow: auto;
  }

  /* ===== Responsive ===== */
  @media (max-width: 980px){
    .aff-hero__grid{ grid-template-columns: 1fr; }
    .aff-steps{ grid-template-columns: 1fr 1fr; }
    .aff-products{ grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 640px){
    .aff-steps{ grid-template-columns: 1fr; }
    .aff-products{ grid-template-columns: 1fr; }
    .aff-metrics{ grid-template-columns: 1fr; }
  }
</style>


<section class="aff-page">
  <div class="aff-wrap">

    <!-- HERO -->
    <div class="aff-hero">
      <div class="aff-hero__grid">

        <div>
          <div class="aff-kicker">💚 Партнёрка для плагинов WP Dev Studio</div>
          <h1 class="aff-title">Партнёрская программа</h1>
          <p class="aff-lead">
            Получай <b><?php echo (int)$affiliate_percent; ?>%</b> с каждой покупки моих плагинов по твоей партнёрской ссылке или купону.
            Механика упрощённая: ты рекомендуешь — я <b>вручную</b> рассчитываюсь с тобой по подтверждённым продажам.
          </p>

          <div class="aff-ctaRow">
            <a class="aff-btn aff-btn--accent" href="<?php echo esc_url($telegram_url); ?>" target="_blank" rel="noopener">
              Написать в Telegram
            </a>
            <a class="aff-btn" href="mailto:<?php echo antispambot(esc_attr($email)); ?>">
              Написать на почту
            </a>
          </div>

          <div style="margin-top:14px">
            <div class="aff-sub" style="margin:14px 0 8px">
              Пример партнёрской ссылки:
            </div>
            <div class="aff-code"><?php echo esc_html($example_ref_link); ?></div>
          </div>
        </div>

        <div class="aff-panel">
          <div class="aff-metrics">
            <div class="aff-metric">
              <p class="aff-metric__val"><?php echo (int)$affiliate_percent; ?>%</p>
              <p class="aff-metric__lbl">Комиссия партнёра с продажи плагинов</p>
            </div>
            <div class="aff-metric">
              <p class="aff-metric__val"><?php echo (int)$cookie_days; ?> дней</p>
              <p class="aff-metric__lbl">Фиксация перехода (условие, можно менять)</p>
            </div>
            <div class="aff-metric">
              <p class="aff-metric__val"><?php echo (int)$claim_days; ?> дней</p>
              <p class="aff-metric__lbl">Срок, чтобы заявить продажу после покупки</p>
            </div>
            <div class="aff-metric">
              <p class="aff-metric__val"><?php echo esc_html($payout_period); ?></p>
              <p class="aff-metric__lbl">Период выплат (вручную)</p>
            </div>
          </div>

          <div style="margin-top:14px" class="aff-sub">
            Рекомендуемый вариант фиксации: <b>ref-ссылка + купон</b>.
            Купон можно сделать даже с 0% скидкой — он нужен как доказательство.
          </div>
        </div>

      </div>
    </div>

    <!-- STEPS -->
    <div class="aff-section">
      <h2 class="aff-h2">Как это работает</h2>
      <p class="aff-sub">4 шага без сервисов и личных кабинетов — только честная ручная схема.</p>

      <div class="aff-steps">
        <div class="aff-step">
          <div class="aff-step__n">1</div>
          <p class="aff-step__t">Получаешь ref/купон</p>
          <p class="aff-step__d">Пишешь мне — я выдаю твою партнёрскую метку (ref) и/или купон.</p>
        </div>
        <div class="aff-step">
          <div class="aff-step__n">2</div>
          <p class="aff-step__t">Рекомендуешь плагин</p>
          <p class="aff-step__d">Размещаешь ссылку/купон в блоге, соцсетях, в переписке с клиентами.</p>
        </div>
        <div class="aff-step">
          <div class="aff-step__n">3</div>
          <p class="aff-step__t">Клиент покупает</p>
          <p class="aff-step__d">Покупка проходит на сайте, как обычно. Лучше — с купоном партнёра.</p>
        </div>
        <div class="aff-step">
          <div class="aff-step__n">4</div>
          <p class="aff-step__t">Ты присылаешь подтверждение</p>
          <p class="aff-step__d">Номер заказа + email покупателя (или чек/скрин) — и я перевожу комиссию.</p>
        </div>
      </div>
    </div>

    <!-- PLUGINS -->
    <div class="aff-section">
      <h2 class="aff-h2">Плагины, которые участвуют</h2>
      <p class="aff-sub">Список можно расширять. Если нужно — добавлю отдельные условия для каждого плагина.</p>

      <div class="aff-products">
        <?php foreach ($plugins as $p): ?>
          <div class="aff-card">
            <div class="aff-card__top">
              <h3 class="aff-card__title"><?php echo esc_html($p['title']); ?></h3>
              <div class="aff-price"><?php echo esc_html($p['price']); ?></div>
            </div>
            <p class="aff-card__desc"><?php echo esc_html($p['desc']); ?></p>
            <div class="aff-card__actions">
              <a class="aff-btn aff-btn--accent" href="<?php echo esc_url($p['url']); ?>">Открыть</a>
              <a class="aff-link" href="<?php echo esc_url($p['url']); ?>">Ссылка для партнёра →</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- RULES -->
    <div class="aff-section">
      <h2 class="aff-h2">Условия (коротко)</h2>
      <div class="aff-grid2">
        <ul class="aff-list">
          <li><b>Комиссия:</b> <?php echo (int)$affiliate_percent; ?>% с оплаченного заказа (после факта оплаты).</li>
          <li><b>Что считается продажей:</b> только оплаченный заказ на сайте (без возврата).</li>
          <li><b>Подтверждение:</b> номер заказа + email покупателя (или чек/скрин письма/страницы оплаты).</li>
          <li><b>Срок заявки:</b> в течение <?php echo (int)$claim_days; ?> дней после покупки.</li>
        </ul>

        <ul class="aff-list">
          <li><b>Фиксация:</b> ref-ссылка и/или купон партнёра (желательно оба).</li>
          <li><b>Выплаты:</b> <?php echo esc_html($payout_period); ?> вручную удобным способом.</li>
          <li><b>Ограничения:</b> не начисляется за собственные покупки и при возвратах.</li>
          <li><b>Поддержка:</b> помогаю с промо-материалами (краткий текст, баннер, ссылка).</li>
        </ul>
      </div>
    </div>

    <!-- FAQ -->
    <div class="aff-section">
      <h2 class="aff-h2">FAQ</h2>

      <details class="aff-faq">
        <summary>Нужен ли личный кабинет партнёра?</summary>
        <p>Нет. Эта партнёрка упрощённая и ручная: фиксация по ref/купону и подтверждение по заказу.</p>
      </details>

      <details class="aff-faq">
        <summary>А если клиент купил без купона?</summary>
        <p>Тогда лучше прислать ref-ссылку, по которой переходил клиент, и номер заказа + email. Мы сверим вручную.</p>
      </details>

      <details class="aff-faq">
        <summary>Можно ли сделать отдельный купон под меня?</summary>
        <p>Да. Напиши мне — создам купон формата REF_ИМЯ. Скидку можно поставить 0% (купон нужен как доказательство).</p>
      </details>

      <details class="aff-faq">
        <summary>Можно ли рекламировать в контексте/таргете?</summary>
        <p>Можно, но согласуй со мной ключевые формулировки и объявления, чтобы не было конфликтов по бренду.</p>
      </details>
    </div>

    <!-- CONTACT -->
    <div class="aff-section">
      <div class="aff-contact">
        <div class="aff-contact__row">
          <div>
            <h2 class="aff-h2" style="margin:0 0 8px">Стать партнёром</h2>
            <p class="aff-contact__text">
              Напиши мне в Telegram или на почту — выдам твою партнёрскую метку (ref) и/или купон, плюс короткий текст для рекомендаций.
            </p>
          </div>
          <div class="aff-badges">
            <a class="aff-btn aff-btn--accent" href="<?php echo esc_url($telegram_url); ?>" target="_blank" rel="noopener">Telegram</a>
            <a class="aff-btn" href="mailto:<?php echo antispambot(esc_attr($email)); ?>">Email</a>
            <span class="aff-badge"><?php echo (int)$affiliate_percent; ?>% комиссия</span>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
