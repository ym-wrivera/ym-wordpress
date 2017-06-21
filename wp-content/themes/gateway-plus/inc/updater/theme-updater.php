<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Gateway Plus Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://rescuethemes.com', // Site where EDD is hosted
		'item_name' => 'Gateway Plus', // Name of theme
		'theme_slug' => 'gateway-plus', // Theme slug
		'version' => '1.4.8', // The current version of this theme
		'author' => 'Rescue Themes', // The author of this theme
		'download_id' => '', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'gateway-plus' ),
		'enter-key' => __( 'Enter your theme license key.', 'gateway-plus' ),
		'license-key' => __( 'License Key', 'gateway-plus' ),
		'license-action' => __( 'License Action', 'gateway-plus' ),
		'deactivate-license' => __( 'Deactivate License', 'gateway-plus' ),
		'activate-license' => __( 'Activate License', 'gateway-plus' ),
		'status-unknown' => __( 'License status is unknown.', 'gateway-plus' ),
		'renew' => __( 'Renew?', 'gateway-plus' ),
		'unlimited' => __( 'unlimited', 'gateway-plus' ),
		'license-key-is-active' => __( 'License key is active.', 'gateway-plus' ),
		'expires%s' => __( 'Expires %s.', 'gateway-plus' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'gateway-plus' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'gateway-plus' ),
		'license-key-expired' => __( 'License key has expired.', 'gateway-plus' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'gateway-plus' ),
		'license-is-inactive' => __( 'License is inactive.', 'gateway-plus' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'gateway-plus' ),
		'site-is-inactive' => __( 'Site is inactive.', 'gateway-plus' ),
		'license-status-unknown' => __( 'License status is unknown.', 'gateway-plus' ),
		'update-notice' => __( "Notice: Any customizations you have made to theme files will be lost during the update. Please consider using a child theme if not already. 'Cancel' to stop, 'OK' to update.", 'gateway-plus' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'gateway-plus' )
	)

);
