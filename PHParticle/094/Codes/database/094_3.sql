-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-23 11:48:12
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
-- 表的结构 `094_3`
--

CREATE TABLE `094_3` (
  `uvote_id` int(11) NOT NULL,
  `uvote_user_name` varchar(50) NOT NULL,
  `uvote_vote_id` int(11) NOT NULL,
  `uvote_vote_content` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `094_3`
--

INSERT INTO `094_3` (`uvote_id`, `uvote_user_name`, `uvote_vote_id`, `uvote_vote_content`) VALUES
(4, 'lili', 8, '笔记本'),
(2, 'lili', 1, 'ASP'),
(3, 'lili', 2, '哈密瓜'),
(5, 'lili', 12, '否'),
(7, 'lili', 4, '直接就业'),
(8, 'lili', 13, '女生');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `094_3`
--
ALTER TABLE `094_3`
  ADD PRIMARY KEY (`uvote_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `094_3`
--
ALTER TABLE `094_3`
  MODIFY `uvote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
