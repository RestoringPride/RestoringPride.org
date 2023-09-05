<?php
/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Plugins may load this file to gain access to special helper functions
 * for plugin installation. This file is not included by WordPress and it is
=======
 * Plugins may load this file to gain access to special helper functions for
 * plugin installation. This file is not included by WordPress and it is
>>>>>>> fb785cbb (Initial commit)
=======
 * Plugins may load this file to gain access to special helper functions
 * for plugin installation. This file is not included by WordPress and it is
>>>>>>> c058c778 (Combining with the latest source from WP)
 * recommended, to prevent fatal errors, that this file is included using
 * require_once.
 *
 * These functions are not optimized for speed, but they should only be used
 * once in a while, so speed shouldn't be a concern. If it is and you are
<<<<<<< HEAD
<<<<<<< HEAD
 * needing to use these functions a lot, you might experience timeouts.
 * If you do, then it is advised to just write the SQL code yourself.
 *
 *     check_column( 'wp_links', 'link_description', 'mediumtext' );
 *
=======
 * needing to use these functions a lot, you might experience time outs. If you
 * do, then it is advised to just write the SQL code yourself.
 *
 *     check_column( 'wp_links', 'link_description', 'mediumtext' );
>>>>>>> fb785cbb (Initial commit)
=======
 * needing to use these functions a lot, you might experience timeouts.
 * If you do, then it is advised to just write the SQL code yourself.
 *
 *     check_column( 'wp_links', 'link_description', 'mediumtext' );
 *
>>>>>>> c058c778 (Combining with the latest source from WP)
 *     if ( check_column( $wpdb->comments, 'comment_author', 'tinytext' ) ) {
 *         echo "ok\n";
 *     }
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *     $error_count = 0;
 *     $tablename = $wpdb->links;
>>>>>>> fb785cbb (Initial commit)
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
 *     // Check the column.
 *     if ( ! check_column( $wpdb->links, 'link_description', 'varchar( 255 )' ) ) {
 *         $ddl = "ALTER TABLE $wpdb->links MODIFY COLUMN link_description varchar(255) NOT NULL DEFAULT '' ";
 *         $q = $wpdb->query( $ddl );
 *     }
 *
<<<<<<< HEAD
<<<<<<< HEAD
 *     $error_count = 0;
 *     $tablename   = $wpdb->links;
 *
=======
>>>>>>> fb785cbb (Initial commit)
=======
 *     $error_count = 0;
 *     $tablename   = $wpdb->links;
 *
>>>>>>> c058c778 (Combining with the latest source from WP)
 *     if ( check_column( $wpdb->links, 'link_description', 'varchar( 255 )' ) ) {
 *         $res .= $tablename . ' - ok <br />';
 *     } else {
 *         $res .= 'There was a problem with ' . $tablename . '<br />';
 *         ++$error_count;
 *     }
 *
 * @package WordPress
 * @subpackage Plugin
 */

/** Load WordPress Bootstrap */
require_once dirname( __DIR__ ) . '/wp-load.php';

if ( ! function_exists( 'maybe_create_table' ) ) :
	/**
	 * Creates a table in the database if it doesn't already exist.
	 *
	 * @since 1.0.0
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 *
	 * @param string $table_name Database table name.
	 * @param string $create_ddl SQL statement to create table.
	 * @return bool True on success or if the table already exists. False on failure.
	 */
	function maybe_create_table( $table_name, $create_ddl ) {
		global $wpdb;

		foreach ( $wpdb->get_col( 'SHOW TABLES', 0 ) as $table ) {
			if ( $table === $table_name ) {
				return true;
			}
		}

		// Didn't find it, so try to create it.
<<<<<<< HEAD
<<<<<<< HEAD
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
		$wpdb->query( $create_ddl );

		// We cannot directly tell whether this succeeded!
=======
		$wpdb->query( $create_ddl );

		// We cannot directly tell that whether this succeeded!
>>>>>>> fb785cbb (Initial commit)
=======
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
		$wpdb->query( $create_ddl );

		// We cannot directly tell whether this succeeded!
>>>>>>> c058c778 (Combining with the latest source from WP)
		foreach ( $wpdb->get_col( 'SHOW TABLES', 0 ) as $table ) {
			if ( $table === $table_name ) {
				return true;
			}
		}

		return false;
	}
endif;

if ( ! function_exists( 'maybe_add_column' ) ) :
	/**
	 * Adds column to database table, if it doesn't already exist.
	 *
	 * @since 1.0.0
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 *
	 * @param string $table_name  Database table name.
	 * @param string $column_name Table column name.
	 * @param string $create_ddl  SQL statement to add column.
	 * @return bool True on success or if the column already exists. False on failure.
	 */
	function maybe_add_column( $table_name, $column_name, $create_ddl ) {
		global $wpdb;

<<<<<<< HEAD
<<<<<<< HEAD
		// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
=======
>>>>>>> fb785cbb (Initial commit)
=======
		// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
>>>>>>> c058c778 (Combining with the latest source from WP)
		foreach ( $wpdb->get_col( "DESC $table_name", 0 ) as $column ) {
			if ( $column === $column_name ) {
				return true;
			}
		}

		// Didn't find it, so try to create it.
<<<<<<< HEAD
<<<<<<< HEAD
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
		$wpdb->query( $create_ddl );

		// We cannot directly tell whether this succeeded!
		// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
=======
		$wpdb->query( $create_ddl );

		// We cannot directly tell that whether this succeeded!
>>>>>>> fb785cbb (Initial commit)
=======
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
		$wpdb->query( $create_ddl );

		// We cannot directly tell whether this succeeded!
		// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
>>>>>>> c058c778 (Combining with the latest source from WP)
		foreach ( $wpdb->get_col( "DESC $table_name", 0 ) as $column ) {
			if ( $column === $column_name ) {
				return true;
			}
		}

		return false;
	}
endif;

/**
 * Drops column from database table, if it exists.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $table_name  Database table name.
 * @param string $column_name Table column name.
 * @param string $drop_ddl    SQL statement to drop column.
 * @return bool True on success or if the column doesn't exist. False on failure.
 */
function maybe_drop_column( $table_name, $column_name, $drop_ddl ) {
	global $wpdb;

<<<<<<< HEAD
<<<<<<< HEAD
	// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
=======
>>>>>>> fb785cbb (Initial commit)
=======
	// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
>>>>>>> c058c778 (Combining with the latest source from WP)
	foreach ( $wpdb->get_col( "DESC $table_name", 0 ) as $column ) {
		if ( $column === $column_name ) {

			// Found it, so try to drop it.
<<<<<<< HEAD
<<<<<<< HEAD
			// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
			$wpdb->query( $drop_ddl );

			// We cannot directly tell whether this succeeded!
			// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
=======
			$wpdb->query( $drop_ddl );

			// We cannot directly tell that whether this succeeded!
>>>>>>> fb785cbb (Initial commit)
=======
			// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- No applicable variables for this query.
			$wpdb->query( $drop_ddl );

			// We cannot directly tell whether this succeeded!
			// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
>>>>>>> c058c778 (Combining with the latest source from WP)
			foreach ( $wpdb->get_col( "DESC $table_name", 0 ) as $column ) {
				if ( $column === $column_name ) {
					return false;
				}
			}
		}
	}

	// Else didn't find it.
	return true;
}

/**
 * Checks that database table column matches the criteria.
 *
 * Uses the SQL DESC for retrieving the table info for the column. It will help
 * understand the parameters, if you do more research on what column information
<<<<<<< HEAD
<<<<<<< HEAD
 * is returned by the SQL statement. Pass in null to skip checking that criteria.
 *
 * Column names returned from DESC table are case sensitive and are as listed:
 *
 *  - Field
 *  - Type
 *  - Null
 *  - Key
 *  - Default
 *  - Extra
=======
 * is returned by the SQL statement. Pass in null to skip checking that
 * criteria.
 *
 * Column names returned from DESC table are case sensitive and are listed:
 *      Field
 *      Type
 *      Null
 *      Key
 *      Default
 *      Extra
>>>>>>> fb785cbb (Initial commit)
=======
 * is returned by the SQL statement. Pass in null to skip checking that criteria.
 *
 * Column names returned from DESC table are case sensitive and are as listed:
 *
 *  - Field
 *  - Type
 *  - Null
 *  - Key
 *  - Default
 *  - Extra
>>>>>>> c058c778 (Combining with the latest source from WP)
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $table_name    Database table name.
 * @param string $col_name      Table column name.
 * @param string $col_type      Table column type.
 * @param bool   $is_null       Optional. Check is null.
 * @param mixed  $key           Optional. Key info.
 * @param mixed  $default_value Optional. Default value.
 * @param mixed  $extra         Optional. Extra value.
 * @return bool True, if matches. False, if not matching.
 */
function check_column( $table_name, $col_name, $col_type, $is_null = null, $key = null, $default_value = null, $extra = null ) {
	global $wpdb;

<<<<<<< HEAD
<<<<<<< HEAD
	$diffs = 0;

	// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
=======
	$diffs   = 0;
>>>>>>> fb785cbb (Initial commit)
=======
	$diffs = 0;

	// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Cannot be prepared. Fetches columns for table names.
>>>>>>> c058c778 (Combining with the latest source from WP)
	$results = $wpdb->get_results( "DESC $table_name" );

	foreach ( $results as $row ) {

		if ( $row->Field === $col_name ) {

			// Got our column, check the params.
			if ( ( null !== $col_type ) && ( $row->Type !== $col_type ) ) {
				++$diffs;
			}
			if ( ( null !== $is_null ) && ( $row->Null !== $is_null ) ) {
				++$diffs;
			}
			if ( ( null !== $key ) && ( $row->Key !== $key ) ) {
				++$diffs;
			}
			if ( ( null !== $default_value ) && ( $row->Default !== $default_value ) ) {
				++$diffs;
			}
			if ( ( null !== $extra ) && ( $row->Extra !== $extra ) ) {
				++$diffs;
			}

			if ( $diffs > 0 ) {
				return false;
			}

			return true;
		} // End if found our column.
	}

	return false;
}
