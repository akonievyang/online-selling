-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2013 at 08:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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

--
-- Dumping data for table `adminReply`
--


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

--
-- Dumping data for table `allmessage`
--


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

--
-- Dumping data for table `best`
--


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
  `addresss` varchar(100) DEFAULT NULL,
  `contact` int(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `addresss`, `contact`) VALUES
(1, 'lor', 'ing', 'ngot', 'female', 20, 'palompon', -168);

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
  PRIMARY KEY (`gadget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`gadget_id`, `name`, `brand`, `discription`, `features`, `price`) VALUES
(1, 'A888 DUO', 'MyPhone', 'The new MyPhone A888 marries elegance with functionality. This new 3G Android phone is minimalist in design but promises maximum performance with its superb features. It comes neat and sleek at 8.99 mm, and with 4.5” IPS capacitive screen that is as delightful to the eyes as it is to the fingers. Its 8 megapixel rear camera with dual LED flash and 720p HD video recording capacity lets you take photos and videos like a pro. Taking wide-angled shots through the camera’s digital panorama function i', 'Tri-band, EDGE, 3G Connection, HSUPA, 1.3MP Front Camera, GPS, WiFi Connection, TV-Out, Motion Sensor, FM/MP3/MP4 Player, Dual Mic Noise Reduction, Proximity and Light Sensor, 32GB microSD Slot, HD 720p Video Recording, Turn to mute function, Bluetooth 4.0, micro USB, 3.5mm Audio Jack, PINOY PHONE APP', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `large_pic`, `small_pic`) VALUES
(1, 'A888.png', NULL);

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

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_msg` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(25, '\ns\ngf\ng\nf\ngf\n\ng\nfg\nf\ng\nf\ng\nf\ng\nf\ngf\ng\nf\ng\nf');

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
