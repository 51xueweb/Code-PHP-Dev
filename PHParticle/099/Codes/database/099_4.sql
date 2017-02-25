-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-21 09:56:01
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
-- 表的结构 `099_4`
--

CREATE TABLE `099_4` (
  `car_id` int(11) NOT NULL,
  `car_goods_id` int(11) NOT NULL,
  `car_user` varchar(50) NOT NULL,
  `car_num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `099_4`
--

INSERT INTO `099_4` (`car_id`, `car_goods_id`, `car_user`, `car_num`) VALUES
(4, 3, 'tom', 5),
(14, 2, 'tom', 2),
(16, 4, 'tom', 2),
(19, 1, 'tom', 3),
(18, 10, 'tom', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `099_4`
--
ALTER TABLE `099_4`
  ADD PRIMARY KEY (`car_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `099_4`
--
ALTER TABLE `099_4`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
