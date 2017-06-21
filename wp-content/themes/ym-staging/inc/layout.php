<?php
/**
 * YM
 *
 * This file adds modifications to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


/**
 * Output utility menu before the header
 */
add_action( 'genesis_before_header', function () {
	if ( ! has_nav_menu( 'header_utility' ) ) {
		return;
	}

	echo '<div class="before-header"><div class="wrap">';

	wp_nav_menu( [
		'theme_location' => 'header_utility',
		'container_class' => 'genesis-nav-menu',
		]
	);

	echo '</div></div>';
} );


add_filter( 'genesis_seo_title', 'ym_custom_logo', 10, 3 );
/**
 * Add an image inline in the site title element for the main logo
 *
 * The custom logo is then added via the Customiser
 *
 * @param string $title  All the mark up title.
 * @param string $inside Mark up inside the title.
 * @param string $wrap   Mark up on the title.
 *
 * @author @_AlphaBlossom
 * @author @_neilgee
 */
function ym_custom_logo( $title, $inside, $wrap ) {
	// Check to see if the Custom Logo function exists and set what goes inside the wrapping tags.
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
		$mobile_logo = '<img src="/wp-content/themes/ym/dist/images/small-logo.svg" width="49" height="57" class="custom-logo" alt="YourMembership" itemprop="logo">';
		$desktop_logo = '<img src="/wp-content/themes/ym/dist/images/desktop-logo.svg" width="180" height="80" class="desktop-logo" alt="YourMembership">';

		$logo = $desktop_logo . $mobile_logo;

		//$logo = the_custom_logo();
	else :
		$logo = get_bloginfo( 'name' );
	endif;
	// Use this wrap if no custom logo - wrap around the site name
	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
	// Determine which wrapping tags to use - changed is_home to is_front_page to fix Genesis bug.
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	// A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug.
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	// And finally, $wrap in h1 if HTML5 & semantic headings enabled.
	$wrap  = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	$title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );

	return $title;
}



add_filter( 'genesis_attr_site-description', 'ym_add_site_description_class' );
/**
 * Add class for screen readers to site description.
 * This will keep the site description mark up but will not have any visual presence on the page
 * This runs if their is a header image set in the Customiser.
 *
 * @param string $attributes Add screen reader class if custom logo is set.
 *
 * @author @_neilgee
 */
function ym_add_site_description_class( $attributes ) {
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$attributes['class'] .= ' screen-reader-text';

		return $attributes;
	} else {
		return $attributes;
	}
}


add_action( 'genesis_theme_settings_metaboxes', 'ym_remove_metaboxes' );
/**
 * Removing custom title/logo metabox from Genesis theme options page.
 * See http://www.billerickson.net/code/remove-metaboxes-from-genesis-theme-settings/
 * Updated to use $_genesis_admin_settings instead of legacy variable in Bill's example.
 *
 * @param $_genesis_admin_settings
 */
function ym_remove_metaboxes( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
}


add_action( 'customize_register', 'ym_theme_customize_register', 99 );
/**
 * Removing custom title/logo metabox from Genesis customizer
 * See https://developer.wordpress.org/themes/advanced-topics/customizer-api/
 *
 * @param $wp_customize
 */
function ym_theme_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'blog_title' );

}


/**
 * Output footer top widget
 */
add_action( 'genesis_before_footer', function () {
	if ( ! is_active_sidebar( 'footer-top' ) ) {
		return;
	}

	echo '<section class="footer-top"><div class="wrap"><div class="flex-wrap">';

	dynamic_sidebar( 'footer-top' );

	echo '</div></div></section>';


}, 9 );


add_filter( 'genesis_structural_wrap-footer-widgets', 'ym_add_inner_wrap_to_footer_widgets', 10, 2 );
/**
 * Filter the footer-widgets context of the genesis_structural_wrap
 * to add a div before the closing wrap div.
 *
 * @param    string $output          The markup to be returned
 * @param    string $original_output Set to either 'open' or 'close'
 *
 * @return  string    The footer markup
 */
function ym_add_inner_wrap_to_footer_widgets( $output, $original_output ) {
	if ( 'open' === $original_output ) {
		$output .= '<div class="flex-wrap">';
	} elseif ( 'close' === $original_output ) {
		$output = '</div>' . $output;
	}

	return $output;
}



remove_action( 'genesis_footer', 'genesis_do_footer' );
/**
 * Output footer bottom widget
 */
add_action( 'genesis_footer', function () {
	if ( ! is_active_sidebar( 'footer-bottom' ) ) {
		return;
	}

	echo '<div class="flex-wrap">';

	dynamic_sidebar( 'footer-bottom' );

	echo '</div>';

} );


/**
 * Force content-sidebar layout setting to all singular pages
 */
add_action( 'get_header', function () {
	if ( is_singular( 'news' ) || is_post_type_archive( 'news' ) ) {
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
	}
} );


/*
 * Remove page titles from all singular pages
 */
add_action( 'loop_start', function () {
	if ( is_singular( [ 'post', 'page' ] ) ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
} );



/**
 * Function displaying Flexible Content Fields
 */
function ym_flexible_content() {

	while ( have_rows( 'flexible_content' ) ) : the_row();

		if ( get_row_layout() === 'hero' ) {
			get_template_part( 'partials/hero', 'content-block' );
		} elseif ( get_row_layout() === 'cards' ) {
			get_template_part( 'partials/cards', 'content-block' );
		} elseif ( get_row_layout() === 'content' ) {
			get_template_part( 'partials/content', 'content-block' );
		} elseif ( get_row_layout() === 'statistics' ) {
			get_template_part( 'partials/statistics', 'content-block' );
		} elseif ( get_row_layout() === 'video' ) {
			get_template_part( 'partials/video', 'content-block' );
		} elseif ( get_row_layout() === 'logo_slider' ) {
			get_template_part( 'partials/logo', 'content-block' );
		} elseif ( get_row_layout() === 'content_and_image' ) {
			get_template_part( 'partials/content-image', 'content-block' );
		} elseif ( get_row_layout() === 'heading_block' ) {
			get_template_part( 'partials/heading', 'content-block' );
		} elseif ( get_row_layout() === 'half_content_bg' ) {
			get_template_part( 'partials/half-content-full-bg', 'content-block' );
		} elseif ( get_row_layout() === 'full_width_image' ) {
			get_template_part( 'partials/full-width-image', 'content-block' );
		} elseif ( get_row_layout() === 'multiple_content_blocks' ) {
			get_template_part( 'partials/multiple-content', 'content-block' );
		} elseif ( get_row_layout() === 'sprinkles_overlay' ) {
			get_template_part( 'partials/sprinkles-overlay', 'content-block' );
		} elseif ( get_row_layout() === 'slider' ) {
			get_template_part( 'partials/slider', 'content-block' );
		} elseif ( get_row_layout() === 'three_columns' ) {
			get_template_part( 'partials/three-columns', 'content-block' );
		} elseif ( get_row_layout() === 'tabs' ) {
			get_template_part( 'partials/tabs', 'content-block' );
		} elseif ( get_row_layout() === 'icon_boxes' ) {
			get_template_part( 'partials/icon-boxes', 'content-block' );
		} elseif ( get_row_layout() === 'slider_content' ) {
			get_template_part( 'partials/slider-content', 'content-block' );
		} elseif ( get_row_layout() === 'gallery' ) {
			get_template_part( 'partials/gallery', 'content-block' );
		} elseif ( get_row_layout() === 'full_width_content' ) {
			get_template_part( 'partials/full-width-content', 'content-block' );
		}

	endwhile;

}

