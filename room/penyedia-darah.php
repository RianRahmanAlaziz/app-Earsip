<?php
session_start();
error_reporting(0);
$role = isset($_SESSION['rl_user']) ? $_SESSION['rl_user'] : '';
include 'layout/head.php';
include '../connect/database.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> E-Arsip <small>Brankas Bidang Penyediaan Darah</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!--<li class="breadcrumb-item"><a href="#">Home</a></li>!-->
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active">Bidang Penyediaan Darah</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <button type="button" class="btn btn-outline-info btn-sm mt-1" id="td_tbrankas" data-toggle="modal" data-target="#md_tbrankas" title="Klik untuk tambah brankas">
                <i class="fas fa-plus"></i>
                <small>Tambah Brankas</small>
            </button>
            <hr>
            <!-- bagian keuangan -->
            <hr>
            <div class="row">
                <?php
                $box = mysqli_query($conn, "SELECT * FROM brankas WHERE bg_brankas = 'Penyediaan-darah'");
                while ($data = mysqli_fetch_object($box)) {
                ?>
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-header bg-<?= $data->warna; ?>">
                                <h5 class="card-title m-0"><b><?= $data->jd_brankas; ?></b></h5>
                                <?php
                                $brankas1 = $data->id_brankas;
                                $File = mysqli_query($conn, "SELECT COUNT(id_file) AS jumlah FROM file WHERE id_brankas='$brankas1'");
                                $out = mysqli_fetch_object($File);
                                ?>
                                <span class="badge badge-dark navbar-badge"><?= $out->jumlah; ?> File</span>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"><?= $data->kt_brankas; ?></h6>

                                <p class="card-text"><small><?= $data->ds_brankas; ?></small></p>
                                <?php
                                $brankas2 = $data->id_brankas;
                                $CekKosong = mysqli_query($conn, "SELECT id_brankas AS kosong FROM file WHERE id_brankas='$brankas2'");
                                $cek = mysqli_fetch_object($CekKosong);
                                if (!empty($cek->kosong)) {
                                ?>
                                    <a href="#" class="btn btn-xs btn-outline-secondary disabled">Hapus</i>
                                    </a>
                                <?php } else { ?>
                                    <?php
                                    if ($role == 'Penyediaan-darah') {
                                    ?>
                                        <a href="#" class="btn btn-xs btn-outline-danger" onClick="konfirmasi('del_data.php?idbr=<?= $data->id_brankas; ?>');">Hapus</i>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                <?php } ?>
                                <a href="files_brankas.php?brankas=<?= $data->id_brankas; ?>" class="btn btn-xs btn-outline-success">Buka Brankas</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'layout/foot.php';
include 'modals/md_tbrankas.php';
include 'modals/md_del_data.php';
include 'modals/md_logout.php';

if (@$_SESSION['pesan_brankas_ada']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_brankas_ada']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_ada']);
}

if (@$_SESSION['pesan_brankas_suksestambah']) { ?>
    <script>
        toastr.success('<?php echo $_SESSION['pesan_brankas_suksestambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_suksestambah']);
}

if (@$_SESSION['pesan_brankas_gagaltambah']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_brankas_gagaltambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_gagaltambah']);
}

if (@$_SESSION['pesan_brankas_sukseshapus']) { ?>
    <script>
        toastr.success('<?php echo $_SESSION['pesan_brankas_sukseshapus']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_sukseshapus']);
}

if (@$_SESSION['pesan_brankas_gagalhapus']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_brankas_gagalhapus']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_gagalhapus']);
}

if (@$_SESSION['pesan_brankas_kosong']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_brankas_kosong']; ?>')
    </script>
<?php unset($_SESSION['pesan_brankas_kosong']);
}

if (@$_SESSION['pesan_file_ada']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_file_ada']; ?>')
    </script>
<?php unset($_SESSION['pesan_file_ada']);
}

if (@$_SESSION['pesan_file_suksestambah']) { ?>
    <script>
        toastr.success('<?php echo $_SESSION['pesan_file_suksestambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_file_suksestambah']);
}

if (@$_SESSION['pesan_file_gagaltambah']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_file_gagaltambah']; ?>')
    </script>
<?php unset($_SESSION['pesan_file_gagaltambah']);
}

if (@$_SESSION['pesan_file_suksesedit']) { ?>
    <script>
        toastr.success('<?php echo $_SESSION['pesan_file_suksesedit']; ?>')
    </script>
<?php unset($_SESSION['pesan_file_suksesedit']);
}

if (@$_SESSION['pesan_file_gagaledit']) { ?>
    <script>
        toastr.error('<?php echo $_SESSION['pesan_file_gagaledit']; ?>')
    </script>
<?php unset($_SESSION['pesan_file_gagaledit']);
}

?>