-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 04:03 AM
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
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_tickets`
--

CREATE TABLE `booked_tickets` (
  `order_no` int(11) NOT NULL,
  `event_name` varchar(30) DEFAULT NULL,
  `UniqueId` int(11) DEFAULT NULL,
  `no_of_tickets` int(11) DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_tickets`
--

INSERT INTO `booked_tickets` (`order_no`, `event_name`, `UniqueId`, `no_of_tickets`, `userId`) VALUES
(1, 'Birthday', 20843530, 26, '3'),
(2, 'Gaming', 27908828, 34, '1'),
(3, 'Wedding', 20843530, 26, '3'),
(4, 'Wedding', 98092184, 24, '3'),
(5, 'Sports', 81113696, 27, '3'),
(6, 'Birthday', 32718101, 32, '1'),
(7, 'Concert', 77875896, 37, '3'),
(8, 'Wedding', 45893104, 56, '3'),
(10, 'Birthday', 23017061, 1, '3'),
(11, 'Wedding', 20875261, 2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `eventId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Short_desc` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `Venue` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`eventId`, `Name`, `Description`, `Short_desc`, `image`, `seats`, `Venue`, `price`) VALUES
(1, 'Birthday', 'Make your special day even more memorable with our personalized birthday event planning services.', 'Party with your loved ones under our care', 'birthday.jpg', 99, 'The Estate: Bar and Restuarant', 40000),
(2, 'Concert', 'Immerse yourself in the electrifying atmosphere of our upcoming musical concert.', 'Music and Fun', 'music.jpg', 500, 'Lobos River View', 30000),
(3, 'Gaming', 'Gear up for an adrenaline-fueled gaming extravaganza like no other', 'Gear up for an adrenaline-fueled gaming extravaganza like no other', 'gamer.jpg', 50, 'Angels Share', 50000),
(4, 'Wedding', 'Indulge in the romance and elegance of your dream wedding brought to life by our expert event organizers.', 'Indulge in the romance and elegance of your dream wedding brought to life by our expert event organi', 'wedding.jpg', 598, 'Zara Covention Centre', 70000),
(5, 'Sports', 'Dive into the thrill of competition and camaraderie at our exhilarating sports event', 'Dive into the thrill of competition and camaraderie at our exhilarating sports event', 'sports.jpg', 500, 'Francis Doris Skate City', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `status`) VALUES
(1, 'admin', 'admin', 101),
(3, 'user', 'user', 202);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
