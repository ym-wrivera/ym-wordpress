<?php
//Begin Really Simple SSL Load balancing fix
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"] ) && "https" == $_SERVER["HTTP_X_FORWARDED_PROTO"] ) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL

define('WP_ALLOW_MULTISITE', true);
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
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'ym_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'a818cc438bacb02356fb29fa848794b77be300eb80c839acf5d70bcd833efab4');
define('SECURE_AUTH_KEY', 'cea2572646d154c23f77997ab5ba4d530ef381cafaf00365f3bb4d5db31a8b1c');
define('LOGGED_IN_KEY', '82ed0b874c6a1f23faae158d8204e023715c76146fe67aa92cbfac4d664ca136');
define('NONCE_KEY', '9ddfa1fb6ed72dc5eb0f06d305764416705bbc9e776e709c7bcfd6928bb4a351');
define('AUTH_SALT', '97bbc3ccba5d75cfdd8fe308bd825188417ca9d422ae04682abe7124f4f9b703');
define('SECURE_AUTH_SALT', '6e55bc667949e1b07e79d8164b8161cfaf680f30f5a4498c0e5b6d0e913e4285');
define('LOGGED_IN_SALT', 'e963b66def22264d6abed1cb70477013d5bafbfc6a3e1bf6dbb7fb4316d0e724');
define('NONCE_SALT', '72aa01038cdf265e6462e76d0308a0e075b04cf335a28834de24d91bf690ba1b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'wp.ymem.net' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
define( 'SUNRISE', 'on' );
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'direct');


//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_Wordpress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
define( 'WP_MEMORY_LIMIT','96M' );
define ( 'WP_MAX_MEMORY_LIMIT','256M' );
//define('WP_REDIS_PASSWORD','e1443abbb2474936694a7529b9164308ed7318f31f53b8aec7b86dbfc98ce8f7');
