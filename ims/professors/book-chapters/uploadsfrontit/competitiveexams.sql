-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 04:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitiveexams`
--

CREATE TABLE `competitiveexams` (
  `id` int(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Registration_number` varchar(255) NOT NULL,
  `Name_of_student` varchar(255) NOT NULL,
  `Name_of_exam` varchar(255) NOT NULL,
  `OTHER` varchar(255) DEFAULT NULL,
  `pdffile1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitiveexams`
--

INSERT INTO `competitiveexams` (`id`, `Year`, `Department`, `Registration_number`, `Name_of_student`, `Name_of_exam`, `OTHER`, `pdffile1`) VALUES
(4, '2017-18', 'IT', '77', 'hg', 'GRE', 'g', ''),
(5, '2017-18', 'IT', '3', 'e', 'OTHER', 's', ''),
(6, '2017-18', 'IT', '5', 'e', 'IELTS', 's', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitiveexams`
--
ALTER TABLE `competitiveexams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitiveexams`
--
ALTER TABLE `competitiveexams`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
