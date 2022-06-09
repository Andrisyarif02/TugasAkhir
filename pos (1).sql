-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2022 pada 13.27
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

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
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `nama`, `kode`, `created_at`, `updated_at`) VALUES
(10, 'Frame', '1', '2022-04-27 04:27:57', '2022-04-27 04:27:57'),
(11, 'Lensa', '2', '2022-04-27 04:28:04', '2022-04-27 04:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_products`
--

CREATE TABLE `history_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyChange` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history_products`
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
(85, 53, 2, '3', '-1', 'decrease from transaction', '2022-05-22 07:54:51', '2022-05-22 07:54:51'),
(86, 54, 2, '2', '-1', 'decrease from transaction', '2022-05-22 08:14:17', '2022-05-22 08:14:17'),
(87, 53, 2, '2', '-1', 'decrease from transaction', '2022-05-22 08:14:17', '2022-05-22 08:14:17'),
(88, 53, 5, '1', '-1', 'decrease from transaction', '2022-05-22 08:27:59', '2022-05-22 08:27:59'),
(98, 54, 5, '1', '-1', 'decrease from transaction', '2022-05-26 05:11:21', '2022-05-26 05:11:21'),
(99, 59, 3, '0', '5', 'change product qty from admin', '2022-05-26 05:18:28', '2022-05-26 05:18:28'),
(100, 59, 5, '5', '-1', 'decrease from transaction', '2022-05-26 05:18:49', '2022-05-26 05:18:49'),
(101, 59, 5, '4', '-1', 'decrease from transaction', '2022-05-27 17:36:10', '2022-05-27 17:36:10'),
(102, 58, 3, '0', '3', 'change product qty from admin', '2022-05-27 18:23:33', '2022-05-27 18:23:33'),
(103, 57, 3, '0', '3', 'change product qty from admin', '2022-05-27 18:23:41', '2022-05-27 18:23:41'),
(104, 59, 5, '3', '-1', 'decrease from transaction', '2022-05-27 18:25:06', '2022-05-27 18:25:06'),
(105, 58, 5, '3', '-2', 'decrease from transaction', '2022-05-27 18:25:06', '2022-05-27 18:25:06'),
(106, 59, 6, '2', '-1', 'decrease from transaction', '2022-05-27 18:32:05', '2022-05-27 18:32:05'),
(107, 58, 6, '1', '-1', 'decrease from transaction', '2022-05-27 18:32:05', '2022-05-27 18:32:05'),
(108, 57, 5, '3', '-1', 'decrease from transaction', '2022-05-27 22:23:27', '2022-05-27 22:23:27'),
(109, 57, 5, '2', '-1', 'decrease from transaction', '2022-05-27 22:24:21', '2022-05-27 22:24:21'),
(110, 59, 5, '1', '-1', 'decrease from transaction', '2022-05-27 22:34:11', '2022-05-27 22:34:11'),
(111, 57, 5, '1', '-1', 'decrease from transaction', '2022-05-27 22:50:19', '2022-05-27 22:50:19'),
(112, 59, 3, '0', '3', 'change product qty from admin', '2022-05-27 22:53:36', '2022-05-27 22:53:36'),
(113, 59, 5, '3', '-1', 'decrease from transaction', '2022-05-27 22:53:53', '2022-05-27 22:53:53'),
(114, 59, 5, '2', '-1', 'decrease from transaction', '2022-05-27 22:58:33', '2022-05-27 22:58:33'),
(115, 59, 5, '1', '-1', 'decrease from transaction', '2022-05-27 23:03:30', '2022-05-27 23:03:30'),
(116, 59, 3, '0', '5', 'change product qty from admin', '2022-05-27 23:05:31', '2022-05-27 23:05:31'),
(117, 59, 5, '5', '-1', 'decrease from transaction', '2022-05-27 23:05:47', '2022-05-27 23:05:47'),
(118, 59, 5, '4', '-1', 'decrease from transaction', '2022-05-29 21:14:39', '2022-05-29 21:14:39'),
(119, 59, 5, '3', '-1', 'decrease from transaction', '2022-05-31 22:48:46', '2022-05-31 22:48:46'),
(120, 60, 3, '5', '0', 'created product', '2022-05-31 23:31:10', '2022-05-31 23:31:10'),
(121, 60, 5, '5', '-1', 'decrease from transaction', '2022-05-31 23:33:21', '2022-05-31 23:33:21'),
(122, 59, 5, '2', '-1', 'decrease from transaction', '2022-05-31 23:33:21', '2022-05-31 23:33:21'),
(123, 59, 5, '1', '-1', 'decrease from transaction', '2022-06-01 21:06:19', '2022-06-01 21:06:19'),
(124, 60, 5, '4', '-1', 'decrease from transaction', '2022-06-01 21:33:46', '2022-06-01 21:33:46'),
(125, 61, 3, '2', '0', 'created product', '2022-06-03 14:33:08', '2022-06-03 14:33:08'),
(126, 61, 5, '2', '-1', 'decrease from transaction', '2022-06-03 14:33:36', '2022-06-03 14:33:36'),
(127, 61, 5, '1', '-1', 'decrease from transaction', '2022-06-03 14:34:57', '2022-06-03 14:34:57'),
(128, 60, 5, '3', '-1', 'decrease from transaction', '2022-06-03 14:35:30', '2022-06-03 14:35:30'),
(129, 60, 5, '2', '-1', 'decrease from transaction', '2022-06-03 21:21:49', '2022-06-03 21:21:49'),
(130, 60, 5, '1', '-1', 'decrease from transaction', '2022-06-03 21:22:12', '2022-06-03 21:22:12'),
(131, 53, 3, '0', '3', 'change product qty from admin', '2022-06-03 21:23:13', '2022-06-03 21:23:13'),
(132, 54, 3, '0', '3', 'change product qty from admin', '2022-06-03 21:23:32', '2022-06-03 21:23:32'),
(133, 53, 5, '3', '-1', 'decrease from transaction', '2022-06-03 21:27:56', '2022-06-03 21:27:56'),
(134, 54, 5, '3', '-1', 'decrease from transaction', '2022-06-03 21:27:56', '2022-06-03 21:27:56'),
(135, 54, 5, '2', '-1', 'decrease from transaction', '2022-06-03 21:31:51', '2022-06-03 21:31:51'),
(136, 54, 5, '1', '-1', 'decrease from transaction', '2022-06-03 21:34:33', '2022-06-03 21:34:33'),
(137, 53, 5, '2', '-1', 'decrease from transaction', '2022-06-03 21:35:13', '2022-06-03 21:35:13'),
(138, 62, 3, '3', '0', 'created product', '2022-06-03 21:40:59', '2022-06-03 21:40:59'),
(139, 53, 5, '1', '-1', 'decrease from transaction', '2022-06-03 21:49:49', '2022-06-03 21:49:49'),
(140, 62, 5, '3', '-1', 'decrease from transaction', '2022-06-03 21:49:49', '2022-06-03 21:49:49'),
(141, 63, 10, '40', '0', 'created product', '2022-06-07 03:43:57', '2022-06-07 03:43:57'),
(142, 82, 10, '3', '0', 'created product', '2022-06-07 04:05:54', '2022-06-07 04:05:54'),
(143, 82, 10, '3', '4', 'change product qty from admin', '2022-06-07 04:16:50', '2022-06-07 04:16:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
(10, '2022_05_22_114819_add_store_column_table_user', 4),
(11, '2022_05_26_113142_modif_table_transaction', 5),
(12, '2022_05_28_051142_create_notification_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mark` int(11) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `qty`, `description`, `store`, `user_id`, `created_at`, `updated_at`) VALUES
(53, 'Lensa Essilor', 600000, 'uploads/images/1651059414essikor.jpg', 0, 'Lensa', 'Tlogomas', 3, '2022-04-27 04:36:54', '2022-06-03 21:49:49'),
(54, 'lensa calvin klein', 700000, 'uploads/images/1651059452calvin klein.jpg', 0, 'Lensa', 'Tlogomas', 3, '2022-04-27 04:37:32', '2022-06-03 21:34:33'),
(55, 'Lensa Hoya', 400000, 'uploads/images/1651059506hoya.jpg', 0, 'Lensa', 'Tlogomas', 3, '2022-04-27 04:38:26', '2022-05-22 05:22:09'),
(56, 'Frame calvinklein', 400000, 'uploads/images/1651059536frame calvin klein.jpg', 0, 'Frame', 'Tlogomas', 3, '2022-04-27 04:38:56', '2022-05-22 07:50:19'),
(57, 'Frame Rodenstock', 700000, 'uploads/images/1651060108rodenstock.jpg', 0, 'Frame', 'Tlogomas', 3, '2022-04-27 04:48:28', '2022-05-27 22:50:19'),
(58, 'Lensa Calvinklein', 400000, 'uploads/images/1651066945calvin klein.jpg', 0, 'Lensa', 'Tlogomas', 3, '2022-04-27 06:42:25', '2022-05-27 18:32:05'),
(59, 'frame a', 200000, 'uploads/images/1651067254hoya.jpg', 0, 'Frame', 'Tlogomas', 3, '2022-04-27 06:47:34', '2022-06-01 21:06:19'),
(61, 'Lensa Min', 200000, 'uploads/images/1654291987images.jpg', 0, 'Lensa', 'Tlogomas', 3, '2022-06-03 14:33:07', '2022-06-03 14:34:57'),
(62, 'Lensa Roddenstock', 200000, 'uploads/images/1654317659BG_PKL.jpg', 2, 'Lensa', 'Tlogomas', 3, '2022-06-03 21:40:59', '2022-06-03 21:49:49'),
(64, 'Lensa Essilor', 600000, 'uploads/images/1651059414essikor.jpg', 0, 'Lensa', 'Joyo Grand', 3, '2022-04-26 21:36:54', '2022-06-03 14:49:49'),
(65, 'lensa calvin klein', 700000, 'uploads/images/1651059452calvin klein.jpg', 0, 'Lensa', 'Joyo Grand', 3, '2022-04-26 21:37:32', '2022-06-03 14:34:33'),
(66, 'Lensa Hoya', 400000, 'uploads/images/1651059506hoya.jpg', 0, 'Lensa', 'Joyo Grand', 3, '2022-04-26 21:38:26', '2022-05-21 22:22:09'),
(67, 'Frame calvinklein', 400000, 'uploads/images/1651059536frame calvin klein.jpg', 0, 'Frame', 'Joyo Grand', 3, '2022-04-26 21:38:56', '2022-05-22 00:50:19'),
(68, 'Frame Rodenstock', 700000, 'uploads/images/1651060108rodenstock.jpg', 0, 'Frame', 'Joyo Grand', 3, '2022-04-26 21:48:28', '2022-05-27 15:50:19'),
(69, 'Lensa Calvinklein', 400000, 'uploads/images/1651066945calvin klein.jpg', 0, 'Lensa', 'Joyo Grand', 3, '2022-04-26 23:42:25', '2022-05-27 11:32:05'),
(70, 'frame a', 200000, 'uploads/images/1651067254hoya.jpg', 0, 'Frame', 'Joyo Grand', 3, '2022-04-26 23:47:34', '2022-06-01 14:06:19'),
(71, 'Lensa Min', 200000, 'uploads/images/1654291987images.jpg', 0, 'Lensa', 'Joyo Grand', 3, '2022-06-03 07:33:07', '2022-06-03 07:34:57'),
(72, 'Lensa Roddenstock', 200000, 'uploads/images/1654317659BG_PKL.jpg', 2, 'Lensa', 'Joyo Grand', 3, '2022-06-03 14:40:59', '2022-06-03 14:49:49'),
(73, 'Lensa Essilor', 600000, 'uploads/images/1651059414essikor.jpg', 0, 'Lensa', 'Singasari', 3, '2022-04-26 21:36:54', '2022-06-03 14:49:49'),
(74, 'lensa calvin klein', 700000, 'uploads/images/1651059452calvin klein.jpg', 0, 'Lensa', 'Singasari', 3, '2022-04-26 21:37:32', '2022-06-03 14:34:33'),
(75, 'Lensa Hoya', 400000, 'uploads/images/1651059506hoya.jpg', 0, 'Lensa', 'Singasari', 3, '2022-04-26 21:38:26', '2022-05-21 22:22:09'),
(76, 'Frame calvinklein', 400000, 'uploads/images/1651059536frame calvin klein.jpg', 0, 'Frame', 'Singasari', 3, '2022-04-26 21:38:56', '2022-05-22 00:50:19'),
(77, 'Frame Rodenstock', 700000, 'uploads/images/1651060108rodenstock.jpg', 0, 'Frame', 'Singasari', 3, '2022-04-26 21:48:28', '2022-05-27 15:50:19'),
(78, 'Lensa Calvinklein', 400000, 'uploads/images/1651066945calvin klein.jpg', 0, 'Lensa', 'Singasari', 3, '2022-04-26 23:42:25', '2022-05-27 11:32:05'),
(79, 'frame a', 200000, 'uploads/images/1651067254hoya.jpg', 0, 'Frame', 'Singasari', 3, '2022-04-26 23:47:34', '2022-06-01 14:06:19'),
(80, 'Lensa Min', 200000, 'uploads/images/1654291987images.jpg', 0, 'Lensa', 'Singasari', 3, '2022-06-03 07:33:07', '2022-06-03 07:34:57'),
(81, 'Lensa Roddenstock', 200000, 'uploads/images/1654317659BG_PKL.jpg', 2, 'Lensa', 'Singasari', 3, '2022-06-03 14:40:59', '2022-06-03 14:49:49'),
(82, 'dana', 10000, 'uploads/images/1654599954DANA.jpg', 7, 'Frame', 'Joyo Grand', 10, '2022-06-07 04:05:54', '2022-06-07 04:16:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_transation`
--

CREATE TABLE `product_transation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `invoices_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_transation`
--

INSERT INTO `product_transation` (`id`, `product_id`, `invoices_number`, `qty`, `created_at`, `updated_at`) VALUES
(13, 56, 'INV-000010', 2, '2022-04-27 04:47:25', '2022-04-27 04:47:25'),
(14, 58, 'INV-000011', 3, '2022-04-27 06:50:45', '2022-04-27 06:50:45'),
(15, 59, 'INV-000012', 3, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(16, 57, 'INV-000012', 2, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(17, 55, 'INV-000012', 2, '2022-05-22 05:22:09', '2022-05-22 05:22:09'),
(18, 56, 'INV-000013', 1, '2022-05-22 07:50:19', '2022-05-22 07:50:19'),
(19, 53, 'INV-000014', 1, '2022-05-22 07:54:51', '2022-05-22 07:54:51'),
(20, 54, 'INV-000015', 1, '2022-05-22 08:14:17', '2022-05-22 08:14:17'),
(21, 53, 'INV-000015', 1, '2022-05-22 08:14:17', '2022-05-22 08:14:17'),
(22, 53, 'INV-000016', 1, '2022-05-22 08:27:59', '2022-05-22 08:27:59'),
(23, 54, 'INV-000017', 1, '2022-05-26 05:11:21', '2022-05-26 05:11:21'),
(24, 59, 'INV-000018', 1, '2022-05-26 05:18:50', '2022-05-26 05:18:50'),
(25, 59, 'INV-000019', 1, '2022-05-27 17:36:10', '2022-05-27 17:36:10'),
(26, 59, 'INV-000020', 1, '2022-05-27 18:25:06', '2022-05-27 18:25:06'),
(27, 58, 'INV-000020', 2, '2022-05-27 18:25:06', '2022-05-27 18:25:06'),
(28, 59, 'INV-000021', 1, '2022-05-27 18:32:05', '2022-05-27 18:32:05'),
(29, 58, 'INV-000021', 1, '2022-05-27 18:32:05', '2022-05-27 18:32:05'),
(30, 57, 'INV-000022', 1, '2022-05-27 22:23:27', '2022-05-27 22:23:27'),
(31, 57, 'INV-000023', 1, '2022-05-27 22:24:21', '2022-05-27 22:24:21'),
(32, 59, 'INV-000024', 1, '2022-05-27 22:34:11', '2022-05-27 22:34:11'),
(33, 57, 'INV-000025', 1, '2022-05-27 22:50:19', '2022-05-27 22:50:19'),
(34, 59, 'INV-000026', 1, '2022-05-27 22:53:53', '2022-05-27 22:53:53'),
(35, 59, 'INV-000027', 1, '2022-05-27 22:58:33', '2022-05-27 22:58:33'),
(36, 59, 'INV-000028', 1, '2022-05-27 23:03:30', '2022-05-27 23:03:30'),
(37, 59, 'INV-000029', 1, '2022-05-27 23:05:47', '2022-05-27 23:05:47'),
(38, 59, 'INV-000030', 1, '2022-05-29 21:14:39', '2022-05-29 21:14:39'),
(39, 59, 'INV-000031', 1, '2022-05-31 22:48:46', '2022-05-31 22:48:46'),
(40, 60, 'INV-000032', 1, '2022-05-31 23:33:21', '2022-05-31 23:33:21'),
(41, 59, 'INV-000032', 1, '2022-05-31 23:33:21', '2022-05-31 23:33:21'),
(42, 59, 'INV-000033', 1, '2022-06-01 21:06:19', '2022-06-01 21:06:19'),
(43, 60, 'INV-000034', 1, '2022-06-01 21:33:47', '2022-06-01 21:33:47'),
(44, 61, 'INV-000035', 1, '2022-06-03 14:33:36', '2022-06-03 14:33:36'),
(45, 61, 'INV-000036', 1, '2022-06-03 14:34:57', '2022-06-03 14:34:57'),
(46, 60, 'INV-000037', 1, '2022-06-03 14:35:30', '2022-06-03 14:35:30'),
(47, 60, 'INV-000038', 1, '2022-06-03 21:21:49', '2022-06-03 21:21:49'),
(48, 60, 'INV-000039', 1, '2022-06-03 21:22:13', '2022-06-03 21:22:13'),
(49, 53, 'INV-000040', 1, '2022-06-03 21:27:57', '2022-06-03 21:27:57'),
(50, 54, 'INV-000040', 1, '2022-06-03 21:27:57', '2022-06-03 21:27:57'),
(51, 54, 'INV-000041', 1, '2022-06-03 21:31:51', '2022-06-03 21:31:51'),
(52, 54, 'INV-000043', 1, '2022-06-03 21:34:33', '2022-06-03 21:34:33'),
(53, 53, 'INV-000044', 1, '2022-06-03 21:35:13', '2022-06-03 21:35:13'),
(54, 53, 'INV-000045', 1, '2022-06-03 21:49:49', '2022-06-03 21:49:49'),
(55, 62, 'INV-000045', 1, '2022-06-03 21:49:49', '2022-06-03 21:49:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transcations`
--

CREATE TABLE `transcations` (
  `id` int(11) NOT NULL,
  `invoices_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pay` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0 = Gagal, 1 = Diorder, 2 = Dikirim, 3 = Sampai',
  `konfirmasi` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum dikonfirmasi, 1 = Sudah dikonfirmasi',
  `store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transcations`
--

INSERT INTO `transcations` (`id`, `invoices_number`, `user_id`, `pay`, `total`, `status`, `konfirmasi`, `store`, `created_at`, `updated_at`, `name`, `number`) VALUES
(17, 'INV-000017', 5, 700000, 700000, 3, 1, 'Tlogomas', '2022-05-26 05:11:21', '2022-05-27 17:30:39', 'null', 0),
(18, 'INV-000018', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-26 05:18:50', '2022-05-27 17:30:37', 'Dila', 81238201029),
(19, 'INV-000019', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 17:36:10', '2022-05-27 22:22:58', 'Andri', 85926053912),
(20, 'INV-000020', 5, 1100000, 1000000, 3, 1, 'Tlogomas', '2022-05-27 18:25:06', '2022-05-27 22:22:56', 'Vivin', 85926053912),
(21, 'INV-000021', 6, 650000, 600000, 3, 1, 'Joyo Grand', '2022-05-27 18:32:05', '2022-05-27 18:37:59', 'ab', 85926053912),
(22, 'INV-000022', 5, 700000, 700000, 3, 1, 'Tlogomas', '2022-05-27 22:23:27', '2022-05-27 22:24:06', 'Dila', 853799765),
(23, 'INV-000023', 5, 700000, 700000, 3, 1, 'Tlogomas', '2022-05-27 22:24:21', '2022-05-27 22:33:55', 'Dila', 853799765),
(24, 'INV-000024', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 22:34:11', '2022-05-27 22:45:33', 'Dila', 853799765),
(25, 'INV-000025', 5, 700000, 700000, 3, 1, 'Tlogomas', '2022-05-27 22:50:19', '2022-05-27 22:53:20', 'Dila', 853799765),
(26, 'INV-000026', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 22:53:53', '2022-05-27 22:54:14', 'Dila', 853799765),
(27, 'INV-000027', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 22:58:33', '2022-05-27 22:58:52', 'Dila', 853799765),
(28, 'INV-000028', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 23:03:30', '2022-05-27 23:05:09', 'Dila', 853799765),
(29, 'INV-000029', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-27 23:05:47', '2022-05-27 23:06:06', 'Dila', 853799765),
(30, 'INV-000030', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-29 21:14:39', '2022-05-29 21:18:13', 'Dila', 853799765),
(31, 'INV-000031', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-05-31 22:48:46', '2022-05-31 22:50:30', 'Dila', 853799765),
(32, 'INV-000032', 5, 850000, 800000, 3, 1, 'Tlogomas', '2022-05-31 23:33:21', '2022-05-31 23:36:04', 'Syaddad', 853799765),
(33, 'INV-000033', 5, 200000, 200000, 3, 1, 'Tlogomas', '2022-06-01 21:06:19', '2022-06-01 21:07:43', 'Dila', 853799765),
(34, 'INV-000034', 5, 600000, 600000, 3, 1, 'Tlogomas', '2022-06-01 21:33:47', '2022-06-01 21:35:04', 'Dila', 853799765),
(35, 'INV-000035', 5, 200000, 190000, 3, 1, 'Tlogomas', '2022-06-03 14:33:36', '2022-06-03 21:24:22', 'Syaddad', 853799765),
(36, 'INV-000036', 5, 200000, 180000, 3, 1, 'Tlogomas', '2022-06-03 14:34:57', '2022-06-03 21:24:21', 'Andri', 853799765),
(37, 'INV-000037', 5, 600000, 600000, 3, 1, 'Tlogomas', '2022-06-03 14:35:30', '2022-06-03 21:24:20', 'Andri', 853799765),
(38, 'INV-000038', 5, 550000, 540000, 3, 1, 'Tlogomas', '2022-06-03 21:21:49', '2022-06-03 21:24:19', 'Andri', 85926053912),
(39, 'INV-000039', 5, 550000, 540000, 3, 1, 'Tlogomas', '2022-06-03 21:22:13', '2022-06-03 21:24:19', 'Andri', 85926053912),
(40, 'INV-000040', 5, 1200000, 1170000, 1, 0, 'Tlogomas', '2022-06-03 21:27:56', '2022-06-03 21:27:56', 'Andri', 85926053912),
(41, 'INV-000041', 5, 700000, 700000, 1, 0, 'Tlogomas', '2022-06-03 21:31:51', '2022-06-03 21:31:51', 'Andri', 85926053912),
(42, 'INV-000042', 5, 700000, 700000, 1, 0, 'Tlogomas', '2022-06-03 21:31:52', '2022-06-03 21:31:52', 'Andri', 85926053912),
(43, 'INV-000043', 5, 700000, 700000, 1, 0, 'Tlogomas', '2022-06-03 21:34:33', '2022-06-03 21:34:33', 'Andri', 85926053912),
(44, 'INV-000044', 5, 600000, 600000, 1, 0, 'Tlogomas', '2022-06-03 21:35:13', '2022-06-03 21:35:13', 'Andri', 85926053912),
(45, 'INV-000045', 5, 750000, 720000, 3, 1, 'Tlogomas', '2022-06-03 21:49:49', '2022-06-03 21:53:18', 'Andri', 85926053912);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `store`) VALUES
(2, 'karyawan', 'karyawan@gmail.com', NULL, '$2y$10$JRUOLW7/qLXUlwxYUzIgE.s3cQT/PRXBE/Aea1ryQDGO7FWw9mofu', NULL, '2021-10-27 18:43:57', '2021-10-27 18:43:57', 'Karyawan', ''),
(5, 'Ella', 'ella@gmail.com', NULL, '$2y$10$fKgpTED2W0WpDJOhI.POxOpofRWtH3e7N7vgZVpWegqLLD2dd1C5G', NULL, '2022-05-22 08:25:45', '2022-05-22 08:25:45', 'Karyawan', 'Tlogomas'),
(6, 'User', 'user@gmail.com', NULL, '$2y$10$FpPifw3oyKwvjB22bWzSAeW65r1QMf4Ya0rdRL3SKG6p33UJqNSyy', NULL, '2022-05-27 18:31:09', '2022-05-27 18:31:09', 'Karyawan', 'Joyo Grand'),
(10, 'Andri Syarif', 'andrisyarif02@gmail.com', NULL, '$2y$10$Rz5jggUSsZ0C5nCuL3WMFehMOnEjb2LHuLsu0xJJ/SdJs.cpEiogW', NULL, '2022-06-06 01:47:11', '2022-06-06 01:47:11', 'Administrator', 'Tlogomas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_products`
--
ALTER TABLE `history_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_transation`
--
ALTER TABLE `product_transation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transcations`
--
ALTER TABLE `transcations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_products`
--
ALTER TABLE `history_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `product_transation`
--
ALTER TABLE `product_transation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `transcations`
--
ALTER TABLE `transcations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
