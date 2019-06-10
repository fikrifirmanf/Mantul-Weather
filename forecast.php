<?php 

include('geo_api.php');
date_default_timezone_set($geo_timezone);


    $apikey = "8e450e53fa6a578bc3fea9d539d786f5";
    $url="http://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&appid=$apikey";
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

    // foreach ($data['list'] as $key => $d) {
    //     # code...
    //     echo $d['main']['temp']."</br>";
    // }


?>