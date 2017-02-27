-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-13 12:47:30
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
-- 表的结构 `095_2`
--

CREATE TABLE `095_2` (
  `teacher_id` char(20) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `teacher_sex` char(4) NOT NULL,
  `teacher_pwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `095_2`
--

INSERT INTO `095_2` (`teacher_id`, `teacher_name`, `teacher_sex`, `teacher_pwd`) VALUES
('2017001', '徐熙彤', '女', 'tea001'),
('2017002', '李想', '男', '2122ww'),
('2017003', '张小春', '男', 'xsxs22'),
('2017004', '刘卡', '男', '21213'),
('2017005', '许青青', '女', '24555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `095_2`
--
ALTER TABLE `095_2`
  ADD PRIMARY KEY (`teacher_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
