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

$judul          = "";
$deskripsi      = "";
$lokasi         = "";
$tanggal        = "";
$gambar         = "";
$success        = "";
$failed         = "";
$op             = "";

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

if ($op == 'edit' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $id         = enkripsiUrl('decrypt', $id);
    $sql1       = "SELECT * FROM tb_berita WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $judul      = $r1['judul'];
    $deskripsi  = $r1['deskripsi'];
    $lokasi     = $r1['lokasi'];
    $tanggal    = $r1['tanggal'];
    $gambar     = $r1['gambar'];
}

if ($op == 'hapus' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $id         = enkripsiUrl('decrypt', $id);
    $sql1       = "DELETE FROM tb_berita WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data berita";
    } else {
        $failed  = "Gagal menghapus data berita";
    }
}

if (isset($_POST['simpan'])) { //untuk create data
    $judul          = $_POST['judul'];
    $deskripsi      = $_POST['deskripsi'];
    $lokasi         = $_POST['lokasi'];
    $tanggal        = $_POST['tanggal'];

    $gambar         = $_FILES["gambar"]["name"];
    $tmp_name       = $_FILES["gambar"]["tmp_name"];
    $path           = "../../kerjasama/admin/assets/upload/berita/";
    move_uploaded_file($tmp_name, $path . $gambar);

    if ($judul && $deskripsi && $lokasi && $tanggal && $gambar) {
        if ($op == 'edit' && isset($_GET['id'])) { //untuk update
            $sql1       = "UPDATE tb_berita SET judul = '$judul', deskripsi = '$deskripsi', lokasi = '$lokasi', tanggal = '$tanggal', gambar = '$gambar'";
            $sql1       .= "WHERE id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success = "Data berita berhasil diupdate";
            } else {
                $failed  = "Data berita gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO tb_berita(judul, deskripsi, lokasi, tanggal, gambar) VALUES ('$judul','$deskripsi', '$lokasi', '$tanggal','$gambar')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success     = "Berhasil memasukkan data berita baru";
            } else {
                $failed      = "Gagal memasukkan data berita baru";
            }
        }
    } else {
        $failed = "Silakan masukkan semua data";
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Berita</title>
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
                            <h4 class="page-title pull-left">Berita</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="./">Admin</a></li>
                                <li><span>Berita</span></li>
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
                    header("refresh:3; url=berita");
                } elseif ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:3; url=berita");
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Berita" required value="<?php echo $judul ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Berita</label>
                        <div class="col-sm-10">
                            <textarea type="textarea" rows="10" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Berita" required><?php echo $deskripsi; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <select class="form-control form-select" name="lokasi" id="lokasi" required>
                                <option selected disabled value="">Pilih Lokasi</option>
                                <!-- <option value="Dalam Negeri" <?php if ($lokasi == "Dalam Negeri") echo "selected" ?>>Dalam Negeri</option>
                                <option value="Luar Negeri" <?php if ($lokasi == "Luar Negeri") echo "selected" ?>>Luar Negeri</option> -->
                                <option value="Kampus" <?php if ($lokasi == "Kampus") echo "selected" ?>>Kampus</option>
                                <option value="Umum" <?php if ($lokasi == "Umum") echo "selected" ?>>Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required value="<?php echo $tanggal ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <!-- <img src="../admin/assets/upload/berita/<?php echo $gambar ?>" style="width: 20%;" class="img-fluid w-0 mb-3"> -->
                            <input type="file" name="gambar" id="gambar" class="form-control" required value="<?php echo $gambar ?>">
                        </div>
                    </div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-primary text-uppercase col-lg-10 col-12 offset-lg-2">
                </form>
            </div>
            <section id="record" class="py-5 my-5">
                <div class="container-fluid">
                    <table id="myTable" class="hover display cell-border stripe">
                        <thead>
                            <tr>
                                <th>Judul Berita</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql   = "select * from tb_berita order by id";
                            $query    = mysqli_query($koneksi, $sql);
                            while ($q = mysqli_fetch_array($query)) {
                                $id         = enkripsiUrl('encrypt', $q['id']);
                                $judul      = $q['judul'];
                                $deskripsi  = $q['deskripsi'];
                                $slice      = substr($deskripsi, 0, 200);
                                $lokasi     = $q['lokasi'];
                                $tanggal    = $q['tanggal'];
                                $gambar     = $q['gambar'];
                            ?>
                                <tr class="text-start text-wrap">
                                    <td scope="row"><?php echo $judul ?></td>
                                    <td scope="row"><?php echo $slice ?></td>
                                    <td scope="row"><?php echo $lokasi ?></td>
                                    <td scope="row"><?php echo date('d F Y', strtotime($tanggal)) ?></td>
                                    <td scope="row">
                                        <img src="../admin/assets/upload/berita/<?php echo $gambar ?>" style="width: 150px;" class="img-fluid w-0">
                                    </td>
                                    <td class="text-center">
                                        <a href="berita?op=edit&id=<?php echo $id ?>">
                                            <button type="button" name="edit" class="col-lg-10 btn-sm col-10 btn btn-warning">Edit</button>
                                        </a>
                                        <a href="berita?op=hapus&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete data?')">
                                            <button type="button" name="hapus" class="col-lg-10 btn-sm col-10 btn btn-danger">Delete</button>
                                        </a>
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
<script src="../admin/assets/js/line-chart.js"></script>
<script src="../admin/assets/js/pie-chart.js"></script>
<script src="../admin/assets/js/plugins.js"></script>
<script src="../admin/assets/js/scripts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            ordering: false,
        });
    });
</script>

</html>