-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2016 at 06:58 AM
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
  PRIMARY KEY (`adminNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`adminNo`, `aUser`, `aPass`, `pAdmin`) VALUES
(1, 'chirantha', '6555159f8694dff7788074647e1d0376', 1),
(2, 'gihan', '536322e1ec4871bd61b673347521bf5a', 1),
(4, 'Nandasena', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(9, 'asdf', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(10, 'Charitha', '1f3b1da7434f70f4fe2b2c38425a7d83', 1),
(11, 'Magga', 'ad831ee5899d9ae8c99d9c001a945f5b', 1),
(12, 'Madura', '7815696ecbf1c96e6894b779456d330e', 1),
(13, 'Admin', ' 21232f297a57a5a743894a0e4a801fc3', 1),
(14, 'Chatura', '1b6bc9e65e6a0c0371be49647ed83bf0', 12),
(15, 'Chaturaa', '79f6234887f60a238c839a37228ff3db', 12),
(16, 'Kapila', 'a152e841783914146e4bcd4f39100686', 1),
(17, 'Charitha3', '25d55ad283aa400af464c76d713c07ad', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Title`, `Admin_ID`) VALUES
(1, 'Music', 13),
(2, 'Sports', 13),
(3, 'Software Developing', 13),
(4, 'Travelling', 13),
(5, 'Family Life', 13),
(6, 'Gaming', 13),
(7, 'Technology', 13),
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
(1, 2, '2016-01-05', 0, 1),
(1, 6, '2015-12-02', 0, 1),
(1, 14, '2016-01-05', 0, 1),
(2, 1, '2016-01-05', 0, 1),
(6, 1, '2015-12-02', 0, 1),
(14, 1, '2016-01-05', 0, 1);

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
  PRIMARY KEY (`Message_ID`),
  KEY `Sender_ID` (`Sender_ID`),
  KEY `Receiver_ID` (`Receiver_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Title`, `Date`, `Body`, `Sender_ID`, `Receiver_ID`) VALUES
(10, 'About the presentation', '2015-11-03 08:19:00', 'We are having our presentation at 2.15pm. So please come at time !!!', 5, 6),
(11, 'Results', '2015-11-03 08:20:59', 'Did u see the results yesterday ?', 5, 6),
(12, 'Results', '2015-11-03 08:22:51', 'Congratz', 5, 6),
(13, 'Results', '2015-11-03 08:23:53', 'I heard u got good results', 5, 6),
(14, 'THedbfk', '2015-11-03 08:25:00', 'dhvkjdfl', 5, 2),
(15, 'kjkj', '2015-11-03 08:25:55', 'jkjkj', 5, 2),
(16, 'PROJECT', '2015-11-03 09:30:14', 'HIKJJJ', 6, 4),
(17, 'hngng', '2015-11-03 09:44:08', 'ghjgjghj', 6, 1),
(18, 'project', '2015-11-18 08:27:54', 'project', 6, 4),
(19, 'project', '2015-11-18 08:33:08', 'bbbbb', 6, 4),
(20, 'new', '2015-11-18 08:33:57', 'newww', 6, 4),
(21, 'test', '2015-11-18 08:35:02', 'test1', 6, 1),
(22, 'hii', '2015-11-23 13:45:38', 'hellooo', 1, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`Registation_ID`, `User_Level`, `First_Name`, `Last_Name`, `Email_Address`, `Password`, `Reg.date`, `Profpic`, `Gender`, `Status`, `DOB`, `City`, `ip`, `lastLogin`, `loginStatus`) VALUES
(1, '', 'Binura', 'Dodangoda', 'bdodangoda@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Galle', '1', '2016-01-06 10:05:06', 1),
(2, '', 'Manusha', 'Kandage', 'manushapk@gmail.com', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'F', 'Single', '0000-00-00', 'Matara', '1', '2015-09-14 12:23:09', 1),
(3, '', 'aa', 'aaaa', 'a@s.l', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'fggh', '', '0000-00-00 00:00:00', 0),
(4, '', 'Amila', 'Sankha', 'amilasankha@gmail.com', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2015-09-30 00:24:23', 1),
(5, '', 'Binura', 'Dodangoda', 'bdodangoda@yahoo.com', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Galle', '1', '2015-11-03 14:07:34', 0),
(6, '', 'Deshan', 'Rathnayake', 'rmcdr92@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Maharagama', '1', '2015-12-02 12:19:54', 1),
(7, '', 'sampath', 'guslaljs', 'abcdef@gmail.com', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2015-11-03 13:42:25', 0),
(8, '', 'Charitha', 'Sampath', 'abc@gmail.com', 'ca2e0fd69849e9318be0e4661ad1c211', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'MAtara', '1', '2015-11-03 14:52:14', 0),
(9, '', 'bbb', 'bbb', 'bdodangoda@rock.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'asas', '', '0000-00-00 00:00:00', 0),
(10, '', 'bbb', 'bbb', 'bdodangoda@hotmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'sasas', '', '0000-00-00 00:00:00', 0),
(11, '', 'bbb', 'bbb', 'bb@dd.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'aaa', '', '0000-00-00 00:00:00', 0),
(12, '', 'Amila', 'Sankha', 'amila@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Matara', '1', '2015-11-17 14:06:07', 1),
(13, '', 'Sathira', 'Dodangoda', 'sathira@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'Galle', '', '0000-00-00 00:00:00', 0),
(14, '', 'dfdsfsdf', 'sfdsfsf', 'fdsfsddd@sdfsf.dsf', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '', 'M', 'Single', '0000-00-00', 'dsfdfs', '', '0000-00-00 00:00:00', 0);

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
  PRIMARY KEY (`Story_ID`),
  KEY `Author_ID` (`Author_ID`),
  KEY `Category` (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`Story_ID`, `Title`, `Body`, `Category_ID`, `Type`, `Publish_Date`, `Author_ID`, `Like_Count`, `Dislike_Feed`) VALUES
(1, 'Guitar', 'The guitar is a popular musical instrument classified as a string instrument with anywhere from 4 to 18 strings, usually having 6. The sound is projected either acoustically or through electrical amplificatio', 1, 'pu', '2015-10-01', 5, 0, 0),
(2, 'Cricket', 'Cricket is a bat-and-ball game played between two teams of 11 players each on a field at the centre of which is a rectangular 22-yard-long pitch. The game is played by 120 million players in many countries, making it the world''s second most popular s', 2, 'pu', '2015-10-08', 1, 256, 2),
(3, 'Drum', 'The drum is a member of the percussion group of musical instruments. In the Hornbostel-Sachs classification system, it is a membranophone.[1] Drums consist of at least one membrane, called a drumhead or drum skin, that is stretched over a shell and s', 1, 'pu', '2015-09-02', 2, 56, 1),
(4, 'Java', 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented,[12] and specifically designed to have as few implementation dependencies as possible.', 3, 'pu', '2015-10-12', 5, 54, 0),
(5, 'Kithulgala', 'Kitulgala is a small town in the west of Sri Lanka. Kitulgala is also a base for white-water rafting,[1] which starts a few kilometres upstream.', 4, 'pu', '2015-10-08', 2, 56, 11),
(6, 'Foot Ball', 'Association football, more commonly known as football or soccer,is a sport played between two teams of eleven players with a spherical ball. It is played by 250 million players in over 200 countries, making it the world''s most popular sport.', 2, 'pu', '2015-09-16', 2, 569, 12),
(7, 'NFS', 'Most Wanted is the best car game.', 6, 'pu', '2015-10-08', 2, 563, 47),
(8, 'COD4', 'fighting game.......................', 6, 'pu', '2015-10-14', 3, 256, 45),
(9, 'NANO', 'Nanotechnology ("nanotech") is manipulation of matter on an atomic, molecular, and supramolecular scale.', 7, 'pu', '2015-08-25', 1, 1236, 1),
(10, 'Children', 'Biologically, a child (plural: children) is a human between the stages of birth and puberty. The legal definition of child generally refers to a minor, otherwise known as a person younger than the age of majority.', 5, 'pu', '2015-10-18', 2, 12, 1),
(11, 'Classical Music', 'Classical music is art music produced or rooted in the traditions of Western music, including both liturgical (religious) and secular music. While a similar term is also used to refer to the period from 1750-1820 (the Classical period), this article is about the broad span of time from roughly the 11th century to the present day, which includes the Classical period and various other periods. The central norms of this tradition became codified between 1550 and 1900, which is known as the common practice period. The major time divisions of classical music are as follows: the early music period, which includes the Medieval (500–1400) and the Renaissance (1400–1600) eras; the Common practice period, which includes the Baroque (1600–1750), Classical (1750–1820), and Romantic eras (1804–1910); and the 20th century (1901–2000) which includes the modern (1890–1930) that overlaps from the late 19th-century, the high modern (mid 20th-century), and contemporary or postmodern (1975–present) eras.', 1, 'pu', '2015-11-01', 3, 256, 1),
(12, 'Western music (North America)', 'Western music is a form of American folk music composed by and about the people who settled and worked throughout the Western United States and Western Canada. Directly related musically to old English, Scottish, and Irish folk ballads, Western music celebrates the life of the cowboy on the open ranges and prairies of Western North America. The Mexican folk music of the American Southwest also influenced the development of this genre. Western music shares similar roots with Appalachian music (also called hillbilly music), which developed in Appalachia separately from, but parallel to, the Western music genre. The music industry of the mid-20th century grouped the two genres together under the banner of country and western music, later amalgamated into the modern name, country music.', 1, 'pu', '2015-10-21', 3, 1256, 25),
(13, 'Projec I G I', 'Project I.G.I.: I''m Going In (released in Europe as simply Project I.G.I.) is a tactical first-person shooter developed by Innerloop Studios and released on December 15, 2000 by Eidos Interactive. Upon release the game received mixed reviews due to a number of shortcomings, including poorly programmed A.I., lack of a mid-game save option, and the lack of multiplayer features. However it was praised for its superb sound design and graphics, thanks in part to its use of a proprietary game engine that was previously used in Innerloop''s Joint Strike Fighter.', 7, 'pu', '2015-10-14', 2, 456, 23),
(14, 'Sigiriya', 'Sigiriya (Lion Rock) is an ancient palace located in the central Matale District near the town of Dambulla in the Central Province, Sri Lanka. The name refers to a site of historical and archaeological significance that is dominated by a massive column of rock nearly 200 metres (660 ft) high. According to the ancient Sri Lankan chronicle the Culavamsa, this site was selected by King Kasyapa (477 – 495 CE) for his new capital. He built his palace on the top of this rock and decorated its sides with colourful frescoes. On a small plateau about halfway up the side of this rock he built a gateway in the form of an enormous lion. The name of this place is derived from this structure —SIGIRIYA, the Lion Rock. The capital and the royal palace was abandoned after the king''s death. It was used as a Buddhist monastery until the 14th century.', 4, 'pu', '2015-08-12', 5, 466, 45),
(15, 'Rugby World Cup', 'All blacks won the Rugby World cup 2015<br>', 2, 'pu', '2015-11-03', 5, 0, 0),
(16, 'Age of Empires', 'My favourite game is Age of Empires !!!<br>', 6, 'pu', '2015-11-03', 5, 0, 0),
(17, 'Galle Fort', '<b>Galle Fort</b>, in the Bay of Galle on the southwest coast of Sri Lanka, was built first in 1588 by the Portugese, then extensively fortified by the Dutuch\n during the 17th century from 1649 onwards. It is a historical, \narchaeological and architectural heritage monument, which even after \nmore than 423 years maintains a polished appearance, due to extensive \nreconstruction work done by Archaeological Department of Sri Lanka', 4, 'pu', '2015-11-03', 6, 0, 0),
(18, 'Experience sharing', 'BOE is good system to share expeirences<br>', 3, 'pu', '2015-11-03', 5, 0, 0),
(19, 'SL vs WI', 'It was a nice match a day before yesterday.<br>', 2, 'pu', '2015-11-03', 6, 0, 0),
(20, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03', 6, 0, 0),
(21, 'University', '<div align="center"><b>hjhjidskhdlasi hddoasuj</b><br></div>', 7, 'pu', '2015-11-03', 6, 0, 0),
(22, 'Piano', 'I am playing <b>piano</b>', 1, 'pu', '2015-11-17', 1, 0, 0),
(23, 'Football', 'It was nice to watch the football match <b>yesterday </b>!!!', 2, 'pu', '2015-11-19', 1, 0, 0),
(24, 'Project', 'Ajax is used !!!', 7, 'pu', '2015-11-19', 1, 0, 0),
(25, 'Hello World', 'I like to have a <b>good </b>family life<br>', 5, 'pu', '2015-11-23', 1, 0, 0);

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
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin_user` (`adminNo`);

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
