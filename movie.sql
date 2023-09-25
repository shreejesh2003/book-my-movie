-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 06:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(11) NOT NULL,
  `Theatre_id` int(11) NOT NULL,
  `Movie_id` int(11) NOT NULL,
  `Cust_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(10) NOT NULL,
  `Seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_id`, `Theatre_id`, `Movie_id`, `Cust_id`, `Date`, `Time`, `Seat_no`) VALUES
(84, 1, 1, 1, '2022-02-01', '09:00:00', 1),
(85, 3, 1, 1, '2022-02-01', '09:00:00', 1),
(86, 1, 1, 1, '2022-02-01', '09:00:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_id` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Gender` varchar(8) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_id`, `Name`, `Gender`, `Age`, `Email`) VALUES
(1, 'ADMIN', 'Male', 14, 'admin@admin.com'),
(2, 'Shreejesha t', 'Male', 12, 'tshreejesh@gmail.com'),
(3, ' Shyamanth Shetty', '', 99, 'shettyshyamanth@outlook'),
(4, ' fuil', 'Male', 11, 'li'),
(5, ' Yogeesha Bayari', 'Male', 25, 'yogishbayari@gmail.com'),
(7, ' 123', 'Male', 12, '123'),
(8, ' new', 'Male', 12, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `C_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`C_id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'tshreejesh@gmail.com', '1234'),
(3, 'shettyshyamanth@outlook', 'hkf'),
(4, 'li', '111111'),
(5, 'yogishbayari@gmail.com', 'asd'),
(6, 'asd', '123'),
(7, '123', '123'),
(8, 'new', '123');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `M_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Rating` decimal(2,1) NOT NULL,
  `Language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`M_id`, `Name`, `Rating`, `Language`) VALUES
(1, 'Madagaja', '4.5', 'Kannada'),
(2, 'Pushpa', '4.0', 'Telugu'),
(3, 'Spiderman', '4.5', 'English'),
(4, '83', '4.0', 'Hindi'),
(5, 'Bajarangi 2', '3.0', 'Kannada'),
(6, 'Garuda Gamana Vrishabha Vahana', '3.5', 'Kannada'),
(49, 'RRR', '4.0', 'Telugu');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `T_id` int(11) NOT NULL,
  `M_id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`T_id`, `M_id`, `time`) VALUES
(1, 1, '09:00:00'),
(1, 1, '13:00:00'),
(1, 4, '09:00:00'),
(2, 1, '09:00:00'),
(2, 1, '16:00:00'),
(3, 1, '09:00:00'),
(3, 4, '09:00:00'),
(34, 49, '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `T_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`T_id`, `Name`, `Location`, `Capacity`) VALUES
(1, 'PVS Manglore', 'Manglore', 100),
(2, 'Prabath Manglore', 'Manglore', 100),
(3, 'Jyothi', 'Manglore', 100),
(4, 'Alankar', 'Udupi', 100),
(34, 'PVS Udupi', 'Udupi', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `Movie_id` (`Movie_id`),
  ADD KEY `Theatre_id` (`Theatre_id`),
  ADD KEY `Cust_id` (`Cust_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`M_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`T_id`,`M_id`,`time`),
  ADD KEY `M_id` (`M_id`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`T_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `T_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Movie_id`) REFERENCES `movies` (`M_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Theatre_id`) REFERENCES `theatres` (`T_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`C_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `login` (`C_id`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `theatres` (`T_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`M_id`) REFERENCES `movies` (`M_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;