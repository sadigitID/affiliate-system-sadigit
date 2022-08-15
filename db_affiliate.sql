-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 05:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_affiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bonuss`
--

CREATE TABLE `tb_bonuss` (
  `id_bonus` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jml_bonus` double DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_bonus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanans`
--

CREATE TABLE `tb_pesanans` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `foto_pembayaran` varchar(50) DEFAULT NULL,
  `no_wa_pembeli` varchar(13) DEFAULT NULL,
  `status_komisi` varchar(10) DEFAULT NULL,
  `status_pesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produks`
--

CREATE TABLE `tb_produks` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `jml_komisi` double DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `link_produk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekenings`
--

CREATE TABLE `tb_rekenings` (
  `id_rek` int(11) NOT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `nama_pemilik_rek` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kabupaten` varchar(25) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `link_tiktok` varchar(50) DEFAULT NULL,
  `link_fb` varchar(50) DEFAULT NULL,
  `link_ig` varchar(50) DEFAULT NULL,
  `link_yutub` varchar(50) DEFAULT NULL,
  `role` enum('Admin','Affiliator') DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT current_timestamp(),
  `deleted_at` int(11) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_lengkap`, `password`, `provinsi`, `kabupaten`, `kecamatan`, `alamat_lengkap`, `email`, `no_hp`, `link_tiktok`, `link_fb`, `link_ig`, `link_yutub`, `role`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Risna Berti', '1234', 'Jawa tengah', 'Banyumas', 'Ajibarang', 'Ajibarang', NULL, '087889980443', NULL, NULL, NULL, NULL, 'Admin', 1, 2147483647, 2147483647, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bonuss`
--
ALTER TABLE `tb_bonuss`
  ADD PRIMARY KEY (`id_bonus`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pesanans`
--
ALTER TABLE `tb_pesanans`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_produks`
--
ALTER TABLE `tb_produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_rekenings`
--
ALTER TABLE `tb_rekenings`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bonuss`
--
ALTER TABLE `tb_bonuss`
  MODIFY `id_bonus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesanans`
--
ALTER TABLE `tb_pesanans`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produks`
--
ALTER TABLE `tb_produks`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rekenings`
--
ALTER TABLE `tb_rekenings`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bonuss`
--
ALTER TABLE `tb_bonuss`
  ADD CONSTRAINT `tb_bonuss_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pesanans`
--
ALTER TABLE `tb_pesanans`
  ADD CONSTRAINT `tb_pesanans_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produks` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pesanans_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
