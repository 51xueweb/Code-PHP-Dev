-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 07:39:03
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
-- 表的结构 `002`
--

CREATE TABLE `002` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `002`
--

INSERT INTO `002` (`id`, `username`, `age`, `password`) VALUES
(1, 'sam', 21, ''),
(2, 'Tom', 20, ''),
(3, 'Lucky', 19, ''),
(4, 'Elaine', 20, ''),
(5, 'aa', 12, '123'),
(6, 'bb', 14, '1233'),
(7, 'cmm', 20, '123345'),
(8, 'vcc23', 23, 'cfc'),
(0, 'mino', 0, '2323'),
(0, 'huko', 0, '123456789'),
(0, 'xiaomi', 0, '222222'),
(0, 'eee', 0, '22211'),
(0, 'rtui', 0, '345'),
(0, 'vila', 0, '123456'),
(0, 'king', 0, '1313'),
(0, 'benben', 0, 'benben'),
(0, 'spring', 0, '123456'),
(2014, 'zs', 20, 'chjcjd'),
(2014, '张三', 20, 'chjcjd'),
(9, '里斯', 23, '2we'),
(12, '王武', 23, 'wert'),
(0, 'mico', 0, '123'),
(0, 'cmm', 0, '123455'),
(0, 'qq', 0, '123'),
(0, 'ws', 0, '12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
