<?php
session_start();
error_reporting(0);
include '../connect/database.php';

$id_brankas = mysqli_real_escape_string($conn, $_POST['id_brankas']);
$nm_file = mysqli_real_escape_string($conn, $_POST['nm_file']);
$file = mysqli_real_escape_string($conn, $_POST['file']);
$produksi = mysqli_real_escape_string($conn, $_POST['produksi']);
$expired = mysqli_real_escape_string($conn, $_POST['expired']);

$iakses = null;

$cek = mysqli_query($conn, "SELECT nm_file FROM file WHERE nm_file='$nm_file'");

if ($cek->num_rows > 0) {
	$_SESSION['pesan_file_ada'] = 'File Sudah Ada...!!!';
	echo "<script>window.history.go(-2);</script>";
} else {

	if (@$_POST['upload_file']) {
		$file = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$extensi = explode(".", $_FILES['file']['name']);
		$file = $nm_file . "." . end($extensi);
		$path = "../dist/img/upload/" . $file;
		move_uploaded_file($tmp, $path);
	}

	$tg_upload = mysqli_real_escape_string($conn, $_POST['tg_upload']);
	$visibilitas = mysqli_real_escape_string($conn, $_POST['visibilitas']);

	$tambah = mysqli_query($conn, "INSERT INTO file VALUES(
	'',
	'" . $id_brankas . "',
	'" . $nm_file . "',
	'" . $file . "',
	'" . $tg_upload . "',
	'" . $visibilitas . "',
	'" . $produksi . "',
	'" . $expired . "',
	'" . $iakses . "'
	)");

	if ($tambah) {
		$_SESSION['pesan_file_suksestambah'] = 'File disimpan...';
		echo "<script>window.history.go(-1);</script>";
	} else {
		$_SESSION['pesan_file_gagaltambah'] = 'Gagal Simpan File...!!!';
		echo "<script>window.history.go(-1);</script>";
	}
}
