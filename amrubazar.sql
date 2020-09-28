-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 02:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amrubazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon_image`, `thumbnail`, `parent_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(8, 'Fresh Fruits & vegetable', 'fresh-fruits-vegetable', '42.png', NULL, '0', 0, '2020-09-21 02:16:17', '2020-09-21 02:16:17'),
(9, 'Meat & Fish', 'meat-fish', '49.png', NULL, '0', 0, '2020-09-21 02:16:47', '2020-09-21 02:16:47'),
(10, 'Beverage', 'beverage', '47.png', NULL, '0', 0, '2020-09-21 02:17:04', '2020-09-21 02:17:04'),
(11, 'Beauty & Health', 'beauty-health', '98.png', NULL, '0', 0, '2020-09-21 02:17:27', '2020-09-21 02:17:27'),
(12, 'pet care', 'pet-care', '13.png', NULL, '0', 0, '2020-09-21 02:29:04', '2020-09-21 02:29:39'),
(13, 'Home & Cleaning', 'home-cleaning', '29.png', NULL, '0', 0, '2020-09-21 02:30:17', '2020-09-21 02:30:48'),
(14, 'Pest Control', 'pest-control', '7.png', NULL, '0', 0, '2020-09-21 02:31:06', '2020-09-21 02:31:06'),
(15, 'Fresh Fruits', 'fresh-fruits', NULL, NULL, '8', 0, '2020-09-21 02:34:37', '2020-09-21 02:34:37'),
(16, 'Vegetable', 'vegetable', NULL, NULL, '8', 0, '2020-09-21 02:35:19', '2020-09-21 02:35:19'),
(17, 'frozen fish', 'frozen-fish', NULL, NULL, '9', 0, '2020-09-21 02:35:35', '2020-09-21 02:35:35'),
(18, 'fresh fish', 'fresh-fish', NULL, NULL, '9', 0, '2020-09-21 02:35:47', '2020-09-21 02:35:54'),
(19, 'tea', 'tea', NULL, NULL, '10', 0, '2020-09-21 02:36:11', '2020-09-21 02:36:11'),
(20, 'coffee', 'coffee', NULL, NULL, '10', 0, '2020-09-21 02:36:23', '2020-09-21 02:36:23'),
(21, 'health care', 'health-care', NULL, NULL, '11', 0, '2020-09-21 02:36:38', '2020-09-21 02:36:38'),
(22, 'cat food', 'cat-food', NULL, NULL, '12', 0, '2020-09-21 02:36:50', '2020-09-21 02:36:50'),
(23, 'dog food', 'dog-food', NULL, NULL, '12', 0, '2020-09-21 02:36:58', '2020-09-21 02:36:58'),
(24, 'air freshner', 'air-freshner', NULL, NULL, '13', 0, '2020-09-21 02:37:40', '2020-09-21 02:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '86.png', '2020-09-21 09:08:22', '2020-09-21 09:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_19_034045_create_categories_table', 2),
(5, '2020_09_20_051412_create_logos_table', 3),
(6, '2020_09_20_062259_create_products_table', 3),
(7, '2020_09_20_083006_create_product_images_table', 3),
(8, '2020_09_22_054825_create_roles_table', 4),
(9, '2020_09_22_054910_create_role_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `is_packaged` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `cat_id`, `regular_price`, `offer_price`, `stock`, `is_packaged`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mixed fruits', 'mixed-fruits', 'mixed fruits mixed fruits mixed fruits', 15, 758, NULL, 15, 1, 0, 1, '2020-09-21 02:55:41', '2020-09-21 03:27:43'),
(2, 'black berry', 'black-berry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 15, 300, 280, 14, 0, 1, 1, '2020-09-21 02:56:59', '2020-09-21 03:27:26'),
(3, 'mixed vegitables', 'mixed-vegitables', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16, 750, NULL, 150, 1, 0, 1, '2020-09-21 02:57:57', '2020-09-21 02:57:57'),
(4, 'frozer fish', 'frozer-fish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 17, 1400, NULL, 150, 0, 0, 1, '2020-09-21 02:59:27', '2020-09-21 02:59:27'),
(5, 'fresh fish', 'fresh-fish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 18, 1000, 980, 140, 0, 0, 1, '2020-09-21 03:00:20', '2020-09-21 03:00:20'),
(6, 'tea', 'tea', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, 50, NULL, 200, 0, 0, 1, '2020-09-21 03:01:44', '2020-09-21 03:01:44'),
(7, 'coffee', 'coffee', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, 200, NULL, 45, 0, 0, 1, '2020-09-21 03:02:27', '2020-09-21 03:02:27'),
(8, 'health care', 'health-care', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 21, 150, NULL, 45, 0, 0, 1, '2020-09-21 03:07:40', '2020-09-21 03:07:40'),
(9, 'cat food', 'cat-food', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 22, 300, NULL, 45, 0, 0, 1, '2020-09-21 03:09:46', '2020-09-21 03:09:46'),
(10, 'dog food', 'dog-food', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 23, 500, 480, 46, 0, 0, 1, '2020-09-21 03:10:44', '2020-09-21 03:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1600678541nhx86F9bc2T3.png', '2020-09-21 02:55:41', '2020-09-21 02:55:41'),
(2, 1, '1600678541pLL16RNrbrxx.png', '2020-09-21 02:55:41', '2020-09-21 02:55:41'),
(3, 1, '16006785418Q7qBEAXXymt.png', '2020-09-21 02:55:41', '2020-09-21 02:55:41'),
(4, 2, '1600678619iLnguhU4VgoU.png', '2020-09-21 02:56:59', '2020-09-21 02:56:59'),
(5, 2, '1600678619Q5TKtR5YtLpx.png', '2020-09-21 02:57:00', '2020-09-21 02:57:00'),
(6, 2, '1600678620itnrrpBqwYY9.png', '2020-09-21 02:57:00', '2020-09-21 02:57:00'),
(7, 3, '1600678677TujbM64D1XuX.png', '2020-09-21 02:57:57', '2020-09-21 02:57:57'),
(8, 3, '1600678677bmEOunuxN2ZT.png', '2020-09-21 02:57:57', '2020-09-21 02:57:57'),
(9, 3, '1600678677glP6zuFZnD5V.png', '2020-09-21 02:57:58', '2020-09-21 02:57:58'),
(10, 4, '16006787677GhghSoQyHlF.png', '2020-09-21 02:59:27', '2020-09-21 02:59:27'),
(11, 4, '1600678767dUKlKMY0OCyY.png', '2020-09-21 02:59:27', '2020-09-21 02:59:27'),
(12, 4, '1600678767HhmvMLFl9pOf.png', '2020-09-21 02:59:27', '2020-09-21 02:59:27'),
(13, 5, '1600678820cnA3BM7mYOCr.png', '2020-09-21 03:00:20', '2020-09-21 03:00:20'),
(14, 5, '16006788206aF0v01cRXMX.png', '2020-09-21 03:00:21', '2020-09-21 03:00:21'),
(15, 5, '1600678821lDRClVkLLVQT.png', '2020-09-21 03:00:21', '2020-09-21 03:00:21'),
(16, 6, '16006789040fJuwzxUA3DW.png', '2020-09-21 03:01:44', '2020-09-21 03:01:44'),
(17, 6, '16006789042qWF8RjsSdmQ.png', '2020-09-21 03:01:44', '2020-09-21 03:01:44'),
(18, 6, '1600678904MWd1krbsTbK0.png', '2020-09-21 03:01:44', '2020-09-21 03:01:44'),
(19, 7, '1600678947xUuqlNjfCUSd.png', '2020-09-21 03:02:27', '2020-09-21 03:02:27'),
(20, 7, '1600678947o03QHbkX9EuW.png', '2020-09-21 03:02:28', '2020-09-21 03:02:28'),
(21, 7, '16006789489Kt8GVkY9QsL.png', '2020-09-21 03:02:28', '2020-09-21 03:02:28'),
(22, 8, '1600679260m7tUzWyGLHuW.png', '2020-09-21 03:07:40', '2020-09-21 03:07:40'),
(23, 8, '1600679260v2ue16vJWlLJ.png', '2020-09-21 03:07:40', '2020-09-21 03:07:40'),
(24, 8, '1600679260qyJhcHbcTlHj.png', '2020-09-21 03:07:41', '2020-09-21 03:07:41'),
(25, 9, '1600679386Wf9Gx7MK0l0s.png', '2020-09-21 03:09:46', '2020-09-21 03:09:46'),
(26, 9, '1600679386SN6zNdT1ddKX.png', '2020-09-21 03:09:46', '2020-09-21 03:09:46'),
(27, 9, '1600679386WIXVguJYSDJX.png', '2020-09-21 03:09:46', '2020-09-21 03:09:46'),
(28, 10, '1600679444ycvckDi75egI.png', '2020-09-21 03:10:44', '2020-09-21 03:10:44'),
(29, 10, '16006794449gY6LUTSzqEs.png', '2020-09-21 03:10:44', '2020-09-21 03:10:44'),
(30, 10, '1600679444CTsipy0Rjs1C.png', '2020-09-21 03:10:44', '2020-09-21 03:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2020-09-22 05:59:13', '2020-09-22 05:59:13'),
(2, 'customer', '2020-09-22 06:13:20', '2020-09-22 06:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 7, NULL, NULL),
(5, 2, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'example', 'example@gmail.com', NULL, NULL, '$2y$10$gb2eJnt3RPoyXXgStrJOduLjxT/j5b8C4ZJA88pwNRdaCvRnCD83G', 'zewBInKCwEmaJQ3b2HNeH4QxmPf79womcJsg28ktwpGo7SUY9Q0ucMCUGOWb', '2020-09-22 00:19:20', '2020-09-22 00:19:20'),
(9, 'test', 'test@gmail.com', NULL, NULL, '$2y$10$udoof53UdrBH1O8EZGN8e.zJMWrBusff.Gc1dsPTbmPABNRpcY5ai', NULL, '2020-09-22 00:31:54', '2020-09-22 00:31:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
