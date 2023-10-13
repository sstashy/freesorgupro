<?php

// auth key belirliyoruz

$auth_key = 'LoweryCoder';

error_reporting(0);

$tc = $_GET['tc'];

$auth = $_GET['auth'];

if ($auth_key == $auth) {

// tokenimizi yazıyoruz

$token = "23dec2346062951cdc51e827c042a3390ee1547e5b63db455f04705bd6d3bef50e22c1652d6510cc15fc902e16a304ee8f78f22d6a6bc2a14d58bb225b707399";

// curl ile req atmak icin url belirliyoruz

$curl= curl_init("https://intvrg.gib.gov.tr/intvrg_server/dispatch");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($curl, CURLOPT_HTTPHEADER, [

'Accept: application/json, text/javascript, */*; q=0.01',

'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7',

'Connection: keep-alive',

'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',

'Origin: https://intvrg.gib.gov.tr',

"Referer: https://intvrg.gib.gov.tr/intvrg_side/main.jsp?token=$token",

'Sec-Fetch-Dest: empty',

'Sec-Fetch-Mode: cors',

'Sec-Fetch-Site: same-origin',

'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',

'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',

'sec-ch-ua-mobile: ?0',

'sec-ch-ua-platform: "Windows"'

                    ]);

                    // gonderilecek verileri belirliyoruz

curl_setopt($curl, CURLOPT_POSTFIELDS, "cmd=OKCIzniIslemleri_OKCIzniAl&callid=2148367fcea77-10&token=$token&jp=%7B%22mukVergiKimlikNo%22%3A%22%22%2C%22mukTCKimlikNo%22%3A%22$tc%22%7D

");

$json = json_decode(curl_exec($curl), true);

curl_close($curl);

// resp'den gelen verileri işliyoruz

$adsoyad = $json['data']['adsoyad'];

$dukkanunvani = $json['data']['ticaretunvani'];

$dukkanadres = $json['data']['isyeriadresi'];

$isebaslamatarihi = $json['data']['isebaslamatarihi'];

$vergino = $json['data']['vergino'];

$meslekler = $json['data']['faaliyetAdlari'];

$vergikodu = $json['data']['vdkodu'];

$result = array(

    'writer' => 'LoweryCoder',

    'adsoyad' => $adsoyad,

    'dukkanunvani' => $dukkanunvani,

    'dukkanadres' => $dukkanadres,

    'isebaslamatarihi' => $isebaslamatarihi,

    'vergino' => $vergino,

    'vergikodu' => $vergikodu,

    'meslekler' => $meslekler,

);

// verileri yazdiriyoruz :)

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} else {

    // yanlis auth girilmesi durumunda olacak senaryoyu belirliyoruz

    http_response_code(401);

    echo ('dogru auth gir sikik');

}

?>