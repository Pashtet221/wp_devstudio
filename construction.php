<?php
/*
Template Name: В разработке
*/
get_header();
?>


<style>
:root{
  --dark:#171d25;
  --red:#dc2626;
  --white:#fff;

  --border: rgba(23,29,37,.14);
  --glass: rgba(255,255,255,.84);

  --radius: 22px;
  --shadow: 0 20px 60px rgba(23,29,37,.25);
  --shadow-sm: 0 10px 30px rgba(23,29,37,.18);
}

/* мягкий фон в фирменной гамме */
.bg{
  position:fixed;
  inset:0;
  z-index:-1;
  background:
    radial-gradient(900px 560px at 18% 10%, rgba(220,38,38,.09), transparent 60%),
    radial-gradient(980px 640px at 75% 85%, rgba(23,29,37,.11), transparent 60%);
}
.bg::after{
  content:"";
  position:absolute;
  inset:-2px;
  background:
    linear-gradient(to right, rgba(23,29,37,.08) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(23,29,37,.08) 1px, transparent 1px);
  background-size: 52px 52px;
  opacity:.18;
  mask: radial-gradient(60% 50% at 50% 35%, #000 60%, transparent 100%);
}

.container{
  width:min(1180px, calc(100% - 40px));
  margin:0 auto;
}

/* верх */
.header{
  padding: 24px 0;
}
.top{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:14px;
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
  box-shadow: var(--shadow-sm);
}
.brand__logo:after{
  content:"";
  position:absolute;
  inset:8px;
  border-radius:9px;
  background: var(--red);
}
.brand__name{
  font-weight:900;
  letter-spacing:.2px;
}
.nav{
  display:flex;
  gap:10px;
}
.pill{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:10px 14px;
  border-radius:999px;
  border:1px solid var(--border);
  background: rgba(255,255,255,.75);
  text-decoration:none;
  color:var(--dark);
  font-weight:700;
  font-size:13px;
  box-shadow: var(--shadow-sm);
  transition:.2s;
}
.pill:hover{ transform:translateY(-1px); border-color: rgba(220,38,38,.45); }

/* main */
.main{
  min-height: calc(100vh - 140px);
  display:flex;
  align-items:center;
  padding: 10px 0 40px;
}

/* главный блок */
.panel{
  border:1px solid var(--border);
  background: var(--glass);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  overflow:hidden;
  position:relative;
}

/* декоративная “лента” */
.panel::before{
  content:"";
  position:absolute;
  top:-60px;
  right:-60px;
  width: 240px;
  height: 240px;
  border-radius: 50%;
  background: radial-gradient(closest-side, rgba(220,38,38,.18), transparent 70%);
}
.panel::after{
  content:"";
  position:absolute;
  bottom:-80px;
  left:-80px;
  width: 280px;
  height: 280px;
  border-radius: 50%;
  background: radial-gradient(closest-side, rgba(23,29,37,.16), transparent 70%);
}

.panel__inner{
  position:relative;
  z-index:1;
  display:grid;
  grid-template-columns: 1.1fr .9fr;
  gap: 22px;
  padding: 38px;
}

/* левый контент */
.badge{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:8px 14px;
  border-radius:999px;
  border:1px solid var(--border);
  font-size:13px;
  font-weight:700;
  background: rgba(255,255,255,.7);
}
.badge i{
  width:8px; height:8px; border-radius:50%;
  background: var(--red);
  display:inline-block;
}

.h1{
  margin:18px 0 10px;
  font-size: 34px;
  font-weight: 900;
  letter-spacing: -0.4px;
}
.sub{
  margin:0;
  font-size:15px;
  line-height:1.55;
  color: rgba(23,29,37,.75);
  max-width: 62ch;
}

/* “прогресс” в разработке */
.progress{
  margin-top: 22px;
  padding: 16px;
  border-radius: 18px;
  border:1px solid var(--border);
  background: rgba(255,255,255,.72);
  box-shadow: var(--shadow-sm);
}
.progress__top{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap: 12px;
  font-weight: 800;
  font-size: 13px;
}
.progress__top span:last-child{
  color: rgba(23,29,37,.75);
  font-weight: 900;
}
.bar{
  margin-top: 12px;
  height: 10px;
  border-radius: 999px;
  background: rgba(23,29,37,.10);
  overflow:hidden;
}
.bar > b{
  display:block;
  height: 100%;
  width: var(--p, 35%);
  background: var(--red);
  border-radius: 999px;
}

/* действия */
.actions{
  margin-top: 18px;
  display:flex;
  flex-wrap:wrap;
  gap: 12px;
}
.btn{
  padding: 14px 18px;
  border-radius: 14px;
  border:1px solid var(--border);
  background:#fff;
  font-weight: 800;
  text-decoration:none;
  color: var(--dark);
  box-shadow: var(--shadow-sm);
  transition:.2s;
  cursor:pointer;
}
.btn:hover{ transform: translateY(-1px); border-color: rgba(220,38,38,.45); }
.btn--primary{
  background: var(--red);
  color:#fff;
  border-color: var(--red);
}

/* правая колонка — “что будет” + форма */
.side{
  display:flex;
  flex-direction:column;
  gap: 14px;
}
.card{
  border:1px solid var(--border);
  border-radius: var(--radius);
  background: rgba(255,255,255,.72);
  box-shadow: var(--shadow-sm);
  padding: 18px;
}
.card h3{
  margin:0 0 12px;
  font-size: 15px;
  font-weight: 900;
}
.list{
  display:grid;
  gap: 10px;
  margin:0;
  padding:0;
  list-style:none;
}
.item{
  display:flex;
  gap: 10px;
  align-items:flex-start;
  padding: 12px 12px;
  border-radius: 16px;
  border:1px solid var(--border);
  background: rgba(255,255,255,.75);
}
.tick{
  flex:0 0 auto;
  width: 20px;
  height: 20px;
  border-radius: 7px;
  background: rgba(220,38,38,.12);
  border: 1px solid rgba(220,38,38,.35);
  display:grid;
  place-items:center;
}
.tick:before{
  content:"";
  width: 10px; height: 10px;
  border-radius: 4px;
  background: var(--red);
}
.item strong{
  font-size: 13px;
  font-weight: 900;
}
.item p{
  margin: 4px 0 0;
  font-size: 12.5px;
  color: rgba(23,29,37,.72);
  line-height: 1.45;
}

/* мини-форма “сообщить, когда готово” */
.form{
  display:flex;
  gap: 10px;
  margin-top: 10px;
}
.input{
  flex:1;
  border-radius: 14px;
  border:1px solid var(--border);
  background: #fff;
  padding: 12px 14px;
  font-size: 14px;
  outline:none;
}
.input:focus{
  border-color: rgba(220,38,38,.55);
}
.note{
  margin-top: 10px;
  font-size: 12px;
  color: rgba(23,29,37,.65);
}

/* footer */
.footer{
  padding: 16px 0 28px;
  font-size: 12px;
  color: rgba(23,29,37,.65);
}
.footer__inner{
  display:flex;
  justify-content:space-between;
  gap:12px;
  padding-top: 16px;
  border-top: 1px solid var(--border);
}

/* responsive */
@media(max-width: 980px){
  .nav{ display:none; }
  .panel__inner{ grid-template-columns:1fr; }
}
@media(max-width: 520px){
  .panel__inner{ padding: 22px; }
  .h1{ font-size: 28px; }
  .form{ flex-direction:column; }
  .btn{ width:100%; }
}
</style>

<div class="bg" aria-hidden="true"></div>


<main class="main">
  <div class="container">
    <section class="panel" aria-label="Раздел в разработке">
      <div class="panel__inner">

        <!-- LEFT -->
        <div>
          <div class="badge"><i></i> Раздел в разработке</div>

          <h1 class="h1">Скоро здесь появятся плагины</h1>
          <p class="sub">
            Мы собираем и оформляем раздел так, чтобы вам было удобно:
            описание, демо, документация, цены и поддержка — всё в одном месте.
          </p>

          <!-- прогресс (можешь менять процент в style="--p:55%") -->
          <div class="progress" style="--p: 42%;">
            <div class="progress__top">
              <span>Статус подготовки</span>
              <span>42%</span>
            </div>
            <div class="bar"><b></b></div>
          </div>

          <div class="actions">
            <a href="/" class="btn btn--primary">На главную</a>
            <button class="btn" type="button" onclick="history.back()">Назад</button>
            <a href="/contacts" class="btn">Спросить сроки</a>
          </div>
        </div>

        <!-- RIGHT -->
        <aside class="side">
          <div class="card">
            <h3>Что будет в разделе</h3>
            <ul class="list">
              <li class="item">
                <span class="tick"></span>
                <div>
                  <strong>Каталог плагинов</strong>
                  <p>Карточки, фильтры, версии, совместимость и быстрые ответы.</p>
                </div>
              </li>
              <li class="item">
                <span class="tick"></span>
                <div>
                  <strong>Демо + документация</strong>
                  <p>Видео/скрины, инструкции, FAQ, changelog и примеры.</p>
                </div>
              </li>
              <li class="item">
                <span class="tick"></span>
                <div>
                  <strong>Поддержка и обновления</strong>
                  <p>Понятные тарифы, сроки реакции и регламент работ.</p>
                </div>
              </li>
            </ul>
          </div>

          <div class="card">
            <h3>Сообщить, когда готово</h3>
            <p class="note" style="margin-top:0;">
              Оставьте email — и мы уведомим, когда раздел откроется.
            </p>

            <!-- это просто верстка: подключишь свою отправку/CF7/WPForms -->
            <form class="form" action="#" method="post">
              <input class="input" type="email" name="email" placeholder="Ваш email" required>
              <button class="btn btn--primary" type="submit">Уведомить</button>
            </form>

            <p class="note">Не спамим. Только одно письмо по готовности.</p>
          </div>
        </aside>

      </div>
    </section>

  </div>
</main>




<?php get_footer(); ?>
