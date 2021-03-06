/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lara53

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-09 22:01:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for machine
-- ----------------------------
DROP TABLE IF EXISTS `machine`;
CREATE TABLE `machine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MNum` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `IPAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SerialNum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `SectionName` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `BankNo` int(11) NOT NULL,
  `SeqNo` int(11) NOT NULL,
  `GameType` int(11) NOT NULL,
  `DenomCode` int(11) NOT NULL,
  `PayTable` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `machine_mnum_unique` (`MNum`),
  UNIQUE KEY `machine_ipaddress_unique` (`IPAddress`),
  UNIQUE KEY `machine_serialnum_unique` (`SerialNum`),
  UNIQUE KEY `machine_location_unique` (`Location`)
) ENGINE=InnoDB AUTO_INCREMENT=2724 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of machine
-- ----------------------------
INSERT INTO `machine` VALUES ('1', '165350', '78.32.170.190', 'mp0240937570476629', 'kk3238', 'kk', '1', '1', '2', '6', 'a736836', '0', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('2', '728922', '139.55.168.56', 'xc5635143820956451', 'ld2295', 'ld', '1', '3', '77', '5', 'b910819', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('3', '615614', '28.230.40.198', 'qa7046334974421879', 'qg3259', 'qg', '1', '2', '30', '27', 'u858630', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('4', '165730', '48.185.93.222', 'yw3517634628960400', 'fx2321', 'fx', '1', '4', '99', '1', 'i311910', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('5', '490790', '175.0.13.182', 'vw4976715853957358', 'gc8550', 'gc', '1', '5', '6', '7', 'c101061', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('6', '859144', '120.186.71.117', 'ou0587938667637051', 'mc2437', 'mc', '1', '6', '14', '30', 'b339033', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('7', '761937', '107.216.202.213', 'ip7832646105589402', 'mc3830', 'mc', '1', '7', '21', '3', 'p922492', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('8', '985977', '44.32.2.155', 'so7290804065098772', 'ay5027', 'ay', '1', '8', '41', '2', 'x025000', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('9', '123491', '176.75.90.128', 'cs0239528032087614', 'ku3105', 'ku', '1', '9', '53', '23', 'x982850', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('10', '786043', '204.209.243.146', 'uu7766872348157794', 'vi3180', 'vi', '1', '10', '52', '14', 's012395', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('11', '354650', '127.213.7.255', 'zt1117658123410002', 'zv4186', 'zv', '1', '11', '98', '26', 'a559485', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('12', '944342', '168.188.161.35', 'bt6420325163982467', 'ba9935', 'ba', '1', '12', '7', '27', 'b755104', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('13', '999503', '34.112.150.83', 'pb9964111702555751', 'oz1496', 'oz', '2', '1', '51', '14', 'l967691', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('14', '018205', '222.217.142.173', 'wm1061122636889637', 'bf2727', 'bf', '2', '2', '49', '4', 'c817010', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('15', '706805', '86.64.196.95', 'xa6868668473489421', 'nr7289', 'nr', '2', '3', '79', '14', 'v863932', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('16', '321176', '131.125.36.127', 'nf5748469446351821', 'ig5079', 'ig', '2', '4', '26', '26', 'l045421', '1', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('17', '460361', '237.214.203.98', 'hi1528179709433692', 'zo5904', 'zo', '2', '5', '32', '6', 'k382596', '2', '2017-01-22 02:32:29', '2017-01-22 02:32:29');
INSERT INTO `machine` VALUES ('18', '751129', '215.255.244.1', 'dp5950404827488390', 'ak8597', 'ak', '2', '6', '87', '17', 'e725406', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('19', '022363', '157.61.207.66', 'll0695724979448292', 'pf5762', 'pf', '2', '7', '83', '19', 'o054559', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('20', '784718', '248.151.109.226', 'ad1925057404581241', 'fy2923', 'fy', '2', '8', '33', '28', 'm681615', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('21', '133266', '175.196.164.239', 'jx7874560093331301', 'tj8880', 'tj', '2', '9', '7', '7', 'k794630', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('22', '665815', '246.58.226.4', 'os8064056509660025', 'er0108', 'er', '2', '10', '60', '14', 'm839515', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('23', '110311', '24.151.85.153', 'zb6102738056838727', 'si2189', 'si', '2', '11', '37', '26', 'k415190', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('24', '038459', '119.73.107.69', 'ft0193815405395918', 'rd7256', 'rd', '2', '12', '95', '25', 'x069592', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('25', '061237', '207.173.237.35', 'mt8051881635736083', 'bv0388', 'bv', '3', '1', '7', '19', 'u859413', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('26', '877088', '23.87.219.146', 'rd5959036599928612', 'af6715', 'af', '3', '2', '52', '10', 'b328622', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('27', '594637', '112.3.8.239', 'rj5537982387429518', 'mv6105', 'mv', '3', '3', '98', '1', 'm343468', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('28', '252162', '111.16.130.96', 'rs6407080034666751', 'oa1433', 'oa', '3', '4', '41', '18', 'z799554', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('29', '293821', '98.253.54.1', 'ls8962561916420275', 'vb1542', 'vb', '3', '5', '5', '6', 'd469306', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('30', '408141', '195.242.164.82', 'jd6581688108396285', 'vs9056', 'vs', '3', '6', '56', '2', 'v664841', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('31', '411905', '59.246.242.102', 'hk6770842918823103', 'ug7733', 'ug', '3', '7', '58', '26', 'p462412', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('32', '885138', '52.199.58.22', 'pd4385569640234967', 'sq1717', 'sq', '3', '8', '56', '28', 'n768486', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('33', '930825', '158.112.3.64', 'dp6946735561278677', 'xr9781', 'xr', '3', '9', '58', '17', 'm250474', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('34', '572525', '107.199.206.1', 'yl5143698766916331', 'zi7933', 'zi', '3', '10', '22', '29', 'e368615', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('35', '060616', '18.7.253.100', 'jo1528956877444581', 'vw3032', 'vw', '3', '11', '39', '20', 'u111372', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('36', '305751', '21.119.197.197', 'jv3947914270418840', 'dw8944', 'dw', '3', '12', '83', '13', 'x529091', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('37', '335151', '242.221.113.197', 'kh3374423702822580', 'eb7598', 'eb', '4', '1', '30', '28', 'k886284', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('38', '457930', '19.60.177.75', 'pm1462500824190935', 'dt8414', 'dt', '4', '2', '11', '5', 'n081307', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('39', '601999', '39.160.52.214', 'fp0988328267687747', 'xo7655', 'xo', '4', '3', '10', '15', 'a986744', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('40', '337025', '181.50.112.188', 'lf4329177860525739', 'sa5321', 'sa', '4', '4', '4', '19', 'w710068', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('41', '788843', '100.213.54.126', 'ja5911831395426708', 'yw6492', 'yw', '4', '5', '10', '25', 'o385891', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('42', '919821', '38.71.126.161', 'fl1857722920608057', 'wf7804', 'wf', '4', '6', '7', '30', 'u784603', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('43', '981039', '150.42.67.145', 'vq4785620761933709', 'gk4292', 'gk', '4', '7', '51', '13', 'f032107', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('44', '841000', '165.229.186.213', 'pg0633490716977179', 'qu5452', 'qu', '4', '8', '88', '4', 'o420933', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('45', '105381', '189.75.240.185', 'cz6080183801858831', 'lo1529', 'lo', '4', '9', '89', '18', 'k579900', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('46', '086244', '6.231.108.213', 'dg7895022158306680', 'sh9914', 'sh', '4', '10', '71', '11', 't559331', '2', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('47', '697731', '80.41.121.142', 'nc0167057115358113', 'uh7729', 'uh', '4', '11', '30', '29', 'u598933', '0', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('48', '648426', '177.0.125.149', 'qi7749405475896584', 'pz1146', 'pz', '4', '12', '37', '15', 'u373117', '1', '2017-01-22 02:32:30', '2017-01-22 02:32:30');
INSERT INTO `machine` VALUES ('49', '581987', '103.137.87.90', 'zn0325579117408405', 'ef2203', 'ef', '5', '1', '20', '7', 't487659', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('50', '893537', '187.18.218.153', 'uy5547804757239277', 'gc7689', 'gc', '5', '2', '42', '30', 't000292', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('51', '294005', '172.189.85.118', 'mx5891101091316378', 'gd1854', 'gd', '5', '3', '16', '18', 'l708448', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('52', '524082', '21.136.105.80', 'tu4639150317087056', 'lx7314', 'lx', '5', '4', '45', '1', 'j804103', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('53', '764107', '80.200.157.181', 'sy0901779831622798', 'bm4226', 'bm', '5', '5', '26', '18', 'i867033', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('54', '332908', '79.41.119.180', 'fw4793303720017549', 'ia8607', 'ia', '5', '6', '11', '15', 'x384283', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('55', '860669', '247.148.241.87', 'ha3294085035369062', 'fj4151', 'fj', '5', '7', '28', '7', 'm453247', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('56', '838657', '77.132.47.65', 'io5118058302832813', 'je9610', 'je', '5', '8', '34', '18', 'f130360', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('57', '400292', '105.129.132.165', 'wy1940629491072874', 'oj2916', 'oj', '5', '9', '55', '17', 'l972704', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('58', '553867', '231.251.51.19', 'ub3143625341112390', 'ez0022', 'ez', '5', '10', '67', '9', 'f901647', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('59', '891060', '189.29.36.202', 'po9692242861733751', 'pg7506', 'pg', '5', '11', '34', '30', 'p493992', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('60', '482083', '191.21.119.158', 'ob4521643633703400', 'uo9314', 'uo', '5', '12', '22', '4', 'q044452', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('61', '699796', '62.30.177.7', 'sy4545825860860974', 'dg0091', 'dg', '6', '1', '44', '11', 'j350940', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('62', '358177', '243.162.174.93', 'mc3061145277699411', 'bm6137', 'bm', '6', '2', '86', '10', 'e859042', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('63', '433595', '126.131.101.210', 'qt0578608017010500', 'cz7368', 'cz', '6', '3', '52', '18', 'n960059', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('64', '372491', '243.91.177.105', 'hh1686742488223257', 'jq6493', 'jq', '6', '4', '70', '15', 'o953030', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('65', '694851', '103.87.52.97', 'rv7602111577634460', 'rv8254', 'rv', '6', '5', '5', '8', 'q409723', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('66', '022652', '153.163.233.23', 'qy3739693704528898', 'ji2468', 'ji', '6', '6', '36', '27', 'a373795', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('67', '061097', '152.70.146.26', 'vt2556582891322993', 'ev1362', 'ev', '6', '7', '60', '27', 'u704128', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('68', '047744', '16.194.99.247', 'np9711425798114060', 'bn5583', 'bn', '6', '8', '66', '4', 'x386110', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('69', '244011', '23.193.213.54', 'xo3438173321418352', 'hf9583', 'hf', '6', '9', '8', '29', 'm014027', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('70', '204658', '38.170.188.108', 'if9283373254632800', 'hq9775', 'hq', '6', '10', '5', '20', 'm178791', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('71', '899588', '68.139.67.132', 'gv4820366117620984', 'aw0536', 'aw', '6', '11', '62', '12', 'w227045', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('72', '384205', '153.199.219.207', 'gz8926737923028040', 'hj9015', 'hj', '6', '12', '85', '21', 'k694657', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('73', '657109', '79.251.86.253', 'jk1765114172062055', 'jw2737', 'jw', '7', '1', '100', '10', 'b801223', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('74', '630332', '128.201.141.248', 'sv1169488963573765', 'ez3240', 'ez', '7', '2', '13', '24', 'c437462', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('75', '273027', '203.134.128.0', 'cm3377668117139595', 'vn9424', 'vn', '7', '3', '28', '11', 'u643530', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('76', '635407', '179.2.168.209', 'cw9890848782330745', 'jt5915', 'jt', '7', '4', '20', '6', 's485363', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('77', '643691', '135.234.10.78', 'mr2030447452431085', 'kg8241', 'kg', '7', '5', '99', '22', 'q343346', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('78', '021393', '25.76.100.144', 'jw1856635598218473', 'bt6800', 'bt', '7', '6', '38', '16', 'b112287', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('79', '150355', '229.68.141.207', 'yg5123927345905696', 'ah6888', 'ah', '7', '7', '96', '2', 's569197', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('80', '375827', '235.211.155.129', 'at1782530888900600', 'ae0586', 'ae', '7', '8', '56', '17', 'a377272', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('81', '048950', '239.171.109.142', 'gw2625198091800775', 'du0750', 'du', '7', '9', '14', '28', 'c345978', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('82', '693146', '200.185.150.87', 'pi7718284954417711', 'tf1033', 'tf', '7', '10', '85', '20', 'i326128', '0', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('83', '778243', '133.126.99.92', 'bz2088972105222638', 'uf4907', 'uf', '7', '11', '16', '23', 't347754', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('84', '649431', '139.207.41.16', 'zd5628392854970796', 'zp6594', 'zp', '7', '12', '33', '2', 'g979035', '2', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('85', '303767', '214.169.125.139', 'kh0624254628752111', 'vi9133', 'vi', '8', '1', '72', '23', 'z812654', '1', '2017-01-22 02:32:31', '2017-01-22 02:32:31');
INSERT INTO `machine` VALUES ('86', '780477', '207.254.21.254', 'vg6536417472838824', 'ik2331', 'ik', '8', '2', '62', '10', 'z066598', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('87', '903519', '230.195.253.213', 'fm0193456163761839', 'lg0205', 'lg', '8', '3', '45', '14', 'b152237', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('88', '246566', '206.87.208.160', 'fl3982713570884890', 'sk3330', 'sk', '8', '4', '87', '27', 'z438843', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('89', '902702', '225.181.59.187', 'ln5953553666034072', 'xn2534', 'xn', '8', '5', '75', '21', 'i495996', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('90', '240879', '12.28.165.238', 'fp7434407446245403', 'fp3117', 'fp', '8', '6', '69', '11', 'b973727', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('91', '857212', '139.129.36.49', 'oq3351565660757994', 'ej0621', 'ej', '8', '7', '14', '5', 'u949937', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('92', '129144', '239.90.34.142', 'cy4012064985585064', 'cd2159', 'cd', '8', '8', '67', '28', 'z008221', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('93', '881508', '5.138.204.209', 'ac4666087619518202', 'nw6443', 'nw', '8', '9', '40', '11', 'z632004', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('94', '951636', '217.53.250.3', 'vv7093322447123351', 'wo9394', 'wo', '8', '10', '51', '26', 'n731774', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('95', '062536', '158.60.112.171', 'yv9893970349308018', 'ln3938', 'ln', '8', '11', '2', '21', 'q035933', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('96', '728870', '34.227.95.206', 'xk3187161641297325', 'co4576', 'co', '8', '12', '57', '19', 'z572635', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('97', '001410', '148.209.236.80', 'oi4229467187799000', 'tq4160', 'tq', '9', '1', '77', '21', 'l995164', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('98', '044634', '145.233.10.167', 'qm0577155509451418', 'og9921', 'og', '9', '2', '45', '19', 'v790160', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('99', '482466', '126.107.29.181', 'dt0675606106495715', 'gz4283', 'gz', '9', '3', '82', '30', 'n691964', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('100', '179754', '170.105.221.243', 'sz0258326178277801', 'dj6874', 'dj', '9', '4', '19', '27', 'g745570', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('101', '319391', '61.166.254.72', 'oc8716791524992773', 'xa8738', 'xa', '9', '5', '86', '10', 't287024', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('102', '300996', '86.221.27.50', 'vu0562597423273994', 'sm5460', 'sm', '9', '6', '45', '11', 'a265860', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('103', '153508', '173.168.174.70', 'vb5107937222553376', 'ui8384', 'ui', '9', '7', '80', '4', 'e008301', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('104', '701120', '220.1.225.68', 'av2973612796448135', 'xf4355', 'xf', '9', '8', '22', '10', 'r060708', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('105', '648275', '20.182.238.235', 'rp0576232155599407', 'wu1917', 'wu', '9', '9', '61', '6', 'r778615', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('106', '300436', '164.177.3.225', 'an7241465654675737', 'gt1062', 'gt', '9', '10', '48', '25', 'g294578', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('107', '162117', '171.172.175.226', 'tc5193208473401800', 'pm4639', 'pm', '9', '11', '58', '28', 'x865041', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('108', '056607', '25.59.56.27', 'kw0846102458144547', 'tg7623', 'tg', '9', '12', '26', '23', 'x557895', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('109', '330200', '120.65.17.104', 'tt7803098756831175', 'hh2895', 'hh', '10', '1', '48', '19', 'o965855', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('110', '503373', '233.152.34.177', 'gl1012218208713596', 'xb2751', 'xb', '10', '2', '22', '1', 'x131805', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('111', '479964', '91.66.253.87', 'gv4663798728245825', 'xx9405', 'xx', '10', '3', '12', '2', 'r997305', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('112', '588183', '208.16.52.132', 'mz6286198870255214', 'pe8338', 'pe', '10', '4', '33', '9', 'q106393', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('113', '770975', '215.154.246.153', 'bt4725883595609652', 'sb1152', 'sb', '10', '5', '95', '19', 'f672986', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('114', '453049', '88.201.243.173', 'pr0967898210200315', 'nc9856', 'nc', '10', '6', '54', '8', 's790567', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('115', '685446', '240.53.150.246', 'nw3191679248140020', 'we2336', 'we', '10', '7', '57', '15', 'l606873', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('116', '724430', '91.75.73.30', 'oo4179899995812468', 'bb1835', 'bb', '10', '8', '39', '24', 'q772764', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('117', '212535', '128.56.118.150', 'sa9871946228114586', 'ef9970', 'ef', '10', '9', '55', '21', 'k733296', '1', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('118', '919470', '211.198.174.143', 'cm2936266234426899', 'ux8876', 'ux', '10', '10', '86', '12', 'q257913', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('119', '017358', '145.36.81.121', 'au7868433071141010', 'go4376', 'go', '10', '11', '89', '28', 'l456186', '2', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('120', '955875', '122.170.61.243', 've2658723207908897', 'it3697', 'it', '10', '12', '96', '12', 'b064012', '0', '2017-01-22 02:32:32', '2017-01-22 02:32:32');
INSERT INTO `machine` VALUES ('121', '135027', '134.182.230.14', 'qr7591087671920788', 'hp1783', 'hp', '11', '1', '3', '3', 'v599241', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('122', '745296', '124.223.173.141', 'bt4870403757309230', 'ud8431', 'ud', '11', '2', '83', '10', 'm678365', '2', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('123', '781164', '59.217.189.50', 'ke1271344306272833', 'mp8322', 'mp', '11', '3', '45', '7', 'j960501', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('124', '084863', '221.181.239.50', 'qn3741086229185660', 'ar1485', 'ar', '11', '4', '19', '21', 'r900991', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('125', '005874', '178.42.62.212', 'go2463903176998850', 'zq4480', 'zq', '11', '5', '85', '21', 'r880884', '2', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('126', '637808', '133.188.120.159', 'xo3086855496018189', 'qb5323', 'qb', '11', '6', '5', '21', 'e701477', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('127', '643722', '111.137.158.46', 'gf8978020821885993', 'az2327', 'az', '11', '7', '38', '8', 't428548', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('128', '264098', '193.171.184.247', 'ms3772342731390788', 'qo0140', 'qo', '11', '8', '91', '19', 'n062363', '2', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('129', '632362', '82.32.119.85', 'fn9749989837266462', 'vs5222', 'vs', '11', '9', '19', '18', 'e858741', '2', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('130', '959168', '15.35.157.128', 'xw8579320593694681', 'bo3214', 'bo', '11', '10', '77', '18', 'h212977', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('131', '699528', '138.125.76.180', 'wp2980046861950185', 'si3481', 'si', '11', '11', '40', '30', 'o178597', '2', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('132', '680514', '113.253.93.234', 'tu6265731778976739', 'nb6497', 'nb', '11', '12', '93', '30', 't365069', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('133', '047405', '174.28.18.214', 'll9447050209014099', 'hw2894', 'hw', '12', '1', '61', '17', 'v476468', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('134', '444068', '120.158.32.132', 'nu1557712000679278', 'az6557', 'az', '12', '2', '47', '5', 'j260953', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('135', '458500', '88.25.233.64', 'bj0192318967821476', 'ls4729', 'ls', '12', '3', '75', '20', 't686783', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('136', '480272', '229.118.88.197', 'wt5885806205873677', 'kj3659', 'kj', '12', '4', '61', '25', 'c524933', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('137', '424207', '25.66.255.45', 'fo3141234525259447', 'dz8414', 'dz', '12', '5', '17', '30', 'p044168', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('138', '286061', '144.155.216.239', 'yq5232716899010287', 'tf3804', 'tf', '12', '6', '21', '8', 'r005133', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('139', '457512', '229.75.23.249', 'gh9481660400213924', 'rg8098', 'rg', '12', '7', '14', '27', 'q608418', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('140', '787769', '111.21.24.96', 'uw1373127276705595', 'vv7094', 'vv', '12', '8', '77', '23', 'p726479', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('141', '589583', '15.163.221.185', 'qe8951309763915277', 'xm0177', 'xm', '12', '9', '32', '15', 'g161751', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('142', '758217', '14.84.4.75', 'up8826558750579686', 'at0355', 'at', '12', '10', '5', '23', 'n306027', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('143', '295360', '208.223.175.225', 'zc3147797205628927', 'aw0644', 'aw', '12', '11', '4', '15', 'j239062', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('144', '686778', '189.141.245.248', 'sf9208150190126470', 'mm1101', 'mm', '12', '12', '9', '7', 'n762042', '0', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('145', '973034', '190.23.224.229', 'fr6152757061378229', 'xc4017', 'xc', '13', '1', '19', '6', 'y689191', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('146', '349842', '185.83.120.243', 'zs3013784573446721', 'lv1009', 'lv', '13', '2', '48', '24', 'z657942', '1', '2017-01-22 02:32:33', '2017-01-22 02:32:33');
INSERT INTO `machine` VALUES ('147', '817845', '174.54.165.85', 'um0146990672248589', 'cr8789', 'cr', '13', '3', '97', '22', 'z644389', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('148', '458059', '20.130.69.231', 'dz4500368404435239', 'oq4299', 'oq', '13', '4', '97', '19', 's548913', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('149', '091787', '240.142.238.45', 'pe4750327380345105', 'jg2712', 'jg', '13', '5', '78', '16', 'j636145', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('150', '810998', '220.112.38.135', 'da6738523310535789', 'zb9960', 'zb', '13', '6', '19', '11', 'y073228', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('151', '519708', '55.1.247.15', 'hl3624566499604942', 'ot4248', 'ot', '13', '7', '76', '17', 'r266415', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('152', '574838', '125.138.67.181', 'ek4113270860266460', 'ru4886', 'ru', '13', '8', '28', '18', 'q611544', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('153', '319594', '49.39.255.166', 'jn4114894443922345', 'tt3740', 'tt', '13', '9', '18', '22', 'm493906', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('154', '982087', '137.255.30.253', 'hu8546233966654601', 'yo0174', 'yo', '13', '10', '1', '25', 'k147936', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('155', '555642', '83.69.45.119', 'fz8664036235057382', 'gh5647', 'gh', '13', '11', '70', '26', 'w137247', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('156', '200221', '16.253.48.184', 'cg4285426937334954', 'ye3510', 'ye', '13', '12', '26', '4', 'b789987', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('157', '733503', '142.148.235.161', 'ul6083754173828497', 'tw4896', 'tw', '14', '1', '71', '13', 'k298943', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('158', '112842', '36.215.70.188', 'kk2670900267992319', 'oo8479', 'oo', '14', '2', '78', '15', 'w071382', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('159', '794444', '8.54.136.189', 'ds6172288604863294', 'lb2324', 'lb', '14', '3', '12', '20', 'q035577', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('160', '217169', '74.42.38.123', 'rf2443473463219602', 'kv5951', 'kv', '14', '4', '97', '21', 'z182825', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('161', '050679', '157.196.149.71', 'pv1995292408659554', 'll9768', 'll', '14', '5', '47', '9', 'o288828', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('162', '360781', '199.9.205.230', 'qo1081596813141449', 'qw7058', 'qw', '14', '6', '46', '25', 'g220265', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('163', '447488', '255.252.174.225', 'es5618912529977506', 'sq7052', 'sq', '14', '7', '63', '3', 'c736568', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('164', '654965', '246.47.1.46', 'qu0295453333300094', 'ke9517', 'ke', '14', '8', '36', '4', 't574309', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('165', '147085', '145.83.127.251', 'qt4283905153434650', 'ay2180', 'ay', '14', '9', '16', '11', 'x757646', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('166', '692211', '142.10.119.93', 'pq3449348039758303', 'vf1475', 'vf', '14', '10', '43', '4', 'j694069', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('167', '537910', '48.230.98.203', 'aq9050416696762440', 'ai6256', 'ai', '14', '11', '11', '13', 'p743932', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('168', '431806', '52.222.102.96', 'yj6484226033044369', 'rq4409', 'rq', '14', '12', '50', '8', 'd784581', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('169', '710058', '216.131.250.43', 'sw4051289614508027', 'tz3603', 'tz', '15', '1', '65', '16', 'r230217', '0', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('170', '538426', '40.233.206.89', 'rj6510449018294189', 'ro9089', 'ro', '15', '2', '16', '4', 'f643450', '1', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('171', '061194', '6.222.2.10', 'xe8695940023263595', 'fu2363', 'fu', '15', '3', '95', '1', 'r203484', '2', '2017-01-22 02:32:34', '2017-01-22 02:32:34');
INSERT INTO `machine` VALUES ('172', '277825', '104.203.241.10', 'lb9673541504552036', 'bo1119', 'bo', '15', '4', '91', '19', 'l532236', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('173', '465902', '17.141.103.160', 'zo8508137842373734', 'gu5516', 'gu', '15', '5', '39', '7', 'u478579', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('174', '245535', '111.198.5.108', 'ue2757982904815449', 'zd2119', 'zd', '15', '6', '37', '17', 'g371066', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('175', '276104', '5.34.55.184', 'fy3683793893038130', 'wc4975', 'wc', '15', '7', '51', '29', 'c162827', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('176', '591568', '85.237.236.93', 'zp1031987356840105', 'zx5393', 'zx', '15', '8', '61', '10', 'k909754', '1', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('177', '017528', '66.211.16.168', 'tc8925793094218204', 'ut4371', 'ut', '15', '9', '75', '23', 's699372', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('178', '204242', '34.109.173.39', 'vv4598774388424979', 'ww8373', 'ww', '15', '10', '25', '22', 'l574836', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('179', '111544', '186.129.110.6', 'ew7180959466094378', 'ec7408', 'ec', '15', '11', '4', '30', 's347145', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('180', '370358', '231.202.174.175', 'na5310727035260104', 'pa4481', 'pa', '15', '12', '46', '20', 'l951677', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('181', '651323', '154.29.11.131', 'go7874717046256233', 'mv0542', 'mv', '16', '1', '53', '27', 's692215', '1', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('182', '955075', '2.139.142.128', 'vq8946479831354338', 'yb2183', 'yb', '16', '2', '97', '16', 'h625004', '1', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('183', '362299', '209.180.168.27', 'rm2778511682657987', 'lg3933', 'lg', '16', '3', '7', '30', 'y389226', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('184', '280791', '246.43.130.180', 'lw2696435506842796', 'zl5806', 'zl', '16', '4', '98', '19', 'o969821', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('185', '184219', '199.6.128.243', 'no1713619279646799', 'tc5630', 'tc', '16', '5', '5', '15', 'e728689', '1', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('186', '449386', '225.97.44.236', 'oy0094008482823123', 'zg7415', 'zg', '16', '6', '25', '5', 'm131135', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('187', '924398', '179.119.187.125', 'ax7841139258553586', 'lx4272', 'lx', '16', '7', '85', '30', 'y401042', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('188', '307366', '73.85.51.242', 'kc7448676433946024', 'ry0803', 'ry', '16', '8', '58', '14', 'v309565', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('189', '445777', '33.25.41.179', 'rf1764602704669111', 'vr6567', 'vr', '16', '9', '54', '19', 'k862358', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('190', '052597', '161.169.215.137', 'rm4197287759459936', 'if5191', 'if', '16', '10', '49', '16', 'g719155', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('191', '692261', '254.15.225.156', 'ui3819089133273243', 'lr3005', 'lr', '16', '11', '84', '11', 'g492745', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('192', '281098', '148.171.105.25', 'zp8243538080877997', 'le7739', 'le', '16', '12', '61', '14', 'm681970', '0', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('193', '702994', '77.83.220.121', 'nn0987532135003909', 'ae3594', 'ae', '17', '1', '93', '19', 'l116456', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('194', '257969', '214.19.123.60', 'ol8542995152920083', 'vm9267', 'vm', '17', '2', '27', '12', 'i222615', '1', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('195', '412717', '254.112.17.6', 'jj3018330420312835', 'gz5752', 'gz', '17', '3', '45', '19', 'n113912', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('196', '341756', '104.185.232.32', 'ul0741255041124088', 'du8452', 'du', '17', '4', '92', '26', 'i613096', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('197', '043590', '147.174.194.69', 'ra1966961964356946', 'bd9220', 'bd', '17', '5', '40', '23', 'd716553', '2', '2017-01-22 02:32:35', '2017-01-22 02:32:35');
INSERT INTO `machine` VALUES ('198', '944905', '235.210.131.192', 'to8671067933864188', 'qw4249', 'qw', '17', '6', '99', '26', 'w831370', '2', '2017-01-22 02:32:36', '2017-01-22 02:32:36');
INSERT INTO `machine` VALUES ('199', '530477', '49.22.54.206', 'mm2023216495165358', 'bx1545', 'bx', '17', '7', '77', '16', 'q991156', '0', '2017-01-22 02:32:36', '2017-01-22 02:32:36');
INSERT INTO `machine` VALUES ('200', '214994', '243.185.43.139', 'do9143693069457131', 'ag3786', 'ag', '17', '8', '92', '10', 'l078054', '0', '2017-01-22 02:32:36', '2017-01-22 02:32:36');
