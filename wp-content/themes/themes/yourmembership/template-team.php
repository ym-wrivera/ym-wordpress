<?php
/*
Template Name: Team
*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
get_header(); ?>
	

	<?php  
		if (! is_front_page()):
			get_template_part( 'template-parts/content', 'headers' ); 
		endif;
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
	

			<?php endwhile; // End of the loop. ?>
			</div><!-- #entry-content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
