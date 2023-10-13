<?php
header("Content-Type: application/json");

// Kullanıcıdan TC'yi al
$tc = $_GET['tc']; // veya $_POST['tc'] kullanabilirsiniz

// Veritabanı bilgileri
$servername = "localhost"; // Veritabanı sunucusu
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "101m"; // Veritabanı adı

// Veritabanına bağlan
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü yap
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// TC'ye göre doğum tarihini sorgula
$sql = "SELECT dogumTarihi FROM 101m WHERE TC = '$tc'"; // Doğru tablo ve sütun adlarını kullanmalısınız
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // TC'ye göre kayıt bulundu, doğum tarihini al
    $row = $result->fetch_assoc();
    $dogumTarihi = $row["dogumTarihi"];

    // Doğum tarihini /g/a/y olarak ayır
    list($gun, $ay, $yil) = explode(".", $dogumTarihi);
if (isset($tc)) {

    $koc=array(03);
    $boga=array(04);
    $ikiz=array(05);
    $yengec=array(06);
    $aslan=array(07);
    $basak=array("08");
    $terazi=array("09");
    $akrep=array("10");
    $yay=array("11");
    $oglak=array("12");
    $kova=array("01");
    $balik=array("02");
    if (in_array($ay,$koc)) {
       $burc="Koç Burcu";
    }elseif (in_array($ay,$boga)) {
        $burc="Boğa Burcu";
    }elseif (in_array($ay,$ikiz)) {
        $burc="İkizler Burcu";
    }elseif (in_array($ay,$yengec)) {
        $burc="Yengeç Burcu";
    }elseif (in_array($ay,$aslan)) {
        $burc="aslan Burcu";
    }elseif (in_array($ay,$basak)) {
        $burc="Basak Burcu";
    }elseif (in_array($ay,$terazi)) {
        $burc="Terazi Burcu";
    }elseif (in_array($ay,$akrep)) {
        $burc="Akrep Burcu";
    }elseif (in_array($ay,$yay)) {
        $burc="Yay  Burcu";
    }elseif (in_array($ay,$oglak)) {
        $burc="Oğlak Burcu";
    }elseif (in_array($ay,$kova)) {
        $burc="Kova Burcu";
    }elseif (in_array($ay,$balik)) {
        $burc="Balık Burcu";
    }else {
        $burc="Böyle Bir Burç Bulunamadı";
    }
    $data=[
        "Success"=>'True',
        "Mesaj"=>'SorguPro ',
        "Author"=>'@LoweryCoder',
        "Tc"=>$tc,
        "Burc"=>$burc,
    
      ];
      
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}
}
    ?>
