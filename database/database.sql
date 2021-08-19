-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:14 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `baocao`
--

CREATE TABLE `baocao` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `thisinh_id` int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
  `ketquathi` text NOT NULL COMMENT 'Kết quả thi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baocao`
--

INSERT INTO `baocao` (`id`, `thisinh_id`, `ketquathi`) VALUES
(12, 11, '131qưeqr'),
(13, 11, 'u55411111');

-- --------------------------------------------------------

--
-- Table structure for table `bienban`
--

CREATE TABLE `bienban` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `thisinh_id` int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
  `tieude` varchar(100) NOT NULL COMMENT 'Tiêu đề biên bản',
  `noidung` longtext NOT NULL COMMENT 'Nội dung biên bản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bienban`
--

INSERT INTO `bienban` (`id`, `thisinh_id`, `tieude`, `noidung`) VALUES
(7, 10, 'ewew', 'rewre'),
(8, 10, 'ewew', 'rewre                '),
(9, 10, 'ewew2', 'rewre                                '),
(12, 10, 'ewew', 'rewre');

-- --------------------------------------------------------

--
-- Table structure for table `cathi`
--

CREATE TABLE `cathi` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `thisinh_id` int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
  `phongthi_id` int(11) NOT NULL COMMENT 'Khóa ngoại bảng PhongThi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phongthi`
--

CREATE TABLE `phongthi` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `maphongthi` varchar(20) NOT NULL COMMENT 'Mã phòng thi',
  `ngaythi` datetime NOT NULL COMMENT 'Ngày thi',
  `thoigianbatdau` datetime NOT NULL COMMENT 'Thời gian bắt đầu thi',
  `thoigianketthuc` datetime NOT NULL COMMENT 'Thời gian kết thúc thi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongthi`
--

INSERT INTO `phongthi` (`id`, `maphongthi`, `ngaythi`, `thoigianbatdau`, `thoigianketthuc`) VALUES
(1, 'PT1', '2021-08-16 00:00:00', '2021-08-16 00:00:00', '2021-08-16 00:00:00'),
(2, 'PT2', '2021-08-16 10:19:13', '2021-08-16 10:19:13', '2021-08-16 10:19:13'),
(3, 'gfd', '2021-08-03 00:00:00', '2021-08-05 00:00:00', '2021-08-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quydinh`
--

CREATE TABLE `quydinh` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `tenquydinh` varchar(100) NOT NULL COMMENT 'Tên quy định',
  `noidung` longtext NOT NULL COMMENT 'Nội dung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quydinh`
--

INSERT INTO `quydinh` (`id`, `tenquydinh`, `noidung`) VALUES
(4, 'Quy định 1', 'Quy định 1'),
(5, '123', 'gưe23'),
(6, 'hre5', 'j65'),
(7, 'Quy định 1', 'Quy định 1'),
(9, 'quy dinh 3', 'thhth');

-- --------------------------------------------------------

--
-- Table structure for table `thisinh`
--

CREATE TABLE `thisinh` (
  `id` int(11) NOT NULL COMMENT 'Khóa chính',
  `mathisinh` varchar(20) NOT NULL COMMENT 'Mã thí sinh',
  `hoten` varchar(30) NOT NULL COMMENT 'Họ tên',
  `ngaysinh` date NOT NULL COMMENT 'Ngày sinh',
  `diachi` text NOT NULL COMMENT 'Địa chỉ',
  `socmt` varchar(50) NOT NULL COMMENT 'Số chứng minh thư',
  `ngaydangkythi` datetime DEFAULT current_timestamp() COMMENT 'Ngày đăng ký dự thi',
  `sodienthoai` varchar(20) DEFAULT NULL COMMENT 'Số điện thoại',
  `gioitinh` int(10) DEFAULT 1 COMMENT 'Giới tính (1: nam, 2: nữ, 3: khác)',
  `avatar_photo_path` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thisinh`
--

INSERT INTO `thisinh` (`id`, `mathisinh`, `hoten`, `ngaysinh`, `diachi`, `socmt`, `ngaydangkythi`, `sodienthoai`, `gioitinh`, `avatar_photo_path`) VALUES
(10, 'TS3', 'retrert', '2021-08-17', 'ha noi', '12323', '2021-09-03 00:00:00', '0353490272', 2, 'public/uploads/mefo.jpg'),
(11, 'TS12', 'Nguyen van e', '2021-08-05', 'ykur', '4756fd', '2021-08-17 00:00:00', '0769158238', 1, 'public/uploads/230797316_2935004833464142_4303336274100791962_n.jpg'),
(12, 'TS76', 'cxcxc', '2021-08-04', '5674g', '5675', '2021-08-17 00:00:00', '0769158238', 1, 'public/uploads/mefo 2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thisinh_id` (`thisinh_id`);

--
-- Indexes for table `bienban`
--
ALTER TABLE `bienban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thisinh_id` (`thisinh_id`);

--
-- Indexes for table `cathi`
--
ALTER TABLE `cathi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thisinh_id` (`thisinh_id`),
  ADD KEY `phongthi_id` (`phongthi_id`);

--
-- Indexes for table `phongthi`
--
ALTER TABLE `phongthi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quydinh`
--
ALTER TABLE `quydinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thisinh`
--
ALTER TABLE `thisinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bienban`
--
ALTER TABLE `bienban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cathi`
--
ALTER TABLE `cathi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính';

--
-- AUTO_INCREMENT for table `phongthi`
--
ALTER TABLE `phongthi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quydinh`
--
ALTER TABLE `quydinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thisinh`
--
ALTER TABLE `thisinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ibfk_1` FOREIGN KEY (`thisinh_id`) REFERENCES `thisinh` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bienban`
--
ALTER TABLE `bienban`
  ADD CONSTRAINT `bienban_ibfk_1` FOREIGN KEY (`thisinh_id`) REFERENCES `thisinh` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cathi`
--
ALTER TABLE `cathi`
  ADD CONSTRAINT `cathi_ibfk_1` FOREIGN KEY (`thisinh_id`) REFERENCES `thisinh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cathi_ibfk_2` FOREIGN KEY (`phongthi_id`) REFERENCES `phongthi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
