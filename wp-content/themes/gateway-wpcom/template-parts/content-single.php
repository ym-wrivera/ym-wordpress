<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package Gateway
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

		<div class="entry-meta">
			<?php gateway_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateway' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clear">

		<span class="left">
			<?php
				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
					<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i></a>
			<?php } ?>
			<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
			<?php edit_post_link( '<i class="fa fa-edit"></i><span class="screen-reader-text">' . esc_html__( 'Edit', 'gateway' ) . '</span>' ); ?>
		</span>

		<span class="right"><?php gateway_entry_footer(); ?></span>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->