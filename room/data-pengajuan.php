<?php
session_start();
error_reporting(0);
include 'layout/head.php';
include '../connect/database.php';

$role = isset($_SESSION['rl_user']) ? $_SESSION['rl_user'] : '';
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> E-Arsip <small>Data Pengajuan</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Pengajuan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm" id="data1">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">No.</th>
                                        <th>Nama Pengirim</th>
                                        <th>Nama File</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $Pilih = "SELECT pesan.*, file.nm_file
                                                FROM pesan
                                                LEFT JOIN file ON pesan.file_id = file.id_file
                                                WHERE penerima = '$role' AND status = 0
                                                ORDER BY tgl ASC";
                                    $Query = mysqli_query($conn, $Pilih);
                                    if (mysqli_num_rows($Query) > 0) {
                                        while ($data = mysqli_fetch_object($Query)) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $data->pengirim; ?></td>
                                                <td><?= $data->nm_file; ?></td>
                                                <td><?= $data->pesan; ?></td>
                                                <td><?= tgl_indo($data->tgl); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-xs btn-outline-success" id="btnTerima" data-toggle="modal" data-target="#md_ubahstatus" data-file_id="<?= $data->file_id; ?>" data-p_id="<?= $data->id_pengirim; ?>" data-id="<?= $data->id; ?>" data-btn="terima">
                                                        <i class="fas fa-check"></i> Terima</a>
                                                    <a class="btn btn-outline-danger btn-xs" href="#" id="btnTolak" data-toggle="modal" data-target="#md_ubahstatus" data-id="<?= $data->id; ?>" data-btn="tolak"> <i class="fas fa-times"></i> Tolak</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Data kosong</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'layout/foot.php';
include 'modals/md_ubahstatus.php';
include 'modals/md_del_data.php';
include 'modals/md_logout.php';

// Display messages
if (@$_SESSION['pesan_user_ada']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_user_ada']; ?>')
    </script>
<?php unset($_SESSION['pesan_user_ada']);
}
if (@$_SESSION['pesan_user_suksestambah']) { ?>
    <script>
        toastr.success('<?php echo $_SESSION['pesan_user_suksestambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_user_suksestambah']);
}

if (@$_SESSION['pesan_user_gagaltambah']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_user_gagaltambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_user_gagaltambah']);
}
if (@$_SESSION['pesan_user_gagalhapus']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_user_gagalhapus']; ?>')
    </script>
<?php unset($_SESSION['pesan_user_gagalhapus']);
}
if (@$_SESSION['pesan_user_sukseshapus']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_user_sukseshapus']; ?>')
    </script>
<?php unset($_SESSION['pesan_user_sukseshapus']);
}
?>

<script>
    $(document).on("click", "#btnTerima", function() {
        let id = $(this).data('id');
        let file_id = $(this).data('file_id');
        let p_id = $(this).data('p_id');
        let btn = $(this).data('btn');

        $("#md_ubahstatus #id").val(id);
        $("#md_ubahstatus #file_id").val(file_id);
        $("#md_ubahstatus #p_id").val(p_id);
        $("#md_ubahstatus #btn").val(btn);

    })
    $(document).on("click", "#btnTolak", function() {
        let id = $(this).data('id');
        let btn = $(this).data('btn');

        $("#md_ubahstatus #id").val(id);
        $("#md_ubahstatus #btn").val(btn);

        $("#md_ubahstatus #exampleModalLabel").text("Yakin Untuk di Tolak?");
    })
</script>