<?php
/**
 * Settings Example File
 */

$bulkLimits = array(
	'total_size'        => '10', // MB
	'records'           => '10000', // record per batch
	'total_chars'       => '10000000', // characters per batch
	'field_chars'       => '32000', // character per field
	'total_field'       => '5000' // fields per record
	'field_total_chars' => '400000' // total combined charcters for field names?
); 

/**
 * Client Login Credentials
 */
$settingsClient = array(
	'connection-name' => array(
		'loginUrl' => '',
		'username' => '',
		'password' => '',
		'token'    => '',
		'clientId' => '',
		'secret'   => '',
		'type' 	   => ''
	)
);
