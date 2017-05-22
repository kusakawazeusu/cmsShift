/*
Navicat MySQL Data Transfer

Source Server         : SQL
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : laravel_test

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-01-21 03:08:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `MemberNo` int(6) unsigned zerofill NOT NULL auto_increment,
  `SectionNo` varchar(2) default '00',
  `MemberName` varchar(30) default NULL,
  `MemberID` varchar(10) default NULL,
  `AffiliationTime` datetime default NULL,
  `Birthday` datetime default NULL,
  `Address` varchar(100) default NULL,
  `CellPhone` varchar(12) default NULL,
  `TelePhone` varchar(12) default NULL,
  `Memo` varchar(200) default NULL,
  `MemberStatus` int(4) default '1',
  `MemberImage` varchar(255) default NULL,
  `Rank` int(4) default '0',
  `XCEnable` int(4) default '0',
  `RPEnable` int(4) default '0',
  `Password` varchar(4) default NULL,
  `updated_at` datetime default NULL,
  `Email` varchar(255) default NULL,
  PRIMARY KEY  (`MemberNo`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('000001', 'KK', 'Allan', 'X125478659', '2016-02-15 14:03:42', '2016-12-20 00:00:00', '000000000', '000000000', '000000000', 'VIP', '1', '', '2', '1', '1', '', '2017-01-19 09:19:12', 'Allan@gmail.com');
INSERT INTO `member` VALUES ('000002', 'KK', 'Tina', 'A545455151', '2016-12-13 14:32:00', '2016-12-20 00:00:00', '台北市文山區', '123459123', '021453654', null, '1', '', '0', '0', '0', null, null, 'Tina@gmail.com');
INSERT INTO `member` VALUES ('000003', 'KK', 'Sigma', 'P212452122', '2016-12-13 14:07:42', '2016-12-20 00:00:00', '123455666', '421202451', '021453654', null, '1', null, '0', '1', '1', '', '2017-01-19 09:17:36', 'Sigma@gmail.com');
INSERT INTO `member` VALUES ('000004', 'KK', 'Michel', 'A124821212', '2016-12-14 14:03:42', '2016-12-20 00:00:00', '新北市中和', '241521121', '021453654', null, '1', null, '0', '0', '0', null, null, 'Michel@gmail.com');
INSERT INTO `member` VALUES ('000005', 'KK', '林小名', 'E454515214', '2016-12-13 16:45:42', '2016-12-20 00:00:00', '高雄市高鐵站旁', '851122145', '021453654', null, '1', null, '0', '0', '0', null, null, 'small@gmail.com');
INSERT INTO `member` VALUES ('000012', 'KK', 'Allan', '10', '2016-12-01 16:45:42', null, null, '10', null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000013', 'KK', 'Allan', null, '2016-12-02 16:45:42', null, null, '11', null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000006', 'KK', 'Allan', '3', '2016-12-03 16:45:42', null, null, '3', '3', null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000007', 'KK', 'Allan', '4', '2016-12-04 16:45:42', null, null, '4', '4', null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000008', 'KK', 'Allan', '5', '2016-12-05 16:45:42', null, null, '5', '5', null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000009', 'KK', 'Allan', '6', '2016-12-16 16:45:42', null, null, '6', '6', null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000024', 'KK', '123455666', '123455666', '2017-01-19 09:14:17', '2017-01-24 00:00:00', '南京東路1段', '123455666', '123455666', ' 123455666', '1', null, '2', '1', '1', '1234', '2017-01-19 09:14:17', 'admi3360@gmail.com');
INSERT INTO `member` VALUES ('000014', 'KK', 'Allan', null, '2014-12-13 16:45:42', null, null, '12', null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000016', 'KK', 'XX', 'B10415005', '2017-01-18 10:04:38', '0454-05-31 00:00:00', '龍心巷三號', '654654', '544', '1234 ', '1', null, '1', '1', '1', '', '2017-01-18 10:40:29', 'B10415005@mail.ntust.edu.tw');
INSERT INTO `member` VALUES ('000018', 'KK', 'Allan', '123456', '2018-12-13 16:45:42', null, '', '16', '', null, '1', null, '0', '0', '0', '', '2017-01-21 00:36:56', '');
INSERT INTO `member` VALUES ('000025', '00', 'Allan', null, null, null, null, null, null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000026', '00', 'Allan', null, null, null, null, null, null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000027', '00', 'Allan', null, null, null, null, null, null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000028', '00', 'Allan', null, null, null, null, null, null, null, '1', null, '0', '0', '0', null, null, null);
INSERT INTO `member` VALUES ('000029', '00', 'adsfasdf', 'adsfasdf', '2017-01-21 02:52:21', '2017-12-31 00:00:00', ' 蛇子形路', '0953656565', '0953656565', ' fdsaffdsa', '1', null, '0', '0', '0', '1234', '2017-01-21 02:52:21', 'B10415005@mail.ntust.edu.tw');
INSERT INTO `member` VALUES ('000030', '00', 'XXXXXX', 'XXXXXX', '2017-01-21 02:55:44', '2017-12-31 00:00:00', ' 蛇子形路', '00000', '000000', ' dsfa', '1', null, '0', '0', '0', '1234', '2017-01-21 02:55:44', 'admi3360@gmail.com');
INSERT INTO `member` VALUES ('000035', '00', 'Wabfds', '123456saf', '2017-01-21 03:00:54', '2017-12-31 00:00:00', '****心巷三號', '123123', '000000', 'sdfsadf ', '1', null, '2', '0', '1', '0000', '2017-01-21 03:00:54', 'B10415005@mail.ntust.edu.tw');
INSERT INTO `member` VALUES ('000036', '00', 'Wanger', 'M12333314', '2017-01-21 03:07:18', '0088-08-08 00:00:00', 'Taiwan, Taipei  cCC', '091223456', '0423534', 'VIP ', '1', null, '2', '1', '1', '0000', '2017-01-21 03:07:18', 'B10415005@mail.ntust.edu.tw');

-- ----------------------------
-- Table structure for memberacc
-- ----------------------------
DROP TABLE IF EXISTS `memberacc`;
CREATE TABLE `memberacc` (
  `MemberNo` int(6) NOT NULL,
  `SectionNo` varchar(2) default NULL,
  `RewardPoint` int(4) default NULL,
  `XtraPoint` decimal(15,0) default NULL,
  `OPAddXCredit` decimal(15,0) default NULL,
  `EGMAddXCredit` decimal(15,0) default NULL,
  `RewardPointRate` int(4) default NULL,
  `LastRewardPoint` int(4) default NULL,
  `LastRewardBet` int(4) default NULL,
  `ReservedPoint` int(4) default NULL,
  `ReservedXTraCredit` decimal(15,0) default NULL,
  `Status` int(4) default NULL,
  `CurMNum` int(4) default NULL,
  `CurLocation` varchar(8) default NULL,
  `CurStartTime` datetime default NULL,
  `CurLockXCredit` decimal(15,0) default NULL,
  `CurLockXCreditByOP` decimal(15,0) default NULL,
  `CurLockXCreditByEGM` decimal(15,0) default NULL,
  `CurLockPoint` int(4) default NULL,
  PRIMARY KEY  (`MemberNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberacc
-- ----------------------------
INSERT INTO `memberacc` VALUES ('18', '00', '20', '40', '60', '40', '40', '10', '5', '10', '10', '1', '5412', '2', '2016-12-14 01:17:22', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for memberacctranslist
-- ----------------------------
DROP TABLE IF EXISTS `memberacctranslist`;
CREATE TABLE `memberacctranslist` (
  `TransNo` int(4) NOT NULL,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `SessionNo` varchar(4) default NULL,
  `ModifyTime` datetime default NULL,
  `OperatorID` int(4) default NULL,
  `Point` decimal(15,0) default NULL,
  `PointType` int(4) default NULL,
  `Behavior` int(4) default NULL,
  `PointExpireDate` datetime default NULL,
  `PointExpireFlag` int(4) default NULL,
  PRIMARY KEY  (`TransNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberacctranslist
-- ----------------------------

-- ----------------------------
-- Table structure for memberbetlog
-- ----------------------------
DROP TABLE IF EXISTS `memberbetlog`;
CREATE TABLE `memberbetlog` (
  `LogNo` int(11) NOT NULL auto_increment,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `StartTime` datetime default NULL,
  `BetLogTime` datetime default NULL,
  `RewardPointRate` int(4) default NULL,
  `LastRewardPoint` int(4) default NULL,
  `LastRewardBet` int(4) default NULL,
  `CoinIn` decimal(20,0) default NULL,
  `CoinOut` decimal(20,0) default NULL,
  `Games` int(4) default NULL,
  `Jackpot` decimal(20,0) default NULL,
  `BillsIn` decimal(20,0) default NULL,
  `XCUsed` decimal(20,0) default NULL,
  `XCEarned` decimal(20,0) default NULL,
  `RPointUsed` decimal(20,0) default NULL,
  `RPointEarned` decimal(20,0) default NULL,
  `XCLeft` decimal(20,0) default NULL,
  `RPointLeft` decimal(20,0) default NULL,
  `XCNotUsed` decimal(20,0) default NULL,
  `AccoutingDate` datetime default NULL,
  PRIMARY KEY  (`LogNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberbetlog
-- ----------------------------
INSERT INTO `memberbetlog` VALUES ('1', '18', '5', '2017-01-19 23:29:38', '2017-01-19 23:29:42', '15', '53', '32', '35', '35', '132', '23', '35', '35', '23', '12', '32', '32', '323', '32', null);
INSERT INTO `memberbetlog` VALUES ('2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for memberbonustranslist
-- ----------------------------
DROP TABLE IF EXISTS `memberbonustranslist`;
CREATE TABLE `memberbonustranslist` (
  `TransNo` int(4) NOT NULL auto_increment,
  `MemberNo` varchar(2) default NULL,
  `SectionNo` varchar(2) default NULL,
  `Mnum` int(4) default NULL,
  `Location` varchar(8) default NULL,
  `TransTime` datetime default NULL,
  `Point` decimal(20,0) default NULL,
  `PointType` int(4) default NULL,
  `Behavior` int(4) default NULL,
  `Place` varchar(255) default NULL,
  `Expire` char(1) default NULL,
  `ExpireDate` datetime default NULL,
  PRIMARY KEY  (`TransNo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberbonustranslist
-- ----------------------------
INSERT INTO `memberbonustranslist` VALUES ('2', '18', 'KK', null, null, '2017-01-20 15:45:42', '20', '1', '0', 'EGM', 'N', null);
INSERT INTO `memberbonustranslist` VALUES ('1', '18', 'KK', null, null, '2017-01-20 16:20:49', '40', '0', '1', 'WorkStation', 'N', '2017-01-31 16:21:27');
INSERT INTO `memberbonustranslist` VALUES ('3', '18', 'KK', null, null, '2017-01-20 09:19:06', '5445', '1', '1', null, null, null);
INSERT INTO `memberbonustranslist` VALUES ('4', '18', 'KK', null, null, '2017-01-20 09:20:44', '12', '1', '0', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('5', '18', 'KK', null, null, '2017-01-20 09:22:22', '4654', '1', '1', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('6', '18', 'KK', null, null, '2017-01-20 09:22:33', '2', '1', '0', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('7', '18', 'KK', null, null, '2017-01-20 10:03:12', '123', '1', '0', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('8', '18', 'KK', null, null, '2017-01-20 10:03:25', '123', '1', '0', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('9', '18', 'KK', null, null, '2017-01-20 10:04:50', '123', '1', '0', 'Workstation', null, '2017-01-13 23:59:00');
INSERT INTO `memberbonustranslist` VALUES ('10', '18', 'KK', null, null, '2017-01-20 10:10:38', '123', '1', '0', 'Workstation', null, null);
INSERT INTO `memberbonustranslist` VALUES ('11', '18', 'KK', null, null, '2017-01-20 10:11:08', '11111', '0', '1', 'Workstation', null, null);

-- ----------------------------
-- Table structure for membercard
-- ----------------------------
DROP TABLE IF EXISTS `membercard`;
CREATE TABLE `membercard` (
  `CardNo` int(11) unsigned zerofill NOT NULL auto_increment,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `CardSeqNo` varchar(10) default NULL,
  `CardStatus` int(4) default '1',
  `updated_at` datetime default NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`CardNo`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of membercard
-- ----------------------------
INSERT INTO `membercard` VALUES ('00000000001', null, '00', '1', '1', '2017-01-18 08:13:50', null);
INSERT INTO `membercard` VALUES ('00000000002', '1', '00', '2', '1', '2017-01-18 08:13:28', null);
INSERT INTO `membercard` VALUES ('00000000003', '1', '00', '3', '1', null, null);
INSERT INTO `membercard` VALUES ('00000000013', '18', null, '11', '1', '2017-01-20 22:43:43', null);
INSERT INTO `membercard` VALUES ('00000000005', null, null, '4', '1', '2017-01-18 08:24:40', null);
INSERT INTO `membercard` VALUES ('00000000014', '18', null, '12', '1', '2017-01-20 22:41:34', null);
INSERT INTO `membercard` VALUES ('00000000007', null, null, '5', '1', '2017-01-18 08:24:40', null);
INSERT INTO `membercard` VALUES ('00000000009', '3', null, '7', '1', '2017-01-19 09:23:11', null);
INSERT INTO `membercard` VALUES ('00000000010', '18', null, '8', '1', '2017-01-20 22:36:47', null);
INSERT INTO `membercard` VALUES ('00000000031', '18', null, 'sadfg', '1', '2017-01-21 02:42:36', '2017-01-20 13:41:53');
INSERT INTO `membercard` VALUES ('00000000015', '18', null, '13', '1', '2017-01-20 22:45:20', null);
INSERT INTO `membercard` VALUES ('00000000016', '18', null, '14', '1', '2017-01-20 22:46:14', null);
INSERT INTO `membercard` VALUES ('00000000017', '18', null, '15', '1', '2017-01-21 02:30:28', null);
INSERT INTO `membercard` VALUES ('00000000018', null, null, '16', '1', null, null);
INSERT INTO `membercard` VALUES ('00000000019', null, null, '17', '1', null, null);
INSERT INTO `membercard` VALUES ('00000000020', null, null, '18', '1', '2017-01-20 22:33:34', null);
INSERT INTO `membercard` VALUES ('00000000021', null, null, '19', '1', '2017-01-20 22:27:48', null);
INSERT INTO `membercard` VALUES ('00000000022', '18', null, '20', '1', '2017-01-20 22:47:58', null);
INSERT INTO `membercard` VALUES ('00000000023', '18', null, '21', '1', '2017-01-20 22:49:01', null);
INSERT INTO `membercard` VALUES ('00000000024', null, null, '22', '1', '2017-01-20 22:29:52', null);
INSERT INTO `membercard` VALUES ('00000000027', null, null, 'dfsafrew', '1', '2017-01-20 22:19:13', '2017-01-19 13:00:05');
INSERT INTO `membercard` VALUES ('00000000028', null, null, 'ewrwgwg', '1', '2017-01-20 22:07:58', '2017-01-19 13:00:19');
INSERT INTO `membercard` VALUES ('00000000029', null, null, 'ewrwqffewf', '1', '2017-01-20 21:59:42', '2017-01-19 13:00:40');
INSERT INTO `membercard` VALUES ('00000000030', null, null, 'aferert', '1', '2017-01-19 13:16:50', '2017-01-19 13:16:50');
INSERT INTO `membercard` VALUES ('00000000032', '18', null, 'qwevvb', '1', '2017-01-21 02:10:13', '2017-01-20 21:43:30');

-- ----------------------------
-- Table structure for membercardtranslist
-- ----------------------------
DROP TABLE IF EXISTS `membercardtranslist`;
CREATE TABLE `membercardtranslist` (
  `TransSeqNo` int(4) NOT NULL auto_increment,
  `CardSeqNo` varchar(10) default NULL,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `SessionNo` int(4) default NULL,
  `ModifyTime` datetime default NULL,
  `Behavior` varchar(4) default NULL,
  `OperatorID` int(4) default NULL,
  PRIMARY KEY  (`TransSeqNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of membercardtranslist
-- ----------------------------
INSERT INTO `membercardtranslist` VALUES ('1', 'qwevvb', '18', null, '0', '2017-01-21 02:09:31', '0', '0');
INSERT INTO `membercardtranslist` VALUES ('2', 'qwevvb', '18', 'KK', '0', '2017-01-21 02:10:13', '1', '0');
INSERT INTO `membercardtranslist` VALUES ('3', '15', '18', 'KK', '0', '2017-01-21 02:30:28', '2', '0');
INSERT INTO `membercardtranslist` VALUES ('4', 'sadfg', '18', 'KK', '0', '2017-01-21 02:42:36', '1', '0');

-- ----------------------------
-- Table structure for memberplayrecord
-- ----------------------------
DROP TABLE IF EXISTS `memberplayrecord`;
CREATE TABLE `memberplayrecord` (
  `TransNo` int(4) default NULL,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `Mnum` int(4) default NULL,
  `Location` varchar(8) default NULL,
  `StartTime` datetime default NULL,
  `EndTime` datetime default NULL,
  `CoinIn` decimal(20,0) default NULL,
  `CoinOut` decimal(20,0) default NULL,
  `Games` int(255) default NULL,
  `Jackpot` decimal(20,0) default NULL,
  `BillsIn` decimal(20,0) default NULL,
  `AverageBet` decimal(20,0) default NULL,
  `Win` decimal(20,0) default NULL,
  `XCUsed` decimal(20,0) default NULL,
  `XCEarned` decimal(20,0) default NULL,
  `RPointUsed` decimal(20,0) default NULL,
  `RPointEarned` decimal(20,0) default NULL,
  `AbandonCard` char(1) default NULL,
  `AccountingDate` datetime default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberplayrecord
-- ----------------------------
INSERT INTO `memberplayrecord` VALUES (null, '1', '00', '4', '1', '2017-01-21 16:06:21', '2017-01-21 17:01:50', '100', '50', '20', '40', '40', '25', '32', '10', '5', '20', '15', 'N', '2017-01-19 16:07:50');
INSERT INTO `memberplayrecord` VALUES (null, '1', '00', '6', '1', '2017-01-23 16:06:21', '2017-01-23 17:01:50', '50', '100', '20', '20', '30', '25', '18', '5', '10', '20', '5', 'N', '2017-01-19 16:07:50');

-- ----------------------------
-- Table structure for memberrank
-- ----------------------------
DROP TABLE IF EXISTS `memberrank`;
CREATE TABLE `memberrank` (
  `RankNo` int(11) NOT NULL,
  `RankName` varchar(30) default NULL,
  PRIMARY KEY  (`RankNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of memberrank
-- ----------------------------
INSERT INTO `memberrank` VALUES ('0', '一般會員');
INSERT INTO `memberrank` VALUES ('1', '黃金會員');
INSERT INTO `memberrank` VALUES ('2', '白金會員');

-- ----------------------------
-- Table structure for membertranslist
-- ----------------------------
DROP TABLE IF EXISTS `membertranslist`;
CREATE TABLE `membertranslist` (
  `TransSeqNo` int(4) NOT NULL auto_increment,
  `MemberNo` varchar(6) default NULL,
  `SectionNo` varchar(2) default NULL,
  `SessionNo` int(4) default NULL,
  `ModifyTime` datetime default NULL,
  `Behavior` int(4) default NULL,
  `OperatorID` int(4) default NULL,
  `MemberName` varchar(30) default NULL,
  `MemberID` varchar(10) default NULL,
  `AffiliationTime` datetime default NULL,
  `Birthday` datetime default NULL,
  `Address` varchar(100) default NULL,
  `CellPhone` varchar(12) default NULL,
  `TelePhone` varchar(12) default NULL,
  `MemberStatus` int(4) default NULL,
  `Rank` int(4) default NULL,
  `XCEnable` int(4) default NULL,
  `RPEnable` int(4) default NULL,
  `Password` varchar(4) default NULL,
  PRIMARY KEY  (`TransSeqNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of membertranslist
-- ----------------------------
INSERT INTO `membertranslist` VALUES ('1', null, null, null, '2017-01-21 02:52:21', null, null, null, 'adsfasdf', null, '2017-12-31 00:00:00', ' 蛇子形路', '0953656565', '0953656565', null, '0', '0', '0', '1234');
INSERT INTO `membertranslist` VALUES ('2', null, 'KK', '0', '2017-01-21 02:56:42', null, '0', null, 'admin', null, '2017-12-31 00:00:00', '****心巷三號', '00000', '000000', null, '0', '0', '0', '1234');
INSERT INTO `membertranslist` VALUES ('3', null, 'KK', '0', '2017-01-21 02:59:14', null, '0', 'Wabfds', '123456saf', null, '2017-12-31 00:00:00', '****心巷三號', '123123', '000000', null, '2', '0', '1', '0000');
INSERT INTO `membertranslist` VALUES ('4', '35', 'KK', '0', '2017-01-21 03:00:54', null, '0', 'Wabfds', '123456saf', null, '2017-12-31 00:00:00', '****心巷三號', '123123', '000000', null, '2', '0', '1', '0000');
INSERT INTO `membertranslist` VALUES ('5', '36', 'KK', '0', '2017-01-21 03:07:18', null, '0', 'Wanger', 'M12333314', null, '0088-08-08 00:00:00', 'Taiwan, Taipei  cCC', '091223456', '0423534', null, '2', '1', '1', '0000');
