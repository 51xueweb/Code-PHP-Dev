-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-13 12:48:23
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
-- 表的结构 `095_6`
--

CREATE TABLE `095_6` (
  `ktinfo_id` int(11) NOT NULL,
  `ktinfo_lb` varchar(30) NOT NULL,
  `ktinfo_cont` text NOT NULL,
  `ktinfo_a` varchar(200) NOT NULL,
  `ktinfo_b` varchar(200) NOT NULL,
  `ktinfo_c` varchar(200) NOT NULL,
  `ktinfo_d` varchar(200) NOT NULL,
  `ktinfo_answer` char(10) NOT NULL,
  `ktinfo_belong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `095_6`
--

INSERT INTO `095_6` (`ktinfo_id`, `ktinfo_lb`, `ktinfo_cont`, `ktinfo_a`, `ktinfo_b`, `ktinfo_c`, `ktinfo_d`, `ktinfo_answer`, `ktinfo_belong`) VALUES
(1, '1', 'PHP是一种弱类型的语言吗？', 'A.是', 'B.不是', 'C.不清楚', 'D.有时候是有时候不是', 'A', 1),
(2, '1', 'PHP的数据传输协议是什么？', 'A.HTTP', 'B.FTP', 'C.UDP', 'D.TCP', 'A', 1),
(18, '1', '使用CSS对文本进行修饰，若使文本闪烁，text-decoration的取值为', 'A.none   ', 'B.underline ', 'C.overline ', 'D.blink', 'D', 1),
(17, '1', 'JavaScript脚本语言的前身是？', 'A.Basic', 'B.Live Script', 'C.Oak', 'D.VBScript', 'B', 1),
(19, '1', 'XML基于的标准是?', 'A.HTML', 'B.MIME ', ' C.SGML', 'D.CGI', 'C', 1),
(20, '1', '标记符title是放在标记符什么之间的?', 'A.html与html     ', 'B.head与head    ', 'C.body与body   ', 'D.head与body', 'B', 1),
(21, '1', 'mysql_ping()函数的作用以及返回值的类型正确的是：', 'A. 检查数据库系统的状态，返回整型数值', 'B. 检查数据库系统的状态，返回值为布尔型', 'C. 检查到服务器的连接是否正常，返回整型数值', 'D. 检查到服务器的连接是否正常，返回值为布尔型', 'D', 1),
(22, '1', 'mysql_data_seek(查询结果指针，资料录位置)函数中，资料记录位置的值是从多少开始的？', 'A. 1', 'B. 2', 'C. 3', 'D. 0', 'D', 1),
(23, '1', '取得搜索语句的结果集中的记录总数的函数是：', 'A. mysql_fetch_row', 'B. mysql_rowid', 'C. mysql_num_rows', 'D. mysql_fetch_array', 'C', 1),
(24, '1', 'mysql_affected_rows()对哪个操作没有影响？', 'A. select', 'B. delete', 'C. update', 'D. insert ', 'A', 1),
(25, '3', '在C#程序中，如果类B要继承类A，类B正确的定义为：', 'A.public class B inherit A', 'B.public class B:A', 'C.public classB::A', 'D.public class B form A', 'B', 1),
(26, '4', '﻿测试1', 'A.a', 'A.a', 'A.a', 'A.a', 'A', 1),
(27, '4', '测试2', 'A.a', 'A.a', 'A.a', 'A.a', 'A', 1),
(28, '2', '﻿下面关于变量及其作用范围的陈述哪个是不对的?', 'A.实例变量是类的成员变量', 'B.实例变量用关键字static明', 'C.在方法中定义的局部变量在该方法被执行时创建', 'D.局部变量在使用前必须被初始化', 'B', 1),
(29, '2', '下列叙述中，正确的是()', 'A.Java语言的标识符是区分大小写的?', 'B.源文件名与public类名可以不相同', 'C.源文件扩展名为.jar?', 'D.源文件中public类的数目不限定义', 'A', 1),
(30, '2', '定义命名常量LENGTH，值为100的合理语句为()', 'A. public int LENGTH=100?', 'B. final int LENGTH=100?', 'C. public static int LENGTH=100?', 'D. static? final int LENGTH=100', 'D', 1),
(31, '2', '无需在程序中import就可以直接使用简单类名的类，属于包（）', 'A.java.applet?', 'B.java.awt?', 'C.java.util?', 'D.java.lang', 'D', 1),
(32, '2', '哪个Man描述了“Man has a best friend who is a Dog”这个关系?()', 'A. class Man extends Dog { }', 'B. class Man implements Dog { }', 'C. class Man { private BestFriend dog; }', 'D. class Man { private Dog bestFriend; }', 'D', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `095_6`
--
ALTER TABLE `095_6`
  ADD PRIMARY KEY (`ktinfo_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `095_6`
--
ALTER TABLE `095_6`
  MODIFY `ktinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
