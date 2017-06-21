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

namespace DevDesigns\YM\Admin;



add_action( 'init', __NAMESPACE__ . '\add_news_options_page' );
/**
 * Add ACF options page for News custom post type
 */
function add_news_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'         => 'News Archive Options',
			'parent'        => 'edit.php?post_type=news',
			'capability'    => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_resource_center_options_page' );
/**
 * Add ACF options page for Resource custom post type
 */
function add_resource_center_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Resource Center Archive Options',
			'parent'     => 'edit.php?post_type=resource_center',
			'capability' => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_whitepaper_options_page' );
/**
 * Add ACF options page for Whitepaper custom post type
 */
function add_whitepaper_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Whitepaper Archive Options',
			'parent'     => 'edit.php?post_type=whitepapers',
			'capability' => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_webinar_options_page' );
/**
 * Add ACF options page for Webinar custom post type
 */
function add_webinar_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Webinar Archive Options',
			'parent'     => 'edit.php?post_type=webinars',
			'capability' => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_video_options_page' );
/**
 * Add ACF options page for Video custom post type
 */
function add_video_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Video Archive Options',
			'parent'     => 'edit.php?post_type=videos',
			'capability' => 'manage_options',
		] );
	}
}


add_action( 'init', __NAMESPACE__ . '\add_theme_options_page' );
/**
 * Add ACF Theme Options Page
 *
 */
function add_theme_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'title'      => 'YM Options',
			'capability' => 'manage_options',
		] );
	}
}


add_action( 'init', __NAMESPACE__ . '\add_sales_resources_options_page' );
/**
 * Add ACF Theme Options Page Sales Resources
 *
 */
function add_sales_resources_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'title'      => 'Sales Resources Options',
			'parent' => 'edit.php?post_type=sales_resources',
			'capability' => 'manage_options',
		] );
	}
}



add_action( 'init', __NAMESPACE__ . '\add_case_studies_options_page' );
/**
 * Add ACF Theme Options Page Sales Resources
 *
 */
function add_case_studies_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'title'      => 'Case Study Options',
			'parent'     => 'edit.php?post_type=casestudy',
			'capability' => 'manage_options',
		] );
	}
}



add_action( 'init', __NAMESPACE__ . '\add_infographics_options_page' );
/**
 * Add ACF Theme Options Page Sales Resources
 *
 */
function add_infographics_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'title'      => 'Infographics Options',
			'parent'     => 'edit.php?post_type=infographics',
			'capability' => 'manage_options',
		] );
	}
}
