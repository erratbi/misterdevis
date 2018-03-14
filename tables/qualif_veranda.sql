-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Janvier 2018 à 13:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_misterdevis_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `qualif_veranda`
--

DROP TABLE IF EXISTS `qualif_veranda`;
CREATE TABLE IF NOT EXISTS `qualif_veranda` (
  `ID_QUALIF_VERANDA` bigint(20) NOT NULL AUTO_INCREMENT,
  `TYPE_TRAVAUX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEPOSE_EXISTANT` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE_VERANDA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL,
  PRIMARY KEY (`ID_QUALIF_VERANDA`),
  KEY `ID_DEMANDE` (`ID_DEMANDE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
