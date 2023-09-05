<?php
/**
 * Site Editor administration screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

<<<<<<< HEAD
<<<<<<< HEAD
global $editor_styles;
=======
global $post, $editor_styles;
>>>>>>> fb785cbb (Initial commit)
=======
global $editor_styles;
>>>>>>> c058c778 (Combining with the latest source from WP)

/** WordPress Administration Bootstrap */
require_once __DIR__ . '/admin.php';

if ( ! current_user_can( 'edit_theme_options' ) ) {
	wp_die(
		'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
		'<p>' . __( 'Sorry, you are not allowed to edit theme options on this site.' ) . '</p>',
		403
	);
}

<<<<<<< HEAD
<<<<<<< HEAD
if ( ! ( current_theme_supports( 'block-template-parts' ) || wp_is_block_theme() ) ) {
	wp_die( __( 'The theme you are currently using is not compatible with the Site Editor.' ) );
}

$is_template_part_editor = isset( $_GET['postType'] ) && 'wp_template_part' === sanitize_key( $_GET['postType'] );
if ( ! wp_is_block_theme() && ! $is_template_part_editor ) {
	wp_die( __( 'The theme you are currently using is not compatible with the Site Editor.' ) );
}

// Used in the HTML title tag.
$title       = _x( 'Editor', 'site editor title tag' );
=======
if ( ! wp_is_block_theme() ) {
	wp_die( __( 'The theme you are currently using is not compatible with Full Site Editing.' ) );
=======
if ( ! ( current_theme_supports( 'block-template-parts' ) || wp_is_block_theme() ) ) {
	wp_die( __( 'The theme you are currently using is not compatible with the Site Editor.' ) );
>>>>>>> c058c778 (Combining with the latest source from WP)
}

$is_template_part_editor = isset( $_GET['postType'] ) && 'wp_template_part' === sanitize_key( $_GET['postType'] );
if ( ! wp_is_block_theme() && ! $is_template_part_editor ) {
	wp_die( __( 'The theme you are currently using is not compatible with the Site Editor.' ) );
}

// Used in the HTML title tag.
<<<<<<< HEAD
$title       = __( 'Editor (beta)' );
>>>>>>> fb785cbb (Initial commit)
=======
$title       = _x( 'Editor', 'site editor title tag' );
>>>>>>> c058c778 (Combining with the latest source from WP)
$parent_file = 'themes.php';

// Flag that we're loading the block editor.
$current_screen = get_current_screen();
$current_screen->is_block_editor( true );

// Default to is-fullscreen-mode to avoid jumps in the UI.
add_filter(
	'admin_body_class',
	static function( $classes ) {
		return "$classes is-fullscreen-mode";
	}
);

$indexed_template_types = array();
foreach ( get_default_block_template_types() as $slug => $template_type ) {
	$template_type['slug']    = (string) $slug;
	$indexed_template_types[] = $template_type;
}

$block_editor_context = new WP_Block_Editor_Context( array( 'name' => 'core/edit-site' ) );
$custom_settings      = array(
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
	'siteUrl'                   => site_url(),
	'postsPerPage'              => get_option( 'posts_per_page' ),
	'styles'                    => get_block_editor_theme_styles(),
	'defaultTemplateTypes'      => $indexed_template_types,
	'defaultTemplatePartAreas'  => get_allowed_block_template_part_areas(),
	'supportsLayout'            => wp_theme_has_theme_json(),
	'supportsTemplatePartsMode' => ! wp_is_block_theme() && current_theme_supports( 'block-template-parts' ),
<<<<<<< HEAD
=======
	'siteUrl'                  => site_url(),
	'postsPerPage'             => get_option( 'posts_per_page' ),
	'styles'                   => get_block_editor_theme_styles(),
	'defaultTemplateTypes'     => $indexed_template_types,
	'defaultTemplatePartAreas' => get_allowed_block_template_part_areas(),
	'__unstableHomeTemplate'   => $home_template,
>>>>>>> fb785cbb (Initial commit)
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
);

// Add additional back-compat patterns registered by `current_screen` et al.
$custom_settings['__experimentalAdditionalBlockPatterns']          = WP_Block_Patterns_Registry::get_instance()->get_all_registered( true );
$custom_settings['__experimentalAdditionalBlockPatternCategories'] = WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered( true );

<<<<<<< HEAD
<<<<<<< HEAD
$editor_settings = get_block_editor_settings( $custom_settings, $block_editor_context );
=======
$editor_settings      = get_block_editor_settings( $custom_settings, $block_editor_context );
>>>>>>> fb785cbb (Initial commit)
=======
$editor_settings = get_block_editor_settings( $custom_settings, $block_editor_context );
>>>>>>> c058c778 (Combining with the latest source from WP)

if ( isset( $_GET['postType'] ) && ! isset( $_GET['postId'] ) ) {
	$post_type = get_post_type_object( $_GET['postType'] );
	if ( ! $post_type ) {
		wp_die( __( 'Invalid post type.' ) );
	}
}

$active_global_styles_id = WP_Theme_JSON_Resolver::get_user_global_styles_post_id();
<<<<<<< HEAD
<<<<<<< HEAD
$active_theme            = get_stylesheet();
=======
$active_theme            = wp_get_theme()->get_stylesheet();
>>>>>>> fb785cbb (Initial commit)
=======
$active_theme            = get_stylesheet();
>>>>>>> c058c778 (Combining with the latest source from WP)
$preload_paths           = array(
	array( '/wp/v2/media', 'OPTIONS' ),
	'/wp/v2/types?context=view',
	'/wp/v2/types/wp_template?context=edit',
	'/wp/v2/types/wp_template-part?context=edit',
	'/wp/v2/templates?context=edit&per_page=-1',
	'/wp/v2/template-parts?context=edit&per_page=-1',
	'/wp/v2/themes?context=edit&status=active',
	'/wp/v2/global-styles/' . $active_global_styles_id . '?context=edit',
	'/wp/v2/global-styles/' . $active_global_styles_id,
	'/wp/v2/global-styles/themes/' . $active_theme,
);

block_editor_rest_api_preload( $preload_paths, $block_editor_context );

wp_add_inline_script(
	'wp-edit-site',
	sprintf(
		'wp.domReady( function() {
			wp.editSite.initializeEditor( "site-editor", %s );
		} );',
		wp_json_encode( $editor_settings )
	)
);

// Preload server-registered block schemas.
wp_add_inline_script(
	'wp-blocks',
	'wp.blocks.unstable__bootstrapServerSideBlockDefinitions(' . wp_json_encode( get_block_editor_server_block_settings() ) . ');'
);

wp_add_inline_script(
	'wp-blocks',
<<<<<<< HEAD
<<<<<<< HEAD
	sprintf( 'wp.blocks.setCategories( %s );', wp_json_encode( isset( $editor_settings['blockCategories'] ) ? $editor_settings['blockCategories'] : array() ) ),
=======
	sprintf( 'wp.blocks.setCategories( %s );', wp_json_encode( get_block_categories( $post ) ) ),
>>>>>>> fb785cbb (Initial commit)
=======
	sprintf( 'wp.blocks.setCategories( %s );', wp_json_encode( isset( $editor_settings['blockCategories'] ) ? $editor_settings['blockCategories'] : array() ) ),
>>>>>>> c058c778 (Combining with the latest source from WP)
	'after'
);

wp_enqueue_script( 'wp-edit-site' );
wp_enqueue_script( 'wp-format-library' );
wp_enqueue_style( 'wp-edit-site' );
wp_enqueue_style( 'wp-format-library' );
wp_enqueue_media();

if (
<<<<<<< HEAD
<<<<<<< HEAD
	current_theme_supports( 'wp-block-styles' ) &&
=======
	current_theme_supports( 'wp-block-styles' ) ||
>>>>>>> fb785cbb (Initial commit)
=======
	current_theme_supports( 'wp-block-styles' ) &&
>>>>>>> c058c778 (Combining with the latest source from WP)
	( ! is_array( $editor_styles ) || count( $editor_styles ) === 0 )
) {
	wp_enqueue_style( 'wp-block-library-theme' );
}

/** This action is documented in wp-admin/edit-form-blocks.php */
do_action( 'enqueue_block_editor_assets' );

require_once ABSPATH . 'wp-admin/admin-header.php';
?>

<div id="site-editor" class="edit-site"></div>

<?php

require_once ABSPATH . 'wp-admin/admin-footer.php';
