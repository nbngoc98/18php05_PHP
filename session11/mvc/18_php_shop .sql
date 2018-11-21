-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 12:51 PM
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
-- Database: `18_php_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` float DEFAULT NULL,
  `desscription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `listitem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `desscription`, `image`, `created`, `listitem`) VALUES
(2, 'Áo phao nữ', 54000000, 'Áo phao nữ dáng dài chữ A liền mũ PLBBB', '5bf4cc3fdeb38-aeVDStEx.jpg', '2018-10-25 00:00:00', 'iPhone'),
(3, 'Áo khoác nữ', 2500000, 'Áo khoác nữ ấn tượng với kiểu dáng Hàn Quốc', '5bf4cce05f5fa-dFtklPaE.jpg', '2018-10-26 00:00:00', 'Oppo'),
(4, 'Áo phao chần bông', 2200000, 'Áo khoác nữ ấn tượng với kiểu dáng Hàn Quốc', '5bf4cd10700b6-YCC1zovV.jpg', '2018-10-27 00:00:00', 'Oppo'),
(5, 'Áo phao nữ dáng dài', 2200000, 'Áo khoác nữ ấn tượng với kiểu dáng Hàn Quốc', '5bf4cd5cb419f-zapm012_xa_800x800.jpg', '2018-10-29 00:00:00', 'iPhone');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
