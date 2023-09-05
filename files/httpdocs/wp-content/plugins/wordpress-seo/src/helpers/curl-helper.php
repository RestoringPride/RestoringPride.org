<?php

namespace Yoast\WP\SEO\Helpers;

/**
 * Helper class for getting information about the installed cURL version.
 */
class Curl_Helper {

	/**
	 * Checks is cURL is installed.
	 *
	 * @return bool Returns true if cURL is installed.
	 */
	public function is_installed() {
<<<<<<< HEAD
		return \function_exists( 'curl_version' );
=======
		return function_exists( 'curl_version' );
>>>>>>> fb785cbb (Initial commit)
	}

	/**
	 * Returns the currently installed cURL version.
	 *
	 * @return string|null Returns a string containing the cURL version, or null if cURL is not installed.
	 */
	public function get_version() {
<<<<<<< HEAD
		$version = \curl_version();
=======
		$version = curl_version();
>>>>>>> fb785cbb (Initial commit)

		if ( ! isset( $version['version'] ) ) {
			return null;
		}

		return $version['version'];
	}
}
