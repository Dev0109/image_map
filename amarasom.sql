-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 05:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amarasom`
--

-- --------------------------------------------------------

--
-- Table structure for table `advterisements`
--

CREATE TABLE `advterisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advterisements`
--

INSERT INTO `advterisements` (`id`, `advTitle`, `displayFrom`, `displayTo`, `position`, `status`, `image`, `created_at`, `updated_at`) VALUES
(15, 'Adv1', '2022-08-05T05:00', '2022-09-19T00:00', '1', '1', 'assets/img/advImg/1659678183.jpg', '2022-08-05 00:13:03', '2022-08-22 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `task`, `IP`, `userId`, `userName`, `created_at`, `updated_at`) VALUES
(1, 'Logged in', '127.0.0.1', '1', 'Bhaskar Ranjan Bora', '2022-07-16 00:54:05', '2022-07-16 00:54:05'),
(2, 'Logged in', '127.0.0.1', '1', 'Bhaskar Ranjan Bora', '2022-07-16 01:07:22', '2022-07-16 01:07:22'),
(3, 'Logged in', '127.0.0.1', '1', 'Bhaskar Ranjan Bora', '2022-07-16 01:09:35', '2022-07-16 01:09:35'),
(4, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:11:06', '2022-07-16 01:11:06'),
(5, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:11:06', '2022-07-16 01:11:06'),
(6, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:11:43', '2022-07-16 01:11:43'),
(7, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:14:03', '2022-07-16 01:14:03'),
(8, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:15:47', '2022-07-16 01:15:47'),
(9, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:16:57', '2022-07-16 01:16:57'),
(10, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:17:22', '2022-07-16 01:17:22'),
(11, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:18:30', '2022-07-16 01:18:30'),
(12, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:18:46', '2022-07-16 01:18:46'),
(13, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:19:01', '2022-07-16 01:19:01'),
(14, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:19:50', '2022-07-16 01:19:50'),
(15, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:20:10', '2022-07-16 01:20:10'),
(16, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:20:18', '2022-07-16 01:20:18'),
(17, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:20:27', '2022-07-16 01:20:27'),
(18, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:12', '2022-07-16 01:33:12'),
(19, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:15', '2022-07-16 01:33:15'),
(20, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:19', '2022-07-16 01:33:19'),
(21, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:21', '2022-07-16 01:33:21'),
(22, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:22', '2022-07-16 01:33:22'),
(23, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 01:33:41', '2022-07-16 01:33:41'),
(24, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 02:34:38', '2022-07-16 02:34:38'),
(25, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 02:46:33', '2022-07-16 02:46:33'),
(26, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 02:51:27', '2022-07-16 02:51:27'),
(27, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 02:54:13', '2022-07-16 02:54:13'),
(28, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 03:02:31', '2022-07-16 03:02:31'),
(29, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 03:30:28', '2022-07-16 03:30:28'),
(30, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 05:46:37', '2022-07-16 05:46:37'),
(31, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-16 06:01:28', '2022-07-16 06:01:28'),
(32, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-17 10:30:08', '2022-07-17 10:30:08'),
(33, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-17 10:30:08', '2022-07-17 10:30:08'),
(34, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 00:07:04', '2022-07-18 00:07:04'),
(35, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 00:07:05', '2022-07-18 00:07:05'),
(36, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 04:15:17', '2022-07-18 04:15:17'),
(37, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 08:05:56', '2022-07-18 08:05:56'),
(38, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 08:05:57', '2022-07-18 08:05:57'),
(39, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 08:15:26', '2022-07-18 08:15:26'),
(40, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-18 10:44:04', '2022-07-18 10:44:04'),
(41, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 01:01:43', '2022-07-19 01:01:43'),
(42, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 01:01:44', '2022-07-19 01:01:44'),
(43, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 05:24:28', '2022-07-19 05:24:28'),
(44, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 05:24:29', '2022-07-19 05:24:29'),
(45, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 07:20:36', '2022-07-19 07:20:36'),
(46, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-19 07:20:36', '2022-07-19 07:20:36'),
(47, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 04:53:15', '2022-07-24 04:53:15'),
(48, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 04:53:15', '2022-07-24 04:53:15'),
(49, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 04:53:31', '2022-07-24 04:53:31'),
(50, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 04:58:28', '2022-07-24 04:58:28'),
(51, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:09:18', '2022-07-24 06:09:18'),
(52, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:09:28', '2022-07-24 06:09:28'),
(53, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:09:49', '2022-07-24 06:09:49'),
(54, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:09:56', '2022-07-24 06:09:56'),
(55, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:29:37', '2022-07-24 06:29:37'),
(56, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:37:49', '2022-07-24 06:37:49'),
(57, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 06:38:21', '2022-07-24 06:38:21'),
(58, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 07:16:36', '2022-07-24 07:16:36'),
(59, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 10:56:26', '2022-07-24 10:56:26'),
(60, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 10:56:46', '2022-07-24 10:56:46'),
(61, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:11:20', '2022-07-24 11:11:20'),
(62, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:11:42', '2022-07-24 11:11:42'),
(63, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:11:56', '2022-07-24 11:11:56'),
(64, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:17:23', '2022-07-24 11:17:23'),
(65, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:17:31', '2022-07-24 11:17:31'),
(66, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:17:46', '2022-07-24 11:17:46'),
(67, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:18:00', '2022-07-24 11:18:00'),
(68, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:18:44', '2022-07-24 11:18:44'),
(69, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:18:47', '2022-07-24 11:18:47'),
(70, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:42:11', '2022-07-24 11:42:11'),
(71, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:42:56', '2022-07-24 11:42:56'),
(72, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:43:03', '2022-07-24 11:43:03'),
(73, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:43:24', '2022-07-24 11:43:24'),
(74, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:44:06', '2022-07-24 11:44:06'),
(75, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:48:23', '2022-07-24 11:48:23'),
(76, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:48:32', '2022-07-24 11:48:32'),
(77, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 11:48:49', '2022-07-24 11:48:49'),
(78, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:36:24', '2022-07-24 12:36:24'),
(79, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:36:43', '2022-07-24 12:36:43'),
(80, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:37:08', '2022-07-24 12:37:08'),
(81, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:38:41', '2022-07-24 12:38:41'),
(82, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:38:47', '2022-07-24 12:38:47'),
(83, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:44:49', '2022-07-24 12:44:49'),
(84, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-24 12:45:06', '2022-07-24 12:45:06'),
(85, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:01:35', '2022-07-25 08:01:35'),
(86, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:01:36', '2022-07-25 08:01:36'),
(87, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:02:48', '2022-07-25 08:02:48'),
(88, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:09:31', '2022-07-25 08:09:31'),
(89, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:13:10', '2022-07-25 08:13:10'),
(90, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:39:57', '2022-07-25 08:39:57'),
(91, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:52:21', '2022-07-25 08:52:21'),
(92, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:52:21', '2022-07-25 08:52:21'),
(93, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:55:08', '2022-07-25 08:55:08'),
(94, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 08:58:04', '2022-07-25 08:58:04'),
(95, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-25 09:01:02', '2022-07-25 09:01:02'),
(96, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 00:21:03', '2022-07-28 00:21:03'),
(97, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 00:21:04', '2022-07-28 00:21:04'),
(98, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 00:55:18', '2022-07-28 00:55:18'),
(99, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 01:56:14', '2022-07-28 01:56:14'),
(100, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 01:56:29', '2022-07-28 01:56:29'),
(101, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 02:08:16', '2022-07-28 02:08:16'),
(102, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 05:32:30', '2022-07-28 05:32:30'),
(103, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 05:32:30', '2022-07-28 05:32:30'),
(104, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 11:26:51', '2022-07-28 11:26:51'),
(105, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-28 12:00:52', '2022-07-28 12:00:52'),
(106, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-29 04:24:18', '2022-07-29 04:24:18'),
(107, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-29 04:24:19', '2022-07-29 04:24:19'),
(108, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-29 06:56:31', '2022-07-29 06:56:31'),
(109, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-29 11:03:07', '2022-07-29 11:03:07'),
(110, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-29 11:03:07', '2022-07-29 11:03:07'),
(111, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-30 03:23:22', '2022-07-30 03:23:22'),
(112, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-30 03:23:22', '2022-07-30 03:23:22'),
(113, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-30 22:47:33', '2022-07-30 22:47:33'),
(114, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-07-30 22:47:34', '2022-07-30 22:47:34'),
(115, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:22:46', '2022-08-02 03:22:46'),
(116, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:22:47', '2022-08-02 03:22:47'),
(117, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:22:48', '2022-08-02 03:22:48'),
(118, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:22:52', '2022-08-02 03:22:52'),
(119, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:23:00', '2022-08-02 03:23:00'),
(120, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:23:00', '2022-08-02 03:23:00'),
(121, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:24:43', '2022-08-02 03:24:43'),
(122, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:24:43', '2022-08-02 03:24:43'),
(123, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:24:53', '2022-08-02 03:24:53'),
(124, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:24:53', '2022-08-02 03:24:53'),
(125, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:29:40', '2022-08-02 03:29:40'),
(126, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 03:29:41', '2022-08-02 03:29:41'),
(127, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 12:38:48', '2022-08-02 12:38:48'),
(128, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-02 12:38:48', '2022-08-02 12:38:48'),
(129, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 04:26:11', '2022-08-03 04:26:11'),
(130, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 04:26:12', '2022-08-03 04:26:12'),
(131, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 11:41:50', '2022-08-03 11:41:50'),
(132, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 13:22:38', '2022-08-03 13:22:38'),
(133, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 13:22:38', '2022-08-03 13:22:38'),
(134, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 13:40:36', '2022-08-03 13:40:36'),
(135, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 13:40:36', '2022-08-03 13:40:36'),
(136, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 22:24:14', '2022-08-03 22:24:14'),
(137, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-03 22:24:15', '2022-08-03 22:24:15'),
(138, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 04:53:57', '2022-08-04 04:53:57'),
(139, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 08:45:31', '2022-08-04 08:45:31'),
(140, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 09:16:30', '2022-08-04 09:16:30'),
(141, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 11:46:37', '2022-08-04 11:46:37'),
(142, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 12:17:48', '2022-08-04 12:17:48'),
(143, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 12:18:02', '2022-08-04 12:18:02'),
(144, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 12:20:19', '2022-08-04 12:20:19'),
(145, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 22:45:34', '2022-08-04 22:45:34'),
(146, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-04 23:59:09', '2022-08-04 23:59:09'),
(147, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 00:09:13', '2022-08-05 00:09:13'),
(148, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 00:09:13', '2022-08-05 00:09:13'),
(149, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 00:34:53', '2022-08-05 00:34:53'),
(150, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 00:36:29', '2022-08-05 00:36:29'),
(151, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 04:48:06', '2022-08-05 04:48:06'),
(152, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 05:23:45', '2022-08-05 05:23:45'),
(153, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 05:23:46', '2022-08-05 05:23:46'),
(154, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 05:25:57', '2022-08-05 05:25:57'),
(155, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 05:39:51', '2022-08-05 05:39:51'),
(156, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 05:41:15', '2022-08-05 05:41:15'),
(157, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 11:45:35', '2022-08-05 11:45:35'),
(158, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-05 13:58:38', '2022-08-05 13:58:38'),
(159, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 02:53:09', '2022-08-06 02:53:09'),
(160, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 02:53:10', '2022-08-06 02:53:10'),
(161, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 03:15:11', '2022-08-06 03:15:11'),
(162, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 05:56:14', '2022-08-06 05:56:14'),
(163, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 05:56:14', '2022-08-06 05:56:14'),
(164, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 08:29:48', '2022-08-06 08:29:48'),
(165, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-06 08:54:23', '2022-08-06 08:54:23'),
(166, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-07 09:46:42', '2022-08-07 09:46:42'),
(167, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-07 09:46:42', '2022-08-07 09:46:42'),
(168, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-07 13:11:31', '2022-08-07 13:11:31'),
(169, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-07 13:11:31', '2022-08-07 13:11:31'),
(170, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-08 10:24:23', '2022-08-08 10:24:23'),
(171, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-08 10:24:24', '2022-08-08 10:24:24'),
(172, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-10 14:47:53', '2022-08-10 14:47:53'),
(173, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-10 14:47:54', '2022-08-10 14:47:54'),
(174, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-11 06:13:06', '2022-08-11 06:13:06'),
(175, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-11 06:13:07', '2022-08-11 06:13:07'),
(176, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 04:20:27', '2022-08-12 04:20:27'),
(177, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 04:20:27', '2022-08-12 04:20:27'),
(178, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 11:27:04', '2022-08-12 11:27:04'),
(179, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 13:22:04', '2022-08-12 13:22:04'),
(180, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 14:13:46', '2022-08-12 14:13:46'),
(181, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-12 14:17:38', '2022-08-12 14:17:38'),
(182, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 01:40:09', '2022-08-13 01:40:09'),
(183, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 01:40:09', '2022-08-13 01:40:09'),
(184, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 02:41:06', '2022-08-13 02:41:06'),
(185, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 02:41:06', '2022-08-13 02:41:06'),
(186, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 02:41:11', '2022-08-13 02:41:11'),
(187, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 02:42:14', '2022-08-13 02:42:14'),
(188, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 03:30:34', '2022-08-13 03:30:34'),
(189, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 03:50:28', '2022-08-13 03:50:28'),
(190, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 03:52:42', '2022-08-13 03:52:42'),
(191, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 03:53:10', '2022-08-13 03:53:10'),
(192, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 03:59:45', '2022-08-13 03:59:45'),
(193, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-13 23:58:15', '2022-08-13 23:58:15'),
(194, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:54:49', '2022-08-21 14:54:49'),
(195, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:54:49', '2022-08-21 14:54:49'),
(196, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:56:18', '2022-08-21 14:56:18'),
(197, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:57:09', '2022-08-21 14:57:09'),
(198, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:57:42', '2022-08-21 14:57:42'),
(199, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:58:44', '2022-08-21 14:58:44'),
(200, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-21 14:58:57', '2022-08-21 14:58:57'),
(201, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:41:38', '2022-08-22 00:41:38'),
(202, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:41:38', '2022-08-22 00:41:38'),
(203, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:42:50', '2022-08-22 00:42:50'),
(204, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:42:50', '2022-08-22 00:42:50'),
(205, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:44:04', '2022-08-22 00:44:04'),
(206, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-22 00:52:10', '2022-08-22 00:52:10'),
(207, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-23 04:28:31', '2022-08-23 04:28:31'),
(208, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-23 04:28:32', '2022-08-23 04:28:32'),
(209, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 02:08:59', '2022-08-28 02:08:59'),
(210, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 02:08:59', '2022-08-28 02:08:59'),
(211, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 06:18:11', '2022-08-28 06:18:11'),
(212, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 06:18:11', '2022-08-28 06:18:11'),
(213, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 14:09:44', '2022-08-28 14:09:44'),
(214, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-28 14:09:45', '2022-08-28 14:09:45'),
(215, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-29 03:12:10', '2022-08-29 03:12:10'),
(216, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-29 03:12:11', '2022-08-29 03:12:11'),
(217, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-08-29 03:12:46', '2022-08-29 03:12:46'),
(218, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 04:57:23', '2022-09-02 04:57:23'),
(219, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 04:57:23', '2022-09-02 04:57:23'),
(220, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 04:58:51', '2022-09-02 04:58:51'),
(221, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 11:33:56', '2022-09-02 11:33:56'),
(222, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 11:33:57', '2022-09-02 11:33:57'),
(223, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 11:35:30', '2022-09-02 11:35:30'),
(224, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 11:36:24', '2022-09-02 11:36:24'),
(225, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 12:23:30', '2022-09-02 12:23:30'),
(226, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 12:29:24', '2022-09-02 12:29:24'),
(227, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 12:30:16', '2022-09-02 12:30:16'),
(228, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 13:40:58', '2022-09-02 13:40:58'),
(229, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 13:46:36', '2022-09-02 13:46:36'),
(230, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-02 13:59:15', '2022-09-02 13:59:15'),
(231, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-03 05:13:19', '2022-09-03 05:13:19'),
(232, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-03 05:13:19', '2022-09-03 05:13:19'),
(233, 'Logged in', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-03 07:43:02', '2022-09-03 07:43:02'),
(234, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-03 07:43:02', '2022-09-03 07:43:02'),
(235, 'Accessed Dashboard', '127.0.0.1', '2', 'Bhaskar Ranjan Bora', '2022-09-03 08:44:36', '2022-09-03 08:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, '1', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `editions`
--

CREATE TABLE `editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paperId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `editions`
--

INSERT INTO `editions` (`id`, `paperId`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Guwahati', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(2, '2', 'Guwahati', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(3, '3', 'Guwahati', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(4, '4', 'Guwahati', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(5, '1', 'Jorhat', '2022-08-05 05:38:48', '2022-08-05 05:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_areas`
--

CREATE TABLE `map_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paperId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_areas`
--

INSERT INTO `map_areas` (`id`, `date`, `paperId`, `edition`, `pageNo`, `description`, `connection`, `x`, `y`, `width`, `height`, `created_at`, `updated_at`) VALUES
(1, '2022-07-19', '1', '1', '1', 'box1', NULL, '0.016703917658294765', '0.005955948378040929', '0.15288861815834798', '0.3352745945283703', NULL, NULL),
(2, '2022-07-19', '1', '1', '1', 'box2', NULL, '0.1518246751856913', '0.11239516372814738', '0.6231514120725942', '0.20383287892823881', NULL, NULL),
(23, '2022-07-19', '1', '1', '1', 'hhji', '0', '0.1510799021172465', '0.010956448428045931', '0.5000531971486328', '0.1138238780281488', '2022-08-12 13:17:00', '2022-08-12 13:17:00'),
(24, '2022-07-19', '1', '1', '1', 'kkk', '0', '0.5011171401212895', '0.010956448428045931', '0.9915948505160124', '0.11811002092815309', '2022-08-12 13:17:42', '2022-08-12 13:17:42'),
(25, '2022-07-19', '1', '1', '1', 'fgnvjb', '0', '0.6128311522502394', '0.11596694947815095', '0.9798914778167891', '0.3117008085783467', '2022-08-12 13:21:04', '2022-08-12 13:21:04'),
(26, '2022-08-22', '1', '1', '1', 'ssd', '0', '0.5011171401212895', '0.010956448428045931', '0.9777635918714758', '0.1088233779781438', '2022-08-21 14:57:34', '2022-08-21 14:57:34'),
(27, '2022-08-22', '1', '1', '1', '3', '0', '0.6213426960314927', '0.11596694947815095', '0.9724438770081923', '0.31384388002834884', '2022-08-21 14:58:32', '2022-08-21 14:58:32'),
(28, '2022-08-22', '1', '1', '1', 'ff', '0', '0.14363230130864987', '0.011813680278114308', '0.5011171401212895', '0.11325239557821576', '2022-08-22 00:49:07', '2022-08-22 00:49:07'),
(29, '2022-07-19', '1', '1', '1', 'po', '0', '0.16810298967975318', '0.14096944972817596', '0.2106607085860198', '0.16882937857820382', '2022-08-28 06:18:41', '2022-08-28 06:18:41'),
(30, '2022-07-19', '1', '1', '1', 'test', '0', '0.028726460261729973', '0.3392749989284643', '0.3074795190977764', '0.40285278527852786', '2022-08-28 06:41:27', '2022-08-28 06:41:27'),
(31, '2022-07-19', '1', '1', '1', 'hgjg', '0', '0.6341100117033727', '0.11610981872810608', '0.967124162144909', '0.16897224782815895', '2022-08-28 14:18:00', '2022-08-28 14:18:00'),
(32, '2022-07-19', '1', '1', '1', 'hgjg', '0', '0.6341100117033727', '0.11610981872810608', '0.967124162144909', '0.16897224782815895', '2022-08-28 14:18:30', '2022-08-28 14:18:30'),
(33, '2022-09-02', '1', '1', '1', 'Box2', '0', '0.6341100117033727', '0.11610981872810608', '0.967124162144909', '0.16897224782815895', '2022-08-28 14:18:30', '2022-08-28 14:18:30'),
(34, '2022-09-02', '1', '1', '1', 'box1', NULL, '0.016703917658294765', '0.005955948378040929', '0.15288861815834798', '0.3352745945283703', NULL, NULL),
(35, '2022-09-02', '1', '1', '1', 'box2', NULL, '0.1518246751856913', '0.11239516372814738', '0.6231514120725942', '0.20383287892823881', NULL, NULL),
(36, '2022-09-03', '1', '1', '1', 'box1', NULL, '0.016703917658294765', '0.005955948378040929', '0.15288861815834798', '0.3352745945283703', NULL, NULL),
(37, '2022-09-03', '1', '1', '1', 'box2', NULL, '0.1518246751856913', '0.11239516372814738', '0.6231514120725942', '0.20383287892823881', NULL, NULL),
(38, '2022-09-03', '1', '1', '1', 'fgdfg', '0', '0.5093095139983309', '0.04310252017807808', '0.6029364955921175', '0.08953573492812451', '2022-09-03 05:44:04', '2022-09-03 05:44:04'),
(39, '2022-09-03', '1', '1', '1', '75\\', '0', '0.8508352082211206', '0.1986895096282787', '0.9359506460336539', '0.21226229547829226', '2022-09-03 05:45:30', '2022-09-03 05:45:30'),
(40, '2022-09-03', '1', '1', '1', 'dfsfsd', '0', '0.39653155889672437', '0.21154793832829155', '0.448664764556901', '0.23012122422831013', '2022-09-03 05:46:05', '2022-09-03 05:46:05'),
(41, '2022-09-03', '1', '1', '1', 'dfsdf', '0', '0.6316629558538475', '0.11596694947815095', '0.9668049922406972', '0.16597194997820094', '2022-09-03 07:43:18', '2022-09-03 07:43:18'),
(42, '2022-09-03', '1', '1', '1', 'xcfbfgh', '0', '0.6518778723343241', '0.11525259777826277', '0.7157144506937241', '0.14454124092829207', '2022-09-03 09:11:42', '2022-09-03 09:11:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_15_064938_laratrust_setup_tables', 1),
(6, '2022_07_16_053739_create_audit_trails_table', 2),
(8, '2022_07_16_091927_create_newspaper_pages_table', 3),
(11, '2022_07_28_121641_create_map_areas_table', 4),
(12, '2022_08_02_094836_create_connections_table', 5),
(13, '2022_08_04_182328_create_advterisements_table', 6),
(19, '2022_08_05_104915_create_editions_table', 7),
(20, '2022_08_05_104926_create_newspapers_table', 7),
(21, '2022_08_05_060240_create_upload_p_d_f_s_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newspapers`
--

CREATE TABLE `newspapers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paperCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newspapers`
--

INSERT INTO `newspapers` (`id`, `paperCode`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AmarAsom', 'Amar Asom', '2022-08-05 05:36:47', '2022-08-05 05:36:47'),
(2, 'PurvanchalPrahari', 'Purvanchal Prahari', '2022-08-05 05:36:47', '2022-08-05 05:36:47'),
(3, 'TheMeghalayaGuardian', 'The Meghalaya Guardian', '2022-08-05 05:36:47', '2022-08-05 05:36:47'),
(4, 'TheNorthEastTimes', 'The NorthEast Times', '2022-08-05 05:36:47', '2022-08-05 05:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `newspaper_pages`
--

CREATE TABLE `newspaper_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paperId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishOn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageImageUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newspaper_pages`
--

INSERT INTO `newspaper_pages` (`id`, `date`, `paperId`, `edition`, `pageTitle`, `publishOn`, `pageNo`, `pageImageUrl`, `created_at`, `updated_at`) VALUES
(1, '2022-07-16', '1', '1', 'ee', '2022-08-05T05:00', '11', 'assets%2Fimg%2F1657968699.png', '2022-07-16 05:21:39', '2022-07-16 05:21:39'),
(2, '2022-07-16', '2', '2', 'sdsd', '2022-08-05T05:00', '2', 'assets%2Fimg%2F1657969461.jpg', '2022-07-16 05:34:21', '2022-07-16 05:34:21'),
(4, '2022-07-17', '1', '1', 'Page 1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1658073653.jpg', '2022-07-17 10:30:53', '2022-07-17 10:30:53'),
(9, '2022-07-18', '1', '1', '1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1658144024.jpg', '2022-07-18 06:03:44', '2022-07-18 06:03:44'),
(10, '2022-07-18', '1', '1', 'Page 2', '2022-08-05T05:00', '2', 'assets%2Fimg%2F1658160816.jpg', '2022-07-18 10:43:36', '2022-07-18 10:43:36'),
(11, '2022-07-19', '1', '1', 'Page 1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1658212491.jpg', '2022-07-19 01:04:51', '2022-07-19 01:04:51'),
(18, '2022-07-19', '1', '1', 'Page 2', '2022-08-05T05:00', '2', 'assets%2Fimg%2F1658664682.jpg', '2022-07-24 06:41:22', '2022-07-24 06:41:22'),
(20, '2022-07-24', '1', '1', 'Page 1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1658669936.jpg', '2022-07-24 08:08:56', '2022-07-24 08:08:56'),
(21, '2022-08-05', '1', '1', 'Page 1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1659624045.jpg', '2022-08-04 09:10:45', '2022-08-04 09:10:45'),
(22, '2022-08-04', '1', '1', 'Page 1', '2022-08-05T05:00', '1', 'assets%2Fimg%2F1659635378.jpg', '2022-08-04 12:19:38', '2022-08-04 12:19:38'),
(23, '2022-08-07', '1', '1', 'Page 1', '2022-08-07T05:00', '1', 'assets%2Fimg%2F1659774912.jpg', '2022-08-06 03:05:12', '2022-08-06 03:05:12'),
(24, '2022-08-22', '1', '1', 'Page 1', '2022-08-23T05:00', '1', 'assets%2Fimg%2F1661113562.jpg', '2022-08-21 14:56:02', '2022-08-21 14:56:02'),
(25, '2022-08-21', '1', '1', 'Page 1', '2022-08-23T05:00', '1', 'assets%2Fimg%2F1661113620.jpg', '2022-08-21 14:57:00', '2022-08-21 14:57:00'),
(26, '2022-09-03', '1', '1', 'Page 1', '2022-09-03T05:00', '1', 'assets%2Fimg%2F1662138322.jpg', '2022-09-02 11:35:22', '2022-09-02 11:35:22'),
(27, '2022-09-02', '1', '1', 'Page 1', '2022-09-03T05:00', '1', 'assets%2Fimg%2F1662138374.jpg', '2022-09-02 11:36:14', '2022-09-02 11:36:14'),
(28, '2022-09-03', '1', '1', 'Page 2', '2022-09-04T05:00', '2', 'assets%2Fimg%2F1662146928.jpg', '2022-09-02 13:58:48', '2022-09-02 13:58:48'),
(29, '2022-09-02', '1', '1', 'Page 2', '2022-09-04T05:00', '2', 'assets%2Fimg%2F1662146950.jpg', '2022-09-02 13:59:10', '2022-09-02 13:59:10');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2022-08-05 05:38:48', '2022-08-05 05:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(2, 'administrator', 'Administrator', 'Administrator', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(3, 'user', 'User', 'User', '2022-08-05 05:38:48', '2022-08-05 05:38:48'),
(4, 'role_name', 'Role Name', 'Role Name', '2022-08-05 05:38:48', '2022-08-05 05:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `upload_p_d_f_s`
--

CREATE TABLE `upload_p_d_f_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paperId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishOn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_p_d_f_s`
--

INSERT INTO `upload_p_d_f_s` (`id`, `date`, `paperId`, `edition`, `publishOn`, `fileUrl`, `created_at`, `updated_at`) VALUES
(9, '2022-08-06', '1', '1', '2022-08-06T05:00', 'assets/pdf/1659705304.pdf', '2022-08-05 07:45:04', '2022-08-05 07:45:04'),
(12, '2022-08-05', '1', '1', '2022-08-06T05:00', 'assets/pdf/AmarAsom_epaper_1659716647.pdf', '2022-08-05 10:54:07', '2022-08-05 10:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, 'Bhaskar Ranjan Bora', 'bhaskarranjan44@gmail.com', '2022-07-17 06:19:40', '$2y$10$Li9gy9ZShT8.R00ua46gW.RpOMXpQ53eCJY/tKcVIaNxc8He38Wh6', NULL, '2022-07-16 06:19:40', '2022-07-16 06:19:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advterisements`
--
ALTER TABLE `advterisements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advterisements_id_unique` (`id`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `audit_trails_id_unique` (`id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `connections_id_unique` (`id`);

--
-- Indexes for table `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `map_areas`
--
ALTER TABLE `map_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `map_areas_id_unique` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newspapers`
--
ALTER TABLE `newspapers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newspapers_id_unique` (`id`);

--
-- Indexes for table `newspaper_pages`
--
ALTER TABLE `newspaper_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newspaper_pages_id_unique` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `upload_p_d_f_s`
--
ALTER TABLE `upload_p_d_f_s`
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
-- AUTO_INCREMENT for table `advterisements`
--
ALTER TABLE `advterisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editions`
--
ALTER TABLE `editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_areas`
--
ALTER TABLE `map_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newspapers`
--
ALTER TABLE `newspapers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newspaper_pages`
--
ALTER TABLE `newspaper_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upload_p_d_f_s`
--
ALTER TABLE `upload_p_d_f_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
