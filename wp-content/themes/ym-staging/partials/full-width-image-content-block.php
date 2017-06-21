<?php
/**
 * Default code for Full Width Image - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


$full_width_img = get_row( 'full_width_image' );

//echo '<pre>';
//print_r( $full_width_img );
//echo '</pre>';

if ( $full_width_img ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'full-width-image', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Overlay component vertically
	 */
	$offset = 0;
	$offset_container = $full_width_img['offset_container'];

	if ( $offset_container ) {
		$offset = $offset_container;
	}


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
			' . $ns_class . ' figure {
                transform: translateY(' . $offset . ');
                margin-bottom: ' . $offset . ';
			}
	';


	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css ); ?>


	<section class="<?php echo $ns . ' ' . $full_width_img['css_class']; ?> css row fc-full-width-image fw-img-container">
		<div class="wrap">
			<figure>
				<img src="<?php echo $full_width_img['full_width_img']['url'] ?>"
				     alt="<?php echo $full_width_img['full_width_img']['alt'] ?>"
				     width="<?php echo $full_width_img['full_width_img']['width'] / 2 ?>"
				     height="<?php echo $full_width_img['full_width_img']['height'] / 2 ?>"
				     class="svg-card">
			</figure>
		</div>
	</section>


	<?php

endif;
