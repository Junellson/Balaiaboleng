-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 06:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.25

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
  `nama_bill` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(340, 25, 1, 'Payment Complete', '2024-01-03 16:43:29', 31),
(343, 26, 4, 'Payment Complete', '2024-01-05 23:05:46', 32),
(344, 31, 1, 'Payment Complete', '2024-01-05 23:05:47', 32),
(345, 25, 4, 'Payment Complete', '2024-01-05 23:05:57', 33),
(347, 27, 4, 'meja 6', '2024-01-06 11:09:44', 34),
(348, 31, 1, 'meja 6', '2024-01-06 11:09:45', 34),
(351, 25, 4, 'Payment Complete', '2024-01-16 19:23:18', 35),
(352, 28, 1, 'Payment Complete', '2024-01-16 19:24:11', 36),
(353, 31, 1, 'Payment Complete', '2024-01-16 19:24:12', 36),
(354, 27, 4, 'meja 2', '2024-01-16 19:24:22', 37),
(355, 32, 1, 'meja 2', '2024-01-16 19:24:23', 37),
(371, 26, 4, 'Payment Complete', '2024-02-15 16:01:04', 38),
(372, 31, 1, 'Payment Complete', '2024-02-15 16:01:07', 38),
(373, 26, 4, 'meja 3', '2024-02-15 16:01:13', 39),
(374, 31, 1, 'meja 3', '2024-02-15 16:01:14', 39),
(377, 26, 4, 'Payment Complete', '2024-02-15 16:02:11', 41),
(378, 31, 1, 'Payment Complete', '2024-02-15 16:02:12', 41),
(379, 26, 4, 'Payment Complete', '2024-02-15 16:11:51', 42),
(380, 31, 1, 'Payment Complete', '2024-02-15 16:11:52', 42),
(381, 26, 4, 'Payment Complete', '2024-02-15 16:12:36', 43),
(382, 31, 1, 'Payment Complete', '2024-02-15 16:12:37', 43),
(383, 25, 4, 'Payment Complete', '2024-02-15 16:21:44', 44),
(384, 31, 1, 'Payment Complete', '2024-02-15 16:21:51', 44),
(385, 25, 4, 'Payment Complete', '2024-02-15 17:17:38', 45),
(386, 31, 1, 'Payment Complete', '2024-02-15 17:17:41', 45),
(387, 26, 4, 'Payment Complete', '2024-02-15 17:17:44', 45),
(388, 32, 1, 'Payment Complete', '2024-02-15 17:17:45', 45),
(389, 25, 4, 'Payment Complete', '2024-02-15 18:02:08', 46),
(390, 31, 1, 'Payment Complete', '2024-02-15 18:02:09', 46),
(391, 25, 4, 'Payment Complete', '2024-02-17 21:54:58', 47),
(392, 31, 1, 'Payment Complete', '2024-02-17 21:55:00', 47),
(393, 25, 4, 'Payment Complete', '2024-02-17 21:55:03', 48),
(394, 31, 1, 'Payment Complete', '2024-02-17 21:55:06', 48),
(395, 28, 1, 'Payment Complete', '2024-02-17 21:55:32', 49),
(396, 31, 1, 'Payment Complete', '2024-02-17 21:55:33', 49),
(397, 25, 2, 'meja 3', '2024-02-18 19:43:04', 50),
(398, 26, 2, 'meja 3', '2024-02-18 19:43:06', 50),
(399, 25, 2, 'meja 3', '2024-02-18 19:43:14', 51),
(400, 26, 2, 'meja 3', '2024-02-18 19:43:17', 51),
(401, 31, 1, 'meja 3', '2024-02-18 19:43:19', 51),
(402, 25, 2, 'meja 3', '2024-02-18 19:43:29', 52),
(403, 26, 2, 'meja 3', '2024-02-18 19:43:31', 52),
(407, 28, 1, 'meja 3', '2024-02-18 19:46:19', 53),
(408, 31, 1, 'meja 3', '2024-02-18 19:46:20', 53),
(409, 27, 4, 'meja 5', '2024-02-18 19:46:33', 54),
(410, 31, 1, 'meja 5', '2024-02-18 19:46:34', 54),
(415, 25, 2, 'Payment Complete', '2024-02-18 19:51:37', 55),
(416, 26, 2, 'Payment Complete', '2024-02-18 19:51:39', 55),
(417, 31, 1, 'Payment Complete', '2024-02-18 19:51:44', 55),
(418, 25, 2, 'Payment Complete', '2024-02-18 19:51:55', 56),
(419, 26, 2, 'Payment Complete', '2024-02-18 19:51:57', 56),
(420, 31, 1, 'Payment Complete', '2024-02-18 19:52:00', 56),
(421, 25, 2, 'Payment Complete', '2024-02-18 19:52:07', 57),
(422, 26, 2, 'Payment Complete', '2024-02-18 19:52:10', 57),
(423, 31, 1, 'Payment Complete', '2024-02-18 19:52:11', 57),
(434, 25, 4, 'Payment Complete', '2024-02-19 23:20:17', 59),
(435, 31, 1, 'Payment Complete', '2024-02-19 23:20:18', 59),
(436, 27, 4, 'Payment Complete', '2024-02-19 23:23:53', 60),
(437, 31, 1, 'Payment Complete', '2024-02-19 23:23:54', 60),
(438, 26, 4, 'Payment Complete', '2024-02-19 23:24:01', 61),
(439, 31, 1, 'Payment Complete', '2024-02-19 23:24:01', 61),
(440, 27, 2, 'Payment Complete', '2024-02-19 23:24:23', 62),
(441, 26, 1, 'Payment Complete', '2024-02-19 23:24:24', 62),
(442, 25, 1, 'Payment Complete', '2024-02-19 23:24:25', 62),
(443, 31, 1, 'Payment Complete', '2024-02-19 23:24:25', 62),
(444, 25, 4, 'Payment Complete', '2024-02-19 23:25:02', 63),
(445, 31, 1, 'Payment Complete', '2024-02-19 23:25:04', 63),
(448, 25, 4, 'Payment Complete', '2024-02-20 18:51:30', 64),
(449, 31, 1, 'Payment Complete', '2024-02-20 18:51:31', 64),
(450, 27, 4, 'Payment Complete', '2024-02-20 18:51:35', 65),
(451, 31, 1, 'Payment Complete', '2024-02-20 18:51:36', 65),
(452, 26, 4, 'Payment Complete', '2024-02-20 18:51:40', 66),
(453, 25, 4, 'meja 6', '2024-02-20 18:51:48', 67),
(454, 25, 4, 'Payment Complete', '2024-02-20 18:53:26', 68),
(455, 31, 1, 'Payment Complete', '2024-02-20 18:53:27', 68),
(456, 25, 4, 'meja 6', '2024-02-20 20:34:32', 69),
(457, 31, 1, 'meja 6', '2024-02-20 20:34:33', 69),
(458, 26, 4, 'Payment Complete', '2024-02-20 20:34:40', 70),
(459, 31, 1, 'Payment Complete', '2024-02-20 20:34:42', 70),
(460, 27, 4, 'Payment Complete', '2024-02-20 20:35:09', 71),
(461, 31, 1, 'Payment Complete', '2024-02-20 20:35:11', 71),
(463, 28, 1, 'Payment Complete', '2024-02-20 20:35:35', 72),
(464, 32, 1, 'Payment Complete', '2024-02-20 20:35:38', 72),
(465, 25, 4, 'Payment Complete', '2024-02-21 11:01:22', 73),
(466, 31, 1, 'Payment Complete', '2024-02-21 11:01:23', 73),
(467, 25, 4, 'Payment Complete', '2024-02-21 11:01:31', 74),
(468, 31, 1, 'Payment Complete', '2024-02-21 11:01:32', 74),
(469, 27, 4, 'Payment Complete', '2024-02-21 18:58:09', 75),
(470, 31, 1, 'Payment Complete', '2024-02-21 18:58:10', 75),
(471, 30, 1, 'Payment Complete', '2024-02-21 18:58:15', 76),
(472, 32, 1, 'Payment Complete', '2024-02-21 18:58:17', 76),
(473, 25, 4, 'Payment Complete', '2024-02-22 08:59:26', 77),
(474, 31, 1, 'Payment Complete', '2024-02-22 08:59:27', 77),
(478, 25, 3, 'meja 4', '2024-02-22 09:54:25', 78),
(479, 31, 1, 'meja 4', '2024-02-22 09:54:27', 78),
(481, 25, 4, '', '2024-02-22 10:35:40', 79);

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) NOT NULL,
  `persentase_diskon` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `persentase_diskon`, `id_transaksi`) VALUES
(13, 10, 2),
(15, 10, 8),
(17, 10, 25),
(19, 10, 30),
(20, 10, 31),
(25, 10, 61),
(27, 10, 63),
(28, 10, 67),
(29, 10, 69);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kode_menu`, `nama_menu`, `harga_offline`, `harga_online`) VALUES
(25, 'KT', 'Kacang Tanah', 4500, 4750),
(26, 'KI', 'Kacang ijo', 4500, 4750),
(27, 'KW', 'Kacang Wijen', 4500, 4750),
(28, 'BK1', 'Boleng Kid 1', 30000, 35000),
(29, 'BK2', 'Boleng Kid 2', 30000, 35000),
(30, 'BK3', 'Boleng Kid 3', 30000, 35000),
(31, 'J', 'Jahe', 0, 0),
(32, 'P', 'Pandan', 0, 0),
(33, 'S', 'Soya', 6000, 6000),
(34, 'SJ', 'Sup Jahe', 6000, 7000),
(35, 'SP', 'Sup Pandan', 6000, 7000),
(36, 'SS', 'Sup Soya', 6000, 7000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(29, 'Cash', 'offline', 30000, 30000, 0, '2024-01-03'),
(30, 'WAITING PAYMENT', '', 16200, 0, 0, '2024-01-03'),
(31, 'Cash', 'offline', 4050, 50000, 450, '2024-01-03'),
(32, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-01-05'),
(33, 'GoFood', 'online', 19000, 19000, 0, '2024-01-05'),
(34, 'Bank Transfer', 'offline', 18000, 20000, 0, '2024-01-06'),
(35, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-01-16'),
(36, 'Bank Transfer', 'offline', 30000, 30000, 0, '2024-01-16'),
(37, 'GoFood', 'online', 19000, 19000, 0, '2024-01-16'),
(38, 'Cash', 'offline', 18000, 18000, 0, '2024-02-15'),
(39, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-15'),
(41, 'GoPay', 'online', 19000, 19000, 0, '2024-02-15'),
(42, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-15'),
(43, 'Cash', 'offline', 18000, 18000, 0, '2024-02-15'),
(44, 'Cash', 'offline', 18000, 18000, 0, '2024-02-15'),
(45, 'Cash', 'offline', 36000, 36000, 0, '2024-02-15'),
(46, 'Cash', 'offline', 18000, 18000, 0, '2024-02-15'),
(47, 'Cash', 'offline', 18000, 18000, 0, '2024-02-17'),
(48, 'Cash', 'offline', 18000, 18000, 0, '2024-02-17'),
(49, 'Bank Transfer', 'offline', 30000, 30000, 0, '2024-02-17'),
(50, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-18'),
(51, 'Cash', 'offline', 18000, 18000, 0, '2024-02-18'),
(52, 'Bank Transfer', 'offline', 36000, 36000, 0, '2024-02-18'),
(53, 'Cash', 'offline', 48000, 48000, 0, '2024-02-18'),
(54, 'Cash', 'offline', 18000, 18000, 0, '2024-02-18'),
(55, 'GoFood', 'online', 19000, 19000, 0, '2024-02-18'),
(56, 'GoPay', 'online', 19000, 19000, 0, '2024-02-18'),
(57, 'GoPay', 'online', 19000, 19000, 0, '2024-02-18'),
(59, 'Cash', 'offline', 18000, 18000, 0, '2024-02-19'),
(60, 'GoPay', 'online', 19000, 19000, 0, '2024-02-19'),
(61, 'Bank Transfer', 'offline', 16200, 16200, 1800, '2024-02-19'),
(62, 'GoFood', 'online', 19000, 19000, 0, '2024-02-19'),
(63, 'Cash', 'offline', 16200, 16200, 1800, '2024-02-19'),
(64, 'Cash', 'offline', 18000, 18000, 0, '2024-02-20'),
(65, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-20'),
(66, 'GoPay', 'online', 19000, 19000, 0, '2024-02-20'),
(67, 'Bank Transfer', 'offline', 16200, 16200, 1800, '2024-02-20'),
(68, 'GoFood', 'online', 19000, 19000, 0, '2024-02-20'),
(69, 'Bank Transfer', 'offline', 16200, 16200, 1800, '2024-02-20'),
(70, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-20'),
(71, 'GoPay', 'online', 19000, 19000, 0, '2024-02-20'),
(72, 'GoFood', 'online', 35000, 35000, 0, '2024-02-20'),
(73, 'Bank Transfer', 'offline', 18000, 18000, 0, '2024-02-21'),
(74, 'Cash', 'offline', 18000, 18000, 0, '2024-02-21'),
(75, 'GoPay', 'online', 19000, 19000, 0, '2024-02-21'),
(76, 'Bank Transfer', 'offline', 30000, 30000, 0, '2024-02-21'),
(77, 'Cash', 'offline', 18000, 18000, 0, '2024-02-22'),
(78, 'Bank Transfer', 'offline', 13500, 13500, 0, '2024-02-22');

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
(1, 'admin', 'e9fb1dffafbe03895c039e7b4e7c6e5e', 'User Admin', 'admin'),
(2, 'karyawan', '8911cbd520df14b17b905e5e3beeff1b', 'User Karyawan', 'karyawan');

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
