<?php
/**
 * YM
 *
 * This file loads assets to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


namespace DevDesigns\YM;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue scripts and styles in scripts-and-styles.php
 */
function enqueue_assets() {

	//$font_cdn_src = 'https://cloud.typography.com/6816494/6497372/css/fonts.css';
	$font_cdn_src = 'https://cloud.typography.com/6816494/7507552/css/fonts.css';

	$google_open_sans = 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800';


	$wistia_api = '//fast.wistia.com/assets/external/E-v1.js';

	wp_enqueue_style(
		'font-cdn',
		$font_cdn_src,
		CHILD_THEME_VERSION
	);

	wp_enqueue_style(
		'google-open-sans',
		$google_open_sans,
		CHILD_THEME_VERSION
	);

	wp_register_style(
		'swiper-css',
		CHILD_THEME_DIR . '/node_modules/swiper/dist/css/swiper.min.css',
		'3.4.1'
	);

	wp_register_style(
		'partials',
		CSS_DIR . '/partials.css',
		CHILD_THEME_VERSION
	);

	wp_register_script(
		'vide-js',
		CHILD_THEME_DIR . '/node_modules/vide/dist/jquery.vide.min.js',
		[ 'jquery' ],
		'0.5.1',
		true
	);

	wp_register_script(
		'tabslet-js',
		CHILD_THEME_DIR . '/node_modules/tabslet/jquery.tabslet.min.js',
		[ 'jquery' ],
		'1.7.3',
		true
	);

	wp_register_script(
		'equal-heights-js',
		CHILD_THEME_DIR . '/node_modules/jquery-match-height/dist/jquery.matchHeight-min.js',
		[],
		'0.7.2',
		true
	);

	wp_register_script(
		'waypoints-js',
		CHILD_THEME_DIR . '/node_modules/waypoints/lib/noframework.waypoints.min.js',
		[],
		'4.0.1',
		true
	);

	wp_register_script(
		'countup-js',
		CHILD_THEME_DIR . '/node_modules/countup.js/dist/countUp.min.js',
		[],
		'1.8.1',
		true
	);

	wp_register_script(
		'swiper-js',
		CHILD_THEME_DIR . '/node_modules/swiper/dist/js/swiper.min.js',
		[],
		'3.4.1',
		true
	);

	wp_register_script(
		'scrollto',
		CHILD_THEME_DIR . '/node_modules/jquery.scrollto/jquery.scrollTo.min.js',
		[ 'jquery' ],
		'2.1.2',
		true
	);

	wp_register_script(
		'localscroll',
		CHILD_THEME_DIR . '/node_modules/jquery.localscroll/jquery.localScroll.min.js',
		[ 'scrollto' ],
		'2.1.2',
		true
	);

	wp_register_script(
		'backstretch',
		CHILD_THEME_DIR . '/node_modules/jquery.backstretch/jquery.backstretch.min.js',
		[ 'jquery' ],
		'2.1.15',
		true
	);

	wp_register_script(
		'eqcss',
		CHILD_THEME_DIR . '/node_modules/eqcss/EQCSS.min.js',
		[],
		'1.5.0',
		true
	);

	wp_register_script(
		'wistia',
		$wistia_api,
		[],
		CHILD_THEME_VERSION,
		true
	);

	wp_register_script(
		'tabs-js',
		CHILD_THEME_DIR . '/dist/js/custom/tabs.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);

	wp_register_script(
		'thumbnail-grid-js',
		CHILD_THEME_DIR . '/dist/js/custom/thumbnail-grid.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);

	wp_register_script(
		'images-loaded',
		CHILD_THEME_DIR . '/node_modules/imagesloaded/imagesloaded.pkgd.min.js',
		[],
		'4.1.1',
		true
	);

	wp_register_script(
		'ityped',
		CHILD_THEME_DIR . '/node_modules/ityped/dist/ityped.min.js',
		[ 'images-loaded' ],
		'0.0.1',
		true
	);

	wp_enqueue_script(
		'app',
		CHILD_THEME_DIR . '/dist/js/custom/app.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);
}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\conditional_assets', 9 );
/**
 * Conditionally enqueue scripts. Broken into separate function to
 * keep the code clean and easy to read.
 */
function conditional_assets() {

	if ( is_page_template( 'page-flexible-content.php' ) || is_front_page() || is_single( [ 'product', 'page' ] ) ) {
		wp_enqueue_script( 'backstretch' );
		wp_enqueue_style( 'partials' );
	}

}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_svg_assets' );
/**
 * Register scripts and stylesheets for svg animations
 */
function register_svg_assets() {

	wp_register_style(
		'custom-stylesheet',
		ANIMATIONS_DIR . '/css/animation.css',
		CHILD_THEME_VERSION
	);


	/**
	 * For svg animations
	 */
	wp_register_script(
		'tweenmax',
		CHILD_THEME_DIR . '/node_modules/gsap/src/minified/TweenMax.min.js',
		[ 'jquery' ],
		false,
		true
	);

	wp_register_script(
		'scrollmagic',
		CHILD_THEME_DIR . '/node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
		[ 'tweenmax' ],
		false,
		true
	);
	wp_register_script(
		'scrollmagic-animation',
		CHILD_THEME_DIR . '/node_modules/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js',
		[ 'scrollmagic' ],
		false,
		true
	);

	// debug only
	//wp_register_script(
	//	'scrollmagicdebug',
	//	CHILD_THEME_DIR . '/node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js',
	//	[ 'tweenmax', 'scrollmagic' ],
	//	false,
	//	true
	//);

	/**
	 * front-page - cards partial
	 */
	wp_register_script(
		'app-svg',
		ANIMATIONS_DIR . '/js/home-app.js',
		[ 'tweenmax', 'scrollmagic', 'scrollmagic-animation' ],
		'1.0.2',
		true
	);
	wp_register_script(
		'app-hover',
		ANIMATIONS_DIR . '/js/home-app-hover.js',
		[ 'tweenmax' ],
		'1.02',
		true
	);


	/**
	 * scroll animation - cards
	 */
	wp_register_script(
		'app-scroll-animations',
		ANIMATIONS_DIR . '/js/scroll-animations-app.js',
		[ 'tweenmax', 'scrollmagic', 'scrollmagic-animation' ],
		'1.0.5',
		true
	);
}



add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\deregister_gen_simple_share_styles' );
/**
 * Deregister stylesheet Genesis Simple Share
 */
function deregister_gen_simple_share_styles() {
	wp_deregister_style( 'genesis-simple-share-plugin-css' );
	wp_dequeue_style( 'genesis-simple-share-plugin-css' );
}


/**
 * Deregister Superfish from Genesis Navigation
 */
function deregister_genesis_superfish() {
	//wp_deregister_script( 'superfish' );
	//wp_deregister_script( 'superfish-args' );

	wp_dequeue_script( 'superfish' );
	wp_dequeue_script( 'superfish-args' );
}


add_filter( 'stylesheet_uri', __NAMESPACE__ . '\cache_buster' );
/**
 * Cache bust the style.css reference.
 *
 * @param $stylesheet_uri
 * @return string
 */
function cache_buster( $stylesheet_uri ) {
	return add_query_arg( 'v', filemtime( get_stylesheet_directory() . '/style.css' ), $stylesheet_uri );
}



add_filter( 'script_loader_tag', __NAMESPACE__ . '\add_async_attribute', 10, 2 );
/**
 * Add async attribute to both wistia scripts
 *
 * @param $tag
 * @param $handle
 * @return array
 */
function add_async_attribute( $tag, $handle ) {
	$async_scripts = [ 'wistia', 'wistia-id' ];

	foreach ( $async_scripts as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}

	return $tag;
}




function print_scripts_styles() {

	$result            = [];
	$result['scripts'] = [];
	$result['styles']  = [];

	// Print all loaded Scripts
	global $wp_scripts;
	foreach ( $wp_scripts->queue as $script ) :
		$result['scripts'][] = $wp_scripts->registered[ $script ]->src . '<br>';
	endforeach;

	// Print all loaded Styles (CSS)
	global $wp_styles;
	foreach ( $wp_styles->queue as $style ) :
		$result['styles'][] = $wp_styles->registered[ $style ]->src . '<br>';
	endforeach;

	return $result;
}


//add_action( 'genesis_footer', function () {
//	echo '<pre>';
//	var_dump( print_scripts_styles() );
//	echo '</pre>';
//} );
