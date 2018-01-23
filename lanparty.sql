-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2018 at 07:07 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanparty`
--

-- --------------------------------------------------------

--
-- Table structure for table `inscripcions`
--

CREATE TABLE `inscripcions` (
  `id` int(11) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cognom` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoria` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `equip` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nick` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dni` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `naixement` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `poblacio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `major` text NOT NULL,
  `pagat` text NOT NULL,
  `Present` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiquets`
--

CREATE TABLE `tiquets` (
  `id` int(11) NOT NULL,
  `qr_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inscripcions`
--
ALTER TABLE `inscripcions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiquets`
--
ALTER TABLE `tiquets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inscripcions`
--
ALTER TABLE `inscripcions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tiquets`
--
ALTER TABLE `tiquets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
