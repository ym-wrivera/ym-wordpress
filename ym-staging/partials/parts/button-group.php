<?php
/**
 * Default code for Buttons field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$button = get_sub_field( 'buttons' ) ? : get_field( 'buttons' );

$add_cta = get_sub_field( 'add_cta' ) ? : get_field( 'add_cta' );

$svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" id="green-arrow"><path fill="#C1CE20" fill-rule="evenodd" d="M19.702 6.506L13.652.26c-.34-.347-.886-.347-1.223 0-.34.35-.34.914 0 1.262l4.616 4.766H.87c-.48 0-.87.402-.87.898 0 .495.39.898.87.898h16.178l-4.62 4.766c-.336.348-.336.913 0 1.26.34.348.886.35 1.223 0l6.056-6.247c.018-.016.04-.02.056-.037.028-.028.028-.067.05-.097.074-.097.127-.2.158-.31.01-.045.02-.08.023-.127.037-.266-.03-.545-.23-.75-.017-.017-.04-.023-.057-.04z"/></svg>';

//echo '<pre>';
//print_r( $button );
//echo '</pre>';


if ( $add_cta ) :

	$button_size = $button['size'];
	$link_target = $button['target'];
	$target = $link_target ? '_blank' : '_self';
?>

<div class="button-group">

	<?php if ( 'text-link' === $button_size ) : ?>

		<a href="<?php echo $button['url']; ?>"
		   class="<?php echo $button['style'] . ' arrow-text-link' ?>"
		   target="<?php echo $target ?>"><?php echo $button['text']; ?><span class="arrow-link"><?php echo $svg_arrow ?></span></a>

	<?php endif; ?>

	<?php if ( 'text-link' !== $button_size ) : ?>

		<a href="<?php echo $button['url']; ?>"
		   class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

	<?php endif; ?>

	<?php endif; ?>


	<?php if ( $button['add_another_cta'] ) :

		$second_button = $button['second_button'];
		$second_button_size = $second_button['size'];

		$second_link_target = $second_button['target'];
		$second_target = $second_link_target ? '_blank' : '_self'; ?>

		<?php if ( 'text-link' === $second_button_size ) : ?>

		<a href="<?php echo $button['second_button']['url']; ?>"
		   class="<?php echo $button['second_button']['style'] . ' arrow-text-link' ?>"
		   target="<?php echo $second_target ?>"><?php echo $button['second_button']['text']; ?><span class="arrow-link"><?php echo $svg_arrow ?></span></a>

	<?php endif; ?>


		<?php if ( 'text-link' !== $second_button_size ) : ?>

		<a href="<?php echo $button['second_button']['url']; ?>"
		   class="<?php echo $button['second_button']['style'] . ' ' . $button['second_button']['size']; ?> button double-button"><?php echo
			$button['second_button']['text']; ?></a>


	<?php endif; ?>

	<?php endif; ?>

</div>
