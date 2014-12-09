<?php
/**
 * Testing bulk operations
 */

 
require_once realpath(dirname(__FILE__) . '/../Config/settings.php');
require_once realpath(dirname(__FILE__) . '/../Config/names.php');
require_once realpath(dirname(__FILE__) . '/../Library/Auth.php');
require_once realpath(dirname(__FILE__) . '/../Library/Utils.php');

require_once realpath(dirname(__FILE__) . '/../Library/bulkclient/BulkApiClient.php');


$auth = new Auth($clientSetting['apitest']);
if (($creds = $auth->login()) !== false) {
	
	
	$api = new BulkApiClient( $creds->instance_url . $enpointUriSettings['async'], $creds->access_token);
	$api->setLoggingEnabled(true);
	$api->setCompressionEnabled(true);
		
	// Create Job
	$job = new JobInfo();
	$job->setObject('People__c');
	$job->setOpertion('upsert');
	$job->setContentType('CSV');
	$job->setConcurrencyMode('Parallel');                         
	$job->setExternalIdFieldName('Name_Id__c');   
	
	//send job and get response
	$job = $api->createJob($job);
	print_r($job);
	
	//Create csv
	$csv = Utils::toCSV($test_names); 	
	
	// Create Batch
	$batch = $api->createBatch($job, $csv);
	
	// Close the job and start the process
	$api->updateJobState($job->getId(), "Closed");
	
	// Check batch progress
	while($batch->getState() == "Queued" || $batch->getState() == "InProgress") {
	    $batch = $api->getBatchInfo($job->getId(), $batch->getId());
		// 5 second poll
	    sleep(5);
	}
	
	// get batch results
	$batchResults = $api->getBatchResults($job->getId(), $batch->getId());
	
	print_r($batchResults);	
		
} else {
	
	echo 'Loggin Error!';
	
}
