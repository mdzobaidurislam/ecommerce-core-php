-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2020 at 06:14 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Jami', 'Islam', 'jami@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(22, 'hhhhh'),
(11, 'Mobalis Nokia'),
(5, 'Chemistry & Physicis'),
(6, 'Mathe'),
(12, 'Laptops HP Brand'),
(10, 'Electrics  mac'),
(21, 'phps'),
(15, 'Books'),
(20, ' Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(13, 59, '1', 7, '4500.00'),
(14, 55, '13', 7, '4500.00'),
(15, 61, '6', 7, '4500.00'),
(16, 63, '1', 7, '4500.00'),
(17, 64, '1', 7, '4500.00'),
(18, 64, '10', 8, '4500.00'),
(19, 61, '7', 10, '4500.00'),
(20, 62, '12', 10, '4500.00'),
(21, 57, '1', 11, '61,300'),
(22, 62, '1', 14, '4500.00'),
(23, 54, '100', 15, '4500.00'),
(24, 54, '1', 9, '9500.00'),
(25, 61, '1', 15, '4500.00'),
(26, 63, '1', 15, '4500.00'),
(27, 61, '1', 16, '4500.00'),
(28, 63, '1', 16, '4500.00'),
(29, 60, '1', 18, '4500.00'),
(30, 61, '1', 19, '4500.00'),
(31, 63, '10', 19, '4500.00'),
(32, 54, '10', 20, '4500.00'),
(33, 61, '1', 21, '4500.00'),
(34, 62, '1', 22, '4500.00'),
(35, 62, '1', 23, '4500.00'),
(36, 63, '1', 23, '4500.00'),
(37, 61, '1', 24, '4500.00'),
(38, 64, '1', 24, '4500.00'),
(39, 55, '1', 25, '4500.00'),
(40, 61, '1', 26, '4500.00'),
(41, 61, '1', 27, '4500.00'),
(42, 62, '1', 27, '4500.00'),
(43, 61, '1', 28, '4500.00'),
(44, 63, '1', 28, '4500.00'),
(45, 63, '1', 29, '4500.00'),
(46, 58, '1', 30, '4500.00'),
(47, 64, '1', 31, '4500.00'),
(48, 58, '1', 32, '4500.00'),
(49, 59, '1', 33, '4500.00');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

DROP TABLE IF EXISTS `ordertracking`;
CREATE TABLE IF NOT EXISTS `ordertracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `massage` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `massage`, `timestamp`) VALUES
(7, 19, 'Cancelled', 'Product canceled', '2020-03-27 23:24:21'),
(10, 11, 'Delivered', 'Your product Delivered.', '2020-03-27 23:29:20'),
(8, 19, 'In progress', 'Your order is progressing.', '2020-03-27 23:26:15'),
(9, 11, 'Cancelled', 'I do not this product.', '2020-03-27 23:27:15'),
(11, 24, 'Cancelled', 'hhhh', '2020-05-05 02:44:09'),
(12, 25, 'In progress', 'Order progrees', '2020-05-05 02:49:00'),
(13, 25, 'Delivered', 'delivered', '2020-05-05 02:49:35'),
(14, 31, 'Cancelled', 'hhhhhhhhhhhhh', '2020-12-02 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `ordres`
--

DROP TABLE IF EXISTS `ordres`;
CREATE TABLE IF NOT EXISTS `ordres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordres`
--

INSERT INTO `ordres` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(18, 2, '4500', 'Order Placed', 'Cash', '2020-03-27 09:07:29'),
(11, 8, '61', 'Delivered', 'Cheque', '2020-03-26 20:36:05'),
(10, 8, '4500', 'Order Placed', 'Cash', '2020-03-26 19:32:09'),
(9, 2, '4500', 'Order Placed', 'Cash', '2020-03-26 19:23:36'),
(8, 8, '45000', 'Order Placed', 'Cheque', '2020-03-26 15:09:51'),
(7, 8, '76500', 'Order Placed', 'Cash', '2020-03-26 14:52:12'),
(14, 2, '4500', 'Order Placed', 'Cash', '2020-03-26 21:18:06'),
(15, 2, '9000', 'Order Placed', 'Paypal', '2020-03-26 21:26:14'),
(16, 2, '9000', 'Order Placed', 'Paypal', '2020-03-26 21:29:53'),
(19, 2, '49500', 'In progress', 'Paypal', '2020-03-27 11:08:55'),
(20, 2, '45000', 'Order Placed', 'Cash', '2020-03-28 23:19:45'),
(21, 9, '4500', 'Order Placed', '', '2020-04-23 20:20:52'),
(22, 9, '4500', 'Order Placed', 'Cash', '2020-05-05 02:32:37'),
(23, 9, '9000', 'Order Placed', 'Cash', '2020-05-05 02:36:51'),
(24, 9, '9000', 'Cancelled', 'Cheque', '2020-05-05 02:38:28'),
(25, 10, '4500', 'Delivered', 'Paypal', '2020-05-05 02:47:34'),
(26, 11, '4500', 'Order Placed', 'Cash', '2020-06-05 01:07:44'),
(27, 12, '9000', 'Order Placed', 'Cash', '2020-11-24 11:54:56'),
(28, 13, '9000', 'Order Placed', '', '2020-12-02 11:32:29'),
(29, 13, '4500', 'Order Placed', '', '2020-12-02 11:34:22'),
(30, 13, '4500', 'Order Placed', '', '2020-12-02 11:38:58'),
(31, 13, '4500', 'Cancelled', 'Cheque', '2020-12-02 11:39:36'),
(32, 13, '4500', 'Order Placed', 'Cash', '2020-12-02 11:44:52'),
(33, 13, '4500', 'Order Placed', '', '2020-12-02 11:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `price`, `thumbnail`, `description`) VALUES
(61, 'Hp elitbook 840 g1', 11, '4500.00', 'photo-1470770841072-f978cf4d019e.jpg', 'jnn'),
(62, 'Hp elitbook 840 g1', 21, '4500.00', 'course-1-free-img-400x223.jpg', 'nn'),
(63, 'Hp elitbook 840 g1', 11, '4500.00', 'photo-1549321495-305eb13f8aa9.jpg', 'hh'),
(64, 'Hp elitbook 840 g1', 11, '4500.00', 'photo-1470770841072-f978cf4d019e.jpg', 'jnn'),
(60, 'Hp elitbook 840 g1', 10, '4500.00', 'cerberus-v2-1-228x228.jpg', 'ee'),
(59, 'Hp elitbook', 11, '4500.00', 'photo-1549321495-305eb13f8aa9.jpg', 'hh'),
(58, 'Hp elitbook 840 g1', 21, '4500.00', 'course-1-free-img-400x223.jpg', 'nn'),
(53, 'Hp elitbook 840 g1', 11, '4500.00', 'photo-1549321495-305eb13f8aa9.jpg', 'hh'),
(54, 'Hp elitbook 840 g1', 11, '4500.00', 'photo-1470770841072-f978cf4d019e.jpg', 'jnn'),
(55, 'HP PAVILION 14-CE2095TX 14 INCH INTEL CORE I5 8TH GEN 4GB RAM 1TB HDD LAPTOP WITH MX130 2GB GRAPHICS', 10, '4500.00', 'hp-pavilion-14-ce2048tu-core-i5-laptop-500x500.jpg', '$productimage$productimage'),
(56, 'HP PAVILION 14-CE2095TX 14 INCH INTEL CORE I5 8TH GEN 4GB RAM 1TB HDD LAPTOP WITH MX130 2GB GRAPHICS', 15, '61,300', 'hp-pavilion-14-ce2048tu-core-i5-laptop-500x500.jpg', 'hh'),
(57, 'HP PAVILION 14-CE2095TX 14 INCH INTEL CORE I5 8TH GEN 4GB RAM 1TB HDD LAPTOP WITH MX130 2GB GRAPHICS', 10, '61,300', 'manager-free-img.png', 'hhhhhhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(1, 62, 8, 'Nice Product', '2020-03-28 01:37:54'),
(3, 61, 8, 'This item an awesome product.', '2020-03-28 01:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `timestamp`) VALUES
(9, 'admin@gmail.com', '$2y$10$sMT1MmcXhgrz.DLqgS/2dOZ4rE8JwWZYNEEoqSqSQFXRbEmM5P5ey', '2020-04-23 20:20:07'),
(10, 'new@gmail.com', '$2y$10$j/IQkh4Jonca/3/./SWIxu8eWtpqNZdMc86Ty2EZtsgipqZ.g3sta', '2020-05-05 02:46:48'),
(2, 'user1@gmail.com', '$2y$10$beKXBmklTL8E3xPmUpI2oeWYPSLF8PYU0V3Ge3F/k3f6dOZ.nrSl2', '2020-03-25 13:36:37'),
(8, 'md.zubaidul@gmail.com', '$2y$10$PKlJnpupwg5x4wq9HN.OcuMwsaXr.lYh.dndNClDvc5ArxoXLaJde', '2020-03-26 14:38:30'),
(11, 'jami@gmail.com', '$2y$10$tMswfscB9vXxIli.aaj0ou1jNP8YagHjpXgMGq7yDRpQ5zlYE2FaC', '2020-06-05 01:06:20'),
(12, 'md@gmail.com', '$2y$10$52ffwipSq3.xtS00bBKF/edWo2syIjwnEb.0ReeAj42.LBDl6biXa', '2020-11-24 11:54:11'),
(13, 'hello@gmail.com', '$2y$10$q44OSNJNqfxcY.g5zSIifOxusfXlCzZo8dX7ac7RwylJ7Lm1Uq6Vq', '2020-12-02 11:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

DROP TABLE IF EXISTS `usersmeta`;
CREATE TABLE IF NOT EXISTS `usersmeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobaile` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`id`, `uid`, `country`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `zip`, `mobaile`, `payment`) VALUES
(1, 2, 'BD', 'MD. Nazim uddin ', 'Islam', 'Nazim Uddin', 'Dhaka,,uddin', ',uddin', 'uddin', 'uddin', '201100', '+88018121111111', 'Cash'),
(4, 9, 'AU', 'Nazim', 'Uddin', 'Freelancer Nazim', 'Sarishabari', 'Sarishabari', 'dhaka', 'dhaka', '2050', '845-8348586', 'Cheque'),
(3, 8, 'BH', 'MD.Jami', 'Islam', 'Freelancer Jami', 'Dhaka,Jamalpur', 'Sarishabari,Jamalpur', 'Dhaka', 'Dhaka', '2050', '+8801812409989', 'Cash'),
(5, 10, 'AF', 'New', 'Name', 'New Company', 'Sarishabari', 'Sarishabari', 'dhaka', 'dhaka', '2050', '845-8348586', 'Paypal'),
(6, 11, 'AU', 'Jami', 'Islam', 'frrr', 'hsdskdj', 'fshdk', 'hsdbfh', 'habshkd', '5858', '742357843', 'Cash'),
(7, 12, 'AL', 'jam', 'jami', 'ddddddddd', 'qqqqqqqq', '', 'dhaka', 'dhaka', '2020', '023503495458', 'Cash'),
(8, 13, 'AO', 'Hello', 'jami', 'ddddddddd', 'qqqqqqqq', 'Hellos ', 'dhaka', 'dhaka', '2020', '023503495458', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(2, 63, 8, '2020-03-28 02:51:15'),
(4, 61, 12, '2020-11-24 11:55:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
