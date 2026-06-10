<?php
/**
 * Шапка темы
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="theme-color" content="#171d25">
	
  <link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">


	
	
	
	
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/4e81fe9cba68eadc.p.woff" rel="preload" type="font/woff" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/4e9f72a65512bf0b.p.woff2" rel="preload" type="font/woff2" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/5f4839c814e9ec59.p.woff" rel="preload" type="font/woff" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/8acb5781ce311ba9.p.woff" rel="preload" type="font/woff" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/90b1a89cbb9b3d98.p.woff" rel="preload" type="font/woff" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/cb69f42f23add4da.p.woff2" rel="preload" type="font/woff2" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/d075a7d17840152b.p.woff" rel="preload" type="font/woff" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/f309061b3925d96a.p.woff2" rel="preload" type="font/woff2" />
    <link as="font" crossorigin="" href="https://itb-company.com/_next/static/media/f44edb0a615a70fd.p.woff2" rel="preload" type="font/woff2" />

	

<?php
/* CSS подключается через wp_enqueue_style() в functions.php,
 * чтобы WordPress мог управлять порядком, версиями и дублями ресурсов. */
?>

<?php wp_head(); ?>	
</head>

<body <?php body_class("__variable_69a85b __variable_e2af37 __variable_64f3dc"); ?>>
<?php wp_body_open(); ?>
	
	
	
	
	
	
	
<section class="wps-marquee" aria-label="Преимущества и акции">
	<div class="wps-marquee__track">
		<div class="wps-marquee__line">

			<!-- ОФФЕР (главный акцент) -->
			<span class="wps-marquee__promo">
				Есть готовая верстка? Дам −15% на разработку и полностью возьму на себя функционал
			</span>

			<!-- Обычные пункты -->
			<span>WordPress под ключ</span>
			<span>WooCommerce-магазины</span>
			<span>Кастомные плагины</span>
			<span>Интеграции API и CRM</span>
			<span>SEO-структура</span>
			<span>Поддержка после запуска</span>

			<!-- Дублируем для бесконечного скролла -->
			<span class="wps-marquee__promo">
				Есть готовая верстка? Дам −15% на разработку и полностью возьму на себя функционал
			</span>

			<span>WordPress под ключ</span>
			<span>WooCommerce-магазины</span>
			<span>Кастомные плагины</span>
			<span>Интеграции API и CRM</span>
			<span>SEO-структура</span>
			<span>Поддержка после запуска</span>

		</div>
	</div>
</section>
		
<style>

body{
	
}	
.wps-marquee {
	position: relative;
	overflow: hidden;
	padding: 18px 0;
	background: #f6faf7;
	border-top: 1px solid rgba(18, 212, 87, 0.14);
	border-bottom: 1px solid rgba(18, 212, 87, 0.14);
}

.wps-marquee__track {
	overflow: hidden;
	white-space: nowrap;
}

.wps-marquee__line {
	display: inline-flex;
	align-items: center;
	gap: 14px;
	min-width: max-content;
	animation: wpsMarquee 28s linear infinite;
}

.wps-marquee:hover .wps-marquee__line {
	animation-play-state: paused;
}

/* обычные пункты */
.wps-marquee__line span {
	display: inline-flex;
	align-items: center;
	padding: 10px 18px;
	border-radius: 999px;
	background: #ffffff;
	border: 1px solid rgba(18, 212, 87, 0.18);
	box-shadow: 0 8px 24px rgba(16, 24, 40, 0.04);
	color: #1A1A1A !important;
	font-size: 15px;
	font-weight: 600;
	line-height: 1;
}

.wps-marquee__line span::before {
	content: "";
	width: 7px;
	height: 7px;
	margin-right: 10px;
	border-radius: 50%;
	background: #12D457;
	box-shadow: 0 0 0 4px rgba(18, 212, 87, 0.12);
}

/* 🔥 ОФФЕР */
.wps-marquee__promo {
	background: linear-gradient(135deg, #12D457, #0fb94a);
	color: #fff !important;
	border: none;
	font-weight: 700;
	padding: 12px 22px;
	box-shadow: 0 12px 32px rgba(18, 212, 87, 0.25);
}

.wps-marquee__promo::before {
	display: none;
}

@keyframes wpsMarquee {
	from {
		transform: translateX(0);
	}
	to {
		transform: translateX(-50%);
	}
}

/* мобилка */
@media (max-width: 767px) {
	.wps-marquee {
		padding: 14px 0;
	}

	.wps-marquee__line {
		animation-duration: 22s;
		gap: 10px;
	}

	.wps-marquee__line span {
		padding: 9px 14px;
		font-size: 13px;
	}
}
</style>
	
	
	
	
    <header class="Header_wrapper__SrnCi" id="header" style="background-color: #1a2028; background-image: none;">
			
        <div class="container">
            <div>
                <div class="Header_desktop__yo7Pv">
                    <div class="Header_top__mscfr">
<div class="HeaderTopMenu TopMenu_nav__fpyTD Header_menu__oVirN">
    <div class="HeaderTopUSP">
    <span>Разработка сайтов от 7 дней</span>
    <span>WooCommerce под бизнес-задачи</span>
</div>
</div>
						
			
						
<style>
	
.HeaderTopUSP {
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 13px;
    line-height: 1.2;
    color: rgba(255, 255, 255, 0.75);
    white-space: nowrap;
}

.HeaderTopUSP span {
    position: relative;
    padding-left: 14px;
}

.HeaderTopUSP span::before {
    content: "•";
    position: absolute;
    left: 0;
    top: 0;
    color: #ff3b3b; /* акцент под твой бренд */
}

</style>

                      
    <style data-emotion="css 0 jkscjg 79elbk 13m1if9 1xh6k8t">
        .css-jkscjg {
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            position: relative;
            font-size: 1.5rem;
            color: #faaf00;
            cursor: pointer;
            text-align: left;
            width: -webkit-min-content;
            width: -moz-min-content;
            width: min-content;
            -webkit-tap-highlight-color: transparent;
            pointer-events: none;
        }

        .css-jkscjg.Mui-disabled {
            opacity: 0.38;
            pointer-events: none;
        }

        .css-jkscjg.Mui-focusVisible .MuiRating-iconActive {
            outline: 1px solid #999;
        }

        .css-jkscjg .MuiRating-visuallyHidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

        .css-79elbk {
            position: relative;
        }

        .css-13m1if9 {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-transition: -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            pointer-events: none;
        }

        .css-1xh6k8t {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-transition: -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            pointer-events: none;
            color: rgba(0, 0, 0, 0.26);
        }
		
		.BottomMenu_menu___1ce2>li, .HeaderTopMenu_list > li > a, .Header_contacts .contact-item{
			color: #ffff !important;
		}
    </style>                    
						
						
                       <address class="Header_contacts" style="margin-bottom: 0;">

    <!-- Телефон -->
    <a href="tel:+79250404189"
       class="contact-item contact-phone" rel="nofollow">
        <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path d="M8.38 8.853a14.603 14.603 0 0 0 2.847 4.01 14.603 14.603 0 0 0 4.01 2.847c.124.06.187.09.265.112.28.082.625.023.862-.147.067-.048.124-.105.239-.219.35-.35.524-.524.7-.639a2 2 0 0 1 2.18 0c.176.115.35.29.7.64l.195.194c.532.531.797.797.942 1.082a2 2 0 0 1 0 1.806c-.145.285-.41.551-.942 1.082l-.157.158c-.53.53-.795.794-1.155.997-.4.224-1.02.386-1.478.384-.413-.001-.695-.081-1.26-.241a19.038 19.038 0 0 1-8.283-4.874A19.039 19.039 0 0 1 3.17 7.761c-.16-.564-.24-.846-.241-1.26a3.377 3.377 0 0 1 .384-1.477c.202-.36.467-.625.997-1.155l.157-.158c.532-.53.798-.797 1.083-.941a2 2 0 0 1 1.805 0c.286.144.551.41 1.083.942l.195.194c.35.35.524.525.638.7a2 2 0 0 1 0 2.18c-.114.177-.289.352-.638.701-.115.114-.172.172-.22.238-.17.238-.228.582-.147.862.023.08.053.142.113.266Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        <span>+7 (9250) 40-41-89</span>
    </a>

    <!-- Email -->
    <a href="mailto:info@wpdevstudio.ru"
       class="contact-item contact-email">
        <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path d="m2 7 8.165 5.715c.661.463.992.695 1.351.784a2 2 0 0 0 .968 0c.36-.09.69-.32 1.351-.784L22 7M6.8 20h10.4c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.311-1.311C22 17.72 22 16.88 22 15.2V8.8c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311C19.72 4 18.88 4 17.2 4H6.8c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.311 1.311C2 6.28 2 7.12 2 8.8v6.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311C4.28 20 5.12 20 6.8 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        <span>info@wpdevstudio.ru</span>
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/79250404189"
       target="_blank" rel="nofollow"
       class="contact-item contact-whatsapp">
        <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_2815_120097)"><path fill-rule="evenodd" clip-rule="evenodd" d="m2.219 17.097-1.62 5.91 6.055-1.586a11.405 11.405 0 0 0 5.45 1.39 11.405 11.405 0 1 0-9.885-5.714Zm15.24-3.239c.2.096.335.16.392.258.071.118.086.682-.158 1.347-.245.665-1.384 1.274-1.93 1.355-.6.102-1.214.063-1.796-.114a16.204 16.204 0 0 1-1.625-.6c-2.667-1.15-4.47-3.731-4.816-4.228a3.221 3.221 0 0 0-.053-.074c-.144-.192-1.164-1.547-1.164-2.95a3.197 3.197 0 0 1 .997-2.358 1.049 1.049 0 0 1 .772-.358c.064 0 .126-.002.188-.003.121-.002.239-.004.357.003h.073c.165-.002.365-.005.57.49l.223.542c.265.644.603 1.467.657 1.573a.53.53 0 0 1 .023.5 1.895 1.895 0 0 1-.285.476c-.054.062-.108.127-.162.192-.089.106-.177.213-.267.308l-.012.012c-.14.148-.275.292-.112.57a8.579 8.579 0 0 0 1.585 1.974 7.788 7.788 0 0 0 2.28 1.414c.282.143.452.12.617-.071.165-.191.708-.832.9-1.117.194-.286.382-.24.644-.144s1.662.787 1.947.928c.056.028.107.053.155.075Z" fill="#25D366"></path></g><defs><clipPath id="clip0_2815_120097"><path fill="#fff" d="M0 0h24v24H0z"></path></clipPath></defs></svg>
        <span>WhatsApp</span>
    </a>

    <!-- Telegram -->
    <a href="https://t.me/+79250404189"
   target="_blank" rel="nofollow"
   class="contact-item contact-telegram">

    <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_2815_120133)"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 12c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12ZM12.429 8.854c-1.168.488-3.5 1.494-6.998 3.019-.569.226-.865.444-.89.653-.047.366.41.509 1.035.705l.261.083c.613.2 1.437.432 1.866.44.388.01.822-.15 1.3-.48 3.27-2.205 4.956-3.32 5.062-3.344a.276.276 0 0 1 .249.024.245.245 0 0 1 .056.213c-.046.192-1.825 1.847-2.758 2.714-.296.276-.507.472-.55.516a10.44 10.44 0 0 1-.284.282c-.568.549-.992.958.027 1.629.486.32.875.586 1.263.85.43.293.859.585 1.414.95.139.09.272.186.4.278.5.357.947.677 1.5.627.32-.023.653-.325.82-1.23.397-2.126 1.178-6.73 1.359-8.628a2.11 2.11 0 0 0-.02-.473.506.506 0 0 0-.17-.324.79.79 0 0 0-.465-.14c-.452.008-1.144.25-4.477 1.636Z" fill="#28A8E9"></path></g><defs><clipPath id="clip0_2815_120133"><path fill="#fff" d="M0 0h24v24H0z"></path></clipPath></defs></svg>

    <span>Telegram</span>
</a>


</address>
					

						
<style>
	
	/* Общий контейнер */
.Header_contacts {
    display: flex;
    align-items: center;
    gap: 20px; 
    font-style: normal; /* убираем italic от <address> */
}

/* Элемент контакта */
.Header_contacts .contact-item {
    display: flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    color: #171717;
    font-size: 14px;
    transition: opacity .2s ease;
}

.Header_contacts .contact-item:hover {
    opacity: .7;
}

/* Иконки (SVG / PNG / WebP) */
.contact-icon {
    width: 16px;
    height: 16px;
    display: block;
}

/* По желанию: индивидуальный стиль */
.contact-whatsapp .contact-icon {
    filter: drop-shadow(0 0 0 #25D366);
}

.contact-telegram .contact-icon {
    filter: drop-shadow(0 0 0 #0088cc);
}

.contact-email .contact-icon {
    filter: drop-shadow(0 0 0 #ffb600);
}

</style>
						
						
						
<!-- Добавление в корзину						 -->
										
<?php echo do_shortcode('[kwork_cart_icon]'); ?>

<style>
/* =========================
   CART ICON (SOLID GREEN)
========================= */
.kworkCartIcon{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:10px 12px;
  border-radius:14px;

  text-decoration:none;
  color: #ffffff;
  transition: transform .15s ease, background .15s ease, border-color .15s ease;
}

.kworkCartIcon__svg{
  font-size: 16px;
}

.kworkCartIcon__count{
  min-width: 22px;
  height: 22px;
  border-radius: 999px;

  display:inline-flex;
  align-items:center;
  justify-content:center;

  font-size: 12px;
  font-weight: 900;

  background: #1e8f4a;
  color: #ffffff;
}


/* =========================
   TOAST POPUP (TOP CENTER, SOLID)
========================= */
.kworkToast{
  position: fixed;
  left: 50%;
  top: 18px;
  z-index: 99999;

  transform: translate(-50%, -14px);
  opacity: 0;
  pointer-events: none;
  transition: opacity .18s ease, transform .18s ease;
}

.kworkToast.is-show{
  opacity: 1;
  transform: translate(-50%, 0);
  pointer-events: auto;
}

/* Карточка */
.kworkToast__inner{
  width: min(520px, calc(100vw - 28px));
  border-radius: 18px;

  background: #2e7d32;
  border: 1px solid #1e8f4a;

  box-shadow: 0 18px 42px rgba(0,0,0,.45);
  padding: 14px 16px;

  display:flex;
  align-items:center;
  gap: 14px;
}

/* Иконка слева */
.kworkToast__inner::before{
  content: "✓";
  width: 30px;
  height: 30px;
  border-radius: 999px;

  display:inline-flex;
  align-items:center;
  justify-content:center;

  background: #1e8f4a;
  color: #ffffff;
  font-weight: 900;
  flex: 0 0 auto;
}

/* Текст */
.kworkToast__title{
  font-size: 14px;
  font-weight: 900;
  color: #ffffff;
  line-height: 1.2;
}

/* Кнопка */
.kworkToast__btn{
  margin-left: auto;
  display:inline-flex;

  text-decoration:none;
  font-weight: 900;
  font-size: 13px;

  padding: 10px 12px;
  border-radius: 14px;

  background: #ffffff;
  color: #0e0e0e;

  border: none;
  transition: transform .15s ease, background .15s ease;
  white-space: nowrap;
}

.kworkToast__btn:hover{
  transform: translateY(-1px);
  background: #f2f2f2;
}

/* Мобилка */
@media (max-width: 520px){
  .kworkToast__inner{
    gap: 10px;
    padding: 12px 12px;
  }
  .kworkToast__btn{
    padding: 9px 10px;
    border-radius: 12px;
  }
}

</style>
						
						
						
                    </div>
                    <div class="Header_bottom__bCm5E"><span class="Header_logo__NDclg" title="Главная">
					
<a class="HeaderLogo"
   href="<?php echo esc_url( home_url('/') ); ?>"
   aria-label="<?php echo esc_attr( get_bloginfo('name') ); ?> — <?php esc_attr_e('на главную', 'your-theme'); ?>">

  <?php if ( function_exists('the_custom_logo') && has_custom_logo() ) : ?>
    <?php the_custom_logo(); ?>
  <?php else : ?>
    <span class="HeaderLogo__text"><?php bloginfo('name'); ?></span>
  <?php endif; ?>

</a>
						
<style>
	.custom-logo {
       max-width: 200px !important;
       height: auto;
}
</style>


						
						</span>
                        
						
						
						
						<nav class="HeaderBottomMenu__wrapper Header_menu__oVirN">
    <?php
    wp_nav_menu( [
        'theme_location' => 'header_bottom_menu',
        'container'      => false,
        'menu_class'     => 'HeaderBottomMenu BottomMenu_menu___1ce2',
        'depth'          => 3, // нам достаточно 2х уровней для мегаменю
        'fallback_cb'    => false,
        'walker'         => new DevStudio_Header_Bottom_Walker(),
    ] );
    ?>
</nav>
						
						
<style>
/* =========================================================
   ОБЩЕЕ
========================================================= */

/* чтобы подменю не обрезались */
.HeaderBottomMenu__submenu,
.HeaderBottomMenu__submenu > ul {
  overflow: visible !important;
}

/* сбрасываем hover-логику (если где-то есть в теме) */
.HeaderBottomMenu li:hover > ul,
.HeaderBottomMenu li:focus-within > ul {
  display: none !important;
}

/* =========================================================
   1 УРОВЕНЬ → 2 УРОВЕНЬ (мегаменю)
========================================================= */

/* li первого уровня */
.HeaderBottomMenu > li {
  position: relative;
}

/* мегаменю (2 уровень) — ЗАКРЫТО по умолчанию */
.HeaderBottomMenu > li > .HeaderBottomMenu__submenu {
  display: none !important;
}

/* открытие мегаменю ТОЛЬКО по клику */
.HeaderBottomMenu > li.is-open > .HeaderBottomMenu__submenu {
  display: block !important;
}

/* =========================================================
   2 УРОВЕНЬ → 3 УРОВЕНЬ
========================================================= */

/* li второго уровня — точка отсчёта */
.HeaderBottomMenu__submenu > ul > li {
  position: relative;
}

/* 3 уровень — закрыт */
.HeaderBottomMenu__submenu > ul > li > ul {
  position: absolute;
  top: 0;
  left: calc(100% + 10px);
  min-width: 260px;

  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 12px;
  box-shadow: 0 12px 40px rgba(0,0,0,.12);
  padding: 10px;
  z-index: 999;

  display: none !important;
}

/* открытие 3 уровня ТОЛЬКО по клику */
.HeaderBottomMenu__submenu > ul > li.is-open > ul {
  display: block !important;
}

/* =========================================================
   ССЫЛКИ
========================================================= */

.HeaderBottomMenu__submenu a {
  display: block;
  padding: 10px 12px;
  border-radius: 10px;
  text-decoration: none;
  color: #171717;
}

.HeaderBottomMenu__submenu a:hover {
  background: rgba(0,0,0,.04);
}

/* =========================================================
   СТРЕЛКИ
========================================================= */


.HeaderBottomMenu__submenu > ul > li:has(> ul) > a::after {
  content: "›";
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  opacity: .5;
}

/* =========================================================
   АКТИВНОЕ СОСТОЯНИЕ
========================================================= */

.HeaderBottomMenu > li.is-open > a,
.HeaderBottomMenu__submenu > ul > li.is-open > a {
  background: rgba(0,0,0,.05);
  border-radius: 10px;
}
	
	.HeaderBottomMenu > li.is-open > a, .HeaderBottomMenu__submenu > ul > li.is-open > a{
		background: transparent;
	}

</style>


						
<script>
document.addEventListener('click', function (e) {

  /* ===== 1 УРОВЕНЬ ===== */
  const lvl1Link = e.target.closest('.HeaderBottomMenu > li > a');
  if (lvl1Link) {
    const li = lvl1Link.parentElement;
    const submenu = li.querySelector(':scope > .HeaderBottomMenu__submenu');

    // если у пункта нет подменю — обычный переход
    if (!submenu) return;

    e.preventDefault();

    // закрываем другие мегаменю
    document.querySelectorAll('.HeaderBottomMenu > li.is-open').forEach(el => {
      if (el !== li) el.classList.remove('is-open');
    });

    li.classList.toggle('is-open');
    return;
  }

  /* ===== 2 УРОВЕНЬ ===== */
  const lvl2Link = e.target.closest('.HeaderBottomMenu__submenu > ul > li > a');
  if (lvl2Link) {
    const li = lvl2Link.parentElement;
    const submenu = li.querySelector(':scope > ul');

    // если нет 3 уровня — обычный переход
    if (!submenu) return;

    e.preventDefault();

    // закрываем соседей
    li.parentElement.querySelectorAll(':scope > li.is-open').forEach(el => {
      if (el !== li) el.classList.remove('is-open');
    });

    li.classList.toggle('is-open');
    return;
  }

  /* ===== КЛИК ВНЕ МЕНЮ — ВСЁ ЗАКРЫВАЕМ ===== */
  if (!e.target.closest('.HeaderBottomMenu')) {
    document.querySelectorAll('.HeaderBottomMenu li.is-open')
      .forEach(li => li.classList.remove('is-open'));
  }

});
</script>

				

						
						
						<a href="https://wpdevstudio.ru/#uslugi-wordpress" class="btnBlack Header_btn__uXKjs">Выбрать услугу</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
	
	
	
	
	<div class="Header_tablet__XlQYs">
  <span class="Header_logo__NDclg" title="Главная">
    <a href="<?php echo esc_url( home_url('/') ); ?>" aria-label="На главную страницу">
      <img
        src="https://wpdevstudio.ru/wp-content/uploads/2026/03/logo-mobile.png"
        alt="WP Dev Studio"
        style="width:150px;height:auto;"
      >
    </a>
  </span>

  <address class="Header_phones__7E4qC">
    <a href="tel:+79250404189" rel="nofollow" aria-label="Позвонить по номеру +7 (925) 040-41-89">
      <i class="icon-phone"></i>
      <span>+7 (925) 040-41-89</span>
    </a>
    <a href="mailto:info@wpdevstudio.ru" aria-label="Написать на почту info@wpdevstudio.ru">
      <span>info@wpdevstudio.ru</span>
    </a>
  </address>

  <a href="https://wpdevstudio.ru/#uslugi-wordpress" class="btnBlack Header_btn__uXKjs">Выбрать услугу</a>

  <button class="Header_burger__kctui" type="button" title="Меню" aria-label="Открыть меню" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</div>

	<script>
document.addEventListener('click', function(e){
  const burger = e.target.closest('.Header_burger__kctui');
  if(!burger) return;

  // Если подключено offcanvas-меню, не открываем параллельно скрытое
  // десктопное меню: двойная обработка клика мешала переходам по якорям.
  if(document.getElementById('mobileMenu')) return;

  const header = document.querySelector('#header');
  const menuWrap = header ? header.querySelector('.HeaderBottomMenu__wrapper') : null;

  burger.classList.toggle('is-open');
  burger.setAttribute('aria-expanded', burger.classList.contains('is-open') ? 'true' : 'false');

  // Показываем/прячем нижнее меню как мобильное
  if(menuWrap){
    menuWrap.classList.toggle('is-open');
  }
});
</script>

<style>
@media (max-width: 1024px){
  /* обычно десктоп-меню скрыто, откроем по бургеру */
  .HeaderBottomMenu__wrapper{
    display:none !important;
  }
  .HeaderBottomMenu__wrapper.is-open{
    display:block !important;
  }

	.Header_tablet__XlQYs{
		padding: 20px;
	}
}
</style>

	

	
	
	
<!-- Попап меню боковой (OFFCANVAS) -->
<div class="MobileMenu" id="mobileMenu" aria-hidden="true">
  <div class="MobileMenu__overlay" data-mobilemenu-close></div>

  <aside class="MobileMenu__panel" role="dialog" aria-modal="true" aria-label="Меню сайта">
    <button class="MobileMenu__close" type="button" aria-label="Закрыть меню" data-mobilemenu-close>✕</button>

    <div class="MobileMenu__header">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="MobileMenu__logo" aria-label="На главную">
        <img src="/wp-content/uploads/2025/12/logo2-2.png" alt="WP Dev Studio" style="height:28px;width:auto;">
      </a>
    </div>

    <nav class="MobileMenu__nav" aria-label="Мобильное меню">
      <?php
      wp_nav_menu([
        'theme_location' => 'header_bottom_menu',
        'container'      => false,
        'menu_class'     => 'MobileMenu__list',
        'depth'          => 3, // важно: чтобы "Услуги" могли показать 2 уровень
        'fallback_cb'    => false,
        'walker'         => class_exists('DevStudio_Header_Bottom_Walker') ? new DevStudio_Header_Bottom_Walker() : '',
      ]);
      ?>
    </nav>

    <div class="MobileMenu__footer">
      <a class="MobileMenu__btn btnBlack" href="https://wpdevstudio.ru/#uslugi-wordpress" data-mobilemenu-close>Выбрать услугу</a>

      <div class="MobileMenu__contacts">
        <a href="tel:+79250404189">+7 (925) 040-41-89</a>
        <a href="mailto:info@wpdevstudio.ru">info@wpdevstudio.ru</a>
      </div>
    </div>
  </aside>
</div>

<style>
/* =========================================================
   MOBILE OFFCANVAS
========================================================= */

/* =========================
   Smooth animated sidebar
   (замени/добавь к своему CSS)
========================= */

/* базовая обертка */
.MobileMenu{
  position: fixed;
  inset: 0;
  z-index: 10000;

  /* НЕ используем display:none — иначе анимации не будет */
  visibility: hidden;
  pointer-events: none;
}

/* состояние открыто */
.MobileMenu.is-open{
  visibility: visible;
  pointer-events: auto;
}

/* затемнение */
.MobileMenu__overlay{
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.45);

  opacity: 0;
  transition: opacity .25s ease;
  will-change: opacity;
}

/* когда открыто — плавно проявляем */
.MobileMenu.is-open .MobileMenu__overlay{
  opacity: 1;
}

/* панель */
.MobileMenu__panel{
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  width: min(88vw, 420px);
  background: #0f141c;
  color: #fff;
  box-shadow: -20px 0 60px rgba(0,0,0,.35);

  /* стартовое (закрыто) */
  transform: translate3d(110%,0,0);
  opacity: .98;

  transition: transform .32s cubic-bezier(.22,.61,.36,1), opacity .32s ease;
  will-change: transform, opacity;

  display: flex;
  flex-direction: column;
  padding: 22px 18px 18px;
}

/* открыто */
.MobileMenu.is-open .MobileMenu__panel{
  transform: translate3d(0,0,0);
  opacity: 1;
}

/* закрывающее состояние (чтобы анимация закрытия гарантированно отрабатывала) */
.MobileMenu.is-closing{
  visibility: visible;
  pointer-events: auto;
}
.MobileMenu.is-closing .MobileMenu__overlay{
  opacity: 0;
}
.MobileMenu.is-closing .MobileMenu__panel{
  transform: translate3d(110%,0,0);
  opacity: .98;
}

/* уважение к людям без анимаций */
@media (prefers-reduced-motion: reduce){
  .MobileMenu__overlay,
  .MobileMenu__panel{
    transition: none !important;
  }
}

.MobileMenu__close{
  position: absolute;
  top: 12px;
  right: 14px;
  border: 0;
  background: transparent;
  color: #fff;
  font-size: 22px;
  line-height: 1;
  cursor: pointer;
}

.MobileMenu__header{
  padding-right: 38px;
  padding-bottom: 12px;
  border-bottom: 1px solid rgba(255,255,255,.08);
  margin-bottom: 14px;
}

.MobileMenu__nav{
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  padding: 10px 4px;   /* больше воздуха */
  flex: 1;
}

/* =========================================================
   MENU LIST
========================================================= */
.MobileMenu__list{
  list-style: none;
  margin: 0;
  padding: 0;
}

.MobileMenu__list > li{
  margin: 0 0 6px;  /* расстояние между пунктами */
  padding: 0;
}

.MobileMenu__list a{
  position: relative;
  display: block;
  padding: 14px 12px;
  border-radius: 12px;
  text-decoration: none;
  color: #fff;
}

.MobileMenu__list a:hover{
  background: rgba(255,255,255,.06);
}

/* Подменю: делаем видимым (walker может рисовать .HeaderBottomMenu__submenu) */
.MobileMenu__list .HeaderBottomMenu__submenu{
  display: block !important;
}
.MobileMenu__list .HeaderBottomMenu__submenu > ul{
  list-style: none;
  margin: 8px 0 12px 14px;
  padding: 0 0 0 10px;
  border-left: 1px solid rgba(255,255,255,.10);
}
.MobileMenu__list .HeaderBottomMenu__submenu a{
  padding: 12px 12px;
  opacity: .95;
}

/* =========================================================
   "УСЛУГИ": показываем только 1 уровень внутри раздела услуг
   (т.е. показываем 2-й уровень, а 3-й прячем)
   ВАЖНО: повесь на пункт меню "Услуги" CSS-класс: menu-services
========================================================= */
.menu-services ul ul ul{
  display: none !important; /* скрыть 3 уровень внутри "Услуги" */
}

/* =========================================================
   FOOTER
========================================================= */
.MobileMenu__footer{
  border-top: 1px solid rgba(255,255,255,.08);
  padding-top: 14px;
  display: grid;
  gap: 12px;
}

.MobileMenu__btn{
  display: inline-flex;
  justify-content: center;
  align-items: center;
  padding: 12px 14px;
  border-radius: 12px;
  text-decoration: none;
}

.MobileMenu__contacts{
  display: grid;
  gap: 6px;
  font-size: 14px;
}
.MobileMenu__contacts a{
  color: #fff;
  opacity: .9;
  text-decoration: none;
}

/* Блокируем скролл страницы, когда меню открыто */
body.is-mobilemenu-open{
  overflow: hidden;
  touch-action: none;
}

/* Только мобильная версия */
@media (max-width: 1024px) {
  .icon-chevron-down {
    display: none !important;
  }
}

	
</style>

<script>
/* =========================
   Smooth open/close sidebar
   (замени свой JS на этот)
========================= */
(function(){
  const menu = document.getElementById('mobileMenu');
  if(!menu) return;

  const burger = document.querySelector('.Header_burger__kctui');
  const closeBtns = menu.querySelectorAll('[data-mobilemenu-close]');
  const panel = menu.querySelector('.MobileMenu__panel');

  const ANIM_MS = 340; // должно быть ≈ transition панели (0.32s)

  let lastFocus = null;
  let timer = null;

  function openMenu(){
    clearTimeout(timer);

    lastFocus = document.activeElement;

    menu.classList.remove('is-closing');
    menu.classList.add('is-open');
    menu.setAttribute('aria-hidden','false');

    document.body.classList.add('is-mobilemenu-open');

    if(burger){
      burger.setAttribute('aria-expanded','true');
      burger.setAttribute('aria-controls','mobileMenu');
    }

    // фокус на крестик
    const closeBtn = menu.querySelector('.MobileMenu__close');
    if(closeBtn) closeBtn.focus();

    document.addEventListener('keydown', onKeyDown);
  }

  function closeMenu(options){
    const shouldRestoreFocus = !options || options.restoreFocus !== false;
    clearTimeout(timer);

    // если уже закрыто — ничего
    if(!menu.classList.contains('is-open')) return;

    // запускаем анимированное закрытие
    menu.classList.remove('is-open');
    menu.classList.add('is-closing');
    menu.setAttribute('aria-hidden','true');

    document.body.classList.remove('is-mobilemenu-open');

    if(burger) burger.setAttribute('aria-expanded','false');

    document.removeEventListener('keydown', onKeyDown);

    // после завершения анимации полностью скрываем
    timer = setTimeout(() => {
      menu.classList.remove('is-closing');

      if(shouldRestoreFocus && lastFocus && typeof lastFocus.focus === 'function'){
        lastFocus.focus();
      }
    }, ANIM_MS);
  }

  function onKeyDown(e){
    if(e.key === 'Escape') closeMenu();
  }

  // открыть по бургеру
  if(burger){
    burger.setAttribute('type','button');
    burger.setAttribute('aria-expanded','false');
    burger.addEventListener('click', function(e){
      e.preventDefault();
      openMenu();
    });
  }

  // закрыть по оверлею/крестику/кнопкам
  closeBtns.forEach(btn => btn.addEventListener('click', function(e){
    e.preventDefault();
    closeMenu();
  }));

  // закрывать по клику на ссылку внутри панели (но не по клику в overlay).
  // Для якорных ссылок не возвращаем фокус на бургер после анимации: иначе
  // браузер может прокрутить страницу обратно к шапке и переход выглядит «лагучим».
  if(panel){
    panel.addEventListener('click', function(e){
      const a = e.target.closest('a');
      if(!a) return;
      closeMenu({ restoreFocus: false });
    });
  }
})();
</script>