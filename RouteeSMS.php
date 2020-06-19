<?php 

class RouteeSMS extends Curl {

	public function sentSMS($token, $text){

		$header = array(
			"authorization: Bearer ". $token,
			"content-type: application/json"
		);

		$postArr =  '{ "body": "'.$text.'" ,"to" : "+306948872100","from": "amdTelecom"}';

		$this->doCurl('https://connect.routee.net/sms',$header, 'POST',  $postArr);
	}
	

}
