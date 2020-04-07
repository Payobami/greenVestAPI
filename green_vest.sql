-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 04:09 AM
-- Server version: 5.7.22
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_vest`
--

-- --------------------------------------------------------

--
-- Table structure for table `esaver_account`
--

CREATE TABLE `esaver_account` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `timer` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `esaver_account`
--

INSERT INTO `esaver_account` (`id`, `user_id`, `purpose`, `amount`, `timer`, `end_date`, `status`, `created_date`) VALUES
(1, '27976543', 'rent', '10000', '2', '12/12/2020', 0, '2020-0405 20:07 pm'),
(2, 'XqpSomwx', 'rent', '10000', '2', '12/12/2020', 0, '2020-0407 04:08 am');

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
(1, '2020_04_03_060401_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(11, 'XqpSomwx', 'Yusuf Ayobami', '08062121235', 'yayobami@gmail.com', '$2y$10$xEbjGupaDrgRizqPUud56.JHMFBiV9RcGppUHxiKPes/GuyjDmy7O', '2020-04-07 04:06:01', '2020-04-07 04:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `amount`, `purpose`, `payment_date`, `status`, `remark`) VALUES
(1, 'hhuh', '20000', 'Savings', '06/04/2020', 0, NULL),
(2, 'XqpSomwx', '20000', 'Savings', '06/04/2020', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `esaver_account`
--
ALTER TABLE `esaver_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `esaver_account`
--
ALTER TABLE `esaver_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
