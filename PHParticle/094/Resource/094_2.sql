-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-23 11:47:58
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
-- 表的结构 `094_2`
--

CREATE TABLE `094_2` (
  `vote_id` int(11) NOT NULL,
  `vote_name` varchar(200) NOT NULL,
  `vote_starttime` varchar(50) NOT NULL,
  `vote_endtime` varchar(50) NOT NULL,
  `vote_user_name` varchar(50) NOT NULL,
  `vote_intro` varchar(200) NOT NULL DEFAULT '这是一个有意义的投票！',
  `vote_v1` varchar(120) NOT NULL,
  `vote_v2` varchar(120) NOT NULL,
  `vote_v3` varchar(120) NOT NULL,
  `vote_v4` varchar(120) NOT NULL,
  `vote_open` int(2) NOT NULL DEFAULT '1',
  `vote_more` int(2) NOT NULL DEFAULT '0',
  `vote_pic` varchar(100) NOT NULL DEFAULT 'vote.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `094_2`
--

INSERT INTO `094_2` (`vote_id`, `vote_name`, `vote_starttime`, `vote_endtime`, `vote_user_name`, `vote_intro`, `vote_v1`, `vote_v2`, `vote_v3`, `vote_v4`, `vote_open`, `vote_more`, `vote_pic`) VALUES
(1, '你最喜欢的编程语言是什么？', '2017-02-23', '2019-11-01', 'lili', '统计最受欢迎的编程语言。', 'PHP', 'JSP', '', '', 1, 1, 'vote.jpg'),
(2, '你喜欢吃的月饼是什么馅的？', '2017-02-23', '2017-11-01', 'lili', '调查大众喜欢的月饼口味。', '伍仁', '哈密瓜', '', '水蜜桃', 1, 0, 'vote.jpg'),
(3, '你喜欢使用台式机还是笔记本？', '2017-02-23', '2019-11-01', 'lili', '调查台式机和笔记本的使用范围。', '台式机', '笔记本', '', '', 1, 1, '201702231015439739.jpg'),
(4, '支持本科生考研还是直接就业？', '2017-02-23', '2019-08-01', 'lili', '调查大家对本科生考研和就业的看法。', '考研', '直接就业', '', '', 1, 0, '201702231026205743.jpeg'),
(8, '你喜欢使用台式机还是笔记本？', '2017-02-23', '2019-11-01', 'lili', '调查台式机和笔记本的使用范围。', '台式机', '笔记本', '', '', 1, 1, '201702231028163709.jpg'),
(11, '测试', '2017-02-23', '2017-04-01', 'lili', '', '2', '3', '', '', 1, 0, 'vote.jpg'),
(12, '你经常戴隐形眼镜吗？', '2017-02-23', '2018-06-01', 'lili', '调查大众对隐形眼镜的使用率。', '是', '否', '', '', 1, 0, '201702231008461329.jpg'),
(13, '你们学校男生多还是女生多？', '2017-02-23', '2020-10-16', 'lili', '统计高校的男女比重。', '男生', '女生', '', '相等', 1, 0, '201702231942227227.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `094_2`
--
ALTER TABLE `094_2`
  ADD PRIMARY KEY (`vote_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `094_2`
--
ALTER TABLE `094_2`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
