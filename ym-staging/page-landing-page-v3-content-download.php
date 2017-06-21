<?php
/**
 * Landing Page V3 - Content Download Template
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */

/**
 * Template Name: Landing Page - Content Download V3
 * Template Post Type: page, post, landingpages, landing_pages, company_event, career_event, webinars, whitepapers, videos, infographics, casestudy, product
 */

namespace DevDesigns\YM;


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class( $classes ) {
	$css_class = '';

	if ( get_field( 'green_form_bg' ) ) {
		$css_class = 'form-has-bg';
	}

	return array_merge( $classes, [ 'landing-page', 'v3-landing-page', $css_class ] );
}


/**
 * Move Breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 25 );


/**
 * Add opening div for breadcrumb wrapper
 */
add_action( 'genesis_after_header', function () {
	echo '<section class="breadcrumb-wrapper"><div class="wrap">';
}, 20 );


/**
 * Add closing div for breadcrumb wrapper
 */
add_action( 'genesis_after_header', function () {
	echo '</div></section>';
}, 30 );



/**
 * Remove Entry Header
 */
remove_all_actions( 'genesis_entry_header' );



add_action( 'genesis_before_content', __NAMESPACE__ . '\add_entry_header', 5 );
/**
 * Add Entry Header/Page Title
 */
function add_entry_header() {
	if ( ! get_field( 'add_entry_header' ) ) {
		return;
	} ?>

	<section class="entry-header">
		<h1><?php echo the_field( 'lp_heading' ); ?></h1>
		<h2><?php echo the_field( 'lp_subheading' ); ?></h2>
	</section>

	<?php
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_key_points', 5 );
/**
 * Add Key Points
 */
function add_key_points() {
	if ( ! get_field( 'add_key_points' ) ) {
		return;
	}

	$points = get_field( 'points' );
	$heading_text_color = get_field( 'heading_text_color' ) ? : '#343F49';
	$body_text_color = get_field( 'body_text_color' ) ? : '#343F49'; ?>

	<section class="key-points">
		<div class="wrap">

			<?php if ( get_field( 'add_heading' ) ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<?php if ( have_rows( 'points' ) ) : ?>

				<div class="point-inner-wrap">

					<?php while ( have_rows( 'points' ) ) : the_row();

						$icon = get_sub_field( 'icon' );
						$icon_width = get_sub_field( 'icon_width' );
						$icon_heading = get_sub_field( 'heading' );
						$description = get_sub_field( 'description' ); ?>

						<div class="point">

							<?php if ( $icon ) : ?>
								<figure>
									<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"
									     style="width: <?php echo $icon_width ?>">
								</figure>
							<?php endif; ?>

							<?php if ( $icon_heading ) : ?>
								<div class="entry-header">
									<h2 class="segment-header"
									    style="color: <?php echo $heading_text_color ?>;"><?php echo $icon_heading ?></h2>
								</div>
							<?php endif; ?>

							<?php if ( $description ) : ?>
								<div class="entry-content" style="color: <?php echo $body_text_color ?>;">
									<?php echo $description ?>
								</div>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

		</div>
	</section>

	<?php

	/**
	 * Enqueue equal heights js
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
		
				 var keyPointsOptions = {
				     byRow: false,
	                 property: "height",
	                 target: null,
	                 remove: false
				 };
		
                 $(".point figure").matchHeight(keyPointsOptions);
                 
				 $(".point .segment-header").matchHeight(keyPointsOptions);
                 
                 $(".point .entry-content").matchHeight(keyPointsOptions);
			});'
	);
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_testimonial', 6 );
/**
 * Add Testimonial
 */
function add_testimonial() {
	if ( ! get_field( 'add_testimonial' ) ) {
		return;
	}

	$bg = get_field( 'background_color' ) ? : '#ffffff';
	$text_color = get_field( 'text_color' ) ? : '#ffffff';
	$logo = get_field( 'logo' ); ?>

	<section class="testimonial" style="background-color: <?php echo $bg ?>;">
		<div class="wrap">

			<article>

				<?php if ( $logo ) : ?>
					<figure>
						<img src="<?php echo $logo['url'] ?>"
						     alt="<?php echo $logo['alt'] ?>"
						     width="<?php echo $logo['width'] / 2 ?>"
						     height="<?php echo $logo['height'] / 2 ?>">
					</figure>
				<?php endif; ?>

				<?php if ( get_field( 'testimonial' ) ) : ?>
					<blockquote><?php echo the_field( 'testimonial' ) ?></blockquote>
				<?php endif; ?>

				<div class="details">

					<?php if ( get_field( 'name' ) ) : ?>
						<p class="name" style="color: <?php echo $text_color ?>;"><?php echo the_field( 'name' ) ?></p>
					<?php endif; ?>


					<?php if ( get_field( 'company' ) ) : ?>
						<p class="company"
						   style="color: <?php echo $text_color ?>;"><?php echo the_field( 'company' ) ?></p>
					<?php endif; ?>

				</div>

				<?php if ( get_field( 'add_cta' ) ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</article>

		</div>
	</section>

	<?php
}


add_action( 'genesis_after_content_sidebar_wrap', __NAMESPACE__ . '\add_form' );
/**
 * Output signup form
 */
function add_form() {
	if ( ! get_field( 'form' ) ) {
		return;
	}


	/**
	 * Vertical offset value to ovelay form on hero
	 */
	$form_margin = get_field( 'form_margin' ) ? : '300px';


	$form_type = get_field( 'form_type' );
	$pardot_form = get_field( 'pardot_form' );

	$form_object = get_field( 'form' );
	gravity_form_enqueue_scripts( $form_object['id'], true );

	if ( 'gravity-form' === $form_type ) {
		echo '<div class="signup-form">';
		gravity_form( $form_object['id'], false, true, false, '', true, 1 );
		echo '</div>';
	}
	else { ?>
		<div class="signup-form"><?php echo $pardot_form ?></div>
		<?php

	}


	$form_bg_color = get_field( 'form_bg_color' ) ? : '#f4f4f4';
	$form_button_color = get_field( 'form_button_color' ) ? : '#c1ce20';
	$form_button_hover_color = get_field( 'form_button_hover_color' ) ? : '#a4af1b';

	$custom_css = '
		
			.signup-form {
                margin-bottom: 0;
            }
            
            @media (min-width: 75em) {
                .signup-form {
                    margin-bottom: ' . $form_margin . ' !important;
                }
            }
            
			.signup-form .gform_wrapper form {
                background-color: ' . $form_bg_color . ';
            }
            
			.signup-form .gform_wrapper form .gform_footer input {
                background-color: ' . $form_button_color . ';
            }

			.signup-form .gform_wrapper form .gform_footer input:hover,
			.signup-form .gform_wrapper form .gform_footer input:focus {
                background-color: ' . $form_button_hover_color . ';
            }
            
		';



	wp_enqueue_style( 'partials' );

	wp_add_inline_style( 'partials', $custom_css );

}



/**
 * Add ACF Related Posts cloned field group before footer
 */
add_action( 'genesis_before_footer', function () {
	if ( get_field( 'add_related_posts' ) ) {
		get_template_part( 'partials/parts/related', 'posts' );
	}
}, 7 );


genesis();
