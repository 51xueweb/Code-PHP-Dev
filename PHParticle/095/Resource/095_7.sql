-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-13 12:48:55
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
-- 表的结构 `095_7`
--

CREATE TABLE `095_7` (
  `score_id` int(11) NOT NULL,
  `score_stu` int(11) NOT NULL,
  `score_lb` varchar(50) NOT NULL,
  `score_belong` int(11) NOT NULL,
  `score_score` int(10) NOT NULL,
  `score_time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `095_7`
--

INSERT INTO `095_7` (`score_id`, `score_stu`, `score_lb`, `score_belong`, `score_score`, `score_time`) VALUES
(1, 2014181001, '1', 1, 100, '2017-02-11 01:30:59'),
(2, 2014181002, '1', 1, 100, '2017-02-11 15:12:50'),
(11, 2014181001, '1', 1, 100, '2017-02-13 05:44:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `095_7`
--
ALTER TABLE `095_7`
  ADD PRIMARY KEY (`score_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `095_7`
--
ALTER TABLE `095_7`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
