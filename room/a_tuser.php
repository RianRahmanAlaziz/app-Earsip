<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {

    $em_user = mysqli_real_escape_string($conn, $_POST['em_user']);
    $nm_user = mysqli_real_escape_string($conn, $_POST['nm_user']);
    $ps_user = mysqli_real_escape_string($conn, md5($_POST['ps_user']));
    $rl_user = mysqli_real_escape_string($conn, $_POST['rl_user']);

    if ($rl_user == 'Keuangan') {
        $prefix = 'K';
    } elseif ($rl_user == 'Umum') {
        $prefix = 'U';
    } elseif ($rl_user == 'Penyediaan-darah') {
        $prefix = 'P';
    } elseif ($rl_user == 'Uji-mutu') {
        $prefix = 'M';
    } elseif ($rl_user == 'Pelayanan-darah') {
        $prefix = 'D';
    } elseif ($rl_user == 'Pemastian-mutu') {
        $prefix = 'T';
    } else {
        // Default jika role tidak sesuai, misalnya
        $prefix = 'X';
    }

    // Query untuk mengambil nomor urutan terakhir berdasarkan prefix
    $query = "SELECT MAX(SUBSTRING_INDEX(kode, '$prefix', -1)) AS max_kode FROM user WHERE kode LIKE '$prefix%'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $next_number = intval($row['max_kode']) + 1;

    // Format nomor urutan menjadi tiga digit dengan angka nol di depan
    $kode = $prefix . sprintf('%03d', $next_number);

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
		'" . $rl_user . "',
        '" . $kode . "'
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
