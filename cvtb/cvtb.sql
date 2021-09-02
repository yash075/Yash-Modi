-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 02:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_mail` varchar(50) NOT NULL,
  `a_mob` bigint(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL,
  `a_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_mail`, `a_mob`, `a_pass`, `a_type`) VALUES
(1, 'abc', 'abc@gmail.com', 6789054324, '123', 'admin'),
(2, 'yash', 'y@gmail.com', 990945876, '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(255) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(3, 'Designing'),
(4, 'Developing'),
(1, 'HR'),
(2, 'Marketing'),
(6, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(255) NOT NULL,
  `d_id` int(255) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `post` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `d_id`, `e_name`, `post`, `mail`, `mob`, `password`) VALUES
(1, 1, 'ip', 'head', 'asd@g.com', 5678904321, 'ip'),
(2, 1, 'kcp', 'senior', 'kcp@g.com', 2345678901, 'kcp'),
(3, 2, 'khb', 'head', 'khb@g.com', 987654321, 'khb');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_visitor`
--

CREATE TABLE `schedule_visitor` (
  `sch_vi_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `schedule_visitor`
--

INSERT INTO `schedule_visitor` (`sch_vi_id`, `v_id`, `e_id`, `reason`, `date`, `time`) VALUES
(1, 11, 2, 'hgdyagdyugad', '2020-03-16', '10:00:00'),
(3, 9, 1, 'vsdvdsvdsv', '2020-10-10', '10:00:00'),
(4, 9, 1, ',mklnlknkjjknlknlkm', '2020-09-10', '10:00:00'),
(8, 9, 1, 'meeting', '2020-04-05', '10:00:00'),
(9, 9, 1, 'meeting', '2020-04-05', '10:00:00'),
(10, 9, 2, 'meet', '2020-04-04', '04:00:00'),
(11, 9, 2, 'meeting', '2020-04-17', '10:00:00'),
(22, 10, 3, 'interview', '2020-04-01', '10:00:00'),
(24, 24, 2, 'interview', '2020-04-24', '14:00:00'),
(25, 24, 2, '.meeting.', '0000-00-00', '00:00:00'),
(26, 24, 2, '.meeting.', '0000-00-00', '00:00:00'),
(35, 24, 3, 'inter', '2020-04-30', '10:00:00'),
(38, 9, 1, 'meet', '2020-04-29', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log_detail`
--

CREATE TABLE `visitor_log_detail` (
  `v_id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `info` longtext DEFAULT NULL,
  `img` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_log_detail`
--

INSERT INTO `visitor_log_detail` (`v_id`, `name`, `username`, `pass`, `email`, `mob`, `gender`, `address`, `description`, `info`, `img`) VALUES
(9, 'hani', 'hani', '123', 'hani@gmail.com', 987654321, 'female', 'asdfvgbhnjmk', 'hello', 'uploads/file/add.html', 'uploads/image/dev.jpg'),
(10, 'shivani', 'shiv', '234', 'shiv@gmail.com', 1234567890, 'female', 'aqzxswedcvfrbgtyhnmjuiklop', 'hod', 'uploads/file/I.E.S.docx', 'uploads/image/SmallBusinessOwner_1420x630-1503427066691.jpg'),
(11, 'ayushi', 'SSDW', '345', 'ashi@gmail.com', 1234567865, 'female', 'asdfgh', 'fgsh', 'uploads/file/android.txt', 'uploads/image/1_ukADSyBHaZByaojf4M_8nw.png'),
(16, 'nkjcnjkc', 'nbkjas', 'knklndas', 'brijeshmodi1234@gmail.com', 7899654123, 'male', 'Barot no kasarwado, Ghivto, Patan', 'fresher', 'uploads/file/p1.txt', 'uploads/image/1_ukADSyBHaZByaojf4M_8nw.png'),
(17, 'nmvghrfth', 'm,bvghdrmbvhjfyj', 'nbcgbc', 'admin@keyurpatel.in', 3111445524, 'male', 'sandiuhduiqahda', NULL, NULL, NULL),
(19, 'qaz', 'qaz', '345', 'asefg@g.c', 1234567834, 'female', 'asdfdv', 'head', 'uploads/file/p1.txt', 'uploads/image/images.png'),
(22, 'wert', 'wert', '678', 'wert@g.c', 2345609876, 'female', 'sxdcfvgbhnj sderftgyhu', 'sxdcfgvh', 'uploads/file/p1.txt', 'uploads/image/images.png'),
(24, 'meet', 'meet', '124', 'meet@gmail.com', 9087654321, 'male', 'zsxrdtcfvgbh zsxrdtcfyvgbh xdcfvgbhnj', 'fresher', 'uploads/file/LICENSE user.txt', 'uploads/image/ashiimages.jpg'),
(25, 'jeet', 'jeet', '123', 'jeet@gmail.com', 9087634531, 'male', 'esxrdctfvgbh zxcfvgh cfvgbh', 'fresher', 'uploads/file/Main-1.java', 'uploads/image/lbb8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visit_record`
--

CREATE TABLE `visit_record` (
  `v_rec_id` int(11) NOT NULL,
  `sch_v_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `a_in` time NOT NULL,
  `a_out` time NOT NULL,
  `e_in` time NOT NULL,
  `e_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit_record`
--

INSERT INTO `visit_record` (`v_rec_id`, `sch_v_id`, `status`, `a_in`, `a_out`, `e_in`, `e_out`) VALUES
(5, 10, 1, '00:00:00', '00:00:00', '03:57:03', '04:02:55'),
(6, 11, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(7, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(12, 22, 1, '00:00:00', '00:00:00', '10:00:00', '12:00:00'),
(14, 24, -1, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(16, 35, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(19, 38, -1, '00:00:00', '00:00:00', '00:00:00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_name` (`d_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `mob` (`mob`),
  ADD KEY `dep` (`d_id`);

--
-- Indexes for table `schedule_visitor`
--
ALTER TABLE `schedule_visitor`
  ADD PRIMARY KEY (`sch_vi_id`),
  ADD KEY `visit` (`v_id`),
  ADD KEY `emp` (`e_id`);

--
-- Indexes for table `visitor_log_detail`
--
ALTER TABLE `visitor_log_detail`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mob` (`mob`);

--
-- Indexes for table `visit_record`
--
ALTER TABLE `visit_record`
  ADD PRIMARY KEY (`v_rec_id`),
  ADD KEY `sch` (`sch_v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_visitor`
--
ALTER TABLE `schedule_visitor`
  MODIFY `sch_vi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `visitor_log_detail`
--
ALTER TABLE `visitor_log_detail`
  MODIFY `v_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `visit_record`
--
ALTER TABLE `visit_record`
  MODIFY `v_rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `dep` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_visitor`
--
ALTER TABLE `schedule_visitor`
  ADD CONSTRAINT `emp` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit` FOREIGN KEY (`v_id`) REFERENCES `visitor_log_detail` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visit_record`
--
ALTER TABLE `visit_record`
  ADD CONSTRAINT `sch` FOREIGN KEY (`sch_v_id`) REFERENCES `schedule_visitor` (`sch_vi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
