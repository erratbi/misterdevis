-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2018 at 04:50 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 5.6.33-1+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_misterdevis_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `qualif_alarme_maison`
--

DROP TABLE IF EXISTS `qualif_alarme_maison`;
CREATE TABLE `qualif_alarme_maison` (
  `ID_QUALIF_ALARME_MAISON` bigint(20) NOT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `TYPE_ALARME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SYSTEME_ALARME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `NBRE_PIECE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `NBRE_FENETRE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `TYPE_TRAVAUX` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualif_alarme_maison`
--
ALTER TABLE `qualif_alarme_maison`
  ADD PRIMARY KEY (`ID_QUALIF_ALARME_MAISON`),
  ADD KEY `FK_QUALIFIER_AL_MAISON` (`ID_DEMANDE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualif_alarme_maison`
--
ALTER TABLE `qualif_alarme_maison`
  MODIFY `ID_QUALIF_ALARME_MAISON` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qualif_alarme_maison`
--
ALTER TABLE `qualif_alarme_maison`
  ADD CONSTRAINT `FK_QUALIFIER_AL_MAISON` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
