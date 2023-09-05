<?php

add_action( 'init', 'wpcf7_init_block_editor_assets', 10, 0 );

function wpcf7_init_block_editor_assets() {
	$assets = array();

	$asset_file = wpcf7_plugin_path(
		'includes/block-editor/index.asset.php'
	);

	if ( file_exists( $asset_file ) ) {
		$assets = include( $asset_file );
	}

	$assets = wp_parse_args( $assets, array(
<<<<<<< HEAD
		'dependencies' => array(
			'wp-api-fetch',
			'wp-block-editor',
			'wp-blocks',
			'wp-components',
			'wp-element',
			'wp-i18n',
			'wp-url',
=======
		'src' => wpcf7_plugin_url( 'includes/block-editor/index.js' ),
		'dependencies' => array(
			'wp-api-fetch',
			'wp-components',
			'wp-compose',
			'wp-blocks',
			'wp-element',
			'wp-i18n',
>>>>>>> fb785cbb (Initial commit)
		),
		'version' => WPCF7_VERSION,
	) );

	wp_register_script(
		'contact-form-7-block-editor',
<<<<<<< HEAD
		wpcf7_plugin_url( 'includes/block-editor/index.js' ),
=======
		$assets['src'],
>>>>>>> fb785cbb (Initial commit)
		$assets['dependencies'],
		$assets['version']
	);

	wp_set_script_translations(
		'contact-form-7-block-editor',
		'contact-form-7'
	);

	register_block_type(
<<<<<<< HEAD
		wpcf7_plugin_path( 'includes/block-editor' ),
=======
		'contact-form-7/contact-form-selector',
>>>>>>> fb785cbb (Initial commit)
		array(
			'editor_script' => 'contact-form-7-block-editor',
		)
	);

	$contact_forms = array_map(
		function ( $contact_form ) {
			return array(
				'id' => $contact_form->id(),
				'slug' => $contact_form->name(),
				'title' => $contact_form->title(),
				'locale' => $contact_form->locale(),
			);
		},
		WPCF7_ContactForm::find( array(
			'posts_per_page' => 20,
<<<<<<< HEAD
			'orderby' => 'modified',
			'order' => 'DESC',
=======
>>>>>>> fb785cbb (Initial commit)
		) )
	);

	wp_add_inline_script(
		'contact-form-7-block-editor',
		sprintf(
			'window.wpcf7 = {contactForms:%s};',
			json_encode( $contact_forms )
		),
		'before'
	);

}
