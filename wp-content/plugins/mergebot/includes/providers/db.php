<?php

/**
 * Extends the wpdb class
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Providers;

use DeliciousBrains\Mergebot\Services\Development\SQL_Creator;
use DeliciousBrains\Mergebot\Services\Development\SQL_Parser;
use DeliciousBrains\Mergebot\Models\SQL_Query;

class Db extends Db_Facade {

	/**
	 * Meta tables and columns that are UNIQUE indexed.
	 *
	 * @var Array keyed by table name with column as the value.
	 */
	public $unique_meta_tables = array();

	/**
	 * @var array
	 */
	public $allowed_types = array(
		'INSERT' => ' (?:IGNORE )?INTO',
		'UPDATE' => '',
		'DELETE' => ' FROM',
	);

	/**
	 * @var int
	 */
	protected $original_time_limit;

	/**
	 * Overrides the query method so we can hook in after execution
	 *
	 * @param string $sql
	 *
	 * @return int|false
	 */
	public function query( $sql ) {
		$query = new SQL_Query( $sql, new SQL_Parser(), new SQL_Creator( $this->prefix, $this->unique_meta_tables ) );

		// Make sure Mergebot processes have enough time to complete.
		$this->maybe_set_time_limit( 300 );

		$query = apply_filters( 'mergebot_before_query', $query );

		$result = parent::query( $sql );

		if ( false === $result ) {
			apply_filters( 'mergebot_after_query_fail', $query );

			return $result;
		}

		apply_filters( 'mergebot_after_query_success', $query );

		// Reset the time out.
		$this->maybe_set_time_limit();

		return $result;
	}

	/**
	 * Get the last inserted ID
	 *
	 * @return int|string
	 */
	public function get_insert_id() {
		if ( $this->use_mysqli ) {
			$insert_id = mysqli_insert_id( $this->dbh );
		} else {
			$insert_id = mysql_insert_id( $this->dbh );
		}

		return $insert_id;
	}

	/**
	 * Attempt to set the time out so we don't whitescreen whilst processing queries.
	 *
	 * @param null|int $limit
	 *
	 * @return bool
	 */
	protected function maybe_set_time_limit( $limit = null ) {
		if ( ini_get( 'safe_mode' ) ) {
			return false;
		}

		if ( ! function_exists( 'set_time_limit' ) || ! function_exists( 'ini_get' ) ) {
			return false;
		}

		if ( ! is_null( $this->original_time_limit )) {
			// If we have recorded the original time limit, use it to reset it.
			$limit = $this->original_time_limit;
		}

		if ( ! is_null( $limit ) ) {
			// We are manually changing the time limit, so record the original for later.
			$this->original_time_limit = ini_get( 'max_execution_time' );
		}

		return @set_time_limit( $limit );
	}

}