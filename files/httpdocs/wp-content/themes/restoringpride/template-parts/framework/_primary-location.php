<ul>
	<?php
		$args = array(
			'post_type'  => 'page', 
			'posts_per_page' => -1,
			'meta_query' => array( 
				array(
					'key'   => '_wp_page_template', 
					'value' => 'template-location.php'
				),
				array(
					'key' => 'location_primary_location',
					'value' => '1',
				)
			)
		);
		$loop = new WP_Query( $args );
	?>

	<?php if($loop->have_posts()): ?>
		<h4 class="site-footer__heading">
			<?php if(get_field('address_title', 'option')): ?>
				<?php the_field('address_title', 'option'); ?>
			<?php else :?>
				Registered address
			<?php endif;?>
		</h4>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li><?php the_title(); ?></li>
			<?php if(get_field('location_address_1')): ?>
				<li><?php the_field('location_address_1'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_address_2')): ?>
				<li><?php the_field('location_address_2'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_address_3')): ?>
				<li><?php the_field('location_address_3'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_town_city')): ?>
				<li><?php the_field('location_town_city'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_postcode')): ?>
				<li><?php the_field('location_postcode'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_telephone_number')): ?>
				<li><?php the_field('location_telephone_number'); ?></li>
			<?php endif; ?>
			<?php if(get_field('location_email')): ?>
				<li><a href="mailto:<?php the_field('location_email'); ?>"><?php the_field('location_email'); ?></a></li>
			<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

</ul>