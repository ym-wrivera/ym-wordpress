<?php
/**
 * Default code for Logo Slider - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 */

$logos = get_row( 'logo_slider' );

//echo '<pre>';
//print_r( $logos );
//echo '</pre>';

if ( have_rows( 'logos' ) ) :


	wp_enqueue_style( 'swiper-css' );
	wp_enqueue_script( 'swiper-js' );

	wp_add_inline_script(
		'swiper-js',
		'jQuery(document).ready(function($){
			var logoSwiper = new Swiper (".logo-swiper-container", {
				preloadImages: false,
				lazyLoading: true,
                //pagination: ".swiper-logo-pagination",
                //paginationClickable: true,
                autoplay: 2000,
                slidesPerView: 6,
                spaceBetween: 50,
                loop: true,
                breakpoints: {
                    500: {
                        slidesPerView: 2,
                        spaceBetween: 25
                    },
                    860: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    }
                }
            }) 
        });'
	);


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'logo-slider', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;

	$logo_padding = $logos['slider_padding'] ?: 0;

	$custom_css_logo = '
				' . $ns_class . '.logo-container {
					padding: ' . $logo_padding . ';
				}
			';

	wp_add_inline_style( 'partials', $custom_css_logo ); ?>


	<section class="<?php echo $ns . ' ' . $logos['css_class']; ?> row fc-logo-slider logo-container">
		<div class="wrap">

			<?php if ( $logos['add_heading'] ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<div class="logo-swiper-container">
				<div class="swiper-wrapper">

					<?php while ( have_rows( 'logos' ) ) : the_row();

						$logo = get_sub_field( 'logo' );
						$add_link = get_sub_field( 'add_a_link' );
						$link = get_sub_field( 'url' ); ?>

						<?php if ( $logo ) : ?>

							<div class="swiper-slide">

								<?php if ( $add_link ) : ?>
									<a class="link" href="<?php echo $link ?>>" title="<?php echo $logo['alt'] ?>">
								<?php endif; ?>

								<img class="swiper-lazy" data-src="<?php echo $logo['url']; ?>"
								     alt="<?php echo $logo['alt']; ?>"
								     width="<?php echo $logo['width'] / 2 ?>"
								     height="<?php echo $logo['height'] / 2 ?>">

								<?php if ( $add_link ) :
									echo '</a>';
								endif; ?>

							</div>

						<?php endif; ?>

					<?php endwhile; ?>

				</div>

				<div class="swiper-logo-pagination"></div>

			</div>

		</div>
	</section>

<?php endif; ?>
