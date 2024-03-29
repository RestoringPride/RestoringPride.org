<?php
/**
 * Server-side rendering of the `core/archives` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/archives` block on server.
 *
 * @see WP_Widget_Archives
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with archives added.
 */
function render_block_core_archives( $attributes ) {
	$show_post_count = ! empty( $attributes['showPostCounts'] );
	$type            = isset( $attributes['type'] ) ? $attributes['type'] : 'monthly';
<<<<<<< HEAD

	$class = 'wp-block-archives-list';

	if ( ! empty( $attributes['displayAsDropdown'] ) ) {

		$class = 'wp-block-archives-dropdown';
=======
	$class           = '';

	if ( ! empty( $attributes['displayAsDropdown'] ) ) {

		$class .= ' wp-block-archives-dropdown';
>>>>>>> fb785cbb (Initial commit)

		$dropdown_id = wp_unique_id( 'wp-block-archives-' );
		$title       = __( 'Archives' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
		$dropdown_args = apply_filters(
			'widget_archives_dropdown_args',
			array(
				'type'            => $type,
				'format'          => 'option',
				'show_post_count' => $show_post_count,
			)
		);

		$dropdown_args['echo'] = 0;

		$archives = wp_get_archives( $dropdown_args );

<<<<<<< HEAD
		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );
=======
		$classnames = esc_attr( $class );

		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classnames ) );
>>>>>>> fb785cbb (Initial commit)

		switch ( $dropdown_args['type'] ) {
			case 'yearly':
				$label = __( 'Select Year' );
				break;
			case 'monthly':
				$label = __( 'Select Month' );
				break;
			case 'daily':
				$label = __( 'Select Day' );
				break;
			case 'weekly':
				$label = __( 'Select Week' );
				break;
			default:
				$label = __( 'Select Post' );
				break;
		}

<<<<<<< HEAD
		$show_label = empty( $attributes['showLabel'] ) ? ' screen-reader-text' : '';

		$block_content = '<label for="' . $dropdown_id . '" class="wp-block-archives__label' . $show_label . '">' . esc_html( $title ) . '</label>
		<select id="' . $dropdown_id . '" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value="">' . esc_html( $label ) . '</option>' . $archives . '</select>';
=======
		$block_content = '<label for="' . esc_attr( $dropdown_id ) . '">' . esc_html( $title ) . '</label>
	<select id="' . esc_attr( $dropdown_id ) . '" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	<option value="">' . esc_html( $label ) . '</option>' . $archives . '</select>';
>>>>>>> fb785cbb (Initial commit)

		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$block_content
		);
	}

<<<<<<< HEAD
=======
	$class .= ' wp-block-archives-list';

>>>>>>> fb785cbb (Initial commit)
	/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
	$archives_args = apply_filters(
		'widget_archives_args',
		array(
			'type'            => $type,
			'show_post_count' => $show_post_count,
		)
	);

	$archives_args['echo'] = 0;

	$archives = wp_get_archives( $archives_args );

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );

	if ( empty( $archives ) ) {
		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			__( 'No archives to show.' )
		);
	}

	return sprintf(
		'<ul %1$s>%2$s</ul>',
		$wrapper_attributes,
		$archives
	);
}

/**
 * Register archives block.
 */
function register_block_core_archives() {
	register_block_type_from_metadata(
		__DIR__ . '/archives',
		array(
			'render_callback' => 'render_block_core_archives',
		)
	);
}
add_action( 'init', 'register_block_core_archives' );
