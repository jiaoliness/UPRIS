-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2013 at 06:32 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE IF NOT EXISTS `admininfo` (
  `adminid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20002 ;

-- --------------------------------------------------------

--
-- Table structure for table `adviserinfo`
--

CREATE TABLE IF NOT EXISTS `adviserinfo` (
  `adviserid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adviserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40002 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `convoid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`convoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('read','unread') NOT NULL,
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`messageid`),
  UNIQUE KEY `messageid` (`messageid`),
  KEY `messageid_2` (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postid` int(250) NOT NULL AUTO_INCREMENT,
  `header` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `proposalid` int(250) NOT NULL AUTO_INCREMENT,
  `proponentid` int(250) NOT NULL,
  `status` enum('pending','approved','declined','approvedwcomment','new') NOT NULL,
  `adviserid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `proponents` varchar(250) NOT NULL,
  `field` varchar(250) NOT NULL,
  `duration` int(100) NOT NULL,
  `budget` double NOT NULL,
  `abstract` text NOT NULL,
  `doc` varchar(200) NOT NULL,
  PRIMARY KEY (`proposalid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviewed`
--

CREATE TABLE IF NOT EXISTS `reviewed` (
  `reviewid` int(11) NOT NULL AUTO_INCREMENT,
  `proposalid` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `relevance` int(11) NOT NULL,
  `relevancecom` text NOT NULL,
  `helpful` int(11) NOT NULL,
  `helpfulcom` text NOT NULL,
  `overall` enum('recommend','decline','pending','no') NOT NULL,
  PRIMARY KEY (`reviewid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviewerinfo`
--

CREATE TABLE IF NOT EXISTS `reviewerinfo` (
  `reviewerid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviewerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30004 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposalid` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `status` enum('approved','declined','noresponse','new') NOT NULL DEFAULT 'new',
  `recommended` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10004 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
