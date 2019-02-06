-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2019 at 11:40 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2019-01-17 13:32:09', '2019-01-17 13:32:09'),
(2, 'Google', '2019-01-17 13:32:24', '2019-01-17 13:32:24'),
(3, 'Samsung', '2019-01-17 13:32:30', '2019-01-17 13:32:30'),
(5, 'Nokia', '2019-01-21 08:28:20', '2019-01-21 08:28:20'),
(6, 'Microsoft', '2019-01-21 08:28:29', '2019-01-21 08:28:29'),
(7, 'LG', '2019-01-21 08:28:34', '2019-01-21 08:28:34'),
(8, 'Xiaomi', '2019-01-21 08:28:41', '2019-01-21 08:28:41'),
(9, 'HP', '2019-01-21 08:34:16', '2019-01-21 08:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', NULL, NULL),
(9, 'Laptop', '2019-01-21 08:27:19', '2019-01-21 08:27:19'),
(10, 'TV', '2019-01-21 08:27:27', '2019-01-21 08:27:27'),
(11, 'Wearable', '2019-01-21 08:27:52', '2019-01-21 08:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_01_17_090859_create_categories_table', 2),
(4, '2019_01_17_191026_create_brands_table', 3),
(5, '2019_01_18_181323_create_products_table', 4),
(6, '2019_01_18_185500_create_products_table', 5),
(7, '2019_01_20_090216_create_sliders_table', 6),
(8, '2019_01_29_121304_create_permission_tables', 7),
(9, '2019_01_31_054835_create_customers_table', 8),
(10, '2019_02_06_132622_create_orders_table', 8),
(11, '2019_02_06_132659_create_order_details_table', 8),
(12, '2019_02_06_132739_create_shippings_table', 8),
(13, '2019_02_06_152541_create_order_details_table', 9),
(14, '2019_02_06_183856_create_shippings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 3),
(1, 'App\\User', 5),
(2, 'App\\User', 6),
(4, 'App\\User', 7),
(4, 'App\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(4, 10, 563.50, '2019-02-06 12:45:56', '2019-02-06 12:45:56'),
(5, 10, 4600.00, '2019-02-06 13:09:25', '2019-02-06 13:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(5, 4, 22, '3310', 80.00, 3, '2019-02-06 12:45:56', '2019-02-06 12:45:56'),
(6, 4, 16, 'Galaxy Gear', 250.00, 1, '2019-02-06 12:45:56', '2019-02-06 12:45:56'),
(7, 5, 19, 'G7', 1000.00, 1, '2019-02-06 13:09:25', '2019-02-06 13:09:25'),
(8, 5, 23, 'Galaxy S9', 1500.00, 2, '2019-02-06 13:09:25', '2019-02-06 13:09:25');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2019-01-30 00:17:52', '2019-01-30 00:17:52'),
(2, 'Shop management', 'web', '2019-01-30 01:04:39', '2019-01-30 01:04:39'),
(5, 'Shopping', 'web', '2019-01-31 09:20:15', '2019-01-31 09:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `size`, `color`, `image`, `description`, `price`, `created_at`, `updated_at`) VALUES
(14, 9, 6, 'Surface Pro', '14\'\'', 'Silver', '588526d46f293bbfae451a39_1548080999.png', 'Surface Pro laptop', 2000.00, '2019-01-21 08:29:59', '2019-01-21 08:29:59'),
(15, 1, 1, 'i Phone 4', '4\'\'', 'Black', 'iphone_1548081071.png', 'Apple i Phone 4', 200.00, '2019-01-21 08:31:11', '2019-01-21 08:31:11'),
(16, 11, 3, 'Galaxy Gear', 'M', 'Black', 'galaxy-gear_1548081121.png', 'Samsung Galaxy Gear', 250.00, '2019-01-21 08:32:01', '2019-01-21 08:32:01'),
(17, 1, 2, 'Pixel', 'XL', 'Silver', 'google-pixel-1_1548081229.png', 'Google Pixel', 1000.00, '2019-01-21 08:33:49', '2019-01-21 08:33:49'),
(18, 9, 9, 'Spectre', '14\'\'', 'Black', 'hp_1548081293.png', 'HP Spectre', 1500.00, '2019-01-21 08:34:53', '2019-01-21 08:34:53'),
(19, 1, 7, 'G7', 'XL', 'Red', 'lg-g7_1548081330.png', 'LG G7', 1000.00, '2019-01-21 08:35:30', '2019-01-21 08:35:30'),
(20, 10, 7, 'Wallpaper TV', 'XL', 'Black', 'lg-wallpaper_1548081364.png', 'LG Wallpaper TV', 2000.00, '2019-01-21 08:36:04', '2019-01-21 08:36:04'),
(21, 9, 1, 'MacBook Pro', '15\'\'', 'Black', 'macbookpro_1548081530.png', 'Apple MacBook Pro', 3000.00, '2019-01-21 08:38:50', '2019-01-21 08:38:50'),
(22, 1, 5, '3310', '3\'\'', 'Red', 'Nokia-3310-Hero_1548081586.png', 'Nokia 3310', 80.00, '2019-01-21 08:39:46', '2019-01-21 08:39:46'),
(23, 1, 3, 'Galaxy S9', 'XL', 'Silver', 'samsung-s9_1548081634.png', 'Samsung Galaxy S9', 1500.00, '2019-01-21 08:40:34', '2019-01-21 08:40:34'),
(24, 11, 8, 'Amazefit', 'M', 'Red', 'xiaomi-Amazfit_1548081687.png', 'Xiaomi Amazefit', 100.00, '2019-01-21 08:41:27', '2019-01-21 08:41:27'),
(25, 1, 8, 'Mi Mix', 'XL', 'Black', 'Xiaomi-Mi-Mix_1548081801.png', 'Xiaomi Mi Mix', 1000.00, '2019-01-21 08:43:21', '2019-01-21 08:43:21'),
(26, 11, 1, 'Apple watch', 'M', 'Black', 'appleWatch_1548081850.png', 'Apple watch', 500.00, '2019-01-21 08:44:10', '2019-01-21 08:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-01-30 00:18:02', '2019-01-30 00:18:02'),
(2, 'Manager', 'web', '2019-01-30 01:05:01', '2019-01-30 01:05:01'),
(4, 'Customer', 'web', '2019-01-31 09:20:31', '2019-01-31 09:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_city`, `shipping_address`, `name_on_card`, `created_at`, `updated_at`) VALUES
(1, 4, 'Mr. Receiver', 'mr@receiver.com', '987654321', 'Dhaka', 'Kolabagan, Dhanmondi', 'Mr. Developer', '2019-02-06 12:45:56', '2019-02-06 12:45:56'),
(2, 5, 'Someone', 'someone@somewhere.com', '123654789', 'NewYork', 'USA', 'Nahid', '2019-02-06 13:09:25', '2019-02-06 13:09:25');

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
(11, '1_1548083068.png', '2019-01-21 09:04:28', '2019-01-21 09:04:28'),
(12, '2_1548083073.png', '2019-01-21 09:04:33', '2019-01-21 09:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Muhammad Nahid', 'admin@system.com', NULL, '$2y$10$/G.iNla0ECPOUaMUPQLCk.ZWlFM/dDYIHNbE8mCfqzAhRPiHIoBJW', 'bhmmLJbwcJjjFy5Vr5Ai6Idd8Cf0NVysw9vDmUne7ON45iGp1DUMprmQaR7z', '2019-01-30 06:56:33', '2019-01-30 06:56:59'),
(6, 'Mr. X', 'test@user.com', NULL, '$2y$10$if9ukahS.7I4p47wOBfBIugVVjmtz1KgMOdSPj7VNhWcF0PT1nwN6', 'M3iGs4CKIpyMPEwGyGionfhTXbvVZPusiVZtXPQ8e6ptzlmBmwNNXMpOebVT', '2019-01-30 06:58:07', '2019-01-30 06:58:07'),
(7, 'Random Customer', 'customer@random.com', NULL, '$2y$10$.G.eyhdg0CmEfVfy58i.6Ordr9paWoXufWMKsLnpb/AODE5ZVfOrq', NULL, '2019-01-31 09:26:46', '2019-01-31 09:26:46'),
(10, 'Test User', 'user@system.com', NULL, '$2y$10$k6VRnSCrHOS1hTbN1MXvE.0tOEOpNmMW/nUiEDZIkwjH7X3n4C8uW', 'fgU9J10ltwx5Ydf7gqc3v3kfoEBseX6bQ38RjobDOqh53xhTGSnhIRovmdEW', '2019-01-31 13:31:07', '2019-01-31 13:31:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
