-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 05:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indra_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` char(20) DEFAULT NULL,
  `pass` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `pass`) VALUES
('rasyadakm', '81dc9bdb52d04dc20036'),
('reza', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ditlantas`
--

CREATE TABLE `ditlantas` (
  `plat_nomor` char(10) NOT NULL,
  `pajak` char(20) NOT NULL,
  `jenis_kendaraan` char(10) DEFAULT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ditlantas`
--

INSERT INTO `ditlantas` (`plat_nomor`, `pajak`, `jenis_kendaraan`, `is_delete`) VALUES
('1742175a57', '17 Januari 2029', NULL, b'0'),
('B1111AA', '12 Januari 2024', NULL, b'0'),
('B1234BB', '13 Februari 2025', NULL, b'0'),
('B2991KYT', '13 Maret 2029', 'Minibus', b'0'),
('B3774UIT', '21 Februari 2025', 'Minibus', b'0'),
('B6677AA', '13 Maret 2029', NULL, b'0'),
('B7777RG', '12 Juli 2025', NULL, b'0'),
('B9966PIU', '13 Februari 2025', NULL, b'0'),
('B9966UI', '21 Maret 2026', 'City Car', b'0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ijoin`
-- (See below for the actual view)
--
CREATE TABLE `ijoin` (
`plat_nomor` char(10)
,`nomor_rangka` char(15)
,`nama_pemilik` char(20)
,`merk` char(10)
,`pajak` char(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `indra`
--

CREATE TABLE `indra` (
  `plat_nomor` char(10) NOT NULL,
  `nomor_rangka` char(15) NOT NULL,
  `nama_pemilik` char(20) NOT NULL,
  `merk` char(10) DEFAULT NULL,
  `pajak` char(20) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indra`
--

INSERT INTO `indra` (`plat_nomor`, `nomor_rangka`, `nama_pemilik`, `merk`, `pajak`, `is_delete`) VALUES
('B2991KYT', '21120120', 'Reza Dani', 'Suzuki', '', b'0'),
('B3774UIT', '21120119', 'Rasyad Akmal', 'Daihatsu', '', b'0'),
('B9966UI', '21120121', 'Maulana Kifly', 'BMW', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `nomor_rangka` char(20) NOT NULL,
  `merk` char(15) NOT NULL,
  `warna` char(10) DEFAULT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`nomor_rangka`, `merk`, `warna`, `is_delete`) VALUES
('21120119', 'Daihatsu', 'Putih', b'0'),
('21120120', 'Suzuki', 'Biru', b'0'),
('21120121', 'BMW', 'Putih', b'0');

-- --------------------------------------------------------

--
-- Structure for view `ijoin`
--
DROP TABLE IF EXISTS `ijoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ijoin`  AS  select `indra`.`plat_nomor` AS `plat_nomor`,`indra`.`nomor_rangka` AS `nomor_rangka`,`indra`.`nama_pemilik` AS `nama_pemilik`,`indra`.`merk` AS `merk`,`ditlantas`.`pajak` AS `pajak` from (`indra` join `ditlantas` on(`indra`.`plat_nomor` = `ditlantas`.`plat_nomor`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ditlantas`
--
ALTER TABLE `ditlantas`
  ADD PRIMARY KEY (`plat_nomor`);

--
-- Indexes for table `indra`
--
ALTER TABLE `indra`
  ADD PRIMARY KEY (`plat_nomor`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`nomor_rangka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
