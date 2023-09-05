<?php
<<<<<<< HEAD
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
=======
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
>>>>>>> fb785cbb (Initial commit)
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
<<<<<<< HEAD
 * @link https://wordpress.org/support/article/editing-wp-config-php/
=======
 * @link https://codex.wordpress.org/Editing_wp-config.php
>>>>>>> fb785cbb (Initial commit)
 *
 * @package WordPress
 */

<<<<<<< HEAD
//Using environment variables for memory limits
$wp_memory_limit = (getenv('WP_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MEMORY_LIMIT'))) ? getenv('WP_MEMORY_LIMIT') : '128M';
$wp_max_memory_limit = (getenv('WP_MAX_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MAX_MEMORY_LIMIT'))) ? getenv('WP_MAX_MEMORY_LIMIT') : '256M';

/** General WordPress memory limit for PHP scripts*/
define('WP_MEMORY_LIMIT', $wp_memory_limit );

/** WordPress memory limit for Admin panel scripts */
define('WP_MAX_MEMORY_LIMIT', $wp_max_memory_limit );


//Using environment variables for DB connection information

// ** Database settings - You can get this info from your web host ** //
$connectstr_dbhost = getenv('AZURE_MYSQL_HOST');
$connectstr_dbname = getenv('AZURE_MYSQL_DBNAME');
$connectstr_dbusername = getenv('AZURE_MYSQL_USERNAME');
$connectstr_dbpassword = getenv('AZURE_MYSQL_PASSWORD');

/** The name of the database for WordPress */
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD',$connectstr_dbpassword);

/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
=======
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'restoringpride' );

/** MySQL database username */
define( 'DB_USER', 'rp_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'gh9,Gh)z-G+c8?YL' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
>>>>>>> fb785cbb (Initial commit)

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

<<<<<<< HEAD
/** Enabling support for connecting external MYSQL over SSL*/
$mysql_sslconnect = (getenv('DB_SSL_CONNECTION')) ? getenv('DB_SSL_CONNECTION') : 'true';
if (strtolower($mysql_sslconnect) != 'false' && !is_numeric(strpos($connectstr_dbhost, "127.0.0.1")) && !is_numeric(strpos(strtolower($connectstr_dbhost), "localhost"))) {
        define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);
}


=======
>>>>>>> fb785cbb (Initial commit)
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
<<<<<<< HEAD

$auth_key = getenv('AUTH_KEY');
define( 'AUTH_KEY',         $auth_key );
$secure_auth_key = getenv('SECURE_AUTH_KEY');
define( 'SECURE_AUTH_KEY',  $secure_auth_key );
$logger_in_key = getenv('LOGGED_IN_KEY');
define( 'LOGGED_IN_KEY',  $logger_in_key   );
$nonce_key = getenv('NONCE_KEY');
define( 'NONCE_KEY',   $nonce_key      );
$auth_salt = getenv('AUTH_SALT');
define( 'AUTH_SALT',    $auth_salt     );
=======
define( 'AUTH_KEY',         '$:xm?r+bG!Hu($?kjp<T7iNgKVCRnVy~F3&o48[8u._POw@dMXlD-!Bvy5]/5LgH' );
define( 'SECURE_AUTH_KEY',  'oNpWDEYm7K2Xy,T]?:#3A<Qvq]#1LlT-DvdREg|2Z9}t55S$zbYw2gg9:WAy$e8h' );
define( 'LOGGED_IN_KEY',    'e+gGsy>^cSChrioE8PX/go)d3[Q*66ABU.~WsR]vZ,L.I*vpINBP8u2vP1.y4j+7' );
define( 'NONCE_KEY',        'of+}8onm80xJ)Cwp4 l`5%V#b/kJvg6IpA !p3s,PXW~? x;+1ZopGN<bP6!xiDK' );
define( 'AUTH_SALT',        'f HS)N(W*eLhYiAe@5OmU9y?Fp.c1*}gmR(5yDT~7Vlh+#SLSPRW-IBl/X:r>>HC' );
define( 'SECURE_AUTH_SALT', 'Y|C^)B]:05He ;h-8rvK}3FSw[}]7?9qY}hqi|ZnbhnR71Dh3~@m#Gx5{t]s$du4' );
define( 'LOGGED_IN_SALT',   'xkq1FLlA._F) 9ez~,dh:B.5t%Hd-> Jc98(PjGcl<$(_,cOMLZ3v[p,=_+FF-El' );
define( 'NONCE_SALT',       '_Nau*kR>eO}huqziMT/#>Yek*F-Wb;BmkxIdSIJ-SdG_EPL%!l/;2|e<kfWbQ$0_' );

/**#@-*/

>>>>>>> fb785cbb (Initial commit)
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
<<<<<<< HEAD
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */
/**https://developer.wordpress.org/reference/functions/is_ssl/ */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
        $_SERVER['HTTPS'] = 'on';

$http_protocol='http://';
if (!preg_match("/^localhost(:[0-9])*/", $_SERVER['HTTP_HOST']) && !preg_match("/^127\.0\.0\.1(:[0-9])*/", $_SERVER['HTTP_HOST'])) {
        $http_protocol='https://';
}

//Relative URLs for swapping across app service deployment slots
define('WP_HOME', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __FILE__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
=======
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
>>>>>>> fb785cbb (Initial commit)
