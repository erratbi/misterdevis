-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 30 Janvier 2018 à 11:43
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
-- Structure de la table `qualif_anticalcaire`
--

DROP TABLE IF EXISTS `qualif_anticalcaire`;
CREATE TABLE IF NOT EXISTS `qualif_anticalcaire` (
  `ID_QUALIF_ANTICALCAIRE` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `ANNEE_CONSTRUCTION` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROCEDE_TRAITEMENT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_QUALIF_ANTICALCAIRE`),
  KEY `ID_DEMANDE` (`ID_DEMANDE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `qualif_anticalcaire`
--
ALTER TABLE `qualif_anticalcaire`
  ADD CONSTRAINT `FK_ANTICALCAIRE_DEMANDE` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
