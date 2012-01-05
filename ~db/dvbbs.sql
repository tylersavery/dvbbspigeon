-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2012 at 01:57 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dvbbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE IF NOT EXISTS `analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `thekey` varchar(20) NOT NULL,
  `thevalue` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `time`, `ip`, `thekey`, `thevalue`) VALUES
(1, 1325725297, '127.0.0.1', 'visit', ''),
(2, 1325725617, '127.0.0.1', 'visit', ''),
(3, 1325725645, '127.0.0.1', 'download', 'dj'),
(4, 1325725650, '127.0.0.1', 'download', 'stems'),
(5, 1325725652, '127.0.0.1', 'download', 'mixtape'),
(6, 1325725677, '127.0.0.1', 'play', '1'),
(7, 1325725687, '127.0.0.1', 'play', '2'),
(8, 1325725968, '127.0.0.1', 'play', '3'),
(9, 1325726067, '127.0.0.1', 'visit', ''),
(10, 1325726109, '127.0.0.1', 'visit', ''),
(11, 1325726116, '127.0.0.1', 'download', 'comealive.mp3'),
(12, 1325726150, '127.0.0.1', 'visit', ''),
(13, 1325726215, '127.0.0.1', 'download', 'drvgs.mp3'),
(14, 1325726242, '127.0.0.1', 'visit', ''),
(15, 1325726253, '127.0.0.1', 'download', 'drvgs.mp3'),
(16, 1325726352, '127.0.0.1', 'visit', ''),
(17, 1325726367, '127.0.0.1', 'download', 'drvgs.mp3'),
(18, 1325726404, '127.0.0.1', 'download', 'sugarcoated.mp3'),
(19, 1325726548, '127.0.0.1', 'visit', ''),
(20, 1325726586, '127.0.0.1', 'visit', ''),
(21, 1325726597, '127.0.0.1', 'download', 'comealive.mp3.zip'),
(22, 1325726753, '127.0.0.1', 'visit', ''),
(23, 1325726776, '127.0.0.1', 'download', 'herewego.mp3.zip');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` text,
  `slug` varchar(255) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `time_publish` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=303 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `subtitle`, `body`, `slug`, `time_create`, `time_publish`, `time_update`, `status`) VALUES
(300, 57, NULL, 'Test', 'asdfsdaf', 'fsagsfadsfdsafsd', 'test', NULL, 1322377020, NULL, 'a'),
(301, 57, NULL, 'Another Test for ya', 'Hey there', 'fasdfdsfdsafasdf', 'another-test-for-ya', 0, 1322375280, NULL, 'a'),
(302, 57, 10, 'whoo ha', 'this is the shit', 'asdfdsaf', 'whoo-ha', 1322377090, 1322373600, NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `filesize` int(11) NOT NULL,
  `length` double NOT NULL,
  `image_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `filename`, `filetype`, `filesize`, `length`, `image_id`, `status`) VALUES
(12, 'Hayley Gene - The Shore', 'theshore.mp3', 'audio/mp3', 5492230, 228.754291667, 10, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`) VALUES
(9, 'Food', NULL),
(10, 'Drink', NULL),
(11, 'A Test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `filesize` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `filename`, `filetype`, `filesize`, `status`) VALUES
(7, 'Cover', 'The B-52''s - The B-52''s Front.jpg', 'image/jpeg', 972719, 'a'),
(8, '', 'BillyJoel-TheUltimateCollectionFront.JPG', 'image/jpeg', 162690, 'a'),
(9, 'Elton John Cover', 'eltonjohn-greatesthits1970-2002front.jpg', 'image/jpeg', 63179, 'a'),
(10, 'Hayley Gene', '294485_175503535871045_174337285987670_357766_2100000943_n.jpg', 'image/jpeg', 40513, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` text,
  `last_login` int(11) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `bio`, `last_login`, `time_create`, `time_update`, `status`, `type`) VALUES
(57, 'tyler@theyoungastronauts.com', '168813163207691f5c5efbf70456ec8e', 'Tyler', 'Savery', '', NULL, NULL, NULL, 'a', 7);
