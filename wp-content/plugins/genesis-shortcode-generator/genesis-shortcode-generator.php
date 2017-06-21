<?php
/**
 * Plugin Name:       Genesis Shortcode Generator
 * Plugin URI:        http://joshmallard.com
 * Description:       Supercharge the possibilities for WordPress content without bombarding users with thousands of options they'll never need or use
 * Version:           2.0.1
 * Author:            Josh Mallard
 * Author URI:        http://joshmallard.com
 * Text Domain:       gingerbeard-shortcodes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


include_once( 'includes/Main.php' );
include_once( 'admin/GingerBeard_Admin.php' );

function genesis_shortcode_generator() {
	new GingerBeard_Main();
}

genesis_shortcode_generator();

function genesis_shortcode_generator_admin() {
	new GingerBeard_Genesis_Shortcodes_Admin();
}

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	genesis_shortcode_generator_admin();
}