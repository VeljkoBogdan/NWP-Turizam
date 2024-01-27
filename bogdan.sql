-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 10:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogdan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id_city` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `population` int(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `timezone` varchar(32) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `latitude` varchar(32) NOT NULL,
  `longitude` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sights`
--

CREATE TABLE `sights` (
  `id_sight` int(32) NOT NULL,
  `id_city` int(32) NOT NULL,
  `id_agency` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hours` varchar(32) NOT NULL,
  `fee` varchar(32) NOT NULL DEFAULT 'No fee',
  `image` int(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Unkown / Contact for more info',
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `times_searched` int(255) NOT NULL DEFAULT 0,
  `times_clicked` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_banned` int(32) NOT NULL DEFAULT 0,
  `verification_id` varchar(255) NOT NULL,
  `verification_status` varchar(255) NOT NULL DEFAULT '0',
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `is_banned`, `verification_id`, `verification_status`, `id_user`) VALUES
('veljko', 'bogdan', 'veljko@mail.com', '$2y$10$EL2meKioWEeHTUVWsIuRS.NIYPI5P6AI2F.8AURGEvK9swWcBgiZO', 0, 'ac1ba21be45a66f6d610166384aee97f', '0', 1),
('veljko', 'bogdan', 'action@dr.com', '$2y$10$LGb6t8OxP5M8V6nBG3jfHufOS9BsC79NG5ohXzNv6eD5/.Yfw05a2', 0, '33462ba19bc86f65c88dd323badf7674', '1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `sights`
--
ALTER TABLE `sights`
  ADD PRIMARY KEY (`id_sight`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sights`
--
ALTER TABLE `sights`
  MODIFY `id_sight` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
