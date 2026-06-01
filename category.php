<?php
defined('ABSPATH') || exit;

get_header();

$term  = get_queried_object();
$paged = max(1, get_query_var('paged'));

$cases_query = new WP_Query([
    'post_type'      => 'case',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'tax_query'      => [
        [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        ],
    ],
]);
?>

<main class="gl-category">

    <section class="gl-category-hero">
        <div class="container">

            <span class="gl-category-label">Кейсы разработки</span>

            <h1 class="gl-category-title">
                <?php echo esc_html($term->name); ?>
            </h1>

            <?php if (!empty($term->description)) : ?>
                <div class="gl-category-description">
                    <?php echo wp_kses_post(wpautop($term->description)); ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <section class="gl-category-posts">
        <div class="container">

            <?php if ($cases_query->have_posts()) : ?>

                <div class="gl-posts-grid">

                    <?php while ($cases_query->have_posts()) : $cases_query->the_post(); ?>

                        <article class="gl-post-card">

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="gl-post-thumb">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            <?php endif; ?>

                            <div class="gl-post-content">

                                <h2 class="gl-post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="gl-post-excerpt">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="gl-post-button">
                                    Смотреть кейс
                                </a>

                            </div>

                        </article>

                    <?php endwhile; ?>

                </div>

                <div class="gl-pagination">
                    <?php
                    echo paginate_links([
                        'total'   => $cases_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Назад',
                        'next_text' => 'Вперед →',
                    ]);
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>

                <div class="gl-empty">
                    Кейсы пока не опубликованы.
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<style>
.gl-category {
    padding-bottom: 80px;
}

.gl-category-hero {
    padding: 80px 0 50px;
    background: #f8faf8;
    text-align: center;
}

.gl-category-label {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 999px;
    background: rgba(44,188,99,.1);
    color: #2cbc63;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
}

.gl-category-title {
    font-size: 48px;
    line-height: 1.1;
    margin-bottom: 20px;
}

.gl-category-description {
    max-width: 900px;
    margin: 0 auto;
    color: #6b7280;
    font-size: 18px;
    line-height: 1.7;
}

.gl-posts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 60px;
}

.gl-post-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,.05);
    transition: .3s ease;
}

.gl-post-card:hover {
    transform: translateY(-5px);
}

.gl-post-thumb {
    display: block;
    overflow: hidden;
}

.gl-post-thumb img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    display: block;
}

.gl-post-content {
    padding: 25px;
}

.gl-post-title {
    font-size: 22px;
    line-height: 1.3;
    margin-bottom: 15px;
}

.gl-post-title a {
    color: #111;
    text-decoration: none;
}

.gl-post-excerpt {
    color: #6b7280;
    margin-bottom: 20px;
    line-height: 1.6;
}

.gl-post-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 22px;
    border-radius: 12px;
    background: #2cbc63;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.gl-post-button:hover {
    background: #26aa59;
    color: #fff;
}

.gl-empty {
    max-width: 720px;
    margin: 60px auto 0;
    padding: 35px;
    text-align: center;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,.05);
    color: #6b7280;
    font-size: 18px;
}

.gl-pagination {
    margin-top: 45px;
    text-align: center;
}

.gl-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    margin: 4px;
    padding: 0 14px;
    border-radius: 10px;
    background: #fff;
    color: #111;
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(0,0,0,.05);
}

.gl-pagination .page-numbers.current,
.gl-pagination .page-numbers:hover {
    background: #2cbc63;
    color: #fff;
}

@media(max-width: 991px) {
    .gl-posts-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .gl-category-title {
        font-size: 36px;
    }
}

@media(max-width: 767px) {
    .gl-category-hero {
        padding: 55px 0 35px;
    }

    .gl-posts-grid {
        grid-template-columns: 1fr;
        gap: 22px;
        margin-top: 40px;
    }

    .gl-category-title {
        font-size: 30px;
    }

    .gl-category-description {
        font-size: 16px;
    }

    .gl-post-thumb img {
        height: 220px;
    }
}
</style>

<?php get_footer(); ?>