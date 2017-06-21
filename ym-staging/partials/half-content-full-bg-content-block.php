<?php
/**
 * Default code for Half Content - Full BG Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$half_n_full_bg = get_row( 'half_content_bg' );

//echo '<pre>';
//print_r( $half_n_full_bg );
//echo '</pre>';

if ( $half_n_full_bg ) :

	/**
	 * BG Color for mobile views
	 */
	$bg_color = $half_n_full_bg['background_color'] ?: '#1eaeb4';

	/**
	 * Set defaults on content block layout options
	 */
	$content_order = 'left' === $half_n_full_bg['content_alignment'] ? 'content-left' : 'content-right';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'fullbg', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';
	$bg_image = 'none';


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

		$bg_image = $css['background_image']['url'];
	}

	$custom_css .= '
			
		' . $ns_class . '.css {
			background-image: none;
		}
		
		@media (min-width: 50em) {
			' . $ns_class . '.css {
				background-image: url(' . $bg_image . ');
			}
		}
	
	
	';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );

	wp_add_inline_style( 'partials', $custom_css );


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
	//}

	?>


	<section class="<?php echo $ns . ' ' . $half_n_full_bg['css_class']; ?> css row fc-half-full-bg"
			 style="background-color: <?php echo $bg_color ?>">
		<div class="wrap">

			<main id="align-content" class="<?php echo $content_order ?> flex-wrap">
				<article id="align-text-content" itemscope="" itemtype="http://schema.org/CreativeWork">

					<?php if ( $half_n_full_bg['add_heading'] ) :
						get_template_part( 'partials/parts/title', 'group' );
					endif; ?>

					<?php if ( $half_n_full_bg['content'] ) : ?>
						<div class="entry-content" id="<?php echo $half_n_full_bg['link_to_id'] ?>">
							<?php echo $half_n_full_bg['content'] ?>
						</div>
					<?php endif; ?>

					<?php if ( $half_n_full_bg['add_cta'] ) :
						get_template_part( 'partials/parts/button', 'group' );
					endif; ?>

				</article>
			</main>

		</div>
	</section>


	<?php

endif;
