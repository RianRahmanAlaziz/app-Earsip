<?php
// SILAHKAN SESUAIKAN KONFIGURASI DATABASE ANDA
// DENGAN MENGUBAH PARAMETER '$host,$user,$pass,$data' SESUAI DATABASE ANDA

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'earsip';

$conn = mysqli_connect($host, $user, $pass, $db);

// Periksa koneksi
if (!$conn) {
    $_SESSION['pesan_gagal_koneksi'] = 'Koneksi database gagal: ' . mysqli_connect_error();
    echo 'Koneksi database gagal: ' . mysqli_connect_error();
    exit(); // Hentikan eksekusi jika koneksi gagal
}
