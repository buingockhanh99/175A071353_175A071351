-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2019 lúc 02:12 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlltgd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
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
-- Cấu trúc bảng cho bảng `hockygiaidoan`
--

CREATE TABLE `hockygiaidoan` (
  `HOCKY` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hockygiaidoan`
--

INSERT INTO `hockygiaidoan` (`HOCKY`) VALUES
('2018-2019_1'),
('2018-2019_2'),
('2019-2020_1'),
('2019-2020_2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachgiangday`
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
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `ID` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `LEVEL` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`, `LEVEL`, `STATUS`) VALUES
('1', 'admin', '$2y$10$mrvflc8LsmUwDWVKN7Td5e4/oGyiT6sKZn40tMaB.lrj9ZaIBQ8MG', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loptheonganhhoc`
--

CREATE TABLE `loptheonganhhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LOP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loptheonganhhoc`
--

INSERT INTO `loptheonganhhoc` (`NGANHHOC`, `LOP`) VALUES
('Công nghệ thông tin', '59TH1'),
('Công nghệ thông tin', '59TH2'),
('Công nghệ thông tin', '59TH3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`NGANHHOC`, `MONHOC`) VALUES
('Công nghệ thông tin', 'Toán rời rạc'),
('Công nghệ thông tin', 'Ngôn ngữ lập trình'),
('Công nghệ thông tin', 'Lập trình nâng cao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `NGANHHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhhoc`
--

INSERT INTO `nganhhoc` (`NGANHHOC`) VALUES
('Công nghệ thông tin'),
('Kế toán'),
('Kinh tế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `MAQL` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LIENHE` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quenmatkhau`
--

CREATE TABLE `quenmatkhau` (
  `maxn` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD KEY `MAGV` (`MAGV`);

--
-- Chỉ mục cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD KEY `MAGV` (`MAGV`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loptheonganhhoc`
--
ALTER TABLE `loptheonganhhoc`
  ADD KEY `NGANHHOC` (`NGANHHOC`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD KEY `NGANHHOC` (`NGANHHOC`);

--
-- Chỉ mục cho bảng `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`NGANHHOC`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD KEY `MAQL` (`MAQL`);

--
-- Chỉ mục cho bảng `quenmatkhau`
--
ALTER TABLE `quenmatkhau`
  ADD PRIMARY KEY (`email`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `login` (`ID`);

--
-- Các ràng buộc cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD CONSTRAINT `kehoachgiangday_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`);

--
-- Các ràng buộc cho bảng `loptheonganhhoc`
--
ALTER TABLE `loptheonganhhoc`
  ADD CONSTRAINT `loptheonganhhoc_ibfk_1` FOREIGN KEY (`NGANHHOC`) REFERENCES `nganhhoc` (`NGANHHOC`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`NGANHHOC`) REFERENCES `nganhhoc` (`NGANHHOC`);

--
-- Các ràng buộc cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD CONSTRAINT `quanly_ibfk_1` FOREIGN KEY (`MAQL`) REFERENCES `login` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
