<?php
include_once("../system/main.php");

use jesuzweq\ZFunctions;

$userInfo = ZFunctions::getUserViaSession();

?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>assets/images/lexas-logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= SITEURL ?>assets/images/lexas-logo.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>sorgupro.png" alt="" height="70">
            </span>
            <span class="logo-lg">
                <style>
                    .logo-lg:hover {
                        transition: 500ms;
                        filter: brightness(0.7);
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                        -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                    }

                    .logo-lg {
                        width: 100%;
                        transition: 500ms;
                    }
                </style>
                <img src="<?= SITEURL ?>sorgupro.png" alt="" height="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">

        <div class="container-fluid">
            <div data-simplebar>

                <!-- Sorgu Menu Start -->
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-sorgu"style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;">SorguPro</span></li>
                    <li class="nav-item">

                        <a class="nav-link menu-link" href="panel">
                        <i class="ri-home-6-fill" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #000000;"></i> <span data-key="t-panel" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Ana Sayfa <span class="badge rounded-pill badge-soft-light"></span></span>
                        </a>
                    </li> <!-- end Sorgu Menu -->

                    <li class="menu-title"><span data-key="t-sorgular"style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;">SorguPro Sorgu Paneli</span></li>

                    <!-- SORGULAR SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSorgular" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-user-6-fill" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;"></i> <span data-key="adsoyad" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Mernis Çözümleri</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarSorgular">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adsoyad" class="nav-link" data-key="t-adsoyad"> Ad Soyad Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="proadsoyad" class="nav-link" data-key="t-proadsoyad"> Ad Soyad Sorgu Pro </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcpro" class="nav-link" data-key="t-tcpro"> TC Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcpro" class="nav-link" data-key="t-tcpro"> TC Sorgu Pro </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="aile" class="nav-link" data-key="t-aile"> Aile Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="sulale" class="nav-link" data-key="t-sulale"> Sulale Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ehliyetsinav" class="nav-link" data-key="t-ehliyetsinav"> Ehliyet Sınav Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="isyeri" class="nav-link" data-key="t-isyeri"> İşyeri Sorgu </a>
                                </li>
                            </ul>

                    </li>
                    <!-- SORGULAR SECTION END -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarKisi" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-user-3-fill" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;"></i> <span data-key="adsoyad" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Kisi Çözümleri</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarKisi">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="cinsiyet" class="nav-link" data-key="t-cinsiyet"> Cinsiyet Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ciltno" class="nav-link" data-key="t-ciltno"> Cilt No Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="sirano" class="nav-link" data-key="t-sirano"> Sıra No Sorgu </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="siranoaile" class="nav-link" data-key="t-siranoaile"> Aile Sıra No Sorgu </a>
                                </li>
                            </ul>


                    </li>
                    <!-- GSM SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarGSM" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebaradres">
                            <i class="ri-phone-fill" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;"></i> <span data-key="sidebarGSM" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Telefon Çözümleri</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarGSM">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="gsmtc" class="nav-link" data-key="t-gsmtc"> Gsm~Tc Sorgu </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcgsm" class="nav-link" data-key="t-tcgsm"> Tc~Gsm Sorgu </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <!-- GSM SECTION END -->

                    <!-- VESIKA SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarvesikalik" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebararaclar">
                            <i class="ri-image-fill" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;"></i> <span data-key="sidebarvesikalik" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Vesikalık Çözümleri</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarvesikalik">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="eokulvesika" class="nav-link" data-key="t-eokulvesika">E-Okul Vesika<span class="badge rounded-pill badge-soft-success">2023</span> </a>
                                    </li>
                                </ul>

                        </div>

                    </li>

                    </li>
                    <!-- VESIKA SECTION END -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebararaclar" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebararaclar">
                            <i class="ri-search-eye-line" scope="col" style="color: #FF8C00; font-weight: bolder; text-shadow: 0px 0px 10px #FF8C00;"></i> <span data-key="sidebararaclar" scope="col" style="color: white; font-weight: bolder; text-shadow: 0px 0px 10px white;">Extra Çözümleri</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebararaclar">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="burc" class="nav-link" data-key="t-burc">Burç Sorgu<span class="badge rounded-pill badge-soft-success">2023</span> </a>
                                    </li>
                                </ul>
                                
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ip" class="nav-link" data-key="t-ip">İp Sorgu<span class="badge rounded-pill badge-soft-success">2023</span> </a>
                                    </li>
                                </ul>

                        </div>

                    </li>

                    </li>
                    <!-- VESIKA SECTION -->
                    <?php if($userInfo['userRole'] == 1) {?>
                    <!-- ADMIN SECTION -->
                    <li class="nav-item">
                    <li class="menu-title"><span data-key="t-adminSidebar">ADMIN</span></li>
                    <a class="nav-link menu-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-admin-fill"></i> <span data-key="t-adminSidebar">Admin</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarAdmin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="announcement" class="nav-link" data-key="t-announcementPost"> Duyuru Paylaşımı
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="users" class="nav-link" data-key="t-Kullanıcılar"> Kullanıcılar </a>
                            </li>
                        </ul>
                    </div>
                    </li>

                    <?php } ?>
                    <!-- ADMIN SECTION END -->
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>