	<div class="site-footer-wrapper">
		<footer class="site-footer container">
			<section class="site-footer__blocks">
				<div>	
					<h3 class="site-footer__heading">Links</h3>
					<?php 
					// Footer menu
					wp_nav_menu( 
						array( 
							'theme_location' => 'footer-menu',
							'container' => '',
							'container_class' => '',
							'items_wrap' => '<ul role="menu">%3$s</ul>',
						) 
					); 
					?>
				</div>
				<div>
					<h3 class="site-footer__heading">Contact Us</h3>
					<?php if( get_field('address', 'options') ): ?>
						<p><?php echo get_field('address', 'options'); ?></p>
					<?php endif; ?>
				</div>
				<div>
					<h3 class="site-footer__heading">Follow Us</h3>
					<ul class="social-icons">
						<?php while ( have_rows('company_social_media_icons', 'options') ) : the_row(); ?>
							<li>
								<a href="<?php the_sub_field('network_link'); ?>" target="_blank" title="Visit social network link">
									<i class="social-icons__icon <?php the_sub_field('network_icon'); ?>">
										<span>Visit social network link</span>
									</i>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>

				<?php 
				// Footer callout
				if( get_field('footer_callout_title', 'options') ): ?>
					<?php get_template_part('template-parts/framework/_footer-callout'); ?>
				<?php endif; ?>
			</section>

			<section class="site-footer__additional">
				<div>
					<p>
						Copyright &copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>.
					</p>
					<?php 
						wp_nav_menu( 
							array( 
								'theme_location' => 'legal-menu',
								'container' => '',
								'container_class' => '',
								'items_wrap' => '<ul role="menu">%3$s</ul>',
							) 
						); 
					?>
				</div>
				<p class="site-footer__credit"><a href="https://charitybox.io" title="Website design for charities" target="_blank">Built by Charity Box</a></p>
			</section>
		</footer>
	</div>
	<?php wp_footer(); ?>
	</body>
</html>