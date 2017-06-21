<?php

/**
 * The support class.
 *
 * This contains methods used for providing support for users of the plugin.
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Utils;

class Support {

	/**
	 * @var string
	 */
	const EMAIL_ADDRESS = 'sos@mergebot.com';

	/**
	 * Request for support
	 *
	 * @param string $subject
	 * @param string $body
	 *
	 * @return string
	 */
	protected static function request( $subject, $body ) {
		$args = array(
			'subject' => $subject,
			'body'    => $body,
		);

		$args = array_map( 'rawurlencode', $args );

		$url = add_query_arg( $args, 'mailto:' . self::EMAIL_ADDRESS );

		return $url;
	}

	/**
	 * Generate a mailto: link for support
	 *
	 * @param int                         $site_id
	 * @param string                      $error
	 * @param string                      $message
	 * @param null|string|Error|\WP_Error $details
	 *
	 * @return string
	 */
	public static function generate_link( $site_id, $error, $message, $details = null ) {
		$body = sprintf( "Hi,\r\n\r\nI have received the following error whilst using the Mergebot plugin on %s (%s) in %s mode: \r\n\r\n%s", home_url(), $site_id, ucfirst( Config::mode() ), $message );

		if ( ! is_null( $details ) ) {
			$body .= "\r\n\r\nDetails: ";
			if ( is_wp_error( $details ) ) {
				$body .= "\r\n" . __( 'Error #' ) . ': ' . $details->get_error_code();
				$body .= "\r\n" . $details->get_error_message();
				$body .= "\r\n" . print_r( $details->get_error_data(), true );
			} elseif ( is_array( $details ) ) {
				$body .= "\r\n" . print_r( $details, true );
			} else {
				$body .= $details;
			}
		}

		$url = self::request( $error, $body );

		$link = sprintf( '<a href="%s">%s</a>', $url, __( 'contact support' ) );

		return sprintf( __( 'Please %s.' ), $link );
	}

	/**
	 * Get the URL for a support request
	 *
	 * @param int $site_id
	 *
	 * @return string
	 */
	public static function get_support_url( $site_id ) {
		$body = sprintf( "Hi,\r\n\r\nI am using the Mergebot plugin on %s (%s) in %s mode. \r\n\r\nI am having the following issue", home_url(), $site_id, ucfirst( Config::mode() ) );

		return self::request( '', $body );
	}

	/**
	 * Get all the active plugins for a site
	 *
	 * @return array
	 */
	public static function get_active_plugins() {
		$active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ) {
			$network_active_plugins = wp_get_active_network_plugins();
			$active_plugins         = array();

			foreach ( $network_active_plugins as $plugin ) {
				$active_plugins[] = self::remove_wp_plugin_dir( $plugin );
			}
		}

		return $active_plugins;
	}

	/**
	 * Helper to remove the plugin directory from the plugin path
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	protected static function remove_wp_plugin_dir( $path ) {
		$plugin = str_replace( WP_PLUGIN_DIR, '', $path );

		return substr( $plugin, 1 );
	}
}