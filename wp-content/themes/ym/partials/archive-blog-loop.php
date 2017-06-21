<?php
/**
 * Archive Loop used for Resource Center Post Type Archives. This
 * file is included in the FacetWP Template GUI for each CPT Archive.
 */



/**
 * Prevent uneven posts by making sure we have even heights set. This
 * prevents a long title/excerpt from making the component look out of
 * place.
 */
/**
 * Prevent uneven posts by making sure we have even heights set. This
 * prevents a long title/excerpt from making the component look out of
 * place.
 */
wp_enqueue_script( 'equal-heights-js' );
wp_add_inline_script( 'equal-heights-js',
	'(function($){
	            $(document).on("facetwp-loaded", function() {
	        
			        var resourceOptions = {
						byRow: true,
		                property: "min-height",
		                target: null,
		                remove: false
					};
		
	                $(".resource .entry-header").matchHeight(resourceOptions);
             
			        $(".resource .entry-content").matchHeight(resourceOptions);
             
			        $(".resource").matchHeight(resourceOptions);
			  
                    $.fn.matchHeight._maintainScroll = true;

                    $(document).on("click", ".fwp-load-more", function () {
						$.fn.matchHeight._update();
					});
				});
				
			})(jQuery);'
);?>


<?php while ( have_posts() ) : the_post();

	$customize_related_posts = get_field( 'customize_related_posts', $post->ID );

	$custom_title = get_field( 'rp_post_title', $post->ID );

	$title = $customize_related_posts ? $custom_title : get_the_title();


	$link = get_field( 'rp_url', $post->ID );
	$link_to = get_field( 'rp_link_type' );
	$resource_link = get_field( 'rp_url' );

	if ( 'internal' === $link_to ) {
		$link = $resource_link;
	} elseif ( 'external' === $link_to ) {
		$link = $resource_link;
	} else {
		$link = get_permalink();
	}

	$link_target = get_field( 'rp_target' );
	$target = $link_target ? '_blank' : '_self'; ?>

	<article class="resource" itemscope="" itemtype="http://schema.org/CreativeWork">
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="featured-image">
				<a class="entry-image-link" href="<?php echo $link ?>" title="<?php the_title_attribute(); ?>"
				   aria-hidden="true" target="<?php echo $target ?>">
					<?php the_post_thumbnail( 'resources-featured-image' ); ?>
				</a>
			</figure>
		<?php else : ?>
			<figure class="featured-image">
				<a class="entry-image-link" href="<?php echo $link ?>" title="<?php the_title_attribute(); ?>"
				   aria-hidden="true" target="<?php echo $target ?>">
					<img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ) . 'dist/images/card-placeholder@2x.jpg' ?>" width="380" height="230" />
				</a>
			</figure>
		<?php endif; ?>

		<div class="resource-wrap">
			<div class="resource-wrap-inner">

				<header class="entry-header">

					<?php
					$categories = get_the_category();

					if ( ! empty( $categories ) ) : ?>

						<div class="entry-meta">
							<?php echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?>
						</div>

					<?php endif; ?>

					<h4 class="title" itemprop="headline">
						<a class="link" href="<?php echo $link; ?>" rel="bookmark" target="<?php echo $target ?>"><?php echo $title ?></a>
					</h4>
				</header>

				<?php if ( $link ) : ?>

					<?php $svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" id="green-arrow"><path fill="#C1CE20" fill-rule="evenodd" d="M19.702 6.506L13.652.26c-.34-.347-.886-.347-1.223 0-.34.35-.34.914 0 1.262l4.616 4.766H.87c-.48 0-.87.402-.87.898 0 .495.39.898.87.898h16.178l-4.62 4.766c-.336.348-.336.913 0 1.26.34.348.886.35 1.223 0l6.056-6.247c.018-.016.04-.02.056-.037.028-.028.028-.067.05-.097.074-.097.127-.2.158-.31.01-.045.02-.08.023-.127.037-.266-.03-.545-.23-.75-.017-.017-.04-.023-.057-.04z"/></svg>'; ?>

					<div class="learn-more-wrap">
						<p class="event-url">
							<a href="<?php echo $link ?>" class="green-text-link arrow-text-link"
							   target="<?php echo $target ?>"><span
										class="arrow-link"><?php echo $svg_arrow ?></span></a>
						</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</article>

<?php endwhile; ?>
