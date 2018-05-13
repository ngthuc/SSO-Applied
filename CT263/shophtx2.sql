-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2018 lúc 05:47 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophtx2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` int(5) NOT NULL,
  `USER_NAME` varchar(16) NOT NULL,
  `ACC_PASSWORD` varchar(20) DEFAULT NULL,
  `ROLE_ID` int(3) DEFAULT '3',
  `Question_id` int(3) NOT NULL,
  `Anwser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID`, `USER_NAME`, `ACC_PASSWORD`, `ROLE_ID`, `Question_id`, `Anwser`) VALUES
(2, 'admin', '1', 1, 1, ''),
(3, 'customer', '1', 2, 1, ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `USER_ID` int(5) NOT NULL,
  `VEGETABLE_ID` int(5) NOT NULL,
  `AMOUNT` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(5) NOT NULL,
  `CATEGORY_ID` char(6) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `Describe` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `CATEGORY_ID`, `NAME`, `Describe`) VALUES
(1, 'ah', 'các loại rau an hoa', '<p>chỉ lấy hoa</p>\r\n'),
(2, 'sk', 'một số khác', '<p>những sẩn phẩm kh&aacute;c</p>\r\n'),
(3, 'at', 'các loại rau ăn thân', '<p>chỉ sử dụng phần th&acirc;n của c&acirc;y</p>\r\n'),
(4, 'qua', 'các loại quả', '<p>c&aacute;c loại lấy quả</p>\r\n'),
(5, 'nam', 'nấm', '<p>m&ecirc; như nấm</p>\r\n'),
(6, 'c', 'các loại củ', '<p>chỉ sử dụng củ</p>\r\n'),
(9, 'al', 'các loại rau ăn lá', '<p>c&aacute;c loại n&agrave;y ăn l&aacute; v&agrave; c&aacute;c bộ phận gần l&aacute; trừ rễ</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `GENDER` int(1) DEFAULT NULL,
  `USER_ID` int(5) DEFAULT NULL,
  `CUSTOMER_TYPE_ID` int(3) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `NAME`, `GENDER`, `USER_ID`, `CUSTOMER_TYPE_ID`, `ADDRESS`, `PHONE`, `EMAIL`) VALUES
(5, 'sadsadsadas', 0, 3, NULL, 'dsadsa', 'asd', 'asdasdas'),
(6, 'asdsa', 0, 2, NULL, 'dhfkj', 'ashjak', 'sjksd'),
(7, 'thanh', 0, NULL, NULL, 'dhct', '0868973943', 'thanhvvk96@gmail.com'),
(8, 'lgsudh', 0, NULL, NULL, 'hgyusdgfi', '9781132325', 'asdfjahfj@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_type`
--

CREATE TABLE `customer_type` (
  `ID` int(3) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `DISCOUNT` float DEFAULT '0',
  `DESCRIBE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `DESCRIBE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions_detail`
--

CREATE TABLE `functions_detail` (
  `ROLE_ID` int(5) NOT NULL,
  `FUNCTION_ID` int(5) NOT NULL,
  `IS_ACTIVE` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ID` int(5) NOT NULL,
  `CUSTOMER_ID` int(5) NOT NULL,
  `STAFF_ID` int(5) DEFAULT NULL,
  `Receiver_Name` varchar(50) NOT NULL,
  `Receiver_Address` varchar(100) NOT NULL,
  `Receiver_Phone` varchar(20) NOT NULL,
  `DATE_IN` date DEFAULT NULL,
  `DATE_OUT` date DEFAULT NULL,
  `PAYMENT` varchar(50) NOT NULL,
  `STATUS` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `ORDER_ID` int(5) NOT NULL,
  `VEGETABLE_ID` int(5) NOT NULL,
  `AMOUNT` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `ID` int(5) NOT NULL,
  `QUESTION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`ID`, `QUESTION`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `DESCRIBE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`ID`, `NAME`, `DESCRIBE`) VALUES
(1, 'Admin', NULL),
(2, 'Customer', 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `VALUE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `MANAGER_ID` int(5) DEFAULT NULL,
  `USER_ID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`ID`, `NAME`, `ADDRESS`, `PHONE`, `EMAIL`, `MANAGER_ID`, `USER_ID`) VALUES
(1, 'a', 'sdadsa', '67876867', 'adsadsad', 1, NULL),
(3, 'b', 'sdad', 'ádsa', 'đâs', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `Logo` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `DESCRIBE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `COUNTRY` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`ID`, `NAME`, `ADDRESS`, `PHONE`, `EMAIL`, `COUNTRY`) VALUES
(1, 'supplier a', 'N.Y, USA', '+6878798798798', NULL, 'a@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vegetable`
--

CREATE TABLE `vegetable` (
  `ID` int(5) NOT NULL,
  `PRODUCT_ID` char(6) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `phandung` varchar(30) DEFAULT NULL,
  `noisx` varchar(40) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT '0',
  `DISCOUNT` float DEFAULT '0',
  `CATEGORY_ID` int(5) DEFAULT NULL,
  `SUPPLIER_ID` int(5) DEFAULT NULL,
  `DICRIPTION` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vegetable`
--

INSERT INTO `vegetable` (`ID`, `PRODUCT_ID`, `NAME`, `IMAGE`, `phandung`, `noisx`, `PRICE`, `QUANTITY`, `DISCOUNT`, `CATEGORY_ID`, `SUPPLIER_ID`, `DICRIPTION`) VALUES
(1, 'bh', 'bông hẹ', 'bh.jpg', 'lấy thân', 'cần thơ', 25000, 100, 32000, 1, NULL, '<p>abc xyz</p>\r\n'),
(2, 'qua', 'cà chua', 'cc.jpg', 'quả', 'đà lạt', 15000, 0, 22000, 4, NULL, '<p>abc xyz</p>\r\n'),
(3, 'c', 'khoai tây', 'ckt.jpg', 'củ', 'đà lạt', 35000, 150, 40000, 6, NULL, '<p>abc xyz</p>\r\n'),
(4, 'nam', 'nấm rơm', 'nr.jpg', 'nấm', 'cần thơ', 80000, 150, 95000, 5, NULL, '<p>abc xyz</p>\r\n'),
(5, 'al', 'cải thìa', 'ct.jpg', 'cải', 'cần thơ', 15000, 50, 0, 9, NULL, '<p>abc xyz</p>\r\n'),
(6, 'ah', 'bông sua đủa', 'sd.jpeg', 'hoa', 'cần thơ', 20000, 150, 22000, 1, NULL, '<p>abc xyz</p>\r\n'),
(7, 'c', 'củ dền', 'cdd.jpg', 'củ', 'đà lạt', 28000, 150, 0, 6, NULL, '<p>abc xyz</p>\r\n'),
(8, 'at', 'hành lá', 'hanh.jpg', 'lấy thân', 'cần thơ', 15000, 150, 0, 3, NULL, '<p>abc xyz</p>\r\n'),
(9, 'al', 'bồ ngót', 'rn.jpg', 'ăn lá', 'cần thơ', 12000, 50, 0, 9, NULL, '<p>abc xyz</p>\r\n'),
(10, 'at', 'rau muống', 'rmt.jpeg', 'lấy thân', 'cần thơ', 17000, 100, 0, 3, NULL, '<p>abc xyz</p>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QUESTION_ID` (`Question_id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`USER_ID`,`VEGETABLE_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `VEGETABLE_ID` (`VEGETABLE_ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `CUSTOMER_TYPE_ID` (`CUSTOMER_TYPE_ID`);

--
-- Chỉ mục cho bảng `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `functions_detail`
--
ALTER TABLE `functions_detail`
  ADD PRIMARY KEY (`ROLE_ID`,`FUNCTION_ID`),
  ADD KEY `ROLE_ID` (`ROLE_ID`),
  ADD KEY `FUNCTION_ID` (`FUNCTION_ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`),
  ADD KEY `STAFF_ID` (`STAFF_ID`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`ORDER_ID`,`VEGETABLE_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `VEGETABLE_ID` (`VEGETABLE_ID`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MANAGER_ID` (`MANAGER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `functions`
--
ALTER TABLE `functions`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `question` (`ID`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `account` (`ID`),
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`VEGETABLE_ID`) REFERENCES `vegetable` (`ID`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `account` (`ID`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`CUSTOMER_TYPE_ID`) REFERENCES `customer_type` (`ID`);

--
-- Các ràng buộc cho bảng `functions_detail`
--
ALTER TABLE `functions_detail`
  ADD CONSTRAINT `functions_detail_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `roles` (`ID`),
  ADD CONSTRAINT `functions_detail_ibfk_2` FOREIGN KEY (`FUNCTION_ID`) REFERENCES `functions` (`ID`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`VEGETABLE_ID`) REFERENCES `vegetable` (`ID`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `account` (`ID`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`MANAGER_ID`) REFERENCES `staff` (`ID`);

--
-- Các ràng buộc cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `vegetable_ibfk_2` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
