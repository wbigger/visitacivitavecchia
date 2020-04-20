<?php

# prendo il link dalla query
$query_string = $_SERVER["QUERY_STRING"];
parse_str($query_string,$query);
$url = $query["link"];

// Curl è la libreria PHP che serve per fare la richiesta HTTP

// Inizializzo la chiamata
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Marconi Civitavecchia'
]);

// Eseguo la chiamata
$resp = curl_exec($curl);
echo $resp;

// Chiudo la richiesta
curl_close($curl);
