-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2024 at 08:42 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.27

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
  `nama_bill` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_menu`, `qty`, `nama_bill`, `tgl_transaksi`, `id_transaksi`) VALUES
(251, 25, 1, 'Payment Complete', '2023-12-14 08:00:00', 1),
(252, 26, 3, 'Payment Complete', '2023-12-14 08:00:00', 1),
(253, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 1),
(254, 27, 2, 'Payment Complete', '2023-12-14 08:00:00', 1),
(255, 26, 2, 'Payment Complete', '2023-12-14 08:00:00', 1),
(256, 32, 1, 'Payment Complete', '2023-12-14 08:00:00', 1),
(265, 27, 2, 'meja 6', '2023-12-14 08:00:00', 2),
(266, 26, 2, 'meja 6', '2023-12-14 08:00:00', 2),
(267, 31, 1, 'meja 6', '2023-12-14 08:00:00', 2),
(268, 27, 4, 'meja 6', '2023-12-14 08:00:00', 2),
(269, 32, 1, 'meja 6', '2023-12-14 08:00:00', 2),
(270, 26, 4, 'Payment Complete', '2023-12-14 08:00:00', 3),
(271, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 3),
(272, 28, 1, 'Payment Complete', '2023-12-14 08:00:00', 4),
(273, 33, 1, 'Payment Complete', '2023-12-14 08:00:00', 4),
(274, 25, 2, 'Payment Complete', '2023-12-14 08:00:00', 5),
(275, 26, 2, 'Payment Complete', '2023-12-14 08:00:00', 5),
(276, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 5),
(277, 27, 2, 'Payment Complete', '2023-12-14 08:00:00', 6),
(278, 26, 2, 'Payment Complete', '2023-12-14 08:00:00', 6),
(279, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 6),
(280, 27, 4, 'Payment Complete', '2023-12-14 08:00:00', 6),
(281, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 6),
(282, 28, 1, 'meja 6', '2023-12-14 08:00:00', 7),
(283, 31, 1, 'meja 6', '2023-12-14 08:00:00', 7),
(284, 26, 4, 'Payment Complete', '2023-12-14 08:00:00', 8),
(285, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 8),
(286, 25, 4, 'Payment Complete', '2023-12-14 08:00:00', 9),
(287, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 9),
(288, 27, 4, 'Payment Complete', '2023-12-14 08:00:00', 10),
(289, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 10),
(290, 25, 4, 'meja 6', '2023-12-14 08:00:00', 11),
(291, 32, 1, 'meja 6', '2023-12-14 08:00:00', 11),
(299, 25, 4, 'Payment Complete', '2023-12-14 08:00:00', 13),
(300, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 13),
(301, 27, 2, 'Payment Complete', '2023-12-14 08:00:00', 14),
(302, 25, 1, 'Payment Complete', '2023-12-14 08:00:00', 14),
(303, 26, 1, 'Payment Complete', '2023-12-14 08:00:00', 14),
(304, 31, 1, 'Payment Complete', '2023-12-14 08:00:00', 14),
(305, 25, 4, 'Payment Complete', '2023-12-14 14:51:47', 15),
(306, 31, 1, 'Payment Complete', '2023-12-14 14:51:48', 15),
(307, 27, 4, 'Payment Complete', '2023-12-14 15:12:39', 16),
(308, 31, 1, 'Payment Complete', '2023-12-14 15:12:42', 16),
(309, 25, 4, 'Payment Complete', '2023-12-16 14:07:37', 17),
(310, 31, 1, 'Payment Complete', '2023-12-16 14:07:38', 17),
(311, 27, 4, 'Payment Complete', '2023-12-16 14:07:44', 18),
(312, 31, 1, 'Payment Complete', '2023-12-16 14:07:46', 18),
(315, 25, 4, 'Payment Complete', '2023-12-16 14:10:01', 20),
(316, 31, 1, 'Payment Complete', '2023-12-16 14:10:02', 20),
(317, 26, 4, 'meja 1', '2023-12-16 14:10:16', 21),
(318, 32, 1, 'meja 1', '2023-12-16 14:10:17', 21),
(319, 27, 4, 'Payment Complete', '2023-12-19 20:34:45', 22),
(320, 31, 1, 'Payment Complete', '2023-12-19 20:34:49', 22),
(323, 25, 4, 'Payment Complete', '2023-12-27 15:15:32', 23),
(324, 31, 1, 'Payment Complete', '2023-12-27 15:15:33', 23),
(325, 27, 4, 'Payment Complete', '2023-12-27 15:15:57', 24),
(326, 31, 1, 'Payment Complete', '2023-12-27 15:15:58', 24),
(327, 25, 1, 'Meja 1', '2023-12-27 16:12:27', 25),
(328, 26, 4, 'Payment Complete', '2023-12-28 18:25:09', 26),
(329, 31, 1, 'Payment Complete', '2023-12-28 18:25:10', 26),
(330, 28, 1, 'Payment Complete', '2023-12-28 18:30:02', 27),
(331, 31, 1, 'Payment Complete', '2023-12-28 18:30:04', 27),
(332, 26, 4, 'Payment Complete', '2023-12-29 15:13:36', 28),
(333, 32, 1, 'Payment Complete', '2023-12-29 15:13:38', 28),
(334, 28, 1, 'meja 1\r\n', '2023-12-29 15:13:49', 29),
(335, 31, 1, 'meja 1\r\n', '2023-12-29 15:13:51', 29),
(336, 25, 1, 'Payment Complete', '2023-12-29 17:14:23', 30),
(337, 27, 4, 'Payment Complete', '2024-01-08 14:13:35', 31),
(338, 31, 1, 'Payment Complete', '2024-01-08 14:13:36', 31),
(339, 26, 4, 'Payment Complete', '2024-01-08 14:15:19', 32),
(340, 31, 1, 'Payment Complete', '2024-01-08 14:15:21', 32),
(344, 28, 1, 'Payment Complete', '2024-01-09 15:45:00', 33),
(345, 31, 1, 'Payment Complete', '2024-01-09 15:45:01', 33),
(346, 30, 1, 'meja 6', '2024-01-09 15:45:08', 34),
(348, 25, 4, 'Payment Complete', '2024-01-11 21:26:26', 35),
(349, 32, 1, 'Payment Complete', '2024-01-11 21:26:32', 35),
(350, 27, 4, 'meja 1', '2024-01-11 21:26:50', 36),
(351, 32, 1, 'meja 1', '2024-01-11 21:26:51', 36),
(353, 26, 4, 'Payment Complete', '2024-01-16 19:27:13', 37),
(354, 33, 1, 'Payment Complete', '2024-01-16 19:27:14', 37),
(367, 25, 4, 'Payment Complete', '2024-02-15 13:54:15', 38),
(368, 31, 1, 'Payment Complete', '2024-02-15 13:54:18', 38),
(369, 25, 2, 'Payment Complete', '2024-02-15 13:54:21', 38),
(370, 26, 2, 'Payment Complete', '2024-02-15 13:54:22', 38),
(371, 31, 1, 'Payment Complete', '2024-02-15 13:54:24', 38),
(372, 28, 1, 'Payment Complete', '2024-02-15 14:10:16', 39),
(373, 32, 1, 'Payment Complete', '2024-02-15 14:10:21', 39),
(374, 25, 4, 'Payment Complete', '2024-02-15 15:10:15', 40),
(375, 31, 1, 'Payment Complete', '2024-02-15 15:10:17', 40),
(376, 27, 4, 'Payment Complete', '2024-02-15 15:10:23', 40),
(377, 32, 1, 'Payment Complete', '2024-02-15 15:10:25', 40),
(378, 25, 4, 'Payment Complete', '2024-02-15 15:10:34', 40),
(379, 32, 1, 'Payment Complete', '2024-02-15 15:10:37', 40),
(380, 25, 2, 'Payment Complete', '2024-02-15 15:10:39', 40),
(381, 26, 2, 'Payment Complete', '2024-02-15 15:10:41', 40),
(382, 31, 1, 'Payment Complete', '2024-02-15 15:10:43', 40),
(387, 26, 4, 'Payment Complete', '2024-02-15 15:34:01', 41),
(388, 31, 1, 'Payment Complete', '2024-02-15 15:34:03', 41),
(390, 34, 1, 'Payment Complete', '2024-02-15 15:50:44', 42),
(391, 25, 4, 'Meja 5', '2024-02-16 10:10:42', 43),
(392, 31, 1, 'Meja 5', '2024-02-16 10:10:44', 43),
(393, 25, 2, 'Meja 5', '2024-02-16 10:10:47', 43),
(394, 26, 2, 'Meja 5', '2024-02-16 10:10:49', 43),
(395, 31, 1, 'Meja 5', '2024-02-16 10:10:51', 43),
(396, 27, 4, 'Meja 5', '2024-02-16 10:11:02', 43),
(397, 31, 1, 'Meja 5', '2024-02-16 10:11:07', 43),
(398, 28, 1, 'Payment Complete', '2024-02-16 10:59:46', 44),
(399, 31, 1, 'Payment Complete', '2024-02-16 10:59:55', 44),
(400, 25, 2, 'Payment Complete', '2024-02-16 11:00:01', 44),
(401, 26, 2, 'Payment Complete', '2024-02-16 11:00:03', 44),
(402, 31, 1, 'Payment Complete', '2024-02-16 11:00:05', 44),
(403, 25, 2, 'Meja 3', '2024-02-16 12:31:55', 45),
(404, 26, 2, 'Meja 3', '2024-02-16 12:31:57', 45),
(405, 33, 1, 'Meja 3', '2024-02-16 12:31:59', 45),
(406, 25, 4, 'Payment Complete', '2024-02-16 16:24:41', 46),
(407, 31, 1, 'Payment Complete', '2024-02-16 16:24:45', 46),
(408, 25, 4, 'Payment Complete', '2024-02-16 16:24:52', 46),
(409, 31, 1, 'Payment Complete', '2024-02-16 16:24:55', 46),
(410, 25, 2, 'Payment Complete', '2024-02-16 16:24:59', 46),
(411, 26, 2, 'Payment Complete', '2024-02-16 16:25:00', 46),
(412, 31, 1, 'Payment Complete', '2024-02-16 16:25:03', 46),
(413, 27, 4, 'Payment Complete', '2024-02-16 16:25:09', 46),
(414, 31, 1, 'Payment Complete', '2024-02-16 16:25:11', 46),
(415, 25, 4, 'Meja 3', '2024-02-16 16:25:35', 47),
(417, 32, 1, 'Meja 3', '2024-02-16 16:25:46', 47),
(418, 25, 2, 'Meja 3', '2024-02-16 16:25:50', 47),
(419, 26, 2, 'Meja 3', '2024-02-16 16:25:51', 47),
(420, 31, 1, 'Meja 3', '2024-02-16 16:25:53', 47),
(421, 28, 1, 'Meja 9', '2024-02-16 16:42:40', 48),
(425, 33, 1, 'Meja 9', '2024-02-16 16:43:01', 48),
(426, 25, 2, 'Meja 9', '2024-02-16 16:43:03', 48),
(427, 26, 2, 'Meja 9', '2024-02-16 16:43:04', 48),
(428, 31, 1, 'Meja 9', '2024-02-16 16:43:06', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL,
  `persentase_diskon` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `persentase_diskon`, `id_transaksi`) VALUES
(13, 10, 2),
(15, 10, 8),
(17, 10, 25),
(18, 10, 30),
(19, 10, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_offline` int(11) NOT NULL,
  `harga_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kode_menu`, `nama_menu`, `harga_offline`, `harga_online`) VALUES
(25, 'KT', 'Kacang Tanah', 4500, 5400),
(26, 'KI', 'Kacang ijo', 4500, 5400),
(27, 'KW', 'Kacang Wijen', 7000, 8400),
(28, 'BK1', 'Boleng Kid 1', 18000, 22000),
(29, 'BK2', 'Boleng Kid 2', 18000, 22000),
(31, 'J', 'Jahe', 0, 0),
(32, 'P', 'Pandan', 0, 0),
(33, 'S', 'Soya', 5000, 6000),
(34, 'EJ', 'Extra Jahe', 10000, 12000),
(35, 'SP', 'Extra Pandan', 10000, 12000),
(36, 'ES', 'Extra Soya', 10000, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `uang_diterima` int(11) NOT NULL,
  `nominal_diskon` int(11) NOT NULL,
  `tgl_transaksi_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `metode_pembayaran`, `jenis_pembayaran`, `total_harga`, `uang_diterima`, `nominal_diskon`, `tgl_transaksi_final`) VALUES
(1, 'Cash', 'offline', 36000, 36000, 0, '2023-12-14'),
(2, 'Bank Transfer', 'offline', 32400, 32400, 3600, '2023-12-14'),
(3, 'GoPay', 'online', 19000, 19000, 0, '2023-12-14'),
(4, 'Bank Transfer', 'offline', 36000, 36000, 0, '2023-12-14'),
(5, 'Cash', 'offline', 18000, 18000, 0, '2023-12-14'),
(6, 'GoPay', 'online', 38000, 38000, 0, '2023-12-14'),
(7, 'Bank Transfer', 'offline', 30000, 30000, 0, '2023-12-14'),
(8, 'Cash', 'offline', 16200, 17000, 1800, '2023-12-14'),
(9, 'Cash', 'offline', 18000, 18000, 0, '2023-12-14'),
(10, 'GoPay', 'online', 19000, 19000, 0, '2023-12-14'),
(11, 'Cash', 'offline', 18000, 20000, 0, '2023-12-16'),
(12, 'WAITING PAYMENT', '', 0, 0, 0, '2023-12-14'),
(13, 'Cash', 'offline', 18000, 20000, 0, '2023-12-14'),
(14, 'Cash', 'offline', 18000, 18000, 0, '2023-12-14'),
(15, 'Cash', 'offline', 18000, 18000, 0, '2023-12-14'),
(16, 'Cash', 'offline', 18000, 18000, 0, '2023-12-14'),
(17, 'Cash', 'offline', 18000, 18000, 0, '2023-12-16'),
(18, 'GoFood', 'online', 19000, 19000, 0, '2023-12-16'),
(19, 'WAITING PAYMENT', '', 0, 0, 0, '2023-12-16'),
(20, 'Cash', 'offline', 18000, 18000, 0, '2023-12-16'),
(21, 'Bank Transfer', 'offline', 18000, 18000, 0, '2023-12-16'),
(22, 'Cash', 'offline', 18000, 18000, 0, '2023-12-19'),
(23, 'Cash', 'offline', 18000, 18000, 0, '2023-12-27'),
(24, 'Cash', 'offline', 18000, 18000, 0, '2023-12-27'),
(25, 'Cash', 'offline', 4050, 50000, 450, '2023-12-27'),
(26, 'Cash', 'offline', 18000, 18000, 0, '2023-12-28'),
(27, 'Bank Transfer', 'offline', 30000, 30000, 0, '2023-12-28'),
(28, 'Bank Transfer', 'offline', 18000, 18000, 0, '2023-12-29'),
(29, 'Bank Transfer', 'offline', 30000, 30000, 0, '2024-01-11'),
(30, 'Cash', 'offline', 4050, 10000, 450, '2023-12-29'),
(31, 'Cash', 'offline', 18000, 18000, 0, '2024-01-08'),
(32, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-01-08'),
(33, 'Cash', 'offline', 30000, 30000, 0, '2024-01-09'),
(34, 'GoFood', 'online', 35000, 35000, 0, '2024-01-09'),
(35, 'GoFood', 'online', 19000, 19000, 0, '2024-01-11'),
(36, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-01-11'),
(37, 'Bank Transfer', 'offline', 21600, 21600, 2400, '2024-01-16'),
(38, 'GoFood', 'online', 43200, 43200, 0, '2024-02-15'),
(39, 'Cash', 'offline', 18000, 20000, 0, '2024-02-15'),
(40, 'GoFood', 'online', 98400, 98400, 0, '2024-02-15'),
(41, 'Cash', 'offline', 18000, 20000, 0, '2024-02-15'),
(42, 'Cash', 'offline', 10000, 10000, 0, '2024-02-15'),
(43, 'Bank Transfer', 'offline', 64000, 64000, 0, '2024-02-16'),
(44, 'GoFood', 'online', 43600, 43600, 0, '2024-02-16'),
(45, 'Cash', 'offline', 23000, 50000, 0, '2024-02-16'),
(46, 'GoPay', 'online', 98400, 98400, 0, '2024-02-16'),
(47, 'Cash', 'offline', 36000, 50000, 0, '2024-02-16'),
(48, 'Cash', 'offline', 41000, 50000, 0, '2024-02-16');

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
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
