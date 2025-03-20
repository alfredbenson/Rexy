-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2025 at 09:12 AM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_initial` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` enum('Single','Married','Widowed','Legally Separated','Others') NOT NULL,
  `tin` varchar(9) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `pob_unit_bldg` varchar(255) DEFAULT NULL,
  `pob_house_lot_blk` varchar(255) DEFAULT NULL,
  `pob_street_name` varchar(255) DEFAULT NULL,
  `pob_subdivision` varchar(255) DEFAULT NULL,
  `pob_barangay` varchar(255) DEFAULT NULL,
  `pob_city_municipality` varchar(255) DEFAULT NULL,
  `pob_province` varchar(255) DEFAULT NULL,
  `pob_country` varchar(100) DEFAULT NULL,
  `pob_zipcode` varchar(10) DEFAULT NULL,
  `home_unit_bldg` varchar(255) DEFAULT NULL,
  `home_house_lot_blk` varchar(255) DEFAULT NULL,
  `home_street_name` varchar(255) DEFAULT NULL,
  `home_subdivision` varchar(255) DEFAULT NULL,
  `home_barangay` varchar(255) DEFAULT NULL,
  `home_city_municipality` varchar(255) DEFAULT NULL,
  `home_province` varchar(255) DEFAULT NULL,
  `home_country` varchar(100) DEFAULT NULL,
  `home_zipcode` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cell` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(32) NOT NULL,
  `father_lname` varchar(122) NOT NULL,
  `father_fname` varchar(100) NOT NULL,
  `father_mi` char(1) NOT NULL,
  `mother_lname` varchar(100) NOT NULL,
  `mother_fname` varchar(100) NOT NULL,
  `mother_mi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tin` (`tin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
