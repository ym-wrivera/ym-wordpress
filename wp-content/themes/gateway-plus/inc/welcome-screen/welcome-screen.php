<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class Gateway_Plus_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'gateway_plus_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'gateway_plus_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'gateway_plus_welcome_style' ) );

		add_action( 'gateway_plus_welcome', array( $this, 'gateway_plus_welcome_intro' ), 				10 );
		add_action( 'gateway_plus_welcome', array( $this, 'gateway_plus_welcome_tabs' ), 				20 );
		add_action( 'gateway_plus_welcome', array( $this, 'gateway_plus_welcome_getting_started' ), 	30 );
		add_action( 'gateway_plus_welcome', array( $this, 'gateway_plus_welcome_support' ), 				40 );
		add_action( 'gateway_plus_welcome', array( $this, 'gateway_plus_welcome_changelog' ), 		50 );

	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function gateway_plus_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'gateway_plus_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function gateway_plus_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Thanks for choosing Gateway Plus! You can read hints and tips on how get the most out of your new theme on the %stheme info screen%s.', 'gateway_plus' ), '<a href="' . esc_url( admin_url( 'themes.php?page=gateway-plus-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=gateway-plus-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Gateway Plus', 'gateway-plus' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 */
	public function gateway_plus_welcome_style() {
		global $gateway_plus_version;

		wp_enqueue_style( 'gateway-plus-welcome-screen', get_template_directory_uri() . '/inc/welcome-screen/css/welcome.css', $gateway_plus_version );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 */
	public function gateway_plus_welcome_register_menu() {
		add_theme_page( 'Theme Info', 'Theme Info', 'read', 'gateway-plus-welcome', array( $this, 'gateway_plus_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 */
	public function gateway_plus_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked gateway_plus_welcome_intro - 10
			 * @hooked gateway_plus_welcome_getting_started - 20
			 * @hooked gateway_plus_welcome_addons - 30
			 */
			do_action( 'gateway_plus_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 */
	public function gateway_plus_welcome_intro() {
		require_once( get_template_directory() . '/inc/welcome-screen/sections/intro.php' );
	}

	/**
	 * Welcome screen intro
	 */
	public function gateway_plus_welcome_tabs() {
		require_once( get_template_directory() . '/inc/welcome-screen/sections/tabs.php' );
	}

	/**
	 * Welcome screen getting started section
	 */
	public function gateway_plus_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/welcome-screen/sections/start.php' );
	}

	/**
	 * Welcome screen support theme
	 */
	public function gateway_plus_welcome_support() {
		require_once( get_template_directory() . '/inc/welcome-screen/sections/support.php' );
	}

	/**
	 * Welcome screen changelog
	 */
	public function gateway_plus_welcome_changelog() {
		require_once( get_template_directory() . '/inc/welcome-screen/sections/changelog.php' );
	}

	/**
	 * Display the changelog file from the theme
	 */
	public function gateway_plus_changlog() {

		WP_Filesystem();
		global $wp_filesystem;

		$file = $wp_filesystem->get_contents( get_template_directory_uri() . '/changelog.txt' );
		$readme = nl2br( $file );

		return wp_kses_post( $readme );

	}

}

$GLOBALS['Gateway_Plus_Welcome'] = new Gateway_Plus_Welcome();
