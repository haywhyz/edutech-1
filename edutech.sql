-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2020 at 04:42 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Josh Paul', 'admin@admin.com', NULL, '$2y$10$ymirMZviztWxVkicW2xXTuzCWTJIo1H///vZ6uzs51m0GZD3eYo1e', 'CzKYXTpUr2uFtiEhdckHOrB7zyambdmg0IyJsEYLfD0VkxP7j7Y4Clc0smcD', '2019-01-31 01:06:01', '2019-02-12 05:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_31_053302_create_admins_table', 1),
(4, '2020_08_06_114747_create_payments_table', 1),
(5, '2020_08_06_114844_create_resources_table', 1),
(6, '2020_08_06_152514_create_transactions_table', 1),
(7, '2020_08_06_153154_create_subjects_table', 1),
(8, '2020_08_06_153351_create_topics_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `subject_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `student_id`, `amount`, `subject_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 18000, '1', 'Approved', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(2, 2, 28000, '2', 'Approved', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(3, 3, 30000, '3', 'Pending', '2020-04-15 10:42:13', '2020-04-15 10:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `subject_id`, `week_id`, `topic_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'active.mp4', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(2, 1, 2, 2, 'passive.mp4', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(3, 2, 1, 1, 'algebra.docx', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(4, 2, 2, 2, 'theorem.pdf', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(5, 3, 1, 1, 'mousebasics.pdf', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(6, 3, 2, 2, 'keyboard.webp', '2020-04-15 10:42:13', '2020-04-15 10:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English Language', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(2, 'Mathematics', '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(3, 'Computer Studies', '2020-04-15 10:42:13', '2020-04-15 10:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `subject_id`, `week_id`, `created_at`, `updated_at`) VALUES
(1, 'Passive Voice ', 1, 1, '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(2, 'Algebra', 2, 1, '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(3, 'The Mouse', 3, 1, '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(4, 'The Keyboard', 3, 2, '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(5, 'Pythagoras Theorem', 2, 2, '2020-04-15 10:42:13', '2020-04-15 10:42:13'),
(6, 'Active Voice ', 1, 2, '2020-04-15 10:42:13', '2020-04-15 10:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tellas', 'user@user.com', NULL, '$2y$10$FPIGgq.J/uobzOZ8JR8Tz.BYCliXdrTy491BlB.u1vveeJCWIrZ0W', 'z1BHBBKWejgzV5533FIZXdrDZIK5hJz01z5BdzE6NLwcTi64SREQvY2NifZG', '2019-01-30 23:35:57', '2019-02-12 01:06:25'),
(2, 'Joshua Paul', 'veecthorpaul@gmail.com', NULL, '$2y$10$r4gw0Ak.JDj8jJ4dMwgJ1.vFDlqz8eNZ7xX9WgXrYJcNX5iyyl4xO', 'miQkNctHqOG7n1x2HX0PgljlWGprQqZlrLGlhm2UthHCYI1F7gLLtWwwZIwO', '2020-08-06 08:21:08', '2020-08-06 08:21:08'),
(3, 'Joshua Pauls', 'pauljoshua45@gmail.com', NULL, '$2y$10$MW1w1mIT4VK3DkxyeWLkd.cvYUkWJFVSCFZ2GRYpZ/UaQTtUz73IS', 'KhWDTwOWyOyE5i2Fz8oV44qBL8b6JY3se6ilJFyga9EGad8vN0jBPG3XvJaN', '2020-08-06 09:13:44', '2020-08-06 09:13:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
