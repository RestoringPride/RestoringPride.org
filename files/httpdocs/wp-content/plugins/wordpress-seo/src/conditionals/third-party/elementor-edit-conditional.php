<?php

namespace Yoast\WP\SEO\Conditionals\Third_Party;

use Yoast\WP\SEO\Conditionals\Conditional;

/**
 * Conditional that is only met when on an Elementor edit page or when the current
 * request is an ajax request for saving our post meta data.
 */
class Elementor_Edit_Conditional implements Conditional {

	/**
<<<<<<< HEAD
	 * Returns whether this conditional is met.
	 *
	 * @return bool Whether the conditional is met.
=======
	 * Returns whether or not this conditional is met.
	 *
	 * @return bool Whether or not the conditional is met.
>>>>>>> fb785cbb (Initial commit)
	 */
	public function is_met() {
		global $pagenow;

<<<<<<< HEAD
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reason: We are not processing form information.
		if ( isset( $_GET['action'] ) && \is_string( $_GET['action'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Reason: We are not processing form information, We are only strictly comparing.
			$get_action = \wp_unslash( $_GET['action'] );
			if ( $pagenow === 'post.php' && $get_action === 'elementor' ) {
				return true;
			}
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Missing -- Reason: We are not processing form information.
		if ( isset( $_POST['action'] ) && \is_string( $_POST['action'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Reason: We are not processing form information, We are only strictly comparing.
			$post_action = \wp_unslash( $_POST['action'] );
			return \wp_doing_ajax() && $post_action === 'wpseo_elementor_save';
		}

		return false;
=======
		// Check if we are on an Elementor edit page.
		$get_action = \filter_input( \INPUT_GET, 'action', \FILTER_SANITIZE_STRING );
		if ( $pagenow === 'post.php' && $get_action === 'elementor' ) {
			return true;
		}

		// Check if we are in our Elementor ajax request.
		$post_action = \filter_input( \INPUT_POST, 'action', \FILTER_SANITIZE_STRING );
		return \wp_doing_ajax() && $post_action === 'wpseo_elementor_save';
>>>>>>> fb785cbb (Initial commit)
	}
}
