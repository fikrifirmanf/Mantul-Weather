<?php 

    # code...

$url="https://freegeoip.app/json/";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$auth = curl_exec($curl);
if($auth)
{
    $geo = json_decode($auth, TRUE); 

}else {
    echo "Tidak dapat memuat data!";
}

$geo_timezone = $geo['time_zone'];
$kota = $geo['city'];
$negara = $geo['country_name'];
$lat_geo = $geo['latitude'];
$lon_geo = $geo['longitude'];


?>