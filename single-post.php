<?php get_header(); ?>

<main class="postPage" id="postPage">
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Progress bar -->
    <div class="postProgress" aria-hidden="true">
      <div class="postProgress__bar" id="postProgressBar"></div>
    </div>

    <section class="postHero" aria-label="<?php the_title_attribute(); ?>">
      <div class="container postHero__container">

        <!-- Breadcrumbs -->
        <nav class="postCrumbs" aria-label="Хлебные крошки">
          <a class="postCrumbs__link" href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
          <span class="postCrumbs__sep">/</span>
          <a class="postCrumbs__link" href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog/')); ?>">Блог</a>
          <span class="postCrumbs__sep">/</span>
          <span class="postCrumbs__current"><?php the_title(); ?></span>
        </nav>

        <div class="postHero__grid">
          <header class="postHero__head">
            <div class="postMeta">
              <time class="postMeta__item" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('d.m.Y')); ?>
              </time>

              <span class="postMeta__dot">•</span>

              <span class="postMeta__item">
                <?php echo esc_html( wp_trim_words( wp_strip_all_tags(get_the_content()), 1, '' ) ? '' : '' ); ?>
                <?php echo esc_html( mytheme_estimate_reading_time(get_the_content()) ); ?>
              </span>

              <?php $cats = get_the_category(); if (!empty($cats)) : ?>
                <span class="postMeta__dot">•</span>
                <a class="postMeta__pill" href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>">
                  <?php echo esc_html($cats[0]->name); ?>
                </a>
              <?php endif; ?>
            </div>

            <h1 class="postTitle"><?php the_title(); ?></h1>

            <?php if (has_excerpt()) : ?>
              <p class="postLead"><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php else: ?>
              <p class="postLead"><?php echo esc_html( mytheme_make_lead_from_content(get_the_content(), 28) ); ?></p>
            <?php endif; ?>

            <div class="postActions">
              <a class="postBtn postBtn--primary" href="#postCta">Обсудить проект</a>
              <button class="postBtn postBtn--ghost" type="button" id="copyPostLink">Скопировать ссылку</button>
            </div>
          </header>

          <div class="postHero__cover">
            <?php if (has_post_thumbnail()) : ?>
              <figure class="postCover">
                <?php the_post_thumbnail('large', [
                  'class' => 'postCover__img',
                  'loading' => 'eager',
                  'fetchpriority' => 'high',
                  'alt' => trim(strip_tags(get_the_title()))
                ]); ?>
              </figure>
            <?php else: ?>
              <figure class="postCover postCover--placeholder" aria-hidden="true">
                <div class="postCover__ph"></div>
              </figure>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </section>

    <section class="postBody">
      <div class="container postBody__container">

        <div class="postLayout">

          <!-- Sidebar -->
          <aside class="postAside" aria-label="Навигация по статье">
            <div class="postAside__card">
              <div class="postAside__title">Содержание</div>
              <nav class="postToc" id="postToc"></nav>

              <div class="postAside__divider"></div>

              <div class="postAside__mini">
                <div class="postAside__miniTitle">Нужен такой же результат?</div>
                <div class="postAside__miniText">
                  Поможем с UX/UI, разработкой на WordPress, интеграциями CRM/оплат/аналитики и ускорением.
                </div>
                <a class="postBtn postBtn--primary postBtn--block" href="#postCta">Получить консультацию</a>
              </div>
            </div>
          </aside>

          <!-- Content -->
          <article class="postContent" id="postContent">
            <?php the_content(); ?>

            <!-- CTA -->
            <section class="postCta" id="postCta" aria-label="Форма заявки">
              <div class="postCta__inner">
                <div class="postCta__text">
                  <h3 class="postCta__title">Хотите обсудить проект?</h3>
                  <p class="postCta__desc">
                    Напишите задачу — предложим решение, сроки и этапы. Без воды.
                  </p>
                </div>

               <?php echo do_shortcode('[post_cta_form]'); ?>
				  
				  
              </div>
            </section>

            <!-- Related -->
            <?php
              $related = mytheme_related_posts(get_the_ID(), 3);
              if ($related && $related->have_posts()) :
            ?>
              <section class="postRelated" aria-label="Похожие материалы">
                <h3 class="postRelated__title">Похожие материалы</h3>
                <div class="postRelated__grid">
                  <?php while ($related->have_posts()) : $related->the_post(); ?>
                    <a class="postCard" href="<?php the_permalink(); ?>">
                      <div class="postCard__img">
                        <?php if (has_post_thumbnail()) {
                          the_post_thumbnail('medium', ['loading'=>'lazy']);
                        } else { echo '<span class="postCard__ph" aria-hidden="true"></span>'; } ?>
                      </div>
                      <div class="postCard__body">
                        <div class="postCard__meta"><?php echo esc_html(get_the_date('d.m.Y')); ?></div>
                        <div class="postCard__name"><?php the_title(); ?></div>
                      </div>
                    </a>
                  <?php endwhile; wp_reset_postdata(); ?>
                </div>
              </section>
            <?php endif; ?>

          </article>

        </div>
      </div>
    </section>

  <?php endwhile; ?>
</main>


<style>
:root{
  --container: 1440px;
  --pad-desktop: 72px;
  --pad-tablet: 36px;
  --pad-mobile: 16px;

  --bg: #ffffff;
  --text: #0b0c10;
  --muted: #6b7280;
  --line: rgba(15, 23, 42, .10);

  --card: #ffffff;
  --soft: #f6f7fb;

  --radius-lg: 28px;
  --radius-md: 18px;
  --shadow: 0 18px 40px rgba(15,23,42,.06);

  /* ✅ ТВОЙ БРЕНД-ЦВЕТ */
  --accent: #e01b24;
  --accent-10: rgba(224, 27, 36, .10);
  --accent-14: rgba(224, 27, 36, .14);
  --accent-22: rgba(224, 27, 36, .22);
  --accent-35: rgba(224, 27, 36, .35);
  --accent-45: rgba(224, 27, 36, .45);
  --accent-90: rgba(224, 27, 36, .90);
}

/* Container */
.container{
  margin-inline: auto;
  max-width: var(--container);
  padding-inline: var(--pad-desktop);
}
@media (max-width: 1199px){
  .container{ max-width: 980px; padding-inline: var(--pad-tablet); }
}
@media (max-width: 767px){
  .container{ max-width: 100%; padding-inline: var(--pad-mobile); }
}

/* Page */
.postPage{
  background: var(--bg);
  color: var(--text);
}

/* Progress */
.postProgress{
  position: sticky;
  top: 0;
  z-index: 9999;
  height: 3px;
  background: transparent;
}
.postProgress__bar{
  height: 100%;
  width: 0%;
  background: var(--accent-90);
  transform-origin: 0 50%;
}

/* Hero */
.postHero{ padding: 18px 0 10px; }

.postCrumbs{
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 8px;
  font: 400 14px/1.4 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  color: var(--muted);
  margin-bottom: 14px;
}
.postCrumbs__link{ color: inherit; text-decoration: none; }
.postCrumbs__link:hover{ color: #111827; }
.postCrumbs__sep{ opacity: .6; }
.postCrumbs__current{ color: #111827; opacity: .9; }

.postHero__grid{
  display: grid;
  grid-template-columns: minmax(0, 1.2fr) minmax(0, .8fr);
  gap: 26px;
  align-items: start;
}
@media (max-width: 1024px){
  .postHero__grid{ grid-template-columns: 1fr; }
}

.postHero__head{
  background: var(--card);
  border: 1px solid var(--line);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  padding: 28px;
}
@media (max-width: 767px){
  .postHero__head{ padding: 18px; border-radius: var(--radius-md); }
}

.postMeta{
  display: inline-flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  color: var(--muted);
  font: 400 14px/1.4 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  margin-bottom: 10px;
}
.postMeta__dot{ opacity: .5; }
.postMeta__pill{
  display: inline-flex;
  padding: 6px 10px;
  border-radius: 999px;
  border: 1px solid var(--line);
  background: #fff;
  text-decoration: none;
  color: #111827;
}
.postMeta__pill:hover{ background: var(--soft); }

.postTitle{
  margin: 0 0 10px;
  font: 600 clamp(28px, 3.2vw, 46px)/1.08 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  letter-spacing: -0.02em;
}
.postLead{
  margin: 0 0 18px;
  color: #111827;
  opacity: .92;
  font: 400 18px/1.55 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

.postActions{ display: flex; gap: 10px; flex-wrap: wrap; }

/* Cover */
.postCover{
  margin: 0;
  border-radius: var(--radius-lg);
  overflow: hidden;
  border: 1px solid var(--line);
  box-shadow: var(--shadow);
  background: var(--soft);
  min-height: 260px;
}
@media (max-width: 1024px){
  .postCover{ border-radius: var(--radius-md); }
}
.postCover__img{
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
}
.postCover--placeholder .postCover__ph{
  height: 100%;
  min-height: 360px;
  background:
    radial-gradient(1200px 500px at 20% 10%, var(--accent-14), transparent 60%),
    radial-gradient(900px 450px at 80% 30%, rgba(0,0,0,.08), transparent 55%),
    linear-gradient(180deg, #f6f7fb, #fff);
}

/* Body layout */
.postBody{ padding: 18px 0 70px; }

.postLayout{
  display: grid;
  grid-template-columns: 340px minmax(0, 1fr);
  gap: 26px;
  align-items: start;
}
@media (max-width: 1199px){
  .postLayout{ grid-template-columns: 1fr; }
}

/* Aside */
.postAside{ position: sticky; top: 18px; }
@media (max-width: 1199px){
  .postAside{ position: static; }
}

.postAside__card{
  border: 1px solid var(--line);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  background: var(--card);
  padding: 18px;
}
@media (max-width: 767px){
  .postAside__card{ border-radius: var(--radius-md); }
}

.postAside__title{
  font: 600 16px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  margin-bottom: 12px;
}
.postAside__divider{
  height: 1px;
  background: var(--line);
  margin: 14px 0;
}
.postAside__miniTitle{
  font: 600 15px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  margin: 0 0 8px;
}
.postAside__miniText{
  color: var(--muted);
  font: 400 14px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  margin: 0 0 12px;
}

/* TOC */
.postToc{ display: grid; gap: 6px; }
.postToc a{
  display: block;
  text-decoration: none;
  color: #111827;
  padding: 8px 10px;
  border-radius: 12px;
  border: 1px solid transparent;
  background: transparent;
  font: 500 14px/1.35 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}
.postToc a:hover{
  background: var(--soft);
  border-color: var(--line);
}
.postToc a.is-active{
  background: var(--accent-10);
  border-color: var(--accent-22);
}

/* Content */
.postContent{
  border: 1px solid var(--line);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  background: var(--card);
  padding: 28px;
}
@media (max-width: 767px){
  .postContent{ padding: 18px; border-radius: var(--radius-md); }
}

/* Typography inside content */
.postContent :where(h2,h3){ scroll-margin-top: 90px; }
.postContent h2{
  margin: 26px 0 12px;
  font: 650 26px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  letter-spacing: -0.01em;
}
.postContent h3{
  margin: 18px 0 10px;
  font: 650 20px/1.25 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}
.postContent p{
  margin: 0 0 14px;
  font: 400 16px/1.75 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  color: #111827;
}

.postContent a{
  color: #111827;
  text-decoration: underline;
  text-decoration-color: var(--accent-35);
  text-underline-offset: 3px;
}
.postContent a:hover{
  text-decoration-color: var(--accent-90);
}

.postContent ul, .postContent ol{
  margin: 0 0 14px 18px;
  padding: 0;
}
.postContent li{ margin: 7px 0; }

.postContent blockquote{
  margin: 18px 0;
  padding: 16px 16px;
  border-left: 3px solid var(--accent-45);
  background: var(--soft);
  border-radius: 14px;
}

.postContent img{
  max-width: 100%;
  height: auto;
  border-radius: 16px;
}

/* Buttons */
.postBtn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 11px 16px;
  border-radius: 999px;
  border: 1px solid var(--line);
  background: #fff;
  color: #111827;
  text-decoration: none;
  cursor: pointer;
  font: 600 14px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  transition: transform .18s ease, background .18s ease, border-color .18s ease;
}
.postBtn:hover{ transform: translateY(-1px); background: var(--soft); }
.postBtn:active{ transform: translateY(0); }

.postBtn--primary{
  border-color: var(--accent-35);
  background: var(--accent-10);
}
.postBtn--primary:hover{
  background: var(--accent-14);
  border-color: var(--accent-45);
}

.postBtn--ghost{ background: transparent; }
.postBtn--block{ width: 100%; }

/* CTA */
.postCta{
  margin-top: 26px;
  padding-top: 26px;
  border-top: 1px solid var(--line);
}
.postCta__inner{
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
  gap: 18px;
  padding: 18px;
  border-radius: 18px;
  background:
    radial-gradient(900px 400px at 10% 0%, var(--accent-10), transparent 60%),
    linear-gradient(180deg, #fff, #fff);
  border: 1px solid var(--line);
}
@media (max-width: 960px){
  .postCta__inner{ grid-template-columns: 1fr; }
}
.postCta__title{
  margin: 0 0 8px;
  font: 700 20px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}
.postCta__desc{
  margin: 0;
  color: var(--muted);
  font: 400 14px/1.6 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

.postCta__form{
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  align-content: start;
}
.postField{ display: grid; gap: 6px; }
.postField--wide{ grid-column: 1 / -1; }

.postField__label{
  font: 600 12px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  color: #111827;
  opacity: .8;
}
.postField__input{
  width: 100%;
  border: 1px solid var(--line);
  border-radius: 14px;
  padding: 11px 12px;
  font: 400 14px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  outline: none;
  background: #fff;
}
.postField__input:focus{
  border-color: var(--accent-45);
  box-shadow: 0 0 0 4px var(--accent-10);
}
.postField__textarea{
  resize: vertical;
  line-height: 1.45;
}
.postCta__note{
  grid-column: 1 / -1;
  color: var(--muted);
  font: 400 12px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

/* Related */
.postRelated{
  margin-top: 26px;
  padding-top: 26px;
  border-top: 1px solid var(--line);
}
.postRelated__title{
  margin: 0 0 14px;
  font: 700 18px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}
.postRelated__grid{
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 12px;
}
@media (max-width: 1024px){
  .postRelated__grid{ grid-template-columns: 1fr; }
}

.postCard{
  display: grid;
  grid-template-columns: 92px minmax(0, 1fr);
  gap: 12px;
  text-decoration: none;
  color: inherit;
  border: 1px solid var(--line);
  border-radius: 16px;
  overflow: hidden;
  background: #fff;
  transition: transform .18s ease, background .18s ease;
}
.postCard:hover{ transform: translateY(-1px); background: var(--soft); }

.postCard__img{
  aspect-ratio: 1/1;
  background: var(--soft);
}
.postCard__img img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.postCard__ph{
  display:block;
  width:100%;
  height:100%;
  background: linear-gradient(135deg, var(--accent-14), rgba(0,0,0,.06));
}
.postCard__body{ padding: 10px 10px 10px 0; }
.postCard__meta{
  color: var(--muted);
  font: 500 12px/1.2 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  margin-bottom: 6px;
}
.postCard__name{
  font: 650 14px/1.3 system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce){
  .postBtn, .postCard{ transition: none; }
  .postBtn:hover, .postCard:hover{ transform: none; }
}

</style>


<script>
(function(){
  const content = document.getElementById('postContent');
  const toc = document.getElementById('postToc');
  const bar = document.getElementById('postProgressBar');
  const copyBtn = document.getElementById('copyPostLink');

  if (copyBtn) {
    copyBtn.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(window.location.href);
        copyBtn.textContent = 'Ссылка скопирована';
        setTimeout(() => (copyBtn.textContent = 'Скопировать ссылку'), 1600);
      } catch(e){}
    });
  }

  // TOC build
  if (content && toc) {
    const headings = Array.from(content.querySelectorAll('h2, h3'))
      .filter(h => h.textContent.trim().length > 0);

    if (headings.length) {
      const frag = document.createDocumentFragment();

      headings.forEach((h, idx) => {
        if (!h.id) h.id = 'h-' + idx + '-' + (h.tagName.toLowerCase());
        const a = document.createElement('a');
        a.href = '#' + h.id;
        a.textContent = h.textContent.trim();
        a.dataset.target = h.id;
        if (h.tagName.toLowerCase() === 'h3') a.style.paddingLeft = '18px';
        frag.appendChild(a);
      });

      toc.appendChild(frag);

      const links = Array.from(toc.querySelectorAll('a'));
      const setActive = () => {
        const y = window.scrollY + 110;
        let current = headings[0]?.id;

        for (const h of headings) {
          if (h.offsetTop <= y) current = h.id;
          else break;
        }

        links.forEach(l => l.classList.toggle('is-active', l.dataset.target === current));
      };

      window.addEventListener('scroll', setActive, { passive: true });
      setActive();
    } else {
      toc.innerHTML = '<div style="color:#6b7280;font:400 13px/1.5 system-ui">В этой статье нет заголовков для содержания.</div>';
    }
  }

  // Progress bar
  const updateProgress = () => {
    if (!bar) return;
    const doc = document.documentElement;
    const scrollTop = doc.scrollTop || document.body.scrollTop;
    const height = (doc.scrollHeight || document.body.scrollHeight) - doc.clientHeight;
    const p = height > 0 ? (scrollTop / height) * 100 : 0;
    bar.style.width = Math.max(0, Math.min(100, p)) + '%';
  };
  window.addEventListener('scroll', updateProgress, { passive: true });
  window.addEventListener('resize', updateProgress);
  updateProgress();
})();
</script>




<?php get_footer(); ?>


<?php
/**
 * Helpers — можно перенести в functions.php
 */

function mytheme_estimate_reading_time($html) {
  $text = wp_strip_all_tags($html);
  $words = str_word_count(mb_strtolower($text));
  $min = max(1, (int) ceil($words / 180)); // 180 wpm
  return $min . ' мин чтения';
}

function mytheme_make_lead_from_content($html, $words = 28) {
  $text = trim(preg_replace('/\s+/', ' ', wp_strip_all_tags($html)));
  if (!$text) return 'Практический разбор: что именно ломает результат — и как сделать правильно.';
  return wp_trim_words($text, $words, '…');
}

function mytheme_related_posts($post_id, $limit = 3) {
  $cats = wp_get_post_categories($post_id);
  $args = [
    'post_type'      => 'post',
    'posts_per_page' => $limit,
    'post__not_in'   => [$post_id],
    'no_found_rows'  => true,
  ];
  if (!empty($cats)) $args['category__in'] = $cats;
  return new WP_Query($args);
}


