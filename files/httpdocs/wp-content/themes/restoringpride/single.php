<?php get_header(); ?>

	<div class="container layout layout--content-only">

		<?php 
		while ( have_posts() ) : the_post(); ?>

			<?php 
			// Blog post header
			// Check there is a post thumbnail, if not do not render this section
			if( get_the_post_thumbnail() ): ?>
				<header class="blog-post-header">
					<section>
						<p class="blog-post-header__meta">Posted on <?php the_date(); ?></p>
						<h1><?php the_title(); ?></h1>

						<ul class="categories">
							<?php 
							$categories = get_the_category($post->ID); 
							foreach($categories as $category): ?>
								<li class="categories__item">
									<a href="/category/<?php echo $category->slug; ?>"  class="categories__link" title="View posts in <?php echo $category->name; ?>">
										<?php echo $category->name; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</section>

					<img src="<?php echo get_the_post_thumbnail_url(null, 'post-image'); ?>" class="blog-post-header__image box-shadow--lg" />
				</header>
			<?php endif; ?>

			<?php // Main content begins ?>
			<main class="content" id="main">

				<p>&larr; <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Back to <?php echo get_the_title( get_option('page_for_posts') ); ?></a></p>

				<?php if( !get_the_post_thumbnail() ): ?>
					<section>
						<p class="blog-post-header__meta">Posted on <?php the_date(); ?></p>
						<h1><?php the_title(); ?></h1>

						<ul class="categories">
							<?php 
							$categories = get_the_category($post->ID); 
							foreach($categories as $category): ?>
								<li class="categories__item">
									<a href="/category/<?php echo $category->slug; ?>"  class="categories__link" title="View posts in <?php echo $category->name; ?>">
										<?php echo $category->name; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</section>
				<?php endif; ?>

				<section class="gutenberg-content">
					<?php the_content(); ?>
				</section>

				<?php if( wp_get_post_tags($post->ID)): ?>
					<ul class="tags">
						<li class="tags__item"><i class="fas fa-tags"></i></li>
						<?php
						$tags = wp_get_post_tags($post->ID);
						foreach($tags as $tag):
						?>
							<li class="tags__item"><a href="/tag/<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>

			</main>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>