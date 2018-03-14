-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Février 2018 à 19:10
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
-- Structure de la table `artisan`
--

DROP TABLE IF EXISTS `artisan`;
CREATE TABLE IF NOT EXISTS `artisan` (
  `ID_ARTISAN` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_ARTISAN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PRENOM_ARTISAN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `LOGIN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PASS` varchar(128) CHARACTER SET utf8 NOT NULL,
  `RAISON_SOCIALE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `EMAIL_ARTISAN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `TELEPHONE_FIXE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `TELEPHONE_PORTABLE` varchar(200) CHARACTER SET utf8 NOT NULL,
  `FAX` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `RCS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SIRET` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CODE_NAF` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `HORAIRERDV` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DESCRIPTION` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `QUALIFICATION` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ADRESSE` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `ADRESSE2` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `CODE_POSTAL` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `VILLE` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `CREDIT_DISPO` float NOT NULL DEFAULT '0',
  `CENTER` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAYON` int(11) DEFAULT '0',
  `LAT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LNG` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GEOLOCALISATION` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ARTISAN`),
  UNIQUE KEY `LOGIN_ARTISAN` (`LOGIN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Contenu de la table `artisan`
--

INSERT INTO `artisan` (`ID_ARTISAN`, `NOM_ARTISAN`, `PRENOM_ARTISAN`, `LOGIN`, `PASS`, `RAISON_SOCIALE`, `EMAIL_ARTISAN`, `TELEPHONE_FIXE`, `TELEPHONE_PORTABLE`, `FAX`, `RCS`, `SIRET`, `CODE_NAF`, `HORAIRERDV`, `DESCRIPTION`, `QUALIFICATION`, `ADRESSE`, `ADRESSE2`, `CODE_POSTAL`, `VILLE`, `CREDIT_DISPO`, `CENTER`, `RAYON`, `LAT`, `LNG`, `GEOLOCALISATION`) VALUES
(11, 'Buky', 'Barns', 'bucky', '49fb2fd3630355bc22647168c3df096ee1491f103983b028a2c252a712859bb2', 'Raison', 'filinzaghi@gmail.com', '+33 01 23 45 67 89', '+33 01 23 45 67 89', '', '', '', '', '', '', '', 'Bushwick Brooklyn, NY', '', '11207', '', 0, NULL, 0, NULL, NULL, NULL),
(12, 'ID MANSOUR', 'Abdelaziz', 'aziz', '49fb2fd3630355bc22647168c3df096ee1491f103983b028a2c252a712859bb2', 'SMITECH', 'aziz.idmansour@gmail.com', '0524402908', '0677306879', 'Mon Fax', 'Mon RCS', 'Mon SIRET', 'Mon Code NAF', '09h-18h', '', 'Qualifié', 'QUARTIER DECHAMPS N°253', 'Mon Adresse 2', '85000', 'MARYOTTE', 200, '66000', 10000, '42.6965954131', '2.89936953979', 'geographique'),
(27, 'erratbi', 'youssef', 'erratbi', '209974c58228f055a0b35145fcc2301d9826407941679a9092e64a7671a5de97', 'raison', 'yerratbi@gmail.com', '012345679', '012345679', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '66000', NULL, 0, NULL, 0, NULL, NULL, NULL),
(28, 'lannister', 'jamie', 'lannister', '61b48e99117be0a5105f391005fd7365e99afa09f27b140b6d6221ba17238651', 'lannister', 'y.err.atbi@gmail.com', '0123456789', '0123456789', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '66000', NULL, 0, NULL, 0, NULL, NULL, NULL),
(29, 'test', 'test', 'err.atbi', '49fb2fd3630355bc22647168c3df096ee1491f103983b028a2c252a712859bb2', 'test', 'y.er.ratbi@gmail.com', '01 23 45 67 89', '01 23 45 67 89', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '66000', NULL, 0, NULL, 0, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
