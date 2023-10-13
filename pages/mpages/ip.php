<?php

$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">');
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'IP Sorgu';

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><img style="width: 30px;height: auto;" src="/assets/images/turkey.png" alt="">IP Sorgu</h4>
                    <p class="mb-1">
                    <p>Sorgulanacak kişinin IP adresini giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">	
                                <form action="" method="post">
                         <div class="mb-3 input-group">
                        <input type="text" maxlength="18" class="form-control" name="ip_adresi" id="number" placeholder="IP Adresi" required><br>
                        </div>
					<center>
<button type="submit" name="sorgula" class="btn btn-outline-success btn-border" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
<button onclick="clearResults()" id="durdurButon" type="button" class="btn btn-outline-danger btn-border" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                            <button onclick="printTables()" id="yazdirTable" type="button" class="btn btn-outline-warning btn-border" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                </center>
                          <div class="col-xl-12 col-md-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
										<div class="table-responsive">
                                            <table class="table mb-0">
                                            <tr>
                                             <th scope="col">IP</th>
                                             <th scope="col">Ülke</th>
                                             <th scope="col">Ülke Kodu</th>
                                             <th scope="col">Bölge</th>
                                             <th scope="col">Bölge Kodu</th>
                                             <th scope="col">Şehir</th>
                                             <th scope="col">Posta Kodu</th>
                                             <th scope="col">Enlem</th>
                                             <th scope="col">Boylam</th>
                                             <th scope="col">Zaman Dilimi</th>
                                             <th scope="col">ISP</th>
                                             <th scope="col">Organizasyon</th>
                                             <th scope="col">As Numarası/Adı</th>
                                             <th scope="col">Harita</th>
                                             </tr>
                                	<?php
        if(isset($_POST['sorgula'])) {
            //JSON Veriyi çek ve çöz
            $ip_bilgi = file_get_contents('http://ip-api.com/json/'.$_POST['ip_adresi']);
            $json_coz = json_decode($ip_bilgi, true);
            ?>

<tbody>
<td class="result"><?php echo $json_coz['query']; ?> </td>

<td class="result"><?php echo $json_coz['country']; ?> </td>

<td class="result"><?php echo $json_coz['countryCode']; ?> </td>

<td class="result"><?php echo $json_coz['regionName']; ?> </td>

<td class="result"><?php echo $json_coz['region']; ?> </td>

<td class="result"><?php echo $json_coz['city']; ?> </td>

<td class="result"><?php echo $json_coz['zip']; ?> </td>

<td class="result"><?php echo $json_coz['lat']; ?> </td>

<td class="result"><?php echo $json_coz['lon']; ?> </td>

<td class="result"><?php echo $json_coz['timezone']; ?> </td>

<td class="result"><?php echo $json_coz['isp']; ?> </td>
	
<td class="result"><?php echo $json_coz['org']; ?> </td>

<td class="result"><?php echo $json_coz['as']; ?> </td>

<td class="result"><?php  echo '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script><div style="overflow:hidden;height:240px;width:500px;"><div id="gmap_canvas" style="height:440px;width:700px;"></div><div><small><a href="embed google map">http://embedgooglemaps.com</a></small></div><div><small><a href="https://googlemapsgenerator.com">embed google maps</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript">function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(39.9333635,32.85974190000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng('.$json_coz['lat'].','.$json_coz['lon'].')});infowindow = new google.maps.InfoWindow({content:"<strong>'.$json_coz['query'].'</strong><br>'.$json_coz['city'].', '.$json_coz['country'].'<br>"});google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, "load", init_map);</script> '; } ?> </td>

<script>

            const printTables = async () => {
                window.print();
            }

            const clearResults = async () => {

                const getAllResults = document.querySelectorAll('.result');

                getAllResults.forEach((result) => {
                    result.innerHTML = '';
                });

            }

</script>

<?php

?>