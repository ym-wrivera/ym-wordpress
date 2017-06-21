<?php
/**
 * Default code for Multiple Content - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$multiple_content = get_row( 'multiple_content_blocks' );

//echo '<pre>';
//print_r( $multiple_content );
//echo '</pre>';

if ( $multiple_content ) :


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'multiple-content', false );
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
	if ( $multiple_content['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}



	/**
	 * Append custom component CSS
	 */
	//$custom_css .= '
	//                ' . $ns_class . ' .fc-multiple-content {
     //               }
     //            ';


	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css );


	//if ( isset( $css['background_image']['url'] ) ) {
	//	wp_localize_script(
	//		'app',
	//		'BackStretchImg',
	//		['src' => $css['background_image']]
	//	);
	//
	//	wp_add_inline_script( 'app',
	//		'jQuery(document).ready(function($){
	//			$("' . $ns_class . '").backstretch();
	//		});'
	//	);
	//} ?>


	<section class="<?php echo $ns . ' ' . $multiple_content['css_class']; ?> css mc-container row fc-multiple-content">
		<div class="wrap">
			<div class="flex-wrap">

				<?php if ( have_rows( 'content_block' ) ) : ?>
					<?php while ( have_rows( 'content_block' ) ) : the_row();

						$content = get_sub_field( 'content_area' );
						$add_cta = get_sub_field( 'add_cta' );
						$add_heading = get_sub_field( 'add_heading' );
						$add_icon = get_sub_field( 'add_icon' );
						$icon = get_sub_field( 'cc_icon' );
						$link_to_id = get_sub_field( 'link_to_id' );



						/**
						 * Icon width depends on whether or not it's an svg.
						 */
						$icon_width = $icon['icon_width'] ? : $icon['icon']['width'] / 2 . 'px'; ?>

						<article itemscope="" itemtype="http://schema.org/CreativeWork">
							<main>

								<?php if ( $add_icon ) : ?>
									<figure class="<?php echo $ns ?>">
										<img class="icon"
										     src="<?php echo $icon['icon']['url']; ?>"
										     alt="<?php echo $icon['icon']['alt']; ?>"
										     width="<?php echo $icon['icon']['width'] / 2 ?>"
										     height="<?php echo $icon['icon']['height'] / 2 ?>"
											 style="width: <?php echo $icon_width ?>">
									</figure>
								<?php endif; ?>

								<?php if ( $add_heading ) :
									get_template_part( 'partials/parts/title', 'group' );
								endif; ?>

								<?php if ( $content ) : ?>
									<div class="entry-content" id="<?php echo $link_to_id ?>" itemprop="text">
										<?php echo $content; ?>
									</div>
								<?php endif; ?>

								<?php if ( $add_cta ) :
									get_template_part( 'partials/parts/button', 'group' );
								endif; ?>

							</main>
						</article>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</section>


	<?php

endif;
