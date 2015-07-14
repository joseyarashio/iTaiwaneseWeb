-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2014 at 04:34 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itaiwanese`
--

-- --------------------------------------------------------

--
-- Table structure for table `filebase`
--

CREATE TABLE IF NOT EXISTS `filebase` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `rank` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filebase`
--

INSERT INTO `filebase` (`name`, `rank`, `date`) VALUES
('testbase', 2, '2014-08-08'),
('testbase2', 0, '2014-08-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filebase`
--
ALTER TABLE `filebase`
 ADD PRIMARY KEY (`name`), ADD KEY `name` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
