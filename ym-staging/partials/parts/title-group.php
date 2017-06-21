<?php
/**
 * Default code for Title field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

/**
 * Can be used in repeater/flexible content or regular field group
 */
$headings = get_sub_field( 'headings' ) ? : get_field( 'headings' );
$add_heading = get_sub_field( 'add_heading' ) ? : get_field( 'add_heading' );

//echo '<pre>';
//var_dump( $headings );
//echo '</pre>';


if ( $add_heading ) :
	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'title-group', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Grab elements
	 */
	$heading_el = $headings['heading_element'] ?: '';
	$subheading_el = $headings['subheading_element'] ? : '';


	/**
	 * Is this a hero heading/subheading?
	 */
	$hero_heading = $headings['hero_heading_size'];
	$hero_subheading = $headings['hero_subheading_size'];

	$is_hero_heading = $hero_heading ? 'hero-heading' : '';
	$is_hero_subheading = $hero_subheading ? 'hero-subheading' : '';

	/**
	 * Is this a large hero heading/subheading?
	 */
	$hero_heading_large = $headings['hero_heading_large_size'];
	$hero_subheading_large = $headings['hero_subheading_large_size'];

	$is_hero_heading_large = $hero_heading_large ? 'hero-heading-large' : '';
	$is_hero_subheading_large = $hero_subheading_large ? 'hero-subheading-large' : '';

	/**
	 * Build h1-h6 selector for heading
	 */
	if ( ! empty( $heading_el ) ) {
		$el = '<' . $heading_el . ' class="heading ' . $is_hero_heading . ' ' . $is_hero_heading_large . '">';
	}

	if ( ! empty( $heading_el ) ) {
		$closing_el = '</' . $heading_el . '>';
	}


	/**
	 * Build h1-h6 selectors for subheading
	 */
	if ( ! empty( $subheading_el ) ) {
		$sub_el = '<' . $subheading_el . ' class="subheading ' . $is_hero_subheading . ' ' . $is_hero_subheading_large . '">';
	}

	if ( ! empty( $subheading_el ) ) {
		$closing_sub_el = '</' . $subheading_el . '>';
	}

	/**
	 * Content
	 */
	$heading_text = $headings['heading'];
	$subheading_text = $headings['subheading'];

	/**
	 * Margins
	 */
	$margin = $headings['heading_margin'] ?: '';
	$sub_margin = $headings['subheading_margin'] ?: '';

	/**
	 * Color
	 */
	$text_color = $headings['heading_text_color'] ?: '#343F49';
	$subheading_text_color = $headings['subheading_text_color'] ?: 'currentcolor';

	/**
	 * Custom CSS
	 */
	$custom_css = '
                ' . $ns_class . ' ' . $heading_el . ' {
                    color: ' . $text_color . ';
                    margin: ' . $margin . ';
                }

                ' . $ns_class . ' ' . $subheading_el . ' {
                    color: ' . $subheading_text_color . ';
                    margin: ' . $sub_margin . ';

                }
           ';

	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css ); ?>

	<header class="<?php echo $ns; ?> fc-title-group">

		<?php

		if ( ! empty( $el ) && ! empty( $closing_el ) ) {
			echo $el . $heading_text . $closing_el;
		}

		if ( $subheading_text && $headings['add_subheading'] ) {
			echo $sub_el . $subheading_text . $closing_sub_el;
		}

		?>

	</header>

	<?php

endif;
