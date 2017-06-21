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

<div class="image-header" style="background-image:url(/wp-content/uploads/2015/09/title-city.jpg);">
		<div class="image-header-inner container">
			<div class="title">
				<h1>Press Releases</h1>
			</div>
		</div>
	</div>

	<div id="primary" class="blog-content content-area container">
		<main id="main" class="site-main blog-single col-md-12" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single-press' ); ?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->


	</div><!-- #primary -->


<?php get_footer(); ?>
