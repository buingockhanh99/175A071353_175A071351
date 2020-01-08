-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 08, 2020 lúc 08:47 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id12066084_qlltgd`
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

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MAGV`, `HODEM`, `TEN`, `DONVI`, `LIENHE`) VALUES
('3', 'Bùi Ngọc', 'Khánh', 'Công nghệ thông tin', 'giaovien@gmail.com');

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
  `ID` int(11) NOT NULL,
  `MAGV` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GIAIDOANBD` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `GIAIDOANKT` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `DAY` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LOPDAY` char(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachgiangday`
--

INSERT INTO `kehoachgiangday` (`ID`, `MAGV`, `TENMONHOC`, `GIAIDOANBD`, `GIAIDOANKT`, `DIADIEM`, `THOIGIAN`, `DAY`, `LOPDAY`) VALUES
(1, '3', 'Lập trình nâng cao', '2018-2019_1', '2018-2019_2', 'Khánh hòa', '1,2,3', 'Thứ 2, Thứ 4', '59TH1'),
(4, '3', 'Ngôn ngữ lập trình', '2018-2019_1', '2018-2019_1', 'quy nhơn', '1,2,3', 'Thứ 3, Thứ 6', '59TH2');

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
('1', 'admin', '$2y$10$GZebDtrfD3SLRMfxUDM.mesNFfmdkuFXjQ4NzoEtoPmERDqFtcSqS', 1, 1),
('2', 'quanly@gmail.com', '$2y$10$GZebDtrfD3SLRMfxUDM.mesNFfmdkuFXjQ4NzoEtoPmERDqFtcSqS', 2, 1),
('3', 'giaovien@gmail.com', '$2y$10$Y.2n93uNdxR8bJSwoxNhZOmCwySCkRXOJHV0MluE0SegODJertahW', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loptheonganhhoc`
--

CREATE TABLE `loptheonganhhoc` (
  `LOP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loptheonganhhoc`
--

INSERT INTO `loptheonganhhoc` (`LOP`) VALUES
('59TH1'),
('59TH2'),
('59TH3'),
('59TH4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MONHOC`) VALUES
('Lập trình nâng cao'),
('Ngôn ngữ lập trình'),
('Toán rời rạc');

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

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`MAQL`, `HOTEN`, `DIACHI`, `LIENHE`) VALUES
('2', 'Bùi Ngọc Khánh', '175 Tây Sơn', 'quanly@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quenmatkhau`
--

CREATE TABLE `quenmatkhau` (
  `maxn` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`LIENHE`),
  ADD KEY `MAGV` (`MAGV`);

--
-- Chỉ mục cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MAGV` (`MAGV`),
  ADD KEY `TENMONHOC` (`TENMONHOC`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MONHOC`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`LIENHE`),
  ADD KEY `MAQL` (`MAQL`);

--
-- Chỉ mục cho bảng `quenmatkhau`
--
ALTER TABLE `quenmatkhau`
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `kehoachgiangday_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_2` FOREIGN KEY (`TENMONHOC`) REFERENCES `monhoc` (`MONHOC`);

--
-- Các ràng buộc cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD CONSTRAINT `quanly_ibfk_1` FOREIGN KEY (`MAQL`) REFERENCES `login` (`ID`);

--
-- Các ràng buộc cho bảng `quenmatkhau`
--
ALTER TABLE `quenmatkhau`
  ADD CONSTRAINT `quenmatkhau_ibfk_1` FOREIGN KEY (`email`) REFERENCES `giangvien` (`LIENHE`),
  ADD CONSTRAINT `quenmatkhau_ibfk_2` FOREIGN KEY (`email`) REFERENCES `quanly` (`LIENHE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
