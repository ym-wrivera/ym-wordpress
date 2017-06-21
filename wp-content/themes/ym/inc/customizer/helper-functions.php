<?php
/**
 * YM
 *
 * This file adds the required helper functions used in the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

/**
 * Get default link color for Customizer for the Genesis Sample Theme.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for link color.
 */
function ym_customizer_get_default_link_color() {
	return '#c3251d';
}

/**
 * Get default accent color for Customizer for the Genesis Sample Theme.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for accent color.
 */
function ym_customizer_get_default_accent_color() {
	return '#c3251d';
}

/**
 * Calculate the color contrast for the Genesis Sample Theme.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for contrast color
 */
function ym_color_contrast( $color ) {
	$hexcolor   = str_replace( '#', '', $color );
	$red        = hexdec( substr( $hexcolor, 0, 2 ) );
	$green      = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue       = hexdec( substr( $hexcolor, 4, 2 ) );
	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? '#333333' : '#ffffff';
}

/**
 * Calculate the color brightness for the Genesis Sample Theme.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for the color brightness
 */
function ym_color_brightness( $color, $change ) {
	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );
	$red      = max( 0, min( 255, $red + $change ) );
	$green    = max( 0, min( 255, $green + $change ) );
	$blue     = max( 0, min( 255, $blue + $change ) );

	return '#'.dechex( $red ).dechex( $green ).dechex( $blue );
}
