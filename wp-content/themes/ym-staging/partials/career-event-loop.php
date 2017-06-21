<?php
/**
 * Career Events Loop used for Career Events. This
 * file is included in the FacetWP Template GUI for career events.
 *
 * This was done like this so the event grid could be used as a shortcode
 * within ACF Flexible Content fields. Specifically the full width content Block.
 */


wp_enqueue_script( 'equal-heights-js' );
wp_add_inline_script( 'equal-heights-js',
	'jQuery(document).ready(function($){
	          $(document).on("facetwp-loaded", function() {
		            $(".event header").matchHeight({
					    byRow: true,
					    property: "height",
					    target: null,
					    remove: false
					});
				
			        $(".event .entry-content").matchHeight({
					    byRow: true,
					    property: "height",
					    target: null,
					    remove: false
					});
				
					$(".event-location").matchHeight({
					    byRow: true,
					    property: "height",
					    target: null,
					    remove: false
					});	
					
					$(".event").matchHeight({
					    byRow: true,
					    property: "min-height",
					    target: null,
					    remove: false
					});
					
					
			      $.fn.matchHeight._maintainScroll = true;
			   });

			});'
);

?>

<section class="events-grid">
	<div class="wrap">

		<?php while ( have_posts() ) : the_post();

			$event_type = get_field( 'event_type' );
			$event_format = get_field( 'event_format' );
			$event_format_color = get_field( 'event_format_color' ) ?: '#1EAEB4';


			/**
			 * Post is probably linking to external URL or a custom
			 * landing page besides events. If $diff_link if false
			 * we're linking to default single event page.
			 */
			$link_to = get_field( 'event_link_to' );
			$link = get_field( 'event_url' );

			$event_url = 'current-page' !== $link_to ? $link : get_permalink();
			$link_target = 'external-url' === $link_to ? 'blank' : 'self';


			$event_date = get_field( 'event_date' );
			$event_location = get_field( 'event_location' );
			$event_time = get_field( 'event_time' );

			$booth_num = get_field( 'booth_number' );
			$excerpt = get_field( 'event_excerpt' );

			$maps_link = get_field( 'google_maps_link' ); ?>

			<article class="event" itemscope="" itemtype="http://schema.org/CreativeWork">
				<div class="resource-wrap">

					<?php if ( $event_url ) : ?>
						<header class="entry-header">
							<div class="entry-header">
								<h4 class="title" itemprop="headline"><a class="link" href="<?php echo $event_url ?>"
								                                         rel="bookmark"
								                                         target="<?php echo $link_target ?>"><?php the_title(); ?></a>
								</h4>
							</div>
						</header>
					<?php endif; ?>

					<?php if ( $event_type ) : ?>
						<p class="event-format" style="color: <?php echo $event_format_color ?>"><?php echo $event_format ?></p>
					<?php endif; ?>

					<?php if ( $event_date ) : ?>
						<?php $date_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g fill="#ABB3BE" fill-rule="evenodd"><path d="M5.325 5.5h1.398V0H5.325M13.23 5.5h1.397V0H13.23"/><path d="M15.59 2.452v1.38h2.964v3.525H1.398V3.833H4.36v-1.38H0V19.88h19.952V2.453H15.59zM1.398 18.5h17.156V8.762H1.398V18.5z"/><path d="M7.687 3.833h4.554v-1.38H7.688"/></g></svg>'; ?>

						<p class="event-date"><span><?php echo $date_icon ?></span><a href="<?php echo $maps_link ?>"
						                                                              target="<?php echo $link_target ?>"
						                                                              title="Click for event directions."><?php echo $event_date ?></a>
						</p>
					<?php endif; ?>

					<?php if ( $event_location ) : ?>
						<?php $pin_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="23" viewBox="0 0 16 23"><g fill="none" fill-rule="evenodd" stroke="#ABB3BE"><path fill="#ABB3BE" stroke-width=".5" d="M8.338 19.85l-5.503-7.71h.028c-.65-1.03-1.016-2.286-1.016-3.6 0-3.684 2.907-6.683 6.49-6.683 3.586 0 6.493 3 6.493 6.683 0 1.314-.367 2.57-1.016 3.6h.028l-5.504 7.71zm7.338-11.424C15.676 4.313 12.402 1 8.338 1S1 4.313 1 8.426c0 1.485.423 2.856 1.157 4H2.13l6.208 8.567 6.21-8.568h-.03c.735-1.143 1.158-2.514 1.158-4z"/><path stroke-width="2" d="M3.4 22h9.88" stroke-linecap="square"/></g></svg>'; ?>

						<p class="event-location"><span><?php echo $pin_icon ?></span><a href="<?php echo $maps_link ?>"
						                                                                 target="<?php echo $link_target ?>"
						                                                                 title="Click for event directions."><?php echo $event_location ?></a>
						</p>
					<?php endif; ?>

					<?php if ( $event_time ) : ?>
						<?php $pin_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"><path fill="#ABB3BE" fill-rule="evenodd" d="M15 4.24c-.54 0-.978.437-.978.977V15c0 .54.438.978.978.978h9.13c.54 0 .98-.438.98-.978s-.44-.978-.98-.978h-8.152V5.217c0-.54-.438-.978-.978-.978m0-2.283c7.215 0 13.043 5.828 13.043 13.043 0 7.215-5.828 13.043-13.043 13.043-7.215 0-13.043-5.828-13.043-13.043C1.957 7.785 7.785 1.957 15 1.957M15 0C6.727 0 0 6.728 0 15c0 8.273 6.727 15 15 15s15-6.727 15-15S23.273 0 15 0"/></svg>'; ?>

						<p class="event-location"><span><?php echo $pin_icon ?></span><a href="<?php echo $maps_link ?>"
						                                                                 target="<?php echo $link_target ?>"
						                                                                 title="Click for event directions."><?php echo $event_time ?></a>
						</p>
					<?php endif; ?>
				</div>

				<?php if ( $event_url ) : ?>
					<?php $svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" id="green-arrow"><path fill="#C1CE20" fill-rule="evenodd" d="M19.702 6.506L13.652.26c-.34-.347-.886-.347-1.223 0-.34.35-.34.914 0 1.262l4.616 4.766H.87c-.48 0-.87.402-.87.898 0 .495.39.898.87.898h16.178l-4.62 4.766c-.336.348-.336.913 0 1.26.34.348.886.35 1.223 0l6.056-6.247c.018-.016.04-.02.056-.037.028-.028.028-.067.05-.097.074-.097.127-.2.158-.31.01-.045.02-.08.023-.127.037-.266-.03-.545-.23-.75-.017-.017-.04-.023-.057-.04z"/></svg>'; ?>

					<div class="learn-more-wrap">
						<p class="event-url">
							<a href="<?php echo $event_url ?>" target="<?php echo $link_target ?>"
							   class="green-text-link arrow-text-link">Learn More<span
										class="arrow-link"><?php echo $svg_arrow ?></span></a>
						</p>
					</div>
				<?php endif; ?>

			</article>

		<?php endwhile; ?>

	</div>
</section>
