-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `counter`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logging`
--

CREATE TABLE IF NOT EXISTS `logging` (
  `lfdnr` int(10) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `ipaddress` varchar(30) NOT NULL,
  `useragent` varchar(300) NOT NULL,
  `referer` varchar(200) NOT NULL,
  `osversion` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lfdnr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
