-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2020 lúc 07:34 AM
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

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MAGV`, `HODEM`, `TEN`, `DONVI`, `LIENHE`) VALUES
('3', 'Bùi Ngọc', 'Khánh', 'Công nghệ thông tin', 'giangvien@gmail.com');

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
  `DAY` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LOPDAY` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachgiangday`
--

INSERT INTO `kehoachgiangday` (`ID`, `MAGV`, `TENMONHOC`, `GIAIDOANBD`, `GIAIDOANKT`, `DIADIEM`, `THOIGIAN`, `DAY`, `LOPDAY`) VALUES
(11, '3', 'Lập trình nâng cao', '2018-2019_1', '2018-2019_2', '317B5', '1,2,3', 'Thứ 3, Thứ 6', '59TH1'),
(13, '3', 'Lập trình nâng cao', '2018-2019_1', '2018-2019_2', '315B5', '1,2,3', 'Thứ 2, Thứ 4', '59TH2');

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
('1', 'admin', '$2y$10$mrvflc8LsmUwDWVKN7Td5e4/oGyiT6sKZn40tMaB.lrj9ZaIBQ8MG', 1, 1),
('2', 'quanly@gmail.com', '$2y$10$FuSu8lbBxE0kKbhUMDlBeu3wV5QXuqndvOV69XiGuWiUEXMnA7Qc.', 2, 1),
('3', 'giangvien@gmail.com', '$2y$10$GPV638/dEmNkySFhD7IKRO/rM2L5iVJh5utoAdE.M7n2EsULdW6iO', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loptheonganhhoc`
--

CREATE TABLE `loptheonganhhoc` (
  `LOP` char(50) COLLATE utf8_unicode_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `IDTINTUC` int(11) NOT NULL,
  `TIEUDE` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`IDTINTUC`, `TIEUDE`, `NOIDUNG`) VALUES
(2, ' Chương trình đào tạo theo học chế tín chỉ trình độ liên thông từ cao đẳng lên đại học hệ chính quy áp dụng từ K55LT trở đi (17/12/2013)', 'Chương trình đào tạo theo học chế tín chỉ trình độ liên thông từ cao đẳng lên đại học hệ chính quy áp dụng từ K55LT trở đi (17/12/2013)'),
(3, ' Thông báo thi Tiếng Anh B1 đợt 4 năm 2019 (10/10/2019)', 'Thông báo thi Tiếng Anh B1 đợt 4 năm 2019 (10/10/2019)\r\nThông báo thi Tiếng Anh B1 đợt 4 năm 2019\r\nThông báo thi Tiếng Anh B1 đợt 4 năm 2019'),
(4, 'QUY ĐỊNH TRÌNH BÀY LUẬN VĂN THẠC SĨ, ĐƠN XIN BẢO VỆ LUẬN VĂN (04/05/2016)', 'QUY ĐỊNH TRÌNH BÀY LUẬN VĂN THẠC SĨ, ĐƠN XIN BẢO VỆ LUẬN VĂN (04/05/2016)'),
(5, ' Quy định về đào tạo trình độ thạc sĩ (27/11/2015)', 'Quy định về đào tạo trình độ thạc sĩ (27/11/2015)\r\nQuy định về đào tạo trình độ thạc sĩ'),
(6, ' Thông báo về chấn chỉnh học viên thực hiện Nội quy học tập của Nhà trường (19/11/2015)', 'Thông báo về chấn chỉnh học viên thực hiện Nội quy học tập của Nhà trường (19/11/2015)\r\nNội quy học tập - Học viên phải tham dự các môn học nghiêm túc và đúng giờ. - Nghiêm cấm: Mọi hành vi gian lận trong quá trình học tập, điểm danh, kiểm tra, học hộ hoặc nhờ người khác học hộ.');

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
-- Chỉ mục cho bảng `hockygiaidoan`
--
ALTER TABLE `hockygiaidoan`
  ADD PRIMARY KEY (`HOCKY`);

--
-- Chỉ mục cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MAGV` (`MAGV`),
  ADD KEY `TENMONHOC` (`TENMONHOC`),
  ADD KEY `LOPDAY` (`LOPDAY`),
  ADD KEY `GIAIDOANBD` (`GIAIDOANBD`),
  ADD KEY `GIAIDOANKT` (`GIAIDOANKT`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loptheonganhhoc`
--
ALTER TABLE `loptheonganhhoc`
  ADD PRIMARY KEY (`LOP`);

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
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`IDTINTUC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `IDTINTUC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `kehoachgiangday_ibfk_2` FOREIGN KEY (`TENMONHOC`) REFERENCES `monhoc` (`MONHOC`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_3` FOREIGN KEY (`LOPDAY`) REFERENCES `loptheonganhhoc` (`LOP`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_4` FOREIGN KEY (`GIAIDOANBD`) REFERENCES `hockygiaidoan` (`HOCKY`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_5` FOREIGN KEY (`GIAIDOANKT`) REFERENCES `hockygiaidoan` (`HOCKY`);

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
