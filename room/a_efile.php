<?php
session_start();
error_reporting(0);
include '../connect/database.php';

if (@$_POST['edit']) {

	$id_file = mysqli_real_escape_string($conn, $_POST['id_file']);
	$id_brankas = mysqli_real_escape_string($conn, $_POST['id_brankas']);
	$nm_file = mysqli_real_escape_string($conn, $_POST['nm_file']);
	$visibilitas = mysqli_real_escape_string($conn, $_POST['visibilitas']);
	$tg_upload = mysqli_real_escape_string($conn, $_POST['tg_upload']);

	$ubahFile = mysqli_query($conn, "UPDATE file SET 
	id_brankas = '".$id_brankas."',
	nm_file = '".$nm_file."',
	visibilitas = '".$visibilitas."',
	tg_upload = '".$tg_upload."'
	WHERE id_file = '".$id_file."'
	");

	if ($ubahFile) {
		$_SESSION['pesan_file_suksesedit'] = 'File diubah..';
		echo "<script>window.history.go(-1);</script>";
	}else{
		$_SESSION['pesan_file_gagaledit'] = 'Gagal ubah file..!!';
		echo "<script>window.history.go(-1);</script>";
	}
}

?>