<?php
/*
Template Name: Услуга — Доработка сайта
Template Post Type: service
*/
defined('ABSPATH') || exit;
wp_enqueue_style('wpds-site-improvement', get_template_directory_uri() . '/assets/css/site-improvement.css', [], filemtime(dirname(__DIR__) . '/assets/css/site-improvement.css'));
get_header();

$card_article_slug = 'kastomnaya-kartochka-tovara-woocommerce-kak-sozdavalas-stranicza-tovara-dlya-internet-magazina-gelikon';
$card_article = get_page_by_path($card_article_slug, OBJECT, 'post');
if (!$card_article || $card_article->post_status !== 'publish') { $card_article = null; }
$example_details = [
    'redizajn-internet-magazina-gelikon-s-perenosom-s-opencart-na-woocommerce' => [
        'name' => 'Gelikon', 'title' => 'Индивидуальная карточка товара',
        'task' => 'Стандартная структура WooCommerce не подходила под подачу товара и управление контентом.',
        'work' => 'Переработаны галерея и секции карточки: описание, характеристики, информационные блоки и элементы покупки. Предусмотрено редактирование через админку.',
        'scenario' => 'Покупатель может изучить изображения и характеристики в одной карточке и перейти к покупке, в том числе со смартфона.',
        'source' => $card_article,
    ],
    'altertool-internet-magazin-instrumenta-na-woodmart' => [
        'name' => 'AlterTool', 'title' => 'Корзина и оформление заказа',
        'task' => 'Настроить последовательный сценарий покупки в магазине инструмента на WooCommerce и WoodMart.',
        'work' => 'Настроены корзина и оформление заказа; формы и элементы интерфейса приведены к стилю магазина. Проверены основные пользовательские сценарии.',
        'scenario' => 'Покупатель может добавить товар, изменить количество, проверить состав корзины и перейти к оформлению заказа.',
        'source' => null,
    ],
];
$article_details = [
    'dorabotka-woocommerce-magazina' => 'Какие изменения помогают развивать работающий магазин и как определить состав нужной доработки.',
    $card_article_slug => 'Разбор кастомной карточки Gelikon: структура, галерея, адаптивность и управление содержимым.',
    'pochemu-tehnicheskoe-zadanie-zashchishchaet-byudzhet-zakazchika' => 'Как описание задачи и критерии приёмки помогают согласовать результат и границы работ.',
];
$examples = [];
$articles = [];
if (function_exists('get_field')) {
    foreach ((array) get_field('service_related_cases', get_the_ID()) as $selected) {
        $project = get_post(is_object($selected) ? $selected->ID : $selected);
        if (!$project || $project->post_type !== 'case' || $project->post_status !== 'publish' || !isset($example_details[$project->post_name])) { continue; }
        $details = $example_details[$project->post_name];
        $examples[] = ['post' => $project, 'details' => $details, 'source' => $details['source'] ?: $project];
    }
    foreach ((array) get_field('service_related_posts', get_the_ID()) as $selected) {
        $article = get_post(is_object($selected) ? $selected->ID : $selected);
        if (!$article || $article->post_type !== 'post' || $article->post_status !== 'publish' || !isset($article_details[$article->post_name])) { continue; }
        $articles[] = $article;
        if (count($articles) === 3) { break; }
    }
}
$render_image = static function ($source, $hero = false) {
    $image_id = get_post_thumbnail_id($source->ID);
    if (!$image_id) { return; }
    echo wp_get_attachment_image($image_id, 'large', false, [
        'alt' => get_the_title($source->ID), 'loading' => $hero ? 'eager' : 'lazy',
        'fetchpriority' => $hero ? 'high' : 'auto', 'decoding' => 'async',
        'sizes' => '(max-width: 900px) 100vw, 50vw',
    ]);
};
$service_url = static function ($slug) {
    $service = get_page_by_path($slug, OBJECT, 'service');
    return $service && $service->post_status === 'publish' ? get_permalink($service) : home_url('/services/');
};
$api_url = $service_url('integracziya-api-v-wordpress');
$import_url = $service_url('import-tovarov-v-woocommerce');
$errors_url = $service_url('ispravlenie-oshibok-wordpress');
$support_url = $service_url('tehnicheskaya-podderzhka-sajta-na-wordpress-i-woocommerce');
$redesign_url = $service_url('redizajn-sajta-na-wordpress');
?>
<main class="wpds-improve">
<section class="wi-hero" aria-labelledby="improve-title"><div class="wi-container">
    <nav class="wi-breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(home_url('/services/')); ?>">Услуги</a><span aria-hidden="true">/</span><span aria-current="page">Доработка сайта</span></nav>
    <div class="wi-hero-grid"><div><p class="wi-kicker">Развитие существующих сайтов</p><h1 id="improve-title">Доработка сайтов на WordPress и WooCommerce</h1>
        <p class="wi-lead">Исправляем ошибки, добавляем функционал и улучшаем работающие сайты. Перерабатываем каталог, карточки товаров и оформление заказа, подключаем сервисы и автоматизируем повторяющиеся задачи.</p>
        <p class="wi-price">от 5 000 ₽</p><p class="wi-price-note">Стоимость зависит от задачи и состояния текущего проекта. Состав работ и порядок оплаты согласуются до начала реализации.</p>
        <div class="wi-actions"><a class="wi-button" href="#improve-contact">Отправить задачу</a><a class="wi-link" href="#improve-tasks">Что можно доработать</a></div>
        <ul class="wi-facts"><li>Прямое общение с разработчиком</li><li>Оценка после изучения задачи</li><li>Проверка изменений перед внедрением</li></ul>
    </div>
    <?php if ($card_article && get_post_thumbnail_id($card_article->ID)) : ?><figure class="wi-visual"><a href="<?php echo esc_url(get_permalink($card_article)); ?>"><?php $render_image($card_article, true); ?></a><figcaption><strong>Gelikon · карточка товара</strong><span>Кастомная структура, галерея и управление контентом</span></figcaption></figure><?php endif; ?>
    </div>
</div></section>
<section class="wi-section" id="improve-tasks" aria-labelledby="tasks-title"><div class="wi-container"><p class="wi-kicker">От проблемы к задаче</p><h2 id="tasks-title">Что можно доработать</h2><div class="wi-grid wi-grid-three">
    <?php foreach ([
        ['Каталог и карточка товара', 'Фильтры, поиск, характеристики, вариации, галерея, дополнительные блоки и элементы покупки.', $card_article ? get_permalink($card_article) : '', 'Пример карточки товара'],
        ['Корзина и оформление заказа', 'Поля и проверки, отображение доставки, доступность способов оплаты и дополнительные данные заказа.', '#improve-examples', 'Пример оформления заказа'],
        ['Интеграции и обмен данными', 'Подключение внешних API, CRM, служб доставки и других сервисов с учётом требований проекта.', $api_url, 'Подробнее об API-интеграциях'],
        ['Импорт и автоматизация', 'Загрузка товаров, обновление цен и остатков, выгрузки и фоновые задачи.', $import_url, 'Подробнее об импорте'],
        ['Страницы и управление контентом', 'Новые блоки и шаблоны, ACF-поля, адаптивная вёрстка и редактирование через админку.', '', ''],
        ['Ошибки и совместимость', 'Диагностика конфликтов темы и плагинов, ошибок форм, AJAX и отдельных пользовательских сценариев.', $errors_url, 'Подробнее об исправлении ошибок'],
    ] as $task) : ?><article class="wi-card"><h3><?php echo esc_html($task[0]); ?></h3><p><?php echo esc_html($task[1]); ?></p><?php if ($task[2] && ($task[2] !== '#improve-examples' || $examples)) : ?><a class="wi-link" href="<?php echo esc_url($task[2]); ?>"><?php echo esc_html($task[3]); ?></a><?php endif; ?></article><?php endforeach; ?>
</div></div></section>
<?php if ($examples) : ?>
<section class="wi-section wi-soft" id="improve-examples" aria-labelledby="examples-title"><div class="wi-container"><p class="wi-kicker">Конкретный функционал</p><h2 id="examples-title">Примеры решённых задач</h2><div class="wi-projects">
    <?php foreach ($examples as $item) : ?><article class="wi-project"><a class="wi-project-image" href="<?php echo esc_url(get_permalink($item['source'])); ?>"><?php $render_image($item['source']); ?></a><div class="wi-project-body"><p class="wi-kicker"><?php echo esc_html($item['details']['name']); ?></p><h3><?php echo esc_html($item['details']['title']); ?></h3><dl class="wi-example-copy"><div><dt>Исходная задача</dt><dd><?php echo esc_html($item['details']['task']); ?></dd></div><div><dt>Что реализовано</dt><dd><?php echo esc_html($item['details']['work']); ?></dd></div><div><dt>Доступный сценарий</dt><dd><?php echo esc_html($item['details']['scenario']); ?></dd></div></dl><a class="wi-link" href="<?php echo esc_url(get_permalink($item['source'])); ?>">Подробнее о реализации</a></div></article><?php endforeach; ?>
</div></div></section>
<?php endif; ?>
<section class="wi-section" aria-labelledby="process-title"><div class="wi-container"><p class="wi-kicker">Работа с текущим кодом</p><h2 id="process-title">Как вносим изменения в работающий проект</h2><ol class="wi-steps">
    <li><h3>Изучаем текущую реализацию</h3><p>Разбираемся в теме, плагинах, существующем функционале и ограничениях проекта.</p></li>
    <li><h3>Согласуем решение</h3><p>Определяем, что меняем, какой результат ожидается и какие сценарии нужно сохранить.</p></li>
    <li><h3>Готовим и проверяем изменения</h3><p>Используем тестовую копию или другой подходящий способ проверки с учётом возможностей проекта.</p></li>
    <li><h3>Внедряем и проверяем результат</h3><p>Заранее определяем способ возврата изменений. После внедрения проверяем затронутые сценарии.</p></li>
</ol><p class="wi-note">Способ проверки и порядок внедрения определяем для конкретного сайта. Ограничения работающего проекта обсуждаем до реализации.</p></div></section>
<section class="wi-section wi-dark" aria-labelledby="estimate-title"><div class="wi-container"><p class="wi-kicker">Сначала состав работ</p><h2 id="estimate-title">Как оценивается доработка</h2><div class="wi-grid wi-grid-three">
    <article class="wi-feature"><h3>Задача понятна по описанию</h3><p>Можно предварительно определить состав работ и бюджет. Детали уточняем перед началом реализации.</p></article>
    <article class="wi-feature"><h3>Сначала нужно найти причину</h3><p>При ошибке или неизвестном состоянии кода может потребоваться отдельная диагностика. Её необходимость и стоимость согласуются заранее.</p></article>
    <article class="wi-feature"><h3>Нужна крупная доработка</h3><p>Формируем состав работ и при необходимости разделяем реализацию на этапы с отдельными результатами.</p></article>
</div><p class="wi-intro">На оценку влияют сложность функции, состояние темы и плагинов, интеграции, количество затронутых сценариев и необходимые проверки.</p><a class="wi-link" href="<?php echo esc_url(home_url('/prices/')); ?>">Посмотреть действующий прайс</a></div></section>
<section class="wi-section" aria-labelledby="format-title"><div class="wi-container"><p class="wi-kicker">Выбор формата</p><h2 id="format-title">Какой формат подойдёт вашему проекту</h2><div class="wi-grid wi-grid-three">
    <article class="wi-card"><span class="wi-number">01</span><h3>Отдельная доработка</h3><p>Известная функция или конкретное изменение в существующем сайте.</p><a class="wi-link" href="#improve-contact">Отправить задачу</a></article>
    <article class="wi-card"><span class="wi-number">02</span><h3>Техническая поддержка</h3><p>Регулярные задачи и сопровождение в согласованном объёме.</p><a class="wi-link" href="<?php echo esc_url($support_url); ?>">Подробнее о поддержке</a></article>
    <article class="wi-card"><span class="wi-number">03</span><h3>Редизайн или переработка</h3><p>Изменения затрагивают значительную часть интерфейса или архитектуры.</p><a class="wi-link" href="<?php echo esc_url($redesign_url); ?>">Подробнее о редизайне</a></article>
</div><p class="wi-note">Подход определяется после изучения сайта. Полная переделка нужна не для каждой задачи.</p></div></section>
<section class="wi-section wi-soft" aria-labelledby="prepare-title"><div class="wi-container wi-split"><div><p class="wi-kicker">Для предварительной оценки</p><h2 id="prepare-title">Что поможет быстрее разобраться в задаче</h2><p class="wi-intro">Можно обратиться без готового технического задания — сначала уточним задачу.</p><p>Если для работы потребуются доступы, порядок их предоставления согласуется отдельно.</p></div><ul class="wi-checks"><li>Ссылка на сайт.</li><li>Что происходит сейчас.</li><li>Какой результат нужен.</li><li>Скриншот, видео или пример.</li><li>Условия воспроизведения ошибки.</li><li>Важный срок, если он есть.</li></ul></div></section>
<section class="wi-section" id="service-faq" aria-labelledby="faq-title"><div class="wi-container wi-faq"><div><p class="wi-kicker">Перед обращением</p><h2 id="faq-title">Частые вопросы</h2></div><div>
    <?php foreach ([
        ['Можно ли доработать сайт после другого разработчика?', 'Да. Сначала изучаем существующую тему, плагины и реализацию нужного сценария. После этого согласуем решение и состав работ.'],
        ['Можно ли заказать одну небольшую задачу?', 'Да. Можно обратиться с отдельной правкой или новой функцией. Для оценки нужны описание задачи и исходные данные.'],
        ['Обязательно ли переделывать весь сайт?', 'Нет. Сначала проверяем, можно ли решить задачу в текущем проекте. Более крупную переработку обсуждаем только при наличии технических оснований.'],
        ['Как определяется стоимость?', 'Оценка зависит от сложности функции, состояния кода, интеграций и необходимых проверок. Состав работ и порядок оплаты согласуются до реализации.'],
        ['Почему иногда сначала нужна диагностика?', 'Одинаковая ошибка может иметь разные причины. Изучение текущей реализации помогает определить объём исправления. Необходимость и стоимость диагностики согласуются заранее.'],
        ['Можно ли работать поэтапно?', 'Да. Для крупной задачи можно согласовать этапы с понятным составом и проверяемым результатом.'],
        ['Можно ли продолжить сотрудничество после выполнения задачи?', 'Да. Новые доработки или регулярное сопровождение согласуются отдельно с учётом потребностей проекта.'],
    ] as $faq) : ?><details><summary><?php echo esc_html($faq[0]); ?></summary><p><?php echo esc_html($faq[1]); ?></p></details><?php endforeach; ?>
</div></div></section>
<?php if ($articles) : ?>
<section class="wi-section wi-soft" aria-labelledby="articles-title"><div class="wi-container"><p class="wi-kicker">Разобраться в задаче</p><h2 id="articles-title">Полезные материалы</h2><div class="wi-grid wi-grid-three">
    <?php foreach ($articles as $article) : ?><article class="wi-article"><h3><a href="<?php echo esc_url(get_permalink($article)); ?>"><?php echo esc_html(get_the_title($article)); ?></a></h3><p><?php echo esc_html($article_details[$article->post_name]); ?></p><a class="wi-link" href="<?php echo esc_url(get_permalink($article)); ?>">Читать статью</a></article><?php endforeach; ?>
</div></div></section>
<?php endif; ?>
<section class="wi-section wi-contact" id="improve-contact" aria-labelledby="contact-title"><div class="wi-container wi-contact-grid"><div><p class="wi-kicker">Следующий шаг</p><h2 id="contact-title">Расскажите, что нужно изменить на сайте</h2><p class="wi-intro">Пришлите ссылку и коротко опишите задачу. Изучим исходные данные, уточним детали и предложим следующий шаг.</p><div class="wi-contact-links"><a href="https://t.me/+79250404189">Написать в Telegram</a><a href="mailto:info@wpdevstudio.ru">info@wpdevstudio.ru</a></div></div><div class="wi-contact-form"><?php echo do_shortcode('[smart_contact_form]'); ?></div></div></section>
</main>
<?php get_footer(); ?>
