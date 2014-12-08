<?php
/**
 * Settings Example File
 */
 
/**
 * Auth URI
 */
$authUri = '/services/oauth2/token'; 
 
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

/**
 * Login Instance URLs
 */
$loginInstance = array(
	'production' => 'https://login.salesforce.com',
	'sandbox'	 => 'https://test.salesforce.com'
);