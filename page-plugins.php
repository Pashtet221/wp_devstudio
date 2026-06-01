<?php
/**
 * Template Name: Каталог плагинов
 */
defined('ABSPATH') || exit;

get_header();

$plugins_query = new WP_Query([
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',

	// Если нужно выводить только товары из категории plugins — раскомментируй:
	/*
	'tax_query' => [
		[
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => ['plugins'],
		],
	],
	*/
]);
?>

<main class="ds-plugins">

	<section class="ds-plugins-hero">
		<div class="ds-container">
			<h1 class="ds-h1">Плагины для WordPress</h1>
			<p class="ds-lead">
				Готовые решения для расширения функциональности WordPress и HivePress:
				автоматизация, редактирование, карты, интеграции.
			</p>
		</div>
	</section>

	<section class="ds-plugins-list">
		<div class="ds-container ds-grid">

			<?php if ($plugins_query->have_posts()) : ?>
				<?php while ($plugins_query->have_posts()) : $plugins_query->the_post(); ?>

					<?php
					global $product;

					if (!$product || !$product->is_visible()) {
						continue;
					}

					$product_id    = $product->get_id();
					$product_link  = get_permalink($product_id);
					$product_title = get_the_title($product_id);

					$short_desc = apply_filters(
						'woocommerce_short_description',
						$product->get_short_description()
					);

					$price_html = $product->get_price_html();
					?>

					<article class="plugin-card">

						<?php if (has_post_thumbnail($product_id)) : ?>
							<a href="<?php echo esc_url($product_link); ?>" class="plugin-card__image">
								<?php echo get_the_post_thumbnail($product_id, 'medium_large'); ?>
							</a>
						<?php endif; ?>

						<h3>
							<a href="<?php echo esc_url($product_link); ?>">
								<?php echo esc_html($product_title); ?>
							</a>
						</h3>

						<?php if (!empty($short_desc)) : ?>
							<div class="plugin-desc">
								<?php echo wp_kses_post($short_desc); ?>
							</div>
						<?php endif; ?>

						<?php if (!empty($price_html)) : ?>
							<div class="plugin-price">
								<?php echo wp_kses_post($price_html); ?>
							</div>
						<?php endif; ?>

						<div class="plugin-actions">
							<a href="<?php echo esc_url($product_link); ?>" class="btn-primary">
								Подробнее
							</a>
						</div>

					</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<article class="plugin-card plugin-card--soon">
					<h3>Плагины скоро появятся</h3>
					<p class="plugin-desc">
						Сейчас каталог наполняется.
					</p>
					<div class="plugin-soon">Скоро</div>
				</article>

			<?php endif; ?>

		</div>
	</section>

</main>

<style>
:root{
	--accent:#cc1616;
	--bg:#0f1216;
	--card:#121722;
	--text:#e9eef6;
	--muted:rgba(233,238,246,.7);
	--border:rgba(255,255,255,.08);
}

.ds-plugins{
	background:var(--bg);
	color:var(--text);
	min-height:70vh;
}

.ds-container{
	max-width:1140px;
	margin:0 auto;
	padding:0 18px;
}

.ds-plugins-hero{
	padding:64px 0 36px;
	border-bottom:1px solid var(--border);
}

.ds-h1{
	font-size:42px;
	line-height:1.1;
	margin:0;
	color:var(--text);
}

.ds-lead{
	margin-top:14px;
	max-width:720px;
	font-size:17px;
	color:var(--muted);
	line-height:1.55;
}

.ds-plugins-list{
	padding:48px 0;
}

.ds-grid{
	display:grid;
	grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
	gap:22px;
}

.plugin-card{
	background:var(--card);
	border:1px solid var(--border);
	border-radius:18px;
	padding:22px;
	display:flex;
	flex-direction:column;
	transition:.2s ease;
	overflow:hidden;
}

.plugin-card:hover{
	transform:translateY(-4px);
	border-color:rgba(204,22,22,.45);
}

.plugin-card__image{
	display:block;
	margin:-22px -22px 18px;
	background:rgba(255,255,255,.04);
	overflow:hidden;
}

.plugin-card__image img{
	display:block;
	width:100%;
	height:190px;
	object-fit:cover;
	transition:.25s ease;
}

.plugin-card:hover .plugin-card__image img{
	transform:scale(1.04);
}

.plugin-card h3{
	margin:0 0 8px;
	font-size:20px;
	line-height:1.25;
	color:var(--text);
}

.plugin-card h3 a{
	color:inherit;
	text-decoration:none;
}

.plugin-card h3 a:hover{
	color:#fff;
}

.plugin-desc{
	color:var(--muted);
	line-height:1.5;
	font-size:14px;
	margin-bottom:18px;
}

.plugin-desc p{
	margin:0 0 10px;
}

.plugin-desc p:last-child{
	margin-bottom:0;
}

.plugin-desc ul,
.plugin-desc ol{
	margin:12px 0 0;
	padding-left:18px;
}

.plugin-desc li{
	margin:6px 0;
}

.plugin-price{
	margin-top:auto;
	margin-bottom:16px;
	font-size:17px;
	font-weight:800;
	color:#fff;
}

.plugin-price del{
	color:var(--muted);
	font-size:14px;
	font-weight:500;
	margin-right:6px;
}

.plugin-price ins{
	text-decoration:none;
}

.plugin-actions{
	margin-top:auto;
}

.btn-primary{
	display:inline-flex;
	align-items:center;
	justify-content:center;
	min-height:42px;
	padding:0 18px;
	border-radius:12px;
	background:var(--accent);
	color:#fff !important;
	text-decoration:none;
	font-weight:700;
	border:1px solid rgba(204,22,22,.5);
	transition:.15s;
}

.btn-primary:hover{
	transform:translateY(-1px);
	border-color:rgba(204,22,22,.9);
	background:#e01b1b;
}

.plugin-card--soon{
	opacity:.6;
	border-style:dashed;
	text-align:center;
}

.plugin-soon{
	margin-top:16px;
	font-size:13px;
	color:var(--muted);
}

@media(max-width:768px){
	.ds-plugins-hero{
		padding:42px 0 28px;
	}

	.ds-h1{
		font-size:32px;
	}

	.ds-lead{
		font-size:15px;
	}

	.ds-plugins-list{
		padding:32px 0;
	}

	.plugin-card{
		padding:18px;
	}

	.plugin-card__image{
		margin:-18px -18px 16px;
	}

	.plugin-card__image img{
		height:170px;
	}
}
</style>

<?php get_footer(); ?>