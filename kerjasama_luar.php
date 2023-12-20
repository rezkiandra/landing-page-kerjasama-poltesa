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

// if ($op == 'detail-internal' && isset($_GET['id']) && !empty($_GET['id'])) {
//     $id                 = $_GET['id'];
//     $id                 = enkripsiUrl('decrypt', $id);
//     $sql1               = "SELECT * FROM tb_kerjasama_luar WHERE id = '$id'";
//     $q1                 = mysqli_query($koneksi, $sql1);
//     $r1                 = mysqli_fetch_array($q1);
//     $mitra_kerjasama    = $r1['mitra_kerjasama'];
//     $bentuk_lembaga     = $r1['bentuk_lembaga'];
//     $jenis_kegiatan     = $r1['jenis_kegiatan'];
//     $waktu_mulai        = $r1['waktu_mulai'];
//     $waktu_berakhir     = $r1['waktu_berakhir'];
//     $mou_poltesa        = $r1['mou_poltesa'];
//     $mou_mitra          = $r1['mou_mitra'];
//     $lokasi             = $r1['lokasi'];
//     $status             = $r1['status'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjasama Luar Negeri - Kerjasama</title>

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        #external {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="pt-3">
        <?php include_once "./layout/header.php"
        ?>
    </section>


    <section class="py-5 mb-4">
        <div class="container-fluid">
            <h3 class="text-center text-uppercase mb-4">Kerjasama Luar Negeri</h3>
            <table id="external" class="hover stripe display cell-border">
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
                    $sql   = "SELECT * FROM tb_kerjasama_luar ORDER BY id";
                    $query    = mysqli_query($koneksi, $sql);
                    while ($q = mysqli_fetch_array($query)) {
                        // $id                 = $q['id'];
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
                            <td scope="row"><?php echo $status ?></td>
                            <!-- <td class="text-center">
                                <a href="kerjasama_luar?op=detail-internal&id=<?php echo $id ?>">
                                    <button type="button" data-id=<?php echo $id ?> class="detail-mitra btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Detail
                                    </button>
                                </a>
                            </td> -->
                        </tr>
                    <?php
                    }
                    ?>

                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Mitra" disabled>
                                        <label for="floatingInput"><?php echo $mitra_kerjasama ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Bentuk Lembaga" disabled>
                                        <label for="floatingInput"><?php echo $bentuk_lembaga ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Kegiatan" disabled>
                                        <label for="floatingInput"><?php echo $jenis_kegiatan ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Waktu Mulai" disabled>
                                        <label for="floatingInput"><?php echo date('d F Y', strtotime($waktu_berakhir)) ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Waktu Berakhir" disabled>
                                        <label for="floatingInput"><?php echo date('d F Y', strtotime($waktu_berakhir)) ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="MoU Poltesa" disabled>
                                        <label for="floatingInput"><?php echo $mou_poltesa ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="MoU Mitra" disabled>
                                        <label for="floatingInput"><?php echo $mou_mitra ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Status" disabled>
                                        <label for="floatingInput"><?php echo $status ?></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Cetak</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </tbody>
            </table>
        </div>
    </section>

    <section class="position-static w-100 bottom-0">
        <?php include_once "./layout/footer.php"
        ?>
    </section>
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#external').DataTable({
            ordering: false,
        });
    });

    $(document).ready(function() {
        $('.detail-mitra').click(function() {
            var mitra_id = $(this).data('id');
            // alert(mitra_id)
            $.ajax({
                // url: 'kerjasama_luar',
                type: 'post',
                data: '{mitra_id: mitra_id}',
                success: function(response) {
                    // $('.modal-content').html(response);
                    // $('#exampleModal').modal('show');
                }
            })
        })
    })
</script>

</html>