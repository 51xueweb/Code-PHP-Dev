-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-26 02:21:10
-- 服务器版本： 5.7.16
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpDemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `096_1`
--

CREATE TABLE `096_1` (
  `admin_id` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `096_1`
--

INSERT INTO `096_1` (`admin_id`, `admin_pwd`) VALUES
('yz201', '87422'),
('mico', '87syudy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `096_1`
--
ALTER TABLE `096_1`
  ADD PRIMARY KEY (`admin_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
