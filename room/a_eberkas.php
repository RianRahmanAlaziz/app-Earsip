<?php
session_start();
error_reporting(0);
include '../connect/database.php';


$id_file = $_POST['id_file'];

if(@$_POST['upload_file']){

	$file = $_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	$extensi = explode(".", $_FILES['file']['name']);
	$filebaru = $nm_file.".".end($extensi);
	$path = "../dist/img/upload/".$filebaru;
	move_uploaded_file($tmp, $path);

		$query1 = "SELECT * FROM file WHERE id_file='".$id_file."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../dist/img/upload/".$data1['file']))
			unlink("../dist/img/upload/".$data1['file']);
		
		$query2 = "UPDATE file SET file='".$filebaru."' WHERE id_file='".$id_file."'";
		$sql2 = mysqli_query($conn, $query2);

		if($sql2){
			$_SESSION['pesan_file_suksesedit'] = 'File diganti..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_file_gagaledit'] = 'Gagal ganti file..!';
			echo "<script>window.history.go(-1);</script>";
		}
}else{
	$_SESSION['pesan_file_gagaledit'] = 'Gagal ganti file..!';
	echo "<script>window.history.go(-1);</script>";
}

?>

