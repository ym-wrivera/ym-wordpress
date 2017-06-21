<?php
/**
 * ACF Flexible Content template
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */

/**
 * Template Name: Flexible Content
 * Template Post Type: page, product, event
 */



/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'flexible-content-template';
	return $classes;
} );



/**
 * Remove entry header
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );



/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );



/**
 * Remove breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );



/**
 * Add ACF Flexible Content. See inc/layout.php
 *
 * @uses ym_flexible_content();
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_after_header', 'ym_flexible_content' );



genesis();
