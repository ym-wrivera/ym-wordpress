<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$gateway_plus = wp_get_theme( 'gateway-plus' );

?>
<div class="theme-intro">

	<div class="intro-text">
		<h1 style="margin-right: 0;"><?php echo '<strong>Gateway Plus</strong> <sup>' . esc_attr( $gateway_plus['Version'] ) . '</sup>'; ?></h1>

		<p style="font-size: 1.2em;"><?php _e( 'Thanks for using the Gateway Plus theme! This info page should help you get started and serve as a handy reference area.', 'gateway-plus' ); ?></p>
		<p><?php _e( 'Gateway Plus incorporates elegant style with user friendly customizer options making it perfectly suited for a variety of WordPress users.', 'gateway-plus' ); ?></p>
	</div>

	<div class="theme-screenshot">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="gateway-plus" class="image-50" width="440" />
	</div>

</div><!-- .theme-intro -->
