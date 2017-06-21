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


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_whitepapers' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_whitepapers( $classes ) {
	$classes[] = 'archive-whitepapers';

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
	}

	echo facetwp_display( 'template', 'whitepapers' );
}



add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets_whitepapers' );
/**
 * Add facetWP facets after header
 */
function add_facets_whitepapers() {
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

		<?php if ( get_field( 'whitepaper_slides', 'option' ) ) :
			get_template_part( 'partials/parts/sliders/whitepaper', 'slider' );
		endif; ?>
	</section>

	<?php
}


add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_cta_section', 8 );
/**
 * Add ACF CTA Section and Related Posts
 */
function add_cta_section() {
	if ( get_field( 'add_cta_section', 'option' ) ) {
		get_template_part( 'partials/parts/options-page/cta', 'group' );
	}
}


genesis();
