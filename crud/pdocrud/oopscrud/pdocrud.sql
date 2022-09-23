-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2022 at 05:05 PM
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
-- Database: `pdocrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `hobbies` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `gender`, `city`, `address`, `hobbies`, `image`) VALUES
(7, 'jaaaaaaaaaaaaaaaaaa', '9714128363', 'yash52@g.com', 'male', 'mehsana', '-[o', 'reading', 'image_2022_09_08T12_31_37_514Z.png'),
(9, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'sdsd', 'reading,writing,websurfing', 'composer-setup.php'),
(10, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'asxAXD', 'reading', 'composer-setup.php'),
(11, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'dfsdf', 'reading,writing,websurfing', 'composer-setup.php'),
(12, 'yash', '9714128363', 'yash52@g.com', 'female', 'ahmedabad', 'vdsfsds', 'reading,writing,websurfing', 'composer-setup.php'),
(13, 'yash', '9714128363', 'yash52@g.com', 'male', 'surat', 'efefsefwe', 'reading,writing,websurfing', 'composer-setup.php'),
(14, 'yash', '9714128365', 'yash52@g.com', 'male', 'mehsana', 'xcdz', 'reading,writing,websurfing', 'composer-setup.php'),
(15, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'asedfasdfsa', 'reading', 'composer-setup.php'),
(16, 'yash', '9714128365', 'yash52@g.com', 'male', 'ahmedabad', ';hoi;o', 'reading,writing,websurfing', 'composer-setup.php'),
(17, 'jay', '9634234', 'jay@h.com', 'female', 'surat', 'jay', 'websurfing', 'composer-setup.php'),
(19, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'fgdzfgzdfg', 'reading', 'composer-setup.php'),
(20, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'wS', 'reading,writing', 'composer-setup.php'),
(23, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'ZAx', 'reading', 'composer-setup.php'),
(25, 'yash', '9898225900', 'yash52@g.com', 'male', 'ahmedabad', 'Wsdsad', 'reading', 'image_2022_09_08T12_31_37_514Z.png'),
(26, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'adsad', 'reading', 'composer-setup.php'),
(29, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'sdfdas', 'reading', 'composer-setup.php'),
(41, 'yash', '9714128363', 'yash52@g.com', 'male', 'mehsana', 'ssssssssss', 'reading,writing,websurfing', 'image_2022_09_08T12_31_37_514Z.png'),
(42, 'yash', '9714128363', 'yash52@g.com', 'male', 'mehsana', 'aaaaaaaaabbbbbbb', 'reading,writing,websurfing', 'image_2022_09_08T12_31_37_514Z.png'),
(43, 'yash', '9714128363', 'yash52@g.com', 'male', 'ahmedabad', 'yash', 'No hobbies selected', 'image_2022_09_08T12_31_37_514Z.png'),
(44, 'chirag', '1234567890', 'chirag@g.com', 'male', 'ahmedabad', 'chirag', 'reading,writing,websurfing', 'image_2022_09_08T12_31_37_514Z.png'),
(45, '', '9714128363', 'yash52@g.com', 'male', 'mehsana', 'qsaqsa', 'reading', 'virtual-host'),
(46, 'yash', '9714128363', 'yash52@g.com', 'male', 'mehsana', 'tgt', 'reading', 'image_2022_09_08T12_31_37_514Z.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
