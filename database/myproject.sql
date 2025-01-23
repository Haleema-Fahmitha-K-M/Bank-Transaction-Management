-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 07:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Fahmitha', 'fahmitha@gmail.com', '$2y$12$RXh8Uus6UoDWNeDJsw5/lO3YODra/.Lz3wq.hE9TOpHV5tTZCvwsi', '2024-05-08 18:35:37', '2024-05-08 18:35:37'),
(6, 'Haleema', 'haleema@gmail.com', '$2y$12$A3YwwLuq4QxfyCKMNpnV6O9KchxZmuW3Eat1l/EijLA2Va4tVI3nm', '2024-05-12 08:25:11', '2024-05-12 08:25:11'),
(7, 'Reema', 'reema@gmail.com', '$2y$12$ag.reLZyS3KXehPbIf0L.uNE3.eangFwoHvUfyee0/iedF127xpZO', '2024-05-12 08:47:25', '2024-05-12 08:47:25'),
(8, 'sundari', 'sundari@gmail.com', '$2y$12$RnUXedZnsq4Y4IuX6P6r5.dfsD.2g5HsK/4GC34/ziy0ENejMIJVy', '2025-01-22 06:43:09', '2025-01-22 06:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2024_05_06_100020_create__superadmin_table', 1),
(11, '0001_01_01_000000_create_users_table', 2),
(12, '0001_01_01_000001_create_cache_table', 2),
(13, '0001_01_01_000002_create_jobs_table', 2),
(14, '2024_05_07_054250_create_sadmin_table', 3),
(15, '2024_05_07_054254_create_admin_table', 3),
(16, '2024_05_08_120653_create_admin_table', 4),
(17, '2024_05_08_120711_create_user_table', 4),
(21, '2024_05_08_120723_create_transaction_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mSBjI5zoem3Skk0cE7BQsZDvUOUcb0YjkHDYRXfM', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic05seEN0S0VjREVEV2RNbE13Rkh0Um5LNTJqaHJMdGR5TVJtNDVaZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3X3RyYW5zYWN0aW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1737611884);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_acc` int(11) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `to_acc` int(11) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `from_balance` int(11) NOT NULL,
  `to_balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `from_acc`, `from_name`, `to_acc`, `to_name`, `amount`, `bank_name`, `from_balance`, `to_balance`, `created_at`, `updated_at`) VALUES
(1, 123451, 'Haleema', 123451, 'Initial Deposite', 5000, 'MyBank', 5000, 5000, '2024-05-17 00:28:23', '2024-05-17 00:28:23'),
(2, 123452, 'Reema', 123452, 'Initial Deposite', 5000, 'MyBank', 5000, 5000, '2024-05-17 00:28:45', '2024-05-17 00:28:45'),
(3, 123453, 'kothai', 123453, 'Initial Deposite', 5000, 'MyBank', 5000, 5000, '2024-05-17 00:29:13', '2024-05-17 00:29:13'),
(4, 123451, 'Haleema', 123453, 'kothai', 500, 'MyBank', 4500, 5500, '2024-05-17 00:29:49', '2024-05-17 00:29:49'),
(5, 123452, 'Reema', 123451, 'Haleema', 500, 'MyBank', 4500, 5000, '2024-05-17 00:30:12', '2024-05-17 00:30:12'),
(6, 123452, 'Reema', 123453, 'kothai', 200, 'HDFC', 4300, 5700, '2024-05-17 00:30:25', '2024-05-17 00:30:25'),
(7, 123453, 'kothai', 123452, 'Reema', 100, 'ICICI', 5600, 4400, '2024-05-17 00:30:41', '2024-05-17 00:30:41'),
(8, 123452, 'Reema', 123453, 'kothai', 100, 'Axis', 4300, 5700, '2024-05-17 00:32:18', '2024-05-17 00:32:18'),
(9, 123451, 'Haleema', 123452, 'Reema', 100, 'HDFC', 4900, 4400, '2024-05-17 01:22:11', '2024-05-17 01:22:11'),
(10, 123451, 'Haleema', 123453, 'kothai', 100, 'Axis', 4800, 5800, '2024-05-17 01:22:22', '2024-05-17 01:22:22'),
(12, 123451, 'Haleema', 123452, 'Reema', 100, 'MyBank', 4700, 4500, '2024-05-18 01:15:49', '2024-05-18 01:15:49'),
(13, 123451, 'Haleema', 123453, 'kothai', 100, 'ICICI', 4600, 5900, '2024-05-18 01:16:15', '2024-05-18 01:16:15'),
(14, 123453, 'kothai', 123452, 'Reema', 500, 'MyBank', 5400, 5000, '2024-05-18 23:00:34', '2024-05-18 23:00:34'),
(15, 123452, 'Reema', 123451, 'Haleema', 100, 'Axis', 4900, 4700, '2024-05-18 23:01:04', '2024-05-18 23:01:04'),
(16, 123452, 'Reema', 123453, 'kothai', 200, 'ICICI', 4700, 5600, '2024-05-30 05:29:26', '2024-05-30 05:29:26'),
(17, 123451, 'Haleema', 123452, 'Reema', 200, 'MyBank', 4500, 4900, '2024-09-11 01:02:23', '2024-09-11 01:02:23'),
(18, 123453, 'kothai', 123451, 'Haleema', 600, 'MyBank', 5000, 5100, '2025-01-22 06:15:33', '2025-01-22 06:15:33'),
(19, 123455, 'Sundari', 123455, 'Initial Deposite', 5000, 'MyBank', 5000, 5000, '2025-01-22 06:21:42', '2025-01-22 06:21:42'),
(20, 123455, 'Sundareswari', 123452, 'Reema', 500, 'Axis', 4500, 5400, '2025-01-22 06:44:49', '2025-01-22 06:44:49'),
(21, 123455, 'Sundareswari', 123452, 'Reema', 200, 'Axis', 4300, 5600, '2025-01-23 00:26:52', '2025-01-23 00:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `customer_id`, `name`, `email`, `password`, `account_no`, `phone`, `balance`, `created_at`, `updated_at`) VALUES
(1, 123451, 'Haleema', 'haleema@gmail.com', '$2y$12$B4XRdsFhvp/4nYLT0Ir1ieK6M17hiw2YrDHMfs6teTK47SBUkjCru', 123451, 1234567890, 5100, '2024-05-17 00:28:23', '2025-01-22 06:43:31'),
(2, 123452, 'Reema', 'reema@gmail.com', '$2y$12$Vi3zGM8trE2tOYaAThBYHuSX2Sb1HZwgF9JIwaAlbHDNRRx2YjtFy', 123452, 1234567890, 5600, '2024-05-17 00:28:45', '2025-01-23 00:26:52'),
(3, 123453, 'kothai', 'kothai@gmail.com', '$2y$12$dlblWkTLxFmcKKEb8lYmiOJZDJ5Ie7ZXKFfB5CbQR9JRtkLrBnkwW', 123453, 1234567890, 5000, '2024-05-17 00:29:13', '2025-01-22 06:15:33'),
(5, 123455, 'Sundareswari', 'sundari@gmail.com', '$2y$12$mdUs2AZIraDlamdOUzsXeO28beFqpDg7NUxNDWzqyA9eXianh3xem', 123455, 1234567890, 4300, '2025-01-22 06:21:42', '2025-01-23 00:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
