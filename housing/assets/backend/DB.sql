-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 09:33 AM
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
-- Database: `project2021_houseing`
--
CREATE DATABASE IF NOT EXISTS `project2021_houseing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project2021_houseing`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `bookedBy` varchar(255) NOT NULL,
  `phone` varchar(23) NOT NULL,
  `email` varchar(23) NOT NULL,
  `houseId` int(23) NOT NULL,
  `duration` varchar(23) NOT NULL,
  `statePay` int(1) NOT NULL DEFAULT 1,
  `crt_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookedBy`, `phone`, `email`, `houseId`, `duration`, `statePay`, `crt_at`) VALUES
(1, 'ebube roderick', '0909834384', 'ebuberoderick2@gmail.co', 1, '1', 1, '2022-02-09 09:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(244) NOT NULL,
  `houseType` int(34) NOT NULL,
  `price` varchar(233) NOT NULL,
  `location` varchar(221) NOT NULL DEFAULT 'Owerri',
  `statu` int(23) NOT NULL DEFAULT 0,
  `place` varchar(233) NOT NULL,
  `numberRoom` int(233) NOT NULL,
  `OwnedBy` varchar(34) NOT NULL,
  `ownPhone` varchar(123) NOT NULL,
  `cre_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `houseType`, `price`, `location`, `statu`, `place`, `numberRoom`, `OwnedBy`, `ownPhone`, `cre_at`) VALUES
(1, 5, '3456', 'Owerri', 0, 'loction', 56, 'BUBE', '0909834384', '2022-02-09 07:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `housetype`
--

CREATE TABLE `housetype` (
  `sn` int(223) NOT NULL,
  `name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housetype`
--

INSERT INTO `housetype` (`sn`, `name`) VALUES
(4, 'duplex'),
(5, 'apartment'),
(6, 'lodge'),
(8, 'flat');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(255) NOT NULL,
  `houseId` int(244) NOT NULL,
  `imgName` varchar(232) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `houseId`, `imgName`) VALUES
(1, 1, 'media/16443886125.jpg'),
(2, 1, 'media/16443886126.jpg'),
(3, 1, 'media/1644388612www.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(255) NOT NULL,
  `fullname` varchar(223) NOT NULL,
  `phone` varchar(34) NOT NULL,
  `addres` longtext NOT NULL,
  `report` longtext NOT NULL,
  `cret_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `fullname`, `phone`, `addres`, `report`, `cret_at`) VALUES
(1, 'dcfjkj', 'kjdfkj', 'kjskdfj', 'dfvnojn', '2022-02-02 08:55:28'),
(2, 'czvjkdjm', 'lksdlk', 'lkdlfklk', 'lkdlfkldf', '2022-02-02 14:34:21'),
(3, 'amdfkj', 'lkdlfkl', 'klsvksldk', 'lkdlfkl', '2022-02-02 14:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(255) NOT NULL,
  `firstName` varchar(23) NOT NULL,
  `surname` varchar(44) NOT NULL,
  `email` varchar(233) NOT NULL,
  `phone` varchar(23) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `firstName`, `surname`, `email`, `phone`, `pwd`) VALUES
(1, 'ebube', 'roderick', 'ebuberoderick2@gmail.com', '08130075358', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housetype`
--
ALTER TABLE `housetype`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `housetype`
--
ALTER TABLE `housetype`
  MODIFY `sn` int(223) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
