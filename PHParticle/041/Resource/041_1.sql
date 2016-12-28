-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 08:58:09
-- 服务器版本： 5.7.11
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `phpdemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `041_1`
--

CREATE TABLE `041_1` (
  `id` int(8) UNSIGNED NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `sex` varchar(2) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `reg_time` datetime NOT NULL,
  `question` varchar(32) DEFAULT NULL,
  `answer` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `041_1`
--

INSERT INTO `041_1` (`id`, `nickname`, `password`, `address`, `sex`, `age`, `birthday`, `reg_time`, `question`, `answer`) VALUES
(1, '小熊', '21232f297a57a5a743894a0e4a801fc3', '', '男', 1, '2012-01-01', '2013-07-27 21:42:10', '', ''),
(2, '长颈鹿', '21232f297a57a5a743894a0e4a801fc3', '', '男', 1, '2012-01-01', '2013-07-27 22:17:12', '', ''),
(3, 'cmm', '202cb962ac59075b964b07152d234b70', 'ww', '女', 4, '2012-01-01', '2016-12-21 18:28:19', 'ww', 'ww'),
(4, 'qqa', '202cb962ac59075b964b07152d234b70', '', '男', 4, '2012-01-01', '2016-12-21 18:30:09', '', ''),
(5, '小贝', '202cb962ac59075b964b07152d234b70', '杭州', '男', 4, '2012-01-01', '2016-12-21 19:29:18', '贝宝宝', ''),
(6, 'xx', '202cb962ac59075b964b07152d234b70', '', '男', 4, '2012-01-01', '2016-12-21 19:59:44', '', ''),
(8, 'cm', '202cb962ac59075b964b07152d234b70', '杭州', '男', 21, '1995-01-01', '2016-12-22 10:36:56', NULL, NULL),
(9, 'mico', '202cb962ac59075b964b07152d234b70', '', '男', 21, '1995-01-01', '2016-12-22 10:37:31', NULL, NULL),
(10, 'c', '202cb962ac59075b964b07152d234b70', '', '男', 21, '1995-01-01', '2016-12-22 15:48:20', NULL, NULL),
(11, 'm', '202cb962ac59075b964b07152d234b70', '', '男', 21, '1995-01-01', '2016-12-22 15:49:00', NULL, NULL),
(12, 'user1', '202cb962ac59075b964b07152d234b70', '北京', '男', 21, '1995-06-07', '2016-12-22 15:57:03', NULL, NULL),
(13, 'user2', '202cb962ac59075b964b07152d234b70', '杭州', '女', 21, '1995-10-05', '2016-12-22 15:57:47', NULL, NULL),
(14, 'phplover1', '202cb962ac59075b964b07152d234b70', '北京', '女', 21, '1995-10-05', '2016-12-22 16:40:09', NULL, NULL),
(15, 'phplover2', '202cb962ac59075b964b07152d234b70', '杭州', '男', 21, '1995-06-20', '2016-12-22 16:41:44', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `041_1`
--
ALTER TABLE `041_1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `041_1`
--
ALTER TABLE `041_1`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
