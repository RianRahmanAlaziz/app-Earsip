<?php
session_start();
error_reporting(0);
include '../connect/database.php';
if (@$_POST['edit']) {

	$id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
	$em_user = mysqli_real_escape_string($conn, $_POST['em_user']);
	$ps_user = mysqli_real_escape_string($conn, md5($_POST['ps_user']));

	if (empty($_POST['ps_user'])) {

		$kosong = mysqli_query($conn, "UPDATE user SET 
		em_user = '" . $em_user . "'
		WHERE id_user = '" . $id_user . "'
		");

		if ($kosong) {
			$_SESSION['pesan_user_suksesedit'] = 'Data user diubah..';
			echo "<script>window.history.go(-1);</script>";
		} else {
			$_SESSION['pesan_user_gagaledit'] = 'Gagal ubah user..';
			echo "<script>window.history.go(-1);</script>";
		}
	} else {

		$tidakkosong = mysqli_query($conn, "UPDATE user SET 
		em_user = '" . $em_user . "',
		ps_user = '" . $ps_user . "'
		WHERE id_user = '" . $id_user . "'
		");

		if ($tidakkosong) {
			$_SESSION['pesan_user_suksesedit'] = 'Data user diubah..';
			echo "<script>window.history.go(-1);</script>";
		} else {
			$_SESSION['pesan_user_gagaledit'] = 'Gagal ubah user..';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}
