-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2018 at 12:57 PM
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
-- Table structure for table `qualif_diagnostic`
--

DROP TABLE IF EXISTS `qualif_diagnostic`;
CREATE TABLE `qualif_diagnostic` (
  `ID_QUALIF_DIAGNOSTIC` bigint(20) NOT NULL,
  `ID_DEMANDE` bigint(20) NOT NULL,
  `TYPE_DIAGNOSTIC` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `NBRE_PIECE` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ANNEE_CONSTRUCTION` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DIAGNOSTIC_FAIT` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SURFACE_TOTALE` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualif_diagnostic`
--
ALTER TABLE `qualif_diagnostic`
  ADD PRIMARY KEY (`ID_QUALIF_DIAGNOSTIC`),
  ADD KEY `FK_QUALIFIER_CHAUFFAGE` (`ID_DEMANDE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualif_diagnostic`
--
ALTER TABLE `qualif_diagnostic`
  MODIFY `ID_QUALIF_DIAGNOSTIC` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
