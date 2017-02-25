-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-21 09:55:37
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
-- 表的结构 `099_2`
--

CREATE TABLE `099_2` (
  `goods_id` int(11) NOT NULL,
  `goods_name` varchar(64) NOT NULL,
  `goods_price` double(6,2) NOT NULL,
  `goods_total` int(10) NOT NULL,
  `goods_pic` varchar(32) NOT NULL,
  `goods_note` text NOT NULL,
  `goods_addtime` varchar(50) NOT NULL,
  `goods_tuijian` int(10) NOT NULL,
  `goods_belong` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `099_2`
--

INSERT INTO `099_2` (`goods_id`, `goods_name`, `goods_price`, `goods_total`, `goods_pic`, `goods_note`, `goods_addtime`, `goods_tuijian`, `goods_belong`) VALUES
(1, '联想xm90笔记本', 4300.00, 239, '01.jpg', '联想xm90笔记本内核4个，运行内存4G。', '2017-2-20', 1, '数码产品'),
(2, '小米bright音响', 399.00, 113, '02.jpg', '小米bright音响是小米公司旗下音质最好的音响产品。', '2017-2-20', 1, '数码产品'),
(3, '华为x5手机', 1299.00, 98, '03.jpg', '华为x5手机运行内存4G，前后摄像头像素均为1600w。', '2017-2-20', 1, '数码产品'),
(4, '小米bz2耳机', 299.00, 299, '04.jpg', '小米bz2耳机外观为时尚的银色，而且以舒适著称。', '2017-2-20', 1, '数码产品'),
(5, '戴尔xs98台式一体机', 7899.00, 4016, '05.jpg', '戴尔xs98台式一体机是一款高端定制的计算机，配有独立显卡，防辐射的显示屏。', '2017-2-21', 0, '数码产品'),
(6, '飞傲X5III', 2498.00, 4355, '06.jpg', '飞傲（FiiO）X5三代是一款便携无损音乐播放器。', '2017-2-21', 1, '数码产品'),
(7, '华硕RT-AC5300', 1998.00, 768, '07.jpg', '华硕（ASUS）RT-AC5300 5300M AC，三频千兆，低辐射，智能无线路由器。', '2017-2-21', 1, '数码产品'),
(8, '徕卡（Leica）莱卡 拍立', 2699.00, 3251, '08.jpg', '徕卡（Leica）莱卡，拍立得，SOFORT，自拍B门，自拍延时。', '2017-2-21', 1, '数码产品'),
(9, '花花公子 卫衣男', 99.00, 29, '09.jpg', '花花公子 卫衣男 2017春装新款加厚运动休闲套装潮人卫衣 T999黑色丨春款', '2017-2-21', 0, '服装'),
(10, 'M2monlie卫衣男', 79.00, 274, '10.jpg', 'M2monlie卫衣男2017春季新款 男士潮人卫衣情侣装衣服外套男 加厚加绒卫衣男装 灰色', '2017-2-21', 0, '服装'),
(12, '登宝时 牛仔裤', 138.00, 467, '11.jpg', '登宝时 牛仔裤男新款黑色破洞休闲裤子韩版小脚修身弹力纯色长裤', '2017-02-21', 0, '服装');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `099_2`
--
ALTER TABLE `099_2`
  ADD PRIMARY KEY (`goods_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `099_2`
--
ALTER TABLE `099_2`
  MODIFY `goods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
