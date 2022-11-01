<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body id="top" <?php body_class(); ?>>

		<?php // Check for IE ?>
		<script type="text/javascript">
			var isIE = /*@cc_on!@*/false || !!document.documentMode;
			if(isIE){
				document.write('<div class="message message--error"><p>It looks like you\'re viewing this website using an old browser. It is highly recommended that you upgrade your web browser in order to experience this website at its best, and to address the many security concerns that come with using outdated browsers. We recommend downloading <a href="https://www.google.com/chrome/">Google Chrome</a> or <a href="https://www.microsoft.com/en-gb/windows/microsoft-edge">Microsoft Edge</a>.</p></div>');
			}
		</script>

		<?php // Exit site link ?>
		<?php if (get_field('emergency_exit', 'option')): ?>
			<button class="exit-site exitSite">
				Exit site
				<span>Click here or press ESC key</span>
			</button>
		<?php endif; ?>

		<?php // Accessibility links ?>
		<?php get_template_part('template-parts/framework/_accessibility-links'); ?>

		<?php // Search form ?>
		<?php get_template_part('template-parts/framework/_search-form'); ?>

		<?php // Site header ?>
		<div class="site-header-wrapper <?php if(!is_front_page()): ?>site-header-wrapper--has-underline<?php endif; ?>" role="banner" id="header">
			<header class="site-header container">
			
				<?php // Site logo ?>
				<?php get_template_part('template-parts/framework/_site-logo'); ?>

				<?php // Main menu ?>
				<?php get_template_part('template-parts/framework/_nav-primary'); ?>

				<?php // Mobile menu navigation and trigger ?>
				<nav class="nav-mobile">
					<button 
					class="nav-mobile__toggle action action--primary-hollow action--small" 
					aria-haspopup="true">
					Menu<i class="nav-mobile__icon fas fa-caret-down"></i>
					</button>
					<?php get_template_part('template-parts/framework/_nav-primary-mobile'); ?>
					<div class="nav-mobile__mask"></div>
				</nav>
			</header>
		</div>

		<?php 
			// Check there is a title and we are not viewing the search page
			if(get_field('hero_title') || get_field('hero_body') && !is_search()): 
		?>
			<section class="hero-wrapper 
			<?php if(get_field('hero_mask')): ?>hero-wrapper--mask<?php endif; ?>">
				<?php the_post_thumbnail( 'hero-image', ['class' => 'hero__image'] ); ?>
			<div class="hero <?php if(get_field('hero_align') === 'right' || get_field('hero_align') === 'left'): ?>hero--has-grid<?php endif; ?>">
					<article class="hero__content 
					<?php if(get_field('hero_align') === 'right'): ?>hero__content--right<?php endif; ?>
					<?php if(get_field('hero_align') === 'centre'): ?>hero__content--centre<?php endif; ?>">
						<?php if(get_field('hero_title')): ?>
							<h1 class="hero__title"
							<?php if(!get_field('hero_body')): ?>style="margin-bottom:0"<?php endif; ?>
							><?php the_field('hero_title'); ?></h1>
						<?php endif; ?>
						<?php if(get_field('hero_body')): ?>
							<p class="hero__body" <?php if(!get_field('hero_primary_cta_label')):?>style="margin-bottom:0"<?php endif; ?>>
								<?php the_field('hero_body'); ?>
							</p>
						<?php endif; ?>
						<?php if(get_field('hero_primary_cta_label') && get_field('hero_primary_cta_link')): ?>
							<div class="hero__actions">
								<a href="<?php the_field('hero_primary_cta_link'); ?>" class="action action--alone action--primary">
								<?php the_field('hero_primary_cta_label'); ?>		
								</a>

								<?php if(get_field('hero_secondary_cta_label') && get_field('hero_secondary_cta_link')): ?>
									<a href="<?php the_field('hero_secondary_cta_link'); ?>" class="action action--alone action--primary-hollow">
									<?php the_field('hero_secondary_cta_label'); ?>		
									</a>
								<?php endif; ?>

							</div>
						<?php endif; ?>
					</article>
				</div>
			</section>
		<?php endif; ?>