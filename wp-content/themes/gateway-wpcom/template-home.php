<?php
/**
 * Template Name: Home Page
 *
 * @package Gateway
 */

$home_page_video  = get_theme_mod( 'home_page_video' );
$home_video_aside = get_theme_mod( 'home_video_aside' );

get_header( 'home' ); ?>

<?php while ( have_posts() ) : the_post() ?>

	<div class="home-posts-titles">

		<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>

		<div class="home-content entry-content">
			<?php the_content(); ?>
		</div><!-- .home-content -->

	</div><!-- .home_posts_titles -->

<?php endwhile; ?>

<div class="featured-posts clear">
<?php if ( gateway_has_featured_posts( 1 ) ) : //Check for featured posts ?>
	<?php
		$featured_posts = gateway_get_featured_posts();

		foreach ( (array) $featured_posts as $order => $post ) :

			setup_postdata( $post );

			get_template_part( 'template-parts/content', 'home' );

		endforeach;

		wp_reset_postdata();
	?>
<?php else : //if no featured posts, display three most recent posts instead ?>
	<?php $args = array(
					'posts_per_page'      => 3,
					'no_found_rows'       => true,
					'ignore_sticky_posts' => true ); ?>

	<?php $latest = new WP_Query( $args ); ?>

	<?php if ( $latest->have_posts() ) : ?>

		<?php while ( $latest->have_posts() ) : $latest->the_post() ?>

			<?php get_template_part( 'template-parts/content', 'home' ); ?>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

<?php endif; //gateway_has_featured_posts ?>

</div><!-- .featured-posts -->

<?php if ( $home_page_video || $home_video_aside ) : ?>
	<hr>
<?php endif; ?>

<div class="home-video-content">
	<?php if ( $home_page_video ) : ?>
		<div class="jetpack-video-wrapper home-video">
			<?php
				$video_frame = wp_oembed_get( esc_url( $home_page_video ), array( 'width' => 530 ) );

				if ( ! $video_frame ) {
					echo wp_video_shortcode( array(
						'src'   => esc_url( $home_page_video ),
						'width' => 530,
					) );
				} else {
					echo $video_frame;
				}
			?>
		</div>
	<?php endif; // end home_posts_video ?>

	<?php if ( $home_video_aside ) : ?>
		<div class="home-video-aside">
			<?php echo wp_kses_post( wpautop( $home_video_aside ) ); ?>
		</div>
	<?php endif; // end home_video_aside ?>
</div><!-- .home-video-content -->

<?php get_footer(); ?>
