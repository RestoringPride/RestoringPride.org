<?php
/**
 * WPSEO plugin file.
 *
 * @package WPSEO\Admin\Views
 *
 * @uses Yoast_Form $yform Form object.
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

?>
<h2><?php esc_html_e( 'Crawl settings', 'wordpress-seo' ); ?></h2>
<div class="yoast-measure">
<?php
	echo sprintf(
		/* translators: %1$s expands to Yoast SEO */
		esc_html__( 'To make the crawling of your site more efficient and environmental friendly, %1$s allows you to remove URLs (added by WordPress) that might not be needed for your site.', 'wordpress-seo' ),
		'Yoast SEO Premium'
	);

	echo '<p style="margin: 0.5em 0 1em;">';
	echo sprintf(
		/* translators: %1$s opens the link to the Yoast.com article about Crawl settings, %2$s closes the link, */
		esc_html__( '%1$sLearn more about crawl settings and how they could benefit your site.%2$s', 'wordpress-seo' ),
		'<a href="' . esc_url( WPSEO_Shortlinker::get( 'https://yoa.st/crawl-settings' ) ) . '" target="_blank" rel="noopener noreferrer">',
		'</a>'
	);
	echo '</p>';

	/**
<<<<<<< HEAD
	 * WARNING: This hook is intended for internal use only.
	 * Don't use it in your code as it will be removed shortly.
	 */
	do_action( 'wpseo_settings_tab_crawl_cleanup_internal', $yform );

	/**
	 * Fires when displaying the crawl cleanup tab.
	 *
	 * @deprecated 19.10 No replacement available.
	 *
	 * @param Yoast_Form $yform The yoast form object.
	 */

	do_action_deprecated(
		'wpseo_settings_tab_crawl_cleanup',
		[ $yform ],
		'19.10',
		'',
		'This action is going away with no replacement. If you want to add settings that interact with Yoast SEO, please create your own settings page.'
	);
=======
	 * Fires when displaying the crawl cleanup tab.
	 *
	 * @param Yoast_Form $yform The yoast form object.
	 */
	do_action( 'wpseo_settings_tab_crawl_cleanup', $yform );

>>>>>>> fb785cbb (Initial commit)
	?>
</div>
<?php
/*
 * Required to prevent our settings framework from saving the default because the field isn't
 * explicitly set when saving the Dashboard page.
 */
$yform->hidden( 'show_onboarding_notice', 'wpseo_show_onboarding_notice' );
