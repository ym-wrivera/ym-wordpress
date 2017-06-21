<?php
/**
 * Default code for Hero Slider. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$hero_slides = get_row( 'hero_slides' );


echo '<pre>';
echo print_r( $hero_slides );
echo '</pre>';


if ( $hero_slides ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'hero-slider', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;

	wp_enqueue_style( 'swiper-css' );

	wp_enqueue_script( 'swiper-js' );

	wp_add_inline_script(
		'swiper-js',
		'jQuery(document).ready(function($){
			var heroSwiper = new Swiper (".swiper-container", {
				pagination: ".swiper-pagination",
				paginationClickable: true,
				nextButton: ".button-next",
                prevButton: ".button-prev",
                spaceBetween: 30,
                height: "500px"
            })
        });'
	);

	wp_enqueue_script( 'backstretch' );

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
				$(".swiper-slide").backstretch();
			});'
	);

	$custom_css = '
                ';

	wp_add_inline_style( 'swiper-css', $custom_css ); ?>


	<section class="<?php echo $ns . ' ' . $hero_slides['css_class'] ?> fc-hero-slider">

		<div class="swiper-container">
			<div class="swiper-wrapper">

				<?php while ( have_rows( 'hero_slides' ) ) : the_row();

					// Background
					$bg_type = get_sub_field( 'bg_type' );

					$bg_img = get_sub_field( 'background_image' );
					$bg_color = get_sub_field( 'background_color' );

					// Image
					if ( 'image' === $bg_type ) {
						$slide_bg = 'background: url( ' . $bg_img['url'] . ') no-repeat;';
					} else {
						$slide_bg = 'background-color: ' . $bg_color . ';';
					}

					$slide_image = get_sub_field( 'slide_image' ); ?>

					<div class="swiper-slide" style="<?php echo $slide_bg ?>">
						<div class="wrap">

								<div class="slide-content">
									<?php if ( get_sub_field( 'add_heading' ) ) :
										get_template_part( 'partials/parts/title', 'group' );
									endif; ?>

									<?php if ( get_sub_field( 'add_cta' ) ) :
										get_template_part( 'partials/parts/button', 'group' );
									endif; ?>
								</div>

						</div>
					</div>


				<?php endwhile; ?>

			</div>

			<div class="swiper-pagination"></div>
			<div class="button-next"></div>
			<div class="button-prev"></div>

		</div>
	</section>

	<?php

endif;


