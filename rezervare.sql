-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2015 at 08:36 PM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.2

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
`ID` int(11) NOT NULL,
  `numar_mese` int(11) NOT NULL
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
`ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mese_disponibile`
--

INSERT INTO `mese_disponibile` (`ID`, `Restaurant_ID`, `Mese_ID`, `data`) VALUES
(3, 1, 2, '2015-02-03 01:00:00'),
(4, 1, 2, '2015-02-03 02:00:00'),
(6, 1, 2, '2015-02-03 02:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `nr_mese`
--

CREATE TABLE IF NOT EXISTS `nr_mese` (
`ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `mese_totale` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nr_mese`
--

INSERT INTO `nr_mese` (`ID`, `Restaurant_ID`, `Mese_ID`, `mese_totale`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
`ID` int(11) NOT NULL,
  `Nume` text NOT NULL,
  `Adresa` text NOT NULL,
  `Thumbnail` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `restaurante`
--

INSERT INTO `restaurante` (`ID`, `Nume`, `Adresa`, `Thumbnail`) VALUES
(1, 'aaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', ''),
(2, 'bbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mese`
--
ALTER TABLE `mese`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mese_disponibile`
--
ALTER TABLE `mese_disponibile`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nr_mese`
--
ALTER TABLE `nr_mese`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `restaurante`
--
ALTER TABLE `restaurante`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mese`
--
ALTER TABLE `mese`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mese_disponibile`
--
ALTER TABLE `mese_disponibile`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nr_mese`
--
ALTER TABLE `nr_mese`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `restaurante`
--
ALTER TABLE `restaurante`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
