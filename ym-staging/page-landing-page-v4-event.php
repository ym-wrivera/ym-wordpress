<?php
/**
 * Landing Page V4 Template - Event
 *
 * Template is identical to V2 Template except V4 doesn't
 * have a form so the content area is 12 columns instead of 6.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */

/**
 * Template Name: Landing Page - Event V4
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

	return array_merge( $classes, [ 'landing-page', 'v4-landing-page', $css_class ] );
}


/**
 * Move Breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 35 );


/**
 * Add opening div for breadcrumb wrapper
 */
add_action( 'genesis_after_header', function () {
	echo '<section class="breadcrumb-wrapper"><div class="wrap">';
}, 30 );


/**
 * Add closing div for breadcrumb wrapper
 */
add_action( 'genesis_after_header', function () {
	echo '</div></section>';
}, 40 );



/**
 * Remove Entry Header
 */
remove_all_actions( 'genesis_entry_header' );


/**
 * Add ACF Flexible Content. See inc/layout.php
 *
 * @uses ym_flexible_content();
 */
add_action( 'genesis_after_header', 'ym_flexible_content', 20 );



add_action( 'genesis_before_loop', __NAMESPACE__ . '\add_entry_header' );
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


add_action( 'genesis_before_loop', __NAMESPACE__ . '\add_date_and_time', 20 );
/**
 * Add Event Date and Time
 */
function add_date_and_time() {

	$date = get_field( 'event_date' );
	$time = get_field( 'event_time' );
	$location = get_field( 'event_location' );

	$cal_icon = '/wp-content/themes/ym/dist/images/calender.svg';
	$time_icon = '/wp-content/themes/ym/dist/images/time.svg';
	$pin_icon = '/wp-content/uploads/2017/03/pin.svg'; ?>

	<?php if ( $date || $time || $location ) : ?>
		<section class="time-and-date">

			<?php if ( $date ) : ?>
				<div class="date">
					<img src="<?php echo $cal_icon ?>">
					<p><?php echo the_field( 'event_date' ) ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $time ) : ?>
				<div class="time">
					<img src="<?php echo $time_icon ?>">
					<p><?php echo the_field( 'event_time' ) ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $location ) : ?>
				<div class="location">
					<img src="<?php echo $pin_icon ?>">
					<p><?php echo the_field( 'event_location' ) ?></p>
				</div>
			<?php endif; ?>

		</section>
	<?php endif;

}



add_action( 'genesis_entry_content', function () {
	if ( ! get_field( 'event_content' ) ) {
		return;
	} ?>

	<section class="event-details">
		<div class="entry-content"><?php the_field( 'event_content' ) ?></div>
	</section>

	<?php
});



add_action( 'genesis_entry_footer', __NAMESPACE__ . '\add_speaker_info' );
/**
 * Add Event Date and Time
 */
function add_speaker_info() {
	if ( ! get_field( 'add_speaker' ) ) {
		return;
	}

	$image = get_field( 'image' );
	$alt = $image['alt'] ? : the_title_attribute( 'echo=0' );
	$bio = get_field( 'bio' );


	if ( $image['url'] ) : ?>

	<section class="speaker-info">
		<div class="speaker">
			<figure>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo $alt ?>"
				     width="<?php echo $image['width'] / 2 ?>"
				     height="<?php echo $image['height'] / 2 ?>"
				     style="min-width: <?php echo $image['width'] / 2 . 'px' ?>;">
			</figure>
			<div class="bio">
				<h3>About the speaker</h3>
				<?php echo $bio ?>
			</div>
		</div>
	</section>

	<?php

	endif;
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_key_points', 5 );
/**
 * Add Key Points
 */
function add_key_points() {
	if ( ! get_field( 'add_key_points' ) ) {
		return;
	}

	$heading_color = get_field( 'points_heading_color' ) ? : '#343F49';
	$content_color = get_field( 'points_content_color' ) ? : '#343F49';


	/**
	 * Append custom component CSS
	 */
	$custom_css = '
                    
        .point .segment-header {
            color: ' . $heading_color . ';
        }
        
        .point .entry-content {
            color: ' . $content_color . ';
        }
                    
    ';


	/**
	 * Enqueue component CSS
	 */
	wp_enqueue_style( 'partials' );
	wp_add_inline_style( 'partials', $custom_css );



	/**
	 * Enqueue equal heights js
	 */
	if ( ! wp_script_is( 'equal-heights-js' ) ) {

		wp_enqueue_script( 'equal-heights-js' );

		wp_add_inline_script( 'equal-heights-js',
			'jQuery(document).ready(function($){
                 $(".point figure").matchHeight({
				    byRow: false,
                    property: "min-height",
                    target: null,
                    remove: false
                 });
                 
				 $(".point .entry-content").matchHeight({
				    byRow: true,
                    property: "min-height",
                    target: null,
                    remove: false
                 });
                 
                 $(".point header").matchHeight({
				    byRow: true,
                    property: "min-height",
                    target: null,
                    remove: false
                 });
			});'
		);

	} ?>

	<section class="key-points">
		<div class="wrap">

			<?php if ( get_field( 'add_heading' ) ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<?php if ( have_rows( 'points' ) ) : ?>

				<div class="point-inner-wrap">

					<?php while ( have_rows( 'points' ) ) : the_row();

						$icon = get_sub_field( 'icon' );
						$icon_heading = get_sub_field( 'heading' );
						$description = get_sub_field( 'description' ); ?>

						<div class="point">

							<?php if ( $icon ) : ?>
								<figure>
									<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
								</figure>
							<?php endif; ?>

							<?php if ( $icon_heading ) : ?>
								<header>
									<h2 class="segment-header"><?php echo $icon_heading; ?></h2>
								</header>
							<?php endif; ?>

							<?php if ( $icon_heading ) : ?>
								<div class="entry-content">
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
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_testimonial', 6 );
/**
 * Add testimonial section
 */
function add_testimonial() {
	if ( ! get_field( 'add_testimonial' ) ) {
		return;
	}

	$testimonial = get_field( 'testimonial' );

	$bg = get_field( 'background_color' ) ? : '#ffffff';
	$text_color = get_field( 'text_color' ) ? : '#343F49';
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
					<blockquote style="color: <?php echo $text_color ?>;"><?php echo strip_tags( $testimonial ); ?></blockquote>
				<?php endif; ?>

				<div class="details">

					<?php if ( get_field( 'name' ) ) : ?>
						<p class="name" style="color: <?php echo $text_color ?>;"><?php the_field( 'name' ) ?></p>
					<?php endif; ?>


					<?php if ( get_field( 'company' ) ) : ?>
						<p class="company" style="color: <?php echo $text_color ?>;"><?php the_field( 'company' ) ?></p>
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



/**
 * Add ACF Related Posts cloned field group before footer
 */
add_action( 'genesis_before_footer', function () {
	if ( get_field( 'add_related_posts' ) ) {
		get_template_part( 'partials/parts/related', 'posts' );
	}
}, 7 );

genesis();
