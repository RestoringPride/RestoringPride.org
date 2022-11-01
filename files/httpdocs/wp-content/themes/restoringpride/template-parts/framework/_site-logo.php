<?php
	// Get the custom logo	
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<a href="/" 
title="Go back to <?php bloginfo( 'name' ); ?> homepage">
	<img src="<?php echo $image[0] ?>" 
	alt="<?php bloginfo( 'name' ); ?> logo" 
	class="site-logo" />
</a>