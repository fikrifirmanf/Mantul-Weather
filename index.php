<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
define(active, "yes");

include('header.php');
include('get_api.php');
include('forecast.php');
include('news_api.php');
$queries = array();
parse_str($_SERVER['QUERY_STRING'],$queries	);

switch($queries['page']) {

	case 'get' :
			include 'get_api.php';
			break;
	case 'cek' :
			include 'cek_weather.php';
			break;
	default:
			include 'home.php';
			break;
}

include('footer.php');
