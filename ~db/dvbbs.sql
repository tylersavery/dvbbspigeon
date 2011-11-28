-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 05:42 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `filename`, `filetype`, `filesize`, `length`, `image_id`, `status`) VALUES
(9, 'The Entertainer', '08billyjoel-theentertainer.mp3', 'audio/mp3', 5222694, 217.521583333, 8, 'a'),
(10, 'Hard Days Night', '01-the_beatles-a_hard_days_night.mp3', 'audio/mp3', 4281281, 154.253061224, 7, 'a'),
(11, 'Tiny Dancer', '02eltonjohn-tinydancer.mp3', 'audio/mp3', 9040911, 376.685708333, 9, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `filename`, `filetype`, `filesize`, `status`) VALUES
(7, 'Cover', 'The B-52''s - The B-52''s Front.jpg', 'image/jpeg', 972719, 'a'),
(8, '', 'BillyJoel-TheUltimateCollectionFront.JPG', 'image/jpeg', 162690, 'a'),
(9, 'Elton John Cover', 'eltonjohn-greatesthits1970-2002front.jpg', 'image/jpeg', 63179, 'a');

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
