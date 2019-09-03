-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 04:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
  `stationid` int(11) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `activityactive` varchar(255) NOT NULL DEFAULT 'Y',
  `activitycreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityid`, `activitytype`, `activityName`, `activitydescription`, `stationid`, `createduserby`, `activityactive`, `activitycreateddate`) VALUES
(1, 'CheckBox', 'Station Damage', 'This is Station Damage activity', 2, 2, 'Y', '2019-06-21 11:26:24'),
(2, 'Observation', 'Bait Found Bited', 'Description of Bait Found Bited', 1, 2, 'Y', '2019-06-21 11:27:51'),
(3, 'CheckBox', 'Station Damage 2', 'This is Station Damage activity 2', 2, 2, 'Y', '2019-06-21 11:26:24'),
(4, '2', '1', 'stationdescription 3', 2, 101, 'Y', '2019-06-25 14:39:26'),
(10, 'Input', 'Activity 21', 'Dec 21', 2, 101, 'N', '2019-06-25 14:44:05'),
(11, 'CheckBox', 'Activity 22', 'Dec 22', 2, 101, 'Y', '2019-06-25 14:44:21'),
(12, 'CheckBox', 'Activity 501', 'Description 501.', 4, 101, 'Y', '2019-06-26 04:26:37'),
(13, 'Observation', 'fdg', '3444444444444', 1, 101, 'Y', '2019-06-26 07:15:30'),
(14, 'Input', 'Activity 502', 'Description 502', 4, 101, 'Y', '2019-06-26 07:26:15'),
(15, 'Observation', 'Activity 503', 'Description 503', 4, 101, 'Y', '2019-06-26 07:26:34'),
(16, 'Input', 'Activity 504', 'Description 504', 4, 101, 'Y', '2019-06-26 07:34:27'),
(17, 'CheckBox', 'Service Done', 'khswkfh', 5, 101, 'Y', '2019-06-26 08:47:23'),
(18, 'Observation', 'Test', 'Tests', 5, 101, 'Y', '2019-06-26 08:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchid` int(11) NOT NULL,
  `branchname` varchar(255) NOT NULL,
  `branchlocation` varchar(255) NOT NULL,
  `branchaddress` varchar(255) NOT NULL,
  `branchphone` varchar(255) NOT NULL,
  `branchemail` varchar(255) NOT NULL,
  `companyid` int(11) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `branchactive` varchar(255) NOT NULL DEFAULT 'Y',
  `branchcreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchid`, `branchname`, `branchlocation`, `branchaddress`, `branchphone`, `branchemail`, `companyid`, `createduserby`, `branchactive`, `branchcreateddate`) VALUES
(1, 'Branch Name 102', 'Branch Location 102', 'Branch Address 102', 'Branch Phone 102', 'Branch Email 102', 2, 2, 'Y', '2019-06-27 10:53:44'),
(2, 'Branch Name 103', 'Branch Location 103', 'Branch Address 103', 'Branch Phone 103', 'Branch Email 103', 2, 101, 'Y', '2019-06-27 11:38:44'),
(3, 'df', 'gt', 'k', 'klj', 'l', 2, 101, 'N', '2019-06-27 11:39:18'),
(4, 'Branch Name 101', 'Branch Location 101', 'Branch Address 101', 'Branch Phone 101', 'Branch Email 101', 2, 101, 'Y', '2019-06-27 11:39:57'),
(5, 'df', 'gtsadsadfc', 'k', 'klj', 'l', 2, 101, 'N', '2019-06-27 12:01:15'),
(6, 'Branch Name 104', 'Branch Location 104', 'Branch Address 104', 'Branch Phone 104', 'Branch Email 104', 2, 101, 'Y', '2019-06-27 12:03:04'),
(7, 'Branch Name 301', 'Branch Location 301', 'Branch Address 301', 'Branch Phone 301', 'Branch Email 301', 4, 101, 'Y', '2019-06-27 12:03:59'),
(8, 'Branch Name 302', 'Branch Location 302', 'Branch Address 302', 'Branch Phone 302', 'Branch Email 302', 4, 101, 'Y', '2019-06-27 12:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `branchlocation`
--

CREATE TABLE `branchlocation` (
  `branchlocationid` int(11) NOT NULL,
  `branchlocationname` varchar(255) NOT NULL,
  `branchlocationbranchid` int(11) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `branchlocationactive` varchar(255) NOT NULL DEFAULT 'Y',
  `branchlocationcreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyid`, `companyname`, `companyindustrytypeid`, `companyurl`, `createduserby`, `companyactive`, `companycreateddate`) VALUES
(2, 'Company Name 101.', 15, 'URL 101', 101, 'Y', '2019-06-27 09:15:51'),
(3, 'Company Name 201', 8, 'URL 201', 2, 'Y', '2019-06-27 09:32:00'),
(4, 'Company 301', 27, 'URL 301', 101, 'Y', '2019-06-27 11:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeid` int(11) NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `employeedesignation` varchar(255) NOT NULL,
  `employeephone` varchar(255) NOT NULL,
  `employeeemail` varchar(255) NOT NULL,
  `branchid` int(11) NOT NULL,
  `createduserby` int(11) NOT NULL,
  `employeeactive` varchar(255) NOT NULL DEFAULT 'Y',
  `employeecreateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationid`, `stationname`, `stationdescription`, `createduserby`, `stationactive`, `stationcreateddate`) VALUES
(1, 'Glue Station', 'This station use to place glue board to trap rats inside production facility.', 101, 'Y', '2019-06-25 12:15:37'),
(2, 'Rat Cages', 'This station use to catch rat with the help of attractive food bait.', 101, 'Y', '2019-06-25 12:17:37'),
(3, 'Insect O Cutor', 'This station use to monitor flying insect by glue board in tray', 101, 'Y', '2019-06-25 12:17:53'),
(4, 'Test Station A', 'Description  of Test Station A', 101, 'Y', '2019-06-26 04:22:53'),
(5, 'Hassan Station', 'Test', 101, 'Y', '2019-06-26 08:46:55');

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
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `branchlocation`
--
ALTER TABLE `branchlocation`
  ADD PRIMARY KEY (`branchlocationid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeid`);

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
  MODIFY `activityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branchlocation`
--
ALTER TABLE `branchlocation`
  MODIFY `branchlocationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industrytype`
--
ALTER TABLE `industrytype`
  MODIFY `industrytypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
