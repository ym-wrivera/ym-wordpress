<?php
/**
 * Functions for template partials. See partials directory
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 */

namespace DevDesigns\YM;


use WP_Query;

add_filter( 'excerpt_more', __NAMESPACE__ . '\partials_excerpt_more' );
add_filter( 'the_content_more_link', __NAMESPACE__ . '\partials_excerpt_more' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\partials_excerpt_more' );
/**
 * Replaces "[...]" with an ->
 *
 * @return string a read more icon of an arrow
 */
function partials_excerpt_more() {
	$arrow_url = '/wp-content/themes/ym/dist/images/green-arrow.svg';

	return sprintf( '<div class="read-more"><p class="link-more"><a href="%s" class="more-link"><img src="' . $arrow_url . '" width="20" height="14"></a></p></div>', esc_url( get_permalink( get_the_ID() ) ) );
}


add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_acf_related_posts_on_archives', 7 );
/**
 * Outputs related posts acf field group on archive pages from ym options.
 */
function render_acf_related_posts_on_archives() {
	if ( is_post_type_archive() && ! is_post_type_archive( 'sales_resources' ) && get_field( 'rp_add_related_posts', 'option' ) ) :
		get_template_part( 'partials/parts/options-page/related', 'posts' );
	endif;
}


add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_acf_related_posts_on_pages_n_products', 7 );
/**
 * Outputs related posts acf field group on pages and product cpt.
 */
function render_acf_related_posts_on_pages_n_products() {
	if ( is_singular( [ 'product', 'page' ] ) && get_field( 'add_related_posts', 'option' ) ) :
		get_template_part( 'partials/parts/related', 'posts' );
	endif;
}




add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\change_home_to_resource_center_in_breadcrumbs' );
/**
 * Change home in breadcrumbs to Resource Center on archives
 *
 * @param $args
 * @return mixed
 */
function change_home_to_resource_center_in_breadcrumbs( $args ) {

	$post_types = [
		'webinars',
		'whitepapers',
		'resource_center',
		'videos',
		'infographics',
		'casestudy',
		'post',
		'landing_pages',
	];

	if ( ! is_post_type_archive( $post_types ) && ! is_home() && ! is_singular( $post_types ) && ! is_category() && ! is_date() ) {
		return $args;
	}

	$args['home'] = 'Resource Center';

	return $args;
}




add_filter( 'genesis_home_crumb', __NAMESPACE__ . '\change_home_link_in_breadcrumbs_for_resources' );
/**
 * Modify Home breadcrumb link to link to resource center
 *
 * @param $crumb
 * @return mixed
 */
function change_home_link_in_breadcrumbs_for_resources( $crumb ) {

	$post_types = [
		'webinars',
		'whitepapers',
		'resource_center',
		'videos',
		'infographics',
		'casestudy',
		'post',
		'landing_pages',
	];

	if ( ! is_post_type_archive( $post_types ) && ! is_home() && ! is_singular( $post_types ) && ! is_category() && ! is_date() ) {
		return $crumb;
	}

	return preg_replace( '/href="[^"]*"/', 'href="' . get_post_type_archive_link( 'resource_center' ) . '"', $crumb );

}



add_filter( 'genesis_single_crumb', __NAMESPACE__ . '\blog_post_breadcrumbs', 10, 2 );
add_filter( 'genesis_archive_crumb', __NAMESPACE__ . '\blog_post_breadcrumbs', 10, 2 );
/**
 * Add Blog to Breadcrumbs, and remove category
 *
 * @author   Bill Erickson
 * @link     http://www.billerickson.net/adding-blog-to-genesis-breadcrumbs/
 *
 * @param $crumb
 * @param $args
 * @return string modified breadcrumb
 * @internal param \DevDesigns\YM\original $string breadcrumb
 */
function blog_post_breadcrumbs( $crumb, $args ) {
	if ( is_singular( 'post' ) ) {
		$crumb = get_the_title();
	}

	if ( is_singular( 'post' ) || is_category() ) {
		return '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" itemprop="item"><span itemprop="name">' . get_the_title( get_option( 'page_for_posts' ) ) . '</span></a> ' . $args['sep'] . ' ' . $crumb;
	} else {
		return $crumb;
	}
}



add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\change_home_to_company_in_news_breadcrumbs' );
/**
 * Change home in breadcrumbs to Company on News post type
 *
 * @param $args
 * @return mixed
 */
function change_home_to_company_in_news_breadcrumbs( $args ) {

	if ( ! is_post_type_archive( 'news' ) && ! is_singular( 'news' ) ) {
		return $args;
	}

	$args['home'] = 'Company';

	return $args;
}



add_filter( 'genesis_home_crumb', __NAMESPACE__ . '\change_home_link_in_breadcrumbs_for_news' );
/**
 * Modify Home breadcrumb link to link to news archive on company pages
 *
 * @param $crumb
 * @return mixed
 */
function change_home_link_in_breadcrumbs_for_news( $crumb ) {

	if ( ! is_post_type_archive( 'news' ) && ! is_singular( 'news' ) ) {
		return $crumb;
	}

	return preg_replace( '/href="[^"]*"/', 'href="' . get_post_type_archive_link( 'news' ) . '"', $crumb );

}
