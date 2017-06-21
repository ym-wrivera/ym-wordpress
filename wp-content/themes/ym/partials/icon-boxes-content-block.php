<?php
/**
 * Default code for Cards Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$icon_boxes = get_row( 'icon_boxes' );

//echo '<pre>';
//print_r( $icon_boxes );
//echo '</pre>';


if ( $icon_boxes ) :

	/**
	 * Adjust icon size if no height and width atts are on svg.
	 * Viewbox only
	 */
	$svg_width_single = get_sub_field( 'svg_width_single' );
	$svg_width = $svg_width_single ? : 'auto';


	/**
	 * Heading Color
	 */
	$heading_color = '#ffffff';
	$is_heading_color = $icon_boxes['heading_color'] ? : $heading_color;


	/**
	 * Text Color
	 */
	$content_color = '#343F49';
	$is_content_color = $icon_boxes['content_color'] ? : $content_color;


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'icon-boxes', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';


	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( $icon_boxes['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}


	/**
	 * Append custom component CSS
	 */
	$custom_css .= '                  
		' . $ns_class . ' .inline-svg {
			width: ' . $svg_width . ';
		}

        ' . $ns_class . ' .content-wrap .heading {
            color: ' . $is_heading_color . ';
        }
        
        ' . $ns_class . ' .content-wrap .entry-content {
            color: ' . $is_content_color . ';
        }
    ';


	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css );

	//
	//if ( isset( $css['background_image']['url'] ) ) {
	//	wp_localize_script(
	//		'app',
	//		'BackStretchImg',
	//		[ 'src' => $css['background_image'] ]
	//	);
	//
	//	wp_add_inline_script( 'app',
	//		'jQuery(document).ready(function($){
	//			$("' . $ns_class . '").backstretch();
	//		});'
	//	);
	//}


	/**
	 * Enqueue equal heights js
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
				 $(".icon-box-container figure").matchHeight({
				    byRow: true,
                    property: "height",
                    target: null,
                    remove: false
                 });
                 
				 $(".icon-box-container .entry-content").matchHeight({
				    byRow: true,
                    property: "height",
                    target: null,
                    remove: false
                 });
                 
				 $(".icon-box-container").matchHeight({
				    byRow: true,
                    property: "height",
                    target: null,
                    remove: false
                 });
			});'
	);

 ?>

	<section class="<?php echo $ns . ' ' . $icon_boxes['css_class'] . ' ' . $icon_boxes['card_type']; ?> css row fc-icon-boxes">
		<div class="wrap">

			<?php if ( $icon_boxes['add_heading'] ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<?php if ( have_rows( 'icon_boxes' ) ) : ?>

				<div class="flex-wrap">

					<?php while ( have_rows( 'icon_boxes' ) ) : the_row();

						$icon = get_sub_field( 'icon' );
						$heading = get_sub_field( 'heading' );
						$description = get_sub_field( 'description' );

						$align_description = get_sub_field( 'description_alignment' );
						$des_alignment = $align_description ? : 'center'; ?>

							<article class="icon-box-container animated-icon-container" style="text-align: <?php echo $des_alignment ?>;">
								<main>
										<figure>
											<img class="inline-svg svg-card"
											     src="<?php echo $icon['url']; ?>"
											     alt="<?php echo $icon['alt']; ?>"
											     width="<?php echo $icon['width'] / 2 ?>"
											     height="<?php echo $icon['height'] / 2 ?>">
										</figure>

									<div class="content-wrap">

										<?php if ( $heading ) : ?>
											<h2 class="heading"><?php echo $heading; ?></h2>
										<?php endif; ?>

										<?php if ( $description ) : ?>
											<div class="entry-content">
												<?php echo $description ?>
											</div>
										<?php endif; ?>

									</div>
								</main>
							</article>

					<?php endwhile; ?>

				</div>

				<?php if ( $icon_boxes['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			<?php endif; ?>

		</div>

	</section>


	<?php

endif;

