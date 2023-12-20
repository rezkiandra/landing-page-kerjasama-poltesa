<?php
// require_once "./bin/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <style>
        #bg-nav {
            background-color: #472272;
            border-radius: 40px;
            box-shadow: 0px 0px 5px orange;
        }
    </style>
</head>

<body>
    <div class="navbar navbar-expand-lg py-2" id="bg-nav">
        <div class="container">
            <a class="navbar-brand" href="../../kerjasama/">
                <img src="../../kerjasama/assets/img/logo.png" alt="" style="height: 51px; width: 150;">
            </a>
            <button class="navbar-toggler border-light rounded d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <div class="container-fluid">
                    <ul class="navbar-nav d-lg-flex justify-content-around">
                        <li class="nav-item">
                            <a class="nav-link text-light d-lg-flex flex-column align-items-center" href="../../kerjasama/"><i class="bi bi-house-fill"></i>Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light d-lg-flex flex-column align-items-center" href="../../kerjasama/berita"><i class="bi bi-globe2"></i>Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light d-lg-flex flex-column align-items-center" href="../../kerjasama/mitra"><i class="bi bi-people-fill"></i>Mitra</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light d-lg-flex flex-column align-items-center dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-bookmark-fill"></i>Kerjasama</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item d-flex" href="../../kerjasama/kemitraan_keluar">Prosedur Kerjasama Kemitraan Keluar</a>
                                <a class="dropdown-item d-flex" href="../../kerjasama/kemitraan_kunjungan">Prosedur Kerjasama Kunjungan Tamu</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light d-lg-flex flex-column align-items-center" href="../../kerjasama/galeri"><i class="bi bi-folder-fill"></i>Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-flex flex-column align-items-center text-light" href="../../kerjasama/tentang">
                                <i class="bi bi-patch-question-fill"></i>Tentang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-flex flex-column align-items-center text-light" href="../../kerjasama/admin/auth">
                                <i class="bi bi-lock-fill"></i>Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>