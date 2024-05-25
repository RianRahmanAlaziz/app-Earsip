<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {

    $em_user = mysqli_real_escape_string($conn, $_POST['em_user']);
    $nm_user = mysqli_real_escape_string($conn, $_POST['nm_user']);
    $ps_user = mysqli_real_escape_string($conn, md5($_POST['ps_user']));
    $rl_user = mysqli_real_escape_string($conn, $_POST['rl_user']);

    $cek = mysqli_query($conn, "SELECT em_user, nm_user FROM user WHERE em_user='$em_user' AND nm_user='$nm_user'");

    if ($cek->num_rows > 0) {
        $_SESSION['pesan_user_ada'] = 'Akun Sudah Ada...!!!';
        echo "<script>window.history.go(-1);</script>";
    } else {

        $tambah = mysqli_query($conn, "INSERT INTO user VALUES(
		'',
		'" . $nm_user . "',
		'" . $em_user . "',
		'" . $ps_user . "',
		'" . $rl_user . "'
		)");

        if ($tambah) {
            $_SESSION['pesan_user_suksestambah'] = 'Pengguna Ditambah...';
            echo "<script>window.location='data_user.php';</script>";
        } else {
            $_SESSION['pesan_user_gagaltambah'] = 'Gagal Tambah Pengguna..!!!';
            echo "<script>window.location='data_user.php';</script>";
        }
    }
}
