-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-14 14:17:51
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
-- 表的结构 `097_4`
--

CREATE TABLE `097_4` (
  `login_id` int(10) NOT NULL,
  `login_user` varchar(40) NOT NULL,
  `login_pwd` varchar(40) NOT NULL,
  `login_position` varchar(40) DEFAULT NULL,
  `login_name` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `097_4`
--

INSERT INTO `097_4` (`login_id`, `login_user`, `login_pwd`, `login_position`, `login_name`) VALUES
(1, 'mico', 'fangaoxue', '馆长', '方傲雪');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `097_4`
--
ALTER TABLE `097_4`
  ADD PRIMARY KEY (`login_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `097_4`
--
ALTER TABLE `097_4`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
