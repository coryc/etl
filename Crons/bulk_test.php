<?php
/**
 * Testing bulk operations
 */

 
require_once realpath(dirname(__FILE__) . '/../Config/settings.php');
require_once realpath(dirname(__FILE__) . '/../Library/Auth.php');
require_once realpath(dirname(__FILE__) . '/../Library/bulkclient/BulkApiClient.php');


$auth = new Auth($clientSetting['apitest']);
if (($creds = $auth->login()) !== false) {
	
	print_r($creds);
	
} else {
	
	echo 'Loggin Error!';
	
}
