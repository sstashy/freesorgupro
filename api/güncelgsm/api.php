<?php

$gsm = htmlspecialchars($_GET['gsm']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://logcity.org/icapi/gsm?key=IC-c8q5y1f6z0j1&gsm=$gsm");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);




$resp = curl_exec($ch);
curl_close($ch);

echo $resp;

?>