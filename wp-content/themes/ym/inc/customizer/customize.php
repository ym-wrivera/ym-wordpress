<?php
/**
 * YM
 *
 * This file adds the Customizer additions to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

add_action( 'customize_register', 'ym_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function ym_customizer_register() {
	global $wp_customize;

	$wp_customize->add_setting( 'ym_link_color', array(
			'default'           => ym_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ym_link_color', array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', 'ym' ),
				'label'       => __( 'Link Color', 'ym' ),
				'section'     => 'colors',
				'settings'    => 'ym_link_color',
			) ) );

	$wp_customize->add_setting( 'ym_accent_color', array(
			'default'           => ym_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ym_accent_color', array(
				'description' => __( 'Change the default color for button hovers.', 'ym' ),
				'label'       => __( 'Accent Color', 'ym' ),
				'section'     => 'colors',
				'settings'    => 'ym_accent_color',
			) ) );

}
