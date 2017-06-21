<?php
/**
 * Default code for Heading Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$heading_block = get_row( 'heading_block' );

//echo '<pre>';
//print_r( $heading_block );
//echo '</pre>';

if ( $heading_block ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'heading-cb', false );
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
	if ( $heading_block['add_section_styles'] ) {
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
	
			' . $ns_class . '.heading-container {
			}
		';


	/**
	 * Enqueue component CSS
	 */
	if ( ! wp_style_is( 'partials' ) ) {
		wp_enqueue_style( 'partials' );
	}
	
	wp_add_inline_style( 'partials', $custom_css );



	/**
	 * Enqueue backstretch.js if a bg image is used
	 */
	if ( isset( $css['background_image']['url'] ) && ! wp_script_is( ' backstretch' ) ) {
		wp_enqueue_script( 'backstretch' );
	}

	if ( isset( $css['background_image']['url'] ) ) {
		wp_localize_script(
			'app',
			'BackStretchImg',
			[ 'src' => $css['background_image'] ]
		);

		wp_add_inline_script( 'app',
			'jQuery(document).ready(function($){
				$("' . $ns_class . '").backstretch();
			});'
		);
	}

	?>


	<section class="<?php echo $heading_block['css_class'] . ' ' . $ns; ?> row css heading-block heading-container">
		<div class="wrap">

			<?php if ( $heading_block['add_heading'] ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

		</div>
	</section>

	<?php

endif;
