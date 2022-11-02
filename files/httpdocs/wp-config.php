<?php
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
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv("AZURE_MYSQL_DBNAME") );

/** MySQL database username */
define( 'DB_USER', getenv("AZURE_MYSQL_USERNAME") );

/** MySQL database password */
define( 'DB_PASSWORD', getenv("AZURE_MYSQL_PASSWORD") );

/** MySQL hostname */
define( 'DB_HOST', getenv("AZURE_MYSQL_HOST") );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$:xm?r+bG!Hu($?kjp<T7iNgKVCRnVy~F3&o48[8u._POw@dMXlD-!Bvy5]/5LgH' );
define( 'SECURE_AUTH_KEY',  'oNpWDEYm7K2Xy,T]?:#3A<Qvq]#1LlT-DvdREg|2Z9}t55S$zbYw2gg9:WAy$e8h' );
define( 'LOGGED_IN_KEY',    'e+gGsy>^cSChrioE8PX/go)d3[Q*66ABU.~WsR]vZ,L.I*vpINBP8u2vP1.y4j+7' );
define( 'NONCE_KEY',        'of+}8onm80xJ)Cwp4 l`5%V#b/kJvg6IpA !p3s,PXW~? x;+1ZopGN<bP6!xiDK' );
define( 'AUTH_SALT',        'f HS)N(W*eLhYiAe@5OmU9y?Fp.c1*}gmR(5yDT~7Vlh+#SLSPRW-IBl/X:r>>HC' );
define( 'SECURE_AUTH_SALT', 'Y|C^)B]:05He ;h-8rvK}3FSw[}]7?9qY}hqi|ZnbhnR71Dh3~@m#Gx5{t]s$du4' );
define( 'LOGGED_IN_SALT',   'xkq1FLlA._F) 9ez~,dh:B.5t%Hd-> Jc98(PjGcl<$(_,cOMLZ3v[p,=_+FF-El' );
define( 'NONCE_SALT',       '_Nau*kR>eO}huqziMT/#>Yek*F-Wb;BmkxIdSIJ-SdG_EPL%!l/;2|e<kfWbQ$0_' );

/**#@-*/

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
