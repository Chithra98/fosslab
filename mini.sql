-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 03:56 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`count`) VALUES
(50);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news` varchar(500) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news`, `id`) VALUES
('All students are directed to attend the pre placement talk on monday next week at 9 am', 12),
('Lab exams are scheduled to be on tuesday. prepare accordingly', 13),
('Inter college sports meet on 6/7/2016', 14),
('All students are directed to attend the pre placement talk on monday next week at 9 am', 17),
('Lab exams are scheduled to be on tuesday. prepare accordingly', 18),
('New placements to be held on wednesday', 50);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `name` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `student` varchar(30) NOT NULL,
  `branch` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`name`, `password`, `student`, `branch`) VALUES
('Kumar P', 'kumar', '13004715', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `name` varchar(30) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `reg_no` int(15) NOT NULL,
  `sem` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `roll_no` int(15) NOT NULL,
  `attend` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `course`, `branch`, `email`, `phone`, `reg_no`, `sem`, `address`, `password`, `roll_no`, `attend`) VALUES
('Keerthana', 'B.Tech', 'CSE', 'keerthana@gmail.com', '82415456574', 12004758, 'S6', 'Devils, Cheruthony', 'keerthana', 36, 74),
('Nayana Nelson', 'B.Tech', 'CSE', 'nayana@gmail.com', '9446520994', 13004714, 'S6', 'Grace Villa , BP 3/322A Therennoor, Perumpazhuthoor PO', 'nayana', 21, 86),
('Akshay Kumar', 'B.Tech', 'CSE', 'akshay@gmail.com', '943214124', 13004715, 'S6', 'Dunduzz, cherithony', 'akshay', 28, 94),
('Aswin Sasi', 'B.Tech', 'CSE', 'aswin@gmail.com', '4665321457', 13004716, 'S6', 'Homestay, cheruthony', 'aswin', 56, 66),
('Sachin Jose', 'B.Tech', 'CSE', 'sachin@gmail.com', '451236521422', 13004718, 'S6', 'Cops, cheruthony', 'sachin', 32, 57);

-- --------------------------------------------------------

--
-- Table structure for table `talk`
--

CREATE TABLE IF NOT EXISTS `talk` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `name` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(500) NOT NULL,
  `class` varchar(30) DEFAULT NULL,
  `max_attend` int(15) DEFAULT NULL,
  `dep` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`name`, `password`, `class`, `max_attend`, `dep`, `type`) VALUES
('Jabin Mathew', 'jabin', 'S6', 92, 'CSE', 'admin'),
('Mumthas OY', 'mumthas', '', 0, 'CSE', 'lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `roll_no` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `attend` varchar(30) NOT NULL,
  `per` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`roll_no`, `name`, `attend`, `per`, `remark`) VALUES
('21', 'Nayana Nelson', '86', '94%', 'ATTENDANCE OK'),
('28', 'Akshay Kumar', '94', '103%', 'ATTENDANCE OK'),
('32', 'Sachin Jose', '57', '62%', 'TOO INSUFFICIENT'),
('36', 'Keerthana', '74', '81%', 'ATTENDANCE OK'),
('56', 'Aswin Sasi', '66', '72%', 'INSUFFICIENT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
('123', 'josha', 'jodsh', 'admin'),
('456', 'aswin', 'swia', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`student`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `talk`
--
ALTER TABLE `talk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
