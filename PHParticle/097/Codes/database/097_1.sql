-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-14 14:17:14
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
-- 表的结构 `097_1`
--

CREATE TABLE `097_1` (
  `book_id` int(10) NOT NULL,
  `book_sort` varchar(100) NOT NULL,
  `book_talk` varchar(100) NOT NULL,
  `book_books` varchar(100) NOT NULL,
  `book_synopsis` varchar(100) NOT NULL,
  `book_catalog` varchar(100) NOT NULL,
  `book_bookpath` varchar(100) NOT NULL,
  `book_programpath` varchar(100) NOT NULL,
  `book_videopath` varchar(100) NOT NULL,
  `book_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `097_1`
--

INSERT INTO `097_1` (`book_id`, `book_sort`, `book_talk`, `book_books`, `book_synopsis`, `book_catalog`, `book_bookpath`, `book_programpath`, `book_videopath`, `book_date`) VALUES
(1, '实例类', 'PHP', 'PHP项目案例分析', 'PHP项目案例分析', '', './data/', './data/', './data/', '2017-02-01'),
(2, '实例类', 'PHP', 'PHP实用教程', '《PHP实用教程》是一本PHP入门书籍。', '第一章 PHP环境搭建\r\n第二章 基础语法\r\n第三章 时间和日期\r\n第四章 数组', './data/', './data/', './data/', '2017-02-14'),
(3, '实例类', 'PHP', 'PHP典型模块开发全程实录', '《PHP典型模块开发全程实录》以完成小型项目为目的，让学生切身感受到软件开发给工作带来实实在在的用处和方便。', '第1章 注册登录模块\r\n第2章 网页计数器模块\r\n第3章 上传与下载模块\r\n第4章 在线支付模块', './data/', './data/', './data/', '2017-02-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `097_1`
--
ALTER TABLE `097_1`
  ADD PRIMARY KEY (`book_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `097_1`
--
ALTER TABLE `097_1`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
