<?php
session_start();
error_reporting(0);
include 'layout/head.php';
include '../connect/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
  $em_user = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['em_user'], ENT_QUOTES))));
  $ps_user = password_hash($_POST['ps_user'], PASSWORD_DEFAULT); // Hash the password
  $rl_user = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['rl_user'], ENT_QUOTES))));

  $stmt = $conn->prepare("INSERT INTO user (em_user, ps_user, rl_user) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $em_user, $ps_user, $rl_user);

  if ($stmt->execute()) {
    $_SESSION['pesan_user_suksestambah'] = 'Pengguna berhasil ditambahkan!';
  } else {
    $_SESSION['pesan_user_gagaltambah'] = 'Gagal menambahkan pengguna.';
  }

  $stmt->close();
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

$cek = mysqli_query($conn, "SELECT * FROM brankas");

if ($cek->num_rows == 0) {
  $_SESSION['pesan_brankas_kosong'] = 'Tambahkan Brankas Dulu...!!!';
  echo "<script>window.history.go(-1);</script>";
} else {
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> E-Arsip <small>Tambah Pengguna</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
                  <button type="button" class="btn btn-outline-info btn-sm mt-1" data-toggle="modal" data-target="#md_add_user">
                    <i class="fas fa-plus"></i>
                    <small>Tambah Pengguna</small>
                  </button>
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-sm" id="data1">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center">No.</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $Pilih = "SELECT * FROM user ORDER BY em_user ASC";
                    $Query = mysqli_query($conn, $Pilih);
                    while ($data = mysqli_fetch_object($Query)) { ?>
                      <tr>
                        <td align="center"><?= $no++; ?></td>
                        <td><?= $data->nm_user; ?></td>
                        <td><?= $data->em_user; ?></td>
                        <td><?= $data->rl_user; ?></td>
                        <td>
                          <a href="#" class="btn btn-xs btn-outline-danger" onClick="konfirmasi('del_data.php?iduser=<?= $data->id_user; ?>');"><i class="fas fa-trash-alt"></i></a>
                          <a title="Ubah" class="btn btn-outline-success btn-xs" id="td_edit_user" href="#" data-toggle="modal" data-target="#md_edit_user" data-id="<?= $data->id_user; ?>" data-nama="<?= $data->nm_user; ?>" data-email="<?= $data->em_user; ?>" data-role="<?= $data->rl_user; ?>"><i class="fas fa-pencil-alt"></i></a>
                        </td>
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
  include 'modals/md_add_user.php';
  include 'modals/md_edit_user.php';
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
    $(document).on("click", "#td_edit_user", function() {
      let id = $(this).data('id');
      let nama = $(this).data('nama');
      let email = $(this).data('email');
      let role = $(this).data('role');


      $("#md_edit_user #id_user").val(id);
      $("#md_edit_user #nm_user").val(nama);
      $("#md_edit_user #em_user").val(email);
      $("#md_edit_user #rl_user").val(role);

    })
  </script>

<?php } ?>