<?php

/**
 * The query helper class.
 *
 * This is for methods shared acorss Query classes
 *
 * @since 0.1
 */

namespace DeliciousBrains\Mergebot\Utils;

class Query_Helper {

	/**
	 * Get the type of query from SQL statement.
	 *
	 * @param $sql
	 *
	 * @return bool|string Returns false if not an allowed type.
	 */
	public static function get_statement_type( $sql ) {
		global $wpdb;
		if ( preg_match( '@^(' . implode( '|', array_keys( $wpdb->allowed_types ) ) . ')@i', $sql, $matches ) ) {
			return strtoupper( $matches[0] );
		}

		return false;
	}

	/**
	 * Get the table involved in the SQL statement.
	 *
	 * @param $type
	 * @param $sql
	 *
	 * @return bool|string
	 */
	public static function get_statement_table( $type, $sql ) {
		global $wpdb;
		$types = $wpdb->allowed_types;

		if ( ! isset( $types[ $type ] ) ) {
			return false;
		}

		$sql_prefix = $type;
		$sql_prefix .= $types[ $type ];
		$sql_prefix = str_replace( ' ', '\s+', $sql_prefix );

		if ( ! preg_match( '/' . $sql_prefix . '\s+([^\s]+)/i', $sql, $matches ) ) {
			return false;
		}

		$table = $matches[1];
		$table = str_replace( '`', '', $table );
		$table = str_replace( $wpdb->prefix, '', $table );

		return $table;
	}

	/**
	 * Clean INSERT SQL statements.
	 *
	 * @param string $sql
	 *
	 * @return string
	 */
	public static function clean_insert_sql( $sql ) {
		if ( preg_match( '/INSERT INTO\s+([^ ][^\s.]*)?\(/', $sql, $matches ) ) {
			// Ensure INSERT statements have space after table name
			$sql = str_replace( $matches[1] . '(', $matches[1] . ' (', $sql );
		}

		// Ensure INSERT statements have space after VALUES
		$sql = str_replace( 'VALUES(', 'VALUES (', $sql );

		return $sql;
	}

	/**
	 * Does the SQL statement contain a string?
	 *
	 * @param string $sql
	 * @param string $needle       Regex for searching
	 * @param bool   $compress_sql Removes spaces from SQL for searching
	 *
	 * @return bool|mixed
	 */
	public static function contains( $sql, $needle, $compress_sql = true ) {
		if ( $compress_sql ) {
			$sql = str_replace( ' ', '', $sql );
		}

		if ( preg_match( '@(' . $needle . ')@i', $sql ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Does SQL statement contain any excluded queries
	 *
	 * @param string $sql
	 * @param array     $blacklist
	 *
	 * @return bool
	 */
	public static function sql_contains_excluded_queries( $sql, $blacklist ) {
		$blacklist = implode( '|', $blacklist );
		$blacklist = str_replace( ' ', '', $blacklist );

		return Query_Helper::contains( $sql, $blacklist );
	}

	/**
	 * Does the query require a snapshot of the data to be take before execution.
	 *
	 * @param string $query
	 * @param string $type
	 * @param string $table
	 *
	 * @return bool
	 */
	public static function requires_data_snapshot( $query, $type, $table ) {
		if ( in_array( $type, array( 'UPDATE', 'DELETE' ) ) ) {
			// Record existing data for rows affected by an UPDATE or DELETE
			return true;
		}

		global $wpdb;
		if ( ! isset( $wpdb->unique_meta_tables ) ) {
			return false;
		}

		if ( isset( $wpdb->unique_meta_tables[ $table ] ) && self::contains( $query, 'ON DUPLICATE KEY', false ) ) {
			// Record existing data for rows potentially affected by an INSERT..ON DUPLICATE KEY...UPDATE
			return true;
		}

		return false;
	}
}