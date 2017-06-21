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

	<div class="image-header" style="background-image:url(/wp-content/uploads/2015/09/title-city.jpg);">
		<div class="image-header-inner container">
			<div class="title">
				<h1>Featured Articles</h1>
			</div>
		</div>
	</div>

	<div id="primary" class="blog-content content-area container">
		<main id="main" class="site-main blog-main col-md-12" role="main">

			<div id="ctl00_ContentPlaceHolder1_dlItemList">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>


				<span>
					<div class="news-post">
						<div><? the_time('m.d.Y'); ?></div>
						<?php the_title( sprintf( '<a href="%s" rel="bookmark" class="article-post">', esc_url( get_permalink() ) ), '</a>' ); ?>
					</div>
				</span>


			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		    </div> <!-- ctl00_ContentPlaceHolder1_dlItemList -->

		</main><!-- #main -->


	</div><!-- #primary -->


<?php get_footer(); ?>



