-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2024 pada 14.31
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
  `id_file` int(11) NOT NULL,
  `id_brankas` int(11) NOT NULL,
  `nm_file` varchar(100) NOT NULL,
  `file` varchar(225) NOT NULL,
  `tg_upload` varchar(100) NOT NULL,
  `visibilitas` enum('Rahasia','Publik') NOT NULL,
  `produksi` date DEFAULT NULL,
  `expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `id_brankas`, `nm_file`, `file`, `tg_upload`, `visibilitas`, `produksi`, `expired`) VALUES
(36, 32, 'asd', 'asd.jpeg', '2024-05-27', 'Rahasia', NULL, NULL),
(37, 26, 'a', 'a.jpg', '2024-05-27', 'Publik', '2024-05-03', '2024-05-31'),
(38, 26, 'z', 'z.jpeg', '2024-05-27', 'Rahasia', '2024-05-02', '2024-05-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `em_user` varchar(100) NOT NULL,
  `ps_user` varchar(100) NOT NULL,
  `rl_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `em_user`, `ps_user`, `rl_user`) VALUES
(2, 'Saya', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(5, 'rian', 'rian@gmail.com', 'cb2b28afc2cc836b33eb7ed86f99e65a', 'Uji-mutu');

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
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
