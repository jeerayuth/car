-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.5.25
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `db_car`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `activities`
-- 

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `activities`
-- 

INSERT INTO `activities` VALUES (1, 'ส่งต่อผู้ป่วยรักษาต่อ รพ.ต่างๆ', 'ครั้ง');
INSERT INTO `activities` VALUES (2, 'รับผู้ป่วยมารักษา ส่งกลับบ้าน', 'ครั้ง');
INSERT INTO `activities` VALUES (3, 'รับส่งเจ้าหน้าที่ไปราชการ', 'ครั้ง');
INSERT INTO `activities` VALUES (4, 'ออกหน่วยแพทย์เคลื่อนที่', 'ครั้ง');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `brand`
-- 

CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `brand`
-- 

INSERT INTO `brand` VALUES (1, 'โรงพยาบาลละแม', '45 หมู่7 ถ.เพชรเกษม อ.ละแม จ.ชุมพร', '077-5555555');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `car`
-- 

CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('รถกระบะ','รถตู้','รถเก๋ง') NOT NULL,
  `serial` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `car`
-- 

INSERT INTO `car` VALUES (1, 'รถตู้', 'กค4356', 'ffff57');
INSERT INTO `car` VALUES (2, 'รถกระบะ', 'กค5435', '7070ff');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `company`
-- 

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `company`
-- 

INSERT INTO `company` VALUES (1, 'อุบัติเหตุฉุกเฉิน');
INSERT INTO `company` VALUES (2, 'เวชระเบียน');
INSERT INTO `company` VALUES (3, 'ผู้ป่วยนอก');
INSERT INTO `company` VALUES (4, 'งานพัสดุ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `driver`
-- 

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `driver`
-- 

INSERT INTO `driver` VALUES (1, 'ลุงน้อย');
INSERT INTO `driver` VALUES (2, 'พี่โอ๋');
INSERT INTO `driver` VALUES (3, 'พี่ต๋อง');
INSERT INTO `driver` VALUES (4, 'พี่ทรวง');
INSERT INTO `driver` VALUES (5, 'พี่ชัย');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders`
-- 

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(255) NOT NULL COMMENT 'สถานที่ไป',
  `datetogo` datetime NOT NULL,
  `datetosuccess` datetime NOT NULL,
  `activities_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `milestogo` int(11) NOT NULL,
  `milestosuccess` int(11) NOT NULL,
  `oil` int(11) NOT NULL COMMENT 'เติมน้ำมัน จำนวนลิตร',
  `price` int(11) NOT NULL COMMENT 'ค่าน้ำมัน (บาท)',
  `repair` int(11) NOT NULL COMMENT 'การซ่อม (บาท)',
  `details` text NOT NULL COMMENT 'รายละเอียดการซ่อม',
  `comment` text NOT NULL,
  `dateupdate` datetime NOT NULL,
  `status` enum('รออนุมัติ','อนุมัติ','ยกเลิก') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=27 ;

-- 
-- dump ตาราง `orders`
-- 

INSERT INTO `orders` VALUES (17, 'รพ.ชุมพร', '2014-08-16 08:00:00', '2014-08-16 16:00:00', 3, 2, 3, 1, 0, 0, 0, 0, 0, 0, '', '', '2014-08-16 04:05:34', 'อนุมัติ');
INSERT INTO `orders` VALUES (16, 'รพ.ชุมพร', '2014-08-15 08:00:00', '2014-08-15 16:00:00', 2, 2, 4, 2, 0, 0, 0, 0, 0, 0, '', '', '2014-08-18 09:30:47', 'อนุมัติ');
INSERT INTO `orders` VALUES (15, 'รพ.ชุมพร', '2014-08-07 07:00:00', '2014-08-08 16:00:00', 1, 1, 1, 1, 0, 1000, 1100, 0, 0, 0, '', '', '2014-08-16 12:13:56', 'อนุมัติ');
INSERT INTO `orders` VALUES (18, 'รพ.ชุมพร', '2014-08-20 07:00:00', '2014-08-20 16:00:00', 3, 2, 4, 2, 0, 0, 0, 0, 0, 0, '', '', '2014-08-18 11:38:13', 'รออนุมัติ');
INSERT INTO `orders` VALUES (19, 'รพ.ชุมพร', '2014-08-07 17:00:00', '2014-08-07 20:00:00', 4, 1, 1, 1, 0, 1500, 1800, 0, 0, 0, '', '', '2014-08-19 12:43:33', 'อนุมัติ');
INSERT INTO `orders` VALUES (20, 'รพ.ชุมพร', '2014-09-10 07:00:00', '2014-09-10 15:00:00', 3, 2, 1, 1, 0, 0, 0, 0, 0, 0, '', '', '2014-08-17 11:58:29', 'อนุมัติ');
INSERT INTO `orders` VALUES (21, 'รพ.สุราด', '2014-08-01 09:00:00', '2014-08-01 17:00:00', 4, 1, 1, 1, 0, 0, 0, 0, 0, 0, '', '', '2014-08-17 11:56:41', 'อนุมัติ');
INSERT INTO `orders` VALUES (22, 'รพ.สุราษฎร์', '2014-08-18 07:00:00', '2014-08-18 16:00:00', 1, 2, 2, 1, 0, 0, 0, 0, 0, 0, '', '', '2014-08-18 09:37:33', 'อนุมัติ');
INSERT INTO `orders` VALUES (23, 'รพ.สุราด', '2014-08-18 09:00:00', '2014-05-18 16:00:00', 2, 2, 2, 1, 0, 0, 0, 0, 0, 1200, '', '', '2014-08-20 10:52:50', 'รออนุมัติ');
INSERT INTO `orders` VALUES (24, 'รพ.สุราษฎร์', '2014-08-19 13:36:00', '2014-08-19 13:36:00', 1, 1, 1, 2, 0, 0, 0, 0, 0, 800, '', '', '2014-08-20 10:49:48', 'อนุมัติ');
INSERT INTO `orders` VALUES (25, 'รพ.สุราด', '2014-08-20 07:00:00', '2014-08-20 16:00:00', 2, 2, 2, 1, 0, 0, 0, 0, 500, 1000, '', '', '2014-08-20 10:49:29', 'อนุมัติ');
INSERT INTO `orders` VALUES (26, 'รพ.สต.ทุ่งคาวัด', '2014-08-23 08:00:00', '2014-08-23 15:00:00', 4, 3, 5, 1, 0, 0, 0, 0, 0, 0, '', '', '2014-08-20 11:44:39', 'ยกเลิก');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('ผู้ใช้','ผู้อนุมัติ','แอดมิน') NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('เปิดใช้งาน','ปิดใช้งาน') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=56 ;

-- 
-- dump ตาราง `user`
-- 

INSERT INTO `user` VALUES (54, 'ทดสอบ ผู้อนุมัติ', 'super', 'super', 'ผู้อนุมัติ', '2014-08-27 08:31:54', 'เปิดใช้งาน');
INSERT INTO `user` VALUES (53, 'จีระยุทธ ปิ่นสุวรรณ', 'admin', 'admin', 'แอดมิน', '2014-08-15 05:47:50', 'เปิดใช้งาน');
INSERT INTO `user` VALUES (55, 'ทดสอบ ผู้ใช้', 'user', 'user', 'ผู้ใช้', '2014-08-22 06:46:07', 'เปิดใช้งาน');
