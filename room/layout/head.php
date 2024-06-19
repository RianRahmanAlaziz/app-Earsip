<?php
session_start();
error_reporting(0);
include '../connect/database.php';
$current_file = basename($_SERVER['PHP_SELF']);
$role = isset($_SESSION['rl_user']) ? $_SESSION['rl_user'] : '';


$query_count = "SELECT COUNT(*) AS count_unread 
                FROM pesan 
                WHERE status = 0 AND penerima = '$role'";
$result_count = mysqli_query($conn, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$jumlah_pesan = $row_count['count_unread'];

if ($_SESSION['start_login'] != true) {
  $_SESSION['pesan_login_gagal'] = 'Maaf Anda Harus Login Dulu..';
  echo "<script>window.location='../index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-Arsip || Dashboard</title>

  <link rel="icon" type="image/png" sizes="16x16" href="../dist/img/logo_ea.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!--Animated-->
  <link rel="stylesheet" type="text/css" href="../plugins/animate/animate.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition  sidebar-mini layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link  <?php echo ($current_file == 'index.php') ? 'active' : ''; ?>">E-Arsip</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <?php if ($jumlah_pesan > 0) : ?>
              <span class="badge badge-danger navbar-badge"><?= $jumlah_pesan ?></span>
            <?php endif; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php
            $query = "SELECT * 
            FROM pesan 
            WHERE status = 0 AND penerima = '$role'
            ORDER BY tgl DESC
            LIMIT 5";
            $pesan = mysqli_query($conn, $query);
            if (mysqli_num_rows($pesan) > 0) {
              while ($row = mysqli_fetch_assoc($pesan)) {
                $id = $row['id'];
                $pengirim = $row['pengirim'];
                $isi_pesan = $row['pesan'];
                $tanggal = $row['tgl'];
            ?>
                <a href="data-pengajuan.php" class="dropdown-item">
                  <div class="media">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        <?= $pengirim ?>
                        <span class="float-right text-sm"><i class="far fa-clock mr-1"></i> <?= $tanggal ?></span>
                      </h3>
                      <p class="text-sm"><?= $isi_pesan ?></p>
                    </div>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
            <?php
              }
            } else {
              echo '<a href="#" class="dropdown-item">Tidak ada pesan</a>';
            }
            ?>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <?php
            $aktif = mysqli_query($conn, "SELECT * FROM user WHERE id_user='" . $_SESSION['id_user'] . "'");
            $iddata = mysqli_fetch_object($aktif);
            ?>
            <a href="#" class="dropdown-item" id="td_euser" href="#" data-toggle="modal" data-target="#md_euser" data-id="<?= $iddata->id_user; ?>" data-em="<?= $iddata->em_user; ?>">
              <i class="fas fa-user mr-2"></i> Profil
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" onClick="logout_modal('logout.php')">
              <i class="fas fa-cog mr-2"></i> Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link elevation-4">
        <img src="../dist/img/logo.jpeg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Arsip</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link  <?php echo ($current_file == 'index.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-header">Daftar Berkas</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Brankas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="umum.php" class="nav-link  <?php echo ($current_file == 'umum.php') ? 'active' : ''; ?>">
                    <p>Bagian Umum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="keuangan.php" class="nav-link  <?php echo ($current_file == 'keuangan.php') ? 'active' : ''; ?>">
                    <p>Bagian Keuangan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="penyedia-darah.php" class="nav-link  <?php echo ($current_file == 'penyedia-darah.php') ? 'active' : ''; ?>">
                    <p>Bagian Penyediaan Darah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="uji-mutu.php" class="nav-link  <?php echo ($current_file == 'uji-mutu.php') ? 'active' : ''; ?>">
                    <p>Bagian Uji Mutu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pelayanan-darah.php" class="nav-link  <?php echo ($current_file == 'pelayanan-darah.php') ? 'active' : ''; ?>">
                    <p>Bagian Pelayanan Darah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pemastian-mutu.php" class="nav-link  <?php echo ($current_file == 'pemastian-mutu.php') ? 'active' : ''; ?>">
                    <p>Bagian Pemastian Mutu</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="data-pengajuan.php" class="nav-link  <?php echo ($current_file == 'data-pengajuan.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Pengajuan
                </p>
              </a>
            </li>
            <?php
            if ($role == 'Admin') {
            ?>
              <li class="nav-item">
                <a href="data_user.php" class="nav-link  <?php echo ($current_file == 'data_user.php') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>
                    Data User
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>