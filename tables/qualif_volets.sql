-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2018 at 11:23 AM
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
-- Table structure for table `qualif_volets`
--

DROP TABLE IF EXISTS `qualif_volets`;
CREATE TABLE `qualif_volets` (
  `ID_QUALIF_VOLETS` bigint(20) NOT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `TYPE_VOLETS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `NBRE_VOLETS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DISPOSE_VOLETS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `FERMETURE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `VOLETS_MOTORISES` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `MATERIAUX_VOLETS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `TYPE_TRAVAUX` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualif_volets`
--
ALTER TABLE `qualif_volets`
  ADD PRIMARY KEY (`ID_QUALIF_VOLETS`),
  ADD KEY `FK_QUALIFIER_CHAUFFAGE` (`ID_DEMANDE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualif_volets`
--
ALTER TABLE `qualif_volets`
  MODIFY `ID_QUALIF_VOLETS` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
