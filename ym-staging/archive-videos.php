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


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_videos' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_videos( $classes ) {
	$classes[] = 'archive-videos';

	return $classes;
}



remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\add_featured_videos' );
/**
 * Outputs featured videos acf field group
 *
 */
function add_featured_videos() {
	if ( get_field( 'videos', 'option' ) ) {
		get_template_part( 'partials/parts/options-page/featured', 'videos' );
	}
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

					<div class="archive-description cpt-archive-description">
						<h1 class="archive-title">Resource Center</h1>
					</div>

					<div class="facet-wrap">
						<?php echo facetwp_display( 'facet', 'post_types' ) . facetwp_display( 'facet', 'topics' ) ?>
					</div>

				</div>

			</div>
		</div>


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
