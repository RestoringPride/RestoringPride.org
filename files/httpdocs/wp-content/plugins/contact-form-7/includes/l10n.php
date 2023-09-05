<?php

<<<<<<< HEAD
/**
 * Retrieves an associative array of languages to which
 * this plugin is translated.
 *
 * @return array Array of languages.
 */
=======
>>>>>>> fb785cbb (Initial commit)
function wpcf7_l10n() {
	static $l10n = array();

	if ( ! empty( $l10n ) ) {
		return $l10n;
	}

	if ( ! is_admin() ) {
		return $l10n;
	}

	require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );

	$api = translations_api( 'plugins', array(
		'slug' => 'contact-form-7',
		'version' => WPCF7_VERSION,
	) );

	if ( is_wp_error( $api )
	or empty( $api['translations'] ) ) {
		return $l10n;
	}

	foreach ( (array) $api['translations'] as $translation ) {
		if ( ! empty( $translation['language'] )
		and ! empty( $translation['english_name'] ) ) {
			$l10n[$translation['language']] = $translation['english_name'];
		}
	}

	return $l10n;
}

<<<<<<< HEAD

/**
 * Returns true if the given locale code looks valid.
 *
 * @param string $locale Locale code.
 */
function wpcf7_is_valid_locale( $locale ) {
	if ( ! is_string( $locale ) ) {
		return false;
	}

=======
function wpcf7_is_valid_locale( $locale ) {
>>>>>>> fb785cbb (Initial commit)
	$pattern = '/^[a-z]{2,3}(?:_[a-zA-Z_]{2,})?$/';
	return (bool) preg_match( $pattern, $locale );
}

<<<<<<< HEAD

/**
 * Returns true if the given locale is an RTL language.
 */
=======
>>>>>>> fb785cbb (Initial commit)
function wpcf7_is_rtl( $locale = '' ) {
	static $rtl_locales = array(
		'ar' => 'Arabic',
		'ary' => 'Moroccan Arabic',
		'azb' => 'South Azerbaijani',
		'fa_IR' => 'Persian',
		'haz' => 'Hazaragi',
		'he_IL' => 'Hebrew',
		'ps' => 'Pashto',
		'ug_CN' => 'Uighur',
	);

	if ( empty( $locale )
	and function_exists( 'is_rtl' ) ) {
		return is_rtl();
	}

	if ( empty( $locale ) ) {
		$locale = determine_locale();
	}

	return isset( $rtl_locales[$locale] );
}

<<<<<<< HEAD

/**
 * Loads a translation file into the plugin's text domain.
 *
 * @param string $locale Locale code.
 * @return bool True on success, false on failure.
 */
function wpcf7_load_textdomain( $locale = '' ) {
	$mofile = path_join(
		WP_LANG_DIR . '/plugins/',
		sprintf( '%s-%s.mo', WPCF7_TEXT_DOMAIN, $locale )
	);

	return load_textdomain( WPCF7_TEXT_DOMAIN, $mofile, $locale );
}


/**
 * Unloads translations for the plugin's text domain.
 *
 * @param bool $reloadable Whether the text domain can be loaded
 *             just-in-time again.
 * @return bool True on success, false on failure.
 */
function wpcf7_unload_textdomain( $reloadable = false ) {
	return unload_textdomain( WPCF7_TEXT_DOMAIN, $reloadable );
}


/**
 * Switches translation locale, calls the callback, then switches back
 * to the original locale.
 *
 * @param string $locale Locale code.
 * @param callable $callback The callable to be called.
 * @param mixed $args Parameters to be passed to the callback.
 * @return mixed The return value of the callback.
 */
function wpcf7_switch_locale( $locale, callable $callback, ...$args ) {
	static $available_locales = null;

	if ( ! isset( $available_locales ) ) {
		$available_locales = array_merge(
			array( 'en_US' ),
			get_available_languages()
		);
	}

	$previous_locale = determine_locale();

	$do_switch_locale = (
		$locale !== $previous_locale &&
		in_array( $locale, $available_locales, true ) &&
		in_array( $previous_locale, $available_locales, true )
	);

	if ( $do_switch_locale ) {
		wpcf7_unload_textdomain();
		switch_to_locale( $locale );
		wpcf7_load_textdomain( $locale );
	}

	$result = call_user_func( $callback, ...$args );

	if ( $do_switch_locale ) {
		wpcf7_unload_textdomain( true );
		restore_previous_locale();
		wpcf7_load_textdomain( $previous_locale );
	}

	return $result;
=======
function wpcf7_load_textdomain( $locale = '' ) {
	static $locales = array();

	if ( empty( $locales ) ) {
		$locales = array( determine_locale() );
	}

	$available_locales = array_merge(
		array( 'en_US' ),
		get_available_languages()
	);

	if ( ! in_array( $locale, $available_locales ) ) {
		$locale = $locales[0];
	}

	if ( $locale === end( $locales ) ) {
		return false;
	} else {
		$locales[] = $locale;
	}

	$domain = WPCF7_TEXT_DOMAIN;

	if ( is_textdomain_loaded( $domain ) ) {
		unload_textdomain( $domain );
	}

	$mofile = sprintf( '%s-%s.mo', $domain, $locale );

	$domain_path = path_join( WPCF7_PLUGIN_DIR, 'languages' );
	$loaded = load_textdomain( $domain, path_join( $domain_path, $mofile ) );

	if ( ! $loaded ) {
		$domain_path = path_join( WP_LANG_DIR, 'plugins' );
		load_textdomain( $domain, path_join( $domain_path, $mofile ) );
	}

	return true;
>>>>>>> fb785cbb (Initial commit)
}
