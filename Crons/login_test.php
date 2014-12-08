<?php
/**
 * Using the Client Settings login using the credentials and retreive a session ID
 */
 
include realpath(dirname(__FILE__) . '/../Config/settings.php');


$url = 'https://test.salesforce.com/services/oauth2/token';

// login settings
$settings = $clientSetting['apitest'];

$post_data = array(
	'grant_type'    => 'password',
	'client_id'     => $settings['clientId'],
	'client_secret' => $settings['secret'],
	'username'      => $settings['username'],
	'password'      => $settings['password'] . $settings['token']
);
$post_data = http_build_query($post_data);
echo $post_data;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $post_data); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded')); 

$result=curl_exec ($ch);

$response = json_decode($result);
echo "\n\n";

var_dump($response);



// Using the access token example
$url = $response->instance_url . '/services/data/v20.0/sobjects/Account/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Bearer '.$response->access_token));
$result = curl_exec($ch);
$response = json_decode($result);
echo "\n\n";
var_dump($response);