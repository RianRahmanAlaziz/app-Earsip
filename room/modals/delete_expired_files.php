<?php
// Memasukkan file koneksi ke database
include '../connect/database.php';

// Mendapatkan tanggal hari ini
$today = date('Y-m-d');

// SQL untuk menghapus data yang sudah expired
$sql = "DELETE FROM file WHERE expired < '$today'";

if ($conn->query($sql) === TRUE) {
    echo "Data expired berhasil dihapus.";
} else {
    echo "Error: " . $conn->error;
}

// Menutup koneksi
$conn->close();
