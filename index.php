<?php
/**
 * Основной шаблон темы (Fallback)
 * Используется, если нет более специфичных шаблонов
 */

get_header();
?>

<main id="primary" class="site-main site-main--spaced">
  <div class="container container--narrow">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <!-- Хлебные крошки -->
        <!-- Хлебные крошки -->
<nav class="breadcrumbs" aria-label="Хлебные крошки">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="breadcrumbs__link">Главная</a>

  <?php
  // Показываем цепочку родителей для страниц
  if (is_page()) {
    $ancestors = get_post_ancestors(get_the_ID());

    if (!empty($ancestors)) {
      $ancestors = array_reverse($ancestors);

      foreach ($ancestors as $parent_id) {
        echo '<span class="breadcrumbs__sep">/</span>';
        echo '<a class="breadcrumbs__link" href="' . esc_url(get_permalink($parent_id)) . '">';
        echo esc_html(get_the_title($parent_id));
        echo '</a>';
      }
    }
  }
  ?>

  <span class="breadcrumbs__sep">/</span>
  <span class="breadcrumbs__current"><?php the_title(); ?></span>
</nav>


        <article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>

          <header class="page__header">
            <h1 class="page__title"><?php the_title(); ?></h1>
          </header>

          <div class="page__content">
            <?php
              the_content();

              // Пагинация, если используется <!--nextpage-->
              wp_link_pages([
                'before' => '<nav class="page-links">',
                'after'  => '</nav>',
              ]);
            ?>
          </div>

        </article>

      <?php endwhile; ?>
    <?php else : ?>
      <p>Страница не найдена.</p>
    <?php endif; ?>

  </div>
</main>

<style>
	/* Вертикальные отступы страницы */
.site-main--spaced {
  padding-top: 80px;
  padding-bottom: 80px;
}

/* Узкий контейнер для текстовых страниц */
.container--narrow {
  max-width: 1290px;
}

/* Хлебные крошки */
.breadcrumbs {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 32px;
  font-size: 14px;
  opacity: 0.8;
}

.breadcrumbs__link {
  color: inherit;
  text-decoration: none;
}

.breadcrumbs__link:hover {
  text-decoration: underline;
}

.breadcrumbs__sep {
  opacity: 0.5;
}

.breadcrumbs__current {
  opacity: 0.6;
  cursor: default;
}

/* Контент политики / страниц */
.page__content {
  line-height: 1.7;
}

.page__content h2 {
  margin-top: 36px;
}

.page__content p {
  margin: 14px 0;
}

/* Адаптив */
@media (max-width: 768px) {
  .site-main--spaced {
    padding-top: 48px;
    padding-bottom: 48px;
  }
}

</style>

<?php get_footer(); ?>
