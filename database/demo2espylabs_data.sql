-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2025 at 04:57 AM
-- Server version: 8.0.41
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo2espylabs_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('bibinsivan123@gmail.com|106.219.182.178', 'i:2;', 1736916831),
('bibinsivan123@gmail.com|106.219.182.178:timer', 'i:1736916831;', 1736916831),
('jijimolphilip@gmail.com|223.185.22.131', 'i:2;', 1740813644),
('jijimolphilip@gmail.com|223.185.22.131:timer', 'i:1740813644;', 1740813644),
('jkgroupacctmvpa@gmail.com2852001|223.185.22.131', 'i:1;', 1740813565),
('jkgroupacctmvpa@gmail.com2852001|223.185.22.131:timer', 'i:1740813565;', 1740813565),
('neethu@jk|223.185.22.131', 'i:2;', 1740810138),
('neethu@jk|223.185.22.131:timer', 'i:1740810138;', 1740810138),
('test@mail.com|116.68.78.70', 'i:1;', 1737006604),
('test@mail.com|116.68.78.70:timer', 'i:1737006604;', 1737006604);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8GO5jOxX0JSiAPDI4XJsm7wnfi7ep7rw4rXwA0pp', NULL, '195.191.219.131', 'Mozilla/5.0 (compatible; MJ12bot/v2.0.0; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHFNQUVoV1pmaGVrU1luT2xZdFFWSmVaVEU0eml4cmo4aURlVHA5eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vZGVtbzIuZXNweWxhYnMuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742279812),
('GuGkFYl7muQxU3wi3KYm4HpKbJqycVCvYK0rQvQi', 1, '152.58.217.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWFQTWZUQUthVjg3OFFMWXV2MEdSRWlTdnVHdjlNYTROMTRibkk1bSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovL2RlbW8yLmVzcHlsYWJzLmNvbS9hdHRlbmRhbmNlcyI7fX0=', 1742284494),
('kt20tMZh4A1XeWG0WORDxKpG860a2HBTGQSKKCO8', 2, '223.185.21.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaHF3emljU0cyUkJGS3NZRjNmdDJvTm9vN3VnQ3NBeDBaa0d3QTYwaSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwczovL2RlbW8yLmVzcHlsYWJzLmNvbS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1742277657),
('Nl9FwoCkmZZF6JJq4HQvNgyDPDDd7gBVF08gYNl3', NULL, '195.191.219.131', 'Mozilla/5.0 (compatible; MJ12bot/v2.0.0; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajhITTVtWmlIY09PSVM0UzRDeUtuMzFNbW9IN0loVGJzNmZlZk5WRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vZGVtbzIuZXNweWxhYnMuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742279812),
('z5oEaY2bpFXQzU2D3IP8oO5Wfa1by3EifRZ6xEjk', NULL, '198.235.24.124', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGFrUE5rS0E2dzFVWE5HY0hBUHdtY00ydTh0UWhobkp6WFhXUXA3ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9kZW1vMi5lc3B5bGFicy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742280514),
('ZhTb43ZTgxKhGhcjPqOeDwFdLpFm4QwBbwYurvWo', 9, '111.92.77.201', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOEtaYTFvTGxVWnBoY3pVOWxMY3J0ZTd3NWp0bFFRTWZUbkxsWDY4ZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL2RlbW8yLmVzcHlsYWJzLmNvbS9wb2xpY3lob2xkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1742284656);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `id` int NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendances`
--

CREATE TABLE `tbl_attendances` (
  `id` int NOT NULL,
  `login_id` int NOT NULL,
  `punchin_long` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `punchin_lat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `punch_in` varchar(255) NOT NULL,
  `punchin_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `punch_out` varchar(255) DEFAULT NULL,
  `punch_out_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `punchout_lat` varchar(255) DEFAULT NULL,
  `punchout_long` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendances`
--

INSERT INTO `tbl_attendances` (`id`, `login_id`, `punchin_long`, `punchin_lat`, `punch_in`, `punchin_image`, `punch_out`, `punch_out_image`, `punchout_lat`, `punchout_long`, `date`, `added_by`, `createdAt`, `updatedAt`) VALUES
(1, 8, '76.5884572', '9.9785428', '12:06:23', 'scaled_ce58919c-5b23-4d4f-b05e-10b1cb09d5fa5897592826554503755.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-24', NULL, NULL, NULL),
(2, 2, '76.5884729', '9.9785418', '12:21:55', 'scaled_13d2de84-69e0-4ddb-8339-b26042e778c16411838364194249998.jpg_compressed.jpg', '20:55:28', 'scaled_9589b206-94ed-45cb-ae87-a43ee5f5d956338926361879189757.jpg_compressed.jpg', '9.9785338', '76.5884555', '2025-02-24', NULL, NULL, NULL),
(3, 5, '76.5884573', '9.97854', '12:36:17', 'scaled_347d3803-952a-4b37-83ce-22a8b8f764e17712102790512650333.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-24', NULL, NULL, NULL),
(4, 9, '76.5884719', '9.978544', '12:36:44', 'scaled_da1035dc-ed5c-4e31-990d-071f6882fbff6101384407159907714.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-24', NULL, NULL, NULL),
(5, 4, '76.5978429', '9.9742528', '12:46:48', 'scaled_e461680b-aff6-4f68-9ee0-9235a9b29f2d2183213135307518210.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-24', NULL, NULL, NULL),
(6, 2, '76.5883762', '9.9783466', '09:21:33', 'scaled_a082603c-972e-4cb9-875c-0d4346bb763d4076050847859671672.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-25', NULL, NULL, NULL),
(7, 9, '76.5885105', '9.9785077', '09:39:20', 'scaled_a80c1f63-e09e-44e7-bc86-d992cb9ee6a64216236833633321452.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-25', NULL, NULL, NULL),
(8, 2, '76.5884977', '9.9785167', '09:19:26', 'scaled_1ee71d96-a835-47ab-9ded-95a3b45616a54415863057921856432.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-26', NULL, NULL, NULL),
(9, 9, '76.5885034', '9.978514', '09:48:44', 'scaled_31a57e80-2bcf-4ca2-a596-c8b25ccc5a291591261534462232529.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-02-26', NULL, NULL, NULL),
(10, 3, '76.5884834', '9.9785289', '12:27:41', 'scaled_f4a076f7-ffad-432e-84ac-8f7e62a5bcae4125503275958769663.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(11, 11, '76.5884669', '9.9785183', '12:37:13', 'scaled_ddaa0de9-0be3-4791-b712-5a53d1f702531595826644545352256.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(12, 5, '76.6386721', '9.9843116', '12:52:01', 'scaled_98d64995-1339-49e5-a6fc-edf104aabe437203922932076919127.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(13, 14, '76.588514', '9.9785136', '12:53:33', 'scaled_72461583-a7f0-4b4b-aa0f-0ac40bba92685564488401932147676.jpg_compressed.jpg', '18:16:04', 'scaled_ba66511e-8871-46aa-8a09-e95afbd8c2d3362867992675392850.jpg_compressed.jpg', '9.978503', '76.5884406', '2025-03-01', NULL, NULL, NULL),
(14, 16, '76.5885159', '9.9785164', '12:58:54', 'scaled_80c3fc54-e04d-4760-b7e4-843e30044482292781635286496645.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(15, 9, '76.5884777', '9.9785126', '13:45:23', 'scaled_35e6773d-0b96-4f0c-9e54-7884d436f538589824005185978383.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(16, 4, '76.588472', '9.9785413', '13:46:29', 'scaled_dc218952-dff9-4c57-bc15-4947830dc37e931230015994661043.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-01', NULL, NULL, NULL),
(17, 11, '76.5884964', '9.9785095', '09:31:30', 'scaled_9a475365-ac8a-4c50-978d-b99b2c2bb15b4633434916951131106.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(18, 3, '76.5884783', '9.9785107', '09:36:41', 'scaled_a1bb5e48-537b-48e9-9aa6-ff0d0ce2a182921550864066311822.jpg_compressed.jpg', '17:51:07', 'scaled_7c5eb420-79a9-46d1-8497-c22269a2fdd91904903967874407899.jpg_compressed.jpg', '9.9785156', '76.588518', '2025-03-03', NULL, NULL, NULL),
(19, 14, '76.5884984', '9.9785132', '09:37:26', 'scaled_877d7105-e05c-4a26-8f10-246806a5f20b907804462601835197.jpg_compressed.jpg', '17:50:09', 'scaled_4ec1328a-4cae-4420-8ec6-2fd1b304be527382199570790141322.jpg_compressed.jpg', '9.9785173', '76.5885123', '2025-03-03', NULL, NULL, NULL),
(20, 9, '76.5884637', '9.9785083', '09:41:30', 'scaled_ce562444-6722-44fb-bc0d-59d46789ba0187227551967214109.jpg_compressed.jpg', '18:19:25', 'scaled_08b7f994-83ca-4e2a-8c17-c6d64433e63f1811244133355728293.jpg_compressed.jpg', '9.9785104', '76.5884676', '2025-03-03', NULL, NULL, NULL),
(21, 16, '76.58847', '9.9785177', '09:50:26', 'scaled_57ea9144-b34b-47f7-a8ab-9e1ddb47d46b7842847102801365988.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(22, 18, '76.588507', '9.9785181', '12:04:21', 'scaled_0f7f16ce-1433-4faa-8634-623f6f3e9ad66562151820616337548.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(23, 15, '76.588508', '9.9785148', '12:35:51', 'scaled_8f6f552b-e51f-4502-9f69-6b3af3141ad19164359100420698292.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(24, 19, '76.5885251', '9.9785163', '12:37:11', 'scaled_b8289261-0aa0-4880-b9e0-5949b3fb0c5b4685748182251609846.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(25, 21, '76.5884475', '9.9785097', '12:49:48', 'scaled_3eec03eb-f1a8-44ab-94c4-1251db82e6a24368260595167993525.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(26, 2, '76.58849', '9.978511', '13:32:25', 'scaled_a3f41653-7d92-433c-9ea6-81b34808082d7222192450635939114.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-03', NULL, NULL, NULL),
(27, 2, '76.5885233', '9.9784658', '09:04:24', 'scaled_66884754-5b46-4282-80a8-81f0222495463892639852972799903.jpg_compressed.jpg', '19:12:12', 'scaled_7be65c3b-97ce-44ca-9012-2d04b38f078b3794012012428302121.jpg_compressed.jpg', '9.9782295', '76.5888432', '2025-03-04', NULL, NULL, NULL),
(28, 24, '76.5886151', '9.9783656', '09:13:41', 'scaled_3945a729-93d9-4bb5-a6e1-287602835acd5176699818647988961.jpg_compressed.jpg', '19:11:23', 'scaled_28a7b2f5-18db-4708-83c2-3220e53abba5464768194404314146.jpg_compressed.jpg', '9.9784493', '76.5885514', '2025-03-04', NULL, NULL, NULL),
(29, 5, '76.6386854', '9.9842969', '09:32:03', 'scaled_334d12f4-e37e-43c8-8da8-6a90d88c0db77449031992751675239.jpg_compressed.jpg', '17:34:03', 'scaled_4739acaa-2287-4ac8-aca0-4a9a89bc4e462892718194812230542.jpg_compressed.jpg', '9.9843078', '76.6386751', '2025-03-04', NULL, NULL, NULL),
(30, 9, '76.5884743', '9.9785186', '09:34:15', 'scaled_bfc43e7d-af1e-4825-886f-9fae7705b684558970818175688203.jpg_compressed.jpg', '18:08:25', 'scaled_0a52842a-b826-4fe4-b140-33b691e0638b1446253230549395036.jpg_compressed.jpg', '9.9785005', '76.5884812', '2025-03-04', NULL, NULL, NULL),
(31, 14, '76.5884927', '9.9785049', '09:40:58', 'scaled_f3fcd0c2-0193-4b48-887c-68bfb43718e48795705546665668336.jpg_compressed.jpg', '18:01:09', 'scaled_5541840c-919c-4297-8d3f-c7b9740516df4764491280684423410.jpg_compressed.jpg', '9.9785051', '76.588505', '2025-03-04', NULL, NULL, NULL),
(32, 11, '76.5884894', '9.9785098', '09:43:48', 'scaled_6f91c77f-1f9f-4eae-b9c2-f2494974471c2626764372820604788.jpg_compressed.jpg', '18:08:04', 'scaled_3b0d9c52-78e5-427d-9464-9ff483f33d951874523077134172560.jpg_compressed.jpg', '9.9785053', '76.5884988', '2025-03-04', NULL, NULL, NULL),
(33, 21, '76.5888717', '9.9783331', '10:08:21', 'scaled_638cc1f5-0da4-4c04-b9a7-9612c296c05d5247380668492731459.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-04', NULL, NULL, NULL),
(34, 15, '76.5885062', '9.9785166', '10:11:39', 'scaled_e3cdbc04-b2eb-44f1-b648-2ae5dd2ce6958611435417875116200.jpg_compressed.jpg', '19:13:46', 'scaled_26e64268-6546-4631-b91d-fff3d74597e31071770459355928139.jpg_compressed.jpg', '9.9784871', '76.5885687', '2025-03-04', NULL, NULL, NULL),
(35, 4, '76.5884658', '9.9785069', '9:45:00', 'scaled_0a3ad227-3fe8-4909-8aee-0794bdd0f2f67715006975450786539.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-04', NULL, NULL, NULL),
(36, 3, '76.6387083', '9.9842582', '10:28:04', 'scaled_d8ae0cd5-5bd3-46b8-8f88-b4caec44aade3050129561984307662.jpg_compressed.jpg', '17:54:00', 'scaled_6a1937e2-9261-4c6d-bc29-d7ca996a6b937465785308381131514.jpg_compressed.jpg', '9.9785034', '76.5885018', '2025-03-04', NULL, NULL, NULL),
(37, 16, '76.5884743', '9.978529', '11:05:50', 'scaled_738c7111-2614-4a5f-a62f-d3837d1740f67043903607690480862.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-04', NULL, NULL, NULL),
(38, 6, '76.5884682', '9.9785127', '9:50:00', 'scaled_64f4ec06-e5fc-4bca-a2a1-a256f20e0f9d6044638966676433760.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-04', NULL, NULL, NULL),
(39, 7, '76.5884661', '9.9785123', '9:45:00', 'scaled_e28230c4-88f6-47b1-8592-901862f5dfcc5917823100865516044.jpg_compressed.jpg', '17:57:13', 'scaled_e1255983-8034-4c3f-9601-48c846feaab12022963919091458026.jpg_compressed.jpg', '9.9785096', '76.5884808', '2025-03-04', NULL, NULL, NULL),
(40, 19, '76.5884989', '9.9785141', '12:11:16', 'scaled_855e2500-1a4d-4a63-a8bb-e28f9c4656248966980248248096902.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-04', NULL, NULL, NULL),
(41, 18, '76.5884708', '9.9785098', '15:45:48', 'scaled_dc666086-039e-4dc6-81f7-9023ffbcfe001101755473195643136.jpg_compressed.jpg', '19:12:49', 'scaled_7a61d9ba-4940-4b98-af9d-3bfd3634c8301423776030468542133.jpg_compressed.jpg', '9.9784102', '76.5886946', '2025-03-04', NULL, NULL, NULL),
(42, 24, '76.588744', '9.9783564', '09:02:14', 'scaled_eb4ab0de-f739-4587-871b-9694d5be79af1396900941584349795.jpg_compressed.jpg', '19:05:37', 'scaled_d108348f-a52f-4b81-9560-2be5120542cf2985951936045437199.jpg_compressed.jpg', '9.9784292', '76.5886302', '2025-03-05', NULL, NULL, NULL),
(43, 2, '76.5886101', '9.9784442', '09:10:52', 'scaled_3887f074-2208-4259-a566-6ff311fe03ce2285891168113874252.jpg_compressed.jpg', '19:16:32', 'scaled_daedae28-9623-47b7-9f73-1ffe10a01195332184133083327442.jpg_compressed.jpg', '9.9783477', '76.5887541', '2025-03-05', NULL, NULL, NULL),
(44, 9, '76.5884963', '9.9785103', '09:14:30', 'scaled_8bcc8339-613d-45ad-a036-85b4026fafb92440691064413357547.jpg_compressed.jpg', '18:14:35', 'scaled_5d01585d-18f0-4709-9668-04feeb3e55dd1898817514795390229.jpg_compressed.jpg', '9.9785202', '76.588469', '2025-03-05', NULL, NULL, NULL),
(45, 3, '76.5884981', '9.9785071', '09:32:45', 'scaled_8ec37982-bb70-45b7-88bc-8616e5a339178363935379574116150.jpg_compressed.jpg', '17:48:16', 'scaled_d3973157-9bec-41cf-973e-803a811fa9bb2469715301451822833.jpg_compressed.jpg', '9.9785034', '76.5884701', '2025-03-05', NULL, NULL, NULL),
(46, 14, '76.5885017', '9.9785037', '09:34:27', 'scaled_9439f8f6-140b-4a02-9486-989f9a00f6858325924304926442694.jpg_compressed.jpg', '17:56:23', 'scaled_58f131f1-0f1e-4f9b-9ee1-8036bf93b4d0891834187346685023.jpg_compressed.jpg', '9.9784989', '76.5884951', '2025-03-05', NULL, NULL, NULL),
(47, 19, '76.5884903', '9.9785101', '09:36:20', 'scaled_e140f897-21e5-4f4e-af78-3a39b329f29a6643398442692361106.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-05', NULL, NULL, NULL),
(48, 18, '76.5884562', '9.97854', '09:40:23', 'scaled_1ecc53c6-f380-4cf6-a988-6b211d9d0cf46321746646913886494.jpg_compressed.jpg', '19:08:07', 'scaled_6f9813f0-3c37-48b2-b4d0-c8835a9995d63287832317661936648.jpg_compressed.jpg', '9.9785249', '76.5885039', '2025-03-05', NULL, NULL, NULL),
(49, 15, '76.5884985', '9.9785112', '09:40:59', 'scaled_2894527f-7bec-4b69-9ba3-1f6e5df596cf1004872905301518945.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-05', NULL, NULL, NULL),
(50, 11, '76.588469', '9.9785157', '09:41:51', 'scaled_9095ef81-eed8-4402-ab43-e824ab0585a85667759416673165027.jpg_compressed.jpg', '18:16:15', 'scaled_31f14cc1-fd0b-42bc-b509-cf7a551325fa1721711115078890037.jpg_compressed.jpg', '9.9785177', '76.5885072', '2025-03-05', NULL, NULL, NULL),
(51, 6, '76.58846', '9.9785087', '10:08:26', 'scaled_d75f015c-00ce-42b5-9cc2-4e60024a23877448747040303776552.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-05', NULL, NULL, NULL),
(52, 4, '76.5884663', '9.9785219', '10:10:48', 'scaled_7c3c672b-b031-47d1-99ea-c2c516dea7fb5677802665226742199.jpg_compressed.jpg', '17:55:56', 'scaled_d74f6b7a-63f5-4ac5-9be6-d9890b19ae0e5839025051239452210.jpg_compressed.jpg', '9.9785153', '76.5884894', '2025-03-05', NULL, NULL, NULL),
(53, 21, '76.5885075', '9.9785018', '10:29:04', 'scaled_b28f28df-95f2-4525-b02f-28bed5faa7bb945274224869813129.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-05', NULL, NULL, NULL),
(54, 24, '76.5884941', '9.9784101', '08:56:47', 'scaled_f45c7210-f815-4296-929e-acffe4f921b43325081973396344723.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(55, 2, '76.5883577', '9.9783311', '09:04:06', 'scaled_80333568-9c27-414f-8d80-059eaa4964ea4034157823499890260.jpg_compressed.jpg', '19:05:47', 'scaled_f1ebc5ed-ece2-4495-8f95-d0fea08c28f44452729105920979401.jpg_compressed.jpg', '9.9784941', '76.5884973', '2025-03-06', NULL, NULL, NULL),
(56, 9, '76.588502', '9.9785112', '09:21:45', 'scaled_26b8d308-cf65-4052-9593-158e5b7ccf774251796739007721424.jpg_compressed.jpg', '18:13:26', 'scaled_ef24894b-7bcb-4e38-b9c2-576044f3fe356565157375891563028.jpg_compressed.jpg', '9.9785169', '76.5884715', '2025-03-06', NULL, NULL, NULL),
(57, 3, '76.5885053', '9.9785001', '09:36:58', 'scaled_66f58c40-7477-478c-baac-031d313bac334057071713666459175.jpg_compressed.jpg', '18:12:48', 'scaled_afcaa6c3-a1fa-49ce-a099-7b5fbc90f6757158201661775043700.jpg_compressed.jpg', '9.97851', '76.5884408', '2025-03-06', NULL, NULL, NULL),
(58, 14, '76.5885056', '9.9785084', '09:37:42', 'scaled_ff4e1b1d-6bdb-491b-a907-ed934702f4f9530289531449684836.jpg_compressed.jpg', '18:03:41', 'scaled_8221730c-da35-46e4-a207-e034ac850db98385910864859448264.jpg_compressed.jpg', '9.9785042', '76.5884915', '2025-03-06', NULL, NULL, NULL),
(59, 11, '76.5884664', '9.9785192', '09:38:56', 'scaled_f6ac93f3-626d-43c5-83b7-7b3eeb826a92713517799206875322.jpg_compressed.jpg', '18:22:21', 'scaled_956875bc-2ede-45e0-bad3-ca175a59121a1085906846190761825.jpg_compressed.jpg', '9.9785155', '76.5885005', '2025-03-06', NULL, NULL, NULL),
(60, 18, '76.5884773', '9.9785086', '09:41:49', 'scaled_4f7dc8e4-4177-415f-a0e1-48a0d0a7758c6797533659183901915.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(61, 7, '76.5884662', '9.9785126', '09:43:33', 'scaled_0d3a11c7-e447-421b-97c9-604572bf26ea4426257910851671403.jpg_compressed.jpg', '17:50:13', 'scaled_de8d57c9-7853-4fdc-b97f-713187145bb67077472027606489341.jpg_compressed.jpg', '9.9785117', '76.5884937', '2025-03-06', NULL, NULL, NULL),
(62, 4, '76.5889979', '9.9785316', '09:45:25', 'scaled_34ec5dba-7138-483e-978a-bdbad7bba0921820002684290962835.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(63, 16, '76.5884659', '9.9785064', '09:48:42', 'scaled_e3d65c7c-f759-47a8-8690-c2a9979964971977609932642833069.jpg_compressed.jpg', '17:45:12', 'scaled_8850df4b-9dff-443a-8cc3-b6dbcb250cc88758581796791891243.jpg_compressed.jpg', '9.9785053', '76.5884582', '2025-03-06', NULL, NULL, NULL),
(64, 6, '76.5884734', '9.9785198', '10:07:39', 'scaled_4f44cd7a-e4f2-400e-a02e-0ffb6b81afa17344783712289457605.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(65, 19, '76.5884586', '9.9785045', '10:21:55', 'scaled_4b917a77-d76f-43c0-8303-0b4d3c6db795777301692797263908.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(66, 15, '76.5884685', '9.9785094', '10:25:55', 'scaled_f63912b1-18a0-4ce6-b42e-3b54b34d053c4404136403504796107.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-06', NULL, NULL, NULL),
(67, 2, '76.5884329', '9.9783189', '09:03:38', 'scaled_6a223426-10ac-42b6-8969-1eb2275217857565569181265193426.jpg_compressed.jpg', '19:00:58', 'scaled_d62c8f54-12e9-4909-bba4-e775392bf5ea4078545309160778836.jpg_compressed.jpg', '9.9785033', '76.5884883', '2025-03-07', NULL, NULL, NULL),
(68, 24, '76.5885393', '9.9785011', '09:04:30', 'scaled_7bf72ed9-a1c5-455f-97c9-c68bf97cc4203260049565037461763.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-07', NULL, NULL, NULL),
(69, 14, '76.5884914', '9.9785078', '09:31:59', 'scaled_cb3e9434-aad0-4c8b-9bcd-e9472e831983786969772903400286.jpg_compressed.jpg', '18:17:33', 'scaled_87a813f0-ab1b-47f6-ac74-fe730bc81bf88704867634083793020.jpg_compressed.jpg', '9.9785083', '76.5885104', '2025-03-07', NULL, NULL, NULL),
(70, 3, '76.5865688', '9.9791849', '09:34:46', 'scaled_b3d1f0a6-381a-4855-b231-eb99530ad94e8093354367101890141.jpg_compressed.jpg', '18:10:32', 'scaled_f02ba3ce-ac9c-48e1-a352-a745d2402c5b5337080484636708888.jpg_compressed.jpg', '9.9785471', '76.5886799', '2025-03-07', NULL, NULL, NULL),
(71, 9, '76.5882824', '9.9788448', '09:39:19', 'scaled_bf214c57-b18e-401c-a44f-be0ec71017eb8217231910573664315.jpg_compressed.jpg', '18:10:49', 'scaled_14d866a8-53d3-4a26-b29b-a29a655ff2303580358413979649304.jpg_compressed.jpg', '9.9785034', '76.5884691', '2025-03-07', NULL, NULL, NULL),
(72, 11, '76.5884633', '9.9785232', '09:42:22', 'scaled_e3a94f45-063e-4873-9c36-dc3fb5613a776458684286802179395.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-07', NULL, NULL, NULL),
(73, 18, '76.5884597', '9.9785061', '09:42:47', 'scaled_61df0ee8-178a-4773-b733-5f0a6bbe23d53398136479829296905.jpg_compressed.jpg', '19:12:18', 'scaled_467631ea-d895-44a4-b965-9b4d97a04ab14627042609980210666.jpg_compressed.jpg', '9.9785083', '76.5884736', '2025-03-07', NULL, NULL, NULL),
(74, 16, '76.5884654', '9.9785174', '09:48:43', 'scaled_8b1ec0e3-d9b4-4743-96b8-35671896dc392950296957038883347.jpg_compressed.jpg', '17:50:05', 'scaled_4c598d99-9bb5-4c60-8e24-01ac27ba1c411904365986081078672.jpg_compressed.jpg', '9.9797989', '76.5842312', '2025-03-07', NULL, NULL, NULL),
(75, 7, '76.5884778', '9.9785148', '09:48:59', 'scaled_a53f7ebf-4e68-4648-8f0a-aa749a8e58e96589414379387269757.jpg_compressed.jpg', '17:58:04', 'scaled_b0221d67-bfdc-4924-8fb9-c8c485c0d3988404332756935920462.jpg_compressed.jpg', '9.9785076', '76.5884653', '2025-03-07', NULL, NULL, NULL),
(76, 4, '76.5884643', '9.9785147', '09:49:34', 'scaled_64cbab2b-9a81-4835-bba1-3907d0cad6087780507521120433834.jpg_compressed.jpg', '17:58:46', 'scaled_4bb63089-9067-49f6-94ef-e1c52e288f0c8905633999411495626.jpg_compressed.jpg', '9.9785064', '76.5884995', '2025-03-07', NULL, NULL, NULL),
(77, 6, '76.588468', '9.9785174', '10:04:57', 'scaled_041e67da-c755-4b04-8c2a-7f26d5f76fa54160294573088574974.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-07', NULL, NULL, NULL),
(78, 21, '76.5885282', '9.9785264', '10:14:45', 'scaled_ed8b02b6-5b38-4d07-830b-087f825505b05939237038897188518.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-07', NULL, NULL, NULL),
(79, 2, '76.5886405', '9.9785068', '09:04:55', 'scaled_b9a44149-3833-4013-838b-efee79a7316b642019319487451874.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-08', NULL, NULL, NULL),
(80, 24, '76.5885233', '9.9784883', '09:08:12', 'scaled_24c99ca4-b6cb-4c04-abda-dd850df931232629299331373064494.jpg_compressed.jpg', '18:58:53', 'scaled_0e5f8e8d-dfc6-44c3-a4ae-dc6c700f8b3c7129958969769475367.jpg_compressed.jpg', '9.9785074', '76.5884933', '2025-03-08', NULL, NULL, NULL),
(81, 3, '76.5898191', '9.9779512', '09:22:20', 'scaled_b64d3993-78fb-487a-b6e3-1863205904d28583612962718577499.jpg_compressed.jpg', '17:58:55', 'scaled_85d4920b-e1d0-4fb7-baf0-ee5d8ed225387374026059800009613.jpg_compressed.jpg', '9.9785023', '76.5884793', '2025-03-08', NULL, NULL, NULL),
(82, 14, '76.5885011', '9.9785034', '09:35:31', 'scaled_817a393d-3e6d-44a3-8023-c92f5f9141f32565642943741752699.jpg_compressed.jpg', '17:59:54', 'scaled_cc234386-20cb-46ee-b75c-2c8ab3e0cfa65681189438483321119.jpg_compressed.jpg', '9.9785039', '76.5885028', '2025-03-08', NULL, NULL, NULL),
(83, 7, '76.588473', '9.9785107', '09:43:41', 'scaled_33001b81-f20a-42b7-aa9c-6bfd815edfc52842603641543337321.jpg_compressed.jpg', '17:45:37', 'scaled_e69f1689-4ce0-44e6-9726-de3ce89b7e043442073274306535649.jpg_compressed.jpg', '9.9785199', '76.5884691', '2025-03-08', NULL, NULL, NULL),
(84, 4, '76.5884645', '9.9785109', '09:44:16', 'scaled_6205b3c9-08d0-4c8c-8074-aef5c4ec38816176587898112104987.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-08', NULL, NULL, NULL),
(85, 15, '76.5884937', '9.9785052', '09:45:08', 'scaled_0519f545-0e58-4cee-a8e6-af1d559f63415499929460430237918.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-08', NULL, NULL, NULL),
(86, 9, '76.5884736', '9.9785258', '09:45:52', 'scaled_301fddc6-da77-420c-975b-5fafab678c5c4893529309342110729.jpg_compressed.jpg', '18:02:18', 'scaled_a9238356-ac26-4be9-ae7b-204c14a7ce954009890774641987176.jpg_compressed.jpg', '9.978509', '76.5884593', '2025-03-08', NULL, NULL, NULL),
(87, 11, '76.5884417', '9.9784666', '09:48:57', 'scaled_bb1c05f9-1fad-43a4-ade4-e93705cdf5907327381956746418705.jpg_compressed.jpg', '18:02:21', 'scaled_df813129-c904-4d9f-916b-52c552254ac16874095458366871114.jpg_compressed.jpg', '9.978511', '76.5884607', '2025-03-08', NULL, NULL, NULL),
(88, 18, '76.5884635', '9.978506', '10:01:35', 'scaled_0962919a-40f6-4703-8a59-36052cb3df868325479025910741290.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-08', NULL, NULL, NULL),
(89, 6, '76.5884628', '9.9785097', '10:02:05', 'scaled_b96abea8-e619-4149-bc9a-34e095e8bd124673157124027207204.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-08', NULL, NULL, NULL),
(90, 16, '76.5884728', '9.9785269', '10:21:16', 'scaled_40e977d7-3033-430d-ae93-6aa3309db0dd4585011371304957098.jpg_compressed.jpg', '17:37:11', 'scaled_f78d6445-766c-41bd-99d6-b4ce05f19fd31874275038686346528.jpg_compressed.jpg', '9.9785073', '76.5885018', '2025-03-08', NULL, NULL, NULL),
(91, 2, '76.5884359', '9.9782903', '09:06:16', 'scaled_555371aa-5723-4bd7-a0f1-c15922f62f9d5987132620779928298.jpg_compressed.jpg', '19:27:15', 'scaled_76e1a33d-57a4-497b-938b-3a8516f7c316113136472200506563.jpg_compressed.jpg', '9.9783533', '76.5883597', '2025-03-10', NULL, NULL, NULL),
(92, 24, '76.5885447', '9.9784644', '09:06:30', 'scaled_7a82ce6b-6011-4817-800d-b39608b0a9d67366443312702898930.jpg_compressed.jpg', '19:28:10', 'scaled_96650c75-7bfb-4d27-bbfd-a16fe9a009843773186443026237352.jpg_compressed.jpg', '9.9785197', '76.5885018', '2025-03-10', NULL, NULL, NULL),
(93, 9, '76.5885024', '9.9785106', '09:18:48', 'scaled_280c8330-6640-4e6c-a6d2-14e63d30a1c86448529736676052918.jpg_compressed.jpg', '18:15:30', 'scaled_38361ead-be74-4e95-9158-f1c6cf577da55862920022674869412.jpg_compressed.jpg', '9.9785024', '76.5884931', '2025-03-10', NULL, NULL, NULL),
(94, 5, '76.6386813', '9.984307', '09:30:37', 'scaled_4a7b2b56-1089-4f41-a0cd-e9bb348f59f12446161410900153874.jpg_compressed.jpg', '17:36:36', 'scaled_9b02f745-eef0-40a8-944c-1a6a711713f3794641491108573425.jpg_compressed.jpg', '9.9843083', '76.6386603', '2025-03-10', NULL, NULL, NULL),
(95, 14, '76.5884983', '9.9785104', '09:33:02', 'scaled_054a637c-efe7-4dd5-80f1-f76967c918916757048200108984321.jpg_compressed.jpg', '18:14:29', 'scaled_c0ed75b2-3b1b-4974-8065-c3467d7f4b755563305891735299478.jpg_compressed.jpg', '9.978511', '76.588506', '2025-03-10', NULL, NULL, NULL),
(96, 15, '76.5884121', '9.9785377', '09:34:12', 'scaled_a88bb96e-ce3c-484b-8b0c-72895088d3104188544718805423190.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-10', NULL, NULL, NULL),
(97, 3, '76.5901802', '9.9772828', '09:35:48', 'scaled_aeb8abaf-bcec-4bae-85a1-a68cbbc7cca38546958640974677130.jpg_compressed.jpg', '18:14:12', 'scaled_c7f0266e-b68f-49b4-9e4d-3cf2cea1fcf58776663178895006246.jpg_compressed.jpg', '9.9931733', '76.5880933', '2025-03-10', NULL, NULL, NULL),
(98, 11, '76.5884666', '9.9785193', '09:35:58', 'scaled_2dd314ea-c1f2-412a-bdbc-d4ea0f928db36647828666009151834.jpg_compressed.jpg', '18:15:20', 'scaled_46f12d18-b12b-49a0-9d4c-cafcde25de973310269613823271068.jpg_compressed.jpg', '9.9785313', '76.5884688', '2025-03-10', NULL, NULL, NULL),
(99, 18, '76.5884751', '9.9785107', '09:46:15', 'scaled_5bde3daa-c4ab-4b6e-9e92-e9f1125d7ed67287434544182724231.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-10', NULL, NULL, NULL),
(100, 7, '76.5901802', '9.9772828', '09:46:30', 'scaled_6d20fdb6-c7d9-4232-b07a-f78e09072bb9462583518337118404.jpg_compressed.jpg', '18:08:35', 'scaled_d1238fb2-b196-4168-bfdc-d9192e9e1b10140039050204955892.jpg_compressed.jpg', '9.9784971', '76.5884532', '2025-03-10', NULL, NULL, NULL),
(101, 16, '76.5884644', '9.9785077', '09:50:05', 'scaled_426da157-bae8-47ee-895a-f3eb62f3bc858733035972956883997.jpg_compressed.jpg', '16:45:41', 'scaled_228cabab-3f43-4087-b92c-4c3a4ac468fb9160356704313985449.jpg_compressed.jpg', '9.9785076', '76.5884969', '2025-03-10', NULL, NULL, NULL),
(102, 6, '76.5884722', '9.9785158', '10:09:33', 'scaled_32556fd0-1874-4a9c-9c71-1ce8c138c3b12189304665105790574.jpg_compressed.jpg', '18:24:15', 'scaled_7807251d-8667-474d-ba17-233da48813cb1399055550231744515.jpg_compressed.jpg', '9.9785094', '76.5884651', '2025-03-10', NULL, NULL, NULL),
(103, 4, '76.5884666', '9.978511', '10:14:28', 'scaled_45dd07f2-83ec-47ee-a101-f9f8f5dc76796421193198456855271.jpg_compressed.jpg', '18:07:24', 'scaled_3274035a-b1fa-44cf-b897-10e083a075758037906537448261479.jpg_compressed.jpg', '9.9785097', '76.588469', '2025-03-10', NULL, NULL, NULL),
(104, 2, '76.5884709', '9.9784929', '09:12:07', 'scaled_d2c7af27-6db5-418a-bda3-c71ddf6b0c058230885738429193223.jpg_compressed.jpg', '19:32:37', 'scaled_bee8e0b8-9139-4b9e-88a4-fe524c5666444061379026157563529.jpg_compressed.jpg', '9.9784703', '76.5885234', '2025-03-11', NULL, NULL, NULL),
(105, 5, '76.6384509', '9.984322', '09:29:32', 'scaled_7a4e54b7-180a-4ad2-864b-b62fd8c0babd7880240135758478028.jpg_compressed.jpg', '17:35:52', 'scaled_43fd01c4-3134-4d06-873d-72acb1298ae54552909641076359525.jpg_compressed.jpg', '9.9843105', '76.6384776', '2025-03-11', NULL, NULL, NULL),
(106, 15, '76.5884983', '9.9785129', '09:32:35', 'scaled_4d9de891-5dc1-441a-8947-fb2a934db8dc2769426524587700784.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-11', NULL, NULL, NULL),
(107, 14, '76.5885085', '9.97851', '09:34:35', 'scaled_711de235-d05d-4aec-b0c1-f7f5ff910d6e7485138933169029318.jpg_compressed.jpg', '18:13:39', 'scaled_bcfd2833-39a8-4835-8aad-20bdb66356b56480516907196943755.jpg_compressed.jpg', '9.9785165', '76.5885005', '2025-03-11', NULL, NULL, NULL),
(108, 3, '76.592347', '9.976688', '09:34:49', 'scaled_f1a2547f-ec1f-475d-b328-6f22770363494170406623157740220.jpg_compressed.jpg', '17:51:30', 'scaled_ebac0aac-f54a-4ce5-af15-1ca0aa5bef862518565453201005868.jpg_compressed.jpg', '9.9785153', '76.5885014', '2025-03-11', NULL, NULL, NULL),
(109, 9, '76.5884697', '9.9785236', '09:40:23', 'scaled_f09bd3a4-5179-4f52-a4e6-5af89b8a4fa33005144191511643422.jpg_compressed.jpg', '18:12:15', 'scaled_4a5b4bd4-08c4-47a8-9c51-bcaa83728ac98749730450957161425.jpg_compressed.jpg', '9.9785151', '76.5884748', '2025-03-11', NULL, NULL, NULL),
(110, 11, '76.588476', '9.9785202', '09:42:31', 'scaled_c5bfac16-df2e-4a4f-a866-4fb1a477b7533032459069695995935.jpg_compressed.jpg', '18:15:22', 'scaled_7592a5d1-2832-43d0-a427-95d74fb513ad300280899436807813.jpg_compressed.jpg', '9.9785267', '76.588471', '2025-03-11', NULL, NULL, NULL),
(111, 18, '76.588462', '9.9785037', '09:42:30', 'scaled_3089d2c8-a3a7-4e53-8a69-872b48b15d2f6513367602425306517.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-11', NULL, NULL, NULL),
(112, 7, '76.5884652', '9.9785108', '09:44:09', 'scaled_b1831c02-f656-4a53-86a2-98db574cc0482670743255671049969.jpg_compressed.jpg', '18:00:07', 'scaled_85918e9b-fb86-4e65-9739-daef3733ccea1954791041223517485.jpg_compressed.jpg', '9.9785112', '76.5884966', '2025-03-11', NULL, NULL, NULL),
(113, 6, '76.5884707', '9.9785054', '10:06:05', 'scaled_db1bbef3-88c0-41ae-9b96-c9a353fba55a4628863610108427576.jpg_compressed.jpg', '18:21:16', 'scaled_b86091ea-05d9-4b62-98e1-26da8ec2c07d7601095903168860579.jpg_compressed.jpg', '9.9785187', '76.5884697', '2025-03-11', NULL, NULL, NULL),
(114, 2, '76.5884942', '9.9784797', '09:01:47', 'scaled_83374dcd-cbb0-45e2-98b0-71e707ca12037546355945994184390.jpg_compressed.jpg', '19:12:53', 'scaled_46288f76-2035-4085-81e4-36f2176687fc175844200929344890.jpg_compressed.jpg', '9.9785085', '76.5884694', '2025-03-12', NULL, NULL, NULL),
(115, 9, '76.5884991', '9.978513', '09:14:10', 'scaled_a3c8cc7c-85e7-4cfa-9ff9-77290aee6e867725858279815786870.jpg_compressed.jpg', '17:43:38', 'scaled_622be996-b5e7-43bc-be4b-4cbf62b2f7d92224040046394183927.jpg_compressed.jpg', '9.9785095', '76.588469', '2025-03-12', NULL, NULL, NULL),
(116, 11, '76.5884745', '9.97852', '09:19:50', 'scaled_7fc0b09e-0975-4e59-99ec-4f092bc9d7e78930425165306994871.jpg_compressed.jpg', '14:24:49', 'scaled_9c7d44ed-b4ee-418e-87ac-b78e8db192222757495676110616122.jpg_compressed.jpg', '9.9785122', '76.5884607', '2025-03-12', NULL, NULL, NULL),
(117, 5, '76.6386796', '9.9843025', '09:29:01', 'scaled_12800893-1a04-489a-a805-3e7c45ebb1486432078669444591161.jpg_compressed.jpg', '17:33:20', 'scaled_ce86c3aa-f62a-4aa8-bc82-1682694b3ef0653848967426661485.jpg_compressed.jpg', '9.9843344', '76.6384012', '2025-03-12', NULL, NULL, NULL),
(118, 7, '76.5901802', '9.9772828', '09:35:38', 'scaled_610e366d-1fa2-4b02-b1f5-446c38e1f2756406471049711944404.jpg_compressed.jpg', '17:13:33', 'scaled_71fd5634-b5ec-4612-88c1-e3b36f870a977029162425536319000.jpg_compressed.jpg', '9.976688', '76.592347', '2025-03-12', NULL, NULL, NULL),
(119, 3, '76.5884991', '9.9785127', '09:35:41', 'scaled_a88f6022-75a8-41fc-a97a-45e283ba41b85608847835302228593.jpg_compressed.jpg', '17:45:23', 'scaled_79cffe9e-1718-4e7e-9ad7-9b22d8c3aa3e197770368729209362.jpg_compressed.jpg', '9.978507', '76.588504', '2025-03-12', NULL, NULL, NULL),
(120, 16, '76.588458', '9.978507', '09:49:06', 'scaled_c0208a1d-cedc-4385-b655-2aae1bffa1a23666551535836148624.jpg_compressed.jpg', '17:42:50', 'scaled_a20f9cdf-2e3a-452a-ac9a-5ee66c5022693880564720928455010.jpg_compressed.jpg', '9.9785101', '76.5884676', '2025-03-12', NULL, NULL, NULL),
(121, 6, '76.5884691', '9.9785168', '10:05:48', 'scaled_f0ba4b83-2810-48f4-9a4c-9a9228c29d5e6410481118605531247.jpg_compressed.jpg', '18:02:35', 'scaled_53fa4810-7172-4f99-8283-ddc7f23883a97459137432361032906.jpg_compressed.jpg', '9.9785086', '76.5884662', '2025-03-12', NULL, NULL, NULL),
(122, 24, '76.5884877', '9.9784999', '09:05:50', 'scaled_58392d3f-1b98-4e73-b0c5-97e433b7abab1954322382564612071.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-13', NULL, NULL, NULL),
(123, 2, '76.5885899', '9.9784324', '09:12:25', 'scaled_d47d8068-8360-4cb3-947c-e2655f7e5b2c7262993223535864178.jpg_compressed.jpg', '19:16:22', 'scaled_deb507ec-105b-44ec-9948-654009492ba96112242518979752612.jpg_compressed.jpg', '9.9784047', '76.5885077', '2025-03-13', NULL, NULL, NULL),
(124, 9, '76.5884746', '9.978521', '09:18:34', 'scaled_5d077ca6-ea79-4dde-95f8-6ec0c9f499db8955134533653764603.jpg_compressed.jpg', '18:00:23', 'scaled_42f024bc-96ec-4182-b18d-1d7eebbbe6966129205415697964352.jpg_compressed.jpg', '9.9785035', '76.5884569', '2025-03-13', NULL, NULL, NULL),
(125, 5, '76.6386893', '9.9843551', '09:30:18', 'scaled_ce555b23-bf37-40cb-b636-0449eb979eb28564494969610140320.jpg_compressed.jpg', '17:33:51', 'scaled_83d64246-6683-4ffd-ac89-d63e0a5d78d0953072551417876009.jpg_compressed.jpg', '9.9843108', '76.6384593', '2025-03-13', NULL, NULL, NULL),
(126, 14, '76.5885081', '9.9785156', '09:38:24', 'scaled_7d954e14-302c-4687-a29a-add2bd782fdb3971774758329699365.jpg_compressed.jpg', '17:51:43', 'scaled_a8242c33-e5c6-40b0-b60d-c9a4775206763075708373084670372.jpg_compressed.jpg', '9.9785137', '76.5885013', '2025-03-13', NULL, NULL, NULL),
(127, 3, '76.5872233', '9.9789283', '09:38:31', 'scaled_e43a560b-a9cb-41ec-8cdd-0cc7ffc830a76762650290782014374.jpg_compressed.jpg', '17:34:09', 'scaled_7d0efc2e-2999-44a4-85fe-701342d7c4cd8499715463088892172.jpg_compressed.jpg', '9.9772828', '76.5901802', '2025-03-13', NULL, NULL, NULL),
(128, 7, '76.5884652', '9.9785143', '09:47:17', 'scaled_bb03785b-187d-42c5-b951-58b8e9fa87c3958443065473596108.jpg_compressed.jpg', '17:39:41', 'scaled_8dc55a80-45e7-4798-84ee-d0a3d2fbc4377898987464746685370.jpg_compressed.jpg', '9.9785096', '76.5884843', '2025-03-13', NULL, NULL, NULL),
(129, 11, '76.5884565', '9.978502', '09:49:54', 'scaled_8caaf682-11cd-4728-b583-1a4f2545b5e73944705097723157618.jpg_compressed.jpg', '18:05:20', 'scaled_2c6c1354-303f-4f9a-8ffa-75d6dddbfd5f8765775169014220949.jpg_compressed.jpg', '9.9785178', '76.5884637', '2025-03-13', NULL, NULL, NULL),
(130, 16, '76.5885054', '9.9785116', '09:53:27', 'scaled_f5f9c388-763c-40da-992b-5b5fb4c7cd395419042801320040900.jpg_compressed.jpg', '17:39:30', 'scaled_513f3bbb-f144-46f5-9f62-0ad29e1a449f7274216900029427126.jpg_compressed.jpg', '9.9785176', '76.588462', '2025-03-13', NULL, NULL, NULL),
(131, 4, '76.5884647', '9.9785074', '09:54:39', 'scaled_2c33a09b-b7a4-4a20-a7cc-b752adcc62e44055305820007064074.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-13', NULL, NULL, NULL),
(132, 6, '76.5884658', '9.9785085', '10:19:31', 'scaled_ba3a82c4-13e0-48aa-b2f3-432feda1aab52381076763542438969.jpg_compressed.jpg', '18:12:28', 'scaled_25758a9d-0add-4cdb-b9a4-0652379da7803164973491867148934.jpg_compressed.jpg', '9.978511', '76.5884595', '2025-03-13', NULL, NULL, NULL),
(133, 24, '76.5885173', '9.9785088', '09:06:45', 'scaled_ac992f9f-58db-4a68-813b-27580c755c5f8334703311364359509.jpg_compressed.jpg', '19:25:47', 'scaled_90531701-df9a-4361-9432-4259565174656207203249371405868.jpg_compressed.jpg', '9.9784475', '76.5886172', '2025-03-14', NULL, NULL, NULL),
(134, 2, '76.5885032', '9.9785103', '09:13:39', 'scaled_7cfd6a1b-ae94-4141-a5a8-3b45c4849b787768021663346176932.jpg_compressed.jpg', '19:35:51', 'scaled_c4201fe0-b679-4bd3-8e77-a46edd1dcd536467140026748254623.jpg_compressed.jpg', '9.9783022', '76.5884988', '2025-03-14', NULL, NULL, NULL),
(135, 9, '76.5884986', '9.978513', '09:16:24', 'scaled_9a6cded5-6533-4492-9ee2-034fd860c4d75409205342511634124.jpg_compressed.jpg', '17:59:58', 'scaled_9efff912-9069-4c56-8f52-15611863568a6980658551384003150.jpg_compressed.jpg', '9.9785308', '76.5884812', '2025-03-14', NULL, NULL, NULL),
(136, 5, '76.6386761', '9.984313', '09:27:51', 'scaled_c2a7fcb0-fda9-491b-b2e5-4ebef07d5f8b9197401333877333579.jpg_compressed.jpg', '17:37:03', 'scaled_43efe63f-7ba2-42bf-a57a-17791ddbc5ec8714397665799633147.jpg_compressed.jpg', '9.984311', '76.6384591', '2025-03-14', NULL, NULL, NULL),
(137, 3, '76.588505', '9.9785169', '09:36:54', 'scaled_aa781795-6bd7-4ce6-9215-8dbf37c392fd8907198891702878249.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-14', NULL, NULL, NULL),
(138, 14, '76.588511', '9.9785112', '09:44:56', 'scaled_6e75506b-aba2-42b3-a22a-92bb7a6c411e3753907921272134696.jpg_compressed.jpg', '18:06:40', 'scaled_56359fc6-c720-4376-9620-b03b6d2e28f94589917507868848327.jpg_compressed.jpg', '9.9785161', '76.5885025', '2025-03-14', NULL, NULL, NULL),
(139, 11, '76.5884665', '9.9785243', '09:45:45', 'scaled_10967650-ab0d-46d6-9996-f269ca3a4c642392387960248466707.jpg_compressed.jpg', '18:04:38', 'scaled_a328c682-8a2b-4f6f-aac3-7a543d86702f7117134365055216172.jpg_compressed.jpg', '9.9784987', '76.5884681', '2025-03-14', NULL, NULL, NULL),
(140, 4, '76.5884729', '9.9785108', '09:48:00', 'scaled_8331cd11-4162-48de-9dc9-5d294bfc53902649227798622482407.jpg_compressed.jpg', '17:47:58', 'scaled_f3691f31-057e-4b92-82b9-e655b8c83c7e4612645813385076815.jpg_compressed.jpg', '9.9785105', '76.5884674', '2025-03-14', NULL, NULL, NULL),
(141, 7, '76.5884671', '9.9785044', '09:48:06', 'scaled_3d604bb5-b66c-4f3c-9310-71f967fb6f4b7328493772772595148.jpg_compressed.jpg', '17:45:05', 'scaled_34c9160c-41c3-4bcb-9b40-1f16808bf18a2216485343311993358.jpg_compressed.jpg', '9.9785142', '76.5884785', '2025-03-14', NULL, NULL, NULL),
(142, 16, '76.5884738', '9.978529', '09:55:46', 'scaled_f051a7f6-62eb-4cf3-8dd8-a8ba24c38e002441887088908405022.jpg_compressed.jpg', '17:44:00', 'scaled_ac4727fc-afa8-4145-82d3-e9f1922fb6849210046223372235662.jpg_compressed.jpg', '9.978504', '76.58848', '2025-03-14', NULL, NULL, NULL),
(143, 6, '76.5884694', '9.9785095', '10:06:38', 'scaled_50a5d010-3fee-4b11-ae61-f46a0b332444896217480400552524.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-14', NULL, NULL, NULL),
(144, 24, '76.5889274', '9.9781826', '08:55:10', 'scaled_aa9cb91e-5d38-445e-a040-b3e40f4a14d73923688446803820447.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-15', NULL, NULL, NULL),
(145, 2, '76.5884894', '9.9785039', '09:18:31', 'scaled_b48e36b8-b4c9-47b6-ae96-b958616b89ad5682285473961049892.jpg_compressed.jpg', '19:27:02', 'scaled_cf20f833-e0b0-4c08-aefc-38d36553086c4978259527442458493.jpg_compressed.jpg', '9.9785119', '76.5884741', '2025-03-15', NULL, NULL, NULL),
(146, 14, '76.5885001', '9.9785136', '09:31:37', 'scaled_5a55a8ff-fa43-4f1c-b276-ff5b632387de8373057975305619660.jpg_compressed.jpg', '17:52:17', 'scaled_8a9d963d-8d6f-4b22-b881-06321dc889675207260429603854007.jpg_compressed.jpg', '9.9785142', '76.5884989', '2025-03-15', NULL, NULL, NULL),
(147, 5, '76.6387405', '9.9845893', '09:34:52', 'scaled_4a6cc05e-dfe3-4c3c-82e3-a6d05a6cefeb3169236582845076160.jpg_compressed.jpg', '17:32:49', 'scaled_21eaa336-2b70-4821-a511-0252814c3c9d9221113423661142790.jpg_compressed.jpg', '9.9843219', '76.6384571', '2025-03-15', NULL, NULL, NULL),
(148, 11, '76.5887116', '9.9783909', '09:38:41', 'scaled_70220aab-1db1-46ef-88f6-4558e6867ee01561371294168358002.jpg_compressed.jpg', '17:57:12', 'scaled_746cb8eb-c5a1-4f14-8d75-f7bd92737a7d69583062079896460.jpg_compressed.jpg', '9.978533', '76.5884899', '2025-03-15', NULL, NULL, NULL),
(149, 9, '76.588507', '9.9785106', '09:39:05', 'scaled_86426c06-cafb-4338-8f7e-87b1f57b54146602105486626860467.jpg_compressed.jpg', '17:50:16', 'scaled_545aa52c-da29-46aa-b971-df73fcff11ea7597210676574795335.jpg_compressed.jpg', '9.978507', '76.5884655', '2025-03-15', NULL, NULL, NULL),
(150, 7, '76.5884731', '9.9785196', '09:41:02', 'scaled_335fd46a-14d4-428c-8dcf-a40e1d1587d25298089553354499287.jpg_compressed.jpg', '17:34:16', 'scaled_93a186b2-bff7-4f5b-83ce-7ff4984ccbbd4207124619238613802.jpg_compressed.jpg', '9.9785041', '76.5884669', '2025-03-15', NULL, NULL, NULL),
(151, 4, '76.5885055', '9.9785117', '09:41:45', 'scaled_1fca0bea-ddc6-488b-855e-087cdae3644e5181691694311840117.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-15', NULL, NULL, NULL),
(152, 6, '76.5884724', '9.9785092', '10:35:50', 'scaled_e090290c-6e88-406a-b06d-6c0492b3fcfa5070155759280298504.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-15', NULL, NULL, NULL),
(153, 2, '76.5886214', '9.9782237', '09:06:44', 'scaled_d8125c76-bdc6-4b6f-ab98-48db2d179cae8417971958147931279.jpg_compressed.jpg', '18:57:08', 'scaled_30ea3487-572e-462a-b2ea-4ba9ac01bf7b6185901850310253211.jpg_compressed.jpg', '9.9784996', '76.5884433', '2025-03-17', NULL, NULL, NULL),
(154, 24, '76.5885039', '9.9785126', '09:07:10', 'scaled_df1fb8d0-c15e-4cbc-a3f1-029b9faae1af2356411488437416019.jpg_compressed.jpg', '19:02:10', 'scaled_86ce0403-25c8-4405-aebc-d538da9f6eb66421497566330415674.jpg_compressed.jpg', '9.9783729', '76.5886201', '2025-03-17', NULL, NULL, NULL),
(155, 9, '76.5884944', '9.9785042', '09:37:33', 'scaled_7594f19f-7001-4801-9251-1dba38087ada5826047203601744828.jpg_compressed.jpg', '18:18:09', 'scaled_7f679382-e185-4197-abf0-a24ebe229eef109979412162569197.jpg_compressed.jpg', '9.9785098', '76.5884649', '2025-03-17', NULL, NULL, NULL),
(156, 3, '76.5881567', '9.9784317', '09:38:04', 'scaled_85bd30c7-5851-470a-bfc3-ff681d37a2249150480586062780526.jpg_compressed.jpg', '18:18:29', 'scaled_d8a94a44-43a1-44be-b59f-6f6d76f255383259369531453709548.jpg_compressed.jpg', '9.976688', '76.592347', '2025-03-17', NULL, NULL, NULL),
(157, 11, '76.5884455', '9.9785081', '09:40:07', 'scaled_e65d5f92-d06f-4a0a-889c-fac428a98de63398842153008315270.jpg_compressed.jpg', '18:17:55', 'scaled_7c3fded3-a2fb-41a4-82d7-7ae90cccbe6b8529206645708109160.jpg_compressed.jpg', '9.9785133', '76.5884629', '2025-03-17', NULL, NULL, NULL),
(158, 4, '76.5884653', '9.9785117', '09:47:30', 'scaled_ad848611-312d-4ab6-8ced-d26bc5dc2d2a5264921926986751651.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-17', NULL, NULL, NULL),
(159, 14, '76.5885041', '9.9785138', '09:49:18', 'scaled_f0f3b3db-bb1c-44e3-8d6a-b39926f0207b6051821713521554712.jpg_compressed.jpg', '18:23:25', 'scaled_978ee951-a2cb-488e-8eac-e51fdeca05685889900460332427696.jpg_compressed.jpg', '9.9785139', '76.5884967', '2025-03-17', NULL, NULL, NULL),
(160, 5, '76.5883243', '9.9785924', '09:49:36', 'scaled_6a71c5c0-0da2-4b8a-b4d2-4f1a4154ad182987199637618999020.jpg_compressed.jpg', '17:40:02', 'scaled_31127e77-8671-4d21-8117-1dd1af2caa821098689094171422068.jpg_compressed.jpg', '9.9843109', '76.6384586', '2025-03-17', NULL, NULL, NULL),
(161, 16, '76.5884644', '9.9785149', '09:51:50', 'scaled_47ab1912-d2d7-4b1d-b46c-cd3887be94961476244026799628529.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-17', NULL, NULL, NULL),
(162, 6, '76.5884805', '9.9785081', '10:18:07', 'scaled_8a0f3a10-ec02-48ce-b021-82239072e6363307348961942213318.jpg_compressed.jpg', '18:19:03', 'scaled_568ada21-42ea-4c4d-ac15-a09260e1da921353867468806049349.jpg_compressed.jpg', '9.9785062', '76.5884583', '2025-03-17', NULL, NULL, NULL),
(163, 7, '76.5884596', '9.9785069', '9:44:00', 'scaled_3ebf1d17-a8a2-4df0-8212-1803abdd1ad25104061978607427306.jpg_compressed.jpg', '17:58:27', 'scaled_a5c5f139-8052-4973-a5c3-beb57612faad3496116518612511084.jpg_compressed.jpg', '9.978611', '76.5884946', '2025-03-17', NULL, NULL, NULL),
(164, 2, '76.5884936', '9.978499', '09:08:48', 'scaled_645422a2-cabf-4c68-bcb7-eac0e284ceb35069026587413207361.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(165, 5, '76.6386809', '9.9843108', '09:16:10', 'scaled_d420c53a-a98c-4ae7-a230-9267b55e98867073096342594237160.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(166, 9, '76.5884937', '9.978518', '09:18:29', 'scaled_fc716cc1-af46-4360-97d9-6ec431887a667758423522753498039.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(167, 3, '76.5898191', '9.9779512', '09:35:26', 'scaled_5458ef58-bccf-419b-881e-1ab9a738d9b85376560047441463206.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(168, 7, '76.5884625', '9.9785108', '09:45:08', 'scaled_5cce1ee3-eb1d-4402-a90b-d465859346447547147283492513763.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(169, 11, '76.5884795', '9.9785252', '09:45:59', 'scaled_f67e5292-e1f9-4aa9-b218-f63c3f7aacd48917449501561150105.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(170, 14, '76.5885133', '9.978527', '09:51:03', 'scaled_5e676f0e-7ac5-4ddb-a077-6ac4b809b2034126387550215324797.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(171, 16, '76.5884737', '9.9785177', '09:51:31', 'scaled_75afa140-d07d-4b67-9886-67c1deed58297363809563416993535.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL),
(172, 6, '76.5884638', '9.9785054', '10:00:55', 'scaled_8feeb276-f4ef-4c64-821b-f400366190354353710048899736629.jpg_compressed.jpg', NULL, NULL, NULL, NULL, '2025-03-18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE `tbl_branches` (
  `id` int NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_branches`
--

INSERT INTO `tbl_branches` (`id`, `branch`, `createdAt`, `updatedAt`) VALUES
(1, 'JK GROUP HEAD OFFICE', '2024-09-02 04:55:17', '2024-09-02 04:55:17'),
(2, 'Ayavana', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_categories`
--

CREATE TABLE `tbl_business_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `business_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_business_categories`
--

INSERT INTO `tbl_business_categories` (`id`, `business_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Consultancy', '2025-01-22 09:36:26', '2025-01-22 09:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cards`
--

CREATE TABLE `tbl_cards` (
  `id` int NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `bank` varchar(100) NOT NULL,
  `current_amount` float NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_date` date DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_cards`
--

INSERT INTO `tbl_cards` (`id`, `holder_name`, `expiry_date`, `bank`, `current_amount`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'DIVYA KURIAN', '2026-04-30', 'SBI', 0, 9, '2025-01-30', NULL, NULL),
(2, 'ROBIN', '2028-03-31', 'HDFC', 200000, 9, '2025-01-30', NULL, NULL),
(3, 'JEEVAN JOHN', '2025-12-31', 'HDFC', 0, 9, '2025-01-30', NULL, NULL),
(4, 'BIBIN SIVAN', '2031-12-31', 'SBI', 0, 9, '2025-01-30', NULL, NULL),
(5, 'ABIN MUTHOOT  HDFC', '2031-03-31', 'HDFC', 0, 9, '2025-01-30', NULL, NULL),
(6, 'ABIN MUTHOOT AXIS', '2028-12-31', 'AXIS', 0, 9, '2025-01-30', NULL, NULL),
(7, 'ABIN MUTHOOT KOTAK', '2027-01-31', 'KOTAK', 0, 9, '2025-01-30', NULL, NULL),
(8, 'ABIN MUTHOOT ICICI', '2025-07-31', 'ICICI', 112535, 9, '2025-01-30', NULL, NULL),
(9, 'SALMON(SONU) INDUSIND', '2028-08-31', 'INDUSIND', 35000, 9, '2025-01-30', NULL, NULL),
(10, 'SALMON(SONU)RBL', '2027-03-31', 'RBL', 0, 9, '2025-01-30', NULL, NULL),
(11, 'NIZAMUDHEEN  RBL', '2028-04-30', 'RBL', 45000, 9, '2025-01-30', NULL, NULL),
(12, 'SALMON(VISHNU) KOTAK', '2028-04-30', 'KOTAK', 100000, 9, '2025-01-30', NULL, NULL),
(13, 'SALMON (ANOOP)RBL', '2028-05-31', 'RBL', 0, 9, '2025-01-31', NULL, NULL),
(14, 'SALMON (VISHNU) ONE', '2031-06-30', 'BOB', 0, 9, '2025-02-01', NULL, NULL),
(15, 'ROSHAN JACOB ONE', '2027-06-30', 'FEDERAL', 0, 9, '2025-02-04', NULL, NULL),
(16, 'NIZAMUDHEEN  YES', '2025-03-20', 'YES BANK', 132403, 9, '2025-02-15', NULL, NULL),
(17, 'NAHAS T', '2027-12-31', 'IDFC', 0, 9, '2025-02-21', NULL, NULL),
(18, 'REGEEF YES', '2029-12-31', 'YES', 70000, 9, '2025-02-21', NULL, NULL),
(19, 'REGEEF RBL', '2029-10-31', 'RBL', 0, 9, '2025-02-21', NULL, NULL),
(20, 'NONU', '2029-04-30', 'INDUSIND', 100000, 9, '2025-02-25', NULL, NULL),
(21, 'BIBIN', '2029-04-30', 'SBI', 0, 9, '2025-02-25', NULL, NULL),
(22, 'CUSTOMER PAYMENT CARD (UNITED)', '2026-07-22', 'OTHER', 16000, 9, '2025-03-03', NULL, NULL),
(23, 'SALMON (ANOOP) KOTAK', '2027-02-28', 'KOTAK', 0, 9, '2025-03-04', NULL, NULL),
(24, 'LIJO  ICICI', '2026-10-31', 'ICICI', 0, 9, '2025-03-04', NULL, NULL),
(25, 'SALMON(ELDHOSE) RBL', '2027-06-30', 'RBL', 0, 9, '2025-03-04', NULL, NULL),
(26, 'NIZAMUDHEEN HDFC', '2027-05-31', 'HDFC', 67455, 9, '2025-03-04', NULL, NULL),
(27, 'SALMON (ELDHOSE) AXIS', '2028-03-31', 'AXIS', 0, 9, '2025-03-04', NULL, NULL),
(28, 'SALMON(ELDHOSE) SBI', '2027-07-31', 'SBI', 21770, 9, '2025-03-05', NULL, NULL),
(29, 'CUSTOMER PAYMENT CARD(NEW INDIA)', '2027-08-31', 'OTHER', 68967, 9, '2025-03-05', NULL, NULL),
(30, 'MANU MANI ONE', '2031-07-31', 'FEDERAL', 0, 9, '2025-03-06', NULL, NULL),
(31, 'NEETHU HDFC', '2027-01-30', 'HDFC', 0, 9, '2025-03-07', NULL, NULL),
(32, 'RAGEEF HDFC', '2027-06-30', 'HDFC', 8406, 9, '2025-03-07', NULL, NULL),
(33, 'LIJO INDUSIND', '2027-02-28', 'INDUSIND', 54219, 9, '2025-03-08', NULL, NULL),
(34, 'REGEEF INDUSIND', '2027-04-30', 'INDUSIND', 0, 9, '2025-03-08', NULL, NULL),
(35, 'SALMON(ANOOP) FEDERAL', '2027-04-30', 'FEDERAL', 0, 9, '2025-03-08', NULL, NULL),
(36, 'SAJI HDFC', '2026-01-31', 'SBI', 0, 9, '2025-03-08', NULL, NULL),
(37, 'HDFC MUHAMMED  SBI', '2027-04-30', 'SBI', 0, 9, '2025-03-10', NULL, NULL),
(38, 'SALMON(ANOOP) SBI', '2027-03-31', 'SBI', 15500, 9, '2025-03-10', NULL, NULL),
(39, 'RAGEEF SBI', '2027-09-30', 'SBI', 100000, 9, '2025-03-13', NULL, NULL),
(40, 'ABIN SIVAN ONE', '2027-01-30', 'ONE', 100000, 9, '2025-03-18', NULL, NULL),
(41, 'MUHAMMED ICICI', '2027-12-31', 'ICICI', 80000, 9, '2025-03-18', NULL, NULL),
(42, 'LIJO KOTAK', '2027-03-31', 'KOTAK', 45000, 9, '2025-03-18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_contact_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_gst` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `id` int NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`id`, `company`, `phone`, `created_by`, `created_date`, `createdAt`, `updatedAt`) VALUES
(1, 'Infocomm', '9456785653', 10, '2025-01-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int NOT NULL,
  `country` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_coverage_types` (
  `id` int NOT NULL,
  `coverage_type` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_creditcard_payments` (
  `id` int NOT NULL,
  `card_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `credit` float NOT NULL,
  `credited_date` date DEFAULT NULL,
  `purpose` text,
  `due_date` date DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '0-Pending,1-Piad',
  `status_changed_date` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_creditcard_payments`
--

INSERT INTO `tbl_creditcard_payments` (`id`, `card_id`, `provider_id`, `credit`, `credited_date`, `purpose`, `due_date`, `status`, `status_changed_date`, `created_by`, `created_date`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(1, 15, 3, 80000, '2025-03-01', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-03 00:00:00', NULL, NULL, NULL, NULL),
(4, 22, 3, 25000, '2025-03-01', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-03 00:00:00', NULL, NULL, NULL, NULL),
(5, 22, 3, 3600, '2025-03-01', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-03 00:00:00', NULL, NULL, NULL, NULL),
(6, 22, 12, 5500, '2025-03-01', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-03 00:00:00', NULL, NULL, NULL, NULL),
(7, 15, 12, 20000, '2025-03-01', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(8, 13, 3, 80000, '2025-03-03', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', 9, '2025-03-04 04:25:02', NULL, NULL),
(9, 23, 3, 50000, '2025-03-01', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(10, 24, 3, 60000, '2025-03-03', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(11, 26, 12, 55000, '2025-03-03', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(12, 27, 3, 36000, '2025-03-03', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(13, 25, 3, 41000, '2025-03-03', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-04 00:00:00', NULL, NULL, NULL, NULL),
(14, 22, 3, 59000, '2025-03-04', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(15, 22, 12, 5500, '2025-03-04', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(16, 7, 12, 50000, '2025-03-04', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(17, 22, 12, 14400, '2025-03-04', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(18, 10, 3, 75000, '2025-03-04', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(19, 28, 12, 35000, '2025-03-04', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(20, 7, 13, 1313, '2025-03-04', 'LINK', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(21, 7, 13, 13728, '2025-03-03', 'LINK', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(22, 7, 18, 22740, '2025-03-01', 'LINK', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(23, 7, 18, 17699, '2025-03-04', 'LINK', NULL, NULL, NULL, 9, '2025-03-05 00:00:00', NULL, NULL, NULL, NULL),
(24, 29, 12, 4867, '2025-03-05', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(25, 29, 12, 12100, '2025-03-05', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(26, 16, 8, 19193, '2025-03-05', 'LINK', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(27, 7, 13, 16472, '2025-03-05', 'LINK', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(28, 10, 3, 35000, '2025-03-05', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(29, 22, 3, 33800, '2025-03-05', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(30, 7, 18, 39937, '2025-03-05', 'LINK', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(31, 30, 3, 12000, '2025-03-05', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(32, 31, 3, 150000, '2025-03-06', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(33, 32, 13, 11902, '2025-03-06', 'LINK', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(34, 32, 3, 50000, '2025-03-06', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(35, 7, 13, 8942, '2025-03-06', 'LINK', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(36, 32, 13, 20899, '2025-03-06', 'LINK', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(37, 32, 19, 2674, '2025-03-06', 'LINK', NULL, NULL, NULL, 9, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(38, 29, 12, 6400, '2025-03-07', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(39, 34, 3, 50000, '2025-03-07', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(40, 33, 8, 12155, '2025-03-07', 'LINK', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(41, 33, 19, 14804, '2025-03-07', 'LINK', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(42, 33, 18, 17165, '2025-03-07', 'LINK', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(43, 33, 8, 5000, '2025-03-07', 'LINK', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(44, 35, 3, 100000, '2025-03-07', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(45, 35, 3, 25000, '2025-03-07', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(46, 33, 8, 8000, '2025-03-08', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(47, 33, 18, 33790, '2025-03-08', 'LINK', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(48, 33, 3, 14086, '2025-03-08', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(49, 36, 3, 100000, '2025-03-08', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(50, 36, 3, 100000, '2025-03-08', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(51, 38, 3, 50000, '2025-03-10', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(52, 38, 3, 50000, '2025-03-10', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(53, 37, 3, 80000, '2025-03-10', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(54, 29, 12, 24400, '2025-03-10', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(55, 20, 3, 60000, '2025-03-10', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(56, 20, 12, 29006, '2025-03-11', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(57, 23, 18, 35665, '2025-03-11', 'LINK', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(58, 20, 5, 10994, '2025-03-11', 'LINK', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(59, 23, 8, 1796, '2025-03-11', 'LINK', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(60, 8, 3, 60000, '2025-03-11', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(61, 8, 3, 60000, '2025-03-11', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-11 00:00:00', NULL, NULL, NULL, NULL),
(62, 22, 3, 24900, '2025-03-12', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-13 00:00:00', NULL, NULL, NULL, NULL),
(63, 29, 12, 25000, '2025-03-12', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-13 00:00:00', NULL, NULL, NULL, NULL),
(64, 39, 13, 7429, '2025-03-12', 'LINK', NULL, NULL, NULL, 9, '2025-03-13 00:00:00', NULL, NULL, NULL, NULL),
(65, 39, 18, 16095, '2025-03-12', 'LINK', NULL, NULL, NULL, 9, '2025-03-13 00:00:00', NULL, NULL, NULL, NULL),
(66, 39, 3, 46476, '2025-03-12', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-13 00:00:00', NULL, NULL, NULL, NULL),
(67, 29, 12, 17700, '2025-03-13', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(68, 12, 3, 50000, '2025-03-13', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(69, 39, 18, 6926, '2025-03-13', 'LINK', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(70, 39, 18, 7163, '2025-03-13', 'LINK', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(71, 39, 13, 10115, '2025-03-13', 'LINK', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(72, 39, 3, 5796, '2025-03-13', 'RECHARHE', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(73, 12, 3, 50000, '2025-03-13', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(74, 8, 18, 43203, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-14 00:00:00', NULL, NULL, NULL, NULL),
(75, 2, 18, 18202, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(76, 2, 8, 60071, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(77, 2, 8, 60071, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(78, 2, 4, 17569, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(79, 2, 13, 10971, '2025-03-14', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(80, 2, 3, 33116, '2025-03-14', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(81, 26, 3, 55000, '2025-03-14', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(82, 40, 3, 50000, '2025-03-14', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(83, 40, 3, 50000, '2025-03-14', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(84, 11, 3, 45000, '2025-03-15', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(85, 41, 3, 70000, '2025-03-15', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(86, 42, 12, 45000, '2025-03-15', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(87, 16, 18, 32210, '2025-03-17', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(88, 16, 3, 100000, '2025-03-17', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(89, 18, 12, 70000, '2025-03-17', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(90, 41, 3, 1167, '2025-03-17', 'LINK', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(91, 9, 3, 35000, '2025-03-17', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(92, 22, 3, 16000, '2025-03-17', 'PAYMENT', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL),
(93, 41, 3, 8833, '2025-03-17', 'RECHARGE', NULL, NULL, NULL, 9, '2025-03-18 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit_repayments`
--

CREATE TABLE `tbl_credit_repayments` (
  `id` int NOT NULL,
  `credit_pay_id` int NOT NULL,
  `repay_amount` float NOT NULL,
  `repay_date` date NOT NULL,
  `added_by` int NOT NULL,
  `added_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_credit_repayments`
--

INSERT INTO `tbl_credit_repayments` (`id`, `credit_pay_id`, `repay_amount`, `repay_date`, `added_by`, `added_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 31, 12000, '2025-03-05', 9, '2025-03-06 04:03:01', NULL, NULL, '2025-03-06 04:03:01', '2025-03-06 04:03:01'),
(2, 11, 55000, '2025-03-05', 9, '2025-03-06 04:05:27', NULL, NULL, '2025-03-06 04:05:27', '2025-03-06 04:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealers`
--

CREATE TABLE `tbl_dealers` (
  `id` int NOT NULL,
  `dealer_name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int NOT NULL,
  `department` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `department`, `createdAt`, `updatedAt`) VALUES
(1, 'HR DEPARTMENT', '2024-09-02 07:35:32', '2024-09-03 08:04:55'),
(2, 'MARKETING', '2024-09-03 08:05:11', '2024-09-03 08:05:11'),
(3, 'CEO', NULL, NULL),
(4, 'Sales', NULL, NULL),
(5, 'Insurence', NULL, NULL),
(6, 'JK Wheels', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designations`
--

CREATE TABLE `tbl_designations` (
  `id` int NOT NULL,
  `designation` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
(7, 'Executive', NULL, NULL),
(8, 'Alignment', NULL, NULL),
(9, 'Accessories', NULL, NULL),
(10, 'Cooling Film', NULL, NULL),
(11, 'Digital Marketing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `state_id` int NOT NULL,
  `district` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_date` date NOT NULL DEFAULT '2024-12-15',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_types`
--

CREATE TABLE `tbl_expense_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_expense_types`
--

INSERT INTO `tbl_expense_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Stationary', '2024-12-20 00:01:07', '2024-12-20 00:01:07'),
(2, 'Printers', '2025-01-16 10:31:40', '2025-01-16 10:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicies`
--

CREATE TABLE `tbl_healthpolicies` (
  `id` bigint UNSIGNED NOT NULL,
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
  `paid_amount` float NOT NULL DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `referred_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `policy_mode` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `prepared_user_id` int DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_healthpolicies`
--

INSERT INTO `tbl_healthpolicies` (`id`, `policy_category_id`, `type`, `company_id`, `name`, `birth_date`, `age`, `height`, `weight`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `premium_amount`, `customer_premium_amount`, `sum_insured`, `term`, `nominee_name`, `nominee_relation`, `executive_id`, `status`, `paid_amount`, `due_amount`, `referred_id`, `provider_id`, `note`, `policy_mode`, `created_by`, `created_date`, `edited_by`, `edited_date`, `prepared_user_id`, `prepared_date`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, 'SHYJU', '1975-01-05', 50, 163, 60, '7012841746', NULL, '2025-03-03', '2026-03-03', 22740.00, 21000, 4.00, '1year', NULL, NULL, 13, 1, 22740, 0, 182, 18, NULL, 2, 3, '2025-03-06 07:42:53', 3, '2025-03-06 11:32:53', NULL, '2025-03-06', '2025-03-06 12:42:53', '2025-03-08 14:21:38'),
(3, 1, 1, NULL, 'AJIMS', '1980-12-18', 44, 163, 64, '9207135825', NULL, '2025-03-03', '2026-03-03', 13728.00, 13700, 5.00, '1year', NULL, NULL, 13, 1, 13728, 0, 183, 13, NULL, 1, 3, '2025-03-06 07:47:44', NULL, NULL, 3, '2025-03-06', '2025-03-06 12:47:44', '2025-03-08 12:36:26'),
(4, 1, 1, NULL, 'RENJITH AK', '1988-12-25', 36, 154, 56, '9746877560', NULL, '2025-03-04', '2026-03-04', 17669.00, 16000, 5.00, '1year', NULL, NULL, 13, 0, 0, 0, 184, 18, NULL, 2, 3, '2025-03-06 07:52:34', 3, '2025-03-06 11:33:28', 3, '2025-03-06', '2025-03-06 12:52:34', '2025-03-06 16:33:28'),
(5, 1, 1, NULL, 'GEORGE', '1974-04-17', 50, 160, 62, '7994631369', NULL, '2025-03-05', '2026-03-05', 16472.00, 16400, 5.00, '1year', NULL, NULL, 13, 1, 16472, 0, 186, 13, NULL, 1, 3, '2025-03-06 07:56:04', NULL, NULL, NULL, '2025-03-06', '2025-03-06 12:56:04', '2025-03-08 12:33:06'),
(6, 1, 1, NULL, 'ANOOP JOSE', '1980-05-24', 44, 168, 68, '9811999291', NULL, '2025-03-20', '2026-03-20', 39936.00, 39900, 5.00, '1year', NULL, NULL, 13, 0, 39936, 0, 187, 18, NULL, 2, 3, '2025-03-06 08:53:10', NULL, NULL, NULL, '2025-03-06', '2025-03-06 13:53:10', '2025-03-08 12:32:28'),
(7, 1, 1, NULL, 'HARIZ MUHAMMED', '1986-05-01', 38, 162, 62, '9447959987', NULL, '2025-03-18', '2026-03-18', 8942.00, 8500, 5.00, '1year', NULL, NULL, 13, 1, 8942, 0, 188, 13, NULL, 2, 3, '2025-03-06 08:59:50', NULL, NULL, NULL, '2025-03-06', '2025-03-06 13:59:50', '2025-03-08 12:28:54'),
(8, 1, 1, NULL, 'NANDU', '1993-05-27', 31, 170, 75, '9605646103', NULL, '2025-03-06', '2026-03-05', 11902.00, 11900, 4.00, '1year', NULL, NULL, 13, 1, 11902, 0, 189, 13, NULL, 1, 3, '2025-03-06 09:14:27', NULL, NULL, 3, '2025-03-06', '2025-03-06 14:14:27', '2025-03-08 12:23:27'),
(9, 1, 4, NULL, 'MIDHUN', '1992-12-23', 32, 162, 60, '9400249815', NULL, '2025-03-17', '2026-03-16', 2674.00, 1600, 90000.00, '1year', NULL, NULL, 13, 1, 2674, 0, 196, 19, NULL, 2, 3, '2025-03-06 11:47:54', NULL, NULL, NULL, '2025-03-06', '2025-03-06 16:47:54', '2025-03-08 12:21:45'),
(10, 1, 1, NULL, 'JOBIN', '1987-12-16', 37, 160, 60, '9961357314', NULL, '2025-03-07', '2026-03-06', 19210.00, 19210, 5.00, '1year', NULL, NULL, 13, 1, 19210, 0, 203, 4, NULL, 2, 3, '2025-03-07 07:17:04', NULL, NULL, NULL, '2025-03-07', '2025-03-07 12:17:04', '2025-03-08 12:20:32'),
(11, 1, 1, NULL, 'SUBASH', '1990-01-20', 35, 170, 68, '8589028835', NULL, '2025-03-07', '2026-03-06', 17615.00, 16500, 10.00, '1year', NULL, NULL, 3, 1, 10000, 7615, 2, 18, NULL, 1, 3, '2025-03-12 07:58:48', NULL, NULL, NULL, '2025-03-12', '2025-03-12 11:58:48', '2025-03-13 13:53:31'),
(12, 1, 2, NULL, 'SHIBHU', '1975-05-10', 49, 158, 58, '7736098980', NULL, '2025-03-08', '2026-03-07', 35665.00, 34500, 5.00, '1year', NULL, NULL, 13, 0, 0, 0, 256, 18, NULL, 1, 3, '2025-03-12 08:01:46', NULL, NULL, NULL, '2025-03-12', '2025-03-12 12:01:46', '2025-03-12 12:01:46'),
(13, 1, 2, NULL, 'LEELAMMA', '1959-11-27', 65, 162, 59, '9048877233', NULL, '2025-03-10', '2026-03-09', 27307.00, 27307, 5.00, '1year', NULL, NULL, 13, 1, 27307, 0, 257, 18, NULL, 2, 3, '2025-03-12 08:04:30', NULL, NULL, NULL, '2025-03-12', '2025-03-12 12:04:30', '2025-03-13 13:57:56'),
(14, 1, 1, NULL, 'MIDHUN', '1992-12-23', 32, 168, 65, '9400249815', NULL, '2025-03-14', '2026-03-13', 14804.00, 14800, 10.00, '1year', NULL, NULL, 13, 1, 14804, 0, 196, 19, NULL, 2, 3, '2025-03-12 08:45:39', NULL, NULL, NULL, '2025-03-12', '2025-03-12 12:45:39', '2025-03-13 13:56:34'),
(15, 1, 2, NULL, 'ELDHOSE', '1984-04-18', 40, 169, 65, '6282294640', NULL, '2025-03-13', '2026-03-12', 7162.00, 6900, 5.00, '1year', NULL, NULL, 13, 1, 0, 0, 308, 18, NULL, 1, 3, '2025-03-14 10:14:55', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:14:55', '2025-03-14 14:14:55'),
(16, 1, 2, NULL, 'ELSON', '1988-05-10', 36, 162, 60, '6282294640', NULL, '2025-03-13', '2026-03-12', 6926.00, 6600, 5.00, '1year', NULL, NULL, 13, 1, 0, 0, 308, 18, NULL, 1, 3, '2025-03-14 10:20:41', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:20:41', '2025-03-14 14:20:41'),
(17, 1, 1, NULL, 'JITHIN', '1987-06-01', 37, 168, 65, '9446868514', NULL, '2025-03-12', '2026-03-11', 16095.00, 16000, 4.00, '1year', NULL, NULL, 13, 0, 0, 0, 309, 18, NULL, 2, 3, '2025-03-14 10:24:04', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:24:04', '2025-03-14 14:24:04'),
(18, 1, 1, NULL, 'ELDHOSE', '1983-05-01', 41, 162, 60, '9074782175', NULL, '2025-03-14', '2026-03-13', 18210.00, 18000, 5.00, '1year', NULL, NULL, 13, 1, 0, 0, 311, 18, NULL, 1, 3, '2025-03-14 10:26:35', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:26:35', '2025-03-14 14:26:35'),
(19, 1, 1, NULL, 'ABLE SCARIA', '1982-04-12', 42, 160, 58, '9142302031', NULL, '2025-03-15', '2026-03-14', 17500.00, 17500, 7.00, '1year', NULL, NULL, 13, 0, 0, 0, 312, 4, NULL, 2, 3, '2025-03-14 10:30:03', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:30:03', '2025-03-14 14:30:03'),
(20, 1, 1, NULL, 'TIJO', '1990-05-09', 34, 158, 58, '9645681526', NULL, '2025-03-13', '2026-03-12', 10115.00, 10000, 5.00, '1year', NULL, NULL, 13, 0, 0, 0, 313, 13, NULL, 1, 3, '2025-03-14 10:35:04', NULL, NULL, NULL, '2025-03-14', '2025-03-14 14:35:04', '2025-03-14 14:35:04'),
(21, 1, 1, NULL, 'BINOY', '1995-09-02', 29, 172, 65, '7994631369', NULL, '2025-03-17', '2026-03-16', 10254.00, 10200, 10.00, '1year', NULL, NULL, 13, 1, 0, 0, 186, 18, NULL, 1, 3, '2025-03-17 12:20:39', NULL, NULL, NULL, '2025-03-17', '2025-03-17 16:20:39', '2025-03-17 16:20:39'),
(22, 1, 1, NULL, 'SAJITHA', '1982-01-01', 43, 165, 64, '8589832852', NULL, '2025-03-18', '2026-03-17', 32210.00, 31500, 4.00, '1year', NULL, NULL, 9, 0, 0, 0, 45, 18, NULL, 2, 3, '2025-03-17 12:24:47', NULL, NULL, NULL, '2025-03-17', '2025-03-17 16:24:47', '2025-03-17 16:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicymembers`
--

CREATE TABLE `tbl_healthpolicymembers` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicy_docucments`
--

CREATE TABLE `tbl_healthpolicy_docucments` (
  `id` int NOT NULL,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthpolicy_renews`
--

CREATE TABLE `tbl_healthpolicy_renews` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_healthpolicy_renews`
--

INSERT INTO `tbl_healthpolicy_renews` (`id`, `policy_cat_id`, `healthpolicy_id`, `renew_date`, `expiry_date`, `premium_amount`, `customer_premium`, `payment_mode_id`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-02-16', '2026-02-16', 13800, 13500, 9, 3, '2025-02-18', '2025-02-18 10:03:35', '2025-02-18 10:03:35'),
(2, 1, 2, '2025-03-03', '2026-03-03', 22740, 21000, 2, 3, '2025-03-06', '2025-03-06 07:42:53', '2025-03-06 07:42:53'),
(3, 1, 3, '2025-03-03', '2026-03-03', 13728, 13700, 2, 3, '2025-03-06', '2025-03-06 07:47:44', '2025-03-06 07:47:44'),
(4, 1, 4, '2025-03-04', '2026-03-04', 17669, 16000, NULL, 3, '2025-03-06', '2025-03-06 07:52:34', '2025-03-06 07:52:34'),
(5, 1, 5, '2025-03-05', '2026-03-05', 16472, 16400, 2, 3, '2025-03-06', '2025-03-06 07:56:04', '2025-03-06 07:56:04'),
(6, 1, 6, '2025-03-20', '2026-03-20', 39936, 39900, NULL, 3, '2025-03-06', '2025-03-06 08:53:10', '2025-03-06 08:53:10'),
(7, 1, 7, '2025-03-18', '2026-03-18', 8942, 8500, 2, 3, '2025-03-06', '2025-03-06 08:59:50', '2025-03-06 08:59:50'),
(8, 1, 8, '2025-03-06', '2026-03-05', 11902, 11900, 2, 3, '2025-03-06', '2025-03-06 09:14:27', '2025-03-06 09:14:27'),
(9, 1, 9, '2025-03-17', '2026-03-16', 2674, 1600, 2, 3, '2025-03-06', '2025-03-06 11:47:54', '2025-03-06 11:47:54'),
(10, 1, 10, '2025-03-07', '2026-03-06', 19210, 19210, 3, 3, '2025-03-07', '2025-03-07 07:17:04', '2025-03-07 07:17:04'),
(11, 1, 11, '2025-03-07', '2026-03-06', 17615, 16500, 2, 3, '2025-03-12', '2025-03-12 07:58:48', '2025-03-12 07:58:48'),
(12, 1, 12, '2025-03-08', '2026-03-07', 35665, 34500, NULL, 3, '2025-03-12', '2025-03-12 08:01:46', '2025-03-12 08:01:46'),
(13, 1, 13, '2025-03-10', '2026-03-09', 27307, 27307, 3, 3, '2025-03-12', '2025-03-12 08:04:30', '2025-03-12 08:04:30'),
(14, 1, 14, '2025-03-14', '2026-03-13', 14804, 14800, 2, 3, '2025-03-12', '2025-03-12 08:45:39', '2025-03-12 08:45:39'),
(15, 1, 15, '2025-03-13', '2026-03-12', 7162, 6900, NULL, 3, '2025-03-14', '2025-03-14 10:14:55', '2025-03-14 10:14:55'),
(16, 1, 16, '2025-03-13', '2026-03-12', 6926, 6600, 2, 3, '2025-03-14', '2025-03-14 10:20:41', '2025-03-14 10:20:41'),
(17, 1, 17, '2025-03-12', '2026-03-11', 16095, 16000, NULL, 3, '2025-03-14', '2025-03-14 10:24:04', '2025-03-14 10:24:04'),
(18, 1, 18, '2025-03-14', '2026-03-13', 18210, 18000, 2, 3, '2025-03-14', '2025-03-14 10:26:35', '2025-03-14 10:26:35'),
(19, 1, 19, '2025-03-15', '2026-03-14', 17500, 17500, NULL, 3, '2025-03-14', '2025-03-14 10:30:03', '2025-03-14 10:30:03'),
(20, 1, 20, '2025-03-13', '2026-03-12', 10115, 10000, NULL, 3, '2025-03-14', '2025-03-14 10:35:04', '2025-03-14 10:35:04'),
(21, 1, 21, '2025-03-17', '2026-03-16', 10254, 10200, 9, 3, '2025-03-17', '2025-03-17 12:20:39', '2025-03-17 12:20:39'),
(22, 1, 22, '2025-03-18', '2026-03-17', 32210, 31500, NULL, 3, '2025-03-17', '2025-03-17 12:24:47', '2025-03-17 12:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurence_providers`
--

CREATE TABLE `tbl_insurence_providers` (
  `id` bigint UNSIGNED NOT NULL,
  `provider_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_amount` float NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_insurence_providers`
--

INSERT INTO `tbl_insurence_providers` (`id`, `provider_name`, `card_name`, `address`, `company_name`, `current_amount`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'Start Health', 'Start Health Insurance', 'Vattiyorkavu,kollam', 'Start Health Inusrence Limited', 0, 1, '2024-12-20', '2024-12-19 23:58:48', '2025-02-15 12:48:00'),
(3, 'UNITED INDIA', 'UNITED INDIA INSURANCE', 'ANNMARY KURIAN', 'NILL', 422098, 6, '2025-01-16', '2025-01-16 10:50:58', '2025-03-18 11:09:12'),
(4, 'ICICI', 'ICICI INSURANCE', 'NEETHU', 'NILL', 17569, 6, '2025-01-16', '2025-01-16 10:51:21', '2025-03-18 10:11:05'),
(5, 'TATA AIG', 'TATA AIG INSURANCE', 'NILL', 'NILL', 10994, 6, '2025-01-16', '2025-01-16 10:51:36', '2025-03-11 16:03:39'),
(6, 'SHRIRAM', 'SHRIRAM INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:51:49', '2025-02-15 12:46:50'),
(7, 'ROYAL SUNDARAM', 'ROYAL SUNDARAM INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:52:09', '2025-02-15 12:46:35'),
(8, 'NATIONAL', 'NATIONAL INSURANCE', 'NILL', 'NILL', 122191, 6, '2025-01-16', '2025-01-16 10:53:01', '2025-03-18 10:10:02'),
(9, 'ORIENTAL', 'ORIENTAL INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:53:13', '2025-02-15 12:46:10'),
(10, 'UNIVERSAL SOMPO', 'UNIVERSAL SOMPO INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:53:33', '2025-02-15 12:45:57'),
(11, 'FUTURE', 'FUTURE INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:53:47', '2025-02-15 12:45:27'),
(12, 'NEW INDIA', 'NEW INDIA INSURANCE', 'NILL', 'NILL', 232758, 6, '2025-01-16', '2025-01-16 10:54:21', '2025-03-18 10:38:48'),
(13, 'LIBERTY', 'LIBERTY INSURANCE', 'NILL', 'NILL', 22428, 6, '2025-01-16', '2025-01-16 10:54:32', '2025-03-18 10:11:39'),
(14, 'BAJAJ', 'BAJAJ  INSURANCE', 'NILL', 'NILL', 0, 6, '2025-01-16', '2025-01-16 10:54:53', '2025-02-15 12:44:21'),
(15, 'ADITYA BIRLA', 'ADITYA BIRLA INSURANCE', 'ADITYA BIRLA CARD', 'ADITYA BIRLA CARD', 0, 6, '2025-01-16', '2025-01-16 11:36:23', '2025-02-15 12:44:39'),
(16, 'MAGMA', 'MAGMA', 'MAGMA', 'MAGMA GENERAL INSURANCE LTD', 0, 7, '2025-02-18', '2025-02-18 15:19:11', '2025-02-18 15:19:11'),
(17, 'SBI', 'SBI', 'NILL', 'SBI GENERAL INSURANCE', 0, 4, '2025-03-04', '2025-03-04 16:24:13', '2025-03-04 16:24:13'),
(18, 'MANIPAL', 'MANIPAL HEALTH INSURANCE', 'MANIPAL HEALTH', 'MANIPAL CIGNA INSURANCE', 157170, 9, '2025-03-05', '2025-03-05 09:18:01', '2025-03-18 10:31:43'),
(19, 'NIVA BUPA', 'NIVA BUPA CARD', 'NIVA BUPA', 'NIVA BUPA', 0, 3, '2025-03-06', '2025-03-06 16:44:13', '2025-03-13 13:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `hsn_code_id` int DEFAULT NULL,
  `type` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1: Service, 2: Parts',
  `unit_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_batches`
--

CREATE TABLE `tbl_jw_batches` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `batch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_categories`
--

CREATE TABLE `tbl_jw_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_categories`
--

INSERT INTO `tbl_jw_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'TYRE', '2025-03-03 15:57:56', '2025-03-03 15:57:56'),
(2, 'ACCESSORIES', '2025-03-03 15:58:16', '2025-03-06 15:09:08'),
(3, 'COOLING FILM', '2025-03-03 15:58:35', '2025-03-03 15:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_hsncodes`
--

CREATE TABLE `tbl_jw_hsncodes` (
  `id` bigint UNSIGNED NOT NULL,
  `hsncode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsnvalue` decimal(10,2) NOT NULL,
  `cgst_perc` decimal(10,2) NOT NULL,
  `sgst_perc` decimal(10,2) NOT NULL,
  `igst_perc` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_hsncodes`
--

INSERT INTO `tbl_jw_hsncodes` (`id`, `hsncode`, `hsnvalue`, `cgst_perc`, `sgst_perc`, `igst_perc`, `created_at`, `updated_at`) VALUES
(1, '870810', 18.00, 9.00, 9.00, 18.00, '2025-03-11 15:17:14', '2025-03-11 15:17:14'),
(2, '870829', 18.00, 9.00, 9.00, 18.00, '2025-03-11 15:17:58', '2025-03-11 15:17:58'),
(3, '870899', 18.00, 9.00, 9.00, 18.00, '2025-03-11 15:18:27', '2025-03-11 15:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_livestocks`
--

CREATE TABLE `tbl_jw_livestocks` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `pur_rate` float NOT NULL,
  `sale_rate` float NOT NULL,
  `mrp` float NOT NULL,
  `qty` bigint NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_openingstocks`
--

CREATE TABLE `tbl_jw_openingstocks` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchases`
--

CREATE TABLE `tbl_jw_purchases` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchasetypes`
--

CREATE TABLE `tbl_jw_purchasetypes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_purchase_trans`
--

CREATE TABLE `tbl_jw_purchase_trans` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_sales`
--

CREATE TABLE `tbl_jw_sales` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_saletypes`
--

CREATE TABLE `tbl_jw_saletypes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_sale_trans`
--

CREATE TABLE `tbl_jw_sale_trans` (
  `id` int NOT NULL,
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_servicecodes`
--

CREATE TABLE `tbl_jw_servicecodes` (
  `id` bigint UNSIGNED NOT NULL,
  `service_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_id` int NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_stocktypes`
--

CREATE TABLE `tbl_jw_stocktypes` (
  `id` bigint UNSIGNED NOT NULL,
  `stock_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_stocktypes`
--

INSERT INTO `tbl_jw_stocktypes` (`id`, `stock_type`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 'cvc', 'Ashna', '2025-02-19 07:24:52', 'Admin', '2025-02-22 17:17:41', '2025-02-19 01:54:52', '2025-02-22 11:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_subcategories`
--

CREATE TABLE `tbl_jw_subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_id` int NOT NULL,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_subcategories`
--

INSERT INTO `tbl_jw_subcategories` (`id`, `cat_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SECOND HAND TYRE', '2025-03-03 15:59:36', '2025-03-03 15:59:36'),
(2, 1, 'VALVE', '2025-03-03 15:59:49', '2025-03-03 15:59:49'),
(3, 1, 'TUBE', '2025-03-03 16:00:03', '2025-03-03 16:00:03'),
(4, 1, 'NEW  TYRE', '2025-03-03 16:00:37', '2025-03-06 16:16:15'),
(5, 2, 'ANDROID', '2025-03-03 16:00:59', '2025-03-03 16:00:59'),
(6, 2, 'DASH CAM', '2025-03-03 16:01:20', '2025-03-03 16:01:20'),
(7, 2, 'NUMBER PLATE   CAR', '2025-03-03 16:43:28', '2025-03-07 15:00:13'),
(8, 2, 'WHEEL CUP', '2025-03-03 16:44:05', '2025-03-03 16:44:05'),
(9, 2, 'PERFUME', '2025-03-03 16:45:56', '2025-03-03 16:45:56'),
(10, 2, 'SHAMPOOS', '2025-03-03 16:46:15', '2025-03-03 16:46:15'),
(11, 2, 'SPEAKER', '2025-03-06 15:11:42', '2025-03-06 15:11:42'),
(12, 2, 'HORN', '2025-03-06 15:12:37', '2025-03-06 15:12:37'),
(13, 2, 'HEADLIGHT  BULB', '2025-03-06 15:13:23', '2025-03-06 15:13:23'),
(14, 2, 'FOGLAMP', '2025-03-06 15:14:03', '2025-03-06 15:14:03'),
(15, 2, 'DVR   CAMERA', '2025-03-06 15:14:35', '2025-03-06 15:14:35'),
(16, 2, 'ARMREST', '2025-03-06 15:25:42', '2025-03-06 15:25:42'),
(17, 2, 'STEERING COVER', '2025-03-06 15:26:14', '2025-03-06 15:26:14'),
(18, 2, 'MOBILE CHARGER', '2025-03-06 15:26:45', '2025-03-06 15:26:45'),
(19, 2, 'NECK REST', '2025-03-06 15:27:03', '2025-03-06 15:27:03'),
(20, 2, 'MICRO FIBER CLOTH', '2025-03-06 15:27:30', '2025-03-06 15:27:30'),
(21, 2, 'CHAMING  CLOTH', '2025-03-06 15:28:17', '2025-03-06 15:28:17'),
(22, 2, 'GEAR KNOB', '2025-03-06 15:28:53', '2025-03-06 15:28:53'),
(23, 2, 'RAIN PROOF', '2025-03-06 15:30:52', '2025-03-06 15:30:52'),
(24, 2, 'ANTY FOG', '2025-03-06 15:31:15', '2025-03-06 15:31:15'),
(25, 2, 'MOTO MAX -DASH BOARD POLISH', '2025-03-06 15:32:05', '2025-03-06 15:32:05'),
(26, 2, 'MOBILE   HOLDER', '2025-03-06 15:33:17', '2025-03-06 15:33:17'),
(27, 3, 'GARWARE  ARTIC COOL', '2025-03-06 16:06:09', '2025-03-06 16:06:09'),
(28, 3, 'GARWARE  CLASSIC LITE', '2025-03-06 16:07:04', '2025-03-06 16:07:04'),
(29, 3, 'GARWARE  QDP LITE', '2025-03-06 16:08:01', '2025-03-06 16:08:01'),
(34, 3, 'GARWARE  INTERNATIONAL', '2025-03-06 16:09:28', '2025-03-06 16:09:28'),
(35, 3, 'GARWARE    FRONTY', '2025-03-06 16:10:12', '2025-03-06 16:10:12'),
(37, 3, 'GARWARE   ICECOOL   [GREY]', '2025-03-06 16:11:24', '2025-03-06 16:11:24'),
(39, 3, 'GARWARE   [SAFTY  / GLAZING]', '2025-03-06 16:12:45', '2025-03-06 16:12:45'),
(41, 1, 'BALANCING', '2025-03-06 16:14:02', '2025-03-06 16:14:02'),
(43, 1, 'ALIGNMENT', '2025-03-06 16:14:39', '2025-03-06 16:14:39'),
(44, 1, 'ROTATION', '2025-03-06 16:15:32', '2025-03-06 16:15:32'),
(45, 2, 'BLIND SPORT  MIRROR', '2025-03-06 16:21:12', '2025-03-06 16:21:12'),
(47, 2, 'I  POP  DOOR GAURD', '2025-03-06 16:22:37', '2025-03-06 16:22:37'),
(48, 2, 'KEE CHAIN', '2025-03-06 16:27:40', '2025-03-06 16:27:40'),
(49, 2, '360  CAMERA', '2025-03-06 16:30:46', '2025-03-06 16:30:46'),
(50, 1, 'PUNCHURE', '2025-03-06 16:31:58', '2025-03-06 16:31:58'),
(51, 1, 'WHEEL  CEANING', '2025-03-06 16:47:07', '2025-03-06 16:47:07'),
(52, 2, 'GLOWS TYPE  CLOTH', '2025-03-07 13:49:48', '2025-03-07 13:49:48'),
(53, 2, 'TESSUE BOX', '2025-03-07 13:51:06', '2025-03-07 13:51:06'),
(54, 2, 'CHAMING  CLOTH   SMALL', '2025-03-07 13:51:45', '2025-03-07 13:51:45'),
(55, 2, 'FORM   CLEANER', '2025-03-07 13:52:45', '2025-03-07 13:52:45'),
(56, 2, 'TYRE FORM CLENER', '2025-03-07 13:53:16', '2025-03-07 13:53:16'),
(57, 2, 'BABY SAFTY   MIRROR', '2025-03-07 13:54:07', '2025-03-07 13:54:07'),
(58, 2, 'CAR ANTINA', '2025-03-07 13:55:17', '2025-03-07 13:55:17'),
(59, 2, 'CAR BUMPER', '2025-03-07 13:55:42', '2025-03-07 13:55:42'),
(60, 2, 'FOLDABLE   REFLECTIVE  SHADE', '2025-03-07 13:59:14', '2025-03-07 13:59:14'),
(61, 2, 'STICKER    DEASEL/PETROL', '2025-03-07 14:00:09', '2025-03-07 14:00:09'),
(62, 2, 'CAR  SEAT FAN', '2025-03-07 14:00:52', '2025-03-07 14:00:52'),
(63, 2, 'WURTH   [PAINT RESTORATION POLISH]', '2025-03-07 14:02:39', '2025-03-07 14:02:39'),
(64, 2, 'WINDSHELD WASHER', '2025-03-07 14:09:44', '2025-03-07 14:09:44'),
(65, 2, 'MOTO MAX  RUBBING COPOUND', '2025-03-07 14:24:03', '2025-03-07 14:24:03'),
(66, 2, 'MOTOMAX  CREAM POLISH', '2025-03-07 14:24:40', '2025-03-07 14:24:40'),
(67, 2, 'MOTO MAX  CHAIN LUBE', '2025-03-07 14:25:12', '2025-03-07 14:25:12'),
(68, 2, 'MOTO MAX   CAR SHAMPOO', '2025-03-07 14:25:36', '2025-03-07 14:25:36'),
(69, 2, 'CLEAR VUE   RAIN  REPELLENT', '2025-03-07 14:27:10', '2025-03-07 14:27:10'),
(70, 2, 'NUMBER PLATE  BOX', '2025-03-07 14:47:36', '2025-03-07 14:47:36'),
(71, 2, 'NUMBER PLATE   [BIKE]', '2025-03-07 15:00:50', '2025-03-07 15:00:50'),
(72, 2, 'FAST TAG', '2025-03-08 15:15:19', '2025-03-08 15:15:19'),
(73, 2, '3SOCKER ADAPTER WITH CAR CHARGER', '2025-03-08 15:17:48', '2025-03-08 15:17:48'),
(74, 2, 'SHARK  EARTH  ANTINA', '2025-03-08 15:19:12', '2025-03-08 15:19:12'),
(75, 2, 'UNIVERSAL  CLIP', '2025-03-08 15:20:28', '2025-03-08 15:20:28'),
(76, 2, 'FOOD STEP', '2025-03-13 10:32:18', '2025-03-13 10:32:18'),
(77, 2, 'SPOILER', '2025-03-13 10:32:54', '2025-03-13 10:32:54'),
(78, 2, 'ROOF RAIL', '2025-03-13 10:33:18', '2025-03-13 10:33:18'),
(80, 2, 'WIPPER BLADE', '2025-03-13 10:34:11', '2025-03-13 10:34:11'),
(81, 2, 'BATTERY', '2025-03-13 10:41:12', '2025-03-13 10:41:12'),
(82, 2, 'MAT', '2025-03-13 10:45:51', '2025-03-13 10:45:51'),
(83, 2, 'DASH BOAD POLISH', '2025-03-13 10:46:23', '2025-03-13 10:46:23'),
(84, 2, 'CENTER LOCK', '2025-03-13 10:46:51', '2025-03-13 10:46:51'),
(85, 2, 'TRAVERL DINING TRAY', '2025-03-13 10:47:39', '2025-03-13 10:47:39'),
(86, 2, 'AUTO MOTIVE  SWITCHES', '2025-03-18 09:59:20', '2025-03-18 09:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jw_units`
--

CREATE TABLE `tbl_jw_units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jw_units`
--

INSERT INTO `tbl_jw_units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'NO', '2025-03-03 16:42:50', '2025-03-03 16:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `id` int NOT NULL,
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
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadsources`
--

CREATE TABLE `tbl_leadsources` (
  `id` int NOT NULL,
  `leadsource` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_lead_followups` (
  `id` int NOT NULL,
  `lead_id` int NOT NULL,
  `call_description` text,
  `next_followup_date` date NOT NULL,
  `status` int DEFAULT NULL COMMENT '1-started,2-Inprogress,3-Not Need,4-Converted',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

CREATE TABLE `tbl_loans` (
  `id` bigint UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loantypes`
--

CREATE TABLE `tbl_loantypes` (
  `id` bigint UNSIGNED NOT NULL,
  `loan_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_loantypes`
--

INSERT INTO `tbl_loantypes` (`id`, `loan_type`, `created_at`, `updated_at`) VALUES
(1, 'Perosnal', NULL, NULL),
(2, 'Corporate', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_expenses`
--

CREATE TABLE `tbl_multi_expenses` (
  `id` bigint UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otherpolicy_documents`
--

CREATE TABLE `tbl_otherpolicy_documents` (
  `id` int NOT NULL,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_by` int DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_policies`
--

CREATE TABLE `tbl_other_policies` (
  `id` bigint UNSIGNED NOT NULL,
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
  `created_by` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_other_policies`
--

INSERT INTO `tbl_other_policies` (`id`, `policy_category_id`, `name`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `premium_amount`, `customer_premium_amount`, `sum_insured`, `term`, `executive_id`, `status`, `paid_amount`, `due_amount`, `referred_id`, `provider_id`, `note`, `policy_mode`, `prepared_user_id`, `prepared_date`, `created_by`, `created_date`, `edited_by`, `edited_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'K P BENNY', '6282920730', NULL, '2025-02-15', '2026-02-14', 3855.00, NULL, 4100000.00, '1year', 13, 0, 0, 0, 40, 3, NULL, NULL, 7, NULL, 7, '2025-02-17 11:51:02', NULL, NULL, '2025-02-17 16:51:02', '2025-02-17 16:51:02'),
(2, 3, 'BINOY KURIAN', '9895868900', NULL, '2025-02-17', '2026-02-16', 590.00, NULL, 200000.00, '1year', 13, 0, 0, 0, 83, 6, NULL, NULL, 7, NULL, 7, '2025-02-18 11:05:59', NULL, NULL, '2025-02-18 16:05:59', '2025-02-18 16:05:59'),
(3, 3, 'BINOY .KURIAN', NULL, NULL, '2025-02-17', '2026-02-16', 590.00, NULL, 200000.00, '1year', 13, 0, 0, 0, 83, 6, '989586890', NULL, 7, NULL, 7, '2025-02-18 11:10:01', NULL, NULL, '2025-02-18 16:10:01', '2025-02-18 16:10:01'),
(4, 11, 'PALEERI OFFROAD KOOTTAYIMA', '9746707440', NULL, '2025-02-23', '2025-02-23', 4957.00, 4950, 2000000.00, '1year', 13, 1, 4957, 0, 91, 8, NULL, NULL, 7, NULL, 7, '2025-02-19 07:10:06', NULL, NULL, '2025-02-19 12:10:06', '2025-03-10 08:54:48'),
(5, 3, 'TAHNIYELIL ASSOCIATES', '9447370580', NULL, '2025-03-03', '2026-03-02', 590.00, 590, 200000.00, '1year', 13, 1, 590, 0, 181, 6, NULL, 1, 7, NULL, 7, '2025-03-06 07:41:05', NULL, NULL, '2025-03-06 12:41:05', '2025-03-10 08:56:52'),
(6, 3, 'BENNY K P', '6282920730', NULL, '2025-03-06', '2026-03-05', 590.00, NULL, 200000.00, '1year', 13, 0, 590, 0, 40, 6, NULL, 1, 7, NULL, 7, '2025-03-06 07:43:38', NULL, NULL, '2025-03-06 12:43:38', '2025-03-08 17:23:43'),
(7, 3, 'BENNY K P', '6282920730', NULL, '2025-03-06', '2026-03-05', 590.00, NULL, 200000.00, '1year', 13, 0, 590, 0, 40, 6, NULL, 1, 7, NULL, 7, '2025-03-06 07:46:00', NULL, NULL, '2025-03-06 12:46:00', '2025-03-08 17:23:15'),
(8, 2, 'AJITH KUMAR', '9496322585', NULL, '2025-03-06', '2026-03-05', 4443.00, NULL, 3000000.00, '1year', 13, 1, 0, 0, 185, 3, NULL, 2, 7, NULL, 7, '2025-03-06 07:52:07', NULL, NULL, '2025-03-06 12:52:07', '2025-03-06 12:52:07'),
(9, 11, 'MALAYALA MANORAMA', '9605829684', NULL, '2025-03-09', '2025-03-09', 5000.00, 5000, 2000000.00, '1year', 13, 1, 0, 0, 281, 8, NULL, 1, 7, NULL, 7, '2025-03-13 10:17:11', NULL, NULL, '2025-03-13 14:17:11', '2025-03-13 14:17:11'),
(10, 2, 'ANNA MINI MART', '6282920730', NULL, '2025-03-11', '2026-03-10', 6302.00, 6300, 6700000.00, '1year', 13, 1, 0, 0, 40, 3, NULL, 1, 7, NULL, 7, '2025-03-13 10:20:48', NULL, NULL, '2025-03-13 14:20:48', '2025-03-13 14:20:48'),
(11, 12, 'FOR SOLUTION', '9496613203', NULL, '2025-03-10', '2025-06-09', 1744.00, 1750, 147000.00, '1year', 13, 1, 0, 0, 284, 3, NULL, 1, 7, NULL, 7, '2025-03-13 10:27:50', NULL, NULL, '2025-03-13 14:27:50', '2025-03-13 14:27:50'),
(12, 3, 'BENNY K P', '6282920730', NULL, '2025-03-12', '2026-03-11', 590.00, 590, 200000.00, '1year', 13, 1, 0, 0, 40, 6, NULL, 1, 7, NULL, 7, '2025-03-13 10:32:00', NULL, NULL, '2025-03-13 14:32:00', '2025-03-13 14:32:00'),
(13, 3, 'BENNY K P', '6282920730', NULL, '2025-03-12', '2026-03-11', 590.00, 590, 200000.00, '1year', 13, 1, 0, 0, 40, 6, NULL, 1, 7, NULL, 7, '2025-03-13 10:34:01', NULL, NULL, '2025-03-13 14:34:01', '2025-03-13 14:34:01'),
(14, 3, 'BENNY K P', '6282920730', NULL, '2025-03-12', '2026-03-11', 590.00, 590, 200000.00, '1year', 13, 1, 0, 0, 40, 6, NULL, 1, 7, NULL, 7, '2025-03-13 10:35:33', NULL, NULL, '2025-03-13 14:35:33', '2025-03-13 14:35:33'),
(15, 2, 'FLEXTRUS', '7012552694', NULL, '2025-03-16', '2026-03-15', 6670.00, 6670, 7500000.00, '1year', 13, 1, 0, 0, 286, 3, NULL, 2, 7, NULL, 7, '2025-03-13 10:49:34', NULL, NULL, '2025-03-13 14:49:34', '2025-03-13 14:49:34'),
(16, 2, 'SHYJO', '9656002897', NULL, '2025-03-12', '2026-03-11', 1796.00, 1796, 6500000.00, '1year', 13, 1, 0, 0, 287, 8, NULL, 2, 7, NULL, 7, '2025-03-13 10:53:06', NULL, NULL, '2025-03-13 14:53:06', '2025-03-13 14:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_policy_renews`
--

CREATE TABLE `tbl_other_policy_renews` (
  `id` int NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_other_policy_renews`
--

INSERT INTO `tbl_other_policy_renews` (`id`, `policy_cat_id`, `other_policy_id`, `premium_amount`, `customer_premium`, `renew_date`, `expiry_date`, `payment_mode_id`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3855, NULL, '2025-02-15', '2026-02-14', 9, 7, '2025-02-17', '2025-02-17 11:51:02', '2025-02-17 11:51:02'),
(2, 3, 2, 590, NULL, '2025-02-17', '2026-02-16', 2, 7, '2025-02-18', '2025-02-18 11:05:59', '2025-02-18 11:05:59'),
(3, 3, 3, 590, NULL, '2025-02-17', '2026-02-16', 2, 7, '2025-02-18', '2025-02-18 11:10:01', '2025-02-18 11:10:01'),
(4, 11, 4, 4957, 4950, '2025-02-23', '2025-02-23', 9, 7, '2025-02-19', '2025-02-19 07:10:06', '2025-02-19 07:10:06'),
(5, 3, 5, 590, 590, '2025-03-03', '2026-03-02', 2, 7, '2025-03-06', '2025-03-06 07:41:05', '2025-03-06 07:41:05'),
(6, 3, 6, 590, NULL, '2025-03-06', '2026-03-05', 2, 7, '2025-03-06', '2025-03-06 07:43:38', '2025-03-06 07:43:38'),
(7, 3, 7, 590, NULL, '2025-03-06', '2026-03-05', 2, 7, '2025-03-06', '2025-03-06 07:46:00', '2025-03-06 07:46:00'),
(8, 2, 8, 4443, NULL, '2025-03-06', '2026-03-05', 9, 7, '2025-03-06', '2025-03-06 07:52:07', '2025-03-06 07:52:07'),
(9, 11, 9, 5000, 5000, '2025-03-09', '2025-03-09', 9, 7, '2025-03-13', '2025-03-13 10:17:11', '2025-03-13 10:17:11'),
(10, 2, 10, 6302, 6300, '2025-03-11', '2026-03-10', 9, 7, '2025-03-13', '2025-03-13 10:20:48', '2025-03-13 10:20:48'),
(11, 12, 11, 1744, 1750, '2025-03-10', '2025-06-09', 6, 7, '2025-03-13', '2025-03-13 10:27:50', '2025-03-13 10:27:50'),
(12, 3, 12, 590, 590, '2025-03-12', '2026-03-11', 2, 7, '2025-03-13', '2025-03-13 10:32:00', '2025-03-13 10:32:00'),
(13, 3, 13, 590, 590, '2025-03-12', '2026-03-11', 2, 7, '2025-03-13', '2025-03-13 10:34:01', '2025-03-13 10:34:01'),
(14, 3, 14, 590, 590, '2025-03-12', '2026-03-11', 2, 7, '2025-03-13', '2025-03-13 10:35:33', '2025-03-13 10:35:33'),
(15, 2, 15, 6670, 6670, '2025-03-16', '2026-03-15', 12, 7, '2025-03-13', '2025-03-13 10:49:34', '2025-03-13 10:49:34'),
(16, 2, 16, 1796, 1796, '2025-03-12', '2026-03-11', 2, 7, '2025-03-13', '2025-03-13 10:53:06', '2025-03-13 10:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int NOT NULL,
  `policy_cat_id` int DEFAULT NULL,
  `policy_id` int NOT NULL,
  `payment_mode_id` int NOT NULL,
  `paid_amount` float NOT NULL,
  `remarks` text,
  `added_date` date NOT NULL,
  `added_by` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `policy_cat_id`, `policy_id`, `payment_mode_id`, `paid_amount`, `remarks`, `added_date`, `added_by`, `createdAt`, `updatedAt`) VALUES
(1, 9, 134, 2, 6400, NULL, '2025-03-04', 9, NULL, NULL),
(2, 9, 134, 10, 10, NULL, '2025-03-04', 9, NULL, NULL),
(3, 9, 136, 2, 7500, NULL, '2025-03-04', 9, NULL, NULL),
(4, 9, 136, 10, 9, NULL, '2025-03-04', 9, NULL, NULL),
(5, 9, 137, 2, 4800, NULL, '2025-03-04', 9, NULL, NULL),
(6, 9, 137, 10, 11, NULL, '2025-03-04', 9, NULL, NULL),
(7, 9, 140, 2, 6800, NULL, '2025-03-04', 9, NULL, NULL),
(8, 9, 140, 10, 6, NULL, '2025-03-04', 9, NULL, NULL),
(9, 9, 142, 2, 16900, NULL, '2025-03-04', 9, NULL, NULL),
(10, 9, 142, 10, 2, NULL, '2025-03-04', 9, NULL, NULL),
(11, 9, 144, 2, 1350, NULL, '2025-03-04', 9, NULL, NULL),
(12, 9, 144, 10, 3, NULL, '2025-03-04', 9, NULL, NULL),
(13, 9, 145, 3, 9702, NULL, '2025-03-04', 9, NULL, NULL),
(14, 9, 148, 1, 1400, NULL, '2025-03-04', 9, NULL, NULL),
(15, 9, 148, 10, 2, NULL, '2025-03-04', 9, NULL, NULL),
(16, 9, 150, 1, 2850, NULL, '2025-03-04', 9, NULL, NULL),
(17, 9, 150, 10, 5, NULL, '2025-03-04', 9, NULL, NULL),
(18, 9, 154, 2, 1167, NULL, '2025-03-04', 9, NULL, NULL),
(19, 9, 162, 2, 6750, NULL, '2025-03-05', 9, NULL, NULL),
(20, 9, 166, 2, 12800, NULL, '2025-03-05', 9, NULL, NULL),
(21, 9, 168, 1, 1167, NULL, '2025-03-05', 9, NULL, NULL),
(22, 9, 169, 2, 6300, NULL, '2025-03-05', 9, NULL, NULL),
(23, 9, 161, 1, 5500, NULL, '2025-03-05', 9, NULL, NULL),
(24, 9, 156, 1, 1500, NULL, '2025-03-05', 9, NULL, NULL),
(25, 9, 156, 8, 5, NULL, '2025-03-05', 9, NULL, NULL),
(26, 9, 157, 9, 8000, NULL, '2025-03-05', 9, NULL, NULL),
(27, 9, 155, 1, 8000, NULL, '2025-03-05', 9, NULL, NULL),
(28, 9, 155, 8, 1, NULL, '2025-03-05', 9, NULL, NULL),
(29, 9, 165, 2, 1937, NULL, '2025-03-05', 9, NULL, NULL),
(30, 9, 143, 9, 8000, NULL, '2025-03-05', 9, NULL, NULL),
(31, 9, 143, 8, 219, NULL, '2025-03-05', 9, NULL, NULL),
(32, 9, 172, 2, 8000, NULL, '2025-03-06', 9, NULL, NULL),
(33, 9, 173, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(34, 9, 176, 3, 7600, NULL, '2025-03-06', 9, NULL, NULL),
(35, 9, 179, 2, 7500, NULL, '2025-03-06', 9, NULL, NULL),
(36, 9, 180, 1, 900, NULL, '2025-03-06', 9, NULL, NULL),
(37, 9, 181, 2, 1450, NULL, '2025-03-06', 9, NULL, NULL),
(38, 9, 183, 2, 5800, NULL, '2025-03-06', 9, NULL, NULL),
(39, 9, 184, 2, 7000, NULL, '2025-03-06', 9, NULL, NULL),
(40, 9, 185, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(41, 9, 186, 3, 5500, NULL, '2025-03-06', 9, NULL, NULL),
(42, 9, 188, 2, 10800, NULL, '2025-03-06', 9, NULL, NULL),
(43, 9, 189, 2, 4400, NULL, '2025-03-06', 9, NULL, NULL),
(44, 9, 191, 2, 6000, NULL, '2025-03-06', 9, NULL, NULL),
(45, 9, 193, 3, 21800, NULL, '2025-03-06', 9, NULL, NULL),
(46, 9, 194, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(47, 9, 196, 2, 14500, NULL, '2025-03-06', 9, NULL, NULL),
(48, 9, 198, 2, 1450, NULL, '2025-03-06', 9, NULL, NULL),
(49, 9, 199, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(50, 9, 200, 1, 1000, NULL, '2025-03-06', 9, NULL, NULL),
(51, 9, 202, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(52, 9, 203, 2, 1167, NULL, '2025-03-06', 9, NULL, NULL),
(53, 9, 205, 2, 4250, NULL, '2025-03-07', 9, NULL, NULL),
(54, 9, 206, 2, 5250, NULL, '2025-03-07', 9, NULL, NULL),
(55, 9, 207, 2, 7300, NULL, '2025-03-07', 9, NULL, NULL),
(56, 9, 212, 4, 89600, NULL, '2025-03-07', 9, NULL, NULL),
(57, 9, 208, 2, 2400, NULL, '2025-03-07', 9, NULL, NULL),
(58, 9, 211, 9, 900, NULL, '2025-03-07', 9, NULL, NULL),
(59, 9, 213, 2, 8100, NULL, '2025-03-07', 9, NULL, NULL),
(60, 9, 214, 1, 1167, NULL, '2025-03-07', 9, NULL, NULL),
(61, 9, 215, 3, 11300, NULL, '2025-03-07', 9, NULL, NULL),
(62, 9, 218, 2, 5300, NULL, '2025-03-07', 9, NULL, NULL),
(63, 9, 219, 2, 19000, NULL, '2025-03-07', 9, NULL, NULL),
(64, 9, 220, 2, 6500, NULL, '2025-03-07', 9, NULL, NULL),
(65, 9, 222, 4, 5719, NULL, '2025-03-07', 9, NULL, NULL),
(66, 9, 223, 2, 2850, NULL, '2025-03-07', 9, NULL, NULL),
(67, 9, 224, 2, 900, NULL, '2025-03-07', 9, NULL, NULL),
(68, 9, 225, 9, 900, NULL, '2025-03-08', 9, NULL, NULL),
(69, 9, 226, 3, 6008, NULL, '2025-03-08', 9, NULL, NULL),
(70, 9, 227, 2, 1150, NULL, '2025-03-08', 9, NULL, NULL),
(71, 9, 227, 8, 17, NULL, '2025-03-08', 9, NULL, NULL),
(72, 9, 228, 2, 2850, NULL, '2025-03-08', 9, NULL, NULL),
(73, 9, 229, 2, 7500, NULL, '2025-03-08', 9, NULL, NULL),
(74, 9, 229, 8, 100, NULL, '2025-03-08', 9, NULL, NULL),
(75, 9, 230, 2, 8200, NULL, '2025-03-08', 9, NULL, NULL),
(76, 9, 230, 8, 300, NULL, '2025-03-08', 9, NULL, NULL),
(77, 9, 233, 3, 6000, NULL, '2025-03-08', 9, NULL, NULL),
(78, 9, 234, 2, 6800, NULL, '2025-03-08', 9, NULL, NULL),
(79, 9, 235, 2, 13500, NULL, '2025-03-08', 9, NULL, NULL),
(80, 9, 236, 2, 7500, NULL, '2025-03-08', 9, NULL, NULL),
(81, 9, 237, 2, 1167, NULL, '2025-03-08', 9, NULL, NULL),
(82, 9, 238, 2, 9700, NULL, '2025-03-08', 9, NULL, NULL),
(83, 9, 239, 2, 1167, NULL, '2025-03-08', 9, NULL, NULL),
(84, 9, 240, 1, 5000, NULL, '2025-03-08', 9, NULL, NULL),
(85, 9, 241, 2, 1937, NULL, '2025-03-08', 9, NULL, NULL),
(86, 9, 242, 2, 8500, NULL, '2025-03-08', 9, NULL, NULL),
(87, 9, 243, 3, 6200, NULL, '2025-03-08', 9, NULL, NULL),
(88, 9, 245, 2, 946, NULL, '2025-03-08', 9, NULL, NULL),
(89, 9, 246, 2, 6300, NULL, '2025-03-08', 9, NULL, NULL),
(90, 9, 251, 2, 6600, NULL, '2025-03-08', 9, NULL, NULL),
(91, 9, 251, 8, 239, NULL, '2025-03-08', 9, NULL, NULL),
(92, 9, 256, 2, 5200, NULL, '2025-03-08', 9, NULL, NULL),
(93, 9, 256, 8, 5, NULL, '2025-03-08', 9, NULL, NULL),
(94, 9, 257, 2, 7400, NULL, '2025-03-08', 9, NULL, NULL),
(95, 9, 257, 8, 90, NULL, '2025-03-08', 9, NULL, NULL),
(96, 9, 258, 2, 20000, NULL, '2025-03-08', 9, NULL, NULL),
(97, 9, 258, 8, 899, NULL, '2025-03-08', 9, NULL, NULL),
(98, 9, 259, 2, 10012, NULL, '2025-03-08', 9, NULL, NULL),
(99, 9, 260, 2, 6500, NULL, '2025-03-08', 9, NULL, NULL),
(100, 9, 260, 8, 19, NULL, '2025-03-08', 9, NULL, NULL),
(101, 9, 261, 2, 2850, NULL, '2025-03-08', 9, NULL, NULL),
(102, 9, 262, 2, 1167, NULL, '2025-03-08', 9, NULL, NULL),
(103, 9, 263, 2, 1167, NULL, '2025-03-08', 9, NULL, NULL),
(104, 9, 265, 2, 1167, NULL, '2025-03-08', 9, NULL, NULL),
(105, 1, 10, 3, 19210, NULL, '2025-03-08', 9, NULL, NULL),
(106, 1, 9, 2, 1600, NULL, '2025-03-08', 9, NULL, NULL),
(107, 1, 9, 8, 1074, NULL, '2025-03-08', 9, NULL, NULL),
(108, 1, 8, 2, 11900, NULL, '2025-03-08', 9, NULL, NULL),
(109, 1, 8, 10, 2, NULL, '2025-03-08', 9, NULL, NULL),
(110, 1, 7, 2, 8500, NULL, '2025-03-08', 9, NULL, NULL),
(111, 1, 7, 8, 442, NULL, '2025-03-08', 9, NULL, NULL),
(112, 1, 6, 2, 38000, NULL, '2025-03-08', 9, NULL, NULL),
(113, 1, 6, 8, 1936, NULL, '2025-03-08', 9, NULL, NULL),
(114, 1, 5, 2, 16400, NULL, '2025-03-08', 9, NULL, NULL),
(115, 1, 5, 8, 72, NULL, '2025-03-08', 9, NULL, NULL),
(116, 1, 3, 2, 13700, NULL, '2025-03-08', 9, NULL, NULL),
(117, 1, 3, 8, 28, NULL, '2025-03-08', 9, NULL, NULL),
(118, 1, 2, 2, 21000, NULL, '2025-03-08', 9, NULL, NULL),
(119, 1, 2, 8, 1740, NULL, '2025-03-08', 9, NULL, NULL),
(120, 9, 266, 9, 5900, NULL, '2025-03-08', 9, NULL, NULL),
(121, 9, 267, 2, 4400, NULL, '2025-03-08', 9, NULL, NULL),
(122, 9, 268, 3, 5089, NULL, '2025-03-08', 9, NULL, NULL),
(123, 9, 269, 2, 12155, NULL, '2025-03-08', 9, NULL, NULL),
(124, 9, 270, 9, 5900, NULL, '2025-03-08', 9, NULL, NULL),
(125, 9, 271, 2, 3100, NULL, '2025-03-08', 9, NULL, NULL),
(126, 9, 271, 2, 500, 'VALUATION', '2025-03-08', 9, NULL, NULL),
(127, 9, 272, 2, 4400, NULL, '2025-03-08', 9, NULL, NULL),
(128, 9, 278, 2, 5500, NULL, '2025-03-08', 9, NULL, NULL),
(129, 9, 282, 2, 1350, NULL, '2025-03-08', 9, NULL, NULL),
(130, 9, 282, 8, 5, NULL, '2025-03-08', 9, NULL, NULL),
(131, 3, 7, 2, 590, NULL, '2025-03-08', 9, NULL, NULL),
(132, 3, 6, 2, 590, NULL, '2025-03-08', 9, NULL, NULL),
(133, 11, 4, 2, 4950, NULL, '2025-03-10', 9, NULL, NULL),
(134, 11, 4, 8, 7, NULL, '2025-03-10', 9, NULL, NULL),
(135, 3, 5, 2, 590, NULL, '2025-03-10', 9, NULL, NULL),
(136, 9, 264, 2, 6000, NULL, '2025-03-10', 9, NULL, NULL),
(137, 9, 264, 8, 300, NULL, '2025-03-10', 9, NULL, NULL),
(138, 9, 283, 4, 19601, NULL, '2025-03-10', 9, NULL, NULL),
(139, 9, 285, 2, 22000, NULL, '2025-03-10', 9, NULL, NULL),
(140, 9, 285, 8, 2337, NULL, '2025-03-10', 9, NULL, NULL),
(141, 9, 290, 4, 22650, NULL, '2025-03-10', 9, NULL, NULL),
(142, 9, 286, 2, 850, NULL, '2025-03-10', 9, NULL, NULL),
(143, 9, 287, 2, 1167, NULL, '2025-03-10', 9, NULL, NULL),
(144, 9, 288, 2, 19000, NULL, '2025-03-10', 9, NULL, NULL),
(145, 9, 288, 8, 500, NULL, '2025-03-10', 9, NULL, NULL),
(146, 9, 291, 2, 6400, NULL, '2025-03-10', 9, NULL, NULL),
(147, 9, 292, 2, 1930, NULL, '2025-03-10', 9, NULL, NULL),
(148, 9, 294, 2, 4600, NULL, '2025-03-10', 9, NULL, NULL),
(149, 9, 295, 2, 4900, NULL, '2025-03-10', 9, NULL, NULL),
(150, 9, 296, 2, 6600, NULL, '2025-03-10', 9, NULL, NULL),
(151, 9, 297, 2, 4400, NULL, '2025-03-10', 9, NULL, NULL),
(152, 9, 298, 3, 15600, NULL, '2025-03-10', 9, NULL, NULL),
(153, 9, 300, 2, 1167, NULL, '2025-03-10', 9, NULL, NULL),
(154, 9, 310, 12, 10500, NULL, '2025-03-10', 9, NULL, NULL),
(155, 9, 302, 2, 12000, NULL, '2025-03-10', 9, NULL, NULL),
(156, 9, 303, 2, 900, NULL, '2025-03-10', 9, NULL, NULL),
(157, 9, 306, 12, 78000, NULL, '2025-03-10', 9, NULL, NULL),
(158, 9, 307, 12, 78000, NULL, '2025-03-10', 9, NULL, NULL),
(159, 9, 308, 2, 4150, NULL, '2025-03-10', 9, NULL, NULL),
(160, 9, 301, 9, 11300, 'CARD ADJUST', '2025-03-11', 9, NULL, NULL),
(161, 9, 311, 12, 63000, NULL, '2025-03-13', 9, NULL, NULL),
(162, 9, 274, 2, 1400, NULL, '2025-03-13', 9, NULL, NULL),
(163, 9, 279, 12, 9200, NULL, '2025-03-13', 9, NULL, NULL),
(164, 9, 312, 12, 21500, NULL, '2025-03-13', 9, NULL, NULL),
(165, 1, 11, 2, 10000, NULL, '2025-03-13', 9, NULL, NULL),
(166, 1, 14, 2, 14800, NULL, '2025-03-13', 9, NULL, NULL),
(167, 1, 14, 8, 4, NULL, '2025-03-13', 9, NULL, NULL),
(168, 1, 13, 3, 27307, NULL, '2025-03-13', 9, NULL, NULL),
(169, 9, 313, 9, 19900, NULL, '2025-03-13', 9, NULL, NULL),
(170, 9, 314, 2, 9700, NULL, '2025-03-13', 9, NULL, NULL),
(171, 9, 316, 9, 12600, NULL, '2025-03-13', 9, NULL, NULL),
(172, 9, 317, 2, 4400, NULL, '2025-03-13', 9, NULL, NULL),
(173, 9, 320, 9, 5000, NULL, '2025-03-13', 9, NULL, NULL),
(174, 9, 321, 4, 5800, NULL, '2025-03-13', 9, NULL, NULL),
(175, 9, 325, 2, 1950, NULL, '2025-03-15', 4, NULL, NULL),
(176, 9, 326, 2, 7300, NULL, '2025-03-15', 4, NULL, NULL),
(177, 9, 327, 3, 14300, NULL, '2025-03-15', 4, NULL, NULL),
(178, 9, 329, 3, 6600, NULL, '2025-03-15', 4, NULL, NULL),
(179, 9, 330, 2, 3000, NULL, '2025-03-15', 4, NULL, NULL),
(180, 9, 331, 3, 2399, NULL, '2025-03-15', 4, NULL, NULL),
(181, 9, 332, 1, 7000, NULL, '2025-03-15', 4, NULL, NULL),
(182, 9, 333, 2, 5900, NULL, '2025-03-15', 4, NULL, NULL),
(183, 9, 335, 2, 3600, NULL, '2025-03-15', 4, NULL, NULL),
(184, 9, 336, 2, 2850, NULL, '2025-03-15', 4, NULL, NULL),
(185, 9, 337, 2, 650, NULL, '2025-03-15', 4, NULL, NULL),
(186, 9, 339, 3, 6773, NULL, '2025-03-15', 4, NULL, NULL),
(187, 9, 340, 2, 1350, NULL, '2025-03-15', 4, NULL, NULL),
(188, 9, 341, 2, 7499, NULL, '2025-03-15', 4, NULL, NULL),
(189, 9, 342, 2, 1937, NULL, '2025-03-15', 4, NULL, NULL),
(190, 9, 343, 2, 34000, NULL, '2025-03-17', 9, NULL, NULL),
(191, 9, 344, 2, 1167, NULL, '2025-03-17', 9, NULL, NULL),
(192, 9, 345, 3, 5835, NULL, '2025-03-17', 9, NULL, NULL),
(193, 9, 347, 2, 6600, NULL, '2025-03-17', 9, NULL, NULL),
(194, 9, 347, 8, 24, NULL, '2025-03-17', 9, NULL, NULL),
(195, 9, 348, 2, 15100, NULL, '2025-03-17', 9, NULL, NULL),
(196, 9, 348, 8, 9, NULL, '2025-03-17', 9, NULL, NULL),
(197, 9, 351, 2, 1167, NULL, '2025-03-17', 9, NULL, NULL),
(198, 9, 352, 2, 2850, NULL, '2025-03-17', 9, NULL, NULL),
(199, 9, 355, 2, 3400, NULL, '2025-03-17', 9, NULL, NULL),
(200, 9, 355, 10, 1, NULL, '2025-03-17', 9, NULL, NULL),
(201, 9, 356, 2, 1650, NULL, '2025-03-17', 9, NULL, NULL),
(202, 9, 356, 8, 20, NULL, '2025-03-17', 9, NULL, NULL),
(203, 9, 357, 2, 800, NULL, '2025-03-17', 9, NULL, NULL),
(204, 9, 358, 2, 5350, NULL, '2025-03-17', 9, NULL, NULL),
(205, 9, 358, 8, 12, NULL, '2025-03-17', 9, NULL, NULL),
(206, 9, 359, 2, 1167, NULL, '2025-03-18', 9, NULL, NULL),
(207, 9, 360, 12, 10800, NULL, '2025-03-18', 9, NULL, NULL),
(208, 9, 362, 2, 4400, NULL, '2025-03-18', 9, NULL, NULL),
(209, 9, 364, 2, 16000, NULL, '2025-03-18', 9, NULL, NULL),
(210, 9, 365, 3, 7700, NULL, '2025-03-18', 9, NULL, NULL),
(211, 9, 366, 2, 1300, NULL, '2025-03-18', 9, NULL, NULL),
(212, 9, 368, 3, 16642, NULL, '2025-03-18', 9, NULL, NULL),
(213, 9, 372, 9, 10300, NULL, '2025-03-18', 9, NULL, NULL),
(214, 9, 376, 9, 2200, NULL, '2025-03-18', 9, NULL, NULL),
(215, 9, 378, 2, 1230, NULL, '2025-03-18', 9, NULL, NULL),
(216, 9, 379, 2, 1995, NULL, '2025-03-18', 9, NULL, NULL),
(217, 9, 381, 1, 7300, NULL, '2025-03-18', 9, NULL, NULL),
(218, 9, 381, 8, 100, NULL, '2025-03-18', 9, NULL, NULL),
(219, 9, 382, 9, 15500, NULL, '2025-03-18', 9, NULL, NULL),
(220, 9, 383, 2, 1937, NULL, '2025-03-18', 9, NULL, NULL),
(221, 9, 384, 2, 1167, NULL, '2025-03-18', 9, NULL, NULL),
(222, 9, 386, 2, 2600, NULL, '2025-03-18', 9, NULL, NULL),
(223, 9, 387, 2, 1950, NULL, '2025-03-18', 9, NULL, NULL),
(224, 9, 390, 2, 1167, NULL, '2025-03-18', 9, NULL, NULL),
(225, 9, 391, 2, 6650, NULL, '2025-03-18', 9, NULL, NULL),
(226, 9, 392, 2, 1650, NULL, '2025-03-18', 9, NULL, NULL),
(227, 9, 393, 2, 1167, NULL, '2025-03-18', 9, NULL, NULL),
(228, 9, 394, 2, 7400, NULL, '2025-03-18', 9, NULL, NULL),
(229, 9, 395, 2, 1866, NULL, '2025-03-18', 9, NULL, NULL),
(230, 9, 397, 3, 14000, NULL, '2025-03-18', 9, NULL, NULL),
(231, 9, 399, 2, 2500, NULL, '2025-03-18', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_modes`
--

CREATE TABLE `tbl_payment_modes` (
  `id` int NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
(11, 'Valuation Amount', NULL, NULL),
(12, 'Account Transfer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policyholders`
--

CREATE TABLE `tbl_policyholders` (
  `id` int NOT NULL,
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
  `created_date` date DEFAULT NULL,
  `assigned_userid` int DEFAULT NULL,
  `assigned_date` date DEFAULT NULL,
  `buying_type` int DEFAULT NULL COMMENT '1-Direct, 2-Broker',
  `broker_name` varchar(255) DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `note` text,
  `policy_mode` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `edited_by` int DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_policyholders`
--

INSERT INTO `tbl_policyholders` (`id`, `agent_id`, `dealer_id`, `policy_type`, `name`, `vehicle_number`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `vehicle_model_id`, `company_id`, `premium_amount`, `customer_premium_amount`, `valuation_amount`, `total_cost`, `sum_insured`, `executive_id`, `prepared_user_id`, `prepared_date`, `coverage_type_id`, `status`, `paid_amount`, `due_amount`, `payment_mode_id`, `referred_id`, `created_date`, `assigned_userid`, `assigned_date`, `buying_type`, `broker_name`, `provider_id`, `note`, `policy_mode`, `created_by`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(1, NULL, NULL, 1, 'SINDHU T N', 'KL 17 U 6978', NULL, NULL, '2025-02-14', '2026-02-13', 2, NULL, 2439, NULL, 0, 2439, 150000, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 1, 13, '2025-02-15', 13, '2025-02-15', 1, NULL, 8, NULL, NULL, 7, 7, '2025-02-15 06:42:27', NULL, NULL),
(2, NULL, NULL, 1, 'KOSHY A G', 'KL 07 BM 8874', NULL, NULL, '2025-02-14', '2026-02-13', 3, NULL, 3741, NULL, 0, 3741, 0, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 14, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 1, 'ANUSHA MOHAN', 'KL 17 W 4263', NULL, NULL, '2025-02-16', '2026-02-15', 4, NULL, 653, NULL, 0, 653, 58000, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 15, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(4, NULL, NULL, 1, 'AJITH P KESAVAN', 'KL 17 K 9451', NULL, NULL, '2025-02-15', '2026-02-14', 5, NULL, 4511, NULL, 0, 4511, 205000, 13, 6, '2025-02-15', NULL, NULL, 4511, 0, 6, 16, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(5, NULL, NULL, 1, 'RAJESH K', 'KL 24 P 9461', NULL, NULL, '2025-02-14', '2026-02-13', 6, NULL, 4041, NULL, 0, 4041, 210000, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 17, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 1, 'SUJATHA RAVI', 'KL 47 B 0643', NULL, NULL, '2025-02-21', '2026-02-20', 7, NULL, 3405, NULL, 0, 3405, 47000, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 6, 19, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 1, 'HARIS', 'KL 35 F 3043', NULL, NULL, '2025-02-15', '2026-02-14', 8, NULL, 4809, NULL, 0, 4809, 260000, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 20, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 1, 'VIJAYA KUMAR G', 'KL 29 R 6504', NULL, NULL, '2025-02-15', '2026-02-14', 9, NULL, 8309, NULL, 0, 8309, 500000, 13, NULL, '2025-02-15', NULL, NULL, 0, 0, 6, 21, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(9, NULL, NULL, 1, 'ABEYMON GEORGE MANAGING DIRECTOR', 'KL 17 X 5098', NULL, NULL, '2025-02-17', '2026-02-16', 10, NULL, 10000, NULL, 0, 10000, 630000, 13, NULL, '2025-02-15', NULL, NULL, 0, 0, 3, 22, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, 9, '2025-02-15 07:56:06', NULL, NULL),
(10, NULL, NULL, 1, 'SHEMEERA S', 'KL 30 E 8892', NULL, NULL, '2025-02-15', '2026-02-14', 9, NULL, 2855, NULL, 0, 2855, 0, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 23, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(11, NULL, NULL, 1, 'NASEER M', 'KL 74 B 9036', NULL, NULL, '2025-02-15', '2026-02-14', 11, NULL, 9702, NULL, 0, 9702, 0, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 6, 24, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(12, NULL, NULL, 1, 'SUSAN BENNY', 'KL 17 K 3454', NULL, NULL, '2025-02-17', '2026-02-16', 12, NULL, 45062, NULL, 0, 45062, 1000000, 13, 8, '2025-02-15', NULL, NULL, 0, 0, 2, 25, '2025-02-15', 13, '2025-02-15', 2, 'BENNY', 11, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(13, NULL, NULL, 1, 'AKHIL ANTONY', 'KL 42 J 0364', NULL, NULL, '2025-02-20', '2026-02-19', 4, NULL, 1308, NULL, 0, 1308, 14000, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 26, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(14, NULL, NULL, 1, 'JAYAN C K', 'KL 17 M 5874', NULL, NULL, '2025-02-15', '2026-02-14', 13, NULL, 1167, NULL, 0, 1167, 0, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 27, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(15, NULL, NULL, 1, 'MANIKANDAN', 'KL 01 BE 8254', NULL, NULL, '2025-02-15', '2026-02-14', 14, NULL, 902, NULL, 0, 902, 0, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 6, 28, '2025-02-15', 13, '2025-02-15', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(16, NULL, NULL, 1, 'BADHUSHA MAKKAR', 'KL 41 H 3498', NULL, NULL, '2025-02-14', '2026-02-13', 7, NULL, 2855, NULL, 0, 2855, 0, 13, 4, '2025-02-15', NULL, NULL, 0, 0, 6, 29, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(17, NULL, NULL, 1, 'RENNY SUNIL', 'KL 29 E 0999', NULL, NULL, '2025-02-17', '2026-02-16', 16, NULL, 17336, NULL, 0, 17336, 2400000, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 6, 30, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(18, NULL, NULL, 1, 'RABIYATH MUSAINA P M', 'KL 81 B 3038', NULL, NULL, '2025-02-14', '2026-02-13', 17, NULL, 5118, NULL, 0, 5118, 565000, 13, 6, '2025-02-15', NULL, NULL, 0, 0, 6, 31, '2025-02-15', 13, '2025-02-15', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(19, NULL, NULL, 1, 'SHEELA S NEDIYAYYATHU', 'KL 23 V 2225', NULL, NULL, '2025-02-14', '2026-02-13', 18, NULL, 7803, NULL, 0, 7803, 600000, 13, 4, '2025-02-17', 2, NULL, 0, 0, NULL, 32, '2025-02-17', 13, '2025-02-17', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(20, NULL, NULL, 1, 'PIMIN POLEY', 'KL 01 CL 4300', NULL, NULL, '2025-02-27', '2026-02-26', 19, NULL, 3761, NULL, 0, 3761, 890000, 13, 6, '2025-02-17', 2, NULL, 0, 0, 6, 33, '2025-02-17', 13, '2025-02-17', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(21, NULL, NULL, 1, 'SAJI', 'KL 63 E 6168', NULL, NULL, '2025-02-14', '2026-02-13', 20, NULL, 7499, NULL, 0, 7499, 600000, 13, 6, '2025-02-17', 2, NULL, 0, 0, 6, 34, '2025-02-17', 13, '2025-02-17', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(22, NULL, NULL, 1, 'PAULOSE P M', 'KL 44 D 4119', NULL, NULL, '2025-02-15', '2026-02-14', 21, NULL, 1302, NULL, 0, 1302, 23000, 13, 4, '2025-02-17', 2, NULL, 0, 0, 6, 35, '2025-02-17', 13, '2025-02-17', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(23, NULL, NULL, 1, 'SUNITHA PROPRIETRIX', 'KL 07 CV 6943', NULL, NULL, '2025-02-16', '2026-02-15', 22, NULL, 22600, NULL, 0, 22600, 725000, 13, 6, '2025-02-17', 2, NULL, 0, 0, 6, 36, '2025-02-17', 13, '2025-02-17', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 1, 'PRATHEESH VIKRAMAN', 'KL 17 T 1726', NULL, NULL, '2025-02-20', '2026-02-19', 23, NULL, 18718, NULL, 0, 18718, 250000, 13, 6, '2025-02-17', 2, NULL, 0, 0, 6, 37, '2025-02-17', 13, '2025-02-17', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(25, NULL, NULL, 1, 'RAMU S', 'KL 43 M 9455', NULL, NULL, '2025-02-15', '2026-02-14', 2, NULL, 4209, NULL, 0, 4209, 250000, 13, 4, '2025-02-17', 2, NULL, 0, 0, 6, 38, '2025-02-17', 13, '2025-02-17', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 1, 'BIJU C T', 'KL 31 H 2874', NULL, NULL, '2025-02-15', '2026-02-14', 24, NULL, 6204, NULL, 0, 6204, 220000, 13, 4, '2025-02-17', 2, NULL, 0, 0, 6, 39, '2025-02-17', 13, '2025-02-17', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(27, NULL, NULL, 1, 'ANNA NEEMA ROY', 'KL 38 F 4959', NULL, NULL, '2025-02-16', '2026-02-15', 26, NULL, 14431, NULL, 0, 14431, 1200000, 13, 4, '2025-02-17', 2, NULL, 0, 0, 6, 41, '2025-02-17', 13, '2025-02-17', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 1, 'PRAMITHA SANTHOSH', 'KL 44 B 7241', NULL, NULL, '2025-02-15', '2026-02-14', 21, NULL, 1167, NULL, 0, 1167, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 42, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(29, NULL, NULL, 1, 'SANTHOSH', 'KL 44 9612', NULL, NULL, '2025-02-15', '2026-02-14', 27, NULL, 2925, NULL, 0, 2925, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 42, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(30, NULL, NULL, 1, 'PRATHEESH', 'KL 17 W 4701', NULL, NULL, '2025-02-21', '2026-02-20', 9, NULL, 14214, NULL, 0, 14214, 400000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 44, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(31, NULL, NULL, 1, 'PONNAMMA JACOB', 'KL 17 E 8292', NULL, NULL, '2025-02-15', '2026-02-14', 3, NULL, 6036, NULL, 0, 6036, 110000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 45, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(32, NULL, NULL, 1, 'BIJOY JOSEPH', 'KL 42 W 6000', '9895868900', NULL, '2025-02-19', '2026-02-18', 28, NULL, 15711, NULL, 0, 15711, 1180000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 46, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, 8, '2025-02-18 12:08:11', NULL, NULL),
(33, NULL, NULL, 1, 'SHABIN SHAJI', 'KL 17 M 4185', NULL, NULL, '2025-02-16', '2026-02-15', 4, NULL, 1386, NULL, 0, 1386, 22800, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 47, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(34, NULL, NULL, 1, 'PAUL ABRAHAM', 'KL 44 D 9970', NULL, NULL, '2025-02-16', '2026-02-15', 29, NULL, 1167, NULL, 0, 1167, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 48, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(35, NULL, NULL, 1, 'MANI V T', 'KL 17 B 7585', NULL, NULL, '2025-02-15', '2026-02-14', 30, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 6, 47, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(36, NULL, NULL, 1, 'SUNIL R P', 'KL 27 A 1655', NULL, NULL, '2025-02-16', '2026-02-15', 7, NULL, 2855, NULL, 0, 2855, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 6, 50, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(37, NULL, NULL, 1, 'HEADMISTRESS', 'KL 44 H 5955', NULL, NULL, '2025-02-15', '2026-02-14', 31, NULL, 16000, NULL, 0, 16000, 1125000, 13, 9, '2025-02-18', 2, NULL, 0, 0, 2, 51, '2025-02-18', 13, '2025-02-18', 2, 'BENNY RELIANCE', 11, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(38, NULL, NULL, 1, 'PRASANNAN G', 'KL 17 R 7941', NULL, NULL, '2025-02-17', '2026-02-16', 32, NULL, 5506, NULL, 0, 5506, 370000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 52, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(39, NULL, NULL, 1, 'ANEESH A GANGADHARAN PROPRIETOR', 'KL40 T 1909', NULL, NULL, '2025-02-18', '2026-02-17', 33, NULL, 59819, NULL, 0, 59819, 4000000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 53, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(40, NULL, NULL, 1, 'SURESH K K', 'KL 17 Q 3148', NULL, NULL, '2025-02-18', '2026-02-17', 34, NULL, 1349, NULL, 0, 1349, 27000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 54, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(41, NULL, NULL, 1, 'ANTONY V V', 'KL 44 A 0755', NULL, NULL, '2025-02-18', '2026-02-17', 21, NULL, 1281, NULL, 0, 1281, 15000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 55, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(42, NULL, NULL, 1, 'USHA', 'KL 10 U 1847', '9562055810', NULL, '2025-02-18', '2026-02-17', 35, NULL, 2530, NULL, 0, 2530, 0, 7, 6, '2025-02-18', 1, 0, 0, 0, 6, 56, '2025-02-18', 7, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(43, NULL, NULL, 1, 'ANCY SUJATHAN', 'KL 69 A 5689', NULL, NULL, '2025-02-16', '2026-02-15', 4, NULL, 1457, NULL, 0, 1457, 27000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 57, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(44, NULL, NULL, 1, 'DEEPAK N', 'KL 38 J 4103', NULL, NULL, '2025-02-18', '2026-02-17', 36, NULL, 10907, NULL, 0, 10907, 550000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 58, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(45, NULL, NULL, 1, 'MOHAMED JAMAL T P', 'KL 07 CJ 1049', NULL, NULL, '2025-02-17', '2026-02-16', 37, NULL, 1959, NULL, 0, 1959, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 59, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(46, NULL, NULL, 1, 'MARY', 'KL 43 A 0042', NULL, NULL, '2025-02-15', '2026-02-14', 9, NULL, 4415, NULL, 0, 4415, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 60, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(47, NULL, NULL, 1, 'GEORGE', 'KL 44 E 1985', NULL, NULL, '2025-02-16', '2026-02-15', 38, NULL, 5559, NULL, 0, 5559, 195000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 42, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(48, NULL, NULL, 1, 'MATHEW', 'KL 17 E 7843', NULL, NULL, '2025-02-18', '2026-02-17', 39, NULL, 1167, NULL, 0, 1167, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 62, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(49, NULL, NULL, 1, 'GANESH R', 'KL 38 H 8353', NULL, NULL, '2025-02-17', '2026-02-16', 37, NULL, 2804, NULL, 0, 2804, 190000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 63, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(50, NULL, NULL, 1, 'ABDUL KHADER', 'KL44 E 8640', NULL, NULL, '2025-02-18', '2026-02-17', 37, NULL, 1937, NULL, 0, 1937, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 64, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(51, NULL, NULL, 1, 'JUNEER K  MOIDEEN', 'KL 11 BA 5065', NULL, NULL, '2025-02-17', '2026-02-16', 4, NULL, 1191, NULL, 0, 1191, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 65, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(52, NULL, NULL, 1, 'PETER RAPHAEL', 'KL 07 BW 2993', NULL, NULL, '2025-02-17', '2026-02-16', 21, NULL, 1191, NULL, 0, 1191, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 65, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(53, NULL, NULL, 1, 'SHIHAB V M', 'KL 44 A 8701', NULL, NULL, '2025-02-21', '2026-02-20', 40, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 6, 64, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(54, NULL, NULL, 1, 'HAMBAL AHAMED', 'KL 04 AM 0210', NULL, NULL, '2025-02-15', '2026-02-14', 41, NULL, 22128, NULL, 0, 22128, 2500000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 67, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(55, NULL, NULL, 1, 'AMEER JALAL', 'KL 05 AK 4819', NULL, NULL, '2025-02-16', '2026-02-15', 38, NULL, 7176, NULL, 0, 7176, 350000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 68, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(56, NULL, NULL, 1, 'SUBHASH C S', 'KL 38 G 2752', NULL, NULL, '2025-02-23', '2026-02-22', 42, NULL, 5309, NULL, 0, 5309, 290000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 69, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(57, NULL, NULL, 1, 'JUNEER K MOIDEEN', 'KL 52 M 7118', NULL, NULL, '2025-02-17', '2026-02-16', 43, NULL, 11000, NULL, 0, 11000, 130000, 8, 8, '2025-02-18', 2, NULL, 0, 0, 2, 65, '2025-02-18', 8, '2025-02-18', 2, 'BENNY RELIANCE', 16, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(58, NULL, NULL, 1, 'PUTHENPURACKAL VARKEY ANTONY', 'KL 44 9405', '9497405704', NULL, '2025-02-18', '2026-02-17', 29, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 70, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, 8, '2025-02-18 11:52:36', NULL, NULL),
(59, NULL, NULL, 1, 'RATHEESH T K', 'KL 40 K 2488', NULL, NULL, '2025-02-16', '2026-02-15', 44, NULL, 2439, NULL, 0, 2439, 200000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 71, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(60, NULL, NULL, 1, 'VISHNUDEV A', 'KL 07 DD 2666', '9446902666', NULL, '2025-02-19', '2026-02-18', 45, NULL, 24672, 23000, 0, 24672, 1800000, 13, 8, '2025-02-18', 2, NULL, 0, 0, 6, 72, '2025-02-18', 13, '2025-02-18', 1, NULL, 5, NULL, NULL, 7, 8, '2025-02-18 11:54:15', NULL, NULL),
(61, NULL, NULL, 1, 'SOPHY SUNIL', 'KL 44 F 9090', '9605634629', NULL, '2025-02-18', '2026-02-17', 3, NULL, 7499, 7500, 0, 7499, 400000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 73, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, 8, '2025-02-18 11:53:23', NULL, NULL),
(62, NULL, NULL, 1, 'MANU THOMAS', 'KL 17 P 3460', NULL, NULL, '2025-02-17', '2026-02-16', 21, NULL, 1191, NULL, 0, 1191, 0, 13, 4, '2025-02-18', 1, NULL, 0, 0, 6, 74, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(63, NULL, NULL, 1, 'NIZAR', 'KL 02 AY 2833', NULL, NULL, '2025-02-18', '2026-02-17', 2, NULL, 5138, 5600, 400, 5538, 200000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 75, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, 8, '2025-02-18 11:58:58', NULL, NULL),
(64, NULL, NULL, 1, 'JAMSHEER M', 'KL 08 CA 4962', '9947415551', NULL, '2025-02-18', '2026-02-17', 46, NULL, 5649, 5500, 0, 5649, 600000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 76, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, 8, '2025-02-18 12:04:29', NULL, NULL),
(65, NULL, NULL, 1, 'ARUN GOPI', 'KL 17 U 6912', NULL, NULL, '2025-02-18', '2026-02-17', 38, NULL, 14860, NULL, 0, 14860, 433201, 13, 6, '2025-02-18', 2, NULL, 0, 0, 9, 77, '2025-02-18', 13, '2025-02-18', 1, NULL, 13, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(66, NULL, NULL, 1, 'BABY JOSE', 'KL 22 G 2000', NULL, NULL, '2025-02-21', '2026-02-20', 8, NULL, 5813, NULL, 0, 5813, 290000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 64, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(67, NULL, NULL, 1, 'GINU JOHNY', 'KL 17 K 1492', '9633667697', NULL, '2025-02-17', '2026-02-16', 47, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 2, 78, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, 8, '2025-02-18 12:10:19', NULL, NULL),
(68, NULL, NULL, 1, 'THILAKAN K A', 'KL 17 R 9696', NULL, NULL, '2025-02-19', '2026-02-18', 38, NULL, 6809, NULL, 0, 6809, 405000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 2, 79, '2025-02-18', 13, '2025-02-18', 1, NULL, 9, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(69, NULL, NULL, 1, 'GIGI THOMAS', 'KL 17 R 8254', NULL, NULL, '2025-02-23', '2026-02-22', 21, NULL, 1499, NULL, 0, 1499, 30000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 64, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(70, NULL, NULL, 1, 'ANOOP M', 'KL 07 CR 0276', NULL, NULL, '2025-02-18', '2026-02-17', 48, NULL, 1354, NULL, 0, 1354, 31000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 80, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(71, NULL, NULL, 1, 'SANTHOSH S', 'KL 55 N 9416', NULL, NULL, '2025-02-18', '2025-08-07', 49, NULL, 800, NULL, 0, 800, 1300000, 13, 7, '2025-02-18', 2, NULL, 0, 0, 9, 81, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(72, NULL, NULL, 1, 'THE PROPRIETOR SHALUMON T', 'KL 07 CX 7830', NULL, NULL, '2025-02-18', '2026-02-17', 50, NULL, 746, NULL, 0, 746, 80000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 82, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(73, NULL, NULL, 1, 'VARUN JOHN', 'KL 17 X 8004', '9946609966', NULL, '2025-02-17', '2026-02-16', 51, NULL, 8445, NULL, 0, 8445, 800000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 3, 84, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, 8, '2025-02-18 12:07:14', NULL, NULL),
(74, NULL, NULL, 1, 'GIBI VARGHESE', 'KL 39 L 9822', NULL, NULL, '2025-02-18', '2026-02-17', 52, NULL, 7458, NULL, 0, 7458, 140000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 6, 85, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(75, NULL, NULL, 1, 'VIVEK T MANI', 'KL 42 P 0001', '9847006397', NULL, '2025-02-20', '2026-02-19', 53, NULL, 28093, NULL, 0, 28093, 3700000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 42, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, 8, '2025-02-18 12:10:55', NULL, NULL),
(76, NULL, NULL, 1, 'SUDHEER K K', 'KL 41 K 1037', NULL, NULL, '2025-02-18', '2026-02-17', 38, NULL, 6508, NULL, 0, 6508, 275000, 13, 5, '2025-02-18', 2, NULL, 0, 0, 6, 86, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(77, NULL, NULL, 1, 'DEVANARAYANAN P M', 'KL 11 BF 1841', NULL, NULL, '2025-02-18', '2026-02-17', 20, NULL, 8803, NULL, 0, 8803, 925000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 87, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(78, NULL, NULL, 1, 'SIJI GEORGE', 'KL 17 V 6756', '9947415551', NULL, '2025-02-17', '2026-02-16', 2, NULL, 4469, 4400, 0, 4469, 300000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 76, '2025-02-18', 13, '2025-02-18', 1, NULL, 12, NULL, NULL, 7, 8, '2025-02-18 12:05:33', NULL, NULL),
(79, NULL, NULL, 1, 'JEEMON', 'KL 07 U 1211', NULL, NULL, '2025-02-19', '2026-02-18', 54, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 6, 88, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(80, NULL, NULL, 1, 'ANEESH G NAIR', 'KL 44 H 6042', NULL, NULL, '2025-02-18', '2026-02-17', 9, NULL, 7478, NULL, 0, 7478, 450000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 42, '2025-02-18', 13, '2025-02-18', 1, NULL, 8, NULL, NULL, 7, 8, '2025-02-18 12:11:24', NULL, NULL),
(81, NULL, NULL, 1, 'M K SANIL', 'KL 38 G 5602', NULL, NULL, '2025-02-18', '2026-02-17', 21, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-18', 1, NULL, 0, 0, 6, 64, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(82, NULL, NULL, 1, 'HASHMI AHAMED', 'KL 01 CT 5014', '7907784855', NULL, '2025-02-18', '2026-02-17', 55, NULL, 15210, 15000, 0, 15210, 880000, 13, 4, '2025-02-18', 2, NULL, 0, 0, 2, 89, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, 8, '2025-02-18 12:09:38', NULL, NULL),
(83, NULL, NULL, 1, 'VINOTH', 'KL 38 F 5710', NULL, NULL, '2025-02-18', '2026-02-17', 56, NULL, 1453, NULL, 0, 1453, 36000, 13, 6, '2025-02-18', 2, NULL, 0, 0, 6, 90, '2025-02-18', 13, '2025-02-18', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(84, NULL, NULL, 1, 'PRAKASH', 'KL 08 BG 9009', NULL, NULL, '2025-02-18', '2026-02-17', 53, NULL, 17345, NULL, 0, 17345, 1800000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 92, '2025-02-19', 13, '2025-02-19', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(85, NULL, NULL, 1, 'TINTU BABY', 'KL 44 B 3842', NULL, NULL, '2025-02-24', '2026-02-23', 21, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-19', 1, NULL, 0, 0, 6, 93, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(86, NULL, NULL, 1, 'ARUN ELDHO ALIAS', 'KL 44 H 0900', NULL, NULL, '2025-02-21', '2026-02-20', 57, NULL, 19604, NULL, 0, 19604, 1510000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 94, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(87, NULL, NULL, 1, 'SHAMEER A', 'KL 13 AL 7245', NULL, NULL, '2025-02-19', '2026-02-18', 9, NULL, 5510, NULL, 0, 5510, 360000, 13, 6, '2025-02-19', 2, NULL, 0, 0, 6, 47, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(88, NULL, NULL, 1, 'ROBIN TYTES', 'KL 23 H 1074', NULL, NULL, '2025-02-19', '2026-02-18', 58, NULL, 6203, NULL, 0, 6203, 275000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 95, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(89, NULL, NULL, 1, 'BINOJ', 'KL 38 J 4365', NULL, NULL, '2025-02-26', '2026-02-25', 7, NULL, 3801, NULL, 0, 3801, 230000, 13, 6, '2025-02-19', 2, NULL, 0, 0, 6, 96, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(90, NULL, NULL, 1, 'JOSE PAUL', 'KL 17 Q 3670', NULL, NULL, '2025-02-23', '2026-02-22', 29, NULL, 2204, NULL, 0, 2204, 32000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 97, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(91, NULL, NULL, 1, 'NIDHIN A M', 'KL 29 F 3721', NULL, NULL, '2025-02-20', '2026-02-19', 59, NULL, 1227, NULL, 0, 1227, 0, 13, 4, '2025-02-19', 1, NULL, 0, 0, 6, 71, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(92, NULL, NULL, 1, 'SUDHAKARAN NAIR', 'KL 20 9944', NULL, NULL, '2025-02-19', '2026-02-18', 60, NULL, 1167, NULL, 0, 1167, 0, 13, 4, '2025-02-19', 1, NULL, 0, 0, 6, 98, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(93, NULL, NULL, 1, 'NIXON LOUIS', 'KL 41 A 5823', NULL, NULL, '2025-02-20', '2026-02-19', 61, NULL, 10700, NULL, 0, 10700, 0, 13, 8, '2025-02-19', 1, NULL, 0, 0, 2, 99, '2025-02-19', 13, '2025-02-19', 2, 'BENNY RELIANCE', 16, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(94, NULL, NULL, 1, 'MANAGING DIRECTOR', 'KL 07 CJ 4392', NULL, NULL, '2025-02-20', '2026-02-19', 20, NULL, 6329, NULL, 0, 6329, 550000, 13, 6, '2025-02-19', 2, NULL, 0, 0, 6, 100, '2025-02-19', 13, '2025-02-19', 1, NULL, 12, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(95, NULL, NULL, 1, 'ARCHANA SURESH', 'KL 40 V 9995', NULL, NULL, '2025-02-19', '2026-02-18', 8, NULL, 12591, NULL, 0, 12591, 650000, 13, 6, '2025-02-19', 2, NULL, 0, 0, 6, 53, '2025-02-19', 13, '2025-02-19', 1, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(96, NULL, NULL, 1, 'MANI SANTHOSH', 'KL 40 R 2975', NULL, NULL, '2025-02-19', '2026-02-18', 49, NULL, 8958, NULL, 0, 8958, 0, 13, 4, '2025-02-19', 1, NULL, 0, 0, 6, 101, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(97, NULL, NULL, 1, 'SIBI', 'KL 44 9477', NULL, NULL, '2025-02-19', '2026-02-18', 62, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-02-19', 1, NULL, 0, 0, 6, 64, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(98, NULL, NULL, 1, 'RENJITH K R', 'KL 05 AM 9607', NULL, NULL, '2025-02-19', '2026-02-18', 38, NULL, 7499, NULL, 0, 7499, 400000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 32, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(99, NULL, NULL, 1, 'ARAVIND NAIR', 'KL 07 CT 9059', NULL, NULL, '2025-02-20', '2026-02-19', 63, NULL, 7413, NULL, 0, 7413, 910000, 13, 4, '2025-02-19', 2, NULL, 0, 0, 6, 102, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(100, NULL, NULL, 1, 'MAHESH P K', 'KL 38 A 1611', NULL, NULL, '2025-02-20', '2026-02-19', 64, NULL, 4415, NULL, 0, 4415, 0, 13, 6, '2025-02-19', 1, NULL, 0, 0, 6, 103, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(101, NULL, NULL, 1, 'GIRLY THOMAS', 'KL 21 G 1860', NULL, NULL, '2025-02-20', '2026-02-19', 65, NULL, 4415, NULL, 0, 4415, 0, 13, 6, '2025-02-19', 1, NULL, 0, 0, 6, 104, '2025-02-19', 13, '2025-02-19', 1, NULL, 3, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(102, NULL, NULL, 1, 'AYYAPPAN', 'KL 17 U 6435', '9995395966', NULL, '2025-02-26', '2026-02-26', 67, NULL, 15056, 14600, 0, 15056, 6.15, 8, 6, '2025-02-20', 2, 1, 0, 0, 2, 105, '2025-02-20', 8, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(103, NULL, NULL, 1, 'AYYAPPAN', 'KL 17 U 6435', '9995395966', NULL, '2025-02-26', '2026-02-26', 67, NULL, 15056, 14600, 0, 15056, 6.15, 8, 6, '2025-02-20', 2, 1, 0, 0, 2, 105, '2025-02-20', 8, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(104, NULL, NULL, 1, 'AYYAPPAN', 'KL 17 U 6435', '9995395966', NULL, '2025-02-26', '2026-02-26', 67, NULL, 15056, 14600, 0, 15056, 6.15, 8, 6, '2025-02-20', 2, 1, 0, 0, 2, 105, '2025-02-20', 8, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(105, NULL, NULL, 1, 'T K PRASAD', 'KL 43 Q 5657', '9995487970', NULL, '2025-02-20', '2026-02-20', 68, NULL, 8471, 8471, 0, 8471, 1500000, 8, 6, '2025-02-20', 2, 0, 0, 0, 7, 106, '2025-02-20', 8, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(106, NULL, NULL, 1, 'SUNITHA', 'KL 05 AP 6364', '9747900659', NULL, '2025-02-20', '2026-02-20', 69, NULL, 7311, 7300, 0, 7311, 370000, 13, 6, '2025-02-20', 2, 0, 0, 0, 7, 17, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(107, NULL, NULL, 1, 'SELIN', 'KL 29 J 7761', NULL, NULL, '2025-02-20', '2026-02-20', 3, NULL, 6002, 6000, 0, 6002, 190000, 13, 6, '2025-02-20', 2, NULL, 0, 0, 7, 107, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, NULL, 8, NULL, NULL, NULL, NULL),
(108, NULL, NULL, 1, 'PADMANABHAN', 'KL 39 H 5443', NULL, NULL, '2025-02-20', '2026-02-20', 70, NULL, 6003, 6000, 0, 6003, 200000, 8, 6, '2025-02-20', 2, 1, 0, 0, 2, 108, '2025-02-20', 8, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(109, NULL, NULL, 1, 'SUMEER K', 'KL 33 E 8273', '9947971388', NULL, '2025-02-21', '2026-02-21', 38, NULL, 6806, 6800, 0, 6806, 300000, 8, 6, '2025-02-20', 2, 0, 0, 0, 7, 109, '2025-02-20', 8, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(110, NULL, NULL, 1, 'RAVI', 'KL 55 A 0430', '8590335891', NULL, '2025-02-21', '2026-02-21', 71, NULL, 9702, 9700, 0, 9702, 0, 13, 6, '2025-02-20', 1, NULL, 0, 0, 1, 110, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, NULL, 8, NULL, NULL, NULL, NULL),
(111, NULL, NULL, 1, 'AJITHA', 'KL 17 R 1191', '8590335891', NULL, '2025-02-21', '2026-02-21', 21, NULL, 1500, 1500, 0, 1500, 34000, 13, NULL, '2025-02-20', 2, 1, 0, 0, 1, 110, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(112, NULL, NULL, 1, 'AJITHA', 'KL 17 R 1191', '8590335891', NULL, '2025-02-21', '2026-02-21', 21, NULL, 1500, 1500, 0, 1500, 34000, 13, NULL, '2025-02-20', 2, 1, 0, 0, 1, 110, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(113, NULL, NULL, 1, 'ABHISHEK', 'KL 17 U 6510', '9946805100', NULL, '2025-02-21', '2026-02-21', 21, NULL, 1503, 1500, 0, 1503, 30337, 13, 6, '2025-02-20', 2, 0, 0, 0, 7, 111, '2025-02-20', 13, '2025-02-20', 1, NULL, 8, NULL, 1, 8, NULL, NULL, NULL, NULL),
(114, NULL, NULL, 1, 'ROY', 'KL 07 DA 6060', '8547041727', NULL, '2025-02-21', '2026-02-21', 72, NULL, 45490, 42500, 0, 45490, 4800000, 13, 6, '2025-02-20', 2, 0, 45490, 0, 7, 112, '2025-02-20', 13, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(115, NULL, NULL, 1, 'JOHN', 'KL 03 T 7857', '9447421539', NULL, '2025-02-21', '2026-02-21', 73, NULL, 9702, 9700, 0, 9702, 0, 13, 6, '2025-02-20', 1, 0, 0, 0, 7, 113, '2025-02-20', 13, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(116, NULL, NULL, 1, 'SAJEEV', 'KL 01 AL 4066', '9961775038', NULL, '2025-02-21', '2026-02-21', 74, NULL, 1167, 1167, 0, 1167, 0, 8, 6, '2025-02-20', 1, 1, 1167, 0, 2, 114, '2025-02-20', 8, '2025-02-20', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(117, NULL, NULL, 1, 'SANDEEP', 'KL 32 S 5121', '9747535550', NULL, '2025-02-23', '2026-02-23', 75, NULL, 27914, 27914, 0, 27914, 1440000, 8, 6, '2025-02-20', 2, 1, 27914, 0, 3, 115, '2025-02-20', 8, '2025-02-20', 1, NULL, 12, NULL, 1, 8, NULL, NULL, NULL, NULL),
(118, NULL, NULL, 1, 'SHAYAL', 'KL 39 L 5601', '7025641018', NULL, '2025-02-22', '2026-02-22', 9, NULL, 5058, 5000, 0, 5058, 300000, 8, 6, '2025-02-21', 2, 1, 5058, 0, 2, 116, '2025-02-21', 8, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(119, NULL, NULL, 1, 'SHIHAB', 'KL 40 J 8050', '9869606160', NULL, '2025-02-22', '2026-02-22', 76, NULL, 6806, 6800, 0, 6806, 300000, 8, 6, '2025-02-21', 2, 1, 6806, 0, 2, 117, '2025-02-21', 8, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(120, NULL, NULL, 1, 'SATHEESH', 'KL 07 AA 3257', '9447105006', NULL, '2025-02-22', '2026-02-22', 77, NULL, 1167, 1167, 0, 1167, 0, 8, 4, '2025-02-21', 1, 1, 1167, 0, 2, 118, '2025-02-21', 8, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(121, NULL, NULL, 1, 'RIO', 'KL 33 P 9534', '9746457867', NULL, '2025-02-22', '2026-02-22', 78, NULL, 2483, NULL, 0, 2483, 0, 8, 8, '2025-02-21', 1, 0, 0, 0, 7, 119, '2025-02-21', 8, '2025-02-21', 1, NULL, 8, NULL, 1, 8, NULL, NULL, NULL, NULL),
(122, NULL, NULL, 1, 'JISHA', 'KL 17 Y 4621', NULL, NULL, '2025-02-23', '2026-02-23', 79, NULL, 854, 850, 0, 854, 0, 9, 4, '2025-02-21', 1, 1, 854, 0, 2, 45, '2025-02-21', 9, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(123, NULL, NULL, 1, 'RAJESH', 'KL 05 AR 6873', '9400839599', NULL, '2025-02-23', '2026-02-23', 38, NULL, 7230, 7200, 0, 7230, 450000, 13, 4, '2025-02-21', 2, 0, 0, 0, 7, 51, '2025-02-21', 13, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(124, NULL, NULL, 1, 'NOUSHAD', 'KL 47 F 4685', '8943753817', NULL, '2025-02-22', '2026-02-22', 38, NULL, 8500, 8500, 0, 8500, 500000, 8, 4, '2025-02-21', 2, 0, 8500, 0, 7, 120, '2025-02-21', 8, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(125, NULL, NULL, 1, 'RAHUL', 'KL 54 K 1038', '8943339633', NULL, '2025-02-22', '2026-02-22', 80, NULL, 7606, 7600, 0, 7606, 400000, 13, 4, '2025-02-21', 2, NULL, 7606, 0, 7, 121, '2025-02-21', 13, '2025-02-21', 1, NULL, 3, NULL, NULL, 8, NULL, NULL, NULL, NULL),
(126, NULL, NULL, 1, 'MANUMON', 'KL 05  AV 6769', '8943339633', NULL, '2025-02-22', '2026-02-22', 58, NULL, 10005, 10000, 500, 10505, 715000, 13, 13, '2025-02-21', 2, 0, 0, 0, 7, 121, '2025-02-21', 13, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(127, NULL, NULL, 1, 'NIKHIL', 'KL 44 D 8049', NULL, NULL, '2025-02-22', '2026-02-22', 6, NULL, 4499, 4500, 0, 4499, 200000, 3, 6, '2025-02-21', 2, 1, 4499, 0, 2, 122, '2025-02-21', 3, '2025-02-21', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(128, NULL, NULL, 1, 'AMAL', 'KL 07 BM 4037', '9744469408', NULL, '2025-02-22', '2026-02-22', 81, NULL, 7196, 5500, 0, 7196, 0, 13, 8, '2025-02-22', 1, 1, 7196, 0, 2, 123, '2025-02-22', 13, '2025-02-22', 2, 'UNICA', 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(129, NULL, NULL, 1, 'SANEESH', 'KL 17 K 6979', '9995548632', NULL, '2025-02-23', '2026-02-23', 38, NULL, 6939, 6900, 0, 6939, 320000, 8, 6, '2025-02-22', 2, 1, 6939, 0, 2, 124, '2025-02-22', 8, '2025-02-22', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(130, NULL, NULL, 1, 'AKHIL', 'KL 17 N 6689', '7356466896', NULL, '2025-02-23', '2026-02-23', 37, NULL, 4800, 5100, 400, 5200, 100000, 3, 4, '2025-02-22', 2, 1, 4800, 0, 9, 122, '2025-02-22', 3, '2025-02-22', 1, NULL, 3, NULL, 1, 8, NULL, NULL, NULL, NULL),
(131, NULL, NULL, 1, 'PRABEESH SANKAR', 'KL-17-U/2564', '9847006397', NULL, '2025-02-28', '2026-03-01', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-03', 1, 0, 0, 0, 7, 42, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(132, NULL, NULL, 1, 'MAHIN SALIM', 'KL-44-C/7238', '7306519653', NULL, '2025-02-28', '2026-03-01', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-03-03', 1, 0, 0, 0, 7, 64, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(133, NULL, NULL, 1, 'ANI MATHEW', 'KL-17-M/6809', '9778202847', NULL, '2025-02-28', '2026-03-01', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-03-03', 1, 0, 0, 0, 7, 125, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(134, NULL, NULL, 1, 'HARIS HAMEED', 'KL-32-M/1275', '9029404272', NULL, '2025-02-28', '2026-03-01', 18, NULL, 6410, 6400, 0, 6410, 450000, 13, 6, '2025-03-03', 2, 1, 6410, 0, 2, 126, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(136, NULL, NULL, 1, 'VIBINFRANCIS K F', 'KL-07-BY/6000', '7592907014', NULL, '2025-02-28', '2026-03-02', 58, NULL, 7509, 7500, 0, 7509, 350000, 13, 4, '2025-03-03', 2, 1, 7509, 0, 2, 116, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(137, NULL, NULL, 1, 'JITHINSHAH BASHEER', 'KL-04-AK/5374', '7012119237', NULL, '2025-02-28', '2026-03-01', 6, NULL, 4811, 4800, 0, 4811, 300000, 13, 6, '2025-03-03', 2, 1, 4811, 0, 2, 126, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(138, NULL, NULL, 1, 'ARUN GOPI', 'KL-44-G/2410', '9847006397', NULL, '2025-02-28', '2026-03-01', 82, NULL, 6704, 6700, 0, 6704, 300000, 13, 4, '2025-03-03', 2, 0, 0, 0, 7, 42, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(139, NULL, NULL, 1, 'SHAJU K V', 'KL-08-BH/6121', '9072751222', NULL, '2025-02-28', '2026-03-01', 32, NULL, 6508, 0, 0, 6508, 350000, 13, 6, '2025-03-03', 2, 0, 0, 0, 7, 127, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, 4, '2025-03-03 09:00:54', NULL, NULL),
(140, NULL, NULL, 1, 'ROOPESH T', 'KL-01-BQ/0263', '8891472882', NULL, '2025-02-28', '2026-03-01', 38, NULL, 6806, 6800, 0, 6806, 300000, 13, 4, '2025-03-03', 2, 1, 6806, 0, 2, 128, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, 4, '2025-03-03 08:58:21', NULL, NULL),
(141, NULL, NULL, 1, 'SALY TOMY', 'KL-07-CU/0521', '8943339633', NULL, '2025-03-01', '2026-03-02', 58, NULL, 8820, 0, 0, 8820, 750000, 13, 4, '2025-03-03', 2, 0, 0, 0, 7, 121, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, 4, '2025-03-03 08:56:35', NULL, NULL),
(142, NULL, NULL, 1, 'MUJEEB V K', 'KL-38-L/5087', '9947415551', NULL, '2025-02-28', '2026-03-01', 83, NULL, 16902, 16900, 0, 16902, 600000, 13, 6, '2025-03-03', 2, 1, 16902, 0, 2, 129, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(143, NULL, NULL, 1, 'REENU JACOB', 'KL 44 F 5726', '8606584427', NULL, '2025-02-28', '2026-03-01', 38, NULL, 8219, 0, 0, 8219, 430000, 13, 4, '2025-03-03', 2, 0, 8219, 0, 7, 130, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(144, NULL, NULL, 1, 'ATHIRA RAMACHANDRAN', 'KL-17-R/8369', '8547483428', NULL, '2025-03-01', '2026-03-02', 4, NULL, 1353, 1350, 0, 1353, 30000, 13, 6, '2025-03-03', 2, 1, 1353, 0, 2, 131, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(145, NULL, NULL, 1, 'SAJI', 'KL - 37 - A - 3222', '9846206032', NULL, '2025-03-03', '2026-03-02', 11, NULL, 9702, 9702, 0, 9702, 0, 13, 6, '2025-03-03', 1, 1, 9702, 0, 3, 132, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(146, NULL, NULL, 1, 'SAJEEV', 'KL17E9352', '9846206032', NULL, '2025-03-05', '2026-03-04', 84, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-03', 1, 0, 0, 0, 7, 132, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(147, NULL, NULL, 1, 'KJ JIJO', 'KL - 17 - E - 0979', '9142520062', NULL, '2025-03-07', '2026-03-06', 85, NULL, 55600, 55600, 0, 55600, 0, 13, 6, '2025-03-03', 1, 0, 0, 0, 7, 133, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(148, NULL, NULL, 1, 'CHERIYAN CHANDY', 'KL-17-L/4628', '9847858998', NULL, '2025-03-03', '2026-03-02', 21, NULL, 1402, 1400, 0, 1402, 23000, 13, 4, '2025-03-03', 2, 1, 1402, 0, 1, 134, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(149, NULL, NULL, 1, 'SUNITHA', 'KL - 17 - U - 6969', '9745550924', NULL, '2025-03-03', '2026-03-02', 86, NULL, 6505, 6500, 0, 6505, 1150000, 13, 6, '2025-03-03', 2, 0, 0, 0, 7, 135, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(150, NULL, NULL, 1, 'T N RAJAPPAN', 'KL - 27 - C - 0524', '8589832852', NULL, '2025-03-02', '2026-03-01', 7, NULL, 2855, 2850, 0, 2855, 0, 13, 6, '2025-03-03', 1, 1, 2855, 0, 2, 64, '2025-03-03', 13, '2025-03-03', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(151, NULL, NULL, 1, 'ANEESH A GANGADHARAN PROPRIETOR', 'KL - 40 - S - 8868', '9961714669', NULL, '2025-03-02', '2026-03-01', 87, NULL, 58008, 0, 0, 58008, 3950000, 13, 4, '2025-03-04', 2, 0, 0, 0, 7, 136, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(152, NULL, NULL, 1, 'ANEESH A G', 'KL - 40 - S - 6811', '9961714669', NULL, '2025-03-02', '2026-03-01', 88, NULL, 60725, 0, 0, 60725, 3750000, 13, 4, '2025-03-04', 2, 0, 0, 0, 7, 136, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(153, NULL, NULL, 1, 'MAHESH A', 'KL-07-CY-2666', '9961730949', NULL, '2025-03-03', '2026-03-02', 11, NULL, 24992, 0, 0, 24992, 1080000, 13, 13, '2025-03-04', 2, 0, 0, 0, 7, 72, '2025-03-04', 13, '2025-03-04', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(154, NULL, NULL, 1, 'ALI AKBAR', 'KL - 13 - AK - 8975', '7994277287', NULL, '2025-03-02', '2026-03-01', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-04', 1, 1, 1167, 0, 2, 137, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(155, NULL, NULL, 1, 'E S ABOOBACKER', 'KL-07-CQ/8686', '9447579332', NULL, '2025-03-03', '2026-03-02', 89, NULL, 8001, 0, 0, 8001, 700000, 13, 4, '2025-03-04', 2, 0, 8001, 0, 7, 138, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(156, NULL, NULL, 1, 'JAMAL M S', 'KL-44-B/1310', '9846687458', NULL, '2025-03-05', '2026-03-04', 21, NULL, 1505, NULL, 0, 1505, 23000, 13, 4, '2025-03-04', 2, 0, 1505, 0, 7, 138, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(157, NULL, NULL, 1, 'RESHMA P RAJ', 'KL-17-T/3666', '8086950143', NULL, '2025-03-04', '2026-03-03', 42, NULL, 8000, 0, 0, 8000, 620000, 13, 4, '2025-03-04', 2, 0, 8000, 0, 7, 139, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(158, NULL, NULL, 1, 'JISHAD', 'KL-47-G-1368', '9847401771', NULL, '2025-03-08', '2026-03-07', 26, NULL, 13100, 13100, 0, 13100, 1000000, 13, 6, '2025-03-04', 2, 1, 0, 0, 2, 140, '2025-03-04', 13, '2025-03-04', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(159, NULL, NULL, 1, 'JISHAD', 'KL-47-G-1368', '9847401771', NULL, '2025-03-08', '2026-03-07', 26, NULL, 13100, 13100, 0, 13100, 1000000, 13, 6, '2025-03-04', 2, 1, 0, 0, 2, 140, '2025-03-04', 13, '2025-03-04', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(160, NULL, NULL, 1, 'SINSHAD P Y', 'KL - 17 - R - 4560', '9633179655', NULL, '2025-03-03', '2026-03-02', 91, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-04', 1, 1, 0, 0, 2, 141, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(161, NULL, NULL, 1, 'JOLLY', 'KL17J8133', '9400892852', NULL, '2025-03-04', '2026-03-03', 27, NULL, 5500, 5500, 0, 5500, 0, 13, 6, '2025-03-04', 1, 1, 5500, 0, 1, 64, '2025-03-04', 13, '2025-03-04', 2, 'BIJO BABBY', 17, NULL, 2, 4, NULL, NULL, NULL, NULL),
(162, NULL, NULL, 1, 'ANILKUMAR B', 'KL-35-K/6762', '9544427910', NULL, '2025-03-04', '2026-03-03', 92, NULL, 6750, 6750, 0, 6750, 390000, 13, 6, '2025-03-04', 2, 1, 6750, 0, 2, 142, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(163, NULL, NULL, 1, 'RADHAKRISHNAN', 'KL16V7508', '9495026600', NULL, '2025-03-04', '2026-03-03', 27, NULL, 5500, 0, 0, 5500, 0, 13, 6, '2025-03-04', 1, 0, 0, 0, 7, 28, '2025-03-04', 13, '2025-03-04', 2, 'BIJO BABBY', 17, NULL, 2, 4, NULL, NULL, NULL, NULL),
(164, NULL, NULL, 1, 'PRAVEEN KUMAR V P', 'KL-07-CU/0517', '9645443637', NULL, '2025-03-05', '2026-03-04', 36, NULL, 5053, 0, 0, 5053, 295000, 13, 6, '2025-03-04', 2, 0, 0, 0, 7, 107, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(165, NULL, NULL, 1, 'PRAVEEN KUMAR V P', 'KL07CF7293', '9645443637', NULL, '2025-03-08', '2026-03-07', 93, NULL, 1937, 0, 0, 1937, 0, 13, 6, '2025-03-04', 1, 0, 1937, 0, 7, 107, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(166, NULL, NULL, 1, 'BAIJU BABU', 'KL-39-K-9835', '9446474999', NULL, '2025-03-07', '2026-03-06', 94, NULL, 12800, 12800, 0, 12800, 495000, 13, 6, '2025-03-04', 2, 1, 12800, 0, 2, 143, '2025-03-04', 13, '2025-03-04', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(167, NULL, NULL, 1, 'KABEER KHAN', 'KL - 17 - J - 0234', '9656201804', NULL, '2025-03-04', '2026-03-03', 49, NULL, 11438, 0, 0, 11438, 780000, 13, 6, '2025-03-04', 2, 0, 0, 0, 7, 144, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(168, NULL, NULL, 1, 'BASHEER', 'KL-41-H/5693', '8589832852', NULL, '2025-03-04', '2026-03-03', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-04', 1, 1, 1167, 0, 1, 64, '2025-03-04', 13, '2025-03-04', 1, 'BIJO BABBY', 3, NULL, 2, 4, 4, '2025-03-04 12:10:40', NULL, NULL),
(169, NULL, NULL, 1, 'PRAJEESH K JOSE', 'KL-44-C/9835', '9946184109', NULL, '2025-03-14', '2026-03-13', 69, NULL, 6300, 6300, 0, 6300, 322000, 13, 6, '2025-03-04', 2, 1, 6300, 0, 2, 145, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(170, NULL, NULL, 1, 'SHANMUGHA PRIYAN R', 'TN-41-AE-2796', '9400901807', NULL, '2025-03-19', '2026-03-18', 95, NULL, 4850, 0, 0, 4850, 0, 13, 6, '2025-03-04', 1, 0, 0, 0, 7, 146, '2025-03-04', 13, '2025-03-04', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(171, NULL, NULL, 1, 'SREEJA V G', 'KL-44-F/5426', '9847006397', NULL, '2025-03-04', '2026-03-03', 8, NULL, 4200, 0, 0, 4200, 225000, 13, 6, '2025-03-04', 2, 0, 0, 0, 7, 42, '2025-03-04', 13, '2025-03-04', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(172, NULL, NULL, 1, 'M V VARGHESE', 'KL-41-J/7181', '9447105006', NULL, '2025-03-04', '2026-03-03', 96, NULL, 8000, 8000, 0, 8000, 450000, 13, 6, '2025-03-05', 2, 1, 8000, 0, 2, 147, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(173, NULL, NULL, 1, 'ROJI JOSEPH', 'KL-44-/6726', '9539712437', NULL, '2025-03-04', '2026-03-03', 21, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-05', 1, 1, 1167, 0, 1, 148, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(174, NULL, NULL, 1, 'BINCY MATHEW', 'KL-39-H/0997', '9947242226', NULL, '2025-03-04', '2026-03-03', 97, NULL, 5800, 0, 0, 5800, 350000, 13, 6, '2025-03-05', 2, 0, 0, 0, 7, 10, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(175, NULL, NULL, 1, 'AKHIL P O', 'KL-17-Z-1123', '8606774860', NULL, '2025-03-04', '2026-03-03', 98, NULL, 17645, 0, 0, 17645, 641250, 13, 4, '2025-03-05', 2, 0, 0, 0, 7, 149, '2025-03-05', 13, '2025-03-05', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(176, NULL, NULL, 1, 'SAHIDHA NISSAR', 'KL-40-K/4142', '8089122100', NULL, '2025-03-04', '2026-03-03', 38, NULL, 7600, 7600, 0, 7600, 0, 13, 6, '2025-03-05', 2, 1, 7600, 0, 3, 150, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(177, NULL, NULL, 1, 'NASSAR', 'KL-17-R-9006', '7012006022', NULL, '2025-03-03', '2026-03-02', 99, NULL, 6000, 0, 0, 6000, 380000, 13, 6, '2025-03-05', 2, 0, 0, 0, 7, 17, '2025-03-05', 13, '2025-03-05', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(178, NULL, NULL, 1, 'AYYAPPAN S', 'KL-17-Q/3933', '9995395966', NULL, '2025-03-18', '2026-03-17', 47, NULL, 1300, 0, 0, 1300, 22500, 13, 6, '2025-03-05', 2, 0, 0, 0, 7, 151, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(179, NULL, NULL, 1, 'MANIKANDAN POUNRAJ', 'KL-01-CR/1960', '9497660745', NULL, '2025-03-04', '2026-03-03', 36, NULL, 7500, 7500, 0, 7500, 510000, 13, 6, '2025-03-05', 2, 0, 7500, 0, 2, 152, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(180, NULL, NULL, 1, 'HAFIS T RASHEED', 'KL-41-L/2441', '9400892852', NULL, '2025-03-04', '2026-03-03', 47, NULL, 900, 0, 0, 900, 0, 13, 6, '2025-03-05', 1, 0, 900, 0, 7, 64, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(181, NULL, NULL, 1, 'HARIKRISHNAN', 'KL-17-N/9360', '9961442275', NULL, '2025-03-04', '2026-03-03', 100, NULL, 1450, 1450, 0, 1450, 22000, 13, 6, '2025-03-05', 2, 1, 1450, 0, 2, 153, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(182, NULL, NULL, 1, 'AJO M VARGHESE', 'KL-17-H/9393', '9745377738', NULL, '2025-03-04', '2026-03-03', 83, NULL, 6400, 0, 0, 6400, 350000, 13, 6, '2025-03-05', 2, 0, 0, 0, 7, 130, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(183, NULL, NULL, 1, 'MINI', 'KL - 68 - B - 1783', '9496986834', NULL, '2025-03-04', '2026-03-03', 9, NULL, 5800, 5800, 0, 5800, 380000, 13, 6, '2025-03-05', 2, 1, 5800, 0, 2, 154, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(184, NULL, NULL, 1, 'ALAVIDEEN', 'KL - 26 - G - 1806', '9747005876', NULL, '2025-03-04', '2026-03-03', 24, NULL, 7000, 7000, 0, 7000, 325000, 13, 6, '2025-03-05', 2, 1, 7000, 0, 2, 155, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(185, NULL, NULL, 1, 'BIJU V P', 'KL-17-K/2531', '9526981559', NULL, '2025-03-05', '2026-03-04', 47, NULL, 1167, 0, 0, 1167, 0, 13, 4, '2025-03-05', 1, 1, 1167, 0, 2, 156, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(186, NULL, NULL, 1, 'BADUSHA', 'KL-07-CF/7578', '8089122100', NULL, '2025-03-11', '2026-03-10', 76, NULL, 5500, 0, 0, 5500, 0, 13, 6, '2025-03-05', 2, 1, 5500, 0, 3, 157, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(187, NULL, NULL, 1, 'FAISAL C A', 'KL-17-Y/4980', '9496826394', NULL, '2025-03-07', '2026-03-06', 47, NULL, 800, 0, 0, 800, 91000, 13, 4, '2025-03-05', 2, 0, 0, 0, 7, 158, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(188, NULL, NULL, 1, 'TONY JOJI', 'KL-38-C-6004', '9809944444', NULL, '2025-03-17', '2026-03-16', 101, NULL, 10800, 10800, 0, 10800, 300000, 13, 6, '2025-03-05', 2, 1, 10800, 0, 2, 159, '2025-03-05', 13, '2025-03-05', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(189, NULL, NULL, 1, 'JEEVAN', 'KL-07-CC/1012', '9744399552', NULL, '2025-03-05', '2026-03-04', 92, NULL, 4400, 4400, 0, 4400, 0, 13, 4, '2025-03-05', 1, 1, 4400, 0, 2, 160, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(190, NULL, NULL, 1, 'BINDU RAJU', 'KL-17-L/5062', '7012264646', NULL, '2025-03-07', '2026-03-06', 38, NULL, 5300, 0, 0, 5300, 230000, 13, 6, '2025-03-05', 2, NULL, 0, 0, 7, 84, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(191, NULL, NULL, 1, 'SHARON JOSH', 'KL-07-CM/8569', '9746623325', NULL, '2025-03-06', '2026-03-05', 102, NULL, 6000, 6000, 0, 6000, 200000, 13, 4, '2025-03-05', 2, 1, 6000, 0, 2, 161, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(192, NULL, NULL, 1, 'JANARDHANAN', 'KL-39-R/2858', '9072063636', NULL, '2025-03-05', '2026-03-04', 103, NULL, 15000, 0, 0, 15000, 1400000, 13, 4, '2025-03-05', 2, 0, 0, 0, 7, 67, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_policyholders` (`id`, `agent_id`, `dealer_id`, `policy_type`, `name`, `vehicle_number`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `vehicle_model_id`, `company_id`, `premium_amount`, `customer_premium_amount`, `valuation_amount`, `total_cost`, `sum_insured`, `executive_id`, `prepared_user_id`, `prepared_date`, `coverage_type_id`, `status`, `paid_amount`, `due_amount`, `payment_mode_id`, `referred_id`, `created_date`, `assigned_userid`, `assigned_date`, `buying_type`, `broker_name`, `provider_id`, `note`, `policy_mode`, `created_by`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(193, NULL, NULL, 1, 'ANVAR V E', 'KL-64-A/5454', '8089122100', NULL, '2025-03-05', '2026-03-04', 104, NULL, 21800, 0, 0, 21800, 0, 13, 4, '2025-03-05', 2, 1, 21800, 0, 3, 157, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(194, NULL, NULL, 1, 'MANOJ JOSEPH', 'KL-07-CU/3335', '9495501843', NULL, '2025-03-05', '2026-03-04', 4, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-03-05', 1, 1, 1167, 0, 2, 162, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(195, NULL, NULL, 1, 'SETHUMADHAVAN', 'KL-09-AM-3113', '9249094829', NULL, '2025-03-04', '2026-03-03', 28, NULL, 11600, 0, 0, 11600, 600000, 13, 4, '2025-03-05', 2, 0, 0, 0, 7, 163, '2025-03-05', 13, '2025-03-05', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(196, NULL, NULL, 1, 'SOUMYA HARIDAS', 'KL-44-E/8793', '9847255197', NULL, '2025-03-05', '2026-03-04', 105, NULL, 14500, 14500, 0, 14500, 520000, 13, 6, '2025-03-05', 2, 1, 14500, 0, 2, 164, '2025-03-05', 13, '2025-03-05', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(197, NULL, NULL, 1, 'ABIJIT RADHAKRISHNAN', 'KL-27-L-0709', '8089122100', NULL, '2025-03-04', '2026-03-03', 41, NULL, 18800, 0, 0, 18800, 3000000, 13, 4, '2025-03-05', 2, 0, 0, 0, 7, 67, '2025-03-05', 13, '2025-03-05', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(198, NULL, NULL, 1, 'CHITHRA SADAN', 'KL-42-R/5292', '9947348884', NULL, '2025-03-06', '2026-03-05', 48, NULL, 1450, 1450, 0, 1450, 34000, 13, 6, '2025-03-06', 2, 1, 1450, 0, 2, 165, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(199, NULL, NULL, 1, 'SREEJITH M R', 'KL - 08 - AQ - 8475', '9947324523', NULL, '2025-03-05', '2026-03-04', 59, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-06', 1, 1, 1167, 0, 2, 166, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(200, NULL, NULL, 1, 'BINCY NOBLE', 'KL-17-R/8939', '9447057577', NULL, '2025-03-05', '2026-03-04', 47, NULL, 1000, 0, 0, 1000, 0, 13, 6, '2025-03-06', 1, 1, 1000, 0, 1, 103, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(201, NULL, NULL, 1, 'GINU KURIACHAN', 'KL 38 A 7148', '7356656350', NULL, '2025-03-05', '2026-03-04', 106, NULL, 1937, 0, 0, 1937, 0, 13, 6, '2025-03-06', 1, 0, 0, 0, 7, 167, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(202, NULL, NULL, 1, 'JOSEPH', 'KL 38 A 8581', '9947040100', NULL, '2025-03-05', '2026-03-04', 107, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-06', 1, 1, 1167, 0, 2, 168, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(203, NULL, NULL, 1, 'SREEJITH', 'KL 17 K 3120', '8848708607', NULL, '2025-03-05', '2026-03-04', 47, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-06', 1, 1, 1167, 0, 2, 169, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(204, NULL, NULL, 1, 'THE MANAGING DIRECTOR, SIJU M R', 'KL-39-Q/3411', '9895693844', NULL, '2025-03-06', '2026-03-05', 48, NULL, 1450, 1450, 0, 1450, 49000, 13, 13, '2025-03-06', 2, 0, 0, 0, 7, 170, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(205, NULL, NULL, 1, 'ANJANA BABU', 'KL-38-G/8164', '9744436148', NULL, '2025-03-05', '2026-03-04', 108, NULL, 4250, 4250, 0, 4250, 245000, 13, 6, '2025-03-06', 2, 1, 4250, 0, 2, 171, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(206, NULL, NULL, 1, 'MANAGING DIRECTOR .', 'KL-07-CF-5888', '9895693844', NULL, '2025-03-04', '2026-03-03', 109, NULL, 5250, 0, 0, 5250, 440000, 13, 6, '2025-03-06', 2, 0, 5250, 0, 7, 170, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(207, NULL, NULL, 1, 'THE MANAGING DIRECTOR JOSEPH K K', 'KL-17-W/7227', '9747787002', NULL, '2025-03-09', '2026-03-08', 111, NULL, 7300, 0, 0, 7300, 875000, 13, 6, '2025-03-06', 2, 0, 7300, 0, 7, 172, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, 4, '2025-03-06 06:48:21', NULL, NULL),
(208, NULL, NULL, 1, 'ANANTHU R NAIR', 'KL-17-S/7870', '9567669326', NULL, '2025-03-05', '2026-03-04', 110, NULL, 2400, 0, 0, 2400, 69000, 13, 6, '2025-03-06', 2, 0, 2400, 0, 7, 173, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(209, NULL, NULL, 1, 'MR MATHEW', 'KL 17 E 3844', '9846856595', NULL, '2025-03-12', '2026-03-11', 74, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-06', 1, 0, 0, 0, 7, 125, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(210, NULL, NULL, 1, 'MR MATHEW K P', 'KL17R7866', '9846856595', NULL, '2025-03-06', '2026-03-05', 21, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-06', 1, 0, 0, 0, 7, 125, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(211, NULL, NULL, 1, 'MRS. ANJALY VIJAYAN', 'KL17M5846', '9605463066', NULL, '2025-03-06', '2026-03-05', 21, NULL, 900, 0, 0, 900, 0, 13, 6, '2025-03-06', 1, 0, 900, 0, 7, 174, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(212, NULL, NULL, 1, 'ABDUL RAZAK', 'NEW', '9447575288', NULL, '2025-03-05', '2026-03-04', 85, NULL, 89600, 89600, 0, 89600, 2850000, 13, 4, '2025-03-06', 2, 1, 89600, 0, 4, 175, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(213, NULL, NULL, 1, 'NASARIYA K A', 'KL-17-Q/5151', '9846787836', NULL, '2025-03-06', '2026-03-05', 46, NULL, 8100, 8100, 0, 8100, 475000, 13, 6, '2025-03-06', 2, 1, 8100, 0, 2, 176, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(214, NULL, NULL, 1, 'RAJ', 'KL-17-M-0343', '9744585017', NULL, '2025-03-05', '2026-03-04', 112, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-06', 1, 1, 1167, 0, 1, 177, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(215, NULL, NULL, 1, 'MAJU MATHEW', 'KL-70-4340', '9847744563', NULL, '2025-03-05', '2026-03-04', 101, NULL, 11300, 11300, 0, 11300, 0, 13, 6, '2025-03-06', 2, 1, 11300, 0, 3, 178, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(216, NULL, NULL, 1, 'VARGHESE K L', 'KL-05-AF/2697', '9747390315', NULL, '2025-03-06', '2026-03-05', 113, NULL, 17000, 0, 0, 17000, 350000, 13, 6, '2025-03-06', 2, 0, 0, 0, 7, 179, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(217, NULL, NULL, 1, 'VARGHESE AKKAPADICKAL PAILY', 'KL-39-G/2733', '9747900659', NULL, '2025-03-06', '2026-03-05', 114, NULL, 13000, 0, 0, 13000, 400000, 13, 6, '2025-03-06', 2, 0, 0, 0, 7, 17, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(218, NULL, NULL, 1, 'GOPAKUMAR J', 'KL-31-G-6402', '9869606160', NULL, '2025-03-05', '2026-03-04', 18, NULL, 5300, 5300, 0, 5300, 300000, 13, 4, '2025-03-06', 2, 1, 5300, 0, 2, 180, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(219, NULL, NULL, 1, 'MAHIMA THOMAS', 'KL-11-BK-2222', '9605060070', NULL, '2025-03-09', '2026-03-08', 115, NULL, 19000, 19000, 0, 19000, 1900000, 13, NULL, '2025-03-06', 2, 1, 19000, 0, 2, 190, '2025-03-06', 13, '2025-03-06', 1, NULL, 8, NULL, 2, 4, NULL, NULL, NULL, NULL),
(220, NULL, NULL, 1, 'LIBIN T T', 'KL-39-E-5637', '9645585605', NULL, '2025-03-05', '2026-03-04', 18, NULL, 6500, 6500, 0, 6500, 345000, 13, 6, '2025-03-06', 2, 1, 6500, 0, 2, 191, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(221, NULL, NULL, 1, 'MR. BALACHANDRAN', 'KL08BC1033', '9037786185', NULL, '2025-03-07', '2026-03-06', 4, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-06', 1, 0, 0, 0, 7, 80, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(222, NULL, NULL, 1, 'ROSE MARY', 'KL-40-P-7477', '9400388613', NULL, '2025-03-07', '2026-03-06', 116, NULL, 5719, 5719, 0, 5719, 440000, 13, 6, '2025-03-06', 2, 1, 5719, 0, 4, 192, '2025-03-06', 13, '2025-03-06', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(223, NULL, NULL, 1, 'MRS. GIMA SEBASTIAN', 'KL03F6441', '8547726882', NULL, '2025-03-10', '2026-03-09', 117, NULL, 2850, 2850, 0, 2850, 0, 13, 6, '2025-03-06', 1, 1, 2850, 0, 2, 193, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(224, NULL, NULL, 1, 'MR. ELDHOSE K O', 'KL07AK2249', '9605968900', NULL, '2025-03-08', '2026-03-07', 118, NULL, 900, 900, 0, 900, 0, 13, 6, '2025-03-06', 1, 1, 900, 0, 2, 193, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(225, NULL, NULL, 1, 'JITHEESH KG', 'KL - 08 - AE - 1424', '9495026600', NULL, '2025-03-06', '2026-03-05', 74, NULL, 900, 0, 0, 900, 0, 13, 6, '2025-03-06', 1, 0, 900, 0, 7, 194, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(226, NULL, NULL, 1, 'DEEPU', 'KL - 43 - J - 7154', '8589832852', NULL, '2025-05-07', '2026-05-06', 38, NULL, 6008, 6008, 0, 6008, 0, 13, 6, '2025-03-06', 2, 1, 6008, 0, 3, 64, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(227, NULL, NULL, 1, 'MRS. SUNANDA A PISHARADI', 'KL46L3844', '8589832852', NULL, '2025-03-06', '2026-03-05', 119, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-06', 1, 0, 1167, 0, 7, 64, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(228, NULL, NULL, 1, 'MR. AMBALAYAM ACHUTHA PISHARADY', 'KL44B0791', '8589832852', NULL, '2025-03-06', '2026-03-05', 121, NULL, 2850, 0, 0, 2850, 0, 13, 6, '2025-03-06', 1, 1, 2850, 0, 7, 64, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(229, NULL, NULL, 1, 'ARUN N', 'KL-22-H/7643', '9846687458', NULL, '2025-03-07', '2026-03-06', 32, NULL, 7600, 0, 0, 7600, 550000, 13, 4, '2025-03-06', 2, 0, 7600, 0, 7, 138, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(230, NULL, NULL, 1, 'MONISHA MOHANAN', 'KL-44-F/7257', '9961474617', NULL, '2025-03-06', '2026-03-05', 98, NULL, 8500, 0, 0, 8500, 540000, 13, 6, '2025-03-06', 2, 0, 8500, 0, 7, 195, '2025-03-06', 13, '2025-03-06', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(231, NULL, NULL, 1, 'CHANDERKANTA DANDONA', 'HR-26-CN-5001', '9072063636', NULL, '2025-03-07', '2026-03-06', 122, NULL, 11800, 0, 0, 11800, 624000, 13, 4, '2025-03-07', 2, 0, 0, 0, 7, 67, '2025-03-07', 13, '2025-03-07', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(232, NULL, NULL, 1, 'PAULSON K JACOB', 'KL - 17 - T - 4243', '9605801234', NULL, '2025-03-08', '2026-03-07', 123, NULL, 8300, 0, 0, 8300, 0, 13, 6, '2025-03-07', 2, 0, 0, 0, 7, 197, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(233, NULL, NULL, 1, 'ABDUL MAJEED T V', 'KL-40-N/2466', '8089122100', NULL, '2025-03-10', '2026-03-09', 38, NULL, 6000, 6000, 0, 6000, 0, 13, 6, '2025-03-07', 2, 1, 6000, 0, 3, 198, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(234, NULL, NULL, 1, 'K P ABDULLA', 'KL-33-J/1254', '9447758701', NULL, '2025-03-07', '2026-03-06', 24, NULL, 6800, 6800, 0, 6800, 400000, 13, 4, '2025-03-07', 2, 1, 6800, 0, 2, 199, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(235, NULL, NULL, 1, 'MATHEW A', 'KL-62-B/7600', '9747900659', NULL, '2025-03-07', '2026-03-06', 124, NULL, 13500, 13500, 0, 13500, 450000, 13, 6, '2025-03-07', 2, 1, 13500, 0, 2, 17, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(236, NULL, NULL, 1, 'THOMAS', 'KL - 05 - AK - 6473', '7902340455', NULL, '2025-03-07', '2026-03-06', 18, NULL, 7500, 7500, 0, 7500, 325000, 13, 6, '2025-03-07', 2, 1, 7500, 0, 2, 200, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(237, NULL, NULL, 1, 'ALEX JO JOSE', 'KL-17-Q/6382', '9846889642', NULL, '2025-03-07', '2026-03-06', 125, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-07', 1, 1, 1167, 0, 2, 201, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(238, NULL, NULL, 1, 'KEVIN K PAULSON', 'KL-07-F/7491', '9946603529', NULL, '2025-03-07', '2026-03-06', 126, NULL, 9700, 9700, 0, 9700, 0, 13, 4, '2025-03-07', 1, 1, 9700, 0, 2, 202, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(239, NULL, NULL, 1, 'SARANYA R', 'KL-04-AD/7142', '7907405061', NULL, '2025-03-08', '2026-03-07', 62, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-03-07', 1, 1, 1167, 0, 2, 175, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(240, NULL, NULL, 1, 'JOY CT', 'KL17M6991', '9744469408', NULL, '2025-03-07', '2026-03-06', 27, NULL, 5000, 5000, 0, 5000, 0, 13, NULL, '2025-03-07', 1, 1, 5000, 0, 1, 123, '2025-03-07', 13, '2025-03-07', 2, 'BIJO BABBY', 17, NULL, 1, 4, NULL, NULL, NULL, NULL),
(241, NULL, NULL, 1, 'ANJANAKUMARI R', 'KL-22-G/2489', '9656732646', NULL, '2025-03-07', '2026-03-06', 127, NULL, 1937, 1937, 0, 1937, 0, 13, 6, '2025-03-07', 1, 1, 1937, 0, 2, 204, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(242, NULL, NULL, 1, 'AKHILA', 'KL - 42 - Q - 3854', '8157003271', NULL, '2025-03-06', '2026-03-05', 38, NULL, 8500, 8500, 0, 8500, 500000, 13, 4, '2025-03-07', 2, 1, 8500, 0, 2, 205, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(243, NULL, NULL, 1, 'CHARLS ALIAS', 'KL-34-D/8228', '8089122100', NULL, '2025-03-07', '2026-03-06', 38, NULL, 6200, 6200, 0, 6200, 0, 13, 6, '2025-03-07', 2, 1, 6200, 0, 3, 198, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(244, NULL, NULL, 1, 'CINU P MANI', 'KL-17-T/0157', '9846856595', NULL, '2025-03-07', '2026-03-06', 48, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-07', 1, 0, 0, 0, 7, 125, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(245, NULL, NULL, 1, 'ELSAMMA CHACKO', 'KL-17-L-1140', '8281167794', NULL, '2025-03-06', '2026-03-05', 128, NULL, 946, 946, 0, 946, 0, 13, 6, '2025-03-07', 1, 1, 946, 0, 2, 206, '2025-03-07', 13, '2025-03-07', 1, NULL, 8, NULL, 1, 4, NULL, NULL, NULL, NULL),
(246, NULL, NULL, 1, 'ELIZABETH ABRAHAM', 'KL-31-E-9061', '9747900659', NULL, '2025-03-06', '2026-03-05', 116, NULL, 6300, 0, 0, 6300, 300000, 13, 4, '2025-03-07', 2, 0, 6300, 0, 7, 17, '2025-03-07', 13, '2025-03-07', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(247, NULL, NULL, 1, 'MATHEW AJ', 'KL - 43 - L - 0456', '8943339633', NULL, '2025-03-07', '2026-03-06', 24, NULL, 7800, 0, 0, 7800, 425000, 13, 4, '2025-03-07', 2, 0, 0, 0, 7, 207, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(248, NULL, NULL, 1, 'ANU JOSE', 'KL-38-H/7712', '9496623003', NULL, '2025-03-07', '2026-03-06', 129, NULL, 4400, 0, 0, 4400, 0, 13, 4, '2025-03-07', 2, 0, 0, 0, 7, 17, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(249, NULL, NULL, 1, 'ELDHOSE JOHN', 'KL - 17 - Y - 1862', '8078105206', NULL, '2025-03-07', '2026-03-06', 130, NULL, 41914, 0, 0, 41914, 980000, 13, 6, '2025-03-07', 2, 0, 0, 0, 7, 208, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(250, NULL, NULL, 1, 'MOHANAN N N', 'KL17L1391', '9495026600', NULL, '2025-03-07', '2026-03-06', 131, NULL, 5500, 0, 0, 5500, 0, 13, NULL, '2025-03-07', 1, 0, 0, 0, 7, 28, '2025-03-07', 13, '2025-03-07', 2, 'BIJO BABBY', 17, NULL, 2, 4, NULL, NULL, NULL, NULL),
(251, NULL, NULL, 1, 'MR. ARGUSLAL A ASHOK', 'KL03AC5545', '8281368950', NULL, '2025-03-07', '2026-03-06', 20, NULL, 6839, 6600, 0, 6839, 675000, 13, 6, '2025-03-07', 2, 1, 6839, 0, 2, 209, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(252, NULL, NULL, 1, 'ANANDU K B', 'KL-41-B/7418', '9072770124', NULL, '2025-03-07', '2026-03-06', 59, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-07', 1, 0, 0, 0, 7, 210, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(253, NULL, NULL, 1, 'BENNY K J', 'KL - 10 - AE - 2873', '9447189903', NULL, '2025-03-07', '2026-03-06', 130, NULL, 66132, NULL, 0, 66132, 400000, 13, 4, '2025-03-07', 2, 0, 0, 0, 7, 211, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(254, NULL, NULL, 1, 'MR. JOMON K PAUL', 'KL07B1641', '9495314849', NULL, '2025-03-07', '2026-03-06', 126, NULL, 9702, 0, 0, 9702, 0, 13, 6, '2025-03-07', 1, 0, 0, 0, 7, 212, '2025-03-07', 13, '2025-03-07', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(255, NULL, NULL, 1, 'DINU', 'KL - 44 - D - 6869', '9567553755', NULL, '2025-03-11', '2026-03-10', 80, NULL, 5400, 0, 0, 5400, 270000, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 64, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(256, NULL, NULL, 1, 'JUSSIN JOSEPH', 'KL-08-BG/0301', '9048785309', NULL, '2025-03-07', '2026-03-06', 9, NULL, 5205, 5200, 0, 5205, 295000, 13, 6, '2025-03-08', 2, 1, 5205, 0, 2, 214, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(257, NULL, NULL, 1, 'NOBIL P T', 'KL - 07 - CJ - 7507', '9946585400', NULL, '2025-03-06', '2026-03-05', 132, NULL, 7490, 7400, 0, 7490, 395000, 13, 6, '2025-03-08', 2, 1, 7490, 0, 2, 215, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(258, NULL, NULL, 1, 'RINU PAUL', 'KL-17-X-5620', '9605532502', NULL, '2025-03-14', '2026-03-13', 133, NULL, 20899, 0, 0, 20899, 1440000, 13, NULL, '2025-03-08', 2, 0, 20899, 0, 7, 216, '2025-03-08', 13, '2025-03-08', 1, NULL, 13, NULL, 2, 4, NULL, NULL, NULL, NULL),
(259, NULL, NULL, 1, 'SANOJ SOUNNARAN', 'KL-07-CR/2239', '8606522015', NULL, '2025-03-07', '2026-03-06', 134, NULL, 10012, 0, 0, 10012, 0, 13, 6, '2025-03-08', 2, 0, 10012, 0, 3, 217, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(260, NULL, NULL, 1, 'AJISH P S', 'KL-07-BW/2363', '8848838637', NULL, '2025-03-07', '2026-03-06', 96, NULL, 6519, 6500, 0, 6519, 230000, 13, 4, '2025-03-08', 2, 1, 6519, 0, 2, 64, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(261, NULL, NULL, 1, 'ANOOP GOPINATH K G', 'KL-07-BB-0081', '9895208063', NULL, '2025-03-07', '2026-03-06', 7, NULL, 2850, 2850, 0, 2850, 0, 13, 6, '2025-03-08', 1, 1, 2850, 0, 2, 218, '2025-03-08', 13, '2025-03-08', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(262, NULL, NULL, 1, 'GIREESH GOPI', 'KL-17-F/8291', '9846289697', NULL, '2025-03-08', '2026-03-07', 74, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-08', 1, 1, 1167, 0, 2, 56, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(263, NULL, NULL, 1, 'SALAHUDHEEN T M', 'KL-12-G/0862', '9656732646', NULL, '2025-03-08', '2026-03-07', 135, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-08', 1, 1, 1167, 0, 2, 56, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(264, NULL, NULL, 1, 'ANTONY K M', 'KL-03-U/3857', '9946361646', NULL, '2025-03-08', '2026-03-07', 95, NULL, 6300, 0, 0, 6300, 115000, 13, 6, '2025-03-08', 2, 0, 6300, 0, 7, 220, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(265, NULL, NULL, 1, 'SIBIN JOHN', 'KL-05-AS/7680', '8076429441', NULL, '2025-03-08', '2026-03-07', 128, NULL, 1167, 1167, 0, 1167, 0, 13, 4, '2025-03-08', 1, 1, 1167, 0, 2, 222, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(266, NULL, NULL, 1, 'ATHUL S V', 'KL-40-F/7666', '7025639990', NULL, '2025-03-08', '2026-03-07', 65, NULL, 5900, 5900, 0, 5900, 190000, 13, 6, '2025-03-08', 2, 1, 5900, 0, 9, 223, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(267, NULL, NULL, 1, 'NAGOOR', 'KL-39-A/1950', '9745200627', NULL, '2025-03-08', '2026-03-07', 9, NULL, 4400, 4400, 0, 4400, 0, 13, 4, '2025-03-08', 1, 1, 4400, 0, 2, 224, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(268, NULL, NULL, 1, 'BALAKRISHNAN S', 'KL-17-Q/5040', '9446952506', NULL, '2025-03-08', '2026-03-07', 3, NULL, 5089, 0, 0, 5089, 0, 13, 4, '2025-03-08', 2, 1, 5089, 0, 3, 225, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(269, NULL, NULL, 1, 'SHIBIMON P M', 'KL-32-V-0285', '9061330298', NULL, '2025-03-08', '2026-03-07', 46, NULL, 12155, 12155, 0, 12155, 600000, 13, NULL, '2025-03-08', 2, 1, 12155, 0, 2, 226, '2025-03-08', 13, '2025-03-08', 1, NULL, 8, NULL, 1, 4, NULL, NULL, NULL, NULL),
(270, NULL, NULL, 1, 'AJITH K MOHAN', 'KL-40-H/5208', '9846482329', NULL, '2025-03-15', '2026-03-14', 65, NULL, 5900, 5900, 0, 5900, 200000, 13, 6, '2025-03-08', 2, 1, 5900, 0, 9, 227, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(271, NULL, NULL, 1, 'JOBIN THOMAS', 'KL-33-M/4149', '9383416554', NULL, '2025-03-08', '2026-03-07', 37, NULL, 3100, 3100, 500, 3600, 130000, 13, 6, '2025-03-08', 2, 1, 3600, 0, 2, 228, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(272, NULL, NULL, 1, 'MATHACHAN M J', 'KL-07-BB/3315', '7594991112', NULL, '2025-03-08', '2026-03-07', 136, NULL, 4400, 4400, 0, 4400, 0, 13, 6, '2025-03-08', 1, 1, 4400, 0, 2, 229, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(273, NULL, NULL, 1, 'ELDHOSE', 'KL - 17 - L - 2885', '8589832852', NULL, '2025-03-08', '2026-03-07', 128, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 64, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(274, NULL, NULL, 1, 'MR. SHEBEEB ALIYAR', 'KL26E9480', '9946234786', NULL, '2025-03-08', '2026-03-07', 137, NULL, 1400, 0, 0, 1400, 27000, 13, 6, '2025-03-08', 2, 0, 1400, 0, 7, 230, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(275, NULL, NULL, 1, 'MR. GOPU C NAIR', 'KL448853', '9847006397', NULL, '2025-03-08', '2026-03-07', 138, NULL, 1937, 0, 0, 1937, 0, 13, 6, '2025-03-08', 1, 0, 0, 0, 7, 42, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(276, NULL, NULL, 1, 'SHEEJA JOSEPH', 'KL-17-Q-5240', '9747269447', NULL, '2025-03-08', '2026-03-07', 91, NULL, 1400, 0, 0, 1400, 27000, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 231, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(277, NULL, NULL, 1, 'BEAULA ALIAS', 'KL-40-Q/8624', '9744046026', NULL, '2025-03-08', '2026-03-07', 4, NULL, 1600, 0, 0, 1600, 54000, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 232, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(278, NULL, NULL, 1, 'SHIBU', 'KL-44-D-5819', '9946442166', NULL, '2025-03-08', '2026-03-07', 18, NULL, 5500, 5500, 0, 5500, 320000, 13, 6, '2025-03-08', 2, 1, 5500, 0, 2, 233, '2025-03-08', 13, '2025-03-08', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(279, NULL, NULL, 1, 'VARGHESE P P', 'KL - 40 - C - 8373', '8086849431', NULL, '2025-03-09', '2026-03-08', 49, NULL, 9200, 0, 0, 9200, 250000, 13, 6, '2025-03-08', 2, 0, 9200, 0, 9, 234, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(280, NULL, NULL, 1, 'SUBIN', 'KL - 06 - J - 1983', '9744046026', NULL, '2025-03-08', '2026-03-07', 130, NULL, 69230, 0, 0, 69230, 1750000, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 235, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(281, NULL, NULL, 1, 'MATHEW K V', 'KL-17-R/8994', '9747084716', NULL, '2025-03-09', '2026-03-08', 21, NULL, 1455, 0, 0, 1455, 34000, 13, 6, '2025-03-08', 2, 0, 0, 0, 7, 56, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(282, NULL, NULL, 1, 'MR. JOBIN THOMAS', 'KL35D0032', '9447302225', NULL, '2025-03-09', '2026-03-08', 137, NULL, 1355, 0, 0, 1355, 0, 13, 6, '2025-03-08', 2, 0, 1355, 0, 7, 236, '2025-03-08', 13, '2025-03-08', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(283, NULL, NULL, 1, 'PARTNER', 'KL - 07 - CR - 1918', '9447777030', NULL, '2025-03-09', '2026-03-08', 139, NULL, 19601, 19601, 0, 19601, 870000, 13, 4, '2025-03-10', 2, 1, 19601, 0, 4, 237, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(284, NULL, NULL, 1, 'MR. JOY VARGHESE', 'KL17U7103', '9744170632', NULL, '2025-03-09', '2026-03-08', 9, NULL, 2855, 0, 0, 2855, 0, 13, 6, '2025-03-10', 1, 0, 0, 0, 7, 238, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(285, NULL, NULL, 1, 'ABHIJITH', 'KL - 17 - W - 7007', '7902983982', NULL, '2025-03-09', '2026-03-08', 140, NULL, 24337, 22000, 0, 24337, 760000, 13, 6, '2025-03-10', 2, 1, 24337, 0, 2, 239, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(286, NULL, NULL, 1, 'MR. MANAGING PARTNER, PT ABDUL REHIMAN', 'KL40U7409', '7025878119', NULL, '2025-03-10', '2026-03-09', 21, NULL, 850, 850, 0, 850, 74000, 13, 6, '2025-03-10', 2, 1, 850, 0, 2, 240, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(287, NULL, NULL, 1, 'MR. RAFEEK E M', 'KL 40 D 0367', '7025805600', NULL, '2025-03-10', '2026-03-09', 59, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-10', 1, 1, 1167, 0, 2, 241, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(288, NULL, NULL, 1, 'JAINAMMA TOMY', 'KL-17-Q/3195', '9778232578', NULL, '2025-03-09', '2026-03-10', 111, NULL, 19500, 0, 0, 19500, 550000, 13, 6, '2025-03-10', 2, 0, 19500, 0, 7, 242, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(289, NULL, NULL, 1, 'CHANDRAN PILLAI', 'KL - 39 - L - 0032', '8589028835', NULL, '2025-03-10', '2026-03-09', 105, NULL, 12000, 0, 0, 12000, 250000, 13, 6, '2025-03-10', 2, 0, 0, 0, 7, 2, '2025-03-10', 13, '2025-03-10', 2, NULL, 3, NULL, 2, 4, 4, '2025-03-10 10:55:04', NULL, NULL),
(290, NULL, NULL, 1, 'MANAGING PARTNER ANTONY', 'KL - 07 - DD - 2258', '9447777030', NULL, '2025-03-13', '2026-03-12', 140, NULL, 22650, 22650, 0, 22650, 900000, 13, 4, '2025-03-10', 2, 1, 22650, 0, 4, 237, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(291, NULL, NULL, 1, 'ALEX BASIL P V', 'KL-40-P/5534', '9895615748', NULL, '2025-03-09', '2026-03-08', 58, NULL, 6400, 6400, 0, 6400, 0, 13, 6, '2025-03-10', 2, 1, 6400, 0, 2, 243, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(292, NULL, NULL, 1, 'FAHAD', 'KL-43-H-9180', '9747576331', NULL, '2025-03-08', '2026-03-07', 127, NULL, 1930, 1930, 0, 1930, 0, 13, 6, '2025-03-10', 1, 1, 1930, 0, 2, 244, '2025-03-10', 13, '2025-03-10', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(293, NULL, NULL, 1, 'SUJA L', 'KL-02-AJ/8712', '8943339633', NULL, '2025-03-09', '2026-03-08', 38, NULL, 6400, 0, 0, 6400, 250000, 13, 4, '2025-03-10', 2, 0, 0, 0, 7, 245, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(294, NULL, NULL, 1, 'AISWARYA KAIRALI', 'KL-41-J/7141', '8086491808', NULL, '2025-03-09', '2026-03-08', 8, NULL, 4600, 4600, 0, 4600, 240000, 13, 6, '2025-03-10', 2, 1, 4600, 0, 2, 246, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(295, NULL, NULL, 1, 'MATHEWS K M', 'KL-35-G/5782', '9961207978', NULL, '2025-03-09', '2026-03-08', 8, NULL, 4900, 4900, 0, 4900, 0, 13, 6, '2025-03-10', 2, 1, 4900, 0, 3, 247, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(296, NULL, NULL, 1, 'CINOVA ABRAHAM', 'KL-62-D/1515', '9446597166', NULL, '2025-03-09', '2026-03-08', 83, NULL, 6600, 6600, 0, 6600, 500000, 13, 6, '2025-03-10', NULL, 1, 6600, 0, 2, 248, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(297, NULL, NULL, 1, 'SAJITH K S', 'KL-70-H/8301', '9895857892', NULL, '2025-03-09', '2026-03-08', 18, NULL, 4400, 4400, 0, 4400, 0, 13, 6, '2025-03-10', 2, 1, 4400, 0, 2, 249, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(298, NULL, NULL, 1, 'ETHIN SKARIA', 'KL-04-AR/1862', '8089122100', NULL, '2025-03-09', '2026-03-08', 98, NULL, 15600, 15600, 0, 15600, 0, 13, 6, '2025-03-10', 2, 1, 15600, 0, 3, 198, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(299, NULL, NULL, 1, 'MANOJ KUMAR M A', 'KL-07-BT/7663', '7902473360', NULL, '2025-03-09', '2026-03-08', 24, NULL, 4400, 0, 0, 4400, 0, 13, 6, '2025-03-10', 1, 0, 0, 0, 7, 64, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(300, NULL, NULL, 1, 'K N BABU', 'KL - 40 - B - 3931', '8921258867', NULL, '2025-03-10', '2026-03-09', 74, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-10', 1, 1, 1167, 0, 2, 250, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(301, NULL, NULL, 1, 'RATHEESH', 'KL-43-E-4114', '9400839599', NULL, '2025-03-09', '2026-03-08', 104, NULL, 11300, 0, 0, 11300, 340000, 13, 6, '2025-03-10', 2, 0, 11300, 0, 7, 251, '2025-03-10', 13, '2025-03-10', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(302, NULL, NULL, 1, 'SURESH BABU V V', 'KL-07-CN-0042', '9947348884', NULL, '2025-03-10', '2026-03-09', 94, NULL, 12000, 12000, 0, 12000, 620000, 13, 4, '2025-03-10', 2, 1, 12000, 0, 2, 165, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(303, NULL, NULL, 1, 'JIJI', 'KL - 17 - T - 1834', '9744777003', NULL, '2025-03-10', '2026-03-09', 91, NULL, 900, 900, 0, 900, 0, 13, 6, '2025-03-10', 1, 1, 900, 0, 2, 252, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(304, NULL, NULL, 1, 'JORDIN', 'KL - 17 - W - 2442', '9746062962', NULL, '2025-03-16', '2026-03-15', 104, NULL, 14000, 0, 0, 14000, 700000, 13, 6, '2025-03-10', 2, 0, 0, 0, 7, 253, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(305, NULL, NULL, 1, 'JISHAMOL MATHEW', 'KL-44-D-5065', '8589832852', NULL, '2025-03-10', '2026-03-09', 21, NULL, 1250, 0, 0, 1250, 0, 13, 6, '2025-03-10', 1, 0, 0, 0, 7, 64, '2025-03-10', 13, '2025-03-10', 1, NULL, 8, NULL, 2, 4, NULL, NULL, NULL, NULL),
(306, NULL, NULL, 1, 'SHAILA PRASAD', 'KL - 17 - W - 5498', '8589832852', NULL, '2025-03-10', '2026-03-09', 87, NULL, 78000, 0, 0, 78000, 4150000, 13, 6, '2025-03-10', 2, 0, 78000, 0, 7, 64, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(307, NULL, NULL, 1, 'SHAILA PRASAD.', 'KL - 17 - W - 5444', '8589832852', NULL, '2025-03-10', '2026-03-09', 87, NULL, 78000, 0, 0, 78000, 4150000, 13, 6, '2025-03-10', 2, 0, 78000, 0, 7, 64, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(308, NULL, NULL, 1, 'VIVEK GEORGE', 'KL-69-A/7880', '9656151996', NULL, '2025-03-10', '2026-03-09', 141, NULL, 4150, 4150, 0, 4150, 100000, 13, 4, '2025-03-10', 2, 1, 4150, 0, 2, 254, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(309, NULL, NULL, 1, 'RAJESH.', 'KL44B7436', '9567382247', NULL, '2025-03-09', '2026-03-08', 131, NULL, 5500, NULL, 0, 5500, 0, 13, NULL, '2025-03-10', 1, 0, 0, 0, 7, 255, '2025-03-10', 13, '2025-03-10', 2, 'BIJO BABBY', 17, NULL, 2, 4, NULL, NULL, NULL, NULL),
(310, NULL, NULL, 1, 'MR. PRASAD P K', 'KL17K1885', '9544897584', NULL, '2025-03-11', '2026-03-10', 49, NULL, 10500, 0, 0, 10500, 900000, 13, 6, '2025-03-10', 2, 0, 10500, 0, 7, 64, '2025-03-10', 13, '2025-03-10', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(311, NULL, NULL, 1, 'ROBIN', 'KL 41 S 8811', '8086849431', NULL, '2025-03-17', '2026-03-16', 142, NULL, 63000, NULL, 0, 63000, 3000000, 13, 6, '2025-03-12', 2, 0, 63000, 0, 6, 234, '2025-03-12', 13, '2025-03-12', 1, NULL, 3, NULL, 2, 7, NULL, NULL, NULL, NULL),
(312, NULL, NULL, 1, 'SHAILA', 'KL 17 V 6593', '9747974646', NULL, '2025-03-16', '2026-03-15', 22, NULL, 21500, 21500, 0, 21500, 675000, 13, 4, '2025-03-12', 2, 1, 21500, 0, 6, 64, '2025-03-12', 13, '2025-03-12', 1, NULL, 3, NULL, 2, 7, NULL, NULL, NULL, NULL),
(313, NULL, NULL, 1, 'SUNNY MADHAV', 'KL-47-L/3749', '8943753817', NULL, '2025-03-13', '2026-03-12', 144, NULL, 19900, 0, 0, 19900, 1000000, 13, 6, '2025-03-13', 2, 0, 19900, 0, 7, 120, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(314, NULL, NULL, 1, 'SINDHU', 'KL-31-B-4599', '9846010297', NULL, '2025-03-10', '2026-03-09', 142, NULL, 9700, 9700, 0, 9700, 0, 13, 6, '2025-03-13', 1, 1, 9700, 0, 2, 258, '2025-03-13', 13, '2025-03-13', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(315, NULL, NULL, 1, 'BAIJU', 'KL-17-C/9518', '9400682150', NULL, '2025-03-11', '2026-03-10', 74, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 259, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(316, NULL, NULL, 1, 'NISHAD K V', 'KL-36-J/6566', '9072063636', NULL, '2025-03-11', '2026-03-10', 20, NULL, 12600, 12600, 0, 12600, 1100000, 13, 4, '2025-03-13', 2, 1, 12600, 0, 9, 67, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(317, NULL, NULL, 1, 'SHIJU JOSEPH', 'KL-05-AC/4001', '9656261322', NULL, '2025-03-11', '2026-03-10', 38, NULL, 4400, 4400, 0, 4400, 0, 13, 6, '2025-03-13', 1, 0, 4400, 0, 2, 260, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(318, NULL, NULL, 1, 'ANU JACOB', 'KL-05-AS/3375', '9947009290', NULL, '2025-03-11', '2026-03-10', 7, NULL, 5000, 4000, 0, 5000, 200000, 13, 6, '2025-03-13', 2, 1, 0, 0, 2, 261, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(319, NULL, NULL, 1, 'KABEER', 'KL-44-B/7731', '9747268960', NULL, '2025-03-11', '2026-03-10', 85, NULL, 66000, 0, 0, 66000, 4000000, 13, 4, '2025-03-13', 2, 0, 0, 0, 7, 262, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(320, NULL, NULL, 1, 'NADHIYA SUBINAN', 'KL-47-G/3455', '8943753817', NULL, '2025-03-11', '2026-03-10', 108, NULL, 5000, 0, 0, 5000, 300000, 13, 4, '2025-03-13', 2, 0, 5000, 0, 7, 120, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(321, NULL, NULL, 1, 'MANAGING .PARTNER', 'NEW.', '9447777030', NULL, '2025-03-10', '2026-03-09', 4, NULL, 5800, 0, 0, 5800, 0, 13, 4, '2025-03-13', 2, 0, 5800, 0, 7, 237, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(322, NULL, NULL, 1, 'ANTONY JOHN', 'KL-07-BU/7324', '9947242226', NULL, '2025-03-11', '2026-03-10', 83, NULL, 4400, 0, 0, 4400, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 10, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(323, NULL, NULL, 1, 'RAJEEV', 'KL-17-U-7360', '9605801234', NULL, '2025-03-11', '2026-03-10', 145, NULL, 12500, 0, 0, 12500, 912000, 13, 6, '2025-03-13', 2, 0, 0, 0, 7, 263, '2025-03-13', 13, '2025-03-13', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(324, NULL, NULL, 1, 'ARJUN K MANOHARAN', 'KL-32-H/2985', '8281153439', NULL, '2025-03-11', '2026-03-10', 62, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 264, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(325, NULL, NULL, 1, 'TARUN D C', 'KL-42-S/3338', '9446597166', NULL, '2025-03-11', '2026-03-10', 62, NULL, 1950, 0, 0, 1950, 0, 13, 6, '2025-03-13', 1, 1, 1950, 0, 2, 80, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(326, NULL, NULL, 1, 'BINOJ V PATHICKAL', 'KL-38-C/6691', '9539022297', NULL, '2025-03-16', '2026-03-15', 83, NULL, 7300, 7300, 0, 7300, 0, 13, 6, '2025-03-13', 2, 1, 7300, 0, NULL, 157, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(327, NULL, NULL, 1, 'JAYARAJ K R', 'KL-07-BX/9369', '9037660773', NULL, '2025-03-11', '2026-03-10', 104, NULL, 14300, 14300, 0, 14300, 0, 13, NULL, '2025-03-13', 2, 1, 14300, 0, 3, 265, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(328, NULL, NULL, 1, 'SUMAN K MATHEW', 'KL-07-CC/8019', '9446597166', NULL, '2025-03-11', '2026-03-10', 67, NULL, 5500, 0, 0, 5500, 300000, 13, 4, '2025-03-13', 2, 0, 0, 0, 7, 248, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(329, NULL, NULL, 1, 'AJMAL C A', 'KL-40-P/6660', '9539022297', NULL, '2025-03-11', '2026-03-10', 38, NULL, 6600, 6600, 0, 6600, 0, 13, NULL, '2025-03-13', 2, 1, 6600, 0, 3, 198, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(330, NULL, NULL, 1, 'JAMNAS A H', 'KL-52-F/8326', '8590594084', NULL, '2025-03-11', '2026-03-10', 76, NULL, 6000, 3000, 400, 6400, 200000, 13, 6, '2025-03-13', 2, 0, 3000, 3400, 2, 267, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, '3000 PAID', 1, 4, NULL, NULL, NULL, NULL),
(331, NULL, NULL, 1, 'MR. RAJESH RAJAN', 'KL 44 H 1241', '6282908951', NULL, '2025-03-14', '2026-03-13', 143, NULL, 2399, 2399, 0, 2399, 0, 13, 6, '2025-03-13', 2, 1, 2399, 0, 3, 64, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(332, NULL, NULL, 1, 'JOSE P D', 'KL-17-T/4177', '8111892852', NULL, '2025-03-13', '2026-03-12', 32, NULL, 7000, 7000, 0, 7000, 475000, 13, 4, '2025-03-13', 2, 1, 7000, 0, 1, 64, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(333, NULL, NULL, 1, 'MR. JITHU CHANDY', 'KL17R9353', '9446892604', NULL, '2025-03-14', '2026-03-13', 38, NULL, 5900, 5900, 0, 5900, 375000, 13, 6, '2025-03-13', 2, 0, 5900, 0, 2, 268, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, '3400 PAID', 2, 4, NULL, NULL, NULL, NULL),
(334, NULL, NULL, 1, 'JOY', 'KL - 17 - E - 9370', '7356656350', NULL, '2025-03-11', '2026-03-10', 54, NULL, 1227, 0, 0, 1227, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 167, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(335, NULL, NULL, 1, 'MANOJ V K', 'KL-19-A/9714', '9562055810', NULL, '2025-03-11', '2026-03-10', 7, NULL, 3600, 3600, 0, 3600, 68000, 13, 6, '2025-03-13', 2, 1, 3600, 0, 2, 56, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(336, NULL, NULL, 1, 'BABY GEORGE', 'KL - 40 - B - 3830', '9744980224', NULL, '2025-03-12', '2026-03-11', 7, NULL, 2850, 2500, 0, 2850, 0, 13, 6, '2025-03-13', 1, 0, 2850, 0, 2, 269, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, '2500 PAID', 2, 4, NULL, NULL, NULL, NULL),
(337, NULL, NULL, 1, 'BABY.GEORGE', 'KL-17-G-1619', '9744980224', NULL, '2025-03-11', '2026-03-10', 59, NULL, 1191, 0, 0, 1191, 0, 13, 6, '2025-03-13', 1, 0, 650, 541, 7, 269, '2025-03-13', 13, '2025-03-13', 1, NULL, 8, NULL, 2, 4, NULL, NULL, NULL, NULL),
(338, NULL, NULL, 1, 'AJAS', 'KL-44-A-4134', '7593058448', NULL, '2025-03-11', '2026-03-10', 59, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 56, '2025-03-13', 13, '2025-03-13', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(339, NULL, NULL, 1, 'PRESANNAKUMARY K', 'KL-25-K/7122', '9539022297', NULL, '2025-03-12', '2026-03-11', 98, NULL, 6773, 6770, 0, 6773, 0, 13, 6, '2025-03-13', 2, 1, 6773, 0, 3, 270, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(340, NULL, NULL, 1, 'SHIMY SHAJI', 'KL-38-L/1072', '8086916001', NULL, '2025-03-18', '2026-03-17', 21, NULL, 1350, 1350, 0, 1350, 82000, 13, 6, '2025-03-13', 2, 1, 1350, 0, 2, 271, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(341, NULL, NULL, 1, 'ROYAL BABY', 'KL-40-M/5089', '9496986834', NULL, '2025-03-12', '2026-03-11', 38, NULL, 7499, 7500, 0, 7499, 0, 13, 6, '2025-03-13', 2, 1, 7499, 0, 2, 154, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(342, NULL, NULL, 1, 'ASHIK M A', 'KL-38-C/9194', '7012148011', NULL, '2025-03-12', '2026-03-11', 147, NULL, 1937, 1950, 0, 1937, 0, 13, 6, '2025-03-13', 1, 1, 1937, 0, 2, 78, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(343, NULL, NULL, 1, 'SUNEER', 'KL-34-A-8175', '8594082423', NULL, '2025-03-12', '2026-03-11', 148, NULL, 34000, 34000, 0, 34000, 480000, 13, NULL, '2025-03-13', 2, 1, 34000, 0, 2, 272, '2025-03-13', 13, '2025-03-13', 1, NULL, 11, NULL, 1, 4, NULL, NULL, NULL, NULL),
(344, NULL, NULL, 1, 'PRASAD', 'KL-24-R-3251', '9947800806', NULL, '2025-03-11', '2026-03-10', 91, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-13', 1, 1, 1167, 0, 2, 273, '2025-03-13', 13, '2025-03-13', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(345, NULL, NULL, 1, 'JANEESH', 'KL-07-BT/7809', '9567673746', NULL, '2025-03-22', '2026-03-21', 24, NULL, 5835, 5800, 0, 5835, 0, 13, 6, '2025-03-13', 2, 1, 5835, 0, 3, 198, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(346, NULL, NULL, 1, 'CLEETUS P S', 'KL-04-AG/3855', '8281282387', NULL, '2025-03-12', '2026-03-11', 38, NULL, 6939, 6900, 400, 7339, 320000, 13, 6, '2025-03-13', 2, 0, 0, 0, 7, 274, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(347, NULL, NULL, 1, 'LEONE JACOBE', 'KL - 07 - BY - 7700', '9142880788', NULL, '2025-03-11', '2026-03-10', 58, NULL, 6624, 6600, 0, 6624, 280000, 13, 6, '2025-03-13', 2, 1, 6624, 0, 2, 275, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(348, NULL, NULL, 1, 'JIMMY PAUL', 'KL-44-J-0290', '8129593126', NULL, '2025-03-11', '2026-03-10', 104, NULL, 15109, 0, 0, 15109, 850000, 13, 6, '2025-03-13', 2, 0, 15109, 0, 7, 278, '2025-03-13', 13, '2025-03-13', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(349, NULL, NULL, 1, 'BINOY MATHEW', 'KL-17-H/4509', '9745594646', NULL, '2025-03-12', '2026-03-11', 149, NULL, 2850, 0, 0, 2850, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 279, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(350, NULL, NULL, 1, 'ASIF A', 'KL-71-C/9565', '8086162900', NULL, '2025-03-12', '2026-03-11', 47, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 280, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(351, NULL, NULL, 1, 'SANOJ SAMUEL', 'KL-08-N/0825', '9895976472', NULL, '2025-03-12', '2026-03-11', 150, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-13', 1, 1, 1167, 0, 2, 283, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(352, NULL, NULL, 1, 'MATHEW P P', 'KL - 39 - N - 7964', '9447132526', NULL, '2025-03-12', '2026-03-11', 37, NULL, 2850, 2850, 0, 2850, 0, 13, 6, '2025-03-13', 1, 1, 2850, 0, 2, 285, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(353, NULL, NULL, 1, 'JOY MATHEW', 'KL - 07 - T - 0090', '9744157165', NULL, '2025-03-12', '2026-03-11', 54, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-13', 1, 0, 0, 0, 7, 288, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(354, NULL, NULL, 1, 'VISHNU DEV A', 'KL-17-U/8666', '9446902666', NULL, '2025-03-13', '2026-03-12', 50, NULL, 1504, 0, 0, 1504, 63000, 13, 6, '2025-03-13', 2, 0, 0, 0, 7, 289, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(355, NULL, NULL, 1, 'VISHNU SABU', 'KL-44-C/4186', '8606271226', NULL, '2025-03-18', '2026-03-17', 7, NULL, 3401, 3400, 0, 3401, 100000, 13, 6, '2025-03-13', 2, 1, 3401, 0, 2, 290, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(356, NULL, NULL, 1, 'BABU PAUL', 'KL - 17 - J - 8309', '8589839852', NULL, '2025-03-12', '2026-03-11', 147, NULL, 1670, 1650, 0, 1670, 0, 13, 6, '2025-03-13', 1, 1, 1670, 0, 2, 64, '2025-03-13', 13, '2025-03-13', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(357, NULL, NULL, 1, 'MRS. AYANA DAS', 'KL17X5624', '9447377099', NULL, '2025-03-14', '2026-03-13', 21, NULL, 800, 800, 0, 800, 71000, 13, 6, '2025-03-14', 2, 0, 800, 0, 7, 291, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(358, NULL, NULL, 1, 'JISMY MICHEAL', 'KL-62-A-2738', '7306709392', NULL, '2025-03-11', '2026-03-10', 151, NULL, 5362, 5350, 0, 5362, 195000, 13, 6, '2025-03-14', 2, 1, 5362, 0, 2, 292, '2025-03-14', 13, '2025-03-14', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(359, NULL, NULL, 1, 'REBY JOSE', 'KL-36-A/6185', '9946361789', NULL, '2025-03-13', '2026-03-12', 54, NULL, 1167, NULL, 0, 1167, 0, 13, 6, '2025-03-14', 1, 0, 1167, 0, 7, 293, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, '100 EXTRA', 2, 4, NULL, NULL, NULL, NULL),
(360, NULL, NULL, 1, 'AKASH', 'KL 39 T 3985', '7356340968', NULL, '2025-03-13', '2026-03-12', 57, NULL, 10800, 10800, 0, 10800, 841190, 13, NULL, '2025-03-14', 2, 1, 10800, 0, 12, 295, '2025-03-14', 13, '2025-03-14', 1, NULL, 5, NULL, 2, 4, NULL, NULL, NULL, NULL),
(361, NULL, NULL, 1, 'MR. SOMAN', 'KL17D3750', '9744468046', NULL, '2025-03-13', '2026-03-12', 152, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 296, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(362, NULL, NULL, 1, 'MR. NOBLE', 'KL17K4484', '9447057577', NULL, '2025-03-12', '2026-03-11', 153, NULL, 4400, 0, 0, 4400, 0, 13, 6, '2025-03-14', 1, 0, 4400, 0, 7, 103, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(363, NULL, NULL, 1, 'DON K J', 'KL-07-AW/9091', '9400839599', NULL, '2025-03-13', '2026-03-12', 35, NULL, 2850, 0, 0, 2850, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 51, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(364, NULL, NULL, 1, 'MOHAMED HUSAMUDIN', 'KL-41-C-3000', '9846787836', NULL, '2025-03-12', '2026-03-11', 41, NULL, 16000, 16000, 0, 16000, 900000, 13, 6, '2025-03-14', 2, 1, 16000, 0, 2, 176, '2025-03-14', 13, '2025-03-14', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(365, NULL, NULL, 1, 'MIDHUN MADHU', 'KL-07-CF/6210', '9605182341', NULL, '2025-03-13', '2026-03-12', 80, NULL, 7700, 7700, 0, 7700, 0, 13, 6, '2025-03-14', 2, 1, 7700, 0, 3, 297, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(366, NULL, NULL, 1, 'BENNY', 'KL-63-/7751', '7560993413', NULL, '2025-03-13', '2026-03-12', 21, NULL, 1300, 1300, 0, 1300, 10000, 13, 6, '2025-03-14', 2, 1, 1300, 0, 2, 99, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(367, NULL, NULL, 1, 'BINDU MOIDEEN', 'KL-40-S-2187', '9847006397', NULL, '2025-03-13', '2026-03-12', 102, NULL, 10573, 0, 0, 10573, 351567, 13, 6, '2025-03-14', 2, 0, 0, 0, 7, 42, '2025-03-14', 13, '2025-03-14', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(368, NULL, NULL, 1, 'SARATH KUMAR E B', 'KL 32 R 3166', '9961207978', NULL, '2025-03-13', '2026-03-12', 24, NULL, 16642, 16642, 0, 16642, 575000, 13, 6, '2025-03-14', 2, 1, 16642, 0, 3, 20, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(369, NULL, NULL, 1, 'PREMKUMAR R', 'KL-42-Q/7921', '9995657256', NULL, '2025-03-13', '2026-03-13', 154, NULL, 8300, 0, 0, 8300, 500000, 13, 6, '2025-03-14', 2, 0, 0, 0, 7, 298, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(370, NULL, NULL, 1, 'ROHIT BABU', 'KL - 40 - P - 5865', '9620877372', NULL, '2025-03-13', '2026-03-12', 20, NULL, 5532, 0, 0, 5532, 580000, 13, 6, '2025-03-14', 2, 0, 0, 0, 7, 299, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(371, NULL, NULL, 1, 'MANJU S', 'KL 33 7373', '9847828197', NULL, '2025-03-12', '2026-03-11', 9, NULL, 4415, 0, 0, 4415, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 300, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(372, NULL, NULL, 1, 'SHEFFIN', 'KL - 17 - V - 5000', '9656201804', NULL, '2025-03-13', '2026-03-12', 11, NULL, 26000, 10300, 0, 26000, 1200000, 13, 6, '2025-03-14', 2, 0, 10300, 15700, 9, 144, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, '10300 CARD PAID', 2, 4, NULL, NULL, NULL, NULL),
(373, NULL, NULL, 1, 'MR. MOHANAN', 'KL17L1493', '7907024699', NULL, '2025-03-13', '2026-03-12', 128, NULL, 1167, 0, 0, 1167, 0, 11, 6, '2025-03-14', 1, 0, 0, 0, 7, 301, '2025-03-14', 11, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(374, NULL, NULL, 1, 'DR ANEES ALI K', 'KL-11-CA/3636', '9387006999', NULL, '2025-03-24', '2026-03-23', 28, NULL, 21500, 0, 0, 21500, 1850000, 13, 6, '2025-03-14', 2, 0, 0, 0, 7, 302, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(375, NULL, NULL, 1, 'MR. AJAY SURENDRAN', 'KL17R2249', '9946334703', NULL, '2025-03-14', '2026-03-13', 29, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 303, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(376, NULL, NULL, 1, 'SAJI JOSEPH', 'KL - 17 - R - 8496', '6238292189', NULL, '2025-03-13', '2026-03-12', 106, NULL, 2200, 0, 0, 2200, 63000, 13, 6, '2025-03-14', 2, 0, 2200, 0, 7, 45, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(377, NULL, NULL, 1, 'BALACHANDRAN', 'KL - 17 - T - 2883', '9946758188', NULL, '2025-03-13', '2026-03-12', 52, NULL, 4000, 0, 0, 4000, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 304, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(378, NULL, NULL, 1, 'MR. BALAKRISHNAN NAIR', 'KL17Q2410', '7356340968', NULL, '2025-03-13', '2026-03-12', 21, NULL, 1230, 1230, 0, 1230, 0, 13, 6, '2025-03-14', 1, 1, 1230, 0, 2, 295, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(379, NULL, NULL, 1, 'MR. BAIJU A C', 'KL72B8400', '9447517773', NULL, '2025-03-13', '2026-03-12', 37, NULL, 1995, 1995, 0, 1995, 0, 13, 5, '2025-03-14', 1, 1, 1995, 0, 2, 295, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(380, NULL, NULL, 1, 'RANI', 'KL - 17 - T - 5005', '7902983982', NULL, '2025-03-14', '2026-03-13', 20, NULL, 12700, 0, 0, 12700, 880000, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 305, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(381, NULL, NULL, 1, 'ANNIE GEORGE', 'KL-17-T3044', '7510990284', NULL, '2025-03-14', '2026-03-13', 9, NULL, 7400, 0, 0, 7400, 269001, 13, NULL, '2025-03-14', 2, 0, 7400, 0, 7, 306, '2025-03-14', 13, '2025-03-14', 1, NULL, 13, NULL, 2, 4, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_policyholders` (`id`, `agent_id`, `dealer_id`, `policy_type`, `name`, `vehicle_number`, `primary_number`, `secondary_number`, `start_date`, `expiry_date`, `vehicle_model_id`, `company_id`, `premium_amount`, `customer_premium_amount`, `valuation_amount`, `total_cost`, `sum_insured`, `executive_id`, `prepared_user_id`, `prepared_date`, `coverage_type_id`, `status`, `paid_amount`, `due_amount`, `payment_mode_id`, `referred_id`, `created_date`, `assigned_userid`, `assigned_date`, `buying_type`, `broker_name`, `provider_id`, `note`, `policy_mode`, `created_by`, `edited_by`, `edited_date`, `createdAt`, `updatedAt`) VALUES
(382, NULL, NULL, 1, 'SAJI.', 'KL - 17 - U - 7476', '6238292189', NULL, '2025-03-18', '2026-03-17', 155, NULL, 15500, 0, 0, 15500, 1200000, 13, 6, '2025-03-14', 2, 0, 15500, 0, 7, 45, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(383, NULL, NULL, 1, 'ELDHOSE ABRAHAM', 'KL - 36 - A - 8459', '8075295713', NULL, '2025-03-13', '2026-03-12', 137, NULL, 1937, 1937, 0, 1937, 0, 13, 6, '2025-03-14', 1, 1, 1937, 0, 2, 307, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(384, NULL, NULL, 1, 'GIRISHKUMAR', 'KL - 42 - D - 0664', '9847449515', NULL, '2025-03-14', '2026-03-13', 59, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-14', 1, 1, 1167, 0, 2, 310, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(385, NULL, NULL, 1, 'FAHAD SHAFEER', 'KL - 42 - U - 2758', '8589028835', NULL, '2025-03-14', '2026-03-13', 156, NULL, 1665, 0, 0, 1665, 180000, 13, 6, '2025-03-14', 2, 0, 0, 0, 7, 262, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(386, NULL, NULL, 1, 'ANOOP A K', 'KL-44-F/1614', '9846050307', NULL, '2025-03-14', '2026-03-13', 157, NULL, 2600, NULL, 0, 2600, 65000, 13, 4, '2025-03-14', 2, 1, 2600, 0, 2, 314, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(387, NULL, NULL, 1, 'AMAL SURESH', 'KL-17-S/4525', '9447900382', NULL, '2025-03-14', '2026-03-13', 37, NULL, 1950, 1950, 0, 1950, 0, 13, 4, '2025-03-14', 1, 1, 1950, 0, 2, 315, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(388, NULL, NULL, 1, 'MARTIN LAMBAI', 'KL-17-Q-6449', '9605075163', NULL, '2025-03-13', '2026-03-12', 127, NULL, 1950, 0, 0, 1950, 0, 13, 6, '2025-03-14', 1, 0, 0, 0, 7, 316, '2025-03-14', 13, '2025-03-14', 1, NULL, 8, NULL, 2, 4, NULL, NULL, NULL, NULL),
(390, NULL, NULL, 1, 'MRS. SHEENA VARGHESE', 'KL17K0735', '8589028835', NULL, '2025-03-14', '2026-03-13', 47, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-14', 1, 1, 1167, 0, 2, 262, '2025-03-14', 13, '2025-03-14', 1, NULL, 3, NULL, 2, 4, 4, '2025-03-15 04:38:43', NULL, NULL),
(391, NULL, NULL, 1, 'MR JOHNSON MATHAI', 'K 40 L 8529', '9961775038', NULL, '2025-03-14', '2026-03-13', 18, NULL, 6650, 6650, 0, 6650, 370000, 13, 6, '2025-03-15', 2, 1, 6650, 0, 2, 114, '2025-03-15', 13, '2025-03-15', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(392, NULL, NULL, 1, 'MR. LINSON E Y', 'KL07BA8432', '9895208063', NULL, '2025-03-15', '2026-03-14', 37, NULL, 1650, 0, 0, 1650, 0, 13, 6, '2025-03-15', 1, 0, 1650, 0, 7, 317, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(393, NULL, NULL, 1, 'ALAN', 'KL - 17 - R - 4316', '9847126600', NULL, '2025-03-14', '2026-03-13', 4, NULL, 1167, 1167, 0, 1167, 0, 13, 6, '2025-03-15', 1, 0, 1167, 0, 7, 318, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(394, NULL, NULL, 1, 'SANDRA PG', 'KL - 39 - R - 9197', '9961775038', NULL, '2025-03-13', '2026-03-12', 38, NULL, 7400, 7400, 0, 7400, 400000, 13, 6, '2025-03-15', 2, 1, 7400, 0, 2, 114, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(395, NULL, NULL, 1, 'SINDHU HARI', 'KL - 17 - Y - 5361', '9961274186', NULL, '2025-03-16', '2026-03-15', 158, NULL, 1866, 1866, 0, 1866, 150000, 13, 4, '2025-03-15', 2, 1, 1866, 0, 2, 319, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(396, NULL, NULL, 1, 'AKBAR M E', 'KL-07-DD/4333', '9037066696', NULL, '2025-03-21', '2026-03-20', 159, NULL, 19300, 0, 0, 19300, 1700000, 13, 4, '2025-03-15', 2, 0, 0, 0, 7, 60, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(397, NULL, NULL, 1, 'RAHANA', 'KL-17-N-8634', '9544447007', NULL, '2025-03-13', '2026-03-12', 28, NULL, 14000, 14000, 0, 14000, 0, 13, 6, '2025-03-15', 2, 1, 14000, 0, 3, 320, '2025-03-15', 13, '2025-03-15', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(398, NULL, NULL, 1, 'LIGI T JOSEPH', 'KL-27-H-0269', '9656848517', NULL, '2025-03-13', '2026-03-12', 18, NULL, 7500, 0, 0, 7500, 500000, 13, 6, '2025-03-15', 2, 0, 0, 0, 7, 321, '2025-03-15', 13, '2025-03-15', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(399, NULL, NULL, 1, 'RAJESH K R', 'KL-07-BQ/7335', '9947623429', NULL, '2025-03-15', '2026-03-14', 9, NULL, 2500, 0, 0, 2500, 0, 13, 4, '2025-03-17', 1, 1, 2500, 0, 2, 322, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(400, NULL, NULL, 1, 'SHANU', 'KL-17-N/9903', '9745990976', NULL, '2025-03-14', '2026-03-13', 96, NULL, 7000, 0, 0, 7000, 430000, 13, 4, '2025-03-17', 2, 0, 0, 0, 7, 323, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(401, NULL, NULL, 1, 'SEBASTIAN K V', 'KL-35-F/0095', '9947002862', NULL, '2025-03-14', '2026-03-13', 32, NULL, 6300, 0, 0, 6300, 300000, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 324, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(402, NULL, NULL, 1, 'PJ KURIACHEN', 'KL-44-H-1348', '7034734734', NULL, '2025-03-15', '2026-03-14', 160, NULL, 11500, 11500, 0, 11500, 633000, 13, 6, '2025-03-17', 2, 1, 0, 0, 2, 325, '2025-03-17', 13, '2025-03-17', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(403, NULL, NULL, 1, 'SREERAJ C R', 'KL-81-B/3904', '8943339633', NULL, '2025-03-14', '2026-03-13', 20, NULL, 6800, 0, 0, 6800, 300000, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 207, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 1, 4, NULL, NULL, NULL, NULL),
(404, NULL, NULL, 1, 'CHANDRAN PILLAI.', 'KL-10-AG-3385', '9447523739', NULL, '2025-03-13', '2026-03-12', 161, NULL, 2850, 2850, 0, 2850, 0, 13, 6, '2025-03-17', 1, 1, 0, 0, 2, 326, '2025-03-17', 13, '2025-03-17', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(405, NULL, NULL, 1, 'GEORGY JOHN .', 'KL-41-N-7788', NULL, NULL, '2025-03-15', '2026-03-14', 142, NULL, 36000, 36000, 0, 36000, 1375000, 13, 6, '2025-03-17', 2, 1, 0, 0, 12, 327, '2025-03-17', 13, '2025-03-17', 1, NULL, 12, NULL, 1, 4, NULL, NULL, NULL, NULL),
(406, NULL, NULL, 1, 'MRS. RAMLA', 'KL32D4123', '9895028700', NULL, '2025-03-15', '2026-03-14', 80, NULL, 5630, 0, 0, 5630, 0, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 328, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(407, NULL, NULL, 1, 'JERIN PAUL', 'KL-07-CN/2304', '9995296435', NULL, '2025-03-16', '2026-03-15', 43, NULL, 3200, 3200, 0, 3200, 175000, 13, 6, '2025-03-17', 2, 1, 0, 0, 2, 329, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(408, NULL, NULL, 1, 'GOPAKUMAR M', 'KL-30-H/6193', '9645220039', NULL, '2025-03-17', '2026-03-16', 162, NULL, 6000, 0, 0, 6000, 400000, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 330, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(409, NULL, NULL, 1, 'MR. KURIAN JOHN', 'KL13AR3455', '9544665751', NULL, '2025-03-16', '2026-03-15', 104, NULL, 9700, 0, 0, 9700, 0, 13, 6, '2025-03-17', 1, 0, 0, 0, 7, 331, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(410, NULL, NULL, 1, 'MR. SABU KURIAKOSE', 'KL17G9760', '8589028835', NULL, '2025-03-17', '2026-03-16', 59, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-17', 1, 0, 0, 0, 7, 262, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(411, NULL, NULL, 1, 'NIKHIL RAJ', 'KL-41-R/2005', '7356656350', NULL, '2025-03-15', '2026-03-14', 55, NULL, 6850, 6850, 0, 6850, 0, 13, 6, '2025-03-17', 2, 1, 0, 0, 3, 167, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(412, NULL, NULL, 1, 'ANILKUMAR M G', 'KL-41-N/4296', '9037786185', NULL, '2025-03-24', '2026-03-23', 98, NULL, 7500, 7500, 0, 7500, 0, 13, NULL, '2025-03-17', 2, 0, 0, 0, 3, 332, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(413, NULL, NULL, 1, 'DON DAVIDSON DANIEL', 'KL-07-CG-5222', '8848898358', NULL, '2025-03-13', '2026-03-12', 163, NULL, 37500, 37500, 0, 37500, 4500000, 13, 4, '2025-03-17', 2, 1, 0, 0, 2, 333, '2025-03-17', 13, '2025-03-17', 1, NULL, 12, NULL, 2, 4, NULL, NULL, NULL, NULL),
(414, NULL, NULL, 1, 'MR. AJO THOMAS', 'KL17N8820', '8589832852', NULL, '2025-03-18', '2026-03-17', 4, NULL, 1167, 0, 0, 1167, 0, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 45, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(415, NULL, NULL, 1, 'MR. SUJIL SUBASH', 'KL01BJ4107', '7306709392', NULL, '2025-03-18', '2026-03-17', 108, NULL, 4000, 0, 0, 4000, 200000, 13, 6, '2025-03-17', 1, 0, 0, 0, 7, 45, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(416, NULL, NULL, 1, 'MRS. USHA SUKUMARAN', 'KL44G6921', '9847371638', NULL, '2025-03-18', '2026-03-17', 50, NULL, 490, 490, 0, 490, 0, 13, 6, '2025-03-17', 2, 1, 0, 0, 2, 56, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL),
(417, NULL, NULL, 1, 'MR. GEORGE VARGHESE', 'KL38B8082', '9446801186', NULL, '2025-03-16', '2026-03-15', 164, NULL, 13500, 0, 0, 13500, 270000, 13, 6, '2025-03-17', 2, 0, 0, 0, 7, 334, '2025-03-17', 13, '2025-03-17', 1, NULL, 3, NULL, 2, 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policy_categories`
--

CREATE TABLE `tbl_policy_categories` (
  `id` int NOT NULL,
  `policy_category` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
(9, 'Vehicle Insurence Policy', NULL, NULL),
(11, 'PUBLIC LIABILITY', '2025-02-19 07:06:48', '2025-02-19 07:06:48'),
(12, 'EMPLOYEES COMPENSATION', '2025-03-13 10:22:19', '2025-03-13 10:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preparepolicies`
--

CREATE TABLE `tbl_preparepolicies` (
  `id` int NOT NULL,
  `policy_cat_id` int NOT NULL,
  `policy_id` int NOT NULL,
  `link` text NOT NULL,
  `note` text,
  `created_by` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prooftypes`
--

CREATE TABLE `tbl_prooftypes` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_purchase_cards` (
  `id` int NOT NULL,
  `policy_cat_id` int NOT NULL,
  `policy_id` int NOT NULL,
  `purchase_type` int NOT NULL,
  `card_id` int DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `taken_amount` int NOT NULL,
  `card_balance_amount` float DEFAULT NULL,
  `provider_balance_amount` float DEFAULT NULL,
  `added_by` int NOT NULL,
  `added_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_purchase_cards`
--

INSERT INTO `tbl_purchase_cards` (`id`, `policy_cat_id`, `policy_id`, `purchase_type`, `card_id`, `provider_id`, `taken_amount`, `card_balance_amount`, `provider_balance_amount`, `added_by`, `added_date`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 1, 16, 3, 653, 74347, 74347, 9, '2025-02-15', '2025-02-15 07:58:21', '2025-02-15 07:58:21'),
(2, 9, 4, 1, 16, 3, 4511, 69836, 69836, 9, '2025-02-15', '2025-02-15 08:00:26', '2025-02-15 08:00:26'),
(3, 9, 2, 1, 18, 12, 3741, 86259, 116259, 9, '2025-02-24', '2025-02-24 07:43:51', '2025-02-24 07:43:51'),
(4, 9, 5, 1, 18, 12, 4041, 82218, 112218, 9, '2025-02-24', '2025-02-24 07:57:04', '2025-02-24 07:57:04'),
(5, 9, 6, 1, 17, 3, 3405, 71595, 272931, 9, '2025-02-25', '2025-02-25 14:46:14', '2025-02-25 14:46:14'),
(6, 9, 7, 1, 17, 3, 4809, 66786, 268122, 9, '2025-02-25', '2025-02-25 14:48:23', '2025-02-25 14:48:23'),
(7, 9, 141, 1, 15, 3, 8820, 71180, 71180, 9, '2025-03-03', '2025-03-03 11:12:21', '2025-03-03 11:12:21'),
(8, 9, 131, 1, 15, 3, 1167, 70013, 70013, 9, '2025-03-03', '2025-03-03 11:15:59', '2025-03-03 11:15:59'),
(9, 9, 132, 1, 15, 3, 1167, 68846, 68846, 9, '2025-03-03', '2025-03-03 11:19:16', '2025-03-03 11:19:16'),
(10, 9, 133, 1, 15, 3, 1167, 67679, 67679, 9, '2025-03-03', '2025-03-03 11:20:20', '2025-03-03 11:20:20'),
(11, 9, 134, 1, 15, 3, 6410, 61269, 61269, 9, '2025-03-03', '2025-03-03 11:21:44', '2025-03-03 11:21:44'),
(12, 9, 136, 1, 15, 3, 7509, 53760, 53760, 9, '2025-03-03', '2025-03-03 11:38:27', '2025-03-03 11:38:27'),
(13, 9, 137, 1, 15, 3, 4811, 48949, 48949, 9, '2025-03-03', '2025-03-03 11:39:25', '2025-03-03 11:39:25'),
(14, 9, 138, 1, 15, 3, 6704, 42245, 42245, 9, '2025-03-03', '2025-03-03 11:40:00', '2025-03-03 11:40:00'),
(15, 9, 139, 1, 15, 3, 6508, 35737, 35737, 9, '2025-03-03', '2025-03-03 11:40:56', '2025-03-03 11:40:56'),
(16, 9, 140, 1, 15, 3, 6806, 28931, 28931, 9, '2025-03-03', '2025-03-03 11:41:39', '2025-03-03 11:41:39'),
(17, 9, 142, 1, 15, 3, 16902, 12029, 12029, 9, '2025-03-03', '2025-03-03 11:42:47', '2025-03-03 11:42:47'),
(18, 9, 143, 1, 15, 3, 8219, 23810, 299410, 9, '2025-03-04', '2025-03-04 04:31:44', '2025-03-04 04:31:44'),
(19, 9, 144, 1, 15, 3, 1353, 22457, 298057, 9, '2025-03-04', '2025-03-04 04:38:21', '2025-03-04 04:38:21'),
(20, 9, 145, 1, 15, 3, 9702, 12755, 288355, 9, '2025-03-04', '2025-03-04 04:39:04', '2025-03-04 04:39:04'),
(21, 9, 146, 1, 15, 3, 1167, 11588, 287188, 9, '2025-03-04', '2025-03-04 04:39:40', '2025-03-04 04:39:40'),
(22, 9, 147, 1, 15, 3, 11588, 0, 275600, 9, '2025-03-04', '2025-03-04 04:41:14', '2025-03-04 04:41:14'),
(23, 9, 147, 1, 13, 3, 44012, 35988, 231588, 9, '2025-03-04', '2025-03-04 04:42:48', '2025-03-04 04:42:48'),
(24, 9, 148, 1, 13, 3, 1402, 34586, 230186, 9, '2025-03-04', '2025-03-04 04:43:47', '2025-03-04 04:43:47'),
(25, 9, 149, 1, 13, 3, 6505, 28081, 223681, 9, '2025-03-04', '2025-03-04 04:46:03', '2025-03-04 04:46:03'),
(26, 9, 150, 1, 13, 3, 2855, 25226, 220826, 9, '2025-03-04', '2025-03-04 04:47:09', '2025-03-04 04:47:09'),
(27, 9, 151, 1, 13, 3, 25226, 0, 195600, 9, '2025-03-04', '2025-03-04 08:31:07', '2025-03-04 08:31:07'),
(28, 9, 151, 1, 24, 3, 32782, 27218, 162818, 9, '2025-03-04', '2025-03-04 08:32:31', '2025-03-04 08:32:31'),
(29, 9, 152, 1, 24, 3, 27218, 0, 135600, 9, '2025-03-04', '2025-03-04 08:33:34', '2025-03-04 08:33:34'),
(30, 9, 152, 1, 25, 3, 33507, 7493, 102093, 9, '2025-03-04', '2025-03-04 08:38:07', '2025-03-04 08:38:07'),
(31, 9, 153, 1, 25, 3, 7493, 0, 94600, 9, '2025-03-04', '2025-03-04 09:02:25', '2025-03-04 09:02:25'),
(32, 9, 153, 1, 27, 3, 17499, 18501, 77101, 9, '2025-03-04', '2025-03-04 09:02:52', '2025-03-04 09:02:52'),
(33, 9, 154, 1, 27, 3, 1167, 17334, 75934, 9, '2025-03-04', '2025-03-04 09:03:32', '2025-03-04 09:03:32'),
(34, 9, 155, 1, 27, 3, 8001, 9333, 67933, 9, '2025-03-04', '2025-03-04 09:04:11', '2025-03-04 09:04:11'),
(35, 9, 156, 1, 27, 3, 1505, 7828, 66428, 9, '2025-03-04', '2025-03-04 09:05:19', '2025-03-04 09:05:19'),
(36, 9, 157, 1, 22, 3, 8000, 105000, 192428, 9, '2025-03-05', '2025-03-05 04:34:57', '2025-03-05 04:34:57'),
(37, 9, 158, 1, 26, 12, 13100, 41900, 172300, 9, '2025-03-05', '2025-03-05 04:36:01', '2025-03-05 04:36:01'),
(38, 9, 160, 1, 22, 3, 1167, 103833, 191261, 9, '2025-03-05', '2025-03-05 04:36:50', '2025-03-05 04:36:50'),
(39, 9, 162, 1, 22, 3, 6750, 97083, 184511, 9, '2025-03-05', '2025-03-05 04:41:50', '2025-03-05 04:41:50'),
(40, 9, 164, 1, 22, 3, 5053, 92030, 179458, 9, '2025-03-05', '2025-03-05 04:46:51', '2025-03-05 04:46:51'),
(41, 9, 165, 1, 22, 3, 1937, 90093, 177521, 9, '2025-03-05', '2025-03-05 04:55:38', '2025-03-05 04:55:38'),
(42, 9, 166, 1, 22, 12, 12800, 77293, 159500, 9, '2025-03-05', '2025-03-05 04:56:56', '2025-03-05 04:56:56'),
(43, 9, 167, 1, 22, 3, 11438, 65855, 166083, 9, '2025-03-05', '2025-03-05 05:10:16', '2025-03-05 05:10:16'),
(44, 9, 168, 1, 22, 3, 1167, 64688, 164916, 9, '2025-03-05', '2025-03-05 05:11:53', '2025-03-05 05:11:53'),
(45, 9, 169, 1, 22, 3, 6300, 58388, 158616, 9, '2025-03-05', '2025-03-05 05:13:09', '2025-03-05 05:13:09'),
(46, 9, 170, 1, 22, 3, 4850, 53538, 153766, 9, '2025-03-05', '2025-03-05 05:14:19', '2025-03-05 05:14:19'),
(47, 9, 171, 1, 22, 3, 4200, 49338, 149566, 9, '2025-03-05', '2025-03-05 05:15:31', '2025-03-05 05:15:31'),
(48, 9, 172, 1, 22, 3, 8000, 75138, 222366, 9, '2025-03-06', '2025-03-06 09:15:02', '2025-03-06 09:15:02'),
(49, 9, 173, 1, 22, 3, 1167, 73971, 221199, 9, '2025-03-06', '2025-03-06 09:35:22', '2025-03-06 09:35:22'),
(50, 9, 174, 1, 22, 3, 5800, 68171, 215399, 9, '2025-03-06', '2025-03-06 09:36:07', '2025-03-06 09:36:07'),
(51, 9, 175, 1, 26, 12, 17645, 24255, 158822, 9, '2025-03-06', '2025-03-06 09:42:57', '2025-03-06 09:42:57'),
(52, 9, 176, 1, 22, 3, 7600, 60571, 207799, 9, '2025-03-06', '2025-03-06 09:45:46', '2025-03-06 09:45:46'),
(53, 9, 179, 1, 22, 3, 7500, 53071, 200299, 9, '2025-03-06', '2025-03-06 11:46:39', '2025-03-06 11:46:39'),
(54, 9, 180, 1, 22, 3, 900, 52171, 199399, 9, '2025-03-06', '2025-03-06 11:49:09', '2025-03-06 11:49:09'),
(55, 9, 181, 1, 22, 3, 1450, 50721, 197949, 9, '2025-03-06', '2025-03-06 11:51:01', '2025-03-06 11:51:01'),
(56, 9, 182, 1, 22, 3, 6400, 44321, 191549, 9, '2025-03-06', '2025-03-06 11:51:53', '2025-03-06 11:51:53'),
(57, 9, 183, 1, 22, 3, 5800, 38521, 185749, 9, '2025-03-06', '2025-03-06 11:52:48', '2025-03-06 11:52:48'),
(58, 9, 184, 1, 22, 3, 7000, 31521, 178749, 9, '2025-03-06', '2025-03-06 11:53:23', '2025-03-06 11:53:23'),
(59, 9, 185, 1, 22, 3, 1167, 30354, 177582, 9, '2025-03-06', '2025-03-06 11:54:02', '2025-03-06 11:54:02'),
(60, 9, 186, 1, 22, 3, 5500, 24854, 172082, 9, '2025-03-06', '2025-03-06 11:54:45', '2025-03-06 11:54:45'),
(61, 9, 187, 1, 22, 3, 800, 24054, 171282, 9, '2025-03-06', '2025-03-06 11:56:02', '2025-03-06 11:56:02'),
(62, 9, 188, 1, 22, 3, 10800, 13254, 160482, 9, '2025-03-06', '2025-03-06 11:56:43', '2025-03-06 11:56:43'),
(63, 9, 190, 1, 22, 3, 5300, 7954, 155182, 9, '2025-03-06', '2025-03-06 12:05:56', '2025-03-06 12:05:56'),
(64, 9, 189, 1, 22, 3, 4400, 3554, 150782, 9, '2025-03-06', '2025-03-06 12:06:54', '2025-03-06 12:06:54'),
(65, 9, 191, 1, 22, 3, 3554, 0, 147228, 9, '2025-03-06', '2025-03-06 12:07:54', '2025-03-06 12:07:54'),
(66, 9, 191, 1, 30, 3, 2446, 9554, 144782, 9, '2025-03-06', '2025-03-06 12:08:41', '2025-03-06 12:08:41'),
(67, 9, 192, 1, 30, 3, 9554, 0, 135228, 9, '2025-03-06', '2025-03-06 12:14:46', '2025-03-06 12:14:46'),
(68, 9, 192, 1, 10, 3, 5446, 104554, 129782, 9, '2025-03-06', '2025-03-06 12:15:57', '2025-03-06 12:15:57'),
(69, 9, 193, 1, 10, 3, 21800, 82754, 107982, 9, '2025-03-06', '2025-03-06 12:17:10', '2025-03-06 12:17:10'),
(70, 9, 194, 1, 10, 3, 1167, 81587, 106815, 9, '2025-03-06', '2025-03-06 12:19:25', '2025-03-06 12:19:25'),
(71, 9, 195, 1, 10, 3, 11600, 69987, 95215, 9, '2025-03-06', '2025-03-06 12:21:39', '2025-03-06 12:21:39'),
(72, 9, 196, 1, 10, 3, 14500, 55487, 80715, 9, '2025-03-06', '2025-03-06 12:22:22', '2025-03-06 12:22:22'),
(73, 9, 197, 1, 10, 3, 18800, 36687, 61915, 9, '2025-03-06', '2025-03-06 12:23:43', '2025-03-06 12:23:43'),
(74, 9, 198, 1, 10, 3, 1450, 35237, 60465, 9, '2025-03-06', '2025-03-06 12:25:14', '2025-03-06 12:25:14'),
(75, 9, 199, 1, 10, 3, 1167, 34070, 59298, 9, '2025-03-06', '2025-03-06 12:26:44', '2025-03-06 12:26:44'),
(76, 9, 201, 1, 10, 3, 1167, 32903, 58131, 9, '2025-03-06', '2025-03-06 12:28:49', '2025-03-06 12:28:49'),
(77, 9, 202, 1, 10, 3, 1167, 31736, 56964, 9, '2025-03-06', '2025-03-06 12:29:26', '2025-03-06 12:29:26'),
(78, 9, 203, 1, 10, 3, 1167, 30569, 55797, 9, '2025-03-06', '2025-03-06 12:33:03', '2025-03-06 12:33:03'),
(79, 9, 204, 1, 10, 3, 1450, 29119, 54347, 9, '2025-03-06', '2025-03-06 12:35:29', '2025-03-06 12:35:29'),
(80, 9, 205, 1, 32, 3, 4250, 81225, 250097, 9, '2025-03-07', '2025-03-07 09:07:38', '2025-03-07 09:07:38'),
(81, 9, 206, 1, 32, 3, 5250, 75975, 244847, 9, '2025-03-07', '2025-03-07 09:09:13', '2025-03-07 09:09:13'),
(82, 9, 207, 1, 32, 3, 7300, 68675, 237547, 9, '2025-03-07', '2025-03-07 09:10:20', '2025-03-07 09:10:20'),
(83, 9, 208, 1, 32, 3, 2400, 66275, 235147, 9, '2025-03-07', '2025-03-07 09:13:01', '2025-03-07 09:13:01'),
(84, 9, 209, 1, 32, 3, 1167, 65108, 233980, 9, '2025-03-07', '2025-03-07 09:17:06', '2025-03-07 09:17:06'),
(85, 9, 210, 1, 32, 3, 1167, 63941, 232813, 9, '2025-03-07', '2025-03-07 09:20:20', '2025-03-07 09:20:20'),
(86, 9, 212, 3, NULL, NULL, 89600, NULL, NULL, 9, '2025-03-07', '2025-03-07 09:23:04', '2025-03-07 09:23:04'),
(87, 9, 213, 1, 32, 3, 8100, 55841, 224713, 9, '2025-03-07', '2025-03-07 09:28:07', '2025-03-07 09:28:07'),
(88, 9, 215, 3, NULL, NULL, 11300, NULL, NULL, 9, '2025-03-07', '2025-03-07 09:31:08', '2025-03-07 09:31:08'),
(89, 9, 217, 1, 23, 3, 13000, 37000, 211713, 9, '2025-03-07', '2025-03-07 09:33:26', '2025-03-07 09:33:26'),
(90, 9, 216, 1, 23, 3, 17000, 20000, 194713, 9, '2025-03-07', '2025-03-07 09:34:43', '2025-03-07 09:34:43'),
(91, 9, 218, 1, 29, 12, 5300, 11667, 153522, 9, '2025-03-07', '2025-03-07 09:35:44', '2025-03-07 09:35:44'),
(92, 9, 219, 1, 16, 8, 19000, 193, 193, 9, '2025-03-07', '2025-03-07 09:37:51', '2025-03-07 09:37:51'),
(93, 9, 220, 1, 29, 12, 6500, 5167, 147022, 9, '2025-03-07', '2025-03-07 10:07:32', '2025-03-07 10:07:32'),
(94, 9, 221, 1, 23, 3, 1167, 18833, 193546, 9, '2025-03-07', '2025-03-07 10:41:39', '2025-03-07 10:41:39'),
(95, 9, 222, 3, NULL, NULL, 5719, NULL, NULL, 9, '2025-03-07', '2025-03-07 10:42:06', '2025-03-07 10:42:06'),
(96, 9, 223, 1, 23, 3, 2850, 15983, 190696, 9, '2025-03-07', '2025-03-07 10:43:58', '2025-03-07 10:43:58'),
(97, 9, 224, 1, 23, 3, 900, 15083, 189796, 9, '2025-03-07', '2025-03-07 10:45:12', '2025-03-07 10:45:12'),
(98, 9, 225, 1, 23, 3, 900, 14183, 188896, 9, '2025-03-07', '2025-03-07 10:51:34', '2025-03-07 10:51:34'),
(99, 9, 226, 3, NULL, NULL, 6008, NULL, NULL, 9, '2025-03-08', '2025-03-08 05:01:29', '2025-03-08 05:01:29'),
(100, 9, 227, 1, 23, 3, 1167, 13016, 187729, 9, '2025-03-08', '2025-03-08 05:02:36', '2025-03-08 05:02:36'),
(101, 9, 228, 1, 23, 3, 2850, 10166, 184879, 9, '2025-03-08', '2025-03-08 05:04:20', '2025-03-08 05:04:20'),
(102, 9, 229, 1, 23, 3, 7600, 2566, 177279, 9, '2025-03-08', '2025-03-08 05:05:55', '2025-03-08 05:05:55'),
(103, 9, 230, 1, 23, 3, 2566, 0, 174713, 9, '2025-03-08', '2025-03-08 05:08:25', '2025-03-08 05:08:25'),
(104, 9, 230, 1, 27, 3, 5934, 1894, 168779, 9, '2025-03-08', '2025-03-08 05:10:29', '2025-03-08 05:10:29'),
(105, 9, 231, 1, 26, 12, 11800, 12455, 135222, 9, '2025-03-08', '2025-03-08 05:12:57', '2025-03-08 05:12:57'),
(106, 9, 232, 1, 10, 3, 8300, 20819, 160479, 9, '2025-03-08', '2025-03-08 05:15:23', '2025-03-08 05:15:23'),
(107, 9, 233, 1, 10, 3, 6000, 14819, 154479, 9, '2025-03-08', '2025-03-08 06:01:44', '2025-03-08 06:01:44'),
(108, 9, 234, 1, 10, 3, 6800, 8019, 147679, 9, '2025-03-08', '2025-03-08 06:02:31', '2025-03-08 06:02:31'),
(109, 9, 235, 1, 10, 3, 8019, 0, 139660, 9, '2025-03-08', '2025-03-08 06:06:20', '2025-03-08 06:06:20'),
(110, 9, 235, 1, 7, 3, 5481, 165350, 134179, 9, '2025-03-08', '2025-03-08 06:07:00', '2025-03-08 06:07:00'),
(111, 9, 236, 1, 7, 3, 7500, 157850, 126679, 9, '2025-03-08', '2025-03-08 06:08:35', '2025-03-08 06:08:35'),
(112, 9, 237, 1, 7, 3, 1167, 156683, 125512, 9, '2025-03-08', '2025-03-08 06:10:18', '2025-03-08 06:10:18'),
(113, 9, 238, 1, 7, 3, 9700, 146983, 115812, 9, '2025-03-08', '2025-03-08 06:11:09', '2025-03-08 06:11:09'),
(114, 9, 239, 1, 7, 3, 1167, 145816, 114645, 9, '2025-03-08', '2025-03-08 06:12:32', '2025-03-08 06:12:32'),
(115, 9, 240, 3, NULL, NULL, 5000, NULL, NULL, 9, '2025-03-08', '2025-03-08 06:13:56', '2025-03-08 06:13:56'),
(116, 9, 241, 1, 35, 3, 1937, 123063, 287708, 9, '2025-03-08', '2025-03-08 06:31:35', '2025-03-08 06:31:35'),
(117, 9, 242, 1, 35, 3, 8500, 114563, 279208, 9, '2025-03-08', '2025-03-08 06:33:15', '2025-03-08 06:33:15'),
(118, 9, 243, 1, 35, 3, 6200, 108363, 273008, 9, '2025-03-08', '2025-03-08 06:42:54', '2025-03-08 06:42:54'),
(119, 9, 244, 1, 35, 3, 1167, 107196, 271841, 9, '2025-03-08', '2025-03-08 06:47:06', '2025-03-08 06:47:06'),
(120, 9, 245, 1, 35, 3, 946, 106250, 270895, 9, '2025-03-08', '2025-03-08 06:47:54', '2025-03-08 06:47:54'),
(121, 9, 246, 1, 32, 12, 6300, 49541, 135322, 9, '2025-03-08', '2025-03-08 06:50:33', '2025-03-08 06:50:33'),
(122, 9, 247, 1, 35, 3, 7800, 98450, 263095, 9, '2025-03-08', '2025-03-08 06:53:14', '2025-03-08 06:53:14'),
(123, 9, 248, 1, 35, 3, 4400, 94050, 258695, 9, '2025-03-08', '2025-03-08 06:54:05', '2025-03-08 06:54:05'),
(124, 9, 249, 1, 31, 3, 41914, 108086, 216781, 9, '2025-03-08', '2025-03-08 06:54:43', '2025-03-08 06:54:43'),
(125, 9, 250, 3, NULL, NULL, 5500, NULL, NULL, 9, '2025-03-08', '2025-03-08 06:55:14', '2025-03-08 06:55:14'),
(126, 9, 251, 1, 35, 3, 6839, 87211, 209942, 9, '2025-03-08', '2025-03-08 06:57:54', '2025-03-08 06:57:54'),
(127, 9, 252, 1, 35, 3, 1167, 86044, 208775, 9, '2025-03-08', '2025-03-08 06:59:51', '2025-03-08 06:59:51'),
(128, 9, 253, 1, 31, 3, 66132, 41954, 142643, 9, '2025-03-08', '2025-03-08 07:00:39', '2025-03-08 07:00:39'),
(129, 9, 254, 1, 35, 3, 9702, 76342, 132941, 9, '2025-03-08', '2025-03-08 07:02:10', '2025-03-08 07:02:10'),
(130, 9, 255, 1, 35, 3, 5400, 70942, 127541, 9, '2025-03-08', '2025-03-08 07:02:45', '2025-03-08 07:02:45'),
(131, 9, 256, 1, 35, 3, 5205, 65737, 122336, 9, '2025-03-08', '2025-03-08 07:03:41', '2025-03-08 07:03:41'),
(132, 9, 257, 1, 35, 3, 7490, 58247, 114846, 9, '2025-03-08', '2025-03-08 07:05:56', '2025-03-08 07:05:56'),
(133, 9, 258, 1, 32, 13, 20899, 28642, 52357, 9, '2025-03-08', '2025-03-08 07:09:21', '2025-03-08 07:09:21'),
(134, 9, 259, 1, 35, 3, 10012, 48235, 104834, 9, '2025-03-08', '2025-03-08 07:10:53', '2025-03-08 07:10:53'),
(135, 9, 260, 1, 35, 3, 6519, 41716, 98315, 9, '2025-03-08', '2025-03-08 07:11:58', '2025-03-08 07:11:58'),
(136, 9, 261, 1, 32, 12, 2850, 25792, 132472, 9, '2025-03-08', '2025-03-08 07:13:47', '2025-03-08 07:13:47'),
(137, 9, 262, 1, 35, 3, 1167, 40549, 97148, 9, '2025-03-08', '2025-03-08 07:16:14', '2025-03-08 07:16:14'),
(138, 9, 263, 1, 35, 3, 1167, 39382, 95981, 9, '2025-03-08', '2025-03-08 07:16:43', '2025-03-08 07:16:43'),
(139, 9, 264, 1, 35, 3, 6300, 33082, 89681, 9, '2025-03-08', '2025-03-08 07:17:19', '2025-03-08 07:17:19'),
(140, 9, 265, 1, 35, 3, 1167, 31915, 88514, 9, '2025-03-08', '2025-03-08 07:17:51', '2025-03-08 07:17:51'),
(141, 1, 10, 3, NULL, NULL, 19210, NULL, NULL, 9, '2025-03-08', '2025-03-08 07:24:14', '2025-03-08 07:24:14'),
(142, 1, 9, 1, 32, 19, 2674, 23118, 14804, 9, '2025-03-08', '2025-03-08 07:26:33', '2025-03-08 07:26:33'),
(143, 1, 8, 1, 32, 13, 11902, 11216, 40455, 9, '2025-03-08', '2025-03-08 07:27:35', '2025-03-08 07:27:35'),
(144, 1, 7, 1, 7, 13, 8942, 136874, 31513, 9, '2025-03-08', '2025-03-08 07:28:17', '2025-03-08 07:28:17'),
(145, 1, 6, 1, 7, 18, 39936, 96938, 57605, 9, '2025-03-08', '2025-03-08 07:29:46', '2025-03-08 07:29:46'),
(146, 1, 5, 1, 7, 13, 16472, 80466, 15041, 9, '2025-03-08', '2025-03-08 07:33:37', '2025-03-08 07:33:37'),
(147, 1, 4, 1, 7, 18, 17669, 62797, 39936, 9, '2025-03-08', '2025-03-08 07:34:41', '2025-03-08 07:34:41'),
(148, 1, 3, 1, 7, 13, 13728, 49069, 1313, 9, '2025-03-08', '2025-03-08 07:35:45', '2025-03-08 07:35:45'),
(149, 1, 2, 1, 7, 18, 22740, 26329, 17196, 9, '2025-03-08', '2025-03-08 07:37:21', '2025-03-08 07:37:21'),
(150, 9, 266, 1, 35, 3, 5900, 26015, 82614, 9, '2025-03-08', '2025-03-08 09:22:22', '2025-03-08 09:22:22'),
(151, 9, 267, 1, 35, 3, 4400, 21615, 78214, 9, '2025-03-08', '2025-03-08 09:23:53', '2025-03-08 09:23:53'),
(152, 9, 268, 3, NULL, NULL, 5089, NULL, NULL, 9, '2025-03-08', '2025-03-08 09:24:57', '2025-03-08 09:24:57'),
(153, 9, 269, 1, 33, 8, 12155, 36969, 5193, 9, '2025-03-08', '2025-03-08 09:26:25', '2025-03-08 09:26:25'),
(154, 9, 270, 1, 35, 3, 5900, 15715, 72314, 9, '2025-03-08', '2025-03-08 09:27:17', '2025-03-08 09:27:17'),
(155, 9, 271, 2, 35, 3, 3100, 12615, 69214, 9, '2025-03-08', '2025-03-08 09:29:03', '2025-03-08 09:29:03'),
(156, 9, 280, 1, 35, 3, 12615, 0, 56599, 9, '2025-03-08', '2025-03-08 09:32:30', '2025-03-08 09:32:30'),
(157, 9, 280, 1, 34, 3, 50000, 0, 6599, 9, '2025-03-08', '2025-03-08 09:32:58', '2025-03-08 09:32:58'),
(158, 9, 272, 1, 27, 3, 1894, 0, 18791, 9, '2025-03-08', '2025-03-08 11:59:05', '2025-03-08 11:59:05'),
(159, 9, 272, 1, 31, 3, 2506, 39448, 16285, 9, '2025-03-08', '2025-03-08 12:01:56', '2025-03-08 12:01:56'),
(160, 9, 280, 1, 31, 3, 6615, 32833, 9670, 9, '2025-03-08', '2025-03-08 12:03:28', '2025-03-08 12:03:28'),
(161, 9, 273, 1, 31, 3, 1167, 31666, 8503, 9, '2025-03-08', '2025-03-08 12:04:37', '2025-03-08 12:04:37'),
(162, 9, 274, 1, 31, 3, 1400, 30266, 207103, 9, '2025-03-08', '2025-03-08 12:15:05', '2025-03-08 12:15:05'),
(163, 9, 275, 1, 31, 3, 1937, 28329, 205166, 9, '2025-03-08', '2025-03-08 12:15:41', '2025-03-08 12:15:41'),
(164, 9, 276, 1, 31, 3, 1400, 26929, 203766, 9, '2025-03-08', '2025-03-08 12:16:11', '2025-03-08 12:16:11'),
(165, 9, 277, 1, 31, 3, 1600, 25329, 202166, 9, '2025-03-08', '2025-03-08 12:16:42', '2025-03-08 12:16:42'),
(166, 9, 279, 1, 31, 3, 9200, 16129, 192966, 9, '2025-03-08', '2025-03-08 12:17:14', '2025-03-08 12:17:14'),
(167, 9, 281, 1, 32, 3, 1455, 9761, 191511, 9, '2025-03-08', '2025-03-08 12:18:41', '2025-03-08 12:18:41'),
(168, 9, 282, 1, 32, 3, 1355, 8406, 190156, 9, '2025-03-08', '2025-03-08 12:19:09', '2025-03-08 12:19:09'),
(169, 2, 8, 3, NULL, NULL, 4443, NULL, NULL, 9, '2025-03-08', '2025-03-08 12:21:58', '2025-03-08 12:21:58'),
(170, 3, 7, 3, NULL, NULL, 590, NULL, NULL, 9, '2025-03-08', '2025-03-08 12:22:24', '2025-03-08 12:22:24'),
(171, 3, 6, 3, NULL, NULL, 590, NULL, NULL, 9, '2025-03-08', '2025-03-08 12:22:48', '2025-03-08 12:22:48'),
(172, 11, 4, 2, 33, 8, 4957, 87888, 8236, 9, '2025-03-10', '2025-03-10 04:54:06', '2025-03-10 04:54:06'),
(173, 3, 5, 3, NULL, NULL, 590, NULL, NULL, 9, '2025-03-10', '2025-03-10 04:56:09', '2025-03-10 04:56:09'),
(174, 3, 3, 3, NULL, NULL, 590, NULL, NULL, 9, '2025-03-10', '2025-03-10 04:57:35', '2025-03-10 04:57:35'),
(175, 3, 2, 3, NULL, NULL, 590, NULL, NULL, 9, '2025-03-10', '2025-03-10 04:58:32', '2025-03-10 04:58:32'),
(176, 9, 283, 3, NULL, NULL, 19601, NULL, NULL, 9, '2025-03-10', '2025-03-10 10:41:03', '2025-03-10 10:41:03'),
(177, 9, 284, 1, 36, 3, 2855, 197145, 187301, 9, '2025-03-10', '2025-03-10 10:42:01', '2025-03-10 10:42:01'),
(178, 9, 285, 1, 36, 3, 24337, 172808, 162964, 9, '2025-03-10', '2025-03-10 10:42:43', '2025-03-10 10:42:43'),
(179, 9, 290, 3, NULL, NULL, 22650, NULL, NULL, 9, '2025-03-10', '2025-03-10 10:44:49', '2025-03-10 10:44:49'),
(180, 9, 286, 1, 36, 3, 850, 171958, 162114, 9, '2025-03-10', '2025-03-10 10:45:40', '2025-03-10 10:45:40'),
(181, 9, 287, 1, 36, 3, 1167, 170791, 160947, 9, '2025-03-10', '2025-03-10 10:47:54', '2025-03-10 10:47:54'),
(182, 9, 288, 1, 31, 3, 16129, 0, 144818, 9, '2025-03-10', '2025-03-10 10:49:06', '2025-03-10 10:49:06'),
(183, 9, 288, 1, 36, 3, 3371, 167420, 141447, 9, '2025-03-10', '2025-03-10 10:49:35', '2025-03-10 10:49:35'),
(184, 9, 291, 1, 36, 3, 6400, 161020, 135047, 9, '2025-03-10', '2025-03-10 10:56:34', '2025-03-10 10:56:34'),
(185, 9, 292, 1, 28, 12, 1930, 33070, 154942, 9, '2025-03-10', '2025-03-10 12:03:26', '2025-03-10 12:03:26'),
(186, 9, 293, 1, 36, 3, 6400, 154620, 308647, 9, '2025-03-10', '2025-03-10 12:06:21', '2025-03-10 12:06:21'),
(187, 9, 294, 1, 36, 3, 4600, 150020, 304047, 9, '2025-03-10', '2025-03-10 12:07:17', '2025-03-10 12:07:17'),
(188, 9, 295, 1, 36, 3, 4900, 145120, 299147, 9, '2025-03-10', '2025-03-10 12:09:43', '2025-03-10 12:09:43'),
(189, 9, 296, 1, 36, 3, 6600, 138520, 292547, 9, '2025-03-10', '2025-03-10 12:10:49', '2025-03-10 12:10:49'),
(190, 9, 297, 1, 36, 3, 4400, 134120, 288147, 9, '2025-03-10', '2025-03-10 12:12:43', '2025-03-10 12:12:43'),
(191, 9, 298, 3, NULL, NULL, 15600, NULL, NULL, 9, '2025-03-10', '2025-03-10 12:13:21', '2025-03-10 12:13:21'),
(192, 9, 299, 1, 36, 3, 4400, 129720, 283747, 9, '2025-03-10', '2025-03-10 12:14:36', '2025-03-10 12:14:36'),
(193, 9, 310, 1, 36, 3, 10500, 119220, 273247, 9, '2025-03-10', '2025-03-10 12:15:24', '2025-03-10 12:15:24'),
(194, 9, 301, 1, 28, 12, 11300, 21770, 143642, 9, '2025-03-10', '2025-03-10 12:16:48', '2025-03-10 12:16:48'),
(195, 9, 302, 1, 36, 3, 12000, 107220, 261247, 9, '2025-03-10', '2025-03-10 12:17:54', '2025-03-10 12:17:54'),
(196, 9, 303, 1, 36, 3, 900, 106320, 260347, 9, '2025-03-10', '2025-03-10 12:18:28', '2025-03-10 12:18:28'),
(197, 9, 304, 1, 36, 3, 14000, 92320, 246347, 9, '2025-03-10', '2025-03-10 12:19:40', '2025-03-10 12:19:40'),
(198, 9, 305, 1, 33, 8, 1250, 86638, 6986, 9, '2025-03-10', '2025-03-10 12:20:40', '2025-03-10 12:20:40'),
(199, 9, 306, 1, 36, 3, 78000, 14320, 168347, 9, '2025-03-10', '2025-03-10 12:21:34', '2025-03-10 12:21:34'),
(200, 9, 307, 1, 36, 3, 14320, 0, 154027, 9, '2025-03-10', '2025-03-10 12:22:48', '2025-03-10 12:22:48'),
(201, 9, 307, 1, 7, 3, 26329, 0, 127698, 9, '2025-03-10', '2025-03-10 12:24:03', '2025-03-10 12:24:03'),
(202, 9, 307, 1, 37, 3, 37351, 42649, 90347, 9, '2025-03-10', '2025-03-10 12:26:51', '2025-03-10 12:26:51'),
(203, 9, 308, 1, 37, 3, 4150, 38499, 86197, 9, '2025-03-10', '2025-03-10 12:28:25', '2025-03-10 12:28:25'),
(204, 9, 309, 3, NULL, NULL, 5500, NULL, NULL, 9, '2025-03-10', '2025-03-10 12:29:18', '2025-03-10 12:29:18'),
(205, 9, 311, 1, 38, 3, 63000, 37000, 274573, 9, '2025-03-13', '2025-03-13 04:38:35', '2025-03-13 04:38:35'),
(206, 9, 312, 1, 38, 3, 21500, 15500, 253073, 9, '2025-03-13', '2025-03-13 09:40:43', '2025-03-13 09:40:43'),
(207, 1, 11, 1, 33, 18, 17615, 69023, 85131, 9, '2025-03-13', '2025-03-13 09:52:48', '2025-03-13 09:52:48'),
(208, 1, 14, 1, 33, 19, 14804, 54219, 0, 9, '2025-03-13', '2025-03-13 09:54:46', '2025-03-13 09:54:46'),
(209, 1, 13, 3, NULL, NULL, 27307, NULL, NULL, 9, '2025-03-13', '2025-03-13 09:57:29', '2025-03-13 09:57:29'),
(210, 1, 12, 1, 23, 18, 35665, 1796, 49466, 9, '2025-03-13', '2025-03-13 09:59:10', '2025-03-13 09:59:10'),
(211, 9, 313, 1, 22, 3, 19900, 5000, 233173, 9, '2025-03-13', '2025-03-13 10:01:59', '2025-03-13 10:01:59'),
(212, 9, 314, 1, 29, 12, 9700, 51267, 187948, 9, '2025-03-13', '2025-03-13 10:04:51', '2025-03-13 10:04:51'),
(213, 9, 315, 1, 8, 3, 1167, 118833, 232006, 9, '2025-03-13', '2025-03-13 10:07:24', '2025-03-13 10:07:24'),
(214, 9, 316, 1, 8, 3, 12600, 106233, 219406, 9, '2025-03-13', '2025-03-13 10:08:26', '2025-03-13 10:08:26'),
(215, 9, 317, 1, 8, 3, 4400, 101833, 215006, 9, '2025-03-13', '2025-03-13 11:14:21', '2025-03-13 11:14:21'),
(216, 9, 318, 1, 8, 3, 5000, 96833, 210006, 9, '2025-03-13', '2025-03-13 11:16:50', '2025-03-13 11:16:50'),
(217, 9, 319, 1, 37, 3, 38499, 0, 171507, 9, '2025-03-13', '2025-03-13 11:28:31', '2025-03-13 11:28:31'),
(218, 9, 319, 1, 8, 3, 27501, 69332, 144006, 9, '2025-03-13', '2025-03-13 11:29:06', '2025-03-13 11:29:06'),
(219, 9, 320, 1, 22, 3, 5000, 0, 139006, 9, '2025-03-13', '2025-03-13 11:30:16', '2025-03-13 11:30:16'),
(220, 9, 321, 3, NULL, NULL, 5800, NULL, NULL, 9, '2025-03-13', '2025-03-13 11:31:57', '2025-03-13 11:31:57'),
(221, 2, 16, 1, 23, 8, 1796, 0, 6986, 9, '2025-03-14', '2025-03-14 10:53:38', '2025-03-14 10:53:38'),
(222, 2, 16, 1, 23, 8, 1796, 0, 6986, 9, '2025-03-14', '2025-03-14 10:53:38', '2025-03-14 10:53:38'),
(223, 9, 322, 1, NULL, 3, 4400, NULL, 240402, 4, '2025-03-15', '2025-03-15 10:32:24', '2025-03-15 10:32:24'),
(224, 9, 323, 1, NULL, 12, 12500, NULL, 193148, 4, '2025-03-15', '2025-03-15 10:36:29', '2025-03-15 10:36:29'),
(225, 9, 324, 1, NULL, 3, 1167, NULL, 240391, 4, '2025-03-15', '2025-03-15 10:38:39', '2025-03-15 10:38:39'),
(226, 9, 325, 1, NULL, 3, 1950, NULL, 237285, 4, '2025-03-15', '2025-03-15 10:39:07', '2025-03-15 10:39:07'),
(227, 9, 326, 1, NULL, 3, 7300, NULL, 229985, 4, '2025-03-15', '2025-03-15 10:39:53', '2025-03-15 10:39:53'),
(228, 9, 327, 3, NULL, NULL, 14300, NULL, NULL, 4, '2025-03-15', '2025-03-15 10:41:05', '2025-03-15 10:41:05'),
(229, 9, 328, 1, NULL, 3, 5500, NULL, 224485, 4, '2025-03-15', '2025-03-15 10:44:04', '2025-03-15 10:44:04'),
(230, 9, 329, 1, NULL, 3, 6600, NULL, 217885, 4, '2025-03-15', '2025-03-15 10:48:39', '2025-03-15 10:48:39'),
(231, 9, 331, 3, NULL, NULL, 2399, NULL, NULL, 4, '2025-03-15', '2025-03-15 10:52:45', '2025-03-15 10:52:45'),
(232, 9, 332, 1, NULL, 3, 7000, NULL, 210885, 4, '2025-03-15', '2025-03-15 11:02:32', '2025-03-15 11:02:32'),
(233, 9, 333, 1, NULL, 3, 5900, NULL, 204985, 4, '2025-03-15', '2025-03-15 11:03:30', '2025-03-15 11:03:30'),
(234, 9, 334, 1, NULL, 3, 1227, NULL, 203758, 4, '2025-03-15', '2025-03-15 11:04:53', '2025-03-15 11:04:53'),
(235, 9, 335, 1, NULL, 3, 3600, NULL, 200158, 4, '2025-03-15', '2025-03-15 11:06:37', '2025-03-15 11:06:37'),
(236, 9, 336, 1, NULL, 3, 2850, NULL, 197308, 4, '2025-03-15', '2025-03-15 11:09:14', '2025-03-15 11:09:14'),
(237, 9, 337, 1, NULL, 8, 1191, NULL, 3999, 4, '2025-03-15', '2025-03-15 11:10:38', '2025-03-15 11:10:38'),
(238, 9, 338, 1, NULL, 12, 1167, NULL, 191981, 4, '2025-03-15', '2025-03-15 11:34:36', '2025-03-15 11:34:36'),
(239, 9, 339, 3, NULL, NULL, 6773, NULL, NULL, 4, '2025-03-15', '2025-03-15 11:36:09', '2025-03-15 11:36:09'),
(240, 9, 340, 1, NULL, 3, 1350, NULL, 195958, 4, '2025-03-15', '2025-03-15 11:37:02', '2025-03-15 11:37:02'),
(241, 9, 341, 1, NULL, 3, 7499, NULL, 188459, 4, '2025-03-15', '2025-03-15 11:38:00', '2025-03-15 11:38:00'),
(242, 9, 342, 1, NULL, 3, 1937, NULL, 186522, 4, '2025-03-15', '2025-03-15 11:39:57', '2025-03-15 11:39:57'),
(243, 9, 343, 3, NULL, NULL, 34000, NULL, NULL, 9, '2025-03-17', '2025-03-17 04:19:37', '2025-03-17 04:19:37'),
(244, 9, 344, 1, NULL, 12, 1167, NULL, 191865, 9, '2025-03-17', '2025-03-17 04:22:11', '2025-03-17 04:22:11'),
(245, 9, 345, 3, NULL, NULL, 5835, NULL, NULL, 9, '2025-03-17', '2025-03-17 04:22:56', '2025-03-17 04:22:56'),
(246, 9, 346, 1, NULL, 3, 6939, NULL, 179583, 9, '2025-03-17', '2025-03-17 04:24:20', '2025-03-17 04:24:20'),
(247, 9, 347, 1, NULL, 3, 6624, NULL, 172959, 9, '2025-03-17', '2025-03-17 04:25:18', '2025-03-17 04:25:18'),
(248, 9, 348, 1, NULL, 12, 15109, NULL, 175705, 9, '2025-03-17', '2025-03-17 04:27:16', '2025-03-17 04:27:16'),
(249, 9, 349, 1, NULL, 3, 2850, NULL, 170109, 9, '2025-03-17', '2025-03-17 04:30:19', '2025-03-17 04:30:19'),
(250, 9, 350, 1, NULL, 3, 1167, NULL, 168942, 9, '2025-03-17', '2025-03-17 04:30:51', '2025-03-17 04:30:51'),
(251, 9, 351, 1, NULL, 3, 1167, NULL, 167775, 9, '2025-03-17', '2025-03-17 04:37:38', '2025-03-17 04:37:38'),
(252, 9, 352, 1, NULL, 3, 2850, NULL, 164925, 9, '2025-03-17', '2025-03-17 04:38:28', '2025-03-17 04:38:28'),
(253, 9, 353, 1, NULL, 3, 1167, NULL, 163758, 9, '2025-03-17', '2025-03-17 04:39:29', '2025-03-17 04:39:29'),
(254, 9, 354, 1, NULL, 3, 1504, NULL, 162254, 9, '2025-03-17', '2025-03-17 04:41:19', '2025-03-17 04:41:19'),
(255, 9, 355, 1, NULL, 3, 3401, NULL, 158853, 9, '2025-03-17', '2025-03-17 04:41:57', '2025-03-17 04:41:57'),
(256, 9, 356, 1, NULL, 3, 1670, NULL, 157183, 9, '2025-03-17', '2025-03-17 04:43:03', '2025-03-17 04:43:03'),
(257, 9, 357, 1, NULL, 3, 800, NULL, 156383, 9, '2025-03-17', '2025-03-17 04:44:25', '2025-03-17 04:44:25'),
(258, 9, 358, 1, NULL, 12, 5362, NULL, 170343, 9, '2025-03-17', '2025-03-17 04:45:27', '2025-03-17 04:45:27'),
(259, 9, 358, 1, NULL, 12, 5362, NULL, 164981, 9, '2025-03-18', '2025-03-18 04:03:52', '2025-03-18 04:03:52'),
(260, 9, 359, 1, NULL, 3, 1167, NULL, 155216, 9, '2025-03-18', '2025-03-18 04:04:59', '2025-03-18 04:04:59'),
(261, 9, 360, 3, NULL, NULL, 10800, NULL, NULL, 9, '2025-03-18', '2025-03-18 04:05:47', '2025-03-18 04:05:47'),
(262, 9, 361, 1, NULL, 3, 1167, NULL, 154049, 9, '2025-03-18', '2025-03-18 04:06:36', '2025-03-18 04:06:36'),
(263, 9, 362, 1, NULL, 3, 4400, NULL, 149649, 9, '2025-03-18', '2025-03-18 04:06:59', '2025-03-18 04:06:59'),
(264, 9, 363, 1, NULL, 3, 2850, NULL, 146799, 9, '2025-03-18', '2025-03-18 04:07:57', '2025-03-18 04:07:57'),
(265, 9, 364, 1, NULL, 12, 16000, NULL, 148981, 9, '2025-03-18', '2025-03-18 04:08:34', '2025-03-18 04:08:34'),
(266, 9, 365, 3, NULL, NULL, 7700, NULL, NULL, 9, '2025-03-18', '2025-03-18 04:09:17', '2025-03-18 04:09:17'),
(267, 9, 366, 1, NULL, 3, 1300, NULL, 145499, 9, '2025-03-18', '2025-03-18 04:10:07', '2025-03-18 04:10:07'),
(268, 9, 367, 1, NULL, 12, 10573, NULL, 138408, 9, '2025-03-18', '2025-03-18 04:12:00', '2025-03-18 04:12:00'),
(269, 9, 368, 1, NULL, 3, 16642, NULL, 128857, 9, '2025-03-18', '2025-03-18 04:12:57', '2025-03-18 04:12:57'),
(270, 9, 369, 1, NULL, 3, 8300, NULL, 120557, 9, '2025-03-18', '2025-03-18 04:14:17', '2025-03-18 04:14:17'),
(271, 9, 370, 1, NULL, 3, 5532, NULL, 115025, 9, '2025-03-18', '2025-03-18 04:14:50', '2025-03-18 04:14:50'),
(272, 9, 371, 1, NULL, 3, 4415, NULL, 110610, 9, '2025-03-18', '2025-03-18 04:15:25', '2025-03-18 04:15:25'),
(273, 9, 372, 1, NULL, 3, 26000, NULL, 84610, 9, '2025-03-18', '2025-03-18 04:16:28', '2025-03-18 04:16:28'),
(274, 9, 373, 1, NULL, 3, 1167, NULL, 83443, 9, '2025-03-18', '2025-03-18 04:17:37', '2025-03-18 04:17:37'),
(275, 9, 374, 1, NULL, 3, 21500, NULL, 61943, 9, '2025-03-18', '2025-03-18 04:19:45', '2025-03-18 04:19:45'),
(276, 9, 375, 1, NULL, 3, 1167, NULL, 60776, 9, '2025-03-18', '2025-03-18 04:20:14', '2025-03-18 04:20:14'),
(277, 9, 376, 1, NULL, 3, 2200, NULL, 58576, 9, '2025-03-18', '2025-03-18 05:30:47', '2025-03-18 05:30:47'),
(278, 9, 377, 1, NULL, 3, 4000, NULL, 54576, 9, '2025-03-18', '2025-03-18 05:32:25', '2025-03-18 05:32:25'),
(279, 9, 378, 1, NULL, 3, 1230, NULL, 53346, 9, '2025-03-18', '2025-03-18 05:33:04', '2025-03-18 05:33:04'),
(280, 9, 379, 1, NULL, 3, 1995, NULL, 51351, 9, '2025-03-18', '2025-03-18 05:35:34', '2025-03-18 05:35:34'),
(281, 9, 380, 1, NULL, 3, 12700, NULL, 38651, 9, '2025-03-18', '2025-03-18 05:36:31', '2025-03-18 05:36:31'),
(282, 9, 381, 1, NULL, 13, 7400, NULL, 11457, 9, '2025-03-18', '2025-03-18 05:37:03', '2025-03-18 05:37:03'),
(283, 9, 382, 1, NULL, 3, 15500, NULL, 23151, 9, '2025-03-18', '2025-03-18 05:38:15', '2025-03-18 05:38:15'),
(284, 9, 383, 1, NULL, 3, 1937, NULL, 21214, 9, '2025-03-18', '2025-03-18 05:39:18', '2025-03-18 05:39:18'),
(285, 9, 384, 1, NULL, 3, 1167, NULL, 20047, 9, '2025-03-18', '2025-03-18 05:51:34', '2025-03-18 05:51:34'),
(286, 9, 385, 1, NULL, 3, 1665, NULL, 18382, 9, '2025-03-18', '2025-03-18 05:52:46', '2025-03-18 05:52:46'),
(287, 9, 386, 1, NULL, 3, 2600, NULL, 15782, 9, '2025-03-18', '2025-03-18 05:53:11', '2025-03-18 05:53:11'),
(288, 9, 387, 1, NULL, 3, 1950, NULL, 13832, 9, '2025-03-18', '2025-03-18 05:54:12', '2025-03-18 05:54:12'),
(289, 9, 388, 1, NULL, 8, 1950, NULL, 2049, 9, '2025-03-18', '2025-03-18 05:56:26', '2025-03-18 05:56:26'),
(290, 9, 390, 1, NULL, 3, 1167, NULL, 12665, 9, '2025-03-18', '2025-03-18 05:57:05', '2025-03-18 05:57:05'),
(291, 9, 391, 1, NULL, 12, 6650, NULL, 131758, 9, '2025-03-18', '2025-03-18 06:00:42', '2025-03-18 06:00:42'),
(292, 9, 392, 1, NULL, 3, 1650, NULL, 11015, 9, '2025-03-18', '2025-03-18 06:02:11', '2025-03-18 06:02:11'),
(293, 9, 393, 1, NULL, 3, 1167, NULL, 9848, 9, '2025-03-18', '2025-03-18 06:04:10', '2025-03-18 06:04:10'),
(294, 9, 394, 1, NULL, 3, 7400, NULL, 2448, 9, '2025-03-18', '2025-03-18 06:05:18', '2025-03-18 06:05:18'),
(295, 9, 395, 1, NULL, 3, 1866, NULL, 464698, 9, '2025-03-18', '2025-03-18 06:36:51', '2025-03-18 06:36:51'),
(296, 9, 396, 1, NULL, 3, 19300, NULL, 445398, 9, '2025-03-18', '2025-03-18 06:37:42', '2025-03-18 06:37:42'),
(297, 9, 397, 1, NULL, 12, 14000, NULL, 232758, 9, '2025-03-18', '2025-03-18 06:38:48', '2025-03-18 06:38:48'),
(298, 9, 398, 1, NULL, 3, 7500, NULL, 437898, 9, '2025-03-18', '2025-03-18 06:41:01', '2025-03-18 06:41:01'),
(299, 9, 399, 1, NULL, 3, 2500, NULL, 435398, 9, '2025-03-18', '2025-03-18 06:42:06', '2025-03-18 06:42:06'),
(300, 9, 400, 1, NULL, 3, 7000, NULL, 428398, 9, '2025-03-18', '2025-03-18 06:58:32', '2025-03-18 06:58:32'),
(301, 9, 401, 1, NULL, 3, 6300, NULL, 422098, 9, '2025-03-18', '2025-03-18 07:09:12', '2025-03-18 07:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referred_persons`
--

CREATE TABLE `tbl_referred_persons` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_referred_persons`
--

INSERT INTO `tbl_referred_persons` (`id`, `name`, `phone_number`, `createdAt`, `updatedAt`) VALUES
(1, 'Viwajith', '12', NULL, NULL),
(2, 'Aswathy Shinoj', '12', NULL, NULL),
(3, 'Sunny KJ A/C', '8891771605', NULL, NULL),
(4, 'TATA Executive', '9961681926', NULL, NULL),
(5, 'KONTAKT, JETTIN VAZHAKKULAM', '9605801234', NULL, NULL),
(6, 'DR RIJU', '9747323171', NULL, NULL),
(7, 'riyan eon agent', '9961207978', NULL, NULL),
(8, 'jerin rehman', '9895976472', NULL, NULL),
(9, 'aru david', '9744274032', NULL, NULL),
(10, 'vishnu near nirmala college', '9947242226', NULL, NULL),
(11, 'sanath', '9495283039', NULL, NULL),
(12, 'VINEETH CRYSTA', '9946881949', NULL, NULL),
(13, 'SINDHU REDIGO', NULL, NULL, NULL),
(14, 'AUTO TEAM CARS', NULL, NULL, NULL),
(15, 'SIBY MUTHOOT', NULL, NULL, NULL),
(16, 'AJITH ALTO', NULL, NULL, NULL),
(17, 'SONU MAS CARS', NULL, NULL, NULL),
(18, 'SUJATHA', NULL, NULL, NULL),
(19, 'SUJATHA ALTO', NULL, NULL, NULL),
(20, 'RIYAN EON AGENT', NULL, NULL, NULL),
(21, 'PRE OWNED LINK', NULL, NULL, NULL),
(22, 'BLOSSOM', NULL, NULL, NULL),
(23, 'ASHKAR', NULL, NULL, NULL),
(24, 'NASEER THAR', NULL, NULL, NULL),
(25, 'BENNY BUS', NULL, NULL, NULL),
(26, 'AKHIL ANOTY', NULL, NULL, NULL),
(27, 'RATHEESH WORKSHOP ENANALLOOR', NULL, NULL, NULL),
(28, 'BIBIN HDFC', NULL, NULL, NULL),
(29, 'BADUSHA ALTO', NULL, NULL, NULL),
(30, 'VAHID IKKA', NULL, NULL, NULL),
(31, 'NAVAS ULTIMA', NULL, NULL, NULL),
(32, 'BASIL MUTHOOT', NULL, NULL, NULL),
(33, 'REENU PIMIN', NULL, NULL, NULL),
(34, 'ANISHKUMAR VERNA', NULL, NULL, NULL),
(35, 'ATHIRA J K', NULL, NULL, NULL),
(36, 'ASWATHY NATURAL MARBLES', NULL, NULL, NULL),
(37, 'PRATHEESH DRINKING WATER', NULL, NULL, NULL),
(38, 'VIJU P S', NULL, NULL, NULL),
(39, 'BIJU DZIRE', NULL, NULL, NULL),
(40, 'BENNY CONTRACTOR PUTHENCRUZ', '6282920730', NULL, NULL),
(41, 'ANNA NEEMA INNOVA', NULL, NULL, NULL),
(42, 'PMW JOBY', NULL, NULL, NULL),
(43, 'PRATHEESH VIKRAMAN', NULL, NULL, NULL),
(44, 'PRATHEESH DRINKING WATER', NULL, NULL, NULL),
(45, 'JISHMY', NULL, NULL, NULL),
(46, 'BINOY JOSEPH CRETA', NULL, NULL, NULL),
(47, 'ARYA J K', NULL, NULL, NULL),
(48, 'SHYJU KARIMATTOM', NULL, NULL, NULL),
(49, 'VISHNU GALAXY NEAR NIRMALA COLLAGE', NULL, NULL, NULL),
(50, 'VISHNU GALAXY NEAR NIRMALA COLLAGE', NULL, NULL, NULL),
(51, 'BNI DEEPAK', NULL, NULL, NULL),
(52, 'AJITH VAZHAKULAM', NULL, NULL, NULL),
(53, 'ERUMADAM', NULL, NULL, NULL),
(54, 'SURESH FACINO', NULL, NULL, NULL),
(55, 'ANTO UNCLE', NULL, NULL, NULL),
(56, 'AMAL J K', NULL, NULL, NULL),
(57, 'NIKHIL MAGMA SM', NULL, NULL, NULL),
(58, 'DEEPAK LALA LAND', NULL, NULL, NULL),
(59, 'SEBIN K JAMAL SHAN RELATIVE', NULL, NULL, NULL),
(60, 'CARMAX', NULL, NULL, NULL),
(61, 'BASIL HEALTH', NULL, NULL, NULL),
(62, 'MATHEW CD DLX', NULL, NULL, NULL),
(63, 'NONU JITHIN', NULL, NULL, NULL),
(64, 'JISHMY J K', NULL, NULL, NULL),
(65, 'JUNEER JEETO', NULL, NULL, NULL),
(66, 'BASIL HEALTH', NULL, NULL, NULL),
(67, 'SONU HEINZ', NULL, NULL, NULL),
(68, 'ERATTUPETTA AGENT', NULL, NULL, NULL),
(69, 'SUBHASH JAZZ', NULL, NULL, NULL),
(70, 'JUSTIN PULSAR', NULL, NULL, NULL),
(71, 'NEETHU J K EX', NULL, NULL, NULL),
(72, 'MAHESH GOPI', NULL, NULL, NULL),
(73, 'SOPHY I10', NULL, NULL, NULL),
(74, 'DENNIS ERATTAPPILLER', NULL, NULL, NULL),
(75, 'BINIL KERALA CARS', NULL, NULL, NULL),
(76, 'TERRANCE', NULL, NULL, NULL),
(77, 'MAYU', NULL, NULL, NULL),
(78, 'GINU ACCESS', NULL, NULL, NULL),
(79, 'SUBHASH POLICE', NULL, NULL, NULL),
(80, 'SREEJITHA', NULL, NULL, NULL),
(81, 'SREEJITH JCB', NULL, NULL, NULL),
(82, 'EMMANUEL TRADING', NULL, NULL, NULL),
(83, 'BINOY KOCHUMUTTAM CONTRACTOR', NULL, NULL, NULL),
(84, 'VARUN JEEP', NULL, NULL, NULL),
(85, 'GIBI AUTO AYAVANA', NULL, NULL, NULL),
(86, 'SUDHEER SWIFT', NULL, NULL, NULL),
(87, 'DEVANARAYANAN CITY', NULL, NULL, NULL),
(88, 'JEEMON SPLENDOR', NULL, NULL, NULL),
(89, 'SIJU XUV', NULL, NULL, NULL),
(90, 'VINOTH CB SHINE', NULL, NULL, NULL),
(91, 'RAFEEQUE OFF ROAD', '9746707440', NULL, NULL),
(92, 'WAHID IKKA', NULL, NULL, NULL),
(93, 'TINTU ACTIVA', NULL, NULL, NULL),
(94, 'ARUN ELDHO SOLAR', NULL, NULL, NULL),
(95, 'ROBIN DESAM', NULL, NULL, NULL),
(96, 'ROOMS ARUN', NULL, NULL, NULL),
(97, 'JOSE PAUL OROPLACKAL', NULL, NULL, NULL),
(98, 'SUDHAKARAN', NULL, NULL, NULL),
(99, 'DALY J K', NULL, NULL, NULL),
(100, 'SHAHABUDHEEN CITY', NULL, NULL, NULL),
(101, 'JCB NEXON', NULL, NULL, NULL),
(102, 'ARAVIND DUSTER', NULL, NULL, NULL),
(103, 'VISWAJITH J K', NULL, NULL, NULL),
(104, 'MIRSHAD SALIM USED CAR', NULL, NULL, NULL),
(105, 'AYYAPPAN AMAZE', '9995395966', NULL, NULL),
(106, 'AHAMMED FAYIZ', '9995487970', NULL, NULL),
(107, 'DINJO', '9645443637', NULL, NULL),
(108, 'BRO ARUN', '9995054503', NULL, NULL),
(109, 'BOBY KURIAKOSE', '9947971388', NULL, NULL),
(110, 'RAVI SON', '8590335891', NULL, NULL),
(111, 'SREJESH ETIOS', '9946805100', NULL, NULL),
(112, 'SONU HARRIER', '8547041727', NULL, NULL),
(113, 'WROOM ANOOP', NULL, NULL, NULL),
(114, 'PMW X FINANCE', NULL, NULL, NULL),
(115, 'SIMMI MAM', NULL, NULL, NULL),
(116, 'AKHILRAVI DINJO', NULL, NULL, NULL),
(117, 'MAJU THAMPI', NULL, NULL, NULL),
(118, 'SIBY MUTHOOT', NULL, NULL, NULL),
(119, 'NIKKU DEALOR', NULL, NULL, NULL),
(120, 'NAVAS INNOVA', NULL, NULL, NULL),
(121, 'AISWARYA KAIRALY', NULL, NULL, NULL),
(122, 'ASWATHY', NULL, NULL, NULL),
(123, 'RATHEESH NEW INDIA AGENT', NULL, NULL, NULL),
(124, 'NIBIN BABU', NULL, NULL, NULL),
(125, 'CINU SIJU AKSHAYA', '9778202847', NULL, NULL),
(126, 'BRO SALEEM', '9029404272', NULL, NULL),
(127, 'ANTONY CARNIVAL', '9072751222', NULL, NULL),
(128, 'PRE OWNED CARS', '8891472882', NULL, NULL),
(129, 'TERANCE RENJITH KOSHY', '9947415551', NULL, NULL),
(130, 'BNI DILEEP', '8606584427', NULL, NULL),
(131, 'ATHIRA DIO', '8547483428', NULL, NULL),
(132, 'ICICI BIBIN', '9846206032', NULL, NULL),
(133, 'VINCIL BUS', '9142520062', NULL, NULL),
(134, 'CHERIYAN CHETTAN', '9847858998', NULL, NULL),
(135, 'SUNITHA SELTOS C/O SIJURAJ', '9745550924', NULL, NULL),
(136, 'ERUMADOM', '9961714669', NULL, NULL),
(137, 'ALI AKBAR ACTIVA', '7994277287', NULL, NULL),
(138, 'PEZHAKAPALLI SHIYAS FRD DELAR', '9447579332', NULL, NULL),
(139, 'KTC SHIBIN MVPA', '8086950143', NULL, NULL),
(140, 'JISHAD CRYSTA', '9847401771', NULL, NULL),
(141, 'AJMAL I20', '9633179655', NULL, NULL),
(142, 'BNI ANILKUMAR', '9544427910', NULL, NULL),
(143, 'ABHISHEK', '9446474999', NULL, NULL),
(144, 'MG PARTNER BENZ', '9656201804', NULL, NULL),
(145, 'PRAJEESH', '9946184109', NULL, NULL),
(146, 'SCIENTIST', '9400901807', NULL, NULL),
(147, 'SIBI MUTHOOT', '9447105006', NULL, NULL),
(148, 'ROJI ACTIVA', '9539712437', NULL, NULL),
(149, 'AKHIL CITY', '8606774860', NULL, NULL),
(150, 'VASSIM', '8089122100', NULL, NULL),
(151, 'AYYAPPAN AMAZE', NULL, NULL, NULL),
(152, 'MANI BRAND NEW', NULL, NULL, NULL),
(153, 'HARIKRISHNAN CYGNUS', NULL, NULL, NULL),
(154, 'NITHIN CELERIO', '9496986834', NULL, NULL),
(155, 'FATHIMA IDUKKI', '9747005876', NULL, NULL),
(156, 'DINU C/O SONU MAS CARS', NULL, NULL, NULL),
(157, 'VASIM', NULL, NULL, NULL),
(158, 'FAISAL CA', NULL, NULL, NULL),
(159, 'BNI TONY', NULL, NULL, NULL),
(160, 'JEEVAN PEARL EVENTS', NULL, NULL, NULL),
(161, 'JAYADEVAN SCROSS', NULL, NULL, NULL),
(162, 'MANOJ DIO', NULL, NULL, NULL),
(163, 'AKASH VERNA', NULL, NULL, NULL),
(164, 'PRASAD BUS', NULL, NULL, NULL),
(165, 'RITZ CO LINSON', NULL, NULL, NULL),
(166, 'SREJITH POOTHAN FRD THATHUVAMASI', NULL, NULL, NULL),
(167, 'LIJO JK', NULL, NULL, NULL),
(168, 'BNI JOSEPH', NULL, NULL, NULL),
(169, 'INNOVA CLAIM ELDHOSE', NULL, NULL, NULL),
(170, 'IDEAL DATA COM', NULL, NULL, NULL),
(171, 'NIKHIL EON', NULL, NULL, NULL),
(172, 'KKJ', NULL, NULL, NULL),
(173, 'ANANTHU PENINSULAR', NULL, NULL, NULL),
(174, 'NEETHU JK EX', NULL, NULL, NULL),
(175, 'ALAN VAZHAKULAM', NULL, NULL, NULL),
(176, 'SULFIKAR', NULL, NULL, NULL),
(177, 'RAY RAJ', NULL, NULL, NULL),
(178, 'SUBHASH AMAZE', NULL, NULL, NULL),
(179, 'RENJITH PALA', NULL, NULL, NULL),
(180, 'MAJUTHAMPI', NULL, NULL, NULL),
(181, 'AJITH CONTRACTOR', '9447370580', NULL, NULL),
(182, 'SHYJU KAKKANATTU', '7012841746', NULL, NULL),
(183, 'BNI RAFEEK', '9207135825', NULL, NULL),
(184, 'LAKSHMI JK', '9746877560', NULL, NULL),
(185, 'AJITH KUMAR FIRE', '9496322585', NULL, NULL),
(186, 'BINOY POTHAN', '7994631369', NULL, NULL),
(187, 'ANOOP JK', '9811999291', NULL, NULL),
(188, 'HARIS HEALTH', '9447959987', NULL, NULL),
(189, 'SONU PMW', '9605646103', NULL, NULL),
(190, 'MAHIMA SKODA', NULL, NULL, NULL),
(191, 'LIBIN CO NAKAS INSURANCE', NULL, NULL, NULL),
(192, 'JOY PERUMBAVOOR', NULL, NULL, NULL),
(193, 'JOJI C DEVASSY', NULL, NULL, NULL),
(194, 'BIBIN HDFC DSA NEW', NULL, NULL, NULL),
(195, 'ARUN KJ JOSEPH', NULL, NULL, NULL),
(196, 'MIDHUN POWERBOAT', '9400249815', NULL, NULL),
(197, 'KONTAC', NULL, NULL, NULL),
(198, 'VASIM OFFICE', NULL, NULL, NULL),
(199, 'TVM', NULL, NULL, NULL),
(200, 'DIJO', NULL, NULL, NULL),
(201, 'ALEX ACTIVA SUJA', NULL, NULL, NULL),
(202, 'KELVIN PAULSON SON', NULL, NULL, NULL),
(203, 'JOBIN ALLILAKKANNAN', '9961357314', NULL, NULL),
(204, 'MUHAMMED ANICAD', NULL, NULL, NULL),
(205, 'AJEESH AYANA ALTROZ', NULL, NULL, NULL),
(206, 'DIO INSURANCE SHIBU STAFF', NULL, NULL, NULL),
(207, 'AISWARYA KAIRALY FORD', NULL, NULL, NULL),
(208, 'ABY EICHER', NULL, NULL, NULL),
(209, 'ARGUSLAL ASHOK CITY', NULL, NULL, NULL),
(210, 'ANANDU K B', NULL, NULL, NULL),
(211, 'BENNY URBAN JOSEPH BUS', NULL, NULL, NULL),
(212, 'GEEMON KADAMKULAM MEB', NULL, NULL, NULL),
(213, 'JESSIN WAGON R', NULL, NULL, NULL),
(214, 'JESSIN WAGON R', NULL, NULL, NULL),
(215, 'NOBIL P T BEN ASPIRE', NULL, NULL, NULL),
(216, 'ANOOP J K', NULL, NULL, NULL),
(217, 'SAAJITH CRANE', NULL, NULL, NULL),
(218, 'LINSON DEALOR', NULL, NULL, NULL),
(219, 'MUHAMMED INSURANCE', NULL, NULL, NULL),
(220, 'ANTONY AUTO', NULL, NULL, NULL),
(221, 'ANTONY AUTO', NULL, NULL, NULL),
(222, 'BNI ANUJITH', NULL, NULL, NULL),
(223, 'ERUMADAM FRD', NULL, NULL, NULL),
(224, 'MAMMOONJ', NULL, NULL, NULL),
(225, 'BOBY', NULL, NULL, NULL),
(226, 'SHIBYMON IGNIS', NULL, NULL, NULL),
(227, 'AJITH FIESTA', NULL, NULL, NULL),
(228, 'AMAL', NULL, NULL, NULL),
(229, 'JAVAN AUTO MOBILE', NULL, NULL, NULL),
(230, 'HAMSA KALAMPOOR', NULL, NULL, NULL),
(231, 'JOSE SIR AYAVANA', NULL, NULL, NULL),
(232, 'BNI JIJO MATHAI JIPSOM', NULL, NULL, NULL),
(233, 'SHIBU I20', NULL, NULL, NULL),
(234, 'SHEFFINSHA KALLENS', NULL, NULL, NULL),
(235, 'BNI JIJO', NULL, NULL, NULL),
(236, 'JOBIN ALIYAN', NULL, NULL, NULL),
(237, 'KOTTARAM', NULL, NULL, NULL),
(238, 'ZAKARIYA POLY', NULL, NULL, NULL),
(239, 'ABHIJITH THAR', NULL, NULL, NULL),
(240, 'AMINAPLYWOODS', NULL, NULL, NULL),
(241, 'AMINA PLYWOOD', NULL, NULL, NULL),
(242, 'THOMMAN THURUTHEL', NULL, NULL, NULL),
(243, 'ALEX ECOSPORT', NULL, NULL, NULL),
(244, 'AUTO CRAFT', NULL, NULL, NULL),
(245, 'AISWARYA KAIRALI', NULL, NULL, NULL),
(246, 'AKHIL RAVI', NULL, NULL, NULL),
(247, 'REYAN AGENT', NULL, NULL, NULL),
(248, 'YARIS', NULL, NULL, NULL),
(249, 'ANTONY CARNIVALCARS', NULL, NULL, NULL),
(250, 'KN BABU', NULL, NULL, NULL),
(251, 'BNI DEEPAK TAX CONSULTANT', NULL, NULL, NULL),
(252, 'JOBY POTTAKAN', NULL, NULL, NULL),
(253, 'JORDIN PALIATH', NULL, NULL, NULL),
(254, 'VIVEK GEORGE RAJAKAD TVM', NULL, NULL, NULL),
(255, 'RAJAN AUTO', NULL, NULL, NULL),
(256, 'SHIBHU HEALTH', '7736098980', NULL, NULL),
(257, 'PRAVEEN KTC', '9048877233', NULL, NULL),
(258, 'SINAJ EKM', NULL, NULL, NULL),
(259, 'SAJI POTTAKKAN CHETTU', NULL, NULL, NULL),
(260, 'DEEPU NISSAM', NULL, NULL, NULL),
(261, 'AKHIL MUTHOOT', NULL, NULL, NULL),
(262, 'ASWATHY JK', NULL, NULL, NULL),
(263, 'KONTAK', NULL, NULL, NULL),
(264, 'VISHNU GALAXY WIFE', NULL, NULL, NULL),
(265, 'ANUJITH BNI', NULL, NULL, NULL),
(266, 'ANUJITH BNI', NULL, NULL, NULL),
(267, 'BINOD INNOVA', NULL, NULL, NULL),
(268, 'DALY JK P', NULL, NULL, NULL),
(269, 'BABY AMBATTU', NULL, NULL, NULL),
(270, 'VASSIM PBR', NULL, NULL, NULL),
(271, 'AMBY EBIN', NULL, NULL, NULL),
(272, 'VISHNU SHUKKOOR STAFF', NULL, NULL, NULL),
(273, 'SHEMEER WAGANOR', NULL, NULL, NULL),
(274, 'SUMESH C\\O ALAXANDER', NULL, NULL, NULL),
(275, 'LEON ECCOSPORT', NULL, NULL, NULL),
(276, 'JIMMI KIZHAKKEL', NULL, NULL, NULL),
(277, 'JIMMI KIZHAKKEL', NULL, NULL, NULL),
(278, 'JIMMI KIZHAKKEL', NULL, NULL, NULL),
(279, 'MANNA CATERING', NULL, NULL, NULL),
(280, 'MANU JK', NULL, NULL, NULL),
(281, 'ARUN MALAYALAMANORAMA OFF ROAD', '9605829684', NULL, NULL),
(282, 'JERIN RAHMAN ERATTUPEETA', NULL, NULL, NULL),
(283, 'JERIN RAHMAN ERATTUPEETA', NULL, NULL, NULL),
(284, 'SHIJU FOR SOLUTION', NULL, NULL, NULL),
(285, 'BNI MATHAI', NULL, NULL, NULL),
(286, 'MELBIN BULLET', '7012552694', NULL, NULL),
(287, 'SHYJO WRV', '9656002897', NULL, NULL),
(288, 'BIJU MATHEW SPLENDOR', NULL, NULL, NULL),
(289, 'MAHESH ANIYAN', NULL, NULL, NULL),
(290, 'VISHNU JK', NULL, NULL, NULL),
(291, 'DASPAN AYAVANA', NULL, NULL, NULL),
(292, 'JISMY BRIO', NULL, NULL, NULL),
(293, 'REBI MEMBER', NULL, NULL, NULL),
(294, 'ARYA JK', NULL, NULL, NULL),
(295, 'ARYA JK', NULL, NULL, NULL),
(296, 'SOMAN CHETTAN', NULL, NULL, NULL),
(297, 'SURESH FIGO', NULL, NULL, NULL),
(298, 'DEEPAK CARNIVAL CARS', NULL, NULL, NULL),
(299, 'ROHIT CITY', NULL, NULL, NULL),
(300, 'JIJI POOTHAN', NULL, NULL, NULL),
(301, 'BIJU TWO WHEELER WORKSHOP', NULL, NULL, NULL),
(302, 'DR. ANEES ALI', NULL, NULL, NULL),
(303, 'ALISHA AJAY JK', NULL, NULL, NULL),
(304, 'BALAN AUTO ENANALLOOR', NULL, NULL, NULL),
(305, 'ABHIJITH THAR', NULL, NULL, NULL),
(306, 'ANNIES KADAMKULAM', NULL, NULL, NULL),
(307, 'ANTO C/O ANEESH ORIENTAL', NULL, NULL, NULL),
(308, 'ARUN NELLADU', '9188888588', NULL, NULL),
(309, 'PMW JITHIN', '9446868514', NULL, NULL),
(310, 'GIREESH KUMAR PASSION PRO', NULL, NULL, NULL),
(311, 'ELDHOSE HEALTH', '9074782175', NULL, NULL),
(312, 'GEN ABLE HEALTH', '9142302031', NULL, NULL),
(313, 'NEETHU SIS ARYA', '9544754137', NULL, NULL),
(314, 'ELDHOSE BUS INSURANCE', NULL, NULL, NULL),
(315, 'SURESH AYAVANA BULLETT', NULL, NULL, NULL),
(316, 'LAMBAI UNCLE', NULL, NULL, NULL),
(317, 'LINSON DELAR ERNAKULAM CO DINJO', NULL, NULL, NULL),
(318, 'BAIJU PITTAPILLY', NULL, NULL, NULL),
(319, 'NIDHIN C\\O RAHUL MAHINDRA', NULL, NULL, NULL),
(320, 'RAHANA CRETA', NULL, NULL, NULL),
(321, 'SAJI JCB', NULL, NULL, NULL),
(322, 'RAJESHMANU BRO', NULL, NULL, NULL),
(323, 'SHANU ERTIGA', NULL, NULL, NULL),
(324, 'MAHIN DEALOR', NULL, NULL, NULL),
(325, 'SALMON', NULL, NULL, NULL),
(326, 'HANZEER EON', NULL, NULL, NULL),
(327, 'GEORGE FORTUNER', NULL, NULL, NULL),
(328, 'HDFC MUHAMED', NULL, NULL, NULL),
(329, 'JERIN JEETO MINIVAN', NULL, NULL, NULL),
(330, 'GOPAKUMAR SANTRO', NULL, NULL, NULL),
(331, 'KURIAN JOHN', NULL, NULL, NULL),
(332, 'SREEJITHA', NULL, NULL, NULL),
(333, 'DON AUDI', NULL, NULL, NULL),
(334, 'GEORGE VARGHESE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
(13, 'Renew Policy', NULL, NULL),
(14, 'Health', NULL, NULL),
(15, 'Fire & Work Compensation', NULL, NULL),
(16, 'Policy prepare', NULL, NULL),
(17, 'Sales', NULL, NULL),
(18, 'Branch case Dealing', NULL, NULL),
(19, 'Accounts and Card', NULL, NULL),
(20, 'JK Wheels  Sales', NULL, NULL),
(21, 'Accessories', NULL, NULL),
(22, 'Alignment', NULL, NULL),
(23, 'Cooling Film', NULL, NULL),
(24, 'Digital Marketing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `id` int NOT NULL,
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
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`id`, `user_id`, `Join_date`, `birth_date`, `country_id`, `address`, `branch_id`, `dept_id`, `design_id`, `mobile_number`, `created_date`, `added_by`, `profile_image`, `createdAt`, `updatedAt`) VALUES
(1, 2, '2024-06-04', NULL, NULL, NULL, 1, 4, 6, 7034643651, '2025-01-15', 1, 'nil', NULL, NULL),
(2, 3, '2020-12-15', NULL, NULL, NULL, 1, 5, 7, 9567942015, '2025-01-15', 1, 'nil', NULL, NULL),
(3, 4, '2023-10-02', NULL, NULL, NULL, 1, 5, 7, 7306257978, '2025-01-15', 1, 'nil', NULL, NULL),
(4, 5, '2023-10-08', NULL, NULL, NULL, 1, 5, 7, 9072502015, '2025-01-15', 1, 'nil', NULL, NULL),
(5, 6, '2022-01-12', NULL, NULL, NULL, 1, 5, 7, 8137885068, '2025-01-15', 1, 'nil', NULL, NULL),
(6, 7, '2021-12-01', NULL, NULL, NULL, 1, 5, 7, 8606522015, '2025-01-15', 1, 'nil', NULL, NULL),
(7, 8, '2015-01-08', NULL, NULL, NULL, 1, 5, 7, 9072477277, '2025-01-15', 1, 'nil', NULL, NULL),
(8, 9, '2018-09-02', NULL, NULL, NULL, 1, 5, 7, 7736212015, '2025-01-15', 1, 'nil', NULL, NULL),
(10, 11, '2024-11-19', NULL, NULL, NULL, 1, 5, 7, 9847672015, '2025-01-30', 2, 'nil', NULL, NULL),
(11, 12, '2021-11-01', NULL, NULL, NULL, 1, 3, 1, 7356656350, '2025-01-30', 2, NULL, NULL, NULL),
(12, 13, '2018-09-01', NULL, NULL, NULL, 1, 3, 1, 9846477277, '2025-01-30', 2, NULL, NULL, NULL),
(13, 14, '2024-11-07', NULL, NULL, NULL, 1, 6, 7, 8129822015, '2025-03-01', 1, 'nil', NULL, NULL),
(14, 15, '2022-10-01', NULL, NULL, NULL, 1, 6, 9, 8304075120, '2025-03-01', 14, 'nil', NULL, NULL),
(15, 16, '2025-02-01', NULL, NULL, NULL, 1, 5, 6, 9633695228, '2025-03-01', 14, 'nil', NULL, NULL),
(16, 17, '2024-08-19', NULL, NULL, NULL, 1, 6, 11, 9744287144, '2025-03-01', 14, 'nil', NULL, NULL),
(17, 18, '2023-10-25', NULL, NULL, NULL, 1, 6, 9, 9961953511, '2025-03-01', 14, 'nil', NULL, NULL),
(18, 19, '2024-03-01', NULL, NULL, NULL, 1, 6, 8, 9778543508, '2025-03-01', 14, 'nil', NULL, NULL),
(20, 21, '2025-02-05', NULL, NULL, NULL, 1, 6, 10, 8089395096, '2025-03-01', 14, 'nil', NULL, NULL),
(23, 24, '2023-09-10', NULL, NULL, NULL, 1, 6, 8, 9539491684, '2025-03-03', 14, 'nil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `state` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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

CREATE TABLE `tbl_suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_gst` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supplier_contact_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`id`, `supplier_name`, `supplier_gst`, `supplier_address`, `supplier_contact_number`, `created_at`, `updated_at`) VALUES
(1, 'AUTO TEN DISTRIBUTORS', '32ABFFA6863P1ZO', 'DOOR NO/1928A,CIVIL LINE ROAD,PALARIVATTAM,COCHIN-682025', '9846027400', '2025-03-07 15:10:17', '2025-03-07 15:10:17'),
(6, 'AUTO CRFT', '32BIRPR5548A1Z5', 'FIRST FLOOR,40/1023  A2  ,BHASKARVILL PALARIVATTAM  ,COCHIN  682025', '7593852120', '2025-03-07 15:16:39', '2025-03-07 15:16:39'),
(7, 'GANAPATHI MARKETING', '32AAYFG3200G1ZN', 'BULIDING  NO  40/574-A PERE PARAMBU CROSS ROAD  MAMANGALAM ,POTTAKUZHI ROAD,PALARIVATTOM,ERANAKULAM  682025', '7736269311', '2025-03-07 15:26:08', '2025-03-07 15:26:08'),
(8, 'GEORGE & SONS', '32AABFG8902A1Z3', '1ST FLOOR,SULATHANA CHAMBER ,PARAMARA ROAD,EARNAKULAM NORTH ,KOCHI 682018', '4842394693', '2025-03-07 16:07:49', '2025-03-07 16:07:49'),
(9, 'CAGGO STEAM SERVICES PVT.LTD', '32AAHCC9738P1Z0', 'PLOT NO 28 MAVELIPURAM,OPP.SBI,KAKKANAD,KOCHI  682030', '9946999941', '2025-03-07 16:14:19', '2025-03-07 16:14:19'),
(10, 'UNITED AUDIOS', '32ANMPM0231A1ZS', 'TC  31/1534/3, FIRST& SECOUND FLOOR MANNAMOOLA ,PEROORKADA  P.O,TRIVANDRUM', '8138020201', '2025-03-08 09:46:24', '2025-03-08 09:46:24'),
(11, 'AUTO PRO INDIA', '32GRCPB6789J1ZH', '40/1023 A2,  1ST FLOOR,BHASKAR VILLA  POWER HOUSE ROAD ,PALARIVATTAM,KOCHI PIN-682025', '9747576334', '2025-03-08 09:52:48', '2025-03-08 09:52:48'),
(12, 'FOCUS ENTERPRISES', '32AADFF3667M1Z9', '29/943,NEAR WELCARE HOSPITAL SHINE ROAD ,VYITTLLA,COCHIN  -19', '4844041154', '2025-03-08 09:59:14', '2025-03-08 09:59:14'),
(13, 'TRIANGLE  ENTERPRISES', '32AAQFT6994C1ZR', '47/1531,NEAR  CHALIKKAVATTOM JUMA MASJID  VENNALA,ERNAKULAM  682028', '8138010205', '2025-03-08 10:33:14', '2025-03-08 10:33:14'),
(14, 'PLANET  TRADING', '32AWLPA1397B3ZY', 'NEAR KHANS CINEMA ,WEST TO POLICE STATION  ,KARUNAGAPPALLY', '9946092277', '2025-03-08 10:50:09', '2025-03-08 10:50:09'),
(15, 'MARUTHI AUTO SPARES', '32BCBPK3015K1Z2', 'M.C.ROAD,PEZHAKKAPILLY  P . O,  PALLICHIRANGARA  ,MUVATTUPUZHA   686673', '9847464696', '2025-03-08 10:58:40', '2025-03-08 10:58:40'),
(16, 'SHAKTHI AUTO DISTRIBUTORS', '32ABNFS0220J1ZF', 'BEHIND BANDHAN  BANK  BULIDING NUMBER :33/559/A3  CHAKAPPAN  ESTATE  PUKKATTUPADI   ROAD    TOLL GATE  JN,EDAPPALLY ,682024', '7736049720', '2025-03-08 11:12:14', '2025-03-08 11:12:14'),
(17, 'MOTO BIZZ', '32AAUFM1647H1Z4', 'A.K.G.VAYANASALA ROAD, CHAKKARAPARAMBU,ERNAKULAM 682023', '7736210686', '2025-03-08 11:22:14', '2025-03-08 11:22:14'),
(18, 'P.P. MARKETING', '32BDDPS7358Q1ZS', '61/409  A1,  HOWWA MINAR   KARIMPATTA ROAD  PALLIMUKKU,COCHIN  682016', '9745670018', '2025-03-08 11:28:32', '2025-03-08 11:28:32'),
(19, 'S  &  S AUTOMOBILES', '32ACNFS6097C1ZX', 'EAROOR ROAD ,MANAKKAPADI IRUMPANAM,THRIPUNITHURA,COCHIN   682309', '9961329057', '2025-03-08 11:33:19', '2025-03-08 11:33:19'),
(20, 'TYRE SHORE', '32BDVPJ0493F1ZG', 'PVS TRADE  CENTRE NEAR JAN OUSHADI  MEDICALS  CHERPUNKAL  P.O.  PALA,KOTTAYAM', '6238919117', '2025-03-08 11:52:39', '2025-03-08 11:52:39'),
(21, 'S M ENTERPRISES', '32AERFS3296M1Z9', '42/1667B,  S.M.  ENTERPRISES, KANNATTUMANA   ROAD,  VENNALA , ERANAKULAM', '9895939283', '2025-03-08 11:57:33', '2025-03-08 11:57:33'),
(22, 'PITSTOP', '32AJFPM5579A1ZE', 'XV11 389,390,METRO PILLAR  NO-102   THIKKATTUKARA, ALUVA,ERNAKULAM  683106', '9447090665', '2025-03-08 12:02:07', '2025-03-08 12:02:07'),
(23, 'MMK TYRES', '32AEZPI2015N1Z9', 'GROUND FLOOR ,9 WARD 3 NO  ,KODAMULLIL  BUILDING,THEKKUMBHAGOM,NEAR KANIYAMUZHI BRIDGE,THEKKUMBHAGOM,THODUPUZHA', '7012175454', '2025-03-08 13:19:44', '2025-03-08 13:19:44'),
(24, 'TOLINS TYRES LIMITED', '32AACCT1431D1Z3', '1/41, MC  ROAD,MATTOOR,KALADY,ERNAKULAM,KERALA   -683574', '4842462222', '2025-03-08 13:23:20', '2025-03-08 13:23:20'),
(25, 'GLOBAL TYRES', '32ADHPG0017F1ZE', '2/367,  VYTTILA -AROOR BYEPASS  ROAD,KANNADIKKADU,MARADU  P.O.', '8129065555', '2025-03-08 13:28:12', '2025-03-08 13:28:12'),
(26, 'COCHIN WHEELS', '32APBPM5229F1Z9', 'XX/2890-C TEMPLE ROAD KOTTAYAM', '9895022448', '2025-03-08 13:40:19', '2025-03-08 13:40:19'),
(27, 'PVM TYRES [MRF]', '32AKUPA6063D1ZE', 'PVM  PLAZA,KEECHERIPADY,MUVATTUPUZHA', '9847275840', '2025-03-08 13:42:44', '2025-03-08 13:42:44'),
(28, 'PATHICKAL AUTO  STORES', '32ACMPJ5297L1Z3', 'PP ROAD,PERUMBAVOOR   -683542', '9400053802', '2025-03-08 14:29:04', '2025-03-08 14:29:04'),
(29, 'THRIVENI TYRE GARAGE', '32AKRPN7363A1Z5', 'THRIVENI TYRE     ,BYEPASS ROAD  ,MUVATTUPUZHA', '9847112316', '2025-03-08 14:40:12', '2025-03-08 14:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tool_companies`
--

CREATE TABLE `tbl_tool_companies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int NOT NULL,
  `state_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tool_types`
--

CREATE TABLE `tbl_tool_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechicle_categories`
--

CREATE TABLE `tbl_vechicle_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `vechile_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehcilepolicydocuments`
--

CREATE TABLE `tbl_vehcilepolicydocuments` (
  `id` int NOT NULL,
  `policy_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiclepolicy_renews`
--

CREATE TABLE `tbl_vehiclepolicy_renews` (
  `id` int NOT NULL,
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
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_vehiclepolicy_renews`
--

INSERT INTO `tbl_vehiclepolicy_renews` (`id`, `policy_category_id`, `policy_id`, `premium_amount`, `customer_premium`, `valuation_amount`, `total_cost`, `payment_mode_id`, `renew_date`, `expiry_date`, `created_date`, `created_by`, `createdAt`, `updatedAt`) VALUES
(1, 9, 1, 2439, NULL, 0, 2439, 3, '2025-02-14', '2026-02-13', '2025-02-15', 7, NULL, NULL),
(2, 9, 2, 3741, NULL, 0, 3741, 6, '2025-02-14', '2026-02-13', '2025-02-15', 7, NULL, NULL),
(3, 9, 3, 653, NULL, 0, 653, 6, '2025-02-16', '2026-02-15', '2025-02-15', 7, NULL, NULL),
(4, 9, 4, 4511, NULL, 0, 4511, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(5, 9, 5, 4041, NULL, 0, 4041, 6, '2025-02-14', '2026-02-13', '2025-02-15', 7, NULL, NULL),
(6, 9, 6, 3405, NULL, 0, 3405, 6, '2025-02-21', '2026-02-20', '2025-02-15', 7, NULL, NULL),
(7, 9, 7, 4809, NULL, 0, 4809, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(8, 9, 8, 8309, NULL, 0, 8309, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(9, 9, 9, 10000, NULL, 0, 10000, 6, '2025-02-17', '2026-02-16', '2025-02-15', 7, NULL, NULL),
(10, 9, 10, 2855, NULL, 0, 2855, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(11, 9, 11, 9702, NULL, 0, 9702, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(12, 9, 12, 45062, NULL, 0, 45062, 2, '2025-02-17', '2026-02-16', '2025-02-15', 7, NULL, NULL),
(13, 9, 13, 1308, NULL, 0, 1308, 6, '2025-02-20', '2026-02-19', '2025-02-15', 7, NULL, NULL),
(14, 9, 14, 1167, NULL, 0, 1167, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(15, 9, 15, 902, NULL, 0, 902, 6, '2025-02-15', '2026-02-14', '2025-02-15', 7, NULL, NULL),
(16, 9, 16, 2855, NULL, 0, 2855, 6, '2025-02-14', '2026-02-13', '2025-02-15', 7, NULL, NULL),
(17, 9, 17, 17336, NULL, 0, 17336, 6, '2025-02-17', '2026-02-16', '2025-02-15', 7, NULL, NULL),
(18, 9, 18, 5118, NULL, 0, 5118, 6, '2025-02-14', '2026-02-13', '2025-02-15', 7, NULL, NULL),
(19, 9, 19, 7803, NULL, 0, 7803, NULL, '2025-02-14', '2026-02-13', '2025-02-17', 7, NULL, NULL),
(20, 9, 20, 3761, NULL, 0, 3761, 6, '2025-02-27', '2026-02-26', '2025-02-17', 7, NULL, NULL),
(21, 9, 21, 7499, NULL, 0, 7499, 6, '2025-02-14', '2026-02-13', '2025-02-17', 7, NULL, NULL),
(22, 9, 22, 1302, NULL, 0, 1302, 6, '2025-02-15', '2026-02-14', '2025-02-17', 7, NULL, NULL),
(23, 9, 23, 22600, NULL, 0, 22600, 6, '2025-02-16', '2026-02-15', '2025-02-17', 7, NULL, NULL),
(24, 9, 24, 18718, NULL, 0, 18718, 6, '2025-02-20', '2026-02-19', '2025-02-17', 7, NULL, NULL),
(25, 9, 25, 4209, NULL, 0, 4209, 6, '2025-02-15', '2026-02-14', '2025-02-17', 7, NULL, NULL),
(26, 9, 26, 6204, NULL, 0, 6204, 6, '2025-02-15', '2026-02-14', '2025-02-17', 7, NULL, NULL),
(27, 9, 27, 14431, NULL, 0, 14431, 6, '2025-02-16', '2026-02-15', '2025-02-17', 7, NULL, NULL),
(28, 9, 28, 1167, NULL, 0, 1167, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(29, 9, 29, 2925, NULL, 0, 2925, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(30, 9, 30, 14214, NULL, 0, 14214, 6, '2025-02-21', '2026-02-20', '2025-02-18', 7, NULL, NULL),
(31, 9, 31, 6036, NULL, 0, 6036, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(32, 9, 32, 15711, NULL, 0, 15711, 6, '2025-02-19', '2026-02-18', '2025-02-18', 7, NULL, NULL),
(33, 9, 33, 1386, NULL, 0, 1386, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(34, 9, 34, 1167, NULL, 0, 1167, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(35, 9, 35, 1167, NULL, 0, 1167, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(36, 9, 36, 2855, NULL, 0, 2855, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(37, 9, 37, 16000, NULL, 0, 16000, 2, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(38, 9, 38, 5506, NULL, 0, 5506, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(39, 9, 39, 59819, NULL, 0, 59819, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(40, 9, 40, 1349, NULL, 0, 1349, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(41, 9, 41, 1281, NULL, 0, 1281, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(42, 9, 42, 2530, NULL, 0, 2530, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(43, 9, 43, 1457, NULL, 0, 1457, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(44, 9, 44, 10907, NULL, 0, 10907, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(45, 9, 45, 1959, NULL, 0, 1959, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(46, 9, 46, 4415, NULL, 0, 4415, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(47, 9, 47, 5559, NULL, 0, 5559, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(48, 9, 48, 1167, NULL, 0, 1167, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(49, 9, 49, 2804, NULL, 0, 2804, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(50, 9, 50, 1937, NULL, 0, 1937, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(51, 9, 51, 1191, NULL, 0, 1191, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(52, 9, 52, 1191, NULL, 0, 1191, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(53, 9, 53, 1167, NULL, 0, 1167, 6, '2025-02-21', '2026-02-20', '2025-02-18', 7, NULL, NULL),
(54, 9, 54, 22128, NULL, 0, 22128, 6, '2025-02-15', '2026-02-14', '2025-02-18', 7, NULL, NULL),
(55, 9, 55, 7176, NULL, 0, 7176, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(56, 9, 56, 5309, NULL, 0, 5309, 6, '2025-02-23', '2026-02-22', '2025-02-18', 7, NULL, NULL),
(57, 9, 57, 11000, NULL, 0, 11000, 2, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(58, 9, 58, 1167, NULL, 0, 1167, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(59, 9, 59, 2439, NULL, 0, 2439, 6, '2025-02-16', '2026-02-15', '2025-02-18', 7, NULL, NULL),
(60, 9, 60, 24672, NULL, 0, 24672, 6, '2025-02-19', '2026-02-18', '2025-02-18', 7, NULL, NULL),
(61, 9, 61, 7499, NULL, 0, 7499, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(62, 9, 62, 1191, NULL, 0, 1191, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(63, 9, 63, 2439, NULL, 0, 2439, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(64, 9, 64, 4787, NULL, 0, 4787, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(65, 9, 65, 14860, NULL, 0, 14860, 9, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(66, 9, 66, 5813, NULL, 0, 5813, 6, '2025-02-21', '2026-02-20', '2025-02-18', 7, NULL, NULL),
(67, 9, 67, 1167, NULL, 0, 1167, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(68, 9, 68, 6809, NULL, 0, 6809, 2, '2025-02-19', '2026-02-18', '2025-02-18', 7, NULL, NULL),
(69, 9, 69, 1499, NULL, 0, 1499, 6, '2025-02-23', '2026-02-22', '2025-02-18', 7, NULL, NULL),
(70, 9, 70, 1354, NULL, 0, 1354, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(71, 9, 71, 800, NULL, 0, 800, 9, '2025-02-18', '2025-08-07', '2025-02-18', 7, NULL, NULL),
(72, 9, 72, 746, NULL, 0, 746, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(73, 9, 73, 8445, NULL, 0, 8445, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(74, 9, 74, 7458, NULL, 0, 7458, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(75, 9, 75, 28093, NULL, 0, 28093, 6, '2025-02-20', '2026-02-19', '2025-02-18', 7, NULL, NULL),
(76, 9, 76, 6508, NULL, 0, 6508, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(77, 9, 77, 8803, NULL, 0, 8803, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(78, 9, 78, 4469, NULL, 0, 4469, 6, '2025-02-17', '2026-02-16', '2025-02-18', 7, NULL, NULL),
(79, 9, 79, 1167, NULL, 0, 1167, 6, '2025-02-19', '2026-02-18', '2025-02-18', 7, NULL, NULL),
(80, 9, 80, 7478, NULL, 0, 7478, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(81, 9, 81, 1167, NULL, 0, 1167, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(82, 9, 82, 15210, NULL, 0, 15210, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(83, 9, 83, 1453, NULL, 0, 1453, 6, '2025-02-18', '2026-02-17', '2025-02-18', 7, NULL, NULL),
(84, 9, 84, 17345, NULL, 0, 17345, 6, '2025-02-18', '2026-02-17', '2025-02-19', 7, NULL, NULL),
(85, 9, 85, 1167, NULL, 0, 1167, 6, '2025-02-24', '2026-02-23', '2025-02-19', 7, NULL, NULL),
(86, 9, 86, 19604, NULL, 0, 19604, 6, '2025-02-21', '2026-02-20', '2025-02-19', 7, NULL, NULL),
(87, 9, 87, 5510, NULL, 0, 5510, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(88, 9, 88, 6203, NULL, 0, 6203, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(89, 9, 89, 3801, NULL, 0, 3801, 6, '2025-02-26', '2026-02-25', '2025-02-19', 7, NULL, NULL),
(90, 9, 90, 2204, NULL, 0, 2204, 6, '2025-02-23', '2026-02-22', '2025-02-19', 7, NULL, NULL),
(91, 9, 91, 1227, NULL, 0, 1227, 6, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(92, 9, 92, 1167, NULL, 0, 1167, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(93, 9, 93, 10700, NULL, 0, 10700, 2, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(94, 9, 94, 6329, NULL, 0, 6329, 6, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(95, 9, 95, 12591, NULL, 0, 12591, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(96, 9, 96, 8958, NULL, 0, 8958, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(97, 9, 97, 1167, NULL, 0, 1167, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(98, 9, 98, 7499, NULL, 0, 7499, 6, '2025-02-19', '2026-02-18', '2025-02-19', 7, NULL, NULL),
(99, 9, 99, 7413, NULL, 0, 7413, 6, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(100, 9, 100, 4415, NULL, 0, 4415, 6, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(101, 9, 101, 4415, NULL, 0, 4415, 6, '2025-02-20', '2026-02-19', '2025-02-19', 7, NULL, NULL),
(102, 9, 102, 15056, 14600, 0, 15056, 2, '2025-02-26', '2026-02-26', '2025-02-20', 8, NULL, NULL),
(103, 9, 104, 15056, 14600, 0, 15056, 2, '2025-02-26', '2026-02-26', '2025-02-20', 8, NULL, NULL),
(104, 9, 103, 15056, 14600, 0, 15056, 2, '2025-02-26', '2026-02-26', '2025-02-20', 8, NULL, NULL),
(105, 9, 105, 8471, 8471, 0, 8471, 7, '2025-02-20', '2026-02-20', '2025-02-20', 8, NULL, NULL),
(106, 9, 106, 7311, 7300, 0, 7311, 7, '2025-02-20', '2026-02-20', '2025-02-20', 8, NULL, NULL),
(107, 9, 107, 6002, 6000, 0, 6002, 7, '2025-02-20', '2026-02-20', '2025-02-20', 8, NULL, NULL),
(108, 9, 108, 6003, 6000, 0, 6003, 2, '2025-02-20', '2026-02-20', '2025-02-20', 8, NULL, NULL),
(109, 9, 109, 6806, 6800, 0, 6806, 7, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(110, 9, 110, 9702, 9700, 0, 9702, 1, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(111, 9, 111, 1500, 1500, 0, 1500, 1, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(112, 9, 112, 1500, 1500, 0, 1500, 1, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(113, 9, 113, 1503, 1500, 0, 1503, 7, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(114, 9, 114, 45490, 42500, 0, 45490, 7, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(115, 9, 115, 9702, 9700, 0, 9702, 7, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(116, 9, 116, 1167, 1167, 0, 1167, 2, '2025-02-21', '2026-02-21', '2025-02-20', 8, NULL, NULL),
(117, 9, 117, 27914, 27914, 0, 27914, 3, '2025-02-23', '2026-02-23', '2025-02-20', 8, NULL, NULL),
(118, 9, 118, 5058, 5000, 0, 5058, 2, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(119, 9, 119, 6806, 6800, 0, 6806, 2, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(120, 9, 120, 1167, 1167, 0, 1167, 2, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(121, 9, 121, 2483, NULL, 0, 2483, 7, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(122, 9, 122, 854, 850, 0, 854, 2, '2025-02-23', '2026-02-23', '2025-02-21', 8, NULL, NULL),
(123, 9, 123, 7230, 7200, 0, 7230, 7, '2025-02-23', '2026-02-23', '2025-02-21', 8, NULL, NULL),
(124, 9, 124, 8500, 8500, 0, 8500, 7, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(125, 9, 125, 7606, 7600, 0, 7606, 7, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(126, 9, 126, 10005, 10000, 500, 10505, 7, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(127, 9, 127, 4499, 4500, 0, 4499, 2, '2025-02-22', '2026-02-22', '2025-02-21', 8, NULL, NULL),
(128, 9, 128, 7196, 5500, 0, 7196, 2, '2025-02-22', '2026-02-22', '2025-02-22', 8, NULL, NULL),
(129, 9, 129, 6939, 6900, 0, 6939, 2, '2025-02-23', '2026-02-23', '2025-02-22', 8, NULL, NULL),
(130, 9, 130, 4800, 5100, 400, 5200, 9, '2025-02-23', '2026-02-23', '2025-02-22', 8, NULL, NULL),
(131, 9, 131, 1167, 1167, 0, 1167, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(132, 9, 132, 1167, 1167, 0, 1167, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(133, 9, 133, 1167, 1167, 0, 1167, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(134, 9, 134, 6410, 6400, 0, 6410, 2, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(136, 9, 136, 7509, 7500, 0, 7509, 2, '2025-02-28', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(137, 9, 137, 4811, 4800, 0, 4811, 2, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(138, 9, 138, 6704, 6700, 0, 6704, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(139, 9, 139, 6508, 6500, 0, 6508, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(140, 9, 140, 6806, 6800, 0, 6806, 2, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(141, 9, 141, 8820, 8800, 0, 8820, 7, '2025-03-01', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(142, 9, 142, 16902, 16900, 0, 16902, 2, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(143, 9, 143, 8219, 0, 0, 8219, 7, '2025-02-28', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(144, 9, 144, 1353, 1350, 0, 1353, 2, '2025-03-01', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(145, 9, 145, 9702, 9702, 0, 9702, 3, '2025-03-03', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(146, 9, 146, 1167, 1167, 0, 1167, 7, '2025-03-05', '2026-03-04', '2025-03-03', 4, NULL, NULL),
(147, 9, 147, 55600, 55600, 0, 55600, 7, '2025-03-07', '2026-03-06', '2025-03-03', 4, NULL, NULL),
(148, 9, 148, 1402, 1400, 0, 1402, 1, '2025-03-03', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(149, 9, 149, 6505, 6500, 0, 6505, 7, '2025-03-03', '2026-03-02', '2025-03-03', 4, NULL, NULL),
(150, 9, 150, 2855, 2850, 0, 2855, 2, '2025-03-02', '2026-03-01', '2025-03-03', 4, NULL, NULL),
(151, 9, 151, 58008, 0, 0, 58008, 7, '2025-03-02', '2026-03-01', '2025-03-04', 4, NULL, NULL),
(152, 9, 152, 60725, 0, 0, 60725, 7, '2025-03-02', '2026-03-01', '2025-03-04', 4, NULL, NULL),
(153, 9, 153, 24992, 0, 0, 24992, 7, '2025-03-03', '2026-03-02', '2025-03-04', 4, NULL, NULL),
(154, 9, 154, 1167, 1167, 0, 1167, 2, '2025-03-02', '2026-03-01', '2025-03-04', 4, NULL, NULL),
(155, 9, 155, 8001, 0, 0, 8001, 7, '2025-03-03', '2026-03-02', '2025-03-04', 4, NULL, NULL),
(156, 9, 156, 1505, NULL, 0, 1505, 7, '2025-03-05', '2026-03-04', '2025-03-04', 4, NULL, NULL),
(157, 9, 157, 8000, 0, 0, 8000, 7, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(158, 9, 158, 13100, 13100, 0, 13100, 2, '2025-03-08', '2026-03-07', '2025-03-04', 4, NULL, NULL),
(159, 9, 159, 13100, 13100, 0, 13100, 2, '2025-03-08', '2026-03-07', '2025-03-04', 4, NULL, NULL),
(160, 9, 160, 1167, 1167, 0, 1167, 2, '2025-03-03', '2026-03-02', '2025-03-04', 4, NULL, NULL),
(161, 9, 161, 5500, 5500, 0, 5500, 1, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(162, 9, 162, 6750, 6750, 0, 6750, 2, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(163, 9, 163, 5500, 0, 0, 5500, 7, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(164, 9, 164, 5053, 0, 0, 5053, 7, '2025-03-05', '2026-03-04', '2025-03-04', 4, NULL, NULL),
(165, 9, 165, 1937, 0, 0, 1937, 7, '2025-03-08', '2026-03-07', '2025-03-04', 4, NULL, NULL),
(166, 9, 166, 12800, 12800, 0, 12800, 2, '2025-03-07', '2026-03-06', '2025-03-04', 4, NULL, NULL),
(167, 9, 167, 11438, 0, 0, 11438, 7, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(168, 9, 168, 1167, 1167, 0, 1167, 2, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(169, 9, 169, 6300, 6300, 0, 6300, 2, '2025-03-14', '2026-03-13', '2025-03-04', 4, NULL, NULL),
(170, 9, 170, 4850, 0, 0, 4850, 7, '2025-03-19', '2026-03-18', '2025-03-04', 4, NULL, NULL),
(171, 9, 171, 4200, 0, 0, 4200, 7, '2025-03-04', '2026-03-03', '2025-03-04', 4, NULL, NULL),
(172, 9, 172, 8000, 8000, 0, 8000, 2, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(173, 9, 173, 1167, 1167, 0, 1167, 1, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(174, 9, 174, 5800, 0, 0, 5800, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(175, 9, 175, 17645, 0, 0, 17645, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(176, 9, 176, 7600, 7600, 0, 7600, 3, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(177, 9, 177, 6000, 0, 0, 6000, 7, '2025-03-03', '2026-03-02', '2025-03-05', 4, NULL, NULL),
(178, 9, 178, 1300, 0, 0, 1300, 7, '2025-03-18', '2026-03-17', '2025-03-05', 4, NULL, NULL),
(179, 9, 179, 7500, 7500, 0, 7500, 2, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(180, 9, 180, 900, 0, 0, 900, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(181, 9, 181, 1450, 1450, 0, 1450, 2, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(182, 9, 182, 6400, 0, 0, 6400, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(183, 9, 183, 5800, 5800, 0, 5800, 2, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(184, 9, 184, 7000, 7000, 0, 7000, 2, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(185, 9, 185, 1167, 0, 0, 1167, 2, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(186, 9, 186, 5500, 0, 0, 5500, 3, '2025-03-11', '2026-03-10', '2025-03-05', 4, NULL, NULL),
(187, 9, 187, 800, 0, 0, 800, 7, '2025-03-07', '2026-03-06', '2025-03-05', 4, NULL, NULL),
(188, 9, 188, 10800, 10800, 0, 10800, 2, '2025-03-17', '2026-03-16', '2025-03-05', 4, NULL, NULL),
(189, 9, 189, 4400, 4400, 0, 4400, 2, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(190, 9, 190, 5300, 0, 0, 5300, 7, '2025-03-07', '2026-03-06', '2025-03-05', 4, NULL, NULL),
(191, 9, 191, 6000, 6000, 0, 6000, 2, '2025-03-06', '2026-03-05', '2025-03-05', 4, NULL, NULL),
(192, 9, 192, 15000, 0, 0, 15000, 7, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(193, 9, 193, 21800, 0, 0, 21800, 3, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(194, 9, 194, 1167, 1167, 0, 1167, 2, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(195, 9, 195, 11600, 0, 0, 11600, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(196, 9, 196, 14500, 14500, 0, 14500, 2, '2025-03-05', '2026-03-04', '2025-03-05', 4, NULL, NULL),
(197, 9, 197, 18800, 0, 0, 18800, 7, '2025-03-04', '2026-03-03', '2025-03-05', 4, NULL, NULL),
(198, 9, 198, 1450, 1450, 0, 1450, 2, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(199, 9, 199, 1167, 1167, 0, 1167, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(200, 9, 200, 1000, 0, 0, 1000, 1, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(201, 9, 201, 1937, 0, 0, 1937, 7, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(202, 9, 202, 1167, 1167, 0, 1167, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(203, 9, 203, 1167, 1167, 0, 1167, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(204, 9, 204, 1450, 1450, 0, 1450, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(205, 9, 205, 4250, 4250, 0, 4250, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(206, 9, 206, 5250, 0, 0, 5250, 7, '2025-03-04', '2026-03-03', '2025-03-06', 4, NULL, NULL),
(207, 9, 207, 7300, 0, 0, 7300, 7, '2025-03-09', '2026-03-08', '2025-03-06', 4, NULL, NULL),
(208, 9, 208, 2400, 0, 0, 2400, 7, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(209, 9, 209, 1167, 0, 0, 1167, 7, '2025-03-12', '2026-03-11', '2025-03-06', 4, NULL, NULL),
(210, 9, 210, 1167, 0, 0, 1167, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(211, 9, 211, 900, 0, 0, 900, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(212, 9, 212, 89600, 89600, 0, 89600, 4, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(213, 9, 213, 8100, 8100, 0, 8100, 2, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(214, 9, 214, 1167, 1167, 0, 1167, 1, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(215, 9, 215, 11300, 11300, 0, 11300, 3, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(216, 9, 216, 17000, 0, 0, 17000, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(217, 9, 217, 13000, 0, 0, 13000, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(218, 9, 218, 5300, 5300, 0, 5300, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(219, 9, 219, 19000, 19000, 0, 19000, 2, '2025-03-09', '2026-03-08', '2025-03-06', 4, NULL, NULL),
(220, 9, 220, 6500, 6500, 0, 6500, 2, '2025-03-05', '2026-03-04', '2025-03-06', 4, NULL, NULL),
(221, 9, 221, 1167, 0, 0, 1167, 7, '2025-03-07', '2026-03-06', '2025-03-06', 4, NULL, NULL),
(222, 9, 222, 5719, 5719, 0, 5719, 4, '2025-03-07', '2026-03-06', '2025-03-06', 4, NULL, NULL),
(223, 9, 223, 2850, 2850, 0, 2850, 2, '2025-03-10', '2026-03-09', '2025-03-06', 4, NULL, NULL),
(224, 9, 224, 900, 900, 0, 900, 2, '2025-03-08', '2026-03-07', '2025-03-06', 4, NULL, NULL),
(225, 9, 225, 900, 0, 0, 900, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(226, 9, 226, 6008, 6008, 0, 6008, 3, '2025-05-07', '2026-05-06', '2025-03-06', 4, NULL, NULL),
(227, 9, 227, 1167, 0, 0, 1167, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(228, 9, 228, 2850, 0, 0, 2850, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(229, 9, 229, 7600, 0, 0, 7600, 7, '2025-03-07', '2026-03-06', '2025-03-06', 4, NULL, NULL),
(230, 9, 230, 8500, 0, 0, 8500, 7, '2025-03-06', '2026-03-05', '2025-03-06', 4, NULL, NULL),
(231, 9, 231, 11800, 0, 0, 11800, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(232, 9, 232, 8300, 0, 0, 8300, 7, '2025-03-08', '2026-03-07', '2025-03-07', 4, NULL, NULL),
(233, 9, 233, 6000, 6000, 0, 6000, 3, '2025-03-10', '2026-03-09', '2025-03-07', 4, NULL, NULL),
(234, 9, 234, 6800, 6800, 0, 6800, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(235, 9, 235, 13500, 13500, 0, 13500, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(236, 9, 236, 7500, 7500, 0, 7500, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(237, 9, 237, 1167, 1167, 0, 1167, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(238, 9, 238, 9700, 9700, 0, 9700, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(239, 9, 239, 1167, 1167, 0, 1167, 2, '2025-03-08', '2026-03-07', '2025-03-07', 4, NULL, NULL),
(240, 9, 240, 5000, 5000, 0, 5000, 1, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(241, 9, 241, 1937, 1937, 0, 1937, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(242, 9, 242, 8500, 8500, 0, 8500, 2, '2025-03-06', '2026-03-05', '2025-03-07', 4, NULL, NULL),
(243, 9, 243, 6200, 6200, 0, 6200, 3, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(244, 9, 244, 1167, 0, 0, 1167, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(245, 9, 245, 946, 946, 0, 946, 2, '2025-03-06', '2026-03-05', '2025-03-07', 4, NULL, NULL),
(246, 9, 246, 6300, 0, 0, 6300, 7, '2025-03-06', '2026-03-05', '2025-03-07', 4, NULL, NULL),
(247, 9, 247, 7800, 0, 0, 7800, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(248, 9, 248, 4400, 0, 0, 4400, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(249, 9, 249, 41914, 0, 0, 41914, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(250, 9, 250, 5500, 0, 0, 5500, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(251, 9, 251, 6839, 6600, 0, 6839, 2, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(252, 9, 252, 1167, 0, 0, 1167, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(253, 9, 253, 66132, NULL, 0, 66132, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(254, 9, 254, 9702, 0, 0, 9702, 7, '2025-03-07', '2026-03-06', '2025-03-07', 4, NULL, NULL),
(255, 9, 255, 5400, 0, 0, 5400, 7, '2025-03-11', '2026-03-10', '2025-03-08', 4, NULL, NULL),
(256, 9, 256, 5205, 5200, 0, 5205, 2, '2025-03-07', '2026-03-06', '2025-03-08', 4, NULL, NULL),
(257, 9, 257, 7490, 7400, 0, 7490, 2, '2025-03-06', '2026-03-05', '2025-03-08', 4, NULL, NULL),
(258, 9, 258, 20899, 0, 0, 20899, 7, '2025-03-14', '2026-03-13', '2025-03-08', 4, NULL, NULL),
(259, 9, 259, 10012, 0, 0, 10012, 3, '2025-03-07', '2026-03-06', '2025-03-08', 4, NULL, NULL),
(260, 9, 260, 6519, 6500, 0, 6519, 2, '2025-03-07', '2026-03-06', '2025-03-08', 4, NULL, NULL),
(261, 9, 261, 2850, 2850, 0, 2850, 2, '2025-03-07', '2026-03-06', '2025-03-08', 4, NULL, NULL),
(262, 9, 262, 1167, 1167, 0, 1167, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(263, 9, 263, 1167, 1167, 0, 1167, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(264, 9, 264, 6300, 0, 0, 6300, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(265, 9, 265, 1167, 1167, 0, 1167, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(266, 9, 266, 5900, 5900, 0, 5900, 9, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(267, 9, 267, 4400, 4400, 0, 4400, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(268, 9, 268, 5089, 0, 0, 5089, 3, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(269, 9, 269, 12155, 12155, 0, 12155, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(270, 9, 270, 5900, 5900, 0, 5900, 9, '2025-03-15', '2026-03-14', '2025-03-08', 4, NULL, NULL),
(271, 9, 271, 3100, 3100, 500, 3600, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(272, 9, 272, 4400, 4400, 0, 4400, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(273, 9, 273, 1167, 0, 0, 1167, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(274, 9, 274, 1400, 0, 0, 1400, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(275, 9, 275, 1937, 0, 0, 1937, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(276, 9, 276, 1400, 0, 0, 1400, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(277, 9, 277, 1600, 0, 0, 1600, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(278, 9, 278, 5500, 5500, 0, 5500, 2, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(279, 9, 279, 9200, 0, 0, 9200, 9, '2025-03-09', '2026-03-08', '2025-03-08', 4, NULL, NULL),
(280, 9, 280, 69230, 0, 0, 69230, 7, '2025-03-08', '2026-03-07', '2025-03-08', 4, NULL, NULL),
(281, 9, 281, 1455, 0, 0, 1455, 7, '2025-03-09', '2026-03-08', '2025-03-08', 4, NULL, NULL),
(282, 9, 282, 1355, 0, 0, 1355, 7, '2025-03-09', '2026-03-08', '2025-03-08', 4, NULL, NULL),
(283, 9, 283, 19601, 19601, 0, 19601, 4, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(284, 9, 284, 2855, 0, 0, 2855, 7, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(285, 9, 285, 24337, 22000, 0, 24337, 2, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(286, 9, 286, 850, 850, 0, 850, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(287, 9, 287, 1167, 1167, 0, 1167, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(288, 9, 288, 19500, 0, 0, 19500, 7, '2025-03-09', '2026-03-10', '2025-03-10', 4, NULL, NULL),
(289, 9, 289, 18624, 0, 0, 18624, 7, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(290, 9, 290, 22650, 22650, 0, 22650, 4, '2025-03-13', '2026-03-12', '2025-03-10', 4, NULL, NULL),
(291, 9, 291, 6400, 6400, 0, 6400, 2, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(292, 9, 292, 1930, 1930, 0, 1930, 2, '2025-03-08', '2026-03-07', '2025-03-10', 4, NULL, NULL),
(293, 9, 293, 6400, 0, 0, 6400, 7, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(294, 9, 294, 4600, 4600, 0, 4600, 2, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(295, 9, 295, 4900, 4900, 0, 4900, 3, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(296, 9, 296, 6600, 6600, 0, 6600, 2, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(297, 9, 297, 4400, 4400, 0, 4400, 2, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(298, 9, 298, 15600, 15600, 0, 15600, 3, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(299, 9, 299, 4400, 0, 0, 4400, 7, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(300, 9, 300, 1167, 1167, 0, 1167, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(301, 9, 301, 11300, 0, 0, 11300, 7, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(302, 9, 302, 12000, 12000, 0, 12000, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(303, 9, 303, 900, 900, 0, 900, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(304, 9, 304, 14000, 0, 0, 14000, 7, '2025-03-16', '2026-03-15', '2025-03-10', 4, NULL, NULL),
(305, 9, 305, 1250, 0, 0, 1250, 7, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(306, 9, 306, 78000, 0, 0, 78000, 7, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(307, 9, 307, 78000, 0, 0, 78000, 7, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(308, 9, 308, 4150, 4150, 0, 4150, 2, '2025-03-10', '2026-03-09', '2025-03-10', 4, NULL, NULL),
(309, 9, 309, 5500, NULL, 0, 5500, 7, '2025-03-09', '2026-03-08', '2025-03-10', 4, NULL, NULL),
(310, 9, 310, 10500, 0, 0, 10500, 7, '2025-03-11', '2026-03-10', '2025-03-10', 4, NULL, NULL),
(311, 9, 311, 63000, NULL, 0, 63000, 6, '2025-03-17', '2026-03-16', '2025-03-12', 7, NULL, NULL),
(312, 9, 312, 21500, 21500, 0, 21500, 6, '2025-03-16', '2026-03-15', '2025-03-12', 7, NULL, NULL),
(313, 9, 313, 19900, 0, 0, 19900, 7, '2025-03-13', '2026-03-12', '2025-03-13', 4, NULL, NULL),
(314, 9, 314, 9700, 9700, 0, 9700, 2, '2025-03-10', '2026-03-09', '2025-03-13', 4, NULL, NULL),
(315, 9, 315, 1167, 0, 0, 1167, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(316, 9, 316, 12600, 12600, 0, 12600, 9, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(317, 9, 317, 4400, 4400, 0, 4400, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(318, 9, 318, 5000, 4000, 0, 5000, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(319, 9, 319, 66000, 0, 0, 66000, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(320, 9, 320, 5000, 0, 0, 5000, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(321, 9, 321, 5800, 0, 0, 5800, 7, '2025-03-10', '2026-03-09', '2025-03-13', 4, NULL, NULL),
(322, 9, 322, 4400, 0, 0, 4400, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(323, 9, 323, 12500, 0, 0, 12500, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(324, 9, 324, 1167, 0, 0, 1167, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(325, 9, 325, 1950, 0, 0, 1950, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(326, 9, 326, 7300, 7300, 0, 7300, NULL, '2025-03-16', '2026-03-15', '2025-03-13', 4, NULL, NULL),
(327, 9, 327, 14300, 14300, 0, 14300, 3, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(328, 9, 328, 5500, 0, 0, 5500, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(329, 9, 329, 6600, 6600, 0, 6600, 3, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(330, 9, 330, 6000, 3000, 400, 6400, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(331, 9, 331, 2399, 2399, 0, 2399, 3, '2025-03-14', '2026-03-13', '2025-03-13', 4, NULL, NULL),
(332, 9, 332, 7000, 7000, 0, 7000, 1, '2025-03-13', '2026-03-12', '2025-03-13', 4, NULL, NULL),
(333, 9, 333, 5900, 5900, 0, 5900, 2, '2025-03-14', '2026-03-13', '2025-03-13', 4, NULL, NULL),
(334, 9, 334, 1227, 0, 0, 1227, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(335, 9, 335, 3600, 3600, 0, 3600, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(336, 9, 336, 2850, 2500, 0, 2850, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(337, 9, 337, 1191, 0, 0, 1191, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(338, 9, 338, 1167, 0, 0, 1167, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(339, 9, 339, 6773, 6770, 0, 6773, 3, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(340, 9, 340, 1350, 1350, 0, 1350, 2, '2025-03-18', '2026-03-17', '2025-03-13', 4, NULL, NULL),
(341, 9, 341, 7499, 7500, 0, 7499, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(342, 9, 342, 1937, 1950, 0, 1937, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(343, 9, 343, 34000, 34000, 0, 34000, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(344, 9, 344, 1167, 1167, 0, 1167, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(345, 9, 345, 5835, 5800, 0, 5835, 3, '2025-03-22', '2026-03-21', '2025-03-13', 4, NULL, NULL),
(346, 9, 346, 6939, 6900, 400, 7339, 7, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(347, 9, 347, 6624, 6600, 0, 6624, 2, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(348, 9, 348, 15109, 0, 0, 15109, 7, '2025-03-11', '2026-03-10', '2025-03-13', 4, NULL, NULL),
(349, 9, 349, 2850, 0, 0, 2850, 7, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(350, 9, 350, 1167, 0, 0, 1167, 7, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(351, 9, 351, 1167, 1167, 0, 1167, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(352, 9, 352, 2850, 2850, 0, 2850, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(353, 9, 353, 1167, 0, 0, 1167, 7, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(354, 9, 354, 1504, 0, 0, 1504, 7, '2025-03-13', '2026-03-12', '2025-03-13', 4, NULL, NULL),
(355, 9, 355, 3401, 3400, 0, 3401, 2, '2025-03-18', '2026-03-17', '2025-03-13', 4, NULL, NULL),
(356, 9, 356, 1670, 1650, 0, 1670, 2, '2025-03-12', '2026-03-11', '2025-03-13', 4, NULL, NULL),
(357, 9, 357, 800, 800, 0, 800, 7, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(358, 9, 358, 5362, 5350, 0, 5362, 2, '2025-03-11', '2026-03-10', '2025-03-14', 4, NULL, NULL),
(359, 9, 359, 1167, NULL, 0, 1167, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(360, 9, 360, 10800, 10800, 0, 10800, 12, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(361, 9, 361, 1167, 0, 0, 1167, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(362, 9, 362, 4400, 0, 0, 4400, 7, '2025-03-12', '2026-03-11', '2025-03-14', 4, NULL, NULL),
(363, 9, 363, 2850, 0, 0, 2850, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(364, 9, 364, 16000, 16000, 0, 16000, 2, '2025-03-12', '2026-03-11', '2025-03-14', 4, NULL, NULL),
(365, 9, 365, 7700, 7700, 0, 7700, 3, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(366, 9, 366, 1300, 1300, 0, 1300, 2, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(367, 9, 367, 10573, 0, 0, 10573, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(368, 9, 368, 16642, 16642, 0, 16642, 3, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(369, 9, 369, 8300, 0, 0, 8300, 7, '2025-03-13', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(370, 9, 370, 5532, 0, 0, 5532, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(371, 9, 371, 4415, 0, 0, 4415, 7, '2025-03-12', '2026-03-11', '2025-03-14', 4, NULL, NULL),
(372, 9, 372, 26000, 10300, 0, 26000, 9, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(373, 9, 373, 1167, 0, 0, 1167, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(374, 9, 374, 21500, 0, 0, 21500, 7, '2025-03-24', '2026-03-23', '2025-03-14', 4, NULL, NULL),
(375, 9, 375, 1167, 0, 0, 1167, 7, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(376, 9, 376, 2200, 0, 0, 2200, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(377, 9, 377, 4000, 0, 0, 4000, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(378, 9, 378, 1230, 1230, 0, 1230, 2, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(379, 9, 379, 1995, 1995, 0, 1995, 2, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(380, 9, 380, 12700, 0, 0, 12700, 7, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(381, 9, 381, 7400, 0, 0, 7400, 7, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(382, 9, 382, 15500, 0, 0, 15500, 7, '2025-03-18', '2026-03-17', '2025-03-14', 4, NULL, NULL),
(383, 9, 383, 1937, 1937, 0, 1937, 2, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(384, 9, 384, 1167, 1167, 0, 1167, 2, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(385, 9, 385, 1665, 0, 0, 1665, 7, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(386, 9, 386, 2600, NULL, 0, 2600, 2, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(387, 9, 387, 1950, 1950, 0, 1950, 2, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(388, 9, 388, 1950, 0, 0, 1950, 7, '2025-03-13', '2026-03-12', '2025-03-14', 4, NULL, NULL),
(390, 9, 390, 1167, 0, 0, 1167, 2, '2025-03-14', '2026-03-13', '2025-03-14', 4, NULL, NULL),
(391, 9, 391, 6650, 6650, 0, 6650, 2, '2025-03-14', '2026-03-13', '2025-03-15', 4, NULL, NULL),
(392, 9, 392, 1650, 0, 0, 1650, 7, '2025-03-15', '2026-03-14', '2025-03-15', 4, NULL, NULL),
(393, 9, 393, 1167, 1167, 0, 1167, 7, '2025-03-14', '2026-03-13', '2025-03-15', 4, NULL, NULL),
(394, 9, 394, 7400, 7400, 0, 7400, 2, '2025-03-13', '2026-03-12', '2025-03-15', 4, NULL, NULL),
(395, 9, 395, 1866, 1866, 0, 1866, 2, '2025-03-16', '2026-03-15', '2025-03-15', 4, NULL, NULL),
(396, 9, 396, 19300, 0, 0, 19300, 7, '2025-03-21', '2026-03-20', '2025-03-15', 4, NULL, NULL),
(397, 9, 397, 14000, 14000, 0, 14000, 3, '2025-03-13', '2026-03-12', '2025-03-15', 4, NULL, NULL),
(398, 9, 398, 7500, 0, 0, 7500, 7, '2025-03-13', '2026-03-12', '2025-03-15', 4, NULL, NULL),
(399, 9, 399, 2500, 0, 0, 2500, 2, '2025-03-15', '2026-03-14', '2025-03-17', 4, NULL, NULL),
(400, 9, 400, 7000, 0, 0, 7000, 7, '2025-03-14', '2026-03-13', '2025-03-17', 4, NULL, NULL),
(401, 9, 401, 6300, 0, 0, 6300, 7, '2025-03-14', '2026-03-13', '2025-03-17', 4, NULL, NULL),
(402, 9, 402, 11500, 11500, 0, 11500, 2, '2025-03-15', '2026-03-14', '2025-03-17', 4, NULL, NULL),
(403, 9, 403, 6800, 0, 0, 6800, 7, '2025-03-14', '2026-03-13', '2025-03-17', 4, NULL, NULL),
(404, 9, 404, 2850, 2850, 0, 2850, 2, '2025-03-13', '2026-03-12', '2025-03-17', 4, NULL, NULL),
(405, 9, 405, 36000, 36000, 0, 36000, 12, '2025-03-15', '2026-03-14', '2025-03-17', 4, NULL, NULL),
(406, 9, 406, 5630, 0, 0, 5630, 7, '2025-03-15', '2026-03-14', '2025-03-17', 4, NULL, NULL),
(407, 9, 407, 3200, 3200, 0, 3200, 2, '2025-03-16', '2026-03-15', '2025-03-17', 4, NULL, NULL),
(408, 9, 408, 6000, 0, 0, 6000, 7, '2025-03-17', '2026-03-16', '2025-03-17', 4, NULL, NULL),
(409, 9, 409, 9700, 0, 0, 9700, 7, '2025-03-16', '2026-03-15', '2025-03-17', 4, NULL, NULL),
(410, 9, 410, 1167, 0, 0, 1167, 7, '2025-03-17', '2026-03-16', '2025-03-17', 4, NULL, NULL),
(411, 9, 411, 6850, 6850, 0, 6850, 3, '2025-03-15', '2026-03-14', '2025-03-17', 4, NULL, NULL),
(412, 9, 412, 7500, 7500, 0, 7500, 3, '2025-03-24', '2026-03-23', '2025-03-17', 4, NULL, NULL),
(413, 9, 413, 37500, 37500, 0, 37500, 2, '2025-03-13', '2026-03-12', '2025-03-17', 4, NULL, NULL),
(414, 9, 414, 1167, 0, 0, 1167, 7, '2025-03-18', '2026-03-17', '2025-03-17', 4, NULL, NULL),
(415, 9, 415, 4000, 0, 0, 4000, 7, '2025-03-18', '2026-03-17', '2025-03-17', 4, NULL, NULL),
(416, 9, 416, 490, 490, 0, 490, 2, '2025-03-18', '2026-03-17', '2025-03-17', 4, NULL, NULL),
(417, 9, 417, 13500, 0, 0, 13500, 7, '2025-03-16', '2026-03-15', '2025-03-17', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_brands`
--

CREATE TABLE `tbl_vehicle_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `tbl_vehicle_creations` (
  `id` bigint UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_insurances`
--

CREATE TABLE `tbl_vehicle_insurances` (
  `id` bigint UNSIGNED NOT NULL,
  `vehicle_number_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `insurance_company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_models`
--

CREATE TABLE `tbl_vehicle_models` (
  `id` bigint UNSIGNED NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vehicle_models`
--

INSERT INTO `tbl_vehicle_models` (`id`, `model`, `created_at`, `updated_at`) VALUES
(1, 'DATSUN', '2025-02-15 09:17:29', '2025-02-15 09:17:29'),
(2, 'DATSUN REDI GO', '2025-02-15 09:18:02', '2025-02-15 09:18:02'),
(3, 'HYUNDAI I10', '2025-02-15 11:44:01', '2025-02-15 11:44:01'),
(4, 'HONDA DIO', '2025-02-15 11:46:33', '2025-02-15 11:46:33'),
(5, 'MARUTI ALTO K10', '2025-02-15 11:49:03', '2025-02-15 11:49:03'),
(6, 'RENAULT KWID', '2025-02-15 11:51:25', '2025-02-15 11:51:25'),
(7, 'MARUTI ALTO', '2025-02-15 11:54:12', '2025-02-15 11:54:12'),
(8, 'MARUTI CELERIO', '2025-02-15 11:57:25', '2025-02-15 11:57:25'),
(9, 'MARUTI WAGON R', '2025-02-15 11:59:39', '2025-02-15 11:59:39'),
(10, 'TOYOTA GLANZA', '2025-02-15 12:02:24', '2025-02-15 12:02:24'),
(11, 'MAHINDRA THAR', '2025-02-15 12:09:30', '2025-02-15 12:09:30'),
(12, 'TATA 18500', '2025-02-15 12:15:01', '2025-02-15 12:15:01'),
(13, 'YAMAHA CYGNUS ALPHA', '2025-02-15 12:20:30', '2025-02-15 12:20:30'),
(14, 'BAJAJ DISCOVER', '2025-02-15 12:22:44', '2025-02-15 12:22:44'),
(15, 'BADUSHA ALTO', '2025-02-15 12:25:33', '2025-02-15 12:25:33'),
(16, 'TOYOTA LAND CRUISER', '2025-02-15 12:27:26', '2025-02-15 12:27:26'),
(17, 'NISSAN MAGNITE', '2025-02-15 12:29:48', '2025-02-15 12:29:48'),
(18, 'HYUNDAI I20', '2025-02-17 16:27:19', '2025-02-17 16:27:19'),
(19, 'SKODA RAPID', '2025-02-17 16:30:07', '2025-02-17 16:30:07'),
(20, 'HONDA CITY', '2025-02-17 16:32:15', '2025-02-17 16:32:15'),
(21, 'HONDA ACTIVA', '2025-02-17 16:34:25', '2025-02-17 16:34:25'),
(22, 'ASHOK LEYLAND DOST', '2025-02-17 16:36:56', '2025-02-17 16:36:56'),
(23, 'MAHINDRA SUPRO', '2025-02-17 16:39:53', '2025-02-17 16:39:53'),
(24, 'SWIFT DZIRE', '2025-02-17 16:45:30', '2025-02-17 16:45:30'),
(25, 'ANNA NEEMA INNOVA', '2025-02-17 16:52:59', '2025-02-17 16:52:59'),
(26, 'INNOVA CRYSTA', '2025-02-17 16:53:50', '2025-02-17 16:53:50'),
(27, 'AUTO', '2025-02-18 09:52:02', '2025-02-18 09:52:02'),
(28, 'HYUNDAI CRETA', '2025-02-18 13:30:33', '2025-02-18 13:30:33'),
(29, 'HONDA UNICORN', '2025-02-18 13:35:49', '2025-02-18 13:35:49'),
(30, 'HERO HONDA CD100', '2025-02-18 13:41:37', '2025-02-18 13:41:37'),
(31, 'SCHOOL BUS', '2025-02-18 13:49:14', '2025-02-18 13:49:14'),
(32, 'ETIOS LIVA', '2025-02-18 13:53:31', '2025-02-18 13:53:31'),
(33, 'ASHOKE LEYLAND LORRY', '2025-02-18 14:00:01', '2025-02-18 14:00:01'),
(34, 'YAMAHA FACINO', '2025-02-18 14:04:22', '2025-02-18 14:04:22'),
(35, 'MARUTI 800', '2025-02-18 14:15:26', '2025-02-18 14:15:26'),
(36, 'TATA ALTROZ', '2025-02-18 14:23:12', '2025-02-18 14:23:12'),
(37, 'BULLET', '2025-02-18 14:27:14', '2025-02-18 14:27:14'),
(38, 'MARUTI SWIFT', '2025-02-18 14:34:58', '2025-02-18 14:34:58'),
(39, 'HERO HONDA CD DLX', '2025-02-18 14:40:34', '2025-02-18 14:40:34'),
(40, 'TVS WEGO', '2025-02-18 15:04:59', '2025-02-18 15:04:59'),
(41, 'BMW', '2025-02-18 15:07:21', '2025-02-18 15:07:21'),
(42, 'HONDA JAZZ', '2025-02-18 15:12:59', '2025-02-18 15:12:59'),
(43, 'MAHINDRA JEETO', '2025-02-18 15:15:27', '2025-02-18 15:15:27'),
(44, 'CHEVROLET BEAT', '2025-02-18 15:25:56', '2025-02-18 15:25:56'),
(45, 'TOYOTA URBAN CRUISER HYRYDER', '2025-02-18 15:28:29', '2025-02-18 15:28:29'),
(46, 'MARUTI IGNIS', '2025-02-18 15:39:14', '2025-02-18 15:39:14'),
(47, 'SUZUKI ACCESS', '2025-02-18 15:48:00', '2025-02-18 15:48:00'),
(48, 'TVS JUPITER', '2025-02-18 15:53:17', '2025-02-18 15:53:17'),
(49, 'JCB', '2025-02-18 15:55:36', '2025-02-18 15:55:36'),
(50, 'TVS NTORQ', '2025-02-18 15:58:32', '2025-02-18 15:58:32'),
(51, 'TATA TIAGO', '2025-02-18 16:15:46', '2025-02-18 16:15:46'),
(52, 'MAHINDRA ALFA', '2025-02-18 16:18:57', '2025-02-18 16:18:57'),
(53, 'BENZ', '2025-02-18 16:20:39', '2025-02-18 16:20:39'),
(54, 'SPLENDOR', '2025-02-18 16:28:44', '2025-02-18 16:28:44'),
(55, 'MAHINDRA XUV 3OO', '2025-02-18 16:35:06', '2025-02-18 16:35:06'),
(56, 'CB SHINE', '2025-02-18 16:37:01', '2025-02-18 16:37:01'),
(57, 'TATA NEXON', '2025-02-19 12:17:23', '2025-02-19 12:17:23'),
(58, 'FORD ECOSPORT', '2025-02-19 12:21:22', '2025-02-19 12:21:22'),
(59, 'PASSION PRO', '2025-02-19 12:32:07', '2025-02-19 12:32:07'),
(60, 'GLAMOUR', '2025-02-19 12:34:41', '2025-02-19 12:34:41'),
(61, 'TATA ACE', '2025-02-19 12:36:45', '2025-02-19 12:36:45'),
(62, 'HERO PLEASURE', '2025-02-19 12:53:41', '2025-02-19 12:53:41'),
(63, 'RENAULT DUSTER', '2025-02-19 12:58:21', '2025-02-19 12:58:21'),
(64, 'TATA INDICA VISTA', '2025-02-19 12:59:57', '2025-02-19 12:59:57'),
(65, 'FORD FIESTA', '2025-02-19 13:01:50', '2025-02-19 13:01:50'),
(66, 'HONDA AMAZE', '2025-02-20 16:02:21', '2025-02-20 16:02:21'),
(67, 'HONDA AMAZE', '2025-02-20 16:02:21', '2025-02-20 16:02:21'),
(68, 'SKODA SLAVIA', '2025-02-20 16:25:45', '2025-02-20 16:25:45'),
(69, 'MARUTI CIAZ', '2025-02-20 16:28:06', '2025-02-20 16:28:06'),
(70, 'HYUNDAI XCENT', '2025-02-20 16:34:06', '2025-02-20 16:34:06'),
(71, 'HONDA CIVIC', '2025-02-20 16:52:16', '2025-02-20 16:52:16'),
(72, 'MERCEDES BENZ', '2025-02-20 17:20:37', '2025-02-20 17:20:37'),
(73, 'MAHINDRA XYLO', '2025-02-20 17:29:15', '2025-02-20 17:29:15'),
(74, 'PASSION PLUS', '2025-02-20 17:33:07', '2025-02-20 17:33:07'),
(75, 'MAHINDRA XUV700', '2025-02-20 17:41:46', '2025-02-20 17:41:46'),
(76, 'MARUTI RITZ', '2025-02-21 15:57:39', '2025-02-21 15:57:39'),
(77, 'HERO HONDA SPLENDER', '2025-02-21 16:01:17', '2025-02-21 16:01:17'),
(78, 'NEO', '2025-02-21 16:03:41', '2025-02-21 16:03:41'),
(79, 'N TORQUE', '2025-02-21 16:06:29', '2025-02-21 16:06:29'),
(80, 'FORD FIGO', '2025-02-21 17:20:53', '2025-02-21 17:20:53'),
(81, 'PIAGGIO AUTO', '2025-02-22 14:58:02', '2025-02-22 14:58:02'),
(82, 'MICRA ACTIVE', '2025-03-03 12:08:43', '2025-03-03 12:08:43'),
(83, 'ETIOS', '2025-03-03 13:06:57', '2025-03-03 13:06:57'),
(84, 'DISCOVER', '2025-03-03 15:26:07', '2025-03-03 15:26:07'),
(85, 'BUS', '2025-03-03 15:30:28', '2025-03-03 15:30:28'),
(86, 'SELTOS', '2025-03-03 15:42:49', '2025-03-03 15:42:49'),
(87, 'BHARATH BENZ', '2025-03-04 09:55:27', '2025-03-04 09:55:27'),
(88, 'TIPPER', '2025-03-04 10:01:30', '2025-03-04 10:01:30'),
(89, 'VITARA BREZZA', '2025-03-04 10:17:32', '2025-03-04 10:17:32'),
(90, 'XUV 500', '2025-03-04 16:05:25', '2025-03-04 16:05:25'),
(91, 'FASCINO', '2025-03-04 16:11:16', '2025-03-04 16:11:16'),
(92, 'EECO', '2025-03-04 16:30:09', '2025-03-04 16:30:09'),
(93, 'HORNET', '2025-03-04 16:43:00', '2025-03-04 16:43:00'),
(94, 'RAPID', '2025-03-04 16:55:16', '2025-03-04 16:55:16'),
(95, 'INDICA', '2025-03-04 17:13:17', '2025-03-04 17:13:17'),
(96, 'ERTIGA', '2025-03-05 10:48:21', '2025-03-05 10:48:21'),
(97, 'PULSE', '2025-03-05 11:33:04', '2025-03-05 11:33:04'),
(98, 'BALENO', '2025-03-05 11:40:21', '2025-03-05 11:40:21'),
(99, 'SUNNY', '2025-03-05 11:52:43', '2025-03-05 11:52:43'),
(100, 'CYGNUS ALPHA', '2025-03-05 12:16:10', '2025-03-05 12:16:10'),
(101, 'VENTO', '2025-03-05 13:02:47', '2025-03-05 13:02:47'),
(102, 'GRAND I10', '2025-03-05 14:19:16', '2025-03-05 14:19:16'),
(103, 'HECTOR', '2025-03-05 14:24:47', '2025-03-05 14:24:47'),
(104, 'INNOVA', '2025-03-05 16:02:09', '2025-03-05 16:02:09'),
(105, 'BOLERO MAXI TRUCK', '2025-03-05 16:22:23', '2025-03-05 16:22:23'),
(106, 'Avenger', '2025-03-06 10:31:45', '2025-03-06 10:31:45'),
(107, 'CBZ', '2025-03-06 10:34:59', '2025-03-06 10:34:59'),
(108, 'EON', '2025-03-06 10:56:33', '2025-03-06 10:56:33'),
(109, 'TUV 300', '2025-03-06 11:01:56', '2025-03-06 11:01:56'),
(110, 'YZF-R-15', '2025-03-06 11:13:36', '2025-03-06 11:13:36'),
(111, 'BOLERO', '2025-03-06 11:31:39', '2025-03-06 11:31:39'),
(112, 'RAY', '2025-03-06 12:00:50', '2025-03-06 12:00:50'),
(113, 'SFC', '2025-03-06 12:09:52', '2025-03-06 12:09:52'),
(114, 'SCORPIO', '2025-03-06 12:16:01', '2025-03-06 12:16:01'),
(115, 'KODIAQ', '2025-03-06 14:44:02', '2025-03-06 14:44:02'),
(116, 'POLO', '2025-03-06 15:00:24', '2025-03-06 15:00:24'),
(117, 'MARUTHI 800', '2025-03-06 15:04:43', '2025-03-06 15:04:43'),
(118, 'PASSION', '2025-03-06 15:08:43', '2025-03-06 15:08:43'),
(119, 'AVIATOR', '2025-03-06 15:29:57', '2025-03-06 15:29:57'),
(120, 'MAXXIMO', '2025-03-06 15:36:35', '2025-03-06 15:36:35'),
(121, 'MAXXIMO MINI VAN', '2025-03-06 15:37:02', '2025-03-06 15:37:02'),
(122, 'JETTA', '2025-03-07 10:43:29', '2025-03-07 10:43:29'),
(123, 'MICRA', '2025-03-07 10:48:49', '2025-03-07 10:48:49'),
(124, 'VERNA', '2025-03-07 11:02:02', '2025-03-07 11:02:02'),
(125, 'ALEX ACTIVA SUJA', '2025-03-07 11:18:50', '2025-03-07 11:18:50'),
(126, 'JEEP', '2025-03-07 11:24:18', '2025-03-07 11:24:18'),
(127, 'CLASSIC 350', '2025-03-07 12:26:55', '2025-03-07 12:26:55'),
(128, 'MAESTRO', '2025-03-07 14:13:24', '2025-03-07 14:13:24'),
(129, 'S-PRESSO', '2025-03-07 15:12:22', '2025-03-07 15:12:22'),
(130, 'LEYLAND', '2025-03-07 15:56:49', '2025-03-07 15:56:49'),
(131, 'APE', '2025-03-07 16:00:51', '2025-03-07 16:00:51'),
(132, 'FIGO ASPIRE', '2025-03-08 09:34:52', '2025-03-08 09:34:52'),
(133, 'TAIGUN', '2025-03-08 09:40:16', '2025-03-08 09:40:16'),
(134, 'SAAJITH CRANE', '2025-03-08 09:53:06', '2025-03-08 09:53:06'),
(135, 'PULSAR 150', '2025-03-08 12:02:15', '2025-03-08 12:02:15'),
(136, 'ACCENT', '2025-03-08 13:39:36', '2025-03-08 13:39:36'),
(137, 'PULSAR', '2025-03-08 13:50:59', '2025-03-08 13:50:59'),
(138, 'APACHE', '2025-03-08 13:58:57', '2025-03-08 13:58:57'),
(139, 'EICHER', '2025-03-10 11:00:08', '2025-03-10 11:00:08'),
(140, 'PICKUP', '2025-03-10 11:12:11', '2025-03-10 11:12:11'),
(141, 'BULLET 500', '2025-03-10 15:52:49', '2025-03-10 15:52:49'),
(142, 'FORTUNER', '2025-03-12 11:58:49', '2025-03-12 11:58:49'),
(143, 'ROYAL ENFIELD HIMALAYAN', '2025-03-12 12:09:36', '2025-03-12 12:09:36'),
(144, 'MARUTHI TOUR M', '2025-03-13 10:09:48', '2025-03-13 10:09:48'),
(145, 'HARRIER', '2025-03-13 10:45:25', '2025-03-13 10:45:25'),
(146, 'ANUJITH BNI', '2025-03-13 11:00:44', '2025-03-13 11:00:44'),
(147, 'FZ', '2025-03-13 13:20:03', '2025-03-13 13:20:03'),
(148, 'GOODS', '2025-03-13 13:25:52', '2025-03-13 13:25:52'),
(149, 'MARUTHI OMINI', '2025-03-13 14:12:24', '2025-03-13 14:12:24'),
(150, 'RX135', '2025-03-13 14:18:14', '2025-03-13 14:18:14'),
(151, 'BRIO', '2025-03-13 15:50:26', '2025-03-13 15:50:26'),
(152, 'BAJAJ CT 100', '2025-03-14 09:04:57', '2025-03-14 09:04:57'),
(153, 'CHEVROLET SAIL', '2025-03-14 09:11:22', '2025-03-14 09:11:22'),
(154, 'NISSAN KICKS', '2025-03-14 10:15:33', '2025-03-14 10:15:33'),
(155, 'MARAZZO', '2025-03-14 11:41:50', '2025-03-14 11:41:50'),
(156, 'ROYAL ENFIELD SIGNALS', '2025-03-14 14:31:08', '2025-03-14 14:31:08'),
(157, 'ROYAL ENFIELD THUNDER BIRD', '2025-03-14 14:35:52', '2025-03-14 14:35:52'),
(158, 'OLA', '2025-03-15 13:49:16', '2025-03-15 13:49:16'),
(159, 'URBAN CRUISER HYRYDER', '2025-03-15 14:05:55', '2025-03-15 14:05:55'),
(160, 'TATA PUNCH', '2025-03-17 14:27:55', '2025-03-17 14:27:55'),
(161, 'ALTO 800', '2025-03-17 14:35:02', '2025-03-17 14:35:02'),
(162, 'SANTRO', '2025-03-17 15:37:16', '2025-03-17 15:37:16'),
(163, 'AUDI', '2025-03-17 15:57:39', '2025-03-17 15:57:39'),
(164, 'LOAD KING PRIDE', '2025-03-17 16:17:36', '2025-03-17 16:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_pollutions`
--

CREATE TABLE `tbl_vehicle_pollutions` (
  `id` bigint UNSIGNED NOT NULL,
  `vehicle_number_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_repairs`
--

CREATE TABLE `tbl_vehicle_repairs` (
  `id` bigint UNSIGNED NOT NULL,
  `vehicle_number_id` int NOT NULL,
  `staff_user_id` int NOT NULL,
  `complaint_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repair_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','In Progress','Completed','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_types`
--

CREATE TABLE `tbl_vehicle_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `remember_token`, `role_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$12$GMJUv2IjqPVLyi1r5YXzpuGDHERxUBY0YMzCb1IvwI/UL.sppHds.', 'GDyU7g4Dfwsa6hcR4aReNoydbLhLmOfzUW15lBGiVvZcCnbf2BGz5Zw7Goyb', 1, '2024-07-17 23:51:55', '2024-07-17 23:51:55'),
(2, 'Bibin sivan', 'Bibin jk', 'jkgroupacctmvpa@gmail.com', '$2y$12$gh/GLiBbsZLEgjrpW1QGZ.NIVjuRl.vd.QAB9Mieg.dGv.s0AvikO', NULL, 17, NULL, NULL),
(3, 'Aswathy shinoj', 'Aswathy jk', 'jkhealthmvpa@gmail.com', '$2y$12$DhrCwnKK5wT0biab3GDesuHD.Yfdp/PDsg7SJTvjKPCMLTt5mwPta', NULL, 14, NULL, NULL),
(4, 'Nandhu Mohanan', 'Underwriter', 'tenisongoop007@gmail.com', '$2y$12$hBNNacdvGoZpNIUF4vt9OemryX.o0Zqkl3sImr9O2R8pIWS1Mkn.C', NULL, 10, NULL, NULL),
(5, 'Arya Robin', 'Arya jk', 'jkinsurancemvpa@gmail.com', '$2y$12$mFJWghUHxsBUHrUGoc7THuBBHoKid2yFJEL4sI5Ekh8diqApvIvtG', NULL, 8, NULL, NULL),
(6, 'Viswajith Rajan', 'viswajithjk22', 'jacksonaliyas25@gmail.com', '$2y$12$U3AhBFivu6eCPca6r7mFJe6206HyLnZ8FcCgUt2gYD4QirWjYEAaK', NULL, 10, NULL, NULL),
(7, 'AMAL SASI', 'EndorcemenT', 'alinsurance777@gmail.com', '$2y$12$qn1/arp43f1gNxrOTvmnFexBMGHcrfMDPuNycJX/ufMlre.eEvaEu', NULL, 18, NULL, NULL),
(8, 'Divya kurian', 'Divya @jk', 'jkconsultancy15@gmail.com', '$2y$12$7TnkGEMPwuzqkFEj5lvbW.qRQvvFYwWUYG4RaILdlxpqiws973j2m', 'jgg5xPpRD0TXox4ZgfyIdWemNili53FurOZOqsHNasjU9SMpz6a6Wr77Ei7w', 12, NULL, NULL),
(9, 'Jishmi P George', 'Jishmy@Jk', 'jishmyjomy1979@gmail.com', '$2y$12$0ZvwgLSnlDfnHwWn.wYUS.tZ1U2EO1cvRwg2TiNL3NJXxJLaODn/O', 'c5cdMe96io93n0jSncja5eersjnIooHSZqyzFKb1SXwwIoFZ8YgdiQREYEGl', 19, NULL, NULL),
(11, 'NEETHU', 'NEETHU@123', 'neethukv111@gmail.com', '$2y$12$U.d9FOeGYKeOC3x1KQtrP.MMnJobq5ZjdnH0TH9fGX3Imk6CWmKNq', NULL, 13, NULL, NULL),
(12, 'LIJO', 'lijojoy.vad', 'lijojoy.vad@gmail.com', '$2y$12$g/eP9F7Inn2HdPE6EX4GW.bE8xU0CxnNcU2oM7YW.FXagEpiu8zBu', NULL, 1, NULL, NULL),
(13, 'JEEVAN', 'jeevan@', 'jeevanjohn1983@gmail.com', '$2y$12$yf3aAHnkKbI5/1STmY8m7.3IpcZzmJXZQu.kG9DYA2nCDpRo3iWum', NULL, 1, NULL, NULL),
(14, 'NeethuJoby', 'neethu@jk', 'jkwheels@gmail.com', '$2y$12$2TMk2Cco7xwlwxmOGhjnTeH4Jx7Je.SDoh5hAUdBBC.oVpMPNLY.S', NULL, 20, NULL, NULL),
(15, 'manumani', 'manu@jk', 'manumaniappu@gmail.com', '$2y$12$ZVcAvS57EXdW8kwZZYK.UuUxKyHKxA/JzOGmV.0jDqPI32PkCJXiK', NULL, 21, NULL, NULL),
(16, 'jijimolphilip', 'jmp', 'jijimolphilip@gmil.com', '$2y$12$dN6zTyo2GD8XBA.gFDwrkulJ6bE6mrpdOV8sBwzCW.1jQcrA0ADPu', NULL, 17, NULL, NULL),
(17, 'akashaji', 'akashjk', 'akashaji850@gmail.com', '$2y$12$qJJp9roI/88nDHRyWKw7jejC2.6XI1P/nJw9ZfSRFmdze0goK5eGW', NULL, 24, NULL, NULL),
(18, 'sumeshms', 'sumesh@jk', 'sumeshms007@gmail.com', '$2y$12$TUBH5P0sdSIBCo/QF1Wth.3lttbYzkAP4pwYxLjzWpGm.v23JR0cC', NULL, 21, NULL, NULL),
(19, 'gokulsuresh', 'gokul@jk', 'sureshgopika27@gmail.com', '$2y$12$s60UZDwdsOVtoilKXeNiB.jI.fuq1m9XNTgeT.BSlk.64BxiEde42', NULL, 22, NULL, NULL),
(21, 'anibabu', 'silverstream', 'animoncaroptics@gmail.com', '$2y$12$sWLtaiReDF3D/i/RmDTEtOItQUwUhxxENNioFco9WOiDlbrHqd912', NULL, 23, NULL, NULL),
(24, 'akhilpmanoj', 'akhilpm', 'akhilpmanoj7@gmail.com', '$2y$12$2AY.UDWh8xaqZ6yVOpJQyewd.orxou.mIylu1XyI8ukV9U2a9TSf2', NULL, 22, NULL, NULL);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_business_categories`
--
ALTER TABLE `tbl_business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Indexes for table `tbl_coverage_types`
--
ALTER TABLE `tbl_coverage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_creditcard_payments`
--
ALTER TABLE `tbl_creditcard_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_credit_repayments`
--
ALTER TABLE `tbl_credit_repayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dealers`
--
ALTER TABLE `tbl_dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `tbl_designations`
--
ALTER TABLE `tbl_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_district_countrys` (`country_id`),
  ADD KEY `fk_district_states` (`state_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_expenses_type_id_foreign` (`type_id`),
  ADD KEY `tbl_expenses_created_by_foreign` (`created_by`);

--
-- Indexes for table `tbl_expense_types`
--
ALTER TABLE `tbl_expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_healthpolicies`
--
ALTER TABLE `tbl_healthpolicies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_healthpolicymembers`
--
ALTER TABLE `tbl_healthpolicymembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_healthpolicy_docucments`
--
ALTER TABLE `tbl_healthpolicy_docucments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_healthpolicy_renews`
--
ALTER TABLE `tbl_healthpolicy_renews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_insurence_providers`
--
ALTER TABLE `tbl_insurence_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_insurence_providers_created_by_foreign` (`created_by`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_batches`
--
ALTER TABLE `tbl_jw_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_categories`
--
ALTER TABLE `tbl_jw_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_hsncodes`
--
ALTER TABLE `tbl_jw_hsncodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_livestocks`
--
ALTER TABLE `tbl_jw_livestocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_openingstocks`
--
ALTER TABLE `tbl_jw_openingstocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_purchases`
--
ALTER TABLE `tbl_jw_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_purchasetypes`
--
ALTER TABLE `tbl_jw_purchasetypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_jw_purchasetypes_name_unique` (`name`);

--
-- Indexes for table `tbl_jw_purchase_trans`
--
ALTER TABLE `tbl_jw_purchase_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_sales`
--
ALTER TABLE `tbl_jw_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_saletypes`
--
ALTER TABLE `tbl_jw_saletypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_jw_saletypes_name_unique` (`name`);

--
-- Indexes for table `tbl_jw_sale_trans`
--
ALTER TABLE `tbl_jw_sale_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_servicecodes`
--
ALTER TABLE `tbl_jw_servicecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_stocktypes`
--
ALTER TABLE `tbl_jw_stocktypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_jw_stocktypes_stock_type_unique` (`stock_type`);

--
-- Indexes for table `tbl_jw_subcategories`
--
ALTER TABLE `tbl_jw_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jw_units`
--
ALTER TABLE `tbl_jw_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lead_added_user` (`added_by`);

--
-- Indexes for table `tbl_leadsources`
--
ALTER TABLE `tbl_leadsources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead_followups`
--
ALTER TABLE `tbl_lead_followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_followup_lead` (`lead_id`) USING BTREE;

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_loans_created_by_foreign` (`created_by`);

--
-- Indexes for table `tbl_loantypes`
--
ALTER TABLE `tbl_loantypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_multi_expenses`
--
ALTER TABLE `tbl_multi_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otherpolicy_documents`
--
ALTER TABLE `tbl_otherpolicy_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_policies`
--
ALTER TABLE `tbl_other_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_policy_renews`
--
ALTER TABLE `tbl_other_policy_renews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_mode` (`payment_mode_id`),
  ADD KEY `fk_payment_added_user` (`added_by`);

--
-- Indexes for table `tbl_payment_modes`
--
ALTER TABLE `tbl_payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_policyholders`
--
ALTER TABLE `tbl_policyholders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_excecutive_user` (`executive_id`),
  ADD KEY `fk_policy_agent` (`agent_id`),
  ADD KEY `fk_policy_dealer` (`dealer_id`),
  ADD KEY `fk_policy_company` (`company_id`),
  ADD KEY `fk_policy_paymentmode` (`payment_mode_id`),
  ADD KEY `fk_policy_assigned_user` (`assigned_userid`);

--
-- Indexes for table `tbl_policy_categories`
--
ALTER TABLE `tbl_policy_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_preparepolicies`
--
ALTER TABLE `tbl_preparepolicies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preparepolicy` (`policy_id`),
  ADD KEY `fk_prepare_created_user` (`created_by`);

--
-- Indexes for table `tbl_prooftypes`
--
ALTER TABLE `tbl_prooftypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_cards`
--
ALTER TABLE `tbl_purchase_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_referred_persons`
--
ALTER TABLE `tbl_referred_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_staff_user` (`user_id`),
  ADD KEY `fk_staff_branch` (`branch_id`),
  ADD KEY `fk_staff_country` (`country_id`),
  ADD KEY `fk_staff_designation` (`design_id`),
  ADD KEY `fk_staff_department` (`dept_id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_state_country` (`country_id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tool_companies`
--
ALTER TABLE `tbl_tool_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tool_types`
--
ALTER TABLE `tbl_tool_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vechicle_categories`
--
ALTER TABLE `tbl_vechicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehcilepolicydocuments`
--
ALTER TABLE `tbl_vehcilepolicydocuments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_policydoc_policy` (`policy_id`),
  ADD KEY `fk_policydoc_added_user` (`added_by`);

--
-- Indexes for table `tbl_vehiclepolicy_renews`
--
ALTER TABLE `tbl_vehiclepolicy_renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_renew_policyholder` (`policy_id`),
  ADD KEY `fk_renew_created_user` (`created_by`),
  ADD KEY `fk_renew_paymode` (`payment_mode_id`);

--
-- Indexes for table `tbl_vehicle_brands`
--
ALTER TABLE `tbl_vehicle_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_creations`
--
ALTER TABLE `tbl_vehicle_creations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_insurances`
--
ALTER TABLE `tbl_vehicle_insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_models`
--
ALTER TABLE `tbl_vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_pollutions`
--
ALTER TABLE `tbl_vehicle_pollutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_repairs`
--
ALTER TABLE `tbl_vehicle_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_business_categories`
--
ALTER TABLE `tbl_business_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_coverage_types`
--
ALTER TABLE `tbl_coverage_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_creditcard_payments`
--
ALTER TABLE `tbl_creditcard_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_credit_repayments`
--
ALTER TABLE `tbl_credit_repayments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dealers`
--
ALTER TABLE `tbl_dealers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_designations`
--
ALTER TABLE `tbl_designations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_expense_types`
--
ALTER TABLE `tbl_expense_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_healthpolicies`
--
ALTER TABLE `tbl_healthpolicies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_healthpolicymembers`
--
ALTER TABLE `tbl_healthpolicymembers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_healthpolicy_docucments`
--
ALTER TABLE `tbl_healthpolicy_docucments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_healthpolicy_renews`
--
ALTER TABLE `tbl_healthpolicy_renews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_insurence_providers`
--
ALTER TABLE `tbl_insurence_providers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_batches`
--
ALTER TABLE `tbl_jw_batches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_categories`
--
ALTER TABLE `tbl_jw_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jw_hsncodes`
--
ALTER TABLE `tbl_jw_hsncodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jw_livestocks`
--
ALTER TABLE `tbl_jw_livestocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_openingstocks`
--
ALTER TABLE `tbl_jw_openingstocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_purchases`
--
ALTER TABLE `tbl_jw_purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_purchasetypes`
--
ALTER TABLE `tbl_jw_purchasetypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_purchase_trans`
--
ALTER TABLE `tbl_jw_purchase_trans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_sales`
--
ALTER TABLE `tbl_jw_sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_saletypes`
--
ALTER TABLE `tbl_jw_saletypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_sale_trans`
--
ALTER TABLE `tbl_jw_sale_trans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_servicecodes`
--
ALTER TABLE `tbl_jw_servicecodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jw_stocktypes`
--
ALTER TABLE `tbl_jw_stocktypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jw_subcategories`
--
ALTER TABLE `tbl_jw_subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_jw_units`
--
ALTER TABLE `tbl_jw_units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadsources`
--
ALTER TABLE `tbl_leadsources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_lead_followups`
--
ALTER TABLE `tbl_lead_followups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loantypes`
--
ALTER TABLE `tbl_loantypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_multi_expenses`
--
ALTER TABLE `tbl_multi_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otherpolicy_documents`
--
ALTER TABLE `tbl_otherpolicy_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_other_policies`
--
ALTER TABLE `tbl_other_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_other_policy_renews`
--
ALTER TABLE `tbl_other_policy_renews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `tbl_payment_modes`
--
ALTER TABLE `tbl_payment_modes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_policyholders`
--
ALTER TABLE `tbl_policyholders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `tbl_policy_categories`
--
ALTER TABLE `tbl_policy_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_preparepolicies`
--
ALTER TABLE `tbl_preparepolicies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prooftypes`
--
ALTER TABLE `tbl_prooftypes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_purchase_cards`
--
ALTER TABLE `tbl_purchase_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `tbl_referred_persons`
--
ALTER TABLE `tbl_referred_persons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_tool_companies`
--
ALTER TABLE `tbl_tool_companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tool_types`
--
ALTER TABLE `tbl_tool_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vechicle_categories`
--
ALTER TABLE `tbl_vechicle_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehcilepolicydocuments`
--
ALTER TABLE `tbl_vehcilepolicydocuments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehiclepolicy_renews`
--
ALTER TABLE `tbl_vehiclepolicy_renews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `tbl_vehicle_brands`
--
ALTER TABLE `tbl_vehicle_brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_vehicle_creations`
--
ALTER TABLE `tbl_vehicle_creations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_insurances`
--
ALTER TABLE `tbl_vehicle_insurances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_models`
--
ALTER TABLE `tbl_vehicle_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_vehicle_pollutions`
--
ALTER TABLE `tbl_vehicle_pollutions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_repairs`
--
ALTER TABLE `tbl_vehicle_repairs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `fk_prepare_created_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_preparepolicy` FOREIGN KEY (`policy_id`) REFERENCES `tbl_policyholders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
