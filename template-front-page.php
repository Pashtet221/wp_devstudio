<?php
/**
 * Template Name: Front Page
 * Template Post Type: page
 * Описание: Шаблон для страницы, которую можно выбрать как главную в настройках чтения.
 */

get_header();
?>



    <div class="pageContent">
        <div class="pageWrapper" itemscope="" itemtype="https://schema.org/Service">
            <div itemprop="provider" itemscope="" itemtype="https://schema.org/Organization" style="display:none">
                <div itemprop="logo image" itemscope="" itemtype="https://www.schema.org/ImageObject">
                    <link href="/images/logo.png" itemprop="url image" />
                    <meta content="160" itemprop="width" />
                    <meta content="92" itemprop="height" />
                </div>
               
            </div>
           
         
			
			
			
			
			
			
			
			
			
<section class="hero hero--compact" aria-label="Интегратор цифровых решений">
  <div class="container">
    <div class="hero__card">
      <!-- Background media -->
      <div
        class="hero__media hero__media--static"
        role="img"
        aria-label="WordPress и WooCommerce разработка для бизнеса"
      ></div>

      <div class="hero__gradient" aria-hidden="true"></div>

      <!-- Content -->
      <div class="hero__content">
        <div class="hero__kicker">
          <img
            class="hero__kicker-icon"
            src="/upload/iblock/61d/szcti68nziwyelwqar0k5r3zkg0vgzm7/Logo%20tagline.svg"
            alt=""
            aria-hidden="true"
          />
          <span class="hero__kicker-line" aria-hidden="true"></span>
        </div>

        <h1 class="hero__title">
  Запускаем WordPress-магазины,<br>
  которые продают — от 30 дней
</h1>

<div class="hero__bottom">
  <div class="hero__lead">
    <p class="hero__desc">
      Без шаблонов и исчезновений после оплаты: проектируем структуру, собираем WooCommerce, интегрируем CRM и остаёмся на поддержке.
    </p>
    <a class="hero__cta" href="#uslugi-wordpress">Узнать стоимость</a>
    <span class="hero__microcopy">Бесплатный расчёт за 1 день · WordPress · WooCommerce</span>
  </div>


          <!-- Rotator -->
          <div class="hero__rotator" aria-live="polite">
            <span class="hero__rotator-prefix">Мы</span>
            <span class="hero__rotator-text is-show" data-hero-rotator></span>
            <span class="hero__rotator-caret" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  :root{
    --container: 1440px;
    --pad-desktop: 72px;
    --pad-tablet: 36px;
    --pad-mobile: 16px;

    --radius-lg: 48px;
    --radius-md: 24px;

    --text: #fff;
    --muted: rgba(255,255,255,.84);
    --line: #9395A0;
  }

  /* Container */
  .container{
    margin-inline: auto;
    max-width: var(--container);
    padding-inline: var(--pad-desktop);
  }
  @media (max-width: 1199px){
    .container{ max-width: 768px; padding-inline: var(--pad-tablet); }
  }
  @media (max-width: 767px){
    .container{ max-width: 100%; padding-inline: var(--pad-mobile); }
  }

  /* Hero */
  .hero{
    background: #fff;
    padding: 16px 0 0;
  }

  .hero__card{
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-lg);
    padding: 56px 48px 80px;

    /* выше по высоте */
    min-height: clamp(420px, 52vw, 600px);

    display: flex;
    align-items: flex-start;
  }

  @media (max-width: 1199px){
    .hero__card{
      padding: 48px 48px 64px;
      border-radius: 36px;
      min-height: 560px;
    }
  }

  @media (max-width: 767px){
    .hero__card{
      padding: 24px;
      border-radius: var(--radius-md);
      min-height: 530px;
    }
  }

  .hero__media{
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    z-index: 0;
  }

  /* сильнее затемнение для читаемости */
  .hero__gradient{
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,.18) 0%, rgba(0,0,0,.62) 100%);
    z-index: 1;
    pointer-events: none;
  }

  /* подняли контент выше */
  .hero__content{
    position: relative;
    z-index: 5;
    width: 100%;
    color: var(--text);
    display: flex;
    flex-direction: column;
    gap: 24px;
	padding-left: 50px;
  }

  /* Kicker */
  .hero__kicker{
	visibility: hidden;
    display: flex;
    align-items: center;
    gap: 8px;
    font: 400 16px/1.3 "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    color: var(--muted);
    margin-bottom: clamp(48px, 10vw, 180px);
  }
  @media (max-width: 1199px){
    .hero__kicker{
      font-size: 12px;
      margin-bottom: 110px;
    }
  }
  @media (max-width: 767px){
	.hero__content{
		padding-left: 0px;
	}
    .hero__kicker{
      font-size: 12px;
      margin-bottom: 74px;
    }
  }

  .hero__kicker-icon{
    width: 16px;
    height: 16px;
    object-fit: contain;
    flex: 0 0 auto;
  }

  .hero__kicker-line{
    height: 22px;
    width: 1px;
    background: var(--line);
    flex: 0 0 auto;
    opacity: .9;
  }

  /* Title */
  .hero__title{
    margin: 0 0 8px;
    font-family: "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    font-weight: 500;
    letter-spacing: -0.02em;
    font-size: clamp(36px, 4.2vw, 120px);
    line-height: 1;
  }
  @media (max-width: 1199px){
    .hero__title{ font-size: 48px; line-height: 1; }
  }
  @media (max-width: 767px){
    .hero__title{ font-size: 36px; }
  }

  /* Bottom row */
  .hero__bottom{
    width: 100%;
    display: grid;
    grid-template-columns: 1fr minmax(0, 440px) auto;
    gap: 16px clamp(24px, 8vw, 226px);
    align-items: end;
  }

  @media (max-width: 1199px){
    .hero__bottom{
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 56px;
    }
  }

  @media (max-width: 767px){
    .hero__bottom{
      flex-direction: column;
      align-items: flex-start;
      gap: 24px;
    }
  }

  .hero__lead{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 22px;
  }

  .hero__desc{
    margin: 0;
    max-width: 440px;
    font: 400 20px/28px "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    color: var(--text);
  }

  .hero__cta{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 52px;
    padding: 14px 24px;
    border-radius: 999px;
    background: #dc2626;
    color: #fff;
    font: 600 16px/1.2 "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    text-decoration: none;
    box-shadow: 0 16px 34px rgba(220,38,38,.28);
    transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
  }

  .hero__cta:hover{
    background: #b91c1c;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 18px 38px rgba(185,28,28,.34);
  }

  @media (max-width: 1199px){
    .hero__lead{ gap: 18px; }
    .hero__desc{ font-size: 16px; line-height: 22px; max-width: 490px; }
    .hero__cta{ min-height: 48px; padding: 13px 22px; font-size: 15px; }
  }

  /* Rotator */
  .hero__rotator{
    display: inline-flex;
    align-items: baseline;
    gap: 5px;
    padding: 12px 14px;
    border-radius: 999px;
    background: rgba(255,255,255,.18);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    max-width: 520px;
	height: 70px;
  }

  .hero__rotator-prefix{
    font: 500 16px/1.2 "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    color: rgba(255,255,255,.92);
    white-space: nowrap;
  }

  .hero__rotator-text{
    font: 400 18px/1.35 "Wix Madefor Text", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    color: rgba(255,255,255,.92);
    transition: opacity .18s ease, transform .18s ease;
    will-change: opacity, transform;
  }

  .hero__rotator-text.is-hide{
    opacity: 0;
    transform: translateY(2px);
  }

  .hero__rotator-text.is-show{
    opacity: 1;
    transform: translateY(0);
  }

  .hero__rotator-caret{
    width: 10px;
    height: 18px;
    border-left: 2px solid rgba(255,255,255,.9);
    animation: heroCaret 1s steps(1) infinite;
  }

  @keyframes heroCaret{
    50%{ opacity: 0; }
  }

  @media (max-width: 1199px){
    .hero__rotator{ max-width: 560px; }
  }
  @media (max-width: 767px){
    .hero__rotator{ width: auto; max-width: 100%; }
    .hero__rotator-text{ font-size: 16px; }
  }

  @media (prefers-reduced-motion: reduce){
    .hero__rotator-text{ transition: none; }
    .hero__rotator-caret{ animation: none; opacity: 1; }
  }
</style>

<script>
(function () {
  const init = () => {
    const root = document.querySelector('section.hero');
    if (!root) return;

    const el = root.querySelector('[data-hero-rotator]');
    if (!el) return;

    const items = [
      'проектируем UX/UI под ваш бизнес.',
      'разрабатываем сайты и сервисы под ключ.',
      'делаем интеграции: CRM, оплаты, аналитика.',
      'поддерживаем и развиваем продукт после запуска.'
    ];

    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let i = 0;

    const setText = (text) => {
      if (reduceMotion) {
        el.textContent = text;
        return;
      }

      el.classList.remove('is-show');
      el.classList.add('is-hide');

      window.setTimeout(() => {
        el.textContent = text;
        el.classList.remove('is-hide');
        el.classList.add('is-show');
      }, 180);
    };

    setText(items[i]);

    if (!reduceMotion) {
      window.setInterval(() => {
        i = (i + 1) % items.length;
        setText(items[i]);
      }, 2600);
    }
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();
</script>

<?php
$calculator = wpds_home_calculator_get_content(get_the_ID());
$calculator_services = $calculator['services'];
?>
<section class="wpds-calc" id="site-calculator" aria-labelledby="wpds-calc-title">
  <div class="container">
    <div class="wpds-calc__shell">
      <div class="wpds-calc__intro">
        <span class="wpds-calc__eyebrow"><?php echo esc_html($calculator['eyebrow']); ?></span>
        <h2 class="wpds-calc__title" id="wpds-calc-title"><?php echo esc_html($calculator['title']); ?></h2>
        <p class="wpds-calc__text"><?php echo esc_html($calculator['text']); ?></p>
        <div class="wpds-calc__steps" aria-label="Этапы расчёта">
          <span class="wpds-calc__step is-active" data-step-indicator="1">1. Выбор услуг</span>
          <span class="wpds-calc__step" data-step-indicator="2">2. Контакты</span>
        </div>
      </div>

      <form class="wpds-calc__form" data-calculator-form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="wpds_home_calculator_submit">
        <input type="hidden" name="_wpds_calc_nonce" value="<?php echo esc_attr(wp_create_nonce('wpds_home_calculator_submit')); ?>">
        <input type="hidden" name="calc_payload" data-calc-payload value="">
        <input type="hidden" name="calc_post_id" value="<?php echo esc_attr(get_the_ID()); ?>">
        <input class="wpds-calc__hp" type="text" name="company_site" tabindex="-1" autocomplete="off" aria-hidden="true">

        <div class="wpds-calc__stage is-active" data-calc-stage="1">
          <div class="wpds-calc__panel">
            <div class="wpds-calc__head">
              <span>Выберите тип сайта</span>
              <strong data-service-count><?php echo esc_html(count($calculator_services)); ?> варианта</strong>
            </div>
            <div class="wpds-calc__types" role="radiogroup" aria-label="Тип сайта">
              <?php foreach ($calculator_services as $index => $service) : ?>
                <button
                  class="wpds-calc__type <?php echo $index === 0 ? 'is-active' : ''; ?>"
                  type="button"
                  role="radio"
                  aria-checked="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                  data-service-index="<?php echo esc_attr($index); ?>"
                >
                  <span class="wpds-calc__typeName"><?php echo esc_html($service['title']); ?></span>
                  <span class="wpds-calc__typeDesc"><?php echo esc_html($service['description']); ?></span>
                  <span class="wpds-calc__typePrice">от <?php echo esc_html(number_format_i18n((int) $service['base_price'], 0)); ?> ₽</span>
                </button>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="wpds-calc__panel wpds-calc__panel--options">
            <div class="wpds-calc__head">
              <span>Доступные услуги</span>
              <strong>можно выбрать несколько</strong>
            </div>
            <div class="wpds-calc__options" data-calc-options></div>
          </div>
        </div>

        <div class="wpds-calc__stage" data-calc-stage="2">
          <div class="wpds-calc__contact">
            <div>
              <span class="wpds-calc__eyebrow">Финальный шаг</span>
              <h3>Куда отправить расчёт?</h3>
              <p>Оставьте имя и телефон — выбранные услуги, цены и итоговая сумма автоматически уйдут мне на почту.</p>
            </div>
            <label class="wpds-calc__field">
              <span>Ваше имя</span>
              <input type="text" name="calc_name" placeholder="Например, Алексей" autocomplete="name" required>
            </label>
            <label class="wpds-calc__field">
              <span>Телефон</span>
              <input type="tel" name="calc_phone" placeholder="+7 (___) ___-__-__" autocomplete="tel" required>
            </label>
          </div>
        </div>

        <aside class="wpds-calc__summary" aria-live="polite">
          <div class="wpds-calc__summaryTop">
            <span>Ваш расчёт</span>
            <button class="wpds-calc__back" type="button" data-calc-back hidden>Изменить услуги</button>
          </div>
          <div class="wpds-calc__chosen" data-calc-chosen></div>
          <div class="wpds-calc__total">
            <span>Итого ориентировочно</span>
            <strong data-calc-total>0 ₽</strong>
          </div>
          <button class="wpds-calc__submit" type="button" data-calc-next><?php echo esc_html($calculator['button']); ?></button>
          <p class="wpds-calc__note">Стоимость предварительная: финальная смета зависит от структуры, интеграций и контента.</p>
          <div class="wpds-calc__notice" data-calc-notice hidden></div>
        </aside>
      </form>
    </div>
  </div>
</section>

<style>
  .wpds-calc{background:#fff;padding:72px 0 56px;color:#18181b;font-family:"Wix Madefor Text",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif}
  .wpds-calc__shell{position:relative;overflow:hidden;border-radius:44px;background:radial-gradient(circle at 12% 0%,rgba(99,102,241,.18),transparent 34%),linear-gradient(135deg,#111827 0%,#25243a 48%,#0f172a 100%);padding:36px;color:#fff;box-shadow:0 28px 90px rgba(15,23,42,.16)}
  .wpds-calc__shell:before{content:"";position:absolute;inset:auto -12% -36% 42%;height:360px;background:radial-gradient(circle,rgba(59,130,246,.42),transparent 62%);filter:blur(14px);pointer-events:none}
  .wpds-calc__intro{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1fr) minmax(260px,410px);gap:18px 34px;align-items:end;margin-bottom:28px}
  .wpds-calc__eyebrow{display:inline-flex;width:max-content;border:1px solid rgba(255,255,255,.18);background:rgba(255,255,255,.08);border-radius:999px;padding:8px 12px;font-size:13px;color:rgba(255,255,255,.78)}
  .wpds-calc__title{grid-column:1;margin:0;font-weight:500;letter-spacing:-.04em;font-size:clamp(34px,4vw,64px);line-height:.98;max-width:780px}
  .wpds-calc__text{grid-column:1;margin:0;color:rgba(255,255,255,.72);font-size:18px;line-height:1.55;max-width:760px}
  .wpds-calc__steps{grid-column:2;grid-row:1 / span 3;justify-self:end;display:flex;gap:8px;flex-wrap:wrap;align-self:start}
  .wpds-calc__step{border-radius:999px;padding:10px 14px;background:rgba(255,255,255,.09);color:rgba(255,255,255,.56);font-size:14px}.wpds-calc__step.is-active{background:#fff;color:#111827}
  .wpds-calc__form{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1fr) 390px;gap:22px}.wpds-calc__hp{position:absolute;left:-9999px;opacity:0}
  .wpds-calc__stage{display:none;grid-template-columns:1fr;gap:18px}.wpds-calc__stage.is-active{display:grid}.wpds-calc__panel,.wpds-calc__contact,.wpds-calc__summary{border:1px solid rgba(255,255,255,.14);background:rgba(255,255,255,.08);backdrop-filter:blur(18px);border-radius:30px;padding:22px}.wpds-calc__head{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px;color:rgba(255,255,255,.72);font-size:14px}.wpds-calc__head strong{font-weight:500;color:#fff}
  .wpds-calc__types{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}.wpds-calc__type{position:relative;display:flex;min-height:184px;flex-direction:column;align-items:flex-start;gap:12px;border:1px solid rgba(255,255,255,.14);border-radius:24px;padding:20px;background:rgba(255,255,255,.07);color:#fff;text-align:left;cursor:pointer;transition:.22s ease}.wpds-calc__type:hover,.wpds-calc__type.is-active{transform:translateY(-2px);background:#fff;color:#111827;box-shadow:0 18px 44px rgba(0,0,0,.2)}.wpds-calc__typeName{font-size:22px;font-weight:600;letter-spacing:-.02em}.wpds-calc__typeDesc{color:currentColor;opacity:.68;font-size:14px;line-height:1.45}.wpds-calc__typePrice{margin-top:auto;border-radius:999px;padding:8px 10px;background:rgba(99,102,241,.14);color:inherit;font-size:13px;font-weight:600}
  .wpds-calc__options{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.wpds-calc__option{display:grid;grid-template-columns:auto 1fr auto;gap:12px;align-items:center;border:1px solid rgba(255,255,255,.14);border-radius:18px;background:rgba(255,255,255,.07);padding:14px 16px;cursor:pointer;transition:.18s ease}.wpds-calc__option:hover,.wpds-calc__option.is-checked{background:rgba(255,255,255,.16);border-color:rgba(255,255,255,.36)}.wpds-calc__check{display:grid;place-items:center;width:24px;height:24px;border-radius:8px;border:1px solid rgba(255,255,255,.36);background:rgba(255,255,255,.08);font-size:14px}.wpds-calc__option.is-checked .wpds-calc__check{background:#fff;color:#111827}.wpds-calc__option input{position:absolute;opacity:0}.wpds-calc__optionTitle{font-weight:500}.wpds-calc__optionPrice{color:rgba(255,255,255,.78);font-size:14px;white-space:nowrap}
  .wpds-calc__summary{position:sticky;top:20px;align-self:start;background:rgba(255,255,255,.95);color:#111827}.wpds-calc__summaryTop{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:16px;color:#71717a;font-size:14px}.wpds-calc__back{border:0;background:transparent;color:#4f46e5;text-decoration:underline;cursor:pointer}.wpds-calc__chosen{display:grid;gap:10px;margin-bottom:20px}.wpds-calc__line{display:flex;justify-content:space-between;gap:14px;border-bottom:1px dashed rgba(24,24,27,.14);padding-bottom:10px;font-size:14px}.wpds-calc__line strong{font-weight:600;white-space:nowrap}.wpds-calc__total{display:flex;align-items:flex-end;justify-content:space-between;gap:16px;border-radius:22px;background:#111827;color:#fff;padding:18px;margin-bottom:14px}.wpds-calc__total span{max-width:130px;color:rgba(255,255,255,.64);font-size:13px}.wpds-calc__total strong{font-size:30px;letter-spacing:-.04em;white-space:nowrap}.wpds-calc__submit{width:100%;border:0;border-radius:18px;background:linear-gradient(135deg,#6366f1,#2563eb);color:#fff;padding:17px 18px;font-size:16px;font-weight:700;cursor:pointer;box-shadow:0 16px 36px rgba(37,99,235,.28)}.wpds-calc__submit:disabled{opacity:.65;cursor:wait}.wpds-calc__note{margin:12px 0 0;color:#71717a;font-size:13px;line-height:1.45}.wpds-calc__notice{margin-top:12px;border-radius:14px;padding:12px;font-size:14px}.wpds-calc__notice.is-success{background:#dcfce7;color:#166534}.wpds-calc__notice.is-error{background:#fee2e2;color:#991b1b}
  .wpds-calc__contact{display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:end}.wpds-calc__contact>div{grid-column:1/-1}.wpds-calc__contact h3{margin:14px 0 8px;font-size:38px;line-height:1;letter-spacing:-.03em}.wpds-calc__contact p{margin:0;color:rgba(255,255,255,.7);max-width:640px}.wpds-calc__field{display:grid;gap:8px}.wpds-calc__field span{font-size:14px;color:rgba(255,255,255,.72)}.wpds-calc__field input{width:100%;box-sizing:border-box;border:1px solid rgba(255,255,255,.16);border-radius:18px;background:rgba(255,255,255,.1);color:#fff;padding:16px;font:inherit;outline:none}.wpds-calc__field input::placeholder{color:rgba(255,255,255,.42)}.wpds-calc__field input:focus{border-color:rgba(255,255,255,.52);background:rgba(255,255,255,.14)}
  @media (max-width:1199px){.wpds-calc{padding:56px 0 44px}.wpds-calc__intro,.wpds-calc__form{grid-template-columns:1fr}.wpds-calc__steps{grid-column:1;grid-row:auto;justify-self:start}.wpds-calc__summary{position:static}.wpds-calc__types{grid-template-columns:1fr 1fr}}
  @media (max-width:767px){.wpds-calc{padding:38px 0 28px}.wpds-calc__shell{border-radius:28px;padding:18px}.wpds-calc__title{font-size:34px}.wpds-calc__text{font-size:16px}.wpds-calc__types,.wpds-calc__options,.wpds-calc__contact{grid-template-columns:1fr}.wpds-calc__type{min-height:auto}.wpds-calc__panel,.wpds-calc__contact,.wpds-calc__summary{border-radius:22px;padding:16px}.wpds-calc__total strong{font-size:24px}}
</style>

<script>
(function(){
  const root=document.querySelector('[data-calculator-form]');
  if(!root)return;
  const services=<?php echo wp_json_encode($calculator_services, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
  const ajaxUrl=<?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;
  const fmt=new Intl.NumberFormat('ru-RU');
  let active=0;
  const chosen=new Set();
  const optionsBox=root.querySelector('[data-calc-options]');
  const totalEl=root.querySelector('[data-calc-total]');
  const chosenEl=root.querySelector('[data-calc-chosen]');
  const payloadEl=root.querySelector('[data-calc-payload]');
  const notice=root.querySelector('[data-calc-notice]');
  const next=root.querySelector('[data-calc-next]');
  const back=root.querySelector('[data-calc-back]');
  const indicators=document.querySelectorAll('[data-step-indicator]');
  const stages=root.querySelectorAll('[data-calc-stage]');
  const price=v=>`${fmt.format(Number(v)||0)} ₽`;
  function payload(){
    const service=services[active]||services[0]||{options:[],base_price:0,title:'Не выбран'};
    const selected=(service.options||[]).filter((_,i)=>chosen.has(i));
    const total=(Number(service.base_price)||0)+selected.reduce((sum,item)=>sum+(Number(item.price)||0),0);
    return {serviceKey:service.key,serviceTitle:service.title,basePrice:Number(service.base_price)||0,options:selected,total};
  }
  function renderOptions(){
    const service=services[active]||{options:[]};
    chosen.clear();
    optionsBox.innerHTML=(service.options||[]).map((item,i)=>`<label class="wpds-calc__option"><input type="checkbox" value="${i}"><span class="wpds-calc__check">✓</span><span class="wpds-calc__optionTitle"></span><span class="wpds-calc__optionPrice">${price(item.price)}</span></label>`).join('');
    optionsBox.querySelectorAll('.wpds-calc__option').forEach((label,i)=>{label.querySelector('.wpds-calc__optionTitle').textContent=(service.options[i]||{}).title||'';label.addEventListener('change',()=>{if(label.querySelector('input').checked){chosen.add(i);label.classList.add('is-checked')}else{chosen.delete(i);label.classList.remove('is-checked')}renderSummary();});});
    renderSummary();
  }
  function renderSummary(){
    const data=payload();
    payloadEl.value=JSON.stringify(data);
    totalEl.textContent=price(data.total);
    const lines=[`<div class="wpds-calc__line"><span>${data.serviceTitle}</span><strong>${price(data.basePrice)}</strong></div>`].concat(data.options.map(item=>`<div class="wpds-calc__line"><span></span><strong>${price(item.price)}</strong></div>`));
    chosenEl.innerHTML=lines.join('');
    data.options.forEach((item,i)=>{const span=chosenEl.querySelectorAll('.wpds-calc__line span')[i+1]; if(span) span.textContent=item.title;});
  }
  function setStage(stage){
    stages.forEach(el=>el.classList.toggle('is-active',el.dataset.calcStage===String(stage)));
    indicators.forEach(el=>el.classList.toggle('is-active',el.dataset.stepIndicator===String(stage)));
    back.hidden=stage===1;
    next.textContent=stage===1?<?php echo wp_json_encode($calculator['button']); ?>:'Отправить заявку';
  }
  root.querySelectorAll('[data-service-index]').forEach(btn=>btn.addEventListener('click',()=>{active=Number(btn.dataset.serviceIndex)||0;root.querySelectorAll('[data-service-index]').forEach(item=>{const is=item===btn;item.classList.toggle('is-active',is);item.setAttribute('aria-checked',is?'true':'false')});renderOptions();}));
  next.addEventListener('click',()=>{const isContact=root.querySelector('[data-calc-stage="2"]').classList.contains('is-active');if(!isContact){setStage(2);return;}root.requestSubmit();});
  back.addEventListener('click',()=>setStage(1));
  root.addEventListener('submit',async e=>{e.preventDefault();notice.hidden=true;next.disabled=true;const original=next.textContent;next.textContent='Отправляем...';try{const fd=new FormData(root);fd.set('action','wpds_home_calculator_submit');const res=await fetch(ajaxUrl,{method:'POST',body:fd,credentials:'same-origin'});const json=await res.json();notice.hidden=false;notice.className='wpds-calc__notice '+(json.success?'is-success':'is-error');notice.textContent=(json.data&&json.data.message)||'Готово';if(json.success){root.reset();chosen.clear();renderOptions();setStage(1);}}catch(err){notice.hidden=false;notice.className='wpds-calc__notice is-error';notice.textContent='Не удалось отправить заявку. Попробуйте позже.';}finally{next.disabled=false;next.textContent=original;}});
  renderOptions();
})();
</script>





	
	
	
	
	
	
	
	
	
	
	
	
	
	
<style>
  .partners-marquee {
    background: #fff;
    padding: 40px 0;
    overflow: hidden;
  }
	
	.marquee-logo{
		height: 101px;
		width: auto;
	}

  .partners-marquee__viewport {
    width: 100%;
    overflow: hidden;
  }

  .partners-marquee__track {
    display: flex;
    align-items: center;
    gap: 2rem; /* меньше расстояние между SVG */
    width: max-content;
    animation: partners-marquee 40s linear infinite;
  }

  .partners-marquee__item {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 6.25rem;
  }

  .partners-marquee__item svg {
    height: 100%;
    width: auto;
  }

  /* Бесшовная цикличная прокрутка */
  @keyframes partners-marquee {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }

  @media (max-width: 768px) {
    .partners-marquee {
      padding: 24px 0;
    }
    .partners-marquee__item {
      height: 4.5rem;
    }
    .partners-marquee__track {
      gap: 1.5rem;
      animation-duration: 25s;
    }
  }
</style>


<section class="partners-marquee">
  <div class="partners-marquee__track">

    <!-- 1 -->
    <div class="partners-marquee__item">
      <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none">
        <g clip-path="url(#clip0_18683_110390)" fill="#3A3C4D" fill-opacity="0.5">
          <path d="M55.368 58.494H66.38V55.5h-9.954l-1.058 2.994ZM49.32 69.59h17.062v-3.803H50.675L49.32 69.59Zm11.01-19.027H49.316v2.991h9.957l1.055-2.991Zm6.05-11.096H49.32v3.802h15.704l1.356-3.802ZM52.34 63.842h14.04v-3.4H53.54l-1.2 3.4Zm11.017-18.627H49.32v3.4h12.84l1.197-3.4Zm115.034.002a2.853 2.853 0 0 0-2.855 2.846 2.85 2.85 0 1 0 5.702 0 2.845 2.845 0 0 0-2.847-2.846Zm0 5.072a2.23 2.23 0 0 1-2.231-2.226 2.228 2.228 0 1 1 2.231 2.226Z"></path>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M178.979 48.24c.472-.036.727-.23.727-.715 0-.273-.08-.528-.317-.69-.202-.12-.487-.128-.722-.128h-1.286v2.656h.518V48.24h.523l.6 1.123h.6l-.643-1.123Zm-1.08-.398v-.751h.648c.254 0 .631 0 .631.355 0 .336-.199.403-.492.396h-.787Z"></path>
          <path d="M69.838 68.76V45.208h-.823v24.377h39.92v-.825H69.838Zm90.606-17.852a10.481 10.481 0 0 0-6.433-10.643 10.487 10.487 0 0 0-11.422 2.273 10.478 10.478 0 0 0 7.409 17.887c4.818 0 8.877-3.243 10.108-7.662h-4.052a6.7 6.7 0 0 1-6.056 3.852 6.67 6.67 0 0 1-6.607-5.707h17.053Zm-10.446-7.627a6.673 6.673 0 0 1 5.993 3.762h-12a6.693 6.693 0 0 1 6.007-3.762Zm31.236-3.814-19.039.005v20.946h3.82V43.281h15.219v-3.814Zm-59.886.005c-2.538 0-4.87.9-6.683 2.394v-2.351h-3.813v30.077h3.815V58.036a10.484 10.484 0 0 0 6.681 2.39 10.487 10.487 0 0 0 9.693-6.465c.528-1.272.8-2.636.801-4.013a10.48 10.48 0 0 0-6.481-9.68 10.484 10.484 0 0 0-4.013-.796Zm0 17.148a6.673 6.673 0 0 1-6.276-4.087 6.672 6.672 0 0 1 3.685-8.779 6.673 6.673 0 0 1 2.591-.47 6.68 6.68 0 0 1 6.682 6.664 6.683 6.683 0 0 1-6.682 6.672Z"></path>
          <path d="M108.983 50.908c.032-.313.048-.633.048-.96a10.476 10.476 0 0 0-3.078-7.416 10.48 10.48 0 0 0-7.423-3.063 10.48 10.48 0 1 0 0 20.956 10.483 10.483 0 0 0 10.084-7.576h-4.064a6.679 6.679 0 0 1-10.753 1.797 6.676 6.676 0 0 1-1.867-3.74l17.053.002ZM98.53 43.282a6.67 6.67 0 0 1 5.998 3.761H92.533a6.671 6.671 0 0 1 5.997-3.761Zm41.665-3.81h-2.783v-9.155h-3.821v9.155h-1.968v3.805h1.968V60.42h3.819V43.277h2.783l.002-3.805Z"></path>
          <path d="M88.12 43.281v-.026l.015-.015-.014-.01v-3.759H69.005v3.81h14.318L73.26 56.615v3.824l14.817-.002V56.66H78.006l10.096-13.38h.019Zm92.299-12.115v6.362h.822v-7.19h-41.655v.825l40.833.003Zm-29.181 33.882-2.08 4.537h.612l.521-1.142h2.094l.521 1.142h.609l-2.077-4.535-.2-.002Zm-.71 2.874.809-1.845.813 1.845h-1.622Zm24.766-2.874-2.08 4.537h.612l.52-1.142h2.095l.52 1.142h.612l-2.08-4.535-.199-.002Zm-.71 2.874.811-1.845.808 1.845h-1.619Zm5.211 1.144v-4.04h-.569v4.559h1.955v-.521l-1.386.002Zm-57.909-4.016v4.535h.571v-4.559h-.571v.024Zm6.067 0v3.342l-3.196-3.342h-.232v4.535h.571v-3.4l3.25 3.402h.175v-4.56h-.568v.023Zm2.226 0v.497h1.085v4.038h.571v-4.038h1.082v-.52h-2.735l-.003.023Zm4.455 0v4.535h2.452v-.521h-1.883v-1.722h1.828v-.521h-1.828v-1.274h1.883v-.52h-2.454l.002.023Zm6.922 1.274a1.274 1.274 0 0 0-.6-1.087 1.682 1.682 0 0 0-.633-.187c-.192-.024-.384-.024-.569-.024h-.691v4.559h.569v-1.93h.237l1.344 1.93h.688l-1.439-1.984a1.243 1.243 0 0 0 1.094-1.277Zm-1.744.86h-.183v-1.651h.154c.561 0 1.24.103 1.24.815 0 .713-.628.835-1.211.835Zm7.178-2.134v3.342l-3.196-3.342h-.23v4.535h.568v-3.4l3.251 3.402h.178v-4.56h-.571v.023Zm7.271 0v.497h1.08v4.038h.571v-4.038h1.087v-.52h-2.738v.023Zm4.436 0v4.535h.571v-4.559h-.571v.024Zm12.351 0v3.342l-3.198-3.342h-.231v4.535h.569v-3.4l3.253 3.402h.175v-4.56h-.568v.023Zm-6.842 0a2.354 2.354 0 0 0-1.488 0 2.4 2.4 0 0 0-1.648 2.255c0 1.116.727 2.004 1.72 2.284.439.128.905.128 1.344 0a2.338 2.338 0 0 0 1.717-2.284 2.385 2.385 0 0 0-1.65-2.255h.005Zm-.744 4.1a1.834 1.834 0 0 1-1.824-1.847c0-1.036.751-1.843 1.824-1.843 1.075 0 1.823.84 1.823 1.845a1.855 1.855 0 0 1-1.823 1.845Z"></path>
        </g>
        <defs>
          <clipPath id="clip0_18683_110390">
            <path fill="#fff" transform="translate(49 30)" d="M0 0h132.559v40H0z"></path>
          </clipPath>
        </defs>
      </svg>
    </div>

    <!-- 2 -->
    <div class="partners-marquee__item">
      <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none">
        <path fill="#fff" d="M0 0h230v100H0z"></path>
        <g clip-path="url(#clip0_2747_119965)">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M88.38 39.114H77.247v18.684h3.348v-7.474h7.785c3.934 0 7.952-.581 7.952-5.231v-.748c0-4.567-4.018-5.231-7.952-5.231Zm4.604 5.979c0 2.159-1.925 2.159-4.185 2.159H80.51v-4.983h9.627c.484.017.963.1 1.423.25.428.097.806.343 1.067.694.26.35.387.781.356 1.215v.665Zm4.185-5.98h19.504v3.156h-8.119v15.529h-3.349V42.269h-8.12l.084-3.155Zm43.696 0h2.762v18.685h-3.348V46.089l-5.943 9.052-2.26-.083-6.111-9.052v11.792h-3.348V39.114h2.678l7.869 11.709 7.701-11.71Zm21.931 0h2.512v18.685h-3.349V44.345l-13.393 13.453h-2.595V39.114h3.348v13.535l13.477-13.535Zm22.099 12.457 2.512 2.325-.084.166a5.647 5.647 0 0 1-1.172 1.495c-2.093 1.66-5.692 2.242-8.287 2.242-6.948 0-10.882-2.823-10.882-9.3 0-6.56 3.934-9.301 10.882-9.301 2.595 0 6.194.498 8.287 2.242.46.409.855.885 1.172 1.411v.167l-2.428 2.325-.167-.332-.251-.416-.168-.332a.828.828 0 0 0-.251-.332c-1.339-1.412-4.185-1.66-6.194-1.66-5.19 0-7.534 1.411-7.534 6.227 0 4.817 2.344 6.228 7.534 6.228 2.093 0 4.855-.249 6.194-1.66.09-.078.174-.16.251-.25.044-.116.1-.227.168-.332l.251-.498.167-.415ZM42.592 47.335a2.81 2.81 0 0 1 .643-1.766 2.85 2.85 0 0 1 1.617-.975c3.348-.747 3.934-.83 6.362-4.152.32-.397.728-.716 1.193-.932a3.371 3.371 0 0 1 1.485-.313c.25-.028.503-.028.754 0 3.348.83 4.436-.166 5.44-2.492.156-.434.43-.817.792-1.107a2.52 2.52 0 0 1 2.612-.33c.423.191.785.494 1.045.876a2.477 2.477 0 0 1-.857 3.57 2.526 2.526 0 0 1-1.331.313 2.104 2.104 0 0 1-.335 0c-2.511-.332-3.934.083-5.022 3.405a3.32 3.32 0 0 1-1.037 1.565 3.36 3.36 0 0 1-1.726.76c-4.018.498-4.436.83-6.696 3.405a2.867 2.867 0 0 1-3.088.733 2.843 2.843 0 0 1-1.32-1c-.329-.456-.514-1-.531-1.56Zm.335-9.716c0-.493.147-.974.423-1.384.276-.41.668-.73 1.127-.918a2.53 2.53 0 0 1 2.737.54 2.473 2.473 0 0 1 .544 2.715c-.19.456-.512.845-.925 1.118a2.525 2.525 0 0 1-3.17-.31 2.481 2.481 0 0 1-.736-1.761Zm22.266 9.716c0 .749-.3 1.467-.834 1.996a2.858 2.858 0 0 1-2.012.827c-.14.01-.28.01-.419 0-2.51-.415-3.683.083-4.604 3.073a3.57 3.57 0 0 1-1.203 1.732 3.617 3.617 0 0 1-1.977.759c-4.52.332-4.856.83-6.948 2.99a2.51 2.51 0 0 1-2.123.846 2.525 2.525 0 0 1-1.114-.375 2.5 2.5 0 0 1-.82-.837 2.476 2.476 0 0 1 .57-3.196c.307-.25.67-.424 1.06-.508 3.013-.83 3.599-.83 6.11-4.484a3.593 3.593 0 0 1 1.65-1.324 3.626 3.626 0 0 1 2.117-.17c3.097.664 4.185-.167 5.022-2.409a2.83 2.83 0 0 1 1.274-1.508 2.866 2.866 0 0 1 3.649.713c.42.533.635 1.198.602 1.875Zm-.419 9.633a2.479 2.479 0 0 1-.543 1.533 2.514 2.514 0 0 1-1.382.875c-3.18.747-3.767.83-6.278 4.401a3.344 3.344 0 0 1-1.274 1.003 3.372 3.372 0 0 1-3.15-.203 3.334 3.334 0 0 1-1.131-1.16 3.302 3.302 0 0 1 .946-4.36 3.363 3.363 0 0 1 1.512-.595c4.353-.415 4.688-.83 6.948-3.238a2.53 2.53 0 0 1 2.677-.543c.451.176.842.477 1.124.868.283.391.445.855.468 1.336l.083.083Z" fill="#3A3C4D" fill-opacity="0.5"></path>
        </g>
        <defs>
          <clipPath id="clip0_2747_119965">
            <path fill="#fff" transform="translate(42.592 35.21)" d="M0 0h144.815v29.895H0z"></path>
          </clipPath>
        </defs>
      </svg>
    </div>

    
	  
	  
	  
	  
	<div class="partners-marquee__item">
      <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><path d="M50.204 25.877c2.955 7.39-1.863 12.134-6.662 16.885-4.466 4.855-8.4 9.9-.487 18.982-2.956-7.39 1.863-12.134 6.657-16.88 4.47-4.865 8.405-9.905.492-18.987ZM43.054 16.426c2.96 7.393-1.855 12.134-6.658 16.882-4.466 4.858-8.399 9.904-.483 18.986-2.958-7.395 1.86-12.135 6.658-16.883 4.468-4.86 8.397-9.904.483-18.985ZM164.484 45.693V60.8h6.712v-5.53h7.376v-3.306h-7.376V49h14.631v11.799h6.713v-11.8h6.081v-3.306h-34.137ZM150.083 57.52v-2.618h8.753v-3.31h-8.753V49h11.243v-3.307h-17.955V60.8h18.093V57.52h-11.381ZM79.288 45.693h-18.6V49h5.944v11.799h6.712v-11.8h5.944v-3.306ZM84.37 55.075l3.107-5.847 2.972 5.847h-6.078Zm8.171-9.382h-7.195L76.97 60.8h4.362l1.377-2.593h9.408l1.373 2.593h7.434l-8.382-15.106ZM135.136 45.693v7.552l-10.735-7.552h-5.21V60.8h4.595v-8.31l11.023 8.31h4.921V45.693h-4.594ZM116.909 45.693h-18.21V49h5.943v11.799h6.713v-11.8h5.554v-3.306Z" fill="#3A3C4D" fill-opacity="0.5"></path></svg>
    </div>

	  
	  
	  <div class="partners-marquee__item">
           <svg
  width="230"
  height="100"
  viewBox="0 0 230 100"
  xmlns="http://www.w3.org/2000/svg"
  role="img"
  aria-label="Elementor partner logo"
>
  <!-- Группа логотипа, центрирована -->
  <g transform="translate(25 26) scale(1)">
    <!-- Круг -->
    <circle cx="24" cy="24" r="24" fill="#A6A6AB"/>

    <!-- Буква E -->
    <rect x="16" y="12" width="4" height="24" fill="#FFFFFF"/>
    <rect x="22" y="12" width="10" height="4" fill="#FFFFFF"/>
    <rect x="22" y="22" width="10" height="4" fill="#FFFFFF"/>
    <rect x="22" y="32" width="10" height="4" fill="#FFFFFF"/>

    <!-- Текст -->
    <text
      x="56"
      y="32"
      fill="#A6A6AB"
      font-size="26"
      font-family="Inter, Arial, Helvetica, sans-serif"
      font-weight="600"
      letter-spacing="-0.4"
    >
      elementor
    </text>
  </g>
</svg>


    </div>
	  
	  
	  
	  
	  <div class="partners-marquee__item">
     <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><path d="m198.429 42.254-5.181 3.069-7.037 6.75v1.995l5.645 3.606h-19.179l5.646-3.605v-1.995l-7.347-6.981-5.181-2.84h18.173l-3.867 2.84 4.099 3.759 3.944-3.99-3.867-2.531h14.152m-49.957 6.367h5.104c1.547 0 2.475-.077 2.861-.153.387-.077.696-.23.928-.537.232-.307.31-.614.31-.998 0-.383-.078-.69-.31-.997-.232-.307-.464-.46-.85-.614-.542-.153-1.547-.23-3.016-.23h-5.104v3.53h.077Zm-13.688-6.444H156.437c2.63 0 4.718.307 6.342.844a7.16 7.16 0 0 1 2.32 1.38c.696.691 1.082 1.382 1.082 2.149 0 .997-.618 1.841-1.856 2.455-1.082.537-2.706.997-4.872 1.227.928.23 1.702.46 2.166.768.541.23 1.082.69 1.546 1.15.387.384.774.844 1.083 1.228.309.46.619 1.074 1.005 1.918l3.79 2.224h-10.982c-.386-.92-.85-1.84-1.314-2.838-.542-.997-.928-1.688-1.238-2.148-.309-.384-.618-.69-1.082-.767-.387-.154-1.16-.23-2.166-.23h-3.789v2.301l5.645 3.606h-19.333l5.645-3.606V45.86l-5.645-3.606Zm-20.88 6.444h5.104c1.547 0 2.475-.077 2.861-.153.387-.077.696-.23.928-.537.232-.307.31-.614.31-.998 0-.383-.078-.69-.31-.997-.232-.307-.464-.46-.85-.614-.542-.153-1.547-.23-3.016-.23h-5.104v3.53h.077Zm-13.688-6.444H121.869c2.63 0 4.718.307 6.342.844a7.16 7.16 0 0 1 2.32 1.38c.696.691 1.082 1.382 1.082 2.149 0 .997-.618 1.841-1.856 2.455-1.082.537-2.706.997-4.872 1.227.928.23 1.702.46 2.166.768.541.23 1.082.69 1.546 1.15.387.384.774.844 1.083 1.228.309.46.619 1.074 1.005 1.918l3.79 2.224h-10.982c-.386-.92-.85-1.84-1.314-2.838-.542-.997-.928-1.688-1.238-2.148-.309-.384-.618-.69-1.082-.767-.387-.154-1.16-.23-2.166-.23h-3.789v2.301l5.645 3.606h-19.333l5.645-3.606V45.86l-5.645-3.606Zm-2.475 0v6.674l-5.8-4.066H81.037v3.3h6.032l4.254-1.765V53.3l-4.254-2.071h-6.032v3.299h10.904l6.264-4.373v7.441H67.35l5.645-3.605V45.86l-5.645-3.606h30.392Zm-30.546 0-10.44 5.524 5.413 6.214 5.259 3.605H49.794l4.64-3.298-3.17-3.606-6.032 2.762v.614l4.253 3.605H31.621l5.645-3.605v-8.21l-5.645-3.605h17.787l-4.099 3.299v4.22l8.894-4.45-3.945-3.07h16.937ZM188.917 59.439V61.127H189.149c.232 0 .386 0 .464-.077.077-.077.232-.153.309-.307.077-.153.077-.307.077-.46 0-.154 0-.384-.077-.46-.077-.154-.155-.23-.232-.307-.077-.077-.232-.077-.387-.077h-.386Zm-.928-.384h1.314c.31 0 .542.077.696.154.155.076.31.23.464.46.078.153.155.384.155.69 0 .154 0 .384-.077.46-.078.154-.155.308-.232.384a.427.427 0 0 1-.387.23c-.077.077-.232.077-.387.077-.154 0-.309.077-.386.077h-1.16v-.384H188.221s.077 0 .077-.076V59.439s0-.077-.077-.077H187.989v-.307Zm-2.862 0h1.083l.773 1.458v-1.074s0-.077-.077-.077h-.309v-.384h1.082v.384h-.309s-.077 0-.077.077v2.148h-.542l-.928-1.918v1.458l.078.076h.309v.384h-1.083v-.384H185.359s.078 0 .078-.076V59.439s0-.077-.078-.077H185.127v-.307Zm-1.856 1.381h.542l-.232-.69-.31.69Zm.078-1.38h.541l.773 1.994c.078.077.078.153.078.23h.154v.384h-1.237v-.384H183.89l.077-.077v-.153l-.077-.23h-.773l-.078.23v.153H183.271v.384h-1.005v-.384h.155s.077 0 .077-.076c0 0 .077-.077.077-.154l.774-1.918Zm-3.326 0h1.238v.383H181.029s-.078 0-.078.077v1.687h.078c.154 0 .309 0 .386-.076.078-.077.155-.077.31-.23.077-.077.154-.23.232-.384l.309.077-.309.92h-1.934v-.383H180.255s.078 0 .078-.077v-1.611s0-.077-.078-.077H180.023v-.307Zm-2.784 0h1.083l.773 1.457v-1.074s0-.077-.077-.077h-.309v-.384h1.082v.384h-.309s-.077 0-.077.077v2.148h-.542l-.928-1.918v1.458l.078.076h.309v.384h-1.083v-.384H177.471s.078 0 .078-.076V59.439s0-.077-.078-.077H177.239v-.307Zm-1.546 0h1.237v.383H176.698l-.077.077V61.203l.077.077H176.93v.384h-1.237v-.384H175.925s.077 0 .077-.077v-1.687s0-.077-.077-.077H175.693v-.384Zm-2.552 0h2.165l.309.843-.309.154c-.077-.154-.077-.23-.155-.23l-.154-.154c-.078-.077-.155-.077-.232-.077h-.619v.69h.309l.078-.076v-.307h.309v1.15h-.309V60.82s0-.077-.078-.077c0 0-.077 0-.077-.077h-.309V61.357s0 .077.077.077H174.378v.383h-1.237v-.383H173.373s.077-.077.077-.154V59.44s0-.077-.077-.077H173.141v-.307Z" fill-rule="evenodd" clip-rule="evenodd" fill="#3A3C4D" fill-opacity="0.5"></path></svg>
    </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   <div class="partners-marquee__item">
     
		   <svg width="230" height="100" viewBox="0 0 230 100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Woo badge">
  <!-- Bubble -->
  <path
    d="
      M36 14
      H194
      Q210 14 210 30
      V62
      Q210 78 194 78
      H98
      L76 94
      L80 78
      H36
      Q20 78 20 62
      V30
      Q20 14 36 14
      Z
    "
    fill="#A6A6AB"
  />

  <!-- Text -->
  <text
    x="116"
    y="62"
    text-anchor="middle"
    fill="#FFFFFF"
    font-size="52"
    font-weight="900"
    letter-spacing="-2"
    font-family="Arial Rounded MT Bold, Nunito, Quicksand, Inter, Arial, sans-serif"
  >
    Woo
  </text>
</svg>

    </div>
	  
	  
	  
	  
	  
	  
	  <div class="partners-marquee__item">
     <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><path d="M49.293 25c-2.627 1.35-5.302 2.746-7.507 5.026-2.064 2.095-2.627 5.679-1.36 8.378a28.963 28.963 0 0 0 5.16 7.167A28.754 28.754 0 0 1 49.294 25ZM47.135 46.922c2.58 1.629 5.114 3.164 8.07 3.863 3.236.744 6.286-.605 8.21-3.165a32.542 32.542 0 0 0 3.518-7.82 29.702 29.702 0 0 1-19.798 7.122ZM66.417 27.188a7.883 7.883 0 0 0-2.61-2.799 7.961 7.961 0 0 0-3.63-1.25 31.247 31.247 0 0 0-8.679.884c6.427 2.047 12.808 7.353 16.092 13.45.14-3.537.328-7.307-1.173-10.285ZM122.574 37.474V48.83h-3.284V37.474h-7.554V64.98h7.554V53.577h3.237V64.98h7.553V37.474h-7.506ZM137.398 37.473c-2.393 0-4.035 2.047-4.035 4.514V64.98h7.507V53.576h3.049v11.403h7.46V37.473h-13.981Zm6.521 11.356h-3.049v-5.585c0-1.024.375-1.397 1.313-1.397h1.736v6.982ZM88.749 51.063c1.735-.186 3.753-2.002 3.753-4.422v-4.654c-.047-2.513-1.924-4.514-3.894-4.514h-14.31v27.506h7.46V53.576h1.877c.891 0 1.313.419 1.313 1.443v10.006h7.554v-9.448c0-2.466-1.97-4.328-3.753-4.514Zm-3.8-3.63c.046.837-.329 1.303-.939 1.396h-2.205v-6.982h1.877c.938 0 1.313.466 1.313 1.397l-.047 4.188ZM103.338 42.78h5.161v-5.306H95.785V64.98H108.5v-5.306h-5.161v-6.097h4.364V48.83h-4.364v-6.05ZM172.257 62.233c.394-1.056.57-2.18.516-3.304v-21.41h-7.366v21.223a1.503 1.503 0 0 1-1.015 1.457c-.201.07-.415.097-.627.08h-.047a1.553 1.553 0 0 1-1.159-.413 1.524 1.524 0 0 1-.483-1.124V37.52h-7.365v21.408a7.898 7.898 0 0 0 .516 3.305 4.85 4.85 0 0 0 1.282 1.646c.543.45 1.178.778 1.861.96a8.531 8.531 0 0 0 2.017.14h6.756c.675.008 1.35-.038 2.017-.14a5.058 5.058 0 0 0 3.097-2.606Z" fill="#3A3C4D" fill-opacity="0.5"></path></svg>
    </div>
	  
	  
	  
	  
	  
	  
	  
	   <div class="partners-marquee__item">
    <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><g clip-path="url(#clip0_2747_119965)"><path fill-rule="evenodd" clip-rule="evenodd" d="M88.38 39.114H77.247v18.684h3.348v-7.474h7.785c3.934 0 7.952-.581 7.952-5.231v-.748c0-4.567-4.018-5.231-7.952-5.231Zm4.604 5.979c0 2.159-1.925 2.159-4.185 2.159H80.51v-4.983h9.627c.484.017.963.1 1.423.25.428.097.806.343 1.067.694.26.35.387.781.356 1.215v.665Zm4.185-5.98h19.504v3.156h-8.119v15.529h-3.349V42.269h-8.12l.084-3.155Zm43.696 0h2.762v18.685h-3.348V46.089l-5.943 9.052-2.26-.083-6.111-9.052v11.792h-3.348V39.114h2.678l7.869 11.709 7.701-11.71Zm21.931 0h2.512v18.685h-3.349V44.345l-13.393 13.453h-2.595V39.114h3.348v13.535l13.477-13.535Zm22.099 12.457 2.512 2.325-.084.166a5.647 5.647 0 0 1-1.172 1.495c-2.093 1.66-5.692 2.242-8.287 2.242-6.948 0-10.882-2.823-10.882-9.3 0-6.56 3.934-9.301 10.882-9.301 2.595 0 6.194.498 8.287 2.242.46.409.855.885 1.172 1.411v.167l-2.428 2.325-.167-.332-.251-.416-.168-.332a.828.828 0 0 0-.251-.332c-1.339-1.412-4.185-1.66-6.194-1.66-5.19 0-7.534 1.411-7.534 6.227 0 4.817 2.344 6.228 7.534 6.228 2.093 0 4.855-.249 6.194-1.66.09-.078.174-.16.251-.25.044-.116.1-.227.168-.332l.251-.498.167-.415ZM42.592 47.335a2.81 2.81 0 0 1 .643-1.766 2.85 2.85 0 0 1 1.617-.975c3.348-.747 3.934-.83 6.362-4.152.32-.397.728-.716 1.193-.932a3.371 3.371 0 0 1 1.485-.313c.25-.028.503-.028.754 0 3.348.83 4.436-.166 5.44-2.492.156-.434.43-.817.792-1.107a2.52 2.52 0 0 1 2.612-.33c.423.191.785.494 1.045.876a2.477 2.477 0 0 1-.857 3.57 2.526 2.526 0 0 1-1.331.313 2.104 2.104 0 0 1-.335 0c-2.511-.332-3.934.083-5.022 3.405a3.32 3.32 0 0 1-1.037 1.565 3.36 3.36 0 0 1-1.726.76c-4.018.498-4.436.83-6.696 3.405a2.867 2.867 0 0 1-3.088.733 2.843 2.843 0 0 1-1.32-1c-.329-.456-.514-1-.531-1.56Zm.335-9.716c0-.493.147-.974.423-1.384.276-.41.668-.73 1.127-.918a2.53 2.53 0 0 1 2.737.54 2.473 2.473 0 0 1 .544 2.715c-.19.456-.512.845-.925 1.118a2.525 2.525 0 0 1-3.17-.31 2.481 2.481 0 0 1-.736-1.761Zm22.266 9.716c0 .749-.3 1.467-.834 1.996a2.858 2.858 0 0 1-2.012.827c-.14.01-.28.01-.419 0-2.51-.415-3.683.083-4.604 3.073a3.57 3.57 0 0 1-1.203 1.732 3.617 3.617 0 0 1-1.977.759c-4.52.332-4.856.83-6.948 2.99a2.51 2.51 0 0 1-2.123.846 2.525 2.525 0 0 1-1.114-.375 2.5 2.5 0 0 1-.82-.837 2.476 2.476 0 0 1 .57-3.196c.307-.25.67-.424 1.06-.508 3.013-.83 3.599-.83 6.11-4.484a3.593 3.593 0 0 1 1.65-1.324 3.626 3.626 0 0 1 2.117-.17c3.097.664 4.185-.167 5.022-2.409a2.83 2.83 0 0 1 1.274-1.508 2.866 2.866 0 0 1 3.649.713c.42.533.635 1.198.602 1.875Zm-.419 9.633a2.479 2.479 0 0 1-.543 1.533 2.514 2.514 0 0 1-1.382.875c-3.18.747-3.767.83-6.278 4.401a3.344 3.344 0 0 1-1.274 1.003 3.372 3.372 0 0 1-3.15-.203 3.334 3.334 0 0 1-1.131-1.16 3.302 3.302 0 0 1 .946-4.36 3.363 3.363 0 0 1 1.512-.595c4.353-.415 4.688-.83 6.948-3.238a2.53 2.53 0 0 1 2.677-.543c.451.176.842.477 1.124.868.283.391.445.855.468 1.336l.083.083Z" fill="#3A3C4D" fill-opacity="0.5"></path></g><defs><clipPath id="clip0_2747_119965"><path fill="#fff" transform="translate(42.592 35.21)" d="M0 0h144.815v29.895H0z"></path></clipPath></defs></svg>
    </div>

	  
	  
	  
	  
	   <div class="partners-marquee__item">
    <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M131.818 52.691h-7.756l3.844-7.12 3.912 7.12Zm3.81 7.09 5.597-.004-10.39-19.089h-5.861l-10.302 19.093h5.547l1.882-3.474h11.673l1.854 3.474Zm-38.47-11.362h9.73c1.256 0 2.166-.345 2.166-1.922 0-1.435-.881-2.01-2.051-2.01h-9.846v3.932Zm0 7.628h10.317c1.398 0 2.154-.68 2.154-2.404 0-1.521-.87-1.635-2.069-1.635H97.157v4.04ZM92.1 59.843V40.7h15.981c3.482 0 5.88 1.033 5.88 4.937 0 1.206-.235 2.937-1.234 3.77-.327.297-.722.492-1.139.64 2.124.474 3.101 2.442 3.115 4.287.032 4.448-2.283 5.511-6.336 5.511H92.1Zm55.766-15.357h9.113c.542 0 1.141.263 1.656.407 1.084.315 1.543 1.664 1.571 2.668 0 2.123-.66 3.231-3.371 3.231h-8.969v-6.306Zm0 9.867h9.749c2.426 0 2.726 1.503 2.726 3.598v1.837h5.057v-2.214c0-2.243-1.098-4.505-2.899-5.221 1.045-.747 1.754-1.696 2.09-2.409.285-.603.749-1.593.709-3.245-.117-4.62-1.69-6.012-6.171-6.012h-16.521v19.09l5.259.01v-5.434h.001Zm-92.074-1.966c1.255 0 2.683-.019 2.683 1.531 0 1.637-.598 2.163-2.569 2.13h-8.014c-1.883-.018-2.969.09-2.969-1.661l-5.736-.002v.7c0 4.364 2.068 4.76 5.994 4.76h12.628c4.35 0 6.035-1.19 6.035-5.899 0-4.965-2.023-5.288-6.405-5.425L46.58 48.12c-1.416 0-1.989-.344-1.989-2.21 0-1.148.793-1.907 1.82-1.965h9.208c1.284.058 2.14.599 2.226 2.035h5.68c-.029-1.206 0-2.337-.629-3.457-1.37-2.267-3.996-2.296-6.337-2.324l-5.444-.057c-2.197 0-6.507.028-8.534.574-3.026.775-3.539 2.727-3.539 5.569 0 3.587 1.098 5.513 4.881 5.693l11.868.41Zm29.26 7.472c3.002 0 4.485-1.37 4.485-4.523V40.688h-5.092l.005 12.75c-.085 2.84-.09 2.61-3.342 2.61h-6.406c-3.137-.006-3.305.1-3.44-2.61v-12.75h-5.074l.017 14.716c0 3.187 1.214 4.443 4.45 4.443l14.398.012Zm101.42 0c3 0 4.485-1.37 4.485-4.523V40.688h-5.092l.005 12.75c-.085 2.84-.09 2.61-3.343 2.61h-6.405c-3.137-.006-3.305.1-3.439-2.61v-12.75h-5.075l.017 14.716c0 3.187 1.214 4.443 4.45 4.443l14.397.012Z" fill="#3A3C4D" fill-opacity="0.5"></path></svg>
    </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   <div class="partners-marquee__item">
  <svg width="100%" height="100%" viewBox="0 0 230 100" fill="none"><path fill="#fff" d="M0 0h230v100H0z"></path><path d="M153.867 60.696c-4.981.034-9.695.073-11.009-.043-2.66-.23-4.437-1.955-4.643-4.496-.141-1.666-.141-3.047-.008-4.361.242-2.473 2.328-4.83 4.652-4.94.832-.045 3.06-.04 7.092-.025l11.741.025v-4.831s-9.351-.011-12.162-.024c-3.775-.017-5.674-.019-6.876.024-2.646.1-4.863 1.034-6.588 2.771-1.632 1.64-2.605 4.249-2.75 6.89-.081 1.424-.109 3.287 0 4.394.272 2.839 1.198 5.068 2.75 6.63 1.661 1.676 4.188 2.738 6.59 2.772 1.971.024 19.036 0 19.036 0v-4.83s-5.185.021-7.825.044Zm-52.996-18.415v4.827h11.582v18.288h4.889V47.108h11.585V42.28h-28.056Zm-5.078 9.128c-.036-2.599-.959-4.83-2.752-6.632-1.868-1.886-4.721-2.67-6.587-2.769-1.622-.09-8.017-.062-9.52 0-2.114.09-3.657.715-4.428 1.287-.008.005-.016.003-.016-.009v-8.78h-4.892v30.977h4.883s-.095-12.68.014-14.06c.194-2.455 2.071-4.383 4.463-4.59 1.92-.164 7.68-.12 9.485.003 2.482.17 4.313 2.094 4.457 4.684.048.954-.003 13.962-.003 13.962h4.895s.013-12.958 0-14.073Z" fill="#3A3C4D" fill-opacity="0.5"></path></svg>
    </div>

  </div>
</section>
	
			
			

	
	
	
	
	
			
<!-- Услуги -->
<section class="TariffsWithForm componentWrapper TariffsWithForm_wrapper__mcER3" id="uslugi-wordpress">
  <div class="container TariffsWithForm_container__0SpEL">
    <div class="TariffsWithForm__inner TariffsWithForm_inner__yUvZD"
         itemscope itemtype="https://schema.org/OfferCatalog"
         itemprop="hasOfferCatalog">

      <!-- SEO: более “коммерческий” H2 + расширение семантики -->
      <h2 class="pageTitle TariffsWithForm__title TariffsWithForm_title__tIui5" itemprop="name">
        Выберите формат разработки — цены и сроки понятны до старта
      </h2>

      <!-- SEO: краткий интро-абзац с ключевыми фразами без спама -->
      <p class="TariffsWithForm__intro" style="color: #fff;">
        Разрабатываем сайты на <strong>WordPress под ключ</strong>: лендинги, сайты-визитки,
        <strong>интернет-магазины на WooCommerce</strong>, каталоги и доски объявлений.
        Выполняем <strong>разработку плагинов WordPress</strong>, интеграции, <strong>импорт товаров WooCommerce</strong>
        и <strong>поддержку WordPress-сайтов</strong>.
      </p>

      <!-- Лендинги / сайты-визитки -->
      <a class="TariffsWithForm_item__H3khh TariffsWithForm_item__H3khh--featured"
         href="https://wpdevstudio.ru/services/razrabotka-sajta-vizitki-kotoryj-vyzyvaet-doverie-i-privodit-zayavki/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Разработка лендинга на WordPress — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Разработка лендинга на WordPress (сайт-визитка)
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          Одностраничный сайт на WordPress под ваши задачи: структура, дизайн и верстка,
          формы и заявки, базовая SEO-настройка, адаптивность под мобильные устройства.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 45 000 ₽ / проект">
          От 45 000 ₽ / проект
          <meta itemprop="price" content="45000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
        <span class="TariffsWithForm_result">✓ Запуск за 14–21 день · базовая SEO-структура</span>
        <span class="TariffsWithForm_cta">Узнать детали →</span>
      </a>

      <!-- Интернет-магазины -->
      <a class="TariffsWithForm_item__H3khh TariffsWithForm_item__H3khh--featured"
         href="https://wpdevstudio.ru/services/razrabotka-internet-magazina-na-wordpress-i-woocommerce-pod-vash-biznes/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Разработка интернет-магазина на WooCommerce — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Разработка интернет-магазина на WooCommerce
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          WooCommerce магазин под ключ: каталог, карточки товаров, корзина и оформление заказа,
          оплата/доставка, уведомления, базовая SEO-структура и оптимизация скорости.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 120 000 ₽ / проект">
          От 120 000 ₽ / проект
          <meta itemprop="price" content="120000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
        <span class="TariffsWithForm_result">✓ Готовый к продажам за месяц · PageSpeed 90+ · CRM</span>
        <span class="TariffsWithForm_cta">Узнать детали →</span>
      </a>

      <!-- Доски объявлений / каталоги -->
      <a class="TariffsWithForm_item__H3khh"
         href="https://wpdevstudio.ru/services/razrabotka-marketplejsa-na-wordpress-pod-vashu-biznes-model/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Доска объявлений или каталог на WordPress — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Доска объявлений / каталог на WordPress
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          Каталог или доска объявлений: личные кабинеты, добавление объявлений, фильтры,
          карта/геопоиск, платные опции размещения, модерация и поиск по сайту.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 180 000 ₽ / проект">
          От 180 000 ₽ / проект
          <meta itemprop="price" content="180000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
      </a>

      <!-- Плагины -->
      <a class="TariffsWithForm_item__H3khh"
         href="https://wpdevstudio.ru/uslugi/razrabotka-plaginov-pod-vashi-zadachi/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Разработка плагинов WordPress — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Разработка плагинов WordPress под задачи бизнеса
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          Кастомные плагины WordPress: новые типы записей, формы, интеграции и автоматизации,
          нестандартная логика, доработка и оптимизация существующих решений.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 25 000 ₽ / задача">
          От 25 000 ₽ / задача
          <meta itemprop="price" content="25000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
      </a>

      <!-- Экспорт / импорт товаров и интеграции -->
      <a class="TariffsWithForm_item__H3khh"
         href="https://wpdevstudio.ru/uslugi/eksport-import-tovarov-i-integraczii/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Импорт товаров WooCommerce и интеграции — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Импорт товаров WooCommerce и интеграции (CRM, API, прайсы)
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          Импорт/экспорт товаров WooCommerce: синхронизация с CRM и маркетплейсами,
          прайс-листами поставщиков, автообновление остатков и цен, интеграции по API.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 15 000 ₽ / задача">
          От 15 000 ₽ / задача
          <meta itemprop="price" content="15000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
      </a>

      <!-- Поддержка и доработки -->
      <a class="TariffsWithForm_item__H3khh"
         href="https://wpdevstudio.ru/services/dorabotka-sajta-na-wordpress-i-woocommerce-pravki-dorabotka-funkczionala/"
         itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer"
         aria-label="Поддержка и доработка сайтов на WordPress — цены и описание">

        <h3 class="TariffsWithForm_itemTitle__bAQLg" itemprop="name">
          Поддержка и доработка сайтов на WordPress
        </h3>

        <p class="TariffsWithForm_itemText__caT4q" itemprop="description">
          Регулярные правки и развитие: обновления, ускорение, исправление ошибок,
          улучшение функционала и стабильности WordPress-сайта по плану работ.
        </p>

        <h3 class="TariffsWithForm_itemPrice__9tmRc" title="От 10 000 ₽">
          От 10 000 ₽ / задача
          <meta itemprop="price" content="10000" />
          <meta itemprop="priceCurrency" content="RUB" />
        </h3>
      </a>
    </div>

    <!-- Форма заявки -->
    <div class="TariffsWithForm_formWrapper__5qdfc" aria-label="Форма заявки на расчет стоимости">
      <strong class="TariffsWithForm_formTitle__rWWca">
        Рассчитаем стоимость за 1 день
      </strong>
      <p class="TariffsWithForm_formSubtitle__dJAkn">
        Оставьте телефон или Telegram — вернёмся с вопросами, сроками и вилкой бюджета без длинного брифа.
      </p>

      <aside class="sticky-form" aria-label="Контактная форма">
        <?php echo do_shortcode('[smart_contact_form]'); ?>
      </aside>
    </div>
  </div>
</section>

	
	
	
	
	
	
			
			
			
			
			
			
			
			
			
<section id="high-expertise" class="componentWrapper ds-fit">
  <div class="container">
    <div class="ds-fit__head">
      <h2 class="pageTitle">Для кого подходим</h2>
      <p class="ds-fit__subtitle">
        Работаем с проектами, где нужен не просто шаблонный сайт, а продуманное решение на WordPress и WooCommerce с возможностью развития.
      </p>
    </div>

    <div class="ds-fit__grid">

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M12 3L4 7V11C4 16 7.5 20.5 12 21C16.5 20.5 20 16 20 11V7L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9.5 12L11.2 13.7L14.8 10.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Малому и среднему бизнесу</span>
        <span class="ds-fit__text">Для компаний, которым нужен надёжный сайт под реальные задачи: заявки, продажи, каталог, презентация услуг.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M6 7V17C6 18.1 6.9 19 8 19H16C17.1 19 18 18.1 18 17V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 11H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M10 3H14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Интернет-магазинам на WooCommerce</span>
        <span class="ds-fit__text">Для магазинов, где важны карточки товаров, корзина, оформление заказа, оплата, доставка и удобная админка.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M8 10C9.65685 10 11 8.65685 11 7C11 5.34315 9.65685 4 8 4C6.34315 4 5 5.34315 5 7C5 8.65685 6.34315 10 8 10Z" stroke="currentColor" stroke-width="1.8"/>
            <path d="M16.5 11C18.433 11 20 9.433 20 7.5C20 5.567 18.433 4 16.5 4C14.567 4 13 5.567 13 7.5C13 9.433 14.567 11 16.5 11Z" stroke="currentColor" stroke-width="1.8"/>
            <path d="M3.5 19C3.5 16.7909 5.29086 15 7.5 15H8.5C10.7091 15 12.5 16.7909 12.5 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M13 19C13 17.067 14.567 15.5 16.5 15.5H17C18.933 15.5 20.5 17.067 20.5 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Агентствам и партнёрам на аутсорсе</span>
        <span class="ds-fit__text">Для студий, маркетологов и подрядчиков, которым нужен технический исполнитель под WordPress-задачи без лишней бюрократии.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M8 8H6C4.89543 8 4 8.89543 4 10V18C4 19.1046 4.89543 20 6 20H14C15.1046 20 16 19.1046 16 18V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14 4H20V10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M20 4L10 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Проектам с нестандартной бизнес-логикой</span>
        <span class="ds-fit__text">Когда типового шаблона недостаточно и нужны калькуляторы, сложные формы, кастомные сценарии и нестандартный функционал.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M12 5V12L16 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>
          </svg>
        </span>
        <span class="ds-fit__title">Сайтам, которые нужно развивать</span>
        <span class="ds-fit__text">Для проектов, где важно не просто запустить сайт, а иметь основу для дальнейших улучшений, SEO и новых функций.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M4 19V9.5L12 4L20 9.5V19" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
            <path d="M9 19V13H15V19" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Тем, кому нужен сайт с нуля</span>
        <span class="ds-fit__text">Если нужен запуск проекта под ключ: структура, дизайн, сборка, базовая настройка, формы, контентные блоки и запуск.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M7 7H17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M7 12H13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M7 17H11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <rect x="4" y="4" width="16" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/>
          </svg>
        </span>
        <span class="ds-fit__title">Тем, кому нужны доработки WordPress-сайта</span>
        <span class="ds-fit__text">Когда проект уже есть, но требуется исправить ошибки, добавить блоки, улучшить интерфейс или доработать логику.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <rect x="4" y="5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
            <rect x="14" y="5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
            <rect x="9" y="13" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
            <path d="M10 8H14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M17 11V13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M7 11V13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Проектам, где нужны плагины и интеграции</span>
        <span class="ds-fit__text">Для задач, где требуется автоматизация, API, импорт, экспорт, синхронизация с CRM и кастомные модули.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M5 16L9 12L12 15L19 8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19 12V8H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 20H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Компаниям, которым важны скорость и структура</span>
        <span class="ds-fit__text">Подходит тем, кто хочет не хаотичный сайт, а понятную архитектуру, чистую сборку и основу для масштабирования.</span>
      </a>

      <a class="ds-fit__card" href="/contacts/">
        <span class="ds-fit__icon">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M12 3L19 7V12C19 16.5 16 20 12 21C8 20 5 16.5 5 12V7L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
            <path d="M9 12L11 14L15.5 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <span class="ds-fit__title">Бизнесу, которому нужен технический партнёр</span>
        <span class="ds-fit__text">Если нужен не просто исполнитель на один раз, а человек, который понимает WordPress, WooCommerce и развитие проекта в целом.</span>
      </a>

    </div>

    <div class="ds-fit__actions">
      <a href="/contacts/" class="ds-fit__btn ds-fit__btn--primary">Обсудить проект</a>
      <a href="https://wpdevstudio.ru/#what-will-you-get" class="ds-fit__btn ds-fit__btn--secondary">Посмотреть кейсы</a>
    </div>
  </div>
</section>

<style>

.ds-fit__head {
  max-width: 860px;
}

.ds-fit__subtitle {
  max-width: 760px;
  font-size: 18px;
  line-height: 1.7;
  color: #6b7280;
}

.ds-fit__grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 22px;
}

.ds-fit__card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-height: 220px;
  padding: 28px;
  border-radius: 26px;
  background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
  border: 1px solid rgba(17, 24, 39, 0.08);
  box-shadow: 0 18px 50px rgba(15, 23, 42, 0.07);
  text-decoration: none;
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  overflow: hidden;
}

.ds-fit__card:hover {
  transform: translateY(-4px);
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
  border-color: rgba(17, 24, 39, 0.14);
}

.ds-fit__icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 58px;
  height: 58px;
  margin-bottom: 18px;
  border-radius: 18px;
  background: #111827;
  color: #ffffff;
  box-shadow: 0 12px 24px rgba(17, 24, 39, 0.18);
}

.ds-fit__icon svg {
  width: 26px;
  height: 26px;
}

.ds-fit__title {
  display: block;
  margin-bottom: 12px;
  font-size: 22px;
  line-height: 1.35;
  font-weight: 700;
  color: #111827;
}

.ds-fit__text {
  display: block;
  font-size: 16px;
  line-height: 1.7;
  color: #4b5563;
}

.ds-fit__actions {
  display: flex;
  justify-content: center;
  gap: 16px;
  margin-top: 34px;
  flex-wrap: wrap;
}

.ds-fit__btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 54px;
  padding: 0 26px;
  border-radius: 999px;
  font-size: 16px;
  font-weight: 600;
  text-decoration: none;
  transition: all .25s ease;
}

.ds-fit__btn--primary {
  background: #111827;
  color: #fff;
}

.ds-fit__btn--primary:hover {
  background: #000;
  color: #fff;
}

.ds-fit__btn--secondary {
  background: #f3f4f6;
  color: #111827;
}

.ds-fit__btn--secondary:hover {
  background: #e5e7eb;
  color: #111827;
}

@media (max-width: 991px) {
  .ds-fit {
    padding: 0;
  }

  .ds-fit__grid {
    grid-template-columns: 1fr;
  }

  .ds-fit__card {
    min-height: auto;
  }
}

@media (max-width: 767px) {
  .ds-fit {
    padding: 0;
  }

  .ds-fit__subtitle {
    font-size: 16px;
    margin-top: 12px;
  }

  .ds-fit__grid {
    gap: 16px;
  }

  .ds-fit__card {
    padding: 22px;
    border-radius: 20px;
  }

  .ds-fit__icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    margin-bottom: 16px;
  }

  .ds-fit__icon svg {
    width: 24px;
    height: 24px;
  }

  .ds-fit__title {
    font-size: 19px;
    margin-bottom: 10px;
  }

  .ds-fit__text {
    font-size: 15px;
  }

  .ds-fit__actions {
    margin-top: 24px;
    gap: 12px;
  }

  .ds-fit__btn {
    width: 100%;
  }
}
</style>

			
			
			
			
			
	
	
	
	
	
<!-- Преимущества	 -->
			
<section class="componentWrapper" id="advantages" aria-labelledby="advantages-title">
  <div class="container">
    <h2 class="pageTitle" id="advantages-title">Преимущества разработки на WordPress</h2>

    <div class="swiper Advantages_slider__AQ8EU" role="region" aria-label="Преимущества работы со мной">
      <ul class="swiper-wrapper">

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Разработка кастомных WordPress-решений</h3>
          <p class="Advantages_itemText__j_dFO">
            Делаю разработку сайтов на WordPress под ключ: индивидуальная вёрстка, интеграции, нестандартные модули
            и гибкая архитектура без перегруженных шаблонов.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Экспертность в WooCommerce</h3>
          <p class="Advantages_itemText__j_dFO">
            Разработка WooCommerce-магазинов любой сложности: вариативные товары, фильтры, импорт/экспорт,
            автоматизация заказов, интеграции с CRM, оплатами и доставкой.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Скорость загрузки и Core Web Vitals</h3>
          <p class="Advantages_itemText__j_dFO">
            Оптимизация скорости: чистый код, кэширование, сжатие медиа, серверные настройки.
            Помогаю улучшать показатели PageSpeed и Core Web Vitals.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Автоматизация и интеграции</h3>
          <p class="Advantages_itemText__j_dFO">
            Интегрирую API и настраиваю синхронизации: авто-обновление товаров, связки с CRM, каталогами и сервисами.
            Экономим десятки часов ручной работы.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Доработка и поддержка WordPress-сайтов</h3>
          <p class="Advantages_itemText__j_dFO">
            Беру проекты на развитие: исправление ошибок, обновления, безопасность, ускорение,
            улучшение функционала и повышение конверсии.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Прозрачный процесс и результат</h3>
          <p class="Advantages_itemText__j_dFO">
            Фиксируем этапы и задачи, показываю промежуточные версии, работаю по понятному плану.
            Цель — быстрый и удобный сайт, который помогает бизнесу зарабатывать.
          </p>
        </li>

        <li class="swiper-slide Advantages_item__VhoO7">
          <h3 class="Advantages_itemTitle__t6t_m">Инфраструктура и безопасность</h3>
          <p class="Advantages_itemText__j_dFO">
            Подбираю хостинг, переношу сайты, настраиваю резервные копии, защиту от взломов и CDN при необходимости.
          </p>
        </li>

      </ul>

      <div class="Advantages_bottom__wOSv0">
        <p class="Advantages_bottomText___PjsE">
          Готов обсудить задачу и предложить решение под ваш бизнес. Нажмите «Получить предложение» — рассчитаю сроки и стоимость.
        </p>
        <a href="#bottom-form" class="btnRed Advantages_bottomBtn__bveke">Получить предложение</a>
      </div>
    </div>
  </div>
</section>

			
<style>
	/* =========================
   ADVANTAGES — HORIZONTAL SCROLL (MOBILE)
   ========================= */

@media (max-width: 820px){

  /* делаем горизонтальный скролл даже без Swiper */
  #advantages .swiper{
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
  }

  #advantages .swiper::-webkit-scrollbar{
    display: none;
  }

  #advantages .swiper-wrapper{
    display: flex;
    flex-wrap: nowrap;
    gap: 12px;

    width: max-content;
    padding-bottom: 8px;
  }

  /* карточка = горизонтальный айтем */
  #advantages .swiper-slide{
    flex: 0 0 auto;
    width: 85vw;        /* 1 карточка почти на весь экран */
    max-width: 420px;
  }

  /* внешний вид карточек */
  #advantages .Advantages_item__VhoO7,
  #advantages .Advantages_bottomSlide__2iLaR{
    height: 190px;
    padding: 16px;
    border-radius: 16px;
  }

  /* прячем desktop-bottom */
  #advantages .Advantages_bottom__wOSv0{
    display: none !important;
  }
}

</style>
			
					

			
	


<?php
$home_vk_videos = [];

if (function_exists('have_rows') && have_rows('home_youtube_videos')) {
  while (have_rows('home_youtube_videos')) {
    the_row();

    $video_url = trim((string) get_sub_field('url'));
    $embed_url = function_exists('wpds_vk_video_embed_url') ? wpds_vk_video_embed_url($video_url) : '';

    if (!$embed_url) {
      continue;
    }

    $home_vk_videos[] = [
      'title' => trim((string) get_sub_field('title')),
      'embed' => $embed_url,
    ];
  }
}
?>

<?php if (!empty($home_vk_videos)) : ?>
<section class="home-video-slider" aria-labelledby="home-video-slider-title">
  <div class="container">
    <div class="home-video-slider__header">
      <span class="home-video-slider__eyebrow">Видео</span>
      <h2 class="home-video-slider__title" id="home-video-slider-title">Посмотрите проекты и разборы в формате видео</h2>
      <p class="home-video-slider__subtitle">Добавляйте ролики через ACF — блок автоматически соберёт их в удобный VK-слайдер на главной странице.</p>
    </div>

    <div class="swiper home-video-slider__swiper" data-home-video-slider>
      <div class="swiper-wrapper">
        <?php foreach ($home_vk_videos as $index => $video) : ?>
          <article class="swiper-slide home-video-slider__slide">
            <div class="home-video-slider__frame">
              <iframe
                src="<?php echo esc_url($video['embed']); ?>"
                title="<?php echo esc_attr($video['title'] ?: 'VK видео ' . ($index + 1)); ?>"
                loading="lazy"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>

            <?php if ($video['title']) : ?>
              <h3 class="home-video-slider__video-title"><?php echo esc_html($video['title']); ?></h3>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="home-video-slider__controls">
        <button class="home-video-slider__button home-video-slider__button--prev" type="button" aria-label="Предыдущее видео">‹</button>
        <div class="home-video-slider__pagination" aria-hidden="true"></div>
        <button class="home-video-slider__button home-video-slider__button--next" type="button" aria-label="Следующее видео">›</button>
      </div>
    </div>
  </div>
</section>

<style>
.home-video-slider {
  padding: 82px 0;
  background: #fff;
}

.home-video-slider__header {
  max-width: 820px;
  margin-bottom: 34px;
}

.home-video-slider__eyebrow {
  display: inline-flex;
  margin-bottom: 12px;
  padding: 7px 14px;
  border-radius: 999px;
  background: #111827;
  color: #fff;
  font-size: 13px;
  line-height: 1.2;
  letter-spacing: .08em;
  text-transform: uppercase;
}

.home-video-slider__title {
  margin: 0;
  color: #111827;
  font-size: clamp(32px, 4vw, 56px);
  line-height: 1.05;
  letter-spacing: -.04em;
}

.home-video-slider__subtitle {
  max-width: 720px;
  margin: 18px 0 0;
  color: #4b5563;
  font-size: 18px;
  line-height: 1.65;
}

.home-video-slider__swiper {
  overflow: visible;
}

.home-video-slider__slide {
  height: auto;
}

.home-video-slider__frame {
  position: relative;
  overflow: hidden;
  aspect-ratio: 16 / 9;
  border-radius: 30px;
  background: #0f172a;
  box-shadow: 0 24px 70px rgba(15, 23, 42, .16);
}

.home-video-slider__frame iframe {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.home-video-slider__video-title {
  margin: 18px 4px 0;
  color: #111827;
  font-size: 22px;
  line-height: 1.35;
}

.home-video-slider__controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 18px;
  margin-top: 30px;
}

.home-video-slider__button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  border: 1px solid rgba(17, 24, 39, .12);
  border-radius: 16px;
  background: #f3f4f6;
  color: #111827;
  font-size: 32px;
  line-height: 1;
  cursor: pointer;
  transition: .2s ease;
}

.home-video-slider__button:hover {
  background: #111827;
  color: #fff;
}

.home-video-slider__pagination {
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 80px;
}

.home-video-slider__pagination .swiper-pagination-bullet {
  width: 8px;
  height: 8px;
  opacity: 1;
  background: #d1d5db;
}

.home-video-slider__pagination .swiper-pagination-bullet-active {
  width: 22px;
  border-radius: 999px;
  background: #111827;
}

@media (max-width: 767px) {
  .home-video-slider {
    padding: 52px 0;
  }

  .home-video-slider__header {
    margin-bottom: 24px;
  }

  .home-video-slider__subtitle {
    font-size: 16px;
  }

  .home-video-slider__frame {
    border-radius: 22px;
  }

  .home-video-slider__video-title {
    font-size: 19px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('[data-home-video-slider]').forEach(function (slider) {
    if (!window.Swiper) return;

    new Swiper(slider, {
      slidesPerView: 1,
      spaceBetween: 18,
      loop: slider.querySelectorAll('.swiper-slide').length > 1,
      navigation: {
        nextEl: slider.querySelector('.home-video-slider__button--next'),
        prevEl: slider.querySelector('.home-video-slider__button--prev')
      },
      pagination: {
        el: slider.querySelector('.home-video-slider__pagination'),
        clickable: true
      },
      breakpoints: {
        992: {
          slidesPerView: 2,
          spaceBetween: 24
        }
      }
    });
  });
});
</script>
<?php endif; ?>

<section class="ContactForm_wrapper__a_8VU" id="form">
    <div class="container">
        <div class="ContactForm ContactForm_wrapper__hzvrb ContactForm_form___823x ContactForm_dark__qvyR0">
            <div class="ContactForm__title ContactForm_title__PcRmf">Хотите успешный кейс по&nbsp;своему проекту?</div>
            <div class="ContactForm__subtitle ContactForm_subtitle__ci0oX">Закажите бесплатную консультацию, и&nbsp;мы&nbsp;ответим на все ваши вопросы</div>

            <form class="ContactForm__form ContactForm_form__ZgtPw"
                  method="post"
                  action="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>"
                  data-wpds-form="contact">

                <!-- ВАЖНО: поля для WordPress AJAX -->
                <input type="hidden" name="action" value="wpds_contact_submit">
                <input type="hidden" name="_wpds_nonce" value="<?php echo esc_attr( wp_create_nonce('wpds_contact_submit') ); ?>">

                <!-- Honeypot (скрыто от людей) -->
                <input type="text" name="company" value="" tabindex="-1" autocomplete="off"
                       style="position:absolute; left:-9999px; opacity:0; height:0; width:0;">

                <fieldset class="ContactForm__fields row ContactForm_fields__BgVRS">
                    <div class="col-12 col-sm-6">
                        <div class="field field--masked ContactForm__field ContactForm_field__f3xBQ">
                            <div class="fieldInput fieldInput--v2 fieldInput--dark">
                                <input autocomplete="tel-country-code" inputmode="tel" name="phone" placeholder="Номер телефона*" type="text" value="" />
                                <label class="fieldPlaceholder">Номер телефона*</label>
                                <fieldset aria-hidden="true" class="fieldOutline">
                                    <legend><span>Номер телефона*</span></legend>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="field ContactForm__field ContactForm_field__f3xBQ">
                            <div class="fieldInput fieldInput--v2 fieldInput--dark">
                                <input autocomplete="url" inputmode="url" name="website" placeholder="Адрес сайта" type="text" value="" />
                                <label class="fieldPlaceholder">Адрес сайта</label>
                                <fieldset aria-hidden="true" class="fieldOutline">
                                    <legend><span>Адрес сайта</span></legend>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="ContactForm__footer ContactForm_footer__LZ47q">
                    <button class="ContactForm__btn btnRed ContactForm_btn__dh5HG" type="submit">Оставить заявку</button>
                </div>

                <!-- Блок статуса (не ломает верстку, нужен для сообщений) -->
                <div class="ContactForm__status" aria-live="polite"></div>

                <div class="ContactForm__privacy ContactForm_privacy__LyZ4y"><span>
                        <!--noindex-->
                        <!--googleoff: all--></span><label class="Agree_label__Ra_Cy Agree_labelDark__FAnOd"><input name="agree" required="" type="checkbox" value="1" />
                        <div class="Agree_checkbox__a6Zei"></div>
                        <div>Я даю согласие на обработку моих персональных данных в порядке и на условиях, указанных в
                            <!-- --> <a href="/personal-agree" rel="nofollow" target="_blank" title="Согласие на обработку персональных данных">Согласие на обработку персональных данных</a> <!-- -->и подтверждаю ознакомление с
                            <!-- --> <a href="/privacy" rel="nofollow" target="_blank" title="Политики конфиденциальности">Политика конфиденциальности</a>,
                            <!-- --> <a href="/personal-policy" rel="nofollow" target="_blank" title="Политика обработки персональных данных">Политика обработки персональных данных</a> <!-- -->и
                            <!-- --> <a href="/user-agree" rel="nofollow" target="_blank" title="Пользовательским соглашением">Пользовательским соглашением</a></div>
                    </label><span>
                        <!--googleon: all-->
                        <!--/noindex--></span></div>
            </form>
        </div>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js?render=6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP"></script>			
			
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form[data-wpds-form="contact"]');
  if (!form) return;

  const SITE_KEY = '6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP';
  const RECAPTCHA_ACTION = 'wpds_contact_form';

  const statusEl  = form.querySelector('.ContactForm__status');
  const submitBtn = form.querySelector('button[type="submit"]');

  function setStatus(text, ok) {
    if (!statusEl) return;
    statusEl.textContent = text || '';
    statusEl.style.marginTop = '12px';
    statusEl.style.fontSize = '14px';
    statusEl.style.lineHeight = '1.4';
    statusEl.style.color = ok ? '#16a34a' : '#ef4444';
  }

  function setLoading(isLoading) {
    if (!submitBtn) return;
    if (isLoading) {
      submitBtn.dataset.prevText = submitBtn.textContent || '';
      submitBtn.disabled = true;
      submitBtn.textContent = 'Отправка...';
    } else {
      submitBtn.disabled = false;
      submitBtn.textContent = submitBtn.dataset.prevText || 'Оставить заявку';
      delete submitBtn.dataset.prevText;
    }
  }

  async function getRecaptchaToken() {
    if (!window.grecaptcha || !grecaptcha.ready) {
      throw new Error('reCAPTCHA не загрузилась (скрипт заблокирован или не подключён).');
    }

    return await new Promise(function (resolve, reject) {
      grecaptcha.ready(function () {
        grecaptcha.execute(SITE_KEY, { action: RECAPTCHA_ACTION })
          .then(resolve)
          .catch(function () {
            reject(new Error('Не удалось получить токен reCAPTCHA.'));
          });
      });
    });
  }

  form.addEventListener('submit', async function (e) {
    // Если fetch/FormData нет — пусть отработает обычная отправка (fallback)
    if (!window.fetch || !window.FormData) return;

    e.preventDefault();
    setStatus('', true);

    // Короткая проверка
    const phone = form.querySelector('input[name="phone"]');
    const agree = form.querySelector('input[name="agree"]');

    if (!phone || !phone.value.trim()) {
      setStatus('Введите номер телефона.', false);
      return;
    }
    if (!agree || !agree.checked) {
      setStatus('Подтвердите согласие на обработку персональных данных.', false);
      return;
    }

    setLoading(true);

    try {
      // 1) получаем токен reCAPTCHA v3
      const token = await getRecaptchaToken();

      // 2) собираем formData + добавляем токен
      const formData = new FormData(form);
      formData.set('g-recaptcha-response', token);

      // на всякий случай гарантируем action (иногда его перетирают)
      if (!formData.get('action')) {
        formData.set('action', 'wpds_contact_submit');
      }

      // 3) отправляем
      const resp = await fetch(form.getAttribute('action'), {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });

      let json = null;
      try { json = await resp.json(); } catch (_) {}

      if (json && json.success) {
        setStatus((json.data && json.data.message) ? json.data.message : 'Заявка отправлена!', true);
        form.reset();
      } else {
        const msg = (json && json.data && json.data.message)
          ? json.data.message
          : 'Ошибка отправки. Попробуйте ещё раз.';
        setStatus(msg, false);
      }
    } catch (err) {
      setStatus((err && err.message) ? err.message : 'Сетевая ошибка. Попробуйте ещё раз.', false);
    } finally {
      setLoading(false);
    }
  });
});
</script>


			
			
	<!-- Кейсы		 -->
<?php echo do_shortcode( '[cases_grid per_page=3 more_label="Смотреть все кейсы" more_url="/cases/"]' ); ?>

           <section class="Blocks__wrapper componentWrapper" id="plugins">
    <div class="container">
        <div class="Blocks">
			<h2 class="pageTitle Blocks__title">Наши плагины</h2>
            <?php echo do_shortcode( '[ds_product_cards limit="10" columns="3" mode="carousel"]' ); ?>
        </div>
    </div>
</section>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
           <section class="Blocks__wrapper componentWrapper" id="blocks">
    <div class="container">
        <div class="Blocks">
           
                <h2 class="pageTitle Blocks__title">Этапы сотрудничества</h2>
 
            <ul class="Blocks__items Blocks_items__L5mNt Blocks_columns-3__zJqWP Blocks_number__ydNYW">
                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">Заявка</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Оставляете заявку на сайте или пишете в мессенджере — кратко описываете задачу и формат будущего сайта.
                    </div>
                </li>

                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">Созвон и бриф</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Уточняем нишу, цели, нужный функционал, собираем референсы и определяем тип проекта: лендинг, магазин, корпоративный сайт.
                    </div>
                </li>

                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">Структура и оценка</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Предлагаем структуру страниц и ключевые блоки, формируем список работ, считаем сроки и стоимость, согласуем этапы.
                    </div>
                </li>

                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">План работ</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Фиксируем договорённости, сроки и стоимость, формируем поэтапный план работ и оплат. После этого приступаем к проекту.
                    </div>
                </li>

                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">Разработка и запуск</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Верстаем дизайн, собираем сайт на WordPress, настраиваем плагины и WooCommerce (если нужен магазин), тестируем и переносим на хостинг.
                    </div>
                </li>

                <li class="Blocks_item__eQX3i">
                    <h3 class="Blocks_itemTitle__7_OZj">Поддержка и развитие</h3>
                    <div class="Blocks_itemText__OQX0p">
                        Помогаем с первыми правками, дорабатываем функционал, оптимизируем скорость и предлагаем варианты масштабирования проекта.
                    </div>
                </li>
            </ul>
           
        </div>
    </div>
</section>

			
			
			
			
			
<!-- 			FAQ -->
<section class="faq" id="faq" aria-labelledby="faq-title">
  <div class="container">
    <div class="faq__inner">
      <h2 class="faq__title" id="faq-title">Что входит в&nbsp;разработку сайта на&nbsp;WordPress под ключ</h2>

      <div class="faq__list">

        <!-- 1 -->
        <article class="faq__item is-open">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-1"
            aria-controls="faq-panel-1"
            aria-expanded="true"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Предпроектная аналитика и&nbsp;брифинг</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-1"
            role="region"
            aria-labelledby="faq-btn-1"
          >
            <div class="faq__content">
              <ul class="faq__columns faq__columns--2">
                <li>Обсуждение задач проекта и&nbsp;целей бизнеса</li>
                <li>Анализ ниши и&nbsp;основных конкурентов</li>
                <li>Аудит текущего сайта (если он уже есть)</li>
                <li>Определение типа проекта: лендинг, корпоративный сайт, каталог, интернет-магазин</li>
                <li>Формирование требований к функционалу и интеграциям</li>
                <li>Сбор референсов по дизайну и структуре</li>
                <li>Подбор оптимального тарифа хостинга и технических решений</li>
                <li>Определение сроков, этапов и предварительного бюджета</li>
                <li>Определение ключевых точек контроля и формата отчётности</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 2 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-2"
            aria-controls="faq-panel-2"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Структура сайта и&nbsp;прототипирование</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-2"
            role="region"
            aria-labelledby="faq-btn-2"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li>Разработка структуры сайта и карты страниц</li>
                <li>Продумывание логики пользовательских сценариев</li>
                <li>Создание прототипов ключевых страниц (wireframes)</li>
                <li>Определение блоков для главной и внутренних страниц</li>
                <li>Планирование структуры каталога и карточек товаров (для WooCommerce)</li>
                <li>Согласование структуры и прототипов перед дизайном/вёрсткой</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 3 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-3"
            aria-controls="faq-panel-3"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Дизайн, вёрстка и&nbsp;разработка на&nbsp;WordPress</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-3"
            role="region"
            aria-labelledby="faq-btn-3"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns faq__columns--2">
                <li>Разработка уникального дизайна или аккуратная адаптация из макета Figma</li>
                <li>Кросс-браузерная и адаптивная вёрстка под все устройства</li>
                <li>Сборка сайта на WordPress с использованием кастомной темы</li>
                <li>Настройка панели управления и удобных блоков для редактирования контента</li>
                <li>Настройка и доработка WooCommerce (если нужен интернет-магазин)</li>
                <li>Реализация нестандартного функционала (фильтры, формы, калькуляторы и т.д.)</li>
                <li>Интеграция с CRM, платёжными системами и службами доставки</li>
                <li>Корректная настройка ЧПУ и структуры URL</li>
                <li>Базовая техническая оптимизация скорости загрузки</li>
                <li>Настройка редиректов и страниц 404</li>
                <li>Внедрение микроразметки (там, где это оправдано)</li>
                <li>Тестирование функционала, форм, корзины и оформления заказа</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 4 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-4"
            aria-controls="faq-panel-4"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Подключение аналитики и&nbsp;сервисов</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-4"
            role="region"
            aria-labelledby="faq-btn-4"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li>Установка и настройка систем веб-аналитики (Яндекс.Метрика, Google Analytics/GA4*)</li>
                <li>Подключение целей и событий: отправка форм, клики по кнопкам, заявки, заказы</li>
                <li>Интеграция с call-трекингом и виджетами обратной связи (по необходимости)</li>
                <li>Подключение пикселей рекламных систем (VK, myTarget и др. при необходимости)</li>
                <li>Настройка базовых отчётов для отслеживания заявок и продаж</li>
                <li>Консультация по интерпретации показателей и аналитике сайта</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 5 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-5"
            aria-controls="faq-panel-5"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Контент и&nbsp;наполнение сайта</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-5"
            role="region"
            aria-labelledby="faq-btn-5"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li>Рекомендации по структуре текстов и акцентам на страницах</li>
                <li>Настройка шаблонов для новостей, кейсов, отзывов, услуг или товаров</li>
                <li>Первичное наполнение ключевых страниц (главная, услуги, контакты и т.д.)</li>
                <li>Загрузка и оптимизация изображений под веб</li>
                <li>Настройка карточек товаров и категорий (для интернет-магазина)</li>
                <li>Оформление контента с учётом удобства чтения и конверсии</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 6 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-6"
            aria-controls="faq-panel-6"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Запуск, поддержка и&nbsp;развитие проекта</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-6"
            role="region"
            aria-labelledby="faq-btn-6"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li class="faq__pill">Входит в&nbsp;основной пакет</li>
                <li>Перенос сайта на боевой хостинг и финальная проверка</li>
                <li>Настройка резервного копирования и базовой безопасности</li>
                <li>Исправление мелких ошибок после запуска</li>

                <li class="faq__pill">За дополнительный бюджет</li>
                <li>Доработка дизайна и функционала по новым задачам</li>
                <li>Развитие интернет-магазина: новые типы товаров, фильтры, интеграции</li>
                <li>Глубокая оптимизация скорости, серверные настройки</li>
                <li>Модернизация структуры сайта под маркетинговые задачи</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 7 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-7"
            aria-controls="faq-panel-7"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Производительность и&nbsp;безопасность</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-7"
            role="region"
            aria-labelledby="faq-btn-7"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li>Оптимизация загрузки страниц и изображений</li>
                <li>Настройка кэширования на уровне WordPress и сервера</li>
                <li>Минификация стилей и скриптов (где это целесообразно)</li>
                <li>Настройка защиты от базовых атак и спама в формах</li>
                <li>Регулярное обновление ядра WordPress, тем и плагинов (при сопровождении)</li>
                <li>Рекомендации по безопасной работе с админкой и доступами</li>
              </ul>
            </div>
          </div>
        </article>

        <!-- 8 -->
        <article class="faq__item">
          <button
            class="faq__header"
            type="button"
            id="faq-btn-8"
            aria-controls="faq-panel-8"
            aria-expanded="false"
          >
            <span class="faq__icon" aria-hidden="true"></span>
            <h3 class="faq__question">Сопровождение и&nbsp;регулярные работы</h3>
          </button>

          <div
            class="faq__body"
            id="faq-panel-8"
            role="region"
            aria-labelledby="faq-btn-8"
            hidden
          >
            <div class="faq__content">
              <ul class="faq__columns">
                <li>Мониторинг доступности сайта</li>
                <li>Плановое обновление WordPress, тем и плагинов</li>
                <li>Проверка корректной работы форм и заявок</li>
                <li>Регулярное создание и проверка резервных копий</li>
                <li>Анализ поведения пользователей по данным аналитики</li>
                <li>Предложения по улучшению конверсии и удобства сайта</li>
                <li>Ежемесячные отчёты о выполненных работах (при абонентском сопровождении)</li>
              </ul>
            </div>
          </div>
        </article>

      </div>
    </div>
  </div>
</section>



			
<style>
	.faq {
    padding: 80px 0;
    background-color: #f7f8fc;
}

.faq__title {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 32px;
}

.faq__list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.faq__item {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 0 24px;
    box-shadow: 0 0 0 1px #f1f2f6;
}

.faq__header {
    width: 100%;
    padding: 20px 0;
    border: 0;
    background: none;
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    text-align: left;
}

.faq__question {
    font-size: 18px;
    font-weight: 600;
    color: #131722;
}

/* плюс/минус */
.faq__icon {
    position: relative;
    width: 16px;
    height: 16px;
}

.faq__icon::before,
.faq__icon::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 12px;
    height: 2px;
    background-color: #c0c3cf;
    transform: translate(-50%, -50%);
    transition: transform 0.25s ease, background-color 0.25s ease;
}

/* вертикальная палка (для плюсика) */
.faq__icon::after {
    transform: translate(-50%, -50%) rotate(90deg);
}

.faq__item.is-open .faq__icon::after {
    /* скрываем вертикальный штрих → получается минус */
    transform: translate(-50%, -50%) rotate(90deg) scaleX(0);
}

.faq__item.is-open .faq__icon::before {
    background-color: #ff4d4f;
}

/* тело аккордеона */
.faq__body {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease;
}

.faq__content {
    padding-bottom: 20px;
    padding-top: 0;
    border-top: 1px solid #f1f2f6;
    margin-top: -4px;
    font-size: 15px;
    color: #4a4f5c;
}

.faq__columns {
    list-style: none;
    padding: 0;
    margin: 16px 0 0;
    display: grid;
    grid-template-columns: 1fr;
    gap: 6px 24px;
}

.faq__columns--2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}

.faq__pill {
    font-weight: 600;
    color: #ff4d4f;
}

/* адаптив */
@media (max-width: 768px) {
    .faq {
        padding: 48px 0;
    }

    .faq__item {
        padding: 0 16px;
    }

    .faq__question {
        font-size: 16px;
    }

    .faq__columns--2 {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const items = Array.from(document.querySelectorAll('.faq__item'));

  const closeItem = (item) => {
    const btn  = item.querySelector('.faq__header');
    const body = item.querySelector('.faq__body');
    if (!btn || !body) return;

    item.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');

    // если тело скрыто — ничего не делаем
    if (body.hasAttribute('hidden')) return;

    // анимация закрытия
    body.style.maxHeight = body.scrollHeight + 'px';
    requestAnimationFrame(() => {
      body.style.maxHeight = '0px';
    });

    const onEnd = (e) => {
      if (e.propertyName !== 'max-height') return;
      body.setAttribute('hidden', '');
      body.removeEventListener('transitionend', onEnd);
    };
    body.addEventListener('transitionend', onEnd);
  };

  const openItem = (item) => {
    const btn  = item.querySelector('.faq__header');
    const body = item.querySelector('.faq__body');
    if (!btn || !body) return;

    item.classList.add('is-open');
    btn.setAttribute('aria-expanded', 'true');

    // показываем, иначе scrollHeight будет 0
    body.removeAttribute('hidden');

    // стартовая высота 0 -> потом нужная (для анимации)
    body.style.maxHeight = '0px';
    requestAnimationFrame(() => {
      body.style.maxHeight = body.scrollHeight + 'px';
    });

    // после открытия можно снять maxHeight, чтобы контент не ломался при ресайзе
    const onEnd = (e) => {
      if (e.propertyName !== 'max-height') return;
      body.style.maxHeight = 'none';
      body.removeEventListener('transitionend', onEnd);
    };
    body.addEventListener('transitionend', onEnd);
  };

  // инициируем состояние из HTML
  items.forEach(item => {
    const btn  = item.querySelector('.faq__header');
    const body = item.querySelector('.faq__body');
    if (!btn || !body) return;

    if (item.classList.contains('is-open')) {
      btn.setAttribute('aria-expanded', 'true');
      body.removeAttribute('hidden');
      body.style.maxHeight = 'none';
    } else {
      btn.setAttribute('aria-expanded', 'false');
      body.setAttribute('hidden', '');
      body.style.maxHeight = '0px';
    }

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      // если нужен “аккордеон” (открыт только один) — закрываем остальные
      items.forEach(other => {
        if (other !== item) closeItem(other);
      });

      if (isOpen) closeItem(item);
      else openItem(item);
    });
  });
});
</script>




				
			
			
			
			
			
<section class="AboutBento2 componentWrapper" id="about-company">
<div class="container">
  <h2 class="AboutBento2__title">О студии WordPress-разработки WP Dev Studio</h2>

  <div class="AboutBento2__grid">

    <!-- 1) About -->
    <article class="AboutBento2__card AboutBento2__card--about">
      <div class="AboutBento2__aboutHead">
        <img
          class="AboutBento2__logo"
          src="/wp-content/uploads/2025/12/logo2-2.png"
          alt="WP Dev Studio — студия WordPress и WooCommerce разработки"
        >
        <a class="AboutBento2__btn" href="/about">Подробнее о студии</a>
      </div>

      <p class="AboutBento2__text">
        <strong>WP Dev Studio</strong> — команда специалистов по
        <strong>разработке сайтов на WordPress</strong> и
        <strong>созданию WooCommerce-магазинов</strong> под задачи бизнеса.
        Мы проектируем архитектуру, разрабатываем кастомные темы и плагины,
        настраиваем интеграции и создаём решения, готовые к росту и масштабированию.
      </p>

      <ul class="AboutBento2__pills" aria-label="Технологии и стек разработки">
        <li class="AboutBento2__pill">WordPress</li>
        <li class="AboutBento2__pill">WooCommerce</li>
        <li class="AboutBento2__pill">ACF</li>
        <li class="AboutBento2__pill">Кастомные плагины</li>
        <li class="AboutBento2__pill">Интеграции API</li>
      </ul>
    </article>

    <!-- 2) Designers -->
    <article class="AboutBento2__card AboutBento2__card--design">
      <h3 class="AboutBento2__h">UX/UI-дизайн с фокусом на конверсию</h3>
      <p class="AboutBento2__p">
        Проектируем UX/UI-дизайн, структуру и интерфейсы для сайтов и интернет-магазинов
        с упором на удобство пользователей и достижение бизнес-целей.
      </p>
      <p class="AboutBento2__p">
        Дизайн разрабатывается в связке с программистами, поэтому все решения
        реализуемы на WordPress без компромиссов по скорости и качеству.
      </p>
    </article>

    <!-- 3) Process -->
    <article class="AboutBento2__card AboutBento2__card--process">
      <h3 class="AboutBento2__h">Прозрачный процесс разработки</h3>
      <p class="AboutBento2__p">
        Работаем поэтапно: брифинг, структура, разработка, тестирование и запуск.
        Используем dev-сервер, трекер задач и показываем промежуточные версии проекта.
      </p>
      <a class="AboutBento2__link" href="/cases">Смотреть кейсы →</a>
    </article>

    <!-- 4) Specialization -->
    <article class="AboutBento2__card AboutBento2__card--spec">
      <h3 class="AboutBento2__h">Узкая специализация на WordPress и WooCommerce</h3>
      <p class="AboutBento2__p">
        Мы не распыляемся на десятки CMS.
        Глубоко знаем ядро WordPress и WooCommerce, разрабатываем нестандартный функционал,
        оптимизируем производительность и безопасность проектов.
      </p>
    </article>

    <!-- 5) Approach -->
    <article class="AboutBento2__card AboutBento2__card--approach">
      <h3 class="AboutBento2__h">Кастомный подход без лишних плагинов</h3>
      <p class="AboutBento2__p">
        Не собираем сайты из сотен готовых решений.
        Продумываем архитектуру, пишем собственный код,
        используем только необходимые плагины и оптимизируем загрузку страниц.
      </p>
    </article>

    <!-- 6) Support -->
    <article class="AboutBento2__card AboutBento2__card--support">
      <h3 class="AboutBento2__h">Поддержка и развитие WordPress-проектов</h3>
      <p class="AboutBento2__p">
        После запуска обеспечиваем техническую поддержку:
        обновления, ускорение, доработки функционала, интеграции и
        долгосрочное сопровождение сайтов и интернет-магазинов.
      </p>
    </article>

  </div>
</div>


  <style>
    /* =========================
       ABOUT BENTO v2 — FIXED AREAS (NO GAPS)
       ========================= */

    .AboutBento2{ padding: 72px 0; background:#fff; }
    .AboutBento2__title{
      margin: 0 0 18px;
      font-size: 34px;
      line-height: 1.1;
      letter-spacing: -0.02em;
      color:#111;
    }

    /* Чёткая раскладка без пустот */
    .AboutBento2__grid{
      display: grid;
      grid-template-columns: repeat(12, minmax(0, 1fr));
      gap: 12px;
      align-items: stretch;

      grid-template-areas:
        "about about about about about about about design design design design design"
        "about about about about about about about process process process process process"
        "spec  spec  spec  spec  approach approach approach approach support support support support";
    }

    .AboutBento2__card{
      border: 1px solid rgba(17,17,17,.10);
      border-radius: 22px;
      background: #fff;
      padding: 18px;
      box-shadow: 0 18px 45px rgba(0,0,0,.06);
      min-width: 0;

      display:flex;
      flex-direction:column;
      gap: 10px;
    }

    .AboutBento2__h{
      margin: 0;
      font-size: 16px;
      line-height: 1.25;
      letter-spacing: -0.01em;
      color:#111;
    }

    .AboutBento2__p{
      margin: 0;
      font-size: 14px;
      line-height: 1.6;
      color: rgba(17,17,17,.72);
    }

    /* Areas */
    .AboutBento2__card--about{ grid-area: about; }
    .AboutBento2__card--design{ grid-area: design; }
    .AboutBento2__card--process{ grid-area: process; }
    .AboutBento2__card--spec{ grid-area: spec; }
    .AboutBento2__card--approach{ grid-area: approach; }
    .AboutBento2__card--support{ grid-area: support; }

    /* About card */
    .AboutBento2__aboutHead{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 14px;
    }

    .AboutBento2__logo{
      width: 200px;
      max-width: 60%;
      height: auto;
      display:block;
    }

    .AboutBento2__btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      padding: 11px 14px;
      border-radius: 14px;
      background:#111;
      color:#fff;
      font-weight: 800;
      font-size: 13px;
      text-decoration:none;
      white-space:nowrap;
      transition: transform .15s ease, box-shadow .2s ease, background .2s ease;
    }
    .AboutBento2__btn:hover{
      background:#000;
      transform: translateY(-1px);
      box-shadow: 0 10px 22px rgba(0,0,0,.16);
    }

    .AboutBento2__text{
      margin: 0;
      font-size: 15px;
      line-height: 1.65;
      color: rgba(17,17,17,.78);
    }

    .AboutBento2__pills{
      display:flex;
      flex-wrap:wrap;
      gap: 8px;
      margin-top: 2px;
    }

    .AboutBento2__pill{
      display:inline-flex;
      align-items:center;
      padding: 7px 10px;
      border-radius: 999px;
      border: 1px solid rgba(17,17,17,.10);
      background: rgba(17,17,17,.03);
      font-size: 13px;
      font-weight: 700;
      color: rgba(17,17,17,.86);
      white-space: nowrap;
    }

    /* Accent card (design) */
    .AboutBento2__card--design{
      background: linear-gradient(180deg, rgba(224,27,36,.08), rgba(224,27,36,.02));
      border-color: rgba(224,27,36,.22);
    }

    /* Dark CTA (process) */
    .AboutBento2__card--process{
      background:#111;
      border-color: rgba(255,255,255,.12);
      box-shadow: 0 22px 60px rgba(0,0,0,.18);
    }
    .AboutBento2__card--process .AboutBento2__h{ color:#fff; }
    .AboutBento2__card--process .AboutBento2__p{ color: rgba(255,255,255,.78); }

    .AboutBento2__link{
      margin-top: 2px;
      display:inline-flex;
      width: fit-content;
      font-weight: 900;
      font-size: 14px;
      color:#fff;
      text-decoration:none;
    }
    .AboutBento2__link:hover{ text-decoration: underline; }

    /* =========================
       Responsive
       ========================= */

    @media (max-width: 1100px){
      .AboutBento2__grid{
        grid-template-areas:
          "about about about about about about about about about about about about"
          "design design design design design design process process process process process process"
          "spec  spec  spec  spec  spec  spec  approach approach approach approach approach approach"
          "support support support support support support support support support support support support";
      }

      .AboutBento2__logo{ max-width: 70%; }
    }

    @media (max-width: 640px){
      .AboutBento2{ padding: 56px 0; }
      .AboutBento2__title{ font-size: 28px; margin-bottom: 14px; }

      .AboutBento2__grid{
        grid-template-columns: 1fr;
        gap: 10px;
        grid-template-areas:
          "about"
          "design"
          "process"
          "spec"
          "approach"
          "support";
      }

      .AboutBento2__card{
        border-radius: 18px;
        padding: 16px;
      }

      .AboutBento2__aboutHead{
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .AboutBento2__logo{
        width: 180px;
        max-width: 85%;
      }

      .AboutBento2__btn{
        width: 100%;
      }

      .AboutBento2__text{ font-size: 14px; }
      .AboutBento2__p{ font-size: 13px; }
    }
	  
	  
	  /* =========================
   ABOUT COMPANY — DARK THEME
   ========================= */

#about-company{
  background: #161d25;
}

/* все карточки */
#about-company .AboutBento2__card{
  background: #161d25;
  border-color: rgba(255,255,255,.10);
  box-shadow: 0 18px 45px rgba(0,0,0,.45);
}

/* заголовок секции */
#about-company .AboutBento2__title{
  color: #fff;
}

/* --- ТЕКСТ (используем ОРИГИНАЛЬНЫЕ КЛАССЫ) --- */
#about-company .AboutBento2__h{
  color: #fff;
}

#about-company .AboutBento2__p,
#about-company .AboutBento2__text{
  color: rgba(255,255,255,.78);
}

/* pills */
#about-company .AboutBento2__pill{
  background: rgba(255,255,255,.06);
  border-color: rgba(255,255,255,.14);
  color: #fff;
}

/* кнопка "Подробнее" */
#about-company .AboutBento2__btn{
  background: #fff;
  color: #161d25;
  border-color: rgba(255,255,255,.35);
}
#about-company .AboutBento2__btn:hover{
  background: #f1f1f1;
}

/* тёмная CTA-карточка (процессы) — чуть выделим */
#about-company .AboutBento2__card--process{
  background: linear-gradient(
    180deg,
    rgba(255,255,255,.06),
    rgba(255,255,255,.02)
  );
  border-color: rgba(255,255,255,.18);
}

/* ссылка в CTA */
#about-company .AboutBento2__link{
  color: #fff;
}
#about-company .AboutBento2__link:hover{
  text-decoration: underline;
}

/* логотип — чтобы не "терялся" */
#about-company .AboutBento2__logo{
  filter: brightness(1.15);
}

/* =========================
   MOBILE — без изменений сетки
   ========================= */
@media (max-width: 640px){
  #about-company .AboutBento2__card{
    box-shadow: 0 14px 36px rgba(0,0,0,.55);
  }
}

  </style>
</section>

	
	
	
	
	
	
	
	
	
<section class="TextReviews__wrapper componentWrapper" id="text-reviews">
  <div class="container">
    <div></div>

    <div class="TextReviews">
      <div class="pageTitle">
        <span>Отзывы</span>
      </div>

      <div class="reviews-slider" id="reviews-slider">
        <div class="reviews-slider__viewport">
          <div class="reviews-slider__track">

            <!-- СЛАЙД 1 -->
            <article class="review-slide">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-olga-k.svg"
                    alt="Ольга К., интернет-магазин косметики"
                    width="48" height="48"
                    loading="eager"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Ольга К., интернет-магазин косметики
                  </strong>
                  <time class="review-slide__date" datetime="2025-11-18">
                    18 ноября 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" role="img" aria-label="Оценка: 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Делали WooCommerce-магазин с нестандартной корзиной и доставкой. Всё сделали аккуратно:
                скорость, адаптив, микро-правки — без «потом». Понравилось, что всегда объясняет варианты
                и предлагает решения, а не просто «так нельзя». Рекомендую.
              </blockquote>
            </article>

            <!-- СЛАЙД 2 -->
            <article class="review-slide">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-anton-s.svg"
                    alt="Антон С., строительная компания"
                    width="48" height="48"
                    loading="lazy"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Антон С., строительная компания
                  </strong>
                  <time class="review-slide__date" datetime="2025-10-29">
                    29 октября 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" role="img" aria-label="Оценка: 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Переносили сайт на WordPress, настраивали формы, интеграцию с почтой и антиспам.
                Плюс подтянули метрики и ускорили загрузку (Core Web Vitals заметно лучше).
                Коммуникация быстрая, задачи закрывались по чек-листу.
              </blockquote>
            </article>

            <!-- СЛАЙД 3 -->
            <article class="review-slide">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-roman-g.svg"
                    alt="Роман Г., маркетинг-агентство"
                    width="48" height="48"
                    loading="lazy"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Роман Г., маркетинг-агентство
                  </strong>
                  <time class="review-slide__date" datetime="2025-09-07">
                    7 сентября 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" role="img" aria-label="Оценка: 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Брали как разработчика на аутстаф под клиентов: правки по теме, ACF-блоки,
                кастомные шаблоны, мелкие интеграции. Делает быстро и без «магии» — код читаемый,
                всё в репозитории, правки аккуратно разбиты. Будем продолжать.
              </blockquote>
            </article>

            <!-- СЛАЙД 4 -->
            <article class="review-slide">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-irina-m.svg"
                    alt="Ирина М., услуги и запись"
                    width="48" height="48"
                    loading="lazy"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Ирина М., услуги и запись
                  </strong>
                  <time class="review-slide__date" datetime="2025-06-21">
                    21 июня 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" role="img" aria-label="Оценка: 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Нужен был лендинг под рекламу + квиз и отправка заявок без перезагрузки.
                Сделал быстро, красиво и главное — удобно редактировать. После запуска поправили
                пару деталей по аналитике и событиям. Очень комфортно работать.
              </blockquote>
            </article>

            <!-- ДУБЛИ ДЛЯ ПРОКРУТКИ -->
            <article class="review-slide" aria-hidden="true" data-clone="true">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-olga-k.svg"
                    alt=""
                    width="48" height="48"
                    loading="lazy"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Ольга К., интернет-магазин косметики
                  </strong>
                  <time class="review-slide__date" datetime="2025-11-18">
                    18 ноября 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" aria-label="Оценка 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Делали WooCommerce-магазин с нестандартной корзиной и доставкой. Всё сделали аккуратно:
                скорость, адаптив, микро-правки — без «потом». Рекомендую.
              </blockquote>
            </article>

            <article class="review-slide" aria-hidden="true" data-clone="true">
              <header class="review-slide__header">
                <div class="review-slide__avatar">
                  <img
                    src="/wp-content/uploads/2025/12/vp-anton-s.svg"
                    alt=""
                    width="48" height="48"
                    loading="lazy"
                    decoding="async"
                  >
                </div>

                <div class="review-slide__person">
                  <strong class="review-slide__name">
                    Антон С., строительная компания
                  </strong>
                  <time class="review-slide__date" datetime="2025-10-29">
                    29 октября 2025
                  </time>
                </div>
              </header>

              <div class="review-slide__rating" aria-label="Оценка 5 из 5">
                <span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span><span class="review-slide__star" aria-hidden="true">★</span>
              </div>

              <blockquote class="review-slide__text">
                Переносили сайт на WordPress, настраивали формы и ускоряли загрузку.
                Коммуникация быстрая, задачи закрывались по чек-листу.
              </blockquote>
            </article>

          </div>
        </div>

        <div class="reviews-slider__dots" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>






						
<style>
/* Слайдер */
.reviews-slider {
  position: relative;
}

.reviews-slider__viewport {
  overflow: hidden;
  border-radius: 20px;
  background: transparent;
}

.reviews-slider__track {
  display: flex;
  gap: 15px;
  transition: transform 0.5s ease;
  will-change: transform;
}

/* Один слайд = карточка отзыва */
.review-slide {
  flex: 0 0 100%; /* будет переопределяться JS в зависимости от кол-ва на экран */
  padding: 24px 24px 22px;
  background: #ffffff;
  box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
  box-sizing: border-box;
}

.review-slide__header {
  display: flex;
  align-items: center;
  margin-bottom: 12px;
}

.review-slide__avatar {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  overflow: hidden;
  flex: 0 0 52px;
  margin-right: 12px;
  background: #e5e7eb;
}

.review-slide__avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.review-slide__person {
  display: flex;
  flex-direction: column;
  gap: 3px;
}

.review-slide__name {
  font-size: 16px;
  line-height: 1.3;
  color: #111827;
}

.review-slide__date {
  font-size: 13px;
  line-height: 1.3;
  color: #9ca3af;
}

.review-slide__rating {
  display: inline-flex;
  align-items: center;
  gap: 2px;
  margin-bottom: 10px;
}

.review-slide__star {
  font-size: 15px;
  line-height: 1;
  color: #f59e0b;
}

.review-slide__text {
  margin: 0;
  font-size: 14px;
  line-height: 1.6;
  color: #374151;
}

.review-slide__source {
  display: inline-flex;
  margin-top: 12px;
  font-size: 12px;
  color: #6b7280;
  text-decoration: none;
}

.review-slide__source:hover {
  color: #111827;
  text-decoration: underline;
}

/* Точки */
.reviews-slider__dots {
  display: flex;
  justify-content: center;
  gap: 6px;
  margin-top: 14px;
}

.reviews-slider__dot {
  width: 8px;
  height: 8px;
  border-radius: 999px;
  background: #fecaca; /* светло-красный фон */
  border: none;
  padding: 0;
  cursor: pointer;
  transition:
    background 0.25s ease,
    width 0.25s ease,
    transform 0.25s ease,
    opacity 0.25s ease;
  opacity: 0.7;
}

.reviews-slider__dot.is-active {
  width: 18px;
  background: #dc2626; /* основной красный */
  transform: scale(1.1);
  opacity: 1;
}

/* Адаптив */
@media (max-width: 768px) {
  .review-slide {
    padding: 18px 16px 16px;
  }

  .reviews-section__title {
    font-size: 24px;
  }
}
	
.review-slide__avatar{
  background: rgba(255,255,255,.35);
  box-shadow: inset 0 0 0 1px rgba(17, 24, 39, 0.06);
}

.review-slide__avatar img{
  transform: translateZ(0);
}


</style>
			
						
<script>
  (function () {
    const slider = document.getElementById('reviews-slider');
    if (!slider) return;

    const track = slider.querySelector('.reviews-slider__track');
    const viewport = slider.querySelector('.reviews-slider__viewport');
    const slides = Array.from(track.children);
    const dotsContainer = slider.querySelector('.reviews-slider__dots');

    if (!slides.length) return;

    let currentIndex = 0;        // индекс "левого" видимого слайда
    const slideCount = slides.length;
    let slidesPerView = 1;       // будет рассчитано
    let pages = 1;               // количество "экранов" (для точек)
    let dots = [];
    let autoplayId = null;

    // Кол-во карточек на экран
    function getSlidesPerView() {
      const w = window.innerWidth;
      if (w >= 1280) return 4; // десктоп
      if (w >= 960)  return 3; // ноутбуки
      if (w >= 640)  return 2; // планшеты
      return 1;                // мобилка
    }

    // Применяем ширину карточек под текущий slidesPerView
    function applySlideWidths() {
      slidesPerView = getSlidesPerView();
      const basis = 100 / slidesPerView;
      slides.forEach(slide => {
        slide.style.flex = '0 0 ' + basis + '%';
      });
      pages = Math.max(1, slideCount - slidesPerView + 1);
    }

    // Строим точки под количество "экранов"
    function buildDots() {
      dotsContainer.innerHTML = '';
      dots = [];

      for (let i = 0; i < pages; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'reviews-slider__dot';
        dot.dataset.index = i;
        dotsContainer.appendChild(dot);
        dots.push(dot);
      }

      dots.forEach(dot => {
        dot.addEventListener('click', function () {
          const index = parseInt(this.dataset.index, 10);
          if (!isNaN(index)) updateSlider(index);
        });
      });
    }

    function getMaxIndex() {
      return Math.max(0, slideCount - slidesPerView);
    }

    function updateSlider(index) {
      const maxIndex = getMaxIndex();

      if (index < 0) index = maxIndex;
      if (index > maxIndex) index = 0;

      currentIndex = index;

      const targetSlide = slides[index];
      const offset = targetSlide ? targetSlide.offsetLeft : 0;

      track.style.transform = 'translateX(' + (-offset) + 'px)';

      // Активная точка = текущий индекс "экрана"
      dots.forEach((dot, i) => {
        dot.classList.toggle('is-active', i === currentIndex);
      });
    }

    // Автопрокрутка (по одному слайду)
    function startAutoplay() {
      stopAutoplay();
      autoplayId = setInterval(() => {
        updateSlider(currentIndex + 1);
      }, 7000);
    }

    function stopAutoplay() {
      if (autoplayId) {
        clearInterval(autoplayId);
        autoplayId = null;
      }
    }

    // Свайпы
    let isDragging = false;
    let startX = 0;
    let currentX = 0;
    let startOffset = 0;

    function pointerDown(clientX) {
      isDragging = true;
      startX = clientX;
      currentX = clientX;
      const slide = slides[currentIndex];
      startOffset = slide ? slide.offsetLeft : 0;
      stopAutoplay();
    }

    function pointerMove(clientX) {
      if (!isDragging) return;
      currentX = clientX;
      const delta = currentX - startX;
      track.style.transform = 'translateX(' + (-(startOffset) + delta) + 'px)';
    }

    function pointerUp() {
      if (!isDragging) return;
      isDragging = false;
      const delta = currentX - startX;

      const threshold = 50; // пикселей
      if (delta > threshold) {
        updateSlider(currentIndex - 1);
      } else if (delta < -threshold) {
        updateSlider(currentIndex + 1);
      } else {
        // вернуться на текущее место
        updateSlider(currentIndex);
      }
      startAutoplay();
    }

    // mouse
    viewport.addEventListener('mousedown', (e) => {
      e.preventDefault();
      pointerDown(e.clientX);
    });

    window.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      pointerMove(e.clientX);
    });

    window.addEventListener('mouseup', () => {
      pointerUp();
    });

    // touch
    viewport.addEventListener('touchstart', (e) => {
      const touch = e.touches[0];
      pointerDown(touch.clientX);
    }, { passive: true });

    viewport.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      const touch = e.touches[0];
      pointerMove(touch.clientX);
    }, { passive: true });

    viewport.addEventListener('touchend', () => {
      pointerUp();
    });

    // Инициализация
    applySlideWidths();
    buildDots();
    updateSlider(0);
    startAutoplay();

    // При ресайзе пересчитываем всё
    window.addEventListener('resize', function () {
      const oldSlidesPerView = slidesPerView;
      applySlideWidths();

      if (slidesPerView !== oldSlidesPerView) {
        buildDots();
      }
      updateSlider(currentIndex);
    });
  })();
</script>


						
						
						
						
						
						
						
                    </div>
                    <div>
                      
                    </div>
                </div>
            </section>
    
	
	
	
	
	
	
	
	
	
	
<section class="Articles componentWrapper" aria-labelledby="blog-title">
  <div class="container Articles__container">

    <h2 class="pageTitle Articles__title" id="blog-title">
      <a href="/blog" target="_blank" rel="noopener">
        <span>Экспертные материалы</span>
        <i class="icon-chevron-right" aria-hidden="true"></i>
      </a>
    </h2>

    <!-- ДОБАВЛЯЕМ SEO-текст (ключевые фразы) -->
    <p class="pageAboveTitle Articles__aboveTitle">
      Практические статьи про <strong>разработку сайтов на WordPress</strong>, <strong>WooCommerce-магазины</strong>,
      <strong>SEO</strong>, <strong>ускорение</strong>, <strong>импорт товаров</strong> и <strong>разработку плагинов</strong>.
    </p>

    <div class="articles-grid" role="list">
      <?php
      $articles = new WP_Query([
        'post_type'              => 'post',
        'posts_per_page'         => 4,
        'post_status'            => 'publish',
        'ignore_sticky_posts'    => true,
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
      ]);

      if ($articles->have_posts()):
        while ($articles->have_posts()): $articles->the_post();

          $post_id   = get_the_ID();
          $permalink = get_permalink($post_id);

          // Просмотры (если есть)
          $views = get_post_meta($post_id, 'views', true);
          $views = ($views !== '' && $views !== null) ? max(0, (int) $views) : null;

          // Thumbnail + alt из медиа
          $thumb_id = get_post_thumbnail_id($post_id);
          $has_thumb = $thumb_id ? true : false;
          $img_alt = $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
          $img_alt = $img_alt ? $img_alt : wp_strip_all_tags(get_the_title($post_id));

          // Дата
          $date_human = get_the_date('d.m.Y', $post_id);
          $date_iso   = get_the_date('c', $post_id);
          ?>

          <article class="article-card" role="listitem"
                   itemscope itemtype="https://schema.org/BlogPosting">
            <meta itemprop="mainEntityOfPage" content="<?php echo esc_url($permalink); ?>">
            <meta itemprop="headline" content="<?php echo esc_attr(wp_strip_all_tags(get_the_title($post_id))); ?>">
            <meta itemprop="dateModified" content="<?php echo esc_attr(get_the_modified_date('c', $post_id)); ?>">

            <a class="article-card__link"
               href="<?php echo esc_url($permalink); ?>"
               rel="bookmark"
               itemprop="url"
               aria-label="<?php echo esc_attr('Читать статью: ' . wp_strip_all_tags(get_the_title($post_id))); ?>">

              <figure class="article-card__image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <?php if ($has_thumb): ?>
                  <?php
                  echo wp_get_attachment_image(
                    $thumb_id,
                    'large',
                    false,
                    [
                      'loading'  => 'lazy',
                      'decoding' => 'async',
                      'alt'      => $img_alt,
                    ]
                  );
                  ?>
                  <meta itemprop="url" content="<?php echo esc_url(wp_get_attachment_image_url($thumb_id, 'large')); ?>">
                <?php else: ?>
                  <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholders/article.jpg'); ?>"
                    alt="<?php echo esc_attr($img_alt); ?>"
                    loading="lazy"
                    decoding="async"
                  >
                <?php endif; ?>
              </figure>

              <h3 class="article-card__title" itemprop="name">
                <?php the_title(); ?>
              </h3>

              <div class="article-card__bottom">
                <div class="article-card__meta">

                  <time class="article-card__date"
                        datetime="<?php echo esc_attr($date_iso); ?>"
                        itemprop="datePublished">
                    <?php echo esc_html($date_human); ?>
                  </time>

                  <?php if ($views !== null): ?>
                    <span class="article-card__views"
                          itemprop="interactionStatistic" itemscope itemtype="https://schema.org/InteractionCounter">
                      <meta itemprop="interactionType" content="https://schema.org/ViewAction">
                      <meta itemprop="userInteractionCount" content="<?php echo esc_attr($views); ?>">

                      <span class="article-card__icon" aria-hidden="true">
                        <!-- глаз -->
                        <svg viewBox="0 0 20 20">
                          <path d="M10 4.167c-4.254 0-7.045 3.754-7.983 5.239-.114.18-.17.27-.202.408a.977.977 0 0 0 0 .373c.032.138.088.228.202.408.938 1.485 3.73 5.239 7.983 5.239 4.255 0 7.046-3.754 7.984-5.24.113-.18.17-.269.202-.407a.976.976 0 0 0 0-.373c-.032-.138-.089-.228-.202-.408C17.046 7.921 14.254 4.167 10 4.167Z"
                                fill="none" stroke="currentColor" stroke-width="1.5"/>
                          <path d="M10 7.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                                fill="currentColor"/>
                        </svg>
                      </span>

                      <?php echo esc_html(number_format_i18n($views)); ?>
                    </span>
                  <?php endif; ?>

                </div>

                <span class="article-card__read">
                  Читать
                  <span class="article-card__icon article-card__icon--arrow" aria-hidden="true">
                    <svg viewBox="0 0 20 20">
                      <path d="m7.5 15 5-5-5-5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                  </span>
                </span>
              </div>

            </a>
          </article>

        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
	  
	  <div class="Cases__more">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="Cases__moreButton">
                        Все статьи                   </a>
                </div>

  </div>
</section>




						
<style>
/* Кнопка "Смотреть все" */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 10px 20px;
  border-radius: 999px;
  font-size: 0.95rem;
  line-height: 1.4;
  border: 1px solid #e3e3e8;
  background-color: #f5f5f8;
  color: #55576a;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}

.btn:hover {
  background-color: #e6e7ef;
  border-color: #d1d2de;
  color: #222333;
}

.btn--ghost {
  background-color: transparent;
}

/* Сетка статей */
.articles-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 24px;
}

/* Карточка статьи */
.article-card {
  height: 100%;
}

.article-card__link {
  display: flex;
  flex-direction: column;
  height: 100%;
  text-decoration: none;
  color: #161616;
  border-radius: 16px;
  background-color: #fafbfc;
  overflow: hidden;
  transition: box-shadow 0.2s ease, transform 0.2s ease, background-color 0.2s ease;
}

.article-card__link:hover {
  box-shadow: 0 14px 30px rgba(15, 23, 42, 0.12);
  transform: translateY(-2px);
  background-color: #ffffff;
}

.article-card__image {
  margin: 0;
  overflow: hidden;
  min-height: 250px;
}

.article-card__image img {
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
}

.article-card__title {
  padding: 16px 16px 0;
  font-size: 1.05rem;
  line-height: 1.4;
  font-weight: 500;
}

.article-card__bottom {
  margin-top: auto;
  padding: 14px 16px 16px;
  border-top: 1px solid #e9eaee;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}

.article-card__meta {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.875rem;
  color: #8b8d9b;
  flex-wrap: wrap;
}

.article-card__date {
  white-space: nowrap;
}

.article-card__views {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
}

.article-card__read {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.9rem;
  color: #161616;
  white-space: nowrap;
}

.article-card__icon {
  width: 18px;
  height: 18px;
  display: inline-flex;
}

.article-card__icon svg {
  width: 100%;
  height: 100%;
}

.article-card__icon--arrow {
  width: 16px;
  height: 16px;
}

/* Адаптив */
@media (max-width: 1199px) {
  .articles-section__title {
    font-size: 1.8rem;
  }

  .articles-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
  }
}

@media (max-width: 767px) {
  .articles-section {
    padding: 32px 0;
  }

  .articles-section__container {
    padding: 0 16px;
  }

  .articles-section__header {
    flex-direction: column;
    align-items: flex-start;
  }

  .articles-section__title {
    font-size: 1.6rem;
  }

  .articles-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }

  .article-card__image {
    max-height: 200px;
  }
}

</style>
						
						
						
						
						
						
						
						
						
						
						
						
                    </div>
                </div>
            </section>

<style>
	/* Отступы между полями */
.ContactForm_fields__BgVRS .col-12,
.ContactForm_fields__BgVRS .col-sm-6 {
    margin-bottom: 18px; /* можно увеличить до 22px, если хочешь больше воздуха */
}



</style>
     
	
	
	
	
	
	




<style id="wpds-conversion-audit-overrides">
/* Conversion audit changes: shorter first screen, clearer decision points and lower page noise. */
.hero__media--static{background:linear-gradient(135deg,rgba(17,24,39,.72),rgba(18,212,87,.22)),url('/upload/iblock/d82/o45ep3y74cg2zpoveibch37dbt09kdbp/first%201.jpg') center/cover no-repeat;}
.hero__microcopy{display:block;margin-top:10px;color:rgba(255,255,255,.82);font-size:14px;line-height:1.4;}
.hero__rotator{display:none!important;}
.TariffsWithForm_item__H3khh{display:flex;flex-direction:column;gap:12px;}
.TariffsWithForm_item__H3khh--featured{border-color:#12D457!important;box-shadow:0 24px 70px rgba(18,212,87,.18)!important;transform:translateY(-4px);}
.TariffsWithForm_result{display:block;color:rgba(255,255,255,.82);font-size:15px;line-height:1.45;}
.TariffsWithForm_cta{display:inline-flex;width:max-content;margin-top:auto;border-radius:999px;background:#12D457;color:#111827;padding:10px 16px;font-weight:700;}
.ds-fit__grid{grid-template-columns:repeat(3,minmax(0,1fr));}
.ds-fit__card:nth-child(n+4){display:none;}
.ds-fit__card:nth-child(1)::after{content:'Рассчитать стоимость';}
.ds-fit__card:nth-child(2)::after{content:'Обсудить аутсорс';}
.ds-fit__card:nth-child(3)::after{content:'Отправить сайт на аудит';}
.ds-fit__card::after{margin-top:auto;color:#12D457;font-weight:700;}
#plugins,#blocks,.articles-section,.home-video-slider{display:none!important;}
.TextReviews__wrapper{order:5;}
@media(max-width:991px){.ds-fit__grid{grid-template-columns:1fr;}.TariffsWithForm_item__H3khh--featured{transform:none;}}
</style>

<?php get_footer(); ?>