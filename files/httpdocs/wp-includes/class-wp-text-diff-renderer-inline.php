<?php
/**
 * Diff API: WP_Text_Diff_Renderer_inline class
 *
 * @package WordPress
 * @subpackage Diff
 * @since 4.7.0
 */

/**
 * Better word splitting than the PEAR package provides.
 *
 * @since 2.6.0
 * @uses Text_Diff_Renderer_inline Extends
 */
<<<<<<< HEAD
<<<<<<< HEAD
#[AllowDynamicProperties]
=======
>>>>>>> fb785cbb (Initial commit)
=======
#[AllowDynamicProperties]
>>>>>>> c058c778 (Combining with the latest source from WP)
class WP_Text_Diff_Renderer_inline extends Text_Diff_Renderer_inline {

	/**
	 * @ignore
	 * @since 2.6.0
	 *
	 * @param string $string
	 * @param string $newlineEscape
	 * @return string
	 */
<<<<<<< HEAD
<<<<<<< HEAD
	public function _splitOnWords( $string, $newlineEscape = "\n" ) { // phpcs:ignore Universal.NamingConventions.NoReservedKeywordParameterNames.stringFound
=======
	public function _splitOnWords( $string, $newlineEscape = "\n" ) {
>>>>>>> fb785cbb (Initial commit)
=======
	public function _splitOnWords( $string, $newlineEscape = "\n" ) { // phpcs:ignore Universal.NamingConventions.NoReservedKeywordParameterNames.stringFound
>>>>>>> c058c778 (Combining with the latest source from WP)
		$string = str_replace( "\0", '', $string );
		$words  = preg_split( '/([^\w])/u', $string, -1, PREG_SPLIT_DELIM_CAPTURE );
		$words  = str_replace( "\n", $newlineEscape, $words );
		return $words;
	}

}
