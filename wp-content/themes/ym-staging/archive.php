<?php
/**
 * The archive news page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );


/**
 * Remove breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );


/**
 * Remove Entry Footer
 */
remove_all_actions( 'genesis_entry_footer' );

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_news' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_news( $classes ) {


	return array_merge( $classes, [ 'archive-news', 'archive-blog' ] );
}


add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets_videos' );
/**
 * Add facetWP facets after header
 */
function add_facets_videos() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	} ?>

	<div class="facets">
		<div class="wrap">

			<div class="flex-wrap">
				<header class="archive-heading">
					<p>#Onward</p>
					<h1>The YourMembership Blog</h1>
				</header>
				<div class="facet-wrap">
					<?php echo facetwp_display( 'facet', 'blog_category' ) . facetwp_display( 'facet', 'blog_search' ) ?>
				</div>
			</div>

		</div>
	</div>


	<?php
}


/**
 * Reposition Date before Entry Title
 */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 6 );


/**
 * Force excerpts regardless of theme's Content Archive settings
 */
add_filter( 'genesis_pre_get_option_content_archive', function () {
	return 'excerpts';
} );


add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more' );
add_filter( 'the_content_more_link', __NAMESPACE__ . '\excerpt_more' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\excerpt_more' );
/**
 * Replaces "[...]" with an ->
 *
 * @return string a read more icon of an arrow
 */
function excerpt_more() {
	$arrow_url = '/wp-content/themes/ym/dist/images/green-arrow.svg';

	return sprintf( '<p class="link-more"><a href="%s" class="more-link">Read post <img src="' . $arrow_url . '" width="12" height="8"></a></p>', esc_url( get_permalink( get_the_ID() ) ) );
}


/**
 * Override theme settings
 */
add_filter( 'genesis_pre_get_option_content_archive', function () {
	return 'full';
} );


/**
 * Override theme settings for content limit
 */
add_filter( 'genesis_pre_get_option_content_archive_limit', function () {
	return 80;
} );



/**
 * Add ACF CTA Section
 */
add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_cta_section_and_related_posts', 8 );
/**
 * Add ACF CTA Section
 */
function add_cta_section_and_related_posts() {
	if ( get_field( 'add_cta_section', 'option' ) ) {
		get_template_part( 'partials/parts/options-page/cta', 'group' );
	}
}


add_filter( 'genesis_attr_content', __NAMESPACE__ . '\add_facetwp_support' );
/**
 * Add css classes needed for facetwp
 *
 * @param $attributes
 * @return mixed
 */
function add_facetwp_support( $attributes ) {
	$attributes['class'] .= ' facetwp-template';

	return $attributes;
}


genesis();
