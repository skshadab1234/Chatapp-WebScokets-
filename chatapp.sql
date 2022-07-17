-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 08:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `mesage` varchar(255) NOT NULL,
  `message_from` varchar(255) NOT NULL,
  `message_to` varchar(255) NOT NULL,
  `send_time` datetime NOT NULL,
  `read_receipt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `mesage`, `message_from`, `message_to`, `send_time`, `read_receipt`) VALUES
(394, 'Hi', '1', '5', '2022-07-15 22:25:04', 1),
(395, 'Hey Bro', '5', '1', '2022-07-15 22:25:12', 1),
(396, 'Thanks', '1', '5', '2022-07-15 22:25:04', 1),
(397, 'Okk', '5', '1', '2022-07-15 22:25:12', 1),
(398, 'Hello', '1', '5', '2022-07-15 22:33:35', 1),
(399, 'Hi', '1', '5', '2022-07-15 22:34:23', 1),
(400, 'Good to see yu', '1', '5', '2022-07-15 22:34:23', 1),
(401, 'Thanks', '5', '1', '2022-07-15 22:34:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(244) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `user_img`, `last_login`, `location`) VALUES
(1, 'ks615044@gmail.com', 'Shadab', 'Khan Shadab AlAam', '', '2022-07-12 17:35:34', 'Mumbai'),
(2, 'asa@gmail.com', 'Sasad', 'Shadab', '', '2022-07-12 17:35:34', 'US'),
(3, 'asas@gmail.com', 'Shada', 'asasa', '', '2022-07-12 17:35:34', 'Gujurat'),
(5, 'skshadabkhojo@gmail.com', 'shadab', 'Khan Jio', '', '2022-07-12 17:35:34', 'Mumbai'),
(6, 'a@gmail.com', 'shadab', 'a', '', '2022-07-12 17:35:34', 'Uttar Pradesh'),
(7, 'vijaypathan@gmail.com', 'shadab', 'Vijay Shinde', '', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
