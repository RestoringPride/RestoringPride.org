<?php
	/**
	 * Primary top-level navigation on mobile screens
	 * 
	 */
?>

<?php 
    wp_nav_menu( 
        array( 
            'theme_location' => 'header-menu',
            'container' => '',
            'container_class' => '',
            'items_wrap' => '<ul class="nav-mobile__menu" role="menu">%3$s</ul>',
        ) 
    ); 
?>
