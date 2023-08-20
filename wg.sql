-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 05:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wg`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `Item_description` varchar(70) NOT NULL,
  `mid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `issold` tinyint(1) NOT NULL,
  `expiration_timestamp` datetime GENERATED ALWAYS AS (`time_stamp` + interval 7 day) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `Item_description`, `mid`, `price`, `time_stamp`, `issold`) VALUES
(1, 'I Phone', 'It have high tech features!', 1, 780, '2023-08-20 14:22:01', 1),
(2, 'Earbuds', 'it have soothing sound', 1, 200, '2023-08-20 14:27:15', 1),
(3, 'Mouse', 'smooth for gaming', 1, 234, '2023-08-20 14:29:00', 1),
(4, 'laptop', 'this have high features', 1, 2344, '2023-08-20 14:33:29', 1),
(5, 'Tv', 'this have high quality', 1, 2323, '2023-08-20 14:28:54', 0),
(6, 'usb', 'fast charging 3.0', 1, 33, '2023-08-20 14:33:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace`
--

CREATE TABLE `marketplace` (
  `mid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `Marketplace name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketplace`
--

INSERT INTO `marketplace` (`mid`, `wid`, `Marketplace name`) VALUES
(2, 1, 'Arun'),
(3, 1, 'Arun'),
(4, 1, 'Arun'),
(5, 1, 'Arun'),
(6, 1, 'boby'),
(7, 1, 'Arun'),
(8, 1, 'Arun'),
(9, 1, 'Arun'),
(10, 1, ''),
(11, 1, ''),
(12, 1, 'Gadget'),
(13, 1, 'Gadget'),
(14, 1, 'Gadget'),
(15, 1, 'Gadget'),
(16, 1, 'Gadget'),
(17, 1, 'Gadget'),
(18, 1, 'Gadget'),
(19, 1, 'Gadget'),
(20, 1, 'Gadget'),
(21, 1, 'Gadget');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace1`
--

CREATE TABLE `marketplace1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `added_timestamp` datetime DEFAULT NULL,
  `expiration_timestamp` datetime GENERATED ALWAYS AS (`added_timestamp` + interval 7 day) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wg`
--

CREATE TABLE `wg` (
  `wid` int(11) NOT NULL,
  `wg-name` varchar(50) NOT NULL,
  `marketplace` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wg`
--

INSERT INTO `wg` (`wid`, `wg-name`, `marketplace`) VALUES
(1, 'whats Group 1', 1),
(2, 'whats Group 2', 0),
(3, 'whats Group 3', 0),
(4, 'whats Group 4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);
ALTER TABLE `item` ADD FULLTEXT KEY `item_name` (`item_name`);

--
-- Indexes for table `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `marketplace1`
--
ALTER TABLE `marketplace1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wg`
--
ALTER TABLE `wg`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `marketplace1`
--
ALTER TABLE `marketplace1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wg`
--
ALTER TABLE `wg`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
