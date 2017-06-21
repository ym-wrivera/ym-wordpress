<?php

/**
 * The class for synchronizing the site data with the app
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Services;

use DeliciousBrains\Mergebot\Services\Admin\Settings_Handler;
use DeliciousBrains\Mergebot\Models\Plugin;

class Site_Synchronizer {

	/**
	 * @var Plugin
	 */
	protected $bot;

	/**
	 * @var Site_Register
	 */
	protected $site_register;

	/**
	 * @var App_Interface
	 */
	protected $app;

	/**
	 * @var Settings_Handler
	 */
	protected $settings_handler;

	/**
	 * Site_Synchronizer constructor.
	 *
	 * @param Plugin           $bot
	 * @param Site_Register    $site_register
	 * @param App_Interface    $app
	 * @param Settings_Handler $settings_handler
	 */
	public function __construct( Plugin $bot, Site_Register $site_register, App_Interface $app, Settings_Handler $settings_handler ) {
		$this->bot              = $bot;
		$this->site_register    = $site_register;
		$this->app              = $app;
		$this->settings_handler = $settings_handler;
	}


	/**
	 * Initialise the hooks
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'update_table_prefix' ), 9 ); // Hooked earlier than our install process
		add_action( 'upgrader_process_complete', array( $this, 'update_wp_version' ), 20, 2 );
		add_action( 'update_option_active_plugins', array( $this, 'update_plugins_for_site' ) );
		add_action( 'switch_theme', array( $this, 'update_theme_for_site' ), 10, 2 );
		add_action( 'upgrader_process_complete', array( $this, 'update_plugin_theme_version' ), 10, 2 );
	}

	/**
	 * Notify the App of a WP core version upgrade for the site
	 *
	 * @param Core_Upgrader $core_upgrader
	 * @param array         $args
	 *
	 * @return bool
	 */
	public function update_wp_version( $core_upgrader, $args ) {
		if ( ! isset( $args['action'] ) || 'update' !== $args['action'] ) {
			return false;
		}

		if ( ! isset( $args['type'] ) || 'core' !== $args['type'] ) {
			return false;
		}

		if ( false === $this->settings_handler->get_site_id() ) {
			// Site not registered with app, bail
			return false;
		}

		// Update version on app
		return (bool) $this->update_site_wp_version();
	}

	/**
	 * Ensure the table prefix is up to date in the app
	 */
	public function update_table_prefix() {
		if ( $this->bot->doing_ajax() || $this->bot->doing_cron() ) {
			return false;
		}

		global $wpdb;
		$current_prefix = $this->settings_handler->get( 'table_prefix', false );

		if ( false !== $current_prefix && $current_prefix === $wpdb->prefix ) {
			// Prefix has been stored and still current
			return false;
		}

		// Prefix has changed, save and ensure the app is up to date
		$this->settings_handler->set( 'table_prefix', $wpdb->prefix )->save();

		if ( ! $this->bot->is_dev_mode() ) {
			// Post the prefix to the app for Production mode, Development is handled by updating the settings
			$this->update_site_settings( null, $wpdb->prefix );
		}

		if ( false !== $current_prefix ) {
			// If current prefix has changed, wipe the table version numbers so a reinstall is attempted
			$this->settings_handler->delete( 'db_table_versions' )->save();
		}

		return true;
	}

	/**
	 * Update the site WP version stored on the app
	 *
	 * @return array|bool|mixed|object
	 */
	protected function update_site_wp_version() {
		global $wp_version;

		$args = array(
			'unique_id'  => $this->site_register->get_site_unique_id(),
			'wp_version' => $wp_version,
		);

		$site = $this->app->post_site_settings( $args );

		if ( is_wp_error( $site ) ) {
			return false;
		}

		return $site;
	}

	/**
	 * Update the plugins on the app when they change on site
	 *
	 * @param array $plugins
	 *
	 * @return bool
	 */
	public function update_plugins_for_site( $plugins ) {
		$site_id = $this->settings_handler->get_site_id();
		if ( false === $site_id ) {
			return false;
		}

		return (bool) $this->update_site_plugins( $site_id );
	}

	/**
	 * Update the app when a theme or plugins get upgraded.
	 *
	 * @param \WP_Upgrader $upgrader
	 * @param array        $options
	 *
	 * @return bool
	 */
	public function update_plugin_theme_version( $upgrader, $options ) {
		if ( ! isset( $options['type'] ) ) {
			return false;
		}

		if ( 'plugin' === $options['type'] ) {
			return $this->update_plugins_for_site( array() );
		}

		if ( 'theme' !== $options['type'] || ! isset( $options['themes'] ) ) {
			return false;
		}

		$theme = wp_get_theme();
		foreach ( $options['themes'] as $theme_name ) {
			if ( $theme->get_stylesheet() !== $theme_name ) {
				continue;
			}

			return $this->update_theme_for_site( '', $theme );
		}

		return false;
	}

	/**
	 * Update the site plugins stored on the app
	 *
	 * @param int $site_id
	 *
	 * @return array|bool|mixed|object
	 */
	protected function update_site_plugins( $site_id ) {
		$args = array(
			'site_id' => $site_id,
			'plugins' => serialize( $this->site_register->get_plugins() ),
		);

		$site = $this->app->post_site_plugins( $args );

		if ( is_wp_error( $site ) ) {
			return false;
		}

		return $site;
	}

	/**
	 * Update the plugins on the app when they change on site
	 *
	 * @param string    $name
	 * @param \WP_Theme $theme
	 *
	 * @return bool
	 */
	public function update_theme_for_site( $name, $theme ) {
		$site_id = $this->settings_handler->get_site_id();
		if ( false === $site_id ) {
			return false;
		}

		return (bool) $this->update_site_theme( $site_id, $theme );
	}

	/**
	 * Update the site theme stored on the app
	 *
	 * @param int            $site_id
	 * @param null|\WP_Theme $theme
	 *
	 * @return array|bool|mixed|object
	 */
	protected function update_site_theme( $site_id, $theme = null ) {
		$args = array(
			'site_id' => $site_id,
			'theme'   => serialize( $this->site_register->get_theme( $theme ) ),
		);

		$site = $this->app->post_site_theme( $args );

		if ( is_wp_error( $site ) ) {
			return false;
		}

		return $site;
	}

	/**
	 * Get the settings for a site already stored on app
	 *
	 * @return mixed
	 */
	public function get_site_settings() {
		$unique_id = $this->site_register->get_site_unique_id();

		$settings = $this->app->silent()->get_site_settings( $unique_id );

		if ( is_wp_error( $settings ) ) {
			// The site doesn't exist on the app
			$settings = false;
		} else {
			$settings = maybe_unserialize( $settings->settings );
		}

		return $settings;
	}

	/**
	 * Update the site settings stored on the app
	 *
	 * @param null|array  $settings
	 * @param null|string $table_prefix
	 *
	 * @return array|bool|mixed|object
	 */
	public function update_site_settings( $settings = null, $table_prefix = null ) {
		if ( ! is_null( $settings ) ) {
			$args['settings'] = serialize( $settings );
		}

		if ( ! is_null( $table_prefix ) ) {
			$args['table_prefix'] = $table_prefix;
		}

		if ( empty( $args ) ) {
			return false;
		}

		return $this->post_site_settings( $args );
	}

	/**
	 * Update site settings
	 *
	 * @param array $args
	 *
	 * @return array|bool|mixed|object
	 */
	public function post_site_settings( $args = array() ) {
		$defaults = array(
			'unique_id' => $this->site_register->get_site_unique_id(),
		);

		$args = array_merge( $defaults, $args );

		$site = $this->app->post_site_settings( $args );

		if ( is_wp_error( $site ) ) {
			$site = false;
		}

		return $site;
	}
}