-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 10:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indudtrialsecurity`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `total`) VALUES
(121212, 7);

-- --------------------------------------------------------

--
-- Table structure for table `controlnumber`
--

CREATE TABLE `controlnumber` (
  `ID` int(11) NOT NULL,
  `unit` varchar(32) CHARACTER SET latin1 NOT NULL,
  `year` varchar(32) CHARACTER SET latin1 NOT NULL,
  `genNum` int(11) NOT NULL,
  `fullcode` varchar(32) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `controlnumber`
--

INSERT INTO `controlnumber` (`ID`, `unit`, `year`, `genNum`, `fullcode`) VALUES
(13, 'HOF', '17', 1, 'HOF-17-1'),
(14, 'HOF', '17', 1, 'HOF-17-1'),
(15, 'HOF', '17', 2, 'HOF-17-2'),
(16, 'HOF', '17', 3, 'HOF-17-3'),
(17, 'HOF', '17', 4, 'HOF-17-4'),
(18, 'HOF', '17', 1, 'HOF-17-1'),
(19, 'HOF', '17', 1, 'HOF-17-1'),
(20, 'HOF', '17', 5, 'HOF-17-5'),
(21, 'HOF', '17', 6, 'HOF-17-6'),
(22, 'HOF', '17', 7, 'HOF-17-7'),
(23, 'HOF', '17', 8, 'HOF-17-8'),
(24, 'HOF', '17', 9, 'HOF-17-9'),
(25, 'HOF', '17', 10, 'HOF-17-10'),
(26, 'HOF', '17', 11, 'HOF-17-11'),
(27, 'HOF', '17', 12, 'HOF-17-12'),
(28, 'HOF', '17', 13, 'HOF-17-13'),
(29, 'HOF', '17', 14, 'HOF-17-14'),
(30, 'HOF', '17', 15, 'HOF-17-15'),
(31, 'HOF', '17', 16, 'HOF-17-16'),
(32, 'HOF', '17', 17, 'HOF-17-17'),
(33, 'HOF', '17', 18, 'HOF-17-18'),
(34, 'HOF', '17', 19, 'HOF-17-19');

-- --------------------------------------------------------

--
-- Table structure for table `responsibilitycenter`
--

CREATE TABLE `responsibilitycenter` (
  `ID` int(11) NOT NULL,
  `numofcar` int(11) NOT NULL,
  `numofpersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temporaryrecord`
--

CREATE TABLE `temporaryrecord` (
  `ID` int(11) NOT NULL,
  `controlNum` varchar(32) NOT NULL,
  `residence` int(11) NOT NULL,
  `respCenter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `carNum` varchar(12) NOT NULL,
  `postDate` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `username` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `temporaryrecord`
--

INSERT INTO `temporaryrecord` (`ID`, `controlNum`, `residence`, `respCenter`, `company`, `carNum`, `postDate`, `startDate`, `endDate`, `username`, `period`, `note`) VALUES
(16, 'HOF-17-9', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 2, 'Ù…Ø«Ø§Ù„'),
(17, 'HOF-17-10', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 5, 'Ù…Ø«Ø§Ù„'),
(18, 'HOF-17-11', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 0, 'Ù…Ø«Ø§Ù„'),
(19, 'HOF-17-12', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 0, 'Ù…Ø«Ø§Ù„'),
(20, 'HOF-17-13', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 0, 'Ù…Ø«Ø§Ù„'),
(21, 'HOF-17-14', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 0, 'Ù…Ø«Ø§Ù„'),
(22, 'HOF-17-15', 1001, '12345', 'Ø§Ø±Ø§Ù…ÙƒÙˆ', '121212', '2017-08-24', '2017-08-05', '2017-08-17', 1122, 0, 'Ù…Ø«Ø§Ù„'),
(23, 'HOF-17-18', 1001, '111111', 'fffffff', '121212', '2017-08-25', '2017-08-01', '2017-08-04', 1122, 0, 'fffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` int(32) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` int(1) NOT NULL,
  `unit` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `name`, `password`, `admin`, `unit`) VALUES
(9, 1122, 'حمد خالد العتيبي', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'HOF'),
(10, 1112, 'Mohammed', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'MBR');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `ID` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`ID`, `total`) VALUES
(1001, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `controlnumber`
--
ALTER TABLE `controlnumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `temporaryrecord`
--
ALTER TABLE `temporaryrecord`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `controlnumber`
--
ALTER TABLE `controlnumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `temporaryrecord`
--
ALTER TABLE `temporaryrecord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
