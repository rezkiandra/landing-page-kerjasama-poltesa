<?php
include_once "./helpers/helpers.php";
ob_start();

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

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Berita - Kerjasama</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: content-box;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <section class="pt-3">
        <?php include "./layout/header.php" ?>
    </section>
    <!-- ========== Start Main ========== -->
    <section id="main">
        <div class="container">
            <div class="title">
                <h2 class="text-uppercase text-center mt-5">Berita Kerjasama</h2>
            </div>
            <div class="rows mb-4">
                <div class="d-lg-flex flex-row justify-content-center gap-5">
                    <?php
                    $perPage            = 3;
                    $page               = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $start              = ($page > 1) ? ($page * $perPage) - $perPage : 0;
                    $sql                = "SELECT * FROM tb_berita LIMIT $start, $perPage";

                    $result         = mysqli_query($koneksi, "SELECT * FROM tb_berita");
                    $total          = mysqli_num_rows($result);
                    $pages          = ceil($total / $perPage);
                    $query          = mysqli_query($koneksi, $sql);
                    while ($q = mysqli_fetch_array($query)) {
                        $id         = enkripsiUrl('encrypt', $q['id']);
                        $judul      = $q['judul'];
                        $deskripsi  = $q['deskripsi'];
                        $slice      = substr($deskripsi, 0, 300) . "...";
                        $slice2     = substr($judul, 0, 70) . "...";
                        $lokasi     = $q['lokasi'];
                        $tanggal    = $q['tanggal'];
                        $gambar     = $q['gambar'];
                    ?>
                        <div class="col-lg-4 border d-lg-flex flex-column justify-content-between rounded shadow-sm mt-4 mb-5 bg-white">
                            <img src="./admin//assets//upload/berita/<?php echo $gambar ?>" class="img-fluid" style="height: 250px; width: 100%;">
                            <h5 class="my-3 mx-3"><?php echo $slice2 ?></h5>
                            <div class="d-flex justify-content-between align-items-center my-3" style="font-size: 13px;">
                                <p class="mx-3 col-lg-3 col-3 text-center rounded bg-light fw-bold text-uppercase" style="font-size: 12px;"><?php echo $lokasi ?></p>
                                <p class="text-right mx-3"><?php echo date('d F Y', strtotime($tanggal)) ?></p>
                            </div>
                            <p class="my-3 mx-3 text-secondary" style="text-align: justify;"><?php echo $slice ?></p>
                            <hr>
                            </hr>
                            <a href="./template/berita?pilih&id=<?php echo $id ?>">
                                <button type="button" class="btn shadow-sm btn-light btn-sm mb-3 mx-3">Selengkapnya<i class="ms-2 bi bi-arrow-up-right"></i></button>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($start <= 1) { ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="?halaman=<?php echo $pages - 1; ?>">Kembali</a>
                    </li>
                <?php } else { ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?php echo $pages - 1; ?>">Kembali</a>
                    </li>
                <?php } ?>


                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <li class="page-item"><a class="page-link text-secondary" href="?halaman=<?php echo $i ?>"> <?php echo $i ?></a></li>
                <?php } ?>

                <?php if ($start >= 1) { ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="?halaman=<?php echo $pages++; ?>">Lanjut</a>
                    </li>
                <?php } else { ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?php echo $pages++; ?>">Lanjut</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </section>
    <!-- ========== End Main ========== -->
    <section>
        <?php include "./layout/footer.php" ?>
    </section>
</body>
<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/chart.js"></script>
<script src="../assets/js/chart2.js"></script>
<script src="../assets/js/chart3.js"></script>
<!-- End Chart JS -->

</html>