<?php
/**
 * yourmembership functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package yourmembership
 */

if ( ! function_exists( 'yourmembership_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(array(
			'page_title' 	=> 'YM Options',
			'menu_title'	=> 'YM Options',
			'menu_slug' 	=> 'ym-options',
	));

}


function yourmembership_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on yourmembership, use a find and replace
	 * to change 'yourmembership' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'yourmembership', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'yourmembership' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );


}
endif; // yourmembership_setup
add_action( 'after_setup_theme', 'yourmembership_setup' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yourmembership_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yourmembership' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yourmembership_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yourmembership_scripts() {

	if ( !is_admin() ):
		wp_enqueue_style( 'googleFonts' , 'http://fonts.googleapis.com/css?family=Lato:400,300,700,900');
		wp_enqueue_style( 'fontawesome' , '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
		wp_enqueue_style( 'bootstrap' , '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
		wp_enqueue_style( 'owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css' );
		wp_enqueue_style( 'bxslider', get_template_directory_uri().'/css/bxslider-custom.css' );

		wp_enqueue_style( 'yourmembership', get_stylesheet_uri() );
		wp_enqueue_style( 'ym', get_template_directory_uri().'/css/ym-original.css' );
		// wp_enqueue_style( 'mobileboot', get_template_directory_uri().'/css/mobile-boot.css' );



		wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'bxslider', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'mobile', get_template_directory_uri().'/js/jquery.mobile.custom.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'modernizr_grid', get_template_directory_uri().'/js/modernizr.custom-grid.js', array('jquery'), '', true );
		wp_enqueue_script( 'grid', get_template_directory_uri().'/js/grid.js', array('jquery'), '', true );
		wp_enqueue_script( 'main_original', get_template_directory_uri().'/js/main.js', array('jquery'), '', true );
		wp_enqueue_script( 'yourmembership', get_template_directory_uri().'/js/global.js', array('jquery'), '', true );
    wp_enqueue_script( 'pardotgatracking', get_template_directory_uri().'/js/pgaet.js', array('jquery'), '', true );

		// Steps component - Buying Guide
		if (is_page( 6231 )) {
			wp_enqueue_style( 'steps-component', get_template_directory_uri().'/css/steps-component.css' );
			wp_enqueue_script( 'modernizr-steps-guide', get_template_directory_uri().'/js/modernizr.custom-steps-guide.js', array('jquery'), '' );
			wp_enqueue_script( 'easing', get_template_directory_uri().'/js/jquery.easing.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'waypoints', get_template_directory_uri().'/js/waypoints.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'debouncedresize', get_template_directory_uri().'/js/jquery.debouncedresize.js', array('jquery'), '', true );
			wp_enqueue_script( 'inview', get_template_directory_uri().'/js/jquery.inview.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'scrolllayout', get_template_directory_uri().'/js/cbpFixedScrollLayout.min.js', array('jquery'), '', true );

		}




	endif;

}
add_action( 'wp_enqueue_scripts', 'yourmembership_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/**
 * Make the login page purty
 */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// Custom Post Types
function my_custom_post_press() {
  $labels = array(
    'name'               => _x( 'Press Releases', 'post type general name' ),
    'singular_name'      => _x( 'Press Release', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Press Release' ),
    'edit_item'          => __( 'Edit Press Release' ),
    'new_item'           => __( 'New Press Release' ),
    'all_items'          => __( 'All Press Releases' ),
    'view_item'          => __( 'View Press Releases' ),
    'search_items'       => __( 'Search Press Releases' ),
    'not_found'          => __( 'No Press Releases found' ),
    'not_found_in_trash' => __( 'No Press Releases found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Press Releases'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our press releases',
    'public'        => true,
    'menu_position' => 5,
    'rewrite'            => array( 'slug' => 'news' ),
	'capability_type' => 'page',
	'hierarchical' => false,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'has_archive'   => true,
  );
  register_post_type( 'press-releases', $args ); 
}
add_action( 'init', 'my_custom_post_press' );
flush_rewrite_rules();


function my_custom_post_articles() {
  $labels = array(
    'name'               => _x( 'Articles', 'post type general name' ),
    'singular_name'      => _x( 'Article', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Article' ),
    'edit_item'          => __( 'Edit Article' ),
    'new_item'           => __( 'New Article' ),
    'all_items'          => __( 'All Articles' ),
    'view_item'          => __( 'View Articles' ),
    'search_items'       => __( 'Search Articles' ),
    'not_found'          => __( 'No Articles found' ),
    'not_found_in_trash' => __( 'No Articles found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Articles'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our articles',
    'public'        => true,
    'menu_position' => 5,
    'rewrite'            => array( 'slug' => 'articles' ),
	'capability_type' => 'page',
	'hierarchical' => false,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'has_archive'   => true,
  );
  register_post_type( 'articles', $args ); 
}
add_action( 'init', 'my_custom_post_articles' );
flush_rewrite_rules();

add_action( 'init', 'my_new_default_post_type', 1 );
function my_new_default_post_type() {
 
    register_post_type( 'post', array(
        'labels' => array(
            'name_admin_bar' => _x( 'Post', 'add new on admin bar' ),
        ),
        'menu_position' => 4,
        'public'  => true,
        '_builtin' => false, 
        '_edit_link' => 'post.php?post=%d', 
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'blog' ),
        'query_var' => false,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
    ) );
}


add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
remove_menu_page('edit.php');
}


//Clean that header
add_filter('show_admin_bar', '__return_false');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'feed_links' );
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link

function remove_recent_comment_style() {
	global $wp_widget_factory;
	remove_action( 
            'wp_head', 
            array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) 
        );
}
add_action( 'widgets_init', 'remove_recent_comment_style' );



function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );



//Custom loop shortcode for homepage feed
function custom_query_shortcode($atts) {

   // EXAMPLE USAGE:
   // [loop the_query="showposts=100&post_type=page&post_parent=453"]
   
   // Defaults
   extract(shortcode_atts(array(
      "the_query" => ''
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

   // query is made               
   query_posts($the_query);
   
   // Reset and setup variables
   $output = '';
   $temp_title = '';
   $temp_link = '';
   $temp_date = '';
   
   // the loop
   if (have_posts()) : while (have_posts()) : the_post();
   
      $temp_title = get_the_title($post->ID);
      $temp_link = get_permalink($post->ID);
      $temp_date = get_the_time('m.d.Y');
      
      // output all findings - CUSTOMIZE TO YOUR LIKING
      $output .= "<li><a href='$temp_link'>$temp_title</a><div class='date'>$temp_date</div></li>";
          
   endwhile; else:
   
      $output .= "nothing found.";
      
   endif;
   
   wp_reset_query();
   return $output;
   
}
add_shortcode("loop", "custom_query_shortcode");