<?php
/**
 * Custom functions for YM child theme
 */


namespace DevDesigns\YM;

use WP_Query;

/**
 * Swap arguments in a sprintf using keys from an associative array.
 *
 * @param string $string %
 * @param string $vars $for_pretty_sprintf
 * @param string $characters
 *
 * @return string
 *
 * $for_pretty_sprintf = [
 *      'your_name'         => 'Matt',
 *      'my_name'           => 'Jim',
 *      'my_age'            => 'old',
 *      'object'            => 'women',
 *      'objective_in_life' => 'write code',
 * ];
 *
 * echo pretty_sprintf( 'Hello %your_name%, my name is %my_name%! I am %my_age%, how old are you? I like %object% and I want to %objective_in_life%!', $for_pretty_sprintf );
 *
 */
function pretty_sprintf( $string, $vars, $characters = '%' ) {
	$temp = [];

	foreach ( $vars as $k => $var ) {
		$temp[ $characters . $k . $characters ] = $var;
	}

	return str_replace( array_keys( $temp ), array_values( $temp ), $string );
}



add_shortcode( 'breadcrumbs', __NAMESPACE__ . '\breadcrumbs_shortcode' );
/**
 * Add breadcrumbs with [breadcrumbs] in widgets or wysiwyg's
 */
function breadcrumbs_shortcode() {
	ob_start();
	genesis_breadcrumb();
	return ob_get_clean();
}


add_shortcode( 'social-icons', __NAMESPACE__ . '\gss_shortcode' );
/**
 * Output genesis simple sharing
 *
 * @return string
 */
function gss_shortcode() {
	global $Genesis_Simple_Share;
	$icons = '';

	if ( function_exists( 'genesis_share_get_icon_output' ) ) {
		$location = uniqid( 'gss-shortcode-' );
		$icons = genesis_share_get_icon_output( $location, $Genesis_Simple_Share->icons );
	}

	return $icons;
}
