<?php
/**
	Template Name: Person
*/
?>

<?php
	// Check if the page has children
	if ( wpb_list_child_pages() ) {
		$show_sidebar = true;
	}
?>

<?php get_header(); ?>

	<div class="container layout layout--content-only">

		<?php // Main ?>
		<main id="main" class="content">

			<?php // Breadcrumb ?>
			<?php if(get_field('hide_breadcrumb') != 1): ?>
				<?php get_template_part('template-parts/framework/_breadcrumb'); ?>
			<?php endif; ?>

			<?php // Header ?>
			<header>
				<h1><?php the_title(); ?></h1>
			</header>

			<?php 
				// Render page content
			?>
			<section class="gutenberg-content content__split">
				<div>
					<?php 
					while ( have_posts() ) : the_post();
						the_content(); 
					endwhile;
					?>
				</div>
				<img src="<?php echo get_the_post_thumbnail_url(null, 'post-image'); ?>" class="box-shadow--lg" />
			</section>

<?php get_template_part('template-parts/framework/_template-bottom'); wp_reset_query(); ?>