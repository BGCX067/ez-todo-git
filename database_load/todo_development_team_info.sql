-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2014 at 02:35 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_development_team_info`
--

CREATE TABLE IF NOT EXISTS `todo_development_team_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Development_Team_ID` int(11) NOT NULL,
  `Team_Name` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Team_Name` (`Team_Name`),
  KEY `Development_Team_ID` (`Development_Team_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_development_team_info`
--
ALTER TABLE `todo_development_team_info`
  ADD CONSTRAINT `todo_development_team_info_ibfk_1` FOREIGN KEY (`Development_Team_ID`) REFERENCES `todo_development_team` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
