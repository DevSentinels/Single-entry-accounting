-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 01:55 PM
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
(14, 'micacsnr@gmail.com', '$2y$10$0ClOzV34ePE6mEu96oyMUe62.V3gqBEdQ8mUHNYRYbwzC0JLTthWu', 'M Finds', 'Mica Ella C. Rocela'),
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
  `order_by` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `inflows` int(255) NOT NULL,
  `outflows` int(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcashbookentry`
--

INSERT INTO `tblcashbookentry` (`cbe_id`, `business_name`, `date`, `order_by`, `description`, `inflows`, `outflows`, `balance`) VALUES
(50, 'M Finds', '2021-10-01', 1, 'Beginning balance', 100000, 0, 100000),
(55, 'M Finds', '2021-10-02', 1, 'Other Income', 18000, 0, 268500),
(57, 'M Finds', '2021-10-01', 3, 'Other Income', 70000, 0, 170000),
(58, 'M Finds', '2021-10-02', 2, 'Investment', 0, 55000, 213500),
(59, 'M Finds', '2021-10-02', 3, 'Investment', 0, 25000, 188500),
(60, 'M Finds', '2021-10-01', 4, 'Salaries and Wages', 0, 20000, 150000),
(64, 'M Finds', '2021-10-01', 5, 'Furniture', 0, 2500, 147500),
(66, 'M Finds', '2021-10-01', 6, 'Sales', 100000, 0, 247500),
(68, 'M Finds', '2021-10-01', 7, 'Interest Income', 3000, 0, 250500),
(111, 'M Finds', '2021-10-05', 1, 'Sales', 1000, 0, 189500),
(118, 'M Finds', '2021-10-07', 2, 'Rent Expenses', 0, 50000, 139500);

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
  MODIFY `cbe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

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
