<?php
session_start();
include '../connect/database.php';

if (@$_POST['simpan']) {
    // Ambil data dari formulir
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $file_id = mysqli_real_escape_string($conn, $_POST['file_id']);
    $p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
    $btn = mysqli_real_escape_string($conn, $_POST['btn']);
    $status = true;


    if ($btn == 'terima') {
        // Update status pesan
        $ubahpesan = mysqli_query($conn, "UPDATE pesan SET 
            status = '" . $status . "'
            WHERE id = '" . $id . "'");

        // Update iakses di tabel file
        $ubahfile = mysqli_query($conn, "UPDATE file SET 
            iakses = '" . $p_id . "'
            WHERE id_file = '" . $file_id . "'");

        if ($ubahpesan && $ubahfile) {
            $_SESSION['pesan_user_suksesedit'] = 'Peminjaman File di Terima';
            echo "<script>window.history.go(-1);</script>";
        } else {
            $_SESSION['pesan_user_gagaledit'] = 'Gagal Peminjaman File di Terima';
            echo "<script>window.history.go(-1);</script>";
        }
    } elseif ($btn == 'tolak') {
        // Hanya update status pesan
        $ubahpesan = mysqli_query($conn, "UPDATE pesan SET 
            status = '" . $status . "'
            WHERE id = '" . $id . "'");

        if ($ubahpesan) {
            $_SESSION['pesan_user_suksesedit'] = 'Peminjaman File di Tolak';
            echo "<script>window.history.go(-1);</script>";
        } else {
            $_SESSION['pesan_user_gagaledit'] = 'Gagal Peminjaman File di Tolak';
            echo "<script>window.history.go(-1);</script>";
        }
    } else {
        $_SESSION['pesan_user_gagaledit'] = 'Kesalahan: Button tidak valid.';
        echo "<script>window.history.go(-1);</script>";
    }
}
