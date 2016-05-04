-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 12:50 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pictalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `picture`, `userid`, `postid`) VALUES
(1, 'uploads/11012129_996319773735016_3107375424307603893_n.jpg', 2, 1),
(2, 'uploads/11136734_10206122270555217_3279967038185771831_n.jpg', 2, 1),
(3, 'uploads/bandicoot.jpg', 2, 1),
(5, 'uploads/itguy2.jpg', 1, 1),
(6, 'uploads/itguy3.jpg', 1, 1),
(7, 'uploads/itguy1.jpg', 1, 1),
(8, 'uploads/^AFC82D8F092A7BD065434EC801EE81A51E8DF3021D8A2D3824^pimgpsh_fullsize_distr.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `followid` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `followed` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`followid`, `follower`, `followed`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `picture`, `description`) VALUES
(1, 1, 'uploads/dwagon.png', 'asdasd'),
(2, 2, 'uploads/avatar_167ff9741ab5_128.png', 'Hello there.'),
(3, 1, 'uploads/b266852197dde38e002a58d75e65a4d877eaadde.jpg', 'asdasdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `phone` int(8) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `name`, `age`, `phone`, `gender`, `picture`) VALUES
(1, 'Zalamar', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'Tobias Rydberg', 69, 87654321, 1, 'uploads/enhanced-buzz-21987-1442522328-7.jpg'),
(2, 'Roache', '596a96cc7bf9108cd896f33c44aedc8a', 'Byggemand Bob', 19, 12345678, 1, 'uploads/bandicoot.jpg'),
(3, 'Victornator', '3baba1e741928d8c074d99d557763e8a', 'Victor', 18, 12345678, 0, NULL),
(4, 'random1', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'Random1', NULL, NULL, NULL, NULL),
(5, 'random2', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'Random2', NULL, NULL, NULL, NULL),
(6, 'random3', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'Random3', NULL, NULL, NULL, NULL),
(8, 'random4', '5f4dcc3b5aa765d61d8327deb882cf99', 'random4', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
