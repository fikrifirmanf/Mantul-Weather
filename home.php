<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-success text-white" style="margin-top: 50px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><?=$kota?>, <?=$negara?> </h2>
                                <p>Timezone <?=$geo_timezone?><p>
                            </div>
                            <div class="col-sm-6">
                                <div class="cuaca float-right">
                                    <span style="font-size: 25px"><img src="assets/img/weather/<?=$weather_ic?>.svg"
                                            style="height: 50px; width: 50px"><?=$celcius?>&degC</span>
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
                                        <span style="font-size: 25px"><img src="assets/img/weather/<?=$weather_ic?>.svg"
                                                style="height: 50px; width: 50px"><?=$celcius_min?>&degC</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card bg-primary text-white" style="height: 200px; weight: 200px;">
                                    <div class="card-body ">
                                        <p>Max</p>
                                        <hr>
                                        <span style="font-size: 25px"><img src="assets/img/weather/<?=$weather_ic?>.svg"
                                                style="height: 50px; width: 50px"><?=$celcius_max?>&degC</span>
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
                        <?php foreach ($data['list'] as $key=>$d) :?>
                        <?php $awal = strtotime($d['dt_txt']);
                            $tgl = date('D, d-m-Y H:i', $awal);
                        ?>
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2"><?=$tgl?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><img src="assets/img/weather/<?=$d['weather'][0]['icon']?>.svg" alt=""
                                        style="width: 50px;height:50px;"> <?=round($d['main']['temp'] - 273.15)?>&deg
                                    <?=$d['weather'][0]['description']?></td>
                                <td>Wind : <?=$d['wind']['speed']?> m/s Clouds : <?=$d['clouds']['all']?>% Pressure :
                                    <?=$d['main']['pressure']?> hpa Humidity : <?=$d['main']['humidity']?></td>

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