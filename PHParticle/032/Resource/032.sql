-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 08:52:24
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
-- 表的结构 `032`
--

CREATE TABLE `032` (
  `uid` varchar(50) NOT NULL,
  `uname` char(20) NOT NULL,
  `usex` tinyint(1) NOT NULL DEFAULT '1',
  `ubir` date DEFAULT NULL,
  `uclass` varchar(50) DEFAULT NULL,
  `upwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `032`
--

INSERT INTO `032` (`uid`, `uname`, `usex`, `ubir`, `uclass`, `upwd`) VALUES
('2014181163', '陈梦梦', 0, '1995-10-05', '信息管理与信息系统二班', '123456'),
('2013181163', '欧阳一鸣', 1, '1993-06-25', '计算机科学与技术', '123'),
('2012181163', '李保', 1, '1995-02-10', '针灸推拿', '123'),
('2012181160', '孙建豪', 1, '1994-09-20', '中药制药', '2233'),
('2013181200', '杨林', 0, '1993-08-25', '护理二班', '3434'),
('2000161161', '小米', 1, '1990-05-06', '2000级计算机科学与技术本科班', '123'),
('2007181163', '杨博', 1, '1986-05-06', '2007级计算机科学与技术本科班', '123'),
('2018171162', '长孙那', 0, '1995-05-06', '2000级计算机科学与技术本科班', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `032`
--
ALTER TABLE `032`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
