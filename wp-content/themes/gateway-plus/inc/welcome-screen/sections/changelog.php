<?php
/**
 * Welcome screen changelog template
 */
?>

<div id="changelog" class="gateway-plus-changelog panel">

	<div class="changelog-intro">

		<h3><?php _e( 'Version Update Details', 'gateway-plus' ); ?> </h3>
		<p><?php _e( 'Review Gateway Plus\' version details and release dates.', 'gateway-plus' ); ?></p>

	</div><!-- .changelog-intro -->

	<div class="content-section">

		<?php 
		/**
		 * Display the changelog file from the theme
		 */
			echo wp_kses_post ( $this->gateway_plus_changlog() );
		?>

	</div><!-- .content-section -->


</div><!-- #changelog -->