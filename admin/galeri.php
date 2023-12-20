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

$judul_video    = "";
$deskripsi      = "";
$link           = "";

$judul_foto     = "";
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

if ($op == 'hapus-video' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id         = $_GET['id'];
    $id         = enkripsiUrl('decrypt', $id);
    $sql1       = "DELETE FROM tb_video WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data video";
    } else {
        $failed  = "Gagal menghapus data video";
    }
}

if ($op == 'edit-video' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id             = $_GET['id'];
    $id             = enkripsiUrl('decrypt', $id);
    $sql1           = "SELECT * FROM tb_video WHERE id = '$id'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $judul_video    = $r1['judul_video'];
    $deskripsi      = $r1['deskripsi'];
    $link           = $r1['link'];
}

if (isset($_POST['simpan-video'])) { //untuk create data
    $judul_video          = $_POST['judul-video'];
    $deskripsi            = $_POST['deskripsi'];
    $link                 = $_POST['link'];

    if ($judul_video && $deskripsi && $link) {
        if ($op == 'edit-video' && isset($_GET['id']) && !empty($_GET['id'])) { //untuk update
            $sql1       = "UPDATE tb_video SET judul_video = '$judul_video', deskripsi = '$deskripsi', link = '$link' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success = "Data video berhasil diupdate";
            } else {
                $failed  = "Data video gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO tb_video(judul_video, deskripsi, link) values ('$judul_video','$deskripsi', '$link')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success     = "Berhasil memasukkan data video baru";
            } else {
                $failed      = "Gagal memasukkan data video baru";
            }
        }
    }
}

if ($op == 'hapus-foto' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id          = $_GET['id'];
    $id          = enkripsiUrl('decrypt', $id);
    $sql1        = "DELETE FROM tb_foto WHERE id = '$id'";
    $q1          = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data foto";
    } else {
        $failed  = "Gagal menghapus data foto";
    }
}

if ($op == 'edit-foto' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id             = $_GET['id'];
    $id             = enkripsiUrl('decrypt', $id);
    $sql1           = "SELECT * FROM tb_foto WHERE id = '$id'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $judul_foto     = $r1['judul_foto'];
    $lokasi         = $r1['lokasi'];
    $tanggal        = $r1['tanggal'];
    $gambar         = $r1['gambar'];
}

if (isset($_POST['simpan-foto'])) { //untuk create data
    $judul_foto          = $_POST['judul_foto'];
    $lokasi              = $_POST['lokasi'];
    $tanggal             = $_POST['tanggal'];

    $gambar              = $_FILES["gambar"]["name"];
    $tmp_name            = $_FILES["gambar"]["tmp_name"];
    $path                = "../../kerjasama/admin/assets/upload/galeri/";
    move_uploaded_file($tmp_name, $path . $gambar);

    if ($judul_foto && $lokasi && $tanggal && $gambar) {
        if ($op == 'edit-foto' && isset($_GET['id']) && !empty($_GET['id'])) { //untuk update
            $sql1       = "UPDATE tb_foto SET judul_foto = '$judul_foto', lokasi = '$lokasi', tanggal = '$tanggal', gambar = '$gambar' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success = "Data foto berhasil diupdate";
            } else {
                $failed  = "Data foto gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO tb_foto(judul_foto, lokasi, tanggal, gambar) values ('$judul_foto','$lokasi', '$tanggal', '$gambar')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success     = "Berhasil memasukkan data foto baru";
            } else {
                $failed      = "Gagal memasukkan data foto baru";
            }
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Galeri</title>
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
                            <h4 class="page-title pull-left">Galeri</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="./">Admin</a></li>
                                <li><span>Galeri</span></li>
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
            <div class="container-fluid">
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:3; url=galeri");
                } elseif ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:3; url=galeri");
                }
                ?>
                <form method="post">
                    <div class="row mb-3">
                        <label for="judul-video" class="col-sm-2 col-form-label">Judul Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul-video" name="judul-video" placeholder="Masukkan Judul Video" required value="<?php echo $judul_video ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Video</label>
                        <div class="col-sm-10">
                            <textarea type="textarea" rows="10" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Video" required><?php echo $deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link" class="col-sm-2 col-form-label">Link Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link Video" required value="<?php echo $link ?>">
                        </div>
                    </div>
                    <input type="submit" value="Simpan Video" name="simpan-video" class="btn btn-primary text-uppercase col-lg-10 col-12 offset-lg-2">
                </form>

                <form action="" method="post" class="py-5" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_foto" name="judul_foto" placeholder="Masukkan Judul Video" required value="<?php echo $judul_foto ?>">
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
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar Dokumentasi</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar" id="gambar" class="form-control" required>
                        </div>
                    </div>
                    <input type="submit" value="Simpan Foto" name="simpan-foto" class="btn btn-danger text-uppercase col-lg-10 col-12 offset-lg-2">
                </form>
            </div>
            <section id="record" class="my-5 container-lg">
                <div class="container-fluid">
                    <h5 class="text-center mb-3">Record Video</h5>
                    <table id="video" class="hover display border cell-border stripe">
                        <thead>
                            <tr>
                                <th>Judul Video</th>
                                <th>Deskripsi Video</th>
                                <th>Link Video</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql   = "SELECT * FROM tb_video ORDER BY id";
                            $query    = mysqli_query($koneksi, $sql);
                            while ($q = mysqli_fetch_array($query)) {
                                $id             = $q['id'];
                                $id             = enkripsiUrl('encrypt', $id);
                                $judul_video    = $q['judul_video'];
                                $deskripsi      = $q['deskripsi'];
                                $link           = $q['link'];
                            ?>
                                <tr class="text-start text-wrap">
                                    <td scope="row"><?php echo $judul_video ?></td>
                                    <td scope="row"><?php echo $deskripsi ?></td>
                                    <td scope="row"><?php echo $link ?></td>
                                    <td class="text-center">
                                        <a href="galeri?op=edit-video&id=<?php echo $id ?>">
                                            <button type="button" name="edit-video" class="col-10 btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <a href="galeri?op=hapus-video&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete video?')">
                                            <button type="button" name="hapus-video" class="col-10 btn btn-sm btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <section id="record" class="my-5">
                    <div class="container-fluid">
                        <h5 class="text-center mb-3">Record Foto</h5>
                        <table id="foto" class="hover display border cell-border stripe">
                            <thead>
                                <tr>
                                    <th>Judul Foto</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal</th>
                                    <th>Dokumentasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql   = "SELECT * FROM tb_foto ORDER BY id";
                                $query    = mysqli_query($koneksi, $sql);
                                while ($q = mysqli_fetch_array($query)) {
                                    $id                 = $q['id'];
                                    $id                 = enkripsiUrl('encrypt', $id);
                                    $judul_foto         = $q['judul_foto'];
                                    $lokasi             = $q['lokasi'];
                                    $tanggal            = $q['tanggal'];
                                    $gambar             = $q['gambar'];
                                ?>
                                    <tr class="text-start text-wrap">
                                        <td scope="row"><?php echo $judul_foto ?></td>
                                        <td scope="row"><?php echo $lokasi ?></td>
                                        <td scope="row"><?php echo $tanggal ?></td>
                                        <td scope="row">
                                            <img src="../admin/assets/upload/galeri/<?php echo $gambar ?>" style="width: 100px;" class="img-fluid">
                                        </td>
                                        <td class="text-center">
                                            <a href="galeri?op=edit-foto&id=<?php echo $id ?>">
                                                <button type="button" name="edit-foto" class="col-10 btn btn-warning">Edit</button>
                                            </a>
                                            <a href="galeri?op=hapus-foto&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete data?')">
                                                <button type="button" name="hapus-foto" class="col-10 btn btn-danger">Delete</button>
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
                <div class="footer-area position-static bottom-0 w-100">
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
        $('#video').DataTable({
            ordering: false,
        });
    });

    $(document).ready(function() {
        $('#foto').DataTable({
            ordering: false,
        });
    });
</script>

</html>