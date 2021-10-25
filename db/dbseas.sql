-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 04:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
(17, 'rr@gmail.com', '$2y$10$GxBQUdxDpgZY4ppxQHc.juGPR1pjRXuVF4y1yoz5y86Ri1AJyfk9G', 'R\'s', 'R'),
(18, 'rralph@gmail.com', '$2y$10$QF4T7Z91YKEAGU.oEGy6s.n2J1iSZUViVjY7SCiK7zNmpgTEpLLjO', 'gaghooo', 'ralph ralph'),
(19, 'rap@gmail.com', '$2y$10$.t4UXLLHPkMnNe20Py1oLe7AqodreteSZB018iZzBEFiVQtaI2eta', 'ralph', 'ralph');

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
(118, 'M Finds', '2021-10-07', 2, 'Rent Expenses', 0, 50000, 139500),
(119, 'ralph', '2021-01-01', 1, 'Investment', 390000, 0, 390000),
(120, 'ralph', '2021-01-02', 1, 'Equipment', 0, 20000, 370000),
(121, 'ralph', '2021-01-03', 1, 'Supplies Expenses', 0, 1400, 368600),
(122, 'ralph', '2021-01-08', 1, 'Selling and distribution Expenses', 0, 200, 368400),
(123, 'ralph', '2021-01-10', 1, 'Inventory Purchases', 0, 152880, 215520),
(124, 'ralph', '2021-01-11', 1, 'Sales', 148960, 0, 364480),
(125, 'ralph', '2021-01-17', 1, 'Inventory Purchases', 0, 7000, 357480),
(126, 'ralph', '2021-01-20', 1, 'Inventory Purchases', 0, 123000, 234480),
(127, 'ralph', '2021-01-21', 1, 'Inventory Purchases', 0, 18000, 216480),
(128, 'ralph', '2021-01-23', 1, 'Other uses of cash', 0, 20080, 196400),
(129, 'ralph', '2021-01-26', 1, 'Other Expenses', 0, 1800, 194600),
(130, 'ralph', '2021-01-27', 1, 'Sales', 159000, 0, 353600),
(131, 'ralph', '2021-01-28', 1, 'Other Income', 152000, 0, 505600),
(132, 'ralph', '2021-01-29', 1, 'Miscellaneous Expenses', 0, 15000, 490600),
(133, 'ralph', '2021-01-30', 1, 'Interest Income', 3000, 0, 493600),
(135, 'ralph', '2021-01-31', 1, 'Interest Expenses', 0, 3000, 490600),
(136, 'ralph', '2021-01-31', 2, 'Administrative Expenses', 0, 24000, 466600),
(137, 'ralph', '2021-01-31', 3, 'Furniture', 0, 7000, 459600),
(138, 'ralph', '2021-01-31', 4, 'Vehicle', 0, 150000, 309600),
(139, 'ralph', '2021-02-01', 1, 'Beginning balance', 309600, 0, 309600),
(140, 'ralph', '2021-02-03', 1, 'Equipment', 0, 20000, 289600),
(141, 'ralph', '2021-02-06', 1, 'Supplies Expenses', 0, 1400, 288200),
(144, 'ralph', '2021-02-08', 1, 'Selling and distribution Expenses', 0, 200, 288000),
(145, 'ralph', '2021-02-10', 1, 'Inventory Purchases', 0, 152880, 135120),
(146, 'ralph', '2021-02-11', 1, 'Sales', 148960, 0, 284080),
(148, 'ralph', '2021-02-14', 1, 'Inventory Purchases', 0, 144000, 140080),
(149, 'ralph', '2021-02-15', 1, 'Salaries and Wages', 0, 15000, 125080),
(150, 'ralph', '2021-02-16', 1, 'Bank Financing Short Term', 24000, 0, 149080),
(151, 'ralph', '2021-02-16', 2, 'Other source of cash', 5000, 0, 154080),
(152, 'ralph', '2021-02-17', 1, 'Inventory Purchases', 0, 7000, 147080),
(153, 'ralph', '2021-02-19', 1, 'Inventory Purchases', 0, 123000, 24080),
(154, 'ralph', '2021-02-25', 1, 'Sales', 159000, 0, 311000),
(155, 'ralph', '2021-02-24', 1, 'Service Home', 152000, 0, 152000),
(157, 'ralph', '2021-02-26', 1, 'Loan Payments - Short term', 0, 24000, 287000),
(158, 'ralph', '2021-02-27', 1, 'Loan Payments - Long term', 137000, 0, 424000),
(159, 'ralph', '2021-02-27', 2, 'Other Income', 15000, 0, 439000),
(160, 'ralph', '2021-02-28', 1, 'Equipment', 0, 150000, 289000),
(161, 'ralph', '2021-03-01', 1, 'Beginning balance', 289000, 0, 289000),
(162, 'ralph', '2021-03-03', 1, 'Equipment', 0, 20000, 269000),
(163, 'ralph', '2021-03-06', 1, 'Supplies Expenses', 0, 1400, 267600),
(164, 'ralph', '2021-03-08', 1, 'Selling and distribution Expenses', 0, 200, 267400),
(165, 'ralph', '2021-03-10', 1, 'Inventory Purchases', 0, 152880, 114520),
(166, 'ralph', '2021-03-11', 1, 'Sales', 148960, 0, 263480),
(167, 'ralph', '2021-03-14', 1, 'Inventory Purchases', 0, 144000, 119480),
(168, 'ralph', '2021-03-15', 1, 'Salaries and Wages', 0, 15000, 104480),
(169, 'ralph', '2021-03-16', 1, 'Bank Financing Short Term', 24000, 0, 128480),
(170, 'ralph', '2021-03-16', 2, 'Other source of cash', 5000, 0, 133480),
(171, 'ralph', '2021-03-17', 1, 'Inventory Purchases', 0, 7000, 126480),
(172, 'ralph', '2021-03-19', 1, 'Inventory Purchases', 0, 123000, 3480),
(176, 'ralph', '2021-03-22', 1, 'Sales', 159000, 0, 162480),
(178, 'ralph', '2021-03-27', 1, 'Other source of cash', 3000, 0, 165480),
(180, 'ralph', '2021-03-29', 1, 'Bank Financing Long Term', 137000, 0, 302480),
(181, 'ralph', '2021-03-29', 2, 'Insurance Expenses', 0, 15000, 287480),
(182, 'ralph', '2021-03-30', 1, 'Loan Payments - Long term', 0, 137000, 153480),
(183, 'ralph', '2021-03-29', 3, 'Interest Income', 3000, 0, 290480),
(184, 'ralph', '2021-03-31', 1, 'Administrative Expenses', 0, 24000, 129480),
(186, 'ralph', '2021-04-01', 1, 'Beginning balance', 129480, 0, 129480),
(188, 'ralph', '2021-04-02', 1, 'Investment', 100000, 0, 229480),
(189, 'ralph', '2021-04-03', 1, 'Equipment', 0, 20000, 209480),
(192, 'ralph', '2021-04-06', 1, 'Supplies Expenses', 0, 1400, 208080),
(193, 'ralph', '2021-04-08', 1, 'Selling and distribution Expenses', 0, 200, 207880),
(194, 'ralph', '2021-04-10', 1, 'Inventory Purchases', 0, 152880, 55000),
(195, 'ralph', '2021-04-11', 1, 'Sales', 148960, 0, 203960),
(196, 'ralph', '2021-04-15', 1, 'Inventory Purchases', 0, 144000, 59960),
(197, 'ralph', '2021-04-15', 2, 'Salaries and Wages', 0, 15000, 44960),
(201, 'ralph', '2021-04-17', 1, 'Inventory Purchases', 0, 7000, 37960),
(202, 'ralph', '2021-04-20', 1, 'Inventory Purchases', 0, 18000, 19960),
(203, 'ralph', '2021-04-23', 1, 'Marketing Expenses', 0, 2000, 17960),
(204, 'ralph', '2021-04-23', 2, 'Utilities Expenses', 0, 800, 17160),
(205, 'ralph', '2021-04-23', 3, 'Salaries and Wages', 0, 3000, 14160),
(207, 'ralph', '2021-04-23', 4, 'Sales', 159000, 0, 173160),
(208, 'ralph', '2021-04-26', 1, 'Service Home', 152000, 0, 325160),
(210, 'ralph', '2021-04-26', 2, 'Other source of cash', 5000, 0, 330160),
(211, 'ralph', '2021-04-27', 1, 'Loan Payments - Short term', 0, 24000, 306160),
(212, 'ralph', '2021-04-28', 1, 'Bank Financing Long Term', 137000, 0, 443160),
(213, 'ralph', '2021-04-28', 2, 'Other Income', 15000, 0, 458160),
(214, 'ralph', '2021-04-29', 1, 'Insurance Expenses', 0, 15000, 443160),
(215, 'ralph', '2021-04-29', 2, 'Loan Payments - Long term', 0, 150000, 293160),
(216, 'ralph', '2021-04-30', 1, 'Miscellaneous Expenses', 0, 15000, 278160),
(217, 'ralph', '2021-04-30', 2, 'Administrative Expenses', 0, 24000, 254160),
(222, 'ralph', '2021-05-01', 1, 'Beginning balance', 254160, 0, 254160),
(225, 'ralph', '2021-05-03', 1, 'Equipment', 0, 20000, 234160),
(226, 'ralph', '2021-05-06', 1, 'Supplies Expenses', 0, 1400, 232760),
(227, 'ralph', '2021-05-08', 1, 'Selling and distribution Expenses', 0, 200, 232560),
(228, 'ralph', '2021-05-10', 1, 'Inventory Purchases', 0, 100000, 132560),
(229, 'ralph', '2021-05-11', 1, 'Sales', 148960, 0, 281520),
(230, 'ralph', '2021-05-14', 1, 'Inventory Purchases', 0, 144000, 137520),
(233, 'ralph', '2021-05-15', 1, 'Salaries and Wages', 0, 15000, 122520),
(235, 'ralph', '2021-05-16', 1, 'Bank Financing Short Term', 24000, 0, 146520),
(236, 'ralph', '2021-05-16', 2, 'Other source of cash', 5000, 0, 151520),
(237, 'ralph', '2021-05-17', 1, 'Inventory Purchases', 0, 7000, 144520),
(238, 'ralph', '2021-05-19', 1, 'Inventory Purchases', 0, 18000, 126520),
(239, 'ralph', '2021-05-22', 1, 'Other Expenses', 0, 1800, 124720),
(240, 'ralph', '2021-05-23', 1, 'Marketing Expenses', 0, 2000, 122720),
(241, 'ralph', '2021-05-23', 2, 'Utilities Expenses', 0, 800, 121920),
(242, 'ralph', '2021-05-24', 1, 'Rent Expenses', 0, 7000, 114920),
(243, 'ralph', '2021-05-25', 1, 'Salaries and Wages', 0, 3000, 111920),
(244, 'ralph', '2021-05-25', 2, 'Sales', 120000, 0, 231920),
(245, 'ralph', '2021-05-26', 1, 'Service Home', 130000, 0, 361920),
(246, 'ralph', '2021-05-26', 2, 'Other Income', 3000, 0, 364920),
(247, 'ralph', '2021-05-27', 1, 'Loan Payments - Short term', 0, 24000, 340920),
(248, 'ralph', '2021-05-28', 1, 'Bank Financing Long Term', 100000, 0, 440920),
(249, 'ralph', '2021-05-28', 2, 'Other Income', 15000, 0, 455920),
(250, 'ralph', '2021-05-29', 1, 'Insurance Expenses', 0, 15000, 440920),
(251, 'ralph', '2021-05-29', 2, 'Loan Payments - Long term', 0, 137000, 303920),
(252, 'ralph', '2021-05-30', 1, 'Miscellaneous Expenses', 0, 15000, 288920),
(253, 'ralph', '2021-05-30', 2, 'Interest Income', 2000, 0, 290920),
(254, 'ralph', '2021-05-30', 3, 'Interest Expenses', 0, 3000, 287920),
(255, 'ralph', '2021-05-31', 1, 'Administrative Expenses', 0, 24000, 263920),
(256, 'ralph', '2021-05-31', 2, 'Furniture', 0, 7000, 256920),
(257, 'ralph', '2021-05-31', 3, 'Vehicle', 0, 100000, 156920),
(258, 'ralph', '2021-06-01', 1, 'Beginning balance', 156920, 0, 156920),
(259, 'ralph', '2021-06-03', 1, 'Equipment', 0, 20000, 136920),
(260, 'ralph', '2021-06-06', 1, 'Supplies Expenses', 0, 1400, 135520),
(261, 'ralph', '2021-06-08', 1, 'Selling and distribution Expenses', 0, 200, 135320),
(262, 'ralph', '2021-06-10', 1, 'Inventory Purchases', 0, 30000, 105320),
(264, 'ralph', '2021-06-11', 1, 'Sales', 200000, 0, 305320),
(265, 'ralph', '2021-06-14', 1, 'Inventory Purchases', 0, 50000, 255320),
(266, 'ralph', '2021-06-15', 1, 'Salaries and Wages', 0, 15000, 240320),
(267, 'ralph', '2021-06-16', 1, 'Bank Financing Short Term', 24000, 0, 264320),
(268, 'ralph', '2021-06-16', 2, 'Other source of cash', 5000, 0, 269320),
(269, 'ralph', '2021-06-17', 1, 'Inventory Purchases', 0, 7000, 262320),
(270, 'ralph', '2021-06-19', 1, 'Inventory Purchases', 0, 18000, 244320),
(271, 'ralph', '2021-06-21', 1, 'Other uses of cash', 0, 20000, 224320),
(272, 'ralph', '2021-06-22', 1, 'Other Expenses', 0, 1860, 222460),
(273, 'ralph', '2021-06-23', 1, 'Marketing Expenses', 0, 3000, 219460),
(274, 'ralph', '2021-06-23', 2, 'Utilities Expenses', 0, 1230, 218230),
(275, 'ralph', '2021-06-24', 1, 'Rent Expenses', 0, 7000, 211230),
(276, 'ralph', '2021-06-25', 1, 'Salaries and Wages', 0, 3000, 208230),
(277, 'ralph', '2021-06-25', 2, 'Sales', 149623, 0, 357853),
(278, 'ralph', '2021-06-27', 1, 'Loan Payments - Short term', 0, 65000, 292853),
(279, 'ralph', '2021-06-28', 1, 'Bank Financing Long Term', 135952, 0, 428805),
(280, 'ralph', '2021-06-28', 2, 'Other Income', 20000, 0, 448805),
(281, 'ralph', '2021-06-28', 3, 'Insurance Expenses', 0, 15000, 433805),
(282, 'ralph', '2021-06-30', 1, 'Loan Payments - Long term', 0, 100000, 333805),
(283, 'ralph', '2021-06-30', 2, 'Furniture', 0, 5000, 328805),
(284, 'ralph', '2021-07-01', 1, 'Beginning balance', 328805, 0, 328805),
(285, 'ralph', '2021-07-03', 1, 'Vehicle', 0, 100000, 228805),
(286, 'ralph', '2021-07-06', 1, 'Supplies Expenses', 0, 2400, 226405),
(287, 'ralph', '2021-07-08', 1, 'Selling and distribution Expenses', 0, 200, 226205),
(288, 'ralph', '2021-07-10', 1, 'Inventory Purchases', 0, 60000, 166205),
(289, 'ralph', '2021-07-11', 1, 'Sales', 110000, 0, 276205),
(290, 'ralph', '2021-07-14', 1, 'Inventory Purchases', 0, 40000, 236205),
(291, 'ralph', '2021-07-15', 1, 'Salaries and Wages', 0, 15000, 221205),
(292, 'ralph', '2021-07-16', 1, 'Bank Financing Short Term', 24000, 0, 245205),
(293, 'ralph', '2021-07-16', 2, 'Other source of cash', 5000, 0, 250205),
(294, 'ralph', '2021-07-17', 1, 'Inventory Purchases', 0, 7000, 243205),
(295, 'ralph', '2021-07-19', 1, 'Inventory Purchases', 0, 65000, 178205),
(296, 'ralph', '2021-07-20', 1, 'Inventory Purchases', 0, 18000, 160205),
(297, 'ralph', '2021-07-21', 1, 'Other uses of cash', 0, 20000, 140205),
(298, 'ralph', '2021-07-22', 1, 'Other Expenses', 0, 1900, 138305),
(299, 'ralph', '2021-07-23', 1, 'Marketing Expenses', 0, 2000, 136305),
(300, 'ralph', '2021-07-23', 2, 'Utilities Expenses', 0, 800, 135505),
(301, 'ralph', '2021-07-24', 1, 'Rent Expenses', 0, 7000, 128505),
(302, 'ralph', '2021-07-25', 1, 'Salaries and Wages', 0, 3000, 125505),
(303, 'ralph', '2021-07-25', 2, 'Sales', 159000, 0, 284505),
(304, 'ralph', '2021-07-26', 1, 'Service Home', 152000, 0, 436505),
(305, 'ralph', '2021-07-26', 2, 'Other source of cash', 3000, 0, 439505),
(306, 'ralph', '2021-07-27', 1, 'Loan Payments - Short term', 0, 24000, 415505),
(307, 'ralph', '2021-07-28', 1, 'Bank Financing Long Term', 137000, 0, 552505),
(308, 'ralph', '2021-07-29', 1, 'Insurance Expenses', 0, 15000, 537505),
(309, 'ralph', '2021-07-30', 1, 'Loan Payments - Long term', 0, 137000, 400505),
(310, 'ralph', '2021-07-31', 1, 'Interest Expenses', 0, 15000, 385505),
(311, 'ralph', '2021-08-01', 1, 'Beginning balance', 385505, 0, 385505),
(319, 'ralph', '2021-08-03', 1, 'Equipment', 0, 20000, 365505),
(320, 'ralph', '2021-08-06', 1, 'Supplies Expenses', 0, 1400, 364105),
(321, 'ralph', '2021-08-08', 1, 'Selling and distribution Expenses', 0, 200, 363905),
(322, 'ralph', '2021-08-10', 1, 'Inventory Purchases', 0, 152880, 211025),
(323, 'ralph', '2021-08-11', 1, 'Sales', 148906, 0, 359931),
(324, 'ralph', '2021-08-14', 1, 'Inventory Purchases', 0, 144000, 215931),
(325, 'ralph', '2021-08-15', 1, 'Salaries and Wages', 0, 15000, 200931),
(326, 'ralph', '2021-08-16', 1, 'Bank Financing Short Term', 24000, 0, 224931),
(327, 'ralph', '2021-08-16', 2, 'Other source of cash', 5000, 0, 229931),
(328, 'ralph', '2021-08-17', 1, 'Inventory Purchases', 0, 7000, 222931),
(329, 'ralph', '2021-08-19', 1, 'Inventory Purchases', 0, 12300, 210631),
(330, 'ralph', '2021-08-20', 1, 'Inventory Purchases', 0, 18000, 192631),
(331, 'ralph', '2021-08-21', 1, 'Other uses of cash', 0, 20000, 172631),
(332, 'ralph', '2021-08-22', 1, 'Other Expenses', 0, 1800, 170831),
(333, 'ralph', '2021-08-23', 1, 'Marketing Expenses', 2000, 0, 172831),
(334, 'ralph', '2021-08-23', 2, 'Utilities Expenses', 0, 5800, 167031),
(335, 'ralph', '2021-08-24', 1, 'Rent Expenses', 0, 7000, 160031),
(336, 'ralph', '2021-08-25', 1, 'Salaries and Wages', 0, 3000, 157031),
(337, 'ralph', '2021-08-25', 2, 'Sales', 159000, 0, 316031),
(338, 'ralph', '2021-08-26', 1, 'Service Home', 152000, 0, 468031),
(339, 'ralph', '2021-08-26', 2, 'Other Income', 5000, 0, 473031),
(340, 'ralph', '2021-08-27', 1, 'Loan Payments - Short term', 0, 9000, 464031),
(341, 'ralph', '2021-08-28', 1, 'Bank Financing Long Term', 137000, 0, 601031),
(342, 'ralph', '2021-08-28', 2, 'Other Income', 15000, 0, 616031),
(343, 'ralph', '2021-08-29', 1, 'Insurance Expenses', 0, 15000, 601031),
(344, 'ralph', '2021-08-29', 2, 'Loan Payments - Long term', 0, 137000, 464031),
(345, 'ralph', '2021-08-30', 1, 'Miscellaneous Expenses', 0, 15000, 449031),
(346, 'ralph', '2021-08-31', 1, 'Interest Expenses', 0, 3000, 446031),
(347, 'ralph', '2021-09-01', 1, 'Beginning balance', 446031, 0, 446031),
(352, 'ralph', '2021-09-03', 1, 'Equipment', 0, 20000, 426031),
(353, 'ralph', '2021-09-06', 1, 'Supplies Expenses', 0, 1400, 424631),
(354, 'ralph', '2021-09-08', 1, 'Selling and distribution Expenses', 0, 2000, 422631),
(355, 'ralph', '2021-09-10', 1, 'Inventory Purchases', 0, 152000, 270631),
(356, 'ralph', '2021-09-11', 1, 'Sales', 100000, 0, 370631),
(357, 'ralph', '2021-09-14', 1, 'Inventory Purchases', 0, 140000, 230631),
(358, 'ralph', '2021-09-15', 1, 'Salaries and Wages', 0, 15000, 215631),
(359, 'ralph', '2021-09-16', 1, 'Bank Financing Short Term', 24000, 0, 239631),
(360, 'ralph', '2021-09-16', 2, 'Other source of cash', 5000, 0, 244631),
(361, 'ralph', '2021-09-17', 1, 'Inventory Purchases', 0, 7000, 234631),
(362, 'ralph', '2021-09-19', 1, 'Inventory Purchases', 0, 123000, 111631),
(363, 'ralph', '2021-09-20', 1, 'Inventory Purchases', 0, 18000, 93631),
(364, 'ralph', '2021-09-21', 1, 'Other uses of cash', 0, 20200, 73431),
(365, 'ralph', '2021-09-22', 1, 'Other Expenses', 0, 1800, 71631),
(366, 'ralph', '2021-09-23', 1, 'Marketing Expenses', 0, 2000, 69631),
(367, 'ralph', '2021-09-16', 3, 'Utilities Expenses', 0, 3000, 241631),
(368, 'ralph', '2021-09-24', 1, 'Rent Expenses', 0, 7000, 62631),
(369, 'ralph', '2021-09-25', 1, 'Salaries and Wages', 0, 7000, 55631),
(370, 'ralph', '2021-09-25', 2, 'Sales', 159000, 0, 214631),
(371, 'ralph', '2021-09-26', 1, 'Service Home', 152000, 0, 366631),
(372, 'ralph', '2021-09-26', 2, 'Other Income', 3000, 0, 369631),
(373, 'ralph', '2021-09-27', 1, 'Loan Payments - Long term', 0, 24000, 345631),
(374, 'ralph', '2021-09-28', 1, 'Bank Financing Long Term', 123000, 0, 468631),
(375, 'ralph', '2021-09-28', 2, 'Other Income', 15000, 0, 483631),
(376, 'ralph', '2021-09-29', 1, 'Insurance Expenses', 15000, 0, 498631),
(377, 'ralph', '2021-09-29', 2, 'Loan Payments - Long term', 0, 123000, 375631),
(378, 'ralph', '2021-09-30', 1, 'Miscellaneous Expenses', 0, 15000, 360631),
(379, 'ralph', '2021-09-30', 2, 'Administrative Expenses', 0, 24000, 336631),
(380, 'ralph', '2021-09-30', 3, 'Furniture', 0, 15000, 321631),
(381, 'ralph', '2021-10-01', 1, 'Beginning balance', 321631, 0, 321631),
(382, 'ralph', '2021-10-03', 1, 'Equipment', 0, 25000, 296631),
(383, 'ralph', '2021-10-06', 1, 'Supplies Expenses', 0, 1400, 295231),
(384, 'ralph', '2021-10-08', 1, 'Selling and distribution Expenses', 0, 800, 293031),
(385, 'ralph', '2021-10-10', 1, 'Inventory Purchases', 0, 152880, 140151),
(386, 'ralph', '2021-10-11', 1, 'Sales', 124000, 0, 204151),
(387, 'ralph', '2021-10-14', 1, 'Inventory Purchases', 0, 110000, 94151),
(388, 'ralph', '2021-10-15', 1, 'Salaries and Wages', 0, 15000, 79151),
(389, 'ralph', '2021-10-16', 1, 'Bank Financing Short Term', 24000, 0, 103151),
(390, 'ralph', '2021-10-16', 2, 'Other source of cash', 5000, 0, 108151),
(391, 'ralph', '2021-10-17', 1, 'Inventory Purchases', 0, 7000, 101151),
(397, 'ralph', '2021-10-20', 2, 'Marketing Expenses', 0, 2000, 99151),
(401, 'ralph', '2021-10-25', 2, 'Sales', 200000, 0, 280351),
(402, 'ralph', '2021-10-26', 1, 'Service Home', 152000, 0, 432351),
(403, 'ralph', '2021-10-26', 2, 'Other Income', 3000, 0, 435351),
(404, 'ralph', '2021-10-27', 1, 'Loan Payments - Short term', 0, 24000, 461351),
(405, 'ralph', '2021-10-28', 1, 'Bank Financing Long Term', 120000, 0, 581351),
(406, 'ralph', '2021-10-28', 2, 'Other Income', 15000, 0, 596351),
(407, 'ralph', '2021-10-29', 1, 'Insurance Expenses', 0, 15000, 581351),
(408, 'ralph', '2021-10-29', 2, 'Loan Payments - Long term', 0, 137000, 444351),
(409, 'ralph', '2021-10-30', 1, 'Miscellaneous Expenses', 0, 15000, 429351),
(410, 'ralph', '2021-10-31', 1, 'Administrative Expenses', 0, 24000, 390351),
(411, 'ralph', '2021-10-31', 2, 'Furniture', 0, 7000, 383351),
(417, 'ralph', '2021-10-06', 2, 'Supplies Expenses', 0, 1400, 293831),
(419, 'ralph', '2021-10-10', 2, 'Inventory Purchases', 0, 60000, 80151),
(420, 'ralph', '2021-11-01', 1, 'Beginning balance', 383351, 0, 383351),
(421, 'ralph', '2021-11-03', 1, 'Inventory Purchases', 0, 20000, 363351),
(422, 'ralph', '2021-11-06', 1, 'Supplies Expenses', 0, 1400, 361951),
(423, 'ralph', '2021-11-10', 1, 'Inventory Purchases', 0, 60000, 301951),
(424, 'ralph', '2021-11-11', 1, 'Sales', 140000, 0, 441951),
(425, 'ralph', '2021-11-15', 1, 'Salaries and Wages', 0, 15000, 426951),
(426, 'ralph', '2021-11-16', 1, 'Bank Financing Short Term', 30000, 0, 456951),
(427, 'ralph', '2021-11-16', 2, 'Other source of cash', 5000, 0, 461951),
(428, 'ralph', '2021-11-17', 1, 'Inventory Purchases', 0, 7000, 454951),
(429, 'ralph', '2021-11-19', 1, 'Inventory Purchases', 0, 123000, 331951),
(430, 'ralph', '2021-10-20', 3, 'Inventory Purchases', 0, 18000, 81151),
(431, 'ralph', '2021-11-21', 1, 'Other uses of cash', 0, 30000, 301951),
(432, 'ralph', '2021-11-22', 1, 'Other Expenses', 0, 1800, 300151),
(433, 'ralph', '2021-11-23', 1, 'Marketing Expenses', 0, 3000, 297151),
(434, 'ralph', '2021-10-23', 2, 'Utilities Expenses', 0, 800, 80351),
(435, 'ralph', '2021-11-24', 1, 'Rent Expenses', 0, 7000, 290151),
(436, 'ralph', '2021-11-25', 1, 'Salaries and Wages', 0, 10000, 280151),
(437, 'ralph', '2021-11-26', 1, 'Loan Payments - Short term', 0, 24000, 256151),
(438, 'ralph', '2021-11-27', 1, 'Bank Financing Long Term', 123000, 0, 379151),
(439, 'ralph', '2021-11-29', 1, 'Insurance Expenses', 0, 15000, 364151),
(440, 'ralph', '2021-10-30', 2, 'Miscellaneous Expenses', 0, 15000, 414351),
(441, 'ralph', '2021-11-30', 1, 'Interest Expenses', 0, 5000, 359151),
(442, 'ralph', '2021-12-01', 1, 'Beginning balance', 359151, 0, 359151),
(443, 'ralph', '2021-12-03', 1, 'Inventory Purchases', 0, 5000, 354151),
(444, 'ralph', '2021-12-06', 1, 'Equipment', 0, 20000, 334151),
(445, 'ralph', '2021-12-08', 1, 'Selling and distribution Expenses', 0, 200, 333951),
(446, 'ralph', '2021-12-10', 1, 'Inventory Purchases', 0, 120000, 213951),
(448, 'ralph', '2021-12-11', 1, 'Sales', 90000, 0, 303951),
(450, 'ralph', '2021-12-17', 1, 'Inventory Purchases', 0, 9000, 294951),
(452, 'ralph', '2021-12-21', 1, 'Other uses of cash', 0, 20000, 274951),
(453, 'ralph', '2021-10-26', 3, 'Service Home', 50000, 0, 485351),
(454, 'ralph', '2021-12-27', 1, 'Loan Payments - Short term', 0, 30000, 244951),
(455, 'ralph', '2021-12-28', 1, 'Bank Financing Long Term', 120000, 0, 364951),
(459, 'ralph', '2021-12-28', 2, 'Rent Expenses', 0, 8000, 356951),
(460, 'ralph', '2021-12-29', 1, 'Administrative Expenses', 0, 24000, 332951),
(462, 'ralph', '2021-12-31', 1, 'Vehicle', 0, 50000, 282951);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcashbookentry`
--
ALTER TABLE `tblcashbookentry`
  MODIFY `cbe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

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
