<?php
/**
 * Default code for CTA Section group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$cta_section = get_field( 'cta_section', 'option' );

//echo '<pre>';
//print_r( $cta_section );
//echo '</pre>';


/**
 * Heading vars
 */
$headings = $cta_section['headings'];


/**
 * Button vars
 */
$button = $cta_section['buttons']; ?>

<section class="cta-section <?php echo $cta_section['cta_css_class']; ?>"
         style="background-color: <?php echo $cta_section['background_color']; ?>">
	<div class="wrap">

		<?php if ( $cta_section['add_heading'] ) : ?>
			<div class="fc-title-group">

				<?php if ( $headings['choose_heading'] ) : ?>
					<h1><?php echo $headings['heading']; ?></h1>
				<?php endif; ?>

				<?php if ( $headings['choose_subheading'] ) : ?>
					<h3 class="subheading"><?php echo $headings['subheading']; ?></h3>
				<?php endif; ?>

			</div>
		<?php endif; ?>

		<?php if ( $cta_section['add_cta'] ) : ?>
			<div class="button-group">
				<a href="<?php echo $button['url']; ?>" class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

				<?php if ( $button['add_another_cta'] ) : ?>
					<a href="<?php echo $button['second_button']['url']; ?>" class="<?php echo $button['second_button']['style'] . ' ' . $button['second_button']['size']; ?> button double-button"><?php echo $button['second_button']['text']; ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
