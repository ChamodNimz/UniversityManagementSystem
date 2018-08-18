-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2018 at 09:30 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `authering`
--

DROP TABLE IF EXISTS `authering`;
CREATE TABLE IF NOT EXISTS `authering` (
  `Pid` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  PRIMARY KEY (`Pid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `isbn` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `auther` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course_code` int(11) NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `course_code` (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `publisher`, `auther`, `year`, `title`, `name`, `course_code`) VALUES
('123dxsiDm3s', 'Rotten Tomatoes', 'R.R. Martin', 2000, 'Fantasy', 'Game Of Thrones', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `isbn` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`isbn`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_sessions`
--

DROP TABLE IF EXISTS `company_sessions`;
CREATE TABLE IF NOT EXISTS `company_sessions` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `session_manager` varchar(20) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_no` int(11) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`course_code`),
  KEY `dept_code` (`dept_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `dept_code`, `course_name`, `course_no`, `credit_hours`, `college`) VALUES
(1, 1, 'Data Base Management Systems', 2, 12, 'UCSC'),
(2, 1, 'Data Structures And Algorithms', 23, 12, 'UCSC');

-- --------------------------------------------------------

--
-- Table structure for table `course_section`
--

DROP TABLE IF EXISTS `course_section`;
CREATE TABLE IF NOT EXISTS `course_section` (
  `course_code` int(11) NOT NULL,
  `section_no` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `class_room` varchar(20) NOT NULL,
  `class_time` varchar(15) NOT NULL,
  `class_size` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`course_code`,`section_no`,`year`,`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_code`, `dept_name`, `location`, `phone`, `Pid`) VALUES
(1, 'IT', 'colombo', 1231231231, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE IF NOT EXISTS `enroll` (
  `section_no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `course_code` int(11) NOT NULL,
  PRIMARY KEY (`section_no`,`id`,`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `graduate_student`
--

DROP TABLE IF EXISTS `graduate_student`;
CREATE TABLE IF NOT EXISTS `graduate_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `ugMajor` varchar(20) NOT NULL,
  `options` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graduate_student`
--

INSERT INTO `graduate_student` (`id`, `name`, `address`, `ugMajor`, `options`, `password`) VALUES
(1, 'chamod', '432 colombo																												', 'somehting', '123', 'demon');

-- --------------------------------------------------------

--
-- Table structure for table `lab_session`
--

DROP TABLE IF EXISTS `lab_session`;
CREATE TABLE IF NOT EXISTS `lab_session` (
  `course_code` int(11) NOT NULL,
  `lab_no` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `section_no` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `time` varchar(15) NOT NULL,
  `location` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`course_code`,`lab_no`,`year`,`semester`,`section_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_session`
--

INSERT INTO `lab_session` (`course_code`, `lab_no`, `year`, `semester`, `section_no`, `topic`, `time`, `location`, `id`) VALUES
(1, 1, 2018, '1sem', 12, 'Data Base Management Systems', '8.00 - 12.00', 'hall 14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

DROP TABLE IF EXISTS `participate`;
CREATE TABLE IF NOT EXISTS `participate` (
  `id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `Pid` int(11) NOT NULL AUTO_INCREMENT,
  `profName` varchar(30) NOT NULL,
  `office` varchar(15) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `strtDate` date NOT NULL,
  `password` varchar(15) NOT NULL,
  `dept_code` int(11) NOT NULL,
  PRIMARY KEY (`Pid`),
  KEY `dept_code` (`dept_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`Pid`, `profName`, `office`, `phone`, `strtDate`, `password`, `dept_code`) VALUES
(1, 'Rosa wik', 'matLab', '0712342131', '2016-01-14', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_phone`
--

DROP TABLE IF EXISTS `pro_phone`;
CREATE TABLE IF NOT EXISTS `pro_phone` (
  `Pid` int(11) NOT NULL,
  `pro_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`Pid`,`pro_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `address`, `type`, `password`) VALUES
(1, 'Anju', '221/b/backers street London																	', 'Undergraduate', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

DROP TABLE IF EXISTS `uses`;
CREATE TABLE IF NOT EXISTS `uses` (
  `isbn` varchar(15) NOT NULL,
  `course_code` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `course_code` (`course_code`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_code`) REFERENCES `department` (`dept_code`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`dept_code`) REFERENCES `department` (`dept_code`);

--
-- Constraints for table `pro_phone`
--
ALTER TABLE `pro_phone`
  ADD CONSTRAINT `pro_phone_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `professor` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `uses_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uses_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `professor` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
