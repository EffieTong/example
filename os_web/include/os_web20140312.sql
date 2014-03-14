-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-03-12 06:56:52
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
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `content` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL,
  `C` varchar(255) NOT NULL,
  `D` varchar(255) NOT NULL,
  `answer` varchar(100) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `user_id` varchar(10) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `type`, `content`, `A`, `B`, `C`, `D`, `answer`, `user_id`) VALUES
(1, 'choose', '下列哪个数最大？', '111', '222', '333', '444', 'D', '4'),
(2, 'fill', 'OS 的中文是什么？', '', '', '', '', '操作系统', '4'),
(3, 'judge', 'OS 全称是operating system对不对？', '', '', '', '', 'T', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
