<?php
/**
 * Adds theme support for header images if not already present.
 */
function gateway_plus_backstretch_setup() {
	if ( ! get_theme_support( 'custom-header' ) )

	$args = array(
		'default-image' 	=> get_template_directory_uri() . '/img/hero-bg.jpg',
		'width'             => 2000,
		'height'            => 1300,
	);
	add_theme_support( 'custom-header', $args );
}

add_action( 'after_setup_theme', 'gateway_plus_backstretch_setup', 100 );

/**
 * Required scripts are loaded.
 */
function gateway_plus_home_hero_scripts() {

	/**
	 * Check for the home page template and if the video option is not selected
	 */
	if ( is_page_template( 'template-home.php' ) ) {

		/**
		 * Registers the backstretch script
		 */
		wp_enqueue_script( 'basic-backstretch-js', get_template_directory_uri() . '/js/jquery.backstretch.min.js', array('jquery'), '2.0.4', true );

		/**
		 * Load backstretch script in the footer
		 */
		add_action( 'wp_footer', 'gateway_plus_basic_backstretch_inline_script', 100 );

	} // end get_uploaded_header_images 

}

add_action( 'wp_enqueue_scripts', 'gateway_plus_home_hero_scripts' );

/**
 * Inline script will load the full screen background image after all other images
 * on the page have loaded.
 */
function gateway_plus_basic_backstretch_inline_script() { 

	if ( is_page_template( 'template-home.php' ) ) { ?>

	<script>
		jQuery( window ).load( function() {
			jQuery(".page-template-template-home .home-slider").backstretch([ 
			<?php

				/**
				 * Get our customizer options variables.
				 */
				$home_duration = get_theme_mod( 'home_duration', customizer_library_get_default( 'home_duration' ) );
				$home_fade = get_theme_mod( 'home_fade', customizer_library_get_default( 'home_fade' ) );

			    $headers = get_uploaded_header_images(); 

				/**
				 * Display demo image if custom images haven't been uploaded yet
				 */
			    if ( empty( $headers ) ) { 
			    	$demoimage = get_template_directory_uri() . '/img/hero-bg.jpg';
			    ?>

			    "<?php echo esc_url( $demoimage ); ?>",

			    <?php } else {

				/**
				 * Loop through header images
				 */
			    foreach( $headers as $header ) { ?>

			    "<?php echo $header['url']; ?>",

			<?php } } ?>
	  ], {duration: <?php echo esc_html( $home_duration ); ?>, fade: <?php echo esc_html( $home_fade) ; ?>});
		});
	</script>

	<?php } // end is_front_page ?>

<?php } // end gateway_plus_basic_backstretch_inline_script ?>
