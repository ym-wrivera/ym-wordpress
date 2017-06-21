<?php
/**
 * The template used for displaying content in index.php
 *
 * @package Gateway
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // Featured Image
	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'gateway-post-image' ); ?></a>
		</div>
	<?php endif; // end featured image ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-date">
				<?php the_time( get_option( 'date_format' ) ); ?>
			</div><!-- .entry-date -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer clear">
		<span class="left">
			<?php
				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
					<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i>
						<span class="screen-reader-text"><?php comments_number( esc_html__( 'Leave a comment', 'gateway' ), esc_html__( '1 Comment', 'gateway' ), esc_html__( '% Comments', 'gateway' ) ); ?></span>
					</a>
			<?php } ?>
			<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
			<?php edit_post_link( '<i class="fa fa-edit"></i><span class="screen-reader-text">' . esc_html__( 'Edit', 'gateway' ) . '</span>' ); ?>
		</span>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->