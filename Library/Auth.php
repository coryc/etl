<?php
/**
 * Authentication Class
 */
 
class Auth {
	
	/**
	 * Connection Settings
	 * @private $_connection
	 */
	private $_connection = array();
	
	/**
	 * Constructor
	 * 
	 * @param array $settings
	 */
	public function __construct(array $settings) {
		
		// store the connection info
		$this->_connection = $settings;
		
		
		print_r($this->_connection);
		
		
		/*
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
		*/
		
	}
	
	/**
	 * Login to salesforce
	 * 
	 * @return boolean
	 */
	public function login() {
		
	}
	
	/**
	 * perform the login request
	 * 
	 * @return array 
	 */
	private function _doLogin() {
		
		
	}
	
	/**
	 * Return the login credentials
	 * 
	 * @return array
	 */
	public function getCredentials() {
		
	}
}


