<?php
/**
 * Uninstall Mergebot
 *
 * @package     Mergebot
 * @subpackage  Uninstall
 * @since       0.1
 */

// Exit if accessed directly
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . '/includes/uninstall.php';

Mergebot_Uninstall::init();