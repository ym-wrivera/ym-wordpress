<?php
/**
 * Jetpack Compatibility File
 * @link http://jetpack.me/
 *
 */

/**
 * Add theme support for Infinite Scroll.
 * @link http://jetpack.me/support/infinite-scroll/
 *
 */
function gateway_plus_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
		'render'    => 'gateway_plus_infinite_scroll_render',
		'wrapper'	=> false,
	) );
}
add_action( 'after_setup_theme', 'gateway_plus_jetpack_setup' );

function gateway_plus_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}




