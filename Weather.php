<?php 

class Weather extends Curl {

	private $appId;

	function __construct(){

    	$this->appId = 'b385aa7d4e568152288b3c9f5c2458a5';
    }

    public function getWeather($city){

    	$weather = $this->doCurl('api.openweathermap.org/data/2.5/weather?q='. $city .'&appid=' . $this->appId, false, 'GET');

		$weather = json_decode($weather);

		return json_decode(json_encode($weather), True);
    }

}
