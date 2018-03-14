-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2018 at 11:30 AM
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
-- Table structure for table `qualif_sol_plastique`
--

DROP TABLE IF EXISTS `qualif_sol_plastique`;
CREATE TABLE `qualif_sol_plastique` (
  `ID_QUALIF_SOL_PLASTIQUE` bigint(20) NOT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `NBRE_PIECE` varchar(200) NOT NULL,
  `SURFACE_TOTALE` varchar(200) DEFAULT NULL,
  `ENLEVEMENT_REVETEMENT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualif_sol_plastique`
--
ALTER TABLE `qualif_sol_plastique`
  ADD PRIMARY KEY (`ID_QUALIF_SOL_PLASTIQUE`),
  ADD KEY `fk_qualif_renovation_demande_devis1_idx` (`ID_DEMANDE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualif_sol_plastique`
--
ALTER TABLE `qualif_sol_plastique`
  MODIFY `ID_QUALIF_SOL_PLASTIQUE` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `activite` (`ID_ACTIVITE`, `LIBELLE`, `GROUP`, `REF`) VALUES (NULL, 'Sol Plastique', NULL, 'SOP');
