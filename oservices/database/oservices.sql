-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 12:42 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `img` varchar(2000) COLLATE ascii_bin NOT NULL,
  `sub_cat_dis` varchar(200) COLLATE ascii_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `img`, `sub_cat_dis`) VALUES
(1, 'Doctor', '../admin/category/doc.jpg', NULL),
(2, 'Technician', '../admin/category/dev.jpg', NULL),
(10, 'Electrician', '../admin/category/ele.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serviceman_details`
--

CREATE TABLE `serviceman_details` (
  `sm_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `sm_name` varchar(50) NOT NULL,
  `sm_mobile` varchar(10) NOT NULL,
  `sm_address` varchar(200) NOT NULL,
  `sm_adharno` varchar(12) NOT NULL,
  `sm_image` varchar(4000) NOT NULL,
  `sm_email` varchar(50) NOT NULL,
  `sm_upload_doc` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `ser_pro_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_type` varchar(1) NOT NULL,
  `u_password` varchar(8) NOT NULL,
  `u_mobileno` varchar(10) DEFAULT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_address` varchar(200) DEFAULT NULL,
  `u_adharno` varchar(12) DEFAULT NULL,
  `u_photo` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`u_id`, `u_name`, `u_type`, `u_password`, `u_mobileno`, `u_email`, `u_address`, `u_adharno`, `u_photo`) VALUES
(1, 'yash', 'A', '123', NULL, 'y@y.c', NULL, NULL, NULL),
(2, 'shivam', 'S', '123', NULL, 's@s.s', NULL, NULL, NULL),
(3, 'hardik', 'U', '123', NULL, 'h@h.h', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `serviceman_details`
--
ALTER TABLE `serviceman_details`
  ADD PRIMARY KEY (`sm_id`),
  ADD KEY `bjvtycyt` (`u_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`ser_pro_id`),
  ADD KEY `havvhjcvavcsjasc` (`c_id`),
  ADD KEY `bxjagsjgasjxa` (`u_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `serviceman_details`
--
ALTER TABLE `serviceman_details`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `ser_pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serviceman_details`
--
ALTER TABLE `serviceman_details`
  ADD CONSTRAINT `bjvtycyt` FOREIGN KEY (`u_id`) REFERENCES `user_info` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD CONSTRAINT `bxjagsjgasjxa` FOREIGN KEY (`u_id`) REFERENCES `user_info` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `havvhjcvavcsjasc` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
