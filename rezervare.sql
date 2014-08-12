-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Gazda: 127.0.0.1
-- Timp de generare: 12 Aug 2014 la 19:19
-- Versiune server: 5.5.27
-- Versiune PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza de date: `rezervare`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mese`
--

CREATE TABLE IF NOT EXISTS `mese` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numar_mese` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `mese`
--

INSERT INTO `mese` (`ID`, `numar_mese`) VALUES
(1, 2),
(2, 4),
(3, 6);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mese_disponibile`
--

CREATE TABLE IF NOT EXISTS `mese_disponibile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `mese_disponibile` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `nr_mese`
--

CREATE TABLE IF NOT EXISTS `nr_mese` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_ID` int(11) NOT NULL,
  `Mese_ID` int(11) NOT NULL,
  `mese_totale` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Salvarea datelor din tabel `nr_mese`
--

INSERT INTO `nr_mese` (`ID`, `Restaurant_ID`, `Mese_ID`, `mese_totale`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 2, 1, 5);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nume` text NOT NULL,
  `Adresa` text NOT NULL,
  `Thumbnail` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `restaurante`
--

INSERT INTO `restaurante` (`ID`, `Nume`, `Adresa`, `Thumbnail`) VALUES
(1, 'aaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', ''),
(2, 'bbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
