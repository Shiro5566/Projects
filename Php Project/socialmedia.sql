-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 09:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `username` varchar(50) NOT NULL,
  `follow_username` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`username`, `follow_username`, `id`) VALUES
('Shiro55', 'Shiro', 4),
('Shiro', 'Shiro55', 5),
('Shiro', 'Shiro5566', 6);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `username` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`username`, `message`, `likes`, `image_file`, `id`) VALUES
('Shiro', 'Hello World', 0, '', 2),
('Shiro', 'Hello World Woo', 0, '', 3),
('Shiro55', 'Hello World!', 2, '', 4),
('Shiro55', 'Hi World!', 0, '', 5),
('Shiro', 'Hello Guys', 0, 'AI_Shiro.JPG', 8),
('Shiro', 'What is up guys', 0, '', 9),
('Shiro', '', 0, 'blair_cat_form_by_paulonunes90-d5d8uud.png', 10),
('Shiro5566', 'I&#039;m Awesome', 2, 'cute-cats-kitten-with-his-hands-in-the-air-on-a-persons-lap.jpg', 11),
('Shiro', 'Hai', 0, 'catgirl pfp.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Shiro', 'eva555666@hotmail.com', 'b5b15f970ff988e0e4c6da9e7c50e623'),
(2, 'Shiro55', 'md1506598@gmail.com', 'b5b15f970ff988e0e4c6da9e7c50e623'),
(3, 'Shiro5566', 'eva555666777888@gmail.com', 'b5b15f970ff988e0e4c6da9e7c50e623');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
