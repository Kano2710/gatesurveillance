-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2020 at 05:16 AM
-- Server version: 10.3.22-MariaDB-cll-lve
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
-- Database: `microsys_go_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addride`
--

CREATE TABLE `addride` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `mobile` double(11,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `vacancy` int(1) DEFAULT NULL,
  `vehiclename` varchar(50) DEFAULT NULL,
  `vehiclenumber` varchar(10) DEFAULT NULL,
  `vehiclecolour` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addride`
--

INSERT INTO `addride` (`id`, `username`, `mobile`, `date`, `time`, `source`, `destination`, `vacancy`, `vehiclename`, `vehiclenumber`, `vehiclecolour`, `email`) VALUES
(93, 'Dharam Dhameliya', 8866441288, '2020-03-29', '20:05:00', 'kk', 'kl', 4, 'skoda', 'hj54hj5421', 'jhhj', 'dharam.dhameliya13798@marwadieducation.edu.in'),
(87, 'PJ', 9409258578, '2020-03-31', '20:08:00', 'kkv', 'mefgi', 2, 'ecco', 'gh65ij6476', 'white', 'prashant.jadiya13569@marwadieducation.edu.in'),
(92, 'PJ', 9409258578, '2020-03-29', '20:25:00', 'kkv', 'mef', 4, 'kljl', 'gh54jk5254', 'no', 'prashant.jadiya13569@marwadieducation.edu.in');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL COMMENT 'This is Autority username',
  `userpassword` varchar(8) NOT NULL COMMENT 'This is Autority passworf'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `userpassword`) VALUES
('Kano', 'Kano27'),
('Rachna', 'Rachna18'),
('Rachna', 'Rachna18');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(6) UNSIGNED NOT NULL,
  `CardID` double DEFAULT NULL,
  `GRNO` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `MobileNumber` double DEFAULT NULL,
  `DateLog` date DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `VehicleRegistrationNumber` varchar(10) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_show`
--

CREATE TABLE `logs_show` (
  `id` int(6) UNSIGNED NOT NULL,
  `CardID` double DEFAULT NULL,
  `GRNO` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `MobileNumber` double DEFAULT NULL,
  `DateLog` date DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `VehicleRegistrationNumber` varchar(10) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_show`
--

INSERT INTO `logs_show` (`id`, `CardID`, `GRNO`, `username`, `MobileNumber`, `DateLog`, `TimeIn`, `TimeOut`, `VehicleRegistrationNumber`, `flag`) VALUES
(18, 1, 13725, 'Rachna Pandya', 9909708788, '2020-03-29', '02:38:04', '02:38:21', 'GJ03LC2518', 1),
(17, 1173343143, 13798, 'Dharam Dhameliya', 8866441288, '2020-03-29', '02:37:57', '02:38:12', 'GJ03KR1906', 1),
(16, 1173343143, 13798, 'Dharam Dhameliya', 8866441288, '2020-03-22', '20:57:50', '20:57:56', 'GJ03KR1906', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride_req`
--

CREATE TABLE `ride_req` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` double(10,0) NOT NULL,
  `u1` varchar(50) DEFAULT NULL,
  `u1email` varchar(100) NOT NULL,
  `u1mobile` double(10,0) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pickup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride_req`
--

INSERT INTO `ride_req` (`id`, `username`, `mobile`, `u1`, `u1email`, `u1mobile`, `date`, `time`, `pickup`) VALUES
(61, 'Dharam Dhameliya', 8866441288, 'PJ', 'prashant.jadiya13569@marwadieducation.edu.in', 9409258578, '2020-03-29', '20:05:00', '23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `grno` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` double(11,0) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `grno`, `gender`, `email`, `mobile`, `image`) VALUES
(18, 'PJ', 'PJ', 13569, 'male', 'prashant.jadiya13569@marwadieducation.edu.in', 9409258578, 'Mihir.jpeg'),
(17, 'Harsh Bakori', 'harsh', 13203, 'male', 'harsh.bakori13203@marwadieducation.edu.in', 9427123617, 'Mihir.jpeg'),
(26, 'Dharam Dhameliya', 'Kano', 13798, 'male', 'dharam.dhameliya13798@marwadieducation.edu.in', 8866441288, 'Scan_20190923 (2).jpg'),
(20, 'rachna pandya', 'rachna', 13725, 'female', 'rachna.pandya13725@marwadieducation.edu.in', 9909708788, '61371211-c450-45e8-b61e-58d1fbc98650.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_tmp`
--

CREATE TABLE `users_tmp` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `grno` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` double(11,0) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL COMMENT 'This column stores id which is primary key',
  `GRNO` double NOT NULL,
  `username` text NOT NULL COMMENT 'This column stores name of vehicle owner',
  `VehicleRegistrationNumber` varchar(10) NOT NULL COMMENT 'This column stores vehicle registration number',
  `MobileNumber` double(10,0) NOT NULL COMMENT 'This column stores mobile number of vehicle owner',
  `CardID` double NOT NULL COMMENT 'This column stores id of RFID tag',
  `VehicleType` varchar(11) NOT NULL COMMENT 'This column stores type of vehicle',
  `gender` text NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `GRNO`, `username`, `VehicleRegistrationNumber`, `MobileNumber`, `CardID`, `VehicleType`, `gender`, `image`) VALUES
(11, 12571, 'Mihir Rathod', 'GJ03KG6515', 9898573906, 1173343143, '2', 'male', 'Mihir.jpeg'),
(14, 13798, 'Dharam Dhameliya', 'GJ03KR1906', 8866441288, 1173343143, '2', 'male', 'Scan_20190923 (2).jpg'),
(12, 13725, 'Rachna Pandya', 'GJ03LC2518', 9909708788, 1, '2', 'male', 'Rachna.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addride`
--
ALTER TABLE `addride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_show`
--
ALTER TABLE `logs_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_req`
--
ALTER TABLE `ride_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tmp`
--
ALTER TABLE `users_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addride`
--
ALTER TABLE `addride`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `logs_show`
--
ALTER TABLE `logs_show`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ride_req`
--
ALTER TABLE `ride_req`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users_tmp`
--
ALTER TABLE `users_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This column stores id which is primary key', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
