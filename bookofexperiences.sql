-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2016 at 08:18 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookofexperiences`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `adminNo` int(11) NOT NULL AUTO_INCREMENT,
  `aUser` text NOT NULL,
  `aPass` text NOT NULL,
  `pAdmin` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`adminNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`adminNo`, `aUser`, `aPass`, `pAdmin`, `first_name`, `last_name`) VALUES
(1, 'chirantha', '6555159f8694dff7788074647e1d0376', 1, 'Chirantha', 'Danansuriya'),
(2, 'gihan', '536322e1ec4871bd61b673347521bf5a', 1, 'Gihan', 'Danansuriya'),
(4, 'Nandasena', 'd41d8cd98f00b204e9800998ecf8427e', 1, NULL, NULL),
(9, 'asdf', 'd41d8cd98f00b204e9800998ecf8427e', 1, NULL, NULL),
(10, 'Charitha', '1f3b1da7434f70f4fe2b2c38425a7d83', 1, NULL, NULL),
(11, 'Magga', 'ad831ee5899d9ae8c99d9c001a945f5b', 1, NULL, NULL),
(12, 'Madura', '7815696ecbf1c96e6894b779456d330e', 1, NULL, NULL),
(13, 'Admin', ' 21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL),
(14, 'Chatura', '1b6bc9e65e6a0c0371be49647ed83bf0', 12, NULL, NULL),
(15, 'Chaturaa', '79f6234887f60a238c839a37228ff3db', 12, NULL, NULL),
(16, 'Kapila', 'a152e841783914146e4bcd4f39100686', 1, NULL, NULL),
(17, 'Charitha3', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL),
(18, 'vidu', 'e10adc3949ba59abbe56e057f20f883e', 2, 'viduravi', 'Lamahewage'),
(19, 'wamaa', 'abf5d8c3322909d155e5ca4330ebe01c', 2, 'Wamaa', 'Perera'),
(20, 'asd', '7815696ecbf1c96e6894b779456d330e', 2, 'asd', 'asd'),
(21, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 2, 'qwe', 'qwe'),
(22, 'qwer', '962012d09b8170d912f0669f6d7d9d07', 2, 'qwer', 'qwer'),
(23, 'java', '93f725a07423fe1c889f448b33d21f46', 2, 'Java', 'java'),
(24, 'poi', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 2, 'poi', 'poi'),
(25, 'manee', 'defaa6aca3a9198f2eb3b4386a57a16d', 1, 'Manisha', 'Jayathilaka'),
(26, 'heee', '115fd0b88efff4378de32e700919b79e', 1, 'Hisha', 'heee'),
(27, 'kawee', '8b31ebbdc9d8840c17d049f7c3d42467', 1, 'Kaweesha', 'Wijawicrama'),
(28, 'anuu', 'caf81f25099a9b4d1b8c96f44890befb', 1, 'Anushka', 'Athula'),
(29, 'ssss', '8f60c8102d29fcd525162d02eed4566b', 28, 'Malmi', 'Www');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(2) NOT NULL AUTO_INCREMENT,
  `Category_Title` varchar(25) NOT NULL,
  `Admin_ID` int(6) NOT NULL,
  PRIMARY KEY (`Category_ID`),
  KEY `Admin_ID` (`Admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Title`, `Admin_ID`) VALUES
(1, 'Music', 1),
(2, 'Sports', 1),
(3, 'Software Developing', 1),
(4, 'Travelling', 1),
(5, 'Family Life', 1),
(6, 'Gaming', 1),
(7, 'Technology', 1),
(10, 'Food', 1),
(13, 'Swiming', 1),
(14, 'Animals', 28),
(15, 'Aplle', 28),
(16, 'Ghhg', 28);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `Feedback_ID` int(20) NOT NULL AUTO_INCREMENT,
  `User_ID` int(6) NOT NULL,
  `Story_ID` int(10) NOT NULL,
  `Feedback` varchar(1) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Feedback_ID`),
  KEY `User_ID` (`User_ID`,`Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `User_ID`, `Story_ID`, `Feedback`, `Time`) VALUES
(9, 15, 33, 'L', '2016-01-12 14:07:22'),
(10, 15, 29, 'L', '2016-01-12 14:08:19'),
(12, 15, 36, 'U', '2016-01-12 14:18:52'),
(13, 1, 33, 'L', '2016-01-13 07:14:39'),
(14, 1, 2, 'L', '2016-01-13 10:26:05'),
(15, 1, 38, 'L', '2016-01-13 10:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `F_Registation_ID` int(6) NOT NULL,
  PRIMARY KEY (`F_Registation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_add`
--

CREATE TABLE IF NOT EXISTS `friend_add` (
  `Registation_ID` int(6) NOT NULL,
  `F_Registation_ID` int(6) NOT NULL,
  `Date` date NOT NULL,
  `Confirmation` int(2) NOT NULL DEFAULT '0',
  `SenderID` int(6) NOT NULL,
  PRIMARY KEY (`Registation_ID`,`F_Registation_ID`),
  KEY `F_Registation_ID` (`F_Registation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_add`
--

INSERT INTO `friend_add` (`Registation_ID`, `F_Registation_ID`, `Date`, `Confirmation`, `SenderID`) VALUES
(1, 2, '2016-01-12', 0, 1),
(1, 3, '2016-01-06', 0, 1),
(1, 4, '2016-01-13', 1, 4),
(1, 6, '2015-12-02', 0, 1),
(1, 8, '2016-01-11', 0, 1),
(1, 9, '2016-01-13', 0, 1),
(1, 11, '2016-01-06', 0, 1),
(1, 13, '2016-01-12', 1, 1),
(1, 14, '2016-01-05', 0, 1),
(1, 15, '2016-01-12', 1, 15),
(2, 1, '2016-01-12', 0, 1),
(3, 1, '2016-01-06', 0, 1),
(4, 1, '2016-01-13', 1, 4),
(6, 1, '2015-12-02', 0, 1),
(8, 1, '2016-01-11', 0, 1),
(9, 1, '2016-01-13', 0, 1),
(11, 1, '2016-01-06', 0, 1),
(13, 1, '2016-01-12', 1, 1),
(13, 15, '2016-01-12', 1, 15),
(14, 1, '2016-01-05', 0, 1),
(15, 1, '2016-01-12', 1, 15),
(15, 13, '2016-01-12', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `helpID` int(4) NOT NULL AUTO_INCREMENT,
  `helpTitle` varchar(100) NOT NULL,
  `helpDescription` varchar(3000) NOT NULL,
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`helpID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`helpID`, `helpTitle`, `helpDescription`, `adminID`) VALUES
(1, 'How do I log into my BE account?', 'To log into your BE account:  Make sure no one else is logged into BE on your computer To log someone else out, click  at the top right of your BE homepage and select Log Out Go to the top of www.BE.com and enter one of the following: Email address: You can log in with any email address that is currently listed on your BE account Username: Enter your password Click Log In', 1),
(2, 'How do I log out of BE?', 'To log out of BE:  Click  at the top right of any BE page Select Log Out', 1),
(4, 'How to post story', 'gggggggg', 28);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `in_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`in_ID`, `user_ID`, `title`, `content`) VALUES
(0, 1, 'Hello', 'sdassda'),
(0, 1, 'oy8ijbhijlkbuhiuo', 'hjuh'),
(0, 4, 'hdfh', 'njgcjm');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Message_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Body` varchar(250) NOT NULL,
  `Sender_ID` int(6) NOT NULL,
  `Receiver_ID` int(6) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Message_ID`),
  KEY `Sender_ID` (`Sender_ID`),
  KEY `Receiver_ID` (`Receiver_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Title`, `Date`, `Body`, `Sender_ID`, `Receiver_ID`, `view`) VALUES
(16, 'PROJECT', '2015-11-03 09:30:14', 'HIKJJJ', 6, 4, 0),
(17, 'hngng', '2015-11-03 09:44:08', 'ghjgjghj', 6, 1, 1),
(18, 'project', '2015-11-18 08:27:54', 'project', 6, 4, 0),
(19, 'project', '2015-11-18 08:33:08', 'bbbbb', 6, 4, 0),
(20, 'new', '2015-11-18 08:33:57', 'newww', 6, 4, 0),
(21, 'test', '2015-11-18 08:35:02', 'test1', 6, 1, 1),
(22, 'hii', '2015-11-23 13:45:38', 'hellooo', 1, 2, 0),
(23, 'sports', '2016-01-12 08:50:20', 'Hey how are you... ', 1, 4, 0),
(24, 'usyudy', '2016-01-12 09:49:43', 'askhjoaih', 1, 14, 0),
(25, 'test', '2016-01-12 09:50:29', 'ljoupoupa', 1, 6, 0),
(26, 'hngng', '2016-01-12 09:50:54', 'dryrydtyger\n/,"l\n', 1, 6, 0),
(27, 'aaa', '2016-01-12 10:05:51', 'yy', 1, 1, 1),
(28, 'Ha;loo', '2016-01-12 14:23:11', 'cscs', 15, 1, 1),
(29, 'Ha;loo', '2016-01-12 14:31:08', 'dsfsfsffs', 1, 15, 1),
(30, 'test', '2016-01-13 07:10:02', 'test', 4, 1, 1),
(31, 'test', '2016-01-13 07:11:24', 'oipo', 1, 4, 0),
(32, 'new message', '2016-01-13 08:49:51', 'asdfgj', 4, 1, 1),
(33, 'new message', '2016-01-13 08:50:48', 'hsihh', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE IF NOT EXISTS `registered_user` (
  `Registation_ID` int(6) NOT NULL AUTO_INCREMENT,
  `User_Level` int(1) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Reg.date` date NOT NULL,
  `Profpic` varchar(10) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Status` varchar(10) DEFAULT 'None',
  `DOB` date NOT NULL,
  `City` varchar(15) DEFAULT 'None',
  `ip` varchar(15) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `loginStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`Registation_ID`),
  UNIQUE KEY `Email_Address` (`Email_Address`),
  KEY `Registation_ID` (`Registation_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`Registation_ID`, `User_Level`, `First_Name`, `Last_Name`, `Email_Address`, `Password`, `Reg.date`, `Profpic`, `Gender`, `Status`, `DOB`, `City`, `ip`, `lastLogin`, `loginStatus`) VALUES
(1, 1, 'Binura', 'Dodangoda', 'bdodangoda@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Galle', '1', '2016-04-08 11:38:46', 1),
(2, 1, 'Manusha', 'Kandage', 'manushapk@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'F', 'Single', '0000-00-00', 'Matara', '1', '2015-09-14 12:23:09', 1),
(3, 1, 'Sashi', 'Themiya', 'a@s.l', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'fggh', '', '0000-00-00 00:00:00', 0),
(4, 1, 'Amila', 'Sankha', 'amilasankha@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2016-01-13 15:38:36', 0),
(6, 1, 'Deshan', 'Rathnayake', 'rmcdr92@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Maharagama', '1', '2015-12-02 12:19:54', 1),
(7, 1, 'sampath', 'guslaljs', 'abcdef@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2015-11-03 13:42:25', 0),
(8, 1, 'Charitha', 'Sampath', 'abc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'MAtara', '1', '2015-11-03 14:52:14', 0),
(9, 1, 'Chamara', 'Liyanage', 'bdodangoda@rock.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'asas', '', '0000-00-00 00:00:00', 0),
(10, 1, 'Dhanushka', 'Chandana', 'bdodangoda@hotmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'sasas', '', '0000-00-00 00:00:00', 0),
(11, 1, 'Eranga', 'Sampath', 'bb@dd.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'aaa', '', '0000-00-00 00:00:00', 0),
(12, 1, 'Subash', 'Chathuranga', 'amila@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '127.0.0.1', '2016-01-13 11:51:15', 0),
(13, 1, 'Sathira', 'Dodangoda', 'sathira@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single</op', '0000-00-00', 'Galle', '1', '2016-01-13 07:08:05', 1),
(14, 1, 'Kasun', 'Silva', 'fdsfsddd@sdfsf.dsf', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'dsfdfs', '', '0000-00-00 00:00:00', 0),
(15, 1, 'Amal', 'Perera', 'aaa@aaa.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'F', 'Married', '0000-00-00', 'col', '1', '2016-01-12 21:54:03', 1),
(16, 1, 'Charitha Sampath', 'Gunawardana', 'charitha009@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Colombo', '1', '2016-01-13 14:16:01', 0),
(17, 1, 'gh23', 'bjhb', 'bdoda@gms.com', '7175061b69892c4bcfc6e6bc255100fa', '0000-00-00', '', 'M', 'Married', '0000-00-00', 'gggg', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `Report_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Reporter_ID` int(6) NOT NULL,
  `Story_ID` int(10) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warning` varchar(20) NOT NULL DEFAULT 'not',
  PRIMARY KEY (`Report_ID`),
  KEY `Reporter_ID` (`Reporter_ID`,`Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Report_ID`, `Reporter_ID`, `Story_ID`, `Description`, `Time`, `warning`) VALUES
(16, 15, 29, 'It is spam', '2016-01-12 14:11:42', 'Warned'),
(17, 15, 29, 'It is spam', '2016-01-12 14:12:33', 'Warned'),
(18, 15, 29, 'It is annoying or not interesting', '2016-01-12 14:12:42', 'Warned'),
(19, 15, 29, 'It is annoying or not interesting', '2016-01-12 14:12:47', 'Warned'),
(20, 1, 38, 'It is spam', '2016-01-13 04:59:41', 'Warned'),
(21, 1, 37, 'I think it should not be on BE', '2016-01-13 05:03:16', 'Warned'),
(22, 1, 34, 'I think it should not be on BE', '2016-01-13 05:05:37', 'Warned'),
(23, 1, 34, 'I think it should not be on BE', '2016-01-13 05:07:02', 'Warned'),
(24, 1, 28, 'I think it should not be on BE', '2016-01-13 05:08:44', 'Warned'),
(25, 1, 26, 'I think it should not be on BE', '2016-01-13 05:12:31', 'Warned'),
(26, 1, 22, 'I think it should not be on BE', '2016-01-13 05:12:35', 'Warned'),
(27, 1, 9, 'I think it should not be on BE', '2016-01-13 05:12:41', 'Warned'),
(28, 1, 24, 'I think it should not be on BE', '2016-01-13 05:14:37', 'Warned'),
(29, 1, 23, 'I think it should not be on BE', '2016-01-13 05:16:16', 'Warned'),
(30, 1, 23, 'I think it should not be on BE', '2016-01-13 05:17:06', 'Warned'),
(31, 1, 26, 'I think it should not be on BE', '2016-01-13 05:17:48', 'Warned'),
(32, 1, 25, 'I think it should not be on BE', '2016-01-13 05:17:51', 'Warned'),
(33, 1, 26, 'I think it should not be on BE', '2016-01-13 05:19:26', 'Warned'),
(34, 1, 25, 'I think it should not be on BE', '2016-01-13 05:20:10', 'Warned'),
(35, 1, 25, 'I think it should not be on BE', '2016-01-13 05:20:44', 'Warned'),
(36, 1, 37, 'I think it should not be on BE', '2016-01-13 05:21:05', 'Warned'),
(37, 1, 33, 'I think it should not be on BE', '2016-01-13 07:15:21', 'Warned'),
(38, 1, 33, 'I think it should not be on BE', '2016-01-13 07:15:34', 'Warned'),
(39, 4, 33, 'I think it should not be on BE', '2016-01-13 08:54:23', 'Warned'),
(40, 1, 31, 'It is spam', '2016-01-13 10:02:04', 'Warned'),
(41, 1, 25, 'It is annoying or not interesting', '2016-01-13 10:03:16', 'not'),
(42, 1, 34, 'I think it should not be on BE', '2016-01-13 10:03:25', 'not'),
(43, 1, 25, 'I think it should not be on BE', '2016-01-13 10:05:30', 'not'),
(44, 1, 27, 'It is annoying or not interesting', '2016-01-13 10:05:54', 'not');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `Story_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Body` varchar(2500) NOT NULL,
  `Category_ID` int(2) NOT NULL,
  `Type` varchar(2) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Author_ID` int(6) NOT NULL,
  `Like_Count` int(4) NOT NULL,
  `Dislike_Feed` int(4) NOT NULL,
  `lastUpdate` datetime NOT NULL,
  `view` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Story_ID`),
  KEY `Author_ID` (`Author_ID`),
  KEY `Category` (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`Story_ID`, `Title`, `Body`, `Category_ID`, `Type`, `Publish_Date`, `Author_ID`, `Like_Count`, `Dislike_Feed`, `lastUpdate`, `view`) VALUES
(2, 'Cricket', 'Cricket is a bat-and-ball game played between two teams of 11 players each on a field at the centre of which is a rectangular 22-yard-long pitch. The game is played by 120 million players in many countries, making it the world''s second most popular s', 2, 'pu', '2015-10-08', 1, 256, 2, '2016-01-13 15:43:46', 1),
(3, 'Drum', 'The drum is a member of the percussion group of musical instruments. In the Hornbostel-Sachs classification system, it is a membranophone.[1] Drums consist of at least one membrane, called a drumhead or drum skin, that is stretched over a shell and s', 1, 'pu', '2015-09-02', 2, 56, 1, '2016-01-13 15:43:46', 1),
(5, 'Kithulgala', 'Kitulgala is a small town in the west of Sri Lanka. Kitulgala is also a base for white-water rafting,[1] which starts a few kilometres upstream.', 4, 'pu', '2015-10-08', 2, 56, 11, '2016-01-13 15:43:46', 1),
(6, 'Foot Ball', 'Association football, more commonly known as football or soccer,is a sport played between two teams of eleven players with a spherical ball. It is played by 250 million players in over 200 countries, making it the world''s most popular sport.', 2, 'pu', '2015-09-16', 2, 569, 12, '2016-01-13 15:43:46', 1),
(7, 'NFS', 'Most Wanted is the best car game.', 6, 'pu', '2015-10-08', 2, 563, 47, '2016-01-13 15:43:46', 1),
(8, 'COD4', 'fighting game.......................', 6, 'pu', '2015-10-14', 3, 256, 45, '2016-01-13 15:43:46', 1),
(9, 'NANO', 'Nanotechnology ("nanotech") is manipulation of matter on an atomic, molecular, and supramolecular scale.', 7, 'pu', '2015-08-25', 1, 1236, 1, '2016-01-13 15:43:46', 1),
(10, 'Children', 'Biologically, a child (plural: children) is a human between the stages of birth and puberty. The legal definition of child generally refers to a minor, otherwise known as a person younger than the age of majority.', 5, 'pu', '2015-10-18', 2, 12, 1, '2016-01-13 15:43:46', 1),
(11, 'Classical Music', 'Classical music is art music produced or rooted in the traditions of Western music, including both liturgical (religious) and secular music. While a similar term is also used to refer to the period from 1750-1820 (the Classical period), this article is about the broad span of time from roughly the 11th century to the present day, which includes the Classical period and various other periods. The central norms of this tradition became codified between 1550 and 1900, which is known as the common practice period. The major time divisions of classical music are as follows: the early music period, which includes the Medieval (500–1400) and the Renaissance (1400–1600) eras; the Common practice period, which includes the Baroque (1600–1750), Classical (1750–1820), and Romantic eras (1804–1910); and the 20th century (1901–2000) which includes the modern (1890–1930) that overlaps from the late 19th-century, the high modern (mid 20th-century), and contemporary or postmodern (1975–present) eras.', 1, 'pu', '2015-11-01', 3, 256, 1, '2016-01-13 15:43:46', 1),
(12, 'Western music (North America)', 'Western music is a form of American folk music composed by and about the people who settled and worked throughout the Western United States and Western Canada. Directly related musically to old English, Scottish, and Irish folk ballads, Western music celebrates the life of the cowboy on the open ranges and prairies of Western North America. The Mexican folk music of the American Southwest also influenced the development of this genre. Western music shares similar roots with Appalachian music (also called hillbilly music), which developed in Appalachia separately from, but parallel to, the Western music genre. The music industry of the mid-20th century grouped the two genres together under the banner of country and western music, later amalgamated into the modern name, country music.', 1, 'pu', '2015-10-21', 3, 1256, 25, '2016-01-13 15:43:46', 1),
(13, 'Projec I G I', 'Project I.G.I.: I''m Going In (released in Europe as simply Project I.G.I.) is a tactical first-person shooter developed by Innerloop Studios and released on December 15, 2000 by Eidos Interactive. Upon release the game received mixed reviews due to a number of shortcomings, including poorly programmed A.I., lack of a mid-game save option, and the lack of multiplayer features. However it was praised for its superb sound design and graphics, thanks in part to its use of a proprietary game engine that was previously used in Innerloop''s Joint Strike Fighter.', 7, 'pu', '2015-10-14', 2, 456, 23, '2016-01-13 15:43:46', 1),
(17, 'Galle Fort', '<b>Galle Fort</b>, in the Bay of Galle on the southwest coast of Sri Lanka, was built first in 1588 by the Portugese, then extensively fortified by the Dutuch\n during the 17th century from 1649 onwards. It is a historical, \narchaeological and architectural heritage monument, which even after \nmore than 423 years maintains a polished appearance, due to extensive \nreconstruction work done by Archaeological Department of Sri Lanka', 4, 'pu', '2015-11-03', 6, 0, 0, '2016-01-13 15:43:46', 1),
(19, 'SL vs WI', 'It was a nice match a day before yesterday.<br>', 2, 'pu', '2015-11-03', 6, 0, 0, '2016-01-13 15:43:46', 1),
(20, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03', 6, 0, 0, '2016-01-13 15:43:46', 1),
(21, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03', 6, 0, 0, '2016-01-13 15:43:46', 1),
(22, 'Piano', 'I am playing <b>piano</b>', 1, 'pu', '2015-11-17', 1, 0, 0, '2016-01-13 15:43:46', 1),
(23, 'Football', 'It was nice to watch the football match <b>yesterday </b>!!!', 2, 'pu', '2015-11-19', 1, 0, 0, '2016-01-13 15:43:46', 1),
(24, 'Project', 'Ajax is used !!!', 7, 'pu', '2015-11-19', 1, 0, 0, '2016-01-13 15:43:46', 1),
(25, 'Hello World', 'I like to have a <b>good </b>family life<br>', 5, 'pu', '2015-11-23', 1, 0, 0, '2016-01-13 15:43:46', 1),
(26, 'New', 'I like Travelling<br>', 4, 'pu', '2016-01-07', 13, 0, 0, '2016-01-13 15:43:46', 1),
(27, 'test', 'test', 1, 'pu', '2016-01-10', 1, 0, 0, '2016-01-13 15:43:46', 1),
(28, 'test2', 'test 2', 1, 'pr', '2016-01-10', 1, 0, 0, '2016-01-13 15:43:46', 1),
(29, 'test 3', 'test 3', 1, 'fo', '2016-01-10', 1, 0, 0, '2016-01-13 15:43:46', 1),
(30, 'dfsdfsdf', 'fsdfsfsdf', 1, 'pu', '2016-01-11', 13, 0, 0, '2016-01-13 15:43:46', 0),
(31, 'test', 'test', 4, 'pu', '2016-01-12', 1, 0, 0, '2016-01-13 15:43:46', 1),
(32, 'new test', 'dfdfdd', 1, 'pu', '2016-01-12', 1, 0, 0, '2016-01-13 15:43:46', 0),
(33, 'How to be healthy', 'Be happy it will helps you to be healthy...<br>', 1, 'pu', '2016-01-12', 1, 0, 0, '2016-01-13 15:43:46', 1),
(34, 't20 cricket', 'Sri lanka is now rank 03.. what happen??<br>', 2, 'fo', '2016-01-12', 1, 0, 0, '2016-01-13 15:43:46', 1),
(35, 'how to be healthy', 'be happy<br>', 5, 'pu', '2016-01-12', 1, 0, 0, '2016-01-13 15:43:46', 1),
(36, 'Dogs', 'I love <b><i>Dogs</i></b>', 14, 'pu', '2016-01-12', 15, 0, 0, '2016-01-13 15:43:46', 0),
(37, 'My trip', 'I like Kandy', 4, 'fo', '2016-01-12', 13, 0, 0, '2016-01-13 15:43:46', 1),
(38, 'BE', 'I like Software Engineering<br>', 3, 'pu', '2016-01-12', 15, 0, 0, '2016-01-13 15:43:46', 1),
(39, 'Private', 'aaaaaaaaaa', 5, 'pr', '2016-01-12', 15, 0, 0, '2016-01-13 15:43:46', 1),
(40, 'Good Food Habbits', 'You have to follow good food habbits<br>', 10, 'pu', '2016-01-13', 4, 0, 0, '2016-01-13 15:43:46', 1),
(41, 'Welcome', '<i><b>sasadsdsf</b></i>', 4, 'pu', '2016-01-13', 16, 0, 0, '2016-01-13 15:43:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `story_comment`
--

CREATE TABLE IF NOT EXISTS `story_comment` (
  ` Comment_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Story_ID` int(10) NOT NULL,
  `Author_ID` int(6) NOT NULL,
  `Comment` varchar(250) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (` Comment_ID`),
  KEY `Story_ID` (`Story_ID`,`Author_ID`),
  KEY `Author_ID` (`Author_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `story_comment`
--

INSERT INTO `story_comment` (` Comment_ID`, `Story_ID`, `Author_ID`, `Comment`, `Time`) VALUES
(1, 22, 1, 'jhkuhk', '2016-01-10 06:31:51'),
(2, 22, 1, 'kkkkkkkkkk', '2016-01-10 06:44:50'),
(3, 22, 1, 'k.ndfl', '2016-01-10 06:45:45'),
(4, 33, 1, 'good', '2016-01-12 09:40:18'),
(5, 33, 1, 'gk', '2016-01-12 09:40:34'),
(6, 33, 1, 'gj', '2016-01-12 09:40:42'),
(7, 33, 1, 'kk', '2016-01-12 09:40:50'),
(8, 33, 1, 'kk', '2016-01-12 09:40:50'),
(9, 33, 15, 'sdfkjslfs', '2016-01-12 13:50:07'),
(10, 33, 1, 'good', '2016-01-13 07:15:42'),
(11, 33, 4, 'welcome', '2016-01-13 08:54:45'),
(12, 33, 1, 'good', '2016-01-13 10:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `story_view`
--

CREATE TABLE IF NOT EXISTS `story_view` (
  `User_ID` int(6) NOT NULL,
  `Story_ID` int(10) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_ID`,`Story_ID`),
  KEY `Story_ID` (`Story_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_update`
--

CREATE TABLE IF NOT EXISTS `system_update` (
  `Update_ID` int(2) NOT NULL,
  `Version` varchar(25) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Admin_ID` int(6) NOT NULL,
  PRIMARY KEY (`Update_ID`),
  KEY `system_update_ibfk_1` (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warning`
--

CREATE TABLE IF NOT EXISTS `warning` (
  `Warning_ID` int(2) NOT NULL AUTO_INCREMENT,
  `Receiver` int(6) NOT NULL,
  `Sender` int(6) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Description` varchar(250) NOT NULL,
  PRIMARY KEY (`Warning_ID`,`Receiver`),
  KEY `Receiver` (`Receiver`),
  KEY `warning_ibfk_1` (`Sender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `warning`
--

INSERT INTO `warning` (`Warning_ID`, `Receiver`, `Sender`, `Title`, `Description`) VALUES
(2, 1, 1, 'Warning', 'dkjsfskfs'),
(4, 1, 1, 'Warning', 'hello'),
(7, 1, 1, 'Warning', 'Post that you publish under Title Piano is reported as a violation of BOE term and reference'),
(10, 1, 28, 'Warning', 'Post that you publish under Title Football is reported as a violation of BOE term and reference'),
(11, 1, 28, 'Warning', 'Post that you publish under Title Hello World is reported as a violation of BOE term and reference'),
(12, 1, 28, 'Warning', 'Post that you publish under Title Hello World is reported as a violation of BOE term and reference'),
(13, 13, 28, 'Warning', 'Post that you publish under Title My trip is reported as a violation of BOE term and reference'),
(14, 1, 28, 'Warning', 'Post that you publish under Title How to be healthy is reported as a violation of BOE term and reference'),
(15, 1, 28, 'Warning', 'Post that you publish under Title test is reported as a violation of BOE term and reference');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`F_Registation_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `friend_add`
--
ALTER TABLE `friend_add`
  ADD CONSTRAINT `friend_add_ibfk_3` FOREIGN KEY (`Registation_ID`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `friend_add_ibfk_4` FOREIGN KEY (`F_Registation_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`Sender_ID`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`Receiver_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`Author_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `story_comment`
--
ALTER TABLE `story_comment`
  ADD CONSTRAINT `story_comment_ibfk_1` FOREIGN KEY (`Story_ID`) REFERENCES `story` (`Story_ID`),
  ADD CONSTRAINT `story_comment_ibfk_2` FOREIGN KEY (`Author_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `story_view`
--
ALTER TABLE `story_view`
  ADD CONSTRAINT `story_view_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `story_view_ibfk_2` FOREIGN KEY (`Story_ID`) REFERENCES `story` (`Story_ID`);

--
-- Constraints for table `system_update`
--
ALTER TABLE `system_update`
  ADD CONSTRAINT `system_update_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `warning`
--
ALTER TABLE `warning`
  ADD CONSTRAINT `warning_ibfk_2` FOREIGN KEY (`Receiver`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `warning_ibfk_3` FOREIGN KEY (`Sender`) REFERENCES `admin_user` (`adminNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
