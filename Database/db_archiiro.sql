-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_archiiro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

CREATE TABLE `tb_contract` (
  `id_contract` int(11) NOT NULL,
  `id_home` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCreate` date DEFAULT current_timestamp(),
  `lastDate` date DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_contract`
--

INSERT INTO `tb_contract` (`id_contract`, `id_home`, `id_customer`, `id_staff`, `note`, `dateCreate`, `lastDate`, `status`) VALUES
(1, 2, 11, 1, 'Ngày 25/06/2022 thực hiện kí hợp đồng', '2022-06-23', '2022-06-23', 1),
(2, 4, 13, 1, '30/06/2022 Kí kết hợp đồng', '2022-06-23', '2022-06-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `cardNumber` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateRange` datetime DEFAULT NULL,
  `isuseBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageFront` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageBack` char(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `cardNumber`, `dateRange`, `isuseBy`, `imageFront`, `imageBack`) VALUES
(9, '022498239423', '2016-06-20 17:44:00', 'Công an tỉnh Hà Nội', 'matTruoc.jpg', 'matSau.png'),
(10, '098394234234', '2018-06-19 17:46:39', 'Công an tỉnh Bắc Ninh', 'matTruoc.jpg', 'matSau.png'),
(11, '012423742323', '2015-06-17 18:21:15', 'Công an tỉnh Thái Bình', 'matTruoc.jpg', 'matSau.png'),
(12, '082342347823', '2022-06-07 17:53:30', 'Công an tỉnh Hải Dương', 'matTruoc.jpg', NULL),
(13, '023742377332', '2015-06-10 18:23:16', 'Công an tỉnh Hà Nội', 'matTruoc.jpg', 'matSau.png'),
(17, '033423492934', '2016-06-20 17:53:30', 'Công an tỉnh Ninh Bình', 'matTruoc.jpg', 'matSau.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_home`
--

CREATE TABLE `tb_home` (
  `id_home` int(11) NOT NULL,
  `id_typeHome` int(11) DEFAULT NULL,
  `name_home` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priceSale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_home` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_home` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberRoom` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberBedRoom` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberBathRoom` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image1` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image4` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image5` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_home`
--

INSERT INTO `tb_home` (`id_home`, `id_typeHome`, `name_home`, `price`, `priceSale`, `area_home`, `address_home`, `numberRoom`, `numberBedRoom`, `numberBathRoom`, `description`, `image1`, `image2`, `image3`, `image4`, `image5`, `status`) VALUES
(1, 1, 'Villa Keona - While Magic', '7300000000', '1', '150', 'Hoàng Mai, Hà Nội', '3', '5', '3', 'Ngôi nhà sang trọng nằm gần trung tâm thành phố & được thiết kế bởi Archiiro phối hợp với Gentle + Queo, tọa lạc tại Hoàng, Mai Hà Nội', 'villa_1.jpg', 'villa_noithat-1.jpg', 'villa_phongngu_1.jpg', 'villa_phongkhach_2.jpg', '', 1),
(2, 1, 'Biệt thự nhà vườn mini', '5500000000', '0.5', '120', 'Tây Sơn, Đống Đa, Hà Nội', '2', '4', '3', 'Thiết kế mẫu biệt thự nhà vườn mini mái thái hiện đại, phong cách kiến trúc đơn giản nhưng đầy tinh tế và sang trọng. Mặt bằng công năng luôn được bố trí tối ưu theo đúng nhu cầu sử dụng của từng thành viên trong gia đình.', 'villa_13.jpg', 'villa_14.jpg', 'villa_noithat-1.jpg', 'villa_phongkhach_2.jpg', 'villa_phongngu_1.jpg', 3),
(3, 1, 'Biệt thự vườn mini 2 tầng', '4000000000', '0', '120', 'Thanh Xuân, Hà Nội', '3', '3', '3', 'Chủ đầu tư mong muốn sở hữu một căn biệt thự với không gian sống mở, sang trọng, với diện tích đất của gia đình khá rộng rãi việc thiết kế một mẫu biệt thự hoành tráng cho gia đình là lựa chọn của gia đình đang hướng đến. Với căn biệt thự có hồ bơi được N', 'villa_11.jpg', 'villa_12.jpg', 'villa_15.jpg', '', '', 1),
(4, 1, 'Biệt thự 2 tầng tại Hà Nội', '3700000000', '0', '99', 'Nam Từ Liêm, Hà Nội', '3', '3', '3', 'Nhìn từ xa, công trình nổi bật với hình khối kiến trúc vuông vắn, thống nhất thành một khối vững chắc. Với kiểu dáng mái thái đã giúp cho ngôi nhà trở nên thanh thoát, bề thế hơn và mang đến tính thẩm mỹ cao. Thêm vào đó là sự phối hợp màu sắc hết sức hà', 'villa_13.jpg', 'about.jpg', 'villa_phongngu_1.jpg', '', '', 2),
(5, 1, 'Biệt thự ngoại thành Hà Nội', '2000000000', '0', '80', 'Chương mỹ, Hà Nội', '3', '3', '3', 'Với tông màu chủ đạo là gam màu trắng sáng, tinh tế cùng mái thái ấn tượng, công trình toát lên sự sang trọng và cuốn hút Phía dưới chân công trình được thiết kế một bồn hoa, để gia chủ có thể trồng các loại hoa yêu thích, tạo điểm nhấn mới lạ.\r\nBể bơi cũ', 'villa_11.jpg', 'villa_12.jpg', 'villa_14.jpg', '', '', 1),
(6, 2, 'Tập thể Trung Tự', '300000000', '0', '40', 'Đống Đa, Hà Nội', '1', '2', '2', 'Gần các tuyến đường lớn trung tâm, gần các trung tâm thương mại, gần hồ...\r\nTiện ích công cộng gần trường cấp 1 cấp 2, các trường đại học lân cận\r\nCách 500 mét là Công an phường, gần công viên trung tâm', 'tt1.jpg', 'tt2.jpg', '', '', '', 1),
(7, 2, 'Tập thể Kim Liên', '250000000', '1', '60', 'Đống Đa, Hà Nội', '1', '2', '2', 'Gần các tuyến đường lớn trung tâm, gần các trung tâm thương mại, gần hồ...\r\nTiện ích công cộng gần trường cấp 1 cấp 2, các trường đại học lân cận\r\nCách 500 mét là Công an phường, gần công viên trung tâm', 'tt3.jpg', 'tt4.jpg', 'tt5.jpg', '', '', 1),
(8, 2, 'Tập thể Vĩnh Hồ', '260000000', '0.8', '70', 'Đống Đa, Hà Nội', '1', '2', '2', 'Gần các tuyến đường lớn trung tâm, gần các trung tâm thương mại, gần hồ...\r\nTiện ích công cộng gần trường cấp 1 cấp 2, các trường đại học lân cận\r\nCách 500 mét là Công an phường, gần công viên trung tâm', 'tt6.jpg', 'tt7.jpg', '', '', '', 1),
(9, 2, 'Tập thể Trung Văn', '350000000', '2', '85', 'Nam Từ Liêm, Hà Nội', '1', '3', '2', 'Gần các tuyến đường lớn trung tâm, gần các trung tâm thương mại, gần hồ...\r\nTiện ích công cộng gần trường cấp 1 cấp 2, các trường đại học lân cận\r\nCách 500 mét là Công an phường, gần công viên trung tâm', 'tt8.jpg', 'tt9.jpg', 'tt10.jpg', '', '', 1),
(10, 2, 'Chung cư Linh Đàm', '4000000000', '2', '80', 'Hoàng Mai, Hà Nội', '1', '2', '2', 'Gần các tuyến đường lớn trung tâm, gần các trung tâm thương mại, gần hồ...\r\nTiện ích công cộng gần trường cấp 1 cấp 2, các trường đại học lân cận\r\nCách 500 mét là Công an phường, gần công viên trung tâm', 'tt11.jpg', 'tt13.jpg', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL,
  `postTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postContent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idWriter` int(11) DEFAULT NULL,
  `dateCreate` date DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `postTitle`, `img_post`, `postContent`, `idWriter`, `dateCreate`, `status`) VALUES
(1, 'Biệt thự nhà vườn là gì?', 'villa_15.jpg', 'Biệt thự nhà vườn là một công trình nhà ở được xây dựng trên một diện tích đất lớn. Thông thường, gia chủ sẽ thường kết hợp thêm các cảnh quan xung quanh sân vườn như vườn cây, tiểu cảnh, các đài phun nước,… để cảnh quan thêm phần đặc sắc. Ngoài ra, đây c', 1, '2022-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id_staff` int(11) NOT NULL,
  `daySalary` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dayStart` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id_staff`, `daySalary`, `dayStart`) VALUES
(3, '400.000', '2022-06-23'),
(4, '300.000', '2022-06-22'),
(5, '400.000', '2022-06-23'),
(6, '400.000', '2022-06-23'),
(7, '500.000', '2022-06-23'),
(8, '1.000.000', '2022-06-10'),
(15, '1.000.000', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_typehome`
--

CREATE TABLE `tb_typehome` (
  `id_typeHome` int(11) NOT NULL,
  `name_typeHome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_typeHome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_typehome`
--

INSERT INTO `tb_typehome` (`id_typeHome`, `name_typeHome`, `img_typeHome`, `status`) VALUES
(1, 'Villa', 'villa.png', 1),
(2, 'Chung cư', 'icon-condominium.png', 1),
(3, 'Căn hộ thông minh', 'house.png', 1),
(4, 'Văn phòng', 'icon-housing.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `user_pass` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regisdate` datetime DEFAULT current_timestamp(),
  `levelUser` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `firstName`, `lastName`, `email`, `phoneNumber`, `birthday`, `user_pass`, `gender`, `address`, `image`, `regisdate`, `levelUser`, `status`) VALUES
(1, 'Don\'t', 'Cry', 'archiiro@gmail.com', '0962193243', '2001-09-20', '12345', 1, 'Tây Sơn, Đống Đa, Hà Nội', 'admin.jpg', NULL, 1, 2),
(2, 'Nguyễn Minh', 'Đức', 'ducnm@gmail.com', '0129832324', '2022-06-23', '12345', 1, 'Mai Động, Hoàng Mai, Hà Nội', 'duc.jpg', '2022-06-23 10:55:32', 1, 2),
(3, 'Trịnh Hoàng', 'Long', 'longth@gmail.com', '0219482421', '2022-06-23', '12345', 1, 'Chương Mỹ, Hà Nội', 'long.jpg', '2022-06-23 10:58:22', 2, 2),
(4, 'Hồ Hồng', 'Quân', 'quanhh@gmail.com', '0125923423', '2022-06-23', '12345', 1, 'Nam Từ Liêm, Hà Nội', 'quan.jpg', '2022-06-23 10:59:44', 2, 2),
(5, 'Nguyễn Văn', 'Tân', 'tannv@gmail.com', '0832423423', '2022-06-23', '12345', 1, 'Tây Sơn, Đống Đa, Hà Nội', 'tan.jpg', '2022-06-23 11:03:42', 2, 2),
(6, 'Nguyễn Minh', 'Vương', 'vuongnm@gmail.com', '0821489234', '2022-06-23', '12345', NULL, 'Long Biên, Hà Nội', NULL, '2022-06-23 11:04:26', 2, 2),
(7, 'Nguyễn Thị', 'Diên', 'diennt@gmail.com', '0958237648', '2022-06-23', '12345', 2, 'Đống Đa, Hà Nội', 'user_default.png', '2022-06-23 11:06:33', 2, 2),
(8, 'Trần Hữu', 'Đạt', 'datth@gmail.com', '0923849353', '2022-06-23', '12345', 1, 'Hà Đông, Hà Nội', 'k98x8.jpg', '2022-06-23 11:07:14', 2, 2),
(9, 'Nguyễn Đức', 'Anh', 'anhnd@gmail.com', '0926423482', '2022-06-23', '12345', 1, 'Tây Sơn, Đống Đa, Hà Nội', 'ducanh.jpg', '2022-06-23 11:38:24', 3, 1),
(10, 'Nguyễn Thành', 'Đạt', 'datnt@gmail.com', '0924923423', '2022-06-23', '12345', NULL, 'Bắc Từ Liêm, Hà Nội', NULL, '2022-06-23 11:39:16', 3, 1),
(11, 'Trịnh Hoàng', 'Phương', 'phuongth@gmail.com', '0924823423', '2022-06-23', '12345', 2, 'Thanh Xuân, Hà Nội', 'phuong.jpg', '2022-06-23 11:42:00', 3, 1),
(12, 'Vũ Hải', 'Anh', 'anhvh@gmail.com', '09218423834', '2022-06-23', '12345', 1, 'Trường Chinh, Hà Nội', 'haianh.jpg', '2022-06-23 11:43:11', 3, 1),
(13, 'Nguyễn Thu', 'Trang', 'trangnt@gmail.com', '0998324872', '2022-06-23', '12345', NULL, 'Hà Đông, Hà Nội', NULL, '2022-06-23 11:50:37', 3, 1),
(14, 'Nguyễn Đình', 'Duy', 'duynd@gmail.com', '09274238423', '2022-06-23', '12345', NULL, 'Tây Sơn, Đống Đa, Hà Nội', NULL, '2022-06-23 11:51:53', 2, 1),
(15, 'Đỗ Thùy', 'Linh', 'linhdt@gmail.com', '0912848232', '2022-06-23', '12345', 2, 'Hoàng Mai, Hà Nội', 'male1.jpg', '2022-06-23 11:57:52', 2, 2),
(16, 'Phạm Quốc', 'Duy', 'duypq@gmail.com', '023984239', '2022-06-23', '12345', NULL, 'Thanh Xuân, Hà Nội', NULL, '2022-06-23 11:59:26', 2, 1),
(17, 'Nguyễn Thu', 'Hoài', 'hoaint@gmail.com', '0234823423', '2022-06-23', '12345', 2, 'Thanh Xuân, Hà Nội', 'male1.jpg', '2022-06-23 17:53:01', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD PRIMARY KEY (`id_contract`),
  ADD KEY `id_home` (`id_home`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD UNIQUE KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tb_home`
--
ALTER TABLE `tb_home`
  ADD PRIMARY KEY (`id_home`),
  ADD KEY `id_typeHome` (`id_typeHome`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `idWriter` (`idWriter`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD UNIQUE KEY `id_staff` (`id_staff`);

--
-- Indexes for table `tb_typehome`
--
ALTER TABLE `tb_typehome`
  ADD PRIMARY KEY (`id_typeHome`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contract`
--
ALTER TABLE `tb_contract`
  MODIFY `id_contract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_home`
--
ALTER TABLE `tb_home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_typehome`
--
ALTER TABLE `tb_typehome`
  MODIFY `id_typeHome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD CONSTRAINT `tb_contract_ibfk_1` FOREIGN KEY (`id_home`) REFERENCES `tb_home` (`id_home`),
  ADD CONSTRAINT `tb_contract_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_contract_ibfk_3` FOREIGN KEY (`id_staff`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `tb_customer_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_home`
--
ALTER TABLE `tb_home`
  ADD CONSTRAINT `tb_home_ibfk_1` FOREIGN KEY (`id_typeHome`) REFERENCES `tb_typehome` (`id_typeHome`);

--
-- Constraints for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`idWriter`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD CONSTRAINT `tb_staff_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
