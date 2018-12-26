-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2018 at 06:29 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_fkip`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `ttl`, `jenis_kelamin`, `alamat`, `telepon`, `email`, `status`, `created_at`, `updated_at`) VALUES
(5, 'achmad', 'bandung, 19 Okt 1994', 'Laki-laki', 'Pondok girimande', '09231823', 'captainjoko212@gmail.com', 'Calon Anggota', '2018-09-28 20:43:11', '2018-09-28 20:43:11'),
(6, 'Dr. H. Hanafiah, M.M.Pd.', 'bandung, 19 Okt 1991', 'Laki-laki', 'Parakan Muncang 21', '082312832181', 'budi_dalton@gmail.com', 'aktif', '2018-09-28 21:00:07', '2018-09-28 21:00:07'),
(8, 'adit', 'bandung', 'Laki-laki', 'girimande', '087725654356', 'radit@gmail.com', 'Aktif', '2018-10-27 09:36:21', '2018-10-27 09:36:21'),
(9, 'Bambang', 'Bandung, 12 januari 1980', 'Laki-laki', 'Komplek Perumahan Kavling 1', '087721247312', 'mflive003@gmail.com', 'Aktif', '2018-12-23 00:46:06', '2018-12-23 00:46:06'),
(10, 'Monkey', 'Bandung, 12 januari 1980', 'Laki-laki', 'Komplek Perumahan Kavling 1', '087721247312', 'mflive003@gmail.com', 'Aktif', '2018-12-23 04:35:52', '2018-12-23 04:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_pinjaman` int(10) UNSIGNED NOT NULL,
  `angsuran_ke` int(11) DEFAULT NULL,
  `angsuran_bunga` int(11) DEFAULT NULL,
  `angsuran_pokok` int(11) DEFAULT NULL,
  `total_angsuran` int(11) DEFAULT NULL,
  `sisa_pinjaman` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `json_data` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `id_user`, `id_pinjaman`, `angsuran_ke`, `angsuran_bunga`, `angsuran_pokok`, `total_angsuran`, `sisa_pinjaman`, `jumlah`, `denda`, `status`, `tanggal_jatuh_tempo`, `tanggal_pembayaran`, `json_data`, `created_at`, `updated_at`) VALUES
(119, 6, 10, 0, 0, 0, 0, 1500000, 0, 0, 'lunas', '2018-12-21', NULL, NULL, '2018-12-21 14:40:03', NULL),
(120, 6, 10, 1, 37500, 125000, 162500, 1375000, 162500, 0, 'lunas', '2019-01-25', '2018-12-21', '{\"date\":\"21\\/12\\/2018\",\"angsuran_ke\":1,\"sisa_pinjaman\":1375000,\"total_angsuran_pokok\":125000,\"total_bunga\":37500,\"total_denda\":0,\"total_bayar\":162500,\"result\":[{\"id\":120,\"id_user\":6,\"id_pinjaman\":10,\"angsuran_ke\":1,\"angsuran_bunga\":37500,\"angsuran_pokok\":125000,\"total_angsuran\":162500,\"sisa_pinjaman\":1375000,\"jumlah\":0,\"denda\":0,\"status\":\"belum dibayar\",\"tanggal_jatuh_tempo\":\"2019-01-25 00:00:00\",\"tanggal_pembayaran\":null,\"json_data\":null,\"created_at\":\"2018-12-21 21:40:03\",\"updated_at\":null}],\"admin\":{\"id\":1,\"email\":\"accounting@koperasi.com\",\"nama\":\"accounting\",\"ttl\":\"bandung, 12 Juli 1993\",\"jenis_kelamin\":\"laki-laki\",\"telepon\":\"087722252312\",\"status_user\":\"accounting\",\"status\":\"aktif\",\"jabatan\":\"Bendahara\",\"created_at\":null,\"updated_at\":null},\"pinjaman\":{\"id\":6,\"id_user\":6,\"jumlah_pinjaman\":1500000,\"tenor\":\"12\",\"angsuran_ke\":0,\"sisa_pinjaman\":1500000,\"bunga\":2.5,\"created_at\":\"2018-09-29 04:00:07\",\"updated_at\":\"2018-09-29 04:00:07\",\"nama\":\"Budi\",\"ttl\":\"bandung, 19 Okt 1991\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Parakan Muncang 21\",\"telepon\":\"082312832181\",\"email\":\"budi_dalton@gmail.com\",\"status\":\"aktif\"},\"id\":\"120\",\"id_pinjaman\":\"10\"}', '2018-12-21 14:40:03', '2018-12-21 07:40:13'),
(121, 6, 10, 2, 34400, 125000, 159400, 1250000, 0, 0, 'lunas', '2019-02-25', '2018-12-21', NULL, '2018-12-21 14:40:03', '2018-12-21 07:40:36'),
(122, 6, 10, 3, 31300, 125000, 156300, 1125000, 315700, 0, 'lunas', '2019-03-25', '2018-12-21', '{\"date\":\"21\\/12\\/2018\",\"angsuran_ke\":3,\"sisa_pinjaman\":1125000,\"total_angsuran_pokok\":250000,\"total_bunga\":65700,\"total_denda\":0,\"total_bayar\":315700,\"result\":[{\"id\":121,\"id_user\":6,\"id_pinjaman\":10,\"angsuran_ke\":2,\"angsuran_bunga\":34400,\"angsuran_pokok\":125000,\"total_angsuran\":159400,\"sisa_pinjaman\":1250000,\"jumlah\":0,\"denda\":0,\"status\":\"belum dibayar\",\"tanggal_jatuh_tempo\":\"2019-02-25 00:00:00\",\"tanggal_pembayaran\":null,\"json_data\":null,\"created_at\":\"2018-12-21 21:40:03\",\"updated_at\":null},{\"id\":122,\"id_user\":6,\"id_pinjaman\":10,\"angsuran_ke\":3,\"angsuran_bunga\":31300,\"angsuran_pokok\":125000,\"total_angsuran\":156300,\"sisa_pinjaman\":1125000,\"jumlah\":0,\"denda\":0,\"status\":\"belum dibayar\",\"tanggal_jatuh_tempo\":\"2019-03-25 00:00:00\",\"tanggal_pembayaran\":null,\"json_data\":null,\"created_at\":\"2018-12-21 21:40:03\",\"updated_at\":null}],\"admin\":{\"id\":1,\"email\":\"accounting@koperasi.com\",\"nama\":\"accounting\",\"ttl\":\"bandung, 12 Juli 1993\",\"jenis_kelamin\":\"laki-laki\",\"telepon\":\"087722252312\",\"status_user\":\"accounting\",\"status\":\"aktif\",\"jabatan\":\"Bendahara\",\"created_at\":null,\"updated_at\":null},\"pinjaman\":{\"id\":6,\"id_user\":6,\"jumlah_pinjaman\":1500000,\"tenor\":\"12\",\"angsuran_ke\":1,\"sisa_pinjaman\":1375000,\"bunga\":2.5,\"created_at\":\"2018-09-29 04:00:07\",\"updated_at\":\"2018-09-29 04:00:07\",\"nama\":\"Budi\",\"ttl\":\"bandung, 19 Okt 1991\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Parakan Muncang 21\",\"telepon\":\"082312832181\",\"email\":\"budi_dalton@gmail.com\",\"status\":\"aktif\"},\"id\":\"122\",\"id_pinjaman\":\"10\"}', '2018-12-21 14:40:03', '2018-12-21 07:40:36'),
(123, 6, 10, 4, 28200, 125000, 153200, 1000000, 153200, 0, 'lunas', '2019-04-25', '2018-12-21', '{\"date\":\"21\\/12\\/2018\",\"angsuran_ke\":4,\"sisa_pinjaman\":1000000,\"total_angsuran_pokok\":125000,\"total_bunga\":28200,\"total_denda\":0,\"total_bayar\":153200,\"result\":[{\"id\":123,\"id_user\":6,\"id_pinjaman\":10,\"angsuran_ke\":4,\"angsuran_bunga\":28200,\"angsuran_pokok\":125000,\"total_angsuran\":153200,\"sisa_pinjaman\":1000000,\"jumlah\":0,\"denda\":0,\"status\":\"belum dibayar\",\"tanggal_jatuh_tempo\":\"2019-04-25 00:00:00\",\"tanggal_pembayaran\":null,\"json_data\":null,\"created_at\":\"2018-12-21 21:40:03\",\"updated_at\":null}],\"admin\":{\"id\":1,\"email\":\"accounting@koperasi.com\",\"nama\":\"accounting\",\"ttl\":\"bandung, 12 Juli 1993\",\"jenis_kelamin\":\"laki-laki\",\"telepon\":\"087722252312\",\"status_user\":\"accounting\",\"status\":\"aktif\",\"jabatan\":\"Bendahara\",\"created_at\":null,\"updated_at\":null},\"pinjaman\":{\"id\":6,\"id_user\":6,\"jumlah_pinjaman\":1500000,\"tenor\":\"12\",\"angsuran_ke\":3,\"sisa_pinjaman\":1125000,\"bunga\":2.5,\"created_at\":\"2018-09-29 04:00:07\",\"updated_at\":\"2018-09-29 04:00:07\",\"nama\":\"Budi\",\"ttl\":\"bandung, 19 Okt 1991\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Parakan Muncang 21\",\"telepon\":\"082312832181\",\"email\":\"budi_dalton@gmail.com\",\"status\":\"aktif\"},\"id\":\"123\",\"id_pinjaman\":\"10\"}', '2018-12-21 14:40:03', '2018-12-21 07:40:45'),
(124, 6, 10, 5, 25000, 125000, 150000, 875000, 0, 0, 'belum dibayar', '2019-05-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(125, 6, 10, 6, 21900, 125000, 146900, 750000, 0, 0, 'belum dibayar', '2019-06-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(126, 6, 10, 7, 18800, 125000, 143800, 625000, 0, 0, 'belum dibayar', '2019-07-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(127, 6, 10, 8, 15700, 125000, 140700, 500000, 0, 0, 'belum dibayar', '2019-08-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(128, 6, 10, 9, 12500, 125000, 137500, 375000, 0, 0, 'belum dibayar', '2019-09-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(129, 6, 10, 10, 9400, 125000, 134400, 250000, 0, 0, 'belum dibayar', '2019-10-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(130, 6, 10, 11, 6300, 125000, 131300, 125000, 0, 0, 'belum dibayar', '2019-11-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(131, 6, 10, 12, 3200, 125000, 128200, 0, 0, 0, 'belum dibayar', '2019-12-25', NULL, NULL, '2018-12-21 14:40:03', NULL),
(132, 6, 11, 0, 0, 0, 0, 1500000, 0, 0, 'lunas', '2018-12-24', NULL, NULL, '2018-12-24 05:28:27', NULL),
(133, 6, 11, 1, 37500, 125000, 162500, 1375000, 0, 0, 'belum dibayar', '2019-01-31', NULL, NULL, '2018-12-24 05:28:27', NULL),
(134, 6, 11, 2, 34400, 125000, 159400, 1250000, 0, 0, 'belum dibayar', '2019-03-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(135, 6, 11, 3, 31300, 125000, 156300, 1125000, 0, 0, 'belum dibayar', '2019-04-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(136, 6, 11, 4, 28200, 125000, 153200, 1000000, 0, 0, 'belum dibayar', '2019-05-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(137, 6, 11, 5, 25000, 125000, 150000, 875000, 0, 0, 'belum dibayar', '2019-06-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(138, 6, 11, 6, 21900, 125000, 146900, 750000, 0, 0, 'belum dibayar', '2019-07-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(139, 6, 11, 7, 18800, 125000, 143800, 625000, 0, 0, 'belum dibayar', '2019-08-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(140, 6, 11, 8, 15700, 125000, 140700, 500000, 0, 0, 'belum dibayar', '2019-09-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(141, 6, 11, 9, 12500, 125000, 137500, 375000, 0, 0, 'belum dibayar', '2019-10-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(142, 6, 11, 10, 9400, 125000, 134400, 250000, 0, 0, 'belum dibayar', '2019-11-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(143, 6, 11, 11, 6300, 125000, 131300, 125000, 0, 0, 'belum dibayar', '2019-12-03', NULL, NULL, '2018-12-24 05:28:27', NULL),
(144, 6, 11, 12, 3200, 125000, 128200, 0, 0, 0, 'belum dibayar', '2020-01-03', NULL, NULL, '2018-12-24 05:28:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi_pinjaman`
--

CREATE TABLE `aplikasi_pinjaman` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `jumlah_diajukan` int(11) DEFAULT NULL,
  `jumlah_disetujui` int(11) DEFAULT NULL,
  `bulan_cicilan_diajukan` int(11) DEFAULT NULL,
  `bulan_cicilan_disetujui` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'simpanan_pokok', 160000, NULL, '2018-12-15 08:36:53'),
(2, 'simpanan_wajib', 75000, NULL, NULL),
(3, 'bunga', 2.5, NULL, '2018-12-19 05:55:04'),
(4, 'provisi', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2018_09_17_160606_create_table_anggota', 1),
(23, '2018_09_25_170805_create_simpanan_pokok', 1),
(24, '2018_09_25_171103_create_simpanan_wajib', 1),
(25, '2018_09_29_032621_create_table_config', 2),
(27, '2018_10_09_170902_create_table_aplikasi_pinjaman', 3),
(32, '2018_10_31_081300_create_table_pinjaman', 4),
(33, '2018_10_31_081506_create_table_angsuran', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `jumlah_pinjaman` int(11) DEFAULT NULL,
  `tenor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angsuran_ke` int(11) DEFAULT NULL,
  `sisa_pinjaman` int(11) DEFAULT NULL,
  `bunga` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `id_user`, `jumlah_pinjaman`, `tenor`, `angsuran_ke`, `sisa_pinjaman`, `bunga`, `created_at`, `updated_at`) VALUES
(10, 6, 1500000, '12', 4, 1000000, 2.5, '2018-12-21 07:40:03', '2018-12-21 07:40:45'),
(11, 6, 1500000, '12', 0, 1500000, 2.5, '2018-12-23 22:28:27', '2018-12-23 22:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_pokok`
--

CREATE TABLE `simpanan_pokok` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanan_pokok`
--

INSERT INTO `simpanan_pokok` (`id`, `id_user`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 5, 150000, '2018-09-29', '2018-09-28 20:43:11', '2018-09-28 20:43:11'),
(3, 6, 150000, '2018-09-30', '2018-09-28 21:00:07', '2018-09-28 21:00:07'),
(5, 8, 150000, '2018-10-27', '2018-10-27 09:36:21', '2018-10-27 09:36:21'),
(6, 9, 160000, '2018-11-01', '2018-12-23 00:46:06', '2018-12-23 00:46:06'),
(7, 10, 160000, '2018-12-03', '2018-12-23 04:35:52', '2018-12-23 04:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_sukarela`
--

CREATE TABLE `simpanan_sukarela` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanan_sukarela`
--

INSERT INTO `simpanan_sukarela` (`id`, `id_user`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(6, 6, 75000, '2018-10-11', '2018-10-03 10:28:47', '2018-10-03 10:28:47'),
(12, 6, 14000, '2018-12-27', '2018-10-31 23:03:31', '2018-12-14 23:03:31'),
(13, 8, 75000, '2018-12-03', '2018-12-23 00:39:33', '2018-12-23 00:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_wajib`
--

CREATE TABLE `simpanan_wajib` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanan_wajib`
--

INSERT INTO `simpanan_wajib` (`id`, `id_user`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(10, 6, 75000, '2018-12-04', '2018-12-02 21:08:07', '2018-12-02 21:08:07'),
(11, 8, 75000, '2018-12-01', '2018-12-23 00:39:48', '2018-12-23 00:39:48'),
(12, 8, 75000, '2018-12-19', '2018-12-23 00:39:54', '2018-12-23 00:39:54'),
(13, 6, 75000, '2018-12-04', '2018-12-23 00:40:05', '2018-12-23 00:40:05'),
(14, 6, 75000, '2018-12-05', '2018-12-23 00:40:10', '2018-12-23 00:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `ttl`, `jenis_kelamin`, `telepon`, `status_user`, `status`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'accounting@koperasi.com', '$2y$10$d5jYZMGt5yacW1sM8lix3.a/Joecz7dlHincGRkIS2Qt6CY3MKBla', 'accounting', 'bandung, 12 Juli 1993', 'laki-laki', '087722252312', 'accounting', 'aktif', 'Bendahara', 'zyzqF1YezIomFuGyX4rXOs6dpojdzaIjoOjOyZWyI8P8k8SpVOgnUMLqZBb9', NULL, NULL),
(2, 'pengurus@koperasi.com', '$2y$10$M2b.KIwiv/fhWx5g.p8LNei8KlZ.D4DN2k//5/ezo4HTtHob2Njfy', 'pengurus', 'bandung, 19 Okt 1994', 'Laki-laki', '082312832181', 'karyawan', 'aktif', 'Juru Bayar', 'kVzpSJuDmLlJdHFNptmuXJz8Sxu2ACtdBgJn85wednSShIJDnKgkWMyyhFSb', '2018-10-09 05:43:31', '2018-10-09 05:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `angsuran_id_pinjaman_foreign` (`id_pinjaman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `aplikasi_pinjaman`
--
ALTER TABLE `aplikasi_pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplikasi_pinjaman_id_user_foreign` (`id_user`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjaman_id_user_foreign` (`id_user`);

--
-- Indexes for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simpanan_pokok_id_user_foreign` (`id_user`);

--
-- Indexes for table `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simpanan_sukarela_id_user_foreign` (`id_user`);

--
-- Indexes for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simpanan_wajib_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `aplikasi_pinjaman`
--
ALTER TABLE `aplikasi_pinjaman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_id_pinjaman_foreign` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `aplikasi_pinjaman`
--
ALTER TABLE `aplikasi_pinjaman`
  ADD CONSTRAINT `aplikasi_pinjaman_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD CONSTRAINT `simpanan_pokok_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  ADD CONSTRAINT `simpanan_sukarela_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD CONSTRAINT `simpanan_wajib_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
