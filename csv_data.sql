-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 01:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `gmail_tbl`
--

CREATE TABLE `gmail_tbl` (
  `id` int(11) NOT NULL,
  `gmail_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gmail_tbl`
--

INSERT INTO `gmail_tbl` (`id`, `gmail_email`) VALUES
(1, 'Emily@gmail.com'),
(2, 'Jennifer@gmail.com'),
(3, 'Kimberly@gmail.com'),
(4, 'Maria@gmail.com'),
(5, 'Nicola@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `other_tbl`
--

CREATE TABLE `other_tbl` (
  `id` int(11) NOT NULL,
  `other_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_tbl`
--

INSERT INTO `other_tbl` (`id`, `other_email`) VALUES
(1, 'Grace@google.com'),
(2, 'Lily@facebook.com'),
(3, 'Victoria@commom.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `first_name`, `email`, `contact_no`, `status`) VALUES
(1, 'Emily', 'Emily@gmail.com', '202-555-0117', 'active'),
(2, 'Fiona', 'Fiona@yahoo.com', '202-555-0109', 'active'),
(3, 'Grace', 'Grace@google.com', '202-555-0163', 'inactive'),
(4, 'Jennifer', 'Jennifer@gmail.com', '202-555-0139', 'active'),
(5, 'Karen', 'Karen@yahoo.com', '202-555-0182', 'active'),
(6, 'Kimberly', 'Kimberly@gmail.com', '202-555-0177', 'active'),
(7, 'Lily', 'Lily@facebook.com', '202-555-0117', 'active'),
(8, 'Maria', 'Maria@gmail.com', '202-555-0117', 'active'),
(9, 'Nicola', 'Nicola@gmail.com', '202-555-0117', 'inactive'),
(10, 'Stephanie', 'Stephanie@yahoo.com', '202-555-0117', 'active'),
(11, 'Victoria', 'Victoria@commom.com', '202-555-0117', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `yahoo_tbl`
--

CREATE TABLE `yahoo_tbl` (
  `id` int(11) NOT NULL,
  `yahoo_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yahoo_tbl`
--

INSERT INTO `yahoo_tbl` (`id`, `yahoo_email`) VALUES
(1, 'Fiona@yahoo.com'),
(2, 'Karen@yahoo.com'),
(3, 'Stephanie@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gmail_tbl`
--
ALTER TABLE `gmail_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_tbl`
--
ALTER TABLE `other_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yahoo_tbl`
--
ALTER TABLE `yahoo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gmail_tbl`
--
ALTER TABLE `gmail_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other_tbl`
--
ALTER TABLE `other_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `yahoo_tbl`
--
ALTER TABLE `yahoo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
