<?php get_header(); ?>

	<div class="container layout">

		<header class="blog-header">
			<h1 class="blog-header__title">
				<?php echo get_the_title( get_option('page_for_posts') ); ?>
			</h1>

			<ul class="categories blog-header__categories" style="margin-bottom:0;">
				<li class="categories__item categories__item--first">Filter by category</li>
				<?php 
				$selected_category = get_category( get_query_var( 'cat' ) ); 
				$categories = get_categories(); 
				foreach($categories as $category): ?>
					<li class="categories__item">
						<a 
						href="/category/<?php echo $category->slug; ?>" 
						class="categories__link <?php if ($selected_category->term_id == $category->term_id): ?>categories__link--active<?php endif; ?>" 
						title="View posts in <?php echo $category->name; ?>">
							<?php echo $category->name; ?>
						</a>
					</li>
				<?php endforeach; ?>
				<?php if (is_category()): ?>
					<li class="categories__item categories__item--clear"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><i class="far fa-times-circle"></i> Clear</a></li>
				<?php endif; ?>
			</ul>
		</header>

		<?php // Main content begins ?>
		<main class="content" id="main">

			<?php // Breadcrumb ?>
			<?php get_template_part('template-parts/breadcrumb'); ?>
				
			<?php if ( have_posts() ): ?>

				<ul class="card-group">

					<?php while ( have_posts() ) : the_post(); ?>

						<li class="card">
							<a href="<?php the_permalink(); ?>" class="card__link">
								<div class="card__image">
									<?php if ( get_the_post_thumbnail() ): ?>
										<?php the_post_thumbnail( 'card-thumbnail' ); ?>
									<?php else: ?>
										<div class="card__no-image">
											<div>
												<i class="far fa-image"></i>
												<p>No picture</p>
											</div>
										</div>
									<?php endif; ?>
								</div>

								<div class="card__content">
									<h3 class="card__title">
										<?php the_title(); ?>
									</h3>
									<small class="card__subtitle" style="margin-bottom:0;">
										Posted on <?php the_time('M j, Y'); ?>
									</small>
								</div>
							</a>
						</li>

					<?php endwhile; ?>

				</ul>

				<ul class="pagination">
					<li class="pagination__older"><?php next_posts_link(__('&larr; Older posts')) ?></li>
					<li class="pagination__newer"><?php previous_posts_link(__('Newer posts &rarr;')) ?></li>
				</ul>

			<?php else: ?>

				<div class="message message--neutral">
					<p>There doesn't appear to be any blog posts published yet. If possible try another category or come back later.</p>
				</div>

			<?php endif; ?>

		</main>

	</div>

<?php get_footer(); ?>