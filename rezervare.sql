-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 04:34 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rezervare`
--

-- --------------------------------------------------------

--
-- Table structure for table `mese`
--

CREATE TABLE IF NOT EXISTS `mese` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numar_mese` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mese`
--

INSERT INTO `mese` (`ID`, `numar_mese`) VALUES
(1, 2),
(2, 4),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mese_disponibile`
--

CREATE TABLE IF NOT EXISTS `mese_disponibile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `mese_disponibile`
--

INSERT INTO `mese_disponibile` (`ID`, `Restaurant_ID`, `Mese_ID`, `data`, `user`) VALUES
(103, 0, 1, '2015-06-23 23:50:00', '0'),
(104, 0, 1, '2015-06-23 23:50:00', '0'),
(105, 0, 1, '2015-06-23 23:50:00', '0'),
(106, 0, 1, '2015-06-23 23:50:00', '0'),
(107, 0, 2, '2015-06-24 23:50:00', '0'),
(108, 0, 2, '2015-06-24 23:50:00', '0'),
(109, 0, 2, '2015-06-24 23:50:00', '0'),
(110, 0, 2, '2015-06-24 23:50:00', '0'),
(111, 3, 3, '2015-06-26 00:05:00', '0'),
(112, 1, 3, '2015-06-26 00:05:00', '0'),
(113, 1, 3, '2015-06-26 00:05:00', '0'),
(114, 4, 3, '2015-06-26 00:05:00', '0'),
(115, 3, 2, '2015-06-26 23:50:00', '0'),
(116, 3, 3, '2015-06-26 23:50:00', '0'),
(117, 4, 3, '2015-06-26 23:50:00', '0'),
(118, 4, 3, '2015-06-26 23:50:00', '0'),
(119, 1, 2, '2015-06-30 23:50:00', '0'),
(120, 3, 2, '2015-06-30 23:45:00', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `nr_mese`
--

CREATE TABLE IF NOT EXISTS `nr_mese` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `mese_totale` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nr_mese`
--

INSERT INTO `nr_mese` (`ID`, `Restaurant_ID`, `Mese_ID`, `mese_totale`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 2, 1, 2),
(5, 2, 2, 2),
(6, 2, 3, 2),
(7, 3, 1, 2),
(8, 3, 2, 2),
(9, 3, 3, 2),
(10, 4, 1, 2),
(11, 4, 2, 2),
(12, 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nume` text NOT NULL,
  `Adresa` text NOT NULL,
  `Descriere` text NOT NULL,
  `Thumbnail` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `restaurante`
--

INSERT INTO `restaurante` (`ID`, `Nume`, `Adresa`, `Descriere`, `Thumbnail`) VALUES
(1, 'Restaurant Maris', 'Str 22 decembrie 1989, Nr 51, Targu-Mures', 'Restaurantul Maris a fost infiintat in anul 2006. Localul a reusit sa realizeze ce si-a propus , impresionandu-si clientii prin decorul deosebit si prin specialitatile culinare, oferite clientilor sai gatite dupa retetele culinare traditionale.', 'logo_restaurant_1'),
(2, 'Restaurant 2', 'Restaurant 2 Restaurant 2', 'Restaurant 2 Restaurant 2 Restaurant 2 Restaurant 2', 'logo_restaurant_2'),
(3, 'Restaurant 3', 'Restaurant 3 Restaurant 3', 'Restaurant 3 Restaurant 3 Restaurant 3 Restaurant 3', 'logo_restaurant_3'),
(4, 'Restaurant 4', 'Restaurant 4 Restaurant 4', 'Restaurant 4 Restaurant 4 Restaurant 4 Restaurant 4', 'logo_restaurant_4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `phone`) VALUES
(1, 'user', '', 'user', 0),
(3, 'user1', 'jozsef_gyorgy@yahoo.com', 'user1', 1111111111);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
