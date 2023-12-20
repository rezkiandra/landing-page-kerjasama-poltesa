<?php
include "../helpers/helpers.php";
require_once "../bin/koneksi.php";

$hostname       = "localhost";
$user           = "root";
$pwd            = "";
$db             = "kerjasama";

$id             = "";
$judul          = "";
$deskripsi      = "";
$lokasi         = "";
$tanggal        = "";
$gambar         = "";
$op             = "";

$koneksi = mysqli_connect($hostname, $user, $pwd, $db);
if (!$koneksi) {
    die("Belum terkoneksi");
} else {
    // echo "Koneksi berhasil";
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $id = enkripsiUrl('decrypt', $id);
} else {
    $id = "";
}

if ($op == 'pilih') {
    $sql1       = "select * from tb_berita where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $id         = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $sql      = "select * from tb_berita where id = '$id'";
    $query    = mysqli_query($koneksi, $sql);
    $author   = "Admin";
    while ($q = mysqli_fetch_array($query)) {
        $id         = $q['id'];
        $judul      = $q['judul'];
        $deskripsi  = $q['deskripsi'];
        $lokasi     = $q['lokasi'];
        $tanggal    = $q['tanggal'];
        $gambar     = $q['gambar'];
    ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
        <title>Berita - <?php echo $judul ?></title>
    <?php
    }
    ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        #bg-nav {
            background-color: #472272;
            border-radius: 40px;
            box-shadow: 0px 0px 5px orange;
        }

        #footer {
            background: linear-gradient(90deg, rgba(51, 27, 68, 1) 0%, rgba(135, 57, 195, 1) 50%, rgba(51, 27, 68, 1) 100%);
        }

        #footer .back-top {
            transition: all 0.5s ease 0s;
        }
    </style>
</head>

<body>
    <!-- ========== Start Navbar ========== -->
    <div class="my-3">
        <?php include_once "../layout/header.php" ?>
    </div>
    <!-- ========== End Navbar ========== -->

    <!-- ========== Start Template ========== -->
    <section id="main">
        <div class="container d-flex justify-content-start align-items-center">
            <div class="col-lg-8 shadow-sm border rounded">
                <img src="../admin/assets/upload/berita/<?php echo $gambar ?>" alt="Gambar Berita" class="img-fluid img-thumbnail shadow-sm rounded">
                <div class="my-4 mx-3">
                    <h2 class="text-start font-weight-bold"><?php echo $judul ?></h2>
                </div>
                <div class="col-4 col-lg-2 my-3 mx-3" style="font-size: 15px;">
                    <p class="px-1 text-center rounded bg-light fw-bold px-1 py-1"><i class="me-2 bi bi-house-fill"></i><?php echo $lokasi ?></p>
                </div>
                <div class="my-4 mx-3">
                    <p style="text-align: justify; font-size: 16px;"><?php echo nl2br($deskripsi) ?></p>
                </div>
                <p class="col-6 col-lg-3 my-3 mx-3 bg-light fw-bold text-center px-1 py-1" style="font-size: 15px;"><i class="me-2 bi bi-calendar-check-fill"></i><?php echo date('d F Y', strtotime($tanggal)) ?></p>
            </div>
        </div>
    </section>
    <!-- ========== End Template ========== -->

    <!-- ========== Start Footer ========== -->
    <section id="footer" class="mt-5 position-static bottom-0 w-100">
        <div class="container">
            <div class="d-lg-flex justify-content-start align-items-center">
                <div class="col-lg-3 mb-3 d-flex flex-column justify-content-center text-start">
                    <h4 class="text-uppercase text-light mt-4 text-center">Alamat</h4>
                    <p class="text-light" style="font-size: 14px;"><i class="bi bi-building me-2"></i>Jalan Raya Sejangkung Pendidikan Sambas - Kalimantan Barat 79460</p>
                    <p class="text-light" style="font-size: 14px;"><i class="bi bi-telephone-fill me-2"></i>(0562) 6303123</p>
                    <p class="text-light" style="font-size: 14px;"><i class="bi bi-google me-2"></i>info@poltesa.ac.id</p>
                </div>
                <div class="col-lg-6 mb-3 d-flex flex-column justify-content-center align-items-center">
                    <div onclick="return scrollToTop()" class="back-top" style="cursor: pointer;"><i style="font-size: 50px;" class="text-warning bi bi-arrow-up-circle-fill"></i></div>
                    <img src="../../kerjasama/assets/img/white.png" class="img-fluid w-25">
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="text-uppercase text-light text-center mt-4">Ikuti Kami</h4>
                        <div class="d-grid gap-3">
                            <a href="https://facebook.com/poltesa/" class="text-decoration-none text-light text-uppercase" style="font-size: 14px;">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </a>
                            <a href="https://twitter.com/officialpoltesa" class="text-decoration-none text-light text-uppercase" style="font-size: 14px;">
                                <i class="bi bi-twitter me-2"></i>Twitter
                            </a>
                            <a href="https://instagram.com/officialpoltesa" class="text-decoration-none text-light text-uppercase" style="font-size: 14px;">
                                <i class="bi bi-instagram me-2"></i>Instagram
                            </a>
                            <a href="https://youtube.com/@mediapoltesa" class="text-decoration-none text-light text-uppercase" style="font-size: 14px;">
                                <i class="bi bi-youtube me-2"></i>Youtube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark d-lg-flex justify-content-center align-items-center py-2 pt-3">
            <p class="text-light text-center">&copy 2022 Poltesa All Rights Reserved</p>
        </div>
    </section>
</body>
<script>
    function scrollToTop() {
        window.scrollTo(0, 0);
    }
</script>

</html>