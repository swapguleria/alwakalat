<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'events_class';

// Table's primary key
$primaryKey = 'class_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'class_name', 'dt' => 0 ),
	array( 'db' => 'class_type',  'dt' => 1 ),
	array( 'db' => 'class_teacher',   'dt' => 2 ),
	array( 'db' => 'class_session',     'dt' => 3 ),
	array( 'db' => 'class_gender',     'dt' => 4 ),
	/* array( 'db' => 'class_ageto',     'dt' => 3 ), */
	array( 'db' => 'class_program',     'dt' => 6 ),
	array( 'db' => 'class_days',     'dt' => 7 )
	/* 
	array(
		'db'        => 'start_date',
		'dt'        => 4,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 5,
		'formatter' => function( $d, $row ) {
			return '$'.number_format($d);
		}
	) */
);

// SQL server connection information
$sql_details = array(
	'user' => 'mytestse_events',
	'pass' => 'Killer@123',
	'db'   => 'mytestse_events',
	'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


