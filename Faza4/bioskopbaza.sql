-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 12:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrastor`
--

CREATE TABLE `administrastor` (
  `IdA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `IdF` int(11) NOT NULL,
  `Naziv` varchar(20) NOT NULL,
  `Opis` text DEFAULT NULL,
  `Duzina` varchar(20) DEFAULT NULL,
  `Drzava_Godina` varchar(50) DEFAULT NULL,
  `Pocetak_prikazivanja` date DEFAULT NULL,
  `Zanr` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `IdUG` int(11) NOT NULL,
  `IdUR` int(11) NOT NULL,
  `IdPF` int(11) DEFAULT NULL,
  `Poster` mediumblob DEFAULT NULL,
  `Trejler` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gledalac`
--

CREATE TABLE `gledalac` (
  `IdG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `glumac`
--

CREATE TABLE `glumac` (
  `IdUG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `IdK` int(11) NOT NULL,
  `Ime` varchar(20) DEFAULT NULL,
  `Prezime` varchar(20) DEFAULT NULL,
  `Mejl` varchar(50) NOT NULL,
  `Lozinka` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mesto`
--

CREATE TABLE `mesto` (
  `IdM` int(11) NOT NULL,
  `Red` int(11) NOT NULL,
  `Mesto` int(11) NOT NULL,
  `IdS` int(11) NOT NULL,
  `IdR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `predstavnik_filma`
--

CREATE TABLE `predstavnik_filma` (
  `Kompanija` varchar(50) DEFAULT NULL,
  `IdPF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projekcija`
--

CREATE TABLE `projekcija` (
  `IdP` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Vreme` time NOT NULL,
  `Premijera` tinyint(1) DEFAULT NULL,
  `IdF` int(11) NOT NULL,
  `IdS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `IdR` int(11) NOT NULL,
  `Broj_Karata` int(11) NOT NULL,
  `IdP` int(11) NOT NULL,
  `IdG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reziser`
--

CREATE TABLE `reziser` (
  `IdUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `IdS` int(11) NOT NULL,
  `Naziv` varchar(20) DEFAULT NULL,
  `Broj_Mesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ucesnik_u_filmu`
--

CREATE TABLE `ucesnik_u_filmu` (
  `IdU` int(11) NOT NULL,
  `Ime` varchar(20) DEFAULT NULL,
  `Prezime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrastor`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`IdA`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IdF`),
  ADD KEY `R_6` (`IdUG`),
  ADD KEY `R_7` (`IdUR`),
  ADD KEY `R_19` (`IdPF`);

--
-- Indexes for table `gledalac`
--
ALTER TABLE `gledalac`
  ADD PRIMARY KEY (`IdG`);

--
-- Indexes for table `glumac`
--
ALTER TABLE `glumac`
  ADD PRIMARY KEY (`IdUG`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`IdK`);

--
-- Indexes for table `mesto`
--
ALTER TABLE `mesto`
  ADD PRIMARY KEY (`IdM`);

--
-- Indexes for table `predstavnik_filma`
--
ALTER TABLE `predstavnik_filma`
  ADD PRIMARY KEY (`IdPF`);

--
-- Indexes for table `projekcija`
--
ALTER TABLE `projekcija`
  ADD PRIMARY KEY (`IdP`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`IdR`);

--
-- Indexes for table `reziser`
--
ALTER TABLE `reziser`
  ADD PRIMARY KEY (`IdUR`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`IdS`);

--
-- Indexes for table `ucesnik_u_filmu`
--
ALTER TABLE `ucesnik_u_filmu`
  ADD PRIMARY KEY (`IdU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrastor`
--
ALTER TABLE `administrastor`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`IdA`) REFERENCES `korisnik` (`IdK`) ON DELETE CASCADE;

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `R_19` FOREIGN KEY (`IdPF`) REFERENCES `predstavnik_filma` (`IdPF`),
  ADD CONSTRAINT `R_6` FOREIGN KEY (`IdUG`) REFERENCES `glumac` (`IdUG`),
  ADD CONSTRAINT `R_7` FOREIGN KEY (`IdUR`) REFERENCES `reziser` (`IdUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
