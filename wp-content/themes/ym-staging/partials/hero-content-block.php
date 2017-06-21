<?php
/**
 * Default code for a Hero Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$hero = get_row( 'hero' );

//echo '<pre>';
//print_r( $hero );
//echo '</pre>';

if ( $hero ) {

	/**
	 * Animate heading text with type-ahead effect
	 */
	$animate_heading = get_sub_field( 'animate_typing' );


	/**
	 * Add second string checkbox
	 */
	$add_second_string = get_sub_field( 'add_second_string' );


	/**
	 * Add third string checkbox
	 */
	$add_third_string = get_sub_field( 'add_third_string' );


	/**
	 * Animated strings
	 */
	$animated_string_1 = $hero['animated_string_1'];
	$animated_string_2 = $hero['animated_string_2'];
	$animated_string_3 = $hero['animated_string_3'];
	$strings = '';

	if ( $animate_heading ) {
		$animated_string_1 = "$animated_string_1" ?: '';
		$strings .= '"' . $animated_string_1 . '"' . ', ';
	}

	if ( $add_second_string ) {
		$animated_string_2 = "$animated_string_2" ? : '';
		$strings .= '"' . $animated_string_2 . '"' . ', ';

	}

	if ( $add_third_string ) {
		$animated_string_3 = "$animated_string_3" ? : '';
		$strings .= '"' . $animated_string_3 . '"';
	}


	/**
	 * Animated Heading Color
	 */
	$animated_heading_color = get_sub_field( 'animated_heading_color' ) ?: '#fff';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'hero', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * CSS object from section styles ACF field
	 */
	$section_styles = '';


	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( $hero['add_section_styles'] ) {
		include_once locate_template( 'partials/parts/section-styles.php' );

		if ( ! empty( $section_css ) ) {
			$section_styles = $section_css ?: '';
		}
	}

	/**
	 * Unique Hero Styles
	 */
	$align_text = $hero['text_alignment'] ?: 'center';


	/**
	 * Height for video
	 */
	$video_height = $hero['video_height'] ?: 'auto';
	$video_css = '';


	if ( $hero['add_bg_video'] ) {
		$video_css = '

            ' . $ns_class . ' {
                height: ' . $video_height . ';
            }
            
            ' . $ns_class . ' video { max-width: none; }            
		';
	}

	$custom_css = '
	
			' . $section_styles . '
			
			' . $video_css . '
	
			' . $ns_class . ' .heading.animated {
                color: ' . $animated_heading_color . ';
                min-height: 100px;
            }
            	
			' . $ns_class . ' div.wrap .align-hero-text {
                text-align: center;
            }

			@media screen and (min-width: 40em) {
				' . $ns_class . ' div.wrap .align-hero-text {
                    text-align: ' . $align_text . ';
                }
			}
		';



	wp_enqueue_style( 'partials' );

	wp_add_inline_style( 'partials', $custom_css );


	/**
	 * Enqueue backstretch.js if a bg image is used
	 */
	//if ( isset( $css['background_image'] ) && ! wp_script_is( ' backstretch' ) && ! $hero['add_bg_video'] ) {
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


	/**
	 * If BG video, use vide-js
	 */
	if ( $hero['add_bg_video'] ) {
		wp_enqueue_script( 'vide-js' );

		wp_add_inline_script( 'app',
			'jQuery(document).ready(function($){
				      $("' . $ns_class . '").vide({
                          mp4: "' . $hero['mp4_path'] . '",
                          webm: "' . $hero['webm_path'] . '",
                          ogv: "' . $hero['ogv_path'] . '",
                          poster: "' . $hero['cover_image']['url'] . '"
                      }, {posterType: "jpg"});
			});'
		);
	}



	/**
	 * Enqueue iTyped.js and add inline script if animate heading
	 * checkbox is selected
	 */
	if ( $hero['animate_typing'] ) {

		wp_enqueue_script( 'images-loaded' );
		wp_enqueue_script( 'ityped' );

		wp_add_inline_script( 'app',
			'jQuery(document).ready(function($){
	
				  var heroContainer = document.querySelector("' . $ns_class . '");
                  var animatedElem = document.querySelector(".' . $ns . ' #ityped");

				  var itypedConfig = {
                      strings: [' . $strings . '],
                      typeSpeed:  200,
				      backSpeed:  75,
				      startDelay: 3000,
				      backDelay:  2000,
				      loop:       true,
				      showCursor: true,
				      cursorChar: "|",
				      onFinished: function(){},
                  }

                  imagesLoaded(heroContainer, {background: true}, function () {
                      window.ityped.init(animatedElem, itypedConfig);
                  });

                });'
		);
	}


	?>


	<section class="<?php echo $ns . ' ' . $hero['css_class'] . ' ' . $hero['hero_layout']; ?> css hero">
		<img style="display: none;" src="<?php echo $css['background_image']['url'] ?>" alt="<?php echo $css['background_image']['alt'] ?>">
		<div class="wrap">

			<div class="align-hero-text hero-content">

				<?php if ( $hero['add_heading'] ) :
					get_template_part( 'partials/parts/title', 'group' );
				endif; ?>

				<?php if ( $animate_heading ) : ?>
					<header class="fc-title-group">
						<h2 class="heading animated"><span id="ityped"></span></h2>
					</header>
				<?php endif; ?>

				<?php if ( $hero['add_video'] ) :
					get_template_part( 'partials/parts/video', 'fields' );
				endif; ?>

				<?php if ( $hero['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</div>

		</div>
	</section>

<?php

}
