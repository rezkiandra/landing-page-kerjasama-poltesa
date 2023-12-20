<?php
include_once "./bin/koneksi.php";
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

if ($op == 'detail-internal' && isset($_GET['id']) && !empty($_GET['id'])) {
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
    $lokasi             = $r1['lokasi'];
    $status             = $r1['status'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjasama Dalam Negeri - Kerjasama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: content-box;
            font-family: 'Poppins', sans-serif;
        }

        #internal {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="pt-3">
        <?php include "./layout/header.php" ?>
    </section>

    <section id="record" class="py-5 mb-4">
        <div class="container-fluid">
            <h3 class="text-center text-uppercase mb-4">Kerjasama Dalam Negeri</h3>
            <table id="internal" class="hover stripe display cell-border">
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
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql   = "SELECT * FROM tb_kerjasama_dalam ORDER BY id";
                    $query    = mysqli_query($koneksi, $sql);
                    while ($q = mysqli_fetch_array($query)) {
                        $id                 = $q['id'];
                        $id                 = enkripsiUrl('encrypt', $q['id']);
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
                            <td scope="row" class="text-center" style="font-size: 14px;"><?php echo $status ?></td>
                            <!-- <td class="text-center">
                                <a href="kerjasama_dalam?op=detail-internal&id=<?php echo $id ?>">
                                    <button type="button" name="detail-internal" class="col-12 btn btn-warning" style="font-size: 14px;">Detail</button>
                                </a>
                            </td> -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="position-static w-100 bottom-0">
        <?php include "./layout/footer.php" ?>
    </section>
</body>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#internal').DataTable({
            ordering: false,
        });
    });
</script>

</html>