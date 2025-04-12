-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middle` varchar(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('student','teacher') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `middle`, `email`, `password`, `role`) VALUES
(1, 'And', 'LEo', 'A', 'leo03@gmail.com', '123', 'student'),
(4, 'And', 'LEo', 'A', 'leo04@gmail.com', '123', 'student'),
(5, 'firstname', 'lastname', 'M', 'Email@gmail.com', 'password', 'teacher'),
(9, 'Andrew', 'LEo', 'R', 'john@gmail.com', '12345', 'student'),
(10, 'Andrew', 'LEo', 'R', 'test@mail.com', 'PASSWORD', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentdb`
--

CREATE TABLE `assignmentdb` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignmentdb`
--

INSERT INTO `assignmentdb` (`id`, `student_name`, `subject`, `timestamp`, `file_name`, `stud_id`) VALUES
(1, 'hgdsfh', 'ujhf', '2025-04-08 16:46:17', 'Midterm_Leonardo.docx', NULL),
(2, 'hgdsfh', 'ujhf', '2025-04-08 16:46:45', 'Midterm_Leonardo.docx', NULL),
(3, 'hgdsfh', 'ujhf', '2025-04-08 16:48:04', 'Midterm_Leonardo.docx', NULL),
(4, 'hgdsfh', 'ujhf', '2025-04-08 16:49:06', 'Midterm_Leonardo.docx', NULL),
(5, 'hgdsfh', 'jahsdu', '2025-04-08 16:59:10', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(6, 'hgdsfh', 'jahsdu', '2025-04-08 16:59:54', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(7, 'hgdsfh', 'jahsdu', '2025-04-08 17:00:38', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(8, 'hgdsfh', 'jahsdu', '2025-04-08 17:00:44', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(9, 'hgdsfh', 'jahsdu', '2025-04-08 17:01:50', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(10, 'hgdsfh', 'jahsdu', '2025-04-08 17:01:57', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(11, 'hgdsfh', 'jahsdu', '2025-04-08 17:03:15', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(12, 'hgdsfh', 'jahsdu', '2025-04-08 17:03:20', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(13, 'hgdsfh', 'jahsdu', '2025-04-08 17:04:37', 'LabVision_WebApp_ShortBp (2).docx', NULL),
(14, 'hgdsfh', 'jahsdu', '2025-04-08 17:04:55', 'ATHENA_WebApp_ShortBp (1) (1).pdf', NULL),
(15, 'sjhj', 'ujhf', '2025-04-08 18:04:27', 'ATHENA_WebApp_ShortBp (1).docx', NULL),
(16, 'Andrew', 'FRE', '2025-04-08 18:12:39', 'Personal Notes (2).pdf', NULL),
(17, 'hgdsfh', 'ujhf', '2025-04-12 15:58:33', 'Brown Hotel And Resort Instagram Story (1).pdf', NULL),
(18, 'Andrew', 'FRE', '2025-04-12 16:18:42', 'SciVerse_MobileApp_ShortBp.pdf', NULL),
(19, 'hgdsfh', 'ujhf', '2025-04-12 19:39:06', 'Lab Monitoring.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `assignmentdb`
--
ALTER TABLE `assignmentdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assignmentdb`
--
ALTER TABLE `assignmentdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
