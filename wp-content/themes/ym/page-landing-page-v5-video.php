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
 * Template Name: Landing Page - Video V5
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

	return array_merge( $classes, [ 'landing-page', 'v5-landing-page', $css_class ] );
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



add_action( 'genesis_entry_content', function () {

	/**
	 * Add video
	 */
	$add_video = get_field( 'add_video' );

	/**
	 * From video partial
	 */
	$inline_video_id = get_field( 'wistia_video_id' );

	/**
	 * Inline or Popup video
	 */
	$video_type = get_field( 'video_type' );

	/**
	 * Video cover image
	 */
	$video_thumbnail = get_field( 'video_thumbnail' );

	/**
	 * Heading module
	 */
	$add_heading = get_field( 'add_heading' );
	$headings = get_field( 'headings' );

	/**
	 * Description fields
	 */
	$add_description = get_field( 'add_description' );
	$description = get_field( 'video_description' );

	/**
	 * Button module
	 */
	$add_cta = get_field( 'add_cta' );



	/**
	 * Enqueue Wistia's E-v1.js if it's not already available. And
	 * custom video script. Loaded with async attributes.
	 */
	if ( ! wp_script_is( 'wistia' ) ) {

		$wistia_url = "//fast.wistia.com/embed/medias/$inline_video_id.jsonp";

		wp_register_script(
			'wistia-id',
			$wistia_url,
			[ 'wistia' ],
			CHILD_THEME_VERSION,
			true
		);

		wp_enqueue_script( 'wistia' );
		wp_enqueue_script( 'wistia-id' );
	}

	?>

	<section class="upcoming-videos">

		<article class="video" itemscope="" itemtype="http://schema.org/CreativeWork">

			<?php if ( 'popup-video' === $video_type ) : ?>

				<aside class="video-container">
					<figure class="video-cover-image">
						<img src="<?php echo $video_thumbnail['url'] ?>"
						     alt="<?php echo $video_thumbnail['alt'] ?>"
						     width="<?php echo $video_thumbnail['width'] / 2 ?>"
						     height="<?php echo $video_thumbnail['height'] / 2 ?>">

						<?php if ( $add_video ) :
							get_template_part( 'partials/parts/video', 'fields' );
						endif; ?>

					</figure>
				</aside>

			<?php else : ?>

				<aside class="video-container">
					<div class="<?php echo 'wistia_async_' . $inline_video_id ?> wistia_embed" style="height:349px;width:620px">&nbsp;</div>
				</aside>

			<?php endif; ?>

			<div class="video-content">

				<?php if ( $add_heading ) :
					get_template_part( 'partials/parts/title', 'group' );
				endif; ?>

				<?php if ( $add_description ) : ?>
					<div class="entry-content"><?php echo $description ?></div>
				<?php endif; ?>

				<?php if ( $add_cta ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</div>

		</article>


	</section>

	<?php

} );



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


add_action( 'genesis_before_footer', function () {

	/**
	 * BG Color
	 */
	$bg = get_field( 'bg_color' );

	/**
	 * Content
	 */
	$content = get_field( 'cta_content' );
	?>

	<section class="cta-section" style="background-color: <?php echo $bg ?>;">
		<div class="wrap">

			<main>
				<?php if ( $content ) : ?>
					<div class="entry-content">
						<?php echo $content ?>
					</div>
				<?php endif; ?>
			</main>

		</div>
	</section>

	<?php

}, 1 );



/**
 * Add ACF Related Posts cloned field group before footer
 */
add_action( 'genesis_before_footer', function () {
	if ( get_field( 'add_related_posts' ) ) {
		get_template_part( 'partials/parts/related', 'posts' );
	}
}, 7 );



genesis();
