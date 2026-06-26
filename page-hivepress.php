<?php
/**
 * Template Name: HivePress направление
 * Template Post Type: page
 *
 * Отдельная посадочная страница под разработку, доработку тем и плагинов HivePress.
 * Контент управляется через ACF или стандартные произвольные поля WordPress.
 */

defined('ABSPATH') || exit;

get_header();

if (!function_exists('wpds_hp_meta')) {
    function wpds_hp_meta(string $key, $default = '') {
        if (function_exists('get_field')) {
            $value = get_field($key);
            if ($value !== null && $value !== '') {
                return $value;
            }
        }

        $value = get_post_meta(get_the_ID(), $key, true);
        return ($value !== '') ? $value : $default;
    }
}

if (!function_exists('wpds_hp_lines')) {
    function wpds_hp_lines($value): array {
        if (is_array($value)) {
            return array_values(array_filter(array_map('trim', $value)));
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\n|\r/', (string) $value))));
    }
}

if (!function_exists('wpds_hp_cards_from_lines')) {
    function wpds_hp_cards_from_lines($value): array {
        $cards = [];

        foreach (wpds_hp_lines($value) as $line) {
            $parts = array_map('trim', explode('|', $line, 3));
            $cards[] = [
                'title' => $parts[0] ?? '',
                'text'  => $parts[1] ?? '',
                'icon'  => $parts[2] ?? '✦',
            ];
        }

        return array_values(array_filter($cards, static fn($card) => $card['title'] !== ''));
    }
}

if (!function_exists('wpds_hp_posts_by_ids')) {
    function wpds_hp_posts_by_ids($ids, array $post_types = ['post'], int $limit = 6): array {
        $ids = is_array($ids) ? $ids : preg_split('/[,\s]+/', (string) $ids);
        $ids = array_values(array_filter(array_map('absint', $ids)));

        if (empty($ids)) {
            return [];
        }

        return get_posts([
            'post_type'      => $post_types,
            'post__in'       => $ids,
            'orderby'        => 'post__in',
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
        ]);
    }
}

if (!function_exists('wpds_hp_fallback_posts')) {
    function wpds_hp_fallback_posts(array $post_types, int $limit, string $search = 'HivePress'): array {
        return get_posts([
            'post_type'      => $post_types,
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
            's'              => $search,
        ]);
    }
}

$post_id = get_the_ID();

$hero_badge = (string) wpds_hp_meta('hp_badge', 'Отдельное направление WP Dev Studio');
$hero_title = (string) wpds_hp_meta('hp_h1', get_the_title($post_id));
$hero_text = (string) wpds_hp_meta(
    'hp_subtitle',
    'Разработка и доработка сайтов на HivePress: доски объявлений, каталоги специалистов, маркетплейсы услуг, кастомные темы, плагины, интеграции и SEO-структура под рубрику.'
);
$primary_cta = (string) wpds_hp_meta('hp_primary_cta', 'Обсудить HivePress-проект');
$primary_url = (string) wpds_hp_meta('hp_primary_url', '#hivepress-brief');
$secondary_cta = (string) wpds_hp_meta('hp_secondary_cta', 'Посмотреть услуги');
$secondary_url = (string) wpds_hp_meta('hp_secondary_url', home_url('/service/'));
$price = (string) wpds_hp_meta('hp_price', 'от 45 000 ₽');
$time = (string) wpds_hp_meta('hp_time', 'от 10 рабочих дней');

$keywords = wpds_hp_lines(wpds_hp_meta(
    'hp_keywords',
    "HivePress разработка\nдоработка HivePress\nтема HivePress\nплагины HivePress\nдоска объявлений WordPress\nкаталог услуг WordPress\nмаркетплейс на WordPress\nкастомизация HivePress"
));

$services = wpds_hp_cards_from_lines(wpds_hp_meta(
    'hp_services',
    "Разработка доски объявлений|Собираю структуру объявлений, фильтры, категории, личные кабинеты и сценарии публикации.|☷\nДоработка темы HivePress|Адаптирую шаблоны, карточки, страницы листингов и визуальную систему под ваш бренд.|◈\nРазработка плагинов|Пишу расширения под бизнес-логику: оплаты, заявки, роли, ограничения, уведомления и интеграции.|⚙\nSEO-структура рубрики|Прорабатываю посадочные страницы, перелинковку, хлебные крошки, мета-данные и семантические блоки.|⌁"
));

$stack = wpds_hp_cards_from_lines(wpds_hp_meta(
    'hp_stack',
    "Листинги и фильтры|Типы объявлений, атрибуты, поиск, карты, избранное и сравнение.\nМонетизация|Платные размещения, пакеты, продвижение, подписки и WooCommerce-сценарии.\nПользователи|Профили, личные кабинеты, модерация, роли и ограничения доступа.\nИнтеграции|CRM, Telegram, email-уведомления, аналитика, карты, платежи и внешние API."
));

$steps = wpds_hp_lines(wpds_hp_meta(
    'hp_steps',
    "Аудит задачи, ниши, текущей темы и расширений HivePress\nПроектирование структуры рубрики, типов объявлений и пользовательских сценариев\nРазработка шаблонов, плагинов, интеграций и SEO-блоков\nТестирование публикации объявлений, кабинетов, фильтров, оплат и уведомлений\nЗапуск, инструкция для админки и план развития направления"
));

$faq_questions = wpds_hp_lines(wpds_hp_meta(
    'hp_faq_q',
    "Можно ли всё наполнять через админку?\nМожно ли привязать статьи, услуги и кейсы?\nПодойдёт ли шаблон под SEO?\nМожно ли сделать отдельные страницы под ключи?"
));
$faq_answers = wpds_hp_lines(wpds_hp_meta(
    'hp_faq_a',
    "Да. Основные блоки шаблона читают ACF или произвольные поля WordPress, поэтому тексты, списки, ключи и связи можно менять без правки кода.\nДа. Для релевантных материалов есть поля hp_article_ids, hp_service_ids и hp_case_ids. Укажите ID через запятую — порядок сохранится.\nДа. На странице есть H1, тематические блоки, FAQ, JSON-LD, перелинковка и кластер ключевых фраз.\nДа. Этот шаблон можно назначать разным страницам и менять поля под отдельные группы запросов."
));

$faq_pairs = [];
for ($i = 0, $max = min(count($faq_questions), count($faq_answers)); $i < $max; $i++) {
    $faq_pairs[] = ['q' => $faq_questions[$i], 'a' => $faq_answers[$i]];
}

$related_articles = wpds_hp_posts_by_ids(wpds_hp_meta('hp_article_ids'), ['post'], 6);
if (empty($related_articles)) {
    $related_articles = wpds_hp_fallback_posts(['post'], 3);
}

$related_services = wpds_hp_posts_by_ids(wpds_hp_meta('hp_service_ids'), ['page', 'service'], 6);
$related_cases = wpds_hp_posts_by_ids(wpds_hp_meta('hp_case_ids'), ['case', 'post', 'page'], 6);

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => wp_strip_all_tags($hero_title),
    'description' => wp_strip_all_tags($hero_text),
    'url' => get_permalink($post_id),
    'provider' => [
        '@type' => 'Organization',
        'name' => get_bloginfo('name'),
        'url' => home_url('/'),
    ],
    'serviceType' => 'HivePress development',
    'areaServed' => 'RU',
];

if (!empty($faq_pairs)) {
    $schema['mainEntity'] = array_map(static function ($item) {
        return [
            '@type' => 'Question',
            'name' => wp_strip_all_tags($item['q']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($item['a']),
            ],
        ];
    }, $faq_pairs);
}
?>

<style>
.wpds-hp{--hp-accent:#2cbc63;--hp-dark:#101828;--hp-muted:#667085;--hp-border:#dbe7df;--hp-bg:#f4f8f5;color:var(--hp-dark);background:linear-gradient(180deg,#f7fbf8 0%,#fff 44%,#f5faf7 100%)}.wpds-hp a{color:inherit}.wpds-hp__wrap{width:min(1180px,calc(100% - 40px));margin:0 auto}.wpds-hp__hero{position:relative;overflow:hidden;padding:72px 0 44px}.wpds-hp__hero:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 85% 12%,rgba(44,188,99,.22),transparent 34%),radial-gradient(circle at 12% 22%,rgba(16,24,40,.08),transparent 28%);pointer-events:none}.wpds-hp__heroGrid{position:relative;display:grid;grid-template-columns:minmax(0,1fr) 360px;gap:28px;align-items:stretch}.wpds-hp__heroText,.wpds-hp__panel,.wpds-hp__card,.wpds-hp__brief{background:rgba(255,255,255,.88);border:1px solid var(--hp-border);box-shadow:0 24px 70px rgba(16,24,40,.08);backdrop-filter:blur(12px);border-radius:30px}.wpds-hp__heroText{padding:42px}.wpds-hp__badge{display:inline-flex;margin-bottom:18px;padding:9px 14px;border-radius:999px;background:rgba(44,188,99,.12);color:#168443;font-size:13px;font-weight:800;text-transform:uppercase;letter-spacing:.05em}.wpds-hp h1{margin:0 0 18px;font-size:clamp(36px,5.2vw,68px);line-height:.98;letter-spacing:-.04em}.wpds-hp__lead{margin:0;max-width:780px;color:var(--hp-muted);font-size:18px;line-height:1.78}.wpds-hp__actions{display:flex;flex-wrap:wrap;gap:14px;margin-top:28px}.wpds-hp__btn{display:inline-flex;align-items:center;justify-content:center;min-height:52px;padding:0 22px;border-radius:15px;border:1px solid var(--hp-border);background:#fff;text-decoration:none;font-weight:800}.wpds-hp__btn--main{border-color:var(--hp-accent);background:var(--hp-accent);color:#fff}.wpds-hp__panel{padding:26px}.wpds-hp__metric{padding:18px;border-radius:20px;background:#f7fbf8;border:1px solid #e4eee7}.wpds-hp__metric+.wpds-hp__metric{margin-top:14px}.wpds-hp__label{margin:0 0 6px;color:#98a2b3;font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.06em}.wpds-hp__value{margin:0;font-size:26px;font-weight:900}.wpds-hp__keywordCloud{display:flex;flex-wrap:wrap;gap:10px;margin-top:18px}.wpds-hp__keyword{padding:8px 11px;border-radius:999px;background:#fff;border:1px solid #e0ebe4;color:#344054;font-size:13px;font-weight:700}.wpds-hp__section{padding:38px 0}.wpds-hp__sectionHead{display:flex;justify-content:space-between;gap:24px;align-items:end;margin-bottom:22px}.wpds-hp__eyebrow{margin:0 0 8px;color:#168443;font-weight:900;text-transform:uppercase;letter-spacing:.06em;font-size:13px}.wpds-hp h2{margin:0;font-size:clamp(28px,3.2vw,44px);line-height:1.08;letter-spacing:-.03em}.wpds-hp__sectionText{max-width:560px;margin:0;color:var(--hp-muted);line-height:1.7}.wpds-hp__grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}.wpds-hp__grid--two{grid-template-columns:repeat(2,minmax(0,1fr))}.wpds-hp__card{padding:24px}.wpds-hp__icon{width:46px;height:46px;display:grid;place-items:center;border-radius:16px;background:rgba(44,188,99,.12);color:#168443;font-size:22px;font-weight:900;margin-bottom:18px}.wpds-hp__card h3{margin:0 0 10px;font-size:20px}.wpds-hp__card p{margin:0;color:var(--hp-muted);line-height:1.68}.wpds-hp__steps{counter-reset:hp-step;display:grid;gap:12px}.wpds-hp__step{counter-increment:hp-step;display:grid;grid-template-columns:54px 1fr;gap:16px;align-items:center;padding:18px;border-radius:22px;background:#fff;border:1px solid var(--hp-border)}.wpds-hp__step:before{content:counter(hp-step);width:46px;height:46px;display:grid;place-items:center;border-radius:50%;background:var(--hp-dark);color:#fff;font-weight:900}.wpds-hp__related{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}.wpds-hp__linkCard{display:block;min-height:150px;padding:22px;border-radius:24px;background:#fff;border:1px solid var(--hp-border);text-decoration:none;box-shadow:0 14px 40px rgba(16,24,40,.05)}.wpds-hp__linkCard span{display:block;margin-bottom:12px;color:#168443;font-size:12px;font-weight:900;text-transform:uppercase;letter-spacing:.06em}.wpds-hp__linkCard strong{display:block;font-size:19px;line-height:1.28}.wpds-hp__linkCard em{display:block;margin-top:12px;color:var(--hp-muted);font-style:normal;line-height:1.55}.wpds-hp__faq{display:grid;gap:12px}.wpds-hp__faqItem{padding:20px 22px;border-radius:22px;background:#fff;border:1px solid var(--hp-border)}.wpds-hp__faqItem summary{cursor:pointer;font-weight:900}.wpds-hp__faqItem p{margin:12px 0 0;color:var(--hp-muted);line-height:1.7}.wpds-hp__brief{padding:34px;display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center}.wpds-hp__brief p{margin:10px 0 0;color:var(--hp-muted);line-height:1.7}@media(max-width:980px){.wpds-hp__heroGrid,.wpds-hp__brief{grid-template-columns:1fr}.wpds-hp__grid,.wpds-hp__related{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:640px){.wpds-hp__wrap{width:min(100% - 28px,1180px)}.wpds-hp__heroText{padding:26px}.wpds-hp__grid,.wpds-hp__grid--two,.wpds-hp__related{grid-template-columns:1fr}.wpds-hp__sectionHead{display:block}.wpds-hp__brief{padding:24px}.wpds-hp__btn{width:100%}}
</style>

<main class="wpds-hp" itemscope itemtype="https://schema.org/WebPage">
    <script type="application/ld+json"><?php echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>

    <section class="wpds-hp__hero">
        <div class="wpds-hp__wrap wpds-hp__heroGrid">
            <div class="wpds-hp__heroText">
                <div class="wpds-hp__badge"><?php echo esc_html($hero_badge); ?></div>
                <h1><?php echo esc_html($hero_title); ?></h1>
                <p class="wpds-hp__lead"><?php echo esc_html($hero_text); ?></p>
                <div class="wpds-hp__actions">
                    <a class="wpds-hp__btn wpds-hp__btn--main" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_cta); ?> →</a>
                    <a class="wpds-hp__btn" href="<?php echo esc_url($secondary_url); ?>"><?php echo esc_html($secondary_cta); ?></a>
                </div>
                <?php if (!empty($keywords)) : ?>
                    <div class="wpds-hp__keywordCloud" aria-label="Ключевые направления HivePress">
                        <?php foreach ($keywords as $keyword) : ?>
                            <span class="wpds-hp__keyword"><?php echo esc_html($keyword); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <aside class="wpds-hp__panel" aria-label="Параметры направления">
                <div class="wpds-hp__metric"><p class="wpds-hp__label">Стоимость</p><p class="wpds-hp__value"><?php echo esc_html($price); ?></p></div>
                <div class="wpds-hp__metric"><p class="wpds-hp__label">Срок</p><p class="wpds-hp__value"><?php echo esc_html($time); ?></p></div>
                <div class="wpds-hp__metric"><p class="wpds-hp__label">Фокус</p><p class="wpds-hp__value">HivePress + WordPress</p></div>
            </aside>
        </div>
    </section>

    <section class="wpds-hp__section">
        <div class="wpds-hp__wrap">
            <div class="wpds-hp__sectionHead"><div><p class="wpds-hp__eyebrow">Что можно заказать</p><h2>Единая рубрика под разработку HivePress</h2></div><p class="wpds-hp__sectionText">Шаблон объединяет услуги, кейсы, статьи и SEO-посадки вокруг одной темы — от досок объявлений до сложных каталогов и маркетплейсов.</p></div>
            <div class="wpds-hp__grid">
                <?php foreach ($services as $item) : ?>
                    <article class="wpds-hp__card"><div class="wpds-hp__icon"><?php echo esc_html($item['icon']); ?></div><h3><?php echo esc_html($item['title']); ?></h3><p><?php echo esc_html($item['text']); ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="wpds-hp__section">
        <div class="wpds-hp__wrap">
            <div class="wpds-hp__sectionHead"><div><p class="wpds-hp__eyebrow">Связанные возможности</p><h2>Всё, что обычно нужно HivePress-проекту</h2></div></div>
            <div class="wpds-hp__grid wpds-hp__grid--two">
                <?php foreach ($stack as $item) : ?>
                    <article class="wpds-hp__card"><h3><?php echo esc_html($item['title']); ?></h3><p><?php echo esc_html($item['text']); ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if (!empty($steps)) : ?>
        <section class="wpds-hp__section">
            <div class="wpds-hp__wrap">
                <div class="wpds-hp__sectionHead"><div><p class="wpds-hp__eyebrow">Процесс</p><h2>Как собираю направление</h2></div></div>
                <div class="wpds-hp__steps">
                    <?php foreach ($steps as $step) : ?><div class="wpds-hp__step"><?php echo esc_html($step); ?></div><?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($related_services) || !empty($related_cases) || !empty($related_articles)) : ?>
        <section class="wpds-hp__section">
            <div class="wpds-hp__wrap">
                <div class="wpds-hp__sectionHead"><div><p class="wpds-hp__eyebrow">Перелинковка</p><h2>Услуги, кейсы и статьи по теме</h2></div><p class="wpds-hp__sectionText">Заполняйте поля hp_service_ids, hp_case_ids и hp_article_ids через админку, чтобы вручную управлять релевантными материалами.</p></div>
                <div class="wpds-hp__related">
                    <?php foreach ([['Услуга', $related_services], ['Кейс', $related_cases], ['Статья', $related_articles]] as $group) : ?>
                        <?php foreach ($group[1] as $item) : ?>
                            <a class="wpds-hp__linkCard" href="<?php echo esc_url(get_permalink($item)); ?>"><span><?php echo esc_html($group[0]); ?></span><strong><?php echo esc_html(get_the_title($item)); ?></strong><em><?php echo esc_html(wp_trim_words(get_the_excerpt($item), 16, '…')); ?></em></a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($faq_pairs)) : ?>
        <section class="wpds-hp__section">
            <div class="wpds-hp__wrap">
                <div class="wpds-hp__sectionHead"><div><p class="wpds-hp__eyebrow">FAQ</p><h2>Вопросы по HivePress-направлению</h2></div></div>
                <div class="wpds-hp__faq">
                    <?php foreach ($faq_pairs as $item) : ?>
                        <details class="wpds-hp__faqItem"><summary><?php echo esc_html($item['q']); ?></summary><p><?php echo esc_html($item['a']); ?></p></details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="wpds-hp__section" id="hivepress-brief">
        <div class="wpds-hp__wrap">
            <div class="wpds-hp__brief">
                <div><p class="wpds-hp__eyebrow">Бриф</p><h2>Нужна отдельная рубрика или проект на HivePress?</h2><p>Пришлите ссылку на сайт, список нужных типов объявлений, примеры конкурентов и желаемую схему монетизации — подготовлю структуру, оценку и план запуска.</p></div>
                <a class="wpds-hp__btn wpds-hp__btn--main" href="<?php echo esc_url(home_url('/contacts/')); ?>">Перейти к контактам →</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
