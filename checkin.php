<?php

$id = $_GET["id"];
$access_token = $_GET["access_token"];
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'https://graph.facebook.com/' + $id + '/checkins?access_token=' + $access_token);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
print $buffer;
?>