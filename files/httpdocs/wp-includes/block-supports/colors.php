<?php
/**
 * Colors block support flag.
 *
 * @package WordPress
 * @since 5.6.0
 */

/**
 * Registers the style and colors block attributes for block types that support it.
 *
 * @since 5.6.0
<<<<<<< HEAD
 * @since 6.1.0 Improved $color_support assignment optimization.
=======
>>>>>>> fb785cbb (Initial commit)
 * @access private
 *
 * @param WP_Block_Type $block_type Block Type.
 */
function wp_register_colors_support( $block_type ) {
<<<<<<< HEAD
	$color_support                 = property_exists( $block_type, 'supports' ) ? _wp_array_get( $block_type->supports, array( 'color' ), false ) : false;
=======
	$color_support = false;
	if ( property_exists( $block_type, 'supports' ) ) {
		$color_support = _wp_array_get( $block_type->supports, array( 'color' ), false );
	}
>>>>>>> fb785cbb (Initial commit)
	$has_text_colors_support       = true === $color_support || ( is_array( $color_support ) && _wp_array_get( $color_support, array( 'text' ), true ) );
	$has_background_colors_support = true === $color_support || ( is_array( $color_support ) && _wp_array_get( $color_support, array( 'background' ), true ) );
	$has_gradients_support         = _wp_array_get( $color_support, array( 'gradients' ), false );
	$has_link_colors_support       = _wp_array_get( $color_support, array( 'link' ), false );
	$has_color_support             = $has_text_colors_support ||
		$has_background_colors_support ||
		$has_gradients_support ||
		$has_link_colors_support;

	if ( ! $block_type->attributes ) {
		$block_type->attributes = array();
	}

	if ( $has_color_support && ! array_key_exists( 'style', $block_type->attributes ) ) {
		$block_type->attributes['style'] = array(
			'type' => 'object',
		);
	}

	if ( $has_background_colors_support && ! array_key_exists( 'backgroundColor', $block_type->attributes ) ) {
		$block_type->attributes['backgroundColor'] = array(
			'type' => 'string',
		);
	}

	if ( $has_text_colors_support && ! array_key_exists( 'textColor', $block_type->attributes ) ) {
		$block_type->attributes['textColor'] = array(
			'type' => 'string',
		);
	}

	if ( $has_gradients_support && ! array_key_exists( 'gradient', $block_type->attributes ) ) {
		$block_type->attributes['gradient'] = array(
			'type' => 'string',
		);
	}
}


/**
<<<<<<< HEAD
 * Adds CSS classes and inline styles for colors to the incoming attributes array.
 * This will be applied to the block markup in the front-end.
 *
 * @since 5.6.0
 * @since 6.1.0 Implemented the style engine to generate CSS and classnames.
=======
 * Add CSS classes and inline styles for colors to the incoming attributes array.
 * This will be applied to the block markup in the front-end.
 *
 * @since 5.6.0
>>>>>>> fb785cbb (Initial commit)
 * @access private
 *
 * @param  WP_Block_Type $block_type       Block type.
 * @param  array         $block_attributes Block attributes.
 *
 * @return array Colors CSS classes and inline styles.
 */
function wp_apply_colors_support( $block_type, $block_attributes ) {
	$color_support = _wp_array_get( $block_type->supports, array( 'color' ), false );

	if (
		is_array( $color_support ) &&
		wp_should_skip_block_supports_serialization( $block_type, 'color' )
	) {
		return array();
	}

	$has_text_colors_support       = true === $color_support || ( is_array( $color_support ) && _wp_array_get( $color_support, array( 'text' ), true ) );
	$has_background_colors_support = true === $color_support || ( is_array( $color_support ) && _wp_array_get( $color_support, array( 'background' ), true ) );
	$has_gradients_support         = _wp_array_get( $color_support, array( 'gradients' ), false );
<<<<<<< HEAD
	$color_block_styles            = array();

	// Text colors.
	if ( $has_text_colors_support && ! wp_should_skip_block_supports_serialization( $block_type, 'color', 'text' ) ) {
		$preset_text_color          = array_key_exists( 'textColor', $block_attributes ) ? "var:preset|color|{$block_attributes['textColor']}" : null;
		$custom_text_color          = _wp_array_get( $block_attributes, array( 'style', 'color', 'text' ), null );
		$color_block_styles['text'] = $preset_text_color ? $preset_text_color : $custom_text_color;
=======
	$classes                       = array();
	$styles                        = array();

	// Text colors.
	// Check support for text colors.
	if ( $has_text_colors_support && ! wp_should_skip_block_supports_serialization( $block_type, 'color', 'text' ) ) {
		$has_named_text_color  = array_key_exists( 'textColor', $block_attributes );
		$has_custom_text_color = isset( $block_attributes['style']['color']['text'] );

		// Apply required generic class.
		if ( $has_custom_text_color || $has_named_text_color ) {
			$classes[] = 'has-text-color';
		}
		// Apply color class or inline style.
		if ( $has_named_text_color ) {
			$classes[] = sprintf( 'has-%s-color', _wp_to_kebab_case( $block_attributes['textColor'] ) );
		} elseif ( $has_custom_text_color ) {
			$styles[] = sprintf( 'color: %s;', $block_attributes['style']['color']['text'] );
		}
>>>>>>> fb785cbb (Initial commit)
	}

	// Background colors.
	if ( $has_background_colors_support && ! wp_should_skip_block_supports_serialization( $block_type, 'color', 'background' ) ) {
<<<<<<< HEAD
		$preset_background_color          = array_key_exists( 'backgroundColor', $block_attributes ) ? "var:preset|color|{$block_attributes['backgroundColor']}" : null;
		$custom_background_color          = _wp_array_get( $block_attributes, array( 'style', 'color', 'background' ), null );
		$color_block_styles['background'] = $preset_background_color ? $preset_background_color : $custom_background_color;
=======
		$has_named_background_color  = array_key_exists( 'backgroundColor', $block_attributes );
		$has_custom_background_color = isset( $block_attributes['style']['color']['background'] );

		// Apply required background class.
		if ( $has_custom_background_color || $has_named_background_color ) {
			$classes[] = 'has-background';
		}
		// Apply background color classes or styles.
		if ( $has_named_background_color ) {
			$classes[] = sprintf( 'has-%s-background-color', _wp_to_kebab_case( $block_attributes['backgroundColor'] ) );
		} elseif ( $has_custom_background_color ) {
			$styles[] = sprintf( 'background-color: %s;', $block_attributes['style']['color']['background'] );
		}
>>>>>>> fb785cbb (Initial commit)
	}

	// Gradients.
	if ( $has_gradients_support && ! wp_should_skip_block_supports_serialization( $block_type, 'color', 'gradients' ) ) {
<<<<<<< HEAD
		$preset_gradient_color          = array_key_exists( 'gradient', $block_attributes ) ? "var:preset|gradient|{$block_attributes['gradient']}" : null;
		$custom_gradient_color          = _wp_array_get( $block_attributes, array( 'style', 'color', 'gradient' ), null );
		$color_block_styles['gradient'] = $preset_gradient_color ? $preset_gradient_color : $custom_gradient_color;
	}

	$attributes = array();
	$styles     = wp_style_engine_get_styles( array( 'color' => $color_block_styles ), array( 'convert_vars_to_classnames' => true ) );

	if ( ! empty( $styles['classnames'] ) ) {
		$attributes['class'] = $styles['classnames'];
	}

	if ( ! empty( $styles['css'] ) ) {
		$attributes['style'] = $styles['css'];
=======
		$has_named_gradient  = array_key_exists( 'gradient', $block_attributes );
		$has_custom_gradient = isset( $block_attributes['style']['color']['gradient'] );

		if ( $has_named_gradient || $has_custom_gradient ) {
			$classes[] = 'has-background';
		}
		// Apply required background class.
		if ( $has_named_gradient ) {
			$classes[] = sprintf( 'has-%s-gradient-background', _wp_to_kebab_case( $block_attributes['gradient'] ) );
		} elseif ( $has_custom_gradient ) {
			$styles[] = sprintf( 'background: %s;', $block_attributes['style']['color']['gradient'] );
		}
	}

	$attributes = array();
	if ( ! empty( $classes ) ) {
		$attributes['class'] = implode( ' ', $classes );
	}
	if ( ! empty( $styles ) ) {
		$attributes['style'] = implode( ' ', $styles );
>>>>>>> fb785cbb (Initial commit)
	}

	return $attributes;
}

// Register the block support.
WP_Block_Supports::get_instance()->register(
	'colors',
	array(
		'register_attribute' => 'wp_register_colors_support',
		'apply'              => 'wp_apply_colors_support',
	)
);
