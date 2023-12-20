<?php
require_once("./bin/koneksi.php");

$hostname               = "localhost";
$user                   = "root";
$pwd                    = "";
$db                     = "kerjasama";

$koneksi                = mysqli_connect($hostname, $user, $pwd, $db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Galeri - Kerjasama</title>

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

<body>
    <section class="pt-3">
        <?php include "./layout/header.php" ?>
    </section>

    <!-- Start Foto -->
    <section id="foto" class="">
        <div class="container my-5">
            <h3 class="text-uppercase text-start">Foto</h3>
            <div class="rows">
                <div class="d-lg-flex flex-row align-items-center justify-content-around gap-4">
                    <?php
                    $perPage            = 3;
                    $page               = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $start              = ($page > 1) ? ($page * $perPage) - $perPage : 0;
                    $sql                = "SELECT * FROM tb_foto LIMIT $start, $perPage";

                    $result         = mysqli_query($koneksi, "SELECT * FROM tb_foto");
                    $total          = mysqli_num_rows($result);

                    $pages          = ceil($total / $perPage);

                    $query          = mysqli_query($koneksi, $sql);
                    while ($q = mysqli_fetch_array($query)) {
                        $id             = $q['id'];
                        $judul_foto     = $q['judul_foto'];
                        $lokasi         = $q['lokasi'];
                        $tanggal        = $q['tanggal'];
                        $gambar         = $q['gambar'];
                    ?>
                        <div class="col-lg-4 border rounded shadow-sm my-4">
                            <img src="./admin/assets/upload/galeri/<?php echo $gambar ?>" class="img-thumbnail img-fluid">
                            <h5 class="my-3 mx-3"><?php echo $judul_foto ?></h5>
                            <div class="d-flex justify-content-between align-items-center my-3" style="font-size: 13px;">
                                <p class="mx-3 col-lg-3 col-3 text-center rounded bg-light fw-bold text-uppercase" style="font-size: 12px;"><?php echo $lokasi ?></p>
                                <p class="text-right mx-3"><?php echo date('d F Y', strtotime($tanggal)) ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
        </div>
    </section>
    <!-- End Foto -->

    <!-- ========== Start Video ========== -->
    <section id="video" class="pt-3">
        <div class="container my-5">
            <h3 class="text-uppercase text-start">Video</h3>
            <div class="d-lg-flex flex-row justify-content-around align-items-center gap-5">
                <?php
                $sql            = "SELECT * FROM tb_video ORDER BY ID DESC LIMIT 0, 2";
                $query          = mysqli_query($koneksi, $sql);
                while ($q = mysqli_fetch_array($query)) {
                    $id             = $q['id'];
                    $judul_video    = $q['judul_video'];
                    $deskripsi      = $q['deskripsi'];
                    $link           = $q['link'];
                ?>
                    <div class="col-lg-6 d-lg-flex flex-column justify-content-around align-items-start border rounded shadow-sm my-4">
                        <div class="ratio ratio-16x9 embed-responsive embed-responsive-16by9">
                            <iframe class="" width="560" height="315" src="<?php echo $link ?>" title="Profil POLTESA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="my-3 mx-3">
                            <h4 class="text-dark"><?php echo $judul_video ?></h4>
                            <p class="text-dark"><?php echo $deskripsi ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="d-lg-flex justify-content-evenly flex-row align-items-center">
                <?php
                $sql            = "SELECT * FROM tb_video ORDER BY ID DESC LIMIT 2, 3";
                $query          = mysqli_query($koneksi, $sql);
                while ($q = mysqli_fetch_array($query)) {
                    $id             = $q['id'];
                    $judul_video    = $q['judul_video'];
                    $deskripsi      = $q['deskripsi'];
                    $link           = $q['link'];
                ?>
                    <div class="col-lg-3 border shadow-sm my-4">
                        <div class="col-lg-12">
                            <div class="ratio ratio-16x9 embed-responsive embed-responsive-16by9">
                                <iframe class="rounded shadow-sm" width="560" height="315" src="<?php echo $link ?>" title="Profil POLTESA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

    </section>
    <!-- ========== End Video ========== -->

    <!-- Footer -->
    <section>
        <?php include "./layout/footer.php" ?>
    </section>
    <!-- End Footer -->

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