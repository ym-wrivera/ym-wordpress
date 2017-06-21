<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Gateway
 */

function gateway_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'page',
		'footer_widgets' => array( 'footer-1', 'footer-2', 'footer-3' ),
		'render'         => 'gateway_infinite_scroll_render',
	) );

	/*
	 * Enable support for Responsive Videos.
	 * http://jetpack.me/support/responsive-videos/
	 */
	add_theme_support( 'jetpack-responsive-videos' );

	/*
	 * Enable support for Site Logo.
	 * http://jetpack.me/support/site-logo/
	 */
	add_image_size( 'gateway-site-logo', '300', '300' );
	add_theme_support( 'site-logo', array( 'size' => 'gateway-site-logo' ) );

	/*
	 * Enable support for Featured Content.
	 * http://jetpack.me/support/featured-content/
	 */
	add_theme_support( 'featured-content', array(
		'filter'     => 'gateway_get_featured_posts',
		'max_posts'  => 3,
		'post_types' => array( 'post', 'page' ),
	) );

	/*
	 * Enable support for Excerpts on Pages since Featured Content is enabled for Pages.
	 * See http://codex.wordpress.org/Excerpt
	 */
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'gateway_jetpack_setup' );

function gateway_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}

function gateway_get_featured_posts() {
    return apply_filters( 'gateway_get_featured_posts', array() );
}

function gateway_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;

    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'gateway_get_featured_posts', array() );

    if ( ! is_array( $featured_posts ) )
        return false;

    if ( $minimum > count( $featured_posts ) )
        return false;

    return true;
}