-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 06:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `size_Mb` int(11) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `download` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `user_id`, `size_Mb`, `uploaded_on`, `download`) VALUES
(1, 'trungtam.mp3', 1, 3, '2021-06-12 23:31:18', '../user_files/admin/uploaded/trungtam.mp3'),
(2, 'trungtam.mp3', 2, 3, '2021-06-15 13:11:16', '../user_files/admin1/uploaded/trungtam.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `processed_folders`
--

CREATE TABLE `processed_folders` (
  `id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `parent_file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stem_option` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processed_folders`
--

INSERT INTO `processed_folders` (`id`, `folder_name`, `parent_file_id`, `user_id`, `stem_option`, `uploaded_on`, `download`) VALUES
(1, 'trungtam', 1, 1, '2stems', '2021-06-13 19:24:33', '../user_files/admin/separate/2stems/trungtam'),
(2, 'trungtam', 1, 1, '4stems', '2021-06-13 19:43:01', '../user_files/admin/separate/4stems/trungtam'),
(3, 'trungtam', 1, 2, '5stems', '2021-06-15 13:06:23', '../user_files/admin1/separate/5stems/trungtam'),
(4, 'trungtam', 1, 2, '2stems', '2021-06-15 13:09:00', '../user_files/admin1/separate/2stems/trungtam'),
(5, 'trungtam', 1, 2, '4stems', '2021-06-15 13:18:05', '../user_files/admin1/separate/4stems/trungtam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin1', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processed_folders`
--
ALTER TABLE `processed_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processed_folders`
--
ALTER TABLE `processed_folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
