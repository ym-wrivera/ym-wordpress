<?php
/**
 * Default code for Sprinkles Overlay - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


$sprinkles = get_row( 'sprinkles_overlay' );

//echo '<pre>';
//print_r( $sprinkles );
//echo '</pre>';


if ( $sprinkles['add_overlay'] ) :

	/**
	 * Overlay component vertically
	 */
	$offset = 0;
	$offset_container = $sprinkles['offset_container'];

	if ( $offset_container ) {
		$offset = $offset_container;
	}

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'sprinkles', false );
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
	
			' . $ns_class . '.sprinkles-overlay {
                transform: translateY(' . $offset . ');
                margin-bottom: ' . $offset . ';
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
	 * Enqueue animation script
	 */
	wp_enqueue_script( 'app-svg' );


	/**
	 * SVG URL
	 */
	$svg_url = ANIMATIONS_DIR . '/svg/sprinkles-optim.svg'; ?>


	<div class="<?php echo $ns . ' ' . $sprinkles['css_class'] ?> css row css svg-container svg-container-sprinkles sprinkles-overlay">
		<img class="svg inline-svg" src="<?php echo $svg_url ?>">
	</div>

	<?php


endif;

