-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 11:09 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `test` varchar(100) NOT NULL,
  `Image` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `gender`, `age`, `address`, `test`, `Image`) VALUES
(0, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'à¸Šà¸²à¸¢', 0, '1234567', '1test', ''),
(0, 'à¸´b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', '', 0, '', '', ''),
(0, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'a', 10, 's', 'ds', 'botnoi1.png'),
(0, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', '', 0, '', '', ''),
(0, 'mickey248', '$2y$10$Z3waihOUYOLFvdriL/Ikd.octeuuiZVE24iVt.gzNl7Y8vcYqTmtm', 'mickey248', 'à¸Šà¸²à¸¢', 0, '11/31, à¸–à¸™à¸™à¸ªà¸¡à¹€à¸”à¹‡à¸ˆà¸žà¸£à¸°à¸›à¸´à¹ˆà¸™à¹€à¸à¸¥à¹‰à¸²', 'd', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
