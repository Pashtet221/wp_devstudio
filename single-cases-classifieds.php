<?php
/*
Template Name: Объявление
*/
get_header();
?>


<main>
  <!-- HERO / TOP -->
  <section class="caseTop">
    <div class="container">
      <nav class="breadcrumbs" aria-label="Хлебные крошки">
        <a href="/" class="breadcrumbs__link">Главная</a>
        <span class="breadcrumbs__sep">/</span>
        <a href="/cases/" class="breadcrumbs__link">Кейсы</a>
        <span class="breadcrumbs__sep">/</span>
        <span class="breadcrumbs__current">Доска объявлений: категории, фильтры, модерация</span>
      </nav>

      <div class="caseMeta">
        <a class="chip" href="/cases/">Кейсы</a>
        <span class="caseMeta__dot">•</span>
        <time datetime="2025-12-18" class="caseMeta__item">18 дек 2025</time>
        <span class="caseMeta__dot">•</span>
        <span class="caseMeta__item">9 мин. чтения</span>
        <span class="caseMeta__dot">•</span>
        <span class="caseMeta__item">846 просмотров</span>
      </div>

      <h1 class="h1">Доска объявлений на WordPress: роли, модерация, платные публикации и фильтры</h1>

      <p class="lead">
        Собрали полноценный marketplace объявлений: категории → фильтры → кабинет пользователя →
        публикация/продление → модерация → монетизация. Ниже — экраны и решения.
      </p>

      <!-- PRODUCT-LIKE LAYOUT -->
      <div class="caseProduct">

        <!-- Gallery -->
        <section class="gallery" aria-label="Галерея кейса">
          <!-- radios -->
          <input class="gallery__radio" type="radio" name="g" id="g1" checked>
          <input class="gallery__radio" type="radio" name="g" id="g2">
          <input class="gallery__radio" type="radio" name="g" id="g3">
          <input class="gallery__radio" type="radio" name="g" id="g4">
          <input class="gallery__radio" type="radio" name="g" id="g5">

          <div class="gallery__stage">
            <figure class="gallery__slide s1">
              <img class="gallery__img"
                   src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?q=80&w=1600&auto=format&fit=crop"
                   alt="Главная страница доски объявлений — категории и быстрый поиск" />
            </figure>

            <figure class="gallery__slide s2">
              <img class="gallery__img"
                   src="https://images.unsplash.com/photo-1559028012-481c04fa702d?q=80&w=1600&auto=format&fit=crop"
                   alt="Каталог объявлений — фильтры, сортировка, карточки" />
            </figure>

            <figure class="gallery__slide s3">
              <img class="gallery__img"
                   src="https://images.unsplash.com/photo-1556761175-129418cb2dfe?q=80&w=1600&auto=format&fit=crop"
                   alt="Карточка объявления — галерея, характеристики, контакт, похожие" />
            </figure>

            <figure class="gallery__slide s4">
              <img class="gallery__img"
                   src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=1600&auto=format&fit=crop"
                   alt="Кабинет пользователя — мои объявления, статусы, продление, платежи" />
            </figure>

            <figure class="gallery__slide s5">
              <img class="gallery__img"
                   src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=1600&auto=format&fit=crop"
                   alt="Админка — модерация, жалобы, пакеты размещения, аналитика" />
            </figure>
          </div>

          <div class="gallery__thumbs" role="tablist" aria-label="Миниатюры">
            <label class="thumb" for="g1" role="tab" aria-controls="g1">
              <img class="thumb__img"
                   src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?q=80&w=320&auto=format&fit=crop"
                   alt="Миниатюра: главная" />
            </label>
            <label class="thumb" for="g2" role="tab" aria-controls="g2">
              <img class="thumb__img"
                   src="https://images.unsplash.com/photo-1559028012-481c04fa702d?q=80&w=320&auto=format&fit=crop"
                   alt="Миниатюра: каталог" />
            </label>
            <label class="thumb" for="g3" role="tab" aria-controls="g3">
              <img class="thumb__img"
                   src="https://images.unsplash.com/photo-1556761175-129418cb2dfe?q=80&w=320&auto=format&fit=crop"
                   alt="Миниатюра: страница объявления" />
            </label>
            <label class="thumb" for="g4" role="tab" aria-controls="g4">
              <img class="thumb__img"
                   src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=320&auto=format&fit=crop"
                   alt="Миниатюра: личный кабинет" />
            </label>
            <label class="thumb" for="g5" role="tab" aria-controls="g5">
              <img class="thumb__img"
                   src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=320&auto=format&fit=crop"
                   alt="Миниатюра: модерация" />
            </label>
          </div>
        </section>

        <!-- Info (like product summary) -->
        <aside class="caseSummary" aria-label="Описание кейса">
          <div class="caseSummary__card">
            <div class="caseSummary__chips">
              <span class="tag">Доска объявлений</span>
              <span class="tag">Marketplace</span>
              <span class="tag">UX/UI</span>
              <span class="tag">Монетизация</span>
            </div>

            <dl class="facts">
              <div class="facts__row">
                <dt class="facts__k">Клиент</dt>
                <dd class="facts__v">Сервис объявлений (ниша: услуги/товары)</dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Гео</dt>
                <dd class="facts__v">Россия / СНГ</dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Срок</dt>
                <dd class="facts__v">7 недель</dd>
              </div>
              <div class="facts__row">
                <dt class="facts__k">Стек</dt>
                <dd class="facts__v">WordPress / HivePress / ACF / PHP</dd>
              </div>
            </dl>

            <div class="resultBox">
              <div class="resultBox__title">Результат</div>
              <div class="resultBox__grid">
                <div class="metric">
                  <div class="metric__v">+48%</div>
                  <div class="metric__k">публикаций</div>
                </div>
                <div class="metric">
                  <div class="metric__v">−35%</div>
                  <div class="metric__k">времени модерации</div>
                </div>
                <div class="metric">
                  <div class="metric__v">3</div>
                  <div class="metric__k">сценария монетизации</div>
                </div>
              </div>
            </div>

            <div class="actions">
              <a class="btn btn--primary btn--block" href="#lead">Оценить ваш проект</a>
              <a class="btn btn--ghost btn--block" href="/cases/">Смотреть другие кейсы</a>
            </div>

            <div class="caseSummary__foot">
              <span class="muted">Демо / доступ по запросу</span>
              <span class="muted">•</span>
              <a class="link" href="#">Поделиться</a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="caseBody">
    <div class="container caseBody__grid">

      <article class="content">
        <h2 class="h2">Задача</h2>
        <ul class="list">
          <li>Собрать удобную структуру категорий и фильтров (включая “город / район / цена / параметры”).</li>
          <li>Сделать понятный кабинет пользователя: публикация, редактирование, статусы, продление.</li>
          <li>Внедрить модерацию: антиспам, жалобы, ограничения, “в очередь” / “на правки”.</li>
          <li>Запустить монетизацию: платные пакеты, поднятие, закрепление, выделение.</li>
        </ul>

        <h2 class="h2">Что сделали</h2>
        <div class="cards">
          <section class="card">
            <h3 class="h3">1) Архитектура доски</h3>
            <p>Проработали дерево категорий и типы объявлений. Добавили справочники параметров (ACF/таксономии).</p>
          </section>

          <section class="card">
            <h3 class="h3">2) Каталог + фильтры</h3>
            <p>Сортировка, фильтрация по параметрам, быстрый поиск. Удобные карточки и “похожие объявления”.</p>
          </section>

          <section class="card">
            <h3 class="h3">3) Публикация объявления</h3>
            <p>Пошаговая форма: фото, заголовок, цена, характеристики, контакты, предпросмотр. Валидация + подсказки.</p>
          </section>

          <section class="card">
            <h3 class="h3">4) Кабинет и статусы</h3>
            <p>Мои объявления: черновик/на модерации/опубликовано/истекло. Продление, платные услуги, история операций.</p>
          </section>

          <section class="card">
            <h3 class="h3">5) Модерация и антиспам</h3>
            <p>Очередь модерации, причины отклонения, жалобы пользователей, лимиты публикаций, защита форм.</p>
          </section>

          <section class="card">
            <h3 class="h3">6) Монетизация</h3>
            <p>Пакеты размещения, “поднять”, “закрепить”, “выделить”. Гибкая настройка цен и сроков.</p>
          </section>
        </div>

        <h2 class="h2">Результаты</h2>
        <div class="callout">
          <div class="callout__badge">Итог</div>
          <p class="callout__text">
            Платформа готова к росту: удобная публикация объявлений, быстрый каталог с фильтрами,
            модерация и монетизация. Снизили нагрузку на админа и улучшили качество объявлений.
          </p>
        </div>

        <h2 class="h2">Технологии</h2>
        <div class="pillRow">
          <span class="pill">WordPress</span>
          <span class="pill">HivePress</span>
          <span class="pill">ACF</span>
          <span class="pill">Custom Post Types</span>
          <span class="pill">Taxonomies</span>
          <span class="pill">PHP</span>
          <span class="pill">JS</span>
          <span class="pill">Payment/Packages</span>
        </div>

        <h2 class="h2">Отзыв</h2>
        <blockquote class="quote">
          <p>«Получили удобную доску объявлений: пользователи сами размещают и продлевают, а модерация стала быстрее и понятнее.»</p>
          <footer>— Алексей, владелец проекта</footer>
        </blockquote>
      </article>

      <!-- Sticky side -->
      <aside class="side">
        <div class="sideCard" id="lead">
          <h3 class="h3">Нужна доска объявлений под вашу нишу?</h3>
          <p class="muted">Оставьте контакты — предложу архитектуру, сроки и варианты монетизации.</p>

          <div class="TariffsWithForm_formWrapper__5qdfc" style="background: #232834;">
            <strong class="TariffsWithForm_formTitle__rWWca">Не нашли нужный формат?</strong>
            <p class="TariffsWithForm_formSubtitle__dJAkn">
                Опишите задачу в форме ниже — подберём решение под ваш проект и рассчитаем точную стоимость.
            </p>

			
			<aside class="sticky-form">
            <?php echo do_shortcode( '[smart_contact_form]' ); ?>
			</aside>
        </div>
        </div>

        <div class="sideCard sideCard--ghost">
          <h3 class="h3">Другие кейсы</h3>

          <a class="miniCase" href="#">
            <span class="miniCase__t">Интернет-магазин: импорт + фильтры</span>
            <span class="miniCase__m muted">WooCommerce • 4 недели</span>
          </a>

          <a class="miniCase" href="#">
            <span class="miniCase__t">Сервис услуг: SEO-структура</span>
            <span class="miniCase__m muted">WordPress • 3 недели</span>
          </a>

          <a class="miniCase" href="#">
            <span class="miniCase__t">Лендинг: рост конверсии заявки</span>
            <span class="miniCase__m muted">UI/UX • 2 недели</span>
          </a>
        </div>
      </aside>

    </div>
  </section>
</main>

<style>
	/* case-inner.css */
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap");

:root{
  --bg:#ffffff;
  --text:#111213;
  --muted:#6b7280;
  --line:#e7e7ea;
  --soft:#f6f7f9;
  --soft2:#f1f2f5;
  --shadow: 0 14px 40px rgba(16,24,40,.08);

  /* Акцент «как у itb» (красный). При желании подгони точный оттенок под свой бренд */
  --accent:#e01b24;
  --accent2:#c9151d;

  --radius:18px;
  --radius2:22px;
  --container:1180px;
}



img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
.container{max-width:var(--container);margin:0 auto;padding:0 20px}

.h1{font-size:44px;line-height:1.05;margin:10px 0 12px;letter-spacing:-.02em}
.h2{font-size:26px;line-height:1.2;margin:34px 0 14px}
.h3{font-size:18px;line-height:1.25;margin:0 0 10px}
.lead{font-size:18px;color:#2a2d33;max-width:72ch;margin:0 0 26px}
.muted{color:var(--muted)}
.link{color:var(--accent)}
.link:hover{color:var(--accent2)}


/* Buttons */
.btn{
  display:inline-flex;align-items:center;justify-content:center;
  gap:10px;
  padding:12px 16px;
  border-radius:14px;
  font-weight:600;
  border:1px solid transparent;
  transition:.18s ease;
  white-space:nowrap;
}
.btn--primary{background:var(--accent);color:#fff}
.btn--primary:hover{background:var(--accent2);transform:translateY(-1px)}
.btn--ghost{background:#fff;border-color:var(--line)}
.btn--ghost:hover{border-color:#d0d3da;transform:translateY(-1px)}
.btn--block{width:100%}

/* Top */
.caseTop{padding:26px 0 26px}
.breadcrumbs{display:flex;flex-wrap:wrap;gap:8px;color:var(--muted);font-size:14px}
.breadcrumbs__sep{opacity:.5}
.breadcrumbs__link:hover{color:var(--accent)}
.breadcrumbs__current{color:#2a2d33}

.caseMeta{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin:12px 0 12px}
.caseMeta__dot{opacity:.35}
.caseMeta__item{color:var(--muted);font-size:14px}

.chip{
  display:inline-flex;align-items:center;justify-content:center;
  height:28px;padding:0 12px;border-radius:999px;
  background:var(--soft);border:1px solid var(--line);
  font-weight:600;font-size:13px;color:#2a2d33;
}

/* Product-like layout */
.caseProduct{
  display:grid;
  grid-template-columns: 1.2fr .8fr;
  gap:28px;
  align-items:start;
  margin-top:18px;
}

/* Gallery */
.gallery{min-width:0}
.gallery__radio{position:absolute;opacity:0;pointer-events:none}
.gallery__stage{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  overflow:hidden;
  background:var(--soft2);
  box-shadow:var(--shadow);
  aspect-ratio: 16 / 10;
  position:relative;
}
.gallery__slide{position:absolute;inset:0;opacity:0;transition:.2s ease}
.gallery__img{width:100%;height:100%;object-fit:cover}

#g1:checked ~ .gallery__stage .s1,
#g2:checked ~ .gallery__stage .s2,
#g3:checked ~ .gallery__stage .s3,
#g4:checked ~ .gallery__stage .s4,
#g5:checked ~ .gallery__stage .s5{opacity:1}

.gallery__thumbs{
  margin-top:12px;
  display:grid;
  grid-template-columns: repeat(5, 1fr);
  gap:10px;
}
.thumb{
  border:1px solid var(--line);
  border-radius:14px;
  overflow:hidden;
  background:#fff;
  cursor:pointer;
  transition:.18s ease;
}
.thumb:hover{transform:translateY(-1px);border-color:#d0d3da}
.thumb__img{width:100%;height:76px;object-fit:cover}

#g1:checked ~ .gallery__thumbs label[for="g1"],
#g2:checked ~ .gallery__thumbs label[for="g2"],
#g3:checked ~ .gallery__thumbs label[for="g3"],
#g4:checked ~ .gallery__thumbs label[for="g4"],
#g5:checked ~ .gallery__thumbs label[for="g5"]{
  border-color: rgba(224,27,36,.6);
  box-shadow: 0 0 0 3px rgba(224,27,36,.14);
}

/* Summary */
.caseSummary{position:sticky;top:96px}
.caseSummary__card{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  padding:18px;
  box-shadow:var(--shadow);
  background:#fff;
}
.caseSummary__chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:14px}
.tag{
  padding:6px 10px;
  border-radius:999px;
  border:1px solid var(--line);
  background:var(--soft);
  font-weight:600;
  font-size:13px;
}

.facts{margin:0 0 14px}
.facts__row{display:flex;justify-content:space-between;gap:14px;padding:10px 0;border-top:1px solid var(--line)}
.facts__row:first-child{border-top:0;padding-top:0}
.facts__k{color:var(--muted);font-size:14px}
.facts__v{font-weight:600;font-size:14px;text-align:right}

.resultBox{
  border:1px solid rgba(224,27,36,.22);
  background:rgba(224,27,36,.06);
  border-radius:18px;
  padding:14px;
  margin:14px 0;
}
.resultBox__title{font-weight:700;margin-bottom:10px}
.resultBox__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
.metric{
  background:#fff;
  border:1px solid var(--line);
  border-radius:16px;
  padding:12px;
  text-align:center;
}
.metric__v{font-size:20px;font-weight:800;letter-spacing:-.02em}
.metric__k{font-size:13px;color:var(--muted)}

.actions{display:grid;gap:10px;margin-top:12px}
.caseSummary__foot{margin-top:14px;display:flex;gap:10px;align-items:center;font-size:13px}

/* Body */
.caseBody{padding:10px 0 60px}
.caseBody__grid{display:grid;grid-template-columns: 1.2fr .8fr;gap:28px;align-items:start}
.content{min-width:0}

.list{margin:0;padding-left:18px}
.list li{margin:10px 0}

.cards{display:grid;grid-template-columns:repeat(2, minmax(0,1fr));gap:14px}
.card{
  border:1px solid var(--line);
  border-radius:18px;
  padding:16px;
  background:#fff;
  box-shadow: 0 10px 30px rgba(16,24,40,.05);
}

.callout{
  border:1px solid var(--line);
  border-radius:18px;
  padding:16px;
  background:linear-gradient(180deg, rgba(224,27,36,.06), rgba(224,27,36,.02));
}
.callout__badge{
  display:inline-flex;
  height:26px;align-items:center;
  padding:0 10px;
  border-radius:999px;
  background:#fff;
  border:1px solid rgba(224,27,36,.25);
  color:var(--accent);
  font-weight:700;
  font-size:12px;
  margin-bottom:10px;
}
.callout__text{margin:0}

.pillRow{display:flex;flex-wrap:wrap;gap:10px}
.pill{
  border:1px solid var(--line);
  background:var(--soft);
  border-radius:999px;
  padding:8px 12px;
  font-weight:600;
  font-size:13px;
}

.quote{
  margin:0;
  border-left:4px solid var(--accent);
  padding:12px 14px;
  background:var(--soft);
  border-radius:14px;
}
.quote p{margin:0 0 10px}
.quote footer{color:var(--muted);font-size:14px}

/* Side */
.side{position:sticky;top:96px;display:grid;gap:14px}
.sideCard{
  border:1px solid var(--line);
  border-radius:var(--radius2);
  padding:18px;
  background:#fff;
  box-shadow:var(--shadow);
}
.sideCard--ghost{background:var(--soft);box-shadow:none}
.form{display:grid;gap:12px;margin-top:12px}
.field{display:grid;gap:6px}
.field__label{font-size:13px;color:var(--muted);font-weight:600}
.input{
  height:44px;
  border-radius:14px;
  border:1px solid var(--line);
  padding:0 12px;
  outline:none;
  transition:.15s ease;
  background:#fff;
}
.input:focus{border-color:rgba(224,27,36,.55);box-shadow:0 0 0 3px rgba(224,27,36,.12)}
.fineprint{font-size:12px;color:var(--muted);line-height:1.4}

.miniCase{
  display:block;
  padding:12px 0;
  border-top:1px solid rgba(0,0,0,.06);
}
.miniCase:first-of-type{border-top:0;padding-top:0}
.miniCase__t{display:block;font-weight:700}
.miniCase:hover .miniCase__t{color:var(--accent)}


/* Responsive */
@media (max-width: 980px){
  .nav{display:none}
  .h1{font-size:34px}
  .caseProduct{grid-template-columns:1fr}
  .caseSummary{position:relative;top:auto}
  .caseBody__grid{grid-template-columns:1fr}
  .side{position:relative;top:auto}
  .cards{grid-template-columns:1fr}
  .gallery__thumbs{grid-template-columns:repeat(5, minmax(0,1fr))}
}
@media (max-width: 520px){
  .h1{font-size:28px}
  .gallery__thumbs{grid-template-columns:repeat(3, minmax(0,1fr))}
  .resultBox__grid{grid-template-columns:1fr}
}

</style>


<?php get_footer(); ?>
