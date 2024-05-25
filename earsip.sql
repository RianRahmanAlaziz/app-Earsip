-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2023 pada 09.11
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `warna` enum('success','info','danger','warning') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brankas`
--

INSERT INTO `brankas` (`id_brankas`, `jd_brankas`, `kt_brankas`, `ds_brankas`, `wk_brankas`, `warna`) VALUES
(20, 'Dokumentasi', 'Foto-foto kegiatan', 'Arsip Dokumentasi', '2023-01-31', 'info');

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
  `visibilitas` enum('Rahasia','Publik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `em_user` varchar(100) NOT NULL,
  `ps_user` varchar(100) NOT NULL,
  `rl_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `em_user`, `ps_user`, `rl_user`) VALUES
(2, 'Saya', 'mahmud@gmail.com', '348162101fc6f7e624681b7400b085eeac6df7bd', 'Admin');

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
  MODIFY `id_brankas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
