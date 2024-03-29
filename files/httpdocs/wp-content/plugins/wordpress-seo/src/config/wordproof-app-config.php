<?php

namespace Yoast\WP\SEO\Config;

use YoastSEO_Vendor\WordProof\SDK\Config\DefaultAppConfig;

/**
 * Class WordProof_App_Config.
 *
 * @package Yoast\WP\SEO\Config
 */
class Wordproof_App_Config extends DefaultAppConfig {

	/**
	 * Returns the partner.
	 *
	 * @return string The partner.
	 */
	public function getPartner() {
		return 'yoast';
	}

	/**
	 * Returns if the WordProof Uikit should be loaded from a cdn.
	 *
<<<<<<< HEAD
	 * @return bool True or false.
=======
	 * @return boolean True or false.
>>>>>>> fb785cbb (Initial commit)
	 */
	public function getLoadUikitFromCdn() {
		return false;
	}
}
