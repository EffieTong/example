-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2014 年 01 月 19 日 14:54
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `osweb`
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
-- 导出表中的数据 `class`
--

INSERT INTO `class` (`id`, `year`, `class_id`, `class_name`) VALUES
(1, '2010', 1, '计算机1班'),
(2, '2010', 2, '计算机2班'),
(3, '2010', 3, '计算机3班'),
(4, '2010', 4, '网络工程1班');

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

--
-- 导出表中的数据 `forum`
--


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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `role`, `status`, `avatar`) VALUES
(1, '20101000001', '管理员', 'a', 'approve', NULL),
(2, '20101001001', '童轶', 's', 'approve', NULL),
(3, '20101001002', '邱李筠', 's', 'approve', NULL),
(4, '20101000011', '李霞', 't', 'approve', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_class`
--

CREATE TABLE IF NOT EXISTS `user_class` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `class_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `role` varchar(5) COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`, `role`) VALUES
(1, '20101001001', '4', 's'),
(2, '20101001002', '4', 's'),
(3, '20101000011', '1', 't');
