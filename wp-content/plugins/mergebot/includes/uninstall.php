<?php

/**
 * The class for the uninstalling the plugin.
 *
 * @since 0.1
 */
class Mergebot_Uninstall {

	/**
	 * Uninstall the plugin
	 */
	public static function init() {
		global $wpdb;

		// Remove settings
		delete_option( 'mergebot_settings' );
		delete_option( 'mergebot_process_lock' );
		delete_option( 'mergebot_changes_recorded' );
		delete_option( 'mergebot_primary_keys' );
		delete_option( 'mergebot_query_limit' );
		delete_option( 'mergebot_recorded_query' );
		delete_option( 'mergebot_dismissed_reminder' );

		// Remove deployment keys
		$statement = "DELETE FROM {$wpdb->options}
			 WHERE `option_name` LIKE %s";

		$wpdb->query( $wpdb->prepare( $statement, 'mergebot_deployment_production_%' ) );
		$wpdb->query( $wpdb->prepare( $statement, 'mergebot_deployment_development_%' ) );

		// Remove transients
		delete_transient( 'mergebot_sites' );
		delete_transient( 'mergebot_teams' );
		delete_transient( 'mergebot_primary_keys' );
		delete_transient( 'mergebot_notices_' . md5( home_url() ) );

		// Remove user meta
		$statement = "DELETE FROM {$wpdb->usermeta}
			 WHERE `meta_key` LIKE %s";

		$wpdb->query( $wpdb->prepare( $statement, 'mergebot_notices_%' ) );
		$wpdb->query( $wpdb->prepare( $statement, 'mergebot_dismissed_notices_%' ) );

		// Remove database tables
		$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "mergebot_queries" );
		$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "mergebot_data" );
		$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "mergebot_changesets" );
		$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "mergebot_conflicts" );
		$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "mergebot_deployment_inserts" );
	}
}