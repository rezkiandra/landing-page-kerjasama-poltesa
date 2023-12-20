<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header("location:auth");
    exit();
}

$hostname       = "localhost";
$user           = "root";
$pwd            = "";
$db             = "kerjasama";

$koneksi = mysqli_connect($hostname, $user, $pwd, $db);
if (!$koneksi) {
    die("Belum terkoneksi");
} else {
    // echo "Koneksi berhasil";
}

// Memanggil data pada table kerjasama dalam negeri
$get_internal       = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_dalam");
$count_internal     = mysqli_num_rows($get_internal);

// Memanggil data pada table kerjasama luar negeri
$get_external       = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_luar");
$count_external     = mysqli_num_rows($get_external);

// Memanggil data pada table berita dalam negeri
$get_berita         = mysqli_query($koneksi, "SELECT * FROM tb_berita");
$count_berita       = mysqli_num_rows($get_berita);

// Kerjasama Dalam Negeri yang aktif
$aktif_internal             = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_dalam WHERE status = 'Aktif'");
$count_aktif_internal       = mysqli_num_rows($aktif_internal);

// Kerjasama Dalam Negeri yang tidak aktif
$nonaktif_internal             = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_dalam WHERE status = 'Tidak Aktif'");
$count_nonaktif_internal       = mysqli_num_rows($nonaktif_internal);

// Kerjasama Luar Negeri yang aktif
$aktif_external             = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_luar WHERE status = 'Aktif'");
$count_aktif_external       = mysqli_num_rows($aktif_external);

// Kerjasama Luar Negeri yang tidak aktif
$nonaktif_external             = mysqli_query($koneksi, "SELECT * FROM tb_kerjasama_luar WHERE status = 'Tidak Aktif'");
$count_nonaktif_external       = mysqli_num_rows($nonaktif_external);

// Kemitraan Dalam Negeri
$mitra_internal             = mysqli_query($koneksi, "SELECT * FROM tb_mitra WHERE lokasi = 'Dalam Negeri'");
$count_mitra_internal       = mysqli_num_rows($mitra_internal);

// Kemitraan Luar Negeri
$mitra_external             = mysqli_query($koneksi, "SELECT * FROM tb_mitra WHERE lokasi = 'Luar Negeri'");
$count_mitra_external       = mysqli_num_rows($mitra_external);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../admin/assets/css/typography.css">
    <link rel="stylesheet" href="../admin/assets/css/default-css.css">
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
    <link rel="stylesheet" href="../admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="page-container">
        <?php include_once "../layout/header_admin.php"; ?>
        <div class="main-content">
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="./">Admin</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle text-uppercase" data-toggle="dropdown"><?php echo $_SESSION['session_username'] ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="./logout" onclick="return confirm('Apakah yakin ingin logout?')">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">
                <div class="sales-report-area mt-5">
                    <div class="d-lg-flex justify-content-center gap-5 mb-1">
                        <div class="col-lg-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-globe"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Berita</h4>
                                        <p>Kampus & Umum</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_berita ?></h2>
                                        <span>Berita</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kerjasama</h4>
                                        <p>Dalam Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_internal ?></h2>
                                        <span>Mitra</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-report mb-4">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kerjasama</h4>
                                        <p>Luar Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_external ?></h2>
                                        <span>Mitra</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rows 1 -->
                    <div class="d-lg-flex justify-content-center gap-5 mb-4">
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Kerjasama Yang Aktif</h4>
                                        <p>Dalam Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_aktif_internal ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Kerjasama Yang Aktif</h4>
                                        <p>Luar Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_aktif_external ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Rows 1 -->

                    <!-- Rows 2 -->
                    <div class="d-lg-flex justify-content-center gap-5 mb-4">
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Kerjasama Yang Tidak Aktif</h4>
                                        <p>Dalam Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_nonaktif_internal ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Kerjasama Yang Tidak Aktif</h4>
                                        <p>Luar Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_nonaktif_external ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Rows 2 -->


                    <!-- Rows 3 -->
                    <div class="d-lg-flex justify-content-center gap-5 mb-5">
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Mitra</h4>
                                        <p>Dalam Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_mitra_internal ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                                <!-- <canvas id="berita" height="100"></canvas> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jumlah Mitra</h4>
                                        <p>Luar Negeri</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $count_mitra_external ?></h2>
                                        <span>Kerjasama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Rows 3 -->

            </div>
        </div>
        <footer>
            <div class="footer-area">
                <p>© Copyright 2023 Poltesa | All Right Reserved</p>
            </div>
        </footer>
    </div>
</body>

<script src="../admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../admin/assets/js/popper.min.js"></script>
<script src="../admin/assets/js/bootstrap.min.js"></script>
<script src="../admin/assets/js/owl.carousel.min.js"></script>
<script src="../admin/assets/js/metisMenu.min.js"></script>
<script src="../admin/assets/js/jquery.slimscroll.min.js"></script>
<script src="../admin/assets/js/jquery.slicknav.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../admin/assets/js/line-chart.js"></script>
<script src="../admin/assets/js/pie-chart.js"></script>
<script src="../admin/assets/js/plugins.js"></script>
<script src="../admin/assets/js/scripts.js"></script>

</html>