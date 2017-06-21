<?php
/**
 * Default code for a Three Columns Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$three_columns = get_row( 'three_columns' );

//echo '<pre>';
//print_r( $statistics );
//echo '</pre>';

if ( $three_columns ) :

	/**
	 * SVG Width
	 */
	$icon_width_1 = $three_columns['column_svg_width_1'] ? : $three_columns['column_icon_1']['width'] / 2 . 'px';
	$icon_width_2 = $three_columns['column_svg_width_2'] ? : $three_columns['column_icon_2']['width'] / 2 . 'px';
	$icon_width_3 = $three_columns['column_svg_width_3'] ? : $three_columns['column_icon_3']['width'] / 2 . 'px';

	/**
	 * Column BG Colors
	 */
	$column_bg_1 = $three_columns['column_bg_1'] ?: '#343f49';
	$column_bg_2 = $three_columns['column_bg_2'] ?: '#1eaeb4';
	$column_bg_3 = $three_columns['column_bg_3'] ?: '#c1ce20';

	/**
	 * Column margins
	 */
	$margin_1 = $three_columns['column_margin_1'] ? : '';
	$margin_2 = $three_columns['column_margin_2'] ? : '';
	$margin_3 = $three_columns['column_margin_3'] ? : '';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'three-columns', false );
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
	if ( $three_columns['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}


	//$custom_css .= '
	//	';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );


	if ( isset( $css['background_image']['url'] ) ) {
		wp_enqueue_script( 'backstretch' );
		wp_localize_script(
			'app',
			'BackStretchImg',
			['src' => $css['background_image']]
		);

		wp_add_inline_script( 'app',
			'jQuery(document).ready(function($){
				$("' . $ns_class . '").backstretch();
			});'
		);
	}



	?>

	<section class=" <?php echo $ns . ' ' . $three_columns['css_class']; ?> css row fc-three-columns">
			<div class="wrap">

				<article class="columns" style="background-color: <?php echo $column_bg_1 ?>">
					<div class="column-wrap" style="margin: <?php echo $margin_1 ?>;">
						<figure class="column-icon">
							<img src="<?php echo $three_columns['column_icon_1']['url'] ?>"
							     alt="<?php echo $three_columns['column_icon_1']['alt'] ?>"
							     width="<?php echo $three_columns['column_icon_1']['width'] / 2 ?>"
							     height="<?php echo $three_columns['column_icon_1']['height'] / 2 ?>"
							     style="width: <?php echo $icon_width_1 ?>;">
						</figure>

						<div class="description">
							<?php echo $three_columns['column_description_1'] ?>
						</div>
					</div>
				</article>

				<article class="columns" style="background-color: <?php echo $column_bg_2 ?>">
					<div class="column-wrap" style="margin: <?php echo $margin_2 ?>;">

						<figure class="column-icon">
							<img src="<?php echo $three_columns['column_icon_2']['url'] ?>"
							     alt="<?php echo $three_columns['column_icon_2']['alt'] ?>"
							     width="<?php echo $three_columns['column_icon_2']['width'] / 2 ?>"
							     height="<?php echo $three_columns['column_icon_2']['height'] / 2 ?>"
							     style="width: <?php echo $icon_width_2 ?>;">
						</figure>

						<div class="description">
							<?php echo $three_columns['column_description_2'] ?>
						</div>
					</div>
				</article>

				<article class="columns" style="background-color: <?php echo $column_bg_3 ?>">
					<div class="column-wrap" style="margin: <?php echo $margin_3 ?>;">

						<figure class="column-icon">
							<img src="<?php echo $three_columns['column_icon_3']['url'] ?>"
							     alt="<?php echo $three_columns['column_icon_3']['alt'] ?>"
							     width="<?php echo $three_columns['column_icon_3']['width'] / 2 ?>"
							     height="<?php echo $three_columns['column_icon_3']['height'] / 2 ?>"
							     style="width: <?php echo $icon_width_3 ?>;">
						</figure>

						<div class="description">
							<?php echo $three_columns['column_description_3'] ?>
						</div>
					</div>
				</article>

			</div>
	</section>


	<?php

endif;
