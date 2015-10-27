-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 08:01 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

CREATE TABLE IF NOT EXISTS `tbl_answers` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `quest_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answers`
--

INSERT INTO `tbl_answers` (`id`, `answer`, `quest_id`) VALUES
(2, 'Application Development Framework', 2),
(3, 'It uses MVC', 3),
(4, 'SEO based approach', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_choices`
--

CREATE TABLE IF NOT EXISTS `tbl_choices` (
  `id` int(11) NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `quest_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_choices`
--

INSERT INTO `tbl_choices` (`id`, `choice1`, `choice2`, `choice3`, `quest_id`) VALUES
(2, 'Object Oriented Concept', 'PHP Library without Web Server', 'Content Management System', 2),
(3, 'It is light weight', 'It is fast', 'It uses Delphi Modelling Techniques', 3),
(4, 'Query String approach', 'Segment based approach', 'Keyword based approach', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE IF NOT EXISTS `tbl_classes` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `schoolyear` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `uid`, `schoolyear`, `section`, `subject`) VALUES
(11, 12, 1, 2, 6),
(12, 12, 1, 3, 6),
(13, 12, 1, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `date_activation` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `time_duration` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `classid`, `description`, `uid`, `date_activation`, `time_start`, `time_end`, `time_duration`, `status`) VALUES
(1, 11, 'Techincal Writing Skills', 12, '0000-00-00', '00:00:00', '00:00:00', '01:00 PM', 1),
(2, 13, 'Algebra', 12, '0000-00-00', '00:00:00', '00:00:00', '01:00 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party`
--

CREATE TABLE IF NOT EXISTS `tbl_party` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `civil` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(60) NOT NULL,
  `year_section` int(11) NOT NULL,
  `idno` varchar(30) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_party`
--

INSERT INTO `tbl_party` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `civil`, `dob`, `address`, `year_section`, `idno`, `usertype`) VALUES
(10, 'asdd', 'asd', 'asd', 1, 'Married', '2015-10-21', 'asd', 2, '2015', 1),
(11, 'ray', 'p', 'durano', 1, 'Single', '1994-06-06', 'tacloban', 2, '2015', 3),
(12, 'Niel', 'Nacario', 'Aclag', 1, 'Single', '1994-12-19', 'Obayan nowhere', 0, '2015-00012', 2),
(13, 'Niel', 'Nacario', 'Aclag', 1, 'Single', '1994-12-19', 'Obayan nowhere', 2, '2015-00012', 3),
(15, 'Greggy boy', 'L', 'SONIT', 1, 'Single', '2017-02-05', 'MAGAL', 0, '2015-00014', 2),
(16, 'Nacario', 'Nemecio', 'Aclag', 1, 'Single', '1994-12-19', 'Obayan nowhere', 2, '2015-00012', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `examid` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `question`, `examid`, `points`) VALUES
(2, 'Code Igniter is a ________________?', 1, 5),
(3, 'Which of the following is not true about CodeIgniter.', 1, 3),
(4, 'The urls generated by CodeIgniter are search-engine friendly and clean because they use', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `partyid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `classid`, `partyid`) VALUES
(5, 11, 16),
(6, 11, 13),
(7, 13, 10),
(8, 13, 11),
(9, 13, 13),
(10, 13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `id` int(11) NOT NULL,
  `year` varchar(11) NOT NULL,
  `unit` int(1) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `year`, `unit`, `subject_code`, `subject_title`, `type`) VALUES
(6, '1', 3, 'English', 'Enrichment English', '1'),
(7, '1', 3, 'Math', 'Basic Mathematics', '1'),
(8, '1', 3, 'Fil', 'Baralira', '1'),
(9, '1', 4, 'IT14344', 'Information Technology', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `party` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `party`, `username`, `password`) VALUES
(1, 9, 'asd', 'a'),
(2, 10, 'asd', 'a'),
(3, 11, 'ray', '123'),
(4, 12, 'niel', 'niel'),
(5, 14, 'dona.esperas', 'esperasd'),
(6, 15, 'greggy.boy', 'sonit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE IF NOT EXISTS `tbl_usertype` (
  `id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'Faculty'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
  `id` int(11) NOT NULL,
  `sch_yr` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`id`, `sch_yr`) VALUES
(1, '2015-2016'),
(2, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearsection`
--

CREATE TABLE IF NOT EXISTS `tbl_yearsection` (
  `id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yearsection`
--

INSERT INTO `tbl_yearsection` (`id`, `year`, `section`) VALUES
(2, 'First Year', 'Legend'),
(3, 'Second Year', 'Santan'),
(4, 'Third Year', 'Amber'),
(5, 'Fourth Year', 'Einstein'),
(6, 'Second Year', 'Sampaguita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_choices`
--
ALTER TABLE `tbl_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_party`
--
ALTER TABLE `tbl_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_yearsection`
--
ALTER TABLE `tbl_yearsection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_choices`
--
ALTER TABLE `tbl_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_party`
--
ALTER TABLE `tbl_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_yearsection`
--
ALTER TABLE `tbl_yearsection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
