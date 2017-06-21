<?php
/**
 * Default code for upcoming webinars field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$webinars = get_field( 'webinars', 'option' );

//echo '<pre>';
//print_r( $webinars );
//echo '</pre>';

if ( have_rows( 'webinars', 'option' ) ) : ?>

	<section class="upcoming-webinars">
		<div class="wrap">

			<?php while ( have_rows( 'webinars', 'option' ) ) : the_row();

				$post_object = get_sub_field( 'webinar' );
				//$post_url = get_permalink( $post_object->ID );
				//$post_title = $post_object->post_title;
				//
				//$image = get_sub_field( 'featured_image' );
				//$date = get_sub_field( 'date' );
				//$time = get_sub_field( 'time' );
				//
				//$excerpt = $post_object->post_content;
				//
				///**
				// * Buttons
				// */
				//$add_cta = get_sub_field( 'add_cta' );
				//$button = get_sub_field( 'buttons' );


				if ( $post_object ) :

					$post = $post_object;

					setup_postdata( $post );


					$post_url = get_permalink( $post->ID );
					$post_title = $post->post_title;

					$image = get_sub_field( 'featured_image' );
					$date = get_sub_field( 'date' );
					$time = get_sub_field( 'time' );

					$excerpt = $post->post_content;

					/**
					 * Buttons
					 */
					$add_cta = get_sub_field( 'add_cta' );
					$button = get_sub_field( 'buttons' );

					?>

					<article class="webinar" itemscope="" itemtype="http://schema.org/CreativeWork">

						<?php if ( $image ) : ?>
							<figure class="featured-image">
								<img src="<?php echo $image['url'] ?>"
									     alt="<?php echo $image['alt'] ?>"
										 width="<?php echo $image['sizes']['upcoming-webinars-width'] / 2 ?>"
										 height="<?php echo $image['sizes']['upcoming-webinars-height'] / 2 ?>">
							</figure>
						<?php endif; ?>

						<div class="webinar-wrap">
							<header class="entry-header">

								<?php if ( has_term( '', 'topic', '' ) ) : ?>
									<div class="entry-meta">
										<?php echo get_the_term_list( $post->ID, 'topic', '', '' ); ?>
									</div>
								<?php endif; ?>

								<div class="entry-header">
									<h4 class="title" itemprop="headline"><?php echo $post_title ?></h4>
								</div>
							</header>

							<?php if ( $excerpt ) : ?>
								<div class="entry-content" itemprop="text"><?php echo wp_trim_words( $excerpt, '30' ) ?></div>
							<?php endif; ?>

							<?php

								$cal_icon = '/wp-content/themes/ym/dist/images/calender.svg';
								$time_icon = '/wp-content/themes/ym/dist/images/time.svg'; ?>

								<section class="time-and-date">

									<?php if ( have_rows( 'upcoming_webinar_dates' ) ) : ?>

										<ul class="date">

											<?php while ( have_rows( 'upcoming_webinar_dates' ) ) : the_row();

												$webinar_date = get_sub_field( 'webinar_date' ); ?>

												<?php if ( $webinar_date ) : ?>
													<li class="archive-webinars-date">
														<img src="<?php echo $cal_icon ?>">
														<p><?php echo $webinar_date ?></p>
													</li>
												<?php endif; ?>

											<?php endwhile; ?>

										</ul>

									<?php endif; ?>

									<?php if ( $time ) : ?>
										<div class="time">
											<img src="<?php echo $time_icon ?>">
											<p><?php echo $time ?></p>
										</div>
									<?php endif; ?>

								</section>


							<?php if ( $add_cta ) : ?>

								<div class="button-group">
									<a href="<?php echo $button['url']; ?>"
									   class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

									<?php if ( $button['add_another_cta'] ) : ?>
										<a href="<?php echo $button['second_button']['url']; ?>"
										   class="<?php echo $button['second_button']['style'] . ' ' . $button['second_button']['size']; ?> button double-button"><?php echo $button['second_button']['text']; ?></a>
									<?php endif; ?>
								</div>

							<?php endif; ?>

						</div>

					</article>

					<?php wp_reset_postdata();

				endif;

			endwhile; ?>

		</div>
	</section>

<?php endif;
