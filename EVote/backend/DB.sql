-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 11:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote`
--
CREATE DATABASE IF NOT EXISTS `evote` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evote`;

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `sn` int(225) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `position` varchar(99) NOT NULL,
  `level` varchar(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `yr` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posirtion`
--

CREATE TABLE `posirtion` (
  `sn` int(225) NOT NULL,
  `spotname` varchar(111) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posirtion`
--

INSERT INTO `posirtion` (`sn`, `spotname`, `time`) VALUES
(2, 'President', '2021-12-09 15:37:44'),
(3, 'Vice President', '2021-12-09 15:37:57'),
(6, 'Walfare', '2021-12-09 15:39:50'),
(7, 'Sports Dircetor', '2021-12-09 15:40:07'),
(8, 'Director Of Socials', '2021-12-09 15:40:27'),
(9, 'Publicity', '2021-12-09 15:40:42'),
(10, 'ICT Director', '2021-12-09 15:40:57'),
(12, 'Financial Secretary', '2021-12-09 15:43:36'),
(13, 'Assistant Financial Secretary', '2021-12-09 15:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `receiptlog`
--

CREATE TABLE `receiptlog` (
  `sn` int(255) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `receiptdate` int(11) NOT NULL,
  `receiptNumber` int(11) NOT NULL,
  `times` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiptlog`
--

INSERT INTO `receiptlog` (`sn`, `fullname`, `receiptdate`, `receiptNumber`, `times`) VALUES
(1, 'emma peter', 2021, 416, '2021-12-09 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `receiptlog2`
--

CREATE TABLE `receiptlog2` (
  `sn` int(225) NOT NULL,
  `userid` int(225) NOT NULL,
  `receiptnumber` varchar(111) NOT NULL,
  `sessio` varchar(12) NOT NULL,
  `yr` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiptlog2`
--

INSERT INTO `receiptlog2` (`sn`, `userid`, `receiptnumber`, `sessio`, `yr`) VALUES
(1, 4, '0416', '2020 / 2021', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `dept` varchar(99) NOT NULL,
  `level` varchar(222) NOT NULL,
  `profileImg` varchar(99) NOT NULL DEFAULT '3.jpeg',
  `usertype` int(2) NOT NULL DEFAULT 0,
  `email` varchar(99) NOT NULL,
  `phone` varchar(99) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `reg`, `dept`, `level`, `profileImg`, `usertype`, `email`, `phone`, `pwd`, `time`) VALUES
(1, 'Ijeoma', 'Emeaji', '19e/0231/cs', 'computer science', 'HOD', '3.jpeg', 1, 'ebuberoderick2@gmail.com', '08130075358', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 14:58:00'),
(2, 'glory', 'ugonna', '18e/0230/cs', 'computer science', 'ND 2', '3.jpeg', 0, 'onye@gmail', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:16:02'),
(3, 'favor', 'chimaka', '19e/0222/cs', 'computer science', 'HND 1', '3.jpeg', 3, 'favour@gmail.com', '09032708150', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:17:53'),
(4, 'emma', 'peter', '19e/0023/cs', 'computer science', 'HND 1', '3.jpeg', 4, 'emma@gmail.com', '070657678976', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:19:22'),
(5, 'noble', 'emma', '18e/0001/cs', 'computer science', 'HOD Secretary', '3.jpeg', 2, 'noble@gmail.com', '909032708150', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:21:09'),
(6, 'ugochi', 'favour', '19e/0412/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'ugo@gmail.com', '08107124093', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:23:42'),
(7, 'chioma', 'emma', '19e/0032/cs', 'computer science', 'HND 1', '3.jpeg', 3, 'chioma@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:24:58'),
(8, 'justine', 'ebube', '19e/0453/cs', 'computer science', 'ND 1', '3.jpeg', 0, 'justine@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:26:32'),
(9, 'goodness', 'ngozie', '19e/0035/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'good@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:27:40'),
(10, 'justice', 'N', '19e/0452/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'justice@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:29:01'),
(11, 'victor', 'chima', '19e/0341/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'victor@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:33:54'),
(12, 'wendy', 'chi', '19e/0378/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'chi@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '2021-11-15 15:34:54'),
(13, 'glory', 'mercy', '18e/0064/cs', 'computer science', 'ND 2', '3.jpeg', 0, 'glory@gmail.com', '', '5060394018b0f50f18d608935d9655b1', '2021-11-15 15:36:46'),
(14, 'ugonna', 'emma', '19e/0001/cs', 'computer science', 'HND 1', '3.jpeg', 0, 'emma@gmail.com', '', 'ca98e060a1a6220b11abe44ead94e7fb', '2021-11-15 15:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `voteorder`
--

CREATE TABLE `voteorder` (
  `sn` int(12) NOT NULL,
  `userId` int(222) NOT NULL,
  `position` int(221) NOT NULL,
  `yr` year(4) NOT NULL DEFAULT current_timestamp(),
  `votes` int(221) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `votep`
--

CREATE TABLE `votep` (
  `sn` int(11) NOT NULL,
  `timeerh` int(4) NOT NULL,
  `timeerm` int(4) NOT NULL DEFAULT 0,
  `timeers` int(4) NOT NULL DEFAULT 0,
  `timeState` int(2) NOT NULL DEFAULT 0,
  `yr` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votep`
--

INSERT INTO `votep` (`sn`, `timeerh`, `timeerm`, `timeers`, `timeState`, `yr`) VALUES
(1, 60, 0, 0, 2, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `sn` int(255) NOT NULL,
  `votefor` int(11) NOT NULL,
  `voter` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `yr` year(4) NOT NULL DEFAULT current_timestamp(),
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `posirtion`
--
ALTER TABLE `posirtion`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `receiptlog`
--
ALTER TABLE `receiptlog`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `receiptlog2`
--
ALTER TABLE `receiptlog2`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voteorder`
--
ALTER TABLE `voteorder`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `votep`
--
ALTER TABLE `votep`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `sn` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posirtion`
--
ALTER TABLE `posirtion`
  MODIFY `sn` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receiptlog`
--
ALTER TABLE `receiptlog`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receiptlog2`
--
ALTER TABLE `receiptlog2`
  MODIFY `sn` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voteorder`
--
ALTER TABLE `voteorder`
  MODIFY `sn` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votep`
--
ALTER TABLE `votep`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
