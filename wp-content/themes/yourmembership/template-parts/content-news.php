<?php
/**
 * Template part for displaying posts.
 *
 * @package aurorastorage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<? if(get_field('image') && !is_single()) { ?>
		<div class="row">
			<div class="col-md-4">
				<? $image = get_field('image'); ?>
				<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			</div>
			<div class="col-md-8">
				<header class="entry-header">
					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			
					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						Posted on: <? the_time('M d, Y'); ?> - by <? the_author(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<? the_excerpt(); ?>
				</div><!-- .entry-content -->

				<div class="read-more">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">Read More</a>
				</div>

			</div>			
		</div>
	<? } else { ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				Posted on: <? the_time('M d, Y'); ?> - by <? the_author(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<? the_excerpt(); ?>
		</div><!-- .entry-content -->
	
		<div class="read-more">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">Read More</a>
		</div>
	
	<? } ?>
	
</article><!-- #post-## -->

<div class="clearfix"></div>
<hr/>