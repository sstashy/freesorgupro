<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Güncel Gsm Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/SorguProDuyuru">SorguPro</a></li>
                        <li class="breadcrumb-item active">Güncel Gsm Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Güncel Gsm Sorgu</h4>
                    <p class="mb-1">
                    <p>
                     Sorgulanacak Kişinin Gsm Nosunu Giriniz.</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                        <input class="form-control" type="text" id="tcxx" placeholder="GSM"maxlength="10"><br>
                        </div>
                        <div class="col-xl-12">
                                    <div class="mt-0">
                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn w-sm btn-primary waves-effect waves-light" ><i class="fas fa-search"></i> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearAll()" id="durdurButon" type="button" class="btn w-sm btn-light waves-effect waves-light" ><i class="fas fa-trash-alt"></i> Sıfırla </button>
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
                    <table id="dTable" id="scroll-horizontal"class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tc</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Gsm</th>
                                <th>Baba Adı</th>
                                <th>Baba Tc</th>
                                <th>Anne Adı</th>
                                <th>Anne Tc</th>
                                <th>Güncel Gsm</th>

                            </tr>
                        </thead>
                        <tbody id="jojjoojj">
                            <!-- TBODY -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   <script>
    function clearResults() {
        $("#jojjoojj").html(
            '<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>'
        );
        $("#tcxx").val("");
    }

    function checkNumber() {
        $.Toast.showToast({
            "title": "Sorgulanıyor...",
            "icon": "loading",
            "duration": 3000
        });

        $.ajax({
            url: "../api/güncelgsm/api.php",
            type: "POST",
            data: {
                gsm: $("#tcxx").val()
            },
            success: (res) => {
                if (res.success === "true") {
                    let data = res.data;
                    let tableBody = '';
                    data.forEach(function (item) {
                        let TC = item.TC || "Bulunamadı";
                        let AD = item.AD || "Bulunamadı";
                        let SOYAD = item.SOYAD || "Bulunamadı";
                        let GSM = item.GSM || "Bulunamadı";
                        let BABAADI = item.BABAADI || "Bulunamadı";
                        let BABATC = item.BABATC || "Bulunamadı";
                        let ANNEADI = item.ANNEADI || "Bulunamadı";
                        let ANNETC = item.ANNETC || "Bulunamadı";
                        let GUNCEL_GSM = item.GUNCEL_GSM || "Bulunamadı";
                        let tableRow = `
                            <tr>
                                <td>${TC}</td>
                                <td>${AD}</td>
                                <td>${SOYAD}</td>
                                <td>${GSM}</td>
                                <td>${BABAADI}</td>
                                <td>${BABATC}</td>
                                <td>${ANNEADI}</td>
                                <td>${ANNETC}</td>
                                <td>${GUNCEL_GSM}</td>
                            </tr>
                        `;
                        tableBody += tableRow;
                    });
                    $("#jojjoojj").html(tableBody);
                } else {
                    alert("Hata oluştu!");
                }
            },
            error: () => {
                alert("Hata oluştu!");
            }
        });
    }
</script>
