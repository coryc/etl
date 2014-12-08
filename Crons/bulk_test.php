<?php
/**
 * Testing bulk operations
 */

 
include realpath(dirname(__FILE__) . '/../Config/settings.php');
include realpath(dirname(__FILE__) . '/../Login/Auth.php');


$auth = new Auth($settings['apitest']);

