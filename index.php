<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Arsip | Log in</title>
  <link rel="icon" type="image/png" sizes="16x16" href="dist/img/logo_ea.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page" style="background: rgb(900, 600, 890);">
  <style type="text/css">
    #mybutton {
      cursor: pointer;
    }
  </style>
  <div class="login-box" style="margin-top: 0;">
    <div class="callout callout-info">
      <div class="card-header login-logo text-primary"><b>E</b>-Arsip</div>
      <div class="card-body login-card-body">
        <form action="auth/proses_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="em_user" id="em_user" required="" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope text-primary"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="ps_user" id="pass" required="" />
            <div class="input-group-append">
              <span class="input-group-text" title="Tampilkan Password" id="mybutton" onclick="change()"><i class="fas fa-eye text-primary"></i></span>
            </div>
          </div>
          <!-- 
          <div class="form-group text-center">
            <img id="captcha" src="plugins/securimage/securimage_show.php" width="50%" alt="CAPTCHA Image" />
          </div>
          <center><small>Masukan Kode di Atas</small></center>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" title="Refresh" onclick="window.history.go(0);"><img src="dist/img/signal.gif" width="20px"></span>
            </div>
            <input type="text" class="form-control text-center" name="kode" placeholder="Kode Keamanan" required="" />
            <div class="input-group-append">
              <span class="input-group-text" title="Refresh" onclick="window.history.go(0);"><img src="plugins/securimage/images/reload.gif" width="20px" alt="Refresh"></span>
            </div>
          </div> -->

          <div class="row">
            <div class="col-sm-12">
              <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <?php
  if (@$_SESSION['pesan_captcha_gagal']) { ?>
    <script>
      toastr.error('<?php echo $_SESSION['pesan_captcha_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_captcha_gagal']);
  }

  if (@$_SESSION['pesan_login_gagal']) { ?>
    <script>
      toastr.error('<?php echo $_SESSION['pesan_login_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_login_gagal']);
  }

  if (@$_SESSION['pesan_logout_sukses']) { ?>
    <script>
      toastr.error('<?php echo $_SESSION['pesan_logout_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_logout_sukses']);
  }

  if (@$_SESSION['pesan_login_wrong']) { ?>
    <script>
      toastr.error('<?php echo $_SESSION['pesan_login_wrong']; ?>')
    </script>
  <?php unset($_SESSION['pesan_login_wrong']);
  }
  unset($_SESSION['start_login']);
  ?>
  <script type="text/javascript">
    function change() {
      var x = document.getElementById('pass').type;

      if (x == 'password') {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye-slash text-success"></i>';
      } else {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye text-success"></i>';
      }
    }
  </script>
</body>

</html>