<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yourmembership
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<p class="blog-meta">Posted on <a href="<?php echo get_month_link($year, $month); ?>"><?php the_time('F j, Y'); ?></a> by <?php the_author_posts_link();?></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yourmembership' ),
				'after'  => '</div>',
			) );
		?>

		<?php 
		if ( is_singular( 'post' ) ) {
			$postCTA = get_field('post_cta_-_bottom');
		    echo do_shortcode( ' [social-bio] ' );
			echo $postCTA;
		}
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // yourmembership_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

