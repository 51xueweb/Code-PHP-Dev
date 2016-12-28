-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 09:19:44
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
-- 表的结构 `045_1`
--

CREATE TABLE `045_1` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_dept` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `045_1`
--

INSERT INTO `045_1` (`class_id`, `class_name`, `class_dept`) VALUES
(6, '2015级信息管理与信息系统本科班', '信息技术学院'),
(5, '2014级计算机科学与技术本科班', '信息技术学院'),
(3, '2014级信息管理与信息系统一、二班', '信息技术学院'),
(7, '2016级信息管理与信息系统本科班', '信息技术学院'),
(8, '2015级计算机科学与技术本科班', '信息技术学院'),
(9, '2016级计算机科学与技术本科班', '信息技术学院'),
(1, '2013级信息管理与信息系统一班', '信息技术学院'),
(2, '2013级信息管理与信息系统二班', '信息技术学院'),
(4, '2013级计算机科学与技术本科班', '信息技术学院'),
(10, '2015级软件本科班', '信息技术学院'),
(11, '2014级制药工程班', '药学院'),
(12, '2015级汉语国际教育班', '人文学院'),
(13, '2015级信息管理与信息系统专科二班', '信息技术学院'),
(14, '2015级信息管理与信息系统专科一班 ', '信息技术学院'),
(15, '2015级中药资源与开发本科班', '药学院');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `045_1`
--
ALTER TABLE `045_1`
  ADD PRIMARY KEY (`class_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `045_1`
--
ALTER TABLE `045_1`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
