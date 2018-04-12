-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 10:31 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `secured_password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `secured_password`) VALUES
(2, 'Abigail', 'deji', '3597a4611e112ca8e9a753f303ef9d33');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `news_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `username`, `news_id`, `date`) VALUES
(1, 'So Great to be here', '2', 2, '2018-03-15'),
(2, 'So Great to be here', '2', 2, '2018-03-15'),
(3, 'thanks', 'Olukanni, Taye Toyosi', 2, '2018-03-15'),
(4, 'Thank you, Will be sure to inform my Students\r\n', 'Tola Dayo Bimpe', 2, '2018-03-15'),
(5, 'Thank you, Will be sure to inform my Students\r\n', 'Tola Dayo Bimpe', 2, '2018-03-15'),
(6, 'Thank you, Will be sure to inform my Students\r\n', 'Tola Dayo Bimpe-Lecturer', 2, '2018-03-15'),
(7, 'Thank you, Will be sure to inform my Students\r\n', 'Tola Dayo Bimpe - Lecturer', 2, '2018-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_name` text NOT NULL,
  `news_content` text NOT NULL,
  `date` date NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`news_id`, `news_name`, `news_content`, `date`, `admin_id`) VALUES
(1, 'Welcome Freshmen', 'It\'s a great time to welcome all freshmen. I can say with all assurance, that your choice of a college is a great one.\r\nDo Enjoy your stay', '2018-03-08', 2),
(2, 'Sophomore Students', 'Please be informed that your course registration closes on the 20th of March, 2018, that is on the 20th of this month, barely two weeks away.\r\nPlease register your courses in time, as no extensions will be given. ', '2018-03-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(20) NOT NULL,
  `grade` float NOT NULL,
  `level` varchar(30) NOT NULL,
  `student_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `subject`, `grade`, `level`, `student_id`, `teacher_id`) VALUES
(1, 'MTH101', 79, '100', 2, 1),
(2, 'MTH101', 80, '100', 1, 1),
(3, 'PHY101', 95, '100', 1, 1),
(4, 'MTH105', 97, '100', 2, 1),
(5, 'MTH105', 99, '100', 1, 1),
(6, 'MTH105', 99, '100', 1, 1),
(7, 'PHY101', 94, '100', 1, 1),
(8, 'CHM101', 80, '100', 1, 1),
(9, 'MEE105', 87, '100', 1, 1),
(10, 'MEE105', 88, '100', 2, 1),
(11, 'MEE105', 88, '100', 2, 1),
(12, 'EEE101', 86, '100', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `matric_no` char(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `state_of_origin` varchar(15) NOT NULL,
  `faculty` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `level` varchar(3) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `hobbies` text NOT NULL,
  `password` char(32) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `last_name`, `email`, `matric_no`, `gender`, `date_of_birth`, `address`, `nationality`, `state_of_origin`, `faculty`, `department`, `level`, `marital_status`, `hobbies`, `password`, `admin_id`) VALUES
(1, 'Abigail', 'anita', 'sandra', 'sandra@gmail.com', '1938472899', 'F', '2018-03-07', '10, obanikoro avenue', 'Nigerian', 'ogun', 'tech', 'elect', '200', 'single', 'singing, travelling, typing really fastt', 'e4443c52948edad6132f34b6378a9901', 2),
(2, 'Taye', 'Toyosi', 'Olukanni', 'taye@gmail.com', '1039485039', 'F', '2018-03-07', 'ihronjkfsohr', 'Nigerian', 'Ogun', 'technology', 'elect', '300', 'single', 'typing, singing', 'dc4319011a22f69e8cd33c5e189e5b7c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `state_of_origin` varchar(20) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `hobbies` text NOT NULL,
  `password` varchar(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `date_of_birth`, `address`, `state_of_origin`, `marital_status`, `hobbies`, `password`, `admin_id`) VALUES
(1, 'Tola', 'Dayo', 'Bimpe', 'bimpe@gmail.com', 'F', '2018-03-07', '32, agunbiade avenue', 'Osun', 'married', 'Talking, singng', 'tola', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
