-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 21 日 16:24
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pj`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL auto_increment,
  `class_name` char(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `class_num` char(6) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `class`
--

INSERT INTO `class` (`id`, `class_name`, `class_num`) VALUES
(3, '一（1）班', '101'),
(4, '一（2）班', '102');

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL auto_increment,
  `number` char(11) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` char(16) character set utf8 collate utf8_unicode_ci NOT NULL,
  `class_num` char(6) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`number`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `students`
--

INSERT INTO `students` (`id`, `number`, `name`, `class_num`) VALUES
(1, '333333', '张三', '101'),
(4, '444444', '444444', '102'),
(6, '9604', '123456', '101');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL auto_increment,
  `teacher` varchar(11) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `teacher`) VALUES
(1, '语文'),
(2, '数学'),
(5, '英语'),
(6, '物理');

-- --------------------------------------------------------

--
-- 表的结构 `xh_config`
--

CREATE TABLE IF NOT EXISTS `xh_config` (
  `username` varchar(100) NOT NULL COMMENT '管理员名字',
  `password` varchar(100) NOT NULL COMMENT '管理员密码',
  `webname` varchar(100) NOT NULL,
  `weburl` varchar(100) default NULL,
  `systemurl` varchar(100) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置表';

--
-- 导出表中的数据 `xh_config`
--

INSERT INTO `xh_config` (`username`, `password`, `webname`, `weburl`, `systemurl`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '赛腾网络', 'http://www.168oo.com', 'http://127.0.0.1/');

-- --------------------------------------------------------

--
-- 表的结构 `xh_question`
--

CREATE TABLE IF NOT EXISTS `xh_question` (
  `id` int(11) NOT NULL auto_increment,
  `question` varchar(100) NOT NULL,
  `option` varchar(100) NOT NULL,
  `linkurl` varchar(200) default NULL,
  `tid` int(11) NOT NULL,
  `ps` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=294 ;

--
-- 导出表中的数据 `xh_question`
--

INSERT INTO `xh_question` (`id`, `question`, `option`, `linkurl`, `tid`, `ps`) VALUES
(233, 'A、上课时充满激情。', 'A', '', 30, 10),
(234, 'B、有热情。', '', '', 30, 8),
(235, 'C、上课时没有激情。', '', '', 30, 7),
(236, 'A、准备充分，思路清晰', 'A', '', 31, 1),
(237, 'B、有时准备不充分 ', '', '', 31, 4),
(238, 'C、准备不充分', '', '', 31, 0),
(239, 'A、能平等对待每一个学生，关心、爱护学生。', '', '', 32, 4),
(240, 'B、对学生比较关心。', '', '', 32, 4),
(241, 'C、不关心学生，挖苦学生。', '', '', 32, 0),
(242, 'A、很注意', '', '', 33, 4),
(243, 'B、一般', '', '', 33, 1),
(244, 'C、很少', '', '', 33, 0),
(245, 'A、是  ', '', '', 34, 0),
(246, 'B、一般 ', '', '', 34, 1),
(247, 'C、不喜欢', '', '', 34, 0),
(248, 'A、好   ', '', '', 35, 0),
(249, ' B、一般', '', '', 35, 0),
(250, 'C、不好', '', '', 35, 0),
(251, 'A、没有', '', '', 36, 0),
(252, 'B、偶尔', '', '', 36, 0),
(253, 'C、经常', '', '', 36, 0),
(254, 'A、没有', '', '', 37, 0),
(255, 'B、偶尔', '', '', 37, 0),
(256, 'C、经常', '', '', 37, 0),
(257, 'A、没有  ', '', '', 38, 0),
(258, 'B、偶尔', '', '', 38, 0),
(259, 'C、经常', '', '', 38, 0),
(260, 'A、很好  ', '', '', 39, 0),
(261, 'B、 一般', '', '', 39, 0),
(262, 'C、不好', '', '', 39, 0),
(263, 'A、非常好的引领作用', '', '', 40, 0),
(264, 'B、一般', '', '', 40, 0),
(265, 'C、有很多不好的言行。', '', '', 40, 0),
(266, 'A、提高了', '', '', 41, 0),
(267, 'B、一般', '', '', 41, 0),
(268, 'C、下降了', '', '', 41, 0),
(269, 'A、没有', '', '', 42, 0),
(270, 'B、偶尔这样', '', '', 42, 0),
(271, 'C、经常', '', '', 42, 0),
(272, 'A、没有', '', '', 43, 0),
(273, 'B、偶尔这样', '', '', 43, 0),
(274, 'C、经常', '', '', 43, 0),
(275, 'A、没有', '', '', 44, 0),
(276, 'B、偶尔这样', '', '', 44, 0),
(277, 'C、经常', '', '', 44, 0),
(278, 'A、没有', '', '', 45, 1),
(279, 'B、偶尔这样', '', '', 45, 0),
(280, 'C、经常', '', '', 45, 0),
(281, 'A、能很好的完成', '', '', 46, 1),
(282, 'B、完成的不是很好', '', '', 46, 0),
(283, 'C、太多，完不成或没有作业', '', '', 46, 0),
(284, 'A、认真批改', '', '', 47, 0),
(285, 'B、只打“√”，打“×”', '', '', 47, 0),
(286, 'C、基本不批改或只写日期', '', '', 47, 0),
(287, 'A、耐心、认真', '', '', 48, 0),
(288, ' B、一般 ', '', '', 48, 0),
(289, 'C、不耐心、不认真或根本不辅导', '', '', 48, 0),
(290, 'A、很好', '', '', 49, 0),
(291, 'B、一般', '', '', 49, 0),
(292, 'C、较差', '', '', 49, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xh_title`
--

CREATE TABLE IF NOT EXISTS `xh_title` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(40) NOT NULL,
  `ms` int(11) NOT NULL,
  `vcount` int(11) NOT NULL,
  `listtype` int(11) NOT NULL,
  `listrows` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 导出表中的数据 `xh_title`
--

INSERT INTO `xh_title` (`id`, `title`, `ms`, `vcount`, `listtype`, `listrows`) VALUES
(30, '该老师的上课时的状态：', 1, 25, 0, 4),
(31, '你认为该教师对课的准备情况：', 1, 5, 0, 5),
(32, '你感觉老师对待学生的态度：', 1, 8, 0, 1),
(33, '该教师是否注意知识规律的总结和学习方法的介绍：', 1, 5, 0, 1),
(34, '该教师你是否喜欢：', 1, 1, 0, 1),
(35, '你感觉该教师的课堂教学效果：', 1, 0, 0, 1),
(36, '该学科教师上课（含早晚自习）迟到、早退情况是：', 1, 0, 0, 1),
(37, '该学科教师上课是否有抽烟的情况：', 1, 0, 0, 1),
(38, '该学科教师上课是否有带、接、打手机等情况：', 1, 0, 0, 1),
(39, '你与该教师间关系的融洽程度：', 1, 0, 0, 1),
(40, '你认为该教师的言行对你的影响：', 1, 0, 0, 1),
(41, '通过该老师教学，我对该学科的兴趣：', 1, 0, 0, 1),
(42, '该教师是否有在上其他课时留学生辅导的情况：', 1, 0, 0, 1),
(43, '该教师是否有拖堂的情况：', 1, 0, 0, 1),
(44, '该教师是否有罚学生写篇数的情况：', 1, 0, 0, 1),
(45, '该教师是否有将学生罚站到教室外的情况：', 1, 1, 0, 1),
(46, '你认为该门学科课后作业：', 1, 1, 0, 1),
(47, '该教师对你作业批改情况：', 1, 0, 0, 1),
(48, '该教师课后辅导：', 1, 0, 0, 1),
(49, '你对该教师的综合评价：', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xh_userinfo`
--

CREATE TABLE IF NOT EXISTS `xh_userinfo` (
  `id` int(11) NOT NULL auto_increment,
  `stu_num` int(11) NOT NULL,
  `stu_name` varchar(40) NOT NULL,
  `class` varchar(20) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `qid1` varchar(10) NOT NULL,
  `qid2` varchar(11) NOT NULL,
  `qid3` int(11) NOT NULL,
  `qid4` int(11) NOT NULL,
  `qid5` int(11) NOT NULL,
  `qid6` int(11) NOT NULL,
  `qid7` int(11) NOT NULL,
  `qid8` int(11) NOT NULL,
  `qid9` int(11) NOT NULL,
  `qid10` int(11) NOT NULL,
  `qid11` int(11) NOT NULL,
  `qid12` int(11) NOT NULL,
  `qid13` int(11) NOT NULL,
  `qid14` int(11) NOT NULL,
  `qid15` int(11) NOT NULL,
  `qid16` int(11) NOT NULL,
  `qid17` int(11) NOT NULL,
  `qid18` int(11) NOT NULL,
  `qid19` int(11) NOT NULL,
  `qid20` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 导出表中的数据 `xh_userinfo`
--

INSERT INTO `xh_userinfo` (`id`, `stu_num`, `stu_name`, `class`, `teacher`, `qid1`, `qid2`, `qid3`, `qid4`, `qid5`, `qid6`, `qid7`, `qid8`, `qid9`, `qid10`, `qid11`, `qid12`, `qid13`, `qid14`, `qid15`, `qid16`, `qid17`, `qid18`, `qid19`, `qid20`, `ip`) VALUES
(1, 333333, '张三', '一（2）班', '语文', '233', '236', 240, 243, 246, 249, 252, 256, 259, 262, 265, 267, 270, 273, 276, 278, 281, 284, 287, 290, ''),
(2, 333333, '张三', '一（2）班', '数学', '233', '236', 240, 243, 246, 249, 252, 255, 259, 262, 265, 268, 271, 272, 275, 278, 281, 284, 287, 291, ''),
(3, 222222, '李四', '一（2）班', '语文', '233', '236', 240, 243, 246, 248, 251, 254, 258, 261, 264, 267, 269, 272, 275, 278, 283, 286, 289, 292, '');
