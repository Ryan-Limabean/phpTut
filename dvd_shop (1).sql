-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 09:55 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvd_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Action'),
(2, 'Romance '),
(3, 'Comedy'),
(4, 'Horror'),
(5, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(30) NOT NULL,
  `fname` varchar(50) DEFAULT '0',
  `surname` varchar(50) DEFAULT '0',
  `contact_number` varchar(50) DEFAULT '0',
  `email` varchar(50) DEFAULT '0',
  `sa_id_number` varchar(50) DEFAULT '0',
  `saddress` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `surname`, `contact_number`, `email`, `sa_id_number`, `saddress`) VALUES
(18, 'Ryan', 'Bloch', '723903734', 'rgbloch@gmail.com', '9409105023083', '2 Burgee Bend, Marina Da Gama'),
(19, 'Ryan', 'Bloch', '723903734', 'rgbloch@gmail.com', 'dsvsdv', '2 Burgee Bend, Marina Da Gama'),
(21, 'sdf', 'fdssdfsd', 'fdsfsdfsd', 'dsd', 'fdssdfsdfsd', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT '0',
  `description` varchar(200) DEFAULT '0',
  `release_date` date DEFAULT NULL,
  `category_id` int(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`id`, `name`, `description`, `release_date`, `category_id`) VALUES
(12, 'Harry Potter 1', 'Wow this is amazing', '2018-07-09', 5),
(13, 'Lord of the rings', 'Movie is good', '2015-02-12', 5),
(14, 'Step Brothers', 'very funny', '2018-07-10', 3),
(15, 'Breaking bad ', 'good ', '2018-07-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dvd_order`
--

CREATE TABLE `dvd_order` (
  `id` int(11) NOT NULL,
  `dvd_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvd_order`
--

INSERT INTO `dvd_order` (`id`, `dvd_id`, `order_id`) VALUES
(27, 13, 26),
(28, 15, 26),
(29, 12, 28),
(30, 13, 28),
(31, 14, 28);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `rent_date` date DEFAULT NULL,
  `actual_return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5 COLLATE=latin5_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `due_date`, `rent_date`, `actual_return_date`) VALUES
(26, 19, '2018-07-03', '2018-07-21', '2018-07-11'),
(27, 18, '2018-07-11', '2018-07-10', '2018-07-05'),
(28, 18, '2018-07-03', '2018-07-10', '2018-07-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `dvd_order`
--
ALTER TABLE `dvd_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dvd_id` (`dvd_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dvd_order`
--
ALTER TABLE `dvd_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dvd`
--
ALTER TABLE `dvd`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `dvd_order`
--
ALTER TABLE `dvd_order`
  ADD CONSTRAINT `dvd` FOREIGN KEY (`dvd_id`) REFERENCES `dvd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cust` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
