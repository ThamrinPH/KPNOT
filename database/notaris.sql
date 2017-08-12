-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 03:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `klien_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `tanggal`, `mulai`, `selesai`, `keterangan`, `created_at`, `updated_at`, `klien_id`) VALUES
(4, '2017-04-03', '03:00:00', '08:30:00', 'coba jadwal123', '2017-04-16 03:59:52', '2017-04-16 04:40:39', 2),
(5, '2017-04-16', '01:00:00', '07:30:00', 'aweaweqeq', '2017-04-16 04:18:25', '2017-04-22 21:55:32', 1),
(6, '2017-04-21', '04:30:00', '13:00:00', 'tes', '2017-04-22 21:57:14', '2017-04-22 21:58:57', 2),
(7, '2017-04-23', '02:00:00', '06:30:00', 'asdasdas', '2017-04-22 21:59:21', '2017-04-22 21:59:21', 2),
(8, '2017-05-01', '00:00:00', '00:00:00', '', '2017-05-01 02:22:10', '2017-05-01 02:22:13', 1),
(9, '2017-05-01', '00:00:00', '00:00:00', '', '2017-05-01 02:22:20', '2017-05-01 02:22:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sk`
--

CREATE TABLE `jadwal_sk` (
  `jadwal_id` int(10) UNSIGNED DEFAULT NULL,
  `sk_id` int(10) UNSIGNED DEFAULT NULL,
  `hasil` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kliens`
--

CREATE TABLE `kliens` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `desa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodepos` int(11) NOT NULL,
  `warga_negara` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_pernikahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kliens`
--

INSERT INTO `kliens` (`id`, `no_ktp`, `nama`, `tgl_lahir`, `tempat_lahir`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `warga_negara`, `status_pernikahan`, `pekerjaan`, `agama`, `telpon`, `handphone`, `npwp`, `created_at`, `updated_at`) VALUES
(1, '65464987794987', 'nama1', '2016-12-09', 'tempat_lahir1', ' alamatalamatalamatalamat1 ', 11, 11, 'desadesadesadesa', 'kecamatankecamatan', 'kabupatenkabupaten', 'provinsiprovinsi', 11, 'warga_negarawarga_negara', 'status_pernikahanstatus_pernikahan', 'pekerjaanpekerjaan', 'agamaagama', 'telpontelpon123123123123', 'handphonehandphone123123123123', 'npwpnpwp123123123123', NULL, '2017-01-29 04:18:27'),
(2, '6546412313654987', 'nama2', '2016-12-21', 'tempat_lahir1', 'alamatalamatalamatalamat1', 11, 11, 'desadesadesadesa', 'kecamatankecamatan', 'kabupatenkabupaten', 'provinsiprovinsi', 116546, 'warga_negarawarga_negara', 'Belum Menikah', 'pekerjaanpekerjaan', 'agamaagama', '0315498765', '08487987654', '12.312.312.3-123.435', NULL, '2017-05-01 02:48:13'),
(3, '1212112312312311', 'asdasdas', '2017-01-13', 'asdasd', 'asdasdasda', 1, 3, 'sdasdas', 'asdasd', 'asdasd', 'assdasd', 123123, 'asdasd', 'Belum Menikah', 'asdasda', 'asdasdads', 'asdasd', 'asdasdasd', '12.312.331.2-233.213', '2017-01-29 04:09:40', '2017-05-01 02:47:20'),
(4, '4984201984095164', 'klien baru', '2017-05-02', 'surabaya', '213sedae', 54, 5, 'asd', 'asd', 'ascdasd', 'asdas', 958495, 'asdasdasd', 'Belum Menikah', 'asdasd', 'sadsd', '02187651984', '9549846518949', '54.695.465.1-981.095', '2017-05-01 02:49:39', '2017-05-01 02:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `legals`
--

CREATE TABLE `legals` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `sifat_surat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `legals`
--

INSERT INTO `legals` (`id`, `waktu`, `sifat_surat`, `keterangan`, `sk_id`, `created_at`, `updated_at`) VALUES
(1, '2017-01-18 00:00:00', 'sifat1', 'asdasdas', 1, '2017-01-29 01:53:53', '2017-05-06 21:51:28'),
(2, '2017-05-01 00:00:00', 'sifat1', 'Keterangan', 4, '2017-05-06 21:46:11', '2017-05-06 21:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_30_134247_klien', 1),
(4, '2016_11_30_140450_jadwal', 1),
(5, '2016_11_30_141229_sks', 1),
(6, '2016_11_30_141504_transaksis', 1),
(7, '2016_11_30_142319_retribusis', 1),
(8, '2016_11_30_142609_legal', 1),
(9, '2016_11_30_143002_warmerkens', 1),
(10, '2016_11_30_143153_notariils', 1),
(11, '2016_11_30_143831_propertis', 2),
(12, '2016_12_05_120235_jadwals_sks', 2),
(13, '2016_11_30_143454_ppats', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notariils`
--

CREATE TABLE `notariils` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_akta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_akta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notariils`
--

INSERT INTO `notariils` (`id`, `no_akta`, `nama_akta`, `keterangan`, `waktu`, `sk_id`, `created_at`, `updated_at`) VALUES
(1, '605465465', 'nama akta satu', 'Keterangan  Keterangan  Keterangan  Keterangan ', '2017-05-13 00:00:00', 1, '2017-05-06 22:10:18', '2017-05-06 22:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppats`
--

CREATE TABLE `ppats` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `ht` int(11) NOT NULL,
  `waktu_ssp` datetime NOT NULL,
  `ssp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_bphtb` datetime NOT NULL,
  `bphtb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `properti_id` int(10) UNSIGNED NOT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ppats`
--

INSERT INTO `ppats` (`id`, `keterangan`, `waktu`, `ht`, `waktu_ssp`, `ssp`, `waktu_bphtb`, `bphtb`, `properti_id`, `sk_id`, `created_at`, `updated_at`) VALUES
(2, 'asdasdads123123123', '2017-05-04 00:00:00', 21323123, '2017-05-04 00:00:00', 'asdasd', '2017-05-04 00:00:00', 'sadasd', 1, 1, '2017-05-07 00:19:21', '2017-05-07 00:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `propertis`
--

CREATE TABLE `propertis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_hm` int(11) NOT NULL,
  `nib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_su` datetime NOT NULL,
  `nomor_ssp` int(11) NOT NULL,
  `luastanah` decimal(8,2) NOT NULL,
  `luasbangunan` decimal(8,2) NOT NULL,
  `letak` text COLLATE utf8_unicode_ci NOT NULL,
  `nop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `njop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pemeganghak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ppat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `propertis`
--

INSERT INTO `propertis` (`id`, `nomor_hm`, `nib`, `waktu_su`, `nomor_ssp`, `luastanah`, `luasbangunan`, `letak`, `nop`, `njop`, `pemeganghak`, `jenis`, `ppat_id`, `created_at`, `updated_at`, `alamat`) VALUES
(1, 123, 'asd', '2016-12-16 00:00:00', 123, '123.00', '123.00', ' asd ', 'asd', '123123123', 'asd', 'asd', 0, '2016-12-12 01:50:57', '2017-05-07 01:10:23', '123123asdzsda');

-- --------------------------------------------------------

--
-- Table structure for table `retribusis`
--

CREATE TABLE `retribusis` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `lampiran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `retribusis`
--

INSERT INTO `retribusis` (`id`, `waktu`, `lampiran`, `jenis`, `keterangan`, `nominal`, `sk_id`, `created_at`, `updated_at`) VALUES
(1, '2017-05-02 00:00:00', 'asf', 'asd', 'asdf', 20566, 1, '2017-05-07 00:34:50', '2017-05-07 00:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `sks`
--

CREATE TABLE `sks` (
  `id` int(10) UNSIGNED NOT NULL,
  `saksi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `klien_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sks`
--

INSERT INTO `sks` (`id`, `saksi`, `keterangan`, `created_at`, `updated_at`, `klien_id`, `user_id`) VALUES
(1, 'qw123', '  qwe423', '2017-01-28 22:10:25', '2017-01-29 04:48:47', 1, 1),
(4, '12312312312', 'zxczxczxcafdea fsdasdsada sd ', '2017-01-29 04:48:24', '2017-01-29 04:48:24', 1, 1),
(5, 'asdhgdfhfgdfg', 'fgdgffdgdfgdfg', '2017-01-29 04:48:56', '2017-01-29 04:48:56', 2, 1),
(6, 'dasdq23134', '3 dsa d123e 1d2d 12d ', '2017-05-07 01:18:12', '2017-05-07 01:18:12', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `lampiran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `waktu`, `lampiran`, `jenis`, `keterangan`, `nominal`, `sk_id`, `created_at`, `updated_at`) VALUES
(1, '2017-01-05 05:16:00', 'a sdas da sda sdas da sda dsadasda', 'asdas', 'asdasdasd asdasda sdas dasdadsasdd', 1100, 1, '2017-01-29 01:47:59', '2017-01-29 01:47:59'),
(2, '2017-01-10 00:00:00', 'sadasdasd', 'asdasdasd', 'dasdasd', 456000, 1, '2017-01-29 04:00:37', '2017-01-29 04:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `divisi` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `divisi`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@notar.is', '$2a$04$biJ5L5DOEeUj/jXGrkiCL.vr/tRhUD/x6eTbeUPZVZOOTb/8tQp..', 'oePxnqZthtBmXzQ3yFwZCw6HMo7HsDJECaqZqMhiv51yR8KlnmkQvWZ5hGRu', '2016-12-11 06:27:07', '2017-04-22 21:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `warmerkens`
--

CREATE TABLE `warmerkens` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `sifat_surat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sk_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warmerkens`
--

INSERT INTO `warmerkens` (`id`, `waktu`, `sifat_surat`, `keterangan`, `created_at`, `updated_at`, `sk_id`) VALUES
(1, '2017-05-07 00:00:00', 'sifat3', 'asd21e 1q2da213', '2017-05-07 01:11:19', '2017-05-07 01:11:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_klien_id_foreign` (`klien_id`),
  ADD KEY `jadwals_id_index` (`id`);

--
-- Indexes for table `jadwal_sk`
--
ALTER TABLE `jadwal_sk`
  ADD KEY `jadwals_sks_jadwal_id_foreign` (`jadwal_id`),
  ADD KEY `jadwals_sks_sk_id_foreign` (`sk_id`);

--
-- Indexes for table `kliens`
--
ALTER TABLE `kliens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kliens_id_index` (`id`);

--
-- Indexes for table `legals`
--
ALTER TABLE `legals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `legals_sk_id_foreign` (`sk_id`),
  ADD KEY `legals_id_index` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notariils`
--
ALTER TABLE `notariils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notariils_sk_id_foreign` (`sk_id`),
  ADD KEY `notariils_id_index` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `ppats`
--
ALTER TABLE `ppats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppats_properti_id_foreign` (`properti_id`),
  ADD KEY `ppats_sk_id_foreign` (`sk_id`),
  ADD KEY `ppats_id_index` (`id`);

--
-- Indexes for table `propertis`
--
ALTER TABLE `propertis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertis_id_index` (`id`);

--
-- Indexes for table `retribusis`
--
ALTER TABLE `retribusis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retribusis_sk_id_foreign` (`sk_id`),
  ADD KEY `retribusis_id_index` (`id`);

--
-- Indexes for table `sks`
--
ALTER TABLE `sks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sks_klien_id_foreign` (`klien_id`),
  ADD KEY `sks_user_id_foreign` (`user_id`),
  ADD KEY `sks_id_index` (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_sk_id_foreign` (`sk_id`),
  ADD KEY `transaksis_id_index` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warmerkens`
--
ALTER TABLE `warmerkens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warmerkens_sk_id_foreign` (`sk_id`),
  ADD KEY `warmerkens_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kliens`
--
ALTER TABLE `kliens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `legals`
--
ALTER TABLE `legals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notariils`
--
ALTER TABLE `notariils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ppats`
--
ALTER TABLE `ppats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `propertis`
--
ALTER TABLE `propertis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `retribusis`
--
ALTER TABLE `retribusis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `warmerkens`
--
ALTER TABLE `warmerkens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_klien_id_foreign` FOREIGN KEY (`klien_id`) REFERENCES `kliens` (`id`);

--
-- Constraints for table `jadwal_sk`
--
ALTER TABLE `jadwal_sk`
  ADD CONSTRAINT `jadwals_sks_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`),
  ADD CONSTRAINT `jadwals_sks_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `legals`
--
ALTER TABLE `legals`
  ADD CONSTRAINT `legals_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `notariils`
--
ALTER TABLE `notariils`
  ADD CONSTRAINT `notariils_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `ppats`
--
ALTER TABLE `ppats`
  ADD CONSTRAINT `ppats_properti_id_foreign` FOREIGN KEY (`properti_id`) REFERENCES `propertis` (`id`),
  ADD CONSTRAINT `ppats_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `retribusis`
--
ALTER TABLE `retribusis`
  ADD CONSTRAINT `retribusis_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `sks`
--
ALTER TABLE `sks`
  ADD CONSTRAINT `sks_klien_id_foreign` FOREIGN KEY (`klien_id`) REFERENCES `kliens` (`id`),
  ADD CONSTRAINT `sks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `kliens` (`id`);

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

--
-- Constraints for table `warmerkens`
--
ALTER TABLE `warmerkens`
  ADD CONSTRAINT `warmerkens_sk_id_foreign` FOREIGN KEY (`sk_id`) REFERENCES `sks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
