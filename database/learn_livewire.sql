-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 06:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_livewire`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1751718744),
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1751718744;', 1751718744),
('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:2;', 1751732871),
('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1751732871;', 1751732871);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('text','video','quiz') NOT NULL DEFAULT 'text',
  `content_text` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `quiz_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`quiz_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `course_id`, `title`, `type`, `content_text`, `duration`, `video_url`, `quiz_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laravel Basics Overview', 'text', 'Learn the basics of Laravel including routing, controllers, and views.', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(2, 1, 'Installing Laravel Step-by-Step', 'video', NULL, 12, 'https://example.com/videos/installing_laravel.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(3, 1, 'Laravel Routing Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"Which method defines a GET route?\",\"options\":[\"Route::get\",\"Route::post\",\"Route::put\"],\"answer\":\"Route::get\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(4, 1, 'Blade Templates Introduction', 'text', 'Blade is Laravel’s templating engine...', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(5, 1, 'Blade Components Video', 'video', NULL, 18, 'https://example.com/videos/blade_components.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(6, 1, 'Blade Syntax Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"How do you output data in Blade?\",\"options\":[\"{{ }}\",\"<?php ?>\",\"[[ ]]\"],\"answer\":\"{{ }}\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(7, 2, 'Understanding MVC Architecture', 'text', 'MVC stands for Model-View-Controller...', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(8, 2, 'Controllers in Laravel', 'video', NULL, 20, 'https://example.com/videos/controllers.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(9, 2, 'Controllers Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"Where do you place controller files?\",\"options\":[\"app/Http/Controllers\",\"resources/views\",\"routes\"],\"answer\":\"app/Http/Controllers\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(10, 2, 'Eloquent ORM Basics', 'text', 'Eloquent is Laravel’s ORM for database...', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(11, 2, 'Eloquent Relationships Video', 'video', NULL, 25, 'https://example.com/videos/eloquent_relationships.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(12, 2, 'Eloquent Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"Which method defines a one-to-many relationship?\",\"options\":[\"hasMany\",\"belongsTo\",\"hasOne\"],\"answer\":\"hasMany\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(13, 3, 'Authentication Overview', 'text', 'Learn how Laravel handles authentication...', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(14, 3, 'Implementing Authentication Video', 'video', NULL, 22, 'https://example.com/videos/authentication.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(15, 3, 'Authentication Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"Which package helps with authentication scaffolding?\",\"options\":[\"Laravel Breeze\",\"Laravel UI\",\"Both\"],\"answer\":\"Both\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(16, 3, 'Middleware Concepts', 'text', 'Middleware filters HTTP requests in Laravel...', NULL, NULL, NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(17, 3, 'Middleware Video Tutorial', 'video', NULL, 15, 'https://example.com/videos/middleware.mp4', NULL, '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(18, 3, 'Middleware Quiz', 'quiz', NULL, NULL, NULL, '{\"questions\":[{\"question\":\"Which method is used to register middleware?\",\"options\":[\"$routeMiddleware\",\"$middlewareGroups\",\"Both\"],\"answer\":\"$routeMiddleware\"}]}', '2025-07-05 15:49:12', '2025-07-05 15:49:12'),
(19, 1, 'dsafs', 'text', 'sdfs', NULL, NULL, NULL, '2025-07-05 10:31:30', '2025-07-05 10:31:30'),
(20, 1, 'sdf', 'text', 'sdf', NULL, NULL, NULL, '2025-07-05 10:31:39', '2025-07-05 10:31:39'),
(21, 1, 'tryry', 'text', 'try', NULL, NULL, NULL, '2025-07-05 10:32:41', '2025-07-05 10:32:41'),
(22, 1, 'rtytr', 'text', 'ytr', NULL, NULL, NULL, '2025-07-05 10:32:48', '2025-07-05 10:32:48'),
(23, 1, 'sdg', 'text', 'sdg', NULL, NULL, NULL, '2025-07-05 10:34:29', '2025-07-05 10:34:29'),
(24, 1, 'dsfsd', 'text', 'fsdf\n', NULL, NULL, NULL, '2025-07-05 10:36:01', '2025-07-05 10:36:01'),
(25, 1, 'uyhrtfytr', 'text', 'ryt', NULL, NULL, NULL, '2025-07-05 10:37:51', '2025-07-05 10:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `instructor_name` varchar(255) DEFAULT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `category`, `description`, `price`, `image`, `instructor_name`, `instructor_id`, `created_at`, `updated_at`) VALUES
(1, 'Laravel for Beginners', 'laravel-for-beginners', 'Web Development', 'A complete guide to building web apps with Laravel.', 59.00, 'laravel.webp', 'Ahmed Khan', 105, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(2, 'UI/UX Design Principles', 'ui-ux-design', 'Design', 'Master the principles of user interface and experience design.', 45.50, 'UI_UX.png', 'Rachel Moore', 108, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(3, 'React Essentials', 'react-essentials', 'Frontend', 'Learn the essentials of React for building modern UIs.', 69.99, 'react_essentials.png', 'Sara Lee', 106, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(4, 'Docker & DevOps', 'docker-devops', 'DevOps', 'Containerize your applications and automate deployments.', 79.00, 'Docker_DevOps.jpg', 'Michael Green', 107, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(5, 'Node.js with Express', 'nodejs-express', 'Backend', 'Build robust server-side apps using Node.js and Express.', 65.00, 'Node_Express.jpg', 'Carlos Rivera', 111, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(6, 'AI with Python', 'ai-with-python', 'Artificial Intelligence', 'Build AI models and tools using Python and libraries like TensorFlow.', 99.99, 'AI_Python.webp', 'Angela Wu', 112, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(7, 'WordPress Development', 'wordpress-development', 'CMS', 'Create powerful websites with custom themes and plugins.', 40.00, 'WordPress_Development.jpg', 'David Lin', 113, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(8, 'dfgf', 'dfgf', 'dfgdfg', 'fdgfdgd', 555.00, 'courses/UKZzD19F1JPRjMLKP762IXrO0LJKj0085M8Lrgdb.webp', NULL, 106, '2025-07-05 06:17:33', '2025-07-05 06:17:33'),
(35, 'Cybersecurity Fundamentals', 'cybersecurity-fundamentals', 'Security', 'Learn the basics of securing web applications and networks.', 89.00, 'Cybersecurity.jpeg', 'Tom Benson', 109, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(36, 'JavaScript Mastery', 'javascript-mastery', 'Programming', 'Become a JavaScript pro with this in-depth course.', 74.25, 'JavaScript_Mastery.jpg', 'Nina Patel', 110, '2025-07-04 13:11:24', '2025-07-04 13:11:24'),
(41, 'New course', 'new-course', 'Category', 'Description', 2.00, 'courses/MYiArTsmrHYymh0no4iaiHWV1SBsjSWyyL3NLIxQ.webp', NULL, 106, '2025-07-05 05:48:41', '2025-07-05 05:48:41'),
(42, 'Title', 'title', 'Category', 'Description', 11.00, 'courses/WXl5DsJKOketyB8s6PTTpOJuYeKiIVKeNSMOrlal.jpg', NULL, 106, '2025-07-05 05:50:47', '2025-07-05 05:50:47'),
(44, '8', '8', '88', '888', 8.00, 'courses/dqq6vBd9ELnpOR4qmTZtoFVOEagJYq8j3ETuQzrH.jpg', NULL, 105, '2025-07-05 06:20:43', '2025-07-05 06:20:43'),
(45, '6', '6', '66', '66', 6.00, 'courses/iStgHI9aUu3lsxneCbzbBcFrxJ2aBx2MSVDA1TbA.webp', NULL, 108, '2025-07-05 06:21:43', '2025-07-05 06:21:43'),
(46, '7', '7', '77', '777', 77.00, 'courses/3H1vl1KlBCDjGcWOZy9weReWY3cwhXlR4rdgLxTV.jpg', NULL, 106, '2025-07-05 06:25:42', '2025-07-05 06:25:42'),
(48, 'rtyerte', 'rtyerte', 'rtyertre', 'erter', 4.00, 'courses/ZtKqMxeSW6807OXffMFpAtL5NAF7YPc4fGfhoZOZ.webp', NULL, 106, '2025-07-05 06:31:28', '2025-07-05 06:31:28'),
(49, 'u', 'u', 'u', 'u', 6.00, 'courses/PLqScgzAdcmnumcoeiIJwzxjF2pZE8QRzH55b0ic.jpg', NULL, 108, '2025-07-05 06:41:59', '2025-07-05 06:41:59'),
(50, 'dfgfdg', 'dfgfdg', 'dfg', 'fdg', 4.98, 'courses/KYrePGkQFVYgjhrxWXtjDf4j0kxSuciUOiFFRqEJ.jpg', NULL, 108, '2025-07-05 09:22:18', '2025-07-05 09:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_04_112230_create_courses_table', 2),
(5, '2025_07_04_131923_create_videos_table', 3),
(6, '2025_07_05_154451_create_contents_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7Y2YJdO0PTLg7P7hhuOKxh1VC4yodEL9c9F9z2Iu', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNVY1NWowRG5TTkNQMHc2RDNKcTZhRklnVUhtUzA5amI4OEN2cURxbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb3Vyc2UvbGFyYXZlbC1mb3ItYmVnaW5uZXJzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1751733795);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','instructor') NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-07-03 04:51:13', '$2y$12$AyciiFodrdYG8JI3NIOAt.sa3zheENOYDoi2H8nbGLkPLm0kTizgm', 'instructor', 'ewQnMWkK1B', '2025-07-03 04:51:13', '2025-07-03 04:51:13'),
(2, 'MD Rakibul Islam', 'mdrakibulislam2242@gmail.com', NULL, '$2y$12$hXnbRHppoqQo2.1B4tz4..ErST.Tj1uCG2qPki8elmXB3wcvvzzuq', 'student', NULL, '2025-07-03 07:57:47', '2025-07-03 07:57:47'),
(105, 'Ahmed Khan', 'ahmed@example.com', NULL, 'hashed_password', 'instructor', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(106, 'Sara Lee', 'sara@example.com', NULL, 'hashed_password', 'instructor', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(107, 'Michael Green', 'michael@example.com', NULL, 'hashed_password', 'student', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(108, 'Rachel Moore', 'rachel@example.com', NULL, 'hashed_password', 'instructor', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(109, 'Tom Benson', 'tom@example.com', NULL, 'hashed_password', 'student', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(110, 'Nina Patel', 'nina@example.com', NULL, 'hashed_password', 'instructor', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(111, 'Carlos Rivera', 'carlos@example.com', NULL, 'hashed_password', 'instructor', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(112, 'Angela Wu', 'angela@example.com', NULL, 'hashed_password', 'student', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(113, 'David Lin', 'david@example.com', NULL, 'hashed_password', 'student', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(114, 'Emily Zhang', 'emily@example.com', NULL, 'hashed_password', 'student', NULL, '2025-07-04 13:11:19', '2025-07-04 13:11:19'),
(115, 'MD Rakibul Islam', 'bianka4@punkproof.com', NULL, '$2y$12$0NjKl2mDOxMyT2I6fJO9s.VMW3w.Fy7n21Xara0FgpMmQ3yNqjtTi', 'student', NULL, '2025-07-05 06:37:25', '2025-07-05 06:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Duration in minutes',
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `course_id`, `title`, `duration`, `video_url`, `created_at`, `updated_at`) VALUES
(7, 1, 'Introduction to Laravel', 15, 'https://example.com/videos/laravel_intro.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(8, 1, 'Routing and Controllers', 22, 'https://example.com/videos/laravel_routing.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(9, 2, 'React Components Basics', 18, 'https://example.com/videos/react_components.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(10, 2, 'State and Props', 20, 'https://example.com/videos/react_state_props.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(11, 3, 'Docker Setup', 25, 'https://example.com/videos/docker_setup.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(12, 3, 'Docker Compose', 30, 'https://example.com/videos/docker_compose.mp4', '2025-07-04 13:24:07', '2025-07-04 13:24:07'),
(109, 1, 'Welcome to the Course', 300, 'https://example.com/video1.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(110, 1, 'Getting Started with the Basics', 420, 'https://example.com/video2.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(111, 1, 'Understanding the Interface', 360, 'https://example.com/video3.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(112, 1, 'Setting Up Your Environment', 480, 'https://example.com/video4.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(113, 1, 'First Project Overview', 530, 'https://example.com/video5.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(114, 2, 'Variables and Data Types', 450, 'https://example.com/video6.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(115, 2, 'Conditional Logic in Practice', 510, 'https://example.com/video7.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(116, 2, 'Loops and Iterations', 475, 'https://example.com/video8.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(117, 2, 'Functions and Scope', 490, 'https://example.com/video9.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(118, 3, 'Object-Oriented Programming Basics', 520, 'https://example.com/video10.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(119, 3, 'Classes and Objects', 430, 'https://example.com/video11.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(120, 3, 'Inheritance and Polymorphism', 480, 'https://example.com/video12.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(121, 3, 'Encapsulation Explained', 410, 'https://example.com/video13.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(122, 4, 'Database Introduction', 450, 'https://example.com/video14.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(123, 4, 'SQL Basics', 490, 'https://example.com/video15.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(124, 4, 'Laravel Eloquent Models', 530, 'https://example.com/video16.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(125, 4, 'Creating Migrations', 460, 'https://example.com/video17.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(126, 5, 'Routing in Laravel', 420, 'https://example.com/video18.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(127, 5, 'Controllers and Middleware', 440, 'https://example.com/video19.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(128, 5, 'Blade Templating Engine', 500, 'https://example.com/video20.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(129, 5, 'Form Handling in Laravel', 470, 'https://example.com/video21.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(130, 6, 'Authentication System', 540, 'https://example.com/video22.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(131, 6, 'User Registration Flow', 490, 'https://example.com/video23.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(132, 6, 'Protecting Routes with Middleware', 510, 'https://example.com/video24.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(133, 6, 'Using Policies and Gates', 530, 'https://example.com/video25.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(134, 7, 'RESTful API Concepts', 480, 'https://example.com/video26.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(135, 7, 'Building an API with Laravel', 520, 'https://example.com/video27.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(136, 7, 'Testing API Endpoints', 510, 'https://example.com/video28.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(137, 7, 'Using Postman for Testing', 470, 'https://example.com/video29.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(138, 8, 'Deploying to Production', 550, 'https://example.com/video30.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(139, 8, 'Using Env Variables', 400, 'https://example.com/video31.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02'),
(140, 8, 'Debugging and Logs', 480, 'https://example.com/video32.mp4', '2025-07-05 13:33:02', '2025-07-05 13:33:02');

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
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_course_id_foreign` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
