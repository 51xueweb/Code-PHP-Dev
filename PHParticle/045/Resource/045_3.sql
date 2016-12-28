-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 09:20:02
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
-- 表的结构 `045_3`
--

CREATE TABLE `045_3` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_address` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `045_3`
--

INSERT INTO `045_3` (`room_id`, `room_name`, `room_address`) VALUES
(1, 'A505', 'A区五楼505'),
(2, 'A709', 'A区七楼709'),
(3, 'A649', 'A区六楼649'),
(4, 'A334', 'A区三楼334'),
(5, 'A337', 'A区三楼337'),
(6, 'A713', 'A区三楼713'),
(7, 'A705', 'A区七楼705'),
(8, 'A534', 'A区五楼534'),
(9, 'A701', 'A区七楼701'),
(10, 'A723', 'A区五楼723'),
(11, 'BM522', 'B区五楼522'),
(12, 'BM524', 'B区五楼524'),
(15, 'A721', 'A区七楼721'),
(16, 'A504', 'A区五楼504'),
(17, 'A308', 'A区三楼308'),
(18, 'A708', 'A区七楼708'),
(19, 'A528', 'A区五楼528'),
(20, 'A608', 'A区六楼608'),
(21, 'A524', 'A区五楼524'),
(22, 'A434', 'A区四楼434'),
(23, 'A605', 'A区六楼605'),
(24, '第五语音室', 'B区五楼第五语音室'),
(25, '软件一', 'B区五楼软件一'),
(27, 'BN508', 'B区BN508'),
(129, 'A201', 'A区201'),
(29, 'A202', 'A区202'),
(30, 'A203', 'A区203'),
(31, 'A203', 'A区204'),
(32, 'A205', 'A区205'),
(33, 'A206', 'A区206'),
(34, 'A207', 'A区207'),
(35, 'A208', 'A区208'),
(36, 'A209', 'A区209');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `045_3`
--
ALTER TABLE `045_3`
  ADD PRIMARY KEY (`room_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `045_3`
--
ALTER TABLE `045_3`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
