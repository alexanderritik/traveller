-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 02:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'ritik', 'ritik');

-- --------------------------------------------------------

--
-- Table structure for table `follow_unfollow`
--

CREATE TABLE `follow_unfollow` (
  `id` int(100) NOT NULL,
  `following_id` int(10) NOT NULL,
  `follower_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_unfollow`
--

INSERT INTO `follow_unfollow` (`id`, `following_id`, `follower_id`) VALUES
(26, 1, 7),
(120, 2, 7),
(62, 11, 2),
(125, 10, 11),
(127, 7, 2),
(126, 1, 2),
(124, 2, 11),
(123, 7, 11),
(121, 11, 7),
(65, 10, 1),
(119, 2, 1),
(118, 7, 1),
(116, 11, 1),
(128, 1, 10),
(129, 9, 8),
(130, 10, 9),
(131, 8, 9),
(132, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `id` int(100) NOT NULL,
  `id_by` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`id`, `id_by`, `image`, `comment`) VALUES
(1, '8', 'IMG20180718175509.jpg', 'hawasi'),
(2, '8', '1 (65).jpg', 'khatarnak'),
(3, '8', '1 (65).jpg', 'khatarnak'),
(4, '8', '1 (38).jpg', 'bang'),
(5, '8', '1 (614).jpg', 'soja munna'),
(6, '8', '1 (28).jpg', 'oops !'),
(7, '7', '1 (1).png', 'rud'),
(8, '7', '1 (26).png', 'hellp'),
(9, '1', '1 (14).png', 'HELLO'),
(10, '11', '1 (33).jpg', 'hahah'),
(11, '2', '1 (390).jpg', 'fucck of'),
(12, '7', '20181109_100733.jpg', 'meme'),
(13, '7', '20181109_100802.jpg', 'kk'),
(14, '2', '20181109_105043.jpg', 'pooja');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(200) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `receiver_id` varchar(10) NOT NULL,
  `seen` int(5) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `message`, `receiver_id`, `seen`, `time`) VALUES
(7, '1', 'hi bhai kasie ho', '10', 1, '2019-08-23 12:20:38'),
(8, '1', 'hi bhai kasie ho', '10', 1, '2019-08-23 12:21:45'),
(9, '1', 'hi bhai kasie ho', '10', 1, '2019-08-23 12:22:15'),
(10, '2', 'acha ho tum', '1', 1, '2019-08-23 12:24:12'),
(11, '2', 'peepal ke ped ke neiche ho kya', '1', 1, '2019-08-23 12:25:21'),
(12, '2', 'nhi apne kamre me', '1', 1, '2019-08-23 12:47:35'),
(13, '1', 'ha bahi apne kamre mein', '2', 1, '2019-08-23 12:48:47'),
(14, '2', 'khane khane kab chaloge', '1', 1, '2019-08-23 12:54:09'),
(19, '2', 'abhi basketball khelne ja raha ho', '1', 1, '2019-08-23 17:23:59'),
(16, '1', 'abhi thod der mein', '2', 1, '2019-08-23 12:54:39'),
(17, '1', 'kya kar rahe ho', '2', 1, '2019-08-23 13:01:55'),
(18, '2', 'hi suchit', '11', 1, '2019-08-23 13:13:30'),
(20, '11', 'ha bhai bolo', '2', 1, '2019-08-23 17:37:24'),
(21, '2', 'tab chicken khana kab suru karoge', '11', 1, '2019-08-23 17:38:19'),
(22, '1', 'mere bina', '2', 1, '2019-08-23 17:38:59'),
(23, '2', 'tum kab aoge\r\n', '1', 1, '2019-08-23 17:39:28'),
(24, '2', 'jis din tum khana choda doge ', '11', 1, '2019-08-23 17:40:49'),
(25, '11', 'mera reply tum hi de diye', '2', 1, '2019-08-23 17:42:07'),
(26, '2', 'kya kare tum typing bhout slow karte ho', '11', 1, '2019-08-23 17:42:34'),
(27, '11', 'ka hal hai', '2', 1, '2019-08-23 17:44:14'),
(28, '2', 'zindagi barbad ho gya', '11', 1, '2019-08-23 17:54:40'),
(29, '11', 'kahe bhaiya', '2', 1, '2019-08-23 17:55:17'),
(30, '2', 'tab zao so jao', '11', 1, '2019-08-23 17:57:28'),
(31, '11', 'abhi rat baki hai', '2', 1, '2019-08-23 18:00:00'),
(32, '2', 'kal janmastmi hai', '11', 1, '2019-08-23 18:00:46'),
(33, '11', 'chale ga guddu ke yaha darega to nhi ayega na', '2', 1, '2019-08-23 18:07:03'),
(34, '2', 'me phuch gya tum kaha ho', '11', 1, '2019-08-23 18:53:48'),
(35, '1', 'pta nhi', '2', 1, '2019-08-23 19:55:20'),
(36, '2', 'room me koi aya hai', '1', 1, '2019-08-23 19:58:53'),
(37, '1', 'ha senior aye hai', '2', 1, '2019-08-23 20:03:20'),
(38, '2', 'kon senior mein', '1', 1, '2019-08-23 20:05:39'),
(39, '1', 'are wahi', '2', 1, '2019-08-23 20:11:59'),
(40, '2', 'wahi kon nam bhul gaye ho to nam karne ka format bheje', '1', 1, '2019-08-23 20:30:39'),
(41, '1', 'f**k off', '2', 1, '2019-08-23 20:32:36'),
(42, '11', 'hello', '2', 1, '2019-08-24 04:23:00'),
(43, '2', 'ha bhai room', '11', 1, '2019-08-24 04:26:18'),
(44, '11', 'kaha room me', '2', 1, '2019-08-24 04:37:11'),
(45, '1', 'SRY', '2', 1, '2019-08-25 11:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `id_by` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_by`, `image`, `comment`, `time`) VALUES
(18, '8', '20181010_002058.jpg', 'bhai log', '2019-08-10 19:07:32'),
(21, '1', '20181109_121748.jpg', 'live like king', '2019-08-10 19:07:32'),
(20, '7', '1 (268).jpg', 'ye kya', '2019-08-10 19:07:32'),
(19, '7', '1 (1).jpg', 'new post', '2019-08-10 19:07:32'),
(14, '1', '20181119_181945.jpg', '#24', '2019-08-10 19:07:32'),
(22, '2', '20181118_201936.jpg', 'rommies!!', '2019-08-10 19:14:39'),
(23, '7', 'IMG_20180902_135838.jpg', 'brothers', '2019-08-10 19:41:10'),
(26, '1', 'IMG-20181023-WA0021.jpg', '1ST YEAR', '2019-08-14 20:18:39'),
(25, '2', 'IMG_20180902_141435.jpg', 'kfc', '2019-08-10 19:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(200) NOT NULL,
  `reportname` varchar(500) NOT NULL,
  `reportconfession` varchar(1000) NOT NULL,
  `reportby` varchar(100) NOT NULL,
  `reportemail` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `reportname`, `reportconfession`, `reportby`, `reportemail`) VALUES
(1, 'roshan', ' room me ho\r\n', 'Vishu', 'rakeshkusrivastav@gmail.com'),
(2, 'Vishu', ' light on kARDO', 'roshan', 'roshanpathak@gmail.com'),
(3, 'rakesh', ' kon ho tum', 'Vishu', 'rakeshkusrivastav@gmail.com'),
(4, 'roshan', ' sajsa', 'Vishu', 'rakeshkusrivastav@gmail.com'),
(5, 'Vishu', ' hi sgjkdhljs', 'roshan', 'roshanpathak@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `home` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `confession` varchar(1000) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `follower_count` varchar(100) NOT NULL,
  `login_check` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `password`, `phoneno`, `sem`, `post`, `branch`, `home`, `day`, `month`, `year`, `image`, `email`, `confession`, `cp`, `follower_count`, `login_check`) VALUES
(1, 'Vishu', 'hero', '9721327569', 'Ist', 'student', '1', '1', '20', '7', '1999', '20181010_002058.jpg', 'rakeshkusrivastav@gmail.com', ' sajsa', 'roshan', '41', 0),
(2, 'roshan', 'roshan', '9458703772', 'Ist', 'student', '1', '1', '2', '6', '1999', '20181010_002105.jpg', 'roshanpathak@gmail.com', 'tum chutiye', 'rakeshkusrivastav@gmail.com', '42', 0),
(7, 'Ayush chaudhary', 'ayush', '7599900724', 'IInd', 'student', '1', '1', '27', '2', '2001', 'IMG_20180902_141933.jpg', 'ayushchaudhary0027@gmail.com', 'hello', 'rakeshkusrivastav@gmail.com', '44', 0),
(8, 'akku', 'aquib', '9997566675', 'IInd', 'student', '1', '2', '24', '8', '2000', 'IMG_20180902_142314.jpg', 'mohdaqib132@gmail.com', 'chicken', 'rakeshkusrivastav@gmail.com', '44', 0),
(9, 'anubhaw', 'anu', '7351587207', 'IInd', 'student', '1', '2', '11', '11', '2000', 'IMG_20180902_142206.jpg', 'anubhawkumar22@gmail.com', '', '', '21', 0),
(10, 'kartik', 'kartik', '7599900732', 'IInd', 'student', '1', '2', '18', '9', '2000', '20181119_181901.jpg', 'kartik@gmail.com', '', '', '26', 0),
(11, 'Suchit agarwal', 'suchit', '7599900723', '2', 'student', '1', '1', '23', '12', '1999', 'IMG-20181020-WA0037.jpg', 'suchitagrawal77@gmail.com', '', '', '36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_unfollow`
--
ALTER TABLE `follow_unfollow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `follow_unfollow`
--
ALTER TABLE `follow_unfollow`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
