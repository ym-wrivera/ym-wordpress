<?php
/**
 * Gateway Plus functions and definitions
 *
 */

/**
 * Load theme updater functions.
 */
function gateway_plus_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'gateway_plus_updater' );


if ( ! function_exists( 'gateway_plus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gateway_plus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'gateway-plus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'gateway-plus-post-image', 365, 365, true );
	add_image_size( 'gateway-plus-page-image', 500, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gateway-plus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gateway_plus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Woocommerce Support
	 */
    add_theme_support( 'woocommerce' );

}
endif; // gateway-plus_setup
add_action( 'after_setup_theme', 'gateway_plus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gateway_plus_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 1200 );
}
add_action( 'after_setup_theme', 'gateway_plus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gateway_plus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Inner Sidebar', 'gateway-plus' ),
		'id'            => 'inner-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Hero', 'gateway-plus' ),
		'id'            => 'home-hero',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'gateway-plus' ),
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'gateway-plus' ),
		'id'            => 'footer-middle',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'gateway-plus' ),
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'gateway_plus_widgets_init' );

/**
 * Load Foundation files
 */
require get_template_directory() . '/inc/foundation.php';

/*----------------------------------------------------*/
/*  Enqueue scripts and styles.
/*----------------------------------------------------*/
function gateway_plus_scripts() {

	/**
	 * Get the theme's version number for cache busting
	 */
	$gateway_plus = wp_get_theme();

	wp_enqueue_style( 'gateway-plus-parent-styles', get_stylesheet_uri(),  array(), $gateway_plus['Version'] );
	wp_enqueue_style( 'gateway-plus-google-fonts', gateway_plus_google_fonts(), array(), null );

	/**
	 * Handle based on the standardized set
	 * @link https://github.com/grappler/wp-standard-handles
	 */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css', array(), '4.6.1' );

	wp_enqueue_script( 'gateway-plus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '20150623', true );
	wp_enqueue_script( 'gateway-plus-init', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gateway_plus_scripts', 10 );

/**
 * Load Google Fonts
 */
require get_template_directory() . '/fonts/google-fonts.php';

/**
 * Customizer Library
 */
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Info Screen
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/welcome-screen/welcome-screen.php';
}

/**
 * Load Home Hero Slider
 */
require get_template_directory() . '/inc/home-slider.php';
