<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yourmembership
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title release-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<p class="release-date"><strong>RELEASE DATE: <?php the_time('m.d.Y'); ?></strong></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<div class="release-content">
		 <?php the_field('press_release_body'); ?>
		</div>


		<div class="more-info">
			<?php the_field('about_ym', 'option'); ?>
        </div>



		<div class="more-info">
		<h3>For More Information Contact:</h3>
		<p id="infocontact">
			<p><?php the_field('contact_name'); ?></p>
			<p><?php the_field('contact_title'); ?></p>
			<p><?php the_field('contact_phone'); ?></p>
			<p><a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></p>
		</p>
		</div>

		<a href="/news/" class="btn button lt-blue mtop-50">More News</a>



	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // yourmembership_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

