<?php
/**
 * Default code for Related Posts field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

/**
 * Can be used in repeater/flexible content or regular field group
 */
$posts = get_field( 'related_posts' );

//echo '<pre>';
//print_r( $posts );
//echo '</pre>';

if ( $posts ) :

	/**
	 * Create a random id that we'll use as a CSS namespace to
	 * prevent style conflict. Random ID assigned to $ns
	 */
	$create_random_id = uniqid( 'related-posts', false );
	$ns_class = '.' . $create_random_id;
	$ns = $create_random_id;


	/**
	 * Imported CSS from section-styles.css
	 */
	$css = '';
	$custom_css = '';


	/**
	 * Include section styles with locate_template because we're
	 * passing variables and get_template_part keeps variables in
	 * local scope.
	 */
	if ( get_field( 'add_section_styles' ) ) {
		include locate_template( 'partials/parts/section-styles.php' );

		$custom_css = '
			' . $default_css . '
		';

		$css = $section_styles_css;
	}

	/**
	 * Append custom component CSS
	 */
	$custom_css .= '
			' . $ns_class . '.related-posts {
			}
		';



	/**
	 * Enqueue component CSS
	 */
	wp_add_inline_style( 'partials', $custom_css );



	/**
	 * Enqueue backstretch.js if a bg image is used
	 */
	if ( isset( $css['background_image']['url'] ) ) {
		wp_localize_script(
			'app',
			'BackStretchImg',
			[ 'src' => $css['background_image'] ]
		);

		wp_add_inline_script( 'app',
			'jQuery(document).ready(function($){
				$("' . $ns_class . '").backstretch();
			});'
		);
	}


	/**
	 * Component ACF fields
	 */
	$css_class = get_field( 'css_inline_class' );
	$add_heading = get_field( 'add_heading' );


	/**
	 * Prevent uneven posts by making sure we have even heights set. This
	 * prevents a long title/excerpt from making the component look out of
	 * place.
	 */
	wp_enqueue_script( 'equal-heights-js' );
	wp_add_inline_script( 'equal-heights-js',
		'jQuery(document).ready(function($){
				  $(".related-posts .title").matchHeight({
				      byRow: true,
                      property: "min-height",
                      target: null,
                      remove: false
                  });
                 
				  $(".related-posts .entry-content").matchHeight({
				      byRow: true,
                      property: "min-height",
                      target: null,
                      remove: false
                  });
                 
				  $(".related-posts").matchHeight({
				      byRow: true,
                      property: "min-height",
                      target: null,
                      remove: false
                  });
			});'
	);


	?>

	<section class="<?php echo $ns . ' ' . $css_class ?> css row related-posts">
		<div class="wrap">

			<?php if ( $add_heading ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<?php $post_objects = $posts; ?>

			<?php if ( $post_objects ) : ?>

				<div class="flex-wrap">

					<?php foreach ( $post_objects as $post ) :

						setup_postdata( $post );

						/**
						 * Modify default related posts title and excerpt
						 */
						$post_type = $post->post_type;

						$customize_related_posts = get_field( 'customize_related_posts', $post->ID );

						$custom_title = get_field( 'rp_post_title', $post->ID );
						$custom_excerpt = get_field( 'rp_post_excerpt', $post->ID );
						$link = get_field( 'rp_url', $post->ID );

						$title = $customize_related_posts ? $custom_title : get_the_title();

						$link = '';
						$link_to = get_field( 'rp_link_type' );
						$resource_link = get_field( 'rp_url' );

						if ( 'internal' === $link_to ) {
							$link = $resource_link;
						} elseif ( 'external' === $link_to ) {
							$link = $resource_link;
						} else {
							$link = get_permalink();
						} ?>

						<article class="related-posts-resource" itemscope="" itemtype="http://schema.org/CreativeWork">

							<?php if ( has_post_thumbnail() ) : ?>
								<a class="entry-image-link" href="<?php echo $link ?>"
								   title="<?php the_title_attribute(); ?>" aria-hidden="true">
									<?php the_post_thumbnail( 'resources-featured-image' ); ?>
								</a>
							<?php endif; ?>

							<div class="resource-wrap">
								<div class="resource-wrap-inner">

									<header class="entry-header">

										<?php
										$post_type_name = get_post_type_object( get_post_type() );
										$the_cpt_name = $post_type_name->labels->singular_name;
										$get_cpt_name = 'Post' !== $the_cpt_name ? $the_cpt_name : 'Blog'; ?>

										<?php if ( $get_cpt_name ) : ?>
											<div class="entry-meta">
												<?php echo '<a class="post-type-label" href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . $get_cpt_name . '</a>'; ?>
											</div>
										<?php endif; ?>

										<?php if ( $title ) : ?>
											<a class="link" href="<?php echo $link ?>" rel="bookmark">
												<div class="entry-title">
													<h4 class="title"
													    itemprop="headline"><?php echo $title; ?></h4>
												</div>
											</a>
										<?php endif; ?>
									</header>

									<?php
									$excerpt = get_the_content();
									$trimmed_excerpt = wp_trim_words( $excerpt, 11 );

									$is_excerpt = $customize_related_posts ? $custom_excerpt : $trimmed_excerpt; ?>

									<?php if ( $is_excerpt || $link ) : ?>
										<a class="link" href="<?php echo $link ?>">
											<div class="entry-content" itemprop="text">
												<?php echo $is_excerpt ?>
											</div>
										</a>

										<?php $svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" id="green-arrow"><path fill="#C1CE20" fill-rule="evenodd" d="M19.702 6.506L13.652.26c-.34-.347-.886-.347-1.223 0-.34.35-.34.914 0 1.262l4.616 4.766H.87c-.48 0-.87.402-.87.898 0 .495.39.898.87.898h16.178l-4.62 4.766c-.336.348-.336.913 0 1.26.34.348.886.35 1.223 0l6.056-6.247c.018-.016.04-.02.056-.037.028-.028.028-.067.05-.097.074-.097.127-.2.158-.31.01-.045.02-.08.023-.127.037-.266-.03-.545-.23-.75-.017-.017-.04-.023-.057-.04z"/></svg>'; ?>

										<div class="learn-more-wrap">
											<p class="event-url">
												<a href="<?php echo $link ?>"
												   class="green-text-link arrow-text-link"><span
															class="arrow-link"><?php echo $svg_arrow ?></span></a>
											</p>
										</div>
									<?php endif; ?>

								</div>
							</div>
						</article>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

				</div>

			<?php endif; ?>

		</div>
	</section>

	<?php

endif;
