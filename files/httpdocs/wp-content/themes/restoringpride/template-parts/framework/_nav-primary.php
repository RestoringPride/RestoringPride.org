<?php
	/**
	 * Primary top-level navigation
	 * 
	 */
?>
<nav class="nav-primary last-is-cta" role="navigation">
	<?php 
		wp_nav_menu( 
			array( 
				'theme_location' => 'header-menu',
				'container' => '',
				'container_class' => '',
				'items_wrap' => '<ul role="menu">%3$s</ul>',
			) 
		); 
	?>
</nav>