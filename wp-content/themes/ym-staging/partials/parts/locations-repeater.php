<?php
/**
 * Default code for Address Repeater field group.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$location = get_field( 'locations' );
$add_location = get_field( 'add_locations' );
$icon = get_field( 'location_icon' );



if ( have_rows( 'locations' ) ) : ?>

	<section class="locations">
		<div class="wrap">

			<header class="section-heading">
				<h2><?php the_field( 'section_heading' ); ?></h2>
			</header>

			<div class="flex-wrap">

				<?php while ( have_rows( 'locations' ) ) : the_row();

					$city = get_sub_field( 'city' );
					$state = get_sub_field( 'state' );
					$zipcode = get_sub_field( 'zipcode' );
					$num = get_sub_field( 'phone_number' );
					$image = get_sub_field( 'location_image' ); ?>

					<figure class="location-image">
						<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
					</figure>

					<address>

						<?php if ( $icon ) : ?>
							<figure>
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
							</figure>

						<?php endif; ?>
						<div class="details">
							<h4 class="location-name"><?php the_sub_field( 'location_name' ); ?></h4>

							<p><?php the_sub_field( 'address_1' ); ?></p>

							<?php if ( get_sub_field( 'address_2' ) ) : ?>
								<p><?php the_sub_field( 'address_2' ); ?></p>
							<?php endif; ?>

							<p><?php echo $city . ', ' . $state . ' ' . $zipcode ?></p>

							<p><?php the_sub_field( 'country' ); ?></p>
							<p><a href="tel:<?php echo $num; ?>" target="blank"><?php echo $num; ?></a></p>
						</div>

					</address>

				<?php endwhile; ?>

			</div>
		</div>
	</section>

<?php endif;

