<?php
/*
Template Name: Услуга — Почасовая разработка WordPress
Template Post Type: service, page
*/
defined('ABSPATH') || exit;

get_header();

$contact_url = home_url('/contacts/');
$tasks = [
	'Долгосрочная разработка WordPress', 'Поддержка WooCommerce-магазина',
	'Доработка существующего сайта', 'Кастомный функционал',
	'Разработка и доработка плагинов', 'API-интеграции', 'Исправление ошибок',
	'Оптимизация скорости', 'Доработка checkout и корзины',
	'Импорт и обработка данных', 'Работа с Elementor, Woodmart и кастомными темами',
	'Регулярные технические задачи',
];
$steps = [
	'Вы присылаете задачу.',
	'Я изучаю её и даю ориентировочную оценку времени.',
	'Согласовываем примерный бюджет.',
	'Запускается тайм-трекер.',
	'Выполняется работа.',
	'Вы получаете результат и отчёт по затраченному времени.',
	'Оплата рассчитывается по фактически отработанным часам.',
];
?>

<style>
	:root{--hourly-green:#27b45e;--hourly-green-dark:#168a43;--hourly-ink:#17211b;--hourly-muted:#66736b;--hourly-line:#dfe9e2;--hourly-soft:#f3f8f4;--hourly-white:#fff}
	.hourly{background:#f8faf8;color:var(--hourly-ink);font-family:inherit;padding-bottom:80px}.hourly *{box-sizing:border-box}.hourly__wrap{width:min(1180px,calc(100% - 40px));margin:auto}.hourly__hero{padding:64px 0 36px;background:radial-gradient(circle at 83% 18%,rgba(39,180,94,.16),transparent 24%),linear-gradient(180deg,#f1f8f3 0%,#f8faf8 100%)}.hourly__hero-grid{display:grid;grid-template-columns:minmax(0,1.15fr) minmax(330px,.72fr);gap:34px;align-items:center}.hourly__eyebrow,.hourly__tag{display:inline-flex;align-items:center;gap:8px;padding:8px 13px;border-radius:99px;background:#e1f5e8;color:var(--hourly-green-dark);font-size:13px;font-weight:750;letter-spacing:.03em;text-transform:uppercase}.hourly h1{max-width:800px;margin:19px 0;font-size:clamp(38px,5.6vw,68px);line-height:1.02;letter-spacing:-.045em}.hourly__lead{max-width:760px;margin:0;color:var(--hourly-muted);font-size:19px;line-height:1.65}.hourly__hero-points{display:flex;flex-wrap:wrap;gap:10px;margin:25px 0}.hourly__hero-points span{padding:9px 12px;border:1px solid var(--hourly-line);border-radius:10px;background:rgba(255,255,255,.7);font-size:14px;font-weight:650}.hourly__actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:26px}.hourly__button{display:inline-flex;min-height:50px;align-items:center;justify-content:center;padding:0 21px;border:1px solid var(--hourly-green);border-radius:12px;color:var(--hourly-green-dark);font-weight:750;text-decoration:none;transition:.2s}.hourly__button--main{background:var(--hourly-green);color:#fff;box-shadow:0 12px 28px rgba(39,180,94,.22)}.hourly__button:hover{transform:translateY(-2px);color:var(--hourly-green-dark)}.hourly__button--main:hover{background:var(--hourly-green-dark);color:#fff}.hourly__calculator{padding:28px;background:#fff;border:1px solid var(--hourly-line);border-radius:25px;box-shadow:0 22px 60px rgba(25,55,35,.09)}.hourly__calculator h2{margin:10px 0 7px;font-size:25px}.hourly__calculator-intro{margin:0 0 22px;color:var(--hourly-muted);font-size:14px;line-height:1.55}.hourly__field{margin:16px 0}.hourly__field label{display:flex;justify-content:space-between;gap:12px;margin-bottom:8px;font-size:14px;font-weight:700}.hourly__field input[type=number]{width:100%;height:48px;padding:0 14px;border:1px solid #ccd9d0;border-radius:10px;background:#fff;color:var(--hourly-ink);font:inherit}.hourly__field input[type=range]{width:100%;accent-color:var(--hourly-green)}.hourly__total{margin-top:22px;padding:17px;border-radius:14px;background:var(--hourly-soft)}.hourly__total small{display:block;margin-bottom:5px;color:var(--hourly-muted)}.hourly__total strong{font-size:29px}.hourly__note{margin:13px 0 0;color:var(--hourly-muted);font-size:12px;line-height:1.5}.hourly__section{padding:48px 0 0}.hourly__heading{max-width:790px;margin-bottom:25px}.hourly__heading h2{margin:10px 0;font-size:clamp(29px,4vw,44px);line-height:1.13;letter-spacing:-.025em}.hourly__heading p,.hourly__copy{color:var(--hourly-muted);font-size:17px;line-height:1.75}.hourly__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}.hourly__card{padding:25px;background:#fff;border:1px solid var(--hourly-line);border-radius:19px;box-shadow:0 10px 32px rgba(25,55,35,.04)}.hourly__card h3{margin:0 0 10px;font-size:20px}.hourly__card p{margin:0;color:var(--hourly-muted);line-height:1.65}.hourly__task-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:11px;margin:0;padding:0;list-style:none}.hourly__task-grid li{position:relative;padding:15px 15px 15px 41px;background:#fff;border:1px solid var(--hourly-line);border-radius:13px;line-height:1.45}.hourly__task-grid li:before{content:'✓';position:absolute;left:15px;color:var(--hourly-green);font-weight:900}.hourly__steps{display:grid;grid-template-columns:repeat(4,1fr);gap:13px;counter-reset:step}.hourly__step{counter-increment:step;padding:20px;background:#fff;border:1px solid var(--hourly-line);border-radius:16px;line-height:1.55}.hourly__step:before{content:counter(step);display:grid;width:32px;height:32px;margin-bottom:12px;place-items:center;border-radius:50%;background:#e1f5e8;color:var(--hourly-green-dark);font-weight:800}.hourly__example{display:grid;grid-template-columns:1fr 1fr;gap:28px;padding:32px;background:#18261d;color:#fff;border-radius:25px}.hourly__example h2{margin:8px 0 12px;font-size:34px}.hourly__example p{color:#c6d2ca;line-height:1.7}.hourly__estimate{display:grid;grid-template-columns:1fr 1fr;gap:1px;overflow:hidden;border:1px solid #405047;border-radius:15px;background:#405047}.hourly__estimate div{padding:15px;background:#223128}.hourly__estimate span{display:block;margin-bottom:5px;color:#a9b9ae;font-size:12px}.hourly__estimate strong{font-size:17px}.hourly__compare{display:grid;grid-template-columns:1fr 1fr;gap:18px}.hourly__compare-card{padding:28px;background:#fff;border:1px solid var(--hourly-line);border-radius:20px}.hourly__compare-card--accent{border:2px solid var(--hourly-green);box-shadow:0 18px 45px rgba(39,180,94,.1)}.hourly__compare-card h3{margin:0 0 17px;font-size:24px}.hourly__list{display:grid;gap:12px;margin:0;padding:0;list-style:none}.hourly__list li{position:relative;padding-left:24px;color:var(--hourly-muted);line-height:1.55}.hourly__list li:before{content:'•';position:absolute;left:4px;color:var(--hourly-green);font-weight:900}.hourly__cta{padding:38px;text-align:center;background:linear-gradient(135deg,#e5f7eb,#f4faf6);border:1px solid #cce8d5;border-radius:26px}.hourly__cta h2{max-width:760px;margin:0 auto 12px;font-size:clamp(28px,4vw,42px)}.hourly__cta p{max-width:760px;margin:0 auto 22px;color:var(--hourly-muted);font-size:17px;line-height:1.65}
	@media(max-width:900px){.hourly__hero-grid{grid-template-columns:1fr}.hourly__grid,.hourly__task-grid{grid-template-columns:repeat(2,1fr)}.hourly__steps{grid-template-columns:repeat(2,1fr)}}
	@media(max-width:600px){.hourly__wrap{width:min(100% - 28px,1180px)}.hourly__hero{padding-top:38px}.hourly h1{font-size:39px}.hourly__calculator{padding:21px}.hourly__grid,.hourly__task-grid,.hourly__steps,.hourly__compare,.hourly__example{grid-template-columns:1fr}.hourly__example{padding:24px}.hourly__estimate{grid-template-columns:1fr}.hourly__section{padding-top:38px}}
</style>

<main class="hourly">
	<section class="hourly__hero">
		<div class="hourly__wrap hourly__hero-grid">
			<div>
				<span class="hourly__eyebrow">Быстрый старт · прозрачная оплата</span>
				<h1>WordPress и WooCommerce разработка от 1 500 ₽/час</h1>
				<p class="hourly__lead">Не тратьте недели на подготовку огромного ТЗ. Поставьте задачу, получите оценку времени и начинайте разработку. Все часы фиксируются через тайм-трекер.</p>
				<div class="hourly__hero-points"><span>Оценка до старта</span><span>Контроль бюджета</span><span>Оплата за фактическое время</span></div>
				<div class="hourly__actions"><a class="hourly__button hourly__button--main" href="<?php echo esc_url($contact_url); ?>">Обсудить задачу</a><a class="hourly__button" href="#calculator">Рассчитать бюджет</a></div>
			</div>
			<aside class="hourly__calculator" id="calculator" aria-labelledby="calculator-title">
				<span class="hourly__tag">Калькулятор</span><h2 id="calculator-title">Ориентировочный бюджет</h2>
				<p class="hourly__calculator-intro">Укажите ставку и предполагаемое количество часов.</p>
				<div class="hourly__field"><label for="hourly-rate">Ставка, ₽/час</label><input id="hourly-rate" type="number" min="1500" step="100" value="1500" inputmode="numeric"></div>
				<div class="hourly__field"><label for="hourly-hours">Количество часов <output id="hourly-hours-output" for="hourly-hours">5</output></label><input id="hourly-hours" type="range" min="1" max="100" value="5"></div>
				<div class="hourly__total" aria-live="polite"><small>Ориентировочный бюджет</small><strong id="hourly-total">7 500 ₽</strong></div>
				<p class="hourly__note">Расчёт предварительный. До начала работы я изучу задачу и дам диапазон часов. Для сложных задач ставка согласовывается отдельно.</p>
			</aside>
		</div>
	</section>

	<section class="hourly__section"><div class="hourly__wrap">
		<div class="hourly__heading"><span class="hourly__tag">Почему это удобно</span><h2>Быстрее к работе — без потери контроля</h2><p>При фиксированной цене нужно заранее описать почти каждый пункт и согласовать стоимость каждой части. На сложном проекте одно только ТЗ может занять недели. В почасовом формате достаточно конкретной задачи или списка задач: я изучаю их и до старта даю диапазон времени — например, 2–4 или 5–8 часов.</p></div>
		<div class="hourly__grid"><article class="hourly__card"><h3>Бюджет известен заранее</h3><p>По диапазону часов вы сразу понимаете возможную стоимость и решаете, подходит ли она. Работа начинается только после согласования.</p></article><article class="hourly__card"><h3>Только фактическое время</h3><p>Часы фиксируются в Hubstaff или другом согласованном тайм-трекере. Вы видите, сколько времени действительно заняла работа.</p></article><article class="hourly__card"><h3>Низкий порог входа</h3><p>Необязательно сразу заказывать большой проект. Начните с одной задачи на несколько часов, оцените результат и продолжайте сотрудничество.</p></article></div>
	</div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__heading"><span class="hourly__tag">Направления</span><h2>Для каких задач подходит</h2></div><ul class="hourly__task-grid"><?php foreach ($tasks as $task) : ?><li><?php echo esc_html($task); ?></li><?php endforeach; ?></ul></div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__example">
		<div><span class="hourly__tag">Пример оценки</span><h2>Доработать оформление заказа WooCommerce</h2><p>После согласования оценки запускается тайм-трекер и начинается работа. Итоговая сумма рассчитывается по фактически затраченному времени.</p></div>
		<div class="hourly__estimate"><div><span>Предварительная оценка</span><strong>3–5 часов</strong></div><div><span>Ставка</span><strong>1 500 ₽/час</strong></div><div><span>Ориентировочный бюджет</span><strong>4 500–7 500 ₽</strong></div><div><span>Старт</span><strong>После согласования</strong></div></div>
	</div></div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__heading"><span class="hourly__tag">Процесс</span><h2>Как проходит работа</h2></div><div class="hourly__steps"><?php foreach ($steps as $step) : ?><div class="hourly__step"><?php echo esc_html($step); ?></div><?php endforeach; ?></div></div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__heading"><span class="hourly__tag">Развивающиеся проекты</span><h2>Новые задачи — без постоянного пересогласования смет</h2><p>Сегодня нужно изменить checkout, завтра подключить API, затем улучшить карточку товара или исправить проблему после обновления WooCommerce. Задачи просто добавляются в работу и оплачиваются по фактически затраченному времени — без новой большой сметы и дополнительных соглашений на каждую доработку.</p></div></div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__heading"><span class="hourly__tag">Сравнение форматов</span><h2>Fixed Price или почасовая разработка?</h2></div><div class="hourly__compare">
		<article class="hourly__compare-card"><h3>Fixed Price</h3><ul class="hourly__list"><li>Подходит для небольших задач с чётко определённым результатом.</li><li>Нужно заранее зафиксировать весь объём.</li><li>Изменение требований может потребовать новой оценки.</li></ul></article>
		<article class="hourly__compare-card hourly__compare-card--accent"><h3>Почасовая разработка</h3><ul class="hourly__list"><li>Подходит для долгосрочных и развивающихся проектов.</li><li>Можно начать быстрее — огромное ТЗ не требуется.</li><li>Новые задачи легко добавлять в работу.</li><li>Оплата только за фактически затраченное время.</li></ul></article>
	</div></div></section>

	<section class="hourly__section"><div class="hourly__wrap"><div class="hourly__cta"><h2>Есть задача на WordPress или WooCommerce?</h2><p>Пришлите описание — я оценю примерное количество часов и бюджет до начала работы.</p><a class="hourly__button hourly__button--main" href="<?php echo esc_url($contact_url); ?>">Получить оценку времени</a></div></div></section>
</main>

<script>
	(function(){
		var rate=document.getElementById('hourly-rate');
		var hours=document.getElementById('hourly-hours');
		var hoursOutput=document.getElementById('hourly-hours-output');
		var total=document.getElementById('hourly-total');
		if(!rate||!hours||!hoursOutput||!total){return;}
		var format=new Intl.NumberFormat('ru-RU');
		function update(){var rateValue=Math.max(1500,Number(rate.value)||1500);var hoursValue=Number(hours.value)||1;hoursOutput.textContent=hoursValue;total.textContent=format.format(rateValue*hoursValue)+' ₽';}
		rate.addEventListener('input',update);hours.addEventListener('input',update);update();
	}());
</script>

<?php get_footer(); ?>
