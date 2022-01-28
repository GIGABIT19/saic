-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 08:47 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `session` varchar(9) NOT NULL,
  `department` varchar(20) NOT NULL,
  `birthdate` date NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll`, `name`, `session`, `department`, `birthdate`, `phone`) VALUES
(141615, 'Rina Islam', '2018-2019', 'Febric', '2022-01-29', '01816666234'),
(145701, 'Rana Islam', '2018-2019', 'Telecommunication', '2001-01-27', '01821090999'),
(145702, 'Rabbi Islam', '2018-2019', 'Febric', '2010-12-24', '01821899122'),
(145703, 'Ashok Kumar Das', '2019-2020', 'Garments', '2019-12-11', '01821899128'),
(145704, 'Habiba', '2020-2021', 'Computer', '1999-10-12', '01812345676'),
(145705, 'Sabbir', '2020-2021', 'Garments', '2001-01-08', '01882211222'),
(145706, 'Riki', '2018-2019', 'GDPM', '2022-01-21', '01812332212'),
(145733, 'Himel', '2018-2019', 'Febric', '2022-01-27', '01812345622'),
(145787, 'Mukta', '2018-2019', 'Computer', '2022-01-27', '01811223355'),
(145797, 'Shahed Mohammad Hridoy', '2018-2019', 'Computer', '2022-01-27', '01848135202'),
(145798, 'Md. Nazim', '2018-2019', 'Telecommunication', '2022-01-27', '01812457826');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
