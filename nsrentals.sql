-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2021 at 09:44 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsrentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `fullname`, `phone`, `email`, `password`) VALUES
(4, 'SAMUEL NOYE', '546536536', 'test@gmail.com', '8812df198216e71300a0cc762e194daa'),
(5, 'KWESI MENSAH', '0245561234', 'km@gmail.com', '5f21c2465918f6844d944a71348c509f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register_car`
--

DROP TABLE IF EXISTS `tbl_register_car`;
CREATE TABLE IF NOT EXISTS `tbl_register_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `carnumber` varchar(255) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register_car`
--

INSERT INTO `tbl_register_car` (`id`, `cid`, `carnumber`, `carname`, `model`, `car_type`, `seat_number`, `fuel_type`, `price`, `details`, `image`) VALUES
(13, 5, 'Ga-2344-12', 'Kia Sorento', '2014', '4x4', 5, 'diesel', 400, 'Low fuel consumption', '../uploads/slide-3.jpg'),
(10, 4, 'Vr-23443-13', 'Hyundai Sonata', '2013', '4x4', 5, 'petrol', 454, 'Low fuel consumption and fault less', '../uploads/20.png'),
(11, 4, 'Ga-992-09', 'Kia Rio', '2020', '4x4', 5, 'petrol', 567, 'Low fuel consumption and fault less', '../uploads/IMG_20190303_112311_0.jpg'),
(12, 4, 'Gt-992-21', 'Toyoto Corrola', '2021', 'Saloon', 5, 'petrol', 500, 'Low fuel consumption and fault less', '../uploads/slide-1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
