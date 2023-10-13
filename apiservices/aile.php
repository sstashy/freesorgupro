<?php

// POWERED BY FDF
$auth_key = "lowerycoder";
if(htmlspecialchars($_GET['auth']) !=$auth_key) {
        echo json_encode(array('success' => false, 'message' => 'auth keyi yazsana orospucocugu' ));
       die();
    }  else {

session_start();


header("Content-Type: application/json; utf-8;");



ini_set("display_errors", 0);
error_reporting(0);

header("Content-Type: application/json; utf-8;");

$link = new mysqli("localhost", "root", "", "101m");

ini_set("display_errors", 0);
error_reporting(0);

ini_set("display_errors", 0);
error_reporting(0);
// FDF SIKER HERALDE


$tc = htmlspecialchars($_GET["tc"]);
$sql = "";
$resultarray = array();
if (!empty($_GET['tc'])) {
        $sql = "SELECT * FROM 101m WHERE TC=?";
        $result = $link->prepare($sql);
        $result->bind_param("s", $tc);
        $result->execute();
        $result = $result->get_result();
        $kendi = $result->fetch_assoc();
        $kendi = $kendi+array('Yakinlik' => 'Kendisi');
        array_push($resultarray, $kendi);
        $i = $i+1;
        if (!empty($kendi['ANNETC'])) {
            $sql = "SELECT * FROM 101m WHERE TC=?";
            $result = $link->prepare($sql);
            $result->bind_param("s", $kendi['ANNETC']);
            $result->execute();
            $result = $result->get_result();
            $row = $result->fetch_assoc();
            $row = $row+array('Yakinlik' => 'Annesi');
            array_push($resultarray, $row);
            $i = $i+1;
        }
        if (!empty($kendi['BABATC'])) {
            $sql = "SELECT * FROM 101m WHERE TC=?";
            $result = $link->prepare($sql);
            $result->bind_param("s", $kendi['BABATC']);
            $result->execute();
            $result = $result->get_result();
            $row = $result->fetch_assoc();
            $row = $row+array('Yakinlik' => 'Babasi');
            array_push($resultarray, $row);
            $i = $i+1;
            $sql = "SELECT * FROM 101m WHERE BABATC=?";
            $result = $link->prepare($sql);
            $result->bind_param("s", $kendi['BABATC']);
            $result->execute();
            $result = $result->get_result();
            while ($row = $result->fetch_assoc()) {
                $row = $row+array('Yakinlik' => 'Kardesi');
                if ($row['TC'] == $tc) {

                }
                else {
                    array_push($resultarray, $row);
                    $i = $i+1;
                }
            }

        }
}
echo json_encode(["success" => "true","aileuyesayisi" => $i,"data" => $resultarray,], JSON_UNESCAPED_UNICODE);

die();
}

?>