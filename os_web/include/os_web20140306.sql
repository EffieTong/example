-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-03-06 11:01:48
-- 服务器版本: 5.6.14
-- PHP 版本: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `os_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) COLLATE utf8_bin NOT NULL,
  `class_id` int(10) NOT NULL,
  `class_name` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `year`, `class_id`, `class_name`) VALUES
(1, '2010', 1, '计算机1班'),
(2, '2010', 2, '计算机2班'),
(3, '2010', 3, '计算机3班'),
(4, '2010', 4, '网络工程1班'),
(5, '2010', 5, '软件工程1班');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `file_name` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `path` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`id`, `user_id`, `file_name`, `path`, `create_time`) VALUES
(1, '4', 'OS整理.doc', '../file/4/OS整理.doc', '0000-00-00 00:00:00'),
(2, '4', 'OS期末复习（每一章的重点）.doc', '../file/4/OS期末复习（每一章的重点）.doc', '2014-03-06 08:50:26'),
(3, '5', '操作系统试题2008年A卷答案.pdf', '../file/5/操作系统试题2008年A卷答案.pdf', '2014-03-06 09:08:01'),
(4, '5', '2009年7月操作系统复习范围.doc', '../file/5/2009年7月操作系统复习范围.doc', '2014-03-06 09:11:31');

-- --------------------------------------------------------

--
-- 表的结构 `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title_id` int(100) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  `author_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `replier_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `role` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `file_name` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `path` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `homework`
--

INSERT INTO `homework` (`id`, `user_id`, `file_name`, `path`, `create_time`) VALUES
(1, '2', '第二周作业.doc', '../homework/2/第二周作业.doc', '0000-00-00 00:00:00'),
(2, '2', '第三周作业.doc', '../homework/2/第三周作业.doc', '0000-00-00 00:00:00'),
(3, '6', '第六章作业.doc', '../homework/6/第六章作业.doc', '0000-00-00 00:00:00'),
(4, '3', '第五章作业.doc', '../homework/3/第五章作业.doc', '0000-00-00 00:00:00'),
(5, '7', '第二周作业.doc', '../homework/7/第二周作业.doc', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `user_name` varchar(20) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `role` varchar(5) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `status` varchar(10) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `psw` varchar(20) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `role`, `status`, `avatar`, `psw`) VALUES
(1, '1', '管理员', 'a', 'approve', NULL, '1'),
(2, '2', '童轶', 's', 'approve', NULL, '2'),
(3, '3', '邱李筠', 's', 'approve', NULL, '3'),
(4, '4', '李霞', 't', 'approve', NULL, '4'),
(5, '5', '王老师', 't', 'approve', NULL, '5'),
(6, '6', '测试学生1', 's', 'approve', NULL, '6'),
(7, '7', '测试学生2', 's', 'approve', NULL, '7');

-- --------------------------------------------------------

--
-- 表的结构 `user_class`
--

CREATE TABLE IF NOT EXISTS `user_class` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `class_id` int(10) NOT NULL,
  `role` varchar(5) COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`, `role`) VALUES
(1, '2', 4, 's'),
(2, '3', 4, 's'),
(3, '4', 1, 't'),
(4, '4', 4, 't'),
(5, '6', 1, 's'),
(6, '5', 2, 't'),
(7, '7', 2, 's');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
