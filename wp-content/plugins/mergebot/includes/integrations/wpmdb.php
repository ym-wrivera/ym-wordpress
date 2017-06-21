<?php

/**
 * The class for the defining compatibility with WP Migrate DB
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Integrations;

use DeliciousBrains\Mergebot\Models\Excluded_Object;
use DeliciousBrains\Mergebot\Models\Plugin;
use DeliciousBrains\Mergebot\Providers\Modes\Abstract_Mode;

class WPMDB {

	/**
	 * @var Plugin
	 */
	protected $bot;

	/**
	 * @var Abstract_Mode
	 */
	protected $mode;

	/**
	 * WPMDB constructor.
	 *
	 * @param Plugin           $bot
	 * @param Abstract_Mode    $mode
	 */
	public function __construct( Plugin $bot, Abstract_Mode $mode ) {
		$this->bot = $bot;
		$this->mode = $mode;
	}

	/**
	 * Instantiate the hooks
	 */
	public function init() {

		/*
		 * Do not record WPMDB specific queries for a migration
		 */
		add_filter( $this->bot->slug() . '_schema_ignored_queries', array( $this, 'exclude_queries_from_recording' ) );

		/*
		 * Ignore certain queries that are excluded from being stored
		 */
		add_filter( $this->bot->slug() . '_ignore_excluded_queries', array( $this, 'ignore_excluded_queries' ) );

		/*
		 * Filters to assist migrations performed by WP Migrate DB Pro
		 * in preserving tables and settings used by Mergebot.
		 */
		add_filter( 'wpmdb_preserved_options', array( $this, 'preserve_settings' ) );
		add_filter( 'wpmdb_tables', array( $this, 'exclude_tables' ) );
		add_filter( 'wpmdb_rows_where', array( $this, 'exclude_changes_recorded_flag' ), 10, 2 );

		/*
		 * Clear excluded objects table on a pull migration in dev mode
		 */
		add_action( 'wpmdb_migration_complete', array( $this, 'migration_complete' ) );
	}

	/**
	 * Don't record queries on the migration temp tables and any state queries
	 *
	 * @param array $queries
	 *
	 * @return array
	 */
	public function exclude_queries_from_recording( $queries ) {
		global $wpdb;
		$queries['_mig_(.*)']        = array( '(.*)' ); // Ignore migration temporary table queries.
		$queries[ $wpdb->options ][] = 'wpmdb_state_'; // Ignore state option record queries

		return $queries;
	}

	/**
	 * Don't store the excluded INSERTs for the _mig tables
	 *
	 * @param array $queries
	 *
	 * @return array
	 */
	public function ignore_excluded_queries( $queries ) {
		$queries[] = '`_mig_';

		return $queries;
	}

	/**
	 * Make sure WP Migrate DB Pro does not migrate our settings
	 * across environments with different modes
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	public function preserve_settings( $options ) {
		$options[] = $this->bot->settings_key();
		$options[] = $this->bot->slug() . '_query_limit';
		$options[] = $this->bot->slug() . '_dismissed_reminder';

		return $options;
	}

	/**
	 * Remove the tables from any migrations using WP Migrate DB Pro.
	 *
	 * @param array $clean_tables
	 *
	 * @return array
	 */
	public function exclude_tables( $clean_tables ) {
		$plugin_tables = $this->mode->get_tables();
		
		foreach ( $clean_tables as $i => $table ) {
			foreach ( $plugin_tables as $plugin_table ) {
				if ( false !== strpos( $table, $plugin_table ) ) {
					unset( $clean_tables[ $i ] );

					break;
				}
			}
		}

		return array_values( $clean_tables );
	}

	/**
	 * Never migrate the changes_recorded option between installs
	 *
	 * @param string $where
	 * @param string $table
	 *
	 * @return string
	 */
	public function exclude_changes_recorded_flag( $where, $table ) {
		global $wpdb;

		if ( $wpdb->prefix . 'options' !== $table ) {
			return $where;
		}

		$where .= ( empty( $where ) ? 'WHERE ' : ' AND ' );
		$where .= sprintf( "`option_name` != '%s'", $this->bot->slug() . '_changes_recorded' );

		return $where;
	}

	/**
	 * Clear the Excluded Objects table after a pull migration in dev mode
	 *
	 * @param string $migration_type
	 *
	 * @return bool
	 */
	public function migration_complete( $migration_type ) {
		if ( ! $this->bot->is_dev_mode() ) {
			return false;
		}

		if ( 'pull' === $migration_type ) {
			Excluded_Object::delete_all();

			return true;
		}

		return false;
	}
}
