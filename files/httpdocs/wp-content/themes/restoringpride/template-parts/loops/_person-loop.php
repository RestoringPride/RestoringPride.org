<?php
$the_query = new WP_Query( array(
	'meta_key'    => 'person_team',
	'orderby'     => 'meta_value',
	'order'   	  => 'ASC',
	'post_type'  => 'page', 
	'posts_per_page' => -1,
    'meta_query' => array( 
        array(
            'key'   => '_wp_page_template', 
            'value' => 'template-person.php'
        )
    )
) );
$any = '';
while ($the_query->have_posts() ) :
	$the_query->the_post();
	$temp_date = get_post_meta( get_the_ID(), 'person_team', true ); ?>
	<?php if($temp_date != $any ){
	$any = $temp_date;?>
		</ul><h2><?php echo get_field('person_team')['label']; ?></h2>
		<ul class="content__split">
	<?php } ?>
	<li class="card">
		<figure class="card__image">
			<?php if ( get_the_post_thumbnail() ): ?>
				<?php if(get_the_content()): ?>
					<a style="position:static" href="<?php the_permalink(); ?>" title="Find out more about <?php the_title(); ?>">
						<?php the_post_thumbnail( 'card-thumbnail' ); ?>
					</a>
				<?php else: ?>
					<?php the_post_thumbnail( 'card-thumbnail' ); ?>
				<?php endif; ?>
			<?php else: ?>
				<?php if(get_the_content()): ?>
					<a href="<?php the_permalink(); ?>" title="Find out more about <?php the_title(); ?>">
						<div class="card__no-image">
							<div>
								<i class="far fa-image"></i>
								<p>No picture</p>
							</div>
						</div>
					</a>
				<?php else: ?>
					<div class="card__no-image">
						<div>
							<i class="far fa-image"></i>
							<p>No picture</p>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</figure>

		<div>
			<div class="person__information">
				<header class="person__header">
					<div>
						<h3 class="person__name">
							<?php the_title(); ?>
						</h3>
						<h4 class="person__role"><?php the_field('person_role'); ?></h4>
						<?php if(get_the_content()): ?>
							<a 
							class="action action--small action--alone action--secondary" 
							href="<?php the_permalink(); ?>" 
							title="Find out more about <?php the_title(); ?>"
							aria-label="Find out more about <?php the_title(); ?>">
							Read more
							</a>
						<?php endif; ?>
					</div>
					<?php if( have_rows('person_social_media_icons') ): ?>
						<ul class="person__social">
							<?php while ( have_rows('person_social_media_icons') ) : the_row(); ?>
								<li>
									<a href="<?php the_sub_field('person_network_link'); ?>" target="_blank">
										<i class="social-icons__icon <?php the_sub_field('person_network_icon'); ?>"></i>
									</a>
								</li>
							<?php endwhile; //wp_reset_query(); ?>
						</ul>
					<?php endif; ?>
				</header>
			</div>
			<?php if(get_field('person_email_address') || get_field('person_telephone_number')): ?>	
				<ul class="person__contact">
					<?php if(get_field('person_email_address')): ?>
						<li>
							<i class="far fa-envelope"></i>
							<a href="mailto:<?php the_field('person_email_address'); ?>" style="word-break: break-all;"><?php the_field('person_email_address'); ?></a>
						</li>
					<?php endif; ?>
					<?php if(get_field('person_telephone_number')): ?>
						<li>
							<i class="fas fa-phone"></i>
							<a href="tel:<?php the_field('person_telephone_number'); ?>"><?php the_field('person_telephone_number'); ?></a>
						</li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		</div>
	</li>
<?php endwhile; wp_reset_query(); ?>