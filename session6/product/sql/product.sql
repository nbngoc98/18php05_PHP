-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 02:41 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php05`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `desscription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `listitem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `desscription`, `image`, `created`, `listitem`) VALUES
(1, 'iPhone 6', 60000, 'iPhone 6 32GB ', 'a11.jpg', '2018-10-24 00:00:00', 'iPhone'),
(2, 'iPhone X', 25000, '\r\niPhone X 64GB M?u X?m', 'a2.png', '2018-10-25 00:00:00', 'iPhone'),
(3, 'Oppo F1', 2000, 'OPPO F1 chinh hang \r\n', 'a4.png', '2018-10-26 00:00:00', 'Oppo'),
(4, 'Oppo F5', 40000, 'OPPO F5 chinh hang ', 'a5.jpg', '2018-10-27 00:00:00', 'Oppo'),
(5, 'iPhone 7 Plus', 43000, 'iPhone 7 Plus 32GB', 'a6.png', '2018-10-29 00:00:00', 'iPhone'),
(6, 'iphone 8', 55500000, 'sdfh', '5bdc519ac4123-a7.jpg', '2018-11-02 00:00:00', 'iPhone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
