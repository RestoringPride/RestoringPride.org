<?php
	// Check if the page has children
	if ( wpb_list_child_pages() ) {
		$show_sidebar = true;
	}
?>

<?php get_header(); ?>

	<?php // Sidebar ?>
	<?php if($show_sidebar): ?>
		<?php get_template_part('/template-parts/framework/_nav-secondary'); ?>
	<?php endif; ?>

	<div class="page-header">
		<?php the_post_thumbnail(); ?>
		<div class="container">

			<div class="page-header__content">
				<?php // Breadcrumb ?>
				<?php if(get_field('hide_breadcrumb') != 1): ?>
					<?php get_template_part('template-parts/framework/_breadcrumb'); ?>
				<?php endif; ?>

				<?php // Header ?>
				<header>
					<h1 class="page-header__title"><?php the_title(); ?></h1>
				</header>
			</div>
		</div>
	</div>
	<div class="pride-divider"></div>
	
	<div class="container layout layout--content-only">

		<?php // Main ?>
		<main id="main" class="content">