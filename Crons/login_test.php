<?php
/**
 * Using the Client Settings login using the credentials and retreive a session ID
 */
 
require_once realpath(dirname(__FILE__) . '/../Config/settings.php');
require_once realpath(dirname(__FILE__) . '/../Library/Auth.php');


$auth = new Auth($clientSetting['apitest']);
if (($creds = $auth->login()) !== false) {
	
	print_r($creds);
	
	
	// get api versions on this instance
	$url = $creds->instance_url . '/services/data/';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Bearer '.$creds->access_token));
	$result = curl_exec($ch);
	$response = json_decode($result);
	
	var_dump($response);
	
} else {
	
	echo 'Loggin Error!';
	
}
