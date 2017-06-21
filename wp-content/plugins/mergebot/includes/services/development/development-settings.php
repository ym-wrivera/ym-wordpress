<?php

/**
 * The class for the Development mode settings.
 *
 * This is used for the Development mode specific settings functionality.
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Services\Development;

use DeliciousBrains\Mergebot\Services\Site_Synchronizer;
use DeliciousBrains\Mergebot\Models\Plugin;

class Development_Settings {

	/**
	 * @var Plugin
	 */
	protected $bot;

	/**
	 * @var Site_Synchronizer
	 */
	protected $site_synchronizer;

	/**
	 * Settings constructor.
	 *
	 * @param Plugin            $bot
	 * @param Site_Synchronizer $site_synchronizer
	 */
	public function __construct( Plugin $bot, Site_Synchronizer $site_synchronizer ) {
		$this->bot               = $bot;
		$this->site_synchronizer = $site_synchronizer;
	}

	/**
	 * Instantiate the settings hooks
	 */
	public function init() {
		add_filter( $this->bot->slug() . '_get_setting', array( $this, 'get_setting' ) );
		add_action( $this->bot->slug() . '_update_setting', array( $this, 'update_setting' ), 10, 2 );
		add_filter( $this->bot->slug() . '_internal_keys', array( $this, 'add_internal_keys' ) );
	}

	/**
	 * Get the internal setting keys for the mode
	 *
	 * @return array
	 */
	protected function get_internal_keys() {
		return array(
			'recording_id',
			'recording_user_id',
		);
	}

	/**
	 * Add the internal setting keys for the mode
	 *
	 * @param array $settings
	 *
	 * @return array
	 */
	public function add_internal_keys( $settings ) {
		return array_merge( $settings, $this->get_internal_keys() );
	}

	/**
	 * If the Development settings don't exist in the settings
	 * attempt to grab from the app for previously registered sites.
	 *
	 * @param array $settings
	 *
	 * @return array
	 */
	public function get_setting( $settings ) {
		if ( ! isset( $settings[ $this->bot->mode() ] ) ) {
			// See if the Development mode settings have been stored on the app
			$site_settings = $this->site_synchronizer->get_site_settings();

			if ( false !== $site_settings ) {
				// Inject the app stored settings into the plugin
				$settings[ $this->bot->mode() ] = $site_settings;
				update_option( $this->bot->settings_key(), $settings );
			}
		}

		return $settings;
	}

	/**
	 * Hook into the update option settings method
	 * to send Development settings to the app
	 *
	 * @param array  $settings
	 * @param string $key
	 *
	 */
	public function update_setting( $settings, $key ) {
		if ( ! isset( $settings[ $this->bot->mode() ]['site_id'] ) ) {
			// Site not registered with app, bail
			return;
		}

		if ( in_array( $key, $this->get_internal_keys() ) ) {
			// Updating a setting we don't want to store on the app, bail
			return;
		}

		$settings = $settings[ $this->bot->mode() ];

		$table_prefix = null;
		if ( isset( $settings['table_prefix'] ) && ! empty( $settings['table_prefix'] ) ) {
			// Send the table prefix separately
			$table_prefix = $settings['table_prefix'];
		}

		// Update the app with the new plugin Development mode settings
		$this->site_synchronizer->update_site_settings( $settings, $table_prefix );
	}
}