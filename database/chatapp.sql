-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 07:45 PM
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
(417, 'kaise ho', '7', '1', '2022-07-17 22:48:03', 1),
(418, 'hey', '5', '1', '2022-07-19 22:50:38', 1),
(419, 'hi', '1', '5', '2022-07-19 22:51:04', 1),
(420, 'kaise ho', '5', '1', '2022-07-19 22:51:08', 1),
(421, 'Hi', '5', '6', '2022-07-19 23:06:31', 1),
(422, 'Kaise ho bhai', '5', '6', '2022-07-19 23:06:31', 1),
(423, 'hello', '6', '5', '2022-07-19 23:06:57', 1),
(424, 'a', '6', '5', '2022-07-19 23:09:44', 1),
(425, 'HI', '6', '5', '2022-07-19 23:18:58', 1),
(426, 'nAHI BHAI', '5', '6', '2022-07-19 23:18:51', 1),
(427, 'K', '6', '5', '2022-07-19 23:18:58', 1),
(428, 'KYA KRRAHA HAI', '5', '6', '2022-07-19 23:18:51', 1),
(429, 'KUCH NHI', '6', '5', '2022-07-19 23:19:57', 1),
(430, 'a', '6', '5', '2022-07-19 23:28:38', 1),
(431, 'a', '6', '5', '2022-07-19 23:32:48', 1),
(432, 'hey', '6', '5', '2022-07-19 23:37:50', 1),
(433, 'he', '6', '5', '2022-07-19 23:38:57', 1),
(434, 'Good', '6', '5', '2022-07-19 23:43:01', 1),
(435, 'how', '5', '6', '2022-07-19 23:18:51', 1),
(436, 'okk thanks', '5', '6', '2022-07-19 23:43:35', 1),
(437, 'hey', '1', '5', '2022-07-20 18:57:58', 1),
(438, 'hey', '7', '1', '2022-07-20 18:59:56', 1),
(439, 'k', '1', '7', '2022-07-20 18:59:17', 1),
(440, 'a', '1', '7', '2022-07-20 19:00:58', 1),
(441, 'ok', '1', '7', '2022-07-20 19:00:58', 1),
(442, 'b', '1', '7', '2022-07-20 19:20:34', 1),
(443, 'haa bjhai', '7', '1', '2022-07-20 18:59:56', 1),
(444, 'a', '1', '5', '2022-07-20 21:41:04', 1),
(445, 'a', '1', '5', '2022-07-20 21:41:29', 1),
(446, 'Okk Done', '1', '5', '2022-07-20 21:41:29', 1),
(447, 'may i', '1', '5', '2022-07-20 21:41:29', 1),
(448, 'Yes Bro', '5', '1', '2022-07-20 21:41:54', 1),
(449, 'Okk Done', '1', '5', '2022-07-20 21:42:11', 1),
(450, 'hOW IS ', '5', '1', '2022-07-20 21:42:09', 1),
(451, 'But my Love is here only?', '1', '5', '2022-07-20 21:42:11', 1),
(452, 'Know i want to know about david?', '5', '1', '2022-07-20 21:42:09', 1),
(453, 'My Home is here only?', '5', '1', '2022-07-20 21:42:09', 1),
(454, 'a', '5', '1', '2022-07-20 22:58:50', 1),
(455, 'hey', '1', '5', '2022-07-20 23:01:28', 1),
(456, 'aasaadawaadssaassadsaadadadasdadaaaasasasasasdasdasdasdadsadsadsadsads', '5', '1', '2022-07-20 23:07:27', 0),
(457, 'adahey bro asassadasdsadasdasdsadasd', '1', '5', '2022-07-20 23:10:17', 0),
(458, 'See you Tomorrow', '5', '1', '2022-07-20 23:07:27', 0),
(459, 'Okk Byeee', '5', '1', '2022-07-20 23:07:27', 0),
(460, 'Have Fun', '1', '5', '2022-07-20 23:10:17', 0);

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
  `location` varchar(255) NOT NULL,
  `typing_opponent_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `user_img`, `last_login`, `location`, `typing_opponent_status`) VALUES
(1, 'ks615044@gmail.com', 'Shadab', 'Khan Shadab AlAam', '', '1658339144', 'Mumbai', 0),
(2, 'asa@gmail.com', 'Sasad', 'Shadab', '', '1658078379', 'US', 0),
(5, 'skshadabkhojo@gmail.com', 'shadab', 'Khan Jio', '', '1658339107', 'Mumbai', 0),
(6, 'a@gmail.com', 'shadab', 'a', '', '1658254800', 'Uttar Pradesh', 0),
(7, 'vijaypathan@gmail.com', 'shadab', 'Vijay Shinde', '', '1658331253', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
