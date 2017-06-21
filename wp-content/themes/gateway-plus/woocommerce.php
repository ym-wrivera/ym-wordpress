<?php
/**
 * The template for displaying the WooCommerce shop
 *
 */

get_header(); ?>

<div class="row">

	<div id="primary" class="content-area">

	<?php $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right-sidebar' ); ?>
	
	<?php if ( $sidebar_layout == "left-sidebar" ) { ?>

		<div class="large-3 columns">
			<?php get_sidebar(); ?>
		</div><!-- .large-3 -->

	<?php } ?> 

		<div class="large-8 <?php if ( $sidebar_layout == "left-sidebar" ) { echo "large-offset-1"; } ?> columns">

			<main id="main" class="site-main" role="main">

				<?php woocommerce_content(); ?>

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