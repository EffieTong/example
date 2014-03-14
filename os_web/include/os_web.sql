-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-03-05 16:57:26
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `year`, `class_id`, `class_name`) VALUES
(1, '2010', 1, '计算机1班'),
(2, '2010', 2, '计算机2班'),
(3, '2010', 3, '计算机3班'),
(4, '2010', 4, '网络工程1班');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `file_id` int(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `class_id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `user_id` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `role` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `psw` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `role`, `status`, `avatar`, `psw`) VALUES
(1, '1', '管理员', 'a', 'approve', NULL, '1'),
(2, '2', '童轶', 's', 'approve', NULL, '2'),
(3, '3', '邱李筠', 's', 'approve', NULL, '3'),
(4, '4', '李霞', 't', 'approve', NULL, '4');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`, `role`) VALUES
(1, '2', 4, 's'),
(2, '3', 4, 's'),
(3, '4', 1, 't');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
