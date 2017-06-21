<?php
/**
 * The Contact Us page template file.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


/**
 * Template Name: Contact Us
 * Template Post Type: page
 */

namespace DevDesigns\YM;



/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );



add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class( $classes ) {
	return array_merge( $classes, [ 'contact-us' ] );
}


/**
 * Remove Breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


/**
 * Remove Entry Header
 */
remove_all_actions( 'genesis_entry_header' );


add_action( 'genesis_after_header', __NAMESPACE__ . '\add_banner_image' );
/**
 * Add banner image below header
 */
function add_banner_image() {
	if ( get_field( 'add_hero' ) ) :
		get_template_part( 'partials/parts/hero', 'group' );
	endif;
}




add_action( 'genesis_after_loop', __NAMESPACE__ . '\add_form' );
/**
 * Output signup form
 */
function add_form() {
	if ( ! get_field( 'add_contact_form' ) ) {
		return;
	}

	$form_object = get_field( 'contact_form' );
	gravity_form_enqueue_scripts( $form_object['id'], true );

	echo '<div class="signup-form">';
	gravity_form( $form_object['id'], false, true, false, '', true, 1 );
	echo '</div>';



	$form_bg_color = get_field( 'form_bg_color' ) ? : '#f4f4f4';
	$form_button_color = get_field( 'form_button_color' ) ? : '#c1ce20';
	$form_button_hover_color = get_field( 'form_button_hover_color' ) ? : '#a4af1b';

	/**
	 * Vertical offset value to ovelay form on hero
	 */
	$form_offset = get_field( 'form_offset' ) ? : '-200px';

	$custom_css = '

			.signup-form .gform_wrapper {
				transform: translateY(-150px);
			}
				
			@media (min-width: 75em) {
				.signup-form .gform_wrapper {
					transform: translateY( ' . $form_offset . ');
				}
			}
			.signup-form .gform_wrapper form {
                background-color: ' . $form_bg_color . ';
            }
            
			.signup-form .gform_wrapper form .gform_footer input {
                background-color: ' . $form_button_color . ';
            }

			.signup-form .gform_wrapper form .gform_footer input:hover,
			.signup-form .gform_wrapper form .gform_footer input:focus {
                background-color: ' . $form_button_hover_color . ';
            }
            
		';



	wp_enqueue_style( 'partials' );

	wp_add_inline_style( 'partials', $custom_css );

}



genesis();
