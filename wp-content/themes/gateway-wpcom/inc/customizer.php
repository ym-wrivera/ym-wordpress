<?php
/**
 * Gateway Theme Customizer
 *
 * @package Gateway
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gateway_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_panel( 'gateway_options', array(
		'title'  => esc_html__( 'Theme Options', 'gateway' ),
	) );

	$wp_customize->add_section( 'gateway_general', array(
		'title'  => esc_html__( 'General', 'gateway' ),
		'panel' => 'gateway_options',
	) );

	$wp_customize->add_section( 'gateway_home_page', array(
		'title' => esc_html__( 'Homepage Template', 'gateway' ),
		'panel' => 'gateway_options',
	) );

	$wp_customize->add_setting( 'home_hero_title', array(
		'sanitize_callback'  => 'sanitize_text_field',
		'transport'          => 'postMessage',
	) );

	$wp_customize->add_control( 'home_hero_title', array(
		'label'       => esc_html__( 'Hero Title', 'gateway' ),
		'description' => esc_html__( 'Appears in the header.', 'gateway' ),
		'section'     => 'gateway_home_page',
		'type'        => 'text',
		'priority'    => 2,
	) );

	$wp_customize->add_setting( 'home_hero_content', array(
		'sanitize_callback'  => 'gateway_sanitize_textarea',
		'transport'          => 'postMessage',
	) );

	$wp_customize->add_control( 'home_hero_content', array(
		'label'       => esc_html__( 'Hero Content', 'gateway' ),
		'description' => esc_html__( 'Appears in the header. You may use HTML.', 'gateway' ),
		'section'     => 'gateway_home_page',
		'type'        => 'textarea',
		'priority'    => 2,
	) );

	$wp_customize->add_setting( 'home_page_video', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'home_page_video', array(
		'label'       => esc_html__( 'Video URL', 'gateway' ),
		'description' => esc_html__( 'Appears below the Featured Content.', 'gateway' ),
		'section'     => 'gateway_home_page',
		'type'        => 'text',
		'priority'    => 3,
	) );

	$wp_customize->add_setting( 'home_video_aside', array(
		'sanitize_callback' => 'gateway_sanitize_textarea',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'home_video_aside', array(
		'label'       => esc_html__( 'Video Content', 'gateway' ),
		'description' => esc_html__( 'Appears next to the video. You may use HTML.', 'gateway' ),
		'section'     => 'gateway_home_page',
		'type'        => 'textarea',
		'priority'    => 4,
	) );

	$wp_customize->add_setting( 'header_position', array(
		'sanitize_callback' => 'gateway_sanitize_radio',
		'default'           => 'fixed',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'header_position', array(
		'label'    => esc_html__( 'Header Image Display', 'gateway' ),
		'section'  => 'gateway_general',
		'type'     => 'radio',
		'choices'  => array(
'						fixed'  => esc_html__( 'Fixed &mdash; it stays in place while rest of the page scrolls.', 'gateway' ),
						'scroll' => esc_html__( 'Scroll &mdash; it scrolls along with the rest of the page', 'gateway' ),
					),
		'priority' => 1,
	) );
}
add_action( 'customize_register', 'gateway_customize_register' );

function gateway_sanitize_radio( $input ) {
	if ( ! in_array( $input, array( 'fixed', 'scroll' ) ) ) {
		return 'fixed';
	} else {
		return $input;
	}
}

function gateway_sanitize_textarea( $input ) {
	return wp_kses_post( $input );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gateway_customize_preview_js() {
	wp_enqueue_script( 'gateway-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'gateway_customize_preview_js' );
