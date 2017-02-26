-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-26 02:21:34
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
-- 表的结构 `096_4`
--

CREATE TABLE `096_4` (
  `log_id` int(11) NOT NULL,
  `log_admin` varchar(30) NOT NULL,
  `log_member` char(20) NOT NULL,
  `log_operate` char(20) NOT NULL,
  `log_time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `096_4`
--

INSERT INTO `096_4` (`log_id`, `log_admin`, `log_member`, `log_operate`, `log_time`) VALUES
(1, 'yz201', '2017022596789', 'insert', '2017-02-25 11:53:01'),
(2, 'yz201', '2017022596789	', 'update', '2017-02-25 13:09:07'),
(3, 'yz201', '2017022596789', 'update', '2017-02-25 13:10:30'),
(4, 'yz201', '2017022513513', 'insert', '2017-02-25 13:22:27'),
(5, 'yz201', '2017022513513', 'delete', '2017-02-25 13:29:26'),
(6, 'yz201', '2017022596767', 'insert', '2017-02-25 13:39:52'),
(7, 'yz201', '2017022596767', 'delete', '2017-02-26 01:03:50'),
(8, 'yz201', '2017022696767', 'insert', '2017-02-26 01:34:30'),
(9, 'yz201', '2017022696767', 'update', '2017-02-26 01:34:39'),
(10, 'yz201', '2017022696767', 'delete', '2017-02-26 01:34:45'),
(11, 'yz201', '2017022696767', 'insert', '2017-02-26 01:35:04'),
(12, 'yz201', '2017022696767', 'update', '2017-02-26 01:35:11'),
(13, 'yz201', '2017022696878', 'insert', '2017-02-26 01:57:04'),
(14, 'yz201', '2017022696878', 'update', '2017-02-26 01:58:05'),
(15, 'yz201', '2017022696878', 'update', '2017-02-26 02:02:43'),
(16, 'yz201', '2017022696878', 'update', '2017-02-26 02:02:57'),
(17, 'yz201', '2017022696767', 'update', '2017-02-26 02:03:13'),
(18, 'yz201', '2017022696767', 'update', '2017-02-26 02:03:29'),
(19, 'yz201', '2017022696767', 'update', '2017-02-26 02:03:37'),
(20, 'yz201', '2017022696767', 'update', '2017-02-26 02:03:43'),
(21, 'yz201', '2017022696876', 'insert', '2017-02-26 02:04:12'),
(22, 'yz201', '2017022696876', 'update', '2017-02-26 02:04:22'),
(23, 'yz201', '2017022696872', 'insert', '2017-02-26 02:05:21'),
(24, 'yz201', '2017022696872', 'update', '2017-02-26 02:05:33'),
(25, 'yz201', '2017022696872', 'update', '2017-02-26 02:07:23'),
(26, 'yz201', '2017022696769', 'insert', '2017-02-26 02:09:12'),
(27, 'yz201', '2017022696769', 'update', '2017-02-26 02:09:29'),
(28, 'yz201', '2017022696775', 'insert', '2017-02-26 02:10:42'),
(29, 'yz201', '2017022696775', 'update', '2017-02-26 02:10:48'),
(30, 'yz201', '2017022696873', 'insert', '2017-02-26 10:16:07'),
(31, 'yz201', '2017022696876', 'delete', '2017-02-26 10:19:03'),
(32, 'yz201', '2017022696876', 'insert', '2017-02-26 10:19:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `096_4`
--
ALTER TABLE `096_4`
  ADD PRIMARY KEY (`log_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `096_4`
--
ALTER TABLE `096_4`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
