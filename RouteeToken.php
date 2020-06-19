<?php 

class RouteeToken extends Curl {

	private $applicationId;
	private $applicationSecret;

	function __construct(){

    	$this->applicationId = '57cd83a3e4b0464b9119ba46';
    	$this->applicationSecret = 'OXr7WYcP9A';

    }

    private function header(){

    	$code = base64_encode($this->applicationId.':'.$this->applicationSecret);

    	return array(
    		"authorization: Basic ". $code,
    		"content-type: application/x-www-form-urlencoded"
    	);
	}

	public function getToken(){

		$header = $this->header();

		$postArr =  "grant_type=client_credentials";

		$response = $this->doCurl('https://auth.routee.net/oauth/token',$header, 'POST', $postArr);

		$data = json_decode($response);

		return json_decode(json_encode($data), True);
	}
	
}
