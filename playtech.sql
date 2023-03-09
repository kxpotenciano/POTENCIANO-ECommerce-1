-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 07:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(15,2) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_price`, `product_name`) VALUES
(1, 'jpg', '250.00', 'Ocean Waves'),
(2, 'jpg', '260.00', 'Fireworks'),
(3, 'jpg', '270.00', 'Hello World'),
(4, 'jpg', '280.00', 'Akira'),
(5, 'jpg', '300.00', 'Avengers'),
(6, 'jpg', '420.00', 'Koe no Katachi');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) NOT NULL,
  `suffix` varchar(60) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `user_id`) VALUES
(1, 'asdasd', 'asdas', 'asdasd', 'asdas', 15),
(2, 'fsdfsdg', 'gdfgshg', 'dhfdgh', 'djhghj', 16),
(3, 'ldfkjglkfdjgfd', 'lkdfjdklsjgfldsjf', 'slkdajflksdjflsdj', 'slkdjflksdjf', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(15, 'adminunknown', '$2y$10$Rx2GgIb5t8.uQ/tBlw5bQubDpxO2SpEr9w.M3B3mWm6NN99t7jaqW'),
(16, 'qwerty', '$2y$10$bHwXpKcwAGXbiys3905.GOeoncyEgp98jsG8GmUUdP82w11IXC8Qe'),
(17, 'bnmbnm', '$2y$10$viwwsE1.Fnbw6Hbe94RS7eh07WghU5LCA6z3C.zliSxL5g5QnhFTa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_data`
-- (See below for the actual view)
--
CREATE TABLE `user_data` (
`id` bigint(20) unsigned
,`username` varchar(16)
,`firstname` varchar(60)
,`lastname` varchar(60)
,`suffix` varchar(60)
,`middlename` varchar(60)
);

-- --------------------------------------------------------

--
-- Structure for view `user_data`
--
DROP TABLE IF EXISTS `user_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `profile`.`firstname` AS `firstname`, `profile`.`lastname` AS `lastname`, `profile`.`suffix` AS `suffix`, `profile`.`middlename` AS `middlename` FROM (`users` join `profile` on(`users`.`id` = `profile`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `profile_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
