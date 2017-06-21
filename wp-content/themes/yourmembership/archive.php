<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yourmembership
 */


get_header(); ?>

	<?php 
		$image = get_field('image','29');
	?>

	<div class="image-header" style="background-image:url(<?php echo $image['url']; ?>);">
		<div class="image-header-inner container">
			<div class="title">
				<h1><?php echo the_archive_title(); ?></h1>
			</div>
		</div>
	</div>

	<div id="primary" class="blog-content content-area container">
		<main id="main" class="site-main blog-main col-md-9" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'news' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<aside class="blog-sidebar col-md-3">
			<?php get_sidebar(); ?>
		</aside>

	</div><!-- #primary -->


<?php get_footer(); ?>



