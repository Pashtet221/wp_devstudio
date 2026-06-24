<?php
/**
 * Подвал темы
 */

$theme_uri = get_template_directory_uri();

$phone_raw   = '+79250404189';
$phone_human = '+7 (925) 040-41-89';
$email       = 'info@wpdevstudio.ru';

$tg_url = 'https://t.me/+79250404189';
$wa_url = 'https://wa.me/79250404189';
$li_url = 'https://www.linkedin.com/in/pavel-damut-142181288';
?>

<footer class="wpds-footer" id="footer" itemscope itemtype="https://schema.org/Organization">
  <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
  <link itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" />

  <div class="container">

    <div class="wpds-footer__top">

      <div class="wpds-footer__brand">
        <a href="<?php echo esc_url(home_url('/')); ?>"
           class="wpds-footer__logo"
           aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> — на главную">
          <?php if (function_exists('the_custom_logo') && has_custom_logo()): ?>
            <?php the_custom_logo(); ?>
          <?php else: ?>
            <span class="wpds-footer__logoText"><?php bloginfo('name'); ?></span>
          <?php endif; ?>
        </a>

        <p class="wpds-footer__desc" itemprop="description">
          Разработка сайтов, интернет-магазинов и кастомных решений на WordPress и WooCommerce.
          Кастомные темы, плагины, интеграции, оптимизация скорости и техническая поддержка.
        </p>

        <address class="wpds-footer__contacts">
          <a href="tel:<?php echo esc_attr($phone_raw); ?>" itemprop="telephone">
            <?php echo esc_html($phone_human); ?>
          </a>

          <a href="mailto:<?php echo esc_attr($email); ?>" itemprop="email">
            <?php echo esc_html($email); ?>
          </a>
        </address>

        <div class="wpds-footer__socials" aria-label="Социальные сети">
          <a href="<?php echo esc_url($tg_url); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             aria-label="Написать в Telegram">
            <i class="icon-social-tg"></i>
          </a>

          <a href="<?php echo esc_url($wa_url); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             aria-label="Написать в WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
          </a>

          <a href="<?php echo esc_url($li_url); ?>"
             target="_blank"
             rel="nofollow noopener noreferrer"
             aria-label="Открыть LinkedIn">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
        </div>
      </div>

      <nav class="wpds-footer__menu" aria-label="Основные разделы сайта">
        <span class="wpds-footer__title">Разделы</span>

        <a href="<?php echo esc_url(home_url('/services/')); ?>">Услуги</a>
        <a href="<?php echo esc_url(home_url('/cases/')); ?>">Кейсы</a>
        <a href="<?php echo esc_url(home_url('/prices/')); ?>">Цены</a>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>">Блог</a>
        <a href="<?php echo esc_url(home_url('/plugins/')); ?>">Плагины</a>
        <a href="<?php echo esc_url(home_url('/about/')); ?>">О нас</a>
        <a href="<?php echo esc_url(home_url('/contacts/')); ?>">Контакты</a>
		<a href="<?php echo esc_url(home_url('/sitemap/')); ?>">Карта сайта</a>
      </nav>

      <nav class="wpds-footer__menu" aria-label="Услуги WordPress">
        <span class="wpds-footer__title">Услуги</span>

        <a href="<?php echo esc_url(home_url('/services/')); ?>">Все услуги</a>

        <a href="<?php echo esc_url(home_url('/services/razrabotka-sajta-vizitki-kotoryj-vyzyvaet-doverie-i-privodit-zayavki/')); ?>">
          Лендинги и сайты-визитки
        </a>

        <a href="<?php echo esc_url(home_url('/services/razrabotka-internet-magazina-na-wordpress-i-woocommerce-pod-vash-biznes/')); ?>">
          Интернет-магазины WooCommerce
        </a>

        <a href="<?php echo esc_url(home_url('/services/razrabotka-marketplejsa-na-wordpress-pod-vashu-biznes-model/')); ?>">
          Каталоги и маркетплейсы
        </a>

        <a href="<?php echo esc_url(home_url('/services/dorabotka-sajta-na-wordpress-i-woocommerce-pravki-dorabotka-funkczionala/')); ?>">
          Поддержка и доработки
        </a>
      </nav>

      <div class="wpds-footer__cta">
        <span class="wpds-footer__title">Обсудить проект</span>

        <p>
          Напишите в Telegram или на email — разберём задачу,
          предложим решение и сориентируем по срокам.
        </p>

        <a class="wpds-footer__btn" href="#bottom-form">
          Оставить заявку
        </a>
      </div>

    </div>


    <div class="wpds-footer__bottom">
      <p>© <?php echo (int)date('Y'); ?> WP Dev Studio. Все права защищены.</p>

      <div class="wpds-footer__legal" aria-label="Юридическая информация">
        <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Политика конфиденциальности</a>
        <a href="<?php echo esc_url(home_url('/terms/')); ?>">Условия и оферта</a>
      </div>
    </div>

  </div>
</footer>

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
      <span class="FloatingWidget__icon" aria-hidden="true">WA</span>
    </a>

    <a href="<?php echo esc_url($tg_url); ?>"
       class="FloatingWidget__item FloatingWidget__item--telegram"
       target="_blank"
       rel="nofollow noopener noreferrer"
       aria-label="Написать в Telegram">
      <span class="FloatingWidget__icon" aria-hidden="true">TG</span>
    </a>

    <a href="<?php echo esc_url($li_url); ?>"
       class="FloatingWidget__item FloatingWidget__item--linkedin"
       target="_blank"
       rel="nofollow noopener noreferrer"
       aria-label="Открыть LinkedIn">
      <span class="FloatingWidget__icon" aria-hidden="true">IN</span>
    </a>

  </div>
</div>

<style>
.wpds-footer{
  position:relative;
  overflow:hidden;
  padding:72px 0 28px;
  background:#0f1723;
  color:#fff;
  border-top:1px solid rgba(255,255,255,.08);
}

.wpds-footer::before{
  content:"";
  position:absolute;
  inset:0;
  background:
    radial-gradient(circle at 0% 0%, rgba(239,68,68,.08), transparent 34%),
    linear-gradient(180deg, rgba(255,255,255,.025), rgba(255,255,255,0));
  pointer-events:none;
}

.wpds-footer .container{
  position:relative;
  z-index:1;
}

.wpds-footer__top{
  display:grid;
  grid-template-columns:minmax(280px, 1.35fr) .8fr 1fr .95fr;
  gap:48px;
  align-items:start;
}

.wpds-footer__logo{
  display:inline-flex;
  align-items:center;
  max-width:220px;
  margin-bottom:24px;
}

.wpds-footer__logo img,
.wpds-footer__logo .custom-logo{
  display:block;
  width:210px;
  max-width:100%;
  height:auto;
}

.wpds-footer__logoText{
  color:#fff;
  font-size:24px;
  font-weight:800;
  text-decoration:none;
}

.wpds-footer__desc{
  max-width:360px;
  margin:0 0 28px;
  color:rgba(255,255,255,.58);
  font-size:16px;
  line-height:1.65;
  font-weight:500;
}

.wpds-footer__contacts{
  display:flex;
  flex-direction:column;
  gap:5px;
  margin:0 0 20px;
  font-style:normal;
}

.wpds-footer__contacts a{
  width:fit-content;
  color:#fff;
  font-size:22px;
  line-height:1.25;
  font-weight:800;
  text-decoration:none;
  transition:color .2s ease;
}

.wpds-footer__contacts a:hover{
  color:#ef4444;
}

.wpds-footer__socials{
  display:flex;
  align-items:center;
  gap:12px;
}

.wpds-footer__socials a{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  width:46px;
  height:46px;
  border-radius:10px;
  background:rgba(255,255,255,.08);
  border:1px solid rgba(255,255,255,.08);
  color:#fff;
  font-size:22px;
  text-decoration:none;
  transition:background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
}

.wpds-footer__socials a:hover{
  background:rgba(239,68,68,.13);
  border-color:rgba(239,68,68,.28);
  color:#ef4444;
  transform:translateY(-2px);
}

.wpds-footer__title{
  display:block;
  margin:0 0 18px;
  color:#fff;
  font-size:20px;
  line-height:1.25;
  font-weight:800;
}

.wpds-footer__menu{
  display:flex;
  flex-direction:column;
  align-items:flex-start;
  gap:12px;
}

.wpds-footer__menu a{
  color:rgba(255,255,255,.66);
  font-size:16px;
  line-height:1.35;
  font-weight:600;
  text-decoration:none;
  transition:color .2s ease, transform .2s ease;
}

.wpds-footer__menu a:hover{
  color:#fff;
  transform:translateX(3px);
}

.wpds-footer__cta{
  padding:24px;
  border-radius:20px;
  background:rgba(255,255,255,.045);
  border:1px solid rgba(255,255,255,.08);
}

.wpds-footer__cta p{
  margin:0 0 20px;
  color:rgba(255,255,255,.62);
  font-size:15px;
  line-height:1.6;
  font-weight:500;
}

.wpds-footer__btn{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  width:100%;
  min-height:48px;
  padding:13px 18px;
  border-radius:12px;
  background:rgba(239,68,68,.95);
  color:#fff;
  font-size:15px;
  line-height:1;
  font-weight:800;
  text-decoration:none;
  transition:background .2s ease, transform .2s ease, box-shadow .2s ease;
}

.wpds-footer__btn:hover{
  background:#ef4444;
  transform:translateY(-1px);
  box-shadow:0 14px 34px rgba(239,68,68,.18);
}

.wpds-footer__more{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:24px;
  margin-top:54px;
  padding-top:32px;
  border-top:1px solid rgba(255,255,255,.08);
}

.wpds-footer__moreItem{
  padding:24px;
  border-radius:18px;
  background:rgba(255,255,255,.03);
  border:1px solid rgba(255,255,255,.06);
  transition:border-color .2s ease, background .2s ease, transform .2s ease;
}

.wpds-footer__moreItem:hover{
  transform:translateY(-2px);
  background:rgba(255,255,255,.04);
  border-color:rgba(255,255,255,.12);
}

.wpds-footer__moreItem span{
  display:block;
  margin-bottom:10px;
  color:#fff;
  font-size:20px;
  font-weight:800;
  line-height:1.2;
}

.wpds-footer__moreItem p{
  margin:0;
  color:rgba(255,255,255,.62);
  font-size:15px;
  line-height:1.65;
}

.wpds-footer__bottom{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:24px;
  margin-top:32px;
  padding-top:24px;
  border-top:1px solid rgba(255,255,255,.08);
}

.wpds-footer__bottom p{
  margin:0;
  color:rgba(255,255,255,.48);
  font-size:14px;
  line-height:1.5;
  font-weight:500;
}

.wpds-footer__legal{
  display:flex;
  align-items:center;
  flex-wrap:wrap;
  gap:16px;
}

.wpds-footer__legal a{
  color:rgba(255,255,255,.55);
  font-size:14px;
  line-height:1.4;
  font-weight:500;
  text-decoration:none;
  transition:color .2s ease;
}

.wpds-footer__legal a:hover{
  color:#fff;
}

.FloatingWidget{
  position:fixed;
  right:24px;
  bottom:24px;
  z-index:9999;
  display:flex;
  flex-direction:column-reverse;
  align-items:flex-end;
  gap:10px;
  opacity:0;
  transform:translateY(40px);
  pointer-events:none;
  transition:opacity .25s ease, transform .25s ease;
}

.FloatingWidget.is-visible{
  opacity:1;
  transform:translateY(0);
  pointer-events:auto;
}

.FloatingWidget__toggle,
.FloatingWidget__scrollTop{
  border:none;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  background:linear-gradient(135deg, #1f2937, #111827);
  box-shadow:0 12px 30px rgba(0,0,0,.35);
}

.FloatingWidget__toggle{
  position:relative;
  width:64px;
  height:64px;
  padding:0;
  margin:0;
  border-radius:50%;
  overflow:hidden;
}

.FloatingWidget__avatar{
  position:absolute;
  inset:0;
  width:40px;
  height:40px;
  margin:auto;
  object-fit:cover;
  transition:opacity .25s ease, transform .25s ease;
}

.FloatingWidget__avatar--primary{
  opacity:1;
  transform:scale(1);
}

.FloatingWidget__avatar--secondary{
  opacity:0;
  transform:scale(.9) rotate(-4deg);
}

.FloatingWidget.is-open .FloatingWidget__avatar--primary{
  opacity:0;
  transform:scale(.9) rotate(4deg);
}

.FloatingWidget.is-open .FloatingWidget__avatar--secondary{
  opacity:1;
  transform:scale(1);
}

.FloatingWidget__pulse{
  position:absolute;
  inset:0;
  border-radius:50%;
  border:2px solid rgba(255,255,255,.3);
  animation:floatingWidgetPulse 1.8s infinite;
  pointer-events:none;
}

@keyframes floatingWidgetPulse{
  0%{transform:scale(1);opacity:.9;}
  70%{transform:scale(1.4);opacity:0;}
  100%{transform:scale(1.4);opacity:0;}
}

.FloatingWidget__socials{
  display:flex;
  flex-direction:column;
  align-items:flex-end;
  gap:8px;
}

.FloatingWidget__item{
  width:44px;
  height:44px;
  border-radius:999px;
  display:flex;
  align-items:center;
  justify-content:center;
  text-decoration:none;
  opacity:0;
  transform:translateY(8px) scale(.8);
  pointer-events:none;
  transition:opacity .2s ease, transform .2s ease;
}

.FloatingWidget.is-open .FloatingWidget__item{
  opacity:1;
  transform:translateY(0) scale(1);
  pointer-events:auto;
}

.FloatingWidget__icon{
  width:100%;
  height:100%;
  border-radius:inherit;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  font-size:12px;
  font-weight:800;
}

.FloatingWidget__item--whatsapp .FloatingWidget__icon{
  background:#25d366;
}

.FloatingWidget__item--telegram .FloatingWidget__icon{
  background:#229ed9;
}

.FloatingWidget__item--linkedin .FloatingWidget__icon{
  background:#3375b0;
}

.FloatingWidget__scrollTop{
  width:44px;
  height:44px;
  border-radius:999px;
  opacity:0;
  transform:translateY(8px) scale(.8);
  pointer-events:none;
}

.FloatingWidget.is-visible .FloatingWidget__scrollTop{
  opacity:1;
  transform:translateY(0) scale(1);
  pointer-events:auto;
}

.FloatingWidget__scrollTopIcon,
.FloatingWidget__scrollTopIcon img{
  width:18px;
  height:18px;
  display:block;
}

@media (max-width:1180px){
  .wpds-footer__top{
    grid-template-columns:1.2fr 1fr 1fr;
  }

  .wpds-footer__cta{
    grid-column:1 / -1;
  }
}

@media (max-width:768px){
  .wpds-footer{
    padding:52px 0 24px;
  }

  .wpds-footer__top,
  .wpds-footer__more{
    grid-template-columns:1fr;
  }

  .wpds-footer__top{
    gap:34px;
  }

  .wpds-footer__more{
    gap:18px;
    margin-top:38px;
    padding-top:28px;
  }

  .wpds-footer__desc{
    max-width:100%;
  }

  .wpds-footer__contacts a{
    font-size:20px;
  }

  .wpds-footer__bottom{
    align-items:flex-start;
    flex-direction:column;
  }

  .FloatingWidget{
    right:16px;
    bottom:16px;
  }
}

@media (max-width:480px){
  .wpds-footer__logo img,
  .wpds-footer__logo .custom-logo{
    width:190px;
  }

  .wpds-footer__socials a{
    width:44px;
    height:44px;
  }

  .wpds-footer__cta,
  .wpds-footer__moreItem{
    padding:20px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const widget = document.getElementById('floating-widget');

  if (!widget) return;

  const toggleBtn = widget.querySelector('.FloatingWidget__toggle');
  const socials = widget.querySelector('#floating-widget-socials');
  const scrollTop = widget.querySelector('.FloatingWidget__scrollTop');
  const showOffset = 400;

  function setOpen(state){
    widget.classList.toggle('is-open', state);

    if (toggleBtn) {
      toggleBtn.setAttribute('aria-expanded', state ? 'true' : 'false');
    }

    if (socials) {
      socials.hidden = !state;
    }
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
      setOpen(!widget.classList.contains('is-open'));
    });
  }

  document.addEventListener('click', function(e){
    if (!widget.classList.contains('is-open')) return;
    if (e.target.closest('#floating-widget')) return;

    setOpen(false);
  });

  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && widget.classList.contains('is-open')) {
      setOpen(false);
    }
  });

  if (scrollTop) {
    scrollTop.addEventListener('click', function(){
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});
</script>

<?php wp_footer(); ?>
</body>
</html>