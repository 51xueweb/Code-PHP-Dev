-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 08:58:19
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
-- 表的结构 `041_2`
--

CREATE TABLE `041_2` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `f_nickname` varchar(32) NOT NULL,
  `zt` tinyint(1) NOT NULL DEFAULT '0',
  `fzt` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='好友表';

--
-- 转存表中的数据 `041_2`
--

INSERT INTO `041_2` (`id`, `nickname`, `f_nickname`, `zt`, `fzt`) VALUES
(19, '小熊', '长颈鹿', 0, 1),
(20, '长颈鹿', '小熊', 0, 1),
(21, 'cmm', '长颈鹿', 0, 0),
(22, 'qqa', 'cmm', 0, 1),
(41, 'cmm', 'mico', 0, 1),
(25, 'cmm', 'qqa', 0, 0),
(26, 'cmm', '小熊', 0, 0),
(27, '小贝', '小贝', 0, 1),
(39, 'xx', 'cmm', 0, 1),
(38, 'xx', '小贝', 0, 1),
(31, '小贝', 'cmm', 0, 1),
(33, '小贝', '长颈鹿', 0, 0),
(34, 'xx', '小贝', 0, 1),
(36, '小贝', 'xx', 0, 1),
(40, 'cmm', 'cm', 0, 0),
(42, 'mico', 'cmm', 0, 1),
(43, 'cmm', 'xx', 0, 1),
(44, 'xx', 'cmm', 0, 1),
(45, 'm', 'c', 0, 1),
(46, 'c', 'm', 0, 1),
(50, 'user1', 'cm', 0, 0),
(48, 'user1', 'user2', 0, 1),
(49, 'user2', 'user1', 0, 1),
(51, 'user1', 'user1', 0, 0),
(53, 'phplover2', 'phplover1', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `041_2`
--
ALTER TABLE `041_2`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `041_2`
--
ALTER TABLE `041_2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
