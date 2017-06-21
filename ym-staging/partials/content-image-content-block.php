<?php
/**
 * Default code for Content and Image Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


$content_img = get_row( 'content_and_image' );

//echo '<pre>';
//print_r( $content_img );
//echo '</pre>';

if ( $content_img ) :

	/**
	 * Style the text color
	 */
	$text_color = $content_img['text_color'] ?: '#343F49';


	/**
	 * Logo width for Case Study widget
	 */
	$logo_width = $content_img['logo_width'] ? : 'auto';


	/**
	 * Different layouts
	 */
	$layout = $content_img['adjust_layout'];


	/**
	 * Inner padding for constrained layouts only
	 */
	$inner_padding = $content_img['inner_padding'];

	if ( 'i6-c6-constrained' === $layout ) {
		$inner_padding = $inner_padding ?: '';
	}


	/**
	 * Set defaults on content block layout options
	 */
	$content_order = 'left' === $content_img['content_alignment'] ? 'content-left' : 'content-right';
	$layout = $content_img['adjust_layout'] ? : 'i6-c6';
	$all_text_color = $content_img['text_color'] ? : '#343F49';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'content-img', false );
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
	if ( get_sub_field( 'add_section_styles' ) ) {
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
			' . $ns_class . ' .cs-excerpt figure > img {
				width: ' . $logo_width . ';
			}
			
			' . $ns_class . ' .entry-content > *,
			' . $ns_class . ' header > * {
				color: ' . $all_text_color . ';
			}
			
			@media (min-width: 75em) {
				' . $ns_class . ' .content {
					padding: ' . $inner_padding . ';
				}
			}
		';



	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css ); ?>

	<section class="<?php echo $ns . ' ' . $content_img['css_class'] . ' ' . $layout ?> css row fc-content-image">

		<div class="wrap">

			<main class="<?php echo $content_order ?> content-image-wrap">

				<article class="content" itemscope="" itemtype="http://schema.org/CreativeWork">

					<?php if ( $content_img['add_icon'] ) :
						get_template_part( 'partials/parts/icon', 'group' );
					endif; ?>

					<?php if ( $content_img['add_heading'] ) :
						get_template_part( 'partials/parts/title', 'group' );
					endif; ?>

					<?php if ( $content_img['content_area'] || $content_img['add_cta'] ) : ?>
						<div class="entry-content" id="<?php echo $content_img['link_to_id'] ?>">
							<?php echo $content_img['content_area']; ?>
						</div>
					<?php endif; ?>

					<?php if ( $content_img['add_cta'] ) :
						get_template_part( 'partials/parts/button', 'group' );
					endif; ?>

					<?php if ( $content_img['add_case_study'] ) : ?>
						<div class="cs-excerpt">
							<div class="inner-wrap">
								<figure>
									<img src="<?php echo $content_img['cs_logo']['url'] ?>"
									     alt="<?php echo $content_img['cs_logo']['alt'] ?>"
									     width="<?php echo $content_img['cs_logo']['width'] ?>"
									     height="<?php echo $content_img['cs_logo']['height'] ?>"
									     style="<?php echo $logo_width ?>">
								</figure>

								<div class="cs-wrap">
									<p class="title"
									   style="color: <?php echo $text_color ?>"><?php echo $content_img['cs_title'] ?></p>
									<p class="excerpt"
									   style="color: <?php echo $text_color ?>"><?php echo $content_img['cs_excerpt'] ?>
										<a
												href="<?php echo $content_img['choose_case_study'] ?>"
												style="color: <?php echo $text_color ?>"
												title="<?php echo $content_img['cs_title'] ?>">Read More</a></p>
								</div>
							</div>
						</div>
					<?php endif; ?>

				</article>

				<?php if ( 'i6-c5-off-canvas-squared' === $layout ) : ?>
					<aside class="bg-image"
					       style="background-image: url(<?php echo $content_img['c_and_i_image']['url'] ?>);
							       padding: <?php echo $content_img['c_and_i_image']['height'] / 4 . 'px'?> 0"></aside>
				<?php else : ?>
					<aside class="image">
						<img src="<?php echo $content_img['c_and_i_image']['url'] ?>"
						     alt="<?php echo $content_img['c_and_i_image']['alt'] ?>"
						     width="<?php echo $content_img['c_and_i_image']['width'] / 2 ?>"
						     height="<?php echo $content_img['c_and_i_image']['height'] / 2 ?>">
					</aside>
				<?php endif; ?>

			</main>

		</div>
	</section>

	<?php

endif;

