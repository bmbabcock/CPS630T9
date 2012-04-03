<?php

$id = $_GET["id"];
$access_token = $_GET["access_token"];
print ('id: ' + $id);
print ('at: ' + $access_token);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "/CACertificates/VerisignClass3PublicPrimaryCertificationAuthority.crt");
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'https://graph.facebook.com/' + $id + '/checkins?access_token=' + $access_token);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
print $buffer;
?>