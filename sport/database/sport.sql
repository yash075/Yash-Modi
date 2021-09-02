-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 08:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `e_no` varchar(11) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `e_no`, `msg`) VALUES
(2, '16082221037', 'Its A hard work but our team was won in outdoor games.');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `gname` varchar(15) NOT NULL,
  `max` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `gname`, `max`, `type`, `year`) VALUES
(1, 'Football', 15, 'Outdoor Game', '2018-19'),
(2, 'Cricket', 17, 'Outdoor Game', '2018-19'),
(3, 'Volleyball', 10, 'Outdoor Game', '2018-19'),
(4, 'Kabbadi', 9, 'Outdoor Game', '2018-19'),
(5, 'Kho - Kho', 13, 'Outdoor Game', '2018-19'),
(6, 'Chess', 1, 'Indoor Game', '2018-19'),
(7, 'Table - Tennis', 2, 'Indoor Game', '2018-19'),
(8, 'Carrom', 2, 'Indoor Game', '2018-19'),
(10, 'Badminton', 2, 'Indoor Game', '2018-19');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `name`, `pass`) VALUES
(1, 'dcs', 'Ganpat University', 'sport'),
(2, '16082221037', 'Patel Preet Nileshkumar', 'preet'),
(3, '16082221029', 'Patel Dollar Pankajbhai', 'dollar');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `p_id` int(11) NOT NULL,
  `e_no` varchar(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_birth` date NOT NULL,
  `p_mobile` varchar(10) NOT NULL,
  `p_class` varchar(20) NOT NULL,
  `team_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `p_type` varchar(20) DEFAULT NULL,
  `p_email` varchar(50) NOT NULL,
  `r_date` datetime DEFAULT NULL,
  `u_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`p_id`, `e_no`, `p_name`, `p_birth`, `p_mobile`, `p_class`, `team_id`, `game_id`, `p_type`, `p_email`, `r_date`, `u_date`) VALUES
(1, '16082221037', 'Patel Preet Nileshkumar', '1999-06-21', '7698259814', 'B.Sc(CA & IT)', 3, 4, 'Player', 'patelpreet216@gmail.com', '2019-04-04 10:53:45', '2019-04-04 10:56:01'),
(2, '16082221029', 'Patel Dollar Pankajbhai', '1999-04-08', '9512634780', 'B.Sc(CA & IT)', 3, 3, 'Captain', 'dollar1232@gmail.com', '2019-04-11 07:25:33', '2019-04-11 07:26:13'),
(3, '16082221037', 'Patel Preet Nileshkumar', '1999-06-21', '7698259813', 'B.Sc(CA & IT)', 1, 8, 'Player', 'patelpreet216@gmail.com', '2019-04-16 08:44:41', NULL),
(4, '16082221037', 'Patel Preet Nileshkumar', '1999-06-21', '7698259813', 'B.Sc(CA & IT)', 3, 3, 'Vise-Captain', 'patelpreet216@gmail.com', '2019-04-16 12:04:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `r_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `r_team1` varchar(20) DEFAULT NULL,
  `r_team2` varchar(20) DEFAULT NULL,
  `win_team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`r_id`, `s_id`, `r_team1`, `r_team2`, `win_team_id`) VALUES
(2, 5, '1500', '1000', 2),
(3, 4, '8', '10', 2),
(4, 2, '150/9', '156/3', 4),
(5, 3, 'W-L-W', 'L-W-L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `s_time` varchar(20) NOT NULL,
  `s_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `game_id`, `team1`, `team2`, `s_date`, `s_time`, `s_status`) VALUES
(1, 1, 1, 2, '2019-02-22', '10:00 AM', 'Active'),
(2, 2, 2, 4, '2019-02-22', '11:00 AM', 'Active'),
(3, 3, 1, 2, '2019-02-22', '01:00 PM', 'Active'),
(4, 6, 1, 2, '2019-02-24', '10:00 AM', 'Active'),
(5, 8, 2, 4, '2019-02-24', '11:00 PM', 'Active'),
(6, 7, 2, 4, '2019-03-29', '09:30 AM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `team_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `sem`, `team_name`) VALUES
(1, 2, 'Rising Star'),
(2, 4, 'Gully Boys'),
(3, 6, 'King Of DCS'),
(4, 8, 'MSC Gang');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `w_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `man_series` varchar(30) DEFAULT NULL,
  `man_match` varchar(30) DEFAULT NULL,
  `b_bowl` varchar(30) DEFAULT NULL,
  `b_bat` varchar(30) DEFAULT NULL,
  `b_raid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`w_id`, `r_id`, `game_id`, `team_id`, `man_series`, `man_match`, `b_bowl`, `b_bat`, `b_raid`) VALUES
(1, 2, 8, 4, 'Preet', 'Preet', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `e_no` (`e_no`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `win_team_id` (`win_team_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `schedule_ibfk_1` (`game_id`),
  ADD KEY `team1` (`team1`),
  ADD KEY `team2` (`team2`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `schedule` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_4` FOREIGN KEY (`win_team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`team1`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`team2`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `winner`
--
ALTER TABLE `winner`
  ADD CONSTRAINT `winner_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `result` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
