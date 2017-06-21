<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yourmembership
 */

get_header(); ?>

	<?php 
		$image = get_field('image','29');
		$title = get_field("title",'29');
	?>

	<div class="image-header" style="background-image:url(<?php echo $image['url']; ?>);">
		<div class="image-header-inner container">
			<div class="title">
				<h3><?php echo $title; ?></h3>
			</div>
		</div>
	</div>

	<div id="primary" class="blog-content content-area container">
		<main id="main" class="site-main blog-single col-md-9" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

		<aside class="blog-sidebar col-md-3">
			<?php get_sidebar(); ?>
		</aside>

	</div><!-- #primary -->


<?php get_footer(); ?>
