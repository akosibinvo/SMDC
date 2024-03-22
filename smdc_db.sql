-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 01:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smdc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Place_of_birth` varchar(255) DEFAULT NULL,
  `Tin_no` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Civil_status` varchar(255) DEFAULT NULL,
  `Citizenship` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone_no` varchar(20) DEFAULT NULL,
  `Passport_no` varchar(255) DEFAULT NULL,
  `Present_address` varchar(255) DEFAULT NULL,
  `Permanent_address` varchar(255) DEFAULT NULL,
  `Employer_name` varchar(255) DEFAULT NULL,
  `Work_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`ID`, `FirstName`, `MiddleName`, `LastName`, `Date_of_birth`, `Place_of_birth`, `Tin_no`, `Gender`, `Civil_status`, `Citizenship`, `Email`, `Phone_no`, `Passport_no`, `Present_address`, `Permanent_address`, `Employer_name`, `Work_address`) VALUES
(63, 'John', 'Sample', ' Doe', '2024-03-21', 'Pasig', 987654321, 'Male', 'Separated', 'Australia', 'samplemail@gmail.com', '09873495721', '987654321', 'Pasig', 'Pasig', 'Try', 'Pasig'),
(64, 'Sample', 'Sample', ' Surname', '2024-03-15', 'Pasig', 987654321, 'Male', 'Single', 'Aruba', 'samplemail@gmail.com', '09873495721', '987654321', 'Pasig', 'Pasig', 'Try', 'Pasig');

-- --------------------------------------------------------

--
-- Table structure for table `image_document`
--

CREATE TABLE `image_document` (
  `image_id` int(11) NOT NULL,
  `RA` varchar(255) DEFAULT NULL,
  `Holding` varchar(255) DEFAULT NULL,
  `RF` varchar(255) DEFAULT NULL,
  `ID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'SA1'),
(2, 'SA2'),
(3, 'IMP'),
(4, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_booking`
--

CREATE TABLE `transaction_booking` (
  `client_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `Unit_code` varchar(255) DEFAULT NULL,
  `Amount` int(11) NOT NULL,
  `RA` varchar(255) DEFAULT NULL,
  `Holding` varchar(255) DEFAULT NULL,
  `RF` varchar(255) DEFAULT NULL,
  `ID` varchar(255) DEFAULT NULL,
  `Transaction_date` date DEFAULT current_timestamp(),
  `agent` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_booking`
--

INSERT INTO `transaction_booking` (`client_id`, `firstname`, `Unit_code`, `Amount`, `RA`, `Holding`, `RF`, `ID`, `Transaction_date`, `agent`, `status`) VALUES
(27, 'John', 'A421FC', 2750000, 'landing-page-2.png', 'landing-page-3.png', 'landing-page-3.png', 'landing-page-3.png', '2024-03-19', 'Roy', 'Booked'),
(33, 'John', 'A421FC', 1750000, 'landing-page-2.png', 'Modern and Responsive WordPress Website.jfif', 'GOTOEGYPT - Travel Landing Page.jfif', 'national_geographic_landingpage3x_jpg by Alba Fernández.jfif', '2024-04-19', 'Roy', 'Booked'),
(34, 'Sample', 'A421FC', 400000000, '12312.png', 'Modern and Responsive WordPress Website.jfif', 'Modern and Responsive WordPress Website.jfif', 'Modern and Responsive WordPress Website.jfif', '2024-03-19', 'ERic', 'Booked'),
(36, 'John', 'A421FC', 2000000, 'Profile.png', 'User.png', 'Statistics.png', 'User.png', '2024-01-20', 'Roy', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `unit_info`
--

CREATE TABLE `unit_info` (
  `id` int(11) NOT NULL,
  `Project_name` varchar(255) DEFAULT NULL,
  `Unit_code` varchar(255) DEFAULT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_info`
--

INSERT INTO `unit_info` (`id`, `Project_name`, `Unit_code`, `Amount`) VALUES
(25, 'Project A', 'ABCDEF', 2500000),
(26, 'Project B', 'GHIJKL', 2850000),
(27, 'Project C', 'MNOPQR', 3000000),
(28, 'Project D', 'STUVWX', 3750000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(11) NOT NULL,
  `dateJoined` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstName`, `lastName`, `email`, `password`, `role`, `dateJoined`, `active`, `img`) VALUES
(1, 'Michael', 'Miranda', 'michaelatejeramiranda015@gmail.com', '$2y$10$tp/EOfJEQBGGXDh0UKBpnekikxuBen60q2wihvPs0sUG7mXiUOLSC', 'SA1', '2024-03-16 16:00:02', 1, ''),
(2, 'Eric', 'Dango', 'erikkuuu23@gmail.com', '$2y$10$99JeQVkiomxUpnY6lVUbwOkkWQIbpKhR/ls19.aO/nomNk4A1PmPW', 'SA1', '2024-03-18 10:27:12', 1, ''),
(3, 'Roy', 'Gumban', 'roygumban@gmail.com', '$2y$10$dal5jPMpJ/BYdMLNIUFLeewq9lVbUyNdSxfyF9o7Qrll1t4ZI8lGe', 'IMP', '2024-03-18 10:46:39', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `image_document`
--
ALTER TABLE `image_document`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_booking`
--
ALTER TABLE `transaction_booking`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `unit_info`
--
ALTER TABLE `unit_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `image_document`
--
ALTER TABLE `image_document`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_booking`
--
ALTER TABLE `transaction_booking`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `unit_info`
--
ALTER TABLE `unit_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
