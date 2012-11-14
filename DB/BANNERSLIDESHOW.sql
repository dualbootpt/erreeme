-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 06:42 PM
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
-- Table structure for table `BANNERSLIDESHOW`
--

CREATE TABLE IF NOT EXISTS `BANNERSLIDESHOW` (
  `groupid` varchar(30) collate utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `path` varchar(255) collate utf8_unicode_ci NOT NULL,
  KEY `INDEX-groupid-sequence` (`groupid`,`sequence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BANNERSLIDESHOW`
--

INSERT INTO `BANNERSLIDESHOW` (`groupid`, `sequence`, `path`) VALUES
('ambientes', 100, 'img/ambientes/ambientes_1.jpg'),
('ambientes', 110, 'img/ambientes/ambientes_2.jpg'),
('ambientes', 120, 'img/ambientes/ambientes_3.jpg'),
('ambientes', 130, 'img/ambientes/ambientes_4.jpg'),
('ambientes', 140, 'img/ambientes/ambientes_5.jpg'),
('ambientes', 150, 'img/ambientes/ambientes_6.jpg'),
('ambientes', 160, 'img/ambientes/ambientes_7.jpg'),
('QualidadeNatura', 210, 'img/coleccao/Natura_Compo_72.jpg'),
('QualidadeChic', 310, 'img/coleccao/Chic_compo_72.jpg'),
('QualidadeLin', 410, 'img/coleccao/Lin_compo_72.jpg'),
('QualidadeVelvet', 510, 'img/coleccao/Velvet_Compo_72.jpg'),
('QualidadeLucca', 610, 'img/coleccao/Lucca_Compo_72.jpg'),
('QualidadeStrike', 710, 'img/coleccao/Strike II_72.jpg'),
('QualidadeElite', 810, 'img/coleccao/Elite_72.jpg'),
('QualidadeMood', 910, 'img/coleccao/Mood mix_compo_72.jpg'),
('QualidadeCool', 1010, 'img/coleccao/Cool_72.jpg'),
('ambientes', 100, 'img/ambientes/ambientes_8.jpg'),
('QualidadeMore', 1030, 'img/coleccao/More 45.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
