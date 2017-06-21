<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage and a page has been set
 * for the Blog within Settings -> Reading. home.php is then used to render blog layout.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since 1.0
 * @version 1.0
 */

namespace DevDesigns\YM;


/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );


/**
 * Remove archive title and description
 */
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );



add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets' );
/**
 * Add facetWP facets after header
 */
function add_facets() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	} ?>

	<section class="slider-container">
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

		<?php if ( get_field( 'blog_slides', get_option( 'page_for_posts' ) ) ) :
			get_template_part( 'partials/parts/sliders/blog', 'slider' );
		endif; ?>

	</section>

	<?php
}


remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\do_facetwp_loop' );
/**
 * Outputs a custom loop built with FacetWP
 */
function do_facetwp_loop() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	}

	echo facetwp_display( 'template', 'blog_posts' );
}



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


genesis();


