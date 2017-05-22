-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-02-09 11:07:50
-- 伺服器版本: 10.0.17-MariaDB
-- PHP 版本： 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `lara53`
--

-- --------------------------------------------------------

--
-- 資料表結構 `eventdef`
--

CREATE TABLE `eventdef` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `type` text NOT NULL,
  `EventDescription` text NOT NULL,
  `RedLight` tinyint(1) NOT NULL,
  `YellowLight` tinyint(1) NOT NULL,
  `ScreenFlicker` tinyint(1) NOT NULL,
  `WarningAudio` tinyint(1) NOT NULL,
  `WarningAudioPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `eventdef`
--

INSERT INTO `eventdef` (`id`, `code`, `type`, `EventDescription`, `RedLight`, `YellowLight`, `ScreenFlicker`, `WarningAudio`, `WarningAudioPath`) VALUES
(2, '0x00', '', 'No activity', 0, 0, 0, 0, ''),
(3, '0x11', 'Q', 'Slot door was opened', 0, 1, 0, 0, ''),
(4, '0x12', 'Q', 'Slot door was closed', 0, 0, 0, 0, ''),
(5, '0x13', 'Q', 'Drop door was opened', 0, 0, 0, 0, ''),
(6, '0x14', 'Q', 'Drop door was closed', 0, 0, 0, 0, ''),
(7, '0x15', 'Q', 'Card cage was opened', 1, 0, 1, 1, 'Warning_Sound1'),
(8, '0x16', 'Q', 'Card cage was closed', 0, 0, 0, 0, ''),
(9, '0x19', 'Q', 'Cashbox door was opened', 1, 0, 1, 1, 'Warning_Sound1'),
(10, '0x1A', 'Q', 'Cashbox door was closed', 0, 0, 0, 0, ''),
(11, '0x1B', 'Q', 'Cashbox was removed', 0, 0, 0, 0, ''),
(12, '0x1C', 'Q', 'Cashbox was installed', 0, 0, 0, 0, ''),
(13, '0x1D', 'Q', 'Belly door was opened', 0, 1, 0, 0, ''),
(14, '0x1E', 'Q', 'Belly door was closed', 0, 0, 0, 0, ''),
(15, '0x27', 'Q', 'Cashbox full detected', 0, 1, 1, 0, ''),
(16, '0x28', 'Q', 'Bill jam', 1, 0, 1, 0, ''),
(17, '0x29', 'Q', 'Bill acceptor hardware failure', 1, 0, 1, 0, ''),
(18, '0x2B', 'Q', 'Bill rejected', 1, 0, 1, 0, ''),
(19, '0x31', 'Q', 'CMOS RAM error (data recovered from EEPROM)', 1, 0, 1, 0, ''),
(20, '0x32', 'Q', 'CMOS RAM error (no data recovered from EEPROM)', 1, 0, 1, 0, ''),
(21, '0x33', 'Q', 'CMOS RAM error (bad device)', 1, 0, 1, 0, ''),
(22, '0x3C', 'Q', 'Operator changed options (changed configuration options)', 0, 0, 0, 0, ''),
(23, '0x3D', 'Q/P', 'A cash out ticket has beed printed', 0, 0, 0, 0, ''),
(24, '0x3F', 'P', 'Validation ID not configured', 0, 0, 0, 0, ''),
(25, '0x4F', 'Q', 'Bill accepted', 0, 0, 0, 0, ''),
(26, '0x60', 'Q', 'Printer communication error', 0, 0, 0, 0, ''),
(27, '0x61', 'Q', 'Printer paper out error', 0, 0, 0, 0, ''),
(28, '0x66', 'Q', 'Cash out button pressed', 0, 0, 0, 0, ''),
(29, '0x67', 'P', 'Ticket(Vouncher) has been inserted', 0, 0, 0, 0, ''),
(30, '0x68', 'P', 'Ticket(Vouncher) transfer complete', 0, 0, 0, 0, ''),
(31, '0x69', 'P', 'AFT transfer complete', 0, 0, 0, 0, ''),
(32, '0x6A', 'P', 'AFT request for host cashout', 0, 0, 0, 0, ''),
(33, '0x6B', 'P', 'AFT request for host to cash out win', 0, 0, 0, 0, ''),
(34, '0x6C', 'P', 'AFT request to register', 0, 0, 0, 0, ''),
(35, '0x6D', 'P', 'AFT registration acknowledged', 0, 0, 0, 0, ''),
(36, '0x6E', 'Q', 'AFT registration cancelled', 0, 0, 0, 0, ''),
(37, '0x6F', 'P', 'Game locked', 0, 0, 0, 0, ''),
(38, '0x7A', 'Q', 'Gaming machine soft meters reset to zero', 0, 0, 0, 0, ''),
(39, '0x7E', 'Q', 'Game has started', 0, 0, 0, 0, ''),
(40, '0x7F', 'Q', 'Game has ended', 0, 0, 0, 0, ''),
(41, '0x82', 'Q', 'Display meters or attendant menu has been entered', 0, 0, 0, 0, ''),
(42, '0x83', 'Q', 'Display meters or attendant menu has been exited', 0, 0, 0, 0, ''),
(43, '0x84', 'Q', 'Self test or operator menu has been entered', 0, 0, 0, 0, ''),
(44, '0x85', 'Q', 'Self test or operator menu has been exited', 0, 0, 0, 0, ''),
(45, '0x86', 'Q', 'Gaming machine is out of service (by attendant)', 0, 0, 0, 0, ''),
(46, '0x99', 'A', 'Operation record', 0, 0, 0, 0, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `eventdef`
--
ALTER TABLE `eventdef`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `eventdef`
--
ALTER TABLE `eventdef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
