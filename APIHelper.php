<?php
/**
* API Helper Class
*
* @version 1.0
*/
class APIHelper {
	/**
	* Constructor
	*/
	public function __construct() { /*  */ }

	/**
	* Builds a cURL Connection
	*
	* @param string $url URL
	* @param string $method HTTP method 
	* @param array $bodyData HTTP body data
	* @param array $headers Headers 
	* @return string 
	*/
	public static function request($url, $method='GET', $bodyData=null, $headers=null) {
		if(!empty($url)) { 
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

			if(!empty($bodyData)) { 
				curl_setopt($curl, CURLOPT_POSTFIELDS, $bodyData);
			} 

			if(!empty($headers)) {
				curl_setopt($curl, CURLOPT_HEADERS, $headers); // check opt type
			}
		
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			$result = curl_exec($curl);
			curl_close($curl);

			return $result;
		}
		return false; // check return type ?
	}
}

?>