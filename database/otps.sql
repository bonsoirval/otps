-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 09:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN NJOKU OKECHUKWU VALENTINE', 'admin@gmail.com', 'Web Administrator', '$2y$10$dzfNqCjef6a473.Bfh8rhuM6M8osw8ckVIqTtxdfLqBVgt9twud82', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `mat_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `name`, `department_id`, `mat_number`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ALUMNI NJOKU OKECHUKWU VALENTINE', 'NULL', '12345623', '07038616871', 'alumni@gmail.com', '$2y$10$1TSm5Bfz3fDijer7PZM23uUoGpv.gKEFppdWcb7Lh13jhUK4/1YOS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumnis11111`
--

CREATE TABLE `alumnis11111` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `mat_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_25_025103_create_admins_table', 1),
(4, '2018_08_29_214741_create_alumnis_table', 1),
(5, '2018_08_29_224523_create_transcript_applications_table', 1),
(6, '2018_09_04_155509_create_payments_table', 1),
(7, '2018_09_06_000006_create_alumnis11111_table', 1),
(8, '2018_09_06_000007_create_migrations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `mertid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('started','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `txtref` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcript_applications`
--

CREATE TABLE `transcript_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `cetxref` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` enum('open','processing','completed','sent_out') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `payment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnis_phone_unique` (`phone`),
  ADD UNIQUE KEY `alumnis_email_unique` (`email`),
  ADD UNIQUE KEY `alumnis_mat_number_unique` (`mat_number`);

--
-- Indexes for table `alumnis11111`
--
ALTER TABLE `alumnis11111`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnis_mat_number_unique` (`mat_number`),
  ADD UNIQUE KEY `alumnis_phone_unique` (`phone`),
  ADD UNIQUE KEY `alumnis_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcript_applications`
--
ALTER TABLE `transcript_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transcript_applications_payment_id_unique` (`payment_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumnis11111`
--
ALTER TABLE `alumnis11111`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcript_applications`
--
ALTER TABLE `transcript_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
