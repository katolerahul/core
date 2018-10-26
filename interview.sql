-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 09:42 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `education` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `address`, `country`, `gender`, `education`, `image`) VALUES
(3, 'Rahul Katole', '12345678', 'Hudkeshwar', 'india', 'female', 'deploma,other', ''),
(4, 'admin@yopmail.com', '12345678', 'fdfd', 'india', 'male', 'deploma', ''),
(5, 'admin@yopmail.com', '12345678', 'fsd', 'india', 'female', 'degree,other', ''),
(6, 'az', 'az', 'az', 'india', 'male', 'deploma', ''),
(10, 'Amit', '12345678', '', 'india', 'female', 'deploma,other', 'IMG_20160928_184951121.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
