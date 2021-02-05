-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2020 at 07:17 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ge`
--

-- --------------------------------------------------------

--
-- Table structure for table `brochures`
--

CREATE TABLE `brochures` (
  `id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` int NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_count` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `course_limit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `course_name`, `course_code`, `course_count`, `course_limit`, `created_at`, `updated_at`) VALUES
(1, 28, 'Freelancing Opportunities in IT', '18MCAGE01', '0', '120', '2020-06-26 11:13:52', '2020-06-26 11:13:52'),
(2, 27, 'TOURS AND OPERATION MANAGEMENT', '18MBAGE01', '0', '120', '2020-06-26 11:14:20', '2020-06-26 11:14:20'),
(3, 26, 'INTRODUCATION TO EMBEDDED SYSTEM PROGRAMMING', '18MECCGE01', '1', '120', '2020-06-26 11:14:47', '2020-06-26 11:58:52'),
(4, 25, 'PLANT MAINTENANCE AND SAFETY', '18MMEPGE01', '0', '120', '2020-06-26 11:15:19', '2020-06-26 11:15:19'),
(5, 24, 'ENERGY CONSERVATION', '18MEEPGE01', '0', '120', '2020-06-26 11:15:38', '2020-06-26 11:15:38'),
(6, 23, 'DATABASE MANAGMENT', '18MCESGE01', '0', '120', '2020-06-26 11:16:03', '2020-06-26 11:16:03'),
(7, 22, 'ROAD SAFETY MANAGEMENT', '18MCITGE01', '0', '120', '2020-06-26 11:16:23', '2020-06-26 11:16:23'),
(8, 21, 'INTRODUCATION TO LATEX', '18MMTGE01', '0', '120', '2020-06-26 11:16:51', '2020-06-26 11:16:51'),
(9, 20, 'BIOMASS&BIOENERGY', '18MICGE01', '0', '120', '2020-06-26 11:32:09', '2020-06-26 11:32:09'),
(10, 19, 'AGRI TECHNOLOGY', '18PBTGE01', '1', '120', '2020-06-26 11:32:26', '2020-06-26 22:11:29'),
(11, 18, 'MICROBES IN FOOD AND HELTH CARE', '18MMBGE01', '0', '120', '2020-06-26 11:32:44', '2020-06-26 11:32:44'),
(12, 17, 'CYBER SECURTIY', '18MITGE01', '0', '120', '2020-06-26 11:33:13', '2020-06-26 11:33:13'),
(13, 16, 'MOLECULAR SPECTROSCOPY', '18MCHGE01', '0', '120', '2020-06-26 11:33:31', '2020-06-26 11:33:31'),
(14, 15, 'Social and Preventive diseases', '18BPHGE01', '0', '120', '2020-06-26 11:36:43', '2020-06-26 11:36:43'),
(15, 14, 'office automation', '18BITGE01', '0', '120', '2020-06-26 11:38:00', '2020-06-26 11:38:00'),
(16, 13, 'Statistics', '18BMTGE01', '0', '120', '2020-06-26 11:38:35', '2020-06-26 11:38:35'),
(17, 20, 'Disaster Management', '18BICGE01', '0', '120', '2020-06-26 11:38:55', '2020-06-26 11:38:55'),
(18, 11, 'Chemical Hazards and Safety', '18BCHGE01', '0', '120', '2020-06-26 11:39:13', '2020-06-26 11:39:13'),
(19, 10, 'Microbes in Human Welfare', '18BMBGE01', '0', '120', '2020-06-26 11:39:33', '2020-06-26 11:39:33'),
(20, 9, 'Green Biotechnology', '18BBTGE01', '0', '120', '2020-06-26 11:40:07', '2020-06-26 11:40:07'),
(21, 8, 'Principles of Micro Economics', '18BCMGE01', '0', '120', '2020-06-26 11:40:54', '2020-06-26 11:40:54'),
(22, 7, 'Tourism and Operations Management', '18BBAGE01', '0', '120', '2020-06-26 11:41:12', '2020-06-26 11:41:12'),
(23, 6, 'Fundamental of Electronics', '18BTECGE01', '0', '120', '2020-06-26 11:41:31', '2020-06-26 11:41:31'),
(24, 5, 'Total Quality Management', '18BTMEGE01', '0', '120', '2020-06-26 11:41:48', '2020-06-26 11:41:48'),
(25, 4, 'Cyber Security', '18BTITGE01', '0', '120', '2020-06-26 11:42:09', '2020-06-26 11:42:09'),
(26, 3, 'Basic of Electrical Engineering', '18BTEEGE01', '0', '120', '2020-06-26 11:42:27', '2020-06-26 11:42:27'),
(27, 2, 'Fundamentals of Computer Network', '18BTCEGE01', '0', '120', '2020-06-26 11:42:45', '2020-07-17 05:24:28'),
(28, 1, 'Environmental Auditing', '18BTCIGE01', '0', '120', '2020-06-26 11:43:30', '2020-06-26 11:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `institute_id` int NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `institute_id`, `department_name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Civil Engineering', 'UG', 'active', '2020-06-26 11:04:21', '2020-06-26 11:04:21'),
(2, 3, 'Computer Engineering', 'UG', 'active', '2020-06-26 11:04:33', '2020-06-26 11:04:33'),
(3, 3, 'Electrical Engineering', 'UG', 'active', '2020-06-26 11:04:54', '2020-06-26 11:04:54'),
(4, 3, 'Information Technology', 'UG', 'active', '2020-06-26 11:05:06', '2020-06-26 11:05:06'),
(5, 3, 'Mechanical Engineering', 'UG', 'active', '2020-06-26 11:05:19', '2020-06-26 11:05:19'),
(6, 3, 'Electronics & Communication Engineering', 'UG', 'active', '2020-06-26 11:05:35', '2020-06-26 11:05:35'),
(7, 3, 'Business Administration', 'UG', 'active', '2020-06-26 11:05:49', '2020-06-26 11:05:49'),
(8, 3, 'Commerce', 'UG', 'active', '2020-06-26 11:06:06', '2020-06-26 11:06:06'),
(9, 3, 'Biotechnology', 'UG', 'active', '2020-06-26 11:08:44', '2020-06-26 11:08:44'),
(10, 3, 'Microbiology', 'UG', 'active', '2020-06-26 11:08:54', '2020-06-26 11:08:54'),
(11, 3, 'Chemistry', 'UG', 'active', '2020-06-26 11:09:02', '2020-06-26 11:09:02'),
(12, 3, 'Industrial Chemistry', 'UG', 'active', '2020-06-26 11:09:13', '2020-06-26 11:09:13'),
(13, 3, 'Mathematics', 'UG', 'active', '2020-06-26 11:09:23', '2020-06-26 11:09:23'),
(14, 3, 'Computer Science BCA and Bsc IT', 'UG', 'active', '2020-06-26 11:09:31', '2020-06-26 11:09:31'),
(15, 3, 'Pharmacy', 'UG', 'active', '2020-06-26 11:09:41', '2020-06-26 11:09:41'),
(16, 3, 'CHEMISTRY', 'PG', 'active', '2020-06-26 11:10:58', '2020-06-26 11:10:58'),
(17, 3, 'COMUTER SCIENCE &IT', 'PG', 'active', '2020-06-26 11:11:06', '2020-06-26 11:11:06'),
(18, 3, 'MICROBIOLOGY', 'PG', 'active', '2020-06-26 11:11:15', '2020-06-26 11:11:15'),
(19, 3, 'BIOTECHNOLGY', 'PG', 'active', '2020-06-26 11:11:28', '2020-06-26 11:11:28'),
(20, 3, 'INDUSTRIAL CHEMISTRY', 'PG', 'active', '2020-06-26 11:11:36', '2020-06-26 11:11:36'),
(21, 3, 'MATHEMETICS', 'PG', 'active', '2020-06-26 11:11:45', '2020-06-26 11:11:45'),
(22, 3, 'CIVIL ENGINEERING', 'PG', 'active', '2020-06-26 11:11:54', '2020-06-26 11:11:54'),
(23, 3, 'COMPUTER ENGINEERING', 'PG', 'active', '2020-06-26 11:12:03', '2020-06-26 11:12:03'),
(24, 3, 'ELECTRIC ENGINEERING', 'PG', 'active', '2020-06-26 11:12:10', '2020-06-26 11:12:10'),
(25, 3, 'MECHANICAL ENGINEERING', 'PG', 'active', '2020-06-26 11:12:18', '2020-06-26 11:12:18'),
(26, 3, 'ELECTRONICS &COMMUNICATION ENGINEERING', 'PG', 'active', '2020-06-26 11:12:25', '2020-06-26 11:12:25'),
(27, 3, 'BUSSINESS ADMINISTRATION', 'PG', 'active', '2020-06-26 11:12:31', '2020-06-26 11:12:31'),
(28, 3, 'MCA', 'PG', 'active', '2020-06-26 11:12:37', '2020-06-26 11:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` bigint UNSIGNED NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `institute_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Atmiya University', 'active', '2020-06-26 11:02:47', '2020-06-26 11:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_03_124407_create_institutes_table', 1),
(4, '2020_04_03_124535_create_departments_table', 1),
(5, '2020_04_03_124548_create_programs_table', 1),
(6, '2020_04_03_124559_create_courses_table', 1),
(7, '2020_04_10_054216_add_field_to_courses_table', 1),
(8, '2020_04_11_035635_create_students_table', 1),
(9, '2020_07_17_103129_create_brochures_table', 2);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` int NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `department_id`, `program_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 28, 'MCA', 'active', '2020-06-26 11:44:17', '2020-06-26 11:44:22'),
(2, 27, 'MBA', 'active', '2020-06-26 11:44:34', '2020-06-26 11:44:45'),
(3, 26, 'EC', 'active', '2020-06-26 11:44:57', '2020-06-26 11:44:57'),
(4, 24, 'EE', 'active', '2020-06-26 11:45:08', '2020-06-26 11:45:08'),
(5, 23, 'CE', 'active', '2020-06-26 11:45:14', '2020-06-26 11:45:14'),
(6, 22, 'CIE', 'active', '2020-06-26 11:45:22', '2020-06-26 11:45:22'),
(7, 20, 'IC', 'active', '2020-06-26 11:45:29', '2020-06-26 11:45:29'),
(8, 21, 'MATHEMETICS', 'active', '2020-06-26 11:45:41', '2020-06-26 11:45:41'),
(9, 19, 'BIOTECHNOLOGY', 'active', '2020-06-26 11:46:03', '2020-06-26 11:46:03'),
(10, 18, 'MICROBIOLOGY', 'active', '2020-06-26 11:46:26', '2020-06-26 11:46:26'),
(11, 2, 'BE.IT', 'active', '2020-06-26 11:46:40', '2020-06-26 11:47:01'),
(12, 17, 'M.Sc.IT', 'active', '2020-06-26 11:47:20', '2020-06-26 11:47:20'),
(13, 15, 'Pharmacy', 'active', '2020-06-26 11:47:33', '2020-06-26 11:47:33'),
(14, 4, 'B.Sc.IT', 'active', '2020-06-26 11:47:56', '2020-06-26 11:47:56'),
(15, 4, 'BCA', 'active', '2020-06-26 11:48:04', '2020-06-26 11:48:04'),
(16, 14, 'B.VOC ACTECH', 'active', '2020-06-26 11:48:24', '2020-06-26 11:48:24'),
(17, 10, 'MI', 'active', '2020-06-26 11:48:34', '2020-07-17 06:55:13'),
(18, 7, 'BBA', 'active', '2020-06-26 11:49:08', '2020-06-26 11:49:08'),
(19, 8, 'B.com', 'active', '2020-06-26 11:49:17', '2020-06-26 11:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `institute_id` int NOT NULL,
  `department_id` int NOT NULL,
  `program_id` int NOT NULL,
  `course_id` int NOT NULL,
  `sem` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `institute_id`, `department_id`, `program_id`, `course_id`, `sem`, `enrollment_no`, `full_name`, `gender`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 27, 2, 3, '5', '1017112589', 'kkjhgfdtyjngftunbgtyunbgyumng', 'male', '7418529630', 'active', '2020-06-26 11:58:52', '2020-06-26 11:58:52'),
(2, 3, 17, 12, 10, '5', '1017116029', 'Yatharth Vataliya Narendrabhai', 'male', '8758721807', 'active', '2020-06-26 22:11:29', '2020-06-26 22:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'Atmiya Universtiy', 'atmiya.university@gmail.com', '2020-06-23 12:00:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IzbbCoISVaiMLdGcLGEfXAKIgPMVTGc71qBf116XJWCBPCvAMizojJdTh7FU', '2020-06-23 12:00:10', '2020-06-23 12:00:10'),
(3, 'yatharth vataliya', 'yatharthvataliya@gmail.com', NULL, '$2y$10$XmCluJV6t1MdxhD9ZV9UT.W8TttrKmXjpuOy13PAP9.4rKBvRL4ti', NULL, '2020-07-17 05:24:58', '2020-07-17 05:24:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brochures`
--
ALTER TABLE `brochures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutes_institute_name_unique` (`institute_name`);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_enrollment_no_unique` (`enrollment_no`);

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
-- AUTO_INCREMENT for table `brochures`
--
ALTER TABLE `brochures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
