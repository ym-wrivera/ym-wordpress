<?php
/**
 * Default code for a Content - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$full_width_content = get_row( 'full_width_content' );

//echo '<pre>';
//var_dump( $full_width_content );
//echo '</pre>';

if ( $full_width_content ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'full-width-content', false );
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

	$custom_css .= '

		';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css ); ?>

	<section class="<?php echo $ns . ' ' . $full_width_content['css_class']; ?> row css fc-full-width-content">
		<div class="wrap">

			<div class="content">
				<?php echo $full_width_content['full_width_content']; ?>
			</div>

		</div>
	</section>


<?php

endif;
