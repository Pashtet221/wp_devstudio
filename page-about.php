<?php
/*
Template Name: О нас
*/
get_header(); ?>


<section class="wps-about-hero">
  <div class="container"><div class="wps-about-hero__wrap">
    <div class="wps-about-hero__content">
      <span class="wps-about-label">О студии</span>
      <h1 class="wps-about-hero__title">Разработка без конвейера и лишних посредников</h1>
      <p class="wps-about-hero__text">WPDevStudio помогает бизнесу запускать и развивать сайты, магазины и веб-сервисы. Погружаемся в задачу, предлагаем понятное решение и отвечаем за результат от оценки до запуска.</p>
      <div class="wps-about-hero__actions"><a href="#contact-form" class="wps-btn wps-btn--primary">Обсудить проект</a><a href="/cases/" class="wps-btn wps-btn--ghost">Смотреть кейсы</a></div>
      <ul class="wps-about-hero__meta"><li>Прямое общение</li><li>Поэтапная работа</li><li>Поддержка после запуска</li></ul>
    </div>
    <div class="wps-about-hero__card">
      <div class="wps-about-stat"><span class="wps-about-stat__num">В фокусе</span><span class="wps-about-stat__label">задача бизнеса, а не набор модных функций</span></div>
      <div class="wps-about-stat"><span class="wps-about-stat__num">В основе</span><span class="wps-about-stat__label">понятная архитектура и удобное управление</span></div>
      <div class="wps-about-stat"><span class="wps-about-stat__num">На связи</span><span class="wps-about-stat__label">до, во время и после запуска проекта</span></div>
    </div>
  </div></div>
</section>

<section class="wps-about-section"><div class="container"><div class="wps-about-grid">
  <div class="wps-about-block"><span class="wps-about-kicker">Как устроена студия</span><h2 class="wps-about-title">Небольшая команда под конкретную задачу</h2><p>Проект не проходит через менеджеров, которые теряют детали. Вы общаетесь со специалистом, участвующим в разработке. Если нужны дизайн, тексты или дополнительная экспертиза, подключаем проверенных исполнителей и сохраняем единый контроль качества.</p></div>
  <div class="wps-about-note">
    <div class="wps-about-note__item"><strong>Без конвейера</strong><p>Берём ограниченное число проектов, чтобы разбираться в каждом.</p></div>
    <div class="wps-about-note__item"><strong>Без технической воды</strong><p>Объясняем решения человеческим языком и показываем результат.</p></div>
    <div class="wps-about-note__item"><strong>С ответственностью</strong><p>Не исчезаем после оплаты и доводим согласованный объём до запуска.</p></div>
  </div>
</div></div></section>

<section class="wps-about-section wps-about-section--dark"><div class="container">
  <div class="wps-section-head"><span class="wps-about-kicker">Что делаем</span><h2 class="wps-about-title">Запускаем новое и улучшаем работающее</h2><p class="wps-about-subtitle">От лендинга до магазина с интеграциями — без лишнего функционала и с запасом для развития.</p></div>
  <div class="wps-services-grid">
    <article class="wps-service-card"><h3>Сайты и магазины</h3><p>Проектирование, дизайн, разработка, каталог, оплата, доставка и подготовка к запуску.</p></article>
    <article class="wps-service-card"><h3>Доработки и интеграции</h3><p>Новые разделы, личные кабинеты, обмен данными, автоматизация и нестандартная бизнес-логика.</p></article>
    <article class="wps-service-card"><h3>Поддержка и развитие</h3><p>Исправления, ускорение, улучшение пользовательских сценариев и планомерное развитие проекта.</p></article>
  </div>
</div></section>

<section class="wps-about-section wps-about-section--accent"><div class="container"><div class="wps-legal">
  <div class="wps-legal__content"><span class="wps-about-kicker">Условия</span><h2 class="wps-about-title">Договорённости понятны до старта</h2><p>После обсуждения фиксируем состав работ, сроки и стоимость. Большой проект делим на этапы: так вы видите прогресс и оплачиваете конкретный результат.</p></div>
  <div class="wps-legal__box"><ul class="wps-legal-list"><li>Оценка до начала работ</li><li>Чек после оплаты</li><li>Поэтапная оплата крупных проектов</li><li>Регулярные промежуточные показы</li></ul><div class="wps-legal-requisites"><div class="wps-legal-requisites__row"><span>Формат:</span><strong>официальное сотрудничество</strong></div></div></div>
</div></div></section>

<section class="wps-about-cta"><div class="container"><div class="wps-about-cta__wrap">
  <div class="wps-about-cta__content"><span class="wps-about-label">Следующий шаг</span><h2>Расскажите о задаче — предложим способ её решить</h2><p>Можно прийти с идеей, техническим заданием или уже работающим проектом.</p></div>
  <div class="wps-about-cta__actions"><a href="#contact-form" class="wps-btn wps-btn--primary">Оставить заявку</a><a href="/contacts/" class="wps-btn wps-btn--ghost">Контакты</a></div>
</div></div></section>

<style>
	.wps-about-hero,
.wps-about-section,
.wps-about-cta {
  position: relative;
}

.wps-about-hero {
  padding: 90px 0 70px;
  background:
    radial-gradient(circle at top right, rgba(255, 45, 45, 0.10), transparent 30%),
    linear-gradient(180deg, #111315 0%, #171a1f 100%);
  color: #fff;
  overflow: hidden;
}

.wps-about-hero__wrap {
  display: grid;
  grid-template-columns: 1.2fr .8fr;
  gap: 32px;
  align-items: center;
}

.wps-about-label,
.wps-about-kicker {
  display: inline-block;
  margin-bottom: 14px;
  padding: 8px 14px;
  border-radius: 999px;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.10);
  color: #ff3a3a;
  font-size: 13px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .08em;
}

.wps-about-hero__title,
.wps-about-title {
  margin: 0 0 18px;
  line-height: 1.08;
  font-weight: 800;
}

.wps-about-hero__title {
  font-size: clamp(34px, 5vw, 58px);
  max-width: 900px;
}

.wps-about-hero__text,
.wps-about-subtitle {
  font-size: 18px;
  line-height: 1.75;
  color: rgba(255,255,255,.82);
}

.wps-about-hero__actions,
.wps-about-cta__actions {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  margin-top: 28px;
}

.wps-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 54px;
  padding: 0 24px;
  border-radius: 14px;
  font-weight: 700;
  text-decoration: none;
  transition: .25s ease;
}

.wps-btn--primary {
  background: #ff3131;
  color: #fff;
  border: 1px solid #ff3131;
}

.wps-btn--primary:hover {
  background: #e92828;
  border-color: #e92828;
  color: #fff;
  transform: translateY(-2px);
}

.wps-btn--ghost {
  background: transparent;
  color: #fff;
  border: 1px solid rgba(255,255,255,.16);
}

.wps-btn--ghost:hover {
  border-color: rgba(255,255,255,.34);
  color: #fff;
  transform: translateY(-2px);
}

.wps-about-hero__meta {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin: 28px 0 0;
  padding: 0;
  list-style: none;
}

.wps-about-hero__meta li {
  padding: 10px 14px;
  border-radius: 12px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  color: rgba(255,255,255,.88);
  font-size: 14px;
}

.wps-about-hero__card {
  display: grid;
  gap: 16px;
}

.wps-about-stat {
  padding: 24px;
  border-radius: 22px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  backdrop-filter: blur(10px);
}

.wps-about-stat__num {
  display: block;
  margin-bottom: 8px;
  color: #fff;
  font-size: 28px;
  font-weight: 800;
}

.wps-about-stat__label {
  color: rgba(255,255,255,.72);
  line-height: 1.6;
}

.wps-about-section {
  padding: 88px 0;
  background: #fff;
  color: #181818;
}

.wps-about-section--dark {
  background: #121417;
  color: #fff;
}

.wps-about-section--accent {
  background: linear-gradient(180deg, #fff5f5 0%, #fff 100%);
}

.wps-section-head {
  max-width: 820px;
  margin-bottom: 34px;
}

.wps-about-title {
  font-size: clamp(28px, 4vw, 46px);
}

.wps-about-section p {
  line-height: 1.8;
  color: #555c66;
}

.wps-about-section--dark p,
.wps-about-section--dark .wps-about-subtitle {
  color: rgba(255,255,255,.78);
}

.wps-about-grid {
  display: grid;
  grid-template-columns: 1.2fr .8fr;
  gap: 30px;
}

.wps-about-block,
.wps-about-note,
.wps-service-card,
.wps-adv-card,
.wps-step,
.wps-fit-card,
.wps-legal__box {
  border-radius: 24px;
}

.wps-about-note {
  display: grid;
  gap: 16px;
}

.wps-about-note__item {
  padding: 24px;
  background: #f6f7f9;
  border: 1px solid #eceff3;
}

.wps-about-note__item strong {
  display: block;
  margin-bottom: 8px;
  font-size: 18px;
  color: #151515;
}

.wps-services-grid,
.wps-adv-grid,
.wps-fit-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.wps-service-card,
.wps-adv-card,
.wps-fit-card {
  padding: 28px;
  background: rgba(255,255,255,.04);
  border: 1px solid rgba(255,255,255,.08);
}

.wps-about-section:not(.wps-about-section--dark) .wps-adv-card,
.wps-about-section:not(.wps-about-section--dark) .wps-fit-card {
  background: #fff;
  border: 1px solid #eceff3;
}

.wps-service-card h3,
.wps-adv-card h3,
.wps-fit-card h3,
.wps-step h3 {
  margin: 0 0 12px;
  font-size: 21px;
  line-height: 1.35;
}

.wps-service-card p,
.wps-adv-card p,
.wps-fit-card p,
.wps-step p {
  margin: 0;
}

.wps-about-process {
  display: grid;
  gap: 28px;
}

.wps-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 18px;
}

.wps-step {
  padding: 28px;
  background: #f8f9fb;
  border: 1px solid #eceff3;
}

.wps-step__num {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 52px;
  height: 52px;
  margin-bottom: 18px;
  border-radius: 14px;
  background: #ff3131;
  color: #fff;
  font-weight: 800;
  font-size: 18px;
}

.wps-legal {
  display: grid;
  grid-template-columns: 1.1fr .9fr;
  gap: 30px;
  align-items: start;
}

.wps-legal__box {
  padding: 28px;
  background: #fff;
  border: 1px solid #f1d8d8;
  box-shadow: 0 20px 60px rgba(17, 17, 17, 0.05);
}

.wps-legal-list {
  margin: 0 0 24px;
  padding: 0;
  list-style: none;
  display: grid;
  gap: 12px;
}

.wps-legal-list li {
  position: relative;
  padding-left: 22px;
  color: #2b2f35;
  line-height: 1.7;
}

.wps-legal-list li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 11px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #ff3131;
}

.wps-legal-requisites {
  border-top: 1px solid #ececec;
  padding-top: 20px;
  display: grid;
  gap: 12px;
}

.wps-legal-requisites__row {
  display: flex;
  justify-content: space-between;
  gap: 16px;
  padding-bottom: 10px;
  border-bottom: 1px dashed #ececec;
}

.wps-legal-requisites__row span {
  color: #6d7480;
}

.wps-legal-requisites__row strong {
  color: #111;
}

.wps-tech-list {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
}

.wps-tech-list span {
  display: inline-flex;
  padding: 12px 16px;
  border-radius: 14px;
  background: #f6f7f9;
  border: 1px solid #e9edf2;
  color: #20242a;
  font-weight: 600;
}

.wps-about-cta {
  padding: 80px 0;
  background:
    radial-gradient(circle at left center, rgba(255, 49, 49, .10), transparent 35%),
    #121417;
  color: #fff;
}

.wps-about-cta__wrap {
  display: flex;
  justify-content: space-between;
  gap: 24px;
  align-items: center;
  padding: 34px;
  border-radius: 28px;
  background: rgba(255,255,255,.04);
  border: 1px solid rgba(255,255,255,.08);
}

.wps-about-cta__content h2 {
  margin: 0 0 14px;
  font-size: clamp(28px, 4vw, 42px);
  line-height: 1.15;
}

.wps-about-cta__content p {
  margin: 0;
  max-width: 760px;
  color: rgba(255,255,255,.78);
  line-height: 1.8;
}

@media (max-width: 1199px) {
  .wps-about-hero__wrap,
  .wps-about-grid,
  .wps-legal,
  .wps-about-cta__wrap {
    grid-template-columns: 1fr;
    display: grid;
  }

  .wps-services-grid,
  .wps-adv-grid,
  .wps-fit-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .wps-steps {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 767px) {
  .wps-about-hero,
  .wps-about-section,
  .wps-about-cta {
    padding: 64px 0;
  }

  .wps-about-hero__title {
    font-size: 34px;
  }

  .wps-about-hero__text,
  .wps-about-subtitle,
  .wps-about-section p {
    font-size: 16px;
  }

  .wps-services-grid,
  .wps-adv-grid,
  .wps-fit-grid,
  .wps-steps {
    grid-template-columns: 1fr;
  }

  .wps-about-cta__wrap {
    padding: 24px;
  }

  .wps-legal-requisites__row {
    flex-direction: column;
    align-items: flex-start;
  }

  .wps-btn {
    width: 100%;
  }

  .wps-about-hero__actions,
  .wps-about-cta__actions {
    flex-direction: column;
  }
}
</style>

<?php get_footer(); ?>
