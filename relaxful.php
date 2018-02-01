<?php
/**
* Relaxful Class
*
* @version 1.0
*/
class Relaxful {
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
	public static function request($url, $method, $bodyData=null, $headers=null) {
		// default error values
		$error = 'URL is empty';
		$httpStatus = 500;
		$result = '';

		if(!empty($url) && !empty($method)) { 
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // for ssl

			if(!empty($bodyData)) { 
				curl_setopt($curl, CURLOPT_POSTFIELDS, $bodyData);
			} 

			if(!empty($headers)) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // check opt type
			}
		
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			$result = curl_exec($curl);
			$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

			// error checking

			if($httpStatus != 200 && $httpStatus != 304) {
				throw new Exception('HTTP Error '.$httpStatus);
			}

			if(curl_error($curl)) {
				throw new Exception(curl_error($curl));
			}

			// cleanup
			curl_close($curl);
		}

		if(empty($method)) {
			throw new Exception('Method is empty');
		}
		return array('response'=>$result,'status'=>$httpStatus);
	}
}
?>
