-- Create database
CREATE DATABASE diemdanh_nckh COLLATE=utf8_unicode_ci;

-- Use database
USE diemdanh_nckh;

-- Create table sinhvien
CREATE TABLE `student` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `studentId` char(10) NOT NULL,
  `firstNameStudent` varchar(256) NOT NULL,
  `lastNameStudent` varchar(256) NOT NULL,
  `idMajor` char(10) DEFAULT 1,
  PRIMARY KEY (`id`,`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table canbo
CREATE TABLE `staff` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `staffId` char(10) NOT NULL,
  `firstNameStaff` varchar(256) NOT NULL,
  `lastNameStaff` varchar(256) NOT NULL,
  `idDepartment` int(5) DEFAULT 1,
  PRIMARY KEY (`id`,`staffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table rfid
CREATE TABLE `rfid` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idCard` char(10) NOT NULL,
  `numberId` char(10) NOT NULL,
  PRIMARY KEY (`id`,`idCard`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table sukien
CREATE TABLE `event` (
  `id` int(128) NOT NULL,
  `nameEvent` varchar(256) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `dateEvent` date NOT NULL,
  `locationEvent` varchar(128) NOT NULL,
  `descriptionEvent` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table diemdanh
CREATE TABLE `attendance` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idEvent` int(128) NOT NULL,
  `idCard` char(10) DEFAULT 1,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table department
CREATE TABLE `department` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nameDepartment` varchar(128) NOT NULL,
  `idFaculty` char(10) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table faculty
CREATE TABLE `faculty` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idFaculty` char(10) NOT NULL,
  `nameFaculty` varchar(128) NOT NULL,
  PRIMARY KEY (`id`,`idFaculty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table major
CREATE TABLE `major` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idMajor` char(10) NOT NULL,
  `nameMajor` varchar(128) NOT NULL,
  `idFaculty` char(10) NOT NULL,
  PRIMARY KEY (`id`,`idMajor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table joinEvent
CREATE TABLE `register` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `numberId` char(10) NOT NULL,
  `idEvent` int(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table account
CREATE TABLE `account` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` char(255) NOT NULL,
  `password` char(10) NOT NULL,
  `name` char(128) DEFAULT NULL,
  `role` char(10) DEFAULT 1,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create table apikey
CREATE TABLE `apikey` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `valueApi` char(20) NOT NULL,
  `encriptApi` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Add relationship
ALTER TABLE staff
    ADD CONSTRAINT staffdepartment FOREIGN KEY (idDepartment) REFERENCES department(id) ON DELETE CASCADE;

ALTER TABLE attendance
    ADD CONSTRAINT attendanceevent FOREIGN KEY (idEvent) REFERENCES event(id) ON DELETE CASCADE;

ALTER TABLE register
    ADD CONSTRAINT registerevent FOREIGN KEY (idEvent) REFERENCES event(id) ON DELETE CASCADE;

ALTER TABLE attendance
    ADD CONSTRAINT attendancerfid FOREIGN KEY (idCard) REFERENCES rfid(idCard) ON DELETE CASCADE;

ALTER TABLE student
    ADD CONSTRAINT studentmajor FOREIGN KEY (idMajor) REFERENCES major(idMajor) ON DELETE CASCADE;

ALTER TABLE major
    ADD CONSTRAINT majorfaculty FOREIGN KEY (idFaculty) REFERENCES faculty(idFaculty) ON DELETE NO ACTION;

ALTER TABLE department
    ADD CONSTRAINT departmentfaculty FOREIGN KEY (idFaculty) REFERENCES faculty(idFaculty) ON DELETE CASCADE;
