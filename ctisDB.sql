-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 10:17 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CTIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `CentreOfficer`
--

CREATE TABLE `CentreOfficer` (
  `username` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `workplace` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CentreOfficer`
--

INSERT INTO `CentreOfficer` (`username`, `position`, `workplace`) VALUES
('leekeathong', 'tester', 'TC01'),
('brownbutt', 'manager', 'TC02');

-- --------------------------------------------------------

--
-- Table structure for table `covidTest`
--

CREATE TABLE `covidTest` (
  `testID` varchar(20) NOT NULL,
  `testDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `resultDate` date NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `tester` varchar(50) NOT NULL,
  `kitID` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covidTest`
--

INSERT INTO `covidTest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `location`) VALUES
('CT01', '2020-10-16', 'pending', 'null', '0000-00-00', 'hamyiwah', 'leekeathong', 'tk01', 'TC02'),
('CT02', '2020-10-17', 'pending', 'null', '0000-00-00', 'rtd', 'brownbutt', 'tk01', 'TC02');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `username` varchar(50) NOT NULL,
  `patientType` varchar(20) NOT NULL,
  `symptoms` varchar(250) DEFAULT NULL,
  `emergencyContact` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`username`, `patientType`, `symptoms`, `emergencyContact`) VALUES
('hamyiwah', 'Suspected', 'Diabetes, fever', '0123707606'),
('rtd', 'Infected', 'High Fever, Vomiting', '0122309882');

-- --------------------------------------------------------

--
-- Table structure for table `TestCentre`
--

CREATE TABLE `TestCentre` (
  `centreID` varchar(20) NOT NULL,
  `centreName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TestCentre`
--

INSERT INTO `TestCentre` (`centreID`, `centreName`) VALUES
('TC01', 'SJMC'),
('TC02', 'Columbia Asia');

-- --------------------------------------------------------

--
-- Table structure for table `testKit`
--

CREATE TABLE `testKit` (
  `kitID` varchar(20) NOT NULL,
  `testName` varchar(250) NOT NULL,
  `availableStock` int(11) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testKit`
--

INSERT INTO `testKit` (`kitID`, `testName`, `availableStock`, `location`) VALUES
('tk01', 'Antigen Test', 15, 'TC01'),
('tk02', 'Antigen Test', 50, 'TC02'),
('tk03', 'PCR', 20, 'TC01');
('tk04', 'COVID-19 IgM/IgG Duo', 1, 'TC01');
('tk05', 'Rapid Test Kit', 1, 'TC01');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `identificationNo` varchar(20) NOT NULL,
  `contactNo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User table collating all user accounts';

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`, `Name`, `email`, `address`, `identificationNo`, `contactNo`) VALUES
('brownbutt', 'nom', 'Chng Jian Luk', 'jianlun99@email.com', '33 Jalan Permas 3/18 Taman Permas Jaya 81750 Masai Johor Malaysia', '990122-07-6968', '0182744399'),
('hamyiwah', 'kanninna', 'Kam Yik Wah', 'yikwah99@email.com', 'no 69 lukkao Street, Tropicana', '126929-69-6969', '0123956552'),
('leekeathong', 'shiden', 'Lee Keat Hong', 'leekeathong@gmail.com', 'No 55 Jalan Wawasan 1/4 Puchong', '990729-10-6446', '0186643739'),
('rtd', 'zululwarrior', 'Choo Jia Duan', 'megablaze22@email.com', 'JA5355 Jalan Teratai 1 Taman Maju 77000 Jasin Meleka Malaysia', '990917-05-6969', '0139329882');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CentreOfficer`
--
ALTER TABLE `CentreOfficer`
  ADD KEY `OfficerUsername` (`username`),
  ADD KEY `centreID` (`workplace`);

--
-- Indexes for table `covidTest`
--
ALTER TABLE `covidTest`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `location` (`location`),
  ADD KEY `kitID` (`kitID`),
  ADD KEY `tester` (`tester`),
  ADD KEY `recipient` (`recipient`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD KEY `username` (`username`);

--
-- Indexes for table `TestCentre`
--
ALTER TABLE `TestCentre`
  ADD PRIMARY KEY (`centreID`);

--
-- Indexes for table `testKit`
--
ALTER TABLE `testKit`
  ADD PRIMARY KEY (`kitID`,`location`),
  ADD KEY `stockLocation` (`location`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CentreOfficer`
--
ALTER TABLE `CentreOfficer`
  ADD CONSTRAINT `officerUsername` FOREIGN KEY (`username`) REFERENCES `User` (`username`),
  ADD CONSTRAINT `workplace` FOREIGN KEY (`workplace`) REFERENCES `TestCentre` (`centreID`);

--
-- Constraints for table `covidTest`
--
ALTER TABLE `covidTest`
  ADD CONSTRAINT `recipient` FOREIGN KEY (`recipient`) REFERENCES `Patient` (`username`),
  ADD CONSTRAINT `testLocation` FOREIGN KEY (`location`) REFERENCES `TestCentre` (`centreID`),
  ADD CONSTRAINT `tester` FOREIGN KEY (`tester`) REFERENCES `CentreOfficer` (`username`),
  ADD CONSTRAINT `tkID` FOREIGN KEY (`kitID`) REFERENCES `testKit` (`kitID`);

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`username`) REFERENCES `User` (`username`);

--
-- Constraints for table `testKit`
--
ALTER TABLE `testKit`
  ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `TestCentre` (`centreID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
