-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Février 2018 à 15:02
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
-- Structure de la table `geolocaliser`
--

DROP TABLE IF EXISTS `geolocaliser`;
CREATE TABLE IF NOT EXISTS `geolocaliser` (
  `ID_ARTISAN` bigint(20) NOT NULL,
  `ID_ZONE` bigint(20) NOT NULL,
  `DISTANCE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ARTISAN`,`ID_ZONE`),
  KEY `ID_ZONE` (`ID_ZONE`),
  KEY `ID_ARTISAN` (`ID_ARTISAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `geolocaliser`
--
ALTER TABLE `geolocaliser`
  ADD CONSTRAINT `FK_ARTISAN_GEOLOCALISER` FOREIGN KEY (`ID_ARTISAN`) REFERENCES `artisan` (`ID_ARTISAN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
