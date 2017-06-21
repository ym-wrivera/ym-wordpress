<?php
/**
 * Gateway functions and definitions
 *
 * @package Gateway
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 748; /* pixels */
}

if ( ! function_exists( 'gateway_content_width' ) ) :
/**
 * Change $content_width for different templates
 */
function gateway_content_width() {
	global $content_width;

	if ( is_page_template( 'template-full.php' ) ) {
		$content_width = 1152;
	} elseif ( is_page_template( 'template-home.php' ) ) {
		$content_width = 1296;
	}
}
add_action( 'template_redirect', 'gateway_content_width' );

endif;


if ( ! function_exists( 'gateway_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gateway_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'gateway', get_template_directory() . '/languages' );

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
	add_image_size( 'gateway-post-image', 365, 365, true );
	add_image_size( 'gateway-page-image', 500, 500, true );
	add_image_size( 'gateway-home', 2560, 1706, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'gateway' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gateway_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
}
endif; // gateway_setup
add_action( 'after_setup_theme', 'gateway_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gateway_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gateway' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'gateway' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'gateway' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'gateway' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'gateway_widgets_init' );


/*----------------------------------------------------*/
/*  Enqueue scripts and styles.
/*----------------------------------------------------*/
function gateway_scripts() {

	wp_enqueue_style( 'gateway-parent-styles', get_stylesheet_uri() );
	wp_enqueue_style( 'gateway-fonts', gateway_fonts(), array(), null );
	wp_enqueue_style( 'gateway-font-awesome', get_template_directory_uri() . '/fonts/css/font-awesome.css' );

	wp_enqueue_script( 'gateway-sticky', get_template_directory_uri() . '/js/gateway.js', array( 'jquery' ), '20150527', true );
	$adminbar = is_admin_bar_showing();
	wp_localize_script( 'gateway-sticky', 'gatewayadminbar', array( $adminbar ) );

	wp_enqueue_script( 'gateway-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130115', true );
	wp_enqueue_script( 'gateway-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gateway_scripts', 10 );

if ( ! function_exists( 'gateway_fonts' ) ) :
/**
 * Register Google fonts
 *
 */
function gateway_fonts() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Quattrocento, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Quattrocento font: on or off', 'gateway' ) ) {
		$fonts[] = 'Quattrocento:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Fanwood Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Fanwood Text font: on or off', 'gateway' ) ) {
		$fonts[] = 'Fanwood Text:400,400italic';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */

	$subset = esc_html_x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'gateway' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}

endif;

if ( ! function_exists( 'gateway_home_header' ) ) :

	function gateway_home_header() {
		if ( ! is_page_template( 'template-home.php' ) || ! has_post_thumbnail() )
			return;

		$featured = wp_get_attachment_image_src( get_post_thumbnail_id(), 'gateway-home' );
		$header_position = esc_attr( get_theme_mod( 'header_position', 'fixed' ) );

		?>
		<style type="text/css" id="gateway-home-header">
			.header-bg {
				background-image: linear-gradient( rgba(0,0,0,0.01), rgba(0,0,0,0.6) ), url( <?php echo esc_url( $featured[0] ); ?> );
			}
			@media screen and ( min-width: 50em ) {
				.header-bg {
					background-attachment: <?php echo $header_position; ?>;
					background-position: top center;
					<?php if ( 'fixed' == $header_position ) { ?>
						background-size: 100% !important;
					<?php } ?>
				}
			}
		</style>
		<?php
	}
	add_action( 'wp_head', 'gateway_home_header', 999 );
endif;


if ( ! function_exists( 'gateway_continue_reading_link' ) ) :
/**
 * Returns an ellipsis and "Continue reading" plus off-screen title link for excerpts
 */
function gateway_continue_reading_link() {
	return '&hellip; <a class="more-link" href="'. esc_url( get_permalink() ) . '">' . sprintf( wp_kses_post( __( 'More <span class="screen-reader-text">%1$s</span>', 'gateway' ) ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>';
}
endif; // gateway_continue_reading_link


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with gateway_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function gateway_auto_excerpt_more( $more ) {
	return gateway_continue_reading_link();
}
add_filter( 'excerpt_more', 'gateway_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function gateway_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= gateway_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'gateway_custom_excerpt_more' );

/**
 * Custom Header support
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer support
 */
require get_template_directory() . '/inc/customizer.php';

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


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
