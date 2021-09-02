-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 02:21 PM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_mark`
--

CREATE TABLE `add_mark` (
  `add_mark_id` int(255) NOT NULL,
  `marks_id` int(255) NOT NULL,
  `assign_block_id` int(255) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `att_pr_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_block`
--

CREATE TABLE `assign_block` (
  `ass_b_id` int(255) NOT NULL,
  `b_arr_id` int(255) NOT NULL,
  `stud_id` int(255) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_student_in_batch`
--

CREATE TABLE `assign_student_in_batch` (
  `ass_stud_b_id` int(255) NOT NULL,
  `batch_id` int(255) NOT NULL,
  `stud_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_student_in_batch`
--

INSERT INTO `assign_student_in_batch` (`ass_stud_b_id`, `batch_id`, `stud_id`) VALUES
(1, 1, 6),
(4, 4, 9),
(5, 4, 10),
(6, 1, 5),
(7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_practical`
--

CREATE TABLE `attendance_practical` (
  `att_pr_id` int(255) NOT NULL,
  `exam_sch_pr_id` int(255) NOT NULL,
  `stud_id` int(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(255) NOT NULL,
  `batch_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`) VALUES
(1, 'B1'),
(2, 'B2'),
(4, 'B3'),
(5, 'Theory');

-- --------------------------------------------------------

--
-- Table structure for table `block_arrangement`
--

CREATE TABLE `block_arrangement` (
  `b_arr_id` int(255) NOT NULL,
  `r_id` int(255) NOT NULL,
  `b_arr_no` varchar(20) NOT NULL,
  `exam_sch_th_id` int(255) NOT NULL,
  `f_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_arrangement`
--

INSERT INTO `block_arrangement` (`b_arr_id`, `r_id`, `b_arr_no`, `exam_sch_th_id`, `f_id`) VALUES
(30, 5, '2001', 35, NULL),
(31, 5, '2002', 35, NULL),
(32, 4, '2003', 35, NULL),
(33, 4, '2004', 35, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `course_type`) VALUES
(1, 'U1', 'B.Sc(CA & IT) ', 'UG'),
(2, 'U6', 'B.SC IT(CYBER SECURITY)', 'UG'),
(5, 'P2', 'M.Sc(CA & IT)', 'PG'),
(6, 'P11', 'M.SC IT(CYBER SECURITY)', 'PG');

-- --------------------------------------------------------

--
-- Table structure for table `exam_generation`
--

CREATE TABLE `exam_generation` (
  `exam_id` int(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `e_title` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_generation`
--

INSERT INTO `exam_generation` (`exam_id`, `startdate`, `enddate`, `e_title`, `status`) VALUES
(5, '2019-11-25', '2019-12-06', 'Nov-Dec 2019 Internal Examintaion ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule_practical`
--

CREATE TABLE `exam_schedule_practical` (
  `exam_sch_pra_id` int(255) NOT NULL,
  `exam_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `lab_no` varchar(10) NOT NULL,
  `batch_id` int(255) NOT NULL,
  `f_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_schedule_practical`
--

INSERT INTO `exam_schedule_practical` (`exam_sch_pra_id`, `exam_id`, `sub_id`, `date`, `time`, `lab_no`, `batch_id`, `f_id`) VALUES
(13, 5, 52, '2019-11-25', '11:00:00', '1', 1, 4),
(14, 5, 52, '2019-11-25', '11:00:00', '2', 2, 1),
(15, 5, 54, '2019-11-26', '11:00:00', '1', 1, 6),
(16, 5, 54, '2019-11-26', '11:00:00', '2', 2, 4),
(17, 5, 56, '2019-11-27', '11:00:00', '3', 1, 1),
(18, 5, 56, '2019-11-27', '11:00:00', '3', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule_theory`
--

CREATE TABLE `exam_schedule_theory` (
  `exam_sch_th_id` int(255) NOT NULL,
  `exam_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_schedule_theory`
--

INSERT INTO `exam_schedule_theory` (`exam_sch_th_id`, `exam_id`, `sub_id`, `date`, `time`) VALUES
(35, 5, 51, '2019-11-25', '11:00:00'),
(36, 5, 53, '2019-11-26', '11:00:00'),
(37, 5, 55, '2019-11-27', '11:00:00'),
(38, 5, 57, '2019-11-28', '11:00:00'),
(39, 5, 58, '2019-11-29', '11:00:00'),
(40, 5, 59, '2019-11-30', '11:00:00'),
(41, 5, 69, '2019-11-25', '11:00:00'),
(42, 5, 71, '2019-11-26', '11:00:00'),
(43, 5, 73, '2019-11-27', '11:00:00'),
(44, 5, 75, '2019-11-28', '11:00:00'),
(45, 5, 76, '2019-11-29', '11:00:00'),
(46, 5, 77, '2019-11-30', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(255) NOT NULL,
  `f_code` varchar(20) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_password` varchar(30) NOT NULL,
  `f_type` varchar(10) NOT NULL,
  `f_jod` date NOT NULL,
  `f_post` varchar(50) NOT NULL,
  `f_mail` varchar(50) NOT NULL,
  `f_mobile` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_code`, `f_name`, `f_password`, `f_type`, `f_jod`, `f_post`, `f_mail`, `f_mobile`) VALUES
(1, '17082221026', 'yash', 'yash', 'Admin', '2019-07-08', 'HOD', 'yash03504@gmail.com', '9909728656'),
(4, '17082221017', 'shivani', 'shivani', 'Faculty', '1999-07-06', 'proffesior', 's@gmail.com', '7896541235'),
(6, '17082221030', 'ashi', 'ashi', 'Faculty', '1999-09-27', 'proffesior', 'a@gmail.com', '3698524781');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_permission`
--

CREATE TABLE `faculty_permission` (
  `fac_per_id` int(255) NOT NULL,
  `f_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `batch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_permission`
--

INSERT INTO `faculty_permission` (`fac_per_id`, `f_id`, `sub_id`, `batch_id`) VALUES
(1, 1, 52, 1),
(2, 1, 52, 2),
(3, 1, 52, 4),
(4, 1, 51, 5),
(5, 1, 54, 1),
(6, 6, 54, 2),
(7, 6, 54, 4);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(255) NOT NULL,
  `fac_per_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `exam_sch_th_id` int(255) DEFAULT NULL,
  `exam_sch_pr_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_arrangement`
--

CREATE TABLE `room_arrangement` (
  `r_id` int(255) NOT NULL,
  `r_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_arrangement`
--

INSERT INTO `room_arrangement` (`r_id`, `r_name`) VALUES
(1, 'G-10'),
(2, 'G-09'),
(3, 'G-05'),
(4, 'G-01'),
(5, 'F-13');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `sem_code` varchar(20) NOT NULL,
  `sem_type` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `course_id`, `sem_code`, `sem_type`) VALUES
(1, 1, 'U11', 'odd'),
(7, 1, 'U12', 'even'),
(9, 2, 'U64', 'even'),
(10, 2, 'U61', 'odd'),
(11, 1, 'U15', 'odd'),
(13, 5, 'P22', 'even'),
(14, 1, 'U10', 'comp'),
(15, 1, 'U13', 'odd'),
(16, 1, 'U14', 'even'),
(18, 2, 'U60', 'comp'),
(19, 2, 'U62', 'even'),
(20, 2, 'U63', 'odd'),
(21, 2, 'U65', 'odd'),
(22, 2, 'U66', 'even'),
(23, 5, 'P20', 'comp'),
(24, 5, 'P21', 'odd'),
(25, 5, 'P23', 'odd'),
(26, 5, 'P24', 'even'),
(27, 1, 'U16', 'even'),
(30, 6, 'A11', 'odd'),
(31, 6, 'A14', 'even');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(255) NOT NULL,
  `stud_code` varchar(13) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `sem_id` int(255) NOT NULL,
  `stud_mobile` varchar(13) NOT NULL,
  `stud_mail` varchar(50) NOT NULL,
  `stud_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_code`, `stud_name`, `sem_id`, `stud_mobile`, `stud_mail`, `stud_status`) VALUES
(4, '17082221026', 'yash', 1, '1474523689', 'yash@gmail.com', 1),
(5, '17082221030', 'ashi', 1, '147542369', 's@gmail.com', 1),
(6, '17062641010', 'suresh', 15, '14785236985', 'suresh@gmail.com', 1),
(7, '17082221080', 'mayank', 23, '1474523689', 'mayank@gmail.com', 0),
(8, '17082221011', 'hari', 11, '1458752', 'suresh@gmail.com', 1),
(9, '17082221049', 'maitri', 27, '9909728656', 'yash@gmail.com', 1),
(10, '17082221076', 'mukhtar', 27, '1478523698', 'yash@gmail.com', 1),
(11, '124587521', 'Raj', 15, '9687315301', 'yashdk@gmail.com', 1),
(14, 'T19082221001', 'PATEL SMIT CHINUBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(15, 'T19082221002', 'PATEL SMITH HASMUKHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(16, 'T19082221003', 'CHAUHAN VISHA RAKESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(17, 'T19082221004', 'PATEL NIRMIT SHAILESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(18, 'T19082221006', 'CHAUDHARI AKASHKUMAR ALPESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(19, 'T19082221007', 'GOSWAMI HIRENGIRI PRAVINGIRI', 1, '9909728656', 'yash@gmail.com', 1),
(20, 'T19082221008', 'PATEL ARCHITKUMAR SATISHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(21, 'T19082221009', 'CHAUHAN BHARGAVKUMAR SURESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(22, 'T19082221010', 'PATEL NIL ARVINDBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(23, 'T19082221011', 'PANCHAL RUSHIKUMAR JITENDRABHAI', 1, '9909728656', 'yash@gmail.com', 1),
(24, 'T19082221012', 'SAIYAD MOINODDIN NAUSHADALI', 1, '9909728656', 'yash@gmail.com', 1),
(25, 'T19082221013', 'DAVE SRUSTI NIMESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(26, 'T19082221014', 'BHAVIK RAMJIBHAI RUPAPARA', 1, '9909728656', 'yash@gmail.com', 1),
(27, 'T19082221015', 'PRAJAPATI JANVI BHIKHABHAI', 1, '9909728656', 'yash@gmail.com', 1),
(28, 'T19082221016', 'PATEL SOHAMKUMAR KAMLESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(29, 'T19082221017', 'PATEL TRUSHAL LOKESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(30, 'T19082221018', 'SMITKUMAR DINESHBHAI PATEL', 1, '9909728656', 'yash@gmail.com', 1),
(31, 'T19082221019', 'VAGHELA YASHKUMAR MUKESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(32, 'T19082221020', 'PATEL SHREY HARESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(33, 'T19082221021', 'PATEL HENILKUMAR KANUBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(34, 'T19082221022', 'VAGHELA RUTVIK DINESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(35, 'T19082221023', 'PATEL KRIMA MUKESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(36, 'T19082221024', 'JAY VISHNUBHAI PATEL', 1, '9909728656', 'yash@gmail.com', 1),
(37, 'T19082221025', 'RADADIYA RUTVIK MANSUKHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(38, 'T19082221026', 'VADARIYA YASH GIRISHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(39, 'T19082221027', 'JOSHI ARYA JAYESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(40, 'T19082221028', 'SANDIPBHAI CHELABHAI PRAJAPATI', 1, '9909728656', 'yash@gmail.com', 1),
(41, 'T19082221029', 'PATEL YASH JITENDRAKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(42, 'T19082221030', 'PATEL JUBIL PARASKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(43, 'T19082221031', 'CHAUDHARI MAHENDRABHAI VAHATABHAI', 1, '9909728656', 'yash@gmail.com', 1),
(44, 'T19082221032', 'PATEL DEEP GHANSHYAMBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(45, 'T19082221033', 'MAKWANA NIKUNJ BHAGVANBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(46, 'T19082221034', 'DAVE VEDANT JABARESHWAR', 1, '9909728656', 'yash@gmail.com', 1),
(47, 'T19082221035', 'TAMBADIYA MUJAHID HIDAYATULLAH', 1, '9909728656', 'yash@gmail.com', 1),
(48, 'T19082221036', 'PANELIYA EVANSI JAYSUKHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(49, 'T19082221037', 'PANELIYA NENSI NARESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(50, 'T19082221038', 'PRAJAPATI VISHESHKUMAR SANJAYBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(51, 'T19082221039', 'METHANIYA DIXITKUMAR KALPESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(52, 'T19082221040', 'SUTHAR KUNJAN KAMLESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(53, 'T19082221041', 'JASANI DHRUVIN NARESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(54, 'T19082221042', 'MEVADA HIMAL ASHOKKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(55, 'T19082221043', 'LAVINA AGARWAL', 1, '9909728656', 'yash@gmail.com', 1),
(56, 'T19082221044', 'MEENA MEENU DHARAMPAL', 1, '9909728656', 'yash@gmail.com', 1),
(57, 'T19082221046', 'TRIVEDI MEGHA KOMALKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(58, 'T19082221047', 'SUTHAR DHRUMIN RAKESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(59, 'T19082221048', 'CHITARA NAVALKUMAR HARESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(60, 'T19082221049', 'KAPADIYA KULDIPKUMAR RAMANBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(61, 'T19082221050', 'MEHTA YUKTI VIPULKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(62, 'T19082221051', 'PANCHASARA UTSAV KIRITBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(63, 'T19082221052', 'PATEL VINAY DAHYABHAI', 1, '9909728656', 'yash@gmail.com', 1),
(64, 'T19082221053', 'JAYSWAL SMITKUMAR BHAVESHKUMAR', 1, '9909728656', 'yash@gmail.com', 1),
(65, 'T19082221054', 'JAYSWAL DIPANSHU RAKESHBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(66, 'T19082221055', 'SHAH KRUTI DEEPAKBHAI', 1, '9909728656', 'yash@gmail.com', 1),
(67, 'T19082221056', 'ANJALI RAJESHKUMAR PATEL', 1, '9909728656', 'yash@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(255) NOT NULL,
  `sem_id` int(255) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sem_id`, `sub_code`, `sub_name`, `sub_type`) VALUES
(51, 1, 'U11A1IP1', 'INTRODUCTION TO PROGRAMMING 1', 'Theory'),
(52, 1, 'U11A1IP1', 'INTRODUCTION TO PROGRAMMING 1', 'Practical'),
(53, 1, 'U11A2OAT', 'OFFICE AUTOMATION TOOLS', 'Theory'),
(54, 1, 'U11A2OAT', 'OFFICE AUTOMATION TOOLS', 'Practical'),
(55, 1, 'U11A3WD1', 'WEB DESIGNING - 1', 'Theory'),
(56, 1, 'U11A3WD1', 'WEB DESIGNING - 1', 'Practical'),
(57, 1, 'U11A4IT', 'INFORMATION TECHNOLOGY', 'Theory'),
(58, 1, 'U11A5FM', 'FUNDAMATION OF MATHEMATICS', 'Theory'),
(59, 1, 'U11B6CS1', 'LANGUAGE & COMMUNICATION SKILL - 1', 'Theory'),
(60, 7, 'U12A1IP2', 'INTRODUCTION TO PROGRAMMING 2', 'Theory'),
(61, 7, 'U12A1IP2', 'INTRODUCTION TO PROGRAMMING 2', 'Practical'),
(62, 7, 'U12A3FA', 'FINANCIAL ACCOUNTING', 'Theory'),
(63, 7, 'U12A3FA', 'FINANCIAL ACCOUNTING', 'Practical'),
(64, 7, 'U12A2MA', 'MULTIMEDIA AND ANIMATION', 'Theory'),
(65, 7, 'U12A2MA', 'MULTIMEDIA AND ANIMATION', 'Practical'),
(66, 7, 'U12A4COA', 'COMPUTER ORGANIZATION & ARCHITECTURE', 'Theory'),
(67, 7, 'U12A5CF', 'COMPUTER FUNDAMENTALS', 'Theory'),
(68, 7, 'U12B6CS2', 'LANGUAGE & COMMUNICATION SKILL - 2', 'Theory'),
(69, 15, 'U13A1DS', 'DATA STRUCTURE', 'Theory'),
(70, 15, 'U13A1DS', 'DATA STRUCTURE', 'Practical'),
(71, 15, 'U13A2OCP', 'OBJECT ORIENTED CONCEPTS & PROGRAMMING', 'Theory'),
(72, 15, 'U13A2OCP', 'OBJECT ORIENTED CONCEPTS & PROGRAMMING', 'Practical'),
(73, 15, 'U13A3DMS', 'DATABASE MANAGEMENT SYSYTEM', 'Theory'),
(74, 15, 'U13A3DMS', 'DATABASE MANAGEMENT SYSYTEM', 'Practical'),
(75, 15, 'U13A4SAD', 'SYSTEM ANALYSIS AND DESIGN', 'Theory'),
(76, 15, 'U13A5OR ', 'OPERATION RESEARCH', 'Theory'),
(77, 15, 'U13B6EDM', 'ENVIRONMENT DESASTER MANAGEMENT', 'Theory'),
(78, 16, 'U14A1WT1', 'WEB TECHNOLOGY - 1', 'Theory'),
(79, 16, 'U14A1WT1', 'WEB TECHNOLOGY - 1', 'Practical'),
(80, 16, 'U14A2BWD', 'BASIC WEB PROGRAMMING & DESIGNING', 'Theory'),
(81, 16, 'U14A2BWD', 'BASIC WEB PROGRAMMING & DESIGNING', 'Practical'),
(82, 16, 'U14A4NT1', 'NETWORK TECHNOLOGY', 'Theory'),
(83, 16, 'U14A5SE', 'SOFTWARE ENGINEERING', 'Theory'),
(84, 16, 'U14B6SQA', 'SOFTWARE QUALITY ASSURANCE', 'Theory'),
(85, 11, 'U15A1WT1', 'WEB TECHNOLOGY - 1', 'Theory'),
(86, 11, 'U15A1WT1', 'WEB TECHNOLOGY - 1', 'Practical'),
(87, 11, 'U15A2BWD', 'BASIC WEB PROGRAMMING & DESIGNING', 'Theory'),
(88, 11, 'U15A2BWD', 'BASIC WEB PROGRAMMING & DESIGNING', 'Practical'),
(89, 11, 'U15A3OS', 'OPERATING SYSTEM', 'Theory'),
(90, 11, 'U15A3OS', 'OPERATING SYSTEM', 'Practical'),
(91, 11, 'U15A4NT2', 'NETWORK TECHNOLOGY - 2', 'Theory'),
(92, 11, 'U15A4NT2', 'NETWORK TECHNOLOGY - 2', 'Practical'),
(93, 11, 'U15A5PR1', 'INDUSTRIAL PROJECT - 1', 'Practical'),
(94, 11, 'U15B6BAA', 'BUSNESS ANALYSIS & ANALYTICS', 'Theory'),
(95, 27, 'U16A1PR2', 'INDUSTRIAL PROJECT - 2', 'Practical'),
(96, 10, 'U61A1IP1', 'INTRODUCTION TO PROGRAMMING 1', 'Theory'),
(97, 10, 'U61A1IP1', 'INTRODUCTION TO PROGRAMMING 1', 'Practical'),
(98, 10, 'U61A2WD1', 'WEB DESIGNING - 1', 'Theory'),
(99, 10, 'U61A2WD1', 'WEB DESIGNING - 1', 'Practical'),
(100, 10, 'U61A3OS1', 'OPERATING SYSTEM SECURITY - 1', 'Theory'),
(101, 10, 'U61A3OS1', 'OPERATING SYSTEM SECURITY - 1', 'Practical'),
(102, 10, 'U61A4FIS', 'FUNDAMENTAL OF INFORMATION SECURITY', 'Theory'),
(103, 10, 'U61A5FM', 'FUNDAMATION OF MATHEMATICS', 'Theory'),
(104, 10, 'U61B6CS1', 'LANGUAGE & COMMUNICATION SKILL - 1', 'Theory'),
(105, 19, 'U62A1IP2', 'INTRODUCTION TO PROGRAMMING 2', 'Theory'),
(106, 19, 'U62A1IP2', 'INTRODUCTION TO PROGRAMMING 2', 'Practical'),
(107, 19, 'U62A2WD2', 'WEB DESIGNING - 2', 'Theory'),
(108, 19, 'U62A2WD2', 'WEB DESIGNING - 2', 'Practical'),
(109, 19, 'U62A3OS2', 'OPERATING SYSTEM SECURITY - 2', 'Theory'),
(110, 19, 'U62A3OS2', 'OPERATING SYSTEM SECURITY - 2', 'Practical'),
(111, 19, 'U62A4COA', 'COMPUTER ORGANIZATION & ARCHITECTURE', 'Theory'),
(112, 19, 'U62A5FCS', 'FUNDAMENTAL OF CYBER SECURITY', 'Theory'),
(113, 19, 'U62B6CS2', 'LANGUAGE & COMMUNICATION SKILL - 2', 'Theory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_mark`
--
ALTER TABLE `add_mark`
  ADD PRIMARY KEY (`add_mark_id`),
  ADD KEY `marks_id` (`marks_id`),
  ADD KEY `assign_block_id` (`assign_block_id`),
  ADD KEY `marks` (`marks`),
  ADD KEY `att_pr_id` (`att_pr_id`);

--
-- Indexes for table `assign_block`
--
ALTER TABLE `assign_block`
  ADD PRIMARY KEY (`ass_b_id`),
  ADD KEY `b_arr_id` (`b_arr_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `assign_student_in_batch`
--
ALTER TABLE `assign_student_in_batch`
  ADD PRIMARY KEY (`ass_stud_b_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `attendance_practical`
--
ALTER TABLE `attendance_practical`
  ADD PRIMARY KEY (`att_pr_id`),
  ADD KEY `exam_sch_pr_id` (`exam_sch_pr_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `batch_name` (`batch_name`);

--
-- Indexes for table `block_arrangement`
--
ALTER TABLE `block_arrangement`
  ADD PRIMARY KEY (`b_arr_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `exam_sch_th_id` (`exam_sch_th_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exam_generation`
--
ALTER TABLE `exam_generation`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_schedule_practical`
--
ALTER TABLE `exam_schedule_practical`
  ADD PRIMARY KEY (`exam_sch_pra_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `exam_schedule_theory`
--
ALTER TABLE `exam_schedule_theory`
  ADD PRIMARY KEY (`exam_sch_th_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `f_code` (`f_code`),
  ADD UNIQUE KEY `f_mail` (`f_mail`),
  ADD UNIQUE KEY `f_mobile` (`f_mobile`);

--
-- Indexes for table `faculty_permission`
--
ALTER TABLE `faculty_permission`
  ADD PRIMARY KEY (`fac_per_id`),
  ADD KEY `fac_id` (`f_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `fac_per_id` (`fac_per_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `exam_sch_th_id` (`exam_sch_th_id`),
  ADD KEY `exam_sch_pr_id` (`exam_sch_pr_id`);

--
-- Indexes for table `room_arrangement`
--
ALTER TABLE `room_arrangement`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `foreignkey` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `foreignkey` (`sem_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_mark`
--
ALTER TABLE `add_mark`
  MODIFY `add_mark_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_block`
--
ALTER TABLE `assign_block`
  MODIFY `ass_b_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `assign_student_in_batch`
--
ALTER TABLE `assign_student_in_batch`
  MODIFY `ass_stud_b_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_practical`
--
ALTER TABLE `attendance_practical`
  MODIFY `att_pr_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `block_arrangement`
--
ALTER TABLE `block_arrangement`
  MODIFY `b_arr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_generation`
--
ALTER TABLE `exam_generation`
  MODIFY `exam_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_schedule_practical`
--
ALTER TABLE `exam_schedule_practical`
  MODIFY `exam_sch_pra_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_schedule_theory`
--
ALTER TABLE `exam_schedule_theory`
  MODIFY `exam_sch_th_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty_permission`
--
ALTER TABLE `faculty_permission`
  MODIFY `fac_per_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_arrangement`
--
ALTER TABLE `room_arrangement`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_mark`
--
ALTER TABLE `add_mark`
  ADD CONSTRAINT `bgfdchgjh` FOREIGN KEY (`assign_block_id`) REFERENCES `assign_block` (`ass_b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mklojhgg` FOREIGN KEY (`att_pr_id`) REFERENCES `attendance_practical` (`att_pr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nvcxsfg` FOREIGN KEY (`marks_id`) REFERENCES `marks` (`marks_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_block`
--
ALTER TABLE `assign_block`
  ADD CONSTRAINT `bhggbkjnk` FOREIGN KEY (`b_arr_id`) REFERENCES `block_arrangement` (`b_arr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `knkjjfutd` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_student_in_batch`
--
ALTER TABLE `assign_student_in_batch`
  ADD CONSTRAINT `foreKeyBID` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreginKeyStudentId` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance_practical`
--
ALTER TABLE `attendance_practical`
  ADD CONSTRAINT `eqxaxcsv` FOREIGN KEY (`exam_sch_pr_id`) REFERENCES `exam_schedule_practical` (`exam_sch_pra_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mlkkkhjgh` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `block_arrangement`
--
ALTER TABLE `block_arrangement`
  ADD CONSTRAINT `ffffffexam_id` FOREIGN KEY (`exam_sch_th_id`) REFERENCES `exam_schedule_theory` (`exam_sch_th_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ffffffff_id` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fffffffr_id` FOREIGN KEY (`r_id`) REFERENCES `room_arrangement` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_schedule_practical`
--
ALTER TABLE `exam_schedule_practical`
  ADD CONSTRAINT `foregin1` FOREIGN KEY (`exam_id`) REFERENCES `exam_generation` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foregin2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foregin3` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foregin4` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_schedule_theory`
--
ALTER TABLE `exam_schedule_theory`
  ADD CONSTRAINT `tyurtyur` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `werwetw` FOREIGN KEY (`exam_id`) REFERENCES `exam_generation` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_permission`
--
ALTER TABLE `faculty_permission`
  ADD CONSTRAINT `foreginKeyBId` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreginKeyFId` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreginKeySubId` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `eeytrytyuyoio` FOREIGN KEY (`exam_sch_th_id`) REFERENCES `exam_schedule_theory` (`exam_sch_th_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fsrdytfuyghlj` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hkihihkl` FOREIGN KEY (`exam_sch_pr_id`) REFERENCES `exam_schedule_practical` (`exam_sch_pra_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kujyhtgr` FOREIGN KEY (`fac_per_id`) REFERENCES `faculty_permission` (`fac_per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `forignkeysemId` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `foreignkey-sem_id` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
