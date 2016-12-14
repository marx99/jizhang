-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 年 12 月 14 日 13:39
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `jizhang`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `detail`
-- 

CREATE TABLE `detail` (
  `date` varchar(8) NOT NULL,
  `shouzhi` varchar(1) NOT NULL,
  `fenlei` varchar(3) NOT NULL,
  `num` int(9) NOT NULL,
  `mark` varchar(100) default NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `detail`
-- 

INSERT INTO `detail` VALUES ('20160129', '2', '1', 9000, '', '2016-12-14 21:10:16');
INSERT INTO `detail` VALUES ('20160129', '2', '2', 1000, '', '2016-12-14 21:10:16');
INSERT INTO `detail` VALUES ('20160129', '3', '3', 2800, '', '2016-12-14 21:10:16');
INSERT INTO `detail` VALUES ('20160129', '3', '4', 4000, 'Aguzai', '2016-12-14 21:10:16');
INSERT INTO `detail` VALUES ('20160129', '3', '4', 6000, 'USO', '2016-12-14 21:10:16');
INSERT INTO `detail` VALUES ('20160208', '2', '1', 8600, '', '2016-12-14 21:11:23');
INSERT INTO `detail` VALUES ('20160208', '2', '4', 3800, '', '2016-12-14 21:11:23');
INSERT INTO `detail` VALUES ('20160310', '2', '1', 9300, '', '2016-12-14 21:12:21');
INSERT INTO `detail` VALUES ('20160310', '3', '1', 899, 'kuandai', '2016-12-14 21:12:21');
INSERT INTO `detail` VALUES ('20160910', '2', '1', 9500, '', '2016-12-14 21:29:08');
INSERT INTO `detail` VALUES ('20160910', '2', '3', 20000, '', '2016-12-14 21:29:08');
INSERT INTO `detail` VALUES ('20160910', '3', '1', 2300, 'shouji', '2016-12-14 21:29:08');
INSERT INTO `detail` VALUES ('20161010', '2', '1', 9500, '', '2016-12-14 21:31:14');
INSERT INTO `detail` VALUES ('20161010', '3', '1', 2360, 'qunuan fei', '2016-12-14 21:31:14');

-- --------------------------------------------------------

-- 
-- 表的结构 `jieyu`
-- 

CREATE TABLE `jieyu` (
  `date` varchar(8) NOT NULL,
  `account` int(3) NOT NULL,
  `jieyu` int(9) NOT NULL,
  `mark` varchar(100) default NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`date`,`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `jieyu`
-- 

INSERT INTO `jieyu` VALUES ('20160129', 1, 438, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 2, 200, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 3, 27, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 4, 114934, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 5, 4000, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 6, 2000, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160129', 7, 34297, '', '2016-12-14 21:10:16');
INSERT INTO `jieyu` VALUES ('20160208', 1, 1800, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 2, 1000, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 3, 100, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 4, 114934, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 5, 12500, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 6, 2000, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160208', 7, 34297, '', '2016-12-14 21:11:23');
INSERT INTO `jieyu` VALUES ('20160310', 1, 190, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 2, 900, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 3, 100, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 4, 54000, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 5, 72500, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 6, 2000, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160310', 7, 44492, '', '2016-12-14 21:12:21');
INSERT INTO `jieyu` VALUES ('20160410', 2, 350, '', '2016-12-14 21:13:52');
INSERT INTO `jieyu` VALUES ('20160410', 4, 51793, '', '2016-12-14 21:13:52');
INSERT INTO `jieyu` VALUES ('20160410', 5, 81900, '', '2016-12-14 21:13:52');
INSERT INTO `jieyu` VALUES ('20160410', 6, 1500, '', '2016-12-14 21:13:52');
INSERT INTO `jieyu` VALUES ('20160410', 7, 45492, '', '2016-12-14 21:13:52');
INSERT INTO `jieyu` VALUES ('20160510', 2, 350, '', '2016-12-14 21:15:51');
INSERT INTO `jieyu` VALUES ('20160510', 4, 51793, '', '2016-12-14 21:15:51');
INSERT INTO `jieyu` VALUES ('20160510', 5, 89000, '', '2016-12-14 21:15:51');
INSERT INTO `jieyu` VALUES ('20160510', 6, 1500, '', '2016-12-14 21:15:51');
INSERT INTO `jieyu` VALUES ('20160510', 7, 46000, '', '2016-12-14 21:15:51');
INSERT INTO `jieyu` VALUES ('20160610', 2, 350, '', '2016-12-14 21:16:35');
INSERT INTO `jieyu` VALUES ('20160610', 4, 51793, '', '2016-12-14 21:16:35');
INSERT INTO `jieyu` VALUES ('20160610', 5, 97183, '', '2016-12-14 21:16:35');
INSERT INTO `jieyu` VALUES ('20160610', 6, 1500, '', '2016-12-14 21:16:35');
INSERT INTO `jieyu` VALUES ('20160610', 7, 46000, '', '2016-12-14 21:16:35');
INSERT INTO `jieyu` VALUES ('20160710', 2, 350, '', '2016-12-14 21:17:08');
INSERT INTO `jieyu` VALUES ('20160710', 4, 51793, '', '2016-12-14 21:17:08');
INSERT INTO `jieyu` VALUES ('20160710', 5, 4400, '', '2016-12-14 21:17:08');
INSERT INTO `jieyu` VALUES ('20160710', 6, 1500, '', '2016-12-14 21:17:08');
INSERT INTO `jieyu` VALUES ('20160710', 7, 146000, '', '2016-12-14 21:17:08');
INSERT INTO `jieyu` VALUES ('20160810', 1, 19000, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160810', 2, 350, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160810', 4, 51793, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160810', 5, 97183, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160810', 6, 1500, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160810', 7, 46000, '', '2016-12-14 21:18:55');
INSERT INTO `jieyu` VALUES ('20160910', 2, 350, '', '2016-12-14 21:29:08');
INSERT INTO `jieyu` VALUES ('20160910', 4, 51793, '', '2016-12-14 21:29:08');
INSERT INTO `jieyu` VALUES ('20160910', 5, 18809, '', '2016-12-14 21:29:08');
INSERT INTO `jieyu` VALUES ('20160910', 6, 500, '', '2016-12-14 21:29:08');
INSERT INTO `jieyu` VALUES ('20160910', 7, 172900, '', '2016-12-14 21:29:08');
INSERT INTO `jieyu` VALUES ('20161010', 1, 9873, '', '2016-12-14 21:31:14');
INSERT INTO `jieyu` VALUES ('20161010', 2, 350, '', '2016-12-14 21:31:14');
INSERT INTO `jieyu` VALUES ('20161010', 4, 51793, '', '2016-12-14 21:31:14');
INSERT INTO `jieyu` VALUES ('20161010', 5, 11809, '', '2016-12-14 21:31:14');
INSERT INTO `jieyu` VALUES ('20161010', 6, 1500, '', '2016-12-14 21:31:14');
INSERT INTO `jieyu` VALUES ('20161010', 7, 172900, '', '2016-12-14 21:31:14');

-- --------------------------------------------------------

-- 
-- 表的结构 `master`
-- 

CREATE TABLE `master` (
  `item_id` int(3) NOT NULL,
  `item_no` int(3) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `status` varchar(1) default NULL,
  PRIMARY KEY  (`item_id`,`item_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `master`
-- 

INSERT INTO `master` VALUES (3, 4, 'stock', '');
INSERT INTO `master` VALUES (3, 3, 'baobao', '');
INSERT INTO `master` VALUES (3, 2, 'fangdai', '');
INSERT INTO `master` VALUES (3, 1, 'life', '');
INSERT INTO `master` VALUES (2, 5, 'other', '');
INSERT INTO `master` VALUES (2, 4, 'jiangjin', '');
INSERT INTO `master` VALUES (2, 3, 'mama', '');
INSERT INTO `master` VALUES (2, 2, 'taobaoke', '');
INSERT INTO `master` VALUES (2, 1, 'gongzi', '');
INSERT INTO `master` VALUES (1, 7, 'stock', '');
INSERT INTO `master` VALUES (1, 6, 'money', '');
INSERT INTO `master` VALUES (1, 5, 'alipay', '');
INSERT INTO `master` VALUES (1, 4, 'zhao bank', '');
INSERT INTO `master` VALUES (1, 3, 'pufa bank', '');
INSERT INTO `master` VALUES (1, 2, 'gongshang bank', '');
INSERT INTO `master` VALUES (1, 1, 'china bank', '');
INSERT INTO `master` VALUES (3, 5, 'dianzi', '');
INSERT INTO `master` VALUES (3, 6, 'other', '');
