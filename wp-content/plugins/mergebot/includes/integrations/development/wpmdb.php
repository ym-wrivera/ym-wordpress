<?php

/**
 * The class for the defining compatibility with WP Migrate DB
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Integrations\Development;

use DeliciousBrains\Mergebot\Models\Plugin;
use DeliciousBrains\Mergebot\Providers\Modes\Abstract_Mode;
use DeliciousBrains\Mergebot\Services\Development\Recorder_Handler;
use  DeliciousBrains\Mergebot\Integrations\WPMDB as Base_WPMDB;

class WPMDB extends Base_WPMDB {

	/**
	 * @var Recorder_Handler
	 */
	protected $recorder_handler;

	/**
	 * WPMDB constructor.
	 *
	 * @param Plugin           $bot
	 * @param Abstract_Mode    $mode
	 * @param Recorder_Handler $recorder_handler
	 */
	public function __construct( Plugin $bot, Abstract_Mode $mode, Recorder_Handler $recorder_handler ) {
		parent::__construct( $bot, $mode );
		$this->recorder_handler = $recorder_handler;
	}

	/**
	 * Instantiate the hooks
	 */
	public function init() {
		parent::init();

		/*
		 * Turn off recording before starting a migration via the CLI
		 */
		add_action( 'wpmdb_cli_before_initiate_migration', array( $this, 'cli_migration_start' ) );
	}

	/**
	 * Turn off recording queries before a CLI migration
	 */
	public function cli_migration_start() {
		if ( ! $this->bot->is_dev_mode() ) {
			return false;
		}

		$this->recorder_handler->stop_recording( 'wpmdb-cli' );
	}
}
