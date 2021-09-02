-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 05:08 PM
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
-- Database: `shopss`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_wish`
--

CREATE TABLE `add_wish` (
  `a_w_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_wish`
--

INSERT INTO `add_wish` (`a_w_id`, `w_id`, `shop_id`) VALUES
(14, 1, 17),
(27, 1, 15),
(28, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_username` varchar(20) COLLATE ascii_bin NOT NULL,
  `a_password` varchar(20) COLLATE ascii_bin NOT NULL,
  `a_email` varchar(60) COLLATE ascii_bin NOT NULL,
  `a_mobile` int(12) NOT NULL,
  `a_fullname` varchar(50) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_username`, `a_password`, `a_email`, `a_mobile`, `a_fullname`) VALUES
(1, 'shivani', '123', 'shivanichaudhary0706@gmail.com', 1234567890, 'shivani choudhary'),
(2, 'yash', '234', 'yash@yahoo.com', 987654321, 'yash modi');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `img` varchar(2000) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `img`) VALUES
(1, 'Doctor', '../admin/category/doc.jpg'),
(2, 'Technician', '../admin/category/dev.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `cust_mail` varchar(60) COLLATE ascii_bin NOT NULL,
  `cust_mob` bigint(20) NOT NULL,
  `cust_pass` varchar(30) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_mail`, `cust_mob`, `cust_pass`) VALUES
(1, 'hani', 'hani@gmail.com', 2345678901, '1234'),
(2, 'ruchita', 'ruchi@g.com', 6789054321, '123'),
(8, 'raj', 'raj@gmail.com', 9801237654, '76'),
(12, 'geet', 'geet@gmail.com', 5678904321, '09');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `m_mob` int(12) NOT NULL,
  `m_mail` varchar(50) COLLATE ascii_bin NOT NULL,
  `m_pass` varchar(20) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_name`, `m_mob`, `m_mail`, `m_pass`) VALUES
(1, 'ashi', 987654321, 'asdfg@g.com', '123'),
(2, 'veer', 2147483647, 'v@g.c', '456'),
(5, 'meet', 192837465, 'meet@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `r_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`r_id`, `shop_id`, `cust_id`, `rate`, `Date`) VALUES
(12, 14, 12, 4, '2020-05-11'),
(13, 14, 8, 2, '2020-05-26'),
(14, 16, 1, 4, '2020-05-01'),
(15, 15, 12, 3, '2020-05-12'),
(16, 15, 2, 5, '2020-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `s_c_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE ascii_bin NOT NULL,
  `address` varchar(60) COLLATE ascii_bin NOT NULL,
  `image` varchar(4000) COLLATE ascii_bin NOT NULL,
  `img1` varchar(50000) COLLATE ascii_bin DEFAULT NULL,
  `m_id` int(11) NOT NULL,
  `city` varchar(1000) COLLATE ascii_bin NOT NULL,
  `shop_mob` int(12) DEFAULT NULL,
  `shop_mail` varchar(40) COLLATE ascii_bin DEFAULT NULL,
  `latitude` varchar(4000) COLLATE ascii_bin NOT NULL,
  `longitude` varchar(4000) COLLATE ascii_bin NOT NULL,
  `description` varchar(300) COLLATE ascii_bin DEFAULT NULL,
  `visit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `s_c_id`, `name`, `address`, `image`, `img1`, `m_id`, `city`, `shop_mob`, `shop_mail`, `latitude`, `longitude`, `description`, `visit`) VALUES
(14, 3, 'softech', 'Unnamed Road, Nagalpur, Mehsana, Gujarat 384002, India', '../admin/uploads/ashiwhatiscryp.jpg', '0', 1, 'Mehsana', 987654321, 'ashi@gmai.com', '23.585064502935687', '72.366412109375', 'software production', 1),
(15, 8, 'web', 'Unnamed Road, Bhagyoday Co Op Housing Society, Mehsana, Guja', '../admin/uploads/ashiSoftech_logo.png', '0', 5, 'Mehsana', 2147483647, 'meet@gmail.com', '23.585064502935673', '72.388384765625', 'web technology', 24),
(16, 3, 'software', 'GJ SH 56, Ramdavnagar, Mehsana, Gujarat 384001, India', '../admin/uploads/veerdownload.png', '../admin/uploads/veerlogo.webp', 2, 'Mehsana', 192837465, 'veer@gmail.com', '23.61526684918304', '72.4048642578125', 'software solution', 5),
(17, 1, 'health', 'GJ SH 134, Modhera, Gujarat 384212, India', '../admin/uploads/ashidownload (2).png', '0', 1, 'Mehsana', 2147483647, 'ashi@gmail.com', '23.587581630751544', '72.14393896484376', 'health solution', 17),
(23, 1, 'life2', 'Unnamed Road, Bajipura, Gujarat 384320, India', '../admin/uploads/veerca54fe9edd52395d00e03b3c913584a1.jpg', '0', 2, 'Mehsana', 2147483647, 'veer@gmail.com', '23.803831050769364', '72.586138671875', 'life is precious', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `s_c_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_c_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `img` varchar(2000) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`s_c_id`, `c_id`, `s_c_name`, `img`) VALUES
(1, 1, 'pediatric', ''),
(2, 1, 'physician', ''),
(3, 2, 'software developer', ''),
(8, 2, 'web developer', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `cust_id`) VALUES
(1, 1),
(3, 2),
(5, 8),
(7, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_wish`
--
ALTER TABLE `add_wish`
  ADD PRIMARY KEY (`a_w_id`),
  ADD KEY `wish` (`w_id`),
  ADD KEY `shopw` (`shop_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_username` (`a_username`),
  ADD UNIQUE KEY `a_email` (`a_email`),
  ADD UNIQUE KEY `a_mobile` (`a_mobile`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_mail` (`cust_mail`),
  ADD UNIQUE KEY `cust_pass` (`cust_pass`),
  ADD UNIQUE KEY `cust_mob` (`cust_mob`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_mob` (`m_mob`),
  ADD UNIQUE KEY `m_mail` (`m_mail`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `cust` (`cust_id`),
  ADD KEY `shop` (`shop_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `subcat` (`s_c_id`),
  ADD KEY `memb` (`m_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`s_c_id`),
  ADD UNIQUE KEY `s_c_name` (`s_c_name`),
  ADD KEY `cat` (`c_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `customer` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_wish`
--
ALTER TABLE `add_wish`
  MODIFY `a_w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `s_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_wish`
--
ALTER TABLE `add_wish`
  ADD CONSTRAINT `ertyhgxcvbhgf` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rtyuiuhygfghjkjhghj` FOREIGN KEY (`w_id`) REFERENCES `wishlist` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `hbhhvhvbh` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oiuyhjnvgh` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `bgfrdvbn` FOREIGN KEY (`m_id`) REFERENCES `member` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hhehhhne` FOREIGN KEY (`s_c_id`) REFERENCES `sub_category` (`s_c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `cdscsdvcsdv` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `mjjnnhasaxja` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
