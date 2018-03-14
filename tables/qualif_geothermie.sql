-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Février 2018 à 17:25
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
-- Structure de la table `qualif_geothermie`
--

CREATE TABLE IF NOT EXISTS `qualif_geothermie` (
  `ID_QUALIF_GEOTHERMIE` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `TYPE_TRAVAUX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE_DIFFUSION_CHALEUR` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NBRE_ETAGE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SURFACE_TOTALE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HAUTEUR_SOUS_PLAFOND` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DISPOSE_JARDIN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_QUALIF_GEOTHERMIE`),
  KEY `ID_DEMANDE` (`ID_DEMANDE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `qualif_geothermie`
--
ALTER TABLE `qualif_geothermie`
  ADD CONSTRAINT `FK_QUALIF_GEOTHERMIE_DEMANDE` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
