-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 09:19:54
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
-- 表的结构 `045_2`
--

CREATE TABLE `045_2` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_credit` float DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_term` varchar(50) DEFAULT NULL,
  `course_xueshi` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `045_2`
--

INSERT INTO `045_2` (`course_id`, `course_name`, `course_credit`, `teacher_id`, `course_term`, `course_xueshi`) VALUES
(1, '网络构建与运维管理', 4, 20161001, '第一学期', 72),
(2, 'JAVA程序设计基础', 4, 20161002, '第一学期', 72),
(3, '微观经济学', 3, 20161003, '第一学期', 54),
(4, '毛泽东思想和中国特色社会主义理论体系概论', 6, 20161004, '第一学期', 108),
(5, '中医理论基础', 4, 20161005, '第一学期', 72),
(6, '数据库规划与设计', 3, 20161006, '第一学期', 54),
(8, 'PHP动态网站开发', 4, 20161007, '第一学期', 72),
(12, '计算机网络', 4, 20161008, '第一学期', 72),
(17, '中医方剂学', 3, 1998100392, '第一学期', 54),
(18, 'javaweb开发基础', 3, 2006080570, '第一学期', 54),
(19, '操作系统', 3, 2004070566, '第一学期', 54),
(20, '计算机组成原理', 3, 2010080581, '第一学期', 54),
(21, 'Oracle数据库技术', 3, 2010080583, '第一学期', 54),
(22, '概率论与数理统计', 3, 1998070404, '第一学期', 54),
(23, '数据库原理', 3, 2004070554, '第一学期', 54),
(24, '网页设计与网站规划', 4, 2009090576, '第一学期', 72),
(25, '中国近代史纲要', 6, 2009091117, '第一学期', 108),
(26, '数据结构', 4, 2006070572, '第一学期', 54),
(27, '大学英语C', 4, 2005090189, '第一学期', 72),
(28, '体育C', 3, NULL, '第一学期', 54),
(32, '中医方剂学', 3, 20162001, '第一学期', 54),
(129, 'javaweb开发基础', 3, 20162004, '第一学期', 54),
(34, '操作系统', 3, 20162005, '第一学期', 54),
(35, '计算机组成原理', 3, 20162002, '第一学期', 54),
(36, 'Oracle数据库技术 ', 3, 20162003, '第一学期', 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `045_2`
--
ALTER TABLE `045_2`
  ADD PRIMARY KEY (`course_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `045_2`
--
ALTER TABLE `045_2`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
