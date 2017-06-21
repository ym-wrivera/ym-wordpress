<?php
/**
 * Default code for video fields.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


/**
 * Can be used in repeater/flexible content or regular field group
 */
$add_video = get_sub_field( 'add_video' ) ? : get_field( 'add_video' );
$video = get_sub_field( 'wistia_video' ) ? : get_field( 'wistia_video' );

//echo '<pre>';
//var_dump( $video );
//echo '</pre>';


if ( $add_video ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'video-fields', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;

	$play_btn_color = $video['default_play_btn_color'] ?: '#ffffff';

	$custom_css = '
                
                ' . $ns_class . ' #fill-color,
                ' . $ns_class . ' #outer-layer {
                    fill: ' . $play_btn_color . ';
                }
                
                ' . $ns_class . ' #label {
                    color: ' . $play_btn_color . ';
                    margin-bottom: 0;
                }

           ';


	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );



	/**
	 * Wistia Dynamic ID
	 */
	$wistia_id = $video['wistia_id'];
	$wistia_dynamic_css = "wistia_async_$wistia_id";

	$play_button_type = $video['play_button_type'];

	$play_btn_round = '/wp-content/themes/ym/dist/images/play-button.svg';
	$play_btn_square = '/wp-content/themes/ym/dist/images/play-btn-square.svg';

	$play_btn_src = 'play-btn-square' === $play_button_type ? $play_btn_square : $play_btn_round;

	$play_btn_label = $video['play_button_label'] ?: 'Play Video';
	

	/**
	 * Enqueue Wistia's E-v1.js if it's not already available. And
	 * custom video script. Loaded with async attributes.
	 */
	if ( ! wp_script_is( 'wistia' ) ) {

		$wistia_url = "//fast.wistia.com/embed/medias/$wistia_id.jsonp";

		wp_register_script(
			'wistia-id',
			$wistia_url,
			[ 'wistia' ],
			CHILD_THEME_VERSION,
			true
		);

		wp_enqueue_script( 'wistia' );
		wp_enqueue_script( 'wistia-id' );
	} ?>


<div class="<?php echo $ns . ' ' . $wistia_dynamic_css ?> play-btn-container play-container wistia_embed popover=true popoverContent=html" style="display: inline-block; white-space: nowrap; max-width: 80px;">

	<a href="#" title="Play video">
		<img class="inline-svg play-btn"
		     src="<?php echo $play_btn_src ?>"
		     alt="Play video">
		<p id="label"><?php echo $play_btn_label ?></p>
	</a>

</div>


<?php

endif;
