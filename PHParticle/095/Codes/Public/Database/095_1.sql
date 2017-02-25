-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-13 12:47:11
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
-- 表的结构 `095_1`
--

CREATE TABLE `095_1` (
  `stu_id` char(20) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_sex` char(4) NOT NULL,
  `stu_pwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `095_1`
--

INSERT INTO `095_1` (`stu_id`, `stu_name`, `stu_sex`, `stu_pwd`) VALUES
('2014181001', '张三三', '男', '12345'),
('2014181002', '方源', '男', '12345'),
('', '方朵朵', '女', '2131'),
('2014181003', '方朵朵', '女', '2131'),
('2014181004', '金琴琴', '女', 'wwq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `095_1`
--
ALTER TABLE `095_1`
  ADD PRIMARY KEY (`stu_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
