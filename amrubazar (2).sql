-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 01:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `description`, `created_at`, `updated_at`) VALUES
(2, '<p><strong>About Us</strong></p>\r\n\r\n<p><strong>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Quis Ipsum Suspendisse Ultrices Gravida. Risus Commodo Viverra Maecenas Accumsan Lacus Vel Facilisis. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Quis Ipsum Suspendisse Ultrices Gravida. Risus Commodo Viverra Maecenas Accumsan Lacus Vel Facilisis. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Quis Ipsum Suspendisse Ultrices Gravida. Risus Commodo Viverra Maecenas Accumsan Lacus Vel Facilisis.</strong></p>', '2020-10-03 10:31:40', '2020-10-03 10:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `address`, `facebook`, `youtube`, `created_at`, `updated_at`) VALUES
(2, '01858361812', 'Uttara sector 11', 'https://www.facebook.com', 'https://www.youtube.com/', '2020-09-30 10:05:41', '2020-09-30 11:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Foysal Rahman Nitu', 'foysalrahman112@gmail.com', '01855570816', 'testr', '2020-10-03 08:52:06', '2020-10-03 08:52:06'),
(2, 'Foysal Rahman Nitu', 'foysalrahman112@gmail.com', '01855570816', 'testr', '2020-10-03 10:10:11', '2020-10-03 10:10:11'),
(3, 'Foysal Rahman Nitu', 'foysalrahman112@gmail.com', '01855570816', 'adsdasd', '2020-10-03 10:18:13', '2020-10-03 10:18:13'),
(4, 'Foysal Rahman Nitu', 'foysalrahman112@gmail.com', '01855570816', 'dasdfawfgqwehg', '2020-10-03 10:18:43', '2020-10-03 10:18:43'),
(5, 'Foysal Rahman Nitu', 'foysalrahman112@gmail.com', '01855570816', 'dasfasgseadnnjdrtnmt', '2020-10-03 10:18:59', '2020-10-03 10:18:59');

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
-- Table structure for table `home_banner_imgs`
--

CREATE TABLE `home_banner_imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `left_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banner_imgs`
--

INSERT INTO `home_banner_imgs` (`id`, `left_image`, `right_image`, `bottom_image`, `created_at`, `updated_at`) VALUES
(1, '1601109304qnQ3l8chngvH.png', '1601109304sHpKsGWgi3I4.png', '1601109304Y8l3bkclwSo4.png', '2020-09-23 23:08:23', '2020-09-26 08:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_invoices`
--

CREATE TABLE `inventory_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_invoices`
--

INSERT INTO `inventory_invoices` (`id`, `name`, `address`, `contact`, `shop`, `created_at`, `updated_at`) VALUES
(4, 'rehi', 'rehi', '12345', 'Unknown', '2020-09-24 03:18:04', '2020-09-24 03:18:04'),
(5, 'imran', 'imran', '12345', 'Unknown', '2020-09-24 03:18:17', '2020-09-24 03:18:17'),
(6, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2020-09-24 05:37:46', '2020-09-24 05:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `delivery_charge` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `total`, `delivery_charge`, `status`, `delivery_address`, `phone`, `order_note`, `created_at`, `updated_at`) VALUES
(29, 13, 2308, 100, 3, '30\r\n2nd Floor', '01855570816', NULL, '2020-10-03 06:09:48', '2020-10-03 06:15:17'),
(30, 13, 1180, 100, 3, '30\r\n2nd Floor', '01855570816', NULL, '2020-10-03 07:06:45', '2020-10-03 07:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(2, 'about', 'http://localhost:8000/about', '2020-10-03 05:49:31', '2020-10-03 05:49:31'),
(3, 'contact', 'http://localhost:8000/contact', '2020-10-03 06:21:15', '2020-10-03 06:21:15');

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
(9, '2020_09_22_054910_create_role_user_table', 4),
(10, '2020_09_22_070356_create_home_banner_imgs_table', 5),
(11, '2020_09_23_060537_create_sliders_table', 5),
(12, '2020_09_24_063014_create_inventory_invoices_table', 6),
(13, '2020_09_24_063637_create_product_orders_table', 6),
(14, '2020_09_24_100543_create_wastes_table', 7),
(15, '2020_09_26_155923_create_carts_table', 8),
(16, '2020_09_29_171434_create_orders_table', 9),
(17, '2020_09_29_171545_create_invoices_table', 9),
(18, '2020_09_30_124546_create_contacts_table', 10),
(19, '2020_09_30_141519_create_links_table', 11),
(20, '2020_10_01_122542_create_news_letters_table', 12),
(21, '2020_10_03_120424_add_product_id_to_order_table', 13),
(22, '2020_10_03_140953_create_abouts_table', 14),
(23, '2020_10_03_143916_create_contact_infos_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '2020-10-01 10:10:17', '2020-10-01 10:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `image`, `size`, `unit_price`, `qty`, `total`, `invoice_id`, `status`, `created_at`, `updated_at`, `product_id`) VALUES
(44, 'টেংরা মাছ (দেশি) per kg', '1601380526N4kLJv8YTnIg.png', '1', 400, 2, 800, 29, 3, '2020-10-03 06:09:48', '2020-10-03 06:15:17', 16),
(45, 'mixed fruits', '1600678541nhx86F9bc2T3.png', '0', 758, 1, 758, 29, 3, '2020-10-03 06:09:48', '2020-10-03 06:15:17', 1),
(46, 'mixed vegitables', '1600678677TujbM64D1XuX.png', '0', 750, 1, 750, 29, 3, '2020-10-03 06:09:48', '2020-10-03 06:15:17', 3),
(47, 'টেংরা মাছ (দেশি) per kg', '1601380526N4kLJv8YTnIg.png', '1', 400, 1, 400, 30, 3, '2020-10-03 07:06:45', '2020-10-03 07:07:12', 16),
(48, 'dog food', '1600679444ycvckDi75egI.png', '0', 480, 1, 480, 30, 3, '2020-10-03 07:06:45', '2020-10-03 07:07:12', 10),
(49, 'cat food', '1600679386Wf9Gx7MK0l0s.png', '0', 300, 1, 300, 30, 3, '2020-10-03 07:06:46', '2020-10-02 07:07:12', 9);

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
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL DEFAULT 0,
  `is_packaged` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `cat_id`, `regular_price`, `offer_price`, `size`, `quantity`, `is_packaged`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mixed fruits', 'mixed-fruits', 'mixed fruits mixed fruits mixed fruits', 15, 758, NULL, '0', 14, 1, 0, 1, '2020-09-21 02:55:41', '2020-10-03 06:15:17'),
(2, 'black berry', 'black-berry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 15, 300, 280, '0', 0, 0, 1, 1, '2020-09-21 02:56:59', '2020-09-21 03:27:26'),
(3, 'mixed vegitables', 'mixed-vegitables', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16, 750, NULL, '0', 149, 1, 0, 1, '2020-09-21 02:57:57', '2020-10-03 06:15:17'),
(4, 'frozer fish', 'frozer-fish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 17, 1400, NULL, '0', 150, 0, 0, 1, '2020-09-21 02:59:27', '2020-09-21 02:59:27'),
(5, 'fresh fish', 'fresh-fish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 18, 1000, 980, '0', 140, 0, 0, 1, '2020-09-21 03:00:20', '2020-09-21 03:00:20'),
(6, 'tea', 'tea', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, 50, NULL, '0', 200, 0, 0, 1, '2020-09-21 03:01:44', '2020-09-21 03:01:44'),
(7, 'coffee', 'coffee', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, 200, NULL, '0', 97, 0, 0, 1, '2020-09-21 03:02:27', '2020-09-24 05:37:46'),
(8, 'health care', 'health-care', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 21, 150, NULL, '0', 47, 0, 0, 1, '2020-09-21 03:07:40', '2020-09-24 03:18:17'),
(9, 'cat food', 'cat-food', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 22, 300, NULL, '0', 4, 0, 0, 1, '2020-09-21 03:09:46', '2020-10-03 07:07:12'),
(10, 'dog food', 'dog-food', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 23, 500, 480, '0', 48, 0, 0, 1, '2020-09-21 03:10:44', '2020-10-03 07:07:12'),
(13, 'গুলশা (বড়) / (মাঝারি)', 'gulsa-br-majhari', 'গুলশা (বড়) / (মাঝারি)', 18, 800, NULL, '1', 0, 0, 1, 1, '2020-09-29 06:38:55', '2020-09-29 06:38:55'),
(14, 'গলদা চিংড়ি (বড়)', 'glda-cingri-br', 'গলদা চিংড়ি (বড়)', 18, 1050, NULL, '1', 0, 0, 1, 1, '2020-09-29 06:40:21', '2020-09-29 06:40:21'),
(15, 'মিক্সড ফিশ (kg )', 'miksd-fis-kg', 'মিক্সড ফিশ (kg )', 18, 450, NULL, '1', 0, 0, 1, 1, '2020-09-29 11:54:42', '2020-09-29 11:54:42'),
(16, 'টেংরা মাছ (দেশি) per kg', 'tengra-mach-desi-per-kg', 'টেংরা মাছ (দেশি) per kg', 18, 400, NULL, '1', 7, 0, 1, 1, '2020-09-29 11:55:26', '2020-10-03 07:07:12');

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
(30, 10, '1600679444CTsipy0Rjs1C.png', '2020-09-21 03:10:44', '2020-09-21 03:10:44'),
(37, 13, '16013615355vp1OLZTvwAh.png', '2020-09-29 06:38:56', '2020-09-29 06:38:56'),
(38, 13, '1601361536kvHmDXW6QQPy.png', '2020-09-29 06:38:56', '2020-09-29 06:38:56'),
(39, 13, '16013615365C5ts1GXjgaI.png', '2020-09-29 06:38:57', '2020-09-29 06:38:57'),
(40, 14, '16013616210uB82mLJXRyU.png', '2020-09-29 06:40:22', '2020-09-29 06:40:22'),
(41, 14, '1601361622jvRznvnHC4fv.png', '2020-09-29 06:40:22', '2020-09-29 06:40:22'),
(42, 14, '1601361622ga9vBKl7Ys6Q.png', '2020-09-29 06:40:23', '2020-09-29 06:40:23'),
(43, 15, '1601380482RVPddQLVBkKX.png', '2020-09-29 11:54:42', '2020-09-29 11:54:42'),
(44, 15, '1601380482lJ3hLejqYkZ8.png', '2020-09-29 11:54:43', '2020-09-29 11:54:43'),
(45, 15, '1601380483Za6Db3bbRPBr.png', '2020-09-29 11:54:43', '2020-09-29 11:54:43'),
(46, 16, '1601380526N4kLJv8YTnIg.png', '2020-09-29 11:55:26', '2020-09-29 11:55:26'),
(47, 16, '1601380526k7VtbX4uZ9Rv.png', '2020-09-29 11:55:26', '2020-09-29 11:55:26'),
(48, 16, '1601380526ED4f0aY3ECYC.png', '2020-09-29 11:55:27', '2020-09-29 11:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `unit_price` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `invoice_id`, `product_id`, `name`, `qty`, `unit_price`, `total`, `created_at`, `updated_at`) VALUES
(5, 4, 10, 'dog food', 15, 50, 750, '2020-09-24 03:18:04', '2020-09-24 03:18:04'),
(6, 5, 8, 'health care', 2, 500, 1000, '2020-09-24 03:18:17', '2020-09-24 03:18:17'),
(7, 6, 10, 'dog food', 4, 150, 600, '2020-09-24 05:37:46', '2020-09-24 05:37:46'),
(8, 6, 9, 'cat food', 5, 40, 200, '2020-09-24 05:37:46', '2020-09-24 05:37:46'),
(9, 6, 7, 'coffee', 52, 100, 5200, '2020-09-24 05:37:46', '2020-09-24 05:37:46');

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
(7, 1, 11, NULL, NULL),
(8, 2, 12, NULL, NULL),
(9, 2, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '41.jpg', '2020-09-23 23:27:36', '2020-09-23 23:27:36'),
(2, '98.jpg', '2020-09-23 23:27:45', '2020-09-23 23:27:45'),
(3, '2.jpg', '2020-09-23 23:27:57', '2020-09-23 23:27:57');

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
(11, 'superadmin', 'superadmin@gmail.com', NULL, NULL, '$2y$10$v4Hp8zlbg/8W1EFaCIbb7OUYuUREgXHRgQu4EyG/k56CiwGrScaNu', NULL, '2020-10-01 08:14:51', '2020-10-01 08:14:51'),
(12, 'customer', 'customer@gmail.com', NULL, NULL, '$2y$10$O1RWqAOFfD4KtNGs01S3geE.bb6zA0hc6RcaAxOGURpeDn50tkat6', NULL, '2020-10-01 08:15:31', '2020-10-01 08:15:31'),
(13, 'Foysal Rahman', 'foysalrahman112@gmail.com', NULL, NULL, '$2y$10$NXudvtNRY1J0NZi2WLvNV.MXNgSdFy0WtGbz9Oi7L7.kXdXfRa98i', NULL, '2020-10-01 10:15:24', '2020-10-01 10:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `wastes`
--

CREATE TABLE `wastes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wastes`
--

INSERT INTO `wastes` (`id`, `p_id`, `qty`, `created_at`, `updated_at`) VALUES
(2, 10, 7, '2020-09-24 04:38:14', '2020-09-24 04:38:14'),
(3, 9, 45, '2020-09-24 04:50:34', '2020-09-24 04:50:34'),
(4, 10, 5, '2020-09-24 05:39:07', '2020-09-24 05:39:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_banner_imgs`
--
ALTER TABLE `home_banner_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_invoices`
--
ALTER TABLE `inventory_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wastes`
--
ALTER TABLE `wastes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_banner_imgs`
--
ALTER TABLE `home_banner_imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_invoices`
--
ALTER TABLE `inventory_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wastes`
--
ALTER TABLE `wastes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
