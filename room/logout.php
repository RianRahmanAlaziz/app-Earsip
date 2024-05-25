<?php
session_start();
$_SESSION['pesan_logout_sukses'] = 'Anda telah keluar..';
echo "<script>window.location='../index.php'</script>";
?>
