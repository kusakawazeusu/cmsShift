/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lara53

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-08 15:11:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for machinelog
-- ----------------------------
DROP TABLE IF EXISTS `machinelog`;
CREATE TABLE `machinelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MachineIP` varchar(15) NOT NULL,
  `User` varchar(255) DEFAULT NULL,
  `CommandCode` varchar(4) NOT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
