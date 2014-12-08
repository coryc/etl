<?php
/**
 * Authentication Class
 */
 
class Auth {
	
	/**
	 * Auth Uri
	 * @private string
	 */
	private $_authUri = '/services/oauth2/token'; 
	
	/**
	 * Login Instance URLs
	 * @private array
	 */
	private $_loginInstance = array(
		'production' => 'https://login.salesforce.com',
		'sandbox'	 => 'https://test.salesforce.com'
	);
	
	/**
	 * Connection Settings
	 * @private array
	 */
	private $_connection = array();
	
	/**
	 * Credentials
	 * @private array
	 */
	private $_credentials = array(); 
	
	/**
	 * Constructor
	 * @param array $settings
	 */
	public function __construct(array $settings) {
		
		// store the connection info
		$this->_connection = $settings;
		
	}
	
	/**
	 * return connection settings
	 * @return array
	 */
	public function getConnectionSettings() {
		return $this->_connection;
	}
	
	/**
	 * return the login url based on connection type
	 * @return string
	 */
	private function _getLoginUrl(){
		
		$settings = $this->getConnectionSettings();
		
		$base = $this->_loginInstance['production'];
		if ($settings['type'] !== 'production')
			$base = $this->_loginInstance['sandbox'];
		
		return $base . $this->_authUri;
	}
	
	/**
	 * Login to salesforce
	 * @return boolean
	 */
	public function login() {
		
		$settings = $this->getConnectionSettings();
		
		if (count($settings) == 0) return false; 
		
		
		$url = $this->_getLoginUrl();
		
		$post_data = array(
			'grant_type'    => 'password',
			'client_id'     => $settings['clientId'],
			'client_secret' => $settings['secret'],
			'username'      => $settings['username'],
			'password'      => $settings['password'] . $settings['token']
		);
	
		$post_data = http_build_query($post_data);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,            $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST,           true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,     $post_data); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded')); 
		
		$result=curl_exec ($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($httpCode == 200) {
			$this->_credentials = json_decode($result);
			return $this->_credentials;
		} else {
			return false;
		}
	}
	
	/**
	 * Return the login credentials
	 * @return array
	 */
	public function getCredentials() {
		
		return $this->_credentials;
		
	}
}


