-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 06:40 PM
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
-- Table structure for table `COLECCOES`
--

CREATE TABLE IF NOT EXISTS `COLECCOES` (
  `id` varchar(15) collate utf8_unicode_ci NOT NULL,
  `elem` varchar(15) collate utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `path` varchar(255) collate utf8_unicode_ci NOT NULL,
  `bannerslideshow` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`,`elem`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Associa colleccoes com o bannerslideshow respectivo';

--
-- Dumping data for table `COLECCOES`
--

INSERT INTO `COLECCOES` (`id`, `elem`, `sequence`, `path`, `bannerslideshow`) VALUES
('qualidades', 'natura', 10, 'img/coleccao/natura.png', 'QualidadeNatura'),
('qualidades', 'chic', 20, 'img/coleccao/chic.png', 'QualidadeChic'),
('qualidades', 'lin', 30, 'img/coleccao/lin.png', 'QualidadeLin'),
('qualidades', 'velvet', 40, 'img/coleccao/velvet.png', 'QualidadeVelvet'),
('qualidades', 'lucca', 50, 'img/coleccao/lucca.png', 'QualidadeLucca'),
('qualidades', 'strike', 60, 'img/coleccao/strike.png', 'QualidadeStrike'),
('qualidades', 'elite', 80, 'img/coleccao/elite.png', 'QualidadeElite'),
('qualidades', 'mood', 90, 'img/coleccao/mood.png', 'QualidadeMood'),
('qualidades', 'cool', 100, 'img/coleccao/cool.png', 'QualidadeCool'),
('qualidades', 'more', 120, 'img/coleccao/more.png', 'QualidadeMore');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
