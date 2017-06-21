<?php
/*
Template Name: Team
*/

/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'team-template';

	return $classes;
} );


/**
 * Remove entry header
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


/**
 * Reposition the breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
//add_action( 'genesis_after_header', 'genesis_do_breadcrumbs' );


/**
 * Add ACF Flexible Content. See inc/layout.php
 *
 * @uses ym_flexible_content();
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_after_header', 'ym_flexible_content' );



/**
 * create team grid
 */
add_action( 'genesis_before_loop', function () {


	/**
	 * Enqueue grid js
	 */
	wp_enqueue_script( 'thumbnail-grid-js' );


	$close_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><g fill="none" fill-rule="evenodd" stroke="#ABB3BE" stroke-width="2" stroke-linecap="square"><path d="M17.6 1.4L2.067 16.933M2.4 1.4l15.533 15.533"/></g></svg>'; ?>

	<div id="team-grid-preview">
		<div class="inner-grid-wrap">
			<header><h1></h1><h5></h5></header>
			<div class="entry-content"></div>
			<p class="close"><?php echo $close_icon ?></p></div>
	</div>

	<?php
	$args = [
		'post_type'      => 'team',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => -1,
	];

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : ?>

		<section class="thumbnail-grid">
			<div class="wrap">
				<ul id="team-grid" class="team-grid">

					<?php while ( $query->have_posts() ) : $query->the_post() ?>

						<?php

						$job_title = get_field( 'job_title' );
						$bio = get_field( 'bio' ); ?>

						<li data-src="<?php echo genesis_get_image( 'format=url&size=team' ); ?>"
						    data-title="<?php the_title(); ?>" data-job="<?php echo $job_title ?>"
						    data-bio="<?php echo $bio ?>">
							<span class="team-overlay">
	                            <p class="name"><?php the_title(); ?></p>
								<p class="title"><?php echo $job_title ?></p>
							</span>
						</li>

					<?php endwhile; ?>

				</ul>
			</div>
		</section>

		<?php

	endif;
}, 30 );



genesis();
