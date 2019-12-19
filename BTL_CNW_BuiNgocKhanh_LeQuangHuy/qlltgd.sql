-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 02:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlltgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGV` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `HODEM` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DONVI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LIENHE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hockygiaidoan`
--

CREATE TABLE `hockygiaidoan` (
  `HOCKY` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kehoachgiangday`
--

CREATE TABLE `kehoachgiangday` (
  `MAGV` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GIAIDOANBD` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `GIAIDOANKT` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `LOPDAY` char(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `LEVEL` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loptheonganhhoc`
--

CREATE TABLE `loptheonganhhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE `quanly` (
  `MAQL` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LIENHE` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD KEY `MAGV` (`MAGV`);

--
-- Indexes for table `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD KEY `MAGV` (`MAGV`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loptheonganhhoc`
--
ALTER TABLE `loptheonganhhoc`
  ADD KEY `NGANHHOC` (`NGANHHOC`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD KEY `NGANHHOC` (`NGANHHOC`);

--
-- Indexes for table `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`NGANHHOC`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD KEY `MAQL` (`MAQL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `login` (`ID`);

--
-- Constraints for table `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD CONSTRAINT `kehoachgiangday_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`);

--
-- Constraints for table `loptheonganhhoc`
--
ALTER TABLE `loptheonganhhoc`
  ADD CONSTRAINT `loptheonganhhoc_ibfk_1` FOREIGN KEY (`NGANHHOC`) REFERENCES `nganhhoc` (`NGANHHOC`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`NGANHHOC`) REFERENCES `nganhhoc` (`NGANHHOC`);

--
-- Constraints for table `quanly`
--
ALTER TABLE `quanly`
  ADD CONSTRAINT `quanly_ibfk_1` FOREIGN KEY (`MAQL`) REFERENCES `login` (`ID`);
COMMIT;

INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`, `LEVEL`, `STATUS`) VALUES ('1', 'admin', '$2y$10$mrvflc8LsmUwDWVKN7Td5e4/oGyiT6sKZn40tMaB.lrj9ZaIBQ8MG', '1', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
