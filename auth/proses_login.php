<?php
session_start();
error_reporting(0);
include '../connect/database.php';

if (isset($_POST['login'])) {

	function anti_injection($data)
	{
		$filter  = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
		return $filter;
	}

	$em_user = anti_injection($_POST['em_user']);
	$ps_user = anti_injection(md5($_POST['ps_user']));

	$injeksi_em_user = mysqli_real_escape_string($conn, $em_user);
	$injeksi_ps_user = mysqli_real_escape_string($conn, $ps_user);

	$cek = mysqli_query($conn, "SELECT * FROM user WHERE 
	  (em_user = '$injeksi_em_user' OR kode = '$injeksi_em_user') AND ps_user = '$injeksi_ps_user'");

	$user = mysqli_fetch_array($cek);
	$id_user = $user['id_user'];
	$nm_user = $user['nm_user'];
	$em_user = $user['em_user'];
	$rl_user = $user['rl_user'];

	if (mysqli_num_rows($cek) > 0) {

		$_SESSION['start_login'] = true;
		$_SESSION['id_user'] = $id_user;
		$_SESSION['nm_user'] = $nm_user;
		$_SESSION['em_user'] = $em_user;
		$_SESSION['rl_user'] = $rl_user;

		$_SESSION['pesan_login_sukses'] = '<h6>Login Berhasil..</h6>';
		echo "<script>window.location='../room/index.php'</script>";
	} else {
		$_SESSION['pesan_login_gagal'] = '<h6>Username / Password salah..!</h6>';
		echo "<script>window.history.go(-1);</script>";
	}
}
