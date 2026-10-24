<?php
/**
 * Template Name: Front Page
 * Template Post Type: page
 */
wp_enqueue_style('wpds-home', get_template_directory_uri() . '/assets/css/home.css', [], filemtime(__DIR__ . '/assets/css/home.css'));
get_header();

// Resolve existing published projects; never substitute seed/demo content.
$project_specs = [
    ['redizajn-internet-magazina-gelikon-s-perenosom-s-opencart-na-woocommerce', 'Gelikon', 'Миграция интернет-магазина', 'Перенос магазина с OpenCart на WooCommerce.', ['Миграция OpenCart → WooCommerce', 'Каталог на WooCommerce']],
    ['altertool-internet-magazin-instrumenta-na-woodmart', 'AlterTool', 'Интернет-магазин', 'Магазин инструмента на WooCommerce и WoodMart.', ['WooCommerce', 'Настройка темы WoodMart']],
    ['bestkitchen-sajt-kuhon-na-zakaz', 'BestKitchen', 'Сайт для бизнеса', 'Сайт кухонь на заказ.', ['Представление проекта', 'Страницы сайта']],
];
$projects = [];
foreach ($project_specs as $spec) {
    $project = get_page_by_path($spec[0], OBJECT, 'case');
    if (!$project || $project->post_status !== 'publish') {
        continue;
    }
    $image_id = get_post_thumbnail_id($project->ID);
    $image_url = '';
    if (!$image_id && preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $project->post_content, $image_match)) {
        $image_url = $image_match[1];
    }
    $projects[] = ['post' => $project, 'spec' => $spec, 'image_id' => $image_id, 'image_url' => $image_url];
}
$project_image = static function ($item, $hero = false) {
    $attrs = ['alt' => 'Сайт проекта ' . $item['spec'][1], 'loading' => $hero ? 'eager' : 'lazy', 'decoding' => 'async', 'sizes' => $hero ? '(max-width: 900px) 100vw, 50vw' : '(max-width: 650px) 100vw, 33vw'];
    if ($hero) { $attrs['fetchpriority'] = 'high'; }
    if ($item['image_id']) {
        echo wp_get_attachment_image($item['image_id'], 'large', false, $attrs);
    } elseif ($item['image_url']) {
        ?><img src="<?php echo esc_url($item['image_url']); ?>" alt="<?php echo esc_attr($attrs['alt']); ?>" width="1200" height="800" loading="<?php echo esc_attr($attrs['loading']); ?>" decoding="async"><?php
    }
};
$shop_url = home_url('/services/razrabotka-internet-magazina-na-wordpress-i-woocommerce-pod-vash-biznes/');
$improve_url = home_url('/services/dorabotka-sajta-na-wordpress-i-woocommerce-pravki-dorabotka-funkczionala/');
// Resolve services by their assigned template rather than inventing permalinks.
$service_url = static function ($template) {
    $pages = get_posts(['post_type' => ['page', 'service'], 'post_status' => 'publish', 'posts_per_page' => 1, 'meta_key' => '_wp_page_template', 'meta_value' => $template]);
    return $pages ? get_permalink($pages[0]) : home_url('/services/');
};
$theme_url = $service_url('services/template-service-wordpress-theme-development.php');
$plugin_url = $service_url('services/template-service-wordpress-plugin-development.php');
?>
<main class="wpds-home">
<section class="wh-hero" aria-labelledby="home-title">
  <div class="wh-container wh-hero-grid">
    <div>
      <p class="wh-kicker">Разработка · доработка · поддержка</p>
      <h1 id="home-title">Разработка и доработка сайтов на WordPress и WooCommerce</h1>
      <p class="wh-lead">Создаём сайты и интернет-магазины, развиваем работающие проекты, подключаем интеграции и реализуем нестандартный функционал. Обсуждаете задачу напрямую с разработчиком.</p>
      <div class="wh-actions"><a class="wh-button" href="#form">Обсудить задачу</a><a class="wh-link" href="<?php echo $projects ? '#what-will-you-get' : esc_url(home_url('/cases/')); ?>">Смотреть проекты</a></div>
      <ul class="wh-facts"><li>Прямой контакт с разработчиком</li><li>Поэтапная оплата</li><li>Официальное сотрудничество</li></ul>
    </div>
    <?php if ($projects) : $hero_project = $projects[0]; ?>
    <figure class="wh-featured">
      <a href="<?php echo esc_url(get_permalink($hero_project['post'])); ?>"><?php $project_image($hero_project, true); ?></a>
      <figcaption><strong><?php echo esc_html($hero_project['spec'][1]); ?></strong><span><?php echo esc_html($hero_project['spec'][3]); ?></span></figcaption>
    </figure>
    <?php endif; ?>
  </div>
</section>
<?php if ($projects) : ?>
<section class="wh-section" id="what-will-you-get" aria-labelledby="projects-title">
  <div class="wh-container">
    <p class="wh-kicker">Работы студии</p><h2 id="projects-title">Проекты на WordPress и WooCommerce</h2>
    <p class="wh-intro">Интернет-магазины, сайты для бизнеса и индивидуальные решения под задачи клиентов.</p>
    <?php if ($projects) : ?><div class="wh-projects">
    <?php foreach ($projects as $item) : ?>
      <article class="wh-project">
        <?php if ($item['image_id'] || $item['image_url']) : ?><a class="wh-project-image" href="<?php echo esc_url(get_permalink($item['post'])); ?>"><?php $project_image($item); ?></a><?php endif; ?>
        <div class="wh-project-body"><p class="wh-kicker"><?php echo esc_html($item['spec'][2]); ?></p><h3><?php echo esc_html($item['spec'][1]); ?></h3><p><?php echo esc_html($item['spec'][3]); ?></p>
        <ul><?php foreach ($item['spec'][4] as $work) : ?><li><?php echo esc_html($work); ?></li><?php endforeach; ?></ul>
        <a class="wh-link" href="<?php echo esc_url(get_permalink($item['post'])); ?>">Смотреть кейс <span aria-hidden="true">↗</span></a></div>
      </article>
    <?php endforeach; ?></div><?php endif; ?>
    <a class="wh-button wh-button-secondary" href="<?php echo esc_url(home_url('/cases/')); ?>">Все проекты</a>
  </div>
</section>
<?php endif; ?>
<section class="wh-section wh-soft" aria-labelledby="tasks-title"><div class="wh-container">
  <p class="wh-kicker">От задачи к решению</p><h2 id="tasks-title">С какой задачей можно обратиться</h2>
  <div class="wh-grid wh-grid-three">
    <article class="wh-card"><span class="wh-number">01</span><h3>Нужен новый сайт или магазин</h3><p>Сайт для бизнеса или WooCommerce-магазин: структура, интерфейс, разработка и подготовка к запуску.</p><a class="wh-link" href="<?php echo esc_url($shop_url); ?>">Разработка сайта</a></article>
    <article class="wh-card"><span class="wh-number">02</span><h3>Нужно доработать работающий сайт</h3><p>Новый функционал, исправление ошибок, переработка каталога и оформления заказа, интеграции и автоматизация.</p><a class="wh-link" href="<?php echo esc_url($improve_url); ?>">Доработка сайта</a></article>
    <article class="wh-card"><span class="wh-number">03</span><h3>Нужен разработчик для агентства</h3><p>Разработка по Figma, кастомные темы, ACF-блоки, WooCommerce и технические задачи клиентских проектов.</p><a class="wh-link" href="#form">Обсудить задачи агентства</a></article>
  </div>
</div></section>
<section class="wh-section" id="pricing" aria-labelledby="services-title"><div class="wh-container">
  <p class="wh-kicker">Направления работы</p><h2 id="services-title">Услуги и ориентиры стоимости</h2>
  <div class="wh-grid wh-grid-two">
    <article class="wh-card"><h3>Интернет-магазины WooCommerce</h3><p>Магазин под ваши товары и процессы.</p><ul><li>Каталог и карточки товаров</li><li>Корзина и оформление заказа</li><li>Оплата и доставка</li></ul><p class="wh-price">Индивидуальная оценка</p><a class="wh-link" href="<?php echo esc_url($shop_url); ?>">Подробнее о магазинах</a></article>
    <article class="wh-card"><h3>Сайты для бизнеса</h3><p>Сайт с понятной структурой и удобным управлением.</p><ul><li>Страницы услуг и компании</li><li>Кастомные шаблоны</li><li>Редактируемые блоки</li></ul><p class="wh-price">Индивидуальная оценка</p><a class="wh-link" href="<?php echo esc_url($theme_url); ?>">Разработка на WordPress</a></article>
    <article class="wh-card"><h3>Доработка WordPress и WooCommerce</h3><p>Развитие работающего проекта под новые задачи.</p><ul><li>Исправление ошибок</li><li>Новые сценарии и функции</li><li>Доработка интерфейсов</li></ul><p class="wh-price">Индивидуальная оценка</p><a class="wh-link" href="<?php echo esc_url($improve_url); ?>">Подробнее о доработках</a></article>
    <article class="wh-card"><h3>Плагины, интеграции и автоматизация</h3><p>Логика и обмен данными под процессы бизнеса.</p><ul><li>Кастомные плагины</li><li>Подключение внешних API</li><li>Импорт и синхронизация</li></ul><p class="wh-price">Индивидуальная оценка</p><a class="wh-link" href="<?php echo esc_url($plugin_url); ?>">Обсудить функционал</a></article>
  </div><a class="wh-button wh-button-secondary" href="<?php echo esc_url(home_url('/prices/')); ?>">Полный прайс</a>
</div></section>
<section class="wh-section wh-dark" aria-labelledby="solutions-title"><div class="wh-container">
  <p class="wh-kicker">Нестандартные задачи</p><h2 id="solutions-title">Когда стандартных возможностей сайта недостаточно</h2>
  <div class="wh-grid wh-grid-three">
  <?php foreach ([
    ['Корзина и оформление заказа', 'Убираем лишние шаги и адаптируем поля, оплату и доставку под ваш сценарий.', $improve_url],
    ['Импорт и синхронизация', 'Автоматизируем загрузку товаров, обновление цен и остатков из внешних источников.', $plugin_url],
    ['Логика скидок и заказов', 'Реализуем правила расчёта и обработки заказов, которых нет в стандартных настройках.', $plugin_url],
    ['Личные кабинеты', 'Добавляем пользовательские сценарии и доступ к нужным данным.', $plugin_url],
    ['Редактирование контента', 'Создаём управляемые блоки, чтобы обновлять страницы без правок кода.', $theme_url],
    ['Перенос сайта', 'Переносим проект на WordPress и WooCommerce с учётом структуры и данных.', $shop_url],
  ] as $solution) : ?>
    <article class="wh-solution"><h3><a href="<?php echo esc_url($solution[2]); ?>"><?php echo esc_html($solution[0]); ?></a></h3><p><?php echo esc_html($solution[1]); ?></p></article>
  <?php endforeach; ?>
  </div>
</div></section>
<section class="wh-section" aria-labelledby="developer-title"><div class="wh-container wh-about">
  <div><p class="wh-kicker">Павел · WPDevStudio</p><h2 id="developer-title">Прямое общение с разработчиком</h2><p class="wh-intro">WordPress, WooCommerce, кастомные темы, интеграции и нестандартный функционал.</p></div>
  <div><p>Вы общаетесь напрямую с исполнителем: обсуждаете задачу, варианты решения и результат. При необходимости к проекту подключаются дополнительные специалисты.</p><ul class="wh-checks"><li>Объём, стоимость и этапы согласуются до начала работ.</li><li>Промежуточный результат показывается в процессе.</li><li>После запуска возможно дальнейшее развитие проекта.</li></ul><a class="wh-link" href="<?php echo esc_url(home_url('/about/')); ?>">Подробнее о студии</a></div>
</div></section>
<section class="wh-section wh-soft" aria-labelledby="reviews-title"><div class="wh-container"><p class="wh-kicker">Опыт сотрудничества</p><h2 id="reviews-title">Отзывы клиентов</h2><div class="wh-reviews">
<article class="review-slide">
              <header class="review-slide__header">


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
<article class="review-slide">
              <header class="review-slide__header">


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
<article class="review-slide">
              <header class="review-slide__header">


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
</div></div></section>

<section class="wh-section" aria-labelledby="steps-title"><div class="wh-container"><p class="wh-kicker">Понятный процесс</p><h2 id="steps-title">Как проходит работа</h2><ol class="wh-steps">
<li><h3>Обсуждение задачи</h3><p>Разбираемся в цели проекта и исходных материалах.</p></li><li><h3>Оценка и согласование</h3><p>Определяем объём, стоимость и этапы.</p></li><li><h3>Разработка с промежуточными показами</h3><p>Показываем результат в процессе и обсуждаем детали.</p></li><li><h3>Проверка, запуск и передача проекта</h3><p>Проверяем согласованный функционал и готовим проект к работе.</p></li>
</ol></div></section>
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
        <input type="hidden" name="_wpds_calc_time" value="<?php echo esc_attr(wpds_form_time_token('wpds_home_calculator')); ?>">
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
            <label class="wpds-calc__field wpds-calc__field--wide">
              <span>Расскажите о задаче</span>
              <textarea name="calc_task" minlength="20" maxlength="3000" placeholder="Например: нужен интернет-магазин на WooCommerce, доработка существующего сайта или разработка нового функционала." required></textarea>
            </label>
            <label class="wpds-calc__consent">
              <input type="checkbox" name="calc_agree" value="1" required>
              <span>Я согласен на обработку персональных данных и принимаю <a href="/privacy" target="_blank" rel="noopener">Политику конфиденциальности</a>.</span>
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
  .wpds-calc{background:#fff;padding:72px 0 56px;color:#18181b;font-family:var(--font-golos),sans-serif}
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
  .wpds-calc__contact{display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:end}.wpds-calc__contact>div{grid-column:1/-1}.wpds-calc__contact h3{margin:14px 0 8px;font-size:38px;line-height:1;letter-spacing:-.03em}.wpds-calc__contact p{margin:0;color:rgba(255,255,255,.7);max-width:640px}.wpds-calc__field{display:grid;gap:8px}.wpds-calc__field span{font-size:14px;color:rgba(255,255,255,.72)}.wpds-calc__field--wide,.wpds-calc__consent{grid-column:1/-1}.wpds-calc__field input,.wpds-calc__field textarea{width:100%;box-sizing:border-box;border:1px solid rgba(255,255,255,.16);border-radius:18px;background:rgba(255,255,255,.1);color:#fff;padding:16px;font:inherit;outline:none}.wpds-calc__field textarea{min-height:132px;line-height:1.45;resize:vertical}.wpds-calc__field input::placeholder,.wpds-calc__field textarea::placeholder{color:rgba(255,255,255,.42)}.wpds-calc__field input:focus,.wpds-calc__field textarea:focus{border-color:rgba(255,255,255,.52);background:rgba(255,255,255,.14)}.wpds-calc__consent{display:flex;align-items:flex-start;gap:10px;color:rgba(255,255,255,.72);font-size:13px;line-height:1.45}.wpds-calc__consent input{margin-top:3px}.wpds-calc__consent a{color:#fff;text-underline-offset:3px}
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

<section class="wh-section" aria-labelledby="faq-title"><div class="wh-container wh-faq"><div><p class="wh-kicker">Перед началом</p><h2 id="faq-title">Частые вопросы</h2></div><div>
<?php foreach ([
['Можно ли заказать отдельную доработку?', 'Да. Можно обратиться с отдельной задачей: исправлением ошибки, новым блоком или доработкой функционала.'],
['Работаете ли вы с сайтом после другого разработчика?', 'Да. Сначала изучаем существующий проект и задачу, затем согласуем подход и объём работ.'],
['Нужен ли готовый дизайн или техническое задание?', 'Можно прийти с макетом, техническим заданием или описанием идеи. Состав необходимых материалов обсудим перед началом.'],
['Как определяется стоимость?', 'Стоимость зависит от состава работ, сложности логики и интеграций. Итоговую оценку согласуем после обсуждения задачи.'],
['Можно ли разделить проект на этапы?', 'Да. Состав и оплату этапов согласуем до начала работ.'],
['Что происходит после запуска?', 'Возможно дальнейшее развитие проекта. Состав новых задач и условия сопровождения обсуждаются отдельно.'],
] as $faq) : ?><details><summary><?php echo esc_html($faq[0]); ?></summary><p><?php echo esc_html($faq[1]); ?></p></details><?php endforeach; ?>
</div></div></section>
<section class="wh-section wh-contact" id="form" aria-labelledby="contact-title"><div class="wh-container wh-contact-grid">
<div><p class="wh-kicker">Следующий шаг</p><h2 id="contact-title">Обсудим вашу задачу</h2><p class="wh-intro">Пришлите ссылку на сайт, макет или короткое описание. Уточним детали и предложим следующий шаг.</p><div class="wh-contact-links"><a href="https://t.me/+79250404189">Написать в Telegram</a><a href="mailto:info@wpdevstudio.ru">info@wpdevstudio.ru</a></div></div>
<div class="wh-contact-form"><?php echo do_shortcode('[smart_contact_form]'); ?></div>
</div></section>
</main>
<?php get_footer(); ?>
