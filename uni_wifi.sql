-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2015 at 04:10 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uni_wifi`
--
CREATE DATABASE IF NOT EXISTS `uni_wifi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uni_wifi`;

-- --------------------------------------------------------

--
-- Table structure for table `uni_employee_master_detail`
--

CREATE TABLE IF NOT EXISTS `uni_employee_master_detail` (
  `emp_id` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni_employee_master_detail`
--

INSERT INTO `uni_employee_master_detail` (`emp_id`, `email_id`, `phone_no`, `birth_date`) VALUES
(1, 'ri@gmail.com', 9427492528, '2015-08-01'),
(2, 'ri@gmail.com', 1111111111, '2015-08-01'),
(0, 'ri@sfd.com', 6666666666, '2015-08-01'),
(10, 'ri@sfd.com', 6666666666, '2015-08-01'),
(0, 'ri@gmail.com', 1234567890, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `uni_other_current_detail`
--

CREATE TABLE IF NOT EXISTS `uni_other_current_detail` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uni_other_current_detail`
--

INSERT INTO `uni_other_current_detail` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('ri@gmail.com', 3333333333, '2015-08-01', 1),
('riddhisom@sadc.com', 1111111111, '2015-08-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uni_other_master_detail`
--

CREATE TABLE IF NOT EXISTS `uni_other_master_detail` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uni_other_master_detail`
--

INSERT INTO `uni_other_master_detail` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('ri@sd.com', 9408344793, '2015-08-01', 1),
('ri@asd.com', 1111111111, '2015-08-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uni_pending_detail`
--

CREATE TABLE IF NOT EXISTS `uni_pending_detail` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `emp_id` int(20) NOT NULL,
  `user_type` int(2) NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uni_pending_detail`
--

INSERT INTO `uni_pending_detail` (`prn`, `email_id`, `phone_no`, `birth_date`, `emp_id`, `user_type`, `sr_id`) VALUES
(0, 'riddhisom@sadc.com', 9999999999, '2015-08-01', 0, 4, 1),
(0, 'riddhisom@sadc.com', 8888888888, '2015-08-08', 0, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uni_permenent_employee_current_detail`
--

CREATE TABLE IF NOT EXISTS `uni_permenent_employee_current_detail` (
  `emp_id` bigint(20) DEFAULT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni_permenent_employee_current_detail`
--

INSERT INTO `uni_permenent_employee_current_detail` (`emp_id`, `email_id`, `phone_no`, `birth_date`) VALUES
(1, 'riddhisom@sadc.com', 9408344793, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `uni_student_current_detail`
--

CREATE TABLE IF NOT EXISTS `uni_student_current_detail` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni_student_current_detail`
--

INSERT INTO `uni_student_current_detail` (`prn`, `email_id`, `phone_no`, `birth_date`) VALUES
(2012033800088000, 'riddhisom@sadc.com', 9408344793, '2015-08-04'),
(2012033800088911, 'riddhisom@sadc.com', 9408344793, '2015-08-05'),
(2012033800088933, 'riddhisoni1324@gmail.com', 9408344793, '2015-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `uni_student_master_detail`
--

CREATE TABLE IF NOT EXISTS `uni_student_master_detail` (
  `prn` bigint(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni_student_master_detail`
--

INSERT INTO `uni_student_master_detail` (`prn`, `email_id`, `phone_no`, `birth_date`) VALUES
(2012033800088933, 'riddhisoni1324@gmail.com', 9408344793, '2015-08-01'),
(2012033800088944, 'riddhisoni1324@yahoo.com', 9408344794, '2015-08-02'),
(2012033800088911, 'ri@gmail.com', 9408344793, '2015-08-01'),
(2012033800088000, 'ri@gh.com', 9408344793, '2015-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `uni_temporary_employee_current_detail`
--

CREATE TABLE IF NOT EXISTS `uni_temporary_employee_current_detail` (
  `email_id` varchar(200) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `sr_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uni_temporary_employee_current_detail`
--

INSERT INTO `uni_temporary_employee_current_detail` (`email_id`, `phone_no`, `birth_date`, `sr_id`) VALUES
('ri@gmail.com', 9427492528, '2015-08-01', 1),
('riddhisom@sadc.com', 1111111111, '2015-08-01', 2),
('riddhisom@sadc.com', 1234567890, '2015-08-01', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
