<?php
/**
 * WPSEO plugin file.
 *
 * @package WPSEO\Admin\Views
 *
 * @uses Yoast_Form $yform Form object.
 */

<<<<<<< HEAD
use Yoast\WP\SEO\Presenters\Admin\Alert_Presenter;
=======
use Yoast\WP\SEO\Presenters\Admin\Badge_Presenter;
use Yoast\WP\SEO\Presenters\Admin\Premium_Badge_Presenter;
>>>>>>> fb785cbb (Initial commit)

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

$integration_toggles = Yoast_Integration_Toggles::instance()->get_all();

?>
	<h2><?php esc_html_e( 'Integrations', 'wordpress-seo' ); ?></h2>
	<div class="yoast-measure">
		<?php
<<<<<<< HEAD

		$integrations_moved_message = sprintf(
			/* translators: 1: link open tag; 2: link close tag. */
			esc_html__( 'Looking for your integrations settings? We\'ve moved them to a %1$sseparate Integrations page%2$s.', 'wordpress-seo' ),
			'<a href="' . esc_url( admin_url( 'admin.php?page=wpseo_integrations' ) ) . '">',
			'</a>'
		);

		$frontpage_settings_alert = new Alert_Presenter( $integrations_moved_message, 'info' );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output from present() is considered safe.
		echo $frontpage_settings_alert->present();

		$yform->hidden( 'semrush_integration_active', 'semrush_integration_active' );
		$yform->hidden( 'ryte_indexability', 'ryte_indexability' );
		$yform->hidden( 'zapier_integration_active', 'zapier_integration_active' );
		$yform->hidden( 'algolia_integration_active', 'algolia_integration_active' );
		$yform->hidden( 'wincher_integration_active', 'wincher_integration_active' );
		$yform->hidden( 'wordproof_integration_active', 'wordproof_integration_active' );
=======
		echo sprintf(
		/* translators: %1$s expands to Yoast SEO */
			esc_html__( '%1$s can integrate with third parties products. You can enable or disable these integrations below.', 'wordpress-seo' ),
			'Yoast SEO'
		);

		foreach ( $integration_toggles as $integration ) {
			$help_text = esc_html( $integration->label );

			if ( ! empty( $integration->extra ) ) {
				$help_text .= ' ' . $integration->extra;
			}

			if ( ! empty( $integration->read_more_label ) ) {
				$url = $integration->read_more_url;
				if ( ! empty( $integration->premium ) && $integration->premium === true ) {
					$url = $integration->premium_url;
				}

				$help_text .= ' ';
				$help_text .= sprintf(
					'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
					esc_url( WPSEO_Shortlinker::get( $url ) ),
					esc_html( $integration->read_more_label )
				);
			}

			$feature_help = new WPSEO_Admin_Help_Panel(
				$integration->setting,
				/* translators: %s expands to an integration's name */
				sprintf( esc_html__( 'Help on: %s', 'wordpress-seo' ), esc_html( $integration->name ) ),
				$help_text
			);

			$name = $integration->name;
			if ( ! empty( $integration->premium ) && $integration->premium === true ) {
				$name .= ' ' . new Premium_Badge_Presenter( $integration->name );
			}

			if ( ! empty( $integration->new ) && $integration->new === true ) {
				$name .= ' ' . new Badge_Presenter( $integration->name );
			}

			$attributes = [];

			$disabled = false;
			if ( $integration->premium === true && YoastSEO()->helpers->product->is_premium() === false ) {
				$attributes = [ 'disabled' => true ];
			}

			// If the integration is disabled, do not show note showing
			// the integration is disabled by network admin.
			if ( isset( $integration->disabled ) && $integration->disabled === true ) {
				$attributes = [
					'disabled'           => true,
					'show_disabled_note' => false,
				];
			}

			$preserve_disabled_value = false;
			if ( isset( $attributes['disabled'] ) && $attributes['disabled'] ) {
				$preserve_disabled_value = true;
			}

			$attributes['preserve_disabled_value'] = $preserve_disabled_value;

			$yform->toggle_switch(
				$integration->setting,
				[
					'on'  => __( 'On', 'wordpress-seo' ),
					'off' => __( 'Off', 'wordpress-seo' ),
				],
				$name,
				$feature_help->get_button_html() . $feature_help->get_panel_html(),
				$attributes
			);

			do_action( 'Yoast\WP\SEO\admin_integration_after', $integration );
		}
>>>>>>> fb785cbb (Initial commit)
		?>
	</div>
<?php
/*
 * Required to prevent our settings framework from saving the default because the field isn't
 * explicitly set when saving the Dashboard page.
 */
$yform->hidden( 'show_onboarding_notice', 'wpseo_show_onboarding_notice' );
