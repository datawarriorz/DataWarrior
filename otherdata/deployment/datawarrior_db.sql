-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 07:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datawarrior_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `cert_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validationperiod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisites` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `certification`:
--

--
-- Truncate table before insert `certification`
--

TRUNCATE TABLE `certification`;
--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`cert_id`, `title`, `price`, `description`, `provider`, `validationperiod`, `prerequisites`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd', 12, 'asdasdas', 'asdasdasd', 'asdasd', 'asdasdas', 'sadasdas', NULL, NULL),
(2, 'asdasdasd', 12, 'asdasdas', 'asdasdasd', 'asdasd', 'asdasdas', 'sadasdas', NULL, NULL),
(3, 'asdasd', 12, 'asdasd', 'asdasd', 'asdasdsa', 'asdasdas', 'asdasdasd', NULL, NULL),
(4, 'asdasd', 12, 'asdasd', 'asdasd', 'asdasdsa', 'asdasdas', 'asdasdasd', NULL, NULL),
(5, 'asdasd', 324, 'asdasdas', 'asdasdasd', 'sadasdas', 'asdasdas', 'asdasdasd', NULL, NULL),
(6, 'asdasd', 324, 'asdasdas', 'asdasdasd', 'sadasdas', 'asdasdas', 'asdasdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certification_applied`
--

CREATE TABLE `certification_applied` (
  `cert_applied_id` bigint(20) UNSIGNED NOT NULL,
  `cert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `certification_applied`:
--   `cert_id`
--       `certification` -> `cert_id`
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `certification_applied`
--

TRUNCATE TABLE `certification_applied`;
--
-- Dumping data for table `certification_applied`
--

INSERT INTO `certification_applied` (`cert_applied_id`, `cert_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 8, '2020-07-16 11:44:00', '2020-07-16 11:44:00'),
(5, 3, 8, '2020-07-16 11:44:07', '2020-07-16 11:44:07'),
(6, 6, 8, '2020-07-16 11:44:12', '2020-07-16 11:44:12'),
(7, 5, 8, '2020-07-16 11:45:49', '2020-07-16 11:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `certification_requested`
--

CREATE TABLE `certification_requested` (
  `cert_req_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `certification_requested`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `certification_requested`
--

TRUNCATE TABLE `certification_requested`;
--
-- Dumping data for table `certification_requested`
--

INSERT INTO `certification_requested` (`cert_req_id`, `title`, `description`, `provider`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:01:59', '2020-07-16 12:01:59'),
(2, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:03:09', '2020-07-16 12:03:09'),
(3, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:03:41', '2020-07-16 12:03:41'),
(4, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:04:53', '2020-07-16 12:04:53'),
(5, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:06:00', '2020-07-16 12:06:00'),
(6, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:10:55', '2020-07-16 12:10:55'),
(7, 'asdsa', 'sadsad', 'sadsad', 8, '2020-07-16 12:11:21', '2020-07-16 12:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactus_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `contact_us`:
--

--
-- Truncate table before insert `contact_us`
--

TRUNCATE TABLE `contact_us`;
--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactus_id`, `name`, `email`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Robin', 'rrvarghese741@gmail.com', 'I am noob in cs go help me', 'please give me tips in valorant', '2020-07-16 10:23:40', '2020-07-16 10:23:40'),
(5, 'asdas', 'asdas', 'sadas', 'asdas', '2020-07-16 10:26:09', '2020-07-16 10:26:09'),
(6, 'Robin', 'rrvarghese741@gmail.com', 'I am noob in cs go help me', 'please give me tips in valorant', '2020-07-16 10:37:05', '2020-07-16 10:37:05'),
(7, NULL, NULL, NULL, NULL, '2020-07-16 10:37:12', '2020-07-16 10:37:12'),
(8, 'asdas', 'sadas', 'asdas', 'asdas', '2020-07-16 10:37:20', '2020-07-16 10:37:20'),
(9, 'asdasd', 'asdas', 'asdasd', 'asdasdasdasd', '2020-07-16 10:39:09', '2020-07-16 10:39:09'),
(10, 'asdsadasd', 'asdasdasd', 'asdasdas', 'asdasdasdas', '2020-07-16 10:40:15', '2020-07-16 10:40:15'),
(11, NULL, NULL, NULL, NULL, '2020-07-16 10:40:18', '2020-07-16 10:40:18'),
(12, NULL, NULL, NULL, NULL, '2020-07-16 10:40:20', '2020-07-16 10:40:20'),
(13, 'sadas', 'sadas', 'dasdas', 'asdasd', '2020-07-16 10:42:02', '2020-07-16 10:42:02'),
(14, 'sadas', 'sadas', 'dasdas', 'asdasd', '2020-07-16 10:42:14', '2020-07-16 10:42:14'),
(15, 'asdas', 'asd', 'asd', 'asdas', '2020-07-16 10:42:21', '2020-07-16 10:42:21'),
(16, 'asdasd', 'sadasd', 'asdasd', 'asdasdas', '2020-07-16 10:42:35', '2020-07-16 10:42:35'),
(17, NULL, NULL, NULL, NULL, '2020-07-16 10:44:52', '2020-07-16 10:44:52'),
(18, 'dsds', 'sdsd', 'sdsd', 'sdsd', '2020-07-16 10:48:52', '2020-07-16 10:48:52'),
(19, 'sdas', 'sadasd', 'sdad', 'asdasd', '2020-07-16 10:50:18', '2020-07-16 10:50:18'),
(20, 'sadasd', 'asdasd', 'sadasd', 'asdasd', '2020-07-16 10:50:50', '2020-07-16 10:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `failed_jobs`:
--

--
-- Truncate table before insert `failed_jobs`
--

TRUNCATE TABLE `failed_jobs`;
-- --------------------------------------------------------

--
-- Table structure for table `internship_preferences`
--

CREATE TABLE `internship_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `preferreddomain1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferreddomain2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferreddomain3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stipend` bigint(20) NOT NULL,
  `internshiplocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counselling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `internship_preferences`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `internship_preferences`
--

TRUNCATE TABLE `internship_preferences`;
-- --------------------------------------------------------

--
-- Table structure for table `jobexperience`
--

CREATE TABLE `jobexperience` (
  `jobid` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentjob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `jobexperience`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `jobexperience`
--

TRUNCATE TABLE `jobexperience`;
--
-- Dumping data for table `jobexperience`
--

INSERT INTO `jobexperience` (`jobid`, `user_id`, `profile`, `organisation`, `location`, `startdate`, `enddate`, `description`, `currentjob`, `created_at`, `updated_at`) VALUES
(2, 8, 'sadas', 'sad', 'asdsa', '2020-07-20', NULL, 'sadasdasdas', 'yes', '2020-07-16 11:01:42', '2020-07-16 11:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_preferences`
--

CREATE TABLE `job_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `preferreddomain1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferreddomain2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferreddomain3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` bigint(20) NOT NULL,
  `joblocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counselling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `job_preferences`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `job_preferences`
--

TRUNCATE TABLE `job_preferences`;
--
-- Dumping data for table `job_preferences`
--

INSERT INTO `job_preferences` (`id`, `user_id`, `preferreddomain1`, `preferreddomain2`, `preferreddomain3`, `salary`, `joblocation`, `counselling`, `status`, `created_at`, `updated_at`) VALUES
(3, 8, 'sadas', 'asd', 'asd', 123, 'sadasd', 'No', 'Open', '2020-07-16 11:38:35', '2020-07-16 11:38:35');

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
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2020_03_10_155025_create_skill_level_table', 1),
(19, '2020_04_28_190000_create_users_table', 1),
(20, '2020_04_29_070716_create_qualification_types_table', 1),
(21, '2020_04_29_072956_create_user_skills_table', 1),
(22, '2020_04_29_095342_create_user_qualifications_table', 1),
(23, '2020_06_16_193303_create_job_experience_table', 1),
(24, '2020_06_18_192055_create_internship_preferences_table', 1),
(25, '2020_06_30_163538_create_job_preferences_table', 1),
(26, '2020_07_02_181547_create_projects_table', 1),
(27, '2020_07_02_182510_create_project_bids_table', 1),
(28, '2020_07_10_052053_create_certification_table', 1),
(29, '2020_07_10_064331_create_certification_applied_table', 1),
(30, '2020_07_10_065054_create_certification_requested_table', 1),
(32, '2020_07_15_142414_create_contact_us_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_resets`:
--

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqskill1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqskill2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqskill3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billingtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxamount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `projects`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `projects`
--

TRUNCATE TABLE `projects`;
-- --------------------------------------------------------

--
-- Table structure for table `project_bids`
--

CREATE TABLE `project_bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `bidamount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `project_bids`:
--   `project_id`
--       `projects` -> `id`
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `project_bids`
--

TRUNCATE TABLE `project_bids`;
-- --------------------------------------------------------

--
-- Table structure for table `qualification_types`
--

CREATE TABLE `qualification_types` (
  `qualtype_id` bigint(20) UNSIGNED NOT NULL,
  `qualification_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `qualification_types`:
--

--
-- Truncate table before insert `qualification_types`
--

TRUNCATE TABLE `qualification_types`;
--
-- Dumping data for table `qualification_types`
--

INSERT INTO `qualification_types` (`qualtype_id`, `qualification_type`, `created_at`, `updated_at`) VALUES
(1, '10th', NULL, NULL),
(2, '12th', NULL, NULL),
(3, 'Graduation', NULL, NULL),
(4, 'Post Graduation', NULL, NULL),
(5, 'Diploma', NULL, NULL),
(6, 'PhD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_level`
--

CREATE TABLE `skill_level` (
  `skill_level_id` bigint(20) UNSIGNED NOT NULL,
  `skill_level_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `skill_level`:
--

--
-- Truncate table before insert `skill_level`
--

TRUNCATE TABLE `skill_level`;
--
-- Dumping data for table `skill_level`
--

INSERT INTO `skill_level` (`skill_level_id`, `skill_level_name`, `created_at`, `updated_at`) VALUES
(1, 'Beginner', NULL, NULL),
(2, 'Intermediate', NULL, NULL),
(3, 'Professional', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_time_forms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `contact_no`, `password`, `date_of_birth`, `gender`, `usertype`, `provider_id`, `provider_name`, `first_time_forms`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Ashay', 'Patil', 'ashaypatil1995@gmail.com', NULL, '8765434567', '$2y$10$O1mEPpDinFWeS1AxPYqQteysd/iIyiXeo7ZJY6.cT8ZuY0APiVCrq', '1995-05-28', 'Male', NULL, NULL, NULL, '', 'aA3NfC4U6BbD34Oazy5qGCJj2rtkGIjoE3VTZLtr2Os3bqkMM1d5CxI0mi6s', '2020-07-16 10:52:49', '2020-07-16 10:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualifications`
--

CREATE TABLE `user_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qualtype_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `University` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `percentage` int(11) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `user_qualifications`:
--   `qualtype_id`
--       `qualification_types` -> `qualtype_id`
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `user_qualifications`
--

TRUNCATE TABLE `user_qualifications`;
--
-- Dumping data for table `user_qualifications`
--

INSERT INTO `user_qualifications` (`id`, `user_id`, `qualtype_id`, `course_name`, `college_name`, `University`, `start_date`, `end_date`, `percentage`, `grade`, `created_at`, `updated_at`) VALUES
(2, 8, 1, 'asdas', 'sadas', 'asdas', '2020-07-01', '2020-07-16', 12, 'a', '2020-07-16 10:59:57', '2020-07-16 10:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `userskills_id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `user_skills`:
--   `skill_level_id`
--       `skill_level` -> `skill_level_id`
--   `user_id`
--       `users` -> `user_id`
--

--
-- Truncate table before insert `user_skills`
--

TRUNCATE TABLE `user_skills`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`cert_id`);

--
-- Indexes for table `certification_applied`
--
ALTER TABLE `certification_applied`
  ADD PRIMARY KEY (`cert_applied_id`),
  ADD KEY `certification_applied_cert_id_foreign` (`cert_id`),
  ADD KEY `certification_applied_user_id_foreign` (`user_id`);

--
-- Indexes for table `certification_requested`
--
ALTER TABLE `certification_requested`
  ADD PRIMARY KEY (`cert_req_id`),
  ADD KEY `certification_requested_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_preferences`
--
ALTER TABLE `internship_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_preferences_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobexperience`
--
ALTER TABLE `jobexperience`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `jobexperience_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_preferences`
--
ALTER TABLE `job_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_preferences_user_id_foreign` (`user_id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_bids`
--
ALTER TABLE `project_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_bids_user_id_foreign` (`user_id`),
  ADD KEY `project_bids_project_id_foreign` (`project_id`);

--
-- Indexes for table `qualification_types`
--
ALTER TABLE `qualification_types`
  ADD PRIMARY KEY (`qualtype_id`);

--
-- Indexes for table `skill_level`
--
ALTER TABLE `skill_level`
  ADD PRIMARY KEY (`skill_level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_qualifications_user_id_foreign` (`user_id`),
  ADD KEY `user_qualifications_qualtype_id_foreign` (`qualtype_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`userskills_id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_level_id_foreign` (`skill_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `cert_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certification_applied`
--
ALTER TABLE `certification_applied`
  MODIFY `cert_applied_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `certification_requested`
--
ALTER TABLE `certification_requested`
  MODIFY `cert_req_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_preferences`
--
ALTER TABLE `internship_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobexperience`
--
ALTER TABLE `jobexperience`
  MODIFY `jobid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_preferences`
--
ALTER TABLE `job_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_bids`
--
ALTER TABLE `project_bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification_types`
--
ALTER TABLE `qualification_types`
  MODIFY `qualtype_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill_level`
--
ALTER TABLE `skill_level`
  MODIFY `skill_level_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `userskills_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certification_applied`
--
ALTER TABLE `certification_applied`
  ADD CONSTRAINT `certification_applied_cert_id_foreign` FOREIGN KEY (`cert_id`) REFERENCES `certification` (`cert_id`),
  ADD CONSTRAINT `certification_applied_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `certification_requested`
--
ALTER TABLE `certification_requested`
  ADD CONSTRAINT `certification_requested_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `internship_preferences`
--
ALTER TABLE `internship_preferences`
  ADD CONSTRAINT `internship_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `jobexperience`
--
ALTER TABLE `jobexperience`
  ADD CONSTRAINT `jobexperience_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `job_preferences`
--
ALTER TABLE `job_preferences`
  ADD CONSTRAINT `job_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project_bids`
--
ALTER TABLE `project_bids`
  ADD CONSTRAINT `project_bids_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_bids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD CONSTRAINT `user_qualifications_qualtype_id_foreign` FOREIGN KEY (`qualtype_id`) REFERENCES `qualification_types` (`qualtype_id`),
  ADD CONSTRAINT `user_qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_level_id_foreign` FOREIGN KEY (`skill_level_id`) REFERENCES `skill_level` (`skill_level_id`),
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
