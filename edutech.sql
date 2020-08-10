-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2020 at 11:43 AM
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
(1, 'Josh Paul', 'admin@admin.com', NULL, '$2y$10$ymirMZviztWxVkicW2xXTuzCWTJIo1H///vZ6uzs51m0GZD3eYo1e', 'CzKYXTpUr2uFtiEhdckHOrB7zyambdmg0IyJsEYLfD0VkxP7j7Y4Clc0smcD', '2019-01-31 00:06:01', '2019-02-12 04:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JSS1', NULL, NULL),
(2, 'JSS2', NULL, NULL),
(3, 'JSS3', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2020_08_06_153351_create_topics_table', 1),
(9, '2020_08_06_153351_create_classes_table', 2);

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
(1, 1, 18000, '1', 'Approved', '2020-04-15 09:42:13', '2020-04-15 09:42:13'),
(2, 2, 28000, '2', 'Approved', '2020-04-15 09:42:13', '2020-04-15 09:42:13'),
(3, 3, 30000, '3', 'Pending', '2020-04-15 09:42:13', '2020-04-15 09:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resources_topic_id_foreign` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `subject_id`, `week_id`, `topic_id`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'active.mp4', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(2, 1, 2, 2, 'passive.mp4', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(3, 2, 1, 1, 'algebra.docx', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(4, 2, 2, 2, 'theorem.pdf', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(5, 3, 1, 1, 'mousebasics.pdf', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(6, 3, 2, 2, 'keyboard.webp', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `teacher_id`, `name`, `class_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'English Language', 'JSS1', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(2, 2, 'Mathematics', 'JSS2', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(3, 3, 'Computer Studies', 'JSS3', '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(4, 3, 'Civic Educations', 'JSS3', '2020-08-10 09:42:03', '2020-08-10 09:58:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `week_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_subject_id_foreign` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `subject_id`, `week_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Passive Voice ', 1, 1, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(2, 'Algebra', 2, 1, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(3, 'The Mouse', 3, 1, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(4, 'The Keyboard', 3, 2, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(5, 'Pythagoras Theorem', 2, 2, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(6, 'Active Voice ', 1, 2, '2020-04-15 09:42:13', '2020-04-15 09:42:13', NULL),
(7, 'Sets', 2, 2, '2020-08-10 10:07:45', '2020-08-10 10:16:40', NULL);

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
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `role`, `class`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tellas', 'student', 'JSS1', 'user@user.com', NULL, '$2y$10$FPIGgq.J/uobzOZ8JR8Tz.BYCliXdrTy491BlB.u1vveeJCWIrZ0W', 'o3yI0FJfEYBG2OjYsBFlIesaMbOzhboQd8ougeUvM21n9NRNKg0sqcTrm9SB', '2019-01-30 22:35:57', '2019-02-12 00:06:25'),
(2, 'Joshua Paul', 'teacher', 'JSS1', 'veecthorpaul@gmail.com', NULL, '$2y$10$r4gw0Ak.JDj8jJ4dMwgJ1.vFDlqz8eNZ7xX9WgXrYJcNX5iyyl4xO', '2LbFkgDmJMqYXdCLk6FMCzAiLqb9I1KuZTwLxucnq0Kbyt5vaX4b0fP2aK0G', '2020-08-06 07:21:08', '2020-08-06 07:21:08'),
(3, 'Joshua Pauls', 'teacher', 'JSS2', 'pauljoshua45@gmail.com', NULL, '$2y$10$MW1w1mIT4VK3DkxyeWLkd.cvYUkWJFVSCFZ2GRYpZ/UaQTtUz73IS', 'KhWDTwOWyOyE5i2Fz8oV44qBL8b6JY3se6ilJFyga9EGad8vN0jBPG3XvJaN', '2020-08-06 08:13:44', '2020-08-06 08:13:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
