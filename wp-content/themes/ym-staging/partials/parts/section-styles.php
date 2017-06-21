<?php
/**
 * Default code for Section Styles field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


/**
 * Can be used in repeater/flexible content or regular field group
 */
$css = get_sub_field( 'section_styles' ) ? : get_field( 'section_styles' );
$add_css = get_sub_field( 'add_section_styles' ) ? : get_field( 'add_section_styles' );

if ( $add_css ) {
	/**
	 * Strictly for section styles
	 */
	$bg = '';

	if ( $css['background_image'] ) {
		$bg = 'url("' . $css['background_image']['url'] . '")';
		$bg .= ' no-repeat ' . $css['background_position'] . '/' . $css['background_style'];
	} else {
		$bg = $css['background_color'] ?: 'transparent';
	}

	$padding = $css['padding'] ? : '';
	$margin = $css['margin'] ? : '';

	$border_color = $css['border_color'] ? : 'initial';
	$border_style = $css['border_style'] ? : 'initial';
	$border_width = $css['border_width'] ? : 'initial';


	$section_css = '
			' . $ns_class . '.css {
				background: ' . $bg . ';
				margin: ' . $margin . ';
				padding: ' . $padding . ';
				border-color: ' . $border_color . ';
				border-style: ' . $border_style . ';
				border-width: ' . $border_width . ';
			}
		';

	$default_css = $section_css ?: '';
	$section_styles_css = $css ?: '';

}

