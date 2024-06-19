-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 09.10
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brankas`
--

CREATE TABLE `brankas` (
  `id_brankas` int(11) NOT NULL,
  `jd_brankas` varchar(100) NOT NULL,
  `kt_brankas` varchar(100) NOT NULL,
  `ds_brankas` varchar(200) NOT NULL,
  `wk_brankas` varchar(100) NOT NULL,
  `warna` enum('success','info','danger','warning') NOT NULL,
  `bg_brankas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `brankas`
--

INSERT INTO `brankas` (`id_brankas`, `jd_brankas`, `kt_brankas`, `ds_brankas`, `wk_brankas`, `warna`, `bg_brankas`) VALUES
(26, 'Umum', 'Umum', 'Umum', '2024-05-25', 'success', 'Umum'),
(27, 'keuangan', 'keuangan', 'keuangan', '2024-05-25', 'success', 'Keuangan'),
(28, 'Penyediaan Darah', 'Penyediaan Darah', 'Penyediaan Darah', '2024-05-25', 'success', 'Penyediaan-darah'),
(29, 'Uji Mutu', 'Uji Mutu', 'Uji Mutu', '2024-05-25', 'success', 'Uji-mutu'),
(30, 'Pelayanan-darah', 'Pelayanan-darah', 'Pelayanan-darah', '2024-05-25', 'success', 'Pelayanan-darah'),
(32, 'Pemastian Mutu', 'Pemastian Mutu', 'Pemastian Mutu', '2024-05-27', 'success', 'Pemastian-mutu'),
(37, 'b', 'a', 'a', '2024-05-27', 'info', 'Pemastian-mutu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) UNSIGNED NOT NULL,
  `id_brankas` int(11) NOT NULL,
  `nm_file` varchar(100) NOT NULL,
  `file` varchar(225) NOT NULL,
  `tg_upload` varchar(100) NOT NULL,
  `visibilitas` enum('Rahasia','Publik') NOT NULL,
  `produksi` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `iakses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `id_brankas`, `nm_file`, `file`, `tg_upload`, `visibilitas`, `produksi`, `expired`, `iakses`) VALUES
(36, 32, 'asd', 'asd.jpeg', '2024-05-27', 'Rahasia', NULL, NULL, 0),
(37, 26, 'a', 'a.jpg', '2024-05-27', 'Publik', '2024-05-03', '2024-05-31', 7),
(38, 26, 'z', 'z.jpeg', '2024-05-27', 'Rahasia', '2024-05-02', '2024-05-29', 7),
(39, 26, 'sd', 'sd.pdf', '2024-06-16', 'Publik', '2024-06-11', '2024-06-29', 0),
(40, 29, 'zxc', 'zxc.pdf', '2024-06-16', 'Publik', '2024-06-14', '2024-06-21', 0),
(41, 29, 'ahay', 'ahay.jpg', '2024-06-18', 'Publik', '2024-06-07', '2024-06-28', 0),
(42, 26, 'oba', 'oba.jpg', '2024-06-19', 'Publik', '2024-06-14', '2024-06-09', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_pengirim` int(11) UNSIGNED NOT NULL,
  `file_id` int(11) UNSIGNED NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `pesan` varchar(225) NOT NULL,
  `tgl` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `id_pengirim`, `file_id`, `pengirim`, `penerima`, `pesan`, `tgl`, `status`) VALUES
(5, 7, 38, 'asep', 'Umum', '', '2024-06-18', 1),
(7, 7, 37, 'asep', 'Umum', '', '2024-06-18', 1),
(12, 7, 38, 'asep', 'Umum', 'Pengajuan pinjam File', '2024-06-18', 1),
(13, 7, 38, 'asep', 'Umum', 'Pengajuan pinjam File', '2024-06-18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `em_user` varchar(100) NOT NULL,
  `ps_user` varchar(100) NOT NULL,
  `rl_user` varchar(50) NOT NULL,
  `kode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `em_user`, `ps_user`, `rl_user`, `kode`) VALUES
(2, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL),
(6, 'z', 'z@gmail.com', 'fd93783832367c1fee7bd62ded8847c1', 'Umum', 'P001'),
(7, 'asep', 'asep@gmail.com', 'dc855efb0dc7476760afaa1b281665f1', 'Uji-mutu', 'M001'),
(8, 'u', 'u@gmail.com', 'a176b04df256e82d5862e61a73cca8cf', 'Uji-mutu', 'M002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brankas`
--
ALTER TABLE `brankas`
  ADD PRIMARY KEY (`id_brankas`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `file_id` (`file_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brankas`
--
ALTER TABLE `brankas`
  MODIFY `id_brankas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `file` (`id_file`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
