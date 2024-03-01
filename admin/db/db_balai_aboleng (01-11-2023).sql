-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 05:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_balai_aboleng`
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
  `notes` varchar(255) NOT NULL,
  `nama_bill` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_menu`, `qty`, `harga`, `notes`, `nama_bill`, `tgl_transaksi`, `id_transaksi`) VALUES
(12, 3, 1, 17000, '', 'MEJA 4', '2023-10-30 00:00:00', 1),
(13, 4, 1, 25000, '', 'MEJA 5', '2023-10-30 00:00:00', 2),
(14, 2, 1, 25000, '', 'MEJA 5', '2023-10-30 00:00:00', 2),
(15, 5, 1, 40000, '', 'MEJA 5', '2023-10-30 00:00:00', 2),
(29, 4, 1, 25000, '', 'MEJA 8', '2023-11-01 21:42:05', 4),
(30, 3, 1, 17000, '', 'MEJA 8', '2023-11-01 21:42:07', 4),
(31, 4, 1, 25000, '', '', '2023-11-01 21:45:17', 5),
(32, 3, 1, 17000, '', '', '2023-11-01 21:45:19', 5),
(33, 4, 1, 25000, '', 'MEJA 10', '2023-11-01 21:49:15', 6),
(34, 3, 1, 17000, '', 'MEJA 10', '2023-11-01 21:49:16', 6),
(35, 3, 1, 17000, '', '', '2023-11-01 21:49:50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kode_menu`, `nama_menu`, `harga_menu`) VALUES
(1, 'AG', 'Ayam Goreng', 20000),
(2, 'IB', 'Ikan Bakar', 25000),
(3, 'SP', 'Sate Padang', 17000),
(4, 'NC', 'Nasi Campur', 25000),
(5, 'SB', 'Sotong Bakar', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `uang_diterima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `metode_pembayaran`, `jenis_pembayaran`, `uang_diterima`) VALUES
(1, 'Cash', 'offline', 232122),
(2, 'GoFood', 'offline', 555555),
(4, 'Bank Transfer', 'offline', 12312213),
(5, 'GoFood', 'offline', 12312312),
(6, 'GoFood', 'offline', 2223232),
(7, 'GoPay', 'online', 213213213);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
