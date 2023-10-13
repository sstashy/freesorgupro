<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Aile Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/SorguProDuyuru">SorguPro</a></li>
                        <li class="breadcrumb-item active">Aile Sorgu</li>
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
                    <h4 class="card-title mb-0">Aile Sorgu</h4>
                </div><!-- end card header -->

                <div class="card-body">
                <h5 class="fs-14 mb-3 text-muted">Ailesi Sorgulanacak kişinin TC Kimlik numarasını giriniz.</h5>
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
                                                                <th>Yakinlik</th>
                                <th>TC</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>DOĞUM TARİHİ</th>
                                <th>ANNE ADI</th>
                                <th>ANNE TC</th>
                                <th>BABA ADI</th>
                                <th>BABA TC</th>
                                <th>İL / İLÇE</th>
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
            url: "api/101m/aile.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: function (res) {
                if (res.success === "true") {
                    let data = res.data;
                    let tableBody = '';
                    data.forEach(function (aileUye) {
                        let yakinlik = aileUye.Yakinlik || "Bulunamadı";
                        let tc = aileUye.TC || "Bulunamadı";
                        let ad = aileUye.ADI || "Bulunamadı";
                        let soyad = aileUye.SOYADI || "Bulunamadı";
                        let dogumtarihi = aileUye.DOGUMTARIHI || "Bulunamadı";
                        let anneadi = aileUye.ANNEADI || "Bulunamadı";
                        let annetc = aileUye.ANNETC || "Bulunamadı";
                        let babaadi = aileUye.BABAADI || "Bulunamadı";
                        let babatc = aileUye.BABATC || "Bulunamadı";
                        let il = aileUye.NUFUSIL || "Bulunamadı";
                        let ilce = aileUye.NUFUSILCE || "Bulunamadı";
                        let ililce = il + ' / ' + ilce;
                        
                        let tableRow = `
                            <tr>
                                <td>${yakinlik}</td>
                                <td>${tc}</td>
                                <td>${ad}</td>
                                <td>${soyad}</td>
                                <td>${dogumtarihi}</td>
                                <td>${anneadi}</td>
                                <td>${annetc}</td>
                                <td>${babaadi}</td>
                                <td>${babatc}</td>
                                <td>${ililce}</td>
                            </tr>
                        `;
                        tableBody += tableRow;
                    });
                    
                    $('#tbody').html(tableBody);
                    showAlert("Sonuç bulundu.", "success");
                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "danger");
                }
                hideToast(); // Sorgulanıyor yazısını kaldırma
            },
            error: function (res) {
                hideToast();
                showAlert("Bir hata oluştu! Lütfen yetkili biri ile iletişime geçin.", "danger");
            }
        });
    }
</script>

