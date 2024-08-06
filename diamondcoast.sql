-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 02:03 AM
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
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `start_date`, `end_date`, `total_price`, `user_id`) VALUES
(7, 1, '2024-08-22', '2024-08-30', 1600, 15),
(8, 1, '2024-08-07', '2024-08-08', 200, 15),
(9, 2, '2024-08-22', '2024-08-30', 1600, 15),
(10, 1, '2024-08-04', '2024-08-06', 400, 15),
(11, 3, '2024-08-22', '2024-08-23', 200, 15),
(12, 2, '2024-09-05', '2024-09-19', 2800, 15),
(13, 1, '2026-08-12', '2026-08-27', 3000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `room_number`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 2, '4'),
(5, 2, '5'),
(107, 6, '6'),
(108, 2, '7'),
(109, 5, '8'),
(110, 1, '9'),
(111, 7, '10'),
(112, 4, '11'),
(113, 2, '12'),
(114, 6, '13'),
(115, 3, '14'),
(116, 5, '15'),
(117, 1, '16'),
(118, 7, '17'),
(119, 4, '18'),
(120, 2, '19'),
(121, 6, '20'),
(122, 3, '21'),
(123, 5, '22'),
(124, 1, '23'),
(125, 7, '24'),
(126, 4, '25'),
(127, 2, '26'),
(128, 6, '27'),
(129, 3, '28'),
(130, 5, '29'),
(131, 1, '30'),
(132, 7, '31'),
(133, 4, '32'),
(134, 2, '33'),
(135, 6, '34'),
(136, 3, '35'),
(137, 5, '36'),
(138, 1, '37'),
(139, 7, '38'),
(140, 4, '39'),
(141, 2, '40'),
(142, 6, '41'),
(143, 3, '42'),
(144, 5, '43'),
(145, 1, '44'),
(146, 7, '45'),
(147, 4, '46'),
(148, 2, '47'),
(149, 6, '48'),
(150, 3, '49'),
(151, 5, '50'),
(152, 1, '51'),
(153, 7, '52'),
(154, 4, '53'),
(155, 2, '54'),
(156, 6, '55'),
(157, 3, '56'),
(158, 5, '57'),
(159, 1, '58'),
(160, 7, '59'),
(161, 4, '60'),
(162, 2, '61'),
(163, 6, '62'),
(164, 3, '63'),
(165, 5, '64'),
(166, 1, '65'),
(167, 7, '66'),
(168, 4, '67'),
(169, 2, '68'),
(170, 6, '69'),
(171, 3, '70'),
(172, 5, '71'),
(173, 1, '72'),
(174, 7, '73'),
(175, 4, '74'),
(176, 2, '75'),
(177, 6, '76'),
(178, 3, '77'),
(179, 5, '78'),
(180, 1, '79'),
(181, 7, '80'),
(182, 4, '81'),
(183, 2, '82'),
(184, 6, '83'),
(185, 3, '84'),
(186, 5, '85'),
(187, 1, '86'),
(188, 7, '87'),
(189, 4, '88'),
(190, 2, '89'),
(191, 6, '90'),
(192, 3, '91'),
(193, 5, '92'),
(194, 1, '93'),
(195, 7, '94'),
(196, 4, '95'),
(197, 2, '96'),
(198, 6, '97'),
(199, 3, '98'),
(200, 5, '99'),
(201, 1, '100'),
(202, 7, '101'),
(203, 4, '102'),
(204, 2, '103'),
(205, 6, '104'),
(206, 3, '105');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `amenities` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`, `amenities`, `price`, `image_url`) VALUES
(1, 'King Bedroom ', 'Relax in the comfort of our spacious King Bedroom, featuring a plush king-size bed, stunning city or garden views, and premium amenities for an exceptional stay. Enjoy the convenience of high-speed Wi-Fi and a work desk, along with a spa-inspired bathroom, for a luxurious respite. ', '32-inch LCD TV with cable channels and DVD player\nHandheld and mounted rain shower heads\nWi-Fi access\nSafety deposit box\nMini-bar', 350.00, 'kingbedroom.jpg'),
(2, 'Queen & Double Bedroom', 'Our spacious Double Queen Bedroom provides the comfort of two plush queen beds, along with modern conveniences like high-speed Wi-Fi and a well-appointed bathroom. Ideal for families or groups, this room ensures a restful and rejuvenating stay.', '40-inch LCD TV with cable channels and DVD player\nHandheld and mounted rain shower heads\nWi-Fi access\nSafety deposit box\nMini-bar', 250.00, 'img_2.jpg'),
(3, 'Le Voila Suite', 'The Le Voila Suite offers luxurious accommodation with spacious rooms and elegant furnishings. Guests can enjoy stunning views of the city skyline and modern amenities.', 'King-sized bed\nSeparate living area\nJacuzzi tub\nPrivate balcony\nComplimentary breakfast\n24-hour room service', 350.00, 'img_4.jpg'),
(4, 'Standard Room', 'A cozy and comfortable room perfect for solo travelers or couples. The room is well-furnished and offers all basic amenities for a pleasant stay.', 'Free Wi-Fi\r\nFlat-screen TV\r\nAir conditioning\r\nComplimentary breakfast\r\nDaily housekeeping', 100.00, 'standard.jpg'),
(5, 'Deluxe Room', 'A spacious room with modern decor, ideal for guests looking for a bit more luxury. The room features a seating area and enhanced amenities.', 'Free Wi-Fi\r\nFlat-screen TV\r\nAir conditioning\r\nMini-bar\r\nIn-room safe', 150.00, 'Deluxe_bedroom.png'),
(6, 'Executive Suite', 'A luxurious suite designed for business travelers. The suite includes a separate living area and work desk, along with upgraded amenities.', 'Free Wi-Fi\r\nFlat-screen TV\r\nAir conditioning\r\nWork desk\r\nAccess to executive lounge', 300.00, 'Executive_Suite.jpg'),
(7, 'Presidential Suite', 'The most luxurious suite in the hotel, offering unmatched comfort and service. The suite features a spacious living area, dining area, and a private balcony with a panoramic view.', 'Free Wi-Fi\r\nFlat-screen TV\r\nAir conditioning\r\nPrivate balcony\r\nJacuzzi', 550.00, 'Resedential_Suite.webp');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
