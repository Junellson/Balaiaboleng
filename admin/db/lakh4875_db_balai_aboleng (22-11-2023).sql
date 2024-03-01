-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2023 at 08:27 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakh4875_db_balai_aboleng`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_bill` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_menu`, `qty`, `harga`, `nama_bill`, `tgl_transaksi`, `id_transaksi`) VALUES
(109, 9, 1, 35000, 'Payment Complete', '2023-11-15 23:20:43', 1),
(111, 10, 1, 22000, 'Payment Complete', '2023-11-15 23:38:11', 2),
(112, 12, 1, 6000, 'Payment Complete', '2023-11-15 23:39:07', 3),
(114, 9, 1, 35000, 'Meja 1', '2023-11-15 23:47:40', 4),
(117, 12, 1, 6000, 'Payment Complete', '2023-11-16 18:47:33', 5),
(118, 11, 1, 30000, 'meja 2', '2023-11-16 18:48:01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kode_menu`, `nama_menu`, `harga_menu`) VALUES
(11, 'IB', 'ikan', 30000),
(12, 'TO', 'Teh Obeng', 6000),
(13, 'KI', 'Kacang ijo', 4000),
(14, 'J', 'jahe', 0),
(16, 'S', 'Soya', 2000),
(17, 'P', 'Pandan', 0),
(18, 'KW', 'Kacang Wijen', 4000),
(19, 'KT', 'Kacang Tanah', 4500),
(20, 'BK1', 'Boleng kid 1', 30000),
(21, 'BK2', 'Boleng kid 2', 35000),
(22, 'BK3', 'Boleng kid 3', 34000),
(23, 'x', 'x', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `uang_diterima` int(11) NOT NULL,
  `fee_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `metode_pembayaran`, `jenis_pembayaran`, `uang_diterima`, `fee_online`) VALUES
(1, 'Cash', 'online', 42000, 7000),
(2, 'GoPay', 'online', 26400, 4400),
(3, 'Cash', 'online', 7200, 1200),
(4, 'Cash', 'offline', 50000, 0),
(5, 'Bank Transfer', 'online', 7200, 1200),
(6, 'WAITING PAYMENT', '', 0, 0),
(8, 'WAITING PAYMENT', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'User Admin', 'admin'),
(2, 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'User Karyawan', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
