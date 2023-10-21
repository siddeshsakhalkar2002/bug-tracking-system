use bugtrackingsystem;
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2023 at 06:58 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugtrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(11) NOT NULL,
  `bug_name` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `bug_date` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `bug_name`, `project_name`, `bug_date`, `description`) VALUES
(2, 'Total payments Display error', 'Loan Management System', '24-10-2023', 'Not showing total payments count on home screen.'),
(3, 'Video play error', 'Virtual Gym ', '20-08-2023', 'Video for bicep workout doesnt play');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `submission_date` varchar(50) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_number` varchar(20) NOT NULL,
  `project_lead` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `submission_date`, `client_name`, `client_address`, `client_number`, `project_lead`, `description`) VALUES
(1, 'Loan Management System', '10-06-2023', 'Shubham Manohar Prajapati', 'Burhanpur, Madhya Pradesh.', '8524789632', '#', 'Simple Application to keep records of EMI , penalty and loan related terms.'),
(2, 'Virtual Gym ', '10-08-2023', 'Akshata Thakare', 'Nashik', '8412579632', '#', 'This system will guide you to do gym at home. This system will provide videos of exercises of different body part workouts.'),
(3, 'Bugtracking System', '21-09-2023', 'shivraj', 'pune', '7421589632', '#', 'system to track bugs');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contactNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`firstName`, `lastName`, `gender`, `email`, `password`, `contactNo`) VALUES
('Rohit', 'Patil', 'Male', 'rohit@gmail.com', '1233456', 2147483647),
('Akshata ', 'Thakre', 'Female', 'akshata@gmail.com', '1234', 2147483647),
('aditi', 'sawant', 'Female', 'aditi@gmail.com', '1234', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `resolved`
--

CREATE TABLE `resolved` (
  `bug_id` int(11) NOT NULL,
  `bug_name` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `bug_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `resolved_date` varchar(255) NOT NULL,
  `resolved_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolved`
--

INSERT INTO `resolved` (`bug_id`, `bug_name`, `project_name`, `bug_date`, `description`, `resolved_date`, `resolved_description`) VALUES
(1, 'EMI Calculation Error', 'Loan Management System', '20-06-2023', 'EMI Calculation is wrong and displays wrong amount.', '30-06-2023', 'Corrected Calculation Error');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resolved`
--
ALTER TABLE `resolved`
  ADD PRIMARY KEY (`bug_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resolved`
--
ALTER TABLE `resolved`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
