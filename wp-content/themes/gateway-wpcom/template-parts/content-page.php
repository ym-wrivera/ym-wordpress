<?php
/**
 * The template used for displaying page content in page.php
 *
 *
 * @package Gateway
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

	<div class="featured-image">
		<?php // Featured Image
		if ( has_post_thumbnail() ) : ?>

			<?php the_post_thumbnail( 'gateway-post-image' ); ?>

		<?php endif; // end featured image ?>
	</div><!-- .featured-image -->

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateway' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'gateway' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->