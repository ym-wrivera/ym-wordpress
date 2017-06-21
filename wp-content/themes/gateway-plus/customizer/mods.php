<?php
/**
 * Functions used to implement options
 *
 */

/**
* Get Google Font settings and output font stack
*/
function gateway_plus_fonts() {

  $fonts = array(
      get_theme_mod( 'type-global-font-family', customizer_library_get_default( 'type-global-font-family' ) ),
      get_theme_mod( 'type-h1-font-family', customizer_library_get_default( 'type-h1-font-family' ) ),
			get_theme_mod( 'type-h2-font-family', customizer_library_get_default( 'type-h2-font-family' ) ),
			get_theme_mod( 'type-h3-font-family', customizer_library_get_default( 'type-h3-font-family' ) ),
			get_theme_mod( 'type-h4-font-family', customizer_library_get_default( 'type-h4-font-family' ) ),
			get_theme_mod( 'type-h5-font-family', customizer_library_get_default( 'type-h5-font-family' ) ),
			get_theme_mod( 'type-h6-font-family', customizer_library_get_default( 'type-h6-font-family' ) ),
			get_theme_mod( 'type-sitetitle-font-family', customizer_library_get_default( 'type-sitetitle-font-family' ) ),
			get_theme_mod( 'type-sitetagline-font-family', customizer_library_get_default( 'type-sitetagline-font-family' ) ),
			get_theme_mod( 'type-main-menu-font-family', customizer_library_get_default( 'type-main-menu-font-family' ) ),
			get_theme_mod( 'type-widget-title-font-family', customizer_library_get_default( 'type-widget-title-font-family' ) ),
			get_theme_mod( 'type-widget-body-font-family', customizer_library_get_default( 'type-widget-body-font-family' ) ),
			get_theme_mod( 'type-footer-widget-title-font-family', customizer_library_get_default( 'type-footer-widget-title-font-family' ) ),
			get_theme_mod( 'type-footer-widget-body-font-family', customizer_library_get_default( 'type-footer-widget-body-font-family' ) ),
			get_theme_mod( 'type-copyright-font-family', customizer_library_get_default( 'type-copyright-font-family' ) )
  );

  $font_uri = customizer_library_get_google_font_uri( $fonts );

  // Load Google Fonts
  wp_enqueue_style( 'gateway_plus_fonts', $font_uri, array(), null, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'gateway_plus_fonts' );

/**
 * Custom Customizer Style
 */
function gateway_plus_custom_customizer_style() {

	wp_enqueue_style( 'gateway-plus-customizer-style', get_template_directory_uri() . '/customizer/style.css', array(), '', 'all' );
}
add_action( 'customize_controls_enqueue_scripts', 'gateway_plus_custom_customizer_style' );

/**
 * Add postMessage support for site title and description and
 * remove core settings so that we can move them into a custom panel.
 */
function gateway_plus_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_section('colors');

}
add_action( 'customize_register', 'gateway_plus_customize_register' );
