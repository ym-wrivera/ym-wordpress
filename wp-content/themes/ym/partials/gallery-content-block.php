<?php
/**
 * Default code for a Tabs Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$gallery = get_row( 'gallery' );

//echo '<pre>';
//print_r( $gallery );
//echo '</pre>';

if ( $gallery ) :

	/**
	 * Color Overlay for background blend mode on hover
	 */
	$color_overlay = $gallery['overlay_filter'];
	$is_color_overlay = $color_overlay ?: '#000';

	/**
	 * Gallery layout. Can be rows of 1, 2, 3, or 4 images
	 */
	$layout = $gallery['layout'];


	/**
	 * Vertical overlay alignment
	 */
	$valign = $gallery['vertically_align_overlay'];
	$is_valign = $valign ?: 'center';

	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'gallery', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( get_sub_field( 'add_section_styles' ) ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}


	$custom_css .= '
			' . $ns_class . ' .gallery-image:hover > .overlay {
				background-color: ' . $is_color_overlay . ';
			}
		';

	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );



	/**
	 * Static elements
	 */
	$section_heading = get_sub_field( 'gallery_section_heading' );
	$icon = get_sub_field( 'gallery_location_icon' );

	?>

	<?php if ( have_rows( 'gallery_images' ) ) : ?>

	<section class=" <?php echo $ns . ' ' . $gallery['css_class'] . ' ' . $layout ?> css row fc-gallery">
		<div class="wrap">

			<div class="flex-wrap">

				<?php while ( have_rows( 'gallery_images' ) ) : the_row();

					$image = get_sub_field( 'image' );

					$static_overlay = get_sub_field( 'static_overlay' );
					$hover_overlay = get_sub_field( 'hover_overlay' ); ?>

					<div class="image-container">
						<div class="gallery-image"
						     style="background-image: url(<?php echo $image['url'] ?>); align-items: <?php echo $is_valign ?>;">

							<div class="overlay"></div>

							<?php if ( $static_overlay ) : ?>
								<div class="static-overlay">
									<?php echo $static_overlay ?>
								</div>
							<?php endif ?>

							<?php if ( $hover_overlay ) : ?>
								<div class="hover-overlay">
									<?php echo $hover_overlay ?>
								</div>
							<?php endif ?>

						</div>
					</div>

				<?php endwhile; ?>

			</div>
		</div>
	</section>

<?php endif; ?>

	<?php

endif;
