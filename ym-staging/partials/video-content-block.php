<?php
/**
 * Default code for Video Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$video = get_row( 'video' );

//echo '<pre>';
//print_r( $video );
//echo '</pre>';


if ( $video ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'video', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;

	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( $video['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );
	}

	if ( ! empty( $section_css ) ) {
		$video_fields_css = $section_css ?: '';
	}

	/**
	 * Unique Hero Styles
	 */
	$align_text = $video['text_alignment'] ? : 'center';

	$custom_css = '
	
			' . $video_fields_css . '

			' . $ns_class . ' .bq-color p,
			' . $ns_class . ' .bq-info p {
				color: ' . $video['video_text_color'] . ';
			}

			' . $ns_class . ' .align-video-text {
                text-align: center;
            }

			@media screen and (min-width: 40em) {
				' . $ns_class . ' .align-video-text {
                    text-align: ' . $align_text . ';
                }
			}
		';


	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css );


	/**
	 * Enqueue backstretch.js if a bg image is used
	 */
	//if ( isset( $css['background_image'] ) && ! wp_script_is( ' backstretch' ) ) {
	//	wp_enqueue_script( 'backstretch' );
	//
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

	?>


	<section class="<?php echo $ns . ' ' . $video['css_class'] . ' ' . $video['video_layout']; ?> css row fc-video">
		<div class="wrap">

			<article class="align-video-text video-content">

				<?php if ( $video['add_icon'] ) :
					get_template_part( 'partials/parts/icon', 'group' );
				endif; ?>

				<?php if ( $video['testimonial'] ) : ?>
					<blockquote class="bq-color">
						<?php echo $video['testimonial']; ?>
					</blockquote>
				<?php endif; ?>

				<div class="bq-info">

					<?php if ( $video['add_name'] ) : ?>
						<p class="name bq-color">
							<?php echo $video['name']; ?>
						</p>
					<?php endif; ?>

					<?php if ( $video['add_company'] ) : ?>
						<p class="bq-details bq-color">
							<?php echo $video['company']; ?>
						</p>
					<?php endif; ?>

				</div>

				<?php if ( $video['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

				<?php if ( $video['add_video'] ) :
					get_template_part( 'partials/parts/video', 'fields' );
				endif; ?>

			</article>

		</div>
	</section>

	<?php

endif;

