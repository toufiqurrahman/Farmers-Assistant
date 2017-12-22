-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 01:33 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_assistant`
--

-- --------------------------------------------------------

--
-- Table structure for table `caller_id`
--

CREATE TABLE `caller_id` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `last_active` datetime NOT NULL,
  `gruveo_key` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caller_id`
--

INSERT INTO `caller_id` (`id`, `user_id`, `last_active`, `gruveo_key`, `created_at`, `updated_at`) VALUES
(1, 25, '2017-12-20 05:52:25', '80e59cad8e1a46cc60d3', '2017-12-19 23:02:52', '2017-12-19 23:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `interest` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interest`, `created_at`, `updated_at`) VALUES
(18, 'ginger', '2017-11-23 09:19:34', '2017-11-23 09:19:34'),
(20, 'wheat', '2017-12-15 11:11:01', '2017-12-15 11:11:01'),
(21, 'onion', '2017-12-15 11:11:10', '2017-12-15 11:11:10'),
(23, 'garlic', '2017-12-15 11:23:10', '2017-12-15 11:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `interest_user`
--

CREATE TABLE `interest_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest_user`
--

INSERT INTO `interest_user` (`id`, `user_id`, `interest_id`) VALUES
(161, 4, 18),
(162, 4, 20),
(163, 4, 21),
(159, 5, 18),
(160, 5, 21);

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bsse06@iit.du.ac.bd', '$2y$10$WjJEe6q2g/OuL/Dmfd7ap.FCTBR6Gi8lZizwp.v.9iTNZMkS6uJ4C', '2017-11-22 15:40:38'),
('srezon.iit@gmail.com', '$2y$10$fKdDPiLfLAX4yE9NXL1goeiPLIMFVcKT/akztZeZg17.0U0A8VRpm', '2017-12-14 11:12:05'),
('bsse0636@iit.du.ac.bd', '$2y$10$KLnaJHT3nfTJeQvdZRr0leZblqbE15mFopO3Tk8fzFpjwq/7h7IZO', '2017-12-17 05:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `interest_id`, `amount`, `price`, `user_id`, `created_at`, `updated_at`, `is_expired`) VALUES
(141, 21, '5', '120', 5, '2017-12-18 10:37:14', '2017-12-18 10:52:04', 0),
(142, 21, '10', '112', 5, '2017-12-18 10:38:35', '2017-12-18 10:52:25', 0),
(143, 21, '10', '112', 4, '2017-12-18 10:40:41', '2017-12-18 10:40:41', 0),
(144, 18, '5', '121', 4, '2017-12-18 10:41:16', '2017-12-18 10:41:16', 0),
(145, 18, '10', '121', 5, '2017-12-18 10:57:58', '2017-12-18 10:57:58', 0),
(146, 18, '10', '121', 5, '2017-12-18 11:00:39', '2017-12-18 11:00:39', 0),
(147, 18, '10', '129', 5, '2017-12-18 11:15:18', '2017-12-18 11:15:18', 0),
(148, 18, '10', '113', 5, '2017-12-18 12:26:23', '2017-12-18 12:26:23', 0),
(149, 18, '10', '121', 5, '2017-12-18 12:26:52', '2017-12-18 12:26:52', 0),
(150, 18, '5', '121', 5, '2017-12-18 12:28:11', '2017-12-18 12:28:11', 0),
(152, 18, '5', '121', 5, '2017-12-18 23:27:31', '2017-12-18 23:27:31', 0),
(153, 21, '5', '123', 5, '2017-12-18 23:28:11', '2017-12-18 23:28:11', 0),
(154, 21, '5', '110', 5, '2017-12-18 23:49:53', '2017-12-18 23:49:53', 0),
(155, 18, '5', '123', 5, '2017-12-19 18:31:50', '2017-12-19 18:31:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `question` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `user_id`, `question`, `created_at`, `updated_at`) VALUES
(15, 5, 'শিশির, সেচের পানি, বৃষ্টি, বন্যা এবং ঝড়ো হাওয়ার মাধ্যমে এ রোগ ছড়ায়। ব্যাকটেরিয়া কোষগুলো একত্রে মিলিত হয়ে ভোরের দিকে হলদে পুঁতির দানার মত গুটিকা সৃষ্টি করে এবং এগুলো শুকিয়ে শক্ত হয়ে পাতার গায়ে লেগে থাকে।', '2017-12-15 21:47:14', '2017-12-16 17:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `reply` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `user_id`, `reply`, `question_id`, `created_at`, `updated_at`) VALUES
(11, 25, 'বেশি করে পানি দেন দাদা ।', 15, '2017-12-15 21:53:47', '2017-12-16 17:58:45'),
(12, 5, 'জমির পানি শুকিয়ে পরে আবার সেচ দিন। জমিতে সুষম মাত্রায় সার প্রয়োগ করুন।', 15, '2017-12-18 10:20:01', '2017-12-18 10:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `role`) VALUES
(4, 'Trader', 'bsse0636@iit.du.ac.bd', '$2y$10$SPQ.uZIKAFABtplaXPUE/OLj9xRES/VDxkSEZA3DJk7RqDz6C0D4a', 'EsGWCRxZu4TqTXaY9DSpBBtsTJc2Dcr4Gi6hE33f6SmRqXwrVbverkx5kUlE', '2017-11-11 16:52:13', '2017-12-15 09:27:37', '01916266522', 'trader'),
(5, 'Farmer', 'bsse0601@iit.du.ac.bd', '$2y$10$EbSNBw.4q1JDw0oKyatdcO4z8fZLHxAa3l0hF6HmswC/33YVbfYfC', 'M75iZQIzwhb8KInyEpnBrM2nMiTHnliRz1Ulkxqjb0qk6UASXsTmApnfcHtu', '2017-11-11 16:53:04', '2017-12-18 07:48:45', '01612345679', 'farmer'),
(6, 'srezon', 'bsse0603@iit.du.ac.bd', '$2y$10$J.IdgTho11kC64LaCMcKvuOjM95w1I9IF.fOxWNetQgTSNLfRukQ.', 'nvllLJtr5j44lJQ6YnlxKs1WUHqVttG69VHNzaEY3y6ir6COVzHg6oqn6wMF', '2017-11-11 16:54:19', '2017-11-11 16:54:19', '01712345678', 'farmer'),
(7, 'Farmer', 'bsse0602@iit.du.ac.bd', '$2y$10$dILrr6hY.3UnkL/E8axFL.gJKZemSiigMWeXezKcp0XqskmFCnLHq', 'B3tRrWPSoxKDxtckxFVbpwBVHFeGk4mUstDk4EeRW0pqG1yAY2WXErk2G3eC', '2017-11-11 16:55:00', '2017-11-11 16:55:00', '01819019772', 'trader'),
(8, 'srezon', 'bsse0604@iit.du.ac.bd', '$2y$10$a3rHlXp6MWBeh/s7.aw1n.DpzpMfi.zosaVnyEIwq8dQUNGf2KU/2', 'OCUxkWKEfWY8sj2FotUoHXVnWpkEOWnEU1avI6DGcdiBi4e0mTOT42xR4STE', '2017-11-11 16:56:46', '2017-11-11 16:56:46', '01987654321', 'farmer'),
(11, 'Admin', 'bsse06@iit.du.ac.bd', '$2y$10$JBmctJqT9UmTmvPy4AAOHeNd4eaGCeOOSwOinRK2lOhSimODViv4i', 'rEu2qtuGCiOprxXGxvtpt8SFNUFWUuCUBiOayT6XfjMKRKpFjgz4uQsLGbEC', '2017-11-14 10:48:40', '2017-11-25 11:28:14', '01916266522', 'admin'),
(12, 'Farmer', 'bsse0646@iit.du.ac.bd', '$2y$10$tHmwgXq3nQRNRPpz7CmIyuyaGn3xdmRdmLuCTSo1RslHdqZJS8oWC', 'CEozunG7cOSojIjO86w5miIlZglsjKmVSzqkXCo95gy6fZXrskQRrrINjCGE', '2017-11-17 16:15:16', '2017-11-17 16:15:16', '01916266522', 'trader'),
(13, 'Farmer', 'bsse0642@iit.du.ac.bd', '$2y$10$oONDJHUW1EBYAapV6sUp6eSplCrJQudoVvCEYQSQz5Hwfk5pB/ZEG', 'lH0u9fZKmTE4Urqknj3idTP9p3DIuWK71jTgNRnSW6tzx85v1iP6nfet0Q9z', '2017-11-17 16:27:13', '2017-11-17 16:27:13', '01916266522', 'trader'),
(15, 'Farmer', 'bsse01@iit.du.ac.bd', '$2y$10$myeTfrNZEk7P5mabqcV5aO2zunaB5UZaxZqbn/vJNk95pTJ97eMnS', 'TDtfJttBESIB1Ovmsk4dB4L2iZPM7BJU4vPxiHKGPVHkJzZ4kGNMn6Rus2AC', '2017-11-19 00:19:05', '2017-11-19 00:19:05', '01916266522', 'farmer'),
(19, 'Bug Status', 'bsse066@iit.du.ac.bd', '$2y$10$meh00SDF./X7I3ZHiWhube3j7lxschGkI1j3mm8yiHiS3Kz94bp3W', 'FvO7ZorYeapURN6BXnEdmzkUwctiuSh4RfDF3jqwHP2wnZwPpEfuLSI210o1', '2017-11-19 00:31:22', '2017-11-19 00:31:22', '01916266522', 'farmer'),
(21, 'Farmer', 'bsse0637@iit.du.ac.bd', '$2y$10$Uvb4I/QpVPDshFmaZfoDBO.aCY3C9Z0eKK71pujd8KybwSIVXfbQ2', '59J7T7vEcfIPaGHleCBF3JpPh9bqpmWon9OX2SuRTaoyWB8APPrNsPwcDHFX', '2017-11-19 00:33:27', '2017-11-23 12:15:07', '01916266523', 'farmer'),
(23, 'আব্দুর রহিম', 'bsse0609@iit.du.ac.bd', '$2y$10$zdaejm2K3lwbBghPRDrDWuQKFcR4OJVQGpYMOZmJ8ZCwd3U.awf8q', 'vMt64bYYybZ1NqBPT1CHkp62iGpMGZzObASSslDYXWdJoI4VMlFSvIopoDk8', '2017-11-20 00:14:04', '2017-11-20 00:14:04', '01916266522', 'farmer'),
(24, 'সালাম', 'bsse0630@iit.du.ac.bd', '$2y$10$6IWBVUKy3HvX9xP9f7m.L.MTMca5SQyV3dCIiHeW2jVf5FTbsDHyK', 'fQiK8z3BU6u4GittN8tYp7OXe1Dc2xgYvSNteAbtOCAVZ7uMVZstPNArfQ8x', '2017-11-20 00:43:06', '2017-11-20 00:43:06', '01916266522', 'farmer'),
(25, 'Expert', 'expert@gmail.com', '$2y$10$UhzcmoYQewkiQGviv4dcIuE5elWJG65QIuC2AQfQn3SAmcCqaAYoO', 'egs3QrRKYmn6AknFwlIb27pnpEBHVaks7xjtJOp0MM5887dvqpv5mzP77dJv', '2017-11-21 04:19:38', '2017-12-16 18:29:41', '01826266522', 'expert'),
(27, 'Expert 2', 'expert2@gmail.com', '$2y$10$ajdfUPqocEtXrUEY.J3ef.J0Wqevm1Tst.b/gbKXvlq8QMhvxBcyK', NULL, '2017-12-17 05:01:46', '2017-12-17 05:01:46', '01925112112', 'expert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caller_id`
--
ALTER TABLE `caller_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `interest_user`
--
ALTER TABLE `interest_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`interest_id`),
  ADD KEY `fk2` (`interest_id`);

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
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
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
-- AUTO_INCREMENT for table `caller_id`
--
ALTER TABLE `caller_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `interest_user`
--
ALTER TABLE `interest_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `caller_id`
--
ALTER TABLE `caller_id`
  ADD CONSTRAINT `caller_id_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `interest_user`
--
ALTER TABLE `interest_user`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
