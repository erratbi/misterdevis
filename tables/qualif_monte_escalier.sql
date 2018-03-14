-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2018 at 05:49 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 5.6.33-1+ubuntu17.10.1+deb.sury.org+1

SET FOREIGN_KEY_CHECKS=0;
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
-- Table structure for table `qualif_monte_escalier`
--

DROP TABLE IF EXISTS `qualif_monte_escalier`;
CREATE TABLE `qualif_monte_escalier` (
  `ID_QUALIF_MONTE_ESCALIER` int(11) NOT NULL,
  `TYPE_TRAVAUX` varchar(200) DEFAULT NULL,
  `TYPE_ESCALIER` varchar(200) DEFAULT NULL,
  `NBRE_ETAGE` varchar(200) DEFAULT NULL,
  `PERFERENCE_ESTHETIQUE` varchar(200) DEFAULT NULL,
  `LARGEUR_ESCALIER` varchar(200) DEFAULT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualif_monte_escalier`
--
ALTER TABLE `qualif_monte_escalier`
  ADD PRIMARY KEY (`ID_QUALIF_MONTE_ESCALIER`),
  ADD KEY `fk_qualif_monte_escalier_demande` (`ID_DEMANDE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualif_monte_escalier`
--
ALTER TABLE `qualif_monte_escalier`
  MODIFY `ID_QUALIF_MONTE_ESCALIER` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qualif_monte_escalier`
--
ALTER TABLE `qualif_monte_escalier`
  ADD CONSTRAINT `fk_qualif_monte_escalier_demande` FOREIGN KEY (`ID_DEMANDE`) REFERENCES `demande_devis` (`ID_DEMANDE`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
