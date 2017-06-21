<?php
/**
 * Default code for a Statistics Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$statistics = get_row( 'statistics' );

//echo '<pre>';
//print_r( $statistics );
//echo '</pre>';

if ( $statistics ) {

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'statistics', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;

	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( $statistics['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );
	}

	if ( $statistics['add_section_styles'] ) {

		$custom_css = '
			' . $section_css . '
		';

		wp_enqueue_style( 'partials' );
		wp_add_inline_style( 'partials', $custom_css );

	}

	wp_enqueue_script( 'waypoints-js' );
	wp_enqueue_script( 'countup-js' );

	wp_enqueue_script(
		'data-counters',
		JS_DIR . '/data-counters.js',
		[ 'jquery', 'countup-js' ],
		CHILD_THEME_VERSION,
		true
	);



	/**
	 * Icon width
	 */
	$icon_width_1 = $statistics['icon_width_1'] ? : $statistics['icon_1']['width'] / 2 . 'px';
	$icon_width_2 = $statistics['icon_2_width'] ? : $statistics['icon_2']['width'] / 2 . 'px';
	$icon_width_3 = $statistics['icon_3_width'] ? : $statistics['icon_3']['width'] / 2 . 'px';


	/**
	 * Icon width
	 */
	$icon_suffix_1 = $statistics['icon_1_suffix'] ? : '';
	$icon_suffix_2 = $statistics['icon_2_suffix'] ? : '';
	$icon_suffix_3 = $statistics['icon_3_suffix'] ? : '';



} ?>

<section class = " <?php echo $ns . ' ' . $statistics['css_class']; ?> css row fc-statistics">
	<div class = "wrap">

		<?php if ( $statistics['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<div class="flex-wrap">
			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_1']['url'] ?>"
					     alt="<?php echo $statistics['icon_1']['alt'] ?>"
						 width="<?php echo $statistics['icon_1']['width'] / 2 ?>"
						 height="<?php echo $statistics['icon_1']['height'] / 2 ?>"
						 style="width: <?php echo $icon_width_1 ?>;">
				</div>
				<div class="data">
					<p class = "amount-wrap"><span class="amount" data-count><?php echo $statistics['amount_1']; ?></span><?php if ( $icon_suffix_1 ) : ?><span class="suffix"><?php echo $icon_suffix_1 ?></span><?php endif; ?></p>
					<p class = "sub-heading"><?php echo $statistics['subheading_1']; ?></p>
				</div>
			</article>

			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_2']['url'] ?>"
					     alt="<?php echo $statistics['icon_2']['alt'] ?>"
					     width="<?php echo $statistics['icon_2']['width'] / 2 ?>"
					     height="<?php echo $statistics['icon_2']['height'] / 2 ?>"
					     style="width: <?php echo $icon_width_2 ?>;">
				</div>
				<div class="data">
					<p class = "amount-wrap"><span class="amount" data-count><?php echo $statistics['amount_2']; ?></span><?php if ( $icon_suffix_2 ) : ?><span class="suffix"><?php echo $icon_suffix_2 ?></span><?php endif; ?></p>
					<p class = "sub-heading dark"><?php echo $statistics['subheading_2']; ?></p>
				</div>
			</article>

			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_3']['url'] ?>"
					     alt="<?php echo $statistics['icon_3']['alt'] ?>"
					     width="<?php echo $statistics['icon_3']['width'] / 2 ?>"
					     height="<?php echo $statistics['icon_3']['height'] / 2 ?>"
					     style="width: <?php echo $icon_width_3 ?>;">
				</div>
				<div class="data">
					<p class = "amount-wrap"><span class="amount" data-count><?php echo $statistics['amount_3']; ?></span><?php if ( $icon_suffix_3 ) : ?><span class="suffix"><?php echo $icon_suffix_3 ?></span><?php endif; ?></p>
					<p class = "sub-heading"><?php echo $statistics['subheading_3']; ?></p>
				</div>
			</article>
		</div>

	</div>
</section>
