<?php
/**
 * The template for displaying search results pages.
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

	<section id="primary" class="content-area">

		<div class="large-8 <?php if ( $sidebar_layout == "left-sidebar" ) { echo "large-offset-1"; } ?> columns">

			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'gateway-plus' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php gateway_plus_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		
		</div><!-- .large-8 -->

	</section><!-- #primary -->

	<?php if ( $sidebar_layout == "right-sidebar" ) { ?>

		<div class="large-3 large-offset-1 columns">
			<?php get_sidebar(); ?>
		</div><!-- .large-3 -->

	<?php } ?> 

</div><!-- .row -->

<?php get_footer(); ?>