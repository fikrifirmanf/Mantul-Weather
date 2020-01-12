<?php 

    $q = "forecast";
    $apikey = "545f865234a54d7aa974a57b57bde200";
    $url="https://newsapi.org/v2/everything?q=$q&apiKey=$apikey";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $auth = curl_exec($curl);
    if($auth)
    {
        $news = json_decode($auth, TRUE); 

    }else {
        echo "Tidak dapat memuat data!";
    }
    // $i=0;
    // foreach ($news['articles'] as $key => $n) {
    //     # code...
    //     if (++$i == 6) break;
    //         # code...
    //    print_r ($n['title'].'</br>');
        
    // }
