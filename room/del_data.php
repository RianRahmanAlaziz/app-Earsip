<?php
session_start();
error_reporting(0);
include '../connect/database.php';

//Hapus Brankas
if (isset($_GET['idbr'])) {

    $DelBrankas = mysqli_query($conn, "DELETE FROM brankas WHERE id_brankas = '" . $_GET['idbr'] . "' ");

    if ($DelBrankas) {
        $_SESSION['pesan_brankas_sukseshapus'] = 'Brankas Dihapus...!!';
        echo "<script>window.location='index.php'</script>";
    } else {
        $_SESSION['pesan_brankas_gagalhapus'] = 'Gagal Hapus Brankas...!!';
        echo "<script>window.location='index.php'</script>";
    }
}
//Hapus Brankas

// Hapus File
if (isset($_GET['idfl'])) {
    $AmbilFile = mysqli_query($conn, "SELECT * FROM file WHERE id_file = '" . $_GET['idfl'] . "'");
    $DataFile = mysqli_fetch_array($AmbilFile);

    if (is_file("../dist/img/upload/" . $DataFile['file']))
        unlink("../dist/img/upload/" . $DataFile['file']);

    $DelFile = mysqli_query($conn, "DELETE FROM file WHERE id_file = '" . $_GET['idfl'] . "' ");

    if ($DelFile) {
        $_SESSION['pesan_file_sukseshapus'] = 'File Dihapus...!!';
        echo "<script>window.history.go(-1);</script>";
    }
}
// Hapus File


//Hapus User
if (isset($_GET['iduser'])) {

    $DelBrankas = mysqli_query($conn, "DELETE FROM user WHERE id_user = '" . $_GET['iduser'] . "' ");

    if ($DelBrankas) {
        $_SESSION['pesan_user_sukseshapus'] = 'Pengguna Dihapus...!!';
        echo "<script>window.location='data_user.php'</script>";
    } else {
        $_SESSION['pesan_user_gagalhapus'] = 'Gagal Hapus Pengguna...!!';
        echo "<script>window.location='data_user.php'</script>";
    }
}
//Hapus User
