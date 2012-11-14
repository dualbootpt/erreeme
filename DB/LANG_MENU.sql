-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 05:17 PM
-- Server version: 5.0.95
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `factorin_erreeme`
--

-- --------------------------------------------------------

--
-- Table structure for table `LANG_MENU`
--

CREATE TABLE IF NOT EXISTS `LANG_MENU` (
  `lang` varchar(10) collate utf8_unicode_ci NOT NULL,
  `menu` varchar(30) collate utf8_unicode_ci NOT NULL,
  `option` varchar(30) collate utf8_unicode_ci NOT NULL,
  `text` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`lang`,`menu`,`option`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='MANU ITEMS TRANSLATION';

--
-- Dumping data for table `LANG_MENU`
--

INSERT INTO `LANG_MENU` (`lang`, `menu`, `option`, `text`) VALUES
('langpt', 'mainmenu', 'LINGUA', 'IDIOMA'),
('langpt', 'mainmenu', 'EMPRESA', 'EMPRESA'),
('langpt', 'mainmenu', 'COLECCAO', 'COLEC&Ccedil&AtildeO'),
('langpt', 'mainmenu', 'AMBIENTES', 'AMBIENTES'),
('langpt', 'mainmenu', 'CONTACTOS', 'CONTACTOS'),
('langpt', 'mainmenu', 'PARCERIAS', 'PARCERIAS'),
('langes', 'mainmenu', 'LINGUA', 'IDIOMA'),
('langes', 'mainmenu', 'EMPRESA', 'EMPRESA'),
('langes', 'mainmenu', 'COLECCAO', 'COLECCION'),
('langes', 'mainmenu', 'AMBIENTES', 'AMBIENTES'),
('langes', 'mainmenu', 'CONTACTOS', 'CONTACTOS'),
('langes', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONES'),
('langfr', 'mainmenu', 'LINGUA', 'LANGUES'),
('langfr', 'mainmenu', 'EMPRESA', 'PRODUCION'),
('langfr', 'mainmenu', 'COLECCAO', 'COLLECTION'),
('langfr', 'mainmenu', 'AMBIENTES', 'SC&EgraveNES'),
('langfr', 'mainmenu', 'CONTACTOS', 'CONTACTS'),
('langfr', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONS'),
('langde', 'mainmenu', 'LINGUA', 'SPRACHE'),
('langde', 'mainmenu', 'EMPRESA', 'PRODUKTION'),
('langde', 'mainmenu', 'COLECCAO', 'ERFASSUNG'),
('langde', 'mainmenu', 'AMBIENTES', 'UMGEBUNGEN'),
('langde', 'mainmenu', 'CONTACTOS', 'KONTAKTE'),
('langde', 'mainmenu', 'PARCERIAS', 'PARTNERSCHAFTEN'),
('langit', 'mainmenu', 'LINGUA', 'LINGUA'),
('langit', 'mainmenu', 'EMPRESA', 'BUSINESS'),
('langit', 'mainmenu', 'COLECCAO', 'COLLECTION'),
('langit', 'mainmenu', 'AMBIENTES', 'AMBIENTI'),
('langit', 'mainmenu', 'CONTACTOS', 'CONTATTI'),
('langit', 'mainmenu', 'PARCERIAS', 'PARTENARIATI'),
('langen', 'mainmenu', 'LINGUA', 'LANGUAGE'),
('langen', 'mainmenu', 'EMPRESA', 'BUSINESS'),
('langen', 'mainmenu', 'COLECCAO', 'COLLECTION'),
('langen', 'mainmenu', 'AMBIENTES', 'ENVIRONMENTS'),
('langen', 'mainmenu', 'CONTACTOS', 'CONTACTS'),
('langen', 'mainmenu', 'PARCERIAS', 'PARTNERSHIPS');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
