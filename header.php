<?php
/**
 * Site header.
 *
 * The navigation is intentionally kept in the template: its visual grouping is
 * part of the header design and must not depend on the state of a WP menu.
 */
defined('ABSPATH') || exit;

$home = static function ($path = '/') {
    return esc_url(home_url($path));
};
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0d192a">
  <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/favicon.ico'); ?>" sizes="any">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="wpds-header" id="site-header">
  <div class="wpds-header__top">
    <div class="wpds-header__container wpds-header__top-inner">
      <div class="wpds-header__promises" aria-label="Преимущества студии">
        <span>Код под задачу, без лишних плагинов</span>
        <span>Остаёмся после запуска</span>
      </div>
      <address class="wpds-header__contacts">
        <a href="tel:+79250404189" rel="nofollow" aria-label="Позвонить: +7 925 040-41-89">
          <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.69 2.8a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.33 1.84.56 2.8.69A2 2 0 0 1 22 16.92Z"/></svg>
          <span>+7 (925) 040-41-89</span>
        </a>
        <i aria-hidden="true"></i>
        <a href="https://t.me/+79250404189" target="_blank" rel="nofollow noopener">
          <svg aria-hidden="true" viewBox="0 0 24 24"><path d="m21.7 3.3-3.4 16.1c-.25 1.14-.92 1.42-1.87.88l-5.18-3.82-2.5 2.4c-.28.28-.51.51-1.04.51l.37-5.27 9.59-8.67c.42-.37-.09-.58-.65-.21L5.17 12.68.06 11.08c-1.11-.35-1.13-1.11.23-1.64L20.3 1.73c.93-.34 1.74.22 1.4 1.57Z"/></svg>
          <span>Telegram</span>
        </a>
        <a href="https://wa.me/79250404189" target="_blank" rel="nofollow noopener" class="wpds-header__whatsapp">
          <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M12.04 2a9.84 9.84 0 0 0-8.42 14.93L2.05 22l5.2-1.52A9.96 9.96 0 1 0 12.04 2Zm5.8 14.05c-.25.7-1.46 1.34-2.02 1.42-.52.08-1.17.11-1.89-.12-.44-.14-1-.33-1.72-.64-3.03-1.3-5-4.35-5.15-4.55-.15-.2-1.23-1.63-1.23-3.11s.78-2.21 1.05-2.51c.28-.3.6-.37.8-.37h.58c.18 0 .43-.07.67.51.25.6.85 2.08.93 2.23.07.15.12.33.02.53-.1.2-.15.32-.3.5-.15.17-.32.38-.45.51-.15.15-.31.31-.13.61.17.3.77 1.28 1.66 2.07 1.14 1.02 2.1 1.34 2.4 1.49.3.15.48.12.65-.08.18-.2.75-.88.95-1.18.2-.3.4-.25.68-.15.27.1 1.75.83 2.05.98.3.15.5.22.57.35.08.12.08.72-.17 1.42Z"/></svg>
          <span>WhatsApp</span>
        </a>
        <i aria-hidden="true"></i>
        <button class="wpds-header__search-toggle" type="button" aria-expanded="false" aria-controls="header-search">
          <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
          <span>Поиск</span>
        </button>
      </address>
    </div>
  </div>

  <div class="wpds-header__main">
    <div class="wpds-header__container wpds-header__main-inner">
      <a class="wpds-header__logo" href="<?php echo $home(); ?>" aria-label="WPDevStudio — на главную">
        <?php if (has_custom_logo()) : ?>
          <?php echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, ['class' => 'wpds-header__logo-image']); ?>
        <?php else : ?>
          <span class="wpds-header__logo-mark">W<span>P</span></span><span class="wpds-header__logo-name">WP<span>DEV</span><small>STUDIO</small></span>
        <?php endif; ?>
      </a>

      <nav class="wpds-header__nav" aria-label="Основная навигация">
        <button class="wpds-header__services-toggle" type="button" aria-expanded="false" aria-controls="services-megamenu">
          Услуги <svg aria-hidden="true" viewBox="0 0 16 16"><path d="m3 6 5 5 5-5"/></svg>
        </button>
        <a href="<?php echo $home('/services/online-store/'); ?>">Интернет-магазины</a>
        <a href="<?php echo $home('/services/site-improvement/'); ?>">Доработка</a>
        <a href="<?php echo $home('/cases/'); ?>">Кейсы</a>
        <a href="<?php echo $home('/services/'); ?>">Цены</a>
        <a href="<?php echo $home('/about/'); ?>">О студии</a>
      </nav>

      <a class="wpds-header__cta" href="<?php echo $home('/contacts/'); ?>">Обсудить проект <span aria-hidden="true">→</span></a>
      <button class="wpds-header__burger" type="button" aria-expanded="false" aria-controls="wpds-mobile-menu" aria-label="Открыть меню"><span></span><span></span><span></span></button>
    </div>
  </div>

  <form class="wpds-header__search" id="header-search" role="search" method="get" action="<?php echo $home(); ?>" hidden>
    <div class="wpds-header__container">
      <label><span class="screen-reader-text">Поиск по сайту</span><input type="search" name="s" placeholder="Что вы хотите найти?" autocomplete="off"></label>
      <button type="submit">Найти</button>
    </div>
  </form>

  <div class="wpds-mega" id="services-megamenu" hidden>
    <div class="wpds-header__container wpds-mega__grid">
      <section class="wpds-mega__column">
        <h2><svg aria-hidden="true" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="14" rx="1"/><path d="M8 21h8M12 17v4"/></svg>Разработка</h2>
        <a href="<?php echo $home('/services/online-store/'); ?>">Интернет-магазины WooCommerce</a>
        <a href="<?php echo $home('/services/business-card-site/'); ?>">Сайты для бизнеса</a>
        <a href="<?php echo $home('/services/marketplace/'); ?>">Маркетплейсы</a>
        <a href="<?php echo $home('/services/wordpress-theme-development/'); ?>">Кастомные темы WordPress</a>
        <a href="<?php echo $home('/services/wordpress-account-development/'); ?>">Личные кабинеты</a>
      </section>
      <section class="wpds-mega__column">
        <h2><svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-2.83 2.83-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V21h-4v-.09A1.7 1.7 0 0 0 9 19.36a1.7 1.7 0 0 0-1.88.34l-.06.06-2.83-2.83.06-.06A1.7 1.7 0 0 0 4.63 15 1.7 1.7 0 0 0 3.08 14H3v-4h.09A1.7 1.7 0 0 0 4.64 9a1.7 1.7 0 0 0-.34-1.88l-.06-.06 2.83-2.83.06.06A1.7 1.7 0 0 0 9 4.63h.01A1.7 1.7 0 0 0 10 3.08V3h4v.09A1.7 1.7 0 0 0 15 4.64a1.7 1.7 0 0 0 1.88-.34l.06-.06 2.83 2.83-.06.06A1.7 1.7 0 0 0 19.37 9v.01A1.7 1.7 0 0 0 20.92 10H21v4h-.09A1.7 1.7 0 0 0 19.4 15Z"/></svg>Развитие проекта</h2>
        <a href="<?php echo $home('/services/site-improvement/'); ?>">Доработка WordPress и WooCommerce</a>
        <a href="<?php echo $home('/services/wordpress-plugin-development/'); ?>">Разработка плагинов</a>
        <a href="<?php echo $home('/services/wordpress-api-integration/'); ?>">Интеграции API</a>
        <a href="<?php echo $home('/services/woocommerce-product-import/'); ?>">Импорт и автоматизация</a>
        <a href="<?php echo $home('/services/support/'); ?>">Техническая поддержка</a>
        <a href="<?php echo $home('/services/wordpress-speed-optimization/'); ?>">Аудит и оптимизация</a>
      </section>
      <section class="wpds-mega__column">
        <h2><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M17 3l4 4-4 4M3 7h18M7 21l-4-4 4-4M21 17H3"/></svg>Миграции</h2>
        <a href="<?php echo $home('/services/bitrix-wordpress/'); ?>">1С-Битрикс → WordPress</a>
        <a href="<?php echo $home('/services/opencart-wordpress/'); ?>">OpenCart → WordPress</a>
        <a href="<?php echo $home('/services/joomla-wordpress/'); ?>">Joomla → WordPress</a>
        <a href="<?php echo $home('/services/tilda-wordpress/'); ?>">Tilda → WordPress</a>
        <a href="<?php echo $home('/services/shopify-woocommerce/'); ?>">Shopify → WooCommerce</a>
        <a href="<?php echo $home('/services/drupal-wordpress/'); ?>">Другие платформы</a>
      </section>
      <aside class="wpds-mega__aside">
        <div class="wpds-mega__help">
          <h2>Не нашли нужную услугу?</h2>
          <p>Расскажите о задаче — мы предложим решение.</p>
          <a class="wpds-header__cta" href="<?php echo $home('/contacts/'); ?>">Обсудить проект <span aria-hidden="true">→</span></a>
        </div>
        <a class="wpds-mega__all" href="<?php echo $home('/services/'); ?>"><strong>Все услуги</strong><span>Полный список услуг с примерами</span><b aria-hidden="true">›</b></a>
      </aside>
    </div>
  </div>

  <div class="wpds-mobile" id="wpds-mobile-menu" hidden>
    <nav aria-label="Мобильная навигация">
      <a href="<?php echo $home('/services/'); ?>">Услуги</a>
      <a href="<?php echo $home('/services/online-store/'); ?>">Интернет-магазины</a>
      <a href="<?php echo $home('/services/site-improvement/'); ?>">Доработка</a>
      <a href="<?php echo $home('/cases/'); ?>">Кейсы</a>
      <a href="<?php echo $home('/about/'); ?>">О студии</a>
      <a href="<?php echo $home('/contacts/'); ?>">Контакты</a>
    </nav>
    <a class="wpds-header__cta" href="<?php echo $home('/contacts/'); ?>">Обсудить проект <span aria-hidden="true">→</span></a>
    <a href="tel:+79250404189">+7 (925) 040-41-89</a>
  </div>
</header>
