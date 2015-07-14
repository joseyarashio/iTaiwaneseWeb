-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2014 at 08:34 AM
-- Server version: 5.6.17
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
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 NOT NULL,
  `value` int(11) NOT NULL,
  `base` varchar(20) CHARACTER SET utf8 NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `base` (`base`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `location`, `value`, `base`, `start`, `end`) VALUES
(1, 'test', './GitRepos/finish/TW03/_Chen_Su_Nian_0.wav', 0, 'testbase2', '2014-08-07', NULL),
(2, 'Dream_State01', './GitRepos/finish/Dream_State/0501-230001.wav', 0, 'testbase', '2014-08-08', NULL),
(3, 'Dream_State02', './GitRepos/finish/Dream_State/0501-230002.wav', 0, 'testbase', '2014-08-08', NULL),
(5, 'Dream_State03', './GitRepos/finish/Dream_State/0511-230001.wav', 0, 'testbase', '2013-05-11', NULL),
(6, 'Dream_State04', './GitRepos/finish/Dream_State/0511-230002.wav', 0, 'testbase2', '2014-06-08', NULL),
(7, 'Dream_State05', '''./GitRepos/finish/Dream_State/0513-220001.wav', 0, 'testbase', '2014-08-08', NULL),
(8, 'Dream_State06', './GitRepos/finish/Dream_State/0513-220002.wav', 0, 'testbase2', '2014-08-09', NULL),
(9, 'vvrs01', './GitRepos/finish/DaAi/vvrs01.wav', 1, 'testbase2', '2014-09-11', NULL),
(10, 'vvrs04', './GitRepos/finish/DaAi/vvrs04.wav', 1, 'testbase', '2014-05-19', '2014-10-21'),
(11, 'vvrs07', './GitRepos/finish/DaAi/vvrs07.wav', 1, 'testbase2', '2014-09-18', '2014-10-20'),
(12, 'vvrs10', './GitRepos/finish/DaAi/vvrs10.wav', 1, 'testbase2', '2000-02-20', '2050-02-20'),
(13, 'Combine001', './GitRepos/EDU/Combine001.wav', 1, 'testbase2', '2014-05-09', NULL),
(15, 'Combine002', './GitRepos/EDU/Combine002.wav', 1, 'testbase', '2014-10-10', NULL),
(16, 'Combine003', './GitRepos/EDU/Combine003.wav', 1, 'testbase', '2014-11-08', NULL),
(17, 'Combine004', './GitRepos/EDU/Combine004.wav', 0, 'testbase', '2014-10-17', '2014-10-16'),
(18, 'csgr01', './GitRepos/DaAi TV/csgr01.wav', 0, 'testbase', '1911-01-01', '2011-01-01'),
(19, 'csgr04', './GitRepos/DaAi TV/csgr04.wav', 1, 'testbase', '2014-05-05', '2014-05-05'),
(20, 'csgr07', './GitRepos/DaAi TV/csgr07.wav', 1, 'testbase', '2014-01-10', '2014-10-01'),
(21, 'csgr10', './GitRepos/DaAi TV/csgr10.wav', 0, 'testbase2', '2014-09-08', '2014-10-08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`base`) REFERENCES `filebase` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
