-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 09:12:45
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
-- 表的结构 `043_2`
--

CREATE TABLE `043_2` (
  `id` int(10) NOT NULL,
  `path` varchar(200) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL COMMENT '全路径',
  `catename` varchar(50) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL COMMENT '分类名',
  `cateorder` int(11) NOT NULL,
  `catetime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `043_2`
--

INSERT INTO `043_2` (`id`, `path`, `catename`, `cateorder`, `catetime`) VALUES
(1, '', '院系', 0, 20161221),
(2, '1', '信息技术学院', 0, 20161221),
(3, '1', '药学院', 0, 20161221),
(4, '1,2', '信息管理与信息系统', 0, 20161221),
(5, '1,2', '计算机科学与技术', 0, 20161221),
(6, '1,3', '中药制药', 0, 20161221),
(7, '1,3', '制药工程', 0, 20161221),
(8, '1,2,4', '14级信管一班', 0, 20161221),
(9, '1,2,4', '14级信管二班', 0, 20161221),
(10, '1,3,6', '14级中药制药本科班', 0, 20161221),
(11, '1,3,7', '14级制药工程本科班', 0, 20161221);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
