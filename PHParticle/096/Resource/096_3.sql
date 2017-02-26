-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-26 02:21:24
-- 服务器版本： 5.7.16
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpDemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `096_3`
--

CREATE TABLE `096_3` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `096_3`
--

INSERT INTO `096_3` (`level_id`, `level_name`) VALUES
(1, '普通VIP会员卡'),
(2, '黄金VIP会员卡'),
(3, '钻石VIP会员卡');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `096_3`
--
ALTER TABLE `096_3`
  ADD PRIMARY KEY (`level_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `096_3`
--
ALTER TABLE `096_3`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
