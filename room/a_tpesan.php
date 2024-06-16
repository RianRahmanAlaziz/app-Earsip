<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {
    // Ambil data dari formulir
    $id_pengirim = mysqli_real_escape_string($conn, $_POST['id_pengirim']);
    $pengirim = mysqli_real_escape_string($conn, $_POST['pengirim']);
    $penerima = mysqli_real_escape_string($conn, $_POST['penerima']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
    $tgl = mysqli_real_escape_string($conn, $_POST['tgl']);
    $status = 0;

    $tambah = mysqli_query($conn, "INSERT INTO pesan VALUES(
		'',
        '" . $id_pengirim . "',
		'" . $pengirim . "',
		'" . $penerima . "',
		'" . $pesan . "',
		'" . $tgl . "',
        '" . $status . "'
		)");

    if ($tambah) {
        $_SESSION['pesan_user_suksestambah'] = 'Pesan Ditambah...';
        echo "<script>window.location='data_user.php';</script>";
    } else {
        $_SESSION['pesan_user_gagaltambah'] = 'Gagal Tambah Pesan..!!!';
        echo "<script>window.location='data_user.php';</script>";
    }
}
