-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 07:32 PM
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
(401, 'Thanks', '5', '1', '2022-07-15 22:34:32', 1),
(402, 'hey', '1', '5', '2022-07-17 17:55:18', 1),
(403, 'Good', '1', '5', '2022-07-17 17:55:18', 1),
(404, 'No Bhai', '5', '1', '2022-07-17 17:54:53', 1),
(405, 'What Happens?', '5', '1', '2022-07-17 17:54:53', 1),
(406, 'no ', '1', '5', '2022-07-17 17:55:18', 1),
(407, 'h', '5', '1', '2022-07-17 17:57:11', 1),
(408, 'hey', '5', '2', '2022-07-17 17:58:35', 1),
(409, 'Hi asasa', '5', '3', '2022-07-17 17:58:44', 1),
(410, 'Mai yaha hu bhai', '5', '7', '2022-07-17 17:58:54', 1),
(411, 'hey', '1', '5', '2022-07-17 19:06:06', 1),
(412, 'Khan Shadab', '5', '1', '2022-07-17 22:44:12', 1),
(413, 'kaise ho bhai', '1', '5', '2022-07-17 22:44:00', 1),
(414, 'hmm', '1', '5', '2022-07-17 22:44:00', 1),
(415, 'hey', '1', '7', '2022-07-17 22:47:48', 1),
(416, 'haa bhai', '1', '7', '2022-07-17 22:47:48', 1),
(417, 'kaise ho', '7', '1', '2022-07-17 22:48:03', 1);

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
  `last_login` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `user_img`, `last_login`, `location`) VALUES
(1, 'ks615044@gmail.com', 'Shadab', 'Khan Shadab AlAam', '', '1658079121', 'Mumbai'),
(2, 'asa@gmail.com', 'Sasad', 'Shadab', '', '1658078379', 'US'),
(5, 'skshadabkhojo@gmail.com', 'shadab', 'Khan Jio', '', '1658078100', 'Mumbai'),
(6, 'a@gmail.com', 'shadab', 'a', '', '2022-07-12 17:35:34', 'Uttar Pradesh'),
(7, 'vijaypathan@gmail.com', 'shadab', 'Vijay Shinde', '', '1658078952', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
