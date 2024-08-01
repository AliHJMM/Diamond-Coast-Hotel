-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 10:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamondcoast`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `amenities` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `description`, `price`, `amenities`, `image_url`, `room_type`, `room_number`) VALUES
(1, 'King Bedroom', 'A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress\n\nSmall, lower-priced hotels may offer only the most basic guest services and facilities. ', 200.00, '32-inch LCD TV with cable channels and DVD player\nHandheld and mounted rain shower heads\nWi-Fi access\nSafety deposit box\nMini-bar', 'room_1_a.jpg', NULL, '293'),
(2, 'Queen & Double Bedroom', 'A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress\r\n\r\nSmall, lower-priced hotels may offer only the most basic guest services and facilities. ', 273.00, '32-inch LCD TV with cable channels and DVD player\nHandheld and mounted rain shower heads\nWi-Fi access\nSafety deposit box\nMini-bar', 'slider_2.jpg', NULL, '943'),
(3, 'habib', 'habib', 1.00, 'hh\r\naa', 'hotel.gif', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `salt`, `email`, `created_at`) VALUES
(1, 'habib', '946ac9d0b70d03bbbd4fb6edccc10e3a', '4a7bfa97b047f081a52b0913', '7abib2004@gmail.com', '2024-08-01 01:20:33'),
(15, '1', '8f74423d7802dfed4507d7e79f2f5ffd', '1969df9156fd714e40de05b1', '1@d.com', '2024-08-01 02:21:48'),
(16, 'mohammed', '43351e0db460f1b6a8cab8a51f46cc2e', 'f505e18b56ab2ffac3269aa7', 'mohammed@gmail.com', '2024-08-01 02:31:09'),
(17, 'habib1', 'b09e93b2964f0d16342cb5aa11bf5dda', 'eded7a9aa752eb848ae96da7', '7abib2004@gmail.com', '2024-08-01 17:27:24'),
(18, 'habiba', 'a719a1536e71d7d6df6261f311b5ba8f', '9d9753d3d23e60b43ddf0502', '7abib2004@gmail.com', '2024-08-01 17:35:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
