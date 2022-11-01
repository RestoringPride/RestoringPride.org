<?php
/**
	Template Name: Page: Landing Page
*/
?>

<?php get_header(); ?>

    <div class="landing-page-image" <?php if(has_post_thumbnail()): ?>style="background-color:#000000"<?php endif; ?>>
        <?php if(has_post_thumbnail()): ?>
            <img src="<?php echo get_the_post_thumbnail_url(null, 'post-image'); ?>" />
        <?php endif; ?>
    </div>

    <div class="container layout layout--content-only">
        
        <?php // Main ?>
        <main id="main" class="content">

            <?php // Header ?>
            <header class="landing-page__header">
                <h1><?php the_title(); ?></h1>
            </header>

            <?php // Call to action ?>
            <section class="landing-page__cta">
                <div class="landing-page__form">
                    <?php if(get_field('landing_page_text_above_form')): ?>
                        <h3><?php the_field('landing_page_text_above_form'); ?></h3>
                        <hr />
                    <?php endif;?>
                    <?php
                        /**
                         * If there is a contact form chosen for this page
                         */
                        if(get_field('landing_page_form')){
                            $formObject = get_field('landing_page_form');
                            $formId = $formObject->ID;

                            // Check for donation form or contact form
                            if($formObject->post_type == 'give_forms'){
                                echo do_shortcode('[give_form id="'.$formId.'"]'); 
                            } else {
                                echo do_shortcode('[contact-form-7 id="'.$formId.'"]'); 
                            }
                        }
                    ?>
                </div>
            </section>

            <?php // Content ?>
            <section class="gutenberg-content">
                <?php 
                while ( have_posts() ) : the_post();
                    the_content(); 
                endwhile;
                ?>
            </section>

        </main>
        
    </div>

<?php get_footer(); ?>