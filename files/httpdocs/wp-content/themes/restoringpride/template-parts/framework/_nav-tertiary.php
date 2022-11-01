<?php
	/**
	 * List of subpages
	 * 
	 */
?>
<ul class="nav-tertiary">
    <?php
        $args = array(
            'post_type'  => 'page', 
            'posts_per_page' => -1,
            'order' => "ASC",
            'post_parent' => $post->ID,
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
    ?>
        <li class="nav-tertiary__item">
            <a href="<?php the_permalink(); ?>" class="nav-tertiary__link">
                <div class="nav-tertiary__image">
                    <?php the_post_thumbnail( 'card-thumbnail' ); ?> 
                </div>
                <h4 class="nav-tertiary__title"><?php the_title(); ?></h4>
            </a>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>