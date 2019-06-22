-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 03:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityid` int(11) NOT NULL,
  `activitytype` varchar(255) NOT NULL COMMENT 'CheckBox, Input, Observation',
  `activityName` varchar(255) NOT NULL,
  `activitydescription` varchar(255) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `activityactive` varchar(255) NOT NULL DEFAULT 'Y',
  `activitycreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityid`, `activitytype`, `activityName`, `activitydescription`, `createduserby`, `activityactive`, `activitycreateddate`) VALUES
(1, 'CheckBox', 'Station Damage', 'This is Station Damage activity', 2, 'Y', '2019-06-21 11:26:24'),
(2, 'Observation', 'Bait Found Bited', 'Description of Bait Found Bited', 2, 'Y', '2019-06-21 11:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyid` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `companyindustrytypeid` int(11) NOT NULL,
  `companyurl` varchar(255) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `companyactive` varchar(255) NOT NULL DEFAULT 'Y',
  `companycreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `industrytype`
--

CREATE TABLE `industrytype` (
  `industrytypeid` int(11) NOT NULL,
  `industrytypename` varchar(255) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `industrytypeactive` varchar(255) NOT NULL DEFAULT 'Y',
  `industrytypecreateddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrytype`
--

INSERT INTO `industrytype` (`industrytypeid`, `industrytypename`, `createduserby`, `industrytypeactive`, `industrytypecreateddate`) VALUES
(2, 'Pharmaceutical', 0, 'Y', '0000-00-00 00:00:00'),
(5, 'Multinational', 0, 'Y', '0000-00-00 00:00:00'),
(6, 'Printing & Packaging', 0, 'Y', '0000-00-00 00:00:00'),
(8, 'Foreign Mission', 0, 'Y', '0000-00-00 00:00:00'),
(9, 'Educational Institute', 0, 'Y', '0000-00-00 00:00:00'),
(10, 'Food Manufacturers', 0, 'Y', '0000-00-00 00:00:00'),
(11, 'Banks', 0, 'Y', '0000-00-00 00:00:00'),
(12, 'Hotels & Restaurants', 0, 'Y', '0000-00-00 00:00:00'),
(14, 'Shops & Outlets', 0, 'Y', '0000-00-00 00:00:00'),
(15, 'News / Tv Channels', 0, 'Y', '0000-00-00 00:00:00'),
(16, 'Fertilizer Manufacturer', 0, 'Y', '0000-00-00 00:00:00'),
(17, 'Shopping Malls / Super Markets', 0, 'Y', '0000-00-00 00:00:00'),
(18, 'Insurance Companies', 0, 'Y', '0000-00-00 00:00:00'),
(19, 'Oil & Gas', 0, 'Y', '0000-00-00 00:00:00'),
(20, 'Government Departments ', 0, 'Y', '0000-00-00 00:00:00'),
(21, 'Airlines', 0, 'Y', '0000-00-00 00:00:00'),
(22, 'Software House / IT Companies', 0, 'Y', '0000-00-00 00:00:00'),
(23, 'Power Generation Companies', 0, 'Y', '0000-00-00 00:00:00'),
(27, 'Residential', 0, 'Y', '0000-00-00 00:00:00'),
(28, 'Clubs / Resorts', 0, 'Y', '0000-00-00 00:00:00'),
(29, 'General Companies', 0, 'Y', '0000-00-00 00:00:00'),
(30, 'Builders & Developers', 0, 'Y', '0000-00-00 00:00:00'),
(31, 'Textile & Garments', 0, 'Y', '0000-00-00 00:00:00'),
(32, 'Hospital / Medical Center', 0, 'Y', '0000-00-00 00:00:00'),
(33, 'NGO', 0, 'Y', '0000-00-00 00:00:00'),
(34, 'Facility Management Companies', 0, 'Y', '0000-00-00 00:00:00'),
(35, 'Non-Contractual', 0, 'Y', '2019-03-18 09:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationid` int(11) NOT NULL,
  `stationname` varchar(255) NOT NULL,
  `stationdescription` varchar(255) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `stationactive` varchar(255) NOT NULL DEFAULT 'Y',
  `stationcreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stationactivity`
--

CREATE TABLE `stationactivity` (
  `stationactivityID` int(11) NOT NULL,
  `stationaid` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `stationactivityactive` varchar(255) NOT NULL DEFAULT 'Y',
  `stationactivitycreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `userfullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `useractive` varchar(255) NOT NULL DEFAULT 'Y',
  `usercreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userfullname`, `username`, `userpassword`, `createduserby`, `useractive`, `usercreateddate`) VALUES
(1, 'Adminnistrator', 'admin', 'admin123', 0, 'Y', '2019-06-20 10:33:25'),
(2, 'Haisam Sohail', 'haisam', 'haisam123', 0, 'Y', '2019-06-20 19:09:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyid`);

--
-- Indexes for table `industrytype`
--
ALTER TABLE `industrytype`
  ADD PRIMARY KEY (`industrytypeid`),
  ADD KEY `IndustryTypeID` (`industrytypeid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationid`);

--
-- Indexes for table `stationactivity`
--
ALTER TABLE `stationactivity`
  ADD PRIMARY KEY (`stationactivityID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industrytype`
--
ALTER TABLE `industrytype`
  MODIFY `industrytypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationactivity`
--
ALTER TABLE `stationactivity`
  MODIFY `stationactivityID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
