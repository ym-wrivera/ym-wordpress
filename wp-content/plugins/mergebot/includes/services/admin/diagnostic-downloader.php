<?php

/**
 * The class that handles downloading the diagnostic log for support
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Services\Admin;

use DeliciousBrains\Mergebot\Models\Plugin;
use DeliciousBrains\Mergebot\Utils\Support;

class Diagnostic_Downloader {

	/**
	 * @var Plugin
	 */
	protected $bot;

	/**
	 * Diagnostic_Downloader constructor.
	 *
	 * @param Plugin $bot
	 */
	public function __construct( Plugin $bot ) {
		$this->bot = $bot;
	}

	/**
	 * Initialize hooks
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'handle_diagnostic_download' ) );
	}

	/**
	 * Listen for diagnostic log requests and render it
	 *
	 * @return bool|void
	 */
	public function handle_diagnostic_download() {
		$diagnostic = $this->bot->filter_input( 'diagnostic' );
		if ( ! isset( $diagnostic ) || 'download' !== $diagnostic ) {
			return false;
		}

		$nonce = $this->bot->filter_input( 'nonce' );
		if ( ! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'diagnostic-log' ) ) {
			return false;
		}

		ob_start();
		$this->format_diagnostic_info();
		$this->format_plugins_list();
		$log = ob_get_clean();

		$url      = parse_url( home_url() );
		$host     = sanitize_file_name( $url['host'] );
		$filename = sprintf( '%s-mergebot-diagnostic-log-%s.txt', $host, date( 'YmdHis' ) );

		return $this->download_log( $filename, $log );
	}

	/**
	 * Return the log contents.
	 *
	 * @param string $filename
	 * @param string $log
	 */
	protected function download_log( $filename, $log ) {
		header( 'Content-Description: File Transfer' );
		header( 'Content-Type: application/octet-stream' );
		header( 'Content-Length: ' . strlen( $log ) );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		echo $log;
		exit;
	}

	/**
	 * Render the array of diagnostic log data in a string in the format
	 * Key: Value
	 *
	 * @return string
	 */
	public function format_diagnostic_info() {
		$data = $this->get_diagnostic_info();

		$keys = array_keys( $data );

		$log = array_map( function ( $v, $k ) {
			return sprintf( "%s: %s", $k, esc_html( $v ) );
		}, $data, $keys );

		echo implode( "\r\n", $log );
	}

	/**
	 * Get all the diagnostic info
	 *
	 * @return array
	 */
	public function get_diagnostic_info() {
		global $wpdb;

		$hosts = 'None';
		if ( defined( 'WP_HTTP_BLOCK_EXTERNAL' ) && WP_HTTP_BLOCK_EXTERNAL ) {
			$hosts = defined( 'WP_ACCESSIBLE_HOSTS' ) && '' !== trim( WP_ACCESSIBLE_HOSTS ) ? 'Hosts - ' . WP_ACCESSIBLE_HOSTS : 'All';
		}

		$theme_info = wp_get_theme();

		$data = array(
			'site_url()'                     => site_url(),
			'home_url()'                     => home_url(),
			'Database'                       => $wpdb->dbname,
			'Table Prefix'                   => $wpdb->prefix,
			'WordPress'                      => ( is_multisite() ? ' MS' : '' ) . get_bloginfo( 'version', 'display' ),
			'Web Server'                     => ! empty( $_SERVER['SERVER_SOFTWARE'] ) ? $_SERVER['SERVER_SOFTWARE'] : '',
			'PHP'                            => function_exists( 'phpversion' ) ? phpversion() : '',
			'MySQL'                          => $wpdb->db_version(),
			'ext/mysqli'                     => empty( $wpdb->use_mysqli ) ? 'no' : 'yes',
			'PHP Memory Limit'               => function_exists( 'ini_get' ) ? ini_get( 'memory_limit' ) : '',
			'WP Memory Limit'                => WP_MEMORY_LIMIT,
			'WP Locale'                      => get_locale(),
			'WP_DEBUG'                       => ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? 'Yes' : 'No',
			'WP_DEBUG_LOG'                   => ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) ? 'Yes' : 'No',
			'WP_DEBUG_DISPLAY'               => ( defined( 'WP_DEBUG_DISPLAY' ) && WP_DEBUG_DISPLAY ) ? 'Yes' : 'No',
			'SCRIPT_DEBUG'                   => ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? 'Yes' : 'No',
			'PHP Time Limit'                 => function_exists( 'ini_get' ) ? ini_get( 'max_execution_time' ) : '',
			'PHP Error Log'                  => function_exists( 'ini_get' ) ? ini_get( 'error_log' ) : '',
			'WP Cron'                        => ( defined( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON ) ? 'Disabled' : 'Enabled',
			'fsockopen'                      => function_exists( 'fsockopen' ) ? 'Enabled' : 'Disabled',
			'cURL'                           => function_exists( 'curl_init' ) ? 'Enabled' : 'Disabled',
			'OpenSSL'                        => defined( 'OPENSSL_VERSION_TEXT' ) ? OPENSSL_VERSION_TEXT : 'Disabled',
			'Blocked External HTTP Requests' => $hosts,
			'Active Theme Name'              => $theme_info->Name,
			'Active Theme Folder'            => basename( $theme_info->get_stylesheet_directory() ),
		);

		return $data;
	}

	/**
	 * Render list of plugins
	 */
	protected function format_plugins_list() {
		echo "\r\n\r\n";
		echo "Active Plugins:\r\n";
		$active_plugins = Support::get_active_plugins();
		$plugin_details = array();

		foreach ( $active_plugins as $plugin ) {
			$plugin_details[] = $this->get_plugin_details( WP_PLUGIN_DIR . '/' . $plugin );
		}

		asort( $plugin_details );
		echo implode( "\r\n", $plugin_details );

		$mu_plugins = wp_get_mu_plugins();
		if ( $mu_plugins ) {
			$mu_plugin_details = array();
			echo "\r\n\r\n";
			echo "Must-use Plugins:\r\n";

			foreach ( $mu_plugins as $mu_plugin ) {
				$mu_plugin_details[] = $this->get_plugin_details( $mu_plugin );
			}

			asort( $mu_plugin_details );
			echo implode( "\r\n", $mu_plugin_details );
		}
	}

	/**
	 * Helper to display plugin details
	 *
	 * @param string $plugin_path
	 * @param string $suffix
	 *
	 * @return string
	 */
	protected function get_plugin_details( $plugin_path, $suffix = '' ) {
		$plugin_data = get_plugin_data( $plugin_path );
		if ( empty( $plugin_data['Name'] ) ) {
			return basename( $plugin_path );
		}

		return sprintf( "%s%s (v%s) by %s", $plugin_data['Name'], $suffix, $plugin_data['Version'], strip_tags( $plugin_data['AuthorName'] ) );
	}
}