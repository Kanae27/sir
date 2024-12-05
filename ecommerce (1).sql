-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2024 at 06:13 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 'i:1;', 1733236612),
('0ade7c2cf97f75d009975f4d720d1fa6c19f4897:timer', 'i:1733236612;', 1733236612),
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1733378665),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1733378665;', 1733378665),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1733114984),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1733114984;', 1733114984),
('c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:1;', 1733123816),
('c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1733123816;', 1733123816),
('client@gmail.com|110.54.197.172', 'i:2;', 1733114258),
('client@gmail.com|110.54.197.172:timer', 'i:1733114258;', 1733114258),
('end3624@gmail.com|49.149.214.139', 'i:1;', 1733115099),
('end3624@gmail.com|49.149.214.139:timer', 'i:1733115099;', 1733115099),
('fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1733123498),
('fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1733123498;', 1733123498),
('rmsbsu@gmail.com|2405:8d40:4885:3576:14b1:db0e:a662:1eff', 'i:1;', 1733123345),
('rmsbsu@gmail.com|2405:8d40:4885:3576:14b1:db0e:a662:1eff:timer', 'i:1733123345;', 1733123345);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 3, 2, 3, 5, '2024-12-02 05:49:51', '2024-12-02 05:50:01'),
(6, 3, 1, 4, 3, '2024-12-02 06:25:44', '2024-12-02 06:26:11'),
(7, 6, 2, 5, 3, '2024-12-02 06:32:47', '2024-12-02 06:33:01'),
(8, 3, 3, 6, 6, '2024-12-02 07:02:45', '2024-12-02 07:05:14'),
(9, 4, 6, 7, 6, '2024-12-02 07:06:12', '2024-12-02 07:17:30'),
(11, 3, 2, 8, 8, '2024-12-02 07:13:46', '2024-12-02 07:20:04'),
(12, 5, 1, 8, 8, '2024-12-02 07:14:02', '2024-12-02 07:20:04'),
(13, 6, 1, 8, 8, '2024-12-02 07:15:01', '2024-12-02 07:20:04'),
(14, 7, 1, 8, 8, '2024-12-02 07:15:16', '2024-12-02 07:20:04'),
(15, 8, 2, 8, 8, '2024-12-02 07:15:27', '2024-12-02 07:20:04'),
(16, 9, 1, 8, 8, '2024-12-02 07:16:14', '2024-12-02 07:20:04'),
(17, 10, 1, 8, 8, '2024-12-02 07:16:26', '2024-12-02 07:20:04'),
(18, 21, 5, 8, 8, '2024-12-02 07:16:37', '2024-12-02 07:20:04'),
(20, 4, 1, 8, 8, '2024-12-02 07:19:00', '2024-12-02 07:20:04'),
(21, 3, 1, 9, 8, '2024-12-02 07:28:23', '2024-12-02 07:28:34'),
(22, 4, 6, 10, 1, '2024-12-02 08:00:18', '2024-12-02 08:01:53'),
(23, 4, 1, 11, 9, '2024-12-03 14:35:17', '2024-12-03 14:35:54'),
(26, 8, 2, 12, 3, '2024-12-04 17:41:22', '2024-12-04 19:07:36'),
(27, 3, 1, 12, 3, '2024-12-04 17:41:26', '2024-12-04 19:07:36'),
(28, 10, 1, 12, 3, '2024-12-04 17:43:52', '2024-12-04 19:07:36'),
(29, 7, 1, 12, 3, '2024-12-04 17:44:00', '2024-12-04 19:07:36'),
(30, 5, 1, 12, 3, '2024-12-04 18:38:38', '2024-12-04 19:07:36'),
(31, 12, 1, 12, 3, '2024-12-04 18:40:09', '2024-12-04 19:07:36'),
(32, 16, 1, 12, 3, '2024-12-04 18:40:17', '2024-12-04 19:07:36'),
(33, 69, 2, 12, 3, '2024-12-04 18:50:42', '2024-12-04 19:07:36'),
(34, 19, 1, 12, 3, '2024-12-04 19:03:49', '2024-12-04 19:07:36'),
(35, 65, 1, 12, 3, '2024-12-04 19:07:02', '2024-12-04 19:07:36'),
(36, 64, 1, 12, 3, '2024-12-04 19:07:07', '2024-12-04 19:07:36'),
(37, 9, 1, NULL, 3, '2024-12-04 19:45:34', '2024-12-04 19:45:34'),
(38, 49, 1, NULL, 3, '2024-12-04 19:59:21', '2024-12-04 19:59:21'),
(39, 4, 3, NULL, 3, '2024-12-04 20:17:27', '2024-12-04 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Fruit', '2024-12-02 05:01:34', '2024-12-02 05:01:34'),
(3, 'Vegetable', '2024-12-02 05:01:49', '2024-12-02 05:01:49'),
(4, 'Condiments', '2024-12-02 05:01:58', '2024-12-02 05:01:58'),
(5, 'Canned Goods', '2024-12-02 05:03:37', '2024-12-02 05:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `receiver_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `receiver_id`, `sender_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'Ghbhb', 0, '2024-12-02 06:28:48', '2024-12-02 06:28:48'),
(3, 3, 3, 'Hello Admin', 0, '2024-12-02 06:45:20', '2024-12-02 06:45:20'),
(4, 3, 3, 'Hello Customer', 0, '2024-12-02 06:45:33', '2024-12-02 06:45:33'),
(5, 8, 8, 'Aqqqq', 0, '2024-12-02 07:23:22', '2024-12-02 07:23:22'),
(6, 9, 9, 'hi admin', 0, '2024-12-03 14:37:33', '2024-12-03 14:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

DROP TABLE IF EXISTS `client_information`;
CREATE TABLE IF NOT EXISTS `client_information` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_information`
--

INSERT INTO `client_information` (`id`, `user_id`, `phone_number`, `gender`, `birthdate`, `address`, `picture`, `created_at`, `updated_at`) VALUES
(1, 3, '09967690577', 'Male', '2002-09-20', 'san juan,Batangas', 'Profile/R22m7K5EyrElp3boVl0IdHZI9qEV8Nw8zHlJDGs7.jpg', '2024-12-02 04:52:59', '2024-12-02 04:52:59'),
(2, 6, '9457783321', '', '2024-06-02', 'LIpa City Batangas', 'Profile/mOdkCfQLqedtT1Fvm6LzcsBuQbFK6XfW5fJP7KQG.png', '2024-12-02 07:16:34', '2024-12-02 07:16:34'),
(3, 9, 'wwew', 'Female', '2024-12-18', 'qewqeqwe', 'Profile/LoMpRTcRevdzt2ICnwVV7YzTlAx0y3NGqXWy2TSK.jpg', '2024-12-03 14:07:55', '2024-12-03 14:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_30_011241_create_categories_table', 1),
(5, '2024_11_30_014153_create_products_table', 1),
(6, '2024_11_30_032829_create_product_images_table', 1),
(7, '2024_11_30_135338_create_carts_table', 1),
(8, '2024_11_30_154908_create_orders_table', 1),
(9, '2024_12_01_055441_create_chat_messages_table', 1),
(10, '2024_12_01_093719_create_client_information_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `total_amount` double NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `refund_reason` longtext COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ONLINE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_amount`, `user_id`, `status`, `refund_reason`, `payment_method`, `proof_of_payment`, `transaction_type`, `created_at`, `updated_at`) VALUES
(3, 300, 5, 'pending', NULL, 'cod', NULL, 'ONLINE', '2024-12-02 05:50:01', '2024-12-02 05:50:01'),
(4, 300, 3, 'return_refund', 'Expired', 'cod', NULL, 'ONLINE', '2024-12-02 06:26:11', '2024-12-02 06:29:27'),
(5, 240, 3, 'completed', NULL, 'cod', NULL, 'ONLINE', '2024-12-02 06:33:01', '2024-12-02 06:33:41'),
(6, 450, 6, 'return_refund', 'Expired\n', 'payment_center', 'Proof/C5E7j3kFSw0WWIUyd2mUFndTqxkEIHDuqDal4UlY.jpg', 'ONLINE', '2024-12-02 07:05:14', '2024-12-02 07:12:04'),
(7, 240, 6, 'pending', NULL, 'cod', NULL, 'ONLINE', '2024-12-02 07:17:30', '2024-12-02 07:17:30'),
(8, 1441, 8, 'return_refund', 'Aaaaa', 'cod', NULL, 'ONLINE', '2024-12-02 07:20:04', '2024-12-02 07:22:50'),
(9, 150, 8, 'to_pay', NULL, 'cod', NULL, 'ONLINE', '2024-12-02 07:28:34', '2024-12-02 07:29:06'),
(10, 720, 1, 'pending', NULL, 'cod', NULL, 'ONLINE', '2024-12-02 08:01:53', '2024-12-02 08:01:53'),
(11, 120, 9, 'completed', NULL, 'payment_center', 'Proof/ADi78eD5wEHyoBCDQYrh9UghqQnVlyVaTbz5cCxo.png', 'ONLINE', '2024-12-03 14:35:54', '2024-12-03 14:36:57'),
(12, 1096, 3, 'pending', NULL, 'cod', NULL, 'ONLINE', '2024-12-04 19:07:36', '2024-12-04 19:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `quantity`, `is_featured`, `created_at`, `updated_at`) VALUES
(3, 'Condesada', 'Alaska ', 145, 5, 45, 1, '2024-12-02 05:04:10', '2024-12-04 20:50:58'),
(4, 'Apple', 'Apple', 120, 2, 18, 1, '2024-12-02 05:05:07', '2024-12-03 14:36:14'),
(5, 'Apricot', 'Apricot', 120, 2, 28, 1, '2024-12-02 05:05:37', '2024-12-02 07:21:17'),
(6, 'Argentina', 'Corned Beef', 120, 5, 17, 1, '2024-12-02 05:06:26', '2024-12-02 07:21:17'),
(7, 'Meatloaf', 'Argentina', 76, 5, 19, 1, '2024-12-02 05:07:21', '2024-12-02 07:21:17'),
(8, 'Bellpepper Green', 'Bellpepper', 100, 3, 6, 1, '2024-12-02 06:02:29', '2024-12-02 07:21:17'),
(9, 'bellpepper red', 'bellpepper red', 100, 3, 5, 1, '2024-12-02 06:04:04', '2024-12-02 07:21:17'),
(10, 'Coco Mama Gata', 'Coco Mama', 30, 4, 9, 1, '2024-12-02 06:05:30', '2024-12-02 07:21:17'),
(11, 'Datu Puti Soy Sauce', 'Datu Puti Soy Sauce', 15, 4, 15, 1, '2024-12-02 06:06:51', '2024-12-02 06:06:51'),
(12, 'Heinz Tomato Ketchup', 'Tomato Ketchup', 180, 4, 15, 1, '2024-12-02 06:07:51', '2024-12-02 06:35:25'),
(13, 'Green Onion', 'Green Onion', 35, 3, 20, 1, '2024-12-02 06:08:45', '2024-12-02 06:08:45'),
(16, 'Jolly Gata', 'Jolly Gata', 50, 5, 10, 1, '2024-12-02 06:14:10', '2024-12-02 06:14:10'),
(17, 'Jolly Mushrooms', 'Jolly Mushrooms', 30, 5, 10, 1, '2024-12-02 06:15:35', '2024-12-02 06:15:35'),
(18, 'Kalabasa', 'Kalabasa', 20, 3, 15, 1, '2024-12-02 06:16:13', '2024-12-02 06:16:13'),
(19, 'Watermelon', 'Watermelon', 60, 2, 12, 1, '2024-12-02 06:16:53', '2024-12-02 06:16:53'),
(20, 'Knorr Seasoning', 'Knorr Seasoning', 50, 4, 15, 1, '2024-12-02 06:18:08', '2024-12-02 06:18:08'),
(21, 'Vienna Sausage', 'Vienna Sausage', 75, 5, 15, 1, '2024-12-02 06:18:52', '2024-12-02 07:21:17'),
(22, 'MaLing', 'MaLing', 80, 5, 20, 1, '2024-12-02 06:19:27', '2024-12-02 06:19:27'),
(23, 'Mama Sitas Menudo Mix', 'Mama Sitas Oyster Sauce', 10, 4, 20, 1, '2024-12-02 06:20:31', '2024-12-02 06:22:01'),
(38, 'Mama Sitas Oyster Sauce', 'Mama Sitas Oyster Sauce', 10, 4, 20, 1, '2024-12-02 06:21:43', '2024-12-02 06:21:43'),
(48, 'Okra', 'Okra', 20, 3, 20, 1, '2024-12-02 06:26:18', '2024-12-02 06:26:18'),
(49, 'Mushrooms', 'Mushrooms', 20, 3, 20, 1, '2024-12-02 06:26:43', '2024-12-02 06:26:43'),
(50, 'bokchoi', 'bokchoi', 20, 3, 10, 1, '2024-12-02 06:33:18', '2024-12-02 06:33:18'),
(51, 'cauliflower', 'cauliflower', 30, 3, 10, 1, '2024-12-02 06:33:49', '2024-12-02 06:33:49'),
(52, 'Potato', 'Potato', 50, 3, 20, 1, '2024-12-02 06:34:27', '2024-12-02 06:34:27'),
(53, 'Cucumber', 'Cucumber', 30, 3, 20, 1, '2024-12-02 06:34:57', '2024-12-02 06:34:57'),
(54, 'White Onion', 'White Onion', 30, 3, 20, 1, '2024-12-02 06:37:23', '2024-12-02 06:37:23'),
(55, 'Cabbage', 'Cabbage', 20, 3, 30, 1, '2024-12-02 06:38:23', '2024-12-02 06:38:23'),
(56, 'Tomato', 'Tomato', 24, 3, 20, 1, '2024-12-02 06:39:06', '2024-12-02 06:39:06'),
(57, 'UFC Banana Ketchup', 'UFC Banana Ketchup', 80, 4, 20, 1, '2024-12-02 06:39:48', '2024-12-02 06:39:48'),
(58, 'Eggplant', 'Eggplant', 20, 3, 20, 1, '2024-12-02 06:40:49', '2024-12-02 06:40:49'),
(59, 'Banana', 'Banana', 180, 2, 20, 1, '2024-12-02 06:41:28', '2024-12-02 06:41:28'),
(60, 'Pamintang Durog', 'Pamintang Durog', 5, 4, 20, 1, '2024-12-02 06:43:27', '2024-12-02 06:43:27'),
(61, 'Pamintang Buo', 'Pamintang Buo', 5, 4, 20, 1, '2024-12-02 06:43:55', '2024-12-02 06:43:55'),
(62, 'Reno Liverspread', 'Reno Liverspread', 50, 5, 20, 1, '2024-12-02 06:44:43', '2024-12-02 06:44:43'),
(63, 'Mega Sardines', 'Mega Sardines', 18, 5, 20, 1, '2024-12-02 06:45:23', '2024-12-02 06:45:23'),
(64, 'Mang Tomas Spicy', 'Mang Tomas Spicy', 50, 4, 20, 1, '2024-12-02 06:46:15', '2024-12-02 06:46:15'),
(65, 'Mang Tomas orginial', 'Mang Tomas Original', 50, 4, 20, 1, '2024-12-02 06:47:00', '2024-12-02 06:47:00'),
(66, 'Kiwi', 'Kiwi', 30, 2, 20, 1, '2024-12-02 06:47:26', '2024-12-02 06:47:26'),
(67, 'Carrots', 'Carrots', 35, 3, 20, 1, '2024-12-02 06:48:24', '2024-12-02 06:48:24'),
(68, 'Mango', 'Mango', 60, 2, 20, 1, '2024-12-02 06:49:10', '2024-12-02 06:49:10'),
(69, 'MEGA Sardines Spicy Tomato', 'SAmple Description', 35, 5, 30, 1, '2024-12-02 07:14:33', '2024-12-02 07:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 2, 'Product/0jl8xSxpOFVEQ27iXPcHE3JQZuzvD9DLdAgj0Obf.png', '2024-12-02 04:55:06', '2024-12-02 04:55:06'),
(2, 2, 'Product/j7h3FfsNVbuBzeW0ch8Xrgfs5LDZHUJVCdeLO9HH.png', '2024-12-02 05:02:40', '2024-12-02 05:02:40'),
(3, 3, 'Product/qTVymFBQrlAQk1ZpSwkuNBJtiC4My3ZPTUjh4XgU.webp', '2024-12-02 05:04:10', '2024-12-02 05:04:10'),
(4, 4, 'Product/YCSj0XBfn7Bobmx9mp6mX7VgRoFzmyka080IkK28.jpg', '2024-12-02 05:05:07', '2024-12-02 05:05:07'),
(5, 5, 'Product/04o1VxOPXu5OgC5RccEY6WGe053BErFGaGWHeGW8.png', '2024-12-02 05:05:37', '2024-12-02 05:05:37'),
(6, 6, 'Product/OqUHTZYjFc7MrhHl4ejj1qmcUepYN8iWwHMHJE2q.png', '2024-12-02 05:06:26', '2024-12-02 05:06:26'),
(7, 7, 'Product/QiyxeJQjaO2OKjIqjNLcwDNc4HFXDedACiqkWxNN.png', '2024-12-02 05:07:21', '2024-12-02 05:07:21'),
(8, 8, 'Product/lMDIvvQxHj3Di8q6mmGiuvsLzj03bYk0SogWWPSX.png', '2024-12-02 06:02:29', '2024-12-02 06:02:29'),
(9, 9, 'Product/nFjuN8nKiUoVfKGN3MMXUUTMbavTSqyIsFTq3ktp.png', '2024-12-02 06:04:04', '2024-12-02 06:04:04'),
(10, 10, 'Product/sMCThW5wFiVwmQB7pwzvFUo5mqtnD1jPnjlM8n8J.webp', '2024-12-02 06:05:30', '2024-12-02 06:05:30'),
(11, 11, 'Product/9TIIywIMurwkANWF2AVTZGmeLzb3BOckcyCkmgsI.webp', '2024-12-02 06:06:51', '2024-12-02 06:06:51'),
(12, 12, 'Product/gf2Rmx9HeaMFnSmm3ZA3y9dx6mSg2eZN05tKpmjp.webp', '2024-12-02 06:07:51', '2024-12-02 06:07:51'),
(13, 13, 'Product/fAGi0dj9L0dCdemrjkyVQcViTWQ6EmkyobEsq4gx.png', '2024-12-02 06:08:45', '2024-12-02 06:08:45'),
(14, 16, 'Product/U3tfMtduiU2fQi6CO34Zu10EipgPrpb79heGmSXx.webp', '2024-12-02 06:14:10', '2024-12-02 06:14:10'),
(15, 17, 'Product/TlZ8AaEjJpTYnjnYGKXbWgnEOIEodzORCnTllCtk.jpg', '2024-12-02 06:15:35', '2024-12-02 06:15:35'),
(16, 18, 'Product/VoQSFySDVaiM7ZLXu4sDYNQvnus6Av6IoGx7lARh.png', '2024-12-02 06:16:13', '2024-12-02 06:16:13'),
(17, 19, 'Product/iuAW05JnQnX8rXy1DgXCBMAk3afP2glKVoOaMdTb.webp', '2024-12-02 06:16:53', '2024-12-02 06:16:53'),
(18, 20, 'Product/WAfWKbgkaUXF353OfS4hfiLnLHZGxMrvFgfE52Do.png', '2024-12-02 06:18:08', '2024-12-02 06:18:08'),
(19, 21, 'Product/6bogPanN5d5YHPICXmEAUokOmOKpxNUcGV2gLGWe.webp', '2024-12-02 06:18:52', '2024-12-02 06:18:52'),
(20, 22, 'Product/sT5ftvrcnj1xGM2ZzQDN657GPVQ4YvbgoNvPx9NB.png', '2024-12-02 06:19:27', '2024-12-02 06:19:27'),
(21, 23, 'Product/gpquJbkeHbnBTF2cp8g7D83s3fhJ3dw0QhLkurDP.jpg', '2024-12-02 06:20:31', '2024-12-02 06:20:31'),
(22, 24, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:29', '2024-12-02 06:21:29'),
(23, 25, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:30', '2024-12-02 06:21:30'),
(24, 26, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:31', '2024-12-02 06:21:31'),
(25, 27, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:32', '2024-12-02 06:21:32'),
(26, 28, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:33', '2024-12-02 06:21:33'),
(27, 29, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:34', '2024-12-02 06:21:34'),
(28, 30, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:35', '2024-12-02 06:21:35'),
(29, 31, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:36', '2024-12-02 06:21:36'),
(30, 32, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:37', '2024-12-02 06:21:37'),
(31, 33, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:38', '2024-12-02 06:21:38'),
(32, 34, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:39', '2024-12-02 06:21:39'),
(33, 35, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:40', '2024-12-02 06:21:40'),
(34, 36, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:41', '2024-12-02 06:21:41'),
(35, 37, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:42', '2024-12-02 06:21:42'),
(36, 38, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:43', '2024-12-02 06:21:43'),
(37, 39, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:44', '2024-12-02 06:21:44'),
(38, 40, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:45', '2024-12-02 06:21:45'),
(39, 41, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:46', '2024-12-02 06:21:46'),
(40, 42, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:47', '2024-12-02 06:21:47'),
(41, 43, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:48', '2024-12-02 06:21:48'),
(42, 44, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:49', '2024-12-02 06:21:49'),
(43, 45, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:50', '2024-12-02 06:21:50'),
(44, 46, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:51', '2024-12-02 06:21:51'),
(45, 47, 'Product/DJJyHRkr41hBMw9ilnDG2ZpY600lmo6uB669bobC.webp', '2024-12-02 06:21:52', '2024-12-02 06:21:52'),
(46, 48, 'Product/ef1XCqRh0bwIfSXFw7VBHchGtjvSBSYWMdsG8irx.png', '2024-12-02 06:26:18', '2024-12-02 06:26:18'),
(47, 49, 'Product/Te8QdTf2HH2F0WjC4qM5lJivZtMChV06HJpxmvGs.png', '2024-12-02 06:26:43', '2024-12-02 06:26:43'),
(48, 50, 'Product/WuCNf3MoDFBFwJx5wqghSTqryUbkvvUqBtewq2ex.png', '2024-12-02 06:33:18', '2024-12-02 06:33:18'),
(49, 51, 'Product/UTR3OS9uWVjCKXzy4UksfwL7HJ9XMSWI6OYOXMNu.png', '2024-12-02 06:33:49', '2024-12-02 06:33:49'),
(50, 52, 'Product/8WpL81VfPcGBluoHumGREHeg5sAlzCzDuquYsqkV.png', '2024-12-02 06:34:27', '2024-12-02 06:34:27'),
(51, 53, 'Product/WW07rrOK1t30aHg1LBZMrhB9lrUAEfxZqozY7AyK.png', '2024-12-02 06:34:57', '2024-12-02 06:34:57'),
(52, 54, 'Product/PyqVfu7jAssxO4jfB7SnHxuDR0mZ0OkrqZjlaaNs.png', '2024-12-02 06:37:23', '2024-12-02 06:37:23'),
(53, 55, 'Product/cTL3gHGlRgsohtdQQ1faO2vB0vBY1lIJShNmr3Qu.png', '2024-12-02 06:38:23', '2024-12-02 06:38:23'),
(54, 56, 'Product/PkAspB6WKSYxa2gk9KJzIivXgP29pM7mpFmAh6Ow.png', '2024-12-02 06:39:06', '2024-12-02 06:39:06'),
(55, 57, 'Product/guLjaj8yAPY8fjKWWPUmR1B0ZslfIIhmAWc4qu7A.png', '2024-12-02 06:39:48', '2024-12-02 06:39:48'),
(56, 58, 'Product/0r84rT1qtrZMcqXxm6iwCdGXk8GKMezpcQjzTqjc.png', '2024-12-02 06:40:49', '2024-12-02 06:40:49'),
(57, 59, 'Product/TpJCP7Ns9bB0R51ZcgHB3dByrlhboKzRejXNrNcd.png', '2024-12-02 06:41:28', '2024-12-02 06:41:28'),
(58, 60, 'Product/NUfmzqODtYD7xKctcYsZOJMp8tS3hhW6fnyijZQM.webp', '2024-12-02 06:43:27', '2024-12-02 06:43:27'),
(59, 61, 'Product/pqeVxfNNcNeaWCGKnEqWN9zVk7D3XRPORvcpcY3s.png', '2024-12-02 06:43:55', '2024-12-02 06:43:55'),
(60, 62, 'Product/mH01EPRe6NFmTOf0k4NXhQXth4CyY3tmefp6plmN.png', '2024-12-02 06:44:43', '2024-12-02 06:44:43'),
(61, 63, 'Product/AvJ9Yka0aYzeRJwTK8iEPJZZct7Ybj9h19jkZO2q.webp', '2024-12-02 06:45:23', '2024-12-02 06:45:23'),
(62, 64, 'Product/WZxcyW2FsrKDxxkqaaaZ2EcXTBjxkt5INzUh9IDD.png', '2024-12-02 06:46:15', '2024-12-02 06:46:15'),
(63, 65, 'Product/pzdqHQCdc4kub8RobAkH34jut1rxrfF8urWF0wIY.png', '2024-12-02 06:47:00', '2024-12-02 06:47:00'),
(64, 66, 'Product/yGNWfDHxM2bnypy8MRC9KI8mYlltaeahprufl91h.jpg', '2024-12-02 06:47:26', '2024-12-02 06:47:26'),
(65, 67, 'Product/rv8dEPLdaGQeLQOFJsdvNhvl4qDsWAladHRizdlX.png', '2024-12-02 06:48:24', '2024-12-02 06:48:24'),
(66, 68, 'Product/aldNZ3evE27nJ2jIefOwSmulMsGqOMDGiZ0wGhpX.webp', '2024-12-02 06:49:10', '2024-12-02 06:49:10'),
(67, 69, 'Product/dflFpYu26GqxqdiPvDvlqViGnE119HXRzSKA9cDG.webp', '2024-12-02 07:14:33', '2024-12-02 07:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d4pfTHY2tnYcIB6SXK1CqiPBEVxncyunA1oaarQV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOWpzVFFpS0U3VW5lNnczYzJRb1c2QXdDc1JEVXVwOVhVaWhuUTBZMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluaXN0cmF0b3IvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733378884);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '2024-12-02 04:26:15', '$2y$12$wqp/ehOnT1moBiUnTqH3xuMz8jUA2JQ4aiYy7Ak4WHbF7V6LmBuKe', 'admin', 1, 'ro2MmVzE1GbstJEDd5ojslnBKWbLSl7TGPRclNjt23WGcyU0RTU1VnIN1wju', '2024-12-02 04:26:15', '2024-12-02 04:26:15'),
(2, 'Staff', 'staff@gmail.com', '2024-12-02 04:26:15', '$2y$12$G9H9.XB4sA78D8CXvdhBt.3WPGkgV7pA6v3U//eLghKbXa7PSTMki', 'admin', 1, NULL, '2024-12-02 04:26:15', '2024-12-02 04:26:15'),
(3, 'Elbert', 'end3624@gmail.com', '2024-12-02 04:48:44', '$2y$12$ZhS4ehW3BXVSPLl6T4Y7UujWFbc/Ro9bGj2Cn4zMZNgW5PFm79y.u', 'client', 0, NULL, '2024-12-02 04:48:27', '2024-12-02 07:12:44'),
(4, 'client2@gmail.com', 'client2@gmail.com', NULL, '$2y$12$.bFFxZArFh3CWohzBlaoT.Nhj2D0iuKM1IrpPdeqY1AGdVinMlzeW', 'client', 1, NULL, '2024-12-02 04:50:26', '2024-12-02 04:50:26'),
(5, 'Fritz Atkins', 'end36344@gmail.com', '2024-12-11 13:49:25', '$2y$12$lpvUJ37lDSwF3bB2KkOAmebV9XLE8thH5ZHaWG2D09ioaPaWZ.7Ra', 'client', 1, NULL, '2024-12-02 05:48:13', '2024-12-02 05:48:13'),
(6, 'elbert', 'kanae0678@gmail.com', '2024-12-02 07:01:41', '$2y$12$AX05PpG5hPrA4IhKikreBOQCBoNfYqpBrOdtFjws5ou3eIiz3Ncyq', 'client', 1, NULL, '2024-12-02 07:00:58', '2024-12-02 07:01:41'),
(7, 'Rrr', 'rmsbsu@gmail.com', NULL, '$2y$12$YSuWs2OH2E.UQgRO3AvIHO9tIwWzsD7d7b/e80YUhhUNxfq.rkj/6', 'client', 1, NULL, '2024-12-02 07:04:15', '2024-12-02 07:11:26'),
(8, 'Aaaa', 'richellesulit@gmail.com', '2024-12-02 07:10:38', '$2y$12$X72MIXPoucbogLKWivJNVex5OcYmBvtfEESNk5uYytN7iNKTrP53q', 'client', 1, NULL, '2024-12-02 07:07:15', '2024-12-02 07:11:25'),
(9, 'John', 'thisboiposi@gmail.com', '2024-12-03 14:03:39', '$2y$12$WvOjH1bdACjWt.w7I/NjzujobArv2e2iildOI15vvusJ9LZfxDGfC', 'client', 1, NULL, '2024-12-03 14:03:13', '2024-12-03 14:03:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
