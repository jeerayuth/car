/*
Navicat MySQL Data Transfer

Source Server         : SERVER_MASTER
Source Server Version : 50532
Source Host           : 192.168.1.253:3306
Source Database       : db_car

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2016-11-02 16:28:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `activities`
-- ----------------------------
DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of activities
-- ----------------------------
INSERT INTO activities VALUES ('1', 'ส่งต่อผู้ป่วยรักษาต่อ รพ.ต่างๆ', 'ครั้ง');
INSERT INTO activities VALUES ('2', 'รับผู้ป่วยมารักษา ส่งกลับบ้าน', 'ครั้ง');
INSERT INTO activities VALUES ('3', 'รับส่งเจ้าหน้าที่ไปราชการ', 'ครั้ง');
INSERT INTO activities VALUES ('4', 'ออกหน่วยแพทย์เคลื่อนที่', 'ครั้ง');

-- ----------------------------
-- Table structure for `brand`
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO brand VALUES ('1', 'โรงพยาบาลละแม', '45 หมู่7 ถ.เพชรเกษม อ.ละแม จ.ชุมพร', '077-5555555');

-- ----------------------------
-- Table structure for `car`
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('รถกระบะ','รถตู้','รถเก๋ง') NOT NULL,
  `serial` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO car VALUES ('1', 'รถตู้', 'กค4356', 'ffff57');
INSERT INTO car VALUES ('2', 'รถกระบะ', 'กค5435', '7070ff');

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO company VALUES ('1', 'อุบัติเหตุฉุกเฉิน');
INSERT INTO company VALUES ('2', 'เวชระเบียน');
INSERT INTO company VALUES ('3', 'ผู้ป่วยนอก');
INSERT INTO company VALUES ('4', 'งานพัสดุ');

-- ----------------------------
-- Table structure for `driver`
-- ----------------------------
DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of driver
-- ----------------------------
INSERT INTO driver VALUES ('1', 'ลุงน้อย', '(454) 654-6546');
INSERT INTO driver VALUES ('2', 'พี่โอ๋', null);
INSERT INTO driver VALUES ('3', 'พี่ต๋อง', null);
INSERT INTO driver VALUES ('4', 'พี่ทรวง', null);
INSERT INTO driver VALUES ('5', 'พี่ชัย', null);

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `person_name` varchar(60) NOT NULL,
  `person_position` varchar(100) NOT NULL,
  `person_level` varchar(100) NOT NULL,
  `person_number` int(11) NOT NULL,
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
  `dateadd` datetime NOT NULL,
  `dateupdate` datetime NOT NULL,
  `status` enum('รออนุมัติ','อนุมัติ','ยกเลิก') NOT NULL,
  `place` varchar(255) NOT NULL COMMENT 'สถานที่ไป',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO orders VALUES ('37', 'ทดสอบ กิจกรรม ER', 'พี่เขียว', 'พยาบาล', '', '3', '2016-10-18 07:00:00', '2016-10-18 16:00:00', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00 00:00:00', '2016-10-17 03:16:26', 'อนุมัติ', 'รพ.ชุมพร');
INSERT INTO orders VALUES ('38', 'ขอใช้รถ เวชระเบียน', 'จีระยุทธ ปิ่นสุวรร', 'นวก.', '', '2', '2016-10-19 07:00:00', '2016-10-19 16:00:00', '1', '2', '3', '2', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00 00:00:00', '2016-10-18 12:38:58', 'อนุมัติ', 'รพ.ชุมพร');
INSERT INTO orders VALUES ('39', 'test opd', 'พี่นิด', 'รพ.ชุมพร', '', '3', '2016-10-18 07:00:00', '2016-10-19 16:00:00', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00 00:00:00', '2016-10-17 04:25:56', 'รออนุมัติ', 'รพ.ชุมพร');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('ผู้ใช้','ผู้อนุมัติ','แอดมิน') NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('เปิดใช้งาน','ปิดใช้งาน') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('54', 'ทดสอบ ผู้อนุมัติ', 'super', '1b3231655cebb7a1f783eddf27d254ca', 'ผู้อนุมัติ', '2014-08-27 08:31:54', 'เปิดใช้งาน');
INSERT INTO user VALUES ('53', 'จีระยุทธ ปิ่นสุวรรณ', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'แอดมิน', '2014-08-15 05:47:50', 'เปิดใช้งาน');
INSERT INTO user VALUES ('55', 'ทดสอบ ผู้ใช้', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'ผู้ใช้', '2014-08-22 06:46:07', 'เปิดใช้งาน');
