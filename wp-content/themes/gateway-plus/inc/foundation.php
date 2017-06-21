<?php 

/**
 * Foundation Setup
 */
if ( ! function_exists( 'gateway_plus_enqueue_foundation' ) ) :

	function gateway_plus_enqueue_foundation() {
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/inc/normalize.css', array(), '3.0.3', 'all' );
		wp_enqueue_style( 'gateway-plus-foundation-style', get_template_directory_uri() . '/app.css' );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/foundation/vendor/modernizr.js', array( 'jquery' ), '2.8.3', true );
		wp_enqueue_script( 'gateway-plus-foundation', get_template_directory_uri() . '/js/foundation/foundation.js', array( 'modernizr', 'jquery' ), '5.5.2', true );
		wp_enqueue_script( 'gateway-plus-foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', array( 'modernizr', 'gateway-plus-foundation', 'jquery' ), '5.5.2', true );
	}

endif; // gateway_plus_enqueue_foundation
add_action( 'wp_enqueue_scripts', 'gateway_plus_enqueue_foundation', 10 );

if ( ! function_exists( 'gateway_plus_admin_bar_nav' ) ) :

	// Fixes admin bar overlap
	function gateway_plus_admin_bar_nav() {
	  if ( is_admin_bar_showing() ) { ?>
	    <style>
	    .fixed { margin-top: 32px; } 
	    @media screen and (max-width: 600px){
	    	.fixed { margin-top: 46px; } 
	    	#wpadminbar { position: fixed !important; }
	    }
	    </style>
	  <?php }
	}

endif; // gateway_plus_admin_bar_nav
add_action('wp_head', 'gateway_plus_admin_bar_nav');

/**
 * Foundation Navigation
 * @link http://goo.gl/mTkWbg
 *
 */
class gateway_plus_foundation_walker extends Walker_Nav_Menu {
 
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $element->has_children = !empty($children_elements[$element->ID]);
        $element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
        $element->classes[] = ($element->has_children) ? 'has-dropdown' : '';
 
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
 
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }
 
} // end gateway_plus_foundation_walker