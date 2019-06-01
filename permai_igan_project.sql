-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 02:36 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permai_igan_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `permai`
--

CREATE TABLE `permai` (
  `user_ID` int(200) NOT NULL,
  `yourName` varchar(100) NOT NULL,
  `identification` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `homeAdd` varchar(200) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `birthDate` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permai`
--

INSERT INTO `permai` (`user_ID`, `yourName`, `identification`, `qualification`, `occupation`, `homeAdd`, `birthPlace`, `birthDate`, `phone`, `origin`, `created_at`) VALUES
(1, 'Mujadid', '931002135319', 'bachelors degree', 'laboratory technician', 'Savanna Executive Suite', 'Sri Aman', '02/10/1993', '0172238374', 'Kuching', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permai`
--
ALTER TABLE `permai`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permai`
--
ALTER TABLE `permai`
  MODIFY `user_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
