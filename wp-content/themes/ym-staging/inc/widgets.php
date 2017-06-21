<?php
/**
 * YM
 *
 * This file adds widgets to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


namespace DevDesigns\YM;


add_action( 'widgets_init', __NAMESPACE__ . '\register_widgets' );
/**
 * Register widgets in widgets.php
 */
function register_widgets() {

	genesis_register_sidebar( [
			'id'          => 'footer-top',
			'name'        => __( 'Footer Top', 'ym' ),
			'description' => __( 'This widget is for the horizontal bar above the footer widgets.', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'footer-bottom',
			'name'        => __( 'Footer Bottom', 'ym' ),
			'description' => __( 'This widget is for the horizontal bar below the footer widgets.', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'news-single-sidebar',
			'name'        => __( 'News Single Sidebar', 'ym' ),
			'description' => __( 'This widget is for the Single News posts', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'news-archive-sidebar',
			'name'        => __( 'News Archive Sidebar', 'ym' ),
			'description' => __( 'This widget is for the News Archive', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'news-after-entry-sidebar',
			'name'        => __( 'News After Entry Sidebar', 'ym' ),
			'description' => __( 'This widget is for the News After Entry Widget Area', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'blog-sidebar',
			'name'        => __( 'Blog Sidebar', 'ym' ),
			'description' => __( 'This widget is for Single Blog Posts', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'blog-archive-sidebar',
			'name'        => __( 'Blog Archive Sidebar', 'ym' ),
			'description' => __( 'This widget is for the Blog Archive', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'mobile-single-post-sidebar',
			'name'        => __( 'Mobile Single Post Sidebar', 'ym' ),
			'description' => __( 'This widget is for mobile devices viewing the Blog posts', 'ym' ),
		]
	);
}



add_action( 'genesis_sidebar', __NAMESPACE__ . '\add_sidebar_blog', 5 );
/**
 * Adds a sidebar to Blog single and archive. Removes primary sidebar
 * as well.
 */
function add_sidebar_blog() {
	if ( ! is_singular( 'post' ) ) { return; }

	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

	dynamic_sidebar( 'blog-sidebar' );
}



add_action( 'genesis_sidebar', __NAMESPACE__ . '\add_sidebar_blog_archive', 5 );
/**
 * Adds a sidebar to Blog single and archive. Removes primary sidebar
 * as well.
 */
function add_sidebar_blog_archive() {
	if ( ! is_home() ) {
		return;
	}

	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

	dynamic_sidebar( 'blog-archive-sidebar' );
}


add_action( 'genesis_sidebar', __NAMESPACE__ . '\add_archive_sidebar_news', 5 );
/**
 *  Hook archive sidebar widget area to the sidebar
 */
function add_archive_sidebar_news() {
	if ( ! is_post_type_archive( 'news' ) ) {
		return;
	}

	//remove_action( 'genesis_sidebar', 'add_sidebar_blog', 5 );
	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

	dynamic_sidebar( 'news-archive-sidebar' );
}



