<?php
defined('ABSPATH') || exit;
get_header();
?>

<main class="gl-service-single">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="gl-service-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</main>

<?php get_footer(); ?>