<?php
/**
	Search results
*/
?>

<?php get_header(); ?>

	<div class="container layout layout--content-only">

		<?php // Main content wrapper ?>
		<main class="content" id="main">

			<?php // Introduction ?>
			<header>
                <h1>Search results for <span class="text-brand-colour-primary"><?php echo get_search_query(); ?></span></h1>
                <p>The following pages contain some of the words you searched for. Not found what you were looking for? Don't worry, you can easily <a href="#" class="toggleSearch">search again</a>.</p>
			</header>

			<?php
            if ( have_posts() ) :
                echo '<ul class="search-results">';
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/framework/_search-results' );
                endwhile;
                echo '</ul>';
            else : ?>

                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
                <section>
                    <?php
                    get_search_form();
                ?>
                </section>
                <?php 
            endif;
            ?>

		</main>

	</div>

<?php get_footer(); ?>