<?php
/**
 * Default code for Half Slider / Half Content partial. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$slider_content = get_row( 'slider_content' );

//echo '<pre>';
//echo print_r( $slider_content );
//echo '</pre>';

if ( $slider_content ) :

	/**
	 * Content order left or right
	 */
	$content_order = 'left' === $slider_content['content_alignment'] ? 'content-left' : 'content-right';


	/**
	 * Left and Right Arrows
	 */
	$prev_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24"><path class="slider-arrow" fill="#FFF" fill-rule="evenodd" d="M4.894 11.99l7.74 8.55 1.005 1.11-2.225 2.014-1.007-1.112-8.6-9.5-1.055-.957.095-.106-.095-.106 1.056-.957 8.338-9.213L11.155.602l2.224 2.013-1.007 1.112-7.48 8.262z"/></svg>';
	$next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24"><path class="slider-arrow" fill="#FFF" fill-rule="evenodd" d="M9.038 12.01l-7.74-8.55L.294 2.35 2.517.335l1.007 1.112 8.6 9.5 1.055.957-.096.106.095.106-1.057.957-8.34 9.213-1.006 1.112-2.224-2.013 1.006-1.112 7.478-8.262z"/></svg>';


	/**
	 * Arrow color
	 */
	$arrow_color = $slider_content['arrow_color'];
	$is_arrow_color = $arrow_color ? : '#fff';



	/**
	 * Content Area
	 */
	$content_area = $slider_content['content'];


	/**
	 * is Regular Slider
	 */
	 $slider_layout = $slider_content['slider_layout'];
	 $slider_layout = $slider_layout ?: 'marketing-slider';


	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'slider-content', false );
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


	wp_enqueue_style( 'swiper-css' );

	wp_enqueue_script( 'swiper-js' );

	if ( 'marketing-slider' === $slider_layout || 'hero-slider' === $slider_layout ) :
		wp_add_inline_script(
			'swiper-js',
			'jQuery(document).ready(function($){
			var mySwiper = new Swiper ("' . $ns_class . ' .swiper-container", {
				pagination: "' . $ns_class . ' .swiper-pagination",
				paginationClickable: true,
				nextButton: "' . $ns_class . ' .button-next svg",
                prevButton: "' . $ns_class . ' .button-prev svg",
                spaceBetween: 30
            })
        });'
		);

	elseif ( 'caption-slider' === $slider_layout ) :

		wp_add_inline_script(
			'swiper-js',
			'jQuery(document).ready(function($){
			var mySwiper = new Swiper ("' . $ns_class . ' .swiper-container", {
				pagination: "' . $ns_class . ' .swiper-pagination",
				paginationClickable: true,
				nextButton: "' . $ns_class . ' .button-next svg",
                prevButton: "' . $ns_class . ' .button-prev svg",
                spaceBetween: 30,
                autoPlay: 3000
            })
        });'
		);

	else :
		wp_add_inline_script(
			'swiper-js',
			'jQuery(document).ready(function($){
			var mySwiper = new Swiper ("' . $ns_class . ' .swiper-container", {
				pagination: "' . $ns_class . ' .swiper-pagination",
				paginationClickable: true,
				nextButton: "' . $ns_class . ' .button-next svg",
                prevButton: "' . $ns_class . ' .button-prev svg",
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflow: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows : false
                }
                })
            });'
		);
	endif;

	$custom_css .= '
	
			' . $ns_class . ' .slider-arrow {
			    fill: ' . $is_arrow_color . ';
			 }
			 
			' . $ns_class . ' span.swiper-pagination-bullet {
				background-color: ' . $is_arrow_color . ';
			}
	
            @media all and (min-width: 50em) {
                ' . $ns_class . ' .align-right {
                    order: 2;
                    transform: translate(0, -10px);
                }
            }

        ';

	wp_add_inline_style( 'swiper-css', $custom_css );


	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css );

	/**
	 * Prevent uneven posts by making sure we have even heights set. This
	 * prevents a long title/excerpt from making the component look out of
	 * place.
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
				  $("' . $ns_class . ' .slide-content").matchHeight({
				      byRow: false,
                      property: "height",
                      target: null,
                      remove: false
                  });
                  
                  $("' . $ns_class . ' .swiper-slide").matchHeight({
				      byRow: false,
                      property: "height",
                      target: null,
                      remove: false
                  });                  
			});'
	);


	/**
	 * Enqueue backstretch.js if a bg image is used
	 */
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
	//} ?>


	<section class="<?php echo $ns . ' ' . $slider_content['css_class'] . ' ' . $slider_layout ?> css fc-slider-content">
		<div class="<?php echo $content_order ?> wrap">

		<div class="swiper-container">
			<div class="swiper-wrapper">

				<?php while ( have_rows( 'slides' ) ) : the_row();

					// Background
					$bg_type = get_sub_field( 'bg_type' );

					$bg_img = get_sub_field( 'background_image' );
					$bg_color = get_sub_field( 'background_color' );

					// Image
					if ( 'image' === $bg_type ) {
						$slide_bg = 'background: url( ' . $bg_img['sizes']['slider'] . ') no-repeat;';
					} else {
						$slide_bg = 'background-color: ' . $bg_color . ';';
					}

					$slide_image = get_sub_field( 'slide_image' );

					// Align Content
					$align_content = get_sub_field( 'align_content' );
					$align_right = 'align-right';

					if ( 'right' !== $align_content ) {
						$align_right = '';
					}


					/**
					 * Hero slider vars
					 */
					$slide_padding = get_sub_field( 'slide_padding' );
					$layout = get_sub_field( 'hero_layout' );
					$align_text = get_sub_field( 'text_alignment' );

					/**
					 * Text Alignment
					 */
					$align_text = $align_text ?: 'center';

					/**
					 * Layout
					 */
					$layout = $layout ?: 'hero-center';

					/**
					 * Slide Padding
					 */
					$slide_padding = $slide_padding ?: '';
					?>


					<?php if ( 'marketing-slider' === $slider_layout ) : ?>
						<div class="swiper-slide" style="<?php echo $slide_bg ?>">
							<div class="wrap">

								<div class="inner-wrap">
									<div class="<?php echo $align_right ?> slide-content">
										<?php if ( get_sub_field( 'add_heading' ) ) :
											get_template_part( 'partials/parts/title', 'group' );
										endif; ?>

										<?php if ( get_sub_field( 'add_cta' ) ) :
											get_template_part( 'partials/parts/button', 'group' );
										endif; ?>
									</div>

									<?php if ( $slide_image['sizes']['slider'] ) : ?>
										<figure>
											<img src="<?php echo $slide_image['sizes']['slider'] ?>"
											     alt="<?php echo $slide_image['alt'] ?>"
											     width="<?php echo $slide_image['sizes']['slider-width'] / 2 ?>"
											     height="<?php echo $slide_image['sizes']['slider-height'] / 2 ?>">
										</figure>
									<?php endif; ?>
								</div>

							</div>
						</div>

					<?php elseif ( 'caption-slider' === $slider_layout ) :

						$add_caption = get_sub_field( 'add_caption' );
						$caption = get_sub_field( 'caption' ); ?>

						<div class="swiper-slide">

							<?php if ( $slide_image['sizes']['slider'] ) : ?>
								<figure class="caption-slide">
									<img src="<?php echo $slide_image['sizes']['slider'] ?>"
									     alt="<?php echo $slide_image['alt'] ?>"
									     width="<?php echo $slide_image['sizes']['slider-width'] / 2 ?>"
									     height="<?php echo $slide_image['sizes']['slider-height'] / 2 ?>">
								</figure>
							<?php endif; ?>

							<?php if ( $add_caption ) : ?>
								<div class="caption" style="text-align: <?php echo $align_text ?>;">
									<?php echo $caption ?>
								</div>
							<?php endif; ?>

						</div>

					<?php elseif ( 'coverflow-slider' === $slider_layout ) : ?>

						<div class="swiper-slide">

							<?php if ( $slide_image['url'] ) : ?>
								<figure class="caption-slide">
									<img src="<?php echo $slide_image['url'] ?>"
									     alt="<?php echo $slide_image['alt'] ?>"
									     width="<?php echo $slide_image['width'] / 2 ?>"
									     height="<?php echo $slide_image['height'] / 2 ?>">
								</figure>
							<?php endif; ?>

						</div>

					<?php else : ?>

						<div class="<?php echo $layout ?> swiper-slide" style="<?php echo $slide_bg ?>">
							<div class="wrap">
								<div class="align-hero-text hero-content"
									 style="text-align: <?php echo $align_text ?>; padding: <?php echo $slide_padding ?>;">

									<?php if ( get_sub_field( 'add_heading' ) ) :
										get_template_part( 'partials/parts/title', 'group' );
									endif; ?>

									<?php if ( get_sub_field( 'add_cta' ) ) :
										get_template_part( 'partials/parts/button', 'group' );
									endif; ?>

								</div>
							</div>
						</div>

					<?php endif; ?>

				<?php endwhile; ?>

			</div>

			<div class="swiper-pagination"></div>
			<div class="button-next"><?php echo $next_arrow ?></div>
			<div class="button-prev"><?php echo $prev_arrow ?></div>

		</div>

			<div class="content-container">
				<?php echo $content_area ?>
			</div>

		</div>
	</section>

	<?php

endif;


