
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2017 at 05:06 PM
-- Server version: 10.0.28-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u875579077_arif`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`, `email`) VALUES
('Mohammad Arif', '8713996413', 'aarif2064@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `postid` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `date`, `email`, `name`, `postid`) VALUES
(19, 'fdfdffh', '2017-03-09', 'aarif2065@gmail.com', 'mohammad arif', 10),
(18, 'Fhdgy', '2016-09-09', 'aanchal08107@gmail.com', 'Aanchal Sharma ', 12),
(17, 'commnt module ok', '2016-07-02', 'arif_2064@rediffmail.com', 'arif', 10),
(16, 'testing comment module', '2016-07-02', 'arif_2064@rediffmail.com', 'arif', 10);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `descp` varchar(900) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `email`, `name`, `profilepic`, `descp`, `date`) VALUES
(4, 'arif_2064@rediffmail.com', 'arif', '../profile/uploads/Technology-Wallpapers-1.jpg', '', '2016-09-11'),
(5, 'aarif2065@gmail.com', 'mohammad arif', '../profile/uploads/Desert.jpg', '', '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `town` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `email`, `location`, `town`, `date`) VALUES
(9, 'zoyashafee9@gmail.com', '', 'Islamabad\r\n', '2016-07-01'),
(8, 'aarif2064@gmail.com', 'Chandigarh', '', '2016-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `messege`
--

CREATE TABLE IF NOT EXISTS `messege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fmsg` varchar(100) NOT NULL,
  `tmsg` varchar(100) NOT NULL,
  `messege` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `messege`
--

INSERT INTO `messege` (`id`, `fmsg`, `tmsg`, `messege`, `date`, `status`) VALUES
(33, 'arif_2064@rediffmail.com', 'adil.649@gmail.com', 'helooo', '2016-08-25 15:35:19', 'read'),
(32, 'adil.649@gmail.com', 'arif_2064@rediffmail.com', 'hello\r\n', '2016-08-25 15:35:01', 'read'),
(34, 'aarif2065@gmail.com', 'aarif2064@gmail.com', 'hiii', '2017-03-09 07:55:33', 'unread'),
(30, 'aarif2064@gmail.com', 'abidsefi@outlook.com', 'sir the messege module working is fine but it has some problems that i will let you know ', '2016-07-04 04:35:19', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `myprofile`
--

CREATE TABLE IF NOT EXISTS `myprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `std` varchar(100) NOT NULL DEFAULT 'Not Available',
  `work` varchar(100) NOT NULL DEFAULT 'Not Available',
  `hschool` varchar(100) NOT NULL DEFAULT 'Not Available',
  `colg` varchar(100) NOT NULL DEFAULT 'Not Available',
  `htown` varchar(100) NOT NULL DEFAULT 'Not Available',
  `ccity` varchar(100) NOT NULL DEFAULT 'Not Available',
  `fb` varchar(100) NOT NULL DEFAULT 'Not Available',
  `dob` varchar(100) NOT NULL DEFAULT 'Not Available',
  `gender` varchar(20) NOT NULL DEFAULT 'Not Available',
  `religion` varchar(100) NOT NULL DEFAULT 'Not Available',
  `about` varchar(500) NOT NULL DEFAULT 'Not Available',
  `fq` varchar(1000) NOT NULL DEFAULT 'Not Available',
  `website` varchar(100) NOT NULL DEFAULT 'Not Available',
  `phone` varchar(20) NOT NULL DEFAULT 'Not Updated Yet',
  PRIMARY KEY (`id`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `myprofile`
--

INSERT INTO `myprofile` (`id`, `email`, `std`, `work`, `hschool`, `colg`, `htown`, `ccity`, `fb`, `dob`, `gender`, `religion`, `about`, `fq`, `website`, `phone`) VALUES
(9, 'zoyashafee9@gmail.com', 'studied B_tech', '', 'Al_sarwat convent senior secondary school.', 'Baba Ghulam Shah Badshah University', 'Islamabad', '', 'Yusra shafi', '', 'Female', '', '', '', '', '9906578310'),
(8, 'aarif2064@gmail.com', ' M.E Big Data and Analytics At Chandigarh university', 'Web Developer', 'Sainik School Manasbal', 'Kashmir Government Polytechnic', 'srinagar', 'Chandigarh', 'mohammadarif17', '1993-08-17', 'Male', 'Islam', '', '', 'companion.pe.hu', '9797415208'),
(7, '', '', '', '', '', '', '', '', '', '', '', '', 'xvmxcmv', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `stitle` varchar(400) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `post` varchar(9000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `email`, `name`, `title`, `stitle`, `pic`, `post`, `date`) VALUES
(11, 'abidsefi@outlook.com', 'Mohd Abid', 'Testing', 'Testing Blog', 'uploads/p-Amazing-3D-Alphabet-Art-Sculptures-By-FOREAL.jpg', 'I am testing blog page', '2016-07-03'),
(10, 'aarif2064@gmail.com', 'Mohammad Arif', 'welcome users', 'share your ideas here', 'uploads/Technology-Wallpaper-6.jpg', 'welcome to my website..!!', '2016-07-01'),
(12, 'arif_2064@rediffmail.com', 'arif', 'testing chats ', 'example', 'uploads/img-1.png', 'sdflksnd sdfnsk', '2016-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profilepic` varchar(200) NOT NULL,
  `about` varchar(1000) NOT NULL DEFAULT 'Not Updated Yet',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profilepic`, `about`, `email`) VALUES
(9, 'uploads/s.jpg', 'Mohd Abid Sefi is my name i am just testing this site', 'abidsefi@outlook.com'),
(8, 'uploads/Chrysanthemum.jpg', '', 'aarif2064@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`email`,`phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `phone`, `password`) VALUES
(15, 'Faisal Shabir ', 'fslshbr@gmail.com ', 2147483647, 'faisalsha'),
(14, 'Yusra', 'zoyashafee9', 2147483647, 'yusrashafi'),
(13, 'Adil Farooq', 'adil.649@gmail.com', 2147483647, 'manhaj649'),
(16, 'yusra', 'zoyashafee9@gmail.com', 2147483647, 'yusrashafi'),
(17, 'Zahid J Malik', 'zahidmalik187@gmail.com', 2147483647, '12345678'),
(18, 'arif', 'arif_2064@rediffmail.com', 2147483647, 'qwertyuiop'),
(19, 'Mohd Abid', 'abidsefi@outlook.com', 2147483647, 'aebi@1989'),
(20, 'Aanchal Sharma ', 'aanchal08107@gmail.com', 2147483647, '12345678'),
(21, 'Mohammad Arif', 'aarif2064@gmail.com', 2147483647, 'qwerty123'),
(22, 'mohammad arif', 'aarif2065@gmail.com', 2147483647, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE IF NOT EXISTS `tbl_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `postid`, `name`, `email`) VALUES
(3, 5, 'example', 'example@gmail.com'),
(4, 9, 'example', 'example@gmail.com'),
(6, 9, 'Mohammad Arif', 'aarif2064@gmail.com'),
(7, 8, 'example', 'example@gmail.com'),
(8, 7, 'example', 'example@gmail.com'),
(9, 10, 'arif', 'arif_2064@rediffmail.com'),
(10, 11, 'arif', 'arif_2064@rediffmail.com'),
(11, 12, 'Aanchal Sharma ', 'aanchal08107@gmail.com'),
(12, 12, 'arif', 'arif_2064@rediffmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
