<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
// get theme customizer url
$url 	= admin_url() . 'customize.php?';
$url 	.= 'url=' . urlencode( site_url() . '?gateway-plus-customizer=true' );
$url 	.= '&return=' . urlencode( admin_url() . 'themes.php?page=gateway-plus-welcome' );
$url 	.= '&gateway-plus-customizer=true';
?>
<div id="getting_started" class="col one-col panel">

	<div class="getting-started-intro">

		<h3><?php _e( 'Getting Started With Gateway Plus', 'gateway-plus' ); ?> </h3>
		<p><?php _e( 'We\'ve purposely kept Gateway Plus clean and fast but packed full of customization options so setup is a breeze. Here are some common tasks to get you started:', 'gateway-plus' ); ?></p>

	</div><!-- .getting-started-intro -->

	<div class="getting-started-content">

		<div class="content-section">

			<!-- Install Recommended Plugins -->
			<h3><?php _e( '1. Install Recommended Plugins' ,'gateway-plus' ); ?></h3>
			<p><?php _e( 'Although Gateway Plus works fine as a standalone WordPress theme, there are a few recommended plugins. Once the plugins are installed, be sure to activate them:', 'gateway-plus' ); ?></p>
			
			<?php 
			/**
			 * Jetpack plugin activation notice
			 */
			if ( ! class_exists( 'Jetpack' ) ) { ?>
			<p>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=jetpack' ), 'install-plugin_jetpack' ) ); ?>" class="button button-primary">
					<?php _e( 'Install Jetpack', 'gateway-plus' ); ?>
				</a>
			</p>
			<?php } else { ?>
			<p>
				<a href="<?php echo esc_url( self_admin_url( 'plugins.php' ) ); ?>" class="button">
					<?php _e( 'Jetpack Installed!', 'gateway-plus' ); ?>
				</a>
				<span class="dashicons dashicons-yes"></span>
			</p>
			<?php }

			/**
			 * Rescue Shortcodes plugin activation notice
			 */
			if ( ! function_exists( 'rescue_shortcodes_media_button' ) ) { ?>
			<p>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=rescue-shortcodes' ), 'install-plugin_rescue-shortcodes' ) ); ?>" class="button button-primary">
					<?php _e( 'Rescue Shortcodes', 'gateway-plus' ); ?>
				</a>
			</p>
			<?php } else { ?>
			<p>
				<a href="<?php echo esc_url( self_admin_url( 'plugins.php' ) ); ?>" class="button">
					<?php _e( 'Rescue Shortcodes Installed!', 'gateway-plus' ); ?>
				</a>
				<span class="dashicons dashicons-yes"></span>
			</p>
			<?php } ?>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '2. Configure Menu' ,'gateway-plus' ); ?></h3>
			<p><?php _e( 'Gateway Plus includes a primary menu located in the header area of the theme. The primary navigation is perfect for your key pages like the blog and contact page. Click below to navigate to the navigation menu system.', 'gateway-plus' ); ?></p>
			<p><a href="<?php echo esc_url( self_admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php _e( 'Configure Menu', 'gateway-plus' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '3. Create a Home and Blog Page', 'gateway-plus' ); ?></h3>
			<p><?php _e( 'Gateway Plus includes multiple home page templates. To use a home page template, create a new page and assign the home page template to it that you\'d like to use.', 'gateway-plus' ); ?></p>

			<p><a href="http://docs.rescuethemes.com/article/47-gateway-create-the-homepage" class="button button" target="_blank"><?php _e( 'Creating the Homepage &rarr;', 'gateway-plus' ); ?></a></p>

			<p><?php _e( 'The blog page will display from the theme\'s index template. This means that there\'s no need to assign a custom template to display your blog page. Simply create a new page that will be dedicated to your posts and assign it in your Reading settings.', 'gateway-plus' ); ?></p>

			<p><a href="http://docs.rescuethemes.com/article/49-gateway-create-the-blog-page" class="button button" target="_blank"><?php _e( 'Creating the Blog Page &rarr;', 'gateway-plus' ); ?></a></p>

			<p><?php _e( 'Assign both your "Home" Front Page and "Blog" Posts page in your Reading settings.', 'gateway-plus' ); ?></p>

			<p><a href="<?php echo esc_url( self_admin_url( 'options-reading.php' ) ); ?>" class="button button"><?php _e( 'Reading Settings', 'gateway-plus' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '4. Customize Theme Settings' ,'gateway-plus' ); ?></h3>
			<p><?php _e( 'Using the WordPress Customizer you can modify Gateway Plus\' appearance to match your own style.', 'gateway-plus' ); ?></p>
			<p><a href="<?php echo esc_url( $url ); ?>" class="button"><?php _e( 'Open the Customizer', 'gateway-plus' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( 'View documentation', 'gateway-plus' ); ?></h3>
			<p><?php _e( 'You can read detailed information on Gateway Plus\' features and review additional instructions in the documentation:', 'gateway-plus' ); ?></p>
			<p><a href="http://docs.rescuethemes.com/collection/22-gateway" class="button" target="_blank"><?php _e( 'View documentation &rarr;', 'gateway-plus' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( 'Demo Content &amp; Resources', 'gateway-plus' ); ?></h3>
			<p><?php _e( 'Your Rescue Themes account will include a number of resources for your theme include demo content:', 'gateway-plus' ); ?></p>
			<p><a href="https://rescuethemes.com/account" class="button" target="_blank"><?php _e( 'Your Rescue Themes Account &rarr;', 'gateway-plus' ); ?></a></p>
			<p><a href="http://docs.rescuethemes.com/article/43-gateway-demo-content" class="button" target="_blank"><?php _e( 'Installing Demo Content &rarr;', 'gateway-plus' ); ?></a></p>

		</div><!-- .content-section -->

	</div><!-- .getting-started-content -->

</div><!-- #getting_started -->