-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2022 at 03:03 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama`, `kode`, `created_at`, `updated_at`) VALUES
(10, 'Frame', '1', '2022-04-27 04:27:57', '2022-04-27 04:27:57'),
(11, 'Lensa', '2', '2022-04-27 04:28:04', '2022-04-27 04:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_products`
--

DROP TABLE IF EXISTS `history_products`;
CREATE TABLE IF NOT EXISTS `history_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyChange` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_products`
--

INSERT INTO `history_products` (`id`, `product_id`, `user_id`, `qty`, `qtyChange`, `tipe`, `created_at`, `updated_at`) VALUES
(27, 15, 2, '4', '-1', 'decrease from transaction', '2021-11-17 07:03:26', '2021-11-17 07:03:26'),
(28, 13, 2, '3', '-1', 'decrease from transaction', '2021-11-17 07:03:26', '2021-11-17 07:03:26'),
(29, 16, 2, '3', '0', 'created product', '2021-11-17 19:02:50', '2021-11-17 19:02:50'),
(30, 17, 3, '3', '0', 'created product', '2021-12-08 19:12:35', '2021-12-08 19:12:35'),
(31, 18, 3, '3', '0', 'created product', '2021-12-08 19:16:49', '2021-12-08 19:16:49'),
(32, 20, 3, '5', '0', 'created product', '2021-12-14 22:31:21', '2021-12-14 22:31:21'),
(33, 21, 3, '3', '0', 'created product', '2021-12-15 00:08:26', '2021-12-15 00:08:26'),
(34, 22, 3, '4', '0', 'created product', '2021-12-15 00:19:40', '2021-12-15 00:19:40'),
(35, 23, 3, '3', '0', 'created product', '2021-12-15 00:53:39', '2021-12-15 00:53:39'),
(36, 24, 3, '4', '0', 'created product', '2021-12-15 00:54:43', '2021-12-15 00:54:43'),
(37, 25, 3, '4', '0', 'created product', '2021-12-15 00:55:14', '2021-12-15 00:55:14'),
(38, 27, 3, '4', '0', 'created product', '2021-12-15 00:57:45', '2021-12-15 00:57:45'),
(39, 23, 2, '3', '-1', 'decrease from transaction', '2021-12-15 01:56:01', '2021-12-15 01:56:01'),
(40, 25, 2, '4', '-1', 'decrease from transaction', '2021-12-15 01:56:01', '2021-12-15 01:56:01'),
(41, 28, 3, '3', '0', 'created product', '2021-12-15 08:20:36', '2021-12-15 08:20:36'),
(42, 29, 3, '2', '0', 'created product', '2021-12-15 08:27:32', '2021-12-15 08:27:32'),
(43, 30, 3, '4', '0', 'created product', '2021-12-15 08:35:05', '2021-12-15 08:35:05'),
(44, 31, 3, '3', '0', 'created product', '2021-12-15 08:39:21', '2021-12-15 08:39:21'),
(45, 32, 3, '4', '0', 'created product', '2021-12-15 08:43:57', '2021-12-15 08:43:57'),
(46, 33, 3, '4', '0', 'created product', '2021-12-15 08:48:15', '2021-12-15 08:48:15'),
(47, 34, 3, '5', '0', 'created product', '2021-12-15 08:53:51', '2021-12-15 08:53:51'),
(48, 35, 3, '3', '0', 'created product', '2021-12-15 08:54:46', '2021-12-15 08:54:46'),
(49, 36, 3, '4', '0', 'created product', '2021-12-15 08:55:34', '2021-12-15 08:55:34'),
(50, 37, 3, '6', '0', 'created product', '2021-12-15 08:56:14', '2021-12-15 08:56:14'),
(51, 38, 3, '2', '0', 'created product', '2021-12-15 08:56:56', '2021-12-15 08:56:56'),
(52, 39, 3, '4', '0', 'created product', '2021-12-15 09:12:31', '2021-12-15 09:12:31'),
(53, 40, 3, '3', '0', 'created product', '2021-12-15 09:13:53', '2021-12-15 09:13:53'),
(54, 41, 3, '4', '0', 'created product', '2021-12-15 09:16:28', '2021-12-15 09:16:28'),
(55, 42, 3, '5', '0', 'created product', '2021-12-15 09:19:14', '2021-12-15 09:19:14'),
(56, 43, 3, '4', '0', 'created product', '2021-12-15 09:20:17', '2021-12-15 09:20:17'),
(57, 44, 3, '3', '0', 'created product', '2021-12-15 09:20:57', '2021-12-15 09:20:57'),
(58, 45, 3, '4', '0', 'created product', '2021-12-15 09:30:24', '2021-12-15 09:30:24'),
(59, 46, 3, '7', '0', 'created product', '2021-12-15 09:31:59', '2021-12-15 09:31:59'),
(60, 47, 3, '6', '0', 'created product', '2021-12-15 09:34:04', '2021-12-15 09:34:04'),
(61, 48, 3, '7', '0', 'created product', '2021-12-15 09:36:36', '2021-12-15 09:36:36'),
(62, 49, 3, '5', '0', 'created product', '2021-12-15 09:38:39', '2021-12-15 09:38:39'),
(63, 50, 3, '3', '0', 'created product', '2021-12-15 09:40:31', '2021-12-15 09:40:31'),
(64, 51, 3, '3', '0', 'created product', '2021-12-15 09:43:04', '2021-12-15 09:43:04'),
(65, 52, 3, '4', '0', 'created product', '2021-12-15 19:58:23', '2021-12-15 19:58:23'),
(66, 29, 2, '2', '-1', 'decrease from transaction', '2021-12-15 20:00:44', '2021-12-15 20:00:44'),
(67, 45, 2, '4', '-1', 'decrease from transaction', '2021-12-15 20:00:44', '2021-12-15 20:00:44'),
(68, 51, 2, '3', '-1', 'decrease from transaction', '2022-04-26 03:13:50', '2022-04-26 03:13:50'),
(69, 53, 3, '3', '0', 'created product', '2022-04-27 04:36:54', '2022-04-27 04:36:54'),
(70, 54, 3, '2', '0', 'created product', '2022-04-27 04:37:32', '2022-04-27 04:37:32'),
(71, 55, 3, '2', '0', 'created product', '2022-04-27 04:38:26', '2022-04-27 04:38:26'),
(72, 56, 3, '3', '0', 'created product', '2022-04-27 04:38:56', '2022-04-27 04:38:56'),
(73, 56, 2, '3', '-2', 'decrease from transaction', '2022-04-27 04:47:25', '2022-04-27 04:47:25'),
(74, 57, 3, '2', '0', 'created product', '2022-04-27 04:48:28', '2022-04-27 04:48:28'),
(75, 58, 3, '3', '0', 'created product', '2022-04-27 06:42:26', '2022-04-27 06:42:26'),
(76, 59, 3, '3', '0', 'created product', '2022-04-27 06:47:34', '2022-04-27 06:47:34'),
(77, 58, 2, '3', '-3', 'decrease from transaction', '2022-04-27 06:50:45', '2022-04-27 06:50:45'),
(81, 59, 2, '3', '-3', 'decrease from transaction', '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(82, 57, 2, '2', '-2', 'decrease from transaction', '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(83, 55, 2, '2', '-2', 'decrease from transaction', '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(84, 56, 2, '1', '-1', 'decrease from transaction', '2022-05-22 07:50:19', '2022-05-22 07:50:19'),
(85, 53, 2, '3', '-1', 'decrease from transaction', '2022-05-22 07:54:51', '2022-05-22 07:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_16_070107_create_products_table', 1),
(5, '2020_05_16_072227_create_transcations_table', 1),
(6, '2020_05_16_072533_create_product_transation_table', 1),
(7, '2020_05_16_120622_create_history_products_table', 1),
(8, '2021_11_17_124905_create_category_table', 2),
(9, '2021_12_08_145447_modif_table_users', 3),
(10, '2022_05_22_114819_add_store_column_table_user', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `qty`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(53, 'Lensa Essilor', 600000, 'uploads/images/1651059414essikor.jpg', 2, 'Lensa', 3, '2022-04-27 04:36:54', '2022-05-22 07:54:51'),
(54, 'lensa calvin klein', 700000, 'uploads/images/1651059452calvin klein.jpg', 2, 'Lensa', 3, '2022-04-27 04:37:32', '2022-04-27 04:37:32'),
(55, 'Lensa Hoya', 400000, 'uploads/images/1651059506hoya.jpg', 0, 'Lensa', 3, '2022-04-27 04:38:26', '2022-05-22 05:22:09'),
(56, 'Frame calvinklein', 400000, 'uploads/images/1651059536frame calvin klein.jpg', 0, 'Frame', 3, '2022-04-27 04:38:56', '2022-05-22 07:50:19'),
(57, 'Frame Rodenstock', 700000, 'uploads/images/1651060108rodenstock.jpg', 0, 'Frame', 3, '2022-04-27 04:48:28', '2022-05-22 05:22:09'),
(58, 'Lensa Calvinklein', 400000, 'uploads/images/1651066945calvin klein.jpg', 0, 'Lensa', 3, '2022-04-27 06:42:25', '2022-04-27 06:50:45'),
(59, 'frame a', 200000, 'uploads/images/1651067254hoya.jpg', 0, 'Frame', 3, '2022-04-27 06:47:34', '2022-05-22 05:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_transation`
--

DROP TABLE IF EXISTS `product_transation`;
CREATE TABLE IF NOT EXISTS `product_transation` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `invoices_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_transation`
--

INSERT INTO `product_transation` (`id`, `product_id`, `invoices_number`, `qty`, `created_at`, `updated_at`) VALUES
(13, 56, 'INV-000010', 2, '2022-04-27 04:47:25', '2022-04-27 04:47:25'),
(14, 58, 'INV-000011', 3, '2022-04-27 06:50:45', '2022-04-27 06:50:45'),
(15, 59, 'INV-000012', 3, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(16, 57, 'INV-000012', 2, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(17, 55, 'INV-000012', 2, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(18, 56, 'INV-000013', 1, '2022-05-22 07:50:19', '2022-05-22 07:50:19'),
(19, 53, 'INV-000014', 1, '2022-05-22 07:54:51', '2022-05-22 07:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

DROP TABLE IF EXISTS `transcations`;
CREATE TABLE IF NOT EXISTS `transcations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoices_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pay` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = Gagal, 1 = Diorder, 2 = Dikirim, 3 = Sampai',
  `konfirmasi` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Belum dikonfirmasi, 1 = Sudah dikonfirmasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`id`, `invoices_number`, `user_id`, `pay`, `total`, `status`, `konfirmasi`, `created_at`, `updated_at`) VALUES
(1, 'INV-000001', 2, 15000000, 13000000, 0, 0, '2021-11-03 10:32:37', '2022-05-22 08:01:58'),
(2, 'INV-000002', 2, 12000000, 11000000, 0, 0, '2021-11-09 02:23:42', '2022-05-22 08:02:00'),
(3, 'INV-000003', 2, 12000000, 11000000, 2, 0, '2021-11-09 02:24:36', '2022-05-22 08:02:10'),
(4, 'INV-000004', 2, 14000000, 13000000, 3, 1, '2021-11-10 19:16:50', '2022-05-22 08:00:31'),
(5, 'INV-000005', 2, 12000000, 11000000, 3, 1, '2021-11-10 20:06:13', '2022-05-22 08:00:09'),
(6, 'INV-000006', 2, 16000000, 15000000, 3, 0, '2021-11-17 07:03:26', '2022-05-22 07:27:14'),
(7, 'INV-000007', 2, 1100000, 1000020, 3, 0, '2021-12-15 01:56:02', '2022-05-22 07:29:38'),
(8, 'INV-000008', 2, 6000000, 6000000, 3, 0, '2021-12-15 20:00:44', '2022-05-22 07:32:53'),
(9, 'INV-000009', 2, 13000000, 12900000, 3, 0, '2022-04-26 03:13:51', '2022-05-22 07:25:17'),
(10, 'INV-000010', 2, 800000, 800000, 3, 0, '2022-04-27 04:47:25', '2022-05-22 07:26:17'),
(11, 'INV-000011', 2, 1200000, 1200000, 3, 0, '2022-04-27 06:50:45', '2022-04-27 06:50:45'),
(12, 'INV-000012', 2, 3000000, 2800000, 3, 0, '2022-05-22 05:22:09', '2022-05-22 07:26:13'),
(13, 'INV-000013', 2, 400000, 400000, 3, 1, '2022-05-22 07:50:19', '2022-05-22 07:58:48'),
(14, 'INV-000014', 2, 600000, 600000, 3, 1, '2022-05-22 07:54:51', '2022-05-22 08:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `store`) VALUES
(1, 'AndriSyarif', 'andrisyarif02@gmail.com', NULL, '$2y$10$Hs0k2FWTKf2Z5RdaXUb8EenVtlvgniq21dMmSWxLypJ6DD326vHiq', NULL, '2021-10-20 05:10:55', '2021-10-20 05:10:55', '', ''),
(2, 'karyawan', 'karyawan@gmail.com', NULL, '$2y$10$JRUOLW7/qLXUlwxYUzIgE.s3cQT/PRXBE/Aea1ryQDGO7FWw9mofu', NULL, '2021-10-27 18:43:57', '2021-10-27 18:43:57', 'Karyawan', ''),
(3, 'administrator', 'Andri@gmail.com', NULL, '$2y$10$s9kENjIor8xcktt25Me1pOPReaJv0vJbNngQB/J487PhlpZ1y8y5G', NULL, '2021-12-08 08:28:03', '2021-12-08 08:28:03', 'Administrator', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
