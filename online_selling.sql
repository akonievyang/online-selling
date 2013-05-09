-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2013 at 11:00 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_selling`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminReply`
--

CREATE TABLE IF NOT EXISTS `adminReply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_msg` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `allmessage`
--

CREATE TABLE IF NOT EXISTS `allmessage` (
  `all_msg` int(11) NOT NULL AUTO_INCREMENT,
  `msg_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  PRIMARY KEY (`all_msg`),
  KEY `link_to_visitor` (`msg_id`),
  KEY `link_to_adminReply` (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `best`
--

CREATE TABLE IF NOT EXISTS `best` (
  `best_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `discription` varchar(500) DEFAULT NULL,
  `small_pic` varchar(50) DEFAULT NULL,
  `big_pic` varchar(50) DEFAULT NULL,
  `Date_uploaded` varchar(50) DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  PRIMARY KEY (`best_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color`, `quantity`) VALUES
(1, 'white', 10);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` int(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `address`, `contact`, `password`, `username`) VALUES
(1, 'lor', 'ing', 'ngot', 'female', 20, 'palompon', -168, '*5828F5BECD6EEBF0919F136EC05B14E4B1E7CE58', '143');

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE IF NOT EXISTS `gadgets` (
  `gadget_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `discription` varchar(500) DEFAULT NULL,
  `features` varchar(500) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`gadget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`gadget_id`, `name`, `brand`, `discription`, `features`, `price`, `date_added`) VALUES
(1, 'A888 DUO', 'MyPhone', 'The new MyPhone A888 marries elegance with functionality. This new 3G Android phone is minimalist in design but promises maximum performance with its superb features. It comes neat and sleek at 8.99 mm, and with 4.5” IPS capacitive screen that is as delightful to the eyes as it is to the fingers. Its 8 megapixel rear camera with dual LED flash and 720p HD video recording capacity lets you take photos and videos like a pro. Taking wide-angled shots through the camera’s digital panorama function i', 'Tri-band, EDGE, 3G Connection, HSUPA, 1.3MP Front Camera, GPS, WiFi Connection, TV-Out, Motion Sensor, FM/MP3/MP4 Player, Dual Mic Noise Reduction, Proximity and Light Sensor, 32GB microSD Slot, HD 720p Video Recording, Turn to mute function, Bluetooth 4.0, micro USB, 3.5mm Audio Jack, PINOY PHONE APP', 3, '2013-05-07 04:03:00'),
(8, 'rewre', 'rere', 'rere', 'rer', 42424, '2013-04-07 03:00:00'),
(45, 'hghg', 'hgh', 'hghgh', 'ghghg', 4, '2013-01-07 01:07:00'),
(48, '21212', '121212', '12121', '21212', 1212, '0000-00-00 00:00:00'),
(49, '345', '3434', '343', '4343', 21212, '2013-05-07 15:56:31'),
(50, 'HGH', 'GHGH', 'GHGHG', 'GHGH', 2, '2013-05-07 15:57:56'),
(51, 'HGH', 'GHGH', 'GHGHG', 'GHGH', 2, '2013-05-07 15:57:57'),
(52, 'HGH', 'GHGH', 'GHGHG', 'GHGH', 2, '2013-05-07 15:57:57'),
(53, 'HGH', 'GHGH', 'GHGHG', 'GHGH', 2, '2013-05-07 15:57:58'),
(54, 'HGH', 'GHGH', 'GHGHG', 'GHGH', 2, '2013-05-07 15:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `gadget_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `link_to_gadgets` (`gadget_id`),
  KEY `link_to_color` (`color_id`),
  KEY `link_to_picture` (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `gadget_id`, `color_id`, `pic_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `large_pic` varchar(100) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `large_pic`, `small_pic`) VALUES
(1, 'A888.png', NULL),
(2, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(3, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(4, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(5, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(6, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(7, 'mini ipod.jpeg', 'mini ipod.jpeg'),
(8, 'files/add.png', NULL),
(9, 'files/add.png', NULL),
(10, 'files/g.jpg', NULL),
(11, 'uploaded_file/8.jpeg', NULL),
(12, 'uploaded_file/8.jpeg', NULL),
(13, 'uploaded_file/A888_DUO.png', NULL),
(14, 'uploaded_file/g.jpg', NULL),
(15, 'uploaded_file/A888Duo.png', NULL),
(16, 'images.jpeg', NULL),
(17, 'add.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `date_to_be_deliver` varchar(50) DEFAULT NULL,
  `date_delivered` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `link_to_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_msg` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`msg_id`, `visitor_msg`) VALUES
(1, 'kjdsds'),
(2, 'kjdsdsfsf'),
(3, 'kjdsdsfsfdsdsd'),
(4, 'kjdsdsfsfdsdsddsd'),
(5, 'kjdsdsfsfdsdsdsd'),
(6, 'kjdsdsfsfdsdsdsddsd'),
(7, 'kjdsdsfsfdsdsdsddsd'),
(8, 'kjdsdsfsfdsdsdsddsd'),
(9, 'kjdsdsfsfdsdsdsddsd'),
(10, 'kjdsdsfsfdsdsdsddsd'),
(11, 'kjdsdsfsfdsdsdsddsd'),
(12, 'kjdsdsfsfdsdsdsddsd'),
(13, 'kjdsdsfsfdsdsdsddsd'),
(14, 'kjdsdsfsfdsdsdsddsd'),
(15, 'kjdsdsfsfdsdsdsddsd'),
(16, 'kjd'),
(17, 'kjd'),
(18, 'kjd\nd\nd\ns'),
(19, 'kjd\nd\nd\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(20, 'kjd\nd\nd\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(21, 'kjd\nd\nd\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(22, 'kjd\nd\nd\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(23, '\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(24, '\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(25, '\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf'),
(26, 'qwrewr'),
(27, 'qwrewr'),
(28, 'qwrewr');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allmessage`
--
ALTER TABLE `allmessage`
  ADD CONSTRAINT `link_to_adminReply` FOREIGN KEY (`reply_id`) REFERENCES `adminReply` (`reply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_visitor` FOREIGN KEY (`msg_id`) REFERENCES `visitor` (`msg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `link_to_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_gadgets` FOREIGN KEY (`gadget_id`) REFERENCES `gadgets` (`gadget_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_picture` FOREIGN KEY (`pic_id`) REFERENCES `picture` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `link_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
