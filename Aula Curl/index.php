<?php

$ceps = ["65092700", "65065470", "65066190"];
$data = [];

foreach($ceps as $cep){

    $link = "https://viacep.com.br/ws/$cep/json/";

    $ch = curl_init($link);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);

    curl_close($ch);

    $data[] = json_decode($response,true);

}

echo json_encode($data);
?>