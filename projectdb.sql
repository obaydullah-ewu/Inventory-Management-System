-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 25, 2020 at 05:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_product`
--

CREATE TABLE `available_product` (
  `product_name` varchar(50) NOT NULL,
  `quantity` int(22) NOT NULL,
  `unit_price` int(21) NOT NULL,
  `total_price` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_product`
--

INSERT INTO `available_product` (`product_name`, `quantity`, `unit_price`, `total_price`) VALUES
('Nokia N97', 42, 5000, 210000),
('Samsung Galaxy S50', 10, 5700, 57000),
('Realme X', 11, 3000, 33000),
('Realme 7', 60, 6000, 360000),
('Xiaomi Mi 9', 12, 6000, 72000),
('Samsung A50', 33, 6000, 198000),
('Realme Buds 2', 230, 1000, 230000);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_name` varchar(20) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `p_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_name`, `product_description`, `p_image`) VALUES
('Nokia N97', 'Nokia is an innovative global leader in 2G, networks and phones.					                                                ', 'upload/nokia-n97-mini.jpg'),
('Samsung Galaxy S50', '                                                                Samsung is the best mobile phone nowadays.						                                                                ', 'upload/Samsung-Galaxy-S50.jpg'),
('Realme X', ' Experience a redefined perspective with a magnificent 6.53\" AMOLED screen					                                ', 'upload/realme x.jpg'),
('Realme 7', '                Realme 7 Android smartphone. 						                ', 'upload/realme 7.jpg'),
('Xiaomi Mi 9 ', '                Xiaomi Mi 9 Android smartphone.					                ', 'upload/mi 9.jpg'),
('Samsung A50', '                Samsung Galaxy A50 · Display 6.40-inch (1080x2340) .\r\n							                ', 'upload/samsung A50.jpg'),
('Realme Buds 2', '                                One of the best Headphone.\r\n							                                ', 'upload/realme buds 2.jpg'),
('poco', 'Good phone\r\n							', ' upload/poco.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `product_name` varchar(50) NOT NULL,
  `quantity` int(21) NOT NULL,
  `unit_price` int(21) NOT NULL,
  `total_price` int(20) NOT NULL,
  `purchase_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`product_name`, `quantity`, `unit_price`, `total_price`, `purchase_date`) VALUES
('Nokia N97', 30, 2000, 60000, '2020-09-20'),
('Samsung Galaxy S50', 20, 5000, 100000, '2020-09-20'),
('Realme X', 30, 3000, 90000, '2020-09-21'),
('Nokia N97', 20, 5000, 100000, '2020-09-21'),
('Realme 7', 80, 3500, 280000, '2020-09-22'),
('Xiaomi Mi 9', 34, 4500, 153000, '2020-09-23'),
('Samsung A50', 40, 5000, 200000, '2020-09-23'),
('Realme Buds 2', 200, 850, 170000, '2020-09-23'),
('Realme Buds 2', 230, 850, 195500, '2020-09-24'),
('Samsung Galaxy S50', 30, 5000, 150000, '2020-09-24'),
('Realme 7', 8, 3500, 28000, '2020-09-25'),
('Realme 7', 2, 6000, 12000, '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `sold_product`
--

CREATE TABLE `sold_product` (
  `product_name` varchar(50) NOT NULL,
  `quantity` int(22) NOT NULL,
  `unit_price` int(22) NOT NULL,
  `total_price` int(22) NOT NULL,
  `sold_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_product`
--

INSERT INTO `sold_product` (`product_name`, `quantity`, `unit_price`, `total_price`, `sold_date`) VALUES
('Nokia N97', 8, 5000, 40000, '2020-09-20'),
('Samsung Galaxy S50', 20, 5700, 114000, '2020-09-20'),
('Realme X', 12, 3000, 36000, '2020-09-21'),
('Realme 7', 22, 3500, 77000, '2020-09-21'),
('Xiaomi Mi 9', 7, 5200, 36400, '2020-09-22'),
('Samsung A50', 5, 5000, 25000, '2020-09-23'),
('Realme Buds 2', 80, 1000, 80000, '2020-09-24'),
('Samsung Galaxy S50', 4, 5700, 22800, '2020-09-24'),
('Realme X', 2, 3000, 6000, '2020-09-25'),
('Realme X', 3, 3000, 9000, '2020-09-25'),
('Xiaomi Mi 9', 1, 6000, 6000, '2020-09-25'),
('Samsung A50', 2, 6000, 12000, '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(22) NOT NULL,
  `username` varchar(21) NOT NULL,
  `password` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`firstname`, `lastname`, `username`, `password`) VALUES
('Admin', 'admin', 'admin123', '123123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
