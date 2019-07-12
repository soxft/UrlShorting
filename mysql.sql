-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `shorturl` char(10) NOT NULL,
  `domain` mediumtext NOT NULL,
  `type` char(10) NOT NULL,
  `ip` char(30) NOT NULL,
  `time` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ban`;
CREATE TABLE `ban` (
  `type` varchar(10) NOT NULL,
  `content` varchar(999) NOT NULL,
  `time` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `information` mediumtext NOT NULL,
  `shorturl` char(20) NOT NULL,
  `type` char(20) NOT NULL,
  `time` char(20) NOT NULL,
  `ip` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2019-07-12 00:34:08
