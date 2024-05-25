<?php
session_start();
error_reporting(0);
include 'connect/database.php';

function tgl_indo($tanggal){
  $bulan = array (
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
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function fsize($file){
$a = array("b", "kb", "mb", "gb", "tb", "pb");
$pos = 0;
$size = filesize($file);
while ($size >= 1024)
{
$size /= 1024;
$pos++;
}
return round ($size,2)." ".$a[$pos];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-Arsip || Admin</title>

  <link rel="icon" type="image/png" sizes="16x16" href="dist/img/logo_ea.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!--Animated-->
  <link rel="stylesheet" type="text/css" href="plugins/animate/animate.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" onclick="window.history.go(-1);" class="navbar-brand">
        <span class="brand-text font-weight-light text-primary"><i class="fas fa-arrow-left"></i></span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
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
                <h3 class="card-title">Arsip File</h3>
              </div>
              <div class="table-responsive">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm" id="data1">
                    <thead>
                      <tr class="bg-light">
                        <th class="text-center">No.</th>
                        <th>Nama File</th>
                        <th>Format</th>
                        <th>Size</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $Pilih="SELECT * FROM file WHERE visibilitas='Publik' ORDER BY tg_upload ASC";
                      $Query=mysqli_query($conn, $Pilih);
                      while($data=mysqli_fetch_object($Query)){ ?>
                      <tr>
                        <td align="center" width="5%"><?= strip_tags($no++); ?></td>
                        <td><?= strip_tags($data->nm_file); ?></td>
                        <td>
                            <?php
                            $ekstensi = strip_tags($data->file);
                            $info = pathinfo($ekstensi);
                            echo $info['extension'];

                            $bentuk1=$info['extension'];
                            $format1=array('pdf','doc','docx','xls','xlsx','ppt','pptx','rar','zip');

                            if (in_array($bentuk1, $format1)) {
                            ?>
                            &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-file text-danger"></i> 
                            <?php }

                            $bentuk2=$info['extension'];
                            $format2=array('jpg','jpeg','bmp','png');

                            if (in_array($bentuk2, $format2)) {
                            ?>
                            &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-image text-success"></i>
                            <?php }

                            $bentuk3=$info['extension'];
                            $format3=array('mp4','mp3','mpeg-1','mpeg-2','mpeg-4','avi','wmv');

                            if (in_array($bentuk3, $format3)) {
                            ?>
                            &nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;<i class="fas fa-video text-info"></i>  
                            <?php } ?>
                        </td>
                        <td>
                          <?php
                            if (!empty(strip_tags($data->file))){
                            $file = "dist/img/upload/".strip_tags($data->file);                            
                            echo fsize($file);
                            }else{
                                
                            }
                          ?>
                        </td>
                        <td>
                          <a href="dist/img/upload/<?= strip_tags($data->file); ?>" class="btn btn-xs btn-outline-dark" target="_blank">Download</a>
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
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      E-Arsip V 1.0
    </div>
    <!-- Default to the left -->
    <strong>Developed &copy; 2023 <a href="https://www.youtube.com/channel/UCJ7M12OVk8RbOQQrmLXeriQ">Kang Mahmud</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <!-- SweetAlert -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/sweetalert/js/qunit-1.18.0.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(document).ready(function() {
      var table = $('#data1').DataTable( {
          "scrollY": "400px",
          "paging": true,
          "ordering": true
      } );
   
      $('a.toggle-vis').on( 'click', function (e) {
          e.preventDefault();
          var column = table.column( $(this).attr('data-column') );
          column.visible( ! column.visible() );
      } );
  } );
  
  function konfirmasi(delete_url)
  {
  $('#modal_delete').modal('show', {backdrop: 'static'});
  document.getElementById('delete_link').setAttribute('href' , delete_url);
  }

  function logout_modal(logout_url)
  {
  $('#modal_logout').modal('show', {backdrop: 'static'});
  document.getElementById('logout_link').setAttribute('href' , logout_url);
  }
</script>
</body>
</html>

