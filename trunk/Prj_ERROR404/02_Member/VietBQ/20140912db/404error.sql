-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 06:06 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `404error`
--
CREATE DATABASE IF NOT EXISTS `404error` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `404error`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` varchar(15) NOT NULL,
  `name` varchar(127) NOT NULL,
  `img` varchar(127) NOT NULL,
  `biography` text NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id_book` varchar(15) NOT NULL,
  `name` varchar(127) NOT NULL,
  `img` varchar(127) NOT NULL,
  `price` int(64) NOT NULL,
  `remain` int(64) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `ebook` tinyint(1) NOT NULL,
  `book` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `descriptionpro` text NOT NULL,
  `description404` text NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE IF NOT EXISTS `bought` (
  `id_user` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` varchar(15) NOT NULL,
  `name` varchar(127) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interestedin`
--

CREATE TABLE IF NOT EXISTS `interestedin` (
  `id_user` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ofcategory`
--

CREATE TABLE IF NOT EXISTS `ofcategory` (
  `id_book` varchar(15) NOT NULL,
  `id_category` varchar(15) NOT NULL,
  PRIMARY KEY (`id_book`,`id_category`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `birth` datetime NOT NULL,
  `mail` varchar(127) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `nearest` datetime NOT NULL,
  `balance` int(64) NOT NULL,
  `facebook` varchar(127) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wrote`
--

CREATE TABLE IF NOT EXISTS `wrote` (
  `id_author` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  PRIMARY KEY (`id_author`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bought`
--
ALTER TABLE `bought`
  ADD CONSTRAINT `bought_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `bought_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Constraints for table `ofcategory`
--
ALTER TABLE `ofcategory`
  ADD CONSTRAINT `ofcategory_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`),
  ADD CONSTRAINT `ofcategory_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `wrote`
--
ALTER TABLE `wrote`
  ADD CONSTRAINT `wrote_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`),
  ADD CONSTRAINT `wrote_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
