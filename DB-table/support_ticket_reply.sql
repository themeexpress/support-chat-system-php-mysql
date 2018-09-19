-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 07:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rainbowvip`
--

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_reply`
--

CREATE TABLE `support_ticket_reply` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(200) NOT NULL,
  `msg_from` varchar(200) NOT NULL,
  `msg_to` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_ticket_reply`
--

INSERT INTO `support_ticket_reply` (`id`, `ticket_id`, `msg_from`, `msg_to`, `message`, `status`, `reply_date`) VALUES
(1, '1', '1', 'AGAPL0000000005', 'Your Problem is now solved. Check it now.', 1, '2018-09-17 19:55:31'),
(2, '1', '1', 'AGAPL0000000005', 'You can Purchase now. Thanks', 1, '2018-09-17 19:57:48'),
(3, '1', 'AGAPL0000000005', '1', 'Thank You Very Much for your quick response', 1, '2018-09-18 15:39:08'),
(4, '1', 'AGAPL0000000005', '1', 'reply 22222222222222222', 1, '2018-09-18 15:48:05'),
(5, '1', 'AGAPL0000000005', '1', 'helllooooooooooooooooooooo', 1, '2018-09-18 15:50:45'),
(6, '1', '1', 'AGAPL0000000005', 'admin', 1, '2018-09-18 18:07:44'),
(7, '1', '1', 'AGAPL0000000005', 'Ticket will be solved !!', 1, '2018-09-18 18:08:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `support_ticket_reply`
--
ALTER TABLE `support_ticket_reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `support_ticket_reply`
--
ALTER TABLE `support_ticket_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
