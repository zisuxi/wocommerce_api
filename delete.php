<?php
$id= $_GET['id'];
$apiUrl = 'https://localhost/woo-connerence/wp-json/wc/v3/products/'.$id;
$consumerKey = 'ck_60a30673456201fd73e544478c054945ae093826';
$consumerSecret = 'cs_3f3c6be3f9e392a86189e916088d9563f4142ca3';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}
curl_close($ch);
IF($response){
      echo "record deleted successfullly";
}
?>