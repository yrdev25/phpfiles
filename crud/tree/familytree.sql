-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2022 at 05:01 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familytree`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int NOT NULL,
  `pid` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `pid`, `name`) VALUES
(1, 1, 'Kashyapbhai'),
(2, 1, 'Bhargavbhai'),
(3, 2, 'Harshilbhai'),
(4, 3, 'Jeetbhai'),
(5, 4, 'yash');

-- --------------------------------------------------------

--
-- Table structure for table `grandparent_tab`
--

CREATE TABLE `grandparent_tab` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grandparent_tab`
--

INSERT INTO `grandparent_tab` (`id`, `name`) VALUES
(1, 'Maneklal'),
(2, 'Jayantilal');

-- --------------------------------------------------------

--
-- Table structure for table `parent_tab`
--

CREATE TABLE `parent_tab` (
  `id` int NOT NULL,
  `gpid` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parent_tab`
--

INSERT INTO `parent_tab` (`id`, `gpid`, `name`) VALUES
(1, 1, 'Bharatbhai'),
(2, 1, 'Chandrakantbhai'),
(3, 1, 'Lalitbhai'),
(4, 1, 'Prafulbhai'),
(5, 2, 'Atulbhai'),
(6, 2, 'Kamalbhai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grandparent_tab`
--
ALTER TABLE `grandparent_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_tab`
--
ALTER TABLE `parent_tab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grandparent_tab`
--
ALTER TABLE `grandparent_tab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_tab`
--
ALTER TABLE `parent_tab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
