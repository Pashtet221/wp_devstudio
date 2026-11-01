<?php
/** Archive lists use their own title and excerpts, never full article bodies. */
defined('ABSPATH') || exit;
get_header();
if (is_search()) {
    $archive_title = sprintf('Поиск: %s', get_search_query());
} elseif (is_home()) {
    $archive_title = 'Блог';
} else {
    $archive_title = wp_strip_all_tags(get_the_archive_title());
}
?>
<main class="wpds-archive">
  <div class="wpds-archive__container">
    <header class="wpds-archive__header">
      <h1><?php echo esc_html($archive_title); ?></h1>
      <?php if (!is_search() && !is_home()) : $description = get_the_archive_description(); ?>
        <?php if ($description) : ?><div class="wpds-archive__description"><?php echo wp_kses_post($description); ?></div><?php endif; ?>
      <?php endif; ?>
    </header>
    <?php if (have_posts()) : ?>
      <div class="wpds-archive__grid">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('wpds-archive__card'); ?>>
          <?php if (has_post_thumbnail()) : ?><a class="wpds-archive__image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php the_post_thumbnail('medium_large', ['loading' => 'lazy']); ?></a><?php endif; ?>
          <div class="wpds-archive__body">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags(strip_shortcodes(get_the_excerpt())), 35, '…')); ?></p>
            <a href="<?php the_permalink(); ?>">Читать материал<span class="screen-reader-text">: <?php the_title(); ?></span></a>
          </div>
        </article>
      <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(['prev_text' => '← Назад', 'next_text' => 'Вперёд →']); ?>
    <?php else : ?><p>Материалы не найдены.</p><?php endif; ?>
  </div>
</main>
<style>
.wpds-archive{padding:64px 0 80px;background:#f5f6f8;color:#111827}
.wpds-archive .wpds-archive__container{width:min(1200px,calc(100% - 40px));margin:auto}
.wpds-archive .wpds-archive__header{margin-bottom:32px}
.wpds-archive h1{font-size:clamp(30px,4vw,48px);line-height:1.15;margin:0 0 20px}
.wpds-archive .wpds-archive__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px}
.wpds-archive .wpds-archive__card{background:#fff;border:1px solid #e3e5e9;border-radius:20px;overflow:hidden;min-width:0}
.wpds-archive .wpds-archive__image img{width:100%;height:auto;aspect-ratio:16/9;object-fit:cover;display:block}
.wpds-archive .wpds-archive__body{padding:26px}
.wpds-archive h2{font-size:24px;line-height:1.3;margin:0 0 16px}
.wpds-archive a{color:inherit;text-underline-offset:4px}
.wpds-archive h2 a{text-decoration:none}
.wpds-archive p{line-height:1.7;color:#525c6c}
.wpds-archive .pagination{margin-top:32px}
.wpds-archive .page-numbers{display:inline-block;padding:10px 14px}
@media(max-width:650px){.wpds-archive .wpds-archive__grid{grid-template-columns:1fr}.wpds-archive .wpds-archive__body{padding:22px}}
</style>
<?php get_footer(); ?>
