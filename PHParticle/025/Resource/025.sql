-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 08:43:55
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
-- 表的结构 `025`
--

CREATE TABLE `025` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` int(2) NOT NULL DEFAULT '1',
  `pwd` varchar(50) NOT NULL,
  `tel` varchar(30) DEFAULT '用户未填写',
  `qq` varchar(20) DEFAULT '用户未填写',
  `address` varchar(50) DEFAULT '用户未填写'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `025`
--

INSERT INTO `025` (`id`, `name`, `sex`, `pwd`, `tel`, `qq`, `address`) VALUES
(3, 'qa', 1, '22222', NULL, NULL, NULL),
(4, 'as', 0, '121', NULL, NULL, NULL),
(5, '小可', 1, '123456', '13134232211', '278654678', '江苏省无锡市'),
(6, '小溪', 0, '123456', '15678656789', '123456789', '江苏扬州'),
(7, '123', 123, '1', '', '', ''),
(10, '123', 123, '1', '', '', ''),
(11, '123', 1, '123', '', '', ''),
(12, '小明', 1, '123456', '12344678932', '23432123', '河南郑州'),
(13, 'ccxc', 1, 'ccc', '12344678932', '23432123', ''),
(14, 'zxc', 1, '123', '12344678933', '23432123', '河南开封'),
(15, '草丛', 1, '33', '12344678932', '23432123', '河南开封'),
(16, '从草丛', 1, '   ', '12344678932', '23432123', '南京'),
(17, '1111', 1, '111', '', '', ''),
(18, '点对点', 1, '3dfd', '', '', ''),
(19, ' 第三', 1, 'dw2', '', '', ''),
(20, '豆豆', 0, '2ssd', '12344678933', '23432123', '南京'),
(21, '小丸子', 0, '123456', '13078956789', '23432899', '北京');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `025`
--
ALTER TABLE `025`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `025`
--
ALTER TABLE `025`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
