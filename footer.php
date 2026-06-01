<?php
/**
 * Подвал темы
 */

$theme_uri = get_template_directory_uri();

// (опционально) вынеси это в ACF/настройки темы, но так уже будет работать:
$phone_raw   = '+79250404189';
$phone_human = '+7 (925) 040-41-89';
$email       = 'info@wpdevstudio.ru';

$tg_url      = 'https://t.me/+79250404189';
$wa_url      = 'https://wa.me/79250404189';
$li_url      = 'https://www.linkedin.com/in/pavel-damut-142181288';

// если есть реальная ссылка на профиль с отзывами — вставь сюда:
$profi_url   = '#';

// синхронизируем цифры (не должно быть 6 и 65 одновременно)
$reviews_rating = '5.0';
$reviews_count  = 65;
?>

<footer class="Footer_wrapper__dn17Q" id="footer" itemscope itemtype="https://schema.org/Organization">
  <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
  <link itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" />

  <div class="container">
    <div class="Footer_top__ABIpX">

      <!-- LOGO -->
      <a href="<?php echo esc_url(home_url('/')); ?>"
         class=""
         aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> — на главную">
        <?php if (function_exists('the_custom_logo') && has_custom_logo()): ?>
          <?php the_custom_logo(); ?>
        <?php else: ?>
          <span class="Footer_logo__text"><?php bloginfo('name'); ?></span>
        <?php endif; ?>
      </a>

      <!-- INFO -->
      <div class="Footer_info__RSqvJ">
        <p itemprop="description">
          Разработка сайтов, интернет-магазинов и кастомных решений на WordPress и WooCommerce.<br />
          Кастомные темы, плагины, интеграции, оптимизация скорости и техническая поддержка.<br /><br />
          © <?php echo (int)date('Y'); ?>. Все права защищены.
        </p>

        <div class="Footer_infoBottom__SwCRD">

          <!-- CONTACTS: address только для контактов -->
          <address class="Footer_infoCall__ShIDF" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <a aria-label="Позвонить"
               href="tel:<?php echo esc_attr($phone_raw); ?>"
               itemprop="telephone"><?php echo esc_html($phone_human); ?></a>

            <a aria-label="Написать на email"
               href="mailto:<?php echo esc_attr($email); ?>"
               itemprop="email"><?php echo esc_html($email); ?></a>
          </address>

          <div class="Footer_infoSocials__Spv5L" aria-label="Социальные сети">
            <a href="<?php echo esc_url($tg_url); ?>"
               rel="nofollow noopener noreferrer"
               target="_blank"
               title="Telegram"
               aria-label="Написать в Telegram">
              <i class="icon-social-tg"></i>
            </a>

            <a href="<?php echo esc_url($wa_url); ?>"
               rel="nofollow noopener noreferrer"
               target="_blank"
               title="WhatsApp"
               aria-label="Написать в WhatsApp">
              <i class="fa-brands fa-whatsapp social-icon"></i>
            </a>

            <a href="<?php echo esc_url($li_url); ?>"
               rel="nofollow noopener noreferrer"
               target="_blank"
               title="LinkedIn"
               aria-label="Открыть LinkedIn">
              <i class="fa-brands fa-linkedin-in social-icon"></i>
            </a>
          </div>

        </div>

        <!-- LEGAL LINKS (рекомендую) -->
        <div class="Footer_legal" aria-label="Юридическая информация">
          <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Политика конфиденциальности</a>
          <a href="<?php echo esc_url(home_url('/terms/')); ?>">Условия и оферта</a>
        </div>
      </div>

      <!-- MENU: SERVICES -->
      <div class="Footer_menu__cXTii">
        <span>Услуги</span>

        <nav aria-label="Услуги WordPress">
          <a href="<?php echo esc_url(home_url('/uslugi/')); ?>" title="Услуги WordPress и WooCommerce">Все услуги</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/lending-sajt-vizitka-na-wordpress/'); ?>" title="Лендинги и сайты-визитки на WordPress">Лендинги / сайты-визитки</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/internet-magazin-na-woocommerce/'); ?>" title="Интернет-магазины на WooCommerce">Интернет-магазины на WooCommerce</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/sajt-doska-obyavlenij-katalog/'); ?>" title="Каталоги и доски объявлений на WordPress">Каталоги / доски объявлений</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/razrabotka-plaginov-pod-vashi-zadachi/'); ?>" title="Разработка плагинов WordPress">Разработка плагинов</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/eksport-import-tovarov-i-integraczii/'); ?>" title="Импорт и интеграции WooCommerce">Импорт / интеграции</a>
          <a href="<?php echo esc_url('https://wpdevstudio.ru/uslugi/podderzhka-i-dorabotki-wordpress-sajtov/'); ?>" title="Поддержка и доработка WordPress сайтов">Поддержка и доработки</a>
        </nav>

        <!-- Reviews proof block -->
        <section class="reviewsProof" aria-label="Отзывы клиентов">
          <div class="reviewsProof__card" role="group">
            <div class="reviewsProof__left">
              <div class="reviewsProof__label">Отзывы клиентов</div>
              <div class="reviewsProof__sub">
                Подтверждено внешней платформой
                <a class="reviewsProof__source"
                   href="<?php echo esc_url($profi_url); ?>"
                   target="_blank"
                   rel="nofollow noopener noreferrer"
                   aria-label="Открыть отзывы на внешней платформе">
                  Profi.ru
                </a>
              </div>
            </div>

            <div class="reviewsProof__right"
                 aria-label="<?php echo esc_attr('Рейтинг ' . $reviews_rating . ' на основе ' . $reviews_count . ' отзывов'); ?>">
              <div class="reviewsProof__rate">
                <span class="reviewsProof__star" aria-hidden="true">★</span>
                <span class="reviewsProof__value"><?php echo esc_html($reviews_rating); ?></span>
              </div>
              <div class="reviewsProof__count"><?php echo (int)$reviews_count; ?> отзывов</div>
            </div>
          </div>
        </section>
      </div>

      <!-- MENU: SOLUTIONS -->
      <div class="Footer_menu__cXTii">
        <span>Решения</span>

        <nav aria-label="Подбор решений">
          <a href="<?php echo esc_url('https://themeforest.net/category/wordpress/ecommerce'); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             title="Современные темы и шаблоны для WordPress и eCommerce">
            Современные шаблоны
          </a>

          <a href="<?php echo esc_url('https://listinghive.hivepress.io'); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             title="Демо каталогов и досок объявлений на HivePress">
            Каталоги и доски объявлений
          </a>

          <a href="<?php echo esc_url('https://crocoblock.com/'); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             title="Интеграции и автоматизация (JetEngine/ACF и т.п.)">
            Интеграции и автоматизация
          </a>

          <a href="<?php echo esc_url('https://wp-rocket.me/'); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             title="Оптимизация скорости WordPress (кэш, CWV, аудит)">
            Оптимизация скорости и аудит
          </a>
        </nav>
		  
		  
		  <?php echo do_shortcode('[wpds_subscribe title="Подписка" desc="" btn="Ок" class="wpds-footer-mini" consent="Согласен(на) с политикой и условиями." ]'); ?>
		  
		  
      </div>

    </div>
  </div>

  <hr />

  <div class="container">
    <!-- НЕ address: это не контакты -->
    <section class="Footer_bottom__0_OYk" aria-label="Информация о работе">
      <ul class="Footer_more__Wx0Cp">
        <li>
          <span>Онлайн</span>
          <p>Работаем удалённо с клиентами по России, Беларуси и Европе.</p>
        </li>
        <li>
          <span>Связаться</span>
          <p>Напишите в Telegram или на email — ответим на вопросы и предложим варианты реализации проекта.</p>
        </li>
        <li>
          <span>Формат работы</span>
          <p>Фриланс / аутсорс / постоянная техподдержка проектов на WordPress и WooCommerce.</p>
        </li>
      </ul>
    </section>
  </div>

  <div class="Footer_ps__HPAPT">
    <hr />
    <div class="container">
      <p>
        Разработка и поддержка сайтов на WordPress и WooCommerce. Кастомные темы, плагины, интеграции, ускорение и техподдержка.<br />
        © <?php echo (int)date('Y'); ?>. Все права защищены.
      </p>
    </div>
  </div>
</footer>

<!-- Back to top button (если используешь) -->
<div class="useNavigationMenu_wrapper__g0Elx" id="useNavigationMenu">
  <button class="useNavigationMenu_btn__vCKbM useNavigationMenu_btnWhite__YgOZn useNavigationMenu_btnToTop__HnZw8"
          type="button"
          aria-label="Прокрутить страницу наверх">
    <i class="icon-arrow-up" aria-hidden="true"></i>
  </button>
</div>

<!-- Floating widget: соцсети + кнопка "вверх" -->
<div class="FloatingWidget" id="floating-widget">
  <button class="FloatingWidget__scrollTop" type="button" aria-label="Прокрутить страницу наверх">
    <span class="FloatingWidget__scrollTopIcon" aria-hidden="true">
      <img src="<?php echo esc_url($theme_uri . '/images/arrow-up-02.svg'); ?>" alt="" />
    </span>
  </button>

  <button class="FloatingWidget__toggle"
          type="button"
          aria-label="Открыть контакты"
          aria-expanded="false"
          aria-controls="floating-widget-socials">
    <img src="<?php echo esc_url($theme_uri . '/images/message-01.svg'); ?>"
         alt=""
         class="FloatingWidget__avatar FloatingWidget__avatar--primary" />
    <img src="<?php echo esc_url($theme_uri . '/images/cross-white.svg'); ?>"
         alt=""
         class="FloatingWidget__avatar FloatingWidget__avatar--secondary" />
    <span class="FloatingWidget__pulse" aria-hidden="true"></span>
  </button>

  <div class="FloatingWidget__socials" id="floating-widget-socials" aria-label="Контакты" hidden>
    <a href="<?php echo esc_url($wa_url); ?>"
       class="FloatingWidget__item FloatingWidget__item--whatsapp"
       target="_blank"
       rel="nofollow noopener noreferrer"
       aria-label="Написать в WhatsApp">
      <span class="FloatingWidget__icon" aria-hidden="true">
        <!-- WhatsApp SVG -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.1 3.9C17.9 1.7 15 0.5 12 0.5C5.8 0.5 0.8 5.4 0.8 11.7C0.8 14.2 1.5 16.6 2.9 18.7L1.6 23.2L6.3 22C8.3 23.2 10.6 23.9 12.9 23.9H13C19.2 23.9 24.2 19 24.2 12.7C24.2 9.7 23 6.8 20.8 4.6L20.1 3.9ZM12 21.4C10 21.4 8.1 20.8 6.5 19.6L6.2 19.4L3.4 20.1L4.3 17.2L4.1 16.9C2.9 15.2 2.3 13.5 2.3 11.7C2.3 6.3 6.6 2 12 2C14.7 2 17.2 3.1 19.1 5C21 6.9 22.1 9.4 22.1 12.1C22.1 17.5 17.7 21.4 12 21.4ZM17.3 14.3C17 14.1 15.7 13.5 15.5 13.4C15.2 13.3 15 13.3 14.8 13.6C14.6 13.9 14.1 14.5 14 14.6C13.9 14.7 13.8 14.8 13.6 14.7C13.4 14.6 12.5 14.3 11.4 13.4C10.5 12.6 10 11.7 9.8 11.4C9.7 11.2 9.8 11 9.9 10.9C10 10.8 10.2 10.5 10.3 10.4C10.4 10.3 10.4 10.2 10.5 10.1C10.6 9.9 10.6 9.8 10.5 9.6C10.4 9.5 9.9 8.2 9.7 7.6C9.5 7 9.2 7.1 9 7.1C8.8 7.1 8.6 7.1 8.3 7.1C8 7.1 7.6 7.3 7.3 7.6C7 7.9 6.3 8.7 6.3 10.1C6.3 11.6 7.4 13.1 7.6 13.4C7.8 13.7 9.5 16.3 12.3 17.4C15.1 18.5 15.4 18.2 16.3 18.1C17.2 18 18.4 17.3 18.7 16.6C19 15.9 19 15.3 18.9 15.1C18.7 14.9 17.6 14.4 17.3 14.3Z" fill="#fff"/>
        </svg>
      </span>
    </a>

    <a href="<?php echo esc_url($tg_url); ?>"
       class="FloatingWidget__item FloatingWidget__item--telegram"
       target="_blank"
       rel="nofollow noopener noreferrer"
       aria-label="Написать в Telegram">
      <span class="FloatingWidget__icon" aria-hidden="true">
        <!-- Telegram SVG -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.99978 15.2L9.69978 19C10.0998 19 10.2998 18.8 10.4998 18.6L12.3998 16.8L16.1998 19.6C16.8998 20 17.3998 19.8 17.5998 19L20.0998 7.8C20.3998 6.8 19.7998 6.4 19.0998 6.7L4.29978 12.3C3.29978 12.7 3.29978 13.3 4.09978 13.5L7.89978 14.7L16.2998 9.4C16.6998 9.2 17.0998 9.3 16.7998 9.6L9.99978 15.2Z" fill="#fff"/>
        </svg>
      </span>
    </a>

    <a href="<?php echo esc_url($li_url); ?>"
       class="FloatingWidget__item FloatingWidget__item--linkedIn"
       target="_blank"
       rel="nofollow noopener noreferrer"
       aria-label="Открыть LinkedIn">
      <span class="FloatingWidget__icon" style="background-color:#3375b0;" aria-hidden="true">
        <!-- LinkedIn SVG -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.94 8.5H3.75V20.25H6.94V8.5ZM5.34 3.75C4.32 3.75 3.5 4.58 3.5 5.6C3.5 6.61 4.32 7.44 5.34 7.44C6.35 7.44 7.18 6.61 7.18 5.6C7.18 4.58 6.35 3.75 5.34 3.75ZM20.25 13.2C20.25 10.56 18.84 8.25 15.73 8.25C14.22 8.25 13.2 9.08 12.78 9.87H12.74V8.5H9.7V20.25H12.89V14.45C12.89 12.92 13.18 11.45 15.08 11.45C16.95 11.45 16.98 13.2 16.98 14.55V20.25H20.25V13.2Z"/>
        </svg>
      </span>
    </a>
  </div>
</div>

<style>
/* === маленькие стили (лучше вынести в CSS файл) === */
.social-icon { font-size: 24px !important; line-height: 1; }
.social-icon:hover { color: #e01b24; transform: translateY(-1px); }

.Footer_logo__txlnn { display:flex; justify-content:center; align-items:center; width:100%; max-width:100%; overflow:hidden; }
.Footer_logo__txlnn img { width:200px; max-width:100%; height:auto; display:block; }

.Footer_legal { margin-top: 14px; display:flex; flex-wrap:wrap; gap:12px; font-size: 13px; }
.Footer_legal a { opacity:.9; text-decoration:none; }
.Footer_legal a:hover { opacity:1; text-decoration:underline; }

/* Reviews proof */
.reviewsProof { margin: 32px 0; }
.reviewsProof__card{
  display:flex; align-items:center; justify-content:space-between; gap:18px;
  padding:18px 20px; border-radius:16px;
  background:#fff; border:1px solid rgba(204, 22, 22, 0.25);
  box-shadow:0 6px 18px rgba(204, 22, 22, 0.08);
}
.reviewsProof__label{ font-size:16px; font-weight:700; line-height:1.25; color:#111; }
.reviewsProof__sub{ margin-top:6px; font-size:13px; color:#666; }
.reviewsProof__source{ font-weight:600; color:#cc1616; text-decoration:none; }
.reviewsProof__source:hover{ text-decoration:underline; }
.reviewsProof__right{ text-align:right; }
.reviewsProof__rate{ display:inline-flex; align-items:center; gap:8px; }
.reviewsProof__star{ font-size:20px; color:#cc1616; line-height:1; }
.reviewsProof__value{ font-size:20px; font-weight:800; color:#cc1616; }
.reviewsProof__count{ margin-top:4px; font-size:12px; color:#777; }
@media (max-width:520px){
  .reviewsProof__card{ flex-direction:column; align-items:flex-start; }
  .reviewsProof__right{ text-align:left; }
}

.Footer_infoCall__ShIDF{
	display: block;
}

</style>

<style>
	/* Контейнер виджета */
.FloatingWidget {
    position: fixed;
    right: 24px;
    bottom: 24px;
    z-index: 9999;
    display: flex;
    flex-direction: column-reverse;
    align-items: flex-end;
    gap: 10px;

    opacity: 0;
    transform: translateY(40px);
    pointer-events: none;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

/* Появление при скролле */
.FloatingWidget.is-visible {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

/* Кнопка-аватар */
.FloatingWidget__toggle {
    position: relative;
    border: none;
    padding: 0;
    margin: 0;
    background: linear-gradient(135deg, #111, #444);
    border-radius: 50%;
    width: 64px;
    height: 64px;
    cursor: pointer;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.FloatingWidget__toggle:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
}

/* Аватарки */
.FloatingWidget__avatar {
    position: absolute;
	margin: auto;
    inset: 0;
    height: 40px;
    width: 40px;
    object-fit: cover;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

.FloatingWidget__avatar--primary {
    opacity: 1;
    transform: scale(1);
}

.FloatingWidget__avatar--secondary {
    opacity: 0;
    transform: scale(0.9) rotate(-4deg);
}

/* При открытии меняем аватарку */
.FloatingWidget.is-open .FloatingWidget__avatar--primary {
    opacity: 0;
    transform: scale(0.9) rotate(4deg);
}

.FloatingWidget.is-open .FloatingWidget__avatar--secondary {
    opacity: 1;
    transform: scale(1);
}

/* Пульсация по контуру */
.FloatingWidget__pulse {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.35);
    animation: floatingWidgetPulse 1.8s infinite;
    pointer-events: none;
}

@keyframes floatingWidgetPulse {
    0% {
        transform: scale(1);
        opacity: 0.9;
    }
    70% {
        transform: scale(1.4);
        opacity: 0;
    }
    100% {
        transform: scale(1.4);
        opacity: 0;
    }
}

/* Блок соцсетей */
.FloatingWidget__socials {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 8px;
}

/* Иконки соцсетей по умолчанию скрыты */
.FloatingWidget__item {
    width: 44px;
    height: 44px;
    border-radius: 999px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;

    opacity: 0;
    transform: translateY(8px) scale(0.8);
    pointer-events: none;

    transition:
        opacity 0.2s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease,
        background 0.2s ease;
}

/* При открытии показываем иконки */
.FloatingWidget.is-open .FloatingWidget__item {
    opacity: 1;
    transform: translateY(0) scale(1);
    pointer-events: auto;
}

/* Немного тайминга, чтобы выезжали каскадом */
.FloatingWidget.is-open .FloatingWidget__item:nth-child(1) {
    transition-delay: 0.02s;
}
.FloatingWidget.is-open .FloatingWidget__item:nth-child(2) {
    transition-delay: 0.06s;
}
.FloatingWidget.is-open .FloatingWidget__item:nth-child(3) {
    transition-delay: 0.1s;
}

/* Внутренняя "круглая" иконка */
.FloatingWidget__icon {
    width: 100%;
    height: 100%;
    border-radius: inherit;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #fff;
}

/* Цвета для соцсетей */
.FloatingWidget__item--whatsapp .FloatingWidget__icon {
    background: radial-gradient(circle at 30% 0%, #6dffb2, #25d366);
}
.FloatingWidget__item--telegram .FloatingWidget__icon {
    background: radial-gradient(circle at 30% 0%, #71c4ff, #229ed9);
}
.FloatingWidget__item--vk .FloatingWidget__icon {
    background: radial-gradient(circle at 30% 0%, #7ca6ff, #0077ff);
}

.FloatingWidget__item:hover .FloatingWidget__icon {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    transform: translateY(-1px) scale(1.03);
}

/* Кнопка "наверх" */
.FloatingWidget__scrollTop {
    width: 44px;
    height: 44px;
    border-radius: 999px;
    background: linear-gradient(135deg, #111, #444);
    color: #fff;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;

    opacity: 0;
    transform: translateY(8px) scale(0.8);
    pointer-events: none;

    transition:
        opacity 0.2s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.35);
}

/* Показываем кнопку вместе с виджетом */
.FloatingWidget.is-visible .FloatingWidget__scrollTop {
    opacity: 1;
    transform: translateY(0) scale(1);
    pointer-events: auto;
}

.FloatingWidget__scrollTop:hover {
    transform: translateY(-1px) scale(1.05);
    box-shadow: 0 14px 34px rgba(0,0,0,0.45);
}

/* Стрелка */
.FloatingWidget__scrollTopIcon {
    font-size: 18px;
    line-height: 1;
    pointer-events: none;
    font-weight: 700;
}

/* Адаптив: на мобиле чуть ближе к краю */
@media (max-width: 767px) {
    .FloatingWidget {
        right: 16px;
        bottom: 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // ===== FloatingWidget улучшенный (aria + закрытие вне/esc) =====
  const widget = document.getElementById('floating-widget');
  if (widget) {
    const toggleBtn = widget.querySelector('.FloatingWidget__toggle');
    const socials   = widget.querySelector('#floating-widget-socials');
    const scrollTop = widget.querySelector('.FloatingWidget__scrollTop');

    const showOffset = 400;

    function setOpen(state){
      widget.classList.toggle('is-open', state);
      if (toggleBtn) toggleBtn.setAttribute('aria-expanded', state ? 'true' : 'false');
      if (socials) socials.hidden = !state;
    }

    function handleScroll(){
      if (window.scrollY > showOffset) {
        widget.classList.add('is-visible');
      } else {
        widget.classList.remove('is-visible');
        setOpen(false);
      }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    if (toggleBtn) {
      toggleBtn.addEventListener('click', function(){
        const isOpen = widget.classList.contains('is-open');
        setOpen(!isOpen);
      });
    }

    // закрыть по клику вне
    document.addEventListener('click', function(e){
      if (!widget.classList.contains('is-open')) return;
      if (e.target.closest('#floating-widget')) return;
      setOpen(false);
    });

    // закрыть по Escape
    document.addEventListener('keydown', function(e){
      if (e.key === 'Escape' && widget.classList.contains('is-open')) {
        setOpen(false);
      }
    });

    if (scrollTop) {
      scrollTop.addEventListener('click', function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }
  }

  // ===== Кнопка "вверх" useNavigationMenu (если используешь) =====
  const toTop = document.querySelector('#useNavigationMenu .useNavigationMenu_btnToTop__HnZw8');
  if (toTop) {
    toTop.addEventListener('click', function(){
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
</script>

<?php wp_footer(); ?>
</body>
</html>



