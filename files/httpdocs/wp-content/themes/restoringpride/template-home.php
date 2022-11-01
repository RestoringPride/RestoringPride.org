<?php
/**
	Template Name: Home
*/
?>

<?php get_header(); ?>

	<div class="layout layout--no-padding">

		<main id="main" class="container">

			<header class="decorative-intro">
				<div class="decorative-intro__flag">
					<div class="decorative-intro__inner">
						<h1>Restoring Pride</h1>	
						<h2>In our selves. In our community.</h2>
						<h3 class="no-margin-xs"><?php echo get_field('home_introduction'); ?></h3>
					</div>
				</div>
				<div class="decorative-intro__image">
					<img src="<?php echo get_template_directory_uri(); ?>/images/scuff.png" alt="" class="decorative-intro__scuff" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/sleeping-rough.jpg" alt="Man sleeping rough" />
				</div>
			</header>

			<?php $block1 = get_field('homepage_block_1'); ?>
			<section class="grid grid-md-2 page-section page-section--padding" style="padding-bottom:0">
				<img src="<?php echo $block1['image']; ?>" alt="" />
				<div>
					<h2><?php echo $block1['title']; ?></h2>
					<p><?php echo $block1['body']; ?></p>
				</div>
			</section>

			<?php $block2 = get_field('homepage_block_2'); ?>
			<section class="grid grid-md-2 page-section page-section--padding">
				<div>
					<h3><?php echo $block2['title']; ?></h3>
					<p><?php echo $block2['body']; ?></p>
				</div>
				<img src="<?php echo $block2['image']; ?>" alt="" />
			</section>

			<aside class="text-align-center-xs">
				<h2>Services we provide</h2>
				<p>Restoring Pride is the Go-To Resource for members of the LGBTQ community providing a holistic approach to addressing both basic, day-to-day needs, and an achievable plan for the future. Our mission is to ensure that members of our community do not find themselves homeless or without stable housing. In support of that mission, we provide connection to the following resources: </p>
				<ul class="services-overview">
					<li class="services-overview__item services-overview__red">
						<i class="services-overview__icon fas fa-home"></i>
						Safe and stable housing
					</li>
					<li class="services-overview__item services-overview__orange">
						<i class="services-overview__icon fas fa-briefcase-medical" aria-hidden="true"></i>
						Medical care and services
					</li>
					<li class="services-overview__item services-overview__yellow">
						<i class="services-overview__icon fas fa-clipboard" aria-hidden="true"></i>
						Personal action planning
					</li>
					<li class="services-overview__item services-overview__green">
						<i class="services-overview__icon fas fa-utensils" aria-hidden="true"></i>
						Meal preparation classes
					</li>
					<li class="services-overview__item services-overview__blue">
						<i class="services-overview__icon fas fa-users" aria-hidden="true"></i>
						Peer support network
					</li>
					<li class="services-overview__item services-overview__purple">
						<i class="services-overview__icon fas fa-money-check-alt" aria-hidden="true"></i>
						Financial literacy skills
					</li>
				</ul>
				<p><a href="/what-we-do">Find out how we help</a></p>
			</aside>
		</main>
	</div>

<?php get_footer(); ?>