<?php

include('geo_api.php');
date_default_timezone_set($geo_timezone);
if (isset($_POST['submit'])) {
// Mendapatkan data weather
    $kota = htmlspecialchars($_POST['kota']);
    $apikey = "8e450e53fa6a578bc3fea9d539d786f5";
    $url="http://api.openweathermap.org/data/2.5/weather?q=$kota&appid=$apikey";
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

// Dibuat variabel
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
    echo "Data tidak ada";
}

// jika kota tidak ada didatabase
if ($kota == "") {
    # code...
    echo "<script>alert('Kota tidak ditemukan'); window.location.href = 'index.php'</script>";
}

// dapatkan forecast

$url2="http://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&appid=$apikey";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url2);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $auth = curl_exec($curl);
    if($auth)
    {
        $data2 = json_decode($auth, TRUE); 

    }else {
        echo "Tidak dapat memuat data!";
    }


?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-success text-white" style="margin-top: 50px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><?=$kota?>, <?=$negara?> </h2><p>Timezone <?=$geo_timezone?><p>
                            </div>
                            <div class="col-sm-6">
                                <div class="cuaca float-right">
                                    <span style="font-size: 25px"><img
                                            src="assets/img/weather/<?=$weather_ic?>.svg" style="height: 50px; width: 50px"><?=$celcius?>&degC</span>
                                            <p><?=$date?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <center><img src="assets/img/weather/<?=$weather_ic?>.svg" alt=""
                                        style="height: 200px; weight: 200px"></center>

                            </div>
                            <div class="col-sm-4">
                                <h2><b><?=$celcius?>&degC / <?=$fahrenheit?>&degF</b></h2>
                                <h4><?=$weather_desc?></h4>
                                <h4>Wind Speed : <?=$wind?> m/s</h4>
                            </div>
                            <div class="col-sm-4">
                                <p>Humidity : <?=$humidity?></p>
                                <p>Sunrise : <?=$sunrise?></p>
                                <p>Sunset : <?=$sunset?></p>
                                <p>Clouds : <?=$cloud?>%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top:60px; padding-left: 50px; padding-right:50px !important">
        <div class="row">
            <div class="col">
                <h3>Detail</h3>
                <hr>
                <table class="table table-borderless" width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body">
                                        <p>Min</p>
                                        <hr>
                                        <span style="font-size: 25px"><img
                                                src="assets/img/weather/<?=$weather_ic?>.svg" style="height: 50px; width: 50px"><?=$celcius_min?>&degC</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body ">
                                        <p>Max</p>
                                        <hr>
                                        <span style="font-size: 25px"><img
                                                src="assets/img/weather/<?=$weather_ic?>.svg" style="height: 50px; width: 50px"><?=$celcius_max?>&degC</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body ">
                                        <p>Wind</p>

                                        <hr>
                                        <p style="font-size: 20px">Speed : <?=$wind?>1 m/s</p>
                                        <p style="font-size: 20px">Deg : <?=$wind_deg?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body ">
                                        <p>Pressure</p>
                                        <hr>
                                        <p style="font-size: 20px"><?=$pressure?> hpa</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body ">
                                        <p>Latitude Longitude</p>
                                        <hr>
                                        <p>Lat : <?=$lat?></p>
                                        <p>Long : <?=$lon?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Per jam -->
    <div style="padding-top:60px; padding-left: 50px; padding-right:50px !important">
        <div class="row">
            <div class="col">
            <h3>Hourly Weather and Forecast</h3>
                <hr>
                <div style="overflow-y: scroll; height:400px;">
                    <table class="table">
                        <?php foreach ($data2['list'] as $key=>$d2) :?>
                        <?php $awal = strtotime($d2['dt_txt']);
                            $tgl = date('D, d-m-Y H:i', $awal);
                        ?>
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2"><?=$tgl?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><img src="assets/img/weather/<?=$d2['weather'][0]['icon']?>.svg" alt=""
                                        style="width: 50px;height:50px;"> <?=round($d2['main']['temp'] - 273.15)?>&deg
                                    <?=$d2['weather'][0]['description']?></td>
                                <td>Wind : <?=$d2['wind']['speed']?> m/s Clouds : <?=$d2['clouds']['all']?>% Pressure :
                                    <?=$d2['main']['pressure']?> hpa Humidity : <?=$d2['main']['humidity']?></td>

                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <div class="col">
            <h3>News</h3>
                <hr>
                <div style="overflow-y: scroll; height:400px;">
                    <table class="table">
                        <tbody>
                            <?php $i=0; foreach ($news['articles'] as $key => $n) : if(++$i == 6) break; ?>
                            <?php 
                           
                                $tgl = strtotime($n['publishedAt']);
                                $tglasli = date('D, d-m-y H:i', $tgl);
                            ?>
                            <tr>
                                <td><img src="<?=$n['urlToImage']?>" alt="" style="width: 100px;height: 60px"></td>
                                <td>
                                    <a href="<?=$n['url']?>" target="__blank"><?=$n['title']?></a><br><?=$n['description']?><br><p class="float-right" style="font-size: 12px">Published <?=$tglasli?></p>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>