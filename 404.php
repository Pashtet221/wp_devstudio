<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

	

<style>
:root{
  --dark: #171d25;
  --red:  #dc2626;
  --white: #ffffff;

  --border: rgba(23,29,37,.14);
  --glass: rgba(255,255,255,.82);

  --radius: 22px;
  --shadow: 0 20px 60px rgba(23,29,37,.25);
  --shadow-sm: 0 10px 30px rgba(23,29,37,.18);
}

/* фон */
.bg{
  position:fixed;
  inset:0;
  z-index:-1;
  background:
    radial-gradient(800px 500px at 15% 10%, rgba(220,38,38,.08), transparent 60%),
    radial-gradient(900px 600px at 80% 80%, rgba(23,29,37,.10), transparent 60%);
}

/* контейнер */
.container{
  width:min(1180px, calc(100% - 40px));
  margin:0 auto;
}

/* header */
.header{
  padding:24px 0;
}
.brand{
  display:flex;
  align-items:center;
  gap:12px;
  text-decoration:none;
  color:var(--dark);
}
.brand__logo{
  width:42px;
  height:42px;
  border-radius:14px;
  background:var(--dark);
  position:relative;
}
.brand__logo::after{
  content:"";
  position:absolute;
  inset:8px;
  background:var(--red);
  border-radius:8px;
}
.brand__name{
  font-weight:800;
  letter-spacing:.3px;
}

/* main */
.main{
  min-height:calc(100vh - 140px);
  display:flex;
  align-items:center;
}

.card{
  width:100%;
  display:grid;
  grid-template-columns:1.2fr .8fr;
  gap:22px;
}

/* left */
.hero{
  background:var(--glass);
  border:1px solid var(--border);
  border-radius:var(--radius);
  padding:40px;
  box-shadow:var(--shadow);
}

.badge{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:8px 14px;
  border-radius:999px;
  border:1px solid var(--border);
  font-size:13px;
}
.badge span{
  width:8px;
  height:8px;
  border-radius:50%;
  background:var(--red);
}

.code{
  margin:24px 0 6px;
  font-size:clamp(72px, 10vw, 132px);
  font-weight:900;
  line-height:1;
  color:var(--red);
}

.title{
  font-size:26px;
  font-weight:800;
  margin:0 0 12px;
}

.desc{
  color:rgba(23,29,37,.75);
  max-width:60ch;
  line-height:1.55;
}

.actions{
  margin-top:28px;
  display:flex;
  gap:12px;
  flex-wrap:wrap;
}

.btn{
  padding:14px 18px;
  border-radius:14px;
  border:1px solid var(--border);
  background:#fff;
  font-weight:700;
  text-decoration:none;
  color:var(--dark);
  box-shadow:var(--shadow-sm);
  transition:.2s;
}
.btn:hover{
  transform:translateY(-1px);
}

.btn--primary{
  background:var(--red);
  color:#fff;
  border-color:var(--red);
}

/* right */
.side{
  display:flex;
  flex-direction:column;
  gap:14px;
}

.box{
  background:var(--glass);
  border:1px solid var(--border);
  border-radius:var(--radius);
  padding:20px;
  box-shadow:var(--shadow-sm);
}

.box h3{
  margin:0 0 12px;
  font-size:15px;
}

.link{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:12px 14px;
  border-radius:14px;
  border:1px solid var(--border);
  text-decoration:none;
  color:var(--dark);
  font-weight:600;
  margin-bottom:10px;
}
.link:hover{
  border-color:var(--red);
}

.small{
  font-size:13px;
  color:rgba(23,29,37,.7);
}

/* responsive */
@media(max-width:900px){
  .card{ grid-template-columns:1fr }
}
</style>

<div class="bg"></div>

<main class="main">
  <div class="container">
    <section class="card">

      <!-- LEFT -->
      <div class="hero">
        <div class="badge">
          <span></span>
          Ошибка навигации
        </div>

        <div class="code">404</div>
        <h1 class="title">Страница не найдена</h1>

        <p class="desc">
          Такой страницы не существует или она была удалена.
          Проверьте адрес или вернитесь на главную.
        </p>

        <div class="actions">
          <a href="/" class="btn btn--primary">На главную</a>
          <button class="btn" onclick="history.back()">Назад</button>
          <a href="/contacts" class="btn">Связаться</a>
        </div>
      </div>

      <!-- RIGHT -->
      <aside class="side">
        <div class="box">
          <h3>Популярные разделы</h3>
          <a class="link" href="/services">Услуги →</a>
          <a class="link" href="/cases">Кейсы →</a>
          <a class="link" href="/blog">Блог →</a>
        </div>

        <div class="box">
          <h3>Для разработчиков</h3>
          <p class="small">
            Проверьте <b>permalinks</b>, редиректы и кеш.
            Частая причина 404 — неверные URL.
          </p>
        </div>
      </aside>

    </section>
  </div>
</main>







<?php get_footer(); ?>
