-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 09:12:36
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
-- 表的结构 `043_1`
--

CREATE TABLE `043_1` (
  `id` int(10) NOT NULL,
  `pid` int(11) NOT NULL COMMENT '父id',
  `catename` varchar(50) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL COMMENT '分类名',
  `cateorder` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `043_1`
--

INSERT INTO `043_1` (`id`, `pid`, `catename`, `cateorder`, `createtime`) VALUES
(3, 1, '信息管理与信息系统', 0, 20161221),
(2, 0, '药学院', 0, 20161221),
(1, 0, '信息技术学院', 0, 20161221),
(4, 1, '计算机科学与技术', 0, 20161221),
(5, 3, '14级信管一班', 0, 20161221),
(6, 3, '14级信管二班', 0, 20161221),
(7, 4, '14级计科本科班', 0, 20161221),
(8, 2, '中药制药', 0, 20161221),
(9, 2, '制药工程', 0, 20161221),
(10, 8, '14级中药制药本科班', 0, 20161221),
(11, 9, '14级制药工程本科班', 0, 20161221);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
