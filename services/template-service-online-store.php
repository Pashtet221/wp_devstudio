<?php
/*
Template Name: Услуга — Разработка интернет-магазина
Template Post Type: service
*/
defined('ABSPATH') || exit;
wp_enqueue_style('wpds-online-store', get_template_directory_uri() . '/assets/css/online-store.css', [], filemtime(dirname(__DIR__) . '/assets/css/online-store.css'));
get_header();

$project_details = [
    'redizajn-internet-magazina-gelikon-s-perenosom-s-opencart-na-woocommerce' => [
        'name' => 'Gelikon', 'niche' => 'Электроника и цифровые устройства',
        'role' => 'Редизайн и миграция',
        'task' => 'Обновить работающий магазин и перенести его с OpenCart на WooCommerce.',
        'works' => ['Новая кастомная тема WordPress', 'Перенос каталога и изображений', 'Доработка карточки товара и оформления заказа'],
    ],
    'altertool-internet-magazin-instrumenta-na-woodmart' => [
        'name' => 'AlterTool', 'niche' => 'Инструменты для строительства и ремонта',
        'role' => 'Разработка на готовой теме WoodMart',
        'task' => 'Собрать магазин инструмента с понятным каталогом и последовательным сценарием покупки.',
        'works' => ['Настройка и адаптация WoodMart', 'Каталог, поиск и фильтрация', 'Карточки товаров и оформление заказа'],
    ],
];
$article_details = [
    'skolko-stoit-internet-magazin-na-woocommerce-v-2026-realnye-czeny' => 'Из чего складывается бюджет магазина и как дизайн, каталог и интеграции влияют на оценку.',
    'woodmart-ili-kastomnaya-tema-dlya-internet-magazina' => 'Как соотнести возможности готовой темы и индивидуальной разработки с задачами бизнеса.',
];
$projects = [];
$articles = [];
if (function_exists('get_field')) {
    foreach ((array) get_field('service_related_cases', get_the_ID()) as $selected) {
        $project = get_post(is_object($selected) ? $selected->ID : $selected);
        if (!$project || $project->post_type !== 'case' || $project->post_status !== 'publish' || !isset($project_details[$project->post_name])) { continue; }
        $projects[] = ['post' => $project, 'details' => $project_details[$project->post_name]];
    }
    foreach ((array) get_field('service_related_posts', get_the_ID()) as $selected) {
        $article = get_post(is_object($selected) ? $selected->ID : $selected);
        if (!$article || $article->post_type !== 'post' || $article->post_status !== 'publish' || !isset($article_details[$article->post_name])) { continue; }
        $articles[] = $article;
        if (count($articles) === 3) { break; }
    }
}
$render_project_image = static function ($project, $hero = false) {
    $image_id = get_post_thumbnail_id($project->ID);
    if (!$image_id) { return; }
    echo wp_get_attachment_image($image_id, 'large', false, [
        'alt' => get_the_title($project->ID),
        'loading' => $hero ? 'eager' : 'lazy',
        'fetchpriority' => $hero ? 'high' : 'auto',
        'decoding' => 'async',
        'sizes' => $hero ? '(max-width: 900px) 100vw, 50vw' : '(max-width: 650px) 100vw, 50vw',
    ]);
};
$woodmart = get_page_by_path('internet-magazin-na-woodmart', OBJECT, 'service');
$woodmart_url = $woodmart && $woodmart->post_status === 'publish' ? get_permalink($woodmart) : home_url('/services/');
?>
<main class="wpds-shop">
<section class="ws-hero" aria-labelledby="shop-title"><div class="ws-container">
    <nav class="ws-breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(home_url('/services/')); ?>">Услуги</a><span aria-hidden="true">/</span><span aria-current="page">Разработка интернет-магазина</span></nav>
    <div class="ws-hero-grid"><div>
        <p class="ws-kicker">WordPress · WooCommerce</p>
        <h1 id="shop-title">Разработка интернет-магазинов на WordPress и WooCommerce</h1>
        <p class="ws-lead">Создаём магазины с удобным каталогом, понятными карточками товаров и оформлением заказа. Подключаем оплату, доставку и необходимые интеграции, настраиваем управление товарами и заказами.</p>
        <p class="ws-price">от 120 000 ₽</p>
        <p class="ws-price-note">Точная стоимость зависит от дизайна, состава страниц, каталога и интеграций. Объём работ и смета согласуются до начала разработки.</p>
        <div class="ws-actions"><a class="ws-button" href="#shop-contact">Обсудить магазин</a><a class="ws-link" href="<?php echo $projects ? '#shop-projects' : esc_url(home_url('/cases/')); ?>">Смотреть проекты</a></div>
        <ul class="ws-facts"><li>Прямое общение с разработчиком</li><li>Поэтапная работа и оплата</li><li>Возможность развития после запуска</li></ul>
    </div>
    <?php if ($projects) : $hero_project = $projects[0]; ?>
    <figure class="ws-visual"><a href="<?php echo esc_url(get_permalink($hero_project['post'])); ?>"><?php $render_project_image($hero_project['post'], true); ?></a><figcaption><strong><?php echo esc_html($hero_project['details']['name']); ?></strong><span><?php echo esc_html($hero_project['details']['role']); ?></span></figcaption></figure>
    <?php endif; ?>
    </div>
</div></section>
<?php if ($projects) : ?>
<section class="ws-section" id="shop-projects" aria-labelledby="projects-title"><div class="ws-container">
    <p class="ws-kicker">Реальные проекты</p><h2 id="projects-title">Магазины, над которыми мы работали</h2>
    <div class="ws-projects"><?php foreach ($projects as $item) : ?>
        <article class="ws-project"><a class="ws-project-image" href="<?php echo esc_url(get_permalink($item['post'])); ?>"><?php $render_project_image($item['post']); ?></a><div class="ws-project-body">
            <p class="ws-kicker"><?php echo esc_html($item['details']['role']); ?></p><h3><?php echo esc_html($item['details']['name']); ?></h3><p class="ws-niche"><?php echo esc_html($item['details']['niche']); ?></p><p><?php echo esc_html($item['details']['task']); ?></p>
            <ul><?php foreach ($item['details']['works'] as $work) : ?><li><?php echo esc_html($work); ?></li><?php endforeach; ?></ul>
            <a class="ws-link" href="<?php echo esc_url(get_permalink($item['post'])); ?>">Смотреть кейс <span aria-hidden="true">↗</span></a>
        </div></article>
    <?php endforeach; ?></div>
</div></section>
<?php endif; ?>
<section class="ws-section ws-soft" id="shop-scope" aria-labelledby="scope-title"><div class="ws-container">
    <p class="ws-kicker">Состав проекта</p><h2 id="scope-title">Что входит в разработку магазина</h2>
    <p class="ws-intro">Основа проекта — WordPress и WooCommerce, структура магазина и основные сценарии покупки. Комплектацию определяем под ваш каталог и фиксируем до начала работ.</p>
    <div class="ws-scope-layout"><ol class="ws-scope-list">
        <li><h3>Структура и интерфейс</h3><p>Главная, каталог и категории, карточка товара, корзина, оформление заказа и личный кабинет.</p></li>
        <li><h3>Каталог</h3><p>Категории и характеристики, вариации товаров, базовая фильтрация и сортировка. Для проверки настройки добавляются тестовые товары.</p></li>
        <li><h3>Покупка</h3><p>Оформление заказа, письма-уведомления, подключение согласованных способов оплаты и доставки.</p></li>
        <li><h3>Управление</h3><p>Работа с товарами, ценами, остатками и заказами средствами WooCommerce; редактирование контента согласованных страниц.</p></li>
        <li><h3>Подготовка к запуску</h3><p>Адаптивность, базовая техническая SEO-подготовка и проверка ключевых сценариев — от выбора товара до оформления заказа.</p></li>
    </ol><aside class="ws-card ws-estimate"><p class="ws-kicker">Стартовая стоимость</p><p class="ws-price">от 120 000 ₽</p><h3>Дополнительно по задаче</h3><ul><li>Массовый импорт и перенос данных</li><li>Сложные интеграции CRM, ERP и API</li><li>Индивидуальная система скидок</li><li>Нестандартные кабинеты и бизнес-процессы</li><li>Расширенная автоматизация</li></ul><p>Точный состав подключения оплаты, доставки, наполнения и интеграций фиксируется в смете проекта.</p><a class="ws-link" href="<?php echo esc_url(home_url('/prices/')); ?>">Посмотреть действующий прайс</a></aside></div>
</div></section>
<section class="ws-section" aria-labelledby="approach-title"><div class="ws-container">
    <p class="ws-kicker">Выбор подхода</p><h2 id="approach-title">Готовая тема или индивидуальная разработка</h2>
    <div class="ws-grid ws-grid-two"><article class="ws-card"><span class="ws-number">01</span><h3>Магазин на готовой теме</h3><p>Подходит, когда функционал и визуальная основа темы соответствуют задаче. Дизайн адаптируется под бренд, настраивается магазин, необходимые изменения оцениваются отдельно.</p><p>Пример такого подхода — AlterTool на WoodMart.</p><a class="ws-link" href="<?php echo esc_url($woodmart_url); ?>">Разработка на WoodMart</a></article>
    <article class="ws-card"><span class="ws-number">02</span><h3>Магазин на кастомной теме</h3><p>Подходит, когда нужен индивидуальный интерфейс, особая структура или нестандартные сценарии. Тема разрабатывается под согласованные макеты и функции.</p><p>В Gelikon новая кастомная тема стала частью редизайна и миграции.</p><a class="ws-link" href="#shop-contact">Обсудить индивидуальный проект</a></article></div>
    <p class="ws-note">Выбор зависит от задач, ограничений и состава проекта. Стоимость варианта на готовой теме оценивается в рамках отдельной услуги.</p>
</div></section>
<section class="ws-section ws-dark" aria-labelledby="features-title"><div class="ws-container"><p class="ws-kicker">Возможности магазина</p><h2 id="features-title">Функционал под ваш каталог и процессы</h2>
    <div class="ws-grid ws-grid-three">
    <?php foreach ([
        ['Поиск и фильтрация', 'Помогаем покупателю сузить выбор по категориям и важным характеристикам товара.'],
        ['Вариативные товары', 'Объединяем размеры, цвета и другие варианты в одной карточке с понятным выбором.'],
        ['Оформление заказа', 'Выстраиваем последовательный путь покупки и согласуем необходимые поля.'],
        ['Оплата и доставка', 'Подключаем согласованные способы, чтобы покупатель мог выбрать подходящий вариант.'],
        ['Импорт и обновление данных', 'По отдельному согласованию настраиваем загрузку товаров, цен и остатков из ваших источников.'],
        ['Индивидуальные правила', 'По задаче реализуем скидки, особые кабинеты и другие сценарии, которых нет в базовых настройках.'],
    ] as $feature) : ?><article class="ws-feature"><h3><?php echo esc_html($feature[0]); ?></h3><p><?php echo esc_html($feature[1]); ?></p></article><?php endforeach; ?>
    </div>
</div></section>
<section class="ws-section" aria-labelledby="process-title"><div class="ws-container"><p class="ws-kicker">От задачи до запуска</p><h2 id="process-title">Как проходит разработка</h2>
    <ol class="ws-steps"><li><h3>Задача и оценка</h3><p>Изучаем каталог, нужные функции и ограничения. Вы согласуете состав работ, смету и этапы.</p></li><li><h3>Структура и дизайн</h3><p>Прорабатываем страницы и путь покупателя. Вы согласуете структуру, макеты или адаптацию выбранной темы.</p></li><li><h3>Разработка и подключения</h3><p>Собираем магазин и согласованные интеграции. Показываем промежуточный результат для проверки деталей.</p></li><li><h3>Проверка и запуск</h3><p>Проверяем каталог, покупку и управление. Вы получаете результат для приёмки по согласованному составу проекта.</p></li></ol>
    <p class="ws-note">Сроки зависят от готовности материалов, количества шаблонов, сложности функций и интеграций. Сроки и этапы фиксируются после определения состава проекта.</p>
</div></section>
<section class="ws-section ws-soft" aria-labelledby="start-title"><div class="ws-container ws-split"><div><p class="ws-kicker">Подготовка</p><h2 id="start-title">Что нужно для старта</h2><p class="ws-intro">Можно обратиться без готового ТЗ — сначала уточним задачу и состав необходимых материалов.</p></div><ul class="ws-checks"><li>Что продаёт компания и как устроен каталог.</li><li>Примеры сайтов, которые близки по структуре или подаче.</li><li>Необходимые способы оплаты и доставки.</li><li>Требования к интеграциям и обмену данными.</li><li>Тексты, фотографии, дизайн или данные каталога, если они уже есть.</li></ul></div></section>
<section class="ws-section" aria-labelledby="after-title"><div class="ws-container ws-split"><div><p class="ws-kicker">Передача и развитие</p><h2 id="after-title">После запуска</h2><p class="ws-intro">Магазин можно развивать по мере появления новых задач.</p></div><div><p>Товарами и заказами можно управлять через WordPress и WooCommerce. Порядок передачи доступа и материалов, а также необходимость инструкции или обучения фиксируем в составе проекта.</p><p>Замечания к согласованному результату разбираем отдельно от запросов на новые возможности. Дальнейшие доработки и регулярное сопровождение согласуются отдельно.</p></div></div></section>
<section class="ws-section ws-soft" id="service-faq" aria-labelledby="faq-title"><div class="ws-container ws-faq"><div><p class="ws-kicker">Перед заказом</p><h2 id="faq-title">Частые вопросы</h2></div><div>
    <?php foreach ([
        ['Что входит в стоимость от 120 000 ₽?', 'Стартовый состав — структура магазина, настройка WordPress и WooCommerce, основные страницы, каталог и базовый сценарий покупки. Точный состав подключения оплаты, доставки, наполнения и интеграций фиксируется в смете проекта.'],
        ['Нужен ли готовый дизайн?', 'Можно прийти с готовыми макетами или без них. Сначала определим подход: адаптация готовой темы или индивидуальная разработка, затем согласуем необходимые материалы и состав дизайна.'],
        ['Можно ли перенести товары из существующего магазина?', 'Да, перенос возможен. До оценки изучаем источник данных, структуру каталога и изображения. Объём и стоимость миграции согласуются отдельно.'],
        ['Можно ли подключить нужные оплату и доставку?', 'Сначала проверяем доступные модули и требования сервисов. Способы подключения, ограничения и состав работ фиксируем в смете. Нестандартная интеграция оценивается отдельно.'],
        ['Кто наполняет магазин товарами?', 'В базовой настройке используются тестовые товары. Кто готовит материалы и выполняет дальнейшее наполнение или массовый импорт, определяем до начала работ.'],
        ['Можно ли запустить проект поэтапно?', 'Да. Определяем основной сценарий для первого запуска и отдельно согласуем последующие этапы, их состав и оплату.'],
        ['Что происходит после запуска?', 'Передаём согласованный результат. Порядок передачи материалов и необходимость инструкции или обучения определяем в составе проекта. Новые функции и регулярное сопровождение обсуждаются отдельно.'],
    ] as $faq) : ?><details><summary><?php echo esc_html($faq[0]); ?></summary><p><?php echo esc_html($faq[1]); ?></p></details><?php endforeach; ?>
</div></div></section>
<?php if ($articles) : ?>
<section class="ws-section" aria-labelledby="articles-title"><div class="ws-container"><p class="ws-kicker">Разобраться до старта</p><h2 id="articles-title">Полезные материалы</h2><div class="ws-grid ws-grid-two">
    <?php foreach ($articles as $article) : ?><article class="ws-article"><h3><a href="<?php echo esc_url(get_permalink($article)); ?>"><?php echo esc_html(get_the_title($article)); ?></a></h3><p><?php echo esc_html($article_details[$article->post_name]); ?></p><a class="ws-link" href="<?php echo esc_url(get_permalink($article)); ?>">Читать статью</a></article><?php endforeach; ?>
</div></div></section>
<?php endif; ?>
<section class="ws-section ws-contact" id="shop-contact" aria-labelledby="contact-title"><div class="ws-container ws-contact-grid"><div><p class="ws-kicker">Следующий шаг</p><h2 id="contact-title">Обсудим ваш интернет-магазин</h2><p class="ws-intro">Расскажите, что планируете продавать, какие функции нужны и есть ли готовый сайт или макет. Уточним детали и предложим подход к разработке.</p><div class="ws-contact-links"><a href="https://t.me/+79250404189">Написать в Telegram</a><a href="mailto:info@wpdevstudio.ru">info@wpdevstudio.ru</a></div></div><div class="ws-contact-form"><?php echo do_shortcode('[smart_contact_form]'); ?></div></div></section>
</main>
<?php get_footer(); ?>
