-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2022 at 11:43 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(30) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1001, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apply_post`
--

DROP TABLE IF EXISTS `apply_post`;
CREATE TABLE IF NOT EXISTS `apply_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `student_id` int NOT NULL,
  `vacancy_id` int NOT NULL,
  `message` text NOT NULL,
  `resume_location` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2034 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_post`
--

INSERT INTO `apply_post` (`id`, `company_id`, `student_id`, `vacancy_id`, `message`, `resume_location`, `datetime`) VALUES
(2033, 4001, 7001, 8001, 'sdbv ', '../resumes/2c91pXw1jeIDR1810216801.pdf', '2022-05-10 08:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `vacancy` int NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `vacancy`) VALUES
(3001, 'Marketting', 20),
(3002, 'Customer Service', 20),
(3003, 'Human Resource', 20),
(3004, 'Project Management', 20),
(3005, 'Business Development', 20),
(3006, 'Sales & Communication', 20),
(3007, 'Teaching & Education', 20),
(3008, 'Design & Creative', 20);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `company_address` text NOT NULL,
  `company_contact_no` varchar(12) NOT NULL,
  `company_email` varchar(30) NOT NULL,
  `company_username` varchar(20) NOT NULL,
  `company_password` varchar(20) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_contact_no`, `company_email`, `company_username`, `company_password`) VALUES
(4001, 'Sample', 'Sample', '6363561765', 'sample@gmail.com', 'admin1', 'admin'),
(4002, 'Test', 'Test', '9876543210', 'test@gmail.com', 'Test', 'Test'),
(4003, 'Test', 'Test', '9876543210', 'test@gmail.com', 'Test', 'SV'),
(4004, 'Chandana G', 'd', '9876543210', 'cmti.digitalization@gmail.com', 'adg', 'argsv'),
(4005, 'Chandana G', 'we', '9876543210', 'mokshithgowda2903@gmail.com', 'qwef', 'wef'),
(4006, 'Chandana G', 'we', '9876543210', 'mokshithgowda2903@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `feedback_from` varchar(30) NOT NULL,
  `feedback_to` varchar(30) NOT NULL,
  `feedback_subject` text NOT NULL,
  `feedback_message` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_from`, `feedback_to`, `feedback_subject`, `feedback_message`) VALUES
(5001, '7001', '4004', 'Test', 'Test'),
(5002, '7001', '4004', 'Test', 'Test'),
(5003, '7001', '4004', 'Test', 'Test'),
(5004, '7001', '4004', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int NOT NULL AUTO_INCREMENT,
  `notification_from` varchar(30) NOT NULL,
  `notification_to` varchar(30) NOT NULL,
  `notification_subject` text NOT NULL,
  `notification_message` text NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6010 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_from`, `notification_to`, `notification_subject`, `notification_message`) VALUES
(6001, 'mokshithgowda2903@gmail.com', 'admin@gmail.com', 'Test', 'Test'),
(6002, '', 'admin@gmail.com', '', ''),
(6003, '', 'admin@gmail.com', '', ''),
(6004, '', 'admin@gmail.com', '', ''),
(6005, 'mokshithgowda2903@gmail.com', 'admin@gmail.com', 'Test', 'Test'),
(6006, 'mokshithgowda2903@gmail.com', 'admin@gmail.com', 'Test', 'Test'),
(6007, 'admin@gmail.com', 'Null', '', ''),
(6008, 'admin@gmail.com', 'sample@gmail.com', 'test', 'sdgv'),
(6009, 'admin@gmail.com', 'chandanacandy1697@gmail.com', 'dsv', 'ESFC');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_roll_no` int NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_address` text NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_contact_no` varchar(12) NOT NULL,
  `student_username` varchar(30) NOT NULL,
  `student_password` varchar(30) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_roll_no`, `student_name`, `student_address`, `student_email`, `student_contact_no`, `student_username`, `student_password`) VALUES
(7001, 5485, 'Mokshith', 'Bangalore', 'mokshithgowda2903@gmail.com', '6363561765', 'admin', 'admin'),
(7002, 5479, 'Chandana', 'Bangalore', 'chandanacandy1697@gmail.com', '9745856985', 'admin', 'admin'),
(7003, 2133, 'Chandana G', 'wEF', 'mokshithgowda2903@gmail.com', '9876543210', 'awef', 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
CREATE TABLE IF NOT EXISTS `vacancy` (
  `vacancy_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `category_id` int NOT NULL,
  `post` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `last_date` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vacancy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vacancy_id`, `company_id`, `category_id`, `post`, `description`, `location`, `salary`, `last_date`, `datetime`) VALUES
(8002, 0, 3002, 'sv', 'Dolor justo tempor duo ipsum accusam rebum gubergren erat. Elitr stet dolor vero clita labore gubergren. Kasd sed ipsum elitr clita rebum ut sea diam tempor. Sadipscing nonumy vero labore invidunt dolor sed, eirmod dolore amet aliquyam consetetur lorem, amet elitr clita et sed consetetur dolore accusam. Vero kasd nonumy justo rebum stet. Ipsum amet sed lorem sea magna. Rebum vero dolores dolores elitr vero dolores magna, stet sea sadipscing stet et. Est voluptua et sanctus at sanctus erat vero sed sed, amet duo no diam clita rebum duo, accusam tempor takimata clita stet nonumy rebum est invidunt stet, dolor.', 'New York, USA awsd', '$123 - $456', '2022-05-25', '2022-05-12 06:51:53'),
(8003, 4006, 3003, 'sv', 'Dolor justo tempor duo ipsum accusam rebum gubergren erat. Elitr stet dolor vero clita labore gubergren. Kasd sed ipsum elitr clita rebum ut sea diam tempor. Sadipscing nonumy vero labore invidunt dolor sed, eirmod dolore amet aliquyam consetetur lorem, amet elitr clita et sed consetetur dolore accusam. Vero kasd nonumy justo rebum stet. Ipsum amet sed lorem sea magna. Rebum vero dolores dolores elitr vero dolores magna, stet sea sadipscing stet et. Est voluptua et sanctus at sanctus erat vero sed sed, amet duo no diam clita rebum duo, accusam tempor takimata clita stet nonumy rebum est invidunt stet, dolor.', 'New York, USA awsd', '$123 - $456', '2022-05-25', '2022-05-12 06:52:56'),
(8004, 4006, 3004, 'gyj', 'Dolor justo tempor duo ipsum accusam rebum gubergren erat. Elitr stet dolor vero clita labore gubergren. Kasd sed ipsum elitr clita rebum ut sea diam tempor. Sadipscing nonumy vero labore invidunt dolor sed, eirmod dolore amet aliquyam consetetur lorem, amet elitr clita et sed consetetur dolore accusam. Vero kasd nonumy justo rebum stet. Ipsum amet sed lorem sea magna. Rebum vero dolores dolores elitr vero dolores magna, stet sea sadipscing stet et. Est voluptua et sanctus at sanctus erat vero sed sed, amet duo no diam clita rebum duo, accusam tempor takimata clita stet nonumy rebum est invidunt stet, dolor.', 'New York, USA awsd', '$123 - $456', '2022-05-25', '2022-05-12 08:07:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
