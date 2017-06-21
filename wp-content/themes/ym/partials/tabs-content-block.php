<?php
/**
 * Default code for a Tabs Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$tabs = get_row( 'tabs' );

//echo '<pre>';
//print_r( $statistics );
//echo '</pre>';

if ( $tabs ) :

	/**
	 * Tab BG Color
	 */
	$tab_link_bg_color = $tabs['tab_link_bg_color'];
	$is_tab_link_bg_color = $tab_link_bg_color ?: '#f7f7f7';


	/**
	 * Tab Link Color
	 */
	$tab_link_color = $tabs['tab_link_color'];
	$is_tab_link_color = $tab_link_color ? : '#343F49';


	/**
	 * Tab Link Color
	 */
	$tab_link_active_color = $tabs['tab_link_active_color'];
	$is_tab_link_active_color = $tab_link_active_color ? : '#343F49';


	/**
	 * Tab BG color
	 */
	$tab_bg_color = $tabs['tab_bg_color'];
	$tab_bg = $tab_bg_color ? : '#1EAEB4';


	/**
	 * Layout is full width or half content/half image
	 */
	$layout = $tabs['layout'];



	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';


	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'tabs', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


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
			' . $ns_class . ' .dd-tabs .tab-link {
				background-color: ' . $is_tab_link_bg_color . ';
				color: ' . $is_tab_link_color . ';
			}
			
			' . $ns_class . ' .dd-tabs .tab-link.is-active,
			' . $ns_class . ' .dd-tabs .tab-link:hover {
				color: ' . $is_tab_link_active_color . ';
			}
			
			' . $ns_class . ' .dd-tab {
				background-color: ' . $tab_bg . ';
			}
	';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );



	wp_enqueue_script( 'tabs-js' );
	wp_add_inline_script( 'tabs-js',
		'jQuery(document).ready(function($){
			var componentTabs = tabs({
				el: "#tabs",
				tabNavigationLinks: ".tab-link",
				tabContentContainers: ".dd-tab"
			});
			
			componentTabs.init();
		});'
	);



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

	<section class=" <?php echo $ns . ' ' . $tabs['css_class'] . ' ' . $layout ?> css row fc-tabs">
		<div class="wrap">

			<?php if ( have_rows( 'tabs' ) ) : ?>

				<?php $count = 0; ?>

				<div id="tabs" class="dd-tabs no-js">
					<div class="dd-tabs-nav">

						<?php while ( have_rows( 'tabs' ) ) : the_row();

							$tab_link = get_sub_field( 'tab_link' );

							$add_icon = get_sub_field( 'add_icon' );
							$tab_link_icon = get_sub_field( 'tab_link_icon' );

							$add_image = get_sub_field( 'add_image' );
							$tab_image = get_sub_field( 'tab_image' );

							$tab_content = get_sub_field( 'tab_content' ); ?>

							<?php if ( $add_icon ) : ?>
								<a href="#" class="tab-link <?php if ( ! $count ) { echo 'is-active'; } ?>">
									<img src="<?php echo $tab_link_icon['url'] ?>"
									     alt="<?php echo $tab_link_icon['alt'] ?>"
									     width="<?php echo $tab_link_icon['width'] / 2 ?>"
									     height="<?php echo $tab_link_icon['height'] / 2 ?>">
									<span><?php echo $tab_link ?></span>
								</a>
							<?php else : ?>

								<a href="#" class="tab-link <?php if ( ! $count ) { echo 'is-active'; } ?>">
									<?php echo $tab_link ?>
								</a>

							<?php endif; ?>

							<?php $count++ ?>

						<?php endwhile; ?>

					</div>

					<?php $count = 0; ?>

					<?php while ( have_rows( 'tabs' ) ) : the_row(); ?>

						<?php $tab_content = get_sub_field( 'tab_content' ); ?>
						<?php $tab_image = get_sub_field( 'tab_image' ); ?>

						<div class="<?php if ( ! $count ) { echo 'is-active'; } ?> dd-tab">

							<?php if ( 'half-and-half' === $layout ) : ?>

							<div class="tab-content"><?php echo $tab_content ?></div>

							<?php if ( $add_image ) : ?>
								<figure class="tab-image">
									<img src="<?php echo $tab_image['url'] ?>" alt="<?php echo $tab_image['alt'] ?>" width="<?php echo $tab_image['width'] / 2 ?>" height="<?php echo $tab_image['height'] / 2 ?>">
								</figure>
							<?php endif; ?>

							<?php else : ?>

							<div class="tab-content"><?php echo $tab_content ?></div>

							<?php endif; ?>

						</div>

						<?php $count++ ?>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

		</div>
	</section>

	<?php

endif;
