-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2015 at 04:14 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `mese_disponibile`
--

INSERT INTO `mese_disponibile` (`ID`, `Restaurant_ID`, `Mese_ID`, `data`) VALUES
(1, 1, 2, '2015-03-25 00:00:00'),
(2, 1, 1, '0000-00-00 00:00:00'),
(3, 1, 1, '0000-00-00 00:00:00'),
(4, 1, 1, '0000-00-00 00:00:00'),
(5, 1, 1, '2015-03-18 20:30:00'),
(18, 1, 1, '2015-03-18 20:30:00'),
(23, 1, 1, '2015-03-23 15:50:00'),
(28, 1, 1, '2015-03-24 16:25:00'),
(29, 1, 1, '2015-03-24 17:25:00'),
(30, 1, 1, '2015-03-24 17:25:00'),
(31, 1, 1, '2015-03-24 18:25:00'),
(32, 1, 1, '2015-03-24 20:25:00'),
(33, 1, 1, '2015-03-24 20:26:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nr_mese`
--

INSERT INTO `nr_mese` (`ID`, `Restaurant_ID`, `Mese_ID`, `mese_totale`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 2, 1, 5);

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
(1, 'Restaurant 1', 'Targu-Mures, Bulevardul 1 Decembrie 1918', 'Internet Wireless, Aer conditionat, Parcare privata, Tv bar/plasme, Terasa, Visa/Mastercard, Meniu vegetarian, Sala nefumatori, Sala fumatori', 'logo_restaurant_1'),
(2, 'Restaurant 2', 'Targu-Mures, Bulevardul 1 Decembrie 1918', 'Internet Wireless, Aer conditionat, Parcare privata, Tv bar/plasme, Terasa, Visa/Mastercard, Meniu vegetarian, Sala nefumatori, Sala fumatori', 'logo_restaurant_2'),
(3, 'Restaurant 3', 'Targu-Mures, Bulevardul 1 Decembrie 1918', 'Internet Wireless, Aer conditionat, Parcare privata, Tv bar/plasme, Terasa, Visa/Mastercard, Meniu vegetarian, Sala nefumatori, Sala fumatori', 'logo_restaurant_3'),
(4, 'Restaurant 4', 'Targu-Mures, Bulevardul 1 Decembrie 1918', 'Internet Wireless, Aer conditionat, Parcare privata, Tv bar/plasme, Terasa, Visa/Mastercard, Meniu vegetarian, Sala nefumatori, Sala fumatori', 'logo_restaurant_4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
