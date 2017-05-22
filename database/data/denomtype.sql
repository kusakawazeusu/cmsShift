/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : machinemanagement1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-16 21:53:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for denomtype
-- ----------------------------
DROP TABLE IF EXISTS `denomtype`;
CREATE TABLE `denomtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DenomCode` double(10,4) NOT NULL,
  `DenomValue` double(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of denomtype
-- ----------------------------
INSERT INTO `denomtype` VALUES ('1', '1.0000', '0.0100', '2016-12-12 12:52:00', '2016-12-12 13:10:19');
INSERT INTO `denomtype` VALUES ('2', '5.0000', '0.0500', '2016-12-12 15:33:52', '2016-12-12 15:33:52');
INSERT INTO `denomtype` VALUES ('3', '10.0000', '0.1000', '2016-12-18 12:05:26', '2016-12-18 12:05:28');
INSERT INTO `denomtype` VALUES ('4', '25.0000', '0.2500', '2016-12-18 12:06:17', '2016-12-18 12:06:21');
INSERT INTO `denomtype` VALUES ('5', '50.0000', '0.5000', '2016-12-18 12:06:37', '2016-12-18 12:06:43');
INSERT INTO `denomtype` VALUES ('6', '100.0000', '1.0000', '2016-12-18 12:06:46', '2016-12-18 12:06:47');
INSERT INTO `denomtype` VALUES ('7', '500.0000', '5.0000', '2016-12-18 12:06:49', '2016-12-18 12:06:50');
INSERT INTO `denomtype` VALUES ('8', '1000.0000', '10.0000', '2016-12-18 12:06:51', '2016-12-18 12:06:53');
INSERT INTO `denomtype` VALUES ('9', '2000.0000', '20.0000', '2016-12-18 12:06:56', '2016-12-18 12:06:55');
INSERT INTO `denomtype` VALUES ('10', '10000.0000', '100.0000', '2016-12-18 12:06:57', '2016-12-18 12:06:54');
INSERT INTO `denomtype` VALUES ('11', '20.0000', '0.2000', '2016-12-18 12:06:58', '2016-12-18 12:06:59');
INSERT INTO `denomtype` VALUES ('12', '200.0000', '2.0000', '2016-12-18 12:06:58', '2016-12-18 12:07:00');
INSERT INTO `denomtype` VALUES ('13', '250.0000', '2.5000', '2016-12-18 12:07:01', '2016-12-18 12:07:00');
INSERT INTO `denomtype` VALUES ('14', '2500.0000', '25.0000', '2016-12-18 12:07:02', '2016-12-18 12:07:27');
INSERT INTO `denomtype` VALUES ('15', '5000.0000', '50.0000', '2016-12-18 12:07:26', '2016-12-18 12:07:28');
INSERT INTO `denomtype` VALUES ('16', '20000.0000', '200.0000', '2016-12-18 12:07:26', '2016-12-18 12:07:28');
INSERT INTO `denomtype` VALUES ('17', '25000.0000', '250.0000', '2016-12-18 12:07:25', '2016-12-18 12:07:29');
INSERT INTO `denomtype` VALUES ('18', '100000.0000', '1000.0000', '2016-12-18 12:07:24', '2016-12-18 12:07:29');
INSERT INTO `denomtype` VALUES ('19', '200000.0000', '2000.0000', '2016-12-18 12:07:25', '2016-12-18 12:07:30');
INSERT INTO `denomtype` VALUES ('20', '250000.0000', '2500.0000', '2016-12-18 12:07:22', '2016-12-18 12:07:31');
INSERT INTO `denomtype` VALUES ('21', '500000.0000', '5000.0000', '2016-12-18 12:07:22', '2016-12-18 12:07:19');
INSERT INTO `denomtype` VALUES ('22', '2.0000', '0.0200', '2016-12-18 12:07:21', '2016-12-18 12:07:20');
INSERT INTO `denomtype` VALUES ('23', '3.0000', '0.0300', '2016-12-18 12:07:20', '2016-12-18 12:07:18');
INSERT INTO `denomtype` VALUES ('24', '15.0000', '0.1500', '2016-12-18 12:07:16', '2016-12-18 12:07:17');
INSERT INTO `denomtype` VALUES ('25', '40.0000', '0.4000', '2016-12-18 12:07:16', '2016-12-18 12:07:18');
INSERT INTO `denomtype` VALUES ('26', '0.5000', '0.0020', '2016-12-18 12:07:15', '2016-12-18 12:07:13');
INSERT INTO `denomtype` VALUES ('27', '0.2500', '0.0025', '2016-12-18 12:07:13', '2016-12-18 12:07:12');
INSERT INTO `denomtype` VALUES ('28', '0.2000', '0.0020', '2016-12-18 12:07:10', '2016-12-18 12:07:11');
INSERT INTO `denomtype` VALUES ('29', '0.1000', '0.0010', '2016-12-18 12:07:09', '2016-12-18 12:07:11');
INSERT INTO `denomtype` VALUES ('30', '0.0500', '0.0005', '2016-12-18 12:07:08', '2016-12-18 12:07:07');
