-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 10:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productsmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `status` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `description`, `price`, `category`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phone', 'device', 'Talking device', 50, 'Electronics', '[\"161817234108.jpg\",\"161817234114.jpg\",\"161817234134.png\",\"161817234135.png\",\"161817234136.png\",\"161817234148.png\",\"1618172341300.png\"]', 'Active', '2021-04-11 14:49:01', '2021-04-11 14:49:01'),
(2, 'Car', 'Toy', 'Toys', 789, 'Toys', '[\"1618172877g8.jpg\",\"1618172877g9.jpg\",\"1618172877man.svg\",\"1618172877tag_red.svg\"]', 'Active', '2021-04-11 14:57:57', '2021-04-11 14:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `country`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ajay', 'admin@gmail.com', '$2y$10$hVluTt2d8x80RwQmKir7VOZ25sURKI6OxWLYJrMD9u/WhmjRwgJY6', '2G/15, Rajiv nagar', 'Thoothukudi', 'Tamilnadu', 'India', 'admin', 'Active', '2021-04-10 21:04:21', '2021-04-10 21:54:11'),
(5, 'Vignesh Ajay', 'ajay@gmail.com', '$2y$10$E2auqKcGofS04DF5vuqsOeIi9GuxKmBCWsb8mFSzgaYEfv7cRFnqC', '2g/15', 'tuty', 'tamilnadu', 'India', 'user', 'Active', '2021-04-11 14:46:45', '2021-04-11 14:46:45'),
(6, 'User1', 'user1@gmail.com', '$2y$10$s3gb34vb7pgCDDIGxQoIieleF.gGM66B9.jZ6q/dk.YwIM1GDVJtq', '2g/14', 'Thoothukudi', 'Tamilnadu', 'India', 'user', 'Active', '2021-04-11 14:53:36', '2021-04-11 14:53:36'),
(7, 'Selva', 'selva@gmail.com', '$2y$10$Lb8YjyMjgE7H/kcp/.bE9e0grCghhaCMhOPknXui3cGAPyyg7Z26a', '323G/34', 'madurai', 'Tamilnadu', 'India', 'user', 'Active', '2021-04-11 14:54:39', '2021-04-11 14:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `product_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Active', '2021-04-11 14:51:12', '2021-04-11 14:51:12'),
(2, 2, 6, 'Active', '2021-04-11 14:58:58', '2021-04-11 14:58:58'),
(3, 1, 6, 'Active', '2021-04-11 14:59:33', '2021-04-11 14:59:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
