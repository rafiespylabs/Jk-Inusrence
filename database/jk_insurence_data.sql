-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2025 at 05:45 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jk_insurence_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_20_102403_add_role_to_users_table', 2),
(6, '2024_02_21_133203_add_username_to_users_table', 3),
(7, '2024_02_27_060431_create_tbl_mentorships_table', 4),
(8, '2024_02_27_061847_create_tbl_timings_table', 5),
(9, '2024_02_27_063241_create_tbl_timings_table', 6),
(10, '2024_03_05_104709_rename_start_time_in_tbl_timings', 7),
(11, '2024_03_05_113314_add_end_time_to_tbl_timings_table', 7),
(12, '2024_03_05_143755_create_tbl_menteeregistrations_table', 7),
(13, '2024_12_13_085327_create_tbl_insurence_providers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$uxFYrH/eCUmpGujUR6iMou/E7Zs9rUcDsO1tShqCihIhBA5TI17vi', '2024-04-15 06:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HbEdINyrjmRvm2VPaVwg2yvKzgF4mnFj6Kmg97ma', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFZ2dXlCd0VhUXlmSFpzdDh2SVU4RW96WnJEOEpiQ2pza3NrVE5LQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXl3b3JrX3RyYW5zLzQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742535109),
('j8Xw5LjUDetK7cklPzVUtr86YlbtX9DgqqZ7W7ZC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicERxY1F2Sk9rRFpIaUF5b2NobUduZklnbEFpNloxZ3BRWmJoTUpKUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdXJjaGFzZS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742794305),
('SS29QTZgcHLfnIvdExA99akCfJQdCm0XQZJEj6CS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmczSTJUNE1qamRXQ24wR0dKTzVnbDZoRFFFeXpFUWlPbXI3RWxLWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742643176);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

DROP TABLE IF EXISTS `tbl_agents`;
CREATE TABLE IF NOT EXISTS `tbl_agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agents`
--

INSERT INTO `tbl_agents` (`id`, `agent_name`, `email`, `phone_number`, `company_name`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'Agnet1', 'agent1@gmail.com', '8762786282', 'Agnet 1 Company', 1, '2024-11-14', NULL, NULL),
(2, 'Agnet2', 'newentry@gmail.com', '9867239849', 'Agnet 2 Company', 1, '2024-11-14', NULL, NULL),
(3, 'Agnet3', 'agent3@gmail.com', '8728292', 'Agent 3cmpany', 1, '2024-11-14', NULL, NULL),
(4, 'qa', 'newentry@gmail.com', '8978989080', 'ssugs', 1, '2024-11-14', NULL, NULL),
(5, 'agent4', NULL, NULL, 'age4 limited', 1, '2025-01-22', NULL, NULL),
(6, 'agent5', NULL, NULL, 'agent5 Kimited', 1, '2025-01-22', NULL, NULL),
(7, 'agent6', NULL, NULL, 'agent6 limited', 1, '2025-01-22', NULL, NULL),
(8, 'sagent2', NULL, NULL, 'alknd', 1, '2025-01-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendances`
--

DROP TABLE IF EXISTS `tbl_attendances`;
CREATE TABLE IF NOT EXISTS `tbl_attendances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_user_id` int NOT NULL,
  `longitude_punchin` varchar(255) DEFAULT NULL,
  `lattitude_punchin` varchar(255) DEFAULT NULL,
  `punch_in_time` time NOT NULL,
  `punchinimage` varchar(255) DEFAULT NULL,
  `punch_out_time` time DEFAULT NULL,
  `punchoutimage` varchar(255) DEFAULT NULL,
  `punchout_lat` varchar(255) DEFAULT NULL,
  `punchout_long` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendance_user` (`staff_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendances`
--

INSERT INTO `tbl_attendances` (`id`, `staff_user_id`, `longitude_punchin`, `lattitude_punchin`, `punch_in_time`, `punchinimage`, `punch_out_time`, `punchoutimage`, `punchout_lat`, `punchout_long`, `date`, `added_by`, `createdAt`, `updatedAt`) VALUES
(1, 119, NULL, NULL, '12:08:04', NULL, '29:08:04', NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_items`
--

DROP TABLE IF EXISTS `tbl_batch_items`;
CREATE TABLE IF NOT EXISTS `tbl_batch_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `batchcode` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

DROP TABLE IF EXISTS `tbl_branches`;
CREATE TABLE IF NOT EXISTS `tbl_branches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branches`
--

INSERT INTO `tbl_branches` (`id`, `branch`, `createdAt`, `updatedAt`) VALUES
(1, 'PATHFINDER HEAD OFFICE', '2024-09-02 04:55:17', '2024-09-02 04:55:17'),
(2, 'Branch2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_categories`
--

DROP TABLE IF EXISTS `tbl_business_categories`;
CREATE TABLE IF NOT EXISTS `tbl_business_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_business_categories`
--

INSERT INTO `tbl_business_categories` (`id`, `business_category_name`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'Consultancy', 0, '0000-00-00 00:00:00', 1, '2025-03-19 15:30:47', '2025-01-22 09:36:26', '2025-03-19 10:00:47'),
(2, 'Test', 1, '2025-03-19 15:30:59', 1, '2025-03-19 15:40:44', '2025-03-19 10:00:59', '2025-03-19 10:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cards`
--

DROP TABLE IF EXISTS `tbl_cards`;
CREATE TABLE IF NOT EXISTS `tbl_cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `holder_name` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `bank` varchar(100) NOT NULL,
  `current_amount` float NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_date` date DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cards`
--

INSERT INTO `tbl_cards` (`id`, `holder_name`, `expiry_date`, `bank`, `current_amount`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'Asker Ali Axis', '2025-02-21', '', 21000, 1, '2025-02-20', NULL, NULL),
(2, 'Ashik HDFC', '2025-02-27', '', 22000, 1, '2025-02-07', NULL, NULL),
(3, 'lijo hdfc', '2025-03-01', 'State Bank', 46000, 1, '2025-02-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_contact_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `client_name`, `client_contact_number`, `client_gst`, `client_address`, `created_at`, `updated_at`) VALUES
(1, 'client2', '3344556', 'rrt566', 'dffffddd', '2025-01-27 01:27:50', '2025-01-27 01:32:22'),
(2, 'client3', '3344556', 'rrt566', 'dffff', '2025-01-27 01:32:34', '2025-01-27 01:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

DROP TABLE IF EXISTS `tbl_companies`;
CREATE TABLE IF NOT EXISTS `tbl_companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`id`, `company`, `phone`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'Company1', '6667777778', 1, '2024-11-14', NULL, NULL),
(2, 'company2', '55788999', 1, '2025-01-22', NULL, NULL),
(3, 'company3', NULL, 1, '2025-01-22', NULL, NULL),
(4, 'company4', '9867239849', 1, '2025-01-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

DROP TABLE IF EXISTS `tbl_countries`;
CREATE TABLE IF NOT EXISTS `tbl_countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `country`, `createdAt`, `updatedAt`) VALUES
(1, 'INDIA', '2024-08-14 11:40:52', '2024-08-19 06:44:06'),
(2, 'QATAR', '2024-08-16 06:57:41', '2024-08-16 06:57:41'),
(3, 'UAE', '2024-08-16 06:57:48', '2024-08-16 06:57:48'),
(4, 'Bahrain', '2024-08-16 06:58:01', '2024-08-16 06:58:01'),
(5, 'KUWAIT', '2024-08-16 06:58:43', '2024-08-16 06:58:43'),
(6, 'KSA', '2024-08-16 06:59:04', '2024-08-16 06:59:04'),
(7, 'OMAN', '2024-08-16 08:47:44', '2024-08-16 08:47:44'),
(8, 'SAUDI ARABIA', '2024-08-16 08:54:19', '2024-08-16 08:54:19'),
(10, 'SEYCHELLES ', '2024-09-04 10:13:56', '2024-09-04 10:13:56'),
(13, 'Uk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coverage_types`
--

DROP TABLE IF EXISTS `tbl_coverage_types`;
CREATE TABLE IF NOT EXISTS `tbl_coverage_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coverage_type` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_coverage_types`
--

INSERT INTO `tbl_coverage_types` (`id`, `coverage_type`, `created_at`, `updated_at`) VALUES
(1, 'Thirdparty', NULL, NULL),
(2, 'Full Cover', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_creditcard_payments`
--

DROP TABLE IF EXISTS `tbl_creditcard_payments`;
CREATE TABLE IF NOT EXISTS `tbl_creditcard_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `card_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `credit` float NOT NULL,
  `credited_date` date DEFAULT NULL,
  `purpose` text,
  `due_date` date DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '0-due,1-fullpaid,',
  `status_changed_date` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_creditcard_payments`
--

INSERT INTO `tbl_creditcard_payments` (`id`, `card_id`, `provider_id`, `credit`, `credited_date`, `purpose`, `due_date`, `status`, `status_changed_date`, `created_by`, `created_date`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(1, 1, 0, 50000, NULL, 'aaa', '2024-11-30', NULL, NULL, 1, '2024-11-22 00:00:00', NULL, NULL, NULL, NULL),
(2, 1, 0, 50000, NULL, '1222', '2024-11-20', NULL, NULL, 1, '2024-11-29 00:00:00', NULL, NULL, NULL, NULL),
(3, 1, 0, 50000, NULL, 'aaa', '2024-12-05', NULL, NULL, 1, '2024-11-29 00:00:00', NULL, NULL, NULL, NULL),
(4, 2, 0, 50000, NULL, NULL, '2024-12-07', NULL, NULL, 1, '2024-11-29 00:00:00', NULL, NULL, NULL, NULL),
(5, 3, 0, 50000, '2025-02-06', 'ssddd', '2025-02-22', NULL, NULL, 1, '2025-02-05 00:00:00', NULL, NULL, NULL, NULL),
(6, 3, 0, 50000, '2025-02-06', 'ssddd', '2025-02-22', NULL, NULL, 1, '2025-02-05 00:00:00', NULL, NULL, NULL, NULL),
(7, 3, 0, 25000, '2025-02-05', 'testingcgd', '2025-02-26', 1, NULL, 1, '2025-02-05 00:00:00', 1, '2025-02-05 22:20:01', NULL, NULL),
(8, 3, 0, 50000, '2025-02-07', 'sddd', '2025-03-29', NULL, NULL, 1, '2025-02-07 00:00:00', NULL, NULL, NULL, NULL),
(9, 2, 2, 2000, '2025-02-12', 'ssdd', '2025-02-14', NULL, NULL, 1, '2025-02-11 00:00:00', NULL, NULL, NULL, NULL),
(10, 2, 2, 1000, '2025-02-12', 'sss', '2025-02-15', NULL, NULL, 1, '2025-02-11 00:00:00', NULL, NULL, NULL, NULL),
(11, 2, 1, 20000, '2025-02-11', 'ssdd', '2025-02-28', NULL, NULL, 1, '2025-02-11 00:00:00', NULL, NULL, NULL, NULL),
(12, 1, 2, 50000, '2025-02-11', 'sdddd', NULL, NULL, NULL, 1, '2025-02-11 00:00:00', 1, '2025-02-11 14:43:42', NULL, NULL),
(13, 2, 1, 20000, '2025-03-03', 'ojond', '2025-03-13', NULL, NULL, 1, '2025-03-03 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit_repayments`
--

DROP TABLE IF EXISTS `tbl_credit_repayments`;
CREATE TABLE IF NOT EXISTS `tbl_credit_repayments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `credit_pay_id` int NOT NULL,
  `repay_amount` float NOT NULL,
  `repay_date` date NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_credit_repayments`
--

INSERT INTO `tbl_credit_repayments` (`id`, `credit_pay_id`, `repay_amount`, `repay_date`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 7, 150, '2025-02-06', 1, '2025-02-06 05:59:05', 1, '2025-02-06 13:25:31', NULL, '2025-02-06 13:25:31'),
(2, 7, 200, '2025-02-13', 1, '2025-02-06 12:30:45', NULL, NULL, '2025-02-06 12:30:45', '2025-02-06 12:30:45'),
(3, 7, 200, '2025-02-13', 1, '2025-02-06 12:40:08', NULL, NULL, '2025-02-06 12:40:08', '2025-02-06 12:40:08'),
(4, 7, 200, '2025-02-13', 1, '2025-02-06 12:40:26', 1, '2025-02-06 13:25:17', '2025-02-06 12:40:26', '2025-02-06 13:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealers`
--

DROP TABLE IF EXISTS `tbl_dealers`;
CREATE TABLE IF NOT EXISTS `tbl_dealers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dealer_name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dealers`
--

INSERT INTO `tbl_dealers` (`id`, `dealer_name`, `email`, `phone_number`, `company_name`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'Dealer1', NULL, '7899000909', NULL, 1, '2024-11-16', NULL, NULL),
(2, 'dealer2', 'dealer2@gmail.com', '9867239849', 'Habba Dealers', 1, '2024-11-18', NULL, NULL),
(3, 'dealer3', NULL, NULL, 'sdealer3 limited', 1, '2025-01-22', NULL, NULL),
(4, 'Dealer4', NULL, NULL, 'dealer 4 company', 1, '2025-01-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

DROP TABLE IF EXISTS `tbl_departments`;
CREATE TABLE IF NOT EXISTS `tbl_departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department` (`department`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `department`, `createdAt`, `updatedAt`) VALUES
(1, 'HR DEPARTMENT', '2024-09-02 07:35:32', '2024-09-03 08:04:55'),
(2, 'MARKETING', '2024-09-03 08:05:11', '2024-09-03 08:05:11'),
(3, 'CEO', NULL, NULL),
(4, 'Sales', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designations`
--

DROP TABLE IF EXISTS `tbl_designations`;
CREATE TABLE IF NOT EXISTS `tbl_designations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_designations`
--

INSERT INTO `tbl_designations` (`id`, `designation`, `createdAt`, `updatedAt`) VALUES
(1, 'MANAGER', '2024-09-02 07:39:22', '2024-09-03 08:05:32'),
(2, 'MARKETING MANAGER', '2024-09-03 08:06:02', '2024-09-03 08:06:02'),
(3, 'ACCOUNTANT', '2024-09-03 08:06:15', '2024-09-03 08:06:15'),
(4, 'Recruiting Coordinator', '2024-09-03 08:14:01', '2024-09-03 08:14:01'),
(5, 'Senior Recruiting Coordinator', '2024-09-03 08:15:26', '2024-09-03 08:15:26'),
(6, 'Tellecaller', NULL, NULL),
(7, 'Security', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

DROP TABLE IF EXISTS `tbl_districts`;
CREATE TABLE IF NOT EXISTS `tbl_districts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `state_id` int NOT NULL,
  `district` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_countrys` (`country_id`),
  KEY `fk_district_states` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=795 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`id`, `country_id`, `state_id`, `district`, `createdAt`, `updatedAt`) VALUES
(1, 1, 1, 'Anantapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 1, 'Chittoor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 1, 'East Godavari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 1, 'Alluri Sitarama Raju', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 1, 'Anakapalli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 1, 'Annamaya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 1, 'Bapatla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 1, 'Eluru', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 1, 'Guntur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 1, 'Kadapa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 1, 'Kakinada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 1, 'Konaseema', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 1, 'Krishna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 1, 'Kurnool', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 1, 'Manyam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 1, 'N T Rama Rao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 1, 'Nandyal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 1, 'Nellore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 1, 'Palnadu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 1, 'Prakasam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 1, 'Sri Balaji', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 1, 'Sri Satya Sai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 1, 'Srikakulam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 1, 'Visakhapatnam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 1, 'Vizianagaram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 1, 'West Godavari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 2, 'Anjaw', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 2, 'Bichom', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 2, 'Siang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 2, 'Changlang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 1, 2, 'Dibang Valley', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 2, 'East Kameng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 1, 2, 'East Siang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 2, 'Kamle', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, 2, 'Keyi Panyor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 1, 2, 'Kra Daadi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 2, 'Kurung Kumey', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 1, 2, 'Lepa Rada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 1, 2, 'Lohit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 1, 2, 'Longding', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 1, 2, 'Lower Dibang Valley', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 1, 2, 'Lower Siang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 1, 2, 'Lower Subansiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 1, 2, 'Namsai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 1, 2, 'Pakke Kessang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 1, 2, 'Papum Pare', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 1, 2, 'Shi Yomi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 1, 2, 'Tawang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 2, 'Tirap', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 1, 2, 'Upper Siang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1, 2, 'Upper Subansiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 1, 2, 'West Kameng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 1, 2, 'West Siang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 1, 3, 'Bajali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 1, 3, 'Baksa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 1, 3, 'Barpeta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 1, 3, 'Biswanath', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 1, 3, 'Bongaigaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 1, 3, 'Cachar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 1, 3, 'Charaideo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 1, 3, 'Chirang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 1, 3, 'Darrang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 1, 3, 'Dhemaji', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 1, 3, 'Dhubri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 1, 3, 'Dibrugarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 1, 3, 'Dima Hasao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 1, 3, 'Goalpara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 1, 3, 'Golaghat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 1, 3, 'Hailakandi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 1, 3, 'Hojai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 1, 3, 'Jorhat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 1, 3, 'Kamrup Rural', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 1, 3, 'Kamrup Metropolitan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 1, 3, 'Karbi Anglong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 1, 3, 'Karimganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 1, 3, 'Kokrajhar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 1, 3, 'Lakhimpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 1, 3, 'Majuli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 1, 3, 'Morigaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 1, 3, 'Nagaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 1, 3, 'Nalbari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 1, 3, 'Sivasagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 1, 3, 'Sonitpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 1, 3, 'South Salmara-Mankachar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 1, 3, 'Tamulpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 1, 3, 'Tinsukia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 1, 3, 'Udalguri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 1, 3, 'West Karbi Anglong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 1, 4, 'Araria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 1, 4, 'Arwal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 1, 4, 'Aurangabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 1, 4, 'Banka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 1, 4, 'Begusarai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 1, 4, 'Bhagalpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 1, 4, 'Bhojpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 1, 4, 'Buxar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 1, 4, 'Darbhanga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 1, 4, 'East Champaran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 1, 4, 'Gaya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 1, 4, 'Gopalganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 1, 4, 'Jamui', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 1, 4, 'Jehanabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 1, 4, 'Kaimur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 1, 4, 'Katihar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 1, 4, 'Khagaria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 1, 4, 'Kishanganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 1, 4, 'Lakhisarai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 1, 4, 'Madhepura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 1, 4, 'Madhubani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 1, 4, 'Munger', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 1, 4, 'Muzaffarpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 1, 4, 'Nalanda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 1, 4, 'Nawada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 1, 4, 'Patna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 1, 4, 'Purnia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 1, 4, 'Rohtas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 1, 4, 'Saharsa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 1, 4, 'Samastipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 1, 4, 'Saran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 1, 4, 'Sheikhpura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 1, 4, 'Sheohar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 1, 4, 'Sitamarhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 1, 4, 'Siwan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 1, 4, 'Supaul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 1, 4, 'Vaishali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 1, 4, 'West Champaran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 1, 5, 'Balod', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 1, 5, 'Baloda Bazar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 1, 5, 'Balrampur Ramanujganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 1, 5, 'Bastar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 1, 5, 'Bemetara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 1, 5, 'Bijapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 1, 5, 'Bilaspur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 1, 5, 'Dantewada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 1, 5, 'Dhamtari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 1, 5, 'Durg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 1, 5, 'Gariaband', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 1, 5, 'Gaurela Pendra Marwahi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 1, 5, 'Janjgir Champa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 1, 5, 'Jashpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 1, 5, 'Kabirdham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 1, 5, 'Kanker', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 1, 5, 'Khairagarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 1, 5, 'Kondagaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 1, 5, 'Korba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 1, 5, 'Koriya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 1, 5, 'Mahasamund', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 1, 5, 'Manendragarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 1, 5, 'Mohla Manpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 1, 5, 'Mungeli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 1, 5, 'Narayanpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 1, 5, 'Raigarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 1, 5, 'Raipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 1, 5, 'Rajnandgaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 1, 5, 'Sakti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 1, 5, 'Sarangarh Bilaigarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 1, 5, 'Sukma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 1, 5, 'Surajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 1, 5, 'Surguja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 1, 6, 'North Goa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 1, 6, 'South Goa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 1, 7, 'Ahmedabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 1, 7, 'Amreli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 1, 7, 'Anand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 1, 7, 'Aravalli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 1, 7, 'Banaskantha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 1, 7, 'Bharuch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 1, 7, 'Bhavnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 1, 7, 'Botad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 1, 7, 'Chhota Udaipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 1, 7, 'Dahod', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 1, 7, 'Dang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 1, 7, 'Devbhoomi Dwarka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 1, 7, 'Gandhinagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 1, 7, 'Gir Somnath', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 1, 7, 'Jamnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 1, 7, 'Junagadh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 1, 7, 'Kheda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 1, 7, 'Kutch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 1, 7, 'Mahisagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 1, 7, 'Mehsana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 1, 7, 'Morbi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 1, 7, 'Narmada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 1, 7, 'Navsari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 1, 7, 'Panchmahal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 1, 7, 'Patan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 1, 7, 'Porbandar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 1, 7, 'Rajkot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 1, 7, 'Sabarkantha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 1, 7, 'Surat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 1, 7, 'Surendranagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 1, 7, 'Tapi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 1, 7, 'Vadodara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 1, 7, 'Valsad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 1, 8, 'Ambala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 1, 8, 'Bhiwani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 1, 8, 'Charkhi Dadri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 1, 8, 'Faridabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 1, 8, 'Fatehabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 1, 8, 'Gurugram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 1, 8, 'Hisar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 1, 8, 'Jhajjar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 1, 8, 'Jind', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 1, 8, 'Kaithal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 1, 8, 'Karnal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 1, 8, 'Kurukshetra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 1, 8, 'Mahendragarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 1, 8, 'Nuh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 1, 8, 'Palwal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 1, 8, 'Panchkula', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 1, 8, 'Panipat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 1, 8, 'Rewari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 1, 8, 'Rohtak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 1, 8, 'Sirsa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 1, 8, 'Sonipat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 1, 8, 'Yamunanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 1, 9, 'Bilaspur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 1, 9, 'Chamba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 1, 9, 'Hamirpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 1, 9, 'Kangra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 1, 9, 'Kinnaur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 1, 9, 'Kullu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 1, 9, 'Lahaul Spiti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 1, 9, 'Mandi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 1, 9, 'Shimla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 1, 9, 'Sirmaur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 1, 9, 'Solan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 1, 9, 'Una', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 1, 10, 'Bokaro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 1, 10, 'Chatra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 1, 10, 'Deoghar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 1, 10, 'Dhanbad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 1, 10, 'Dumka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 1, 10, 'East Singhbhum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 1, 10, 'Garhwa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 1, 10, 'Giridih', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 1, 10, 'Godda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 1, 10, 'Gumla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 1, 10, 'Hazaribagh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 1, 10, 'Jamtara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 1, 10, 'Khunti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 1, 10, 'Koderma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 1, 10, 'Latehar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 1, 10, 'Lohardaga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 1, 10, 'Pakur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 1, 10, 'Palamu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 1, 10, 'Ramgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 1, 10, 'Ranchi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 1, 10, 'Sahebganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 1, 10, 'Seraikela Kharsawan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 1, 10, 'Simdega', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 1, 10, 'West Singhbhum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 1, 11, 'Bagalkot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 1, 11, 'Bangalore Rural', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 1, 11, 'Bangalore Urban', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 1, 11, 'Belgaum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 1, 11, 'Bellary', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 1, 11, 'Bidar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 1, 11, 'Chamarajanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 1, 11, 'Chikkaballapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 1, 11, 'Chikkamagaluru', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 1, 11, 'Chitradurga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 1, 11, 'Dakshina Kannada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 1, 11, 'Davanagere', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 1, 11, 'Dharwad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 1, 11, 'Gadag', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 1, 11, 'Kalaburagi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 1, 11, 'Hassan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 1, 11, 'Haveri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 1, 11, 'Kodagu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 1, 11, 'Kolar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 1, 11, 'Koppal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 1, 11, 'Mandya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 1, 11, 'Mysore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 1, 11, 'Raichur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 1, 11, 'Ramanagara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 1, 11, 'Shimoga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 1, 11, 'Tumkur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 1, 11, 'Udupi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 1, 11, 'Uttara Kannada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 1, 11, 'Vijayanagara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 1, 11, 'Vijayapura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 1, 11, 'Yadgir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 1, 12, 'Alappuzha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 1, 12, 'Ernakulam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 1, 12, 'Idukki', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 1, 12, 'Kannur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 1, 12, 'Kasaragod', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 1, 12, 'Kollam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 1, 12, 'Kottayam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 1, 12, 'Kozhikode', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 1, 12, 'Malappuram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 1, 12, 'Palakkad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 1, 12, 'Pathanamthitta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 1, 12, 'Thiruvananthapuram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 1, 12, 'Thrissur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 1, 12, 'Wayanad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 1, 13, 'Agar Malwa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 1, 13, 'Alirajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 1, 13, 'Anuppur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 1, 13, 'Ashoknagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 1, 13, 'Balaghat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 1, 13, 'Barwani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 1, 13, 'Betul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 1, 13, 'Bhind', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 1, 13, 'Bhopal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 1, 13, 'Burhanpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 1, 13, 'Chhatarpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 1, 13, 'Chhindwara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 1, 13, 'Damoh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 1, 13, 'Datia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 1, 13, 'Dewas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 1, 13, 'Dhar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 1, 13, 'Dindori', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 1, 13, 'Guna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 1, 13, 'Gwalior', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 1, 13, 'Harda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 1, 13, 'Hoshangabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 1, 13, 'Indore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 1, 13, 'Jabalpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 1, 13, 'Jhabua', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 1, 13, 'Katni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 1, 13, 'Khandwa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 1, 13, 'Khargone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 1, 13, 'Maihar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 1, 13, 'Mandla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 1, 13, 'Mandsaur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 1, 13, 'Mauganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 1, 13, 'Morena', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 1, 13, 'Narsinghpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 1, 13, 'Neemuch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 1, 13, 'Niwari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 1, 13, 'Pandhurna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 1, 13, 'Panna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 1, 13, 'Raisen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 1, 13, 'Rajgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 1, 13, 'Ratlam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 1, 13, 'Rewa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 1, 13, 'Sagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 1, 13, 'Satna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 1, 13, 'Sehore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 1, 13, 'Seoni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 1, 13, 'Shahdol', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 1, 13, 'Shajapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 1, 13, 'Sheopur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 1, 13, 'Shivpuri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 1, 13, 'Sidhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 1, 13, 'Singrauli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 1, 13, 'Tikamgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 1, 13, 'Ujjain', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 1, 13, 'Umaria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 1, 13, 'Vidisha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 1, 14, 'Ahmednagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 1, 14, 'Akola', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 1, 14, 'Amravati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 1, 14, 'Aurangabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 1, 14, 'Beed', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 1, 14, 'Bhandara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 1, 14, 'Buldhana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 1, 14, 'Chandrapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 1, 14, 'Dhule', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 1, 14, 'Gadchiroli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 1, 14, 'Gondia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 1, 14, 'Hingoli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 1, 14, 'Jalgaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 1, 14, 'Jalna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 1, 14, 'Kolhapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 1, 14, 'Latur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 1, 14, 'Mumbai City', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 1, 14, 'Mumbai Suburban', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 1, 14, 'Nagpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 1, 14, 'Nanded', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 1, 14, 'Nandurbar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 1, 14, 'Nashik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 1, 14, 'Osmanabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 1, 14, 'Palghar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 1, 14, 'Parbhani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 1, 14, 'Pune', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 1, 14, 'Raigad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 1, 14, 'Ratnagiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 1, 14, 'Sangli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 1, 14, 'Satara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 1, 14, 'Sindhudurg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 1, 14, 'Solapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 1, 14, 'Thane', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 1, 14, 'Wardha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 1, 14, 'Washim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 1, 14, 'Yavatmal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 1, 15, 'Bishnupur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 1, 15, 'Chandel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 1, 15, 'Churachandpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 1, 15, 'Imphal East', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 1, 15, 'Imphal West', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 1, 15, 'Jiribam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 1, 15, 'Kakching', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 1, 15, 'Kamjong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 1, 15, 'Kangpokpi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 1, 15, 'Noney', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 1, 15, 'Pherzawl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 1, 15, 'Senapati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 1, 15, 'Tamenglong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 1, 15, 'Tengnoupal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 1, 15, 'Thoubal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 1, 15, 'Ukhrul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 1, 16, 'East Garo Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 1, 16, 'East Jaintia Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 1, 16, 'East Khasi Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 1, 16, 'Mairang (Eastern West Khasi Hills)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 1, 16, 'North Garo Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 1, 16, 'Ri Bhoi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 1, 16, 'South Garo Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 1, 16, 'South West Garo Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 1, 16, 'South West Khasi Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 1, 16, 'West Garo Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 1, 16, 'West Jaintia Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 1, 16, 'West Khasi Hills', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 1, 17, 'Aizawl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 1, 17, 'Champhai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 1, 17, 'Hnahthial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 1, 17, 'Khawzawl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 1, 17, 'Kolasib', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 1, 17, 'Lawngtlai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 1, 17, 'Lunglei', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 1, 17, 'Mamit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 1, 17, 'Saiha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 1, 17, 'Saitual', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 1, 17, 'Serchhip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 1, 18, 'Chumukedima', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 1, 18, 'Dimapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 1, 18, 'Kiphire', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 1, 18, 'Kohima', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 1, 18, 'Longleng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 1, 18, 'Mokokchung', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 1, 18, 'Mon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 1, 18, 'Niuland', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 1, 18, 'Noklak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 1, 18, 'Peren', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 1, 18, 'Phek', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 1, 18, 'Shamator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 1, 18, 'Tseminyu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 1, 18, 'Tuensang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 1, 18, 'Wokha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 1, 18, 'Zunheboto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 1, 19, 'Angul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 1, 19, 'Balangir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 1, 19, 'Balasore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 1, 19, 'Bargarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 1, 19, 'Bhadrak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 1, 19, 'Boudh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 1, 19, 'Cuttack', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 1, 19, 'Debagarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 1, 19, 'Dhenkanal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 1, 19, 'Gajapati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 1, 19, 'Ganjam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 1, 19, 'Jagatsinghpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 1, 19, 'Jajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 1, 19, 'Jharsuguda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 1, 19, 'Kalahandi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 1, 19, 'Kandhamal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 1, 19, 'Kendrapara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, 1, 19, 'Kendujhar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, 1, 19, 'Khordha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, 1, 19, 'Koraput', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, 1, 19, 'Malkangiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, 1, 19, 'Mayurbhanj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, 1, 19, 'Nabarangpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, 1, 19, 'Nayagarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, 1, 19, 'Nuapada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, 1, 19, 'Puri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, 1, 19, 'Rayagada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, 1, 19, 'Sambalpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, 1, 19, 'Subarnapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, 1, 19, 'Sundergarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, 1, 20, 'Amritsar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, 1, 20, 'Barnala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, 1, 20, 'Bathinda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, 1, 20, 'Faridkot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, 1, 20, 'Fatehgarh Sahib', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, 1, 20, 'Fazilka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, 1, 20, 'Firozpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, 1, 20, 'Gurdaspur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, 1, 20, 'Hoshiarpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, 1, 20, 'Jalandhar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, 1, 20, 'Kapurthala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, 1, 20, 'Ludhiana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, 1, 20, 'Malerkotla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, 1, 20, 'Mansa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, 1, 20, 'Moga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, 1, 20, 'Mohali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, 1, 20, 'Muktsar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, 1, 20, 'Pathankot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(492, 1, 20, 'Patiala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(493, 1, 20, 'Rupnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(494, 1, 20, 'Sangrur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(495, 1, 20, 'Shaheed Bhagat Singh Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(496, 1, 20, 'Tarn Taran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(497, 1, 21, 'Ajmer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(498, 1, 21, 'Alwar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(499, 1, 21, 'Anupgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(500, 1, 21, 'Balotra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(501, 1, 21, 'Banswara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(502, 1, 21, 'Baran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(503, 1, 21, 'Barmer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(504, 1, 21, 'Beawar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(505, 1, 21, 'Bharatpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(506, 1, 21, 'Bhilwara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(507, 1, 21, 'Bikaner', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(508, 1, 21, 'Bundi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(509, 1, 21, 'Chittorgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(510, 1, 21, 'Churu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(511, 1, 21, 'Dausa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(512, 1, 21, 'Deeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(513, 1, 21, 'Dholpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(514, 1, 21, 'Didwana-Kuchaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(515, 1, 21, 'Dudu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(516, 1, 21, 'Dungarpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(517, 1, 21, 'Gangapur City', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(518, 1, 21, 'Hanumangarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(519, 1, 21, 'Jaipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(520, 1, 21, 'Jaipur Rural', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(521, 1, 21, 'Jaisalmer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(522, 1, 21, 'Jalore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(523, 1, 21, 'Jhalawar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(524, 1, 21, 'Jhunjhunu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(525, 1, 21, 'Jodhpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(526, 1, 21, 'Jodhpur Rural', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(527, 1, 21, 'Karauli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(528, 1, 21, 'Kekri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(529, 1, 21, 'Khairthal?Tijara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(530, 1, 21, 'Kota', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(531, 1, 21, 'Kotputli-Behror', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(532, 1, 21, 'Nagaur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(533, 1, 21, 'Neem ka Thana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(534, 1, 21, 'Pali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(535, 1, 21, 'Phalodi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(536, 1, 21, 'Pratapgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(537, 1, 21, 'Rajsamand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(538, 1, 21, 'Salumbar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(539, 1, 21, 'Sanchore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(540, 1, 21, 'Sawai Madhopur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(541, 1, 21, 'Shahpura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(542, 1, 21, 'Sikar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(543, 1, 21, 'Sirohi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(544, 1, 21, 'Sri Ganganagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(545, 1, 21, 'Tonk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(546, 1, 21, 'Udaipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(547, 1, 22, 'East Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(548, 1, 22, 'North Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(549, 1, 22, 'Pakyong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(550, 1, 22, 'Soreng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(551, 1, 22, 'South Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(552, 1, 22, 'West Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(553, 1, 23, 'Ariyalur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(554, 1, 23, 'Chengalpattu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(555, 1, 23, 'Chennai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(556, 1, 23, 'Coimbatore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(557, 1, 23, 'Cuddalore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(558, 1, 23, 'Dharmapuri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(559, 1, 23, 'Dindigul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(560, 1, 23, 'Erode', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(561, 1, 23, 'Kallakurichi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(562, 1, 23, 'Kanchipuram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(563, 1, 23, 'Kanyakumari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(564, 1, 23, 'Karur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(565, 1, 23, 'Krishnagiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(566, 1, 23, 'Madurai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(567, 1, 23, 'Mayiladuthurai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(568, 1, 23, 'Nagapattinam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(569, 1, 23, 'Namakkal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(570, 1, 23, 'Nilgiris', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(571, 1, 23, 'Perambalur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(572, 1, 23, 'Pudukkottai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(573, 1, 23, 'Ramanathapuram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(574, 1, 23, 'Ranipet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(575, 1, 23, 'Salem', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(576, 1, 23, 'Sivaganga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(577, 1, 23, 'Tenkasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(578, 1, 23, 'Thanjavur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(579, 1, 23, 'Theni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(580, 1, 23, 'Thoothukudi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(581, 1, 23, 'Tiruchirappalli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(582, 1, 23, 'Tirunelveli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(583, 1, 23, 'Tirupattur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(584, 1, 23, 'Tiruppur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(585, 1, 23, 'Tiruvallur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(586, 1, 23, 'Tiruvannamalai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(587, 1, 23, 'Tiruvarur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(588, 1, 23, 'Vellore', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(589, 1, 23, 'Viluppuram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(590, 1, 23, 'Virudhunagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(591, 1, 24, 'Adilabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(592, 1, 24, 'Bhadradri Kothagudem', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(593, 1, 24, 'Hyderabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(594, 1, 24, 'Jagtial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(595, 1, 24, 'Jangaon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(596, 1, 24, 'Jayashankar Bhupalpally', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(597, 1, 24, 'Jogulamba Gadwal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(598, 1, 24, 'Kamareddy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(599, 1, 24, 'Karimnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(600, 1, 24, 'Khammam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(601, 1, 24, 'Komaram Bheem', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(602, 1, 24, 'Mahabubabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(603, 1, 24, 'Mahbubnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(604, 1, 24, 'Mancherial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(605, 1, 24, 'Medak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(606, 1, 24, 'Medchal Malkajgiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(607, 1, 24, 'Mulugu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(608, 1, 24, 'Nagarkurnool', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(609, 1, 24, 'Nalgonda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(610, 1, 24, 'Narayanpet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(611, 1, 24, 'Nirmal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(612, 1, 24, 'Nizamabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(613, 1, 24, 'Peddapalli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(614, 1, 24, 'Rajanna Sircilla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(615, 1, 24, 'Ranga Reddy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(616, 1, 24, 'Sangareddy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(617, 1, 24, 'Siddipet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(618, 1, 24, 'Suryapet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(619, 1, 24, 'Vikarabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(620, 1, 24, 'Wanaparthy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(621, 1, 24, 'Warangal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(622, 1, 24, 'Hanamkonda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(623, 1, 24, 'Yadadri Bhuvanagiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(624, 1, 25, 'Dhalai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(625, 1, 25, 'Gomati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(626, 1, 25, 'Khowai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(627, 1, 25, 'North Tripura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(628, 1, 25, 'Sepahijala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(629, 1, 25, 'South Tripura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(630, 1, 25, 'Unakoti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(631, 1, 25, 'West Tripura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(632, 1, 26, 'Agra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(633, 1, 26, 'Aligarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(634, 1, 26, 'Prayagraj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(635, 1, 26, 'Ambedkar Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(636, 1, 26, 'Amethi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(637, 1, 26, 'Amroha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(638, 1, 26, 'Auraiya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(639, 1, 26, 'Azamgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(640, 1, 26, 'Baghpat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(641, 1, 26, 'Bahraich', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(642, 1, 26, 'Ballia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(643, 1, 26, 'Balrampur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(644, 1, 26, 'Banda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(645, 1, 26, 'Barabanki', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(646, 1, 26, 'Bareilly', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(647, 1, 26, 'Basti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(648, 1, 26, 'Bhadohi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(649, 1, 26, 'Bijnor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(650, 1, 26, 'Budaun', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(651, 1, 26, 'Bulandshahr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(652, 1, 26, 'Chandauli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(653, 1, 26, 'Chitrakoot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(654, 1, 26, 'Deoria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(655, 1, 26, 'Etah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(656, 1, 26, 'Etawah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(657, 1, 26, 'Ayodhya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(658, 1, 26, 'Farrukhabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(659, 1, 26, 'Fatehpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(660, 1, 26, 'Firozabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(661, 1, 26, 'Gautam Buddha Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(662, 1, 26, 'Ghaziabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(663, 1, 26, 'Ghazipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(664, 1, 26, 'Gonda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(665, 1, 26, 'Gorakhpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(666, 1, 26, 'Hamirpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(667, 1, 26, 'Hapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(668, 1, 26, 'Hardoi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(669, 1, 26, 'Hathras', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(670, 1, 26, 'Jalaun', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(671, 1, 26, 'Jaunpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(672, 1, 26, 'Jhansi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(673, 1, 26, 'Kannauj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(674, 1, 26, 'Kanpur Dehat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(675, 1, 26, 'Kanpur Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(676, 1, 26, 'Kasganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(677, 1, 26, 'Kaushambi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(678, 1, 26, 'Kheri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(679, 1, 26, 'Kushinagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(680, 1, 26, 'Lalitpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(681, 1, 26, 'Lucknow', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(682, 1, 26, 'Maharajganj', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(683, 1, 26, 'Mahoba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(684, 1, 26, 'Mainpuri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(685, 1, 26, 'Mathura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(686, 1, 26, 'Mau', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(687, 1, 26, 'Meerut', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(688, 1, 26, 'Mirzapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(689, 1, 26, 'Moradabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(690, 1, 26, 'Muzaffarnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(691, 1, 26, 'Pilibhit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(692, 1, 26, 'Pratapgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(693, 1, 26, 'Raebareli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(694, 1, 26, 'Rampur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(695, 1, 26, 'Saharanpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(696, 1, 26, 'Sambhal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(697, 1, 26, 'Sant Kabir Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(698, 1, 26, 'Shahjahanpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(699, 1, 26, 'Shamli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(700, 1, 26, 'Shravasti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(701, 1, 26, 'Siddharthnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(702, 1, 26, 'Sitapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(703, 1, 26, 'Sonbhadra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(704, 1, 26, 'Sultanpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(705, 1, 26, 'Unnao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(706, 1, 26, 'Varanasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(707, 1, 27, 'Almora', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(708, 1, 27, 'Bageshwar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(709, 1, 27, 'Chamoli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(710, 1, 27, 'Champawat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(711, 1, 27, 'Dehradun', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(712, 1, 27, 'Haridwar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tbl_districts` (`id`, `country_id`, `state_id`, `district`, `createdAt`, `updatedAt`) VALUES
(713, 1, 27, 'Nainital', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(714, 1, 27, 'Pauri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(715, 1, 27, 'Pithoragarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(716, 1, 27, 'Rudraprayag', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(717, 1, 27, 'Tehri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(718, 1, 27, 'Udham Singh Nagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(719, 1, 27, 'Uttarkashi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(720, 1, 28, 'Alipurduar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(721, 1, 28, 'Bankura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(722, 1, 28, 'Birbhum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(723, 1, 28, 'Cooch Behar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(724, 1, 28, 'Dakshin Dinajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(725, 1, 28, 'Darjeeling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(726, 1, 28, 'Hooghly', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(727, 1, 28, 'Howrah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(728, 1, 28, 'Jalpaiguri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(729, 1, 28, 'Jhargram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(730, 1, 28, 'Kalimpong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(731, 1, 28, 'Kolkata', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(732, 1, 28, 'Malda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(733, 1, 28, 'Murshidabad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(734, 1, 28, 'Nadia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(735, 1, 28, 'North 24 Parganas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(736, 1, 28, 'Paschim Bardhaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(737, 1, 28, 'Paschim Medinipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(738, 1, 28, 'Purba Bardhaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(739, 1, 28, 'Purba Medinipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(740, 1, 28, 'Purulia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(741, 1, 28, 'South 24 Parganas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(742, 1, 28, 'Uttar Dinajpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(743, 1, 29, 'Nicobar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(744, 1, 29, 'North Middle Andaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(745, 1, 29, 'South Andaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(746, 1, 30, 'Chandigarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(747, 1, 31, 'Dadra and Nagar Haveli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(748, 1, 31, 'Daman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(749, 1, 31, 'Diu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(750, 1, 32, 'Central Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(751, 1, 32, 'East Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(752, 1, 32, 'New Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(753, 1, 32, 'North Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(754, 1, 32, 'North East Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(755, 1, 32, 'North West Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(756, 1, 32, 'Shahdara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(757, 1, 32, 'South Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(758, 1, 32, 'South East Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(759, 1, 32, 'South West Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(760, 1, 32, 'West Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(761, 1, 33, 'Anantnag', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(762, 1, 33, 'Bandipora', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(763, 1, 33, 'Baramulla', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(764, 1, 33, 'Budgam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(765, 1, 33, 'Doda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(766, 1, 33, 'Ganderbal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(767, 1, 33, 'Jammu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(768, 1, 33, 'Kathua', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(769, 1, 33, 'Kishtwar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(770, 1, 33, 'Kulgam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(771, 1, 33, 'Kupwara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(772, 1, 33, 'Poonch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(773, 1, 33, 'Pulwama', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(774, 1, 33, 'Rajouri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(775, 1, 33, 'Ramban', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(776, 1, 33, 'Reasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(777, 1, 33, 'Samba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(778, 1, 33, 'Shopian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(779, 1, 33, 'Srinagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(780, 1, 33, 'Udhampur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(781, 1, 34, 'Lakshadweep', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(782, 1, 35, 'Kargil', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(783, 1, 35, 'Leh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(784, 1, 36, 'Karaikal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(785, 1, 36, 'Mahe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(786, 1, 36, 'Puducherry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(787, 1, 36, 'Yanam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(788, 1, 14, 'Mumbai', '2024-09-04 05:43:07', '2024-09-04 05:43:07'),
(789, 1, 33, 'Baramula', '2024-09-04 07:07:19', '2024-09-04 07:07:19'),
(790, 1, 1, 'NIZAMABAD', '2024-09-04 10:20:32', '2024-09-04 10:20:32'),
(791, 1, 12, 'Thrichur', '2024-09-04 11:02:34', '2024-09-04 11:02:34'),
(792, 2, 38, 'testt didt', NULL, NULL),
(793, 1, 14, 'SOLAPUR', NULL, NULL),
(794, 1, 26, 'RAMPUR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

DROP TABLE IF EXISTS `tbl_expenses`;
CREATE TABLE IF NOT EXISTS `tbl_expenses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_date` date NOT NULL DEFAULT '2024-12-15',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_expenses_type_id_foreign` (`type_id`),
  KEY `tbl_expenses_created_by_foreign` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`id`, `type_id`, `amount`, `description`, `date`, `created_date`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 2, 456.00, 'fhhfg', '2024-12-14', '2024-12-17', 122, '2024-12-16 23:37:11', '2024-12-17 02:58:13'),
(5, 1, 12.00, 'hkj', '2024-12-21', '2024-12-17', 122, '2024-12-16 23:45:34', '2024-12-17 02:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_types`
--

DROP TABLE IF EXISTS `tbl_expense_types`;
CREATE TABLE IF NOT EXISTS `tbl_expense_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_expense_types`
--

INSERT INTO `tbl_expense_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Stationary', '2024-12-20 00:01:07', '2024-12-20 00:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicies`
--

DROP TABLE IF EXISTS `tbl_healthpolicies`;
CREATE TABLE IF NOT EXISTS `tbl_healthpolicies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `policy_category_id` int NOT NULL,
  `type` tinyint NOT NULL COMMENT '1-family, 2-individual, 3-group(company), 4-topup',
  `company_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `age` int NOT NULL,
  `height` int NOT NULL,
  `weight` int NOT NULL,
  `primary_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `premium_amount` decimal(10,2) NOT NULL,
  `customer_premium_amount` float DEFAULT NULL,
  `sum_insured` decimal(10,2) NOT NULL,
  `term` enum('1year') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_id` int NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0-Not paid, 1-paid',
  `paid_amount` float DEFAULT '0',
  `due_amount` float DEFAULT '0',
  `referred_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `policy_mode` int DEFAULT NULL COMMENT '	1- New 2- Renewal',
  `prepared_user_id` int DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_healthpolicies`
--

INSERT INTO `tbl_healthpolicies` (`id`, `policy_category_id`, `type`, `company_id`, `name`, `birth_date`, `age`, `height`, `weight`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `premium_amount`, `customer_premium_amount`, `sum_insured`, `term`, `nominee_name`, `nominee_relation`, `executive_id`, `status`, `paid_amount`, `due_amount`, `referred_id`, `provider_id`, `note`, `policy_mode`, `prepared_user_id`, `prepared_date`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(23, 1, 2, NULL, 'Reshma', '1995-03-29', 29, 157, 50, NULL, NULL, '2025-01-24', '2026-01-20', 6700.00, 0, 45.00, '1year', 'aaa', 'ddd', 119, 1, 6700, 0, 1, 1, 'cccccc', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 1, '2025-02-13 10:09:19', '2025-01-02 08:38:44', '2025-02-13 04:39:19'),
(24, 1, 2, 1, 'new entry', '2019-01-01', 6, 100, 300, '8762872', '8728929892', '2025-01-16', '2026-01-16', 20000.00, 0, 1000000.00, '1year', 'aaa', 'son', 118, 0, 2000, 18000, 1, 1, 'kjnsks', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-07 10:32:00', '2025-03-01 04:36:16'),
(25, 1, 1, 1, 'Kavit k', '1994-02-01', 30, 150, 60, '87698733793', NULL, '2025-01-11', '2026-01-11', 12000.00, 0, 500000.00, '1year', NULL, NULL, 118, 0, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-10 00:44:51', '2025-01-10 00:44:51'),
(26, 1, 1, 1, 'create_user', '2015-05-04', 9, 100, 40, '77777777', '55555555', '2025-01-17', '2026-01-17', 8000.00, 0, 300000.00, '1year', 'tetsy', 'father', 119, 0, 1000, 7000, 1, 1, 'asss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-10 00:48:16', '2025-02-03 05:06:34'),
(27, 1, 1, 1, 'new ent33', '2025-01-17', 0, 100, 300, '88888999', '8766897389', '2025-01-22', '2026-01-22', 20000.00, 0, 122333.00, '1year', 'aaa', 'ddd', 119, 0, NULL, NULL, 2, 1, 'sss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-17 11:54:52', '2025-01-17 11:54:52'),
(28, 1, 1, 1, 'new entry1ww', '2018-05-07', 6, 100, 500, '88888999', '8766897389', '2025-01-30', '2026-01-30', 20000.00, 0, 223344.00, '1year', 'aaa', 'ddd', 118, 0, NULL, NULL, 2, 1, 'xxxsss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-17 12:12:55', '2025-01-17 23:25:34'),
(29, 1, 2, 1, 'new entry24', '2019-12-29', 5, 100, 300, '88888999', '8766897389', '2025-01-20', '2026-01-20', 20000.00, 0, 10000.00, '1year', 'aaa', 'ddd', 119, 1, NULL, NULL, 2, 1, 'ddddsss', NULL, 119, '2025-01-18', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-17 23:28:11', '2025-01-18 05:01:08'),
(30, 1, 2, 1, 'assddd', '2017-06-06', 7, 100, 500, '88888999', NULL, '2025-01-23', '2026-01-23', 20000.00, 0, 2334444.00, '1year', 'aaa', 'father', 119, 1, NULL, NULL, 3, 1, 'dddd', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 06:03:10', '2025-01-18 06:03:10'),
(31, 1, 2, NULL, 'create_user_1', '2023-01-02', 2, 100, 500, '0980', NULL, '2025-01-19', '2026-01-19', 20000.00, 0, 23333.00, '1year', 'tetsy', 'son', 119, 1, NULL, NULL, 1, 1, 'sddd', NULL, 118, '2025-01-18', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 06:27:28', '2025-01-18 06:27:28'),
(32, 1, 4, NULL, 'create_user_3', '2014-12-29', 10, 180, 50, '8888899978', NULL, '2025-01-20', '2026-01-20', 20000.00, 0, 2000000.00, '1year', 'aaa', 'father', 118, 0, 1500, 18500, 1, 1, 'sssssdd', 2, 118, '2025-01-18', 0, '0000-00-00 00:00:00', 1, '2025-02-28 19:58:17', '2025-01-18 06:30:46', '2025-02-28 14:28:17'),
(33, 1, 3, 1, 'create_user_4', '2021-06-07', 3, 400, 300, '0980098303', NULL, '2025-01-23', '2026-01-23', 20000.00, 0, 100000.00, '1year', 'tetsy', 'father', 118, 1, NULL, NULL, 2, 1, 'ssss', NULL, 118, '2025-01-18', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 06:37:17', '2025-01-18 06:37:17'),
(34, 1, 2, NULL, 'create_user_13', '2020-05-05', 4, 100, 300, '0980', NULL, '2025-01-30', '2026-01-30', 20000.00, 0, 2000000.00, '1year', 'aaa', 'father', 118, 1, NULL, NULL, 2, 1, 'sss', NULL, 118, '2025-01-18', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:35:49', '2025-01-18 09:35:49'),
(35, 1, 2, NULL, 'create_user_15', '2020-05-05', 4, 100, 300, '0980', NULL, '2025-01-30', '2026-01-30', 20000.00, 0, 2000000.00, '1year', 'aaa', 'father', 118, 1, NULL, NULL, 2, 1, 'sss', NULL, 118, '2025-01-18', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:36:45', '2025-01-18 09:36:45'),
(36, 1, 3, 1, 'create_user_16', '2014-06-18', 10, 100, 300, '0980', '8766897389', '2025-01-23', '2026-01-23', 10000.00, 0, 200000.00, '1year', 'aaa', 'father', 118, 0, NULL, NULL, 5, 1, 'ssddd', NULL, 119, '2025-01-31', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:37:56', '2025-01-31 09:16:41'),
(37, 1, 2, NULL, 'new entr', '2022-05-09', 2, 100, 300, '8888899990', NULL, '2025-01-22', '2026-01-22', 30000.00, 0, 500000.00, '1year', 'tetsy', 'son', 119, 1, NULL, NULL, 1, 1, NULL, NULL, 121, '2025-01-22', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-22 03:28:23', '2025-01-22 08:39:21'),
(38, 1, 3, 2, 'haris', '2019-12-29', 5, 100, 300, '8888899909', '9846759000', '2025-02-05', '2026-02-05', 13000.00, 0, 600000.00, '1year', 'aaa', NULL, 120, 0, 0, 0, 4, 2, 'ddd', NULL, 119, '2025-02-04', 1, '2025-02-04 20:34:41', NULL, NULL, '2025-02-04 15:04:41', '2025-02-04 15:04:41'),
(39, 1, 3, 2, 'new health', '2002-05-06', 22, 70, 80, '8888899909', '9846759000', '2025-02-07', '2026-02-07', 12500.00, 0, 30000.00, '1year', NULL, NULL, 119, 0, 0, 0, 1, 1, 'ddd', NULL, 119, '2025-02-08', 1, '2025-02-08 10:16:08', NULL, NULL, '2025-02-08 04:46:08', '2025-02-08 04:46:08'),
(40, 1, 3, 1, 'new entry12', '2008-05-05', 16, 100, 300, '0980849490', '9846759000', '2025-02-18', '2026-02-18', 14000.00, 0, 20000.00, '1year', NULL, NULL, 119, 0, 0, 0, 10, 1, 'ddd', NULL, 119, '2025-02-08', 1, '2025-02-08 10:29:00', NULL, NULL, '2025-02-08 04:59:00', '2025-02-08 04:59:00'),
(41, 1, 3, 1, 'create_user34', '2018-12-31', 6, 50, 40, '8888899978', '9846759000', '2025-02-27', '2026-02-27', 12500.00, 0, 40000.00, '1year', NULL, NULL, 119, 0, 0, 0, 13, 1, NULL, NULL, 118, '2025-02-08', 1, '2025-02-08 10:35:16', 1, '2025-02-08 12:02:50', '2025-02-08 05:05:16', '2025-02-08 06:32:50'),
(42, 1, 3, 1, 'create_user2344', '2018-06-05', 6, 70, 50, '8888899989', '9846759000', '2025-02-21', '2026-02-20', 12700.00, 11400, 30000.00, '1year', NULL, NULL, 119, 0, 0, 0, 3, 2, NULL, NULL, 119, '2025-02-08', 1, '2025-02-08 13:43:44', NULL, NULL, '2025-02-08 08:13:44', '2025-02-11 08:42:34'),
(43, 1, 3, 1, 'health23', '2018-06-05', 6, 70, 100, '8888899978', '9846759000', '2025-02-17', '2026-02-17', 8000.00, 0, 30000.00, '1year', NULL, NULL, 119, 0, 0, 0, 4, 1, NULL, NULL, 118, '2025-02-08', 1, '2025-02-08 14:18:56', 1, '2025-02-08 14:19:06', '2025-02-08 08:48:56', '2025-02-08 08:49:06'),
(44, 1, 2, NULL, 'test individual', '2014-06-11', 10, 100, 300, '8888899978', '9846759000', '2025-02-12', '2026-02-12', 20000.00, 12500, 100000.00, '1year', 'aaa', 'father', 119, 0, 1000, 11500, 2, 1, 'sss', NULL, 118, '2025-02-11', 1, '2025-02-11 11:27:56', 1, '2025-02-11 11:39:43', '2025-02-11 05:57:56', '2025-02-11 06:09:43'),
(45, 1, 2, NULL, 'he455', '2017-05-08', 7, 100, 100, NULL, NULL, '2025-02-19', '2026-02-19', 20000.00, 15000, 700000.00, '1year', 'aaa', 'father', 119, 0, 20000, 0, 2, 1, NULL, NULL, 119, '2025-02-12', 1, '2025-02-12 17:40:37', 1, '2025-02-12 17:41:04', '2025-02-12 12:10:37', '2025-02-12 12:11:46'),
(46, 1, 3, 2, 'Health45', '2011-06-13', 13, 100, 50, NULL, NULL, '2025-02-20', '2026-02-20', 12000.00, 11000, 400000.00, '1year', NULL, NULL, 118, 0, 0, 0, 2, 1, NULL, NULL, NULL, '2025-02-13', 1, '2025-02-13 09:51:33', NULL, NULL, '2025-02-13 04:21:33', '2025-02-13 04:21:33'),
(47, 1, 1, NULL, 'health567', '2022-07-13', 2, 40, 14, NULL, NULL, '2025-02-20', '2026-02-20', 18000.00, 17000, 400000.00, '1year', NULL, NULL, 119, NULL, 0, 0, 16, 1, NULL, NULL, 120, '2025-02-15', 1, '2025-02-15 10:59:14', 1, '2025-02-15 11:17:13', '2025-02-15 05:29:14', '2025-02-15 05:47:13'),
(48, 1, 1, NULL, 'Famil1', '2015-06-20', 9, 60, 60, NULL, NULL, '2025-02-21', '2026-02-21', 13700.00, 13400, 500000.00, '1year', NULL, NULL, 119, 0, 0, 0, 3, 1, NULL, 1, 118, '2025-02-20', 1, '2025-02-20 11:57:59', NULL, NULL, '2025-02-20 06:27:59', '2025-02-20 06:27:59'),
(49, 1, 1, NULL, 'h345', '2015-06-03', 9, 400, 500, NULL, NULL, '2025-02-28', '2026-02-28', 14000.00, 13400, 40000.00, '1year', NULL, NULL, 118, 0, 0, 0, 1, 1, NULL, 1, 118, '2025-02-28', 1, '2025-02-28 19:55:24', 1, '2025-02-28 19:55:54', '2025-02-28 14:25:24', '2025-02-28 14:25:54'),
(50, 1, 2, NULL, 'hk42672', '2019-05-06', 5, 100, 56, NULL, NULL, '2025-03-05', '2026-03-05', 13000.00, 13200, 400000.00, '1year', NULL, NULL, 119, 0, 0, 0, 3, 1, 'eee', 1, 119, '2025-02-28', 1, '2025-02-28 20:00:38', 1, '2025-02-28 20:00:53', '2025-02-28 14:30:38', '2025-02-28 14:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicymembers`
--

DROP TABLE IF EXISTS `tbl_healthpolicymembers`;
CREATE TABLE IF NOT EXISTS `tbl_healthpolicymembers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `health_id` int NOT NULL,
  `age_group` int NOT NULL COMMENT '1-adult,2-child',
  `member_name` varchar(255) NOT NULL,
  `member_age` tinyint NOT NULL,
  `member_birthdate` date NOT NULL,
  `member_height` int NOT NULL,
  `member_weight` int NOT NULL,
  `member_note` text,
  `added_by` int NOT NULL,
  `added_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_healthpolicymembers`
--

INSERT INTO `tbl_healthpolicymembers` (`id`, `health_id`, `age_group`, `member_name`, `member_age`, `member_birthdate`, `member_height`, `member_weight`, `member_note`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 25, 1, 'test1', 13, '2011-02-03', 120, 40, 'sss', 1, '2025-01-10', '2025-01-10 11:14:53', '2025-01-10 12:54:01'),
(2, 25, 2, 'test2', 2, '2020-03-04', 100, 22, 'ss', 1, '2025-01-10', '2025-01-10 11:15:57', '2025-01-10 12:49:40'),
(3, 49, 1, 'test3', 6, '2019-01-07', 140, 67, NULL, 1, '2025-02-28', '2025-02-28 19:59:25', '2025-02-28 19:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicy_docucments`
--

DROP TABLE IF EXISTS `tbl_healthpolicy_docucments`;
CREATE TABLE IF NOT EXISTS `tbl_healthpolicy_docucments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_healthpolicy_docucments`
--

INSERT INTO `tbl_healthpolicy_docucments` (`id`, `policy_id`, `title`, `description`, `link`, `added_date`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 23, 'sssssdd', 'sdd', 'ssdd', '2025-01-12', 1, '2025-01-12 13:52:54', '2025-01-12 14:09:14'),
(2, 36, 'ssss', 'sss', 'e', '2025-01-18', 1, '2025-01-18 15:08:22', '2025-01-18 15:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicy_renews`
--

DROP TABLE IF EXISTS `tbl_healthpolicy_renews`;
CREATE TABLE IF NOT EXISTS `tbl_healthpolicy_renews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_cat_id` int NOT NULL,
  `healthpolicy_id` int NOT NULL,
  `renew_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `premium_amount` float DEFAULT NULL,
  `customer_premium` float DEFAULT NULL,
  `payment_mode_id` int DEFAULT NULL,
  `added_by` int NOT NULL,
  `added_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_healthpolicy_renews`
--

INSERT INTO `tbl_healthpolicy_renews` (`id`, `policy_cat_id`, `healthpolicy_id`, `renew_date`, `expiry_date`, `premium_amount`, `customer_premium`, `payment_mode_id`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 1, 23, '2025-01-17', '2026-01-17', 78, 0, 2, 1, '2025-01-14', '2025-01-14 14:03:46', '2025-01-14 14:03:46'),
(2, 1, 23, '2025-01-17', '2026-01-17', 78, 0, 2, 1, '2025-01-14', '2025-01-14 14:04:04', '2025-01-14 14:04:04'),
(3, 1, 23, '2025-01-18', '2026-01-18', 6700, 0, 2, 1, '2025-01-14', '2025-01-14 14:07:58', '2025-01-14 14:07:58'),
(4, 1, 23, '2025-01-18', '2026-01-18', 6700, 0, 3, 1, '2025-01-14', '2025-01-14 14:10:03', '2025-01-14 14:10:03'),
(5, 1, 24, '2025-01-16', '2026-01-16', 20000, 0, 4, 1, '2025-01-14', '2025-01-14 14:11:05', '2025-01-14 14:11:05'),
(6, 1, 23, '2025-01-20', '2026-01-20', 6700, 0, 2, 1, '2025-01-14', '2025-01-14 14:46:25', '2025-01-14 14:46:25'),
(7, 1, 35, '2025-01-30', '2026-01-30', 20000, 0, 4, 1, '2025-01-18', '2025-01-18 15:06:45', '2025-01-18 15:06:45'),
(8, 1, 36, '2025-01-23', '2026-01-23', 10000, 0, 1, 1, '2025-01-18', '2025-01-18 15:07:56', '2025-01-18 15:07:56'),
(9, 1, 37, '2025-01-22', '2026-01-22', 30000, 0, 1, 1, '2025-01-22', '2025-01-22 08:58:23', '2025-01-22 08:58:23'),
(10, 1, 38, '2025-02-05', '2026-02-05', 13000, 0, 3, 1, '2025-02-04', '2025-02-04 20:34:41', '2025-02-04 20:34:41'),
(11, 1, 39, '2025-02-07', '2026-02-07', 12500, 0, 4, 1, '2025-02-08', '2025-02-08 10:16:08', '2025-02-08 10:16:08'),
(12, 1, 40, '2025-02-18', '2026-02-18', 14000, 0, 3, 1, '2025-02-08', '2025-02-08 10:29:00', '2025-02-08 10:29:00'),
(13, 1, 41, '2025-02-27', '2026-02-27', 12500, 0, 3, 1, '2025-02-08', '2025-02-08 10:35:16', '2025-02-08 10:35:16'),
(14, 1, 42, '2025-02-18', '2026-02-18', 12700, 0, 3, 1, '2025-02-08', '2025-02-08 13:43:44', '2025-02-08 13:43:44'),
(15, 1, 43, '2025-02-17', '2026-02-17', 8000, 0, 4, 1, '2025-02-08', '2025-02-08 14:18:56', '2025-02-08 14:18:56'),
(16, 1, 44, '2025-02-12', '2026-02-12', 20000, 0, 5, 1, '2025-02-11', '2025-02-11 11:27:56', '2025-02-11 11:27:56'),
(17, 1, 23, '2025-01-20', '2026-01-20', 6700, 5400, 2, 1, '2025-02-11', '2025-02-11 14:09:55', '2025-02-11 14:09:55'),
(18, 1, 23, '2025-01-24', '2026-01-20', 6700, 5400, 2, 1, '2025-02-11', '2025-02-11 14:10:56', '2025-02-11 14:10:56'),
(19, 1, 42, '2025-02-21', '2026-02-20', 12700, 11400, 4, 1, '2025-02-11', '2025-02-11 14:12:34', '2025-02-11 14:12:34'),
(20, 1, 45, '2025-02-19', '2026-02-19', 20000, 15000, 5, 1, '2025-02-12', '2025-02-12 17:40:37', '2025-02-12 17:40:37'),
(21, 1, 46, '2025-02-20', '2026-02-20', 12000, 11000, NULL, 1, '2025-02-13', '2025-02-13 09:51:33', '2025-02-13 09:51:33'),
(22, 1, 47, '2025-02-20', '2026-02-20', 18000, NULL, 5, 1, '2025-02-15', '2025-02-15 10:59:14', '2025-02-15 10:59:14'),
(23, 1, 48, '2025-02-21', '2026-02-21', 13700, 13400, 6, 1, '2025-02-20', '2025-02-20 11:57:59', '2025-02-20 11:57:59'),
(24, 1, 49, '2025-02-28', '2026-02-28', 14000, 13400, 3, 1, '2025-02-28', '2025-02-28 19:55:24', '2025-02-28 19:55:24'),
(25, 1, 50, '2025-03-05', '2026-03-05', 13000, 13200, 2, 1, '2025-02-28', '2025-02-28 20:00:38', '2025-02-28 20:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurence_providers`
--

DROP TABLE IF EXISTS `tbl_insurence_providers`;
CREATE TABLE IF NOT EXISTS `tbl_insurence_providers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_amount` float DEFAULT '0',
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_insurence_providers_created_by_foreign` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_insurence_providers`
--

INSERT INTO `tbl_insurence_providers` (`id`, `provider_name`, `card_name`, `address`, `company_name`, `current_amount`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'Start Health', 'start health card', 'Vattiyorkavu,kollam', 'Start Health Inusrence Limited', 0, 1, '2024-12-20', '2024-12-19 23:58:48', '2025-03-15 09:18:11'),
(2, 'United', 'United Card', 'new entry', 'United India', 20000, 1, '2025-01-25', '2025-01-25 10:35:19', '2025-03-15 09:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE IF NOT EXISTS `tbl_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `hsn_code_id` int DEFAULT NULL,
  `type` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1: Service, 2: Parts',
  `unit_id` int NOT NULL,
  `manufacturer_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `item_name`, `item_code`, `category_id`, `subcategory_id`, `hsn_code_id`, `type`, `unit_id`, `manufacturer_id`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'new name', 'newmaBskA', 3, 2, 3, '0', 6, NULL, 124, '2025-03-10 10:26:01', 124, '2025-03-10 10:26:28', '2025-03-10 04:56:01', '2025-03-10 04:56:28'),
(2, 'test', 'iuh678', 4, 1, 1, '1', 2, NULL, 1, '2025-03-10 17:21:06', 1, '2025-03-10 17:21:19', '2025-03-10 11:51:06', '2025-03-10 11:51:19'),
(3, 'test', 'iuh6784', 4, 1, 1, '1', 2, NULL, 1, '2025-03-10 17:37:59', NULL, NULL, '2025-03-10 12:07:59', '2025-03-10 12:07:59'),
(4, 'ac2', 'iuh6784', 4, 1, 1, '1', 3, NULL, 1, '2025-03-10 17:41:50', 1, '2025-03-10 17:54:18', '2025-03-10 12:11:50', '2025-03-10 12:24:18'),
(5, 'ss', 'iuh6784', 4, 1, 1, '1', 2, 1, 1, '2025-03-10 20:17:10', 1, '2025-03-18 12:11:13', '2025-03-10 14:47:10', '2025-03-18 06:41:13'),
(6, 'ac2', 'ddddd', 4, 1, NULL, '1', 2, NULL, 1, '2025-03-18 13:21:18', NULL, NULL, '2025-03-18 07:51:18', '2025-03-18 07:51:18'),
(7, 'ac2', 'ddddd', 4, 1, NULL, '1', 2, NULL, 1, '2025-03-18 13:21:50', NULL, NULL, '2025-03-18 07:51:50', '2025-03-18 07:51:50'),
(8, 'ac2', 'ddddd', 4, 1, 1, '1', 2, 1, 1, '2025-03-18 13:22:06', 1, '2025-03-18 13:23:14', '2025-03-18 07:52:06', '2025-03-18 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_batches`
--

DROP TABLE IF EXISTS `tbl_jw_batches`;
CREATE TABLE IF NOT EXISTS `tbl_jw_batches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_batches`
--

INSERT INTO `tbl_jw_batches` (`id`, `item_id`, `batch`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'batch7', 'Ashna', '2025-02-19 09:45:52', 'Ashna', '2025-02-19 09:47:35', '2025-02-19 04:15:52', '2025-02-19 04:17:35'),
(3, 1, 'batch1', 'Ashna', '2025-02-20 09:39:15', NULL, NULL, '2025-02-20 04:09:15', '2025-02-20 04:09:15'),
(4, 3, 'batch2', '122', '2025-02-24 05:10:42', NULL, NULL, '2025-02-23 23:40:42', '2025-02-23 23:40:42'),
(7, 8, 'batch7', '122', '2025-02-24 10:10:26', NULL, NULL, '2025-02-24 04:40:26', '2025-02-24 04:40:26'),
(8, 9, 'batch1', '122', '2025-02-25 03:55:04', NULL, NULL, '2025-02-24 22:25:04', '2025-02-24 22:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_careof_persons`
--

DROP TABLE IF EXISTS `tbl_jw_careof_persons`;
CREATE TABLE IF NOT EXISTS `tbl_jw_careof_persons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `careof_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_careof_persons`
--

INSERT INTO `tbl_jw_careof_persons` (`id`, `careof_person`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(7, 'new one', 124, '2025-03-18 10:23:34', 1, '2025-03-19 06:08:53', '2025-03-18 04:53:34', '2025-03-19 00:38:53'),
(8, 'dfds', 124, '2025-03-18 10:33:45', 1, '2025-03-19 06:08:48', '2025-03-18 05:03:45', '2025-03-19 00:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_categories`
--

DROP TABLE IF EXISTS `tbl_jw_categories`;
CREATE TABLE IF NOT EXISTS `tbl_jw_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_categories`
--

INSERT INTO `tbl_jw_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'abcdff', '2025-01-14 01:33:56', '2025-01-26 23:57:35'),
(4, 'Category2', '2025-01-26 23:57:55', '2025-01-26 23:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_daypayments`
--

DROP TABLE IF EXISTS `tbl_jw_daypayments`;
CREATE TABLE IF NOT EXISTS `tbl_jw_daypayments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `daywork_trans_id` int NOT NULL,
  `paid_amount` float NOT NULL,
  `balance_amount` float NOT NULL,
  `payment_mode_id` int NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_daypayments`
--

INSERT INTO `tbl_jw_daypayments` (`id`, `daywork_trans_id`, `paid_amount`, `balance_amount`, `payment_mode_id`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 5, 1000, 19000, 1, 1, '2025-03-20 23:28:28', NULL, NULL, '2025-03-20 23:28:28', '2025-03-20 23:28:28'),
(2, 5, 1000, 19900, 3, 1, '2025-03-20 23:29:22', NULL, NULL, '2025-03-20 23:29:22', '2025-03-20 23:29:22'),
(3, 5, 100, 19900, 2, 1, '2025-03-20 23:30:55', NULL, NULL, '2025-03-20 23:30:55', '2025-03-20 23:30:55'),
(4, 6, 500, 500, 6, 1, '2025-03-21 10:23:54', NULL, NULL, '2025-03-21 10:23:54', '2025-03-21 10:23:54'),
(5, 7, 300, 200, 3, 1, '2025-03-21 10:24:39', NULL, NULL, '2025-03-21 10:24:39', '2025-03-21 10:24:39'),
(6, 7, 100, 100, 2, 1, '2025-03-21 10:26:03', NULL, NULL, '2025-03-21 10:26:03', '2025-03-21 10:26:03'),
(7, 7, 100, 0, 5, 1, '2025-03-21 10:34:28', NULL, NULL, '2025-03-21 10:34:28', '2025-03-21 10:34:28'),
(8, 6, 100, 400, 3, 1, '2025-03-21 10:35:29', NULL, NULL, '2025-03-21 10:35:29', '2025-03-21 10:35:29'),
(9, 6, 100, 300, 1, 1, '2025-03-21 10:35:48', NULL, NULL, '2025-03-21 10:35:48', '2025-03-21 10:35:48'),
(10, 6, 100, 100, 2, 1, '2025-03-21 10:36:57', NULL, NULL, '2025-03-21 10:36:57', '2025-03-21 10:36:57'),
(11, 8, 1000, 2000, 1, 1, '2025-03-21 10:38:25', NULL, NULL, '2025-03-21 10:38:25', '2025-03-21 10:38:25'),
(12, 8, 1000, 1000, 2, 1, '2025-03-21 10:38:49', NULL, NULL, '2025-03-21 10:38:49', '2025-03-21 10:38:49'),
(13, 8, 1000, 0, 2, 1, '2025-03-21 10:39:38', NULL, NULL, '2025-03-21 10:39:38', '2025-03-21 10:39:38'),
(14, 9, 1000, 1000, 3, 1, '2025-03-21 10:52:06', NULL, NULL, '2025-03-21 10:52:06', '2025-03-21 10:52:06'),
(15, 9, 500, 500, 1, 1, '2025-03-21 10:53:02', NULL, NULL, '2025-03-21 10:53:02', '2025-03-21 10:53:02'),
(16, 9, 500, 0, 2, 1, '2025-03-21 10:53:19', NULL, NULL, '2025-03-21 10:53:19', '2025-03-21 10:53:19'),
(17, 10, 1000, 3000, 2, 1, '2025-03-21 10:54:55', NULL, NULL, '2025-03-21 10:54:55', '2025-03-21 10:54:55'),
(18, 10, 1000, 2000, 1, 1, '2025-03-21 10:55:22', NULL, NULL, '2025-03-21 10:55:22', '2025-03-21 10:55:22'),
(19, 10, 1000, 1000, 1, 1, '2025-03-21 11:01:28', NULL, NULL, '2025-03-21 11:01:28', '2025-03-21 11:01:28'),
(20, 10, 1000, 0, 3, 1, '2025-03-21 11:01:46', NULL, NULL, '2025-03-21 11:01:46', '2025-03-21 11:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_dayworks`
--

DROP TABLE IF EXISTS `tbl_jw_dayworks`;
CREATE TABLE IF NOT EXISTS `tbl_jw_dayworks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `phone_number` varchar(100) CHARACTER SET utf8mb4  DEFAULT NULL,
  `vehicle_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `vehicle_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_dayworks`
--

INSERT INTO `tbl_jw_dayworks` (`id`, `date`, `name`, `phone_number`, `vehicle_name`, `vehicle_number`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, '2025-03-20', 'Day wok1', '9879880909', 'zantro', 'kl17S7177', 1, '2025-03-20 14:07:31', NULL, NULL, '2025-03-20 14:07:31', '2025-03-20 14:07:31'),
(2, '2025-03-19', 'create_user', '9879880909', 'zantro', 'kl17S7177', 1, '2025-03-20 14:12:52', NULL, NULL, '2025-03-20 14:12:52', '2025-03-20 14:12:52'),
(3, '2025-03-18', 'staff1', '9879880909', 'zantro', 'kl457p7879', 1, '2025-03-20 14:15:16', NULL, NULL, '2025-03-20 14:15:16', '2025-03-20 14:15:16'),
(4, '2025-03-21', 'New Test', '9879880909', 'zantro', 'kl17S7177', 1, '2025-03-21 10:23:54', NULL, NULL, '2025-03-21 10:23:54', '2025-03-21 10:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_daywork_trans`
--

DROP TABLE IF EXISTS `tbl_jw_daywork_trans`;
CREATE TABLE IF NOT EXISTS `tbl_jw_daywork_trans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day_work_id` int NOT NULL,
  `type` int NOT NULL COMMENT '1-service,2-accessories',
  `particular` text NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `balance_pay` float NOT NULL,
  `payment_mode_id` int NOT NULL,
  `payment_status` int DEFAULT NULL COMMENT '0-Not Paid,1-Partial Paid,2-Full Paid',
  `care_of_person_id` int NOT NULL,
  `executive_id` int NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_daywork_trans`
--

INSERT INTO `tbl_jw_daywork_trans` (`id`, `day_work_id`, `type`, `particular`, `quantity`, `price`, `total_amount`, `paid_amount`, `balance_pay`, `payment_mode_id`, `payment_status`, `care_of_person_id`, `executive_id`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'tebsnjskjd', 1, 1200, 1200, 1000, 200, 1, NULL, 7, 118, 1, '2025-03-20 14:07:31', NULL, NULL, '2025-03-20 14:07:31', '2025-03-20 14:07:31'),
(2, 2, 2, 'asdddd', 2, 1200, 2400, 1000, 1400, 2, NULL, 8, 119, 1, '2025-03-20 14:12:52', NULL, NULL, '2025-03-20 14:12:52', '2025-03-20 14:12:52'),
(3, 3, 2, 'ssss', 2, 1300, 2600, 1000, 1345, 9, NULL, 8, 118, 1, '2025-03-20 14:15:16', NULL, NULL, '2025-03-20 14:15:16', '2025-03-20 14:15:16'),
(4, 3, 1, 'dsf', 1, 1300, 1300, 1000, 300, 2, NULL, 8, 118, 1, '2025-03-20 19:26:40', NULL, NULL, '2025-03-20 19:26:40', '2025-03-20 19:26:40'),
(5, 3, 2, 'sss', 1, 1000, 1000, 1000, 0, 3, NULL, 7, 119, 1, '2025-03-20 19:27:39', NULL, NULL, '2025-03-20 19:27:39', '2025-03-20 19:27:39'),
(6, 4, 2, 'dcccc', 1, 1000, 1000, 1000, 0, 6, NULL, 7, 120, 1, '2025-03-21 10:23:54', NULL, NULL, '2025-03-21 10:23:54', '2025-03-21 10:36:57'),
(7, 4, 2, 'asdd', 1, 500, 500, 600, -100, 3, NULL, 7, 118, 1, '2025-03-21 10:24:39', NULL, NULL, '2025-03-21 10:24:39', '2025-03-21 10:34:28'),
(8, 4, 1, 'dfgf', 3, 1000, 3000, 4000, -1000, 1, NULL, 7, 118, 1, '2025-03-21 10:38:25', NULL, NULL, '2025-03-21 10:38:25', '2025-03-21 10:39:38'),
(9, 4, 2, 'asdd', 1, 2000, 2000, 2500, -500, 3, NULL, 7, 119, 1, '2025-03-21 10:52:06', NULL, NULL, '2025-03-21 10:52:06', '2025-03-21 10:53:19'),
(10, 4, 1, 'aesddsad', 2, 2000, 4000, 4000, 0, 2, NULL, 7, 118, 1, '2025-03-21 10:54:55', NULL, NULL, '2025-03-21 10:54:55', '2025-03-21 11:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_hsncodes`
--

DROP TABLE IF EXISTS `tbl_jw_hsncodes`;
CREATE TABLE IF NOT EXISTS `tbl_jw_hsncodes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hsncode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsnvalue` decimal(10,2) NOT NULL,
  `cgst_perc` decimal(10,2) NOT NULL,
  `sgst_perc` decimal(10,2) NOT NULL,
  `igst_perc` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_hsncodes`
--

INSERT INTO `tbl_jw_hsncodes` (`id`, `hsncode`, `hsnvalue`, `cgst_perc`, `sgst_perc`, `igst_perc`, `created_at`, `updated_at`) VALUES
(1, 'code224', 5.00, 2.50, 2.50, 5.00, '2025-02-19 00:19:29', '2025-02-19 00:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_livestocks`
--

DROP TABLE IF EXISTS `tbl_jw_livestocks`;
CREATE TABLE IF NOT EXISTS `tbl_jw_livestocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `manufacturer_id` int DEFAULT NULL,
  `pur_rate` float NOT NULL,
  `sale_rate` float NOT NULL,
  `mrp` float NOT NULL,
  `qty` bigint NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_livestocks`
--

INSERT INTO `tbl_jw_livestocks` (`id`, `item_id`, `batch_id`, `manufacturer_id`, `pur_rate`, `sale_rate`, `mrp`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, 300, 330, 310, 13, '2025-02-25 23:13:35', '2025-03-24 11:01:45'),
(2, 9, 8, NULL, 200, 220, 210, 0, '2025-02-25 23:13:35', '2025-02-27 19:53:00'),
(4, 3, 1, NULL, 200, 250, 230, 8, '2025-02-25 23:23:09', '2025-02-27 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_openingstocks`
--

DROP TABLE IF EXISTS `tbl_jw_openingstocks`;
CREATE TABLE IF NOT EXISTS `tbl_jw_openingstocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `pur_rate` float NOT NULL,
  `sale_rate` float NOT NULL,
  `mrp` float NOT NULL,
  `qty` bigint NOT NULL,
  `stocktype_id` int NOT NULL,
  `createdby` int NOT NULL,
  `createddate` datetime NOT NULL,
  `editedby` int DEFAULT NULL,
  `editeddate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_openingstocks`
--

INSERT INTO `tbl_jw_openingstocks` (`id`, `item_id`, `batch_id`, `pur_rate`, `sale_rate`, `mrp`, `qty`, `stocktype_id`, `createdby`, `createddate`, `editedby`, `editeddate`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 200, 220, 190, 5, 1, 1, '2025-02-26 17:50:29', NULL, NULL, '2025-02-26 17:50:29', '2025-02-26 17:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchases`
--

DROP TABLE IF EXISTS `tbl_jw_purchases`;
CREATE TABLE IF NOT EXISTS `tbl_jw_purchases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_num` varchar(100) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier_id` int NOT NULL,
  `total_taxable_amount` float NOT NULL,
  `total_tax` float NOT NULL,
  `total_qty` float NOT NULL,
  `grand_total` float NOT NULL,
  `createdby` int NOT NULL,
  `createddate` datetime NOT NULL,
  `editedby` int DEFAULT NULL,
  `editeddate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_purchases`
--

INSERT INTO `tbl_jw_purchases` (`id`, `invoice_num`, `purchase_date`, `supplier_id`, `total_taxable_amount`, `total_tax`, `total_qty`, `grand_total`, `createdby`, `createddate`, `editedby`, `editeddate`, `created_at`, `updated_at`) VALUES
(1, '123/345', '2025-02-26', 3, 200, 0, 2, 200, 1, '2025-02-25 21:54:04', NULL, NULL, '2025-02-25 21:54:04', '2025-02-25 21:54:04'),
(2, '123/345', '2025-02-26', 3, 200, 0, 2, 200, 1, '2025-02-25 21:54:52', NULL, NULL, '2025-02-25 21:54:52', '2025-02-25 21:54:52'),
(3, '123/346', '2025-02-26', 3, 4600, 0, 12, 4600, 1, '2025-02-25 21:55:54', NULL, NULL, '2025-02-25 21:55:54', '2025-02-25 21:55:54'),
(4, '123/347', '2025-02-25', 3, 1300, 0, 5, 1300, 1, '2025-02-25 23:13:35', NULL, NULL, '2025-02-25 23:13:35', '2025-02-25 23:13:35'),
(5, '123/348', '2025-02-25', 3, 400, 0, 2, 400, 1, '2025-02-25 23:14:32', NULL, NULL, '2025-02-25 23:14:32', '2025-02-25 23:14:32'),
(6, '123/349', '2025-02-27', 3, 23340, 0, 10, 23340, 1, '2025-02-25 23:15:48', NULL, NULL, '2025-02-25 23:15:48', '2025-02-25 23:15:48'),
(7, '123/350', '2025-02-26', 3, 2000, 0, 10, 2000, 1, '2025-02-25 23:16:32', NULL, NULL, '2025-02-25 23:16:32', '2025-02-25 23:16:32'),
(8, '123/351', '2025-02-27', 3, 3300, 0, 11, 3300, 1, '2025-02-25 23:17:49', NULL, NULL, '2025-02-25 23:17:49', '2025-02-25 23:17:49'),
(9, '123/352', '2025-02-27', 3, 3300, 0, 11, 3300, 1, '2025-02-25 23:20:47', NULL, NULL, '2025-02-25 23:20:47', '2025-02-25 23:20:47'),
(10, '123/353', '2025-02-27', 3, 3300, 0, 11, 3300, 1, '2025-02-25 23:21:09', NULL, NULL, '2025-02-25 23:21:09', '2025-02-25 23:21:09'),
(11, '123/354', '2025-02-27', 3, 3300, 0, 11, 3300, 1, '2025-02-25 23:21:25', NULL, NULL, '2025-02-25 23:21:25', '2025-02-25 23:21:25'),
(12, '123/355', '2025-02-27', 3, 2000, 0, 10, 2000, 1, '2025-02-25 23:23:09', NULL, NULL, '2025-02-25 23:23:09', '2025-02-25 23:23:09'),
(13, '123/356', '2025-02-26', 3, 400, 0, 2, 400, 1, '2025-02-25 23:23:53', NULL, NULL, '2025-02-25 23:23:53', '2025-02-25 23:23:53'),
(14, '123/357', '2025-02-26', 3, 2400, 0, 8, 2400, 1, '2025-02-25 23:24:35', NULL, NULL, '2025-02-25 23:24:35', '2025-02-25 23:24:35'),
(15, '123/3445', '2025-03-24', 3, 4000, 0, 2, 4000, 1, '2025-03-24 11:01:45', NULL, NULL, '2025-03-24 11:01:45', '2025-03-24 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchasetypes`
--

DROP TABLE IF EXISTS `tbl_jw_purchasetypes`;
CREATE TABLE IF NOT EXISTS `tbl_jw_purchasetypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_jw_purchasetypes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_purchasetypes`
--

INSERT INTO `tbl_jw_purchasetypes` (`id`, `name`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'type1', 'Ashna', '2025-02-19 18:11:32', 'Admin', '2025-02-22 17:14:44', '2025-02-19 12:41:32', '2025-02-22 11:44:44'),
(4, 'PUR678', 'Admin', '2025-02-22 17:15:00', NULL, NULL, '2025-02-22 11:45:00', '2025-02-22 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchase_trans`
--

DROP TABLE IF EXISTS `tbl_jw_purchase_trans`;
CREATE TABLE IF NOT EXISTS `tbl_jw_purchase_trans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purchase_id` int NOT NULL,
  `item_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `qty` int NOT NULL,
  `unit_id` int NOT NULL,
  `pur_rate` float NOT NULL,
  `sale_rate` float NOT NULL,
  `mrp` float NOT NULL,
  `subtotal` float NOT NULL,
  `purchase_type_id` int NOT NULL,
  `createdby` int NOT NULL,
  `createddate` datetime NOT NULL,
  `editedby` int DEFAULT NULL,
  `editeddate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_purchase_trans`
--

INSERT INTO `tbl_jw_purchase_trans` (`id`, `purchase_id`, `item_id`, `batch_id`, `qty`, `unit_id`, `pur_rate`, `sale_rate`, `mrp`, `subtotal`, `purchase_type_id`, `createdby`, `createddate`, `editedby`, `editeddate`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 2, 2, 100, 100, 100, 200, 1, 1, '2025-02-25 21:54:52', NULL, NULL, '2025-02-25 21:54:52', '2025-02-25 21:54:52'),
(2, 3, 1, 3, 2, 2, 300, 340, 450, 600, 1, 1, '2025-02-25 21:55:54', NULL, NULL, '2025-02-25 21:55:54', '2025-02-25 21:55:54'),
(3, 3, 8, 7, 10, 2, 400, 446, 456, 4000, 1, 1, '2025-02-25 21:55:54', NULL, NULL, '2025-02-25 21:55:54', '2025-02-25 21:55:54'),
(4, 4, 1, 3, 3, 3, 300, 330, 310, 900, 1, 1, '2025-02-25 23:13:35', NULL, NULL, '2025-02-25 23:13:35', '2025-02-25 23:13:35'),
(5, 4, 9, 8, 2, 2, 200, 220, 210, 400, 1, 1, '2025-02-25 23:13:35', NULL, NULL, '2025-02-25 23:13:35', '2025-02-25 23:13:35'),
(6, 5, 1, 3, 2, 2, 200, 240, 225, 400, 1, 1, '2025-02-25 23:14:32', NULL, NULL, '2025-02-25 23:14:32', '2025-02-25 23:14:32'),
(7, 6, 1, 3, 10, 3, 2334, 2400, 2415, 23340, 1, 1, '2025-02-25 23:15:48', NULL, NULL, '2025-02-25 23:15:48', '2025-02-25 23:15:48'),
(8, 7, 1, 3, 10, 2, 200, 230, 210, 2000, 1, 1, '2025-02-25 23:16:32', NULL, NULL, '2025-02-25 23:16:32', '2025-02-25 23:16:32'),
(9, 8, 1, 3, 11, 2, 300, 330, 312, 3300, 1, 1, '2025-02-25 23:17:49', NULL, NULL, '2025-02-25 23:17:49', '2025-02-25 23:17:49'),
(10, 9, 1, 3, 11, 2, 300, 330, 312, 3300, 1, 1, '2025-02-25 23:20:47', NULL, NULL, '2025-02-25 23:20:47', '2025-02-25 23:20:47'),
(11, 10, 1, 3, 11, 2, 300, 330, 312, 3300, 1, 1, '2025-02-25 23:21:09', NULL, NULL, '2025-02-25 23:21:09', '2025-02-25 23:21:09'),
(12, 11, 1, 3, 11, 2, 300, 330, 312, 3300, 1, 1, '2025-02-25 23:21:25', NULL, NULL, '2025-02-25 23:21:25', '2025-02-25 23:21:25'),
(13, 12, 3, 1, 10, 3, 200, 250, 230, 2000, 1, 1, '2025-02-25 23:23:09', NULL, NULL, '2025-02-25 23:23:09', '2025-02-25 23:23:09'),
(14, 13, 1, 3, 2, 2, 200, 190, 180, 400, 1, 1, '2025-02-25 23:23:53', NULL, NULL, '2025-02-25 23:23:53', '2025-02-25 23:23:53'),
(15, 14, 1, 3, 8, 2, 300, 290, 280, 2400, 1, 1, '2025-02-25 23:24:35', NULL, NULL, '2025-02-25 23:24:35', '2025-02-25 23:24:35'),
(16, 15, 1, 3, 2, 2, 2000, 1900, 1800, 4000, 1, 1, '2025-03-24 11:01:45', NULL, NULL, '2025-03-24 11:01:45', '2025-03-24 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_sales`
--

DROP TABLE IF EXISTS `tbl_jw_sales`;
CREATE TABLE IF NOT EXISTS `tbl_jw_sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_invoice_num` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `client_id` int NOT NULL,
  `gst_type` int NOT NULL COMMENT '1-inside kerala , 2-other',
  `sale_type_id` int NOT NULL,
  `sale_date` date NOT NULL,
  `total_taxable_amount` float NOT NULL,
  `total_qty` int NOT NULL,
  `total_cgst` float DEFAULT NULL,
  `total_sgst` float DEFAULT NULL,
  `total_igst` float DEFAULT NULL,
  `grand_total` float NOT NULL,
  `createdby` int NOT NULL,
  `createddate` datetime NOT NULL,
  `editedby` int DEFAULT NULL,
  `editeddate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_sales`
--

INSERT INTO `tbl_jw_sales` (`id`, `sale_invoice_num`, `client_id`, `gst_type`, `sale_type_id`, `sale_date`, `total_taxable_amount`, `total_qty`, `total_cgst`, `total_sgst`, `total_igst`, `grand_total`, `createdby`, `createddate`, `editedby`, `editeddate`, `created_at`, `updated_at`) VALUES
(1, 'jw1', 2, 1, 3, '2025-03-07', 940, 4, 23.5, 23.5, 0, 987, 1, '2025-02-27 19:51:12', NULL, NULL, '2025-02-27 19:51:12', '2025-02-27 19:51:12'),
(2, 'jw2', 2, 1, 3, '2025-03-07', 940, 4, 23.5, 23.5, 0, 987, 1, '2025-02-27 19:51:49', NULL, NULL, '2025-02-27 19:51:49', '2025-02-27 19:51:49'),
(3, 'jw3', 2, 1, 3, '2025-03-07', 940, 4, 23.5, 23.5, 0, 987, 1, '2025-02-27 19:53:00', NULL, NULL, '2025-02-27 19:53:00', '2025-02-27 19:53:00'),
(4, 'jw4', 2, 1, 1, '2025-02-27', 330, 1, 8.25, 8.25, 0, 346.5, 1, '2025-02-27 22:02:22', NULL, NULL, '2025-02-27 22:02:22', '2025-02-27 22:02:22'),
(5, 'jw5', 2, 1, 3, '2025-02-27', 330, 1, 8.25, 8.25, 0, 346.5, 1, '2025-02-27 22:04:13', NULL, NULL, '2025-02-27 22:04:13', '2025-02-27 22:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_saletypes`
--

DROP TABLE IF EXISTS `tbl_jw_saletypes`;
CREATE TABLE IF NOT EXISTS `tbl_jw_saletypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_jw_saletypes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_saletypes`
--

INSERT INTO `tbl_jw_saletypes` (`id`, `name`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'sale', 'Ashna', '2025-02-19 11:36:23', 'Admin', '2025-02-22 17:05:24', '2025-02-19 06:06:23', '2025-02-22 11:35:24'),
(3, 'sale1', 'Admin', '2025-02-22 17:05:31', NULL, NULL, '2025-02-22 11:35:31', '2025-02-22 11:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_sale_trans`
--

DROP TABLE IF EXISTS `tbl_jw_sale_trans`;
CREATE TABLE IF NOT EXISTS `tbl_jw_sale_trans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_id` tinyint NOT NULL,
  `item_id` tinyint NOT NULL,
  `batch_id` tinyint NOT NULL,
  `unit_id` tinyint NOT NULL,
  `hsn_id` tinyint NOT NULL,
  `sale_rate` float NOT NULL,
  `qty` bigint NOT NULL,
  `discount` float DEFAULT NULL,
  `sub_taxable_amount` float NOT NULL,
  `cgst` float DEFAULT NULL,
  `sgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `subtotal_amount` float NOT NULL,
  `createdby` int NOT NULL,
  `createddate` datetime NOT NULL,
  `editedby` int DEFAULT NULL,
  `editeddate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jw_sale_trans`
--

INSERT INTO `tbl_jw_sale_trans` (`id`, `sale_id`, `item_id`, `batch_id`, `unit_id`, `hsn_id`, `sale_rate`, `qty`, `discount`, `sub_taxable_amount`, `cgst`, `sgst`, `igst`, `subtotal_amount`, `createdby`, `createddate`, `editedby`, `editeddate`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 3, 1, 250, 2, NULL, 500, 12.5, 12.5, 0, 525, 1, '2025-02-27 19:53:00', NULL, NULL, '2025-02-27 19:53:00', '2025-02-27 19:53:00'),
(2, 3, 9, 8, 2, 1, 220, 2, NULL, 440, 11, 11, 0, 462, 1, '2025-02-27 19:53:00', NULL, NULL, '2025-02-27 19:53:00', '2025-02-27 19:53:00'),
(3, 4, 1, 3, 2, 1, 330, 1, NULL, 330, 8.25, 8.25, 0, 346.5, 1, '2025-02-27 22:02:22', NULL, NULL, '2025-02-27 22:02:22', '2025-02-27 22:02:22'),
(4, 5, 1, 3, 3, 1, 330, 1, NULL, 330, 8.25, 8.25, 0, 346.5, 1, '2025-02-27 22:04:13', NULL, NULL, '2025-02-27 22:04:13', '2025-02-27 22:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_servicecodes`
--

DROP TABLE IF EXISTS `tbl_jw_servicecodes`;
CREATE TABLE IF NOT EXISTS `tbl_jw_servicecodes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_id` int NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_servicecodes`
--

INSERT INTO `tbl_jw_servicecodes` (`id`, `service_code`, `service_name`, `hsn_id`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'code123', 'name', 3, 'Ashna', '2025-02-20 05:58:31', NULL, NULL, '2025-02-20 00:28:31', '2025-02-20 00:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_stocktypes`
--

DROP TABLE IF EXISTS `tbl_jw_stocktypes`;
CREATE TABLE IF NOT EXISTS `tbl_jw_stocktypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `stock_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_jw_stocktypes_stock_type_unique` (`stock_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_stocktypes`
--

INSERT INTO `tbl_jw_stocktypes` (`id`, `stock_type`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'cvc', 'Ashna', '2025-02-19 07:24:52', 'Admin', '2025-02-22 17:17:41', '2025-02-19 01:54:52', '2025-02-22 11:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_subcategories`
--

DROP TABLE IF EXISTS `tbl_jw_subcategories`;
CREATE TABLE IF NOT EXISTS `tbl_jw_subcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_subcategories`
--

INSERT INTO `tbl_jw_subcategories` (`id`, `cat_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 4, 'category2', '2025-01-14 03:16:48', '2025-01-26 23:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_units`
--

DROP TABLE IF EXISTS `tbl_jw_units`;
CREATE TABLE IF NOT EXISTS `tbl_jw_units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_units`
--

INSERT INTO `tbl_jw_units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(2, 'Number', '2025-01-14 10:11:13', '2025-01-27 00:00:14'),
(3, 'Kg', '2025-01-27 00:00:23', '2025-01-27 00:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

DROP TABLE IF EXISTS `tbl_leads`;
CREATE TABLE IF NOT EXISTS `tbl_leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `IDV_value` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `ncb` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `lead_status` int DEFAULT NULL COMMENT '1-started,2-Inprogress,3-Not Need,4-Converted',
  `added_by` int NOT NULL,
  `created_date` date NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` date DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lead_added_user` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`id`, `customer_name`, `mobile_number`, `vehicle_number`, `vehicle_model`, `IDV_value`, `ncb`, `year`, `lead_status`, `added_by`, `created_date`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(39, 'new entry', '9867239849', 'kl457p78798', 'ss', '233', '444', '2025', 2, 1, '2025-01-14', 1, '2025-01-14', NULL, NULL),
(40, 'new entry', '9867239849', NULL, NULL, '233', '444', '2025', 1, 1, '2025-01-22', 1, '2025-01-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadsources`
--

DROP TABLE IF EXISTS `tbl_leadsources`;
CREATE TABLE IF NOT EXISTS `tbl_leadsources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `leadsource` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leadsources`
--

INSERT INTO `tbl_leadsources` (`id`, `leadsource`, `createdAt`, `updatedAt`) VALUES
(1, 'Instagram', '2024-08-14 11:42:16', '2024-08-14 11:42:16'),
(2, 'Direct ', '2024-08-16 06:54:37', '2024-08-16 06:54:37'),
(3, 'Agent ', '2024-08-16 06:54:55', '2024-08-16 06:54:55'),
(4, 'Reference ', '2024-08-16 06:56:08', '2024-08-16 06:56:08'),
(5, 'FB add lead', '2024-09-27 09:35:54', '2024-09-27 09:35:54'),
(6, 'Naukri', '2024-09-27 09:36:21', '2024-09-27 09:36:21'),
(7, 'Client Ref:', '2024-09-27 09:37:09', '2024-09-27 09:37:09'),
(8, 'Candidate\'s Ref:', '2024-09-27 09:38:50', '2024-09-27 09:38:50'),
(9, 'News', NULL, NULL),
(10, 'Internet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead_followups`
--

DROP TABLE IF EXISTS `tbl_lead_followups`;
CREATE TABLE IF NOT EXISTS `tbl_lead_followups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lead_id` int NOT NULL,
  `call_description` text,
  `next_followup_date` date NOT NULL,
  `status` int DEFAULT NULL COMMENT '1-started,2-Inprogress,3-Not Need,4-Converted',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_followup_lead` (`lead_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lead_followups`
--

INSERT INTO `tbl_lead_followups` (`id`, `lead_id`, `call_description`, `next_followup_date`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'EXPERIENCE IN CNC MILLING MACHINE OPERATOR', '2024-10-11', 1, '2024-09-06 06:55:52', '2024-09-06 06:55:52'),
(2, 2, 'Interested but non muslim candidate  for mbm qatar so holding the cv.', '0000-00-00', 3, '2024-09-06 07:01:41', '2024-09-06 07:01:41'),
(3, 3, 'EXPERIENCE IN CNC MILLING MACHINE OPERATOR', '2024-10-17', 1, '2024-09-06 07:03:55', '2024-09-06 07:03:55'),
(4, 4, 'EXPERIENCE IN CNC MILLING MACHINE OPERATOR', '0000-00-00', 1, '2024-09-06 07:09:56', '2024-09-06 07:09:56'),
(5, 5, 'INTERESTED', '0000-00-00', 4, '2024-09-06 07:15:02', '2024-09-06 07:15:02'),
(6, 6, 'INTERESTED', '0000-00-00', 3, '2024-09-06 07:20:12', '2024-09-06 07:20:12'),
(7, 7, 'INTERESTED', '0000-00-00', 3, '2024-09-06 07:21:58', '2024-09-06 07:21:58'),
(8, 8, 'Non muslim candidate so holding the cv', '0000-00-00', 3, '2024-09-06 07:22:09', '2024-09-06 07:22:09'),
(9, 9, 'INTERESTED', '0000-00-00', 3, '2024-09-06 07:23:38', '2024-09-06 07:23:38'),
(10, 10, 'INTERESTED \nDOB: 1978', '0000-00-00', 3, '2024-09-06 07:39:19', '2024-09-06 07:39:19'),
(11, 11, 'Interested but holding the cv because non muslim candidate', '0000-00-00', 3, '2024-09-11 05:35:49', '2024-09-11 05:35:49'),
(12, 12, 'Interested but holding the cv because non muslim candidate', '0000-00-00', 3, '2024-09-11 05:45:13', '2024-09-11 05:45:13'),
(13, 13, 'Interested but holding the cv because non muslim candidate', '0000-00-00', 3, '2024-09-11 06:02:47', '2024-09-11 06:02:47'),
(14, 14, 'EXPECTING 6500AED', '0000-00-00', 3, '2024-09-11 07:01:21', '2024-09-11 07:01:21'),
(15, 15, 'INTERESTED', '0000-00-00', 3, '2024-09-11 07:03:58', '2024-09-11 07:03:58'),
(16, 16, 'INTERESTED', '0000-00-00', 3, '2024-09-11 07:22:14', '2024-09-11 07:22:14'),
(17, 17, 'Interested but holding the cv because non muslim candidate', '0000-00-00', 3, '2024-09-11 07:25:20', '2024-09-11 07:25:20'),
(18, 18, 'INTERESTED', '0000-00-00', 3, '2024-09-11 07:26:21', '2024-09-11 07:26:21'),
(19, 19, 'CV SENT BY AFTER COMPLETION OF DIRECT INTERVIEW', '0000-00-00', 1, '2024-09-11 07:29:17', '2024-09-11 07:29:17'),
(20, 20, 'cv on hold non muslim candidate interested', '0000-00-00', 3, '2024-09-11 08:23:18', '2024-09-11 08:23:18'),
(21, 21, 'Experienced candidates , not ok with salary and non muslim candidates', '0000-00-00', 1, '2024-09-11 08:25:03', '2024-09-11 08:25:03'),
(22, 22, 'non muslim', '0000-00-00', 1, '2024-09-11 08:34:06', '2024-09-11 08:34:06'),
(23, 23, 'Interested', '0000-00-00', 3, '2024-09-11 08:34:34', '2024-09-11 08:34:34'),
(24, 24, 'INTERESTED', '0000-00-00', 3, '2024-09-11 08:35:55', '2024-09-11 08:35:55'),
(25, 25, 'non muslim candidates', '0000-00-00', 1, '2024-09-11 08:39:23', '2024-09-11 08:39:23'),
(26, 26, 'INTERESTED', '0000-00-00', 3, '2024-09-11 08:40:08', '2024-09-11 08:40:08'),
(27, 27, 'non muslim', '0000-00-00', 1, '2024-09-11 08:43:18', '2024-09-11 08:43:18'),
(28, 28, 'interested', '0000-00-00', 3, '2024-09-11 08:44:29', '2024-09-11 08:44:29'),
(29, 29, 'exp in hr associate', '0000-00-00', 3, '2024-09-11 08:48:18', '2024-09-11 08:48:18'),
(30, 30, 'interested', '0000-00-00', 3, '2024-09-11 08:50:45', '2024-09-11 08:50:45'),
(31, 31, 'INTERESTED. DOB: 13/05/1984', '0000-00-00', 3, '2024-09-11 08:53:32', '2024-09-11 08:53:32'),
(32, 32, 'non muslim', '0000-00-00', 1, '2024-09-11 08:54:42', '2024-09-11 08:54:42'),
(33, 33, 'Interested', '0000-00-00', 3, '2024-09-11 08:57:33', '2024-09-11 08:57:33'),
(34, 34, 'non muslim', '0000-00-00', 1, '2024-09-11 08:58:21', '2024-09-11 08:58:21'),
(35, 35, 'INTERESTED', '0000-00-00', 3, '2024-09-11 08:58:36', '2024-09-11 08:58:36'),
(36, 36, 'interested', '0000-00-00', 3, '2024-09-11 09:03:27', '2024-09-11 09:03:27'),
(37, 37, 'interested', '0000-00-00', 3, '2024-09-11 09:29:25', '2024-09-11 09:29:25'),
(38, 38, 'hgjk', '2024-11-02', 1, NULL, NULL),
(39, 3, 'ssss', '2024-10-18', 2, NULL, NULL),
(40, 39, 'dddd', '2025-01-15', 1, NULL, NULL),
(41, 39, 'ssss', '2025-01-16', 2, NULL, NULL),
(42, 40, 'nnn', '2025-01-22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

DROP TABLE IF EXISTS `tbl_loans`;
CREATE TABLE IF NOT EXISTS `tbl_loans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int NOT NULL,
  `loan_type_id` int NOT NULL,
  `bank` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `vehicle_cat_id` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-pending , 1-approved',
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Reason for pending status',
  `approved_date` date DEFAULT NULL COMMENT 'Date of approval',
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '2025-01-03',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_loans_created_by_foreign` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_loans`
--

INSERT INTO `tbl_loans` (`id`, `customer_name`, `phone_number`, `loan_type_id`, `bank`, `loan_amount`, `vehicle_cat_id`, `status`, `reason`, `approved_date`, `remarks`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'A', 6, 2, 'r', 5.00, 2, 1, NULL, '2025-01-25', 'b', 121, '2025-01-03', '2025-01-03 05:00:01', '2025-01-03 06:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loantypes`
--

DROP TABLE IF EXISTS `tbl_loantypes`;
CREATE TABLE IF NOT EXISTS `tbl_loantypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `loan_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_loantypes`
--

INSERT INTO `tbl_loantypes` (`id`, `loan_type`, `created_at`, `updated_at`) VALUES
(1, 'abc', NULL, NULL),
(2, 'bbb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturers`
--

DROP TABLE IF EXISTS `tbl_manufacturers`;
CREATE TABLE IF NOT EXISTS `tbl_manufacturers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacturer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacturers`
--

INSERT INTO `tbl_manufacturers` (`id`, `manufacturer`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'Manufacturer', 1, '2025-03-18 10:54:29', NULL, NULL, '2025-03-18 05:24:29', '2025-03-18 05:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_expenses`
--

DROP TABLE IF EXISTS `tbl_multi_expenses`;
CREATE TABLE IF NOT EXISTS `tbl_multi_expenses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `business_catogory_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_multi_expenses`
--

INSERT INTO `tbl_multi_expenses` (`id`, `type_id`, `amount`, `description`, `date`, `business_catogory_id`, `branch_id`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 2, 35.00, 'descriotion', '2025-03-12', 3, 3, 9, '2025-03-10 01:59:36', 9, '2025-03-10 02:02:35', '2025-03-09 20:29:36', '2025-03-09 20:32:35'),
(3, 1, 2000.00, 'ssddddd', '2025-03-12', 1, 1, 1, '2025-03-11 08:53:05', NULL, NULL, '2025-03-11 03:23:05', '2025-03-11 03:23:05'),
(4, 1, 2000.00, 'ssddddd', '2025-03-12', 1, 2, 1, '2025-03-11 08:56:47', NULL, NULL, '2025-03-11 03:26:47', '2025-03-11 03:26:47'),
(5, 1, 2000.00, 'ssddddd', '2025-03-12', 1, 2, 1, '2025-03-11 08:56:53', NULL, NULL, '2025-03-11 03:26:53', '2025-03-11 03:26:53'),
(6, 1, 2000.00, 'ssddddd', '2025-03-12', 1, 2, 1, '2025-03-11 08:57:40', 1, '2025-03-11 09:09:34', '2025-03-11 03:27:40', '2025-03-11 03:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otherpolicy_documents`
--

DROP TABLE IF EXISTS `tbl_otherpolicy_documents`;
CREATE TABLE IF NOT EXISTS `tbl_otherpolicy_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_by` int DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otherpolicy_documents`
--

INSERT INTO `tbl_otherpolicy_documents` (`id`, `policy_id`, `title`, `description`, `link`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'sss', 'ssssdd', 'ss', 1, '2025-01-12', '2025-01-12 15:35:38', '2025-01-12 15:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_policies`
--

DROP TABLE IF EXISTS `tbl_other_policies`;
CREATE TABLE IF NOT EXISTS `tbl_other_policies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `policy_category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `premium_amount` decimal(10,2) NOT NULL,
  `customer_premium_amount` float DEFAULT NULL,
  `sum_insured` decimal(10,2) NOT NULL,
  `term` enum('1year') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executive_id` int NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0-Not paid, 1-paid',
  `paid_amount` float NOT NULL DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `referred_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `policy_mode` int DEFAULT NULL,
  `prepared_user_id` int DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_other_policies`
--

INSERT INTO `tbl_other_policies` (`id`, `policy_category_id`, `name`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `premium_amount`, `customer_premium_amount`, `sum_insured`, `term`, `executive_id`, `status`, `paid_amount`, `due_amount`, `referred_id`, `provider_id`, `note`, `policy_mode`, `prepared_user_id`, `prepared_date`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 8, 'aaa', '1209000090', '1209009009', '2025-01-18', '2026-01-18', 1200.00, 700, 12.00, '1year', 118, 0, 500, 700, 1, 1, 'aaaaaa', NULL, 119, '2025-01-18', 0, '0000-00-00 00:00:00', 1, '2025-02-12 10:34:36', '2025-01-02 01:50:17', '2025-03-01 04:37:01'),
(3, 2, 'new entry', '0980', NULL, '2025-03-28', '2026-03-28', 20000.00, 0, 223444.00, '1year', 118, 1, 0, 0, 1, 1, 'ssss', NULL, 119, '2025-01-31', 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-10 08:45:01', '2025-01-31 09:12:21'),
(4, 5, 'test eraction', '098002029', '8766897389', '2025-01-17', '2026-01-17', 10000.00, 0, 8292.00, '1year', 118, 0, 1000, 9000, 3, 1, 'sss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:46:33', '2025-02-03 06:26:26'),
(5, 5, 'test eraction', '098002029', '8766897389', '2025-01-17', '2026-01-17', 10000.00, 0, 8292.00, '1year', 118, 0, 100, 9900, 3, 1, 'sss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:47:17', '2025-02-03 09:04:49'),
(6, 6, 'staff1', '098009900', '8766897389', '2025-01-20', '2026-01-20', 10000.00, 0, 999.00, '1year', 118, 0, 0, 0, 1, 1, 'assss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-18 09:56:34', '2025-01-18 09:56:34'),
(7, 3, 'new entry', '8888899990', '8766897389', '2025-01-21', '2026-01-21', 10000.00, 0, 6789909.00, '1year', 118, 0, 10000, 0, 1, 1, 'assss', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, NULL, '2025-01-22 03:15:21', '2025-02-03 08:39:27'),
(8, 3, 'new entrycontr', '8888899989', '9846759000', '2025-02-19', '2026-02-19', 12500.00, 0, 30000.00, '1year', 119, 0, 0, 0, 15, 1, NULL, NULL, NULL, NULL, 1, '2025-02-08 10:42:18', 1, '2025-02-08 10:45:55', '2025-02-08 05:12:18', '2025-02-08 05:15:55'),
(9, 4, 'new entryper', '8888899980', '7656778676', '2025-02-21', '2026-02-21', 12500.00, 11400, 33445.00, '1year', 120, 0, 2000, 9400, 13, 2, NULL, NULL, NULL, NULL, 1, '2025-02-08 10:46:31', 1, '2025-02-11 11:47:56', '2025-02-08 05:16:31', '2025-02-11 06:18:20'),
(10, 4, 'create_user', '8888899978', '7656778676', '2025-02-20', '2026-02-20', 30000.00, 20000, 400000.00, '1year', 118, 0, 0, 0, 2, 1, 'sss', NULL, NULL, NULL, 1, '2025-02-11 11:52:26', NULL, NULL, '2025-02-11 06:22:26', '2025-02-11 06:22:26'),
(11, 3, 'create_user788', NULL, NULL, '2025-02-15', '2026-02-15', 20000.00, 15000, 900000.00, '1year', 120, 0, 0, 0, 11, 1, 'kjnsks', 1, 119, NULL, 1, '2025-02-12 14:33:59', 1, '2025-03-06 22:43:53', '2025-02-12 09:03:59', '2025-03-06 17:13:53'),
(12, 4, 'PA22', NULL, NULL, '2025-02-21', '2026-02-21', 12400.00, 15000, 400000.00, '1year', 119, 0, 0, 0, 18, 2, NULL, NULL, 118, NULL, 1, '2025-02-15 11:12:28', 1, '2025-02-15 11:16:30', '2025-02-15 05:42:28', '2025-02-15 05:46:30'),
(13, 2, 'fir23', NULL, NULL, '2025-02-21', '2026-02-21', 12500.00, NULL, 300000.00, '1year', 119, 0, 0, 0, 1, 2, 'assss', 1, 119, NULL, 1, '2025-02-20 13:04:26', 1, '2025-02-20 13:23:33', '2025-02-20 07:34:26', '2025-02-20 07:53:33'),
(14, 4, 'oth344', NULL, NULL, '2025-02-22', '2026-02-22', 14000.00, 15000, 40000.00, '1year', 119, 0, 0, 0, 1, 2, 'aaaaaa', 1, 118, NULL, 1, '2025-02-28 20:16:10', 1, '2025-03-06 22:44:25', '2025-02-28 14:46:10', '2025-03-06 17:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_policy_renews`
--

DROP TABLE IF EXISTS `tbl_other_policy_renews`;
CREATE TABLE IF NOT EXISTS `tbl_other_policy_renews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_cat_id` int NOT NULL,
  `other_policy_id` int NOT NULL,
  `premium_amount` float DEFAULT NULL,
  `customer_premium` float DEFAULT NULL,
  `renew_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `payment_mode_id` int DEFAULT NULL,
  `added_by` int NOT NULL,
  `added_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_other_policy_renews`
--

INSERT INTO `tbl_other_policy_renews` (`id`, `policy_cat_id`, `other_policy_id`, `premium_amount`, `customer_premium`, `renew_date`, `expiry_date`, `payment_mode_id`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1200, 0, '2025-01-16', '2026-01-16', 3, 1, '2025-01-14', '2025-01-14 15:22:07', '2025-01-14 15:22:07'),
(2, 8, 1, 1200, 0, '2025-01-17', '2026-01-17', 2, 1, '2025-01-14', '2025-01-14 15:25:41', '2025-01-14 15:25:41'),
(3, 2, 3, 20000, 0, '2025-03-28', '2026-03-28', 3, 1, '2025-01-18', '2025-01-18 14:58:13', '2025-01-18 14:58:13'),
(4, 5, 5, 10000, 0, '2025-01-17', '2026-01-17', 2, 1, '2025-01-18', '2025-01-18 15:17:17', '2025-01-18 15:17:17'),
(5, 6, 6, 10000, 0, '2025-01-20', '2026-01-20', 1, 1, '2025-01-18', '2025-01-18 15:26:34', '2025-01-18 15:26:34'),
(6, 3, 7, 10000, 0, '2025-01-21', '2026-01-21', 1, 1, '2025-01-22', '2025-01-22 08:45:21', '2025-01-22 08:45:21'),
(7, 3, 8, 12500, 0, '2025-02-19', '2026-02-19', 4, 1, '2025-02-08', '2025-02-08 10:42:18', '2025-02-08 10:42:18'),
(8, 4, 9, 12500, 0, '2025-02-21', '2026-02-21', 5, 1, '2025-02-08', '2025-02-08 10:46:31', '2025-02-08 10:46:31'),
(9, 4, 10, 30000, 0, '2025-02-20', '2026-02-20', 5, 1, '2025-02-11', '2025-02-11 11:52:26', '2025-02-11 11:52:26'),
(10, 8, 1, 1200, 700, '2025-01-18', '2026-01-18', 2, 1, '2025-02-11', '2025-02-11 14:31:01', '2025-02-11 14:31:01'),
(11, 4, 12, 12400, NULL, '2025-02-21', '2026-02-21', 5, 1, '2025-02-15', '2025-02-15 11:12:28', '2025-02-15 11:12:28'),
(12, 2, 13, 12500, NULL, '2025-02-21', '2026-02-21', 7, 1, '2025-02-20', '2025-02-20 13:04:26', '2025-02-20 13:04:26'),
(13, 4, 14, 14000, 15000, '2025-02-22', '2026-02-22', 7, 1, '2025-02-28', '2025-02-28 20:16:10', '2025-02-28 20:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_cat_id` int DEFAULT NULL,
  `policy_id` int NOT NULL,
  `payment_mode_id` int NOT NULL,
  `paid_amount` float NOT NULL,
  `remarks` text,
  `added_date` date NOT NULL,
  `added_by` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_mode` (`payment_mode_id`),
  KEY `fk_payment_added_user` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `policy_cat_id`, `policy_id`, `payment_mode_id`, `paid_amount`, `remarks`, `added_date`, `added_by`, `createdAt`, `updatedAt`) VALUES
(1, 0, 1, 2, 1000, NULL, '2024-11-22', 1, NULL, NULL),
(2, 0, 4, 1, 100, NULL, '2024-11-29', 1, NULL, NULL),
(3, 0, 4, 2, 1000, NULL, '2024-11-29', 1, NULL, NULL),
(4, 0, 4, 2, 900, NULL, '2024-11-29', 1, NULL, NULL),
(5, 0, 4, 2, 100, NULL, '2024-11-29', 1, NULL, NULL),
(6, 0, 4, 3, 300, NULL, '2024-11-29', 1, NULL, NULL),
(7, 0, 1, 2, 1000, NULL, '2024-12-27', 1, NULL, NULL),
(8, 0, 1, 3, 1000, 'ss', '2024-12-27', 1, NULL, NULL),
(11, 1, 25, 1, 1000, 'ssss', '2025-01-10', 1, NULL, NULL),
(12, 1, 24, 2, 100, 'aaa', '2025-01-11', 1, NULL, NULL),
(13, 9, 2, 2, 900, NULL, '2025-01-11', 1, NULL, NULL),
(14, 1, 37, 1, 1000, 'ssdd', '2025-01-22', 1, NULL, NULL),
(15, NULL, 1, 1, 100, 'xdxx', '2025-02-02', 1, NULL, NULL),
(16, NULL, 1, 1, 1000, 'fgnfg', '2025-02-02', 1, NULL, NULL),
(19, 0, 1, 2, 100, 'ddd', '2025-02-02', 1, NULL, NULL),
(20, 9, 1, 2, 1000, 'sssdd', '2025-02-02', 1, NULL, NULL),
(21, 9, 1, 2, 1000, 'ddd', '2025-02-02', 1, NULL, NULL),
(22, 9, 1, 2, 1000, 'uuggiug', '2025-02-02', 1, NULL, NULL),
(23, 9, 1, 3, 1000, NULL, '2025-02-02', 1, NULL, NULL),
(24, 9, 1, 4, 1000, NULL, '2025-02-02', 1, NULL, NULL),
(25, 9, 1, 2, 25000, 'full', '2025-02-02', 1, NULL, NULL),
(26, 1, 29, 2, 1000, NULL, '2025-02-02', 1, NULL, NULL),
(27, 1, 23, 2, 2000, 'cvv', '2025-02-03', 1, NULL, NULL),
(28, 1, 23, 3, 2000, 'xxcc', '2025-02-03', 1, NULL, NULL),
(29, 1, 23, 2, 1000, 'zxxxx', '2025-02-03', 1, NULL, NULL),
(30, 1, 26, 3, 1000, 'ghhg', '2025-02-03', 1, NULL, NULL),
(31, 8, 1, 3, 100, 'fggfg', '2025-02-03', 1, NULL, NULL),
(32, 8, 1, 2, 100, NULL, '2025-02-03', 1, NULL, NULL),
(33, 5, 4, 2, 1000, NULL, '2025-02-03', 1, NULL, NULL),
(34, 9, 2, 2, 1000, NULL, '2025-02-03', 1, NULL, NULL),
(35, 9, 2, 2, 1000, NULL, '2025-02-03', 1, NULL, NULL),
(36, 3, 7, 3, 1000, NULL, '2025-02-03', 1, NULL, NULL),
(37, 3, 7, 2, 9000, NULL, '2025-02-03', 1, NULL, NULL),
(38, 5, 5, 2, 100, NULL, '2025-02-03', 1, NULL, NULL),
(39, 1, 23, 2, 1700, NULL, '2025-02-03', 1, NULL, NULL),
(40, 9, 2, 1, 1000, 'ssdd', '2025-02-07', 1, NULL, NULL),
(41, 1, 24, 2, 1000, 'sddff', '2025-02-07', 1, NULL, NULL),
(42, 8, 1, 2, 100, NULL, '2025-02-07', 1, NULL, NULL),
(43, 9, 2, 2, 1000, NULL, '2025-02-08', 1, NULL, NULL),
(44, 9, 17, 2, 1000, 'sss', '2025-02-08', 1, NULL, NULL),
(45, 1, 32, 2, 1500, 'sss', '2025-02-08', 1, NULL, NULL),
(46, 4, 9, 3, 1000, 'sdd', '2025-02-08', 1, NULL, NULL),
(47, 1, 41, 1, 1000, 'xxx', '2025-02-08', 1, NULL, NULL),
(48, 1, 40, 1, 1000, 'xxxx', '2025-02-08', 1, NULL, NULL),
(49, 9, 10, 1, 1000, 'test', '2025-02-11', 1, NULL, NULL),
(50, 9, 10, 3, 1000, 'ddd', '2025-02-11', 1, NULL, NULL),
(51, 9, 10, 4, 1000, 'sss', '2025-02-11', 1, NULL, NULL),
(52, 1, 44, 2, 1000, 'ssss', '2025-02-11', 1, NULL, NULL),
(53, 4, 9, 2, 1000, 'ss', '2025-02-11', 1, NULL, NULL),
(54, 9, 10, 1, 100, 'dfg', '2025-02-12', 1, NULL, NULL),
(55, 9, 10, 2, 100, NULL, '2025-02-12', 1, NULL, NULL),
(56, 9, 2, 2, 200, 'dddd', '2025-02-12', 1, NULL, NULL),
(57, 9, 3, 1, 19000, 'sss', '2025-02-12', 1, NULL, NULL),
(58, 9, 3, 2, 999, 'sss', '2025-02-12', 1, NULL, NULL),
(59, 9, 3, 1, 0.5, NULL, '2025-02-12', 1, NULL, NULL),
(60, 9, 11, 2, 20000, NULL, '2025-02-12', 1, NULL, NULL),
(61, 8, 1, 1, 100, NULL, '2025-02-12', 1, NULL, NULL),
(62, 9, 20, 1, 1000, NULL, '2025-02-12', 1, NULL, NULL),
(63, 9, 20, 2, 6499, NULL, '2025-02-12', 1, NULL, NULL),
(64, 9, 20, 1, 1, NULL, '2025-02-12', 1, NULL, NULL),
(65, 9, 20, 1, 1, NULL, '2025-02-12', 1, NULL, NULL),
(66, 9, 17, 1, 1000, NULL, '2025-02-12', 1, NULL, NULL),
(67, 9, 17, 2, 1000, NULL, '2025-02-12', 1, NULL, NULL),
(68, 9, 19, 1, 19999, NULL, '2025-02-12', 1, NULL, NULL),
(69, 9, 19, 2, 1, NULL, '2025-02-12', 1, NULL, NULL),
(70, 1, 45, 1, 15000, NULL, '2025-02-12', 1, NULL, NULL),
(71, 1, 45, 3, 4999, NULL, '2025-02-12', 1, NULL, NULL),
(72, 1, 45, 4, 1, NULL, '2025-02-12', 1, NULL, NULL),
(73, 9, 21, 1, 1000, 'first', '2025-02-13', 1, NULL, NULL),
(74, 9, 21, 3, 11400, NULL, '2025-02-13', 1, NULL, NULL),
(75, 9, 25, 3, 14000, 'ssddd', '2025-03-01', 1, NULL, NULL),
(76, 9, 25, 3, 1000, NULL, '2025-03-01', 1, NULL, NULL),
(77, 9, 25, 1, 1000, NULL, '2025-03-01', 1, NULL, NULL),
(78, 1, 24, 1, 900, NULL, '2025-03-01', 1, NULL, NULL),
(79, 8, 1, 2, 100, NULL, '2025-03-01', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_modes`
--

DROP TABLE IF EXISTS `tbl_payment_modes`;
CREATE TABLE IF NOT EXISTS `tbl_payment_modes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_mode` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_modes`
--

INSERT INTO `tbl_payment_modes` (`id`, `payment_mode`, `createdAt`, `updatedAt`) VALUES
(1, 'Cash', NULL, NULL),
(2, 'gpay', NULL, NULL),
(3, 'Payment Link', NULL, NULL),
(4, 'Cheque', NULL, NULL),
(5, 'Emi', NULL, NULL),
(6, 'CD Direct', NULL, NULL),
(7, 'Credit', NULL, NULL),
(8, 'Discount', NULL, NULL),
(9, 'Card', NULL, NULL),
(10, 'Round Off', NULL, NULL),
(11, 'Valuation Amount', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policyholders`
--

DROP TABLE IF EXISTS `tbl_policyholders`;
CREATE TABLE IF NOT EXISTS `tbl_policyholders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agent_id` int DEFAULT NULL,
  `dealer_id` int DEFAULT NULL,
  `policy_type` int NOT NULL COMMENT '1-individual,2-agent,3- Dealer',
  `name` varchar(255) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `primary_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `secondary_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `vehicle_model_id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `premium_amount` float NOT NULL,
  `customer_premium_amount` float DEFAULT NULL,
  `valuation_amount` float DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `sum_insured` float DEFAULT NULL,
  `executive_id` int DEFAULT NULL,
  `prepared_user_id` int DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `coverage_type_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `paid_amount` float NOT NULL DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `payment_mode_id` int DEFAULT NULL,
  `referred_id` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `assigned_userid` int DEFAULT NULL,
  `assigned_date` date DEFAULT NULL,
  `buying_type` int DEFAULT NULL COMMENT '1-Direct, 2-Broker',
  `broker_name` varchar(255) DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `note` text,
  `policy_mode` int DEFAULT NULL COMMENT '1- New 2- Renewal',
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_excecutive_user` (`executive_id`),
  KEY `fk_policy_agent` (`agent_id`),
  KEY `fk_policy_dealer` (`dealer_id`),
  KEY `fk_policy_company` (`company_id`),
  KEY `fk_policy_paymentmode` (`payment_mode_id`),
  KEY `fk_policy_assigned_user` (`assigned_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_policyholders`
--

INSERT INTO `tbl_policyholders` (`id`, `agent_id`, `dealer_id`, `policy_type`, `name`, `vehicle_number`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `vehicle_model_id`, `company_id`, `premium_amount`, `customer_premium_amount`, `valuation_amount`, `total_cost`, `sum_insured`, `executive_id`, `prepared_user_id`, `prepared_date`, `coverage_type_id`, `status`, `paid_amount`, `due_amount`, `payment_mode_id`, `referred_id`, `created_date`, `created_by`, `assigned_userid`, `assigned_date`, `buying_type`, `broker_name`, `provider_id`, `note`, `policy_mode`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(1, NULL, NULL, 1, 'new entry6782929', 'kl457p7879566', '5435645465', '7656778676', '2025-02-04', '2026-02-04', 1, 1, 30000, 0, 4000, 34000, 200000, 1, 119, '2025-01-18', NULL, 0, 0, 0, 2, 1, '2024-11-16 00:00:00', NULL, 119, '2024-11-23', 1, NULL, 1, NULL, NULL, 1, '2025-02-03 16:11:11', NULL, NULL),
(2, 2, NULL, 2, 'test', 'kl457p78798', '222333', '3444444', '0000-00-00', '2024-11-16', 1, 1, 20000, 0, 10000, NULL, NULL, 1, 119, '2025-01-18', NULL, 0, 5900, 14100, 2, 0, '2024-11-16 00:00:00', NULL, 119, '2024-11-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 1, 3, 'new entry', 'kl457p78798', '222333', '3444444', '0000-00-00', '2024-11-16', 1, 1, 20000, 0, 10000, NULL, NULL, 1, NULL, NULL, NULL, 0, 20000, 0, 2, 0, '2024-11-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, 2, 'new1', 'kl457p78798', '0980', '3444444', '0000-00-00', '2024-11-22', 1, 1, 20000, 0, 10000, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 1, 0, '2024-11-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, 1, 'new entry2', 'kl457p785467', '88888999', '3444444', '0000-00-00', '2024-11-30', 1, 1, 10000, 0, 10300, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 3, 1, '2024-11-29 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 1, 'Test 2', 'kl17S7177', '8768763337', '8762', '0000-00-00', '2024-12-21', 1, 1, 20000, 0, 1223, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 4, 2, '2024-12-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 1, 'new entryre', 'kl457p785467', '098033333', NULL, '0000-00-00', '2024-12-20', 2, 1, 10000, 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2024-12-19 00:00:00', NULL, NULL, NULL, 2, 'ssdd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 1, 'new rett', 'kl457p78798', '0980', NULL, '0000-00-00', '2024-12-28', 2, 1, 20000, 0, 12340, 32340, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2024-12-20 00:00:00', NULL, NULL, NULL, 2, 'tests', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, 4, 'new entry23', 'kl457p78798', '0980', NULL, '0000-00-00', '2024-12-21', 1, 1, 20000, 0, 10000, 30000, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 3, 1, '2024-12-20 00:00:00', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 1, 'test new 1', 'kl17S71775', NULL, NULL, '2025-02-05', '2026-02-05', 14, 1, 20000, 15000, 0, 20000, 200000, 1, NULL, NULL, NULL, 0, 3200, 16800, 1, 1, '2024-12-27 00:00:00', NULL, 118, '2024-12-27', 1, NULL, 1, 'note', 1, 1, '2025-02-20 10:01:19', NULL, NULL),
(11, NULL, NULL, 1, 'new entryss', 'kl17S7177', '88888999', NULL, '2025-01-16', '2026-01-16', 1, NULL, 20000, 0, 10000, 30000, NULL, 1, NULL, NULL, NULL, 0, 0, 20000, 2, 1, '2025-01-09 00:00:00', NULL, 118, '2025-01-09', 1, NULL, 1, 'ssss', NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, 2, 'vyshak', 'kl17S7177', '88888999', '8766897389', '2025-01-14', '2026-01-14', 3, NULL, 10000, 0, 2000, 12000, 2000000, 118, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2025-01-13 00:00:00', NULL, 118, '2025-01-13', 1, NULL, 1, 'ssss', NULL, NULL, NULL, NULL, NULL),
(15, 1, NULL, 2, 'vyshak1', 'kl17S7177', '88888999', '8766897389', '2025-01-14', '2026-01-14', 3, NULL, 10000, 0, 20000, 30000, 2000000, 118, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2025-01-13 00:00:00', NULL, 118, '2025-01-13', 1, NULL, 1, 'ssss', NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, 1, 'test entry 35', 'kl17S717747', '9999999909', NULL, '2025-02-04', '2026-02-04', 4, NULL, 12500, 0, 40000, 52500, 300000, 118, 118, '2025-01-31', NULL, 0, 0, 0, 2, 3, '2025-01-31 08:49:47', NULL, 118, '2025-01-31', 2, 'broker', 2, 'note', NULL, 1, '2025-01-31 14:29:50', NULL, NULL),
(17, 3, NULL, 2, 'Adarsh', 'kl457p78745', '8888899978', NULL, '2025-02-04', '2026-02-04', 3, NULL, 15000, 11500, 0, 15000, 300000, 119, NULL, '2025-02-03', NULL, 0, 4000, 11000, 4, 2, '2025-02-03 16:13:41', 1, 119, '2025-02-03', 1, NULL, 1, 'ddff', NULL, 1, '2025-02-03 16:14:34', NULL, NULL),
(18, NULL, NULL, 1, 'new entry01', 'kl17S717745', '8888899978', '7656778676', '2025-02-21', '2026-02-21', 4, NULL, 12500, 15000, 0, 12500, 200000, 119, 118, '2025-02-12', NULL, 0, 0, 0, 2, 3, '2025-02-12 10:24:58', 1, 119, '2025-02-12', 1, NULL, 1, 'sss', NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, 1, 'new entry04', 'kl457p7878484', '8888899978', '9846759000', '2025-02-28', '2026-02-28', 4, NULL, 20000, 15000, 0, 20000, 30000, 119, 120, '2025-02-12', NULL, 0, 20000, 0, 2, 3, '2025-02-12 10:27:20', 1, 119, '2025-02-12', 1, NULL, 1, 'zzz', NULL, 1, '2025-02-12 14:31:09', NULL, NULL),
(20, NULL, NULL, 1, 'test 43563', 'kl457p098902', NULL, NULL, '2025-02-20', '2026-02-20', 3, NULL, 7500, 7000, 8000, 15500, 900000, 119, NULL, '2025-02-12', NULL, 0, 7503, -3, 3, 4, '2025-02-12 16:00:42', 1, 119, '2025-02-12', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, NULL, 2, 'mot466', 'kl17S7173', NULL, NULL, '2025-02-25', '2026-02-25', 5, NULL, 12400, 11900, 20000, 32400, 400000, 119, NULL, '2025-02-13', NULL, 0, 12400, 0, 3, 2, '2025-02-13 10:27:04', 1, 119, '2025-02-13', 2, 'broker1', 1, NULL, NULL, 1, '2025-02-13 10:29:04', NULL, NULL),
(22, NULL, NULL, 1, 'create_user_pol1', 'kl457p77873', NULL, NULL, '2025-02-19', '2026-02-19', 3, NULL, 14000, NULL, 0, 14000, 40000, 120, 119, '2025-02-15', 2, NULL, 0, 0, NULL, 16, '2025-02-15 10:38:26', 1, 120, '2025-02-15', 1, NULL, 1, NULL, NULL, 1, '2025-02-15 13:04:01', NULL, NULL),
(23, NULL, NULL, 1, 'create_user_pol2', 'kl457p77875', NULL, NULL, '2025-02-19', '2026-02-19', 3, NULL, 14000, NULL, 0, 14000, 40000, 120, 119, '2025-02-15', NULL, NULL, 0, 0, 1, 16, '2025-02-15 10:38:49', 1, 120, '2025-02-15', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 1, 'create_user_pol3', 'kl457p77877', NULL, NULL, '2025-02-19', '2026-02-19', 3, NULL, 14000, NULL, 0, 14000, 40000, 120, 119, '2025-02-15', NULL, NULL, 0, 0, 1, 16, '2025-02-15 10:40:21', 1, 120, '2025-02-15', 1, NULL, 1, NULL, 1, 1, '2025-02-20 10:10:56', NULL, NULL),
(25, 5, NULL, 2, 'MT0234', 'kl17S717829', NULL, NULL, '2025-02-21', '2026-02-21', 6, NULL, 14000, 15000, 20000, 34000, 500000, 118, 119, '2025-02-20', 1, 0, 16000, 18000, 3, 3, '2025-02-20 10:03:12', 1, 118, '2025-02-20', 1, NULL, 2, NULL, 2, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 1, 'new546', 'kl17S71783', NULL, NULL, '2025-03-14', '2026-03-14', 4, NULL, 20000, 7000, 0, 20000, 400000, 119, 118, '2025-03-05', 1, 0, 0, 0, 2, 3, '2025-03-05 11:00:43', 1, 119, '2025-03-05', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policy_categories`
--

DROP TABLE IF EXISTS `tbl_policy_categories`;
CREATE TABLE IF NOT EXISTS `tbl_policy_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_category` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_policy_categories`
--

INSERT INTO `tbl_policy_categories` (`id`, `policy_category`, `created_at`, `updated_at`) VALUES
(1, 'Health Policy', '2024-12-20 05:39:02', '2024-12-20 05:39:02'),
(2, 'Fire Policy', NULL, NULL),
(3, 'Contractor Policy', NULL, NULL),
(4, 'Perosnal Accent Policy', NULL, NULL),
(5, 'Erection Policy', NULL, NULL),
(6, 'Plant And Mechinary', NULL, NULL),
(7, 'Bulgary Policy', NULL, NULL),
(8, 'Travel Policy', NULL, NULL),
(9, 'Vehicle Insurence Policy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preparepolicies`
--

DROP TABLE IF EXISTS `tbl_preparepolicies`;
CREATE TABLE IF NOT EXISTS `tbl_preparepolicies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_cat_id` int NOT NULL,
  `policy_id` int NOT NULL,
  `link` text NOT NULL,
  `note` text,
  `created_by` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prepare_created_user` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_preparepolicies`
--

INSERT INTO `tbl_preparepolicies` (`id`, `policy_cat_id`, `policy_id`, `link`, `note`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 0, 2, 'ssssdddd', 'ssssddd', 119, '2024-11-23 00:00:00', NULL, NULL),
(4, 28, 28, 'ssss', 'sss', 119, '2025-01-18 00:00:00', NULL, NULL),
(5, 1, 29, 'ss', 'sss', 119, '2025-01-18 00:00:00', NULL, NULL),
(6, 1, 29, 'ss', 'sss', 119, '2025-01-18 00:00:00', NULL, NULL),
(7, 2, 3, 'cfb', 'bbb', 119, '2025-01-18 00:00:00', NULL, NULL),
(8, 2, 3, 'cfb', 'bbb', 119, '2025-01-18 00:00:00', NULL, NULL),
(9, 2, 3, 'cfb', 'bbb', 119, '2025-01-18 00:00:00', NULL, NULL),
(10, 8, 1, 'vb b', 'nnn', 119, '2025-01-18 00:00:00', NULL, NULL),
(13, 2, 3, 'ccccc', 'vvvv', 119, '2025-01-31 00:00:00', NULL, NULL),
(14, 1, 36, 'https://drive.google.com/file/d/1jJ1J8yixMeMGpBTu8H7LdO51vBDLlkDc/view?usp=sharing', 'gug', 119, '2025-01-31 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prooftypes`
--

DROP TABLE IF EXISTS `tbl_prooftypes`;
CREATE TABLE IF NOT EXISTS `tbl_prooftypes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prooftypes`
--

INSERT INTO `tbl_prooftypes` (`id`, `type`, `createdAt`, `updatedAt`) VALUES
(1, 'CV', NULL, NULL),
(2, 'Adhar Card', NULL, NULL),
(3, 'Passport Copy', NULL, NULL),
(4, 'GAMCA MEDICAL', NULL, NULL),
(5, 'TICKET COPY', NULL, NULL),
(6, 'PRIMERY MEDICAL', NULL, NULL),
(7, 'QVC APPOIMENT LETTER', NULL, NULL),
(8, 'OTHER DOCUMENTS 1', NULL, NULL),
(9, 'OTHER DOCUMENTS 2', NULL, NULL),
(10, 'PHOTO', NULL, NULL),
(11, 'ATTESTED CERTIFICATS', NULL, NULL),
(12, 'PCC', NULL, NULL),
(13, 'SINGED OFFER LETTER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_cards`
--

DROP TABLE IF EXISTS `tbl_purchase_cards`;
CREATE TABLE IF NOT EXISTS `tbl_purchase_cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_cat_id` int NOT NULL,
  `policy_id` int NOT NULL,
  `purchase_type` int NOT NULL,
  `card_id` int DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `taken_amount` float NOT NULL,
  `card_balance_amount` float DEFAULT NULL,
  `provider_balance_amount` float DEFAULT NULL,
  `added_by` int NOT NULL,
  `added_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_cards`
--

INSERT INTO `tbl_purchase_cards` (`id`, `policy_cat_id`, `policy_id`, `purchase_type`, `card_id`, `provider_id`, `taken_amount`, `card_balance_amount`, `provider_balance_amount`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 1, 1, NULL, 2000, 3000, 0, 1, '2025-02-07', '2025-02-07 19:39:26', '2025-02-07 19:39:26'),
(2, 9, 2, 2, 2, 1, 2000, 8000, 0, 1, '2025-02-07', '2025-02-07 19:39:26', '2025-02-07 19:39:26'),
(3, 9, 2, 1, 1, NULL, 2000, 3000, 0, 1, '2025-02-07', '2025-02-07 19:43:11', '2025-02-07 19:43:11'),
(4, 9, 2, 2, 2, 1, 2000, 8000, 0, 1, '2025-02-07', '2025-02-07 19:43:11', '2025-02-07 19:43:11'),
(5, 1, 24, 2, 1, 1, 3000, 0, 0, 1, '2025-02-07', '2025-02-07 20:18:55', '2025-02-07 20:18:55'),
(6, 1, 24, 1, 2, NULL, 2000, 6000, 0, 1, '2025-02-07', '2025-02-07 20:18:55', '2025-02-07 20:18:55'),
(7, 8, 1, 2, 2, 1, 3000, 3000, 0, 1, '2025-02-07', '2025-02-07 20:25:46', '2025-02-07 20:25:46'),
(8, 8, 1, 1, 3, NULL, 2000, 48000, 0, 1, '2025-02-07', '2025-02-07 20:28:12', '2025-02-07 20:28:12'),
(9, 9, 2, 1, 1, NULL, 1000, 0, 0, 1, '2025-02-08', '2025-02-08 10:50:42', '2025-02-08 10:50:42'),
(10, 9, 2, 1, 1, NULL, 1000, 0, 0, 1, '2025-02-08', '2025-02-08 10:50:48', '2025-02-08 10:50:48'),
(11, 9, 2, 1, 2, NULL, 1000, 0, 0, 1, '2025-02-08', '2025-02-08 10:51:13', '2025-02-08 10:51:13'),
(12, 9, 2, 1, 2, NULL, 1000, 1000, 0, 1, '2025-02-08', '2025-02-08 10:53:20', '2025-02-08 10:53:20'),
(13, 9, 11, 1, 3, NULL, 1000, 47000, 0, 1, '2025-02-08', '2025-02-08 11:17:23', '2025-02-08 11:17:23'),
(14, 9, 11, 2, 3, 1, 1000, 46000, 0, 1, '2025-02-08', '2025-02-08 11:17:44', '2025-02-08 11:17:44'),
(15, 9, 2, 2, 2, 2, 1000, 3000, 0, 1, '2025-02-11', '2025-02-11 08:49:10', '2025-02-11 08:49:10'),
(16, 9, 2, 1, 2, 1, 1000, 22000, 19000, 1, '2025-02-11', '2025-02-11 09:05:49', '2025-02-11 09:05:49'),
(17, 9, 2, 1, 1, 1, 19000, 31000, 0, 1, '2025-02-11', '2025-02-11 22:23:42', '2025-02-11 22:23:42'),
(18, 9, 2, 1, 1, 1, 100000, 0, 0, 1, '2025-02-11', '2025-02-11 22:25:26', '2025-02-11 22:25:26'),
(19, 9, 2, 1, 1, 1, 100000, 0, 0, 1, '2025-02-11', '2025-02-11 22:27:59', '2025-02-11 22:27:59'),
(20, 9, 2, 1, 1, 2, 2000, 29000, 50000, 1, '2025-02-11', '2025-02-11 22:35:39', '2025-02-11 22:35:39'),
(21, 9, 3, 1, 1, 2, 1000, 28000, 49000, 1, '2025-02-12', '2025-02-12 11:15:46', '2025-02-12 11:15:46'),
(22, 9, 3, 2, 1, 2, 1000, 27000, 48000, 1, '2025-02-12', '2025-02-12 11:16:11', '2025-02-12 11:16:11'),
(23, 9, 3, 1, 2, 2, 19000, 3000, 29000, 1, '2025-02-12', '2025-02-12 11:39:28', '2025-02-12 11:39:28'),
(24, 6, 6, 1, 1, 2, 1000, 26000, 28000, 1, '2025-02-15', '2025-02-15 10:06:26', '2025-02-15 10:06:26'),
(25, 6, 6, 1, 1, 2, 1000, 26000, 28000, 1, '2025-02-15', '2025-02-15 10:06:26', '2025-02-15 10:06:26'),
(26, 6, 6, 2, 1, 2, 1000, 25000, 27000, 1, '2025-02-15', '2025-02-15 10:08:24', '2025-02-15 10:08:24'),
(27, 6, 6, 2, 1, 2, 1000, 25000, 27000, 1, '2025-02-15', '2025-02-15 10:08:24', '2025-02-15 10:08:24'),
(28, 6, 6, 1, 1, 2, 1000, 24000, 26000, 1, '2025-02-15', '2025-02-15 10:19:12', '2025-02-15 10:19:12'),
(29, 6, 6, 1, 1, 2, 1000, 24000, 26000, 1, '2025-02-15', '2025-02-15 10:19:12', '2025-02-15 10:19:12'),
(30, 1, 47, 1, 1, 2, 1000, 23000, 24000, 1, '2025-02-15', '2025-02-15 11:29:50', '2025-02-15 11:29:50'),
(31, 1, 47, 2, 1, 2, 1000, 22000, 23000, 1, '2025-02-15', '2025-02-15 11:30:59', '2025-02-15 11:30:59'),
(32, 9, 9, 1, 2, 2, 1000, 2000, 22000, 1, '2025-02-18', '2025-02-18 10:50:34', '2025-02-18 10:50:34'),
(33, 9, 25, 3, NULL, NULL, 13500, NULL, NULL, 1, '2025-03-03', '2025-03-03 11:40:20', '2025-03-03 11:40:20'),
(34, 9, 25, 3, NULL, NULL, 13500, NULL, NULL, 1, '2025-03-03', '2025-03-03 11:40:39', '2025-03-03 11:40:39'),
(35, 9, 16, 3, NULL, NULL, 500, NULL, NULL, 1, '2025-03-03', '2025-03-03 12:11:55', '2025-03-03 12:11:55'),
(36, 9, 16, 3, NULL, NULL, 1000, NULL, NULL, 1, '2025-03-03', '2025-03-03 12:12:17', '2025-03-03 12:12:17'),
(37, 9, 16, 1, 1, 2, 1000, 21000, 21000, 1, '2025-03-03', '2025-03-03 12:15:50', '2025-03-03 12:15:50'),
(38, 9, 16, 3, NULL, NULL, 1000, NULL, NULL, 1, '2025-03-03', '2025-03-03 12:17:20', '2025-03-03 12:17:20'),
(39, 9, 16, 3, NULL, NULL, 1000, NULL, NULL, 1, '2025-03-03', '2025-03-03 12:17:36', '2025-03-03 12:17:36'),
(40, 9, 26, 1, NULL, 1, 1000, NULL, 19000, 1, '2025-03-15', '2025-03-15 12:41:04', '2025-03-15 12:41:04'),
(41, 9, 26, 1, NULL, 1, 1000, NULL, 16000, 1, '2025-03-15', '2025-03-15 14:35:41', '2025-03-15 14:35:41'),
(42, 9, 26, 1, NULL, 2, 1000, NULL, 20000, 1, '2025-03-15', '2025-03-15 14:35:54', '2025-03-15 14:35:54'),
(43, 9, 26, 3, NULL, NULL, 2000, NULL, NULL, 1, '2025-03-15', '2025-03-15 14:36:47', '2025-03-15 14:36:47'),
(44, 9, 26, 1, NULL, 1, 15000, NULL, 1000, 1, '2025-03-15', '2025-03-15 14:46:46', '2025-03-15 14:46:46'),
(45, 9, 26, 1, NULL, 1, 1000, NULL, 0, 1, '2025-03-15', '2025-03-15 14:48:11', '2025-03-15 14:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referred_persons`
--

DROP TABLE IF EXISTS `tbl_referred_persons`;
CREATE TABLE IF NOT EXISTS `tbl_referred_persons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_referred_persons`
--

INSERT INTO `tbl_referred_persons` (`id`, `name`, `phone_number`, `createdAt`, `updatedAt`) VALUES
(1, 'Reffered Person11', '9747821065', NULL, NULL),
(2, 'Reffered Person2', '9747821065', NULL, NULL),
(3, 'Reffered Person3', '8383839', NULL, NULL),
(4, 'Reffered Person4', '87638333', NULL, NULL),
(5, 'Reffered Person5', '7789999000', NULL, NULL),
(6, 'Reffered Person6', '8736837', NULL, NULL),
(7, 'Reffered Person9', '9747821065', NULL, NULL),
(8, 'Reffered Person10', '89798333', NULL, NULL),
(9, 'Reffered Person12', '9747821065', NULL, NULL),
(10, 'Reffered Person12', '098', NULL, NULL),
(11, 'Reffered Person13', '83793', NULL, NULL),
(12, 'Reffered Person14', '0938333', NULL, NULL),
(13, 'Reffered Person16', '3344556665', NULL, NULL),
(14, 'ddd', '4456788766', NULL, NULL),
(15, 'Reffered Person10', '9747821065', NULL, NULL),
(16, 'refr233', NULL, NULL, NULL),
(17, 'cre1', NULL, NULL, NULL),
(18, 'test cer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'Superadmin', NULL, NULL),
(2, 'Admin', '2024-07-18 10:16:12', '2024-07-18 10:16:12'),
(6, 'Management', '2024-08-16 06:29:21', '2024-09-02 07:57:56'),
(7, 'Leads Manager', '2024-09-01 15:03:43', '2024-09-01 15:03:43'),
(8, 'Claim', '2024-09-01 15:04:04', '2024-09-01 15:04:04'),
(9, 'General', '2024-09-01 15:04:20', '2024-09-01 15:04:20'),
(10, 'Under Writer', '2024-09-01 15:04:43', '2024-09-01 15:04:43'),
(11, 'Staff', NULL, NULL),
(12, 'New Policy', NULL, NULL),
(13, 'Renew Policy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

DROP TABLE IF EXISTS `tbl_staffs`;
CREATE TABLE IF NOT EXISTS `tbl_staffs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `Join_date` date DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `address` text,
  `branch_id` int NOT NULL,
  `dept_id` int DEFAULT NULL,
  `design_id` int DEFAULT NULL,
  `mobile_number` bigint NOT NULL,
  `created_date` date NOT NULL,
  `added_by` int NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_user` (`user_id`),
  KEY `fk_staff_branch` (`branch_id`),
  KEY `fk_staff_country` (`country_id`),
  KEY `fk_staff_designation` (`design_id`),
  KEY `fk_staff_department` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`id`, `user_id`, `Join_date`, `birth_date`, `country_id`, `address`, `branch_id`, `dept_id`, `design_id`, `mobile_number`, `created_date`, `added_by`, `profile_image`, `createdAt`, `updatedAt`) VALUES
(16, 118, '2024-11-03', NULL, NULL, NULL, 1, 2, 6, 974563212, '2024-11-03', 1, 'nil', NULL, NULL),
(17, 119, '2024-11-22', NULL, NULL, 'new entry\r\nnew entry', 2, 4, 1, 9995071065, '2024-11-23', 1, 'nil', NULL, NULL),
(18, 120, '2025-01-21', NULL, NULL, 'sddd', 1, 1, 2, 83939393, '2025-01-22', 1, 'nil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

DROP TABLE IF EXISTS `tbl_states`;
CREATE TABLE IF NOT EXISTS `tbl_states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `state` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_state_country` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `country_id`, `state`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Andhra Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Arunachal Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Assam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Bihar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Chhattisgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Goa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Gujarat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Haryana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'Himachal Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Jharkhand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Karnataka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Kerala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Madhya Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'Maharashtra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'Manipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'Meghalaya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'Mizoram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Nagaland', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'Odisha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Punjab', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'Rajasthan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'Tamil Nadu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 'Telangana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'Tripura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 'Uttar Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 'Uttarakhand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 'West Bengal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 'Andaman and Nicobar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 'Chandigarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 1, 'Dadra and Nagar Haveli and Daman and Diu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 'Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 1, 'Jammu and Kashmir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 'Lakshadweep', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, 'Ladakh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 1, 'Puducherry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 2, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

DROP TABLE IF EXISTS `tbl_suppliers`;
CREATE TABLE IF NOT EXISTS `tbl_suppliers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_gst` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supplier_contact_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`id`, `supplier_name`, `supplier_gst`, `supplier_address`, `supplier_contact_number`, `created_at`, `updated_at`) VALUES
(3, 'supplier2', '987393mm', 'sss', '92890', '2025-01-27 00:50:44', '2025-01-27 00:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tool_companies`
--

DROP TABLE IF EXISTS `tbl_tool_companies`;
CREATE TABLE IF NOT EXISTS `tbl_tool_companies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int NOT NULL,
  `state_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tool_companies`
--

INSERT INTO `tbl_tool_companies` (`id`, `company_name`, `address`, `district_id`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfg', 'kodikulathu', 11, 12, '2024-12-23 08:47:28', '2024-12-23 08:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tool_types`
--

DROP TABLE IF EXISTS `tbl_tool_types`;
CREATE TABLE IF NOT EXISTS `tbl_tool_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tool_types`
--

INSERT INTO `tbl_tool_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(2, 'mnjk', '2024-12-23 05:43:10', '2024-12-23 05:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechicle_categories`
--

DROP TABLE IF EXISTS `tbl_vechicle_categories`;
CREATE TABLE IF NOT EXISTS `tbl_vechicle_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vechile_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vechicle_categories`
--

INSERT INTO `tbl_vechicle_categories` (`id`, `vechile_category`, `created_at`, `updated_at`) VALUES
(1, 'vvv', '2025-01-03 01:43:22', '2025-01-03 01:43:38'),
(2, 'qqq', '2025-01-03 01:43:48', '2025-01-03 01:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehcilepolicydocuments`
--

DROP TABLE IF EXISTS `tbl_vehcilepolicydocuments`;
CREATE TABLE IF NOT EXISTS `tbl_vehcilepolicydocuments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_policydoc_policy` (`policy_id`),
  KEY `fk_policydoc_added_user` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehcilepolicydocuments`
--

INSERT INTO `tbl_vehcilepolicydocuments` (`id`, `policy_id`, `title`, `description`, `link`, `added_date`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'adharsss', 'adharsdd', 'https://codebeautify.org/htmlviewer', '2024-12-27', 1, '2024-12-27 10:37:55', '2024-12-27 11:07:07'),
(2, 1, 'testddd', 'ssd', 'https://codebeautify.org/htmlviewer', '2024-12-27', 1, '2024-12-27 10:38:21', '2024-12-27 11:07:15'),
(3, 1, 'as', 'sss', 'https://drive.google.com/file/d/1vI85X0FD3Q1sFFOJYNem9iHobiSTPTFf/view?usp=sharing', '2024-12-27', 1, '2024-12-27 10:39:14', '2024-12-27 10:39:14'),
(5, 2, 'fgggcc', 'gg', 'ss', '2024-12-27', 1, '2024-12-27 11:13:57', '2024-12-27 11:15:11'),
(6, 2, 'ass', 'ss', 'ss', '2024-12-27', 1, '2024-12-27 11:14:35', '2024-12-27 11:14:35'),
(7, 2, 'jn', 'kjnj', 'ss', '2024-12-27', 1, '2024-12-27 11:15:55', '2024-12-27 11:15:55'),
(9, 2, 'vbbvvv', 'bb', 'ss', '2024-12-27', 1, '2024-12-27 11:17:25', '2024-12-27 11:17:30'),
(10, 1, 'SS', 'SS', 'SS', '2025-01-12', 1, '2025-01-12 10:34:57', '2025-01-12 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiclepolicy_renews`
--

DROP TABLE IF EXISTS `tbl_vehiclepolicy_renews`;
CREATE TABLE IF NOT EXISTS `tbl_vehiclepolicy_renews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_category_id` int NOT NULL,
  `policy_id` int NOT NULL,
  `premium_amount` float NOT NULL,
  `customer_premium` float DEFAULT NULL,
  `valuation_amount` float DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `payment_mode_id` int DEFAULT NULL,
  `renew_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_renew_policyholder` (`policy_id`),
  KEY `fk_renew_created_user` (`created_by`),
  KEY `fk_renew_paymode` (`payment_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehiclepolicy_renews`
--

INSERT INTO `tbl_vehiclepolicy_renews` (`id`, `policy_category_id`, `policy_id`, `premium_amount`, `customer_premium`, `valuation_amount`, `total_cost`, `payment_mode_id`, `renew_date`, `expiry_date`, `created_date`, `created_by`, `createdAt`, `updatedAt`) VALUES
(1, 0, 1, 10000, 0, NULL, NULL, 2, '2024-11-21', '2025-01-21', '2024-11-15', 1, NULL, NULL),
(2, 0, 1, 10000, 0, NULL, NULL, 2, '2024-11-21', '2024-11-21', '2024-11-13', 1, NULL, NULL),
(3, 0, 1, 20000, 0, NULL, NULL, 1, '2024-11-28', '2024-11-30', '2024-11-30', 1, NULL, NULL),
(4, 0, 1, 20000, 0, 10330, 30330, 1, '2024-12-26', '2024-12-28', '2024-12-26', 1, NULL, NULL),
(5, 0, 1, 30000, 0, 4000, 34000, 2, '2024-12-20', '2024-12-28', '2024-12-21', 1, NULL, NULL),
(6, 9, 15, 10000, 0, 2000, 12000, 1, '2025-01-14', '2026-01-14', '2025-01-13', 1, NULL, NULL),
(7, 9, 15, 10000, 0, 2000, 12000, 1, '2026-06-17', '2027-06-17', '2025-01-13', 1, NULL, NULL),
(8, 9, 15, 10000, 0, 20000, 30000, 1, '2025-01-14', '2026-01-14', NULL, 1, NULL, NULL),
(9, 9, 16, 12500, 0, 40000, 52500, 2, '2025-02-04', '2026-02-04', '2025-01-31', 1, NULL, NULL),
(10, 9, 17, 15000, 0, 0, 15000, 4, '2025-02-04', '2026-02-04', '2025-02-03', 1, NULL, NULL),
(11, 9, 17, 15000, 11500, 0, 15000, 4, '2025-02-04', '2026-02-04', '2025-02-12', 1, NULL, NULL),
(12, 9, 18, 12500, 15000, 0, 12500, 2, '2025-02-21', '2026-02-21', '2025-02-12', 1, NULL, NULL),
(13, 9, 19, 20000, 15000, 0, 20000, 2, '2025-02-28', '2026-02-28', '2025-02-12', 1, NULL, NULL),
(14, 9, 20, 7500, 7000, 8000, 15500, 3, '2025-02-20', '2026-02-20', '2025-02-12', 1, NULL, NULL),
(15, 9, 21, 12400, 11900, 20000, 32400, 3, '2025-02-25', '2026-02-25', '2025-02-13', 1, NULL, NULL),
(16, 9, 24, 14000, NULL, 0, 14000, 1, '2025-02-19', '2026-02-19', '2025-02-15', 1, NULL, NULL),
(17, 9, 25, 14000, 15000, 20000, 34000, 3, '2025-02-21', '2026-02-21', '2025-02-20', 1, NULL, NULL),
(18, 9, 26, 20000, 7000, 0, 20000, 2, '2025-03-14', '2026-03-14', '2025-03-05', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_brands`
--

DROP TABLE IF EXISTS `tbl_vehicle_brands`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_brands`
--

INSERT INTO `tbl_vehicle_brands` (`id`, `brand`, `created_at`, `updated_at`) VALUES
(1, 'TATA', '2024-12-19 22:11:22', '2024-12-19 22:11:22'),
(2, 'Honda', '2024-12-19 22:11:30', '2024-12-19 22:11:30'),
(3, 'Ford', '2024-12-19 22:11:35', '2024-12-19 22:11:35'),
(4, 'Hundayi', '2024-12-19 22:11:42', '2024-12-19 22:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_creations`
--

DROP TABLE IF EXISTS `tbl_vehicle_creations`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_creations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  `vehicle_number` int NOT NULL,
  `engine_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_registration` date NOT NULL,
  `end_registration` date NOT NULL,
  `owner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis_number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_creations`
--

INSERT INTO `tbl_vehicle_creations` (`id`, `type_id`, `brand_id`, `model_id`, `vehicle_number`, `engine_number`, `date_of_registration`, `end_registration`, `owner_name`, `chassis_number`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 5, 234, 'as344', '2024-12-21', '2024-12-29', 'abc', 234, '2024-12-20 01:14:23', '2024-12-20 01:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_insurances`
--

DROP TABLE IF EXISTS `tbl_vehicle_insurances`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_insurances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_number_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `insurance_company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_insurances`
--

INSERT INTO `tbl_vehicle_insurances` (`id`, `vehicle_number_id`, `start_date`, `end_date`, `insurance_company_name`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-12-01', '2024-12-31', 'vcbnvnm', '2024-12-21 08:09:11', '2024-12-21 08:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_models`
--

DROP TABLE IF EXISTS `tbl_vehicle_models`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_models`
--

INSERT INTO `tbl_vehicle_models` (`id`, `model`, `created_at`, `updated_at`) VALUES
(1, 'vdi', '2024-12-19 22:06:49', '2024-12-19 22:06:49'),
(3, 'grand', '2024-12-19 22:07:36', '2024-12-19 22:07:36'),
(4, 'sports', '2024-12-19 22:07:43', '2024-12-19 22:07:43'),
(5, '4.0', '2024-12-19 22:07:57', '2024-12-19 22:07:57'),
(6, 'sd', '2025-01-13 05:06:58', '2025-01-13 05:06:58'),
(7, 'sdddd', '2025-01-13 05:07:22', '2025-01-13 05:07:22'),
(8, 'ssss', '2025-01-13 05:36:41', '2025-01-13 05:36:41'),
(9, 'KM driven', '2025-01-13 07:18:11', '2025-01-13 07:18:11'),
(10, 'swift desire', '2025-01-13 07:25:03', '2025-01-13 07:25:03'),
(11, 'hudayi eon', '2025-01-13 07:47:08', '2025-01-13 07:47:08'),
(12, 'ass', '2025-01-13 08:02:47', '2025-01-13 08:02:47'),
(13, '344', '2025-01-13 08:08:27', '2025-01-13 08:08:27'),
(14, '455gv', '2025-01-13 08:21:54', '2025-01-13 08:21:54'),
(15, 'ass', '2025-01-13 08:23:32', '2025-01-13 08:23:32'),
(16, 'deee', '2025-01-13 08:24:40', '2025-01-13 08:24:40'),
(17, 'sddd', '2025-01-13 08:25:15', '2025-01-13 08:25:15'),
(18, 'hyu53636', '2025-01-13 08:27:31', '2025-01-13 08:27:31'),
(19, '2018', '2025-01-13 08:31:51', '2025-01-13 08:31:51'),
(20, '2019', '2025-01-13 08:33:26', '2025-01-13 08:33:26'),
(21, '2020', '2025-01-13 08:34:04', '2025-01-13 08:34:04'),
(22, 'Siwift hsjj', '2025-01-17 23:30:00', '2025-01-17 23:30:00'),
(23, 'test model', '2025-01-18 09:27:32', '2025-01-18 09:27:32'),
(24, 'KM driven', '2025-01-22 05:41:38', '2025-01-22 05:41:38'),
(25, 'ssd', '2025-01-22 05:46:04', '2025-01-22 05:46:04'),
(26, 'vdi vdi', '2025-01-23 22:48:25', '2025-01-23 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_pollutions`
--

DROP TABLE IF EXISTS `tbl_vehicle_pollutions`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_pollutions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_number_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_pollutions`
--

INSERT INTO `tbl_vehicle_pollutions` (`id`, `vehicle_number_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-12-01', '2024-12-31', '2024-12-21 09:26:49', '2024-12-21 09:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_repairs`
--

DROP TABLE IF EXISTS `tbl_vehicle_repairs`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_repairs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_number_id` int NOT NULL,
  `staff_user_id` int NOT NULL,
  `complaint_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repair_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','In Progress','Completed','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_repairs`
--

INSERT INTO `tbl_vehicle_repairs` (`id`, `vehicle_number_id`, `staff_user_id`, `complaint_description`, `remarks`, `repair_link`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 107, 'jjhbjk', 'mnmn', 'mnb', 'Pending', '2024-12-26 02:31:06', '2024-12-26 02:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_types`
--

DROP TABLE IF EXISTS `tbl_vehicle_types`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_types`
--

INSERT INTO `tbl_vehicle_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'three wheeler', '2024-12-19 22:08:32', '2024-12-19 22:08:32'),
(2, 'two wheeler', '2024-12-19 22:08:39', '2024-12-19 22:08:39'),
(3, 'plane', '2024-12-19 22:08:46', '2024-12-19 22:08:46'),
(4, 'train', '2024-12-19 22:08:53', '2024-12-19 22:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `fk_user_role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `remember_token`, `role_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$12$GMJUv2IjqPVLyi1r5YXzpuGDHERxUBY0YMzCb1IvwI/UL.sppHds.', NULL, 1, '2024-07-17 23:51:55', '2024-07-17 23:51:55'),
(118, 'alwin', 'alwinpfrc@gmail.com', 'alwinpfrc@gmail.com', '$2y$12$2NrWX6cvRKysZj0GU6fz.Oq7HaFopPjLt41Jy34EYYxlrAU7lunEq', NULL, 8, NULL, NULL),
(119, 'rafi', 'rafi espylabs', 'rafiespylabs@gmail.com', '$2y$12$djxz2Aybo8F0qrkfx8SFqegZ8tYUWxWPqDRxyKAhaqCmv545YNxdq', NULL, 11, NULL, NULL),
(120, 'testuser', 'test user', 'testuser@gmail.com', '$2y$12$KQjVb0e628d/JAqcLfXZv.g.uZluXBJ46xZjdq/q4Xcd7xt.gIoMq', NULL, 11, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD CONSTRAINT `fk_attendance_user` FOREIGN KEY (`staff_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD CONSTRAINT `fk_district_countrys` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_district_states` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD CONSTRAINT `fk_lead_added_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD CONSTRAINT `fk_payment_added_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_mode` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_policyholders`
--
ALTER TABLE `tbl_policyholders`
  ADD CONSTRAINT `fk_excecutive_user` FOREIGN KEY (`executive_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_policy_agent` FOREIGN KEY (`agent_id`) REFERENCES `tbl_agents` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_policy_assigned_user` FOREIGN KEY (`assigned_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_policy_company` FOREIGN KEY (`company_id`) REFERENCES `tbl_companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_policy_dealer` FOREIGN KEY (`dealer_id`) REFERENCES `tbl_dealers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_policy_paymentmode` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_preparepolicies`
--
ALTER TABLE `tbl_preparepolicies`
  ADD CONSTRAINT `fk_prepare_created_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD CONSTRAINT `fk_staff_branch` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_country` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_department` FOREIGN KEY (`dept_id`) REFERENCES `tbl_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_designation` FOREIGN KEY (`design_id`) REFERENCES `tbl_designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD CONSTRAINT `fk_state_country` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vehcilepolicydocuments`
--
ALTER TABLE `tbl_vehcilepolicydocuments`
  ADD CONSTRAINT `fk_policydoc_added_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_policydoc_policy` FOREIGN KEY (`policy_id`) REFERENCES `tbl_policyholders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vehiclepolicy_renews`
--
ALTER TABLE `tbl_vehiclepolicy_renews`
  ADD CONSTRAINT `fk_renew_created_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_renew_paymode` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_renew_policyholder` FOREIGN KEY (`policy_id`) REFERENCES `tbl_policyholders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
