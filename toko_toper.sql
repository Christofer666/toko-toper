-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2024 pada 05.12
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko toper`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL,
  `harga_jual` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `kategori`, `stok`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'Putu', 'Makanan', 10, 2000, '2024-01-11 14:21:28', '2024-02-20 05:43:07'),
(2, 'Klepon', 'Makanan', 10, 1500, '2024-01-11 14:21:28', '2024-02-15 12:48:09'),
(3, 'Es Dawet', 'Minuman', 10, 8000, '2024-01-11 14:21:28', '2024-02-15 12:47:51'),
(4, 'Bajigur', 'Minuman', 10, 3000, '2024-01-11 14:21:28', '2024-02-15 12:48:40'),
(5, 'Es Cendol', 'Minuman', 10, 6000, '2024-01-11 14:21:28', '2024-02-15 12:48:52'),
(6, 'Lemper', 'Makanan', 10, 3000, '2024-02-15 13:06:03', '2024-02-15 13:07:05'),
(7, 'Nagasari', 'Makanan', 10, 2000, '2024-02-15 13:06:03', '2024-02-15 13:07:09'),
(8, 'Risoles', 'Makanan', 10, 2000, '2024-02-15 13:06:03', '2024-02-15 13:07:13'),
(9, 'Es Pisang Hijau', 'Minuman', 10, 10000, '2024-02-15 13:06:03', '2024-02-15 13:07:16'),
(10, 'Ronde', 'Minuman', 10, 10000, '2024-02-15 13:06:03', '2024-02-15 13:07:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `nomor_telepon`, `created_at`) VALUES
(1, 'Sakura', 'Jl Kopo', '08123456789', '2024-02-20 12:35:28'),
(4, 'Fahri', 'Depok', '082345678912', '2024-02-23 06:53:19'),
(5, 'Gusti', 'Bandung', '083456789123', '2024-02-23 06:53:19'),
(6, 'Surya', 'Depok', '084567891234', '2024-02-23 06:53:19'),
(7, 'Faiz', 'Solo', '085678912345', '2024-02-23 06:53:19'),
(8, 'Erik', 'Bandung', '08689123456', '2024-02-23 06:53:19'),
(9, 'Marvin', 'Cihanjuang', '087891234567', '2024-02-23 06:53:19'),
(10, 'Ulus', 'Cimahi', '088912345678', '2024-02-23 06:53:19'),
(11, 'Nasnus', 'Peta', '089123456789', '2024-02-23 06:53:19'),
(12, 'Tuntong', 'Suryani', '080234567890', '2024-02-23 06:53:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `jumlah`, `total_harga`, `id_staff`, `id_pelanggan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2000, 1, 1, '2024-02-15 13:22:31', '2024-02-23 06:54:46'),
(2, 2, 1, 1500, 1, 4, '2024-02-15 13:22:31', '2024-02-23 06:59:20'),
(3, 3, 1, 8000, 2, 5, '2024-02-15 13:22:31', '2024-02-23 06:59:24'),
(4, 4, 1, 3000, 2, 6, '2024-02-15 13:22:31', '2024-02-23 06:59:27'),
(5, 5, 1, 6000, 3, 7, '2024-02-15 13:22:31', '2024-02-23 06:59:31'),
(6, 6, 1, 3000, 3, 8, '2024-02-15 13:22:31', '2024-02-23 06:59:38'),
(7, 7, 1, 2000, 4, 9, '2024-02-15 13:22:31', '2024-02-23 06:59:42'),
(8, 8, 1, 2000, 4, 10, '2024-02-15 13:22:31', '2024-02-23 06:59:46'),
(9, 9, 1, 10000, 5, 11, '2024-02-15 13:22:31', '2024-02-23 06:59:50'),
(10, 10, 1, 10000, 5, 12, '2024-02-15 13:22:31', '2024-02-23 06:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Keuangan','Logistik') CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Toper', '$2y$10$qUj9J8RzJ9iHh3o/zkDCyuCL.0UNdJKWUb1vrtfinuFIQMSFQ1dBu', 'Admin', '2024-01-11 05:29:14', '2024-03-18 10:02:28'),
(2, 'Naruto', '$2a$12$8EpEqfYP1IQdZdSKpRBIoeia1YUD8fflhyCgTthuIzCrGSLWWRFUO', 'Admin', '2024-01-11 05:33:06', '2024-03-18 09:29:00'),
(3, 'Budi', '$2a$12$Tx/686mGnu9pgHkyScS.QeoIts9r8BZfY61yqOmiKMnPaLGmVmNyK', 'Keuangan', '2024-01-11 14:14:36', '2024-03-18 09:29:00'),
(4, 'Sasuke', '$2a$12$0KSnfwYAgYnVPKAwHgDvbejOInkDW673CgHsO5DCOdvc.Op.SMbwi', 'Logistik', '2024-01-11 14:15:52', '2024-03-18 09:29:00'),
(5, 'Sakura', '$2a$12$ItcxAmEca2q2fP/KDzy7/ehJC7uK7gokaE/PHdiX.S5ls6JJJL2hq', 'Logistik', '2024-01-11 14:15:52', '2024-03-18 09:58:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
