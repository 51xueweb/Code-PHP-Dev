-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-26 02:20:58
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
-- 表的结构 `096_2`
--

CREATE TABLE `096_2` (
  `member_id` char(20) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `member_tel` varchar(30) NOT NULL,
  `member_sum` double(11,2) NOT NULL,
  `member_score` int(11) NOT NULL,
  `member_level` varchar(30) NOT NULL,
  `member_enable` int(10) NOT NULL,
  `member_loss_time` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `096_2`
--

INSERT INTO `096_2` (`member_id`, `member_name`, `member_tel`, `member_sum`, `member_score`, `member_level`, `member_enable`, `member_loss_time`) VALUES
('2017022596789', '方圆', '13014696789', 25436.00, 2543, '钻石VIP会员卡', 0, NULL),
('2017022696767', '张三', '15814696767', 22432.00, 2243, '钻石VIP会员卡', 0, NULL),
('2017022696878', '杨博', '13914696878', 465475.00, 46547, '钻石VIP会员卡', 0, '20170226'),
('2017022696876', '小溪', '13915696876', 0.00, 0, '普通VIP会员卡', 1, NULL),
('2017022696872', '万古', '13915696872', 39879.01, 3987, '钻石VIP会员卡', 1, NULL),
('2017022696769', '王倩', '15845696769', 20002.00, 2000, '钻石VIP会员卡', 1, NULL),
('2017022696775', '徐依依', '15814696775', 211.00, 21, '普通VIP会员卡', 1, NULL),
('2017022696873', '王萌萌', '13915696873', 0.00, 0, '普通VIP会员卡', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `096_2`
--
ALTER TABLE `096_2`
  ADD PRIMARY KEY (`member_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
