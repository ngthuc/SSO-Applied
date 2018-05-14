-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 07:37 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diemdanh_nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(5) NOT NULL,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` char(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rolename` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE `apikey` (
  `id` int(5) NOT NULL,
  `statusApi` bit(1) NOT NULL DEFAULT b'1',
  `encriptApi` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(20) NOT NULL,
  `idEvent` int(20) NOT NULL,
  `idCard` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(5) NOT NULL,
  `nameDepartment` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `idFaculty` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialnumber` char(50) DEFAULT NULL,
  `registerdate` date NOT NULL,
  `idApi` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(20) NOT NULL,
  `nameEvent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `dateEvent` date NOT NULL,
  `locationEvent` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEvent` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idCreator` int(5) NOT NULL,
  `idOrg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(5) NOT NULL,
  `idFaculty` char(10) NOT NULL,
  `nameFaculty` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(5) NOT NULL,
  `idMajor` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `nameMajor` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `idFaculty` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(5) NOT NULL DEFAULT '0',
  `description` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `parent`, `description`) VALUES
(1, 'Trường Đại học Cần Thơ', 1, 'Trường Đại học vùng trọng điểm Quốc gia'),
(2, 'Đoàn trường Đại học Cần Thơ', 2, 'Đoàn tương đương cấp Quận/Huyện'),
(3, 'Hội Sinh viên trường Đại học Cần Thơ', 3, 'Trực thuộc Hội Sinh viên Thành phố Cần Thơ'),
(4, 'Đoàn khoa CNTT&TT', 2, 'Đoàn cơ sở trực thuộc Đoàn trường Đại học Cần Thơ'),
(5, 'Liên Chi hội Sinh viên Cần Thơ', 3, 'Liên Chi hội theo tỉnh thành trực thuộc Hội sinh viên trường Đại học Cần Thơ'),
(6, 'Trung tâm Học liệu', 1, 'Thư viện học liệu, trung tâm trực thuộc trường Đại học Cần Thơ'),
(7, 'CLB Tin học', 4, 'CLB học thuật trực thuộc Đoàn khoa CNTT&TT'),
(8, 'Đội Thanh niên Tình nguyện', 4, 'Lực lượng sinh viên tình nguyện trực thuộc Đoàn khoa CNTT&TT');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `personalID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `idEvent` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id` int(5) NOT NULL,
  `idCard` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `personalID` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isStudent` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRole` int(12) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `rolesGroup` longtext NOT NULL,
  `roleDesc` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `roleName`, `rolesGroup`, `roleDesc`) VALUES
(1, 'Owner', 'fullcontrol,device,borrowDevice,members,project,labs,profile,search,dashboard,account,mailCP,urlCP,addDevice,removeDevice,addMember,removeMember,addProject,removeProject,addLabs,removeLab,addPartner,removePartner,deviceCP,borrowDeviceCP,membersCP,projectCP,labsCP,producerCP,imagesCP,rolesCP,profileCP,rolesAD,settingCP', 'Tất cả quyền'),
(2, 'Admin', 'fullcontrol,device,borrowDevice,members,project,labs,profile,search,dashboard,addDevice,removeDevice,addMember,removeMember,addProject,removeProject,addLabs,removeLab,addPartner,removePartner,deviceCP,borrowDeviceCP,membersCP,projectCP,labsCP,producerCP,imagesCP,rolesCP,profileCP', 'Tất cả quyền (trừ quyền cài đặt và quản lý nhóm quyền)'),
(3, 'Member', 'device,borrowDevice,members,project,labs,profile,search', 'Chỉ nhóm quyền xem và không truy cập AdminCP'),
(4, 'Manager', 'device,borrowDevice,members,project,labs,profile,search,dashboard,addDevice,addMember,addProject,addLabs,addPartner,deviceCP,borrowDeviceCP,membersCP,projectCP,labsCP,producerCP', 'Nhóm quyền xem, quyền quản lý cơ bản'),
(6, 'Deny', 'profile', 'Bị cấm toàn hệ thống');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(5) NOT NULL,
  `staffID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstNameStaff` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastNameStaff` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idDepartment` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `studentID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstNameStudent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastNameStudent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idMajor` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendanceevent` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`id`) REFERENCES `staff` (`idDepartment`) ON DELETE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rfid`
--
ALTER TABLE `rfid`
  ADD CONSTRAINT `rfid_ibfk_1` FOREIGN KEY (`idCard`) REFERENCES `attendance` (`idCard`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idMajor`) REFERENCES `major` (`idMajor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
