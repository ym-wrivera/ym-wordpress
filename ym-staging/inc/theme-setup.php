<?php
/**
 * YM
 *
 * This file adds the default theme settings to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

namespace DevDesigns\YM;


add_filter( 'wp_revisions_to_keep', __NAMESPACE__ . '\limit_all_revisions', 10, 2 );
/**
 * Limit revisions to 5 for all post types using ACF flexible content.
 * Revisions exceeding 200 caused fatal errors on templates using ACF
 * Flexible Content fields.
 *
 * @param $num
 * @param $post
 *
 * @return mixed
 */
function limit_all_revisions( $num, $post ) {
	if ( have_rows( 'flexible_content' ) ) {
		$num = 5;
	}
	return $num;
}


add_filter( 'admin_memory_limit', __NAMESPACE__ . '\increase_admin_mem_limit', 10, 3 );
/**
 * @param $wp_max_mem_limit
 * @return string
 */
function increase_admin_mem_limit( $wp_max_mem_limit ) {
	return '512M';
}


add_action( 'init', __NAMESPACE__ . '\add_support_genesis_scripts' );
/**
 * Enable scripts metabox on Product CPT
 */
function add_support_genesis_scripts() {
	add_post_type_support( 'product', 'genesis-scripts' );
}


/**
 * Enable shortcodes in text widgets
 */
add_filter( 'widget_text', 'do_shortcode' );


add_action( 'init', __NAMESPACE__ . '\register_image_sizes' );
/**
 * Register child theme image sizes
 */
function register_image_sizes() {

	add_image_size( 'resources-featured-image', 380, 230, true );

	add_image_size( 'slider-bg', 1440, 375, true );

	add_image_size( 'slider', 600, 351, true );

	add_image_size( 'landing-page', 1440, 450 );

	add_image_size( 'upcoming-webinars', 550, 486 );

	add_image_size( 'hero', 1440, 485 );

	add_image_size( 'content-images', 586, 336 );

	add_image_size( 'team', 300, 300, true );

	add_image_size( 'largeteam', 500, 500, true );
}


add_action( 'genesis_after_loop', __NAMESPACE__ . '\add_pagination_to_posts', 5 );
/**
 * Add previous and next buttons to custom post types.
 */
function add_pagination_to_posts() {
	if ( ! is_singular( 'news' ) ) {
		return;
	}

	$older_post = get_previous_post();
	$newer_post = get_next_post(); ?>


	<div class="cpt-pagination">

		<a href="<?php echo get_post_type_archive_link( 'news' ); ?>">< Back to News</a>

		<?php if ( null !== $older_post || null !== $newer_post ) { ?>

			<div class="pagination-wrap">
				<?php if ( ! empty( $older_post ) ) : ?>
					<a class="pagination-older" href="<?php echo get_permalink( $older_post->ID ); ?>">< Prev</a>
				<?php endif;

				if ( ! empty( $newer_post ) ) : ?>
					<a class="pagination-newer" href="<?php echo get_permalink( $newer_post->ID ); ?>">Next ></a>
				<?php endif; ?>
			</div>

		<?php } ?>

	</div>

	<?php

}


add_action( 'wp_head', __NAMESPACE__ . '\mobile_address_bar_color' );
/**
 * Change Color of Mobile Address Bar
 */
function mobile_address_bar_color() {
	echo '<meta name="theme-color" content="#C1CE20" />';
}


/**
 * Add option to hide gravity forms label
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );



/**
 * Hide count from facetwp dropdown on resource archive
 */
add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );



add_action( 'pre_get_posts', __NAMESPACE__ . '\change_ppp_team_grid' );
/**
 * Change posts per page to unlimited
 *
 * @param $query
 */
function change_ppp_team_grid( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'team' ) ) {
		$query->set( 'posts_per_page', '-1' );
	}
}


add_action( 'wp_head', __NAMESPACE__ . '\fwp_load_more', 99 );
add_filter( 'facetwp_template_force_load', '__return_true' );
/**
 * Add load more button to archives
 */
function fwp_load_more() {

	if ( ! is_post_type_archive( [ 'webinars', 'whitepapers', 'resource_center', 'videos', 'infographics', 'casestudy' ] ) && ! is_home() ) {
		return;
	} ?>

	<script>
      (function ($) {
        $(function () {
          if ('object' != typeof FWP) {
            return;
          }

          wp.hooks.addFilter('facetwp/template_html', function (resp, params) {
            if (FWP.is_load_more) {
              FWP.is_load_more = false;
              $('.facetwp-template').append(params.html);
              return true;
            }
            return resp;
          });
        });

        $(document).on('click', '.fwp-load-more', function () {
          $('.fwp-load-more').html('Loading...');
          FWP.is_load_more = true;
          FWP.paged = parseInt(FWP.settings.pager.page) + 1;
          FWP.soft_refresh = true;
          FWP.refresh();
        });

        $(document).on('facetwp-loaded', function () {
          if (FWP.settings.pager.page < FWP.settings.pager.total_pages) {
            if (!FWP.loaded && 1 > $('.fwp-load-more').length) {
              $('.facetwp-template').after('<div class="fwp-button-wrap"><button class="button btn-primary fwp-load-more">Load more</button></div>');
            }
            else {
              $('.fwp-load-more').html('Load more').show();
            }
          }
          else {
            $('.fwp-load-more').hide();
          }
        });

        $(document).on('facetwp-refresh', function () {
          if (!FWP.loaded) {
            FWP.paged = 1;
          }
        });

        $(document).on('facetwp-refresh', function () {
          $('.facetwp-template').animate({opacity: 0}, 1000);
        });

        $(document).on('facetwp-loaded', function () {
          $('.facetwp-template').animate({opacity: 1}, 1000);

        });

      })(jQuery);
	</script>

	<?php
}


add_filter( 'wp_head', __NAMESPACE__ . '\preselect_archive_cpt_facet', 99 );
/**
 * Pre Select Webinars Post Type on Webinar archive
 */
function preselect_archive_cpt_facet() {
	if ( ! is_post_type_archive( [ 'webinars', 'whitepapers', 'videos', 'infographics', 'casestudy' ] ) ) {
		return;
	}

	$trimmed_url = trim( $_SERVER['REQUEST_URI'], '/' );
	$url_fragments = explode( '/', $trimmed_url );
	$get_archive_name_from_url = end( $url_fragments );
	$archive_name_no_underscores = str_replace( '-', '', $get_archive_name_from_url );


	wp_add_inline_script(
		'app',
		'(function ($) {
            $(document).on("facetwp-refresh", function () {
                if (!FWP.loaded && "" == FWP.build_query_string()) {
                    FWP.facets["post_types"] = ["' . $archive_name_no_underscores . '"];
                }
            });
        })(jQuery);'
	);
}
