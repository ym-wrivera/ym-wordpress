<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since 1.0
 * @version 1.0
 */

/**
 * Remove entry header
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );


/**
 * Remove breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );



/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/**
 * Add ACF Flexible Content. See inc/layout.php
 *
 * @uses ym_flexible_content();
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_after_header', 'ym_flexible_content' );



/**
 * Remove 'site-inner' from structural wrap
 */
add_theme_support( 'genesis-structural-wraps', [
		'header',
		'footer-widgets',
		'footer',
	]
);



/**
 * Remove site-inner markup
 */
add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
add_filter( 'genesis_markup_content', '__return_null' );




/**
 * Not using genesis() so the site-inner markup isn't there
 */
get_header();

get_footer();

