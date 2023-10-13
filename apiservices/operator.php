<?php
header("Content-Type: application/json; Charset-UTF-8");
$tc=$_GET['gsm'];
if (isset($tc)) {
 $telno=$tc;
 $alankod=substr($telno,0,3);
 $telekom = array(501, 505, 506, 507, 551, 552, 553, 554, 555, 559); // TÜRKTELEKOM
  $turkcell = array(530, 531, 532, 533, 534, 535, 536, 537, 538, 539); // TURKCELL
  $vodafone = array(540, 541, 542, 543, 544, 545, 546, 547, 548, 549); // VODAFONE
  $kktc_telsim = array(54285, 54286, 54287, 54288);  // KKTC TELSIM
  $kktc_turkcell = array(53383, 53384, 53385, 53386, 53387);  // KKTC TURKCELL
  $auth="@LoweryCoder";
  if (in_array($alankod,$telekom)) {
   $operator="Türk Telekom";
  }elseif (in_array($alankod,$vodafone)) {
    $operator="Vodafone";
  }elseif (in_array($alankod,$turkcell)) {
    $operator="Turkcell";
  }else {
    $operator= "Böyle Bir Operatçr Bulunamadı";
  }
  $data=[
    "Success"=>'True',
    "Author"=>'@LoweryCoder',
    "GSM"=>$telno,
    "Operatör"=>$operator,

  ];
  

  echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
   
}


?>