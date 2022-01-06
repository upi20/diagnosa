-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2022 at 04:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `diagnosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `id_gejala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id`, `id_penyakit`, `id_gejala`) VALUES
(13, 18, 104),
(29, 18, 105),
(30, 18, 106),
(10, 18, 108),
(31, 18, 109),
(32, 18, 110),
(9, 19, 111),
(4, 19, 112),
(3, 19, 113),
(38, 19, 115),
(91, 20, 104),
(92, 20, 116),
(93, 20, 117),
(94, 20, 118),
(95, 20, 119),
(99, 20, 120),
(100, 20, 121),
(101, 21, 122),
(102, 21, 123),
(103, 21, 124),
(104, 21, 125),
(105, 21, 126),
(134, 22, 104),
(135, 22, 109),
(107, 22, 127),
(108, 22, 128),
(109, 22, 129),
(111, 22, 130),
(112, 22, 131),
(113, 22, 132),
(114, 22, 133),
(115, 23, 134),
(116, 23, 135),
(117, 23, 136),
(118, 23, 137),
(119, 23, 138),
(120, 23, 141),
(136, 24, 104),
(137, 24, 109),
(123, 24, 128),
(124, 24, 129),
(125, 24, 130),
(126, 24, 132),
(127, 24, 133),
(138, 24, 142),
(139, 24, 143),
(130, 25, 144),
(131, 25, 145),
(132, 25, 146),
(133, 25, 147);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_detail`
--

CREATE TABLE `chat_detail` (
  `id_chat_detail` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_user`, `score`, `keterangan`, `status`, `created_at`) VALUES
(1, 22, 60, 'Gingivitis (Radang gusi)', 'Aktif', '2022-01-06 15:14:39'),
(2, 23, 40, 'Karies Gigi (gigi berlubang)', 'Aktif', '2022-01-06 15:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_detail`
--

CREATE TABLE `diagnosa_detail` (
  `id_diagnosa_detail` int(11) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa_detail`
--

INSERT INTO `diagnosa_detail` (`id_diagnosa_detail`, `id_diagnosa`, `id_gejala`, `jawaban`, `nilai`, `created_at`) VALUES
(1, 1, 104, '1', 10, '2022-01-06 15:14:39'),
(2, 1, 105, '1', 10, '2022-01-06 15:14:39'),
(3, 1, 106, '1', 10, '2022-01-06 15:14:39'),
(4, 1, 108, '1', 10, '2022-01-06 15:14:39'),
(5, 1, 109, '1', 10, '2022-01-06 15:14:39'),
(6, 1, 110, '1', 10, '2022-01-06 15:14:39'),
(7, 2, 111, '1', 10, '2022-01-06 15:16:24'),
(8, 2, 112, '1', 10, '2022-01-06 15:16:24'),
(9, 2, 113, '1', 10, '2022-01-06 15:16:24'),
(10, 2, 115, '1', 10, '2022-01-06 15:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama`, `nilai`, `created_at`) VALUES
(104, 'G001', 'Bau mulut', 10, '2020-07-10 00:35:27'),
(105, 'G002', 'Gusi bengkak, merah dan berdarah', 10, '2020-07-10 00:35:45'),
(106, 'G003', 'Gingival berkaratin, gaung luka diantara gigi dan ', 10, '2020-07-10 00:36:04'),
(108, 'G004', 'Pembesaran limfoid di kepala, leher, atau rahang', 10, '2020-07-10 00:36:52'),
(109, 'G005', 'Demam', 10, '2020-07-10 00:37:04'),
(110, 'G006', 'Nyeri gusi', 10, '2020-07-10 00:37:17'),
(111, 'G007', 'Sakit gigi', 10, '2020-07-10 00:37:36'),
(112, 'G008', 'Nyeri ringan hingga tajam saat mengonsumsi makanan', 10, '2020-07-10 00:38:00'),
(113, 'G009', 'Noda berwarna cokelat, hitam atau putih pada permu', 10, '2020-07-10 00:38:22'),
(115, 'G010', 'Nyeri saat menggigit makanan', 10, '2020-07-14 13:29:26'),
(116, 'G011', 'Gusi berdarah dan kemerahan', 10, '2020-07-14 13:30:19'),
(117, 'G012', 'Gusi membengkak dan atau bernanah', 10, '2020-07-14 13:30:31'),
(118, 'G013', 'Gusi melorot atau gigi tampak menjadi panjang', 10, '2020-07-14 13:30:54'),
(119, 'G014', 'Gigi goyang dan sensitive', 10, '2020-07-14 13:31:29'),
(120, 'G015', 'Gigi menjadi meregang (timbul celah-celah diantara gigi)', 10, '2020-07-14 15:18:41'),
(121, 'G016', 'Gigi menjadi linu padahal tidak ada yang berlubang', 10, '2020-07-14 15:19:03'),
(122, 'G017', 'Hilangnya nafsu makan', 10, '2020-07-14 15:19:46'),
(123, 'G018', 'Terdapat luka yang cukup besar dimulut', 10, '2020-07-14 15:20:00'),
(124, 'G019', 'Luka biasanya terjadi beberapa kali pada area yang sama', 10, '2020-07-14 15:20:35'),
(125, 'G020', 'Luka menyebar ke bagian luar bibir', 10, '2020-07-14 15:20:49'),
(126, 'G021', 'Tidak dapat makan dan minum', 10, '2020-07-14 15:21:01'),
(127, 'G022', 'Rasa pahit dimulut', 10, '2020-07-14 15:21:34'),
(128, 'G023', 'Gelisah', 10, '2020-07-14 15:21:51'),
(129, 'G024', 'Kelelahan', 10, '2020-07-14 15:22:11'),
(130, 'G025', 'Gusi mudah berdarah', 10, '2020-07-14 15:22:20'),
(131, 'G026', 'Terdapat kantung nanah yang seperti benjolan dengan warna kuning', 10, '2020-07-14 15:22:36'),
(132, 'G027', 'Kelenjer getah bening di bawah rahang membengkak', 10, '2020-07-14 15:22:54'),
(133, 'G028', 'Mengunyah dan menelan makanan menyebabkan rasa nyeri', 10, '2020-07-14 15:23:18'),
(134, 'G029', 'Pecah-pecah dan kemerahan pada sudut mulut', 10, '2020-07-14 15:23:47'),
(135, 'G030', 'Muncul bintik-bintik kuning, putih atau krem di dalam mulut', 10, '2020-07-14 15:24:10'),
(136, 'G031', 'Sedikit pendarahan apabila lesi tergores', 10, '2020-07-14 15:24:29'),
(137, 'G032', 'Lesi menyerupai keju', 10, '2020-07-14 15:24:48'),
(138, 'G033', 'Di dalam mulut seperti kapas', 10, '2020-07-14 15:25:03'),
(141, 'G034', 'Kehilangan selera makan', 10, '2021-12-21 17:45:11'),
(142, 'G035', 'Mengunyah dan menelan makanan menyebabkan rasa nyeri', 10, '2021-12-21 17:45:30'),
(143, 'G036', 'Ujung-ujung gusi yang terletak diantara dua gigi mengalami pengikisan', 10, '2021-12-21 17:45:38'),
(144, 'G037', 'Rasa sakit dan tidak nyaman pada mulut saat makan makanan manis atau asam', 10, '2021-12-21 17:45:46'),
(145, 'G038', 'Rasa tidak nyaman pada saat cuaca dingin', 10, '2021-12-21 17:45:55'),
(146, 'G039', 'Sakit pada saat menyikat gigi', 10, '2021-12-21 17:46:07'),
(147, 'G040', 'Gusi menurun', 10, '2021-12-21 17:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lev_id` int(11) NOT NULL,
  `lev_nama` varchar(50) NOT NULL,
  `lev_keterangan` text NOT NULL,
  `lev_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lev_id`, `lev_nama`, `lev_keterangan`, `lev_status`, `created_at`) VALUES
(2, 'Admin', '-', 'Aktif', '2020-06-18 09:40:31'),
(4, 'Dokter', '-', 'Aktif', '2020-06-18 10:20:10'),
(5, 'Pengguna', '-', 'Aktif', '2020-06-18 10:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_menu_id` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_keterangan` text NOT NULL,
  `menu_index` int(11) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_menu_id`, `menu_nama`, `menu_keterangan`, `menu_index`, `menu_icon`, `menu_url`, `menu_status`, `created_at`) VALUES
(1, 0, 'Dashboard', '-', 1, 'fa fa-suitcase', 'dashboard', 'Aktif', '2020-06-18 09:40:07'),
(2, 0, 'Pengaturan', '-', 10, 'fa fa-cogs', '#', 'Aktif', '2020-06-18 09:40:07'),
(3, 2, 'Hak Akses', '-', 1, 'fa fa-caret-right', 'pengaturan/hakAkses', 'Aktif', '2020-06-18 09:40:07'),
(4, 2, 'Menu', '-', 2, 'fa fa-caret-right', 'pengaturan/menu', 'Aktif', '2020-06-18 09:40:07'),
(5, 2, 'Level', '-', 3, 'fa fa-caret-right', 'pengaturan/level', 'Aktif', '2020-06-18 09:40:07'),
(6, 2, 'Pengguna', '-', 4, 'fa fa-caret-right', 'pengaturan/pengguna', 'Aktif', '2020-06-18 09:40:07'),
(15, 0, 'Home', '-', 1, 'fa fa-home', 'home', 'Aktif', '2020-06-18 10:24:18'),
(16, 0, 'Gejala', '-', 3, 'fa fa-bug', 'gejala/data', 'Aktif', '2020-06-18 10:51:01'),
(17, 0, 'Penyakit', '-', 2, 'fa fa-ambulance', 'penyakit/data', 'Aktif', '2020-06-27 12:18:53'),
(18, 0, 'Saran', '-', 4, 'fa fa-lightbulb-o', 'saran/data', 'Aktif', '2020-06-27 13:12:26'),
(19, 0, 'Diagnosa', '-', 2, 'fa fa-medkit', 'diagnosa/data', 'Aktif', '2020-06-27 14:03:29'),
(24, 0, 'Basis Pengetahuan', '-', 6, 'fa fa-book', 'pengetahuan/data', 'Aktif', '2020-07-13 08:24:16'),
(25, 0, 'Laporan', '-', 7, 'fa fa-pencil', '#', 'Aktif', '2020-07-15 05:23:26'),
(26, 25, 'Laporan Pasien', '-', 7, 'fa fa-caret', 'laporan/pasien', 'Aktif', '2020-07-15 07:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `tujuan_pembayaran` varchar(100) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `min_persentase` int(11) NOT NULL,
  `max_persentase` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama`, `min_persentase`, `max_persentase`, `created_at`) VALUES
(18, 'P01', 'Gingivitis (Radang gusi)', 40, 60, '2020-07-10 00:26:42'),
(19, 'P02', 'Karies Gigi (gigi berlubang)', 30, 40, '2020-07-10 00:26:59'),
(20, 'P03', 'Karang Gigi', 50, 70, '2020-07-10 00:27:21'),
(21, 'P04', 'Stomatitis', 30, 50, '2020-07-10 00:27:38'),
(22, 'P05', 'Abses Periodental', 70, 90, '2020-07-10 00:28:08'),
(23, 'P06', 'Candidas Oral', 40, 60, '2020-07-10 00:28:28'),
(24, 'P07', 'Trench Mouth', 70, 90, '2020-07-10 00:28:39'),
(25, 'P08', 'Gigi Sensitif', 30, 40, '2020-07-10 00:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `masa_berlaku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `judul`, `keterangan`, `harga`, `masa_berlaku`) VALUES
(16, 'Paket 10 Menit', 'Paket Fast Talk\n', 10000, '1'),
(17, 'Paket 20 Menit', 'Paket Prime', 20000, '1'),
(19, 'Paket 15 Menit', 'Paket Discuss', 15000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `role_aplikasi`
--

CREATE TABLE `role_aplikasi` (
  `rola_id` int(11) NOT NULL,
  `rola_menu_id` int(11) NOT NULL,
  `rola_lev_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_aplikasi`
--

INSERT INTO `role_aplikasi` (`rola_id`, `rola_menu_id`, `rola_lev_id`, `created_at`) VALUES
(2, 1, 2, '2020-06-18 09:39:47'),
(6, 5, 2, '2020-06-18 09:39:47'),
(7, 6, 2, '2020-06-18 09:39:47'),
(8, 2, 2, '2020-06-18 09:39:47'),
(17, 15, 5, '2020-06-18 10:24:29'),
(19, 16, 2, '2020-06-18 10:51:14'),
(20, 17, 2, '2020-06-27 12:19:01'),
(21, 18, 2, '2020-06-27 13:12:37'),
(22, 18, 4, '2020-06-27 13:40:59'),
(23, 1, 4, '2020-06-27 14:00:38'),
(24, 19, 5, '2020-06-27 14:03:43'),
(25, 20, 4, '2020-06-27 16:04:16'),
(26, 20, 5, '2020-06-27 16:04:21'),
(27, 21, 2, '2020-07-07 00:55:36'),
(28, 23, 2, '2020-07-07 06:56:39'),
(29, 24, 2, '2020-07-13 08:27:52'),
(30, 25, 2, '2020-07-15 05:30:16'),
(31, 26, 2, '2020-07-15 07:54:21'),
(32, 27, 2, '2020-07-15 07:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_id` int(11) NOT NULL,
  `role_user_id` int(11) NOT NULL,
  `role_lev_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_id`, `role_user_id`, `role_lev_id`, `created_at`) VALUES
(1, 1, 2, '2020-06-18 09:39:26'),
(4, 4, 5, '2020-06-18 10:47:23'),
(5, 5, 4, '2020-06-27 13:42:05'),
(6, 6, 5, '2020-07-07 04:23:44'),
(7, 7, 5, '2020-07-07 16:19:16'),
(8, 8, 5, '2020-07-07 16:21:38'),
(9, 9, 5, '2020-07-07 16:22:29'),
(10, 10, 5, '2020-07-07 16:23:16'),
(11, 11, 5, '2020-07-07 16:24:19'),
(12, 12, 5, '2020-07-07 17:13:11'),
(13, 13, 5, '2020-07-07 21:22:57'),
(14, 14, 5, '2020-07-08 01:15:40'),
(16, 16, 4, '2020-07-11 15:59:52'),
(17, 17, 5, '2020-07-15 15:21:43'),
(18, 18, 5, '2020-07-15 21:37:14'),
(19, 17, 5, '2020-07-28 15:13:34'),
(20, 18, 5, '2020-07-28 15:17:45'),
(21, 19, 5, '2020-07-28 15:18:18'),
(22, 20, 5, '2020-07-28 15:33:52'),
(23, 21, 5, '2020-07-28 15:55:09'),
(24, 22, 5, '2020-07-28 15:58:51'),
(25, 23, 5, '2020-07-29 04:21:34'),
(26, 24, 5, '2020-07-29 04:25:43'),
(27, 25, 5, '2020-08-02 08:44:09'),
(28, 26, 5, '2020-08-02 08:44:09'),
(29, 27, 5, '2020-08-02 08:44:09'),
(30, 28, 5, '2020-08-02 08:44:13'),
(31, 29, 5, '2020-08-02 08:45:29'),
(32, 30, 5, '2020-08-03 05:45:17'),
(33, 31, 5, '2020-08-03 18:41:17'),
(34, 32, 5, '2020-08-04 03:58:31'),
(35, 33, 5, '2020-08-04 04:00:42'),
(36, 34, 5, '2020-08-06 11:40:28'),
(37, 35, 5, '2020-08-07 13:11:41'),
(38, 36, 5, '2020-08-07 13:11:41'),
(39, 37, 5, '2020-08-07 13:11:41'),
(40, 38, 5, '2020-08-07 13:14:33'),
(41, 39, 5, '2020-08-07 13:15:40'),
(42, 40, 5, '2020-08-07 13:16:58'),
(43, 41, 5, '2020-08-08 02:08:27'),
(44, 42, 5, '2020-08-13 15:46:12'),
(45, 43, 5, '2020-08-13 16:04:13'),
(46, 44, 5, '2020-08-13 16:53:09'),
(47, 45, 5, '2020-08-13 16:54:15'),
(48, 46, 5, '2020-08-13 18:59:08'),
(49, 47, 5, '2020-08-13 20:09:19'),
(50, 48, 5, '2020-08-13 20:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `id_penyakit`, `id_user`, `judul`, `keterangan`, `created_at`) VALUES
(2, 18, 1, 'Saran', 'Rajinlah mencucui tangan dengan sabun,makan makanan yang sehat dan banyak istirahat serta konsumsi air putih,dan gunakan masker apabila keluar rumah,apabila sakit masih berlanjut lebih dari satu minggu segeralah lakukan pemeriksaan langsung dengan dokter', '2020-07-14 01:52:53'),
(3, 19, 5, 'Saran', 'Rajinlah minum air putih hangat,jaga istirahat,makan makanan yang sehat dan nyaman pada tenggorokan,dan gunakan masker apabila keluar rumah supaya terhindar dari polusi,', '2020-07-15 01:58:34'),
(4, 20, 5, 'Saran', 'Konsumsilah makanan yang sehat dan banyak istirahat serta konsumsi air putih hangat,hindari konsumsi alkohol dan merokok serta polusi lainnya selain itu gunakan masker apabila keluar rumah,serta kurangi volume berbicara', '2020-07-15 02:07:54'),
(5, 21, 5, 'Saran', 'Konsumsi air putih hangat yang banyak,banyak istirahat,hindari konsumsi alkohol dan merokok serta polusi lainnya selain itu gunakan masker apabila keluar rumah \n', '2020-07-15 02:24:42'),
(6, 22, 1, 'Saran', 'Sikat gigi 2 kali sehari dengan pasta gigi yang mengandung fluoride.\nGunakan benang gigi atau dental floss untuk membersihkan sela-sela gigi setiap hari.\nGanti sikat gigi secara rutin setiap 3 bulan sekali.', '2020-07-15 02:31:43'),
(7, 23, 5, 'Saran', 'hindari kegiatan merokok dan konsumsi alkohol,lakukan olahraga secara teratur,hindari polusi udara dan gunakan masker paabila melakuakn aktivitas diluar serta lakukan vaksinasi dengan dokter secara berkala ', '2020-07-15 02:46:01'),
(8, 24, 5, 'Saran', 'Konsumsilah makanan yang sehat dan banyak istirahat serta konsumsi air putih hangat,hindari konsumsi alkohol dan merokok serta polusi lainnya,rajin cuci tangan selain itu gunakan masker apabila melakukan kegiatan diluar rumah,lakukan vaksinasi segera apabila anda mengalami gejala pneumonia dan apabila gejala tersebut dalam waktu 2 minggu  tidak mengalami penurunan justru makin parah maka segera hubungi dokter kembali.', '2020-07-15 02:58:32'),
(9, 25, 5, 'Saran', 'Segeralah menghubungi dokter apabila anda mengalami gejala tersebut.', '2020-07-15 03:03:13'),
(10, 26, 5, 'Saran', 'Segeralah menghubungi dokter apabila anda mengalami gejala tersebut supaya dapat segera dilakukan pemeriksaan secara langsung agar tidak menjadi lebih parah karena penyakit ini merupakan golongan penyakit yang cukup serius ', '2020-07-15 03:08:37'),
(11, 27, 5, 'Saran', 'Segeralah menghubungi dokter untuk mendapatkan pemeriksaan secara langsung,apabila sudah dilakukan penanganan maka ikuti dan konsumsilah obat secara teratur dan disiplin serta konsultasikan dan lakukan pemeriksaan secara berkala terutama ketika obat sudah habis.Selain itu rajinlah olahraga ringan terutama di pagi hari dan konsumsi makanan sehat bergizi tinggi dan hindari polusi dengan penggunaan masker.', '2020-07-15 03:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nama`, `user_password`, `user_email`, `user_phone`, `user_status`, `created_at`) VALUES
(1, 'Administrator', 'utqQiS/p4vWKh3E81QVNBONFqJt14hRtvAx446gYROkV8.8kh11eS', 'administrator@gmail.com', '08123123', 'Aktif', '2020-06-18 09:39:08'),
(5, 'Dokter 1', 'IxxXBD2uRR5n3Oxfhis2F..QuIz6RspxHVtdwDxkYK3XHUKGBCbPK', 'dokter@gmail.com', '08123123', 'Aktif', '2020-06-27 13:42:05'),
(12, 'pasien1', 'utqQiS/p4vWKh3E81QVNBONFqJt14hRtvAx446gYROkV8.8kh11eS', 'pasien@gmail.com', '08212323442', 'Aktif', '2020-07-07 17:13:11'),
(16, 'Dokter 2', 'yP8hrkxlDTAi5CwPIMNyAOAymRe9aswlmv04DqSGmSmX9X3dSkSsC', 'dokter2@gmail.com', '0837236223', 'Aktif', '2020-07-11 15:59:52'),
(17, 'Aji', 'utqQiS/p4vWKh3E81QVNBONFqJt14hRtvAx446gYROkV8.8kh11eS', 'aji@gmail.com', '088131312', 'Aktif', '2020-07-28 15:13:34'),
(20, 'Aji', 'TUfUQKggosn/LsXSqD9fE.KRnk1O/OSFyNvevKBC78VU7Wa6WF.US', 'ilham@gmail.com', '088131312', 'Aktif', '2020-07-28 15:33:52'),
(21, 'lham', '7BPnrm1kQCZEGbvEOuBo1upZGHwHuJs2s5puTHDlj7dQ9rZwLtXUa', 'ilham@gmail.com', '082128815882', 'Aktif', '2020-07-28 15:55:09'),
(22, 'Insan A', 'CE3e3fgBXDG1waEstthbbuSEo0xj9SQeBGK44o/0knScGYRovcILW', 'insan.agnia@gmail.com', '085482033', 'Aktif', '2020-07-28 15:58:51'),
(23, 'test', 'CE3e3fgBXDG1waEstthbbuSEo0xj9SQeBGK44o/0knScGYRovcILW', 'test@gmail.com', '081113331', 'Aktif', '2020-07-29 04:21:34'),
(24, 'test1', 'e716a8XOFDKJ8JdaO2KQWO8WWR4pv./sw0uOxrr5EM1PVJKvqlQFK', 'teteeww', '2312312', 'Aktif', '2020-07-29 04:25:43'),
(25, 'eksa', 'zluR/.VNdq5NDTdRcoOBCOOUbaxctoUs.kUFHytpuGUY7eWQSjE92', 'eksa@gmail.com', '082121792912', 'Aktif', '2020-08-02 08:44:09'),
(26, 'eksa', 'BXaSQiDTlzmssm6.rTRg5eDX9MLStLaaVVcDH8VDUYJ1qwho8YuaO', 'eksa@gmail.com', '082121792912', 'Aktif', '2020-08-02 08:44:09'),
(27, 'eksa', 'swy8m6gIUYE6SA91CQvaqekaf0py8mekoSVj5xRc5SmbXueuhdSsW', 'eksa@gmail.com', '082121792912', 'Aktif', '2020-08-02 08:44:09'),
(28, 'oboy', 'mKlxS3zIcMWJ8Dndn7Rx9OYNGZjuP621U8RhwmDDlgxXQCh9vnuiy', 'oboy@gmail.com', '08829290', 'Aktif', '2020-08-02 08:44:13'),
(29, 'insan', '0WH2TFx0gbJ1hZx50scRLOCs/WfYwX34OxKLo3nCGkD0c5zJWq306', 'insan@gmail.com', '08211111111', 'Aktif', '2020-08-02 08:45:29'),
(30, 'ara', '8cFtSpgwl0ZBXz6K3ywh3OvL7.iTCKQRPikJpsJUxx0QhLjua7vWO', 'ara@gmail.com', '0879548548480', 'Aktif', '2020-08-03 05:45:16'),
(31, 'ai', 'vndx5pEjXgsjpwsG6.zdu.jjzROYy97ZLBvwrBkFYd1YMRMxRPVNO', 'ai@gmail.com', '0975182936', 'Aktif', '2020-08-03 18:41:17'),
(32, 'admin', 'T0m/HcXmsazcg8IVuq/xBOs0mM.HNGk7VndZ2adv.74At4Fdevwvy', 'admin', '0811', 'Aktif', '2020-08-04 03:58:31'),
(33, 'user', 'DvNuRRbyQwRT.pEMjFBWdOZf7VAbxdTIAygSQLz0qFZ3ROlXg8xee', 'user', '08222', 'Aktif', '2020-08-04 04:00:42'),
(34, 'polisi', 'ViGU5rsW7qh/BvqKHzm/Zur19E8D6oIwG/lm7R.WdWlA0BChgEvd2', 'polisi@gmail.com', '7812387', 'Aktif', '2020-08-06 11:40:28'),
(35, 'chearrachman', 'j1xRyQEj9JMmXGMfgLFjnuVB5GG77gwrdhk41.CjFR4VRtYobyfiC', 'chearrachman@gmail.com', '0881036775139', 'Aktif', '2020-08-07 13:11:41'),
(36, 'chearrachman', 'GVaaS4HwiSNchN6j/yEPseNbfNIaiGS8EriTqMz3.2aXQbR9lyfg6', 'chearrachman@gmail.com', '0881036775139', 'Aktif', '2020-08-07 13:11:41'),
(37, 'chearrachman', 'TaSHFfbq.96r50mdqGaUJ.lRq9w81ogUaSuSixvrAg4YBHE2A44m.', 'chearrachman@gmail.com', '0881036775139', 'Aktif', '2020-08-07 13:11:41'),
(38, 'cece', 'pxBGDmjFqT0U/nmCYESiRul9ex.KtI6r/MMBFlhWy2Y6EfSLokTK2', 'cece', '0101', 'Aktif', '2020-08-07 13:14:33'),
(39, 'cece', 'XXf0VUyXbBA4DiWXVTcu3Oybx03iD212xZ5rgtXGfQdT.pxn/YSQ.', 'cece@gmail.com', '0101', 'Aktif', '2020-08-07 13:15:40'),
(40, 'cece', 'fnkEHmGPFmVni99lMp24x.p4L6lDEUCmTz7bLZmbWvRWShnIQCcS2', 'cece1@gmail.com', '0101', 'Aktif', '2020-08-07 13:16:58'),
(41, 'utis', 'ZOnwsU618F/aiEIGYIGX4OHCwuEpb3SnqI3JR/pHuWkCzfsudPafe', 'utis@gmail.com', '1010', 'Aktif', '2020-08-08 02:08:27'),
(42, 'bahrul', '4Sh8aLVdVm.Xj.MJts0WxuFr5mX2y9p2AvpZS3tCTenxiwFC.Q0E2', 'bahrul@gmail.com', '01010187', 'Aktif', '2020-08-13 15:46:12'),
(43, 'df', 'u8HGOvPVyqcBAmHcaW3UaeqhJUAiT429.ZSeJjUA8p7zveeSnxupS', 'dd@gmail.com', '0838383', 'Aktif', '2020-08-13 16:04:13'),
(44, 'baunk', 'yG9AkKCzuHohZACChghmUO0UVb2v4TXUZIPs4fkMd9UwABffjC716', 'babauketek23@jagoo.com', '099833772739', 'Aktif', '2020-08-13 16:53:09'),
(45, 'hayytah', 'mn0duaQGKPtBn3R/HNLNuuOQ/7sEaVfZK3ZCeNTJTIdBwxD7K8hoy', 'bebe2@jagoo.com', '082637194927', 'Aktif', '2020-08-13 16:54:15'),
(46, 'aji', 'n5C1ZQ.X3giQ/9iz5GA3K.BPDm5uCKS4Tzq3iYNRAtNKTAODq79tO', 'aji@gmail.com', '08829292', 'Aktif', '2020-08-13 18:59:08'),
(47, 'pasien1', '84dA5sa7gOOn9tVDyYFA/.eOognATpciHBSN81Vtwm9uaWgYEtpnm', 'pasien1@gmail.com', '081234567', 'Aktif', '2020-08-13 20:09:19'),
(48, 'Doni H', 'JRcvknw1mEaLvwpWdcCs8ukX5un4Riy/245x2pPkIvhpnr/yqnUL2', 'donih@gmail.com', '0889928282', 'Aktif', '2020-08-13 20:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_penyakit_2` (`id_penyakit`,`id_gejala`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `chat_detail`
--
ALTER TABLE `chat_detail`
  ADD PRIMARY KEY (`id_chat_detail`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `diagnosa_detail`
--
ALTER TABLE `diagnosa_detail`
  ADD PRIMARY KEY (`id_diagnosa_detail`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lev_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`),
  ADD UNIQUE KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role_aplikasi`
--
ALTER TABLE `role_aplikasi`
  ADD PRIMARY KEY (`rola_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_detail`
--
ALTER TABLE `chat_detail`
  MODIFY `id_chat_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnosa_detail`
--
ALTER TABLE `diagnosa_detail`
  MODIFY `id_diagnosa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role_aplikasi`
--
ALTER TABLE `role_aplikasi`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `basis_pengetahuan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `basis_pengetahuan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`);
COMMIT;
