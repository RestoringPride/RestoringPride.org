<?php
	// Initiate setup 
    add_theme_support( 'title-tag' );
    
	function register_setup() {
        add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array() );
        add_image_size( 'card-thumbnail', 450, 450, true );
        add_image_size( 'block-thumbnail', 800, 800, true );
        add_image_size( 'hero-image', 1100, 500, true );
        add_image_size( 'post-image', 950, 850, true );
	}
	add_action( 'after_setup_theme', 'register_setup' );

    // Remove plugin CSS files
    add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
    function wps_deregister_styles() {
        wp_deregister_style( 'contact-form-7' ); // disable styles for Contact Form 7
        wp_dequeue_style( 'wp-block-library' ); // disable styles for Gutenberg blocks
        wp_dequeue_style( 'give-styles' ); // disable styles for Give form
        wp_dequeue_style( 'give_recurring_css' ); // disable styles for Give Recurring plugin
        wp_dequeue_style( 'give-gift-aid' ); // disable styles for Give Gift Aid plugin
    }

    // Remove hardcoded width and heights from images in blog posts
    // https://gist.github.com/pbiron/9f72eeabe8d283b4508c74035ebbec9f
    /*
     * full version of code I added in a comment on wpscholar.com about how
     * make it easier for WP to produce responsive images
     * @link https://wpscholar.com/blog/remove-wp-image-size-attributes/#comment-23731
     *
     * Note: I make no claims that this handles all cases, just those problems
     *       identified by others commenting on the OP's code
     */
    // Remove image size attributes from post thumbnails
    add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
    // Remove image size attributes from images added to a WordPress post
    add_filter( 'image_send_to_editor', 'remove_image_size_attributes', 21 );
    // Tell the [caption] shortcode not to output a "style: width: xxxpx" HTML attribute
    add_filter( 'img_caption_shortcode_width', '__return_false' );
    /**
     * Removes width and height attributes from image tags
     *
     * @param string $html
     * @return string
    */
    function remove_image_size_attributes( $html ) {
        // Find the <img> tag (so that we don't strip width from a [caption] shortcode)
        preg_match_all( '!<img [^>]+>!i', $html, $matches, PREG_SET_ORDER );
        if ( ! empty( $matches ) ) {
            $html = str_replace( $matches[0][0], preg_replace( '/(width|height)="\d*" /', '', $matches[0][0] ), $html );
        }
        return $html;
    }
    /**
     * Tell the [caption] shortcode not to output a "style: width: xxxpx" HTML attribute
     *
     * @param string $html
     * @return string
    */
    function img_caption_shortcode_width() {
        return 0;
    }
    // End image size code

	// Add custom files
	function register_custom_files() {
		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.9.0/css/all.css' );
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,400|Open+Sans:400,700' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_script( 'app', get_template_directory_uri().'/js/app.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'register_custom_files' );

	// Add custom menu locations
	function register_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
                'footer-menu' => __( 'Footer Menu' ),
                'legal-menu' => __( 'Legal Menu' )
			)
		);
	}
	add_action( 'init', 'register_menus' );

	// Get child pages
	// http://www.wpbeginner.com/wp-tutorials/how-to-display-a-list-of-child-pages-for-a-parent-page-in-wordpress/
	function wpb_list_child_pages() { 
        global $post;

        $exclude = [];
        // Get an array of pages where a given template is found
        // We are going to use this to *exclude* these links from the child pages below
        // Use this in instances when we don't want some pages to appear in the sidebar
        foreach(get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'template-person.php', 'hierarchical' => 0)) as $page) {
            $exclude[] = $page->ID;
        }

        foreach(get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'template-landing-page.php', 'hierarchical' => 0)) as $page) {
            $exclude[] = $page->ID;
        }

        foreach(get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'template-policy-issue.php', 'hierarchical' => 0)) as $page) {
            $exclude[] = $page->ID;
        }

        foreach(get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'template-pilot.php', 'hierarchical' => 0)) as $page) {
            $exclude[] = $page->ID;
        }

        // If it is a page AND it IS a child page
        if ( is_page() && $post->post_parent ){
            // Child
            // Get the children of the post ancestors using the end() function which only looks at the last one
            $childpages = wp_list_pages( 'exclude='.implode(",", $exclude).'&sort_column=menu_order&title_li=&child_of=' . end($post->ancestors) . '&echo=0' );
        } else {
            // Parent
            $childpages = wp_list_pages( 'exclude='.implode(",", $exclude).'&sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
        }

		if ( $childpages ) {
			$string = '<ul>' . $childpages . '</ul>';
        }

		return $string;
    }

    /**
     * 
     * To enable this, add a select field to the Caldera form and get its ID
     * This select will then be populated by the query results here
     * The reason I'm not using it because I can't find a way to map this through
     * to the actual donation form.
     */
    // add_filter( 'caldera_forms_render_get_field', function( $field )  {
    //     if ( 'fld_4942825' == $field[ 'ID' ]  ) {
    //         $posts = new WP_Query( 
    //             array( 
    //                 'post_type' => 'give_forms', 
    //                 'meta_key' => 'give_form_type', 
    //                 'meta_value' => 'appeal' 
    //             )
    //         );
    //         // var_dump($posts);
    //         if ( ! empty( $posts ) ) {
    //             foreach( $posts as $post ) {
    //                 $field[ 'config' ][ 'option' ][ $post->ID ] = array(
    //                     'value' => $post->ID,
    //                     'label' => $post->post_title
    //                 );
    //             }
    //         }
    //     }

    //     return $field;
     
    // });
?>