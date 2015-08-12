-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2015 at 12:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uni_internet`
--
CREATE DATABASE IF NOT EXISTS `uni_internet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uni_internet`;

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE IF NOT EXISTS `emp_master` (
  `emp_id` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`emp_id`, `email_id`, `phone_no`, `birth_date`) VALUES
(1, 'dfg@gmail.com', 9988776655, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `emp_reg`
--

CREATE TABLE IF NOT EXISTS `emp_reg` (
  `emp_id` bigint(20) DEFAULT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_reg`
--

INSERT INTO `emp_reg` (`emp_id`, `email_id`, `phone_no`, `birth_date`) VALUES
(2, 'dsf@dsfs.com', 4545454545, '2015-08-07'),
(1, 'dsf@ghj.com', 2135467890, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `other_master`
--

CREATE TABLE IF NOT EXISTS `other_master` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `other_master`
--

INSERT INTO `other_master` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('ri@asd.com', 1111111111, '2015-08-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `other_reg`
--

CREATE TABLE IF NOT EXISTS `other_reg` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `other_reg`
--

INSERT INTO `other_reg` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('ri@gmail.com', 3333333333, '2015-08-01', 1),
('hiii@gmail.com', 1111111111, '2015-08-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pending_reg`
--

CREATE TABLE IF NOT EXISTS `pending_reg` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `emp_id` int(20) NOT NULL,
  `user_type` int(2) NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pending_reg`
--

INSERT INTO `pending_reg` (`prn`, `email_id`, `phone_no`, `birth_date`, `emp_id`, `user_type`, `sr_id`) VALUES
(0, 'hiii@gmail.com', 1111111111, '2015-08-08', 12, 2, 19),
(0, 'asd@sdf.com', 1231231231, '2015-08-01', 0, 4, 20),
(2012033800099991, 'g@fg.com', 9408344793, '2015-08-01', 0, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE IF NOT EXISTS `student_master` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`prn`, `email_id`, `phone_no`, `birth_date`) VALUES
(2012033800099999, 'sd@sdfsd.com', 9412345678, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE IF NOT EXISTS `student_reg` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`prn`, `email_id`, `phone_no`, `birth_date`) VALUES
(2012033800088911, 'riddhisom@sadc.com', 9408344793, '2015-08-05'),
(2012033800099999, 'hiii@gmail.com', 1111111111, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `temp_master`
--

CREATE TABLE IF NOT EXISTS `temp_master` (
  `emp_id` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_master`
--

INSERT INTO `temp_master` (`emp_id`, `email_id`, `phone_no`, `birth_date`) VALUES
(1, 'ri@gmail.com', 9427492528, '2015-08-01'),
(2, 'ri@gmail.com', 1111111111, '2015-08-01'),
(10, 'ri@sfd.com', 6666666666, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `temp_reg`
--

CREATE TABLE IF NOT EXISTS `temp_reg` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `temp_reg`
--

INSERT INTO `temp_reg` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('riddhisom@sadc.com', 4444444444, '2015-08-01', 4),
('f@gh.com', 1111111111, '2015-08-01', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
