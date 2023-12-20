<?php
require_once("./bin/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Tentang - Kerjasama</title>

    <!-- Fonts Google -->
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

<body>
    <section class="pt-3">
        <?php include "./layout/header.php" ?>
    </section>

    <section id="gambar">
        <div class="container col-lg-8">
            <h3 class="text-uppercase text-center mt-5 mb-4">Tentang Kami</h3>
            <?php
            $sql      = "select * from tb_tentang";
            $query    = mysqli_query($koneksi, $sql);
            while ($q = mysqli_fetch_array($query)) {
                $id             = $q['id'];
                $banner         = $q['banner'];
            ?>
                <img src="./admin/assets/upload/tentang/<?php echo $banner ?>" alt="" class="img-fluid shadow-sm rounded">
            <?php
            }
            ?>
        </div>
    </section>

    <!-- ========== Start Main ========== -->
    <section id="main">
        <div class="container my-5 col-lg-8">
            <h2 class="text-dark fw-normal">Hubungi Kami</h2>
            <p class="text-dark">Bagian Kerjasama dan Kelembagaan Politeknik Negeri Sambas</p>
            <p class="text-dark">Gedung Direktorat POLTESA</p>
            <p class="text-dark">
                <i class="bi bi-house-fill me-1"></i>
                Jalan Sejangkung 50 Sambas
            </p>
            <p class="text-dark">
                <i class="bi bi-telephone-inbound-fill me-1"></i>
                (0562) 6303123
            </p>
            <p class="text-dark">
                <i class="bi bi-envelope-fill me-1"></i>
                info@poltesa.ac.id
            </p>
        </div>
    </section>
    <!-- ========== End Main ========== -->

    <section>
        <?php include "./layout/footer.php" ?>
    </section>

</body>
<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>