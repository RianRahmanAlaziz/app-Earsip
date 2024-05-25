<?php
session_start();
error_reporting(0);
include '../connect/database.php';
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

  <title>E-Arsip || Admin</title>

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

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="#" class="navbar-brand">
          <span class="brand-text font-weight-light text-primary"><b>E-Arsip</b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Brankas</a>
            </li>
            <li class="nav-item">
              <a href="data_user.php" class="nav-link">Data User</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">File</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="files.php" class="dropdown-item">Semua File</a></li>
                <li><a href="files_publik.php" class="dropdown-item">Publik</a></li>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Notifications Dropdown Menu -->
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
      </div>
    </nav>
    <!-- /.navbar -->