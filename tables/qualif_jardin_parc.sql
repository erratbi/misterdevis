-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 fév. 2018 à 15:03
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
-- Structure de la table `qualif_jardin_parc`
--

DROP TABLE IF EXISTS `qualif_jardin_parc`;
CREATE TABLE IF NOT EXISTS `qualif_jardin_parc` (
  `ID_QUALIF_JARDIN_PARC` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `TYPE_LIEU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SURFACE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPTION` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_QUALIF_JARDIN_PARC`),
  KEY `ID_DEMANDE` (`ID_DEMANDE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `qualif_jardin_parc`
--

INSERT INTO `qualif_jardin_parc` (`ID_QUALIF_JARDIN_PARC`, `ID_DEMANDE`, `TYPE_LIEU`, `SURFACE`, `DESCRIPTION`) VALUES
(1, 102, 'Jardin privé', '2000', 'description descriptiondescription description description description description description description description description description description description description description description description description description description description description description description descriptiondescription description description description description description description description description description descriptiondescriptiondescription description description v descriptiondescriptiondescription vv vdescription');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qualif_jardin_parc`
--
ALTER TABLE `qualif_jardin_parc`
  ADD CONSTRAINT `FK_QUALIF_JARDIN_PARC_DEMANDE` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
