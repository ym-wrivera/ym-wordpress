<?php
/**
 * The archive sales resources archive
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


namespace DevDesigns\YM;

use WP_Query;


/**
 * Remove Breadcrumbs to genesis_after_header
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_videos' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class_videos( $classes ) {
	$classes[] = 'archive-sales-resources';

	return $classes;
}


add_action( 'genesis_after_header', __NAMESPACE__ . '\add_hero' );
/**
 * Add Hero. Using Sales Resources ACF Options page
 */
function add_hero() {

	if ( ! class_exists( 'acf' ) && ! get_field( 'add_hero', 'option' ) ) {
		return;
	}

	$hero_image = get_field( 'hero_image', 'option' ); ?>

	<section class="hero"
	         style="background: url(<?php echo $hero_image['url']; ?>) no-repeat; padding: <?php echo $hero_image['height'] / 4 ?> 0;">
		<div class="wrap">

			<header>
				<h1><?php the_field( 'hero_title', 'option' ) ?></h1>
			</header>

		</div>
	</section>

	<?php

	wp_enqueue_script( 'backstretch' );

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
		$(".hero").backstretch();
		});'
	);
}


/**
 * Output ACF Archive Description
 */
add_action( 'genesis_before_loop', function () {
	if ( ! class_exists( 'acf' ) && ! get_field( 'add_description', 'option' ) ) {
		return;
	} ?>

	<section class="archive-description">
		<p><?php the_field( 'archive_description', 'option' ) ?></p>
	</section>

	<?php
}, 5);


add_action( 'genesis_before_loop', __NAMESPACE__ . '\find_terms' );
/**
 * Find all terms for Sales Resources CPT.
 */
function find_terms() {
	$tax_name = 'resource_categories';

	$tax_terms = get_terms( $tax_name );

	if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ) {
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', __NAMESPACE__ . '\cpt_loop' );
	}
}


function cpt_loop() {
	$tax_name = 'resource_categories';

	$tax_terms = get_terms( $tax_name ); ?>

		<?php foreach ( $tax_terms as $tax_term ) : ?>

		<section class="sales-resource-categories">

			<header>
				<h2 class="segment-header">
					<?php echo $tax_term->name ?>
				</h2>
			</header>

			<?php

			$args = [
				'tax_query' => [
					[
						'taxonomy' => $tax_name,
						'field'    => 'slug',
						'terms'    => [
								$tax_term->slug
						],
					],
				],
				'posts_per_page' => -1,
				'nopaging' => true,
			];

			$query = new WP_Query( $args ); ?>

			<section class="resource-entries">

				<?php

				while ( $query->have_posts() ) :

					$query->the_post();


					$fields = [
						'icon'     => get_field( 'icon' ),
						'download' => get_field( 'download' ),
						'link'     => get_field( 'link' ),
						'excerpt'  => get_field( 'excerpt' ),
					];

					$download_target = get_field( 'download_target' ) ? '_blank' : '_self';
					$link_target = get_field( 'link_target' ) ? '_blank' : '_self';

					?>

					<article class="sales-resource entry" itemscope="" itemtype="http://schema.org/CreativeWork">

						<figure class="icon">
							<img class="inline-svg svg"
							     src="<?php echo $fields['icon']['url'] ?>"
							     alt="<?php echo $fields['icon']['alt'] ?>"
							     width="<?php echo $fields['icon']['width'] / 2 ?>"
							     height="<?php echo $fields['icon']['height'] / 2 ?>"
							     style="min-width: <?php echo $fields['icon']['width'] / 2 . 'px' ?>;">
						</figure>

						<header class="entry-header">
							<h5><a href="<?php echo $fields['link'] ?>"
							       title="<?php echo get_the_title() ?>"
							       target="<?php echo $link_target ?>"><?php echo get_the_title() ?></a></h5>

							<?php if ( $fields['download'] ) : ?>
								<p class="excerpt">
									<a href="<?php echo $fields['download']['url'] ?>"
									   title="<?php echo $fields['download']['title'] ?>"
									   target="<?php echo $download_target ?>"><?php echo $fields['excerpt'] ?></a>
								</p>

							<?php else : ?>
								<p class="excerpt">
									<a href="<?php echo $fields['link'] ?>"
									   title="<?php echo $fields['link'] ?>"
									   target="<?php echo $link_target ?>"><?php echo $fields['excerpt'] ?></a>
								</p>
							<?php endif; ?>

						</header>

					</article>

				<?php endwhile; ?>

			</section>

			<?php wp_reset_query(); ?>

		</section>

	<?php endforeach; ?>

	<?php


}

genesis();
