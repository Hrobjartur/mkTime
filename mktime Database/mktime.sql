-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 03:56 PM
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
-- Database: `mktime`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `item_img` varchar(20) NOT NULL,
  `item_price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `gender`, `item_desc`, `item_img`, `item_price`) VALUES
(1, 'Mahogany Chronograph', 'womens', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, odio quia? Isquam nisi, blanditiis autem quos.', '/img/newWatch7.png', 99.99),
(2, 'Chrono Forge', 'womens', 'Fusce eget elit lorem. Vestibulum molestie justo id nulla mollis luctus. Quisque vitae blandit odio.', '/img/newWatch8.png', 199.99),
(3, 'Galactica Beacon', 'womens', 'Vivamus varius iaculis ex, non congue velit viverra id. Maecenas sollicitudin ipsum nec eleifend laoreet. In ornare tristique lectus, quis aliquam mi pulvinar sit.', '/img/newWatch9.png', 149.99),
(4, 'Enigma Echo', 'womens', 'Nunc et commodo sem. Donec semper vel nisl non.', '/img/newWatch10.png', 399.99),
(5, 'Quantum Pulse', 'womens', 'Morbi dictum aliquam pharetra. Pellentesque efficitur enim eget placerat sodales. In vitae leo eu mauris congue consequat non pulvinar augue.', '/img/newWatch11.png', 299.99),
(6, 'Odyssey Nexus', 'womens', 'Morbi gravida lorem eget porttitor interdum. Donec urna mi, posuere nec arcu sit amet, semper ornare leo. Etiam risus enim, aliquet vel gravida in, finibus eu.', '/img/newWatch12.png', 499.99),
(7, 'Midnight Sentinel', 'mens', 'Praesent ut dapibus lorem. Morbi suscipit varius arcu, condimentum imperdiet quam hendrerit eget.', '/img/newWatch1.png', 199.99),
(8, 'Stealth Titan', 'mens', 'Aenean vestibulum metus ante, quis vulputate dolor venenatis in. Vestibulum sed velit eget dolor dapibus dictum. Pellentesque in sagittis massa.', '/img/newWatch2.png', 299.99),
(9, 'Mirage Pulse', 'mens', 'Pellentesque quis posuere ipsum, sed aliquet augue.', '/img/newWatch3.png', 249.99),
(10, 'Solstice Sentinel', 'mens', 'Pellentesque nec quam eget risus viverra dictum porta eget neque. Nam viverra sem enim, sit amet consectetur metus convallis sit amet.', '/img/newWatch4.png', 399.99),
(11, 'Infinity Quest', 'mens', 'Fusce pharetra leo imperdiet tellus vehicula condimentum vel et ante. Morbi lobortis lacus lorem, et efficitur augue iaculis a.', '/img/newWatch5.png', 599.99),
(12, 'Nebula Whisper', 'mens', 'Cras vitae sem et ipsum pellentesque sodales in sed nunc. Maecenas dignissim auctor ante, et luctus urna.', '/img/newWatch6.png', 299.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `order_date`) VALUES
(1, 1, 99.99, '2024-06-08 01:11:23'),
(2, 1, 899.98, '2024-06-08 01:11:35'),
(3, 1, 299.98, '2024-06-08 01:12:31'),
(4, 1, 749.97, '2024-06-08 01:12:50'),
(5, 1, 599.98, '2024-06-08 01:14:50'),
(6, 1, 899.95, '2024-06-08 01:15:52'),
(7, 1, 5199.88, '2024-06-08 01:16:38'),
(8, 1, 2899.86, '2024-06-08 01:17:35'),
(9, 1, 899.95, '2024-06-08 01:50:17'),
(10, 1, 199.99, '2024-06-08 18:38:50'),
(11, 1, 2099.89, '2024-06-08 18:45:57'),
(12, 1, 99.99, '2024-06-09 02:34:16'),
(13, 1, 99.99, '2024-06-09 02:35:30'),
(14, 1, 99.99, '2024-06-09 02:35:57'),
(15, 1, 99.99, '2024-06-09 02:37:29'),
(16, 1, 99.99, '2024-06-09 02:38:26'),
(17, 1, 99.99, '2024-06-09 02:40:45'),
(18, 1, 99.99, '2024-06-09 02:42:45'),
(19, 1, 99.99, '2024-06-09 02:47:57'),
(20, 1, 99.99, '2024-06-09 02:48:23'),
(21, 1, 99.99, '2024-06-09 02:49:24'),
(22, 1, 99.99, '2024-06-09 02:50:04'),
(23, 1, 99.99, '2024-06-09 02:51:41'),
(24, 1, 99.99, '2024-06-09 02:51:59'),
(25, 1, 99.99, '2024-06-09 02:54:49'),
(26, 1, 99.99, '2024-06-09 03:01:04'),
(27, 1, 99.99, '2024-06-09 03:02:42'),
(28, 1, 99.99, '2024-06-09 03:05:28'),
(29, 1, 3199.94, '2024-06-09 13:03:14'),
(30, 1, 99.99, '2024-06-09 13:05:41'),
(31, 1, 99.99, '2024-06-09 13:06:17'),
(32, 1, 99.99, '2024-06-09 13:07:24'),
(33, 1, 199.99, '2024-06-10 11:20:16'),
(34, 1, 199.99, '2024-06-10 11:24:16'),
(35, 11, 199.99, '2024-06-10 14:34:10'),
(36, 11, 199.99, '2024-06-10 14:35:43'),
(37, 11, 599.98, '2024-06-10 14:44:47'),
(38, 11, 549.98, '2024-06-10 14:45:40'),
(39, 11, 199.99, '2024-06-10 14:46:33'),
(40, 12, 199.99, '2024-06-10 14:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `order_id` int(10) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 99.99),
(2, 5, 1, 299.99),
(2, 11, 1, 599.99),
(3, 1, 1, 99.99),
(3, 7, 1, 199.99),
(4, 9, 3, 249.99),
(5, 5, 1, 299.99),
(5, 12, 1, 299.99),
(6, 2, 3, 199.99),
(6, 3, 2, 149.99),
(7, 1, 2, 99.99),
(7, 6, 10, 499.99),
(8, 2, 5, 199.99),
(8, 3, 4, 149.99),
(8, 5, 3, 299.99),
(8, 7, 2, 199.99),
(9, 3, 4, 149.99),
(9, 12, 1, 299.99),
(10, 2, 1, 199.99),
(11, 1, 4, 99.99),
(11, 4, 1, 399.99),
(11, 7, 5, 199.99),
(11, 12, 1, 299.99),
(12, 1, 1, 99.99),
(13, 1, 1, 99.99),
(14, 1, 1, 99.99),
(15, 1, 1, 99.99),
(16, 1, 1, 99.99),
(17, 1, 1, 99.99),
(18, 1, 1, 99.99),
(19, 1, 1, 99.99),
(20, 1, 1, 99.99),
(21, 1, 1, 99.99),
(22, 1, 1, 99.99),
(23, 1, 1, 99.99),
(24, 1, 1, 99.99),
(25, 1, 1, 99.99),
(26, 1, 1, 99.99),
(27, 1, 1, 99.99),
(28, 1, 1, 99.99),
(29, 2, 1, 199.99),
(29, 11, 5, 599.99),
(30, 1, 1, 99.99),
(31, 1, 1, 99.99),
(32, 1, 1, 99.99),
(33, 2, 1, 199.99),
(34, 2, 1, 199.99),
(35, 2, 1, 199.99),
(36, 2, 1, 199.99),
(37, 5, 2, 299.99),
(38, 3, 1, 149.99),
(38, 4, 1, 399.99),
(39, 2, 1, 199.99),
(40, 2, 1, 199.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', 'password123', '2023-05-01 00:00:00'),
(2, 'Jane', 'Smith', 'janesmith@example.com', 'p@ssw0rd456', '2023-05-02 00:00:00'),
(3, 'Michael', 'Johnson', 'michaeljohnson@example.com', 'securepass', '2023-05-03 00:00:00'),
(4, 'Emily', 'Brown', 'emilybrown@example.com', 'qwerty123', '2023-05-04 00:00:00'),
(5, 'David', 'Wilson', 'davidwilson@example.com', 'password321', '2023-05-05 00:00:00'),
(6, 'Sarah', 'Taylor', 'sarahtaylor@example.com', 'safepass', '2023-05-06 00:00:00'),
(7, 'Matthew', 'Anderson', 'matthewanderson@example.com', 'pass1234', '2023-05-07 00:00:00'),
(8, 'Olivia', 'Lee', 'olivialee@example.com', 'password789', '2023-05-08 00:00:00'),
(9, 'Daniel', 'Martinez', 'danielmartinez@example.com', 'danielpass', '2023-05-09 00:00:00'),
(10, 'Sophia', 'Garcia', 'sophiagarcia@example.com', 'pass4567', '2023-05-10 00:00:00'),
(11, 'Test', 'DB', 'test@db.com', '1234', '2024-06-10 14:33:38'),
(12, 'Roberto', 'Test', 'roberto@test.com', '1qw2', '2024-06-10 14:54:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD CONSTRAINT `order_contents_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_contents_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
