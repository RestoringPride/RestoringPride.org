<?php get_template_part('template-parts/framework/_template-top'); wp_reset_query(); ?>
    <?php // Content ?>
	<section class="gutenberg-content">
		<?php 
		while ( have_posts() ) : the_post();
			the_content(); 
		endwhile;
		?>
	</section>

	<?php // Submenu ?>
	<?php get_template_part('template-parts/framework/_nav-tertiary'); wp_reset_query(); ?>
	
<?php get_template_part('template-parts/framework/_template-bottom'); wp_reset_query(); ?>