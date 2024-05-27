<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {

	$jd_brankas = mysqli_real_escape_string($conn, $_POST['jd_brankas']);
	$kt_brankas = mysqli_real_escape_string($conn, $_POST['kt_brankas']);
	$ds_brankas = mysqli_real_escape_string($conn, $_POST['ds_brankas']);
	$wk_brankas = mysqli_real_escape_string($conn, $_POST['wk_brankas']);
	$warna = mysqli_real_escape_string($conn, $_POST['warna']);
	$bg_brankas = mysqli_real_escape_string($conn, $_POST['bg_brankas']);

	$cek = mysqli_query($conn, "SELECT jd_brankas, kt_brankas FROM brankas WHERE jd_brankas='$jd_brankas' AND kt_brankas='$kt_brankas'");

	if ($cek->num_rows > 0) {
		$_SESSION['pesan_brankas_ada'] = 'Brankas Sudah Ada...!!!';
		echo "<script>window.history.go(-1);</script>";
	} else {

		$tambah = mysqli_query($conn, "INSERT INTO brankas VALUES(
		'',
		'" . $jd_brankas . "',
		'" . $kt_brankas . "',
		'" . $ds_brankas . "',
		'" . $wk_brankas . "',
		'" . $warna . "',
		'" . $bg_brankas . "'
		)");

		if ($tambah) {
			$_SESSION['pesan_brankas_suksestambah'] = 'Brankas Ditambah...';
			echo "<script>window.history.go(-1);</script>";
		} else {
			$_SESSION['pesan_brankas_gagaltambah'] = 'Gagal Tambah Brankas..!!!';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}
