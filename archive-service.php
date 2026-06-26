<?php
defined('ABSPATH') || exit;
get_header();
?>

<style>
	.gl-services-archive {
		padding: 56px 0 84px;
		background:
			radial-gradient(circle at top left, rgba(44, 188, 99, 0.08), transparent 28%),
			linear-gradient(180deg, #f8fbf9 0%, #f4f7f5 100%);
	}

	.gl-services-archive .container {
		max-width: 1280px;
	}

	.gl-services-archive__head {
		max-width: 860px;
		margin: 0 auto 40px;
		text-align: center;
	}

	.gl-services-archive__eyebrow {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-height: 34px;
		padding: 0 14px;
		margin-bottom: 16px;
		border-radius: 999px;
		background: rgba(44, 188, 99, 0.10);
		color: var(--gl-color-accent, #2cbc63);
		font-size: 13px;
		font-weight: 700;
		letter-spacing: 0.04em;
		text-transform: uppercase;
	}

	.gl-services-archive__head h1 {
		margin: 0 0 16px;
		font-size: clamp(34px, 5vw, 56px);
		line-height: 1.05;
		letter-spacing: -0.03em;
		color: var(--gl-color-heading, #1A1A1A);
	}

	.gl-services-archive__head p {
		margin: 0;
		font-size: 18px;
		line-height: 1.7;
		color: var(--gl-color-subtitle, #5f6b66);
	}

	.gl-services-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
		align-items: stretch;
	}

	.gl-service-card {
		position: relative;
		display: flex;
		flex-direction: column;
		min-height: 100%;
		padding: 28px;
		background: rgba(255, 255, 255, 0.92);
		border: 1px solid #e5ebe7;
		border-radius: 28px;
		box-shadow: 0 14px 40px rgba(16, 24, 40, 0.05);
		transition:
			transform 0.2s ease,
			box-shadow 0.2s ease,
			border-color 0.2s ease;
		overflow: hidden;
	}

	.gl-service-card::before {
		content: "";
		position: absolute;
		top: 0;
		left: 28px;
		right: 28px;
		height: 3px;
		border-radius: 999px;
		background: linear-gradient(90deg, var(--gl-color-accent, #2cbc63), rgba(44, 188, 99, 0.2));
		opacity: 0;
		transition: opacity 0.2s ease;
	}

	.gl-service-card:hover {
		transform: translateY(-4px);
		border-color: #d6e5dc;
		box-shadow: 0 20px 48px rgba(16, 24, 40, 0.08);
	}

	.gl-service-card:hover::before {
		opacity: 1;
	}

	.gl-service-card__meta {
		display: inline-flex;
		align-items: center;
		align-self: flex-start;
		min-height: 30px;
		padding: 0 12px;
		margin-bottom: 18px;
		border-radius: 999px;
		background: #f3faf5;
		color: var(--gl-color-accent, #2cbc63);
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.03em;
		text-transform: uppercase;
	}

	.gl-service-card__title {
		margin: 0 0 14px;
		font-size: 25px;
		line-height: 1.2;
		letter-spacing: -0.02em;
	}

	.gl-service-card__title a {
		color: var(--gl-color-heading, #1A1A1A);
		text-decoration: none;
		transition: color 0.2s ease;
	}

	.gl-service-card__title a:hover {
		color: var(--gl-color-accent, #2cbc63);
	}

	.gl-service-card__excerpt {
		margin: 0 0 22px;
		color: var(--gl-color-text, #2B2B2B);
		font-size: 15px;
		line-height: 1.75;
	}

	.gl-service-card__excerpt p:last-child {
		margin-bottom: 0;
	}

	.gl-service-card__footer {
		margin-top: auto;
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 14px;
		padding-top: 18px;
		border-top: 1px solid #edf2ee;
	}

	.gl-service-card__hint {
		font-size: 14px;
		line-height: 1.5;
		color: var(--gl-color-subtitle, #6b7280);
	}

	.gl-service-card__link {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		gap: 8px;
		min-height: 42px;
		padding: 0 16px;
		border: 1px solid var(--gl-color-accent, #2cbc63);
		border-radius: 10px;
		background: transparent;
		color: var(--gl-color-accent, #2cbc63);
		font-size: 14px;
		font-weight: 600;
		line-height: 1;
		text-decoration: none;
		white-space: nowrap;
		transition:
			background 0.2s ease,
			color 0.2s ease,
			border-color 0.2s ease,
			transform 0.2s ease;
	}

	.gl-service-card__link:hover {
		background: var(--gl-color-accent, #2cbc63);
		border-color: var(--gl-color-accent, #2cbc63);
		color: #fff;
		transform: translateY(-1px);
	}

	.gl-services-pagination {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 10px;
		margin-top: 38px;
		flex-wrap: wrap;
	}

	.gl-services-pagination .page-numbers {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-width: 44px;
		height: 44px;
		padding: 0 14px;
		border: 1px solid #dce7e0;
		border-radius: 12px;
		background: rgba(255, 255, 255, 0.9);
		color: var(--gl-color-heading, #1A1A1A);
		font-size: 15px;
		font-weight: 700;
		line-height: 1;
		text-decoration: none;
		box-shadow: 0 10px 28px rgba(16, 24, 40, 0.04);
		transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
	}

	.gl-services-pagination .page-numbers.current,
	.gl-services-pagination a.page-numbers:hover {
		background: var(--gl-color-accent, #2cbc63);
		border-color: var(--gl-color-accent, #2cbc63);
		color: #fff;
		transform: translateY(-1px);
	}

	.gl-services-empty {
		max-width: 760px;
		margin: 0 auto;
		padding: 36px 28px;
		text-align: center;
		background: #fff;
		border: 1px solid #e5ebe7;
		border-radius: 24px;
		box-shadow: 0 14px 40px rgba(16, 24, 40, 0.05);
	}

	.gl-services-empty p {
		margin: 0;
		font-size: 16px;
		line-height: 1.7;
		color: var(--gl-color-subtitle, #6b7280);
	}

	@media (max-width: 1100px) {
		.gl-services-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}

		.gl-service-card {
			border-radius: 24px;
		}
	}

	@media (max-width: 767px) {
		.gl-services-archive {
			padding: 42px 0 64px;
		}

		.gl-services-archive__head {
			margin-bottom: 28px;
		}

		.gl-services-archive__head p {
			font-size: 16px;
		}

		.gl-services-grid {
			grid-template-columns: 1fr;
			gap: 18px;
		}

		.gl-service-card {
			padding: 22px;
			border-radius: 22px;
		}

		.gl-service-card__title {
			font-size: 22px;
		}

		.gl-service-card__footer {
			flex-direction: column;
			align-items: stretch;
		}

		.gl-service-card__link {
			width: 100%;
		}
	}
</style>

<main class="gl-services-archive">
	<div class="container">
		<header class="gl-services-archive__head">
			<div class="gl-services-archive__eyebrow">Услуги WordPress</div>
			<h1>Разработка и доработка сайтов на WordPress и WooCommerce</h1>
			<p>
				Решения под задачи бизнеса: доработка существующих сайтов, кастомный функционал,
				улучшение WooCommerce, интеграции и разработка новых страниц и разделов.
			</p>
		</header>

		<?php if (have_posts()) : ?>
			<div class="gl-services-grid">
				<?php while (have_posts()) : the_post(); ?>
					<article class="gl-service-card">
						<div class="gl-service-card__meta">Услуга</div>

						<h2 class="gl-service-card__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>

						<?php if (has_excerpt()) : ?>
							<div class="gl-service-card__excerpt">
								<?php the_excerpt(); ?>
							</div>
						<?php else : ?>
							<div class="gl-service-card__excerpt">
								<?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 28, '...'); ?>
							</div>
						<?php endif; ?>

						<div class="gl-service-card__footer">
							<div class="gl-service-card__hint">WordPress / WooCommerce / кастомные доработки</div>
							<a class="gl-service-card__link" href="<?php the_permalink(); ?>">
								Подробнее
							</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php
			$services_pagination = paginate_links([
				'total'     => max(1, (int) $wp_query->max_num_pages),
				'current'   => max(1, get_query_var('paged') ?: get_query_var('page')),
				'mid_size'  => 1,
				'prev_text' => '← Назад',
				'next_text' => 'Вперёд →',
				'type'      => 'array',
			]);
			?>

			<?php if (!empty($services_pagination)) : ?>
				<nav class="gl-services-pagination" aria-label="Пагинация услуг">
					<?php foreach ($services_pagination as $services_pagination_link) : ?>
						<?php echo $services_pagination_link; ?>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>
		<?php else : ?>
			<div class="gl-services-empty">
				<p>Услуги пока не добавлены. Здесь появятся страницы с подробным описанием работ и решений под WordPress и WooCommerce.</p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>