<?php
include "./bin/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosedur Kerjasama Kunjungan Tamu Kemitraan - Kerjasama</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
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
        <div class="container col-lg-7">
            <h3 class="text-uppercase text-center mt-5 mb-4">Tentang Kami</h3>
            <?php
            $sql      = "select * from tb_kemitraan_kunjungan";
            $query    = mysqli_query($koneksi, $sql);
            while ($q = mysqli_fetch_array($query)) {
                $id             = $q['id'];
                $foto           = $q['foto'];
            ?>
                <img src="./admin/assets/upload/kemitraan/<?php echo $foto ?>" alt="" class="img-fluid shadow-sm rounded">
            <?php
            }
            ?>
        </div>
    </section>

    <section>
        <?php include "./layout/footer.php" ?>
    </section>
</body>

</html>