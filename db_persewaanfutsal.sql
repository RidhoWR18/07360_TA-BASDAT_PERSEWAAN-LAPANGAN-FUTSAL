-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2022 pada 16.53
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persewaanfutsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_fasilitas`
--

CREATE TABLE `detail_fasilitas` (
  `lapangan_id` int(11) NOT NULL,
  `fasilitas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_fasilitas`
--

INSERT INTO `detail_fasilitas` (`lapangan_id`, `fasilitas_id`) VALUES
(11, 101),
(12, 111),
(14, 110),
(15, 109),
(16, 108),
(17, 107),
(18, 106),
(19, 105),
(20, 104),
(21, 103),
(22, 102),
(23, 112),
(24, 112),
(25, 102),
(26, 106);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `tanggal_booking` datetime NOT NULL,
  `durasi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`transaksi_id`, `lapangan_id`, `tanggal_booking`, `durasi`) VALUES
(62, 14, '2022-06-03 11:40:00', '01:00:00'),
(63, 16, '2022-06-10 11:41:00', '01:00:00'),
(64, 17, '2022-06-10 11:42:00', '01:00:00'),
(65, 19, '2022-06-10 16:27:00', '01:00:00'),
(65, 18, '2022-06-09 16:27:00', '01:00:00'),
(65, 20, '2022-06-10 16:27:00', '01:00:00'),
(66, 21, '2022-06-10 16:29:00', '01:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(101, 'Bola dan Loker'),
(102, 'Bola dan Loke'),
(103, 'Bola dan Loke'),
(104, 'Bola dan Loke'),
(105, 'Bola dan Loke'),
(106, 'Bola dan Loke'),
(107, 'Bola dan Loke'),
(108, 'Bola dan Loke'),
(109, 'Bola dan Loke'),
(110, 'Bola dan Loke'),
(111, 'Bola dan Loke'),
(112, 'Bola dan Loke'),
(113, 'Bola dan Loke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `nama_lapangan` varchar(15) NOT NULL,
  `harga_per_jam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `status`, `nama_lapangan`, `harga_per_jam`) VALUES
(11, 1, 'Lapangan 20', 100000),
(12, 0, 'Lapangan 2', 100000),
(14, 0, 'Lapangan 3', 100000),
(15, 0, 'Lapangan 4', 100000),
(16, 0, 'Lapangan 5', 100000),
(17, 0, 'Lapangan 6', 100000),
(18, 0, 'Lapangan 7', 100000),
(19, 0, 'Lapangan 8', 100000),
(20, 0, 'Lapangan 9', 100000),
(21, 0, 'Lapangan 10', 100000),
(22, 1, 'Lapangan 11', 100000),
(23, 1, 'Lapangan 12', 100000),
(24, 1, 'Lapangan 13', 100000),
(25, 1, 'Lapangan 14', 100000),
(26, 1, 'Lapangan 15', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(40) NOT NULL,
  `alamat_pegawai` varchar(50) NOT NULL,
  `password_pegawai` varchar(20) NOT NULL,
  `notelp_pegawai` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `password_pegawai`, `notelp_pegawai`) VALUES
(1000, 'Ridho', 'Nganjuk', '123', '085'),
(1001, 'Wahyu', 'Kertosono', '123', '098'),
(1002, 'Ramadhan', 'Jombang', '123', '096'),
(1003, 'Jonathan', 'Sidoarjo', '123', '087'),
(1004, 'Dirgantara', 'Mojokerto', '123', '067'),
(1005, 'Setiawan', 'Surabaya', '123', '056'),
(1006, 'Zacharya', 'Surabaya', '123', '011'),
(1007, 'Hafid', 'Tulungagung', '123', '077'),
(1008, 'Wakhid', 'Tulungangung', '123', '0635'),
(1009, 'Farras', 'Surabaya', '123', '064'),
(1010, 'Akbar', 'Tembarak', '123', '027'),
(1011, 'Rafikhul', 'Krian', '123', '093'),
(1012, 'Iskandar', 'Gresik', '123', '0858'),
(1013, 'M. Azhar', 'Surabaya', '123', '0526'),
(1014, 'Ahmad Fandi', 'Kertosono', '123', '0936');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `notelp_pelanggan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `notelp_pelanggan`) VALUES
(1, 'Adiarsa', '08474'),
(2, 'Reza', '8748'),
(3, 'Zavi', '67622'),
(4, 'Xavi', '38378'),
(6, 'Torres', '81267'),
(8, 'Zinchenko', '282929'),
(10, 'Haaland', '2872822');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_cart`
--

CREATE TABLE `temp_cart` (
  `temp_cart_id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `harga_per_jam` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_booking` datetime NOT NULL,
  `durasi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `pegawai_id`, `pelanggan_id`, `tanggal_pesan`, `total_bayar`) VALUES
(62, 1000, 1, '2022-06-09 17:00:00', 100000),
(63, 1000, 1, '2022-06-09 17:00:00', 100000),
(64, 1000, 1, '2022-06-09 17:00:00', 100000),
(65, 1000, 1, '2022-06-09 17:00:00', 300000),
(66, 1000, 2, '2022-06-09 17:00:00', 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD KEY `fk_detail_fasilitas_lapangan` (`lapangan_id`),
  ADD KEY `fk_detail_fasilitas_fasilitas` (`fasilitas_id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_detail_transaksi_transaksi` (`transaksi_id`),
  ADD KEY `fk_detail_transaksi_lapangan` (`lapangan_id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`temp_cart_id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_pegawai` (`pegawai_id`),
  ADD KEY `fk_transaksi_pelanggan` (`pelanggan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `temp_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD CONSTRAINT `fk_detail_fasilitas_fasilitas` FOREIGN KEY (`fasilitas_id`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `fk_detail_fasilitas_lapangan` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id_lapangan`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi_lapangan` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id_lapangan`),
  ADD CONSTRAINT `fk_detail_transaksi_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD CONSTRAINT `temp_cart_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `temp_cart_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `temp_cart_ibfk_3` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
