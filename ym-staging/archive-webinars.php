<?php
/**
 * The archive whitepapers template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


namespace DevDesigns\YM;


/**
 * Remove archive title and description
 */
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );


/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_webinars' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_webinars( $classes ) {
	$classes[] = 'archive-webinars';

	return $classes;
}



remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\create_loop_with_cpts_whitepapers' );
/**
 * Outputs a custom loop
 *
 */
function create_loop_with_cpts_whitepapers() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	} ?>

	<header class="upcoming-webinar-heading">
		<h1 class="section-title">Upcoming Webinars</h1>
	</header>

	<?php if ( get_field( 'webinars', 'option' ) ) :
		get_template_part( 'partials/parts/options-page/upcoming', 'webinars' );
	endif; ?>

	<header class="webinar-heading">
		<h1 class="section-title">On-Demand Webinars</h1>
	</header>

	<?php
	echo do_shortcode( '[facetwp template="webinars"]' );


}



add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets_webinars' );
/**
 * Add facetWP facets after header
 */
function add_facets_webinars() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	} ?>

	<section class="slider-container">
		<div class="facets">
			<div class="wrap">
				<div class="flex-wrap">

					<div class="archive-description cpt-archive-description">
						<h1 class="archive-title">Resource Center</h1>
					</div>

					<div class="facet-wrap">
						<?php echo facetwp_display( 'facet', 'post_types' ) . facetwp_display( 'facet', 'topics' ) ?>
					</div>

				</div>
			</div>
		</div>

		<?php if ( get_field( 'webinar_slides', 'option' ) ) :
			get_template_part( 'partials/parts/sliders/webinar', 'slider' );
		endif; ?>
	</section>

	<?php
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_cta_section_and_related_posts', 8 );
/**
 * Add ACF CTA Section
 */
function add_cta_section_and_related_posts() {
	if ( get_field( 'add_cta_section', 'option' ) ) {
		get_template_part( 'partials/parts/options-page/cta', 'group' );
	}
}




add_action( 'wp_head', __NAMESPACE__ . '\scroll_to_results_from_facet', 50 );
/**
 * Scroll to the bottom of the page after clicking on a facet
 */
function scroll_to_results_from_facet() {
	if ( ! is_post_type_archive( 'webinars' ) ) {
		return;
	} ?>

	<script>
	    (function ($) {
	      $(document).on('facetwp-loaded', function () {
	        if (FWP.loaded) {
	          $('html, body, .site-inner').animate({scrollTop: $('.webinar-heading').offset().top
	          }, 2000)
	        }
	      })
	    })(jQuery);
	</script>

	<?php
}




genesis();

