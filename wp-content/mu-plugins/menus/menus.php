<?php
/**
 * Theme menu functions
 */

add_action( 'init', 'menus_create' );
/**
 * Register Navigation Menus
 */
function menus_create() {
	$locations = [
		'header_utility' => __( 'Header Utility', 'ym' ),
		'footer_utility' => __( 'Footer Utility', 'ym' ),
		'primary' => __( 'Primary', 'ym' ),
		'social' => __( 'Social Media', 'ym' ),
	];

	register_nav_menus( $locations );
}


/**
 * Unregister secondary navigation
 */
add_action( 'init', function () {
	unregister_nav_menu( 'secondary' );
} );

