<?php
/**
 * YM
 *
 * This file adds the required CSS to the front end of the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

add_action( 'wp_enqueue_scripts', 'ym_css' );
/**
 * Checks the settings for the link color, and accent color.
 * If any of these value are set the appropriate CSS is output.
 *
 */
function ym_css() {
	$handle       = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$color_link   = get_theme_mod( 'ym_link_color', ym_customizer_get_default_link_color() );
	$color_accent = get_theme_mod( 'ym_accent_color', ym_customizer_get_default_accent_color() );
	$css          = '';

	$css .= ( ym_customizer_get_default_link_color() !== $color_link ) ? sprintf( '
		a,
		.entry-title a::focus,
		.entry-title a::hover,
		.genesis-nav-menu a::focus,
		.genesis-nav-menu a::hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a::focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a::hover,
		.js nav button::focus,
		.js .menu-toggle::focus {
			color: %s;
		}
		
		', $color_link ) : '';

	$css .= ( ym_customizer_get_default_accent_color() !== $color_accent ) ? sprintf( '
		button::focus,
		button::hover,
		input:focus[type="button"],
		input:focus[type="reset"],
		input:focus[type="submit"],
		input:hover[type="button"],
		input:hover[type="reset"],
		input:hover[type="submit"],
		.archive-pagination li a::focus,
		.archive-pagination li a::hover,
		.archive-pagination .active a,
		.button::focus,
		.button::hover,
		.sidebar .enews-widget input[type="submit"] {
			background-color: %s;
			color: %s;
		}
		
		', $color_accent, ym_color_contrast( $color_accent ) ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
