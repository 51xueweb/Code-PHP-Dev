/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : webchat

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2013-07-27 23:05:27
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `friend`
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(32) NOT NULL,
  `f_nickname` varchar(32) NOT NULL,
  `zt` tinyint(1) NOT NULL DEFAULT '0',
  `fzt` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('19', '小熊', '长颈鹿', '0', '1');
INSERT INTO `friend` VALUES ('20', '长颈鹿', '小熊', '0', '1');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(32) NOT NULL,
  `geter` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `stime` datetime NOT NULL,
  `mloop` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '小熊', '长颈鹿', 'dsd', '2013-07-27 22:27:51', '1');
INSERT INTO `message` VALUES ('2', '长颈鹿', '小熊', 'fsd', '2013-07-27 22:28:04', '1');
INSERT INTO `message` VALUES ('3', '小熊', '长颈鹿', 'sd', '2013-07-27 22:28:07', '1');
INSERT INTO `message` VALUES ('4', '小熊', '长颈鹿', '多睡', '2013-07-27 22:29:00', '1');
INSERT INTO `message` VALUES ('5', '小熊', '长颈鹿', '归属地', '2013-07-27 22:29:04', '1');
INSERT INTO `message` VALUES ('6', '小熊', '长颈鹿', '长颈鹿先生，你在干嘛', '2013-07-27 22:38:58', '1');
INSERT INTO `message` VALUES ('7', '长颈鹿', '小熊', '我在看代码。。', '2013-07-27 22:39:16', '1');
INSERT INTO `message` VALUES ('8', '小熊', '长颈鹿', '长颈鹿先生，您在干嘛？', '2013-07-27 22:42:55', '1');
INSERT INTO `message` VALUES ('9', '长颈鹿', '小熊', '我在看博客，http://www.daixiaorui.com 里面的文章还不错！！有时间可以去看看哦', '2013-07-27 22:45:23', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `sex` varchar(2) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `reg_time` datetime NOT NULL,
  `question` varchar(32) DEFAULT NULL,
  `answer` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '小熊', '21232f297a57a5a743894a0e4a801fc3', '', '男', '1', '2012-01-01', '2013-07-27 21:42:10', '', '');
INSERT INTO `user` VALUES ('2', '长颈鹿', '21232f297a57a5a743894a0e4a801fc3', '', '男', '1', '2012-01-01', '2013-07-27 22:17:12', '', '');
