<?php
/**
 * Locale API: WP_Locale_Switcher class
 *
 * @package WordPress
 * @subpackage i18n
 * @since 4.7.0
 */

/**
 * Core class used for switching locales.
 *
 * @since 4.7.0
 */
<<<<<<< HEAD
#[AllowDynamicProperties]
class WP_Locale_Switcher {
	/**
	 * Locale switching stack.
	 *
	 * @since 6.2.0
	 * @var array
	 */
	private $stack = array();
=======
class WP_Locale_Switcher {
	/**
	 * Locale stack.
	 *
	 * @since 4.7.0
	 * @var string[]
	 */
	private $locales = array();
>>>>>>> fb785cbb (Initial commit)

	/**
	 * Original locale.
	 *
	 * @since 4.7.0
	 * @var string
	 */
	private $original_locale;

	/**
	 * Holds all available languages.
	 *
	 * @since 4.7.0
<<<<<<< HEAD
	 * @var string[] An array of language codes (file names without the .mo extension).
	 */
	private $available_languages;
=======
	 * @var array An array of language codes (file names without the .mo extension).
	 */
	private $available_languages = array();
>>>>>>> fb785cbb (Initial commit)

	/**
	 * Constructor.
	 *
	 * Stores the original locale as well as a list of all available languages.
	 *
	 * @since 4.7.0
	 */
	public function __construct() {
		$this->original_locale     = determine_locale();
		$this->available_languages = array_merge( array( 'en_US' ), get_available_languages() );
	}

	/**
	 * Initializes the locale switcher.
	 *
<<<<<<< HEAD
	 * Hooks into the {@see 'locale'} and {@see 'determine_locale'} filters
	 * to change the locale on the fly.
=======
	 * Hooks into the {@see 'locale'} filter to change the locale on the fly.
>>>>>>> fb785cbb (Initial commit)
	 *
	 * @since 4.7.0
	 */
	public function init() {
		add_filter( 'locale', array( $this, 'filter_locale' ) );
<<<<<<< HEAD
		add_filter( 'determine_locale', array( $this, 'filter_locale' ) );
=======
>>>>>>> fb785cbb (Initial commit)
	}

	/**
	 * Switches the translations according to the given locale.
	 *
	 * @since 4.7.0
	 *
<<<<<<< HEAD
	 * @param string    $locale  The locale to switch to.
	 * @param int|false $user_id Optional. User ID as context. Default false.
	 * @return bool True on success, false on failure.
	 */
	public function switch_to_locale( $locale, $user_id = false ) {
=======
	 * @param string $locale The locale to switch to.
	 * @return bool True on success, false on failure.
	 */
	public function switch_to_locale( $locale ) {
>>>>>>> fb785cbb (Initial commit)
		$current_locale = determine_locale();
		if ( $current_locale === $locale ) {
			return false;
		}

		if ( ! in_array( $locale, $this->available_languages, true ) ) {
			return false;
		}

<<<<<<< HEAD
		$this->stack[] = array( $locale, $user_id );
=======
		$this->locales[] = $locale;
>>>>>>> fb785cbb (Initial commit)

		$this->change_locale( $locale );

		/**
		 * Fires when the locale is switched.
		 *
		 * @since 4.7.0
<<<<<<< HEAD
		 * @since 6.2.0 The `$user_id` parameter was added.
		 *
		 * @param string    $locale  The new locale.
		 * @param false|int $user_id User ID for context if available.
		 */
		do_action( 'switch_locale', $locale, $user_id );
=======
		 *
		 * @param string $locale The new locale.
		 */
		do_action( 'switch_locale', $locale );
>>>>>>> fb785cbb (Initial commit)

		return true;
	}

	/**
<<<<<<< HEAD
	 * Switches the translations according to the given user's locale.
	 *
	 * @since 6.2.0
	 *
	 * @param int $user_id User ID.
	 * @return bool True on success, false on failure.
	 */
	public function switch_to_user_locale( $user_id ) {
		$locale = get_user_locale( $user_id );
		return $this->switch_to_locale( $locale, $user_id );
	}

	/**
=======
>>>>>>> fb785cbb (Initial commit)
	 * Restores the translations according to the previous locale.
	 *
	 * @since 4.7.0
	 *
	 * @return string|false Locale on success, false on failure.
	 */
	public function restore_previous_locale() {
<<<<<<< HEAD
		$previous_locale = array_pop( $this->stack );
=======
		$previous_locale = array_pop( $this->locales );
>>>>>>> fb785cbb (Initial commit)

		if ( null === $previous_locale ) {
			// The stack is empty, bail.
			return false;
		}

<<<<<<< HEAD
		$entry  = end( $this->stack );
		$locale = is_array( $entry ) ? $entry[0] : false;
=======
		$locale = end( $this->locales );
>>>>>>> fb785cbb (Initial commit)

		if ( ! $locale ) {
			// There's nothing left in the stack: go back to the original locale.
			$locale = $this->original_locale;
		}

		$this->change_locale( $locale );

		/**
		 * Fires when the locale is restored to the previous one.
		 *
		 * @since 4.7.0
		 *
		 * @param string $locale          The new locale.
		 * @param string $previous_locale The previous locale.
		 */
<<<<<<< HEAD
		do_action( 'restore_previous_locale', $locale, $previous_locale[0] );
=======
		do_action( 'restore_previous_locale', $locale, $previous_locale );
>>>>>>> fb785cbb (Initial commit)

		return $locale;
	}

	/**
	 * Restores the translations according to the original locale.
	 *
	 * @since 4.7.0
	 *
	 * @return string|false Locale on success, false on failure.
	 */
	public function restore_current_locale() {
<<<<<<< HEAD
		if ( empty( $this->stack ) ) {
			return false;
		}

		$this->stack = array( array( $this->original_locale, false ) );
=======
		if ( empty( $this->locales ) ) {
			return false;
		}

		$this->locales = array( $this->original_locale );
>>>>>>> fb785cbb (Initial commit)

		return $this->restore_previous_locale();
	}

	/**
	 * Whether switch_to_locale() is in effect.
	 *
	 * @since 4.7.0
	 *
	 * @return bool True if the locale has been switched, false otherwise.
	 */
	public function is_switched() {
<<<<<<< HEAD
		return ! empty( $this->stack );
	}

	/**
	 * Returns the locale currently switched to.
	 *
	 * @since 6.2.0
	 *
	 * @return string|false Locale if the locale has been switched, false otherwise.
	 */
	public function get_switched_locale() {
		$entry = end( $this->stack );

		if ( $entry ) {
			return $entry[0];
		}

		return false;
	}

	/**
	 * Returns the user ID related to the currently switched locale.
	 *
	 * @since 6.2.0
	 *
	 * @return int|false User ID if set and if the locale has been switched, false otherwise.
	 */
	public function get_switched_user_id() {
		$entry = end( $this->stack );

		if ( $entry ) {
			return $entry[1];
		}

		return false;
=======
		return ! empty( $this->locales );
>>>>>>> fb785cbb (Initial commit)
	}

	/**
	 * Filters the locale of the WordPress installation.
	 *
	 * @since 4.7.0
	 *
	 * @param string $locale The locale of the WordPress installation.
	 * @return string The locale currently being switched to.
	 */
	public function filter_locale( $locale ) {
<<<<<<< HEAD
		$switched_locale = $this->get_switched_locale();
=======
		$switched_locale = end( $this->locales );
>>>>>>> fb785cbb (Initial commit)

		if ( $switched_locale ) {
			return $switched_locale;
		}

		return $locale;
	}

	/**
	 * Load translations for a given locale.
	 *
	 * When switching to a locale, translations for this locale must be loaded from scratch.
	 *
	 * @since 4.7.0
	 *
	 * @global Mo[] $l10n An array of all currently loaded text domains.
	 *
	 * @param string $locale The locale to load translations for.
	 */
	private function load_translations( $locale ) {
		global $l10n;

		$domains = $l10n ? array_keys( $l10n ) : array();

		load_default_textdomain( $locale );

		foreach ( $domains as $domain ) {
<<<<<<< HEAD
			// The default text domain is handled by `load_default_textdomain()`.
=======
>>>>>>> fb785cbb (Initial commit)
			if ( 'default' === $domain ) {
				continue;
			}

<<<<<<< HEAD
			// Unload current text domain but allow them to be reloaded
			// after switching back or to another locale.
			unload_textdomain( $domain, true );
=======
			unload_textdomain( $domain );
>>>>>>> fb785cbb (Initial commit)
			get_translations_for_domain( $domain );
		}
	}

	/**
	 * Changes the site's locale to the given one.
	 *
	 * Loads the translations, changes the global `$wp_locale` object and updates
	 * all post type labels.
	 *
	 * @since 4.7.0
	 *
	 * @global WP_Locale $wp_locale WordPress date and time locale object.
	 *
	 * @param string $locale The locale to change to.
	 */
	private function change_locale( $locale ) {
<<<<<<< HEAD
		global $wp_locale;

		$this->load_translations( $locale );

		$wp_locale = new WP_Locale();
=======
		// Reset translation availability information.
		_get_path_to_translation( null, true );

		$this->load_translations( $locale );

		$GLOBALS['wp_locale'] = new WP_Locale();
>>>>>>> fb785cbb (Initial commit)

		/**
		 * Fires when the locale is switched to or restored.
		 *
		 * @since 4.7.0
		 *
		 * @param string $locale The new locale.
		 */
		do_action( 'change_locale', $locale );
	}
}
