<?php
/**
 * Default code for Slider field group. Disabled by default
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$slides = get_field( 'blog_slides', get_option( 'page_for_posts' ) );



/**
 * Left and Right Arrows
 */
$prev_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24"><path class="slider-arrow" fill="#FFF" fill-rule="evenodd" d="M4.894 11.99l7.74 8.55 1.005 1.11-2.225 2.014-1.007-1.112-8.6-9.5-1.055-.957.095-.106-.095-.106 1.056-.957 8.338-9.213L11.155.602l2.224 2.013-1.007 1.112-7.48 8.262z"/></svg>';
$next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24"><path class="slider-arrow" fill="#FFF" fill-rule="evenodd" d="M9.038 12.01l-7.74-8.55L.294 2.35 2.517.335l1.007 1.112 8.6 9.5 1.055.957-.096.106.095.106-1.057.957-8.34 9.213-1.006 1.112-2.224-2.013 1.006-1.112 7.478-8.262z"/></svg>';



/**
 * Arrow color
 */
$arrow_color = get_field( 'blog_arrow_color', get_option( 'page_for_posts' ) );
$is_arrow_color = $arrow_color ? : '#fff';



if ( have_rows( 'blog_slides', get_option( 'page_for_posts' ) ) ) :

	wp_enqueue_style( 'swiper-css' );

	wp_enqueue_script( 'swiper-js' );

	wp_add_inline_script(
		'swiper-js',
		'jQuery(document).ready(function($){
			var mySwiper = new Swiper (".swiper-container", {
				pagination: ".swiper-pagination",
				paginationClickable: true,
				nextButton: ".button-next",
                prevButton: ".button-prev"
            }) 
        });'
	);

	$custom_css = '
	
			.slider-arrow {
			    fill: ' . $is_arrow_color . ';
			 }

			 
			span.swiper-pagination-bullet {
				background-color: ' . $is_arrow_color . ';
			}

	
            @media all and (min-width: 50em) {
                .align-right {
                    order: 2;
                    transform: translate(60px, -10px);
                }
            }
    ';

	wp_add_inline_style( 'swiper-css', $custom_css );


	/**
	 * Prevent uneven posts by making sure we have even heights set. This
	 * prevents a long title/excerpt from making the component look out of
	 * place.
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
				  $(".slide-content").matchHeight({
				      byRow: false,
                      property: "height",
                      target: null,
                      remove: false
                  });
                  
                  $(".swiper-slide").matchHeight({
				      byRow: false,
                      property: "height",
                      target: null,
                      remove: false
                  });                  
			});'
	);




	?>

<div class="slider-group">

	<div class="swiper-container">
		<div class="swiper-wrapper">


			<?php while ( have_rows( 'blog_slides', get_option( 'page_for_posts' ) ) ) : the_row();

				// Background
				$bg_type = get_sub_field( 'bg_type' );

				$bg_img = get_sub_field( 'background_image' );
				$bg_color = get_sub_field( 'background_color' );

				// Image
				if ( 'image' === $bg_type ) {
					$slide_bg = 'background-image: url( ' . $bg_img['url'] . ');';
				} else {
					$slide_bg = 'background-color: ' . $bg_color . ';';
				}

				$slide_image = get_sub_field( 'image' );

				// Align Content
				$align_content = get_sub_field( 'align_content' );
				$align_right = 'align-right';

				if ( 'right' !== $align_content ) {
					$align_right = '';
				} ?>

				<div class="swiper-slide" style="<?php echo $slide_bg; ?>">
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

							<?php if ( $slide_image['url'] ) : ?>
								<figure>
									<img src="<?php echo $slide_image['url'] ?>"
									     alt="<?php echo $slide_image['alt'] ?>"
									     width="<?php echo $slide_image['width'] / 2 ?>"
									     height="<?php echo $slide_image['height'] / 2 ?>">
								</figure>
							<?php endif; ?>
						</div>

					</div>
				</div>


			<?php endwhile; ?>

		</div>

		<div class="swiper-pagination"></div>
		<div class="button-next"><?php echo $next_arrow ?></div>
		<div class="button-prev"><?php echo $prev_arrow ?></div>

	</div>
</div>

<?php

endif;



