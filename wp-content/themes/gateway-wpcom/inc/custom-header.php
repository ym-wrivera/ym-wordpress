<?php
/**
 *
 * @package Gateway
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses gateway_header_style()
 * @uses gateway_admin_header_style()
 * @uses gateway_admin_header_image()
 */
function gateway_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'gateway_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/img/hero-bg.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 2560,
		'height'                 => 640,
		'flex-height'            => true,
		'wp-head-callback'       => 'gateway_header_style',
		'admin-head-callback'    => 'gateway_admin_header_style',
		'admin-preview-callback' => 'gateway_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'gateway_custom_header_setup' );

register_default_headers( array(
	'default' => array(
		'url'           => get_template_directory_uri() . '/img/hero-bg.jpg',
		'thumbnail_url' => get_template_directory_uri() . '/img/hero-bg-thumb.jpg',
		'description'   => esc_html__( 'City', 'gateway' )
	),
) );

if ( ! function_exists( 'gateway_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see gateway_custom_header_setup().
 */
function gateway_header_style() {
	$header_image      = get_header_image();
	$header_text_color = get_header_textcolor();
	$header_position   = esc_attr( get_theme_mod( 'header_position', 'fixed' ) );

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color && ! $header_image ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>

	<?php if ( $header_image ) : ?>
		.header-bg {
			background-image: url( <?php echo get_header_image(); ?> );
			background-repeat: no-repeat;
		}

		@media screen and ( min-width: 50em ) {
			.header-bg {
				background-attachment: <?php echo $header_position; ?>;
				<?php if ( 'fixed' == $header_position ) { ?>
					background-size: 100%;
					background-position: top center;
				<?php } ?>
				<?php if ( 'scroll' == $header_position ) { ?>
					background-position: center;
				<?php } ?>
			}
		}
	<?php endif; ?>

	</style>
	<?php
}
endif; // gateway_header_style

if ( ! function_exists( 'gateway_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see gateway_custom_header_setup().
 */
function gateway_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // gateway_admin_header_style

if ( ! function_exists( 'gateway_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see gateway_custom_header_setup().
 */
function gateway_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // gateway_admin_header_image
