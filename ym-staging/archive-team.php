<?php
/**
 * The team archive
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


namespace DevDesigns\YM;

use WP_Query;


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_team' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_team( $classes ) {
	$classes[] = 'team-grid';

	return $classes;
}


/**
 * Remove Breadcrumbs to genesis_after_header
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


/**
 * Remove Archive Title and Description
 */
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );


/**
 * Remove standard Genesis elements
 */
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );

remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );






genesis();
