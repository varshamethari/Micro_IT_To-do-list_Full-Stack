-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 12:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `deadline` datetime NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `title`, `description`, `deadline`, `done`, `user_id`) VALUES
(1, 'Finish project', 'Done...', '2022-05-27 10:00:00', 0, 1),
(11, 'Tina', 'ajbsjus', '2022-06-01 15:27:00', 1, 2),
(12, 'Viktor', 'sql', '2022-06-17 15:39:00', 0, 2),
(13, 'Englantine', 'This is Englantina checking if the ADD button is working properly!', '2022-06-10 00:33:00', 0, 2),
(14, 'This is Elsa\'s new task', 'Let try new things with this new acc which is Elsa!', '2022-06-10 00:37:00', 0, 6),
(15, 'Try the Done Button', 'Trying if the function in Done button is working!', '2022-06-10 00:38:00', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'lorita', 'rahimi', 'lor@gmail.com', '12345678'),
(2, 'tina', 'avdyli', 'tina@gmail.com', '12345678'),
(3, 'debora', 'kryeziu', 'debora@gmail.com', '12345678'),
(4, 'Englantine', 'Avdyli', 'englantiina@gmail.com', '12345678'),
(5, 'Rona', 'Avdyli', 'rona@gmail.com', 'rona1234'),
(6, 'Elsa', 'Sedi', 'elsa@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
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
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
