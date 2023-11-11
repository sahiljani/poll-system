-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2023 at 04:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `image_url`, `unique_identifier`, `created_at`, `updated_at`, `views`) VALUES
(16, 'Senior Interactions Orchestrator', NULL, '654bfbf02dfe8', '2023-11-09 02:21:52', '2023-11-09 02:21:52', 0),
(17, 'Global Markets Coordinator', 'poll_images/1h4UVYjpoitX6jBqnrCaTjLmHJWMkQ0LdtOeuVDH.png', '654c06de9451d', '2023-11-09 03:08:30', '2023-11-09 03:08:30', 0),
(18, 'adssadsds?', 'poll_images/mrX1TGNLuK7T8jwSgtm6bu03K4d7xio2W6dHiNoA.png', '654c0bba779bf', '2023-11-09 03:29:14', '2023-11-09 03:29:14', 0),
(19, 'adsads', NULL, '654c0e1783c69', '2023-11-09 03:39:19', '2023-11-09 03:39:19', 0),
(20, 'adkbadb as dasdbbadasd adas?', NULL, '654c0f7b0841f', '2023-11-09 03:45:15', '2023-11-09 03:45:15', 0),
(21, 'adsads', NULL, '654c117ad8bc2', '2023-11-09 03:53:46', '2023-11-09 03:53:46', 0),
(24, 'Forward Division Agent', NULL, '654c325e427a2', '2023-11-09 06:14:06', '2023-11-09 06:14:06', 0),
(25, 'Lead Paradigm Planner', NULL, '654c3d9ae4223', '2023-11-09 07:02:02', '2023-11-09 07:02:02', 0),
(26, 'Lead Paradigm Planner', NULL, '654c3de740aac', '2023-11-09 07:03:19', '2023-11-09 07:03:19', 0),
(29, 'Future Optimization Producer', 'poll_images/jMxClDwRSJ63AipBXZakxD7VnhIGTCTW5JxQzBsj.png', '654db27b3cc2c', '2023-11-10 09:32:59', '2023-11-10 09:33:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `polls_unique_identifier_unique` (`unique_identifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
