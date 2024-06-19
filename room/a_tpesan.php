<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {
    // Ambil data dari formulir
    $id_pengirim = mysqli_real_escape_string($conn, $_POST['id_pengirim']);
    $file_id = mysqli_real_escape_string($conn, $_POST['id_file']);
    $pengirim = mysqli_real_escape_string($conn, $_POST['pengirim']);
    $penerima = mysqli_real_escape_string($conn, $_POST['penerima']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
    $tgl = mysqli_real_escape_string($conn, $_POST['tgl']);
    $status = 0;

    $tambah = mysqli_query($conn, "INSERT INTO pesan VALUES(
		'',
        '" . $id_pengirim . "',
        '" . $file_id . "',
		'" . $pengirim . "',
		'" . $penerima . "',
		'" . $pesan . "',
		'" . $tgl . "',
        '" . $status . "'
		)");


    if ($tambah) {
        $_SESSION['pesan_user_suksesedit'] = 'Dalam Pengajuan...';
        echo "<script>window.history.go(-1);</script>";
    } else {
        $_SESSION['pesan_user_gagaledit'] = 'Gagal Dalam Pengajuan..!!!';
        echo "<script>window.history.go(-1);</script>";
    }
}
