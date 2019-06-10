<?php 

if (active == "yes") {
    # code...

include('geo_api.php');
date_default_timezone_set($geo_timezone);


    $apikey = "8e450e53fa6a578bc3fea9d539d786f5";
    $url="http://api.openweathermap.org/data/2.5/weather?lat=$lat_geo&lon=$lon_geo&appid=$apikey";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $auth = curl_exec($curl);
    if($auth)
    {
        $data = json_decode($auth, TRUE); 

    }else {
        echo "Tidak dapat memuat data!";
    }

$lon = $data['coord']['lon'];
$lat = $data['coord']['lat'];
$kota = $data['name'];
$negara = $data['sys']['country'];
$temp = $data['main']['temp'];  
$pressure = $data['main']['pressure'];  
$temp_max = $data['main']['temp_max'];
$temp_min = $data['main']['temp_min'];
$celcius = round($temp-273.15);
$celcius_min = round($temp_min-273.15);
$celcius_max =round($temp_max-273.15);
$humidity =  $data['main']['humidity'];
$wind = $data['wind']['speed'];
$wind_deg = $data['wind']['deg'];
$cloud = $data['clouds']['all'];
$weather_desc = ucfirst($data['weather'][0]['description']);
$weather_ic = $data['weather'][0]['icon'];
$timezone = $data['timezone'];
$snr = $data['sys']['sunrise'];
$sunrise = date('H:i',$snr);
$sns = $data['sys']['sunset'];
$sunset = date('H:i', $sns);
$date = date('D, d-m-y H:i', $data['dt']);

$fahrenheit = ($celcius * 1.8)+32;
}else {
    echo "<h1>Access Denied!</h1>";
}


?>
