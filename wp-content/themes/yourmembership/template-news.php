<?php
/*
Template Name: In The News
*/

get_header(); ?>


	<?php  
		if (! is_front_page()):
			get_template_part( 'template-parts/content', 'headers' ); 
		endif;
	?>
	
	<div id="primary" class="blog-content content-area container">
		<main id="main" class="site-main" role="main">

			<div id="ctl00_ContentPlaceHolder1_dlItemList">

			<?php

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			    $wp_query = new WP_Query('showposts=10'.'&paged='.$paged);

				if($wp_query->have_posts() ) {

			  		while($wp_query->have_posts() ) {

			    		$wp_query->the_post();

			    		get_template_part( 'template-parts/content', 'news-alt' );

			    		?>

			    	<?php
			  		} 
			  		?>

			  		<div style="margin-top:40px;">

			  		<span class="post-page-link"><?php previous_posts_link('Newer Releases'); ?></span>

			  		<span class="post-page-link"><?php next_posts_link('Older Releases'); ?></span>
				
					</div>

				<?php
				}
			?>


			</div>

<?php get_footer(); ?>
