<?php
/**
 * Template part for displaying posts.
 *
 * @package aurorastorage
 */

?>




	<div class="news-post" id="post-<?php the_ID(); ?>">

			<div>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<? the_time('m.d.Y'); ?>
				</div>
				<?php endif; ?>
			</div>

			
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="article-post">
				<?php the_title( sprintf( '', esc_url( get_permalink() ) ), '' ); ?>
			</a>

	</div>
