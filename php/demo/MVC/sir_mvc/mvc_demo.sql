-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Aug 07, 2018 at 11:13 AM
-- Server version: 5.7.22
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(55) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `first_name`, `last_name`, `email`, `image`, `address`) VALUES
(1, 'dharti', 'patel', 'dhartipatel@gmail.com', 'C360_2018-04-21-19-12-47-699.jpg', 'gandhinagar'),
(3, 'yesha', 'panchal', 'yesha_panchal18@gmail.com', 'report1.jpeg', '601,shukan tower, shubh building,bodakdev'),
(5, 'shailja', 'patel', 'shailja@gmail.com', 'images.jpeg', 'jodhpur'),
(7, 'mehul', 'solanki', 'mehul@gmail.com', 'PhotoGrid_1516025840676.jpg', 'surat'),
(10, 'demo', 'demo', 'demo@gmail.com', 'daily.jpeg', 'demo'),
(15, 'akhil', 'shah', 'akhil@gmail.com', 'demoimg.jpeg', 'gurukul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
