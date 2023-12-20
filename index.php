<?php
require_once("./bin/koneksi.php");
include_once "./helpers/helpers.php";

$hostname           = "localhost";
$user               = "root";
$pwd                = "";
$db                 = "kerjasama";

$koneksi = mysqli_connect($hostname, $user, $pwd, $db);
if (!$koneksi) {
    die("Belum terkoneksi");
} else {
    // echo "Koneksi berhasil";
}

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// Kerjasama Dalam Negeri
$sql                    = "SELECT * FROM tb_kerjasama_dalam";
$kerjasama_dalam        = mysqli_query($koneksi, $sql);
$jumlah_internal        = mysqli_num_rows($kerjasama_dalam);

// Kerjasama Luar Negeri
$sql                    = "SELECT * FROM tb_kerjasama_luar";
$kerjasama_luar         = mysqli_query($koneksi, $sql);
$jumlah_external        = mysqli_num_rows($kerjasama_luar);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Beranda - Kerjasama</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg-light">
    <!-- ========== Start Banner ========== -->
    <section id="banner" class="h-75">
        <div class="pt-3 pb-4">
            <?php include "./layout/header.php" ?>
        </div>
        <div class="container d-flex flex-column align-items-center">
            <div class="banner-title mt-3">
                <h2 class="fs-3 fw-bold text-light text-center">Selamat Datang Di Website</h2>
                <h2 class="fs-3 fw-bold text-light text-center">Kerja Sama Politeknik Negeri Sambas</h2>
            </div>
            <div class="banner-subtitle pt-4 pb-2">
                <h5 class="fs-5 text-light text-center">Menjalin Kerja Sama Bersama Kami</h5>
                <h5 class="fs-5 text-light text-center">Untuk Meningkatkan Kebersamaan Antar Perguruan Tinggi</h5>
            </div>
            <div onclick="scrollToCarousel('carousel')" class="btn btn-outline-dark btn-warning rounded border border-warning border-2 shadow my-4">Selengkapnya</div>
        </div>
    </section>
    <!-- ========== End Banner ========== -->

    <!-- ========== Start Carousel ========== -->
    <section id="carousel" class="pt-4 container">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner shadow-sm">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="./assets/img/carousel1.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Foto Bersama Direktur Poltesa</h3>
                        <p>Dokumentasi foto bersama direktur poltesa dan politeknik mukah serawak</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./assets/img/carousel2.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Foto Bersama Direktur Poltesa</h3>
                        <p>Dokumentasi foto bersama direktur poltesa dan politeknik mukah serawak</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./assets/img/carousel3.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Foto Bersama Direktur Poltesa</h3>
                        <p>Dokumentasi foto bersama direktur poltesa dan politeknik mukah serawak</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- ========== End Carousel ========== -->


    <section id="grafik">
        <div class="container bg-white mt-4 rounded shadow-sm pb-3">
            <h2 class="text-center pt-4">Grafik MoU</h2>
            <div class="d-lg-flex justify-content-around">
                <div class="col-lg-12 d-lg-flex justify-content-center gap-5">
                    <!-- <div class="col-lg-10 border rounded shadow-sm my-4">
                        <h5 class="text-uppercase text-center rounded text-bold text-light py-2 bg-chart" style="font-size: 16px;">Kerjasama Dalam Negeri 5 Tahun Terakhir</h5>
                        <canvas class="bg-white" id="myChart"></canvas>
                    </div> -->
                    <!-- <div class="col-lg-6 border rounded shadow-sm my-4">
                        <h5 class="text-uppercase text-center rounded text-bold text-light py-2 bg-chart" style="font-size: 16px;">Kerjasama Luar Negeri 8 Tahun Terakhir</h5>
                        <canvas class="bg-white" id="myChart3" style="height: 20vh;"></canvas>
                    </div> -->
                </div>
            </div>
            <div class="d-lg-flex flex-row justify-content-around align-items-center gap-5">
                <div class="col-lg-5 border rounded bg-light d-flex justify-content-center my-3 shadow-sm">
                    <div class="bg-counter text-light w-25 d-flex justify-content-center align-items-center" style="font-size: 20px;"><?php echo $jumlah_internal ?></div>
                    <div class="subject container my-1">
                        <p class="text-uppercase">Total Kerjasama Dalam Negeri</p>
                        <a href="./kerjasama_dalam" class="btn btn-sm mb-1 btn-outline-dark text-uppercase">Detail</a>
                    </div>
                </div>
                <div class="col-lg-5 border rounded bg-light d-flex justify-content-center my-3 shadow-sm">
                    <div class="bg-counter text-light w-25 d-flex justify-content-center align-items-center" style="font-size: 20px;"><?php echo $jumlah_external ?></div>
                    <div class="subject container my-1">
                        <p class="text-uppercase">Total Kerjasama Luar Negeri</p>
                        <a href="./kerjasama_luar" class="btn btn-sm mb-1 btn-outline-dark text-uppercase">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Deskripsi ========== -->

    <!-- ========== Start Berita ========== -->
    <section id="berita" class="h-50">
        <div class="container rounded shadow-sm my-4 bg-white d-lg-flex justify-content-center">
            <div class="col-lg-8">
                <div class="d-lg-flex justify-content-between flex-column pt-5">
                    <h4 class="text-uppercase text-center">Berita Terbaru</h4>
                    <div class="d-lg-flex flex-column justify-content-evenly align-items-center">
                    </div>
                    <div class="d-lg-flex flex-row justify-content-evenly">
                        <?php
                        $sql   = "SELECT * FROM tb_berita ORDER BY ID ASC LIMIT 0, 2";
                        $query    = mysqli_query($koneksi, $sql);
                        while ($q = mysqli_fetch_array($query)) {
                            $id                 = enkripsiUrl('encrypt', $q['id']);
                            $judul              = $q['judul'];
                            $deskripsi          = $q['deskripsi'];
                            $slice              = substr($deskripsi, 0, 300) . "...";
                            $slice2             = substr($judul, 0, 50) . "...";
                            $lokasi             = $q['lokasi'];
                            $tanggal            = $q['tanggal'];
                            $gambar             = $q['gambar'];
                        ?>
                            <div class="col-lg-5 bg-light border rounded my-4 shadow-sm">
                                <img src="./admin/assets/upload/berita/<?php echo $gambar ?>" alt="" class="img-fluid" style="height: 250px; width: 100%;">
                                <h5 class="my-3 mx-3"><?php echo $slice2 ?></h5>
                                <div class="d-flex justify-content-between align-items-center my-3" style="font-size: 14px;">
                                    <p class="mx-3 col-lg-3 col-3 text-center rounded bg-white fw-bold text-uppercase" style="font-size: 12px;"><?php echo $lokasi ?></p>
                                    <p class="text-right mx-3"><?php echo date('d F Y', strtotime($tanggal)) ?></p>
                                </div>
                                <p class="my-2 mx-3 text-secondary" style="text-align: justify;"><?php echo $slice ?></p>
                                <a href="./template/berita?pilih&id=<?php echo $id ?>">
                                    <button type="button" class="btn bg-white shadow-sm btn-sm my-3 mx-3">Selengkapnya<i class="ms-2 bi bi-arrow-up-right"></i></button>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="d-lg-flex flex-row justify-content-evenly">
                        <?php
                        $sql   = "SELECT * FROM tb_berita ORDER BY ID ASC LIMIT 2, 2";
                        $query    = mysqli_query($koneksi, $sql);
                        while ($q = mysqli_fetch_array($query)) {
                            $id                 = enkripsiUrl('encrypt', $q['id']);
                            $judul              = $q['judul'];
                            $deskripsi          = $q['deskripsi'];
                            $slice              = substr($deskripsi, 0, 300) . "...";
                            $slice2             = substr($judul, 0, 50) . "...";
                            $lokasi             = $q['lokasi'];
                            $tanggal            = $q['tanggal'];
                            $gambar             = $q['gambar'];
                        ?>
                            <div class="col-lg-5 bg-light border rounded my-4 shadow-sm">
                                <img src="./admin/assets/upload/berita/<?php echo $gambar ?>" alt="" class="img-fluid" style="height: 250px; width: 100%;">
                                <h5 class="my-3 mx-3"><?php echo $slice2 ?></h5>
                                <div class="d-flex justify-content-between align-items-center my-3" style="font-size: 14px;">
                                    <p class="mx-3 col-lg-3 col-3 text-center rounded bg-white fw-bold text-uppercase" style="font-size: 12px;"><?php echo $lokasi ?></p>
                                    <p class="text-right mx-3"><?php echo date('d F Y', strtotime($tanggal)) ?></p>
                                </div>
                                <p class="my-2 mx-3 text-secondary" style="text-align: justify;"><?php echo $slice ?></p>
                                <a href="./template/berita?pilih&id=<?php echo $id ?>">
                                    <button type="button" class="btn bg-white shadow-sm btn-sm my-3 mx-3">Selengkapnya<i class="ms-2 bi bi-arrow-up-right"></i></button>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h4 class="text-uppercase text-center my-5">Galeri</h4>
                <div class="d-lg-flex flex-column mt-4 pb-2">
                    <?php
                    $sql      = "SELECT * FROM tb_foto ORDER BY ID ASC LIMIT 0, 5";
                    $query    = mysqli_query($koneksi, $sql);
                    while ($q = mysqli_fetch_array($query)) {
                        $id                = $q['id'];
                        $judul_foto        = $q['judul_foto'];
                        $lokasi            = $q['lokasi'];
                        $tanggal           = $q['tanggal'];
                        $gambar            = $q['gambar'];
                    ?>
                        <div class="col-lg-12 border bg-light rounded mb-5 shadow-sm">
                            <img src="./admin/assets/upload/galeri/<?php echo $gambar ?>" alt="" class="img-fluid">
                            <!-- <h5 class="my-3 mx-3"><?php echo $judul_foto ?></h5> -->
                            <!-- <div class="d-flex justify-content-between align-items-center my-3" style="font-size: 14px;">
                                <p class="mx-3 col-lg-3 col-3 text-center rounded bg-light fw-bold text-uppercase" style="font-size: 12px;"><?php echo $lokasi ?></p>
                                <p class="text-right mx-3"><?php echo date('d F Y', strtotime($tanggal)) ?></p>
                            </div> -->
                            <!-- <a href="./template/berita?op=pilih&id=<?php echo $id ?>">
                                <button type="button" class="btn btn-sm mb-3 mx-2">Selengkapnya<i class="ms-2 bi bi-arrow-up-right"></i></button>
                            </a> -->
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include "./layout/footer.php"; ?>
    </section>
    <!-- ========== End Berita ========== -->
</body>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- End Chart JS -->

<script>
    // Memanggil data dari database
    <?php

    ?>

    // Chart 1
    const ctx = document.getElementById("myChart");
    ctx.height = 300;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                label: 'Total Kerjasama',
                data: [
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_dalam WHERE waktu_mulai LIKE '%2018%'";
                    $jml_thn_2018 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2018);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_dalam WHERE waktu_mulai LIKE '%2019%'";
                    $jml_thn_2019 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2019);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_dalam WHERE waktu_mulai LIKE '%2020%'";
                    $jml_thn_2020 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2020);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_dalam WHERE waktu_mulai LIKE '%2021%'";
                    $jml_thn_2021 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2021);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_dalam WHERE waktu_mulai LIKE '%2022%'";
                    $jml_thn_2022 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2022);
                    ?>,
                ],
                backgroundColor: [
                    "#7846a8",
                    "#966fbb",
                    "#a584c5",
                    "#c3add8",
                    "#d2c1e2",
                    "#f0eaf5",
                ],
            }, ],
        },
        options: {
            interaction: {
                mode: "nearest",
            },
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                    align: "center",
                },
            },
            scales: {
                y: {
                    min: 0,
                    setInterval: 10,
                    max: 50,
                    beginAtZero: true,
                },
            },
        },
    });

    // End Chart1

    // Chart 3
    const ctx3 = document.getElementById("myChart3");
    ctx3.height = 100;

    new Chart(ctx3, {
        type: "pie",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
            datasets: [{
                label: "Total Kerjasama",
                data: [
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2016%'";
                    $jml_thn_2016 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2016);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2017%'";
                    $jml_thn_2017 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2017);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2018%'";
                    $jml_thn_2018 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2018);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2019%'";
                    $jml_thn_2019 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2019);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2020%'";
                    $jml_thn_2020 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2020);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2021%'";
                    $jml_thn_2021 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2021);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2022%'";
                    $jml_thn_2022 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2022);
                    ?>,
                    <?php
                    $sql          = "SELECT * FROM tb_kerjasama_luar WHERE waktu_mulai LIKE '%2023%'";
                    $jml_thn_2023 = mysqli_query($koneksi, $sql);
                    echo mysqli_num_rows($jml_thn_2023);
                    ?>,
                ],
                backgroundColor: [
                    "#7846a8",
                    "#966fbb",
                    "#a584c5",
                    "#c3add8",
                    "#d2c1e2",
                    "#f0eaf5",
                ],
                hoverOffset: 1,
            }, ],
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                maintainAspectRatio: false,
            },
        },
    });
    // End Chart 3
</script>
<script>
    const scrollToCarousel = (id) => {
        const carousel = document.getElementById(id);
        carousel.scrollIntoView({
            behavior: "smooth"
        });
    }
</script>

</html>