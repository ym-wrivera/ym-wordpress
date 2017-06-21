<?php
/**
 * Default code for Hero field group.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$hero = get_field( 'hero' );

//echo '<pre>';
//var_dump( $hero );
//echo '</pre>';

if ( $hero ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'single-hero', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	$padding = $hero['hero_padding'] ?: '';

	$bg = 'none';
	$bg_color = '#ffffff';
	$bg_type = $hero['hero_type'];
	$bg_img = $hero['bg_image'];

	$text_color = $hero['text_color'] ?: '#ffffff';


	if ( 'hero_image' === $bg_type ) {
		$bg = ( 'url(' . $bg_img['url'] . ')' ) ?: 'none';
	}

	if ( 'hero_color' === $bg_type ) {
		$bg_color = $hero['bg_color'] ?: $bg_color;
	}


	$custom_css = '                   				
					' . $ns_class . '.hero-bg {
						background-image: ' . $bg . ';
						background-color: ' . $bg_color . ';
						padding: ' . $padding . ';
					} 
                ';

	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );



	wp_enqueue_script( 'backstretch' );
	wp_localize_script(
		'app',
		'BackStretchImg',
		[ 'src' => $bg_img['url'] ]
	);

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
			$(".hero").backstretch();
		});'
	); ?>

<section class="<?php echo $ns . $hero['css_class'] ?> hero hero-bg">
	<div class="wrap">

		<div class="hero-content">

			<?php if ( $hero['heading'] ) : ?>
				<h1 style="color: <?php echo $text_color ?>;"><?php echo $hero['heading'] ?></h1>
			<?php endif; ?>

			<?php if ( $hero['add_phone'] ) :
				$phone_icon = '/wp-content/themes/ym/dist/images/phone.svg'; ?>

				<h6><a href="tel:<?php echo $hero['add_phone']; ?>"
				       target="blank"
				       style="color: <?php echo $text_color ?>;"><img class="phone-icon"
				                                                                        src="<?php echo $phone_icon; ?>"
				                                                                        width="30" height="30"/><?php echo $hero['phone']; ?></a></h6>
			<?php endif; ?>

			<?php if ( $hero['add_email'] ) :
				$email_icon = '/wp-content/themes/ym/dist/images/email.svg'; ?>

				<h6><a href="mailto:<?php echo $hero['add_email']; ?>"
				       target="blank"
				       style="color: <?php echo $text_color ?>;"><img class="email-icon"
				                                                                           src="<?php echo $email_icon; ?>"
				                                                                           width="30" height="20"/><?php echo $hero['email']; ?></a></h6>
			<?php endif; ?>

			<?php if ( $hero['add_cta'] ) :
				get_template_part( 'partials/parts/button', 'group' );
			endif; ?>

		</div>

	</div>
</section>


<?php endif;
