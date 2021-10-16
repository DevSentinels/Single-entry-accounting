-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 03:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `business_name` text NOT NULL,
  `business_owner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`user_id`, `email`, `password`, `business_name`, `business_owner`) VALUES
(14, 'micacsnr@gmail.com', '$2y$10$0ClOzV34ePE6mEu96oyMUe62.V3gqBEdQ8mUHNYRYbwzC0JLTthWu', 'M Finds', 'Mica Ella M. Casiño'),
(15, 'dhory@gmail.com', '$2y$10$S8HaDljtZFYCt30n6ZHDHuE5sRCKzq/l64IdpMY3S2YYE6xHSfrLi', 'Mar\'s Paluto', 'Teodora Rocela'),
(16, 'rrocela@gmail.com', '$2y$10$Is00m90UTCtkOb17kgEu0eiSEVeL3JSciJn7VHpNXY.C6r1jke/ii', 'Renuel\\\'s Peanut Butter', 'Renuel Rocela'),
(17, 'rr@gmail.com', '$2y$10$GxBQUdxDpgZY4ppxQHc.juGPR1pjRXuVF4y1yoz5y86Ri1AJyfk9G', 'R\'s', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tblcashbookentry`
--

CREATE TABLE `tblcashbookentry` (
  `cbe_id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `inflows` int(255) NOT NULL,
  `outflows` int(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcashbookentry`
--

INSERT INTO `tblcashbookentry` (`cbe_id`, `business_name`, `date`, `description`, `inflows`, `outflows`, `balance`) VALUES
(1, 'M Finds', '2021-10-15', 'Beginning balance', 10000, 0, 10000),
(2, 'M Finds', '2021-10-18', 'Vehicle', 0, 5000, 5000),
(3, 'M Finds', '2021-10-18', 'Other Income', 15000, 0, 20000),
(4, 'M Finds', '2021-10-27', 'Utilities Expenses', 0, 10000, 10000),
(5, 'M Finds', '2021-10-26', 'Furniture', 0, 500, 9500),
(6, 'M Finds', '2021-11-02', 'Beginning balance', 100000, 0, 110000),
(7, 'R\'s', '2021-10-01', 'Beginning balance', 1000000, 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tblcashflow`
--

CREATE TABLE `tblcashflow` (
  `cf_id` int(50) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblincomestatement`
--

CREATE TABLE `tblincomestatement` (
  `is_id` int(50) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tblcashbookentry`
--
ALTER TABLE `tblcashbookentry`
  ADD PRIMARY KEY (`cbe_id`);

--
-- Indexes for table `tblcashflow`
--
ALTER TABLE `tblcashflow`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `tblincomestatement`
--
ALTER TABLE `tblincomestatement`
  ADD PRIMARY KEY (`is_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcashbookentry`
--
ALTER TABLE `tblcashbookentry`
  MODIFY `cbe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcashflow`
--
ALTER TABLE `tblcashflow`
  MODIFY `cf_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblincomestatement`
--
ALTER TABLE `tblincomestatement`
  MODIFY `is_id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
