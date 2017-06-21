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

$cards = get_row( 'cards' );

//echo '<pre>';
//print_r( $cards );
//echo '</pre>';


if ( $cards ) :

	/**
	 * SVG width
	 */
	$svg_width_single = get_sub_field( 'svg_width_single' );
	$svg_width = $svg_width_single ? : 'auto';


	/**
	 * Checkbox option to add border bottom to cards
	 */
	$border = 0;
	$border_bottom = $cards['border_bottom'];

	if ( $border_bottom ) {
		$border = '5px solid #C1CE20';
	}


	/**
	 * BG Color
	 */
	$bg_color = '#ffffff';
	$is_bg_color = $cards['card_bg_color'] ? : $bg_color;


	/**
	 * Text Color
	 */
	$text_color = '#343F49';
	$is_text_color = $cards['text_color'] ?: $text_color;

	/**
	 * Overlay component vertically
	 */
	$offset = 0;
	$offset_container = $cards['offset_container'];

	if ( $offset_container ) {
		$offset = $offset_container;
	}


	/**
	 * Add Section Linking. This option wraps the card in a link
	 * that scrolls the user to a content image block somewhere
	 * on that page
	 */
	$add_section_linking = $cards['add_section_linking'];


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'cards', false );
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
	if ( $cards['add_section_styles'] ) {
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

	                ' . $ns_class . ' .flex-wrap {
                        transform: translateY(' . $offset . ');
                        margin-bottom: ' . $offset . ';
                    }

	                ' . $ns_class . ' .card-container {
                        background-color: ' . $is_bg_color . ';
                    }

 	                ' . $ns_class . ' .content-wrap .heading,
 	                ' . $ns_class . ' .entry-content {
                        color: ' . $is_text_color . ';
                    }

                 ';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );


	/**
	 * Enqueue equal heights js
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
		
				 var cardOptions = {
				     byRow: false,
	                 property: "height",
	                 target: null,
	                 remove: false
				 };
				 
				 $("' . $ns_class . ' .card-container").matchHeight(cardOptions);
		
                 $("' . $ns_class . ' .card-container figure").matchHeight(cardOptions);
                 
				 $("' . $ns_class . ' .card-container .entry-content").matchHeight(cardOptions);
                 
                 $("' . $ns_class . ' .card-container .heading").matchHeight(cardOptions);
			});'
	);



	/**
	 * Enqueue jquery.scrollto and localscroll
	 */
	wp_enqueue_script( 'scrollto' );
	wp_enqueue_script( 'localscroll' );

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
				$.localScroll({offset:{left: 0, top: -400}});
			});'
	);


	/**
	 * Enqueue SVG animation scripts
	 */

	if ( ! wp_script_is( 'scrollmagic' ) || wp_script_is( 'tweenmax' ) ) {

		wp_enqueue_style( 'custom-stylesheet' );

		wp_enqueue_script( 'tweenmax' );
		wp_enqueue_script( 'scrollmagic' );

		wp_enqueue_script( 'scrollmagic-animation' );
		//wp_enqueue_script( 'scrollmagicdebug' );

		wp_enqueue_script( 'app-hover' );
		wp_enqueue_script( 'app-scroll-animations' );

	}


	?>

	<section class="<?php echo $ns . ' ' . $cards['css_class'] . ' ' . $cards['card_type']; ?> css row cards">
		<div class="wrap">

			<?php if ( $cards['add_heading'] ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>


			<?php if ( have_rows( 'card' ) ) : ?>

				<div class="flex-wrap">

					<?php while ( have_rows( 'card' ) ) : the_row();

						$icon = get_sub_field( 'icon' );
						$heading = get_sub_field( 'heading' );
						$description = get_sub_field( 'description' );
						$align_description = get_sub_field( 'description_alignment' );
						$add_cta = get_sub_field( 'add_cta' );
						$buttons = get_sub_field( ' buttons' );

						$link_type = get_sub_field( 'link_type' );
						$link_to = get_sub_field( 'link' );

						$svg_css_id = get_sub_field( 'css_id' );
						$des_alignment = $align_description ? : 'center';


						if ( ! $add_section_linking ) : ?>

							<article id="<?php echo $svg_css_id ?>" class="card-container animated-icon-container"
							         style="border-bottom: <?php echo $border ?>">
								<main>

									<?php if ( $icon ) : ?>
										<figure>
											<img class="inline-svg svg-card"
											     src="<?php echo $icon['url']; ?>"
											     alt="<?php echo $icon['alt']; ?>"
											     width="<?php echo $icon['width'] / 2 ?>"
											     height="<?php echo $icon['height'] / 2 ?>">
										</figure>
									<?php endif; ?>

									<?php if ( $heading || $description || $add_cta ) : ?>
										<div class="content-wrap">

											<?php if ( $heading ) : ?>
												<h2 class="heading"><?php echo $heading; ?></h2>
											<?php endif; ?>

											<?php if ( $description ) : ?>
												<div class="entry-content"
												     style="text-align: <?php echo $des_alignment ?>;"><p style="margin-bottom: 0"><?php echo $description ?></p></div>
											<?php endif; ?>

											<?php if ( $add_cta ) : ?>
												<?php get_template_part( 'partials/parts/button', 'group' ); ?>
											<?php endif; ?>

										</div>
									<?php endif; ?>

								</main>
							</article>

						<?php else : ?>

						<a href="<?php echo $link_to ?>" class="card-container-link card-container"
						   style="border-bottom: <?php echo $border ?>">
							<article id="<?php echo $svg_css_id ?>">
								<main>
									<?php if ( $icon ) : ?>
										<figure class="svg-container-cards">
											<img class="inline-svg"
											     src="<?php echo $icon['url']; ?>"
											     alt="<?php echo $icon['alt']; ?>"
											     width="<?php echo $icon['width'] / 2 ?>"
											     height="<?php echo $icon['height'] / 2 ?>">
										</figure>
									<?php endif; ?>

									<?php if ( $heading || $description ) : ?>
										<div class="content-wrap">

											<?php if ( $heading ) : ?>
												<h2 class="heading"><?php echo $heading; ?></h2>
											<?php endif; ?>

											<?php if ( $description ) : ?>
												<div class="entry-content"
												     style="text-align: <?php echo $des_alignment ?>;"><p
															style="margin-bottom: 0"><?php echo $description ?></p></div>
											<?php endif; ?>

										</div>
									<?php endif; ?>

								</main>
							</article>
						</a>

						<?php endif; ?>

					<?php endwhile; ?>

				</div>

				<?php if ( $cards['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			<?php endif; ?>

		</div>

	</section>


	<?php

endif;
