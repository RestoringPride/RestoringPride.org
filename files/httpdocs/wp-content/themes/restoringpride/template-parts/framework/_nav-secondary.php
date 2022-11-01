<?php
	/**
	 * List of child pages on sidebar
	 * 
	 */
?>
<aside class="nav-secondary">
	<div class="nav-secondary__content">
		<div class="container">
			<!-- <header class="nav-secondary__header">
				<h3>
					<?php if(get_field('nav-secondary_title', 'option')): ?>
						<?php the_field('nav-secondary_title', 'option'); ?>
					<?php else :?>
						In this section
					<?php endif;?>
				</h3>
			</header> -->
			<nav class="nav-secondary__nav">
				<?php echo wpb_list_child_pages(); ?>
			</nav>
		</div>
	</div>
</aside>