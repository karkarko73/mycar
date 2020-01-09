-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2020 at 08:08 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2019-11-23 17:30:00', '2019-11-26 17:30:00'),
(2, 'Range Rover', '2019-11-25 17:30:00', '2019-11-25 17:30:00'),
(3, 'Mercedez', '2019-11-25 17:30:00', '2019-11-25 17:30:00'),
(4, 'Nissan', '2019-11-26 17:30:00', '2019-11-26 17:30:00'),
(5, 'Suzuki', '2019-11-29 20:51:49', '2019-11-29 20:51:49'),
(6, 'Volkswagen', '2019-12-06 22:49:42', '2019-12-06 22:54:17'),
(7, 'Misubishi', '2019-12-06 22:50:53', '2019-12-06 22:50:53'),
(8, 'BMW', '2019-12-06 22:56:42', '2019-12-06 22:56:42'),
(9, 'KIA', '2019-12-09 23:35:28', '2019-12-09 23:35:28'),
(10, 'Ford', '2019-12-21 07:16:30', '2019-12-21 07:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', '2019-11-25 17:30:00', '2019-11-25 17:30:00'),
(2, 'Mandalay', '2019-11-25 17:30:00', '2019-11-25 17:30:00'),
(3, 'Nay Pyi Taw', '2019-11-25 17:30:00', '2019-11-25 17:30:00'),
(4, 'Bago', '2019-11-27 11:59:53', '2019-11-27 11:59:53'),
(6, 'Pyay', '2019-11-27 12:03:29', '2019-11-27 12:03:29'),
(7, 'Mawlamyaing', '2019-12-21 07:16:59', '2019-12-21 07:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
(4, 2, 2, NULL, 'I want it one!', '2019-12-06 04:13:58', '2019-12-06 04:13:58'),
(9, 2, 3, NULL, 'I want it one!', '2019-12-06 09:56:28', '2019-12-06 09:56:28'),
(10, 3, 8, NULL, 'trust on product', '2019-12-06 22:46:53', '2019-12-06 22:46:53'),
(11, 2, 9, NULL, 'trust on product', '2019-12-07 20:08:46', '2019-12-07 20:08:46'),
(12, 2, 2, NULL, 'trust on product', '2019-12-08 07:51:24', '2019-12-08 07:51:24'),
(13, 2, 6, NULL, 'thank you!', '2019-12-09 04:12:11', '2019-12-09 04:12:11'),
(14, 2, 13, NULL, 'I want it one!', '2019-12-09 04:13:32', '2019-12-09 04:13:32'),
(15, 2, 12, NULL, 'will buy this car soon!', '2019-12-09 06:33:18', '2019-12-09 06:33:18'),
(21, 5, 16, NULL, 'If you know or buy it, contact me!!!', '2019-12-21 06:57:39', '2019-12-21 06:57:39'),
(23, 2, 15, NULL, 'thank you!', '2020-01-06 01:31:42', '2020-01-06 01:31:42'),
(24, 1, 14, NULL, 'I want it one!', '2020-01-06 22:09:10', '2020-01-06 22:09:10'),
(25, 1, 15, NULL, 'thank you!', '2020-01-06 22:23:34', '2020-01-06 22:23:34'),
(26, 1, 15, NULL, 'good car', '2020-01-06 23:24:47', '2020-01-06 23:24:47'),
(27, 1, 15, NULL, 'bad car', '2020-01-07 00:47:18', '2020-01-07 00:47:18'),
(28, 1, 15, NULL, 'thank you!', '2020-01-07 06:14:05', '2020-01-07 06:14:05'),
(29, 1, 21, NULL, 'I want it one!', '2020-01-07 07:51:33', '2020-01-07 07:51:33'),
(31, 3, 21, NULL, 'That car is really great!', '2020-01-07 08:24:33', '2020-01-07 08:24:33'),
(32, 3, 2, NULL, 'thank you!', '2020-01-07 09:51:43', '2020-01-07 09:51:43'),
(34, 1, 3, NULL, 'thank you!', '2020-01-08 06:49:31', '2020-01-08 06:49:31'),
(35, 1, 1, NULL, 'bad car', '2020-01-08 06:50:01', '2020-01-08 06:50:01'),
(36, 1, 4, NULL, 'I want it one!', '2020-01-08 06:50:51', '2020-01-08 06:50:51'),
(37, 1, 21, NULL, 'trust on product', '2020-01-08 06:51:47', '2020-01-08 06:51:47'),
(38, 1, 1, NULL, 'thank you!', '2020-01-08 07:02:18', '2020-01-08 07:02:18'),
(39, 3, 14, NULL, 'good car', '2020-01-08 20:30:21', '2020-01-08 20:30:21'),
(40, 3, 14, NULL, 'good car', '2020-01-08 20:30:25', '2020-01-08 20:30:25');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_11_25_041912_create_products_table', 1),
(7, '2019_11_25_042450_create_categories_table', 2),
(8, '2019_11_25_155749_create_cities_table', 3),
(9, '2019_11_26_034655_create_cities_table', 4),
(10, '2019_11_26_104818_create_brands_table', 5),
(11, '2019_11_27_092413_create_brands_table', 6),
(14, '2019_12_02_184311_create_products_table', 7),
(15, '2019_12_04_132431_create_wishlists_table', 8),
(25, '2019_12_06_041223_create_comments_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wwh@gmail.com', '$2y$10$2SyeWVRZX5MHrIQQ3hyeVe1ICukVRZTjJvxA3q2Xxaqq.y5iHF7Fe', '2019-12-09 03:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_year` int(11) NOT NULL,
  `license` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `model_year`, `license`, `description`, `price`, `user_id`, `city_id`, `category_id`, `role`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Alphard', 2012, NULL, 'Good all condition and round aircon.', 950, 2, 1, 1, 'user', '5deb33c365bbd.jpg', '2019-12-06 22:38:19', '2019-12-06 22:38:19'),
(2, 'Land Cruiser', 2009, NULL, 'Good car for sale.Contact for more information.', 1550, 2, 2, 1, 'user', '5deb340a99547.jpeg', '2019-12-06 22:39:30', '2019-12-06 22:39:30'),
(3, 'Range Rover(Velar)', 2015, NULL, 'Good Europe Brand new car for sale!', 2000, 2, 1, 2, 'user', '5deb3434019d9.jpg', '2019-12-06 22:40:12', '2019-12-06 22:40:12'),
(4, 'Crown', 2012, NULL, 'Good car and instoke avaliable!', 1250, 1, 2, 1, 'user', '5deb348b065bd.jpg|5deb348b1a8fa.jpg|5deb349f025f9.jpg', '2019-12-06 22:41:39', '2019-12-06 22:41:59'),
(5, 'Mark X', 2012, NULL, 'Good second hand and has one owner!', 650, 1, 4, 1, 'user', '5deb34d73c099.jpg|5deb34d756a15.jpg', '2019-12-06 22:42:55', '2019-12-06 22:42:55'),
(6, 'Mercedez E-300', 2015, NULL, 'Good Brand New Car!', 1650, 3, 2, 3, 'user', '5deb3538d3d31.jpg|5deb3538e6620.jpg', '2019-12-06 22:44:32', '2019-12-06 22:44:32'),
(7, 'Harrier', 2012, NULL, 'Good second hand car!', 1150, 3, 4, 1, 'user', '5deb3576eed89.jpg', '2019-12-06 22:45:35', '2019-12-06 22:45:35'),
(8, 'GTR -35', 2015, '9M/****', 'Good Sport Car', 1200, 3, 1, 4, 'user', '5deb35baa1576.png|5deb35bac1db0.jpg', '2019-12-06 22:46:42', '2020-01-07 08:25:34'),
(9, 'bmw350i', 2016, NULL, 'Good luxury brand car', 2150, 1, 1, 8, 'user', '5deb385aa1a11.jpg|5deb385aafa16.jpg', '2019-12-06 22:57:54', '2019-12-06 22:57:54'),
(10, 'Polo', 2015, NULL, 'Good second hand and good all condition!', 230, 4, 2, 6, 'user', '5deb38fd20d10.jpg|5deb38fd3f67e.jpg', '2019-12-06 23:00:37', '2019-12-06 23:00:37'),
(11, 'Arteon', 2016, NULL, 'Good Brand new car!', 950, 4, 2, 6, 'user', '5deb393644e3b.jpg|5deb393667eed.jpg', '2019-12-06 23:01:34', '2019-12-06 23:01:34'),
(12, 'Ciaz', 2015, NULL, 'Brand new car for sale!', 300, 4, 1, 5, 'user', '5deb3a7d9bbd5.jpeg|5deb3a7da6840.jpg', '2019-12-06 23:07:01', '2019-12-06 23:07:01'),
(13, 'Swift(sport)', 2018, NULL, 'Brand new sport car!', 280, 4, 4, 5, 'user', '5deb3ab787a1b.jpg|5deb3ab79b593.jpg', '2019-12-06 23:07:59', '2019-12-06 23:07:59'),
(14, 'Alphbart', 2019, NULL, 'This is a new car', 21000, 1, 3, 3, 'user', '5dee469e5c119.jpg', '2019-12-09 06:35:34', '2020-01-07 00:07:10'),
(15, 'Optima', 2016, '7P/7897', 'Good Brand New Car!', 350, 1, 1, 9, 'user', '5def35d6dc3cc.jpg|5def35d73810a.jpg', '2019-12-09 23:36:15', '2020-01-07 07:29:08'),
(21, 'Land Cruiser(New)', 2015, '9M/****', 'Good Condition Car!', 2000, 1, 2, 1, 'user', '5e1493da110b7.jpg', '2020-01-07 07:51:14', '2020-01-07 07:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(255) NOT NULL,
  `role` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SMH', 'smh@gmail.com', 9693533352, 'admin', '5de087c061fa0.png', NULL, '$2y$10$VJz/k.NDRq0Cd9XeBVbq2OLoKKzLkk9sUaEuJMXtzUh0gEY5X3C.i', NULL, '2019-11-24 21:57:35', '2020-01-07 06:11:27'),
(2, 'WWH', 'wwh@gmail.com', 9693533353, 'user', '5de098a65e84d.jpeg', NULL, '$2y$10$pg0Gb6RTSJHd5JXLc67AKemvsdd0toHafxUd.cEG1tBhr5AucJXKK', NULL, '2019-11-27 23:06:25', '2019-12-06 03:58:45'),
(3, 'Su Su', 'susu@gmail.com', 9773273532, 'user', '5deb34fdcd5ab.png', NULL, '$2y$10$Z7W0pkgu8obNdJtkFZkV5./scPF9perDyjUpMIYKpiLi.5aFmcKoG', NULL, '2019-12-06 04:54:15', '2019-12-06 22:43:33'),
(4, 'Ag Ag', 'agag@gmail.com', 9448036756, 'user', '5deb38ac44244.jpg', NULL, '$2y$10$B4q7nPPe6WVHJxj0Ta7wIONPysyOl9TV2TS7PkDU6HUO/7smwSVE2', NULL, '2019-12-06 05:00:29', '2019-12-06 22:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 2, 3, '2019-12-15 06:10:02', '2019-12-15 06:10:02'),
(13, 3, 21, '2020-01-07 07:57:03', '2020-01-07 07:57:03'),
(14, 1, 12, '2020-01-09 00:16:19', '2020-01-09 00:16:19'),
(17, 1, 9, '2020-01-09 01:23:24', '2020-01-09 01:23:24'),
(18, 1, 1, '2020-01-09 01:23:34', '2020-01-09 01:23:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
