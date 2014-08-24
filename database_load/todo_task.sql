-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2014 at 06:33 PM
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
-- Table structure for table `todo_task`
--

CREATE TABLE IF NOT EXISTS `todo_task` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Task_Name` varchar(150) NOT NULL,
  `Description` longblob NOT NULL,
  `Difficulty_ID` int(11) NOT NULL,
  `Due_Date` date DEFAULT NULL,
  `Assigned_Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Finished_Date` date DEFAULT NULL,
  `Commit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `Username` (`Username`),
  KEY `Difficulty_ID` (`Difficulty_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_task`
--
ALTER TABLE `todo_task`
  ADD CONSTRAINT `todo_task_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `todo_user` (`Username`) ON DELETE NO ACTION,
  ADD CONSTRAINT `todo_task_ibfk_4` FOREIGN KEY (`Difficulty_ID`) REFERENCES `todo_task_difficulty_rating` (`ID`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
