<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tc Ultra</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/panel">SorguPro</a></li>
                        <li class="breadcrumb-item active">Tc Ultra Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tc Ultra Sorgu</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <h5 class="fs-14 mb-3 text-muted">Sorgulanacak kişinin TC Kimlik numarasını giriniz.</h5>
                    <form action="#">
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-2">
                                        <label for="tcInput" class="form-label">TC</label>
                                        <input type="text" id="tcInput" maxlength="11" class="form-control" id="tcInput">
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-12">
                                    <div class="mt-0">
                                        <button type="button" onclick="kontrolEt()" class="btn w-sm btn-primary waves-effect waves-light">Sorgula</button>
                                        <button type="button" onclick="clearRow('#tcInput', '#tbody')" class="btn w-sm btn-light waves-effect waves-light">Temizle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sonuç:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>TC</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>GSM</th>
                                <th>BABAADI</th>
                                <th>BABATC</th>
                                <th>ANNEADI</th>
                                <th>ANNETC</th>
                                <th>DOGUMTARIHI</th>
                                <th>OLUMTARIHI</th>
                                <th>DOGUMYERI</th>
                                <th>MEMLEKETIL</th>
                                <th>MEMLEKETILCE</th>
                                <th>MEMLEKETKOY</th>
                                <th>ADRESIL</th>
                                <th>ADRESILCE</th>
                                <th>AILESIRANO</th>
                                <th>BIREYSIRANO</th>
                                <th>MEDENIHAL</th>
                                <th>CINSIYET</th>
                                <th>GUNCEL_GSM</th>
                                <th>REHBER_ISIMLERI</th>
                                <th>SERINO</th>
                                <th>SONGECERLILIK</th>
                                <th>ADRES2022</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <!-- TBODY -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
</div>

<script>
    function kontrolEt() {
        checkRow('tcInput');
        $.ajax({
            url: "../api/tcultra/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: function(res) {
                if (res && res.data) {
                    let result;
                    res.data.forEach(element => {
                        let TC = item.TC || "Bulunamadı";
                        let ADI = item.AD || "Bulunamadı";
                        let SOYADI = item.SOYAD || "Bulunamadı";
                        let GSM = item.GSM || "Bulunamadı";
                        let BABAADI = item.BABAADI || "Bulunamadı";
                        let BABATC = item.BABATC || "Bulunamadı";
                        let ANNEADI = item.ANNEADI || "Bulunamadı";
                        let ANNETC = item.ANNETC || "Bulunamadı";
                        let DOGUMTARIHI = item.DOGUMTARIHI || "Bulunamadı";
                        let OLUMTARIHI = item.OLUMTARIHI || "Bulunamadı";
                        let DOGUMYERI = item.DOGUMYERI || "Bulunamadı";
                        let MEMLEKETIL = item.MEMLEKETIL || "Bulunamadı";
                        let MEMLEKETILCE = item.MEMLEKETILCE || "Bulunamadı";
                        let MEMLEKETKOY = item.MEMLEKETKOY || "Bulunamadı";
                        let ADRESIL = item.ADRESIL || "Bulunamadı";
                        let ADRESILCE = item.ADRESILCE || "Bulunamadı";
                        let AILESIRANO = item.AILESIRANO || "Bulunamadı";
                        let BIREYSIRANO = item.BIREYSIRANO || "Bulunamadı";
                        let MEDENIHAL = item.MEDENIHAL || "Bulunamadı";
                        let CINSIYET = item.CINSIYET || "Bulunamadı";
                        let GUNCELGSM = item.GUNCEL_GSM || "Bulunamadı";
                        let REHBER_ISIMLERI = item.REHBER_ISIMLERI || "Bulunamadı";
                        let SERINO = item.SERINO || "Bulunamadı";
                        let SONGECERLILIK = item.SONGECERLILIK || "Bulunamadı";
                        let ADRES2022 = item.ADRES2022 || "Bulunamadı";
                        result += `<tr>
                                <td>${TC}</td>
                                <td>${ADI}</td>
                                <td>${SOYADI}</td>
                                <td>${GSM}</td>
                                <td>${BABAADI}</td>
                                <td>${BABATC}</td>
                                <td>${ANNEADI}</td>
                                <td>${ANNETC}</td>
                                <td>${DOGUMTARIHI}</td>
                                <td>${OLUMTARIHI}</td>
                                <td>${DOGUMYERI}</td>
                                <td>${MEMLEKETIL}</td>
                                <td>${MEMLEKETILCE}</td>
                                <td>${MEMLEKETKOY}</td>
                                <td>${ADRESIL}</td>
                                <td>${ADRESILCE}</td>
                                <td>${AILESIRANO}</td>
                                <td>${BIREYSIRANO}</td>
                                <td>${MEDENIHAL}</td>
                                <td>${CINSIYET}</td>
                                <td>${GUNCEL_GSM}</td>
                                <td>${REHBER_ISIMLERI}</td>
                                <td>${SERINO}</td>
                                <td>${SONGECERLILIK}</td>
                                <td>${ADRES2022}</td>
        </tr>`;
                    });

                    $('#tbody').html(result);
                    showAlert("Sonuç bulundu.", "success");
                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "danger");
                }
                hideToast();
            },
            error: function(res) {
                hideToast();
                showAlert("Bir hata oluştu! Lütfen yetkili biri ile iletişime geçin.", "danger");
            }
        });
    }
</script>