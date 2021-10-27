-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saic`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `designation`, `department`, `phone`, `email`, `created_at`) VALUES
(1, 'Jahid Hasan', 'Jr. Instructor', 'Computer', '01812457825', 'jahid@saic.com', '2021-10-10 21:47:58'),
(2, 'Nibash Gharami', 'Instructor', 'Architechture', '01871235689', 'nibash@saic.com', '2021-10-10 21:51:43'),
(3, 'Robiul', 'Instructor', 'Civil', '01812457845', 'robi@saic.com', '2021-10-10 21:52:49'),
(4, 'Rana', 'Instructor', 'Civil', '01912457896', 'rana@gmail.com', '2021-10-10 21:53:30'),
(5, 'Hafizul Islam', 'Instructor', 'Computer', '01825362536', 'hafiz@mail.com', '2021-10-27 08:51:59'),
(6, 'Robiul Islam', 'Jr. Instructor', 'Computer', '01821020102', 'hridoy@mail', '2021-10-27 08:52:59'),
(7, 'Hannan', 'Instructor', 'CMT', '01825364566', 'mannan123@saic.com', '2021-10-27 08:54:43'),
(8, 'Rakib', 'Instructor', 'CMT', '01825364567', 'mannan11@saic.com', '2021-10-27 08:57:45'),
(9, 'Nidhi Rahman', 'Instructor', 'Computer', '01825364458', 'ratul_n@saic.com', '2021-10-27 08:58:37'),
(10, 'Karim', 'Sr. Instructor', 'CT', '01828326598', 'saim@mail.com', '2021-10-27 09:00:16'),
(11, 'Shakil', 'Instructor', 'Computer', '01878451245', 'shakil@saic.com', '2021-10-27 09:01:40'),
(12, 'Abul Islam', 'Shakil', 'Computer', '01874589654', 'abul@saic.com', '2021-10-27 09:02:39'),
(13, 'Al Rafi', 'Instructor', 'Computer', '01845659852', 'rafi@gmail.com', '2021-10-27 09:04:03'),
(14, 'Razibul Khan', 'Instructor', 'Computer', '01856457825', 'rkhan@saic.com', '2021-10-27 09:15:31'),
(16, 'Tonmoy', 'Instructor', 'Computer', '01828325263', 'tonmoy@saic.com', '2021-10-27 09:35:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
