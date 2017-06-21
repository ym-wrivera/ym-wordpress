<?php
/**
 * YM
 *
 * This file adds functions to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

namespace DevDesigns\YM;

/**
 * Define child theme constants
 */
use WP_Query;

define( 'CHILD_THEME_NAME', 'YM' );
define( 'CHILD_THEME_URL', 'http://www.yourmembership.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );
define( 'CHILD_THEME_DIR', get_stylesheet_directory_uri() );
define( 'CSS_DIR', get_stylesheet_directory_uri() . '/dist/css' );
define( 'JS_DIR', get_stylesheet_directory_uri() . '/dist/js/custom' );
define( 'VENDOR_JS_DIR', get_stylesheet_directory_uri() . '/dist/js/vendor' );

define( 'ANIMATIONS_DIR', get_stylesheet_directory_uri() . '/dist/animations' );


/**
 * Load em' up. See 'inc/genesis.php' for additional includes
 */
require_once __DIR__ . '/inc/customizer/helper-functions.php';
require_once __DIR__ . '/inc/customizer/customize.php';
include_once __DIR__ . '/inc/customizer/output.php';
require_once __DIR__ . '/inc/assets.php';
require_once __DIR__ . '/inc/widgets.php';
require_once __DIR__ . '/inc/genesis.php';


/**
 * Add oembed support for wistia
 */
wp_oembed_add_provider( '/https?:\/\/(.+)?(wistia.com|wi.st)\/(medias|embed)\/.*/', 'http://fast.wistia.com/oembed', true );


/**
 * Allow CORS
 */
 add_action( 'send_headers', function() {
 	if ( ! did_action('rest_api_init') && $_SERVER['REQUEST_METHOD'] == 'HEAD' ) {
 		header( 'Access-Control-Allow-Origin: *' );
 		header( 'Access-Control-Expose-Headers: Link' );
 		header( 'Access-Control-Allow-Methods: HEAD' );
 	}
 } );


// @todo finish remaining tasks this afternoon