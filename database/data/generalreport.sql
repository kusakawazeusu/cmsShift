/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lara53

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-19 21:09:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for generalreport
-- ----------------------------
DROP TABLE IF EXISTS `generalreport`;
CREATE TABLE `generalreport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SeqNo` int(11) NOT NULL,
  `ReportName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Favorite` int(11) NOT NULL,
  `ReportDesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ReportFile` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `generalreport_seqno_unique` (`SeqNo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of generalreport
-- ----------------------------
INSERT INTO `generalreport` VALUES ('1', '1', '櫃台開出票據紀錄報表', '1', '櫃台開出票據紀錄報表', '櫃台開出票據紀錄報表.xlsx', '2017-01-18 12:52:53', '2017-01-18 12:52:53');
INSERT INTO `generalreport` VALUES ('2', '2', '櫃台作廢票據紀錄報表', '1', '櫃台作廢票據紀錄報表', '櫃台作廢票據紀錄報表.xlsx', '2017-01-18 14:14:20', '2017-01-18 14:14:20');
INSERT INTO `generalreport` VALUES ('3', '3', '櫃台入票紀錄報表', '1', '櫃台入票紀錄報表', '櫃台入票紀錄報表.xlsx', '2017-01-18 14:15:41', '2017-01-18 14:15:41');
INSERT INTO `generalreport` VALUES ('4', '4', '櫃台兌換票據紀錄報表', '1', '櫃台兌換票據紀錄報表', '櫃台兌換票據紀錄報表.xlsx', '2017-01-18 14:16:02', '2017-01-18 14:16:02');
INSERT INTO `generalreport` VALUES ('5', '5', '機台洗分/印票紀錄報表', '1', '機台洗分/印票紀錄報表', '機台洗分/印票紀錄報表.xlsx', '2017-01-18 15:53:09', '2017-01-18 15:53:09');
INSERT INTO `generalreport` VALUES ('6', '6', '清鈔差異紀錄報表', '1', '清鈔差異紀錄報表', '清鈔差異紀錄報表.xlsx', '2017-01-18 15:53:26', '2017-01-18 15:53:26');
INSERT INTO `generalreport` VALUES ('7', '7', '班別關閉紀錄報表', '0', '班別關閉紀錄報表', '班別關閉紀錄報表.xlsx', '2017-01-18 15:53:45', '2017-01-18 15:54:05');
