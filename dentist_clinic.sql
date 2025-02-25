-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25 فبراير 2025 الساعة 01:12
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentist_clinic`
--

-- --------------------------------------------------------

--
-- بنية الجدول `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_datetime` datetime NOT NULL,
  `status` enum('scheduled','completed','canceled') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_datetime`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(7, 4, 1, '2025-02-11 16:30:00', 'scheduled', NULL, '2025-02-24 10:26:46', '2025-02-24 10:27:22'),
(8, 5, 5, '2025-02-25 02:55:00', 'scheduled', NULL, '2025-02-24 20:55:04', '2025-02-24 20:55:04');

-- --------------------------------------------------------

--
-- بنية الجدول `available_times`
--

CREATE TABLE `available_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `available_times`
--

INSERT INTO `available_times` (`id`, `doctor_id`, `date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 5, '2025-02-08', '07:42:00', '08:43:00', '2025-02-24 19:43:40', '2025-02-24 20:08:25');

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'قسم الجراحة', 'جراحة عامة', '2025-02-24 10:39:02', '2025-02-24 10:39:19');

-- --------------------------------------------------------

--
-- بنية الجدول `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `specialization`, `working_hours`, `years_of_experience`, `department`, `created_at`, `updated_at`) VALUES
(1, 13, 'بولية', '4', 5, 'القسم السفلي', NULL, '2025-02-24 10:17:23'),
(5, 12, 'قلبية', '5', 8, 'القسم الجراحي', '2025-02-24 10:18:49', '2025-02-24 10:18:49'),
(6, 12, 'جراحة', '4', 5, 'ةة', '2025-02-24 20:53:22', '2025-02-24 20:53:22');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL,
  `issued_date` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `invoices`
--

INSERT INTO `invoices` (`id`, `patient_id`, `total_amount`, `payment_status`, `issued_date`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 4, 150.00, 'paid', '2025-01-24', '2025-02-01', '2025-02-24 11:06:36', '2025-02-24 11:08:04'),
(4, 3, 500.00, 'paid', '2025-02-20', '2025-03-01', '2025-02-24 11:59:11', '2025-02-24 11:59:11');

-- --------------------------------------------------------

--
-- بنية الجدول `jobs`
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
-- بنية الجدول `job_batches`
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
-- بنية الجدول `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_in_english` varchar(32) NOT NULL,
  `app_file` varchar(255) NOT NULL DEFAULT 'en.json',
  `panel_file` varchar(255) NOT NULL DEFAULT 'en.json',
  `web_file` varchar(255) NOT NULL DEFAULT 'en.json',
  `rtl` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `name_in_english`, `app_file`, `panel_file`, `web_file`, `rtl`, `image`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'English', 'en.json', 'en.json', 'en.json', 0, 'images/language/67bbb155ccd714.306118011740353877.png', '2025-02-23 20:37:57', '2025-02-23 20:37:57'),
(2, 'ar', 'العربية', 'Arabic', 'en.json', 'en.json', 'en.json', 0, 'images/language/67bbb17d2af052.009881211740353917.png', '2025-02-23 20:38:37', '2025-02-23 20:38:37'),
(4, 'tr', 'terkya', 'terkya', 'en.json', 'en.json', 'en.json', 0, 'images/language/67bca9b3c8c0b1.940376491740417459.png', '2025-02-24 14:17:39', '2025-02-24 14:17:39');

-- --------------------------------------------------------

--
-- بنية الجدول `medications`
--

CREATE TABLE `medications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medication_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `dosage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `medications`
--

INSERT INTO `medications` (`id`, `medication_name`, `description`, `dosage`, `created_at`, `updated_at`) VALUES
(1, 'سرانغ مخدر', 'قبل الطعام', 'مرة في اليوم', '2025-02-24 12:22:47', '2025-02-24 12:23:22'),
(2, 'مضاد التهاب', 'للالتهابات اللثوية', 'ثلاث مرات بعد الطعام', '2025-02-24 12:40:53', '2025-02-24 12:40:53');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_24_180547_create_permission_tables', 1),
(5, '2025_01_25_192207_create_languages_table', 1),
(6, '2025_01_25_200115_create_notification_settings_table', 1),
(7, '2025_01_25_210837_create_notification_types_table', 1),
(8, '2025_01_26_125750_create_personal_access_tokens_table', 1),
(9, '2025_01_26_172701_create_settings_table', 1),
(10, '2025_01_27_212744_create_socialite_settings_table', 1),
(11, '2025_01_31_111638_create_permission_translations_table', 1),
(12, '2025_02_06_210017_create_patients_table', 1),
(13, '2025_02_06_210025_create_doctors_table', 1),
(14, '2025_02_06_210034_create_appointments_table', 1),
(15, '2025_02_06_210045_create_invoices_table', 1),
(16, '2025_02_06_210054_create_treatments_table', 1),
(17, '2025_02_06_210111_create_treatment_sessions_table', 1),
(18, '2025_02_06_210124_create_medications_table', 1),
(19, '2025_02_06_210137_create_prescriptions_table', 1),
(20, '2025_02_06_210150_create_departments_table', 1),
(21, '2025_02_24_220030_create_available_times_table', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- بنية الجدول `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_type` varchar(255) NOT NULL,
  `notification_type_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `notification_type`, `notification_type_id`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'login-email', 1, 1, '2025-02-24 21:07:08', '2025-02-24 21:08:10'),
(2, 'app-slack', 4, 1, '2025-02-24 21:08:15', '2025-02-24 21:08:15'),
(3, 'login-sms', 2, 1, '2025-02-24 21:08:19', '2025-02-24 21:08:19'),
(4, 'app-pusher', 3, 1, '2025-02-24 21:08:21', '2025-02-24 21:08:21');

-- --------------------------------------------------------

--
-- بنية الجدول `notification_types`
--

CREATE TABLE `notification_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `notification_types`
--

INSERT INTO `notification_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'email', '2025-02-24 21:06:17', '2025-02-24 21:06:17'),
(2, 'sms', '2025-02-24 21:06:17', '2025-02-24 21:06:17'),
(3, 'pusher', '2025-02-24 21:06:17', '2025-02-24 21:06:17'),
(4, 'slack', '2025-02-24 21:06:17', '2025-02-24 21:06:17');

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `registration_date` date NOT NULL,
  `medical_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `registration_date`, `medical_notes`, `created_at`, `updated_at`) VALUES
(3, 8, '2025-02-10', 'قلع درس العقل', '2025-02-22 21:33:45', '2025-02-22 21:40:22'),
(4, 9, '2025-02-12', 'تقويم اسنان', '2025-02-22 21:44:17', '2025-02-22 21:44:17'),
(5, 8, '2025-02-25', 'ننن', '2025-02-24 20:53:41', '2025-02-24 20:53:41');

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permission_translations`
--

CREATE TABLE `permission_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `medication_id` bigint(20) UNSIGNED NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `doctor_id`, `medication_id`, `dosage`, `issued_date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 'ثلاث مرات يوميا', '2025-02-06', '2025-02-24 12:43:48', '2025-02-24 12:43:48'),
(2, 3, 5, 1, 'مرتين يوميا', '2025-02-11', '2025-02-24 12:51:26', '2025-02-24 12:52:43'),
(3, 3, 1, 1, 'ةة', '2025-02-25', '2025-02-24 20:57:55', '2025-02-24 20:57:55');

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'patient', 'web', '2025-02-21 18:32:25', '2025-02-21 18:32:25'),
(6, 'admin', 'web', '2025-02-21 18:32:34', '2025-02-21 18:32:34'),
(7, 'doctor', 'web', '2025-02-21 18:32:50', '2025-02-21 18:32:50');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
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
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bXKqp1mHVhYlzfb1daYxu4HcVJhPH5j7SCUrNPQW', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU1FTcXZoZDRqQ09WQjMzTzc4QmhwdWU1OW1LTFNZUXM4T0RJaFVQUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdmFpbGFibGVfdGltZXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1740439785),
('YRtL7zQZ06Udf4I7pHD6WFE7DfEDx1cPkBYp2BXN', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibzRveFU4djg5VnMwdVdmSXBBVUVGemFaODA3Q3NmVTFCczBSUmNncSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1740442352);

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` int(11) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_from_address` varchar(255) DEFAULT NULL,
  `mail_from_name` varchar(255) DEFAULT NULL,
  `twilio_sid` varchar(255) DEFAULT NULL,
  `twilio_auth_token` varchar(255) DEFAULT NULL,
  `twilio_phone_number` varchar(255) DEFAULT NULL,
  `slack_webhook_url` varchar(255) DEFAULT NULL,
  `pusher_app_id` varchar(255) DEFAULT NULL,
  `pusher_app_key` varchar(255) DEFAULT NULL,
  `pusher_app_secret` varchar(255) DEFAULT NULL,
  `pusher_app_cluster` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_from_address`, `mail_from_name`, `twilio_sid`, `twilio_auth_token`, `twilio_phone_number`, `slack_webhook_url`, `pusher_app_id`, `pusher_app_key`, `pusher_app_secret`, `pusher_app_cluster`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.example.com', 587, 'your_email@example.com', 'your_password', 'admin@example.com', 'MyApp', 'YourTwilioSID', 'YourTwilioAuthToken', '+1234567890', 'https://hooks.slack.com/services/your-webhook-url', '123456', 'pusher-key', 'pusher-secret', 'us', '2025-02-25 00:11:19', '2025-02-25 00:11:19');

-- --------------------------------------------------------

--
-- بنية الجدول `socialite_settings`
--

CREATE TABLE `socialite_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_client_id` varchar(255) DEFAULT NULL,
  `google_client_secret` varchar(255) DEFAULT NULL,
  `google_callback_redirect` varchar(255) DEFAULT NULL,
  `facebook_client_id` varchar(255) DEFAULT NULL,
  `facebook_client_secret` varchar(255) DEFAULT NULL,
  `facebook_callback_redirect` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `socialite_settings`
--

INSERT INTO `socialite_settings` (`id`, `google_client_id`, `google_client_secret`, `google_callback_redirect`, `facebook_client_id`, `facebook_client_secret`, `facebook_callback_redirect`, `created_at`, `updated_at`) VALUES
(1, 'your_google_client_id', 'your_google_client_secret', 'http://127.0.0.1:8000/auth/google/callback', 'your_facebook_app_id', 'your_facebook_app_secret', 'http://127.0.0.1:8000/auth/facebook/callback', '2025-02-25 00:12:08', '2025-02-25 00:12:08');

-- --------------------------------------------------------

--
-- بنية الجدول `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `treatment_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `treatments`
--

INSERT INTO `treatments` (`id`, `treatment_name`, `description`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'علاج اللثة', 'تنظيف الأسنان وعلاج الالتهابات', 700.00, '2025-02-24 13:06:39', '2025-02-24 13:06:56');

-- --------------------------------------------------------

--
-- بنية الجدول `treatment_sessions`
--

CREATE TABLE `treatment_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `treatment_id` bigint(20) UNSIGNED NOT NULL,
  `session_datetime` datetime NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `treatment_sessions`
--

INSERT INTO `treatment_sessions` (`id`, `patient_id`, `doctor_id`, `treatment_id`, `session_datetime`, `notes`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2025-02-19 23:26:00', 'جيب معك كفوف', '2025-02-24 13:22:55', '2025-02-24 13:29:13');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `facebook_id`, `whatsapp_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin User', 'admin@gmail.com', NULL, '$2y$12$11Wzr/IlLF4qbyayBwjAn.dRV0HEZ4jEnoUSWZ1JEmkfspbJpSavS', NULL, NULL, NULL, NULL, '2025-02-22 17:57:16', '2025-02-22 17:57:16'),
(8, 'Hasan', 'hasan@gmail.com', NULL, '$2y$12$IfTzYqRULX8oMxYCXxVpY.1M0HT5xTb704Zk8l6/OZQ7gqGATWXLy', NULL, NULL, NULL, NULL, '2025-02-22 21:32:35', '2025-02-22 21:32:35'),
(9, 'Ahmad kaled', 'Ahmad@gmail.com', NULL, '$2y$12$SYIZay.xiMRDEnu7paF/Wugsx3k0pvheINmwsqoYhqaQV2P.0c9.O', NULL, NULL, NULL, NULL, '2025-02-22 21:43:39', '2025-02-22 21:43:39'),
(10, 'Test User', 'test@example.com', '2025-02-23 20:14:09', '$2y$12$aiI5Ve407nPFF5b6K.cmMOR.8.qaHp4RwM0KF/mFdfnRiUdYzILYu', NULL, NULL, NULL, 'fbN4znMYcf', '2025-02-23 20:14:09', '2025-02-23 20:14:09'),
(12, 'ابراهيم العلي', 'ibrahem@gmail.com', NULL, '$2y$12$ihBvMosNTqsBEtI586WLku/pcKXPZ74sy.FrJyQ1YGSOLGjcEHoya', NULL, NULL, NULL, NULL, '2025-02-24 09:36:50', '2025-02-24 09:36:50'),
(13, 'شاهين الزيدان', 'shaheen@gmail.com', NULL, '$2y$12$rMcCSdyPL6a9bOHjVFSGzesISIjVhJHYSwAlcp3JRtu2KYM0LM8zO', NULL, NULL, NULL, NULL, '2025-02-24 10:02:27', '2025-02-24 10:02:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `available_times`
--
ALTER TABLE `available_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_times_doctor_id_foreign` (`doctor_id`);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
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
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permission_translations`
--
ALTER TABLE `permission_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`),
  ADD KEY `prescriptions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescriptions_medication_id_foreign` (`medication_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialite_settings`
--
ALTER TABLE `socialite_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_sessions_patient_id_foreign` (`patient_id`),
  ADD KEY `treatment_sessions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `treatment_sessions_treatment_id_foreign` (`treatment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`),
  ADD UNIQUE KEY `users_facebook_id_unique` (`facebook_id`),
  ADD UNIQUE KEY `users_whatsapp_number_unique` (`whatsapp_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `available_times`
--
ALTER TABLE `available_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_translations`
--
ALTER TABLE `permission_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialite_settings`
--
ALTER TABLE `socialite_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `available_times`
--
ALTER TABLE `available_times`
  ADD CONSTRAINT `available_times_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_medication_id_foreign` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  ADD CONSTRAINT `treatment_sessions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `treatment_sessions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `treatment_sessions_treatment_id_foreign` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
