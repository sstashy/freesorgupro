<?php



header("Content-Type: application/json; utf-8;");


// POWERED BY FDF
$auth_key = "lowerycoder";
$auth = htmlspecialchars($_GET['auth']);
if($auth !=$auth_key) {
        echo json_encode(array('success' => false, 'message' => 'auth keyi yazsana orospucocugu' ));
       die();
    }  else {

session_start();

  header('Content-Type: application/json; charset=utf8'); 


ini_set("display_errors", 0);
error_reporting(0);


class Soyagaci {
    public static function Query ($ContentType, $Idenity) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "101m";
        $conn = new mysqli($servername, $username, $password, $db);
    
        $hsyssql = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $Idenity . "'";
        $resulthsys = $conn->query($hsyssql);
    
        $idkardes = 1;
        $idnumara = 1;
    
        $arrall = array();
        $arrallno = array();
        $arranne = array();
        $arrbaba = array();
    
        if ($resulthsys->num_rows > 0) {
              while($rowhsys = $resulthsys->fetch_assoc()) {
                $kendisiget = array('Yakinlik' => 'Kendisi', 'KimlikNo' => $rowhsys["TC"], 'Isim' => $rowhsys["ADI"], 'Soyisim' => $rowhsys["SOYADI"], 'DogumTarihi' => $rowhsys["DOGUMTARIHI"], 'NufusIl' => $rowhsys["NUFUSIL"], 'NufusIlce' => $rowhsys["NUFUSILCE"], 'AnneIsim' => $rowhsys["ANNEADI"], 'AnneKimlikNo' => $rowhsys["ANNETC"], 'BabaIsim' => $rowhsys["BABAADI"],  'BabaKimlikNo' => $rowhsys["BABATC"],  'Uyruk' => $rowhsys["UYRUK"]);
                $idkardes += 1;
                array_push($arrall, $kendisiget);
                $annetc = $rowhsys["ANNETC"];
                $babatc = $rowhsys["BABATC"];
                $annetcquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $annetc . "' AND `TC` NOT LIKE '" . $Idenity . "'";// AND `ANNETC` NOT LIKE NULL";
                $resultannetc = $conn->query($annetcquery);
                $cocukquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowhsys["TC"] . "' OR `BABATC` LIKE '" . $rowhsys["TC"] . "'";
                $resultcocuk = $conn->query($cocukquery);
                if ($resultcocuk->num_rows > 0) {
                  while ($rowcocuk = $resultcocuk->fetch_assoc()) {
                    $cocuktcget = array('Yakinlik' => 'Çocuğu', 'KimlikNo' => $rowcocuk["TC"], 'Isim' => $rowcocuk["ADI"], 'Soyisim' => $rowcocuk["SOYADI"], 'DogumTarihi' => $rowcocuk["DOGUMTARIHI"], 'NufusIl' => $rowcocuk["NUFUSIL"], 'NufusIlce' => $rowcocuk["NUFUSILCE"], 'AnneIsim' => $rowcocuk["ANNEADI"], 'AnneKimlikNo' => $rowcocuk["ANNETC"], 'BabaIsim' => $rowcocuk["BABAADI"],  'BabaKimlikNo' => $rowcocuk["BABATC"],  'Uyruk' => $rowcocuk["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $cocuktcget);
                    $esquery = "SELECT * FROM `101m` WHERE `TC` NOT LIKE '" . $Idenity . "' AND TC LIKE '" . $rowcocuk["ANNETC"] . "' OR `TC` LIKE '" . $rowcocuk["BABATC"] . "' AND `TC` NOT LIKE '" . $Idenity . "' LIMIT 1";
                    $resultes = $conn->query($esquery);
                    if ($resultes->num_rows > 0) {
                      while ($rowes = $resultes->fetch_assoc()) {
                        $estcget = array('Yakinlik' => 'Eşi', 'KimlikNo' => $rowes["TC"], 'Isim' => $rowes["ADI"], 'Soyisim' => $rowes["SOYADI"], 'DogumTarihi' => $rowes["DOGUMTARIHI"], 'NufusIl' => $rowes["NUFUSIL"], 'NufusIlce' => $rowes["NUFUSILCE"], 'AnneIsim' => $rowes["ANNEADI"], 'AnneKimlikNo' => $rowes["ANNETC"], 'BabaIsim' => $rowes["BABAADI"],  'BabaKimlikNo' => $rowes["BABATC"],  'Uyruk' => $rowes["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $estcget);
                      }
                    }
                  }
                }
                if($resultannetc->num_rows > 0) {
                  while ($rowannetc = $resultannetc->fetch_assoc()) {
                    $kardestc = $rowannetc["TC"];
                    $kardessql = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $kardestc . "'";
                    $resultkardestc = $conn->query($kardessql);
                    $annetcget = array('Yakinlik' => 'Kardeşi', 'KimlikNo' => $rowannetc["TC"], 'Isim' => $rowannetc["ADI"], 'Soyisim' => $rowannetc["SOYADI"], 'DogumTarihi' => $rowannetc["DOGUMTARIHI"], 'NufusIl' => $rowannetc["NUFUSIL"], 'NufusIlce' => $rowannetc["NUFUSILCE"], 'AnneIsim' => $rowannetc["ANNEADI"], 'AnneKimlikNo' => $rowannetc["ANNETC"], 'BabaIsim' => $rowannetc["BABAADI"],  'BabaKimlikNo' => $rowannetc["BABATC"],  'Uyruk' => $rowannetc["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $annetcget);
                  }
                }
                $annequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $annetc . "'";
                $babaquery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $babatc . "'";
                $resultannequery = $conn->query($annequery);
                $resultbabaquery = $conn->query($babaquery);
                if ($resultannequery->num_rows > 0) {
                  while($rowanne = $resultannequery->fetch_assoc()) {
                    $anneget = array('Yakinlik' => 'Annesi', 'KimlikNo' => $rowanne["TC"], 'Isim' => $rowanne["ADI"], 'Soyisim' => $rowanne["SOYADI"], 'DogumTarihi' => $rowanne["DOGUMTARIHI"], 'NufusIl' => $rowanne["NUFUSIL"], 'NufusIlce' => $rowanne["NUFUSILCE"], 'AnneIsim' => $rowanne["ANNEADI"], 'AnneKimlikNo' => $rowanne["ANNETC"], 'BabaIsim' => $rowanne["BABAADI"],  'BabaKimlikNo' => $rowanne["BABATC"],  'Uyruk' => $rowanne["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $anneget);
                    $anneannequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowanne["ANNETC"] . "'";
                    $dedequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowanne["BABATC"] . "'";
                    $resultanneannequery = $conn->query($anneannequery);
                    $resultdedequery = $conn->query($dedequery);
                    if ($resultanneannequery->num_rows > 0) {
                      while($rowanneanne = $resultanneannequery->fetch_assoc()) {
                        $anneanneget = array('Yakinlik' => 'Anne Annesi', 'KimlikNo' => $rowanneanne["TC"], 'Isim' => $rowanneanne["ADI"], 'Soyisim' => $rowanneanne["SOYADI"], 'DogumTarihi' => $rowanneanne["DOGUMTARIHI"], 'NufusIl' => $rowanneanne["NUFUSIL"], 'NufusIlce' => $rowanneanne["NUFUSILCE"], 'AnneIsim' => $rowanneanne["ANNEADI"], 'AnneKimlikNo' => $rowanneanne["ANNETC"], 'BabaIsim' => $rowanneanne["BABAADI"],  'BabaKimlikNo' => $rowanneanne["BABATC"],  'Uyruk' => $rowanneanne["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $anneanneget);
                        $annekardesquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowanneanne["TC"] . "' AND `TC` NOT LIKE '" . $rowanne["TC"] . "'";
                        $resultannekardesquery = $conn->query($annekardesquery);
                        if ($resultannekardesquery->num_rows > 0) {
                          while ($rowannekardes = $resultannekardesquery->fetch_assoc()) {
                            $annekardesget = array('Yakinlik' => 'Anne Kardeşi', 'KimlikNo' => $rowannekardes["TC"], 'Isim' => $rowannekardes["ADI"], 'Soyisim' => $rowannekardes["SOYADI"], 'DogumTarihi' => $rowannekardes["DOGUMTARIHI"], 'NufusIl' => $rowannekardes["NUFUSIL"], 'NufusIlce' => $rowannekardes["NUFUSILCE"], 'AnneIsim' => $rowannekardes["ANNEADI"], 'AnneKimlikNo' => $rowannekardes["ANNETC"], 'BabaIsim' => $rowannekardes["BABAADI"],  'BabaKimlikNo' => $rowannekardes["BABATC"],  'Uyruk' => $rowannekardes["UYRUK"]);
                            $idkardes += 1;
                            array_push($arrall, $annekardesget);
                            $annekuzenquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowannekardes["TC"] . "' OR  `BABATC` LIKE '" . $rowannekardes["TC"] . "'";
                            $resultannekuzenquery = $conn->query($annekuzenquery);
                            if ($resultannekuzenquery->num_rows > 0) {
                              while ($rowannekuzen = $resultannekuzenquery->fetch_assoc()) {
                                $annekuzenget = array('Yakinlik' => 'Anne Kuzeni', 'KimlikNo' => $rowannekuzen["TC"], 'Isim' => $rowannekuzen["ADI"], 'Soyisim' => $rowannekuzen["SOYADI"], 'DogumTarihi' => $rowannekuzen["DOGUMTARIHI"], 'NufusIl' => $rowannekuzen["NUFUSIL"], 'NufusIlce' => $rowannekuzen["NUFUSILCE"], 'AnneIsim' => $rowannekuzen["ANNEADI"], 'AnneKimlikNo' => $rowannekuzen["ANNETC"], 'BabaIsim' => $rowannekuzen["BABAADI"],  'BabaKimlikNo' => $rowannekuzen["BABATC"],  'Uyruk' => $rowannekuzen["UYRUK"]);
                                $idkardes += 1;
                                array_push($arrall, $annekuzenget);
                              }
                          }
                          }
                        }
                      }
                    }
                    if ($resultdedequery->num_rows > 0) {
                      while($rowdede = $resultdedequery->fetch_assoc()) {
                        $dedeget = array('Yakinlik' => 'Dedesi', 'KimlikNo' => $rowdede["TC"], 'Isim' => $rowdede["ADI"], 'Soyisim' => $rowdede["SOYADI"], 'DogumTarihi' => $rowdede["DOGUMTARIHI"], 'NufusIl' => $rowdede["NUFUSIL"], 'NufusIlce' => $rowdede["NUFUSILCE"], 'AnneIsim' => $rowdede["ANNEADI"], 'AnneKimlikNo' => $rowdede["ANNETC"], 'BabaIsim' => $rowdede["BABAADI"],  'BabaKimlikNo' => $rowdede["BABATC"],  'Uyruk' => $rowdede["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $dedeget);
                      }
                  }
                }
              }
                if ($resultbabaquery->num_rows > 0) {
                  while($rowbaba = $resultbabaquery->fetch_assoc()) {
                    $babaget = array('Yakinlik' => 'Babası', 'KimlikNo' => $rowbaba["TC"], 'Isim' => $rowbaba["ADI"], 'Soyisim' => $rowbaba["SOYADI"], 'DogumTarihi' => $rowbaba["DOGUMTARIHI"], 'NufusIl' => $rowbaba["NUFUSIL"], 'NufusIlce' => $rowbaba["NUFUSILCE"], 'AnneIsim' => $rowbaba["ANNEADI"], 'AnneKimlikNo' => $rowbaba["ANNETC"], 'BabaIsim' => $rowbaba["BABAADI"],  'BabaKimlikNo' => $rowbaba["BABATC"],  'Uyruk' => $rowbaba["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $babaget);
                    $anneannequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowbaba["ANNETC"] . "'";
                    $dedequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowbaba["BABATC"] . "'";
                    $resultbabaannequery = $conn->query($anneannequery);
                    $resultdedequery = $conn->query($dedequery);
                    if ($resultbabaannequery->num_rows > 0) {
                      while($rowbabaanne = $resultbabaannequery->fetch_assoc()) {
                        $babaanneget = array('Yakinlik' => 'Baba Annesi', 'KimlikNo' => $rowbabaanne["TC"], 'Isim' => $rowbabaanne["ADI"], 'Soyisim' => $rowbabaanne["SOYADI"], 'DogumTarihi' => $rowbabaanne["DOGUMTARIHI"], 'NufusIl' => $rowbabaanne["NUFUSIL"], 'NufusIlce' => $rowbabaanne["NUFUSILCE"], 'AnneIsim' => $rowbabaanne["ANNEADI"], 'AnneKimlikNo' => $rowbabaanne["ANNETC"], 'BabaIsim' => $rowbabaanne["BABAADI"],  'BabaKimlikNo' => $rowbabaanne["BABATC"],  'Uyruk' => $rowbabaanne["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $babaanneget);
                        $babakardesquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowbabaanne["TC"] . "' AND `TC` NOT LIKE '" . $rowbaba["TC"] . "'";
                        $resultbabakardesquery = $conn->query($babakardesquery);
                        if ($resultbabakardesquery->num_rows > 0) {
                          while ($rowbabakardes = $resultbabakardesquery->fetch_assoc()) {
                            $babakardesget = array('Yakinlik' => 'Baba Kardeşi', 'KimlikNo' => $rowbabakardes["TC"], 'Isim' => $rowbabakardes["ADI"], 'Soyisim' => $rowbabakardes["SOYADI"], 'DogumTarihi' => $rowbabakardes["DOGUMTARIHI"], 'NufusIl' => $rowbabakardes["NUFUSIL"], 'NufusIlce' => $rowbabakardes["NUFUSILCE"], 'AnneIsim' => $rowbabakardes["ANNEADI"], 'AnneKimlikNo' => $rowbabakardes["ANNETC"], 'BabaIsim' => $rowbabakardes["BABAADI"],  'BabaKimlikNo' => $rowbabakardes["BABATC"],  'Uyruk' => $rowbabakardes["UYRUK"]);
                            $idkardes += 1;
                            array_push($arrall, $babakardesget);
                            $babakuzenquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowbabakardes["TC"] . "' OR  `BABATC` LIKE '" . $rowbabakardes["TC"] . "'";
                            $resultbabakuzenquery = $conn->query($babakuzenquery);
                            if ($resultbabakuzenquery->num_rows > 0) {
                              while ($rowbabakuzen = $resultbabakuzenquery->fetch_assoc()) {
                                $babakuzenget = array('Yakinlik' => 'Baba Kuzeni', 'KimlikNo' => $rowbabakuzen["TC"], 'Isim' => $rowbabakuzen["ADI"], 'Soyisim' => $rowbabakuzen["SOYADI"], 'DogumTarihi' => $rowbabakuzen["DOGUMTARIHI"], 'NufusIl' => $rowbabakuzen["NUFUSIL"], 'NufusIlce' => $rowbabakuzen["NUFUSILCE"], 'AnneIsim' => $rowbabakuzen["ANNEADI"], 'AnneKimlikNo' => $rowbabakuzen["ANNETC"], 'BabaIsim' => $rowbabakuzen["BABAADI"],  'BabaKimlikNo' => $rowbabakuzen["BABATC"],  'Uyruk' => $rowbabakuzen["UYRUK"]);
                                $idkardes += 1;
                                array_push($arrall, $babakuzenget);
                              }
                          }
                          }
                        }
                      }
                    }
                    if ($resultdedequery->num_rows > 0) {
                      while($rowdede = $resultdedequery->fetch_assoc()) {
                        $dedeget = array('Yakinlik' => 'Dedesi', 'KimlikNo' => $rowdede["TC"], 'Isim' => $rowdede["ADI"], 'Soyisim' => $rowdede["SOYADI"], 'DogumTarihi' => $rowdede["DOGUMTARIHI"], 'NufusIl' => $rowdede["NUFUSIL"], 'NufusIlce' => $rowdede["NUFUSILCE"], 'AnneIsim' => $rowdede["ANNEADI"], 'AnneKimlikNo' => $rowdede["ANNETC"], 'BabaIsim' => $rowdede["BABAADI"],  'BabaKimlikNo' => $rowdede["BABATC"],  'Uyruk' => $rowdede["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $dedeget);
                      }
                  }
                }
                }
              }
            } else {
                $result = array(
                    "Status" => "false",
                    "Message" => "Istenilen kişiye ait KPS sisteminde soyağacı bilgisi bulunamadı!"
                );

                echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                exit;
            }

            $result = array(
                "Soyagaci" => $arrall,
                "Response" => array(
                    "Instance" => "true",
                    "Message" => "Istenilen kişiye ait Soyağacı bilgileri getirildi!",
                    "Limit" => "Işlemlerinizde herhangi bir sorgulama limiti bulunmamaktadır!"
                )
            );
    
            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
@$Mercy = Soyagaci::Query("AileSorgulamaKPS", $_GET["Idenity"]);
}
?>