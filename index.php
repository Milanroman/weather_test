<?php
include 'Curl.php';
include 'Weather.php';
include 'RouteeToken.php';
include 'RouteeSMS.php';

// get weather
$weather = new Weather;
$weatherData = $weather->getWeather('Thessaloniki');

// kelvins in degrees
$degree = intval($weatherData['main']['temp']) - 273.15;

// check temperature value
if($degree > 20){

    $text  = 'Roman Kushka. Temperature more than 20C. '. $degree;

} else {

    $text  = 'Roman Kushka. Temperature less than 20C. '. $degree;
}

// get token
$routeeToken = new RouteeToken;
$token = $routeeToken->getToken();

// sent sms
$routeeSMS = new RouteeSMS;
$routeeSMS->sentSMS($token['access_token'], $text);
