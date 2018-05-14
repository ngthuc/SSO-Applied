-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2017 at 11:26 PM
-- Server version: 10.0.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
