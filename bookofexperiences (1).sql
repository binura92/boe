-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2016 at 05:30 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  PRIMARY KEY (`adminNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(2) NOT NULL,
  `Category_Title` varchar(25) NOT NULL,
  `Admin_ID` int(6) NOT NULL,
  PRIMARY KEY (`Category_ID`),
  KEY `Admin_ID` (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'Sport', 1),
(12, 'Game', 1),
(13, 'Swiming', 1);

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
(1, 4, '2016-01-10', 1, 4),
(4, 1, '2016-01-10', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Message_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(15) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Body` varchar(250) NOT NULL,
  `Sender_ID` int(6) NOT NULL,
  `Receiver_ID` int(6) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Message_ID`),
  KEY `Sender_ID` (`Sender_ID`),
  KEY `Receiver_ID` (`Receiver_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Title`, `Date`, `Body`, `Sender_ID`, `Receiver_ID`, `view`) VALUES
(1, 'About java clas', '2015-09-30 18:30:00', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 1, 4, 1),
(2, 'About java clas', '2015-10-04 18:30:00', 'ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 4, 1, 0),
(3, 'Group project', '2015-10-02 18:30:00', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 1, 4, 1),
(4, 'About java clas', '2015-10-15 18:30:00', 'SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS', 1, 4, 1),
(18, 'test2', '2015-11-18 09:58:01', 'test test', 4, 1, 0),
(19, 'Test3', '2015-11-19 04:57:15', 'test test', 4, 1, 0),
(20, 'test', '2015-12-02 05:07:58', 'test 3', 4, 4, 1),
(21, 'test', '2015-12-02 05:09:24', 'abc', 4, 4, 1),
(22, 'test', '2015-12-02 05:11:03', 'as', 4, 4, 1),
(23, 'test', '2015-12-02 05:13:07', 'test test', 4, 4, 1),
(24, 'test', '2015-12-02 05:15:02', 'aaaa', 4, 1, 1),
(25, 'test', '2015-12-02 05:15:49', 'aaaaaaaaaaaaaa', 4, 1, 1),
(26, 'test', '2015-12-02 05:17:50', 'sjnd', 4, 1, 1),
(27, 'test', '2015-12-02 05:21:05', 'aaaa', 4, 1, 1),
(28, 'test', '2015-12-02 05:21:15', 'aaaa', 4, 1, 1),
(29, 'test', '2015-12-02 05:22:59', 'test 123', 4, 1, 1),
(30, 'test', '2015-12-02 05:36:45', 'kmkm', 4, 4, 1),
(31, 'test5', '2015-12-02 05:47:19', 'asdfgh', 4, 1, 0),
(32, 'll,l,', '2016-01-05 04:07:34', 'llll', 4, 4, 1),
(33, 'Java', '2016-01-06 10:40:14', 'ddd', 4, 4, 1),
(34, 'java', '2016-01-06 10:42:00', 'sssssssssssssss', 4, 4, 1),
(35, 'test1', '2016-01-06 10:59:18', 'kkk', 4, 4, 1),
(36, 'test', '2016-01-06 11:01:20', 'zzzzzzzz', 4, 4, 1),
(37, 'java', '2016-01-08 05:55:21', 'jjjj', 4, 4, 1),
(38, 'test 2', '2016-01-08 05:56:36', 'ssssssssssss', 4, 4, 1),
(39, 'java', '2016-01-08 05:57:20', '22222222222222222', 4, 4, 1),
(40, 'java', '2016-01-08 06:08:19', 'aaaaaaaaaaaaaaa', 4, 4, 1),
(41, 'Java', '2016-01-08 06:12:04', 'kjj', 4, 4, 1),
(42, 'kk', '2016-01-09 17:10:41', 'aaaaaaaaaaaaaaaaaa', 4, 1, 1),
(43, 'kk', '2016-01-09 17:11:26', 'kkk', 4, 4, 1),
(44, 'll', '2016-01-09 17:16:28', 'llll', 4, 4, 1),
(45, 'mmmmmmm', '2016-01-09 17:17:30', 'llllllllll', 4, 4, 1),
(46, 'mmmmmmm', '2016-01-10 05:30:26', 'kkk', 4, 4, 1),
(47, 'kk', '2016-01-10 05:32:03', 'ldssd', 4, 4, 0),
(48, 'nn', '2016-01-10 05:36:02', 'mm', 4, 4, 0),
(49, 'asd', '2016-01-10 05:38:38', 'asd', 4, 4, 0),
(50, 'test', '2016-01-10 05:40:17', '2015.01.10', 4, 4, 0),
(51, 'aaaa', '2016-01-10 05:43:58', 'aaaaaaaaaa', 4, 4, 1),
(52, 'test', '2016-01-10 05:46:25', '2015.', 4, 1, 1),
(53, 'test', '2016-01-10 05:46:54', 'sknz', 4, 4, 0),
(54, 'aaaa', '2016-01-10 05:47:33', 'kkkkkkkkkkkkkk', 4, 4, 1),
(55, ',n,', '2016-01-10 06:54:10', 'n,n', 4, 1, 0),
(56, ' .m.', '2016-01-10 06:55:02', '.m.', 4, 1, 0),
(57, 'kjk', '2016-01-10 06:56:46', 'mjl', 4, 1, 0),
(58, 'aaaa', '2016-01-10 06:57:24', 'bjbhj', 4, 4, 0),
(59, 'k;lk;k;l', '2016-01-10 06:58:24', 'nkl.', 4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE IF NOT EXISTS `registered_user` (
  `Registation_ID` int(6) NOT NULL AUTO_INCREMENT,
  `User_Level` varchar(1) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`Registation_ID`, `User_Level`, `First_Name`, `Last_Name`, `Email_Address`, `Password`, `Reg.date`, `Profpic`, `Gender`, `Status`, `DOB`, `City`, `ip`, `lastLogin`, `loginStatus`) VALUES
(1, '', 'Binura', 'Dodangoda', 'bdodangoda@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Galle', '1', '2015-12-02 12:14:36', 1),
(2, '', 'Manusha', 'Kandage', 'manushapk@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0000-00-00', '', 'F', 'Single', '0000-00-00', 'Matara', '1', '2015-09-14 12:23:09', 1),
(3, '', 'aa', 'aaaa', 'a@s.l', '25d55ad283aa400af464c76d713c07ad', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'fggh', '', '0000-00-00 00:00:00', 0),
(4, '', 'Amila', 'Sankha', 'amilasankha@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2016-01-10 22:20:16', 1);

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
  PRIMARY KEY (`Report_ID`),
  KEY `Reporter_ID` (`Reporter_ID`,`Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Report_ID`, `Reporter_ID`, `Story_ID`, `Description`, `Time`) VALUES
(1, 1, 10, 'description', '2016-01-10 10:10:28'),
(2, 10, 20, 'description', '2016-01-10 10:13:58'),
(3, 4, 20, 'description', '2016-01-10 10:15:22'),
(4, 4, 22, 'description', '2016-01-10 10:16:08'),
(5, 4, 22, 'ghjkl', '2016-01-10 10:24:38'),
(6, 4, 22, 'description', '2016-01-10 10:32:17'),
(7, 4, 22, 'Its annoying or not interesting', '2016-01-10 10:50:39'),
(8, 4, 22, 'I think it should not be on BE', '2016-01-10 10:52:48'),
(9, 4, 11, 'It is spam', '2016-01-10 10:55:31'),
(10, 4, 22, 'I think it should not be on BE', '2016-01-10 10:56:38'),
(11, 4, 1, 'It is spam', '2016-01-10 10:57:32'),
(12, 4, 11, 'I think it should not be on BE', '2016-01-10 11:14:17'),
(13, 4, 14, 'It is spam', '2016-01-10 16:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `Story_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(25) NOT NULL,
  `Body` char(250) NOT NULL,
  `Category_ID` int(2) NOT NULL,
  `Type` varchar(2) NOT NULL,
  `Publish_Date` datetime NOT NULL,
  `Author_ID` int(6) NOT NULL,
  `Like_Count` int(4) NOT NULL,
  `Dislike_Feed` int(4) NOT NULL,
  `lastUpdate` datetime NOT NULL,
  PRIMARY KEY (`Story_ID`),
  KEY `Author_ID` (`Author_ID`),
  KEY `Category` (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`Story_ID`, `Title`, `Body`, `Category_ID`, `Type`, `Publish_Date`, `Author_ID`, `Like_Count`, `Dislike_Feed`, `lastUpdate`) VALUES
(1, 'Guitar', 'The guitar is a popular musical instrument classified as a string instrument with anywhere from 4 to 18 strings, usually having 6. The sound is projected either acoustically or through electrical amplificatio', 1, 'pu', '2015-10-01 00:00:00', 1, 0, 0, '2016-01-10 22:31:56'),
(2, 'Cricket', 'Cricket is a bat-and-ball game played between two teams of 11 players each on a field at the centre of which is a rectangular 22-yard-long pitch. The game is played by 120 million players in many countries, making it the world''s second most popular s', 2, 'pu', '2015-10-08 00:00:00', 1, 256, 2, '2016-01-10 22:31:56'),
(3, 'Drum', 'The drum is a member of the percussion group of musical instruments. In the Hornbostel-Sachs classification system, it is a membranophone.[1] Drums consist of at least one membrane, called a drumhead or drum skin, that is stretched over a shell and s', 1, 'pu', '2015-09-02 00:00:00', 2, 56, 1, '2016-01-10 22:31:56'),
(4, 'Java', 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented,[12] and specifically designed to have as few implementation dependencies as possible.', 3, 'pu', '2015-10-12 00:00:00', 4, 54, 0, '2016-01-10 22:31:56'),
(5, 'Kithulgala', 'Kitulgala is a small town in the west of Sri Lanka. Kitulgala is also a base for white-water rafting,[1] which starts a few kilometres upstream.', 4, 'pu', '2015-10-08 00:00:00', 2, 56, 11, '2016-01-10 22:31:56'),
(6, 'Foot Ball', 'Association football, more commonly known as football or soccer,is a sport played between two teams of eleven players with a spherical ball. It is played by 250 million players in over 200 countries, making it the world''s most popular sport.', 2, 'pu', '2015-09-16 00:00:00', 2, 569, 12, '2016-01-10 22:31:56'),
(7, 'NFS', 'Most Wanted is the best car game.', 6, 'pu', '2015-10-08 00:00:00', 2, 563, 47, '2016-01-10 22:31:56'),
(8, 'COD4', 'fighting game.......................', 6, 'pu', '2015-10-14 00:00:00', 3, 256, 45, '2016-01-10 22:31:56'),
(9, 'NANO', 'Nanotechnology ("nanotech") is manipulation of matter on an atomic, molecular, and supramolecular scale.', 7, 'pu', '2015-08-25 00:00:00', 1, 1236, 1, '2016-01-10 22:31:56'),
(10, 'Children', 'Biologically, a child (plural: children) is a human between the stages of birth and puberty. The legal definition of child generally refers to a minor, otherwise known as a person younger than the age of majority.', 5, 'pu', '2015-10-18 00:00:00', 2, 12, 1, '2016-01-10 22:31:56'),
(11, 'Classical Music', 'Classical music is art music produced or rooted in the traditions of Western music, including both liturgical (religious) and secular music. While a similar term is also used to refer to the period from 1750-1820 (the Classical period), this article', 1, 'pu', '2015-11-01 00:00:00', 3, 256, 1, '2016-01-10 22:31:56'),
(12, 'Western music (North Amer', 'Western music is a form of American folk music composed by and about the people who settled and worked throughout the Western United States and Western Canada. Directly related musically to old English, Scottish, and Irish folk ballads, Western music', 1, 'pu', '2015-10-21 00:00:00', 3, 1256, 25, '2016-01-10 22:31:56'),
(13, 'Projec I G I', 'Project I.G.I.: I''m Going In (released in Europe as simply Project I.G.I.) is a tactical first-person shooter developed by Innerloop Studios and released on December 15, 2000 by Eidos Interactive. Upon release the game received mixed reviews due to a', 7, 'pu', '2015-10-14 00:00:00', 2, 456, 23, '2016-01-10 22:31:56'),
(14, 'Sigiriya', 'Sigiriya (Lion Rock) is an ancient palace located in the central Matale District near the town of Dambulla in the Central Province, Sri Lanka. The name refers to a site of historical and archaeological significance that is dominated by a massive colu', 4, 'pu', '2015-08-12 00:00:00', 4, 466, 45, '2016-01-10 22:31:56'),
(15, 'Rugby World Cup', 'All blacks won the Rugby World cup 2015<br>', 2, 'pu', '2015-11-03 00:00:00', 4, 0, 0, '2016-01-10 22:31:56'),
(16, 'Age of Empires', 'My favourite game is Age of Empires !!!<br>', 6, 'pu', '2015-11-03 00:00:00', 2, 0, 0, '2016-01-10 22:31:56'),
(17, 'Galle Fort', '<b>Galle Fort</b>, in the Bay of Galle on the southwest coast of Sri Lanka, was built first in 1588 by the Portugese, then extensively fortified by the Dutuch\n during the 17th century from 1649 onwards. It is a historical, \narchaeological and archite', 4, 'pu', '2015-11-03 00:00:00', 3, 0, 0, '2016-01-10 22:31:56'),
(18, 'Experience sharing', 'BOE is good system to share expeirences<br>', 3, 'pu', '2015-11-03 00:00:00', 4, 0, 0, '2016-01-10 22:31:56'),
(19, 'SL vs WI', 'It was a nice match a day before yesterday.<br>', 2, 'pu', '2015-11-03 00:00:00', 3, 0, 0, '2016-01-10 22:31:56'),
(20, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03 00:00:00', 3, 0, 0, '2016-01-10 22:31:56'),
(21, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03 00:00:00', 3, 0, 0, '2016-01-10 22:31:56'),
(22, 'Piano', 'I am playing <b>piano</b>', 1, 'pu', '2015-11-17 00:00:00', 1, 0, 0, '2016-01-10 22:31:56'),
(23, 'Football', 'It was nice to watch the football match <b>yesterday </b>!!!', 2, 'pu', '2015-11-19 00:00:00', 1, 0, 0, '2016-01-10 22:31:56'),
(24, 'Project', 'Ajax is used !!!', 7, 'pu', '2015-11-19 00:00:00', 1, 0, 0, '2016-01-10 22:31:56'),
(25, 'Hello World', 'I like to have a <b>good </b>family life<br>', 5, 'pu', '2015-11-23 00:00:00', 1, 0, 0, '2016-01-10 22:31:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `story_comment`
--

INSERT INTO `story_comment` (` Comment_ID`, `Story_ID`, `Author_ID`, `Comment`, `Time`) VALUES
(1, 22, 4, 'Good', '2016-01-08 11:08:14'),
(2, 22, 3, 'Nice', '2016-01-08 11:09:06'),
(3, 22, 1, 'AAAAAAAA', '2016-01-08 11:09:06'),
(4, 1, 1, '100', '2016-01-08 15:48:59'),
(5, 22, 4, 'lcx;', '2016-01-08 15:55:09'),
(6, 22, 4, ',m,', '2016-01-08 15:55:42'),
(7, 22, 4, 'l,;zx', '2016-01-08 15:58:25'),
(8, 11, 4, 'llllllllll', '2016-01-08 15:58:55'),
(9, 11, 4, 'good', '2016-01-08 17:24:03'),
(10, 22, 4, 'finish', '2016-01-08 18:06:43'),
(11, 12, 4, 'mmll', '2016-01-08 18:08:56'),
(12, 1, 4, 'good', '2016-01-08 18:48:09'),
(13, 11, 4, 'finish', '2016-01-08 19:36:41'),
(14, 11, 4, 'ok', '2016-01-08 19:37:03'),
(15, 22, 4, 'llllkmklkl', '2016-01-10 04:24:52'),
(16, 22, 4, '', '2016-01-10 09:45:29'),
(17, 22, 4, '', '2016-01-10 09:45:41'),
(18, 22, 4, '', '2016-01-10 09:46:02'),
(19, 11, 4, 'lm,m', '2016-01-10 11:14:38'),
(20, 11, 4, 'llllllllllllll', '2016-01-10 11:14:47'),
(21, 14, 4, 'sigiriya', '2016-01-10 16:56:34'),
(22, 4, 4, '222', '2016-01-10 16:58:34'),
(23, 2, 4, 'ddddddddddddddddddddddddddddddddddddddddddddddddsssssssssssssssssssssssssssssssssssssssssssssssssddddddddddddddddddddddddddddddddddddssssssssssssssssssssssssssssssssssssssssddddddddddddddddddddddddddddddddssssssssssssssssssssssssssssssss', '2016-01-10 17:01:56');

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
  `Warning_ID` int(2) NOT NULL,
  `Receiver` int(6) NOT NULL,
  `Sender` int(6) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Description` varchar(250) NOT NULL,
  PRIMARY KEY (`Warning_ID`,`Receiver`),
  KEY `Receiver` (`Receiver`),
  KEY `warning_ibfk_1` (`Sender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`F_Registation_ID`) REFERENCES `registered_user` (`Registation_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Sender_ID`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Receiver_ID`) REFERENCES `registered_user` (`Registation_ID`);

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
  ADD CONSTRAINT `warning_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `registered_user` (`Registation_ID`),
  ADD CONSTRAINT `warning_ibfk_2` FOREIGN KEY (`Receiver`) REFERENCES `registered_user` (`Registation_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
