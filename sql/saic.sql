-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 06:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(30) NOT NULL,
  `seat_capacity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `seat_capacity`, `created_at`) VALUES
(1, 'Computer', 100, '2022-02-04 05:53:56'),
(2, 'Civil', 80, '2022-02-04 05:53:56'),
(3, 'Automobile', 50, '2022-02-04 05:53:56'),
(4, 'Electrical', 30, '2022-02-04 05:53:56'),
(5, 'Architecture', 50, '2022-02-04 05:53:56'),
(6, 'Febric', 50, '2022-02-04 05:53:56'),
(7, 'Garments', 40, '2022-02-04 05:53:56'),
(8, 'GDPM', 50, '2022-02-04 05:53:56'),
(9, 'Yarn', 10, '2022-02-04 05:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`) VALUES
(1, 'Admin', '2022-02-04 11:51:25'),
(2, 'Teacher', '2022-02-04 11:51:25'),
(3, 'Student', '2022-02-04 11:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `session` varchar(9) NOT NULL,
  `department` varchar(20) NOT NULL,
  `birthdate` date NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll`, `name`, `session`, `department`, `birthdate`, `phone`, `created_at`) VALUES
(141615, 'Rina Islam', '2018-2019', 'Computer', '2022-01-29', '29-01-2022', '2022-02-04 11:53:26'),
(145701, 'Rana Islam', '2018-2019', 'Telecommunication', '2001-01-27', '01821090999', '2022-02-04 11:53:26'),
(145702, 'Rabbi Islam', '2018-2019', 'Febric', '2010-12-24', '01821899122', '2022-02-04 11:53:26'),
(145703, 'Ashok Kumar Das', '2019-2020', 'Garments', '2019-12-11', '01821899128', '2022-02-04 11:53:26'),
(145704, 'Habiba', '2020-2021', 'Computer', '1999-10-12', '01812345676', '2022-02-04 11:53:26'),
(145705, 'Sabbir', '2020-2021', 'Garments', '2001-01-08', '01882211222', '2022-02-04 11:53:26'),
(145706, 'Riki', '2018-2019', 'GDPM', '2022-01-21', '01812332212', '2022-02-04 11:53:26'),
(145733, 'Himel', '2018-2019', 'Febric', '2022-01-27', '01812345622', '2022-02-04 11:53:26'),
(145787, 'Mukta', '2018-2019', 'Computer', '2022-01-27', '01811223355', '2022-02-04 11:53:26'),
(145789, 'Ashok Kumar Das', '2018-2019', 'Computer', '2001-01-06', '01821221122', '2022-02-04 11:53:26'),
(145797, 'Shahed Mohammad Hridoy', '2018-2019', 'Computer', '2022-01-27', '01848135202', '2022-02-04 11:53:26'),
(145798, 'Md. Nazim', '2018-2019', 'Telecommunication', '2022-01-27', '01812457826', '2022-02-04 11:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `designation`, `department`, `phone`, `email`, `created_at`) VALUES
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
(16, 'Tonmoy', 'Instructor', 'Computer', '01828325263', 'tonmoy@saic.com', '2021-10-27 09:35:08'),
(17, 'Rafayat', 'Instructor', 'Architecture', '01848135202', 'rafayat@gmail.com', '2022-01-26 11:49:59'),
(18, 'Moni', 'Instructor', 'Architecture', '01811221122', 'moni@gmail.com', '2022-01-26 11:50:48'),
(19, 'Nanna', 'Instructor', 'Architecture', '01712122211', 'mon2i@gmail.com', '2022-01-26 11:51:58'),
(20, 'Moniul', 'Instructor', 'Architecture', '01992212231', '111@gmail.com', '2022-01-26 11:52:40'),
(21, 'Hafsa', 'Instructor', 'Architecture', '01821223322', 'hafsa@gmail.com', '2022-01-26 11:53:46'),
(22, 'Hasina', 'Instructor', 'Architecture', '01822112211', 'hasina@gmal.com', '2022-01-26 11:54:38'),
(23, 'Rana Khan', 'Instructor', 'Architecture', '01rana', 'hrd@gkk.com', '2022-01-27 01:34:21'),
(24, 'Hasibul', 'Instructor', 'Architecture', '01821221214', 'ads@gmal.com', '2022-01-27 01:35:31'),
(27, 'Hiya', 'Instructor', 'Architecture', '01822118888', 'hiya@r.com', '2022-01-27 01:53:34'),
(29, 'Hafiza Islam', 'Jr. Instructor', 'Electrical', '01234567890', 'rafayat123@gmail.com', '2022-01-29 11:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `active`, `created_at`) VALUES
(1, 'shahed', '188ee5057377385a7cbc73a7d25e9d66', 1, 1, '2021-10-10 21:41:49'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2021-10-17 01:10:40'),
(3, 'inactive', '19d3894f53ce79c3f836f26cf8a3be3b', 1, 0, '2021-10-17 09:59:27'),
(4, 'lora', 'lora', 1, 1, '0000-00-00 00:00:00'),
(6, 'sh', 'shamimaosman', 2, 1, '2022-01-28 12:18:24'),
(7, 'hafiz', '839a54bf20626e4942bc8f11873f0654', 1, 1, '2022-01-29 02:17:12'),
(9, 'hannan', '77839d5cf53d09e62bdfca3d3172fab1', 1, 0, '2022-01-29 03:05:05'),
(10, 'hnnn', '819cf3cbd890c3328531003f541239d6', 1, 1, '2022-01-29 03:05:34'),
(11, 'hanif', '72e74f574535bdc82cf4b99f8fc064e1', 1, 1, '2022-01-29 03:07:17'),
(13, 'Hablu', 'd345cd7dbae275f51014a2605fa54d0c', 1, 1, '2022-01-30 00:30:25'),
(14, 'dablu', '7712a06978a45a76b663002e3cc0b009', 1, 1, '2022-01-30 00:32:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
