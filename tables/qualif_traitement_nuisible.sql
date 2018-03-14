-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 fév. 2018 à 16:09
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_misterdevis_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `qualif_traitement_nuisible`
--

DROP TABLE IF EXISTS `qualif_traitement_nuisible`;
CREATE TABLE IF NOT EXISTS `qualif_traitement_nuisible` (
  `ID_QUALIF_TRAITEMENT_NUISIBLE` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `NBRE_PIECES` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SURFACE_TOTALE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANNEE_CONSTRUCTION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIAGNOSTIC_FAIT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESINSECTISATION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INSECTE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DERATISATION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANIMAL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_QUALIF_TRAITEMENT_NUISIBLE`),
  KEY `ID_DEMANDE` (`ID_DEMANDE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `qualif_traitement_nuisible`
--

INSERT INTO `qualif_traitement_nuisible` (`ID_QUALIF_TRAITEMENT_NUISIBLE`, `ID_DEMANDE`, `NBRE_PIECES`, `SURFACE_TOTALE`, `ANNEE_CONSTRUCTION`, `DIAGNOSTIC_FAIT`, `DESINSECTISATION`, `INSECTE`, `DERATISATION`, `ANIMAL`) VALUES
(1, 84, '3', '200', '1984', 'OUI', 'OUI', 'Cafard & Blattes', 'OUI', 'Le Rat d\'Égout');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qualif_traitement_nuisible`
--
ALTER TABLE `qualif_traitement_nuisible`
  ADD CONSTRAINT `FK_QUALIF_NUISIBLE_DEMANDE` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
