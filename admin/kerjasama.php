<?php
require_once "../helpers/helpers.php";
ob_start();
session_start();

if (!isset($_SESSION['session_username'])) {
    header("location:auth");
    exit();
}

$hostname       = "localhost";
$user           = "root";
$pwd            = "";
$db             = "kerjasama";

$mitra_kerjasama        = "";
$bentuk_lembaga         = "";
$jenis_kegiatan         = "";
$waktu_mulai            = "";
$waktu_berakhir         = "";
$mou_poltesa            = "";
$mou_mitra              = "";
$lokasi                 = "";
$status                 = "";
$q1                     = "";
$q2                     = "";
$success                = "";
$failed                 = "";
$op                     = "";

$koneksi = mysqli_connect($hostname, $user, $pwd, $db);
if (!$koneksi) {
    die("Belum terkoneksi");
}

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit-internal' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id                 = $_GET['id'];
    $id                 = enkripsiUrl('decrypt', $id);
    $sql1               = "SELECT * FROM tb_kerjasama_dalam WHERE id = '$id'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $mitra_kerjasama    = $r1['mitra_kerjasama'];
    $bentuk_lembaga     = $r1['bentuk_lembaga'];
    $jenis_kegiatan     = $r1['jenis_kegiatan'];
    $waktu_mulai        = $r1['waktu_mulai'];
    $waktu_berakhir     = $r1['waktu_berakhir'];
    $mou_poltesa        = $r1['mou_poltesa'];
    $mou_mitra          = $r1['mou_mitra'];
    $status             = $r1['status'];
    $lokasi             = $r1['lokasi'];
}

if ($op == 'edit-external' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id                 = $_GET['id'];
    $id                 = enkripsiUrl('decrypt', $id);
    $sql1               = "SELECT * FROM tb_kerjasama_luar WHERE id = '$id'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $mitra_kerjasama    = $r1['mitra_kerjasama'];
    $bentuk_lembaga     = $r1['bentuk_lembaga'];
    $jenis_kegiatan     = $r1['jenis_kegiatan'];
    $waktu_mulai        = $r1['waktu_mulai'];
    $waktu_berakhir     = $r1['waktu_berakhir'];
    $mou_poltesa        = $r1['mou_poltesa'];
    $mou_mitra          = $r1['mou_mitra'];
    $status             = $r1['status'];
    $lokasi             = $r1['lokasi'];
}

if ($op == 'hapus-internal' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id         = $_GET['id'];
    $id         = enkripsiUrl('decrypt', $id);
    $sql1       = "SELECT * FROM tb_kerjasama_dalam WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data kerjasama";
    } else {
        $failed  = "Gagal menghapus data kerjasama";
    }
}

if ($op == 'hapus-external' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id         = $_GET['id'];
    $id         = enkripsiUrl('decrypt', $id);
    $sql1       = "SELECT * FROM tb_kerjasama_luar WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data kerjasama";
    } else {
        $failed  = "Gagal menghapus data kerjasama";
    }
}

if (isset($_POST['simpan'])) { //untuk create data
    $mitra_kerjasama            = $_POST['mitra_kerjasama'];
    $bentuk_lembaga             = $_POST['bentuk_lembaga'];
    $jenis_kegiatan             = $_POST['jenis_kegiatan'];
    $waktu_mulai                = $_POST['waktu_mulai'];
    $waktu_berakhir             = $_POST['waktu_berakhir'];
    $mou_poltesa                = $_POST['mou_poltesa'];
    $mou_mitra                  = $_POST['mou_mitra'];
    $status                     = $_POST['status'];
    $lokasi                     = $_POST['lokasi'];

    if ($mitra_kerjasama && $bentuk_lembaga && $jenis_kegiatan && $waktu_mulai && $waktu_berakhir && $mou_poltesa && $mou_mitra && $status && $lokasi) {
        if ($lokasi == "Dalam Negeri") {
            if ($op == 'edit-internal' && isset($_GET['id']) && !empty($_GET['id'])) { //untuk update
                $sql1       = "UPDATE tb_kerjasama_dalam SET mitra_kerjasama = '$mitra_kerjasama', bentuk_lembaga = '$bentuk_lembaga', jenis_kegiatan = '$jenis_kegiatan', waktu_mulai = '$waktu_mulai', waktu_berakhir = '$waktu_berakhir', mou_poltesa = '$mou_poltesa', mou_mitra = '$mou_mitra', status = '$status', lokasi = '$lokasi' where id = '$id'";
                $q1         = mysqli_query($koneksi, $sql1);
                if ($q1) {
                    $success = "Data kerjasama berhasil diupdate";
                } else {
                    $failed  = "Data kerjasama gagal diupdate";
                }
            } else {
                $sql1   = "INSERT INTO tb_kerjasama_dalam(mitra_kerjasama, bentuk_lembaga, jenis_kegiatan, waktu_mulai, waktu_berakhir, mou_poltesa, mou_mitra, status, lokasi) values ('$mitra_kerjasama','$bentuk_lembaga', '$jenis_kegiatan','$waktu_mulai', '$waktu_berakhir', '$mou_poltesa', '$mou_mitra', '$status', '$lokasi')";
                $q1     = mysqli_query($koneksi, $sql1);
            }
        } elseif ($lokasi == "Luar Negeri") {
            if ($op == 'edit-external' && isset($_GET['id']) && !empty($_GET['id'])) { //untuk update
                $sql1       = "UPDATE tb_kerjasama_luar SET mitra_kerjasama = '$mitra_kerjasama', bentuk_lembaga = '$bentuk_lembaga', jenis_kegiatan = '$jenis_kegiatan', waktu_mulai = '$waktu_mulai', waktu_berakhir = '$waktu_berakhir', mou_poltesa = '$mou_poltesa', mou_mitra = '$mou_mitra', status = '$status', lokasi = '$lokasi' where id = '$id'";
                $q1         = mysqli_query($koneksi, $sql1);
                if ($q1) {
                    $success = "Data kerjasama berhasil diupdate";
                } else {
                    $failed  = "Data kerjasama gagal diupdate";
                }
            } else {
                $sql1   = "INSERT INTO tb_kerjasama_luar(mitra_kerjasama, bentuk_lembaga, jenis_kegiatan, waktu_mulai, waktu_berakhir, mou_poltesa, mou_mitra, status, lokasi) values ('$mitra_kerjasama','$bentuk_lembaga', '$jenis_kegiatan','$waktu_mulai', '$waktu_berakhir', '$mou_poltesa', '$mou_mitra', '$status', '$lokasi')";
                $q1     = mysqli_query($koneksi, $sql1);
            }
        }
    } else {
        $failed = "Silakan masukkan semua data mitra";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Kerjasama</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../admin/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
        <div class="form">
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <h4 class="page-title pull-left">Kerjasama</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="./">Admin</a></li>
                                <li><span>Kerjasama</span></li>
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
        </div>
        <section id="tambah-data" class="py-5 bg-light">
            <div class="container">
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:3; url=kerjasama");
                } elseif ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:3; url=kerjasama");
                }
                ?>
                <form method="POST">
                    <div class="row mb-3">
                        <label for="mitra_kerjasama" class="col-sm-2 col-form-label">Mitra Kerjasama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mitra_kerjasama" name="mitra_kerjasama" placeholder="Masukkan Mitra Kerjasama" required value="<?php echo $mitra_kerjasama ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bentuk_lembaga" class="col-sm-2 col-form-label">Bentuk Lembaga</label>
                        <div class="col-sm-10">
                            <select class="form-control form-select" name="bentuk_lembaga" id="bentuk_lembaga" required>
                                <option selected disabled value="">Pilih Bentuk Lembaga</option>
                                <option value="Lembaga Pendidikan" <?php if ($bentuk_lembaga == "Lembaga Pendidikan") echo "selected" ?>>Lembaga Pendidikan</option>
                                <option value="Lembaga Daerah" <?php if ($bentuk_lembaga == "Lembaga Daerah") echo "selected" ?>>Lembaga Daerah</option>
                                <option value="Lembaga Swadaya Masyarakat" <?php if ($bentuk_lembaga == "Lembaga Swadaya Masyarakat") echo "selected" ?>>Lembaga Swadaya Masyarakat</option>
                                <option value="Lembaga Pelatihan" <?php if ($bentuk_lembaga == "Lembaga Pelatihan") echo "selected" ?>>Lembaga Pelatihan</option>
                                <option value="Lembaga Negara" <?php if ($bentuk_lembaga == "Lembaga Negara") echo "selected" ?>>Lembaga Negara</option>
                                <option value="Lembaga" <?php if ($bentuk_lembaga == "Lembaga") echo "selected" ?>>Lembaga</option>
                                <option value="Pelatihan" <?php if ($bentuk_lembaga == "Pelatihan") echo "selected" ?>>Pelatihan</option>
                                <option value="Kelompok Binaan" <?php if ($bentuk_lembaga == "Kelompok Binaan") echo "selected" ?>>Kelompok Binaan</option>
                                <option value="Industri" <?php if ($bentuk_lembaga == "Industri") echo "selected" ?>>Industri</option>
                                <option value="Organisasi Profesi" <?php if ($bentuk_lembaga == "Organisasi Profesi") echo "selected" ?>>Organisasi Profesi</option>
                                <option value="Pemerintah Desa" <?php if ($bentuk_lembaga == "Pemerintah Desa") echo "selected" ?>>Pemerintah Desa</option>
                                <option value="Penelitian dan Pengembangan Lembaga" <?php if ($bentuk_lembaga == "Penelitian dan Pengembangan Lembaga") echo "selected" ?>>Penelitian dan Pengembangan Lembaga</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kegiatan" class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control form-select" name="jenis_kegiatan" id="jenis_kegiatan" required>
                                <option selected disabled value="">Pilih Jenis Kegiatan</option>
                                <option value="Lembaga Pendidikan" <?php if ($jenis_kegiatan == "Lembaga Pendidikan") echo "selected" ?>>Lembaga Pendidikan</option>
                                <option value="Pengembangan Dan Kerjasama Masyarakat Terinstitusi" <?php if ($jenis_kegiatan == "Pengembangan Dan Kerjasama Masyarakat Terinstitusi") echo "selected" ?>>Pengembangan Dan Kerjasama Masyarakat Terinstitusi</option>
                                <option value="Program Magang dan Internship ke Jepang" <?php if ($jenis_kegiatan == "Program Magang dan Internship ke Jepang") echo "selected" ?>>Program Magang dan Internship ke Jepang</option>
                                <option value="Pengembangan Bidang Pariwisata Dan Perhotelan" <?php if ($jenis_kegiatan == "Pengembangan Bidang Pariwisata Dan Perhotelan") echo "selected" ?>>Pengembangan Bidang Pariwisata Dan Perhotelan</option>
                                <option value="Pengembangan Kemajuan Pariwisata" <?php if ($jenis_kegiatan == "Pengembangan Kemajuan Pariwisata") echo "selected" ?>>Pengembangan Kemajuan Pariwisata</option>
                                <option value="Kerjasama Antar Lembaga" <?php if ($jenis_kegiatan == "Kerjasama Antar Lembaga") echo "selected" ?>>Kerjasama Antar Lembaga</option>
                                <option value="Dukungan Pengembangan Kerjasama Akademik" <?php if ($jenis_kegiatan == "Dukungan Pengembangan Kerjasama Akademik") echo "selected" ?>>Dukungan Pengembangan Kerjasama Akademik</option>
                                <option value="Penerbitan Kartu Kredit Pemerintah" <?php if ($jenis_kegiatan == "Penerbitan Kartu Kredit Pemerintah") echo "selected" ?>>Penerbitan Kartu Kredit Pemerintah</option>
                                <option value="Dukungan Pengembangan Dan Kerjasama Masyarakat Terinstitusi" <?php if ($jenis_kegiatan == "Dukungan Pengembangan Dan Kerjasama Masyarakat Terinstitusi") echo "selected" ?>>Dukungan Pengembangan Dan Kerjasama Masyarakat Terinstitusi</option>
                                <option value="PMMB" <?php if ($jenis_kegiatan == "PMMB") echo "selected" ?>>PMMB</option>
                                <option value="Pengembangan Penilaian Mutu Pendidikan Tinggi Vokasi Berstandar Industri" <?php if ($jenis_kegiatan == "Pengembangan Penilaian Mutu Pendidikan Tinggi Vokasi Berstandar Industri") echo "selected" ?>>Pengembangan Penilaian Mutu Pendidikan Tinggi Vokasi Berstandar Industri</option>
                                <option value="P3M" <?php if ($jenis_kegiatan == "P3M") echo "selected" ?>>P3M</option>
                                <option value="Program Rekrutmen PKL di Jepang" <?php if ($jenis_kegiatan == "Program Rekrutmen PKL di Jepang") echo "selected" ?>>Program Rekrutmen PKL di Jepang</option>
                                <option value="Dukungan Pengembangan Akademik Antar Lembaga" <?php if ($jenis_kegiatan == "Dukungan Pengembangan Akademik Antar Lembaga") echo "selected" ?>>Dukungan Pengembangan Akademik Antar Lembaga</option>
                                <option value="Program Magang Mahasiswa Bersertifikat" <?php if ($jenis_kegiatan == "Program Magang Mahasiswa Bersertifikat") echo "selected" ?>>Program Magang Mahasiswa Bersertifikat</option>
                                <option value="Perjanjian Kerjasama Program Mobilisasi Dosen" <?php if ($jenis_kegiatan == "Perjanjian Kerjasama Program Mobilisasi Dosen") echo "selected" ?>>Perjanjian Kerjasama Program Mobilisasi Dosen</option>
                                <option value="Standar Dan Sertifikasi Produk Kopi" <?php if ($jenis_kegiatan == "Standar Dan Sertifikasi Produk Kopi") echo "selected" ?>>Standar Dan Sertifikasi Produk Kopi</option>
                                <option value="Pemuktahiran Data" <?php if ($jenis_kegiatan == "Pemuktahiran Data") echo "selected" ?>>Pemuktahiran Data</option>
                                <option value="Pengembangan Soft Skill Mahasiswa" <?php if ($jenis_kegiatan == "Pengembangan Soft Skill Mahasiswa") echo "selected" ?>>Pengembangan Soft Skill Mahasiswa</option>
                                <option value="Dukungan Penyelenggaraan Tri Dharma" <?php if ($jenis_kegiatan == "Dukungan Penyelenggaraan Tri Dharma") echo "selected" ?>>Dukungan Penyelenggaraan Tri Dharma</option>
                                <option value="Pemanfaatan Informasi Geospasial" <?php if ($jenis_kegiatan == "Pemanfaatan Informasi Geospasial") echo "selected" ?>>Pemanfaatan Informasi Geospasial</option>
                                <option value="Dukungan Pengembangan Masyarakat Terinstitusi" <?php if ($jenis_kegiatan == "Dukungan Pengembangan Masyarakat Terinstitusi") echo "selected" ?>>Dukungan Pengembangan Masyarakat Terinstitusi</option>
                                <option value="Pengembangan SDM Agribisnis" <?php if ($jenis_kegiatan == "Pengembangan SDM Agribisnis") echo "selected" ?>>Pengembangan SDM Agribisnis</option>
                                <option value="Peningkatan Penyelenggaraan Tri Dharma Perguruan Tinggi" <?php if ($jenis_kegiatan == "Peningkatan Penyelenggaraan Tri Dharma Perguruan Tinggi") echo "selected" ?>>Peningkatan Penyelenggaraan Tri Dharma Perguruan Tinggi</option>
                                <option value="Pengembangan Dan Pemanfaatan Informasi Geospasial Untuk Pengabdian Kepada Masyarakat Kabupaten Sambas" <?php if ($jenis_kegiatan == "Pengembangan Dan Pemanfaatan Informasi Geospasial Untuk Pengabdian Kepada Masyarakat Kabupaten Sambas") echo "selected" ?>>Pengembangan Dan Pemanfaatan Informasi Geospasial Untuk Pengabdian Kepada Masyarakat Kabupaten Sambas</option>
                                <option value="Program Magang" <?php if ($jenis_kegiatan == "Program Magang") echo "selected" ?>>Program Magang</option>
                                <option value="Standarisasi Dan Sertifikasi Produk Kopi Bubuk Pada Tenant Di Lingkungan Inkubator Bisnis Swabina Tech Politeknik Negeri Sambas" <?php if ($jenis_kegiatan == "Standarisasi Dan Sertifikasi Produk Kopi Bubuk Pada Tenant Di Lingkungan Inkubator Bisnis Swabina Tech Politeknik Negeri Sambas") echo "selected" ?>>Standarisasi Dan Sertifikasi Produk Kopi Bubuk Pada Tenant Di Lingkungan Inkubator Bisnis Swabina Tech Politeknik Negeri Sambas</option>
                                <option value="Program Sadar Hukum" <?php if ($jenis_kegiatan == "Program Sadar Hukum") echo "selected" ?>>Program Sadar Hukum</option>
                                <option value="Hal Kerjasama Pelatihan, Layanan Beasiswa, Test Toefl,Pendidikan Karakter, Kampus Uni Eropa" <?php if ($jenis_kegiatan == "Hal Kerjasama Pelatihan, Layanan Beasiswa, Test Toefl,Pendidikan Karakter, Kampus Uni Eropa") echo "selected" ?>>Hal Kerjasama Pelatihan, Layanan Beasiswa, Test Toefl,Pendidikan Karakter, Kampus Uni Eropa</option>
                                <option value="Penerbitan Dan Pengelolaan Kartu Mahasiswa" <?php if ($jenis_kegiatan == "Penerbitan Dan Pengelolaan Kartu Mahasiswa") echo "selected" ?>>Penerbitan Dan Pengelolaan Kartu Mahasiswa</option>
                                <option value="Pengembangan PPPM" <?php if ($jenis_kegiatan == "Pengembangan PPPM") echo "selected" ?>>Pengembangan PPPM</option>
                                <option value="Pendirian Galeri Investasi" <?php if ($jenis_kegiatan == "Pendirian Galeri Investasi") echo "selected" ?>>Pendirian Galeri Investasi</option>
                                <option value="Tax Center" <?php if ($jenis_kegiatan == "Tax Center") echo "selected" ?>>Tax Center</option>
                                <option value="Pendidikan dan Pelatihan PKM" <?php if ($jenis_kegiatan == "Pendidikan dan Pelatihan PKM") echo "selected" ?>>Pendidikan dan Pelatihan PKM</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" name="waktu_mulai" id="waktu_mulai" class="form-control" required value="<?php echo $waktu_mulai ?>">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="waktu_berakhir" class="col-sm-2 col-form-label">Waktu Berakhir</label>
                        <div class="col-sm-10">
                            <input type="date" name="waktu_berakhir" id="waktu_berakhir" class="form-control" required value="<?php echo $waktu_berakhir ?>">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mou_poltesa" class="col-sm-2 col-form-label">MoU Poltesa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mou_poltesa" name="mou_poltesa" placeholder="Masukkan MoU Poltesa" required value="<?php echo $mou_poltesa ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mou_mitra" class="col-sm-2 col-form-label">MoU Mitra</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mou_mitra" name="mou_mitra" placeholder="Masukkan MoU Mitra" required value="<?php echo $mou_mitra ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <select class="form-control form-select" name="lokasi" id="lokasi" required>
                                <option selected disabled value="">Pilih Lokasi</option>
                                <option value="Dalam Negeri" <?php if ($lokasi == "Dalam Negeri") echo "selected" ?>>Dalam Negeri</option>
                                <option value="Luar Negeri" <?php if ($lokasi == "Luar Negeri") echo "selected" ?>>Luar Negeri</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control form-select" name="status" id="status" required>
                                <option selected disabled value="">Pilih status</option>
                                <option value="Aktif" <?php if ($status == "Aktif") echo "selected" ?>>Aktif</option>
                                <option value="Tidak Aktif" <?php if ($status == "Tidak Aktif") echo "selected" ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Simpan" name="simpan" id="simpan" class="btn btn-primary text-uppercase col-lg-10 col-12 offset-lg-2">
                </form>
            </div>
            <section id="record" class="py-5 my-5">
                <div class="container-fluid">
                    <h3 class="text-center text-uppercase mb-4">Kerjasama Dalam Negeri</h3>
                    <table id="dalam" class="hover stripe display cell-border">
                        <thead>
                            <tr>
                                <th>Nama Mitra</th>
                                <th>Bentuk Lembaga</th>
                                <th>Jenis Kegiatan</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Berakhir</th>
                                <th>MoU Poltesa</th>
                                <th>MoU Mitra</th>
                                <!-- <th>Lokasi</th> -->
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql            = "SELECT * FROM tb_kerjasama_dalam ORDER BY id";
                            $query          = mysqli_query($koneksi, $sql);
                            while ($q = mysqli_fetch_array($query)) {
                                $id                 = $q['id'];
                                $id                 = enkripsiUrl('encrypt', $id);
                                $mitra_kerjasama    = $q['mitra_kerjasama'];
                                $bentuk_lembaga     = $q['bentuk_lembaga'];
                                $jenis_kegiatan     = $q['jenis_kegiatan'];
                                $waktu_mulai        = $q['waktu_mulai'];
                                $waktu_berakhir     = $q['waktu_berakhir'];
                                $mou_poltesa        = $q['mou_poltesa'];
                                $mou_mitra          = $q['mou_mitra'];
                                $lokasi             = $q['lokasi'];
                                $status             = $q['status'];
                            ?>
                                <tr class="text-start text-wrap">
                                    <td scope="row"><?php echo $mitra_kerjasama ?></td>
                                    <td scope="row"><?php echo $bentuk_lembaga ?></td>
                                    <td scope="row"><?php echo $jenis_kegiatan ?></td>
                                    <td scope="row"><?php echo date('d F Y', strtotime($waktu_mulai)) ?></td>
                                    <td scope="row"><?php echo date('d F Y', strtotime($waktu_berakhir)) ?></td>
                                    <td scope="row"><?php echo $mou_poltesa ?></td>
                                    <td scope="row"><?php echo $mou_mitra ?></td>
                                    <!-- <td scope="row"><?php echo $lokasi ?></td> -->
                                    <td scope="row" class="text-center"><?php echo $status ?></td>
                                    <td class="text-center">
                                        <a href="kerjasama?op=edit-internal&id=<?php echo $id ?>">
                                            <button type="button" name="edit-internal" class="col-12 btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <a href="kerjasama?op=hapus-internal&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete data?')">
                                            <button type="button" name="hapus-internal" class="col-12 btn btn-sm btn-danger">Delete</button>
                                        </a>
                                        <!-- <a href="kerjasama?op=detail-internal&id=<?php echo $id ?>">
                                            <button type="button" name="detail-internal" class="col-12 btn btn-sm btn-info">Detail</button>
                                        </a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <section id="record" class="py-5 my-5">
                <div class="container-fluid">
                    <h3 class="text-center text-uppercase mb-4">Kerjasama Luar Negeri</h3>
                    <table id="luar" class="hover stripe display cell-border">
                        <thead>
                            <tr>
                                <th>Nama Mitra</th>
                                <th>Bentuk Lembaga</th>
                                <th>Jenis Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>MoU Poltesa</th>
                                <th>MoU Mitra</th>
                                <!-- <th>Lokasi</th> -->
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql   = "SELECT * FROM tb_kerjasama_luar ORDER BY id";
                            $query    = mysqli_query($koneksi, $sql);
                            while ($q = mysqli_fetch_array($query)) {
                                $id                 = $q['id'];
                                $id                 = enkripsiUrl('encrypt', $id);
                                $mitra_kerjasama    = $q['mitra_kerjasama'];
                                $bentuk_lembaga     = $q['bentuk_lembaga'];
                                $jenis_kegiatan     = $q['jenis_kegiatan'];
                                $waktu_mulai        = $q['waktu_mulai'];
                                $waktu_berakhir     = $q['waktu_berakhir'];
                                $mou_poltesa        = $q['mou_poltesa'];
                                $mou_mitra          = $q['mou_mitra'];
                                $lokasi             = $q['lokasi'];
                                $status             = $q['status'];
                            ?>
                                <tr class="text-start text-wrap">
                                    <td scope="row"><?php echo $mitra_kerjasama ?></td>
                                    <td scope="row"><?php echo $bentuk_lembaga ?></td>
                                    <td scope="row"><?php echo $jenis_kegiatan ?></td>
                                    <td scope="row"><?php echo date('d F Y', strtotime($waktu_mulai)) ?></td>
                                    <td scope="row"><?php echo date('d F Y', strtotime($waktu_berakhir)) ?></td>
                                    <td scope="row"><?php echo $mou_poltesa ?></td>
                                    <td scope="row"><?php echo $mou_mitra ?></td>
                                    <!-- <td scope="row"><?php echo $lokasi ?></td> -->
                                    <td scope="row" class="text-center"><?php echo $status ?></td>
                                    <td class="text-center">
                                        <a href="kerjasama?op=edit-external&id=<?php echo $id ?>">
                                            <button type="button" name="edit-external" class="col-12 btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <a href="kerjasama?op=hapus-external&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete data?')">
                                            <button type="button" name="hapus-external" class="col-12 btn btn-sm btn-danger">Delete</button>
                                        </a>
                                        <!-- <a href="kerjasama?op=detail-external&id=<?php echo $id ?>">
                                            <button type="button" name="detail-external" class="col-12 btn btn-sm btn-info">Detail</button>
                                        </a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script src="../admin/assets/js/line-chart.js"></script>
<script src="../admin/assets/js/pie-chart.js"></script>
<script src="../admin/assets/js/plugins.js"></script>
<script src="../admin/assets/js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dalam').DataTable({
            ordering: false,
        });
    });

    $(document).ready(function() {
        $('#luar').DataTable({
            ordering: false,
        });
    });
</script>

</html>