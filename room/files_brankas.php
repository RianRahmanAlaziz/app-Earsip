<?php
session_start();
error_reporting(0);
include 'layout/head.php';
include '../connect/database.php';

$role = isset($_SESSION['rl_user']) ? $_SESSION['rl_user'] : '';
$user_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';

$cek = mysqli_query($conn, "SELECT * FROM brankas");

$brankas_id = $_GET['brankas'];
$query = mysqli_query($conn, "SELECT bg_brankas FROM brankas WHERE id_brankas='$brankas_id'");
$brankas = mysqli_fetch_assoc($query);
$nama_brankas = $brankas['bg_brankas'];

$no = 1;
$lemari = $_GET['brankas'];
$Pilih = "SELECT * FROM file WHERE id_brankas='$lemari' ORDER BY tg_upload ASC";
$Query = mysqli_query($conn, $Pilih);

$a = mysqli_query($conn, "SELECT * FROM brankas WHERE id_brankas='" . $_GET['brankas'] . "' ");
$i = mysqli_fetch_object($a);


$c = mysqli_query($conn, "SELECT * FROM brankas WHERE id_brankas='" . $_GET['brankas'] . "' ");
$z = mysqli_fetch_object($c);


if ($cek->num_rows == '') {
  $_SESSION['pesan_brankas_kosong'] = 'Tambahkan Brankas Dulu...!!!';
  echo "<script>window.history.go(-1);</script>";
} else {


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

  function fsize($file)
  {
    $a = array("b", "kb", "mb", "gb", "tb", "pb");
    $pos = 0;
    $size = filesize($file);
    while ($size >= 1024) {
      $size /= 1024;
      $pos++;
    }
    return round($size, 2) . " " . $a[$pos];
  }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> E-Arsip
              <small>
                Brankas
                <?php
                $box = mysqli_query($conn, "SELECT * FROM brankas WHERE id_brankas='" . $_GET['brankas'] . "' ");
                $nama = mysqli_fetch_object($box);
                echo $nama->jd_brankas;
                ?>
              </small>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">File</li>
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
              <div class="card-header">
                <h3 class="card-title">
                  <div class="btn-group btn-sm">
                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-success btn-sm mt-1 dropdown-toggle" data-toggle="dropdown"><small>Kolom</small></button>
                    <div class="dropdown-menu">
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="0">No</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="1">Nama File</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="2">Format</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="3">Tgl. Upload</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="4">Visibilitas</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="5">Size</a>
                      <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="6">Aksi</a>
                    </div>
                  </div>
                  <?php
                  if ($role == $z->bg_brankas || $role == 'Admin') {
                  ?>
                    <button type="button" class="btn btn-outline-info btn-sm mt-1" id="td_tfile" data-toggle="modal" data-target="#md_tfile" title="Klik untuk tambah file">
                      <i class="fas fa-plus"></i>
                      <small>Tambah File</small>
                    </button>
                  <?php
                  }
                  ?>
              </div>
              <div class="table-responsive">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm" id="data1">
                    <thead>
                      <tr class="bg-light">
                        <th class="text-center">No.</th>
                        <th>Nama File</th>
                        <th>Tgl. Dokumen</th>
                        <th>Tgl. Expired</th>
                        <th>Format</th>
                        <th>Tgl. Upload</th>
                        <th>Vis.</th>
                        <th>Size</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($data = mysqli_fetch_object($Query)) {
                        $allowDownload = ($role == $i->bg_brankas || $role == 'Admin' || $data->iakses == $user_id);
                      ?>
                        <tr>
                          <td align="center" width="5%"><?= $no++; ?></td>
                          <td><?= $data->nm_file; ?></td>
                          <td><?= tgl_indo($data->produksi); ?></td>
                          <td><?= tgl_indo($data->expired); ?></td>
                          <td>
                            <?php
                            $ekstensi = $data->file;
                            $info = pathinfo($ekstensi);
                            echo $info['extension'];

                            $bentuk1 = $info['extension'];
                            $format1 = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip');

                            if (in_array($bentuk1, $format1)) {
                            ?>
                              &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-file text-danger"></i>
                            <?php }

                            $bentuk2 = $info['extension'];
                            $format2 = array('jpg', 'jpeg', 'bmp', 'png');

                            if (in_array($bentuk2, $format2)) {
                            ?>
                              &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-image text-success"></i>
                            <?php }

                            $bentuk3 = $info['extension'];
                            $format3 = array('mp4', 'mp3', 'mpeg-1', 'mpeg-2', 'mpeg-4', 'avi', 'wmv');

                            if (in_array($bentuk3, $format3)) {
                            ?>
                              &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-video text-info"></i>
                              <?php } ?>&nbsp;&nbsp;

                              <a href="#" id="td_eberkas" href="#" data-toggle="modal" data-target="#md_eberkas" data-id_br="<?= $data->id_file; ?>" data-fl_br="<?= $data->file; ?>">
                                <small><i class="fas fa-pencil-alt text-dark"></i></small>
                              </a>
                          </td>
                          <td><?= tgl_indo($data->tg_upload); ?></td>
                          <td>
                            <?php
                            $view = $data->visibilitas;
                            if ($view == 'Publik') {
                            ?>
                              <i class="fas fa-eye text-success">&nbsp;<small><?= $data->visibilitas; ?></small></i>
                            <?php } else { ?>
                              <i class="fas fa-eye-slash text-warning">&nbsp;<small><?= $data->visibilitas; ?></small></i>
                            <?php } ?>
                          </td>
                          <td>
                            <?php
                            if (!empty($data->file)) {
                              $file = "../dist/img/upload/" . $data->file;
                              echo fsize($file);
                            } else {
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            if ($role == $i->bg_brankas || $role == 'Admin') {
                            ?>
                              <a href="#" class="btn btn-xs btn-outline-danger" onClick="konfirmasi('del_data.php?idfl=<?= $data->id_file; ?>');"><i class="fas fa-trash-alt"></i>
                              </a>
                              <a title="Ubah" class="btn btn-outline-success btn-xs" id="td_efile" href="#" data-toggle="modal" data-target="#md_efile" data-id="<?= $data->id_file; ?>" data-br="<?= $data->id_brankas; ?>" data-nm="<?= $data->nm_file; ?>" data-tg="<?= $data->tg_upload; ?>" data-vs="<?= $data->visibilitas; ?>" data-pr="<?= $data->produksi; ?>" data-ex="<?= $data->expired; ?>">
                                <i class="fas fa-pencil-alt"></i></a>
                            <?php
                            }
                            ?>
                            <a href="../dist/img/upload/<?= $data->file; ?>" class="btn btn-xs <?= !$allowDownload ? 'disabled ' : ''; ?> btn-outline-dark" target="_blank" download="<?= $data->nm_file; ?>"><i class="fas fa-download"></i></a>
                            <a href="../dist/img/upload/<?= $data->file; ?>" class="btn btn-xs <?= !$allowDownload ? 'disabled ' : ''; ?> btn-outline-primary showfile" target="_blank"><i class="fas fa-eye"></i></a>

                            <?php
                            if (!$allowDownload) {
                            ?>
                              <a href="#" id="pesan" name="pesan" data-toggle="modal" data-target="#md_tpesan" data-id_bo="<?= $data->id_file; ?>" class="btn btn-xs btn-outline-warning"><i class="fas fa-exchange-alt"></i> Ajukan Pinjam</a>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
              <div class="card-footer"></div>
              <!-- /.card-footer-->
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
  include 'modals/md_pesan.php';
  include 'modals/md_logout.php';
  include 'modals/md_tfile.php';
  include 'modals/md_efile.php';
  include 'modals/md_eberkas.php';
  include 'modals/md_del_data.php';

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

  if (@$_SESSION['pesan_file_sukseshapus']) { ?>
    <script>
      toastr.warning('<?php echo $_SESSION['pesan_file_sukseshapus']; ?>')
    </script>
  <?php unset($_SESSION['pesan_file_sukseshapus']);
  }
  ?>
<?php } ?>

<script>
  console.log(<?= json_encode($user_id); ?>);
</script>