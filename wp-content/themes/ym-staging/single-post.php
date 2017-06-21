<?php
/**
 * Template file for Blog Posts. If single.php is also in use
 * this template will be used for all blog posts only. single.php
 * will cover all other posts.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 *
 */

namespace DevDesigns\YM;


/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );



add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add blog-post body class
 *
 * @param $classes
 * @return array
 */
function add_body_class( $classes ) {
	return array_merge( $classes, [ 'blog-post' ] );
}



add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets_videos' );
/**
 * Add facetWP facets after header
 */
function add_facets_videos() {
	if ( get_field( 'add_hero_posts' ) ) :

		/**
		 * Create a random id that we'll use as a CSS namespace to
		 * prevent style conflict. Random ID assigned to $ns
		 */
		$create_random_id = uniqid( 'posts-hero', false );
		$ns_class = '.' . $create_random_id;
		$ns = $create_random_id;

		$hero_img = get_field( 'hero_image_posts' );
		$hero_overlay_color = get_field( 'hero_overlay_color' );

		$custom_css = '
					' . $ns_class . '.hero-bg {
						background-image: url("' . $hero_img['url'] . '");
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																				a
					}
                ';


		wp_enqueue_style( 'partials' );

		wp_add_inline_style( 'partials', $custom_css );


		wp_enqueue_script( 'backstretch' );

		wp_localize_script(
			'backstretch',
			'BackStretchImg',
			[ 'src' => $hero_img['url'] ]
		);

		wp_add_inline_script( 'backstretch',
			'jQuery(document).ready(function($){
				$(".hero").backstretch();
			});'
		); ?>

		<section class="<?php echo $ns; ?> hero hero-bg">
			<div class="wrap">
				<div class="hero-content">
					<h1 style="color: <?php echo $hero_overlay_color ?>;"><?php echo get_the_title() ?></h1>
				</div>
			</div>
		</section>

	<?php endif;
}



/**
 * Remove categories from footer and remove date from header
 */
remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );


/**
 * Output intro paragraph
 */
/**
 * Add link to blog. ie... More Posts
 */
add_action( 'genesis_entry_header', function () {
	if ( get_field( 'add_intro' ) ) : ?>
		<div class="introduction"><?php the_field( 'intro_paragraph' ); ?></div>
	<?php endif;
}, 15 );


add_action( 'genesis_entry_footer', __NAMESPACE__ . '\add_author_avatar' );
/**
 * Outputs author avatar, title name
 */
function add_author_avatar() {
	if ( ! get_field( 'add_author_info' ) ) {
		return;
	}

	$author_image = get_field( 'author_image' );
	$author_name = get_field( 'author_name' );
	$author_title = get_field( 'author_title' );

	?>

	<section class="author-bio">

		<?php if ( $author_image ) : ?>
			<figure>
				<img src="<?php echo $author_image['url']; ?>"
				     alt="<?php echo $author_image['alt']; ?>"
				     width="<?php echo $author_image['width'] / 2 ?>"
				     height="<?php echo $author_image['height'] / 2 ?>">
			</figure>
		<?php endif; ?>

		<?php if ( $author_name ) : ?>
			<div class="details">
				<p><?php echo $author_name ?></p>
				<p><?php echo $author_title ?></p>
			</div>
		<?php endif; ?>

	</section>


	<?php

}


/**
 * Add link to blog. ie... More Posts
 */
add_action( 'genesis_entry_footer', function () {
	echo '<div class="archives"><p class="archive-link"><a class="more-posts" title="Get more YourMembership content on our blog" href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">&lt; More Posts</a></p></div>';
}, 15 );



add_action( 'genesis_entry_footer', __NAMESPACE__ . '\add_mobile_post_single_sidebar', 20 );
/**
 * Adds a sidebar to Blog single and archive. Removes primary sidebar
 * as well.
 */
function add_mobile_post_single_sidebar() {
	if ( ! is_active_sidebar( 'mobile-single-post-sidebar' ) ) {
		return;
	} ?>

		<aside class="sidebar sidebar-mobile widget-area" role="complementary" aria-label="Mobile Sidebar"
		       itemscope="" itemtype="http://schema.org/WPSideBar" id="genesis-sidebar-mobile">
			<h2 class="genesis-sidebar-title screen-reader-text">Mobile Sidebar</h2>

			<?php dynamic_sidebar( 'mobile-single-post-sidebar' ); ?>

		</aside>
		<?php
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_cta_section_and_related_posts', 8 );
/**
 * Add ACF CTA Section
 */
function add_cta_section_and_related_posts() {

	if ( ! get_field( 'add_cta_section' ) ) {
		return;
	}

	$bg_color = get_field( 'cta_bg_color' );
	$cta_content = get_field( 'cta_content' ); ?>

	<section class="cta-section" style="background-color: <?php echo $bg_color ?>">
		<div class="wrap">

			<div class="entry-content-cta">
				<?php if ( $cta_content ) : ?>
					<div><?php echo $cta_content ?></div>
				<?php endif; ?>

				<?php if ( get_field( 'add_cta' ) ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>
			</div>

		</div>
	</section>

<?php

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

