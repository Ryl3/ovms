-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 02:37 PM
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
-- Database: `ovms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `categoryid` int(10) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `serviceid` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `date_created`, `date_updated`) VALUES
(3, 'Lizard', '2024-05-13 08:08:03', '0000-00-00 00:00:00'),
(4, 'Dogs', '2024-05-13 08:27:33', '0000-00-00 00:00:00'),
(5, 'Cats', '2024-05-13 08:27:39', '0000-00-00 00:00:00'),
(6, 'Hamsters', '2024-05-13 08:27:50', '0000-00-00 00:00:00'),
(7, 'Rabbit', '2024-05-13 08:27:56', '0000-00-00 00:00:00'),
(8, 'Snake', '2024-05-13 08:28:02', '0000-00-00 00:00:00'),
(9, 'Dragon', '2024-05-13 08:28:08', '0000-00-00 00:00:00'),
(10, 'Turtle', '2024-05-13 08:28:15', '0000-00-00 00:00:00'),
(11, 'Fish', '2024-05-13 08:28:22', '0000-00-00 00:00:00'),
(13, 'Tiger', '2024-05-13 08:38:34', '0000-00-00 00:00:00'),
(14, 'Lion', '2024-05-13 08:42:31', '0000-00-00 00:00:00'),
(15, 'Rhino', '2024-05-13 08:42:57', '0000-00-00 00:00:00'),
(16, 'Cobra', '2024-05-13 08:45:12', '0000-00-00 00:00:00'),
(17, 'Yak', '2024-05-13 08:46:52', '0000-00-00 00:00:00'),
(18, 'Monkey', '2024-05-13 08:51:38', '0000-00-00 00:00:00'),
(19, 'Parrot', '2024-05-13 08:52:25', '0000-00-00 00:00:00'),
(20, 'Kangaroo', '2024-05-14 01:23:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petid` int(10) NOT NULL,
  `pet_owner` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petid`, `pet_owner`, `name`, `species`, `breed`, `birthdate`, `age`, `sex`) VALUES
(3, 9, 'sam', 'dog', 'cookies', '2023-08-15', 0, 'Male'),
(4, 9, 'ryle', 'cat', 'cookies', '2020-06-25', 0, 'Male'),
(5, 9, 'ryle', 'cat', 'cookies', '2020-06-25', 3, 'Male'),
(6, 9, 'ryle', 'cat', 'cookies', '2020-06-25', 3, 'Male'),
(7, 9, 'aswang', 'dog', 'cookies', '1222-11-11', 0, 'Male'),
(8, 6, 'gwen', 'chana', 'chanagwen', '2024-05-15', 0, 'Female'),
(9, 6, 'jp', 'iru', 'askla', '2024-05-22', 0, 'Male'),
(10, 6, 'remmy', 'cat', 'pusa', '2024-05-31', 0, 'Male'),
(11, 6, 'harvey', 'dragon', 'ball', '2020-06-24', 0, 'Male'),
(12, 6, 'doremi', 'cat', 'sven', '2016-08-24', 0, 'Male'),
(13, 6, 'wqewq', 'eweqw', 'eqwe', '2023-08-24', 0, 'Male'),
(14, 10, 'sese', 'dog', 'askla', '2021-06-11', 0, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `categoryids` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `categoryids`, `name`, `description`, `fee`, `date_created`, `date_updated`) VALUES
(1, '5', 'Vaccine', '<p><span style=\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-size: 13px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a ', 75.00, '2024-05-13', '0000-00-00'),
(2, '16', 'Anti-Rabies', '<p><span style=\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-size: 13px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a ', 100.00, '2024-05-13', '0000-00-00'),
(3, '11,6,7', 'Anti-Rabies', '<p><span style=\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-size: 13px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span></p>', 125.00, '2024-05-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `systeminfo`
--

CREATE TABLE `systeminfo` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `isactive` varchar(255) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `account_status` varchar(20) NOT NULL,
  `avatar` text NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `phone`, `firstname`, `lastname`, `isactive`, `account_type`, `account_status`, `avatar`, `position`) VALUES
(1, 'sasha', '$2y$10$N62THAOLBgjWqxyN.FazLepzxsqJQitJfLtxfPTNJFQ.W6bcOn/xq', 'sasha@gmail.com', 2147483647, 'sasha', 'grey', '', '', '', '', ''),
(2, 'barney', '$2y$10$6/seRVVpqz1UkFX7aQjwQeF1FpZwKYcFyhs/INQmwkvZdcB41nlxi', 'barney@gmail.com', 2147483647, 'barney', 'stinson', '', '', '', '', ''),
(3, 'godzilla', '$2y$10$3HlilMJoWT4Rn.JN9LRuceqg6LpNIWeuw9HDNVq5TLSQkq1ijecFy', 'mothra@gmail.com', 2147483647, 'godzilla', 'mothra', '', '', '', '', ''),
(4, 'godzilla', '$2y$10$KcQuviN0rspINXsSatfOXe/feQafkB8Lyi6MGV4CbqlvoCdDk0.LC', 'mothra@gmail.com', 2147483647, 'godzilla', 'mothra', '', '', '', '', ''),
(5, 'bran', '$2y$10$vLuLLJT9cGctG/9ZKxSPX.Kzby6vHvMmLDnZi/iouS401WMdjP.VC', 'bran@gmail.com', 934423441, 'bran', 'barn', '', '', '', '', ''),
(6, 'legoboi', '$2y$10$RqJWcFgjasgVSrisyoxQ/OLfL7r4apmDirODetGOIpt8OvcH2LKYq', 'lego@gmail.com', 2147483647, 'lego', 'boi', 'active', '', '', '', ''),
(7, 'stark', '$2y$10$LoKci/hY8yCiyfmGVfoOQ.BP8pSyyahZCGGtHqqqTUC/bSXQWs1CS', 'stark@gmail.com', 2147483647, 'stark', 'limo', 'active', '', '', '', ''),
(9, 'daveman', '$2y$10$AVW/k93hcN35poBdq/CohO11cgJ74ttZWOu5.EDhE0rm9ACq.YTz2', 'daveman@gmail.com', 2147483647, 'dave', 'man', 'active', '', '', '', ''),
(10, 'sam', '$2y$10$fFR5hBlmTOnbz8vREDSPTueMu1Hmi6JAHlgFd6eCTvjYk27jtouvG', 'sammacua@yahoo.com', 2147483647, 'sam', 'macua', 'active', '', '', '', ''),
(11, 'admin', '$2y$10$G2ol5FYiqF19pTydZ/3X3.aGXSXzc4QIPvkdDyzV60vA1Pbv4kMci', 'admin@gmail.com', 2147483647, 'Administrator', 'Terminator', 'active', 'admin', '', '', ''),
(12, 'mark', '$2y$10$Hk49rVn/x6VXOtO2BqevoueOOxBCCKi19WbA/LGc5H44TvCAdE6iS', 'mark@gmail.com', 2147483647, 'mark', 'mark', 'active', 'user', 'pending', '', ''),
(13, 'user', '$2y$10$d0epdQ.wFSwzWVpSbv1iH.rgaoO5ZwK7zR2eNEwhezJzxLxlHJqgW', 'user@gmail.com', 2147483647, 'User', 'Client', 'active', 'user', 'pending', '', ''),
(14, 'ses', '$2y$10$Nr.iqv3QO0kZ7MQQXaqvBOj3C3AExLuTvkZ5k3UX4imbYPhhW4dCG', 'ses@gmail.com', 2147483647, 'ses', 'ses', 'active', 'user', 'pending', '', ''),
(15, 'vhong', '$2y$10$WojukS6r1f.m5PUHqvffceXNT2dTGo53eXKlwU/js7BQGTCx/TFwq', 'vhong@gmail.com', 2147483647, 'Vhong', 'Navarro', '', 'admin', 'active', 'uploads/q.jpg', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petid`),
  ADD KEY `owner` (`pet_owner`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systeminfo`
--
ALTER TABLE `systeminfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `systeminfo`
--
ALTER TABLE `systeminfo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `owner` FOREIGN KEY (`pet_owner`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
