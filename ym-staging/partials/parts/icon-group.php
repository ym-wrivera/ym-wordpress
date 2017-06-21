<?php
/**
 * Default code for Icon field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

/**
 * Can be used in repeater/flexible content or regular field group
 */
$icon = get_sub_field( 'icon' ) ? : get_field( 'icon' );
$add_icon = get_sub_field( 'add_icon' ) ? : get_field( 'add_icon' );

//echo '<pre>';
//var_dump( get_fields() );
//echo '</pre>';


if ( $add_icon ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'icon-group', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Icon width depends on whether or not it's an svg.
	 */
	$icon_width = $icon['icon_width'] ?: $icon['icon']['width'] / 2 . 'px';


	$icon_css = '
                ' . $ns_class . ' .icon-width {
                    width: ' . $icon_width . ';
                }
           ';


	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $icon_css ); ?>



	<figure class="<?php echo $ns ?>">
		<img class="icon-width icon"
		     src="<?php echo $icon['icon']['url']; ?>"
		     alt="<?php echo $icon['icon']['alt']; ?>"
		     width="<?php echo $icon['icon']['width'] / 2 ?>"
		     height="<?php echo $icon['icon']['height'] / 2 ?>">
	</figure>


<?php

endif;
