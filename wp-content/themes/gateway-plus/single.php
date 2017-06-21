<?php
/**
 * The template for displaying all single posts.
 *
 */

get_header(); ?>

<div class="row">

	<?php $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right-sidebar' ); ?>
	
	<?php if ( $sidebar_layout == "left-sidebar" ) { ?>

		<div class="large-3 columns">
			<?php get_sidebar(); ?>
		</div><!-- .large-3 -->

	<?php } ?> 

	<div id="primary" class="content-area">

		<div class="large-8 <?php if ( $sidebar_layout == "left-sidebar" ) { echo "large-offset-1"; } ?> columns">

			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php gateway_plus_post_nav(); ?>

				<hr>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- .large-8 -->

	</div><!-- #primary -->

	<?php if ( $sidebar_layout == "right-sidebar" ) { ?>

		<div class="large-3 large-offset-1 columns">
			<?php get_sidebar(); ?>
		</div><!-- .large-3 -->

	<?php } ?> 

</div><!-- .row -->

<?php get_footer(); ?>