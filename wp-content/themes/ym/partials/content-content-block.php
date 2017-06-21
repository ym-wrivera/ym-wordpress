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

$content = get_row( 'content' );

//echo '<pre>';
//var_dump( $content );
//echo '</pre>';

if ( $content ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'content-block', false );
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
	if ( $content['add_section_styles'] ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}


	$custom_css .= '
		';

	wp_add_inline_style( 'partials', $custom_css ); ?>

	<section class="<?php echo $ns . ' ' . $content['css_class']; ?> row css fc-content">
		<div class="wrap">

			<?php if ( $content['add_icon'] ) :
				get_template_part( 'partials/parts/icon', 'group' );
			endif; ?>

			<?php if ( $content['add_heading'] ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<article class="content-wrap">

				<?php if ( $content['content_area'] ) : ?>
					<?php echo $content['content_area']; ?>
				<?php endif; ?>

				<?php if ( $content['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</article>

		</div>
	</section>


<?php

endif;
