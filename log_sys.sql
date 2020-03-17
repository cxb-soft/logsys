-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dq`;
CREATE TABLE `dq` (
  `date` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `from` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `titles`;
CREATE TABLE `titles` (
  `class` mediumtext NOT NULL,
  `title` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `time` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL,
  `time_d` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2020-03-17 06:06:43
