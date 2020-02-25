-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 20 ธ.ค. 2005  น.
-- รุ่นของเซิร์ฟเวอร์: 4.1.12
-- รุ่นของ PHP: 5.0.4
-- 
-- ฐานข้อมูล: `ajaxchat`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `useronline`
-- 

CREATE TABLE `useronline` (
  `id` mediumint(8) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `expire` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `useronline`
-- 

INSERT INTO `useronline` VALUES (8, 'man', 1135014024);
