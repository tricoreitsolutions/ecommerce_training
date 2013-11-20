-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2013 at 02:59 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce_training`
--
CREATE DATABASE IF NOT EXISTS `ecommerce_training` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommerce_training`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `id` tinyint(11) NOT NULL DEFAULT '0',
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(3) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `address`, `phone_no`, `image`, `status`, `date_creation`, `date_modified`) VALUES
(1, 'Nikita', 'Bhatia', 'admin@tricoreitsolutions.com', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'Male', 'ahmedabad,gujarat', '9722816713', '1384759085_woman.png', 1, '2013-11-07 14:15:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brand_master`
--

CREATE TABLE IF NOT EXISTS `brand_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brand_master`
--

INSERT INTO `brand_master` (`id`, `name`, `status`, `timestamp`) VALUES
(1, 'Samsung', 1, '2013-11-14 07:29:10'),
(2, 'Hp', 1, '2013-11-14 07:29:44'),
(4, 'Titanic', 0, '2013-11-14 07:30:06'),
(5, 'Maxima', 1, '2013-11-14 07:31:16'),
(6, 'Dell', 1, '2013-11-14 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `parent_id` int(10) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `parent_id_2` (`parent_id`),
  KEY `parent_id_3` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`id`, `name`, `description`, `image`, `parent_id`, `status`, `timestamp`) VALUES
(1, 'Electronics', 'Mobile', '', 0, 0, '2013-11-09 12:26:04'),
(2, 'Men', 'Clothing', '', 0, 1, '2013-11-07 18:30:00'),
(5, 'Women', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'woman.png', 0, 1, '0000-00-00 00:00:00'),
(6, 'Samsung Galaxy', '', '', 56, 1, '2013-11-18 12:31:58'),
(7, 'Baby&Kids', 'Baby Toy for the playing.....', '1384432292_kid.png', 0, 1, '2013-11-14 12:31:32'),
(9, 'Books & Media', 'booka', '', 0, 1, '2013-11-12 06:36:37'),
(56, 'Mobile', '', 'samsung-galaxy-s-duos-s7562-400x400-imadjrcpfkvg755a.jpeg', 1, 1, '2013-11-13 05:57:40'),
(59, 'dell', '', '', 59, 1, '2013-11-18 12:33:42'),
(61, 'laptop', '', '', 1, 1, '2013-11-13 06:06:34'),
(62, 'More Store', '', '', 0, 1, '2013-11-13 06:08:30'),
(67, 'Footwear', 'womens footwear', '2013-11-14 11:08:47.jpg', 5, 1, '2013-11-14 05:38:47'),
(68, 'Watches', 'women''s watch', '2013-11-14 11:34:06.jpg', 5, 1, '2013-11-14 06:04:06'),
(69, 'Clothing', '', '1384432311_radcliffered-plum-freecultr-s-400x400-imadm78zyz77g87h.jpeg', 5, 1, '2013-11-14 12:31:51'),
(71, 'Samsung', '', '', 56, 1, '2013-11-18 12:31:51'),
(72, 'Camera', '', '', 0, 1, '2013-11-14 12:27:28'),
(74, 'Nikon', '', '1384432233_nikon-coolpix-l28-point-shoot-125x125-imadgxd6pmfmn8t6.jpeg', 72, 1, '2013-11-14 12:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `image_master`
--

CREATE TABLE IF NOT EXISTS `image_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `product_id` tinyint(10) NOT NULL,
  `image` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `image_master`
--

INSERT INTO `image_master` (`id`, `product_id`, `image`, `timestamp`) VALUES
(1, 14, '1384523163_samsung-galaxy-star-s5282-400x400-imadh496ph667pjb.jpeg', '2013-11-15 13:46:03'),
(9, 8, '1384757864_templatemo_image_04.jpg', '2013-11-18 06:57:44'),
(11, 8, '1384758316_templatemo_image_03.jpg', '2013-11-18 07:05:16'),
(16, 8, '1384758742_templatemo_image_01.jpg', '2013-11-18 07:12:22'),
(19, 7, '1384759660_DSC05193.JPG', '2013-11-18 07:27:41'),
(20, 7, '1384759661_DSC05191.JPG', '2013-11-18 07:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_master`
--

CREATE TABLE IF NOT EXISTS `manufacture_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manufacture_master`
--

INSERT INTO `manufacture_master` (`id`, `name`, `status`, `timestamp`) VALUES
(1, 'USA', 1, '2013-11-15 07:07:40'),
(2, 'India', 1, '2013-11-14 09:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE IF NOT EXISTS `product_master` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(25) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `manufacture` tinyint(10) NOT NULL,
  `brand` tinyint(10) NOT NULL,
  `full_list_price` int(50) NOT NULL,
  `retail_price` int(25) NOT NULL,
  `wholesaler_price` int(25) NOT NULL,
  `max_quantity` tinyint(10) NOT NULL,
  `cat_id` tinyint(11) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `manufacture` (`manufacture`),
  KEY `brand` (`brand`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `product_code`, `productname`, `description`, `manufacture`, `brand`, `full_list_price`, `retail_price`, `wholesaler_price`, `max_quantity`, `cat_id`, `weight`, `barcode`, `timestamp`, `status`) VALUES
(7, 'P102', 'Htc Desire', '    Android OS\r\n    Dual SIM (GSM + GSM)\r\n    8 MP Primary Camera\r\n\r\n', 2, 0, 20499, 20499, 19000, 15, 56, '500gm', '123456', '2013-11-14 12:03:10', 1),
(8, 'P103', 'HP Pavilion', 'laptop', 2, 2, 37990, 37990, 36990, 10, 61, '10kg', 'a1234', '2013-11-14 10:47:38', 1),
(9, 'P103', 'Maxima Gold Analog Watch', '1 Year Maxima India Warranty and Free Transit Insurance.', 2, 4, 999, 999, 900, 10, 68, '1kg', 'm1234', '2013-11-14 10:46:46', 1),
(10, 'P104', 'FREECULTR Round Neck Solid ', 'women t-shirt', 1, 0, 389, 389, 300, 5, 69, '1kg', 'c1234', '2013-11-14 10:29:36', 1),
(11, 'P105', 'Turtle Men Striped Formal Shirt ', '', 2, 1, 1295, 1295, 1200, 5, 69, '', '', '2013-11-18 07:20:53', 1),
(12, 'P106', 'Dell Vostro 2520 Laptop', '', 1, 6, 29250, 29250, 29000, 10, 61, '', '', '2013-11-14 10:13:35', 1),
(13, 'P107', 'Samsung Galaxy Star S5282 ', '', 2, 1, 4599, 4599, 4500, 10, 56, '', '', '2013-11-14 11:38:42', 1),
(14, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:19:25', 1),
(15, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:22:54', 1),
(16, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:35:45', 1),
(17, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:36:52', 1),
(18, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:37:16', 1),
(19, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:37:25', 1),
(20, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:38:29', 1),
(21, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:40:02', 1),
(22, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:40:29', 1),
(23, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:40:56', 1),
(24, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:42:15', 1),
(25, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:43:34', 1),
(26, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:46:03', 1),
(27, 'P107', 'Mobile', '', 2, 1, 9625, 9625, 9500, 10, 56, '', '', '2013-11-15 13:46:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_master`
--

CREATE TABLE IF NOT EXISTS `shipping_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  `rate_type` enum('percentage','flatrate') NOT NULL,
  `rate` tinyint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shipping_master`
--

INSERT INTO `shipping_master` (`id`, `status`, `rate_type`, `rate`) VALUES
(6, 'diable', 'percentage', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE IF NOT EXISTS `tax_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `tax` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`id`, `status`, `tax`) VALUES
(3, 'enable', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `firstname`, `lastname`, `gender`, `email`, `contact`, `password`, `address`, `country`, `status`, `date_creation`, `date_modified`) VALUES
(6, 'jay', 'patel', 'male', 'jaypatel0513@gmail.com', '9974735160', 'Mital7559', 'valsad,gujarat', 'India', 0, '2013-11-09 11:06:02', '0000-00-00 00:00:00'),
(8, 'kuku', 'patel', 'male', 'ketur10@gmail.com', '8128281919', 'Ketur1234', 'udwada', 'India', 1, '2013-11-09 07:20:23', '0000-00-00 00:00:00'),
(9, 'kuku', 'patel', 'male', 'ketur10@gmail.com', '8128281919', 'Mital7559', 'udwada', 'India', 0, '2013-11-09 07:20:04', '0000-00-00 00:00:00'),
(10, 'jaydeep', 'charavda', 'male', 'jaydeep12@gmail.com', '8154757458', 'Jaydeep987', 'junagadh,gujarat', 'India', 1, '2013-11-09 10:57:01', '0000-00-00 00:00:00'),
(11, 'parth12', 'thakkar', 'male', 'parth12@gmail.com', '7812456284', 'Parth987', 'ahmedabad', 'India', 1, '2013-11-09 11:08:57', '0000-00-00 00:00:00'),
(12, 'kuku', 'patel', 'male', 'ketur10@gmail.com', '9974735160', 'Henikuku98', 'usa', 'India', 1, '2013-11-09 07:20:31', '0000-00-00 00:00:00'),
(13, 'naman', 'shah', 'male', 'namanshah12@gmail.com', '9377458215', 'Namanshah98', 'gandhinagar', 'USA', 0, '2013-11-09 07:20:04', '0000-00-00 00:00:00'),
(15, 'aman123', 'shah', 'male', 'aman123@gmail.com', '9904919143', 'Amanshah987', 'vapi,gujarat', 'India', 1, '2013-11-09 10:55:26', '0000-00-00 00:00:00'),
(16, 'mahendra', 'patel', 'female', 'mahen11@gmail.com', '8128281919', 'Mahen987', 'silvassa', 'India', 1, '2013-11-09 07:20:39', '0000-00-00 00:00:00'),
(17, 'mital', 'patel', 'male', 'mital96745@gmail.com', '8128287575', 'Mital8559', 'vapi', 'India', 0, '2013-11-09 07:20:04', '0000-00-00 00:00:00'),
(18, 'Pratik', 'Dangi', 'male', 'pratik12@gmail.com', '8128287575', 'Mital7559', 'dahod', 'India', 1, '2013-11-09 10:27:57', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_master`
--
ALTER TABLE `image_master`
  ADD CONSTRAINT `image_master_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
