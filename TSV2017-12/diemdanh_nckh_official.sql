-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2018 at 02:36 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(5) NOT NULL,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` char(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rolename` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`, `rolename`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@ctu.edu.vn', 'Quản trị viên', 'admin'),
(2, 'ntduy', '21232f297a57a5a743894a0e4a801fc3', 'ntduy@ctu.edu.vn', 'Nguyễn Thanh Duy', 'manager'),
(3, 'phuocthanh', '21232f297a57a5a743894a0e4a801fc3', 'phuocthanh@ctu.edu.vn', 'Lâm Phước Thành', 'manager'),
(4, 'hploc', '21232f297a57a5a743894a0e4a801fc3', 'hploc@ctu.edu.vn', 'Huỳnh Phúc Lộc', 'admin'),
(5, 'quanbao', '21232f297a57a5a743894a0e4a801fc3', 'baob1507712@ctu.edu.vn', 'Trương Quân Bảo', 'user'),
(6, 'ngthuc', '21232f297a57a5a743894a0e4a801fc3', 'thucb1400731@student.ctu.edu.vn', 'Lê Nguyên Thức', 'user'),
(7, 'ngochuy', '21232f297a57a5a743894a0e4a801fc3', 'huyb1507332@student.ctu.edu.vn', 'Trần Ngọc Huy', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
  `id` int(5) NOT NULL,
  `statusApi` int(1) NOT NULL DEFAULT '1',
  `encriptApi` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`id`, `statusApi`, `encriptApi`) VALUES
(1, 1, 'gfdgfdgfdf'),
(2, 1, 'gfdgfdgfdf'),
(3, 1, 'gfdgfdgfdf'),
(4, 0, 'gfdgfdgfdf'),
(5, 1, 'gfdgfdgfdf'),
(6, 1, 'gfdgfdgfdf'),
(7, 0, 'gfdgfdgfdf'),
(8, 1, 'gfdgfdgfdf'),
(9, 1, 'gfdgfdgfdf'),
(10, 0, 'gfdgfdgfdf');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(20) NOT NULL,
  `idEvent` int(20) NOT NULL,
  `idCard` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `idEvent`, `idCard`, `timeIn`, `timeOut`) VALUES
(1, 1, '0770235210', '2017-12-07 07:00:00', '2017-12-07 10:30:50'),
(2, 1, '0785256810', '2017-12-07 07:00:00', '2017-12-07 10:30:50'),
(3, 1, '0780056810', '2017-12-07 07:00:00', '2017-12-07 10:30:50'),
(4, 1, '0790056810', '2017-12-07 07:00:00', '2017-12-07 10:30:50'),
(5, 1, '0770056810', '2017-12-07 07:00:00', '2017-12-07 10:30:50'),
(6, 1, '0770055520', '2017-12-07 07:00:00', '2017-12-07 10:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(5) NOT NULL,
  `nameDepartment` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `idFaculty` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `nameDepartment`, `idFaculty`) VALUES
(6, 'Công nghệ phần mềm', 'DI'),
(7, 'Mạng máy tính và truyền thông', 'DI'),
(8, 'Công nghệ thông tin', 'DI'),
(9, 'Hệ thống thông tin', 'DI'),
(10, 'Khoa học máy tính', 'DI'),
(11, 'Tin học ứng dụng', 'DI'),
(12, 'Ban giám hiệu - Trường Đại học Cần Thơ', NULL),
(13, 'Phòng Hợp tác Quốc tế - Trường Đại học Cần Thơ', NULL),
(14, 'Văn phòng Đoàn Hội - Trường Đại học Cần Thơ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialnumber` char(50) DEFAULT NULL,
  `registerdate` date NOT NULL,
  `idApi` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `serialnumber`, `registerdate`, `idApi`) VALUES
(1, 'TNTN_M_001', '25852085245SNL', '2017-12-21', 1),
(2, 'TNTN_M_002', '25852085245SNL', '2017-12-21', 2),
(3, 'TNTN_M_003', '25852085245SNL', '2017-12-21', 3),
(4, 'TNTN_M_004', '25852085245SNL', '2017-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(20) NOT NULL,
  `nameEvent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `dateEvent` date NOT NULL,
  `locationEvent` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEvent` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userCreator` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `idOrg` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nameEvent`, `timeStart`, `timeEnd`, `dateEvent`, `locationEvent`, `descriptionEvent`, `userCreator`, `idOrg`) VALUES
(1, 'Khám phá tri thức CNTT 2017 - Buổi 1', '07:30:00', '10:30:00', '2018-12-07', 'Hội trường lớn', 'Tuần lễ Khám phá tri thức CNTT năm 2017', 'admin', 1),
(2, 'Khám phá tri thức CNTT 2017 - Buổi 2', '14:30:00', '16:30:00', '2018-12-07', 'Hội trường 2, khoa CNTT&TT', 'Tuần lễ Khám phá tri thức CNTT năm 2017', 'admin', 4),
(3, 'Khám phá tri thức CNTT 2017 - Buổi 3', '07:30:00', '10:30:00', '2018-12-08', 'Hội trường 2, khoa CNTT&TT', 'Tuần lễ Khám phá tri thức CNTT năm 2017', 'admin', 4),
(4, 'Khám phá tri thức CNTT 2017 - Buổi 4', '14:30:00', '16:30:00', '2018-05-16', 'Hội trường 2, khoa CNTT&TT', 'Tuần lễ Khám phá tri thức CNTT năm 2017', 'admin', 4),
(5, 'Test1', '08:00:00', '11:00:00', '2018-05-11', 'Hội trường 2 - khoa CNTT&TT', 'Thử nghiệm', 'admin', 5),
(6, 'Test2', '15:35:00', '23:00:00', '2018-05-11', 'Hội trường 2 - khoa CNTT&TT', 'Thử nghiệm', 'admin', 6),
(7, 'Test3', '22:30:00', '23:00:00', '2018-05-11', 'Hội trường 2 - khoa CNTT&TT', 'Thử nghiệm', 'admin', 7),
(8, 'Test4', '22:00:00', '23:00:00', '2018-05-15', 'Hội trường 2 - khoa CNTT&TT', 'Thử nghiệm', 'admin', 7),
(9, 'Khám phá tri thức 1', '07:30:00', '10:30:00', '2018-12-07', 'Hội trường lớn', 'Khám phá tri thức 2017', 'admin', 1),
(10, 'Thăm quan công ty SPS', '06:00:00', '15:00:00', '2018-01-12', 'Công ty SPS, TPHCM', 'Thăm quan công ty cho sinh viên năm thứ 3 - 4', 'admin', 1),
(11, 'Thăm quan công ty SPS', '06:00:00', '15:00:00', '2018-01-12', 'Công ty SPS, TPHCM', 'Thăm quan công ty cho sinh viên năm thứ 3 - 4', 'admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(5) NOT NULL,
  `idFaculty` char(10) NOT NULL,
  `nameFaculty` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `idFaculty`, `nameFaculty`) VALUES
(1, 'DI', 'Công nghệ thông tin & Truyền thông'),
(2, 'KL', 'Luật'),
(3, 'CN', 'Công nghệ'),
(4, 'TN', 'Khoa học Tự nhiên'),
(5, 'XH', 'Khoa học Xã hội & Nhân văn'),
(6, 'FL', 'Ngoại ngữ'),
(7, 'DB', 'Dự bị Dân tộc'),
(8, 'NN', 'Nông nghiệp & Sinh học Ứng dụng'),
(9, 'MT', 'Môi trường & Tài nguyên Thiên nhiên'),
(10, 'ML', 'Khoa học Chính trị'),
(11, 'KT', 'Kinh tế'),
(12, 'TC', 'Giáo dục Thể chất'),
(13, 'SP', 'Sư phạm'),
(14, 'HG', 'Phát triển Nông thôn'),
(15, 'CS', 'Nghiên cứu & Phát triển Công nghệ Sinh học'),
(16, 'PD', 'Nghiên cứu & Phát triển Đồng bằng Sông Cửu Long'),
(17, 'TS', 'Thủy sản');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `id` int(5) NOT NULL,
  `idMajor` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `nameMajor` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `idFaculty` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `idMajor`, `nameMajor`, `idFaculty`) VALUES
(1, '96', 'Kỹ thuật phần mềm', 'DI'),
(2, 'V7', 'Công nghệ thông tin', 'DI'),
(3, 'Y1', 'Tin học ứng dụng', 'DI'),
(4, 'Y9', 'Truyền thông và mạng máy tính', 'DI'),
(5, 'Z6', 'Khoa học máy tính', 'DI'),
(6, '95', 'Hệ thống thông tin', 'DI');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(5) NOT NULL,
  `parent` char(5) NOT NULL DEFAULT '0',
  `text` varchar(255) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `parent`, `text`, `description`) VALUES
(1, '#', 'Trường Đại học Cần Thơ', 'Trường Đại học vùng trọng điểm Quốc gia'),
(2, '#', 'Đoàn trường Đại học Cần Thơ', 'Đoàn tương đương cấp Quận/Huyện'),
(3, '#', 'Hội Sinh viên trường Đại học Cần Thơ', 'Trực thuộc Hội Sinh viên Thành phố Cần Thơ'),
(4, '2', 'Đoàn khoa CNTT&TT', 'Đoàn cơ sở trực thuộc Đoàn trường Đại học Cần Thơ'),
(5, '3', 'Liên Chi hội Sinh viên Cần Thơ', 'Liên Chi hội theo tỉnh thành trực thuộc Hội sinh viên trường Đại học Cần Thơ'),
(6, '1', 'Trung tâm Học liệu', 'Thư viện học liệu, trung tâm trực thuộc trường Đại học Cần Thơ'),
(7, '4', 'CLB Tin học', 'CLB học thuật trực thuộc Đoàn khoa CNTT&TT'),
(8, '4', 'Đội Thanh niên Tình nguyện', 'Lực lượng sinh viên tình nguyện trực thuộc Đoàn khoa CNTT&TT'),
(9, '#', 'Đảng ủy trường Đại học Cần Thơ', 'Quản lý công tác Đảng viên tại Đảng bộ trường Đại học Cần Thơ'),
(10, '1', 'Khoa CNTT&amp;TT', 'Khoa đào tạo các chuyên ngành về Công nghệ thông tin và truyền thông'),
(11, '#', 'Công đoàn trường Đại học Cần Thơ', 'Tổ chức của công chức viên chức trường Đại học Cần Thơ'),
(12, '9', 'Đảng ủy khoa CNTT&TT', 'Tổ chức Đảng của khoa CNTT&TT');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(20) NOT NULL,
  `personalID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `idEvent` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE IF NOT EXISTS `rfid` (
  `id` int(5) NOT NULL,
  `idCard` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `personalID` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isStudent` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id`, `idCard`, `personalID`, `isStudent`) VALUES
(2, '0770056810', '002356', 0),
(3, '0101503659', '002321', 0),
(4, '0770236810', '001232', 0),
(5, '0770056910', '002354', 0),
(6, '0770055520', '001234', 0),
(7, '0770235210', 'B1400731', 1),
(8, '0785256810', 'B1400706', 1),
(9, '0780056810', 'B1400729', 1),
(10, '0790056810', 'B1608553', 1),
(11, '0770056810', 'B1400704', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(12) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `rolesGroup` longtext NOT NULL,
  `roleDesc` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `roleName`, `rolesGroup`, `roleDesc`) VALUES
(1, 'Owner', 'admin,report,newEvent,event,attendance,organization,identification,role,account,remove,device', 'Tất cả quyền'),
(2, 'Admin', 'admin,report,newEvent,event,attendance,organization,identification,role,account,remove,device', 'Tất cả quyền (trừ quyền cài đặt và quản lý nhóm quyền)'),
(3, 'User', '', 'Chỉ nhóm quyền xem và không truy cập AdminCP'),
(4, 'Manager', '', 'Nhóm quyền xem, quyền quản lý cơ bản'),
(6, 'Deny', '', 'Bị cấm toàn hệ thống');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(5) NOT NULL,
  `staffID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstNameStaff` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastNameStaff` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idDepartment` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staffID`, `firstNameStaff`, `lastNameStaff`, `idDepartment`) VALUES
(2, '002356', 'Cao Đệ', 'Trần', 8),
(3, '002321', 'Bá Hùng', 'Ngô', 7),
(4, '001232', 'Phương Lan', 'Phan', 6),
(5, '002354', 'Minh Thái', 'Trương', 6),
(6, '001234', 'Huỳnh Trâm', 'Võ', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(5) NOT NULL,
  `studentID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstNameStudent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastNameStudent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idMajor` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentID`, `firstNameStudent`, `lastNameStudent`, `idMajor`) VALUES
(1, 'B1400731', 'Nguyên Thức', 'Lê', '96'),
(2, 'B1400704', 'Minh Luân', 'Lê', '96'),
(3, 'B1400706', 'Thiện Minh', 'Nguyễn', '96'),
(4, 'B1400729', 'Hoàng Thơ', 'Huỳnh', '96'),
(5, 'B1608553', 'Bửu Minh', 'Phương', 'V7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `apikey`
--
ALTER TABLE `apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance` (`idEvent`),
  ADD KEY `attendancerfid` (`idCard`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`,`idFaculty`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`,`idMajor`),
  ADD KEY `idMajor` (`idMajor`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register` (`idEvent`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id`,`idCard`),
  ADD KEY `idCard` (`idCard`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`,`staffID`),
  ADD KEY `staffdepartment` (`idDepartment`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`,`studentID`),
  ADD KEY `studentmajor` (`idMajor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`idCard`) REFERENCES `rfid` (`idCard`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staffdepartment` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idMajor`) REFERENCES `major` (`idMajor`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
