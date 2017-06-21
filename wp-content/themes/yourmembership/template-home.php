<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="featured-slider">

	<ul id="hero" class="heroslider bxslider text-left animated fadeIn" style="visibility:hidden;">

	<?php if( have_rows('slide') ): ?>
	<?php while( have_rows('slide') ): the_row(); 

		// vars
		$caption = get_sub_field('caption');
		$subcaption = get_sub_field('sub_caption');
		$image = get_sub_field('image');
		?>      

        <li class="slide animated" style="background-image:url(<?php echo $image['url']; ?>);">
        	<div class="container">
            	<h2><span><?php echo $caption; ?></span></h2>
            	<p><span><?php echo $subcaption; ?></span></p>
            	<img src="<?php echo get_template_directory_uri(); ?>/images/spacer.png" />
        	</div>
        </li>

	<?php endwhile; ?>
	<?php endif; ?>	

	</ul>


<div class="home-grid-boxes">

	<ul class="container">

	<?php if( have_rows('box') ): ?>
	<?php while( have_rows('box') ): the_row(); 

		// vars
		$title = get_sub_field('title');
		$message = get_sub_field('message');
		$link = get_sub_field('link');
		?>      

        <li class="grid-box col-md-3">
            	<p><span><?php echo $message; ?></span></p>
            	<a href="<?php echo $link; ?>" class="btn">Learn More</a>
        </li>

	<?php endwhile; ?>
	<?php endif; ?>	

	</ul>

</div>

</div>





<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->




<?php get_footer(); ?>
