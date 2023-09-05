<?php
/**
 * WPSEO plugin file.
 *
 * @package WPSEO\Admin\Roles
 */

/**
 * VIP implementation of the Role Manager.
<<<<<<< HEAD
 *
 * @deprecated 19.9
 * @codeCoverageIgnore
=======
>>>>>>> fb785cbb (Initial commit)
 */
final class WPSEO_Role_Manager_VIP extends WPSEO_Abstract_Role_Manager {

	/**
	 * Adds a role to the system.
	 *
<<<<<<< HEAD
	 * @deprecated 19.9
	 * @codeCoverageIgnore
	 *
=======
>>>>>>> fb785cbb (Initial commit)
	 * @param string $role         Role to add.
	 * @param string $display_name Name to display for the role.
	 * @param array  $capabilities Capabilities to add to the role.
	 *
	 * @return void
	 */
	protected function add_role( $role, $display_name, array $capabilities = [] ) {
<<<<<<< HEAD
		_deprecated_function( __METHOD__, 'WPSEO 19.9' );

=======
>>>>>>> fb785cbb (Initial commit)
		$enabled_capabilities  = [];
		$disabled_capabilities = [];

		// Build lists of enabled and disabled capabilities.
		foreach ( $capabilities as $capability => $grant ) {
			if ( $grant ) {
				$enabled_capabilities[] = $capability;
			}

			if ( ! $grant ) {
				$disabled_capabilities[] = $capability;
			}
		}

		wpcom_vip_add_role( $role, $display_name, $enabled_capabilities );
		if ( $disabled_capabilities !== [] ) {
			wpcom_vip_remove_role_caps( $role, $disabled_capabilities );
		}
	}

	/**
	 * Removes a role from the system.
	 *
<<<<<<< HEAD
	 * @deprecated 19.9
	 * @codeCoverageIgnore
	 *
=======
>>>>>>> fb785cbb (Initial commit)
	 * @param string $role Role to remove.
	 *
	 * @return void
	 */
	protected function remove_role( $role ) {
<<<<<<< HEAD
		_deprecated_function( __METHOD__, 'WPSEO 19.9' );

=======
>>>>>>> fb785cbb (Initial commit)
		remove_role( $role );
	}
}
