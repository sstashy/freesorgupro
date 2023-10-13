<?php

$token1 = "4d7e268449f236246524311bf561ae673969ff451b4f823f63293a55f3719bbd563fb1e970f0a9369ad9b8a323492125e9d9794ce0bccc8812ff05adcbb3d409";

 

$author = isset($_GET['author']) ? $_GET['author'] : '';

 

if ($author === 'LoweryCoder') {

    function tcpro_post($url) {

        $curl = curl_init();

 

        curl_setopt_array($curl, array(

            CURLOPT_URL => $url,

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

        ));

 

        $response = curl_exec($curl);

        $err = curl_error($curl);

 

        curl_close($curl);

 

        if ($err) {

            return "Curl error: " . $err;

        } else {

            return $response;

        }

    }

 

    if (isset($_GET['tc'])) {

        $tc = $_GET['tc'];

 

        $url = "https://intvrg.gib.gov.tr/intvrg_server/dispatch?cmd=EBynYetkiIslemleri_vknGirisi&callid=ad88febd8443e-13&token=$token1&jp=%7B%22mukellefVergiNo%22%3A%22%22%2C%22mukellefTCKimlikNo%22%3A%22$tc%22%2C%22arac%C4%B1l%C4%B1kSozlesmeTipi%22%3A%220%22%7D";

        $veri = tcpro_post($url);

 

        // Parse JSON response and format it

        $response = json_decode($veri, true);

 

        if (isset($response['data']['mukellef_vergino']) || isset($response['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdkodu'])) {

            $mukellef_vergino = $response['data']['mukellef_vergino'];

            $vdkodu = $response['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdkodu'];

 

            // Yeni bir URL oluştur

            $sube_url = "https://intvrg.gib.gov.tr/intvrg_server/dispatch?cmd=EBynYetkiIslemleri_subeNoGetir&callid=e3c364fa5ccd1-88&token=$token1&jp=%7B%22mukellefVergiNo%22%3A%22$mukellef_vergino%22%2C%22bagliVd%22%3A%22$vdkodu%22%7D";

            $sube_veri = tcpro_post($sube_url);

 

            // Parse JSON response

            $sube_response = json_decode($sube_veri, true);

 

            if (isset($sube_response['data']['sube_no'][1]['text'])) {

                $sube_adres = $sube_response['data']['sube_no'][1]['text'];

 

                $result = array(

                    'mukellef_vergino' => $mukellef_vergino,

                    'vdkodu' => $vdkodu,

                    'sube_adres' => $sube_adres

                );

 

                header('Content-Type: application/json');

                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            } else {

                echo "Şube adresi bulunamadı.";

            }

        } else {

            echo "Mükellef adresi veya mükellef vergi numarası bulunamadı.";

        }

    } else {

        // ...

    }

} else {

    echo "Orusbu Çocugu Yanlış author.";

}

?>