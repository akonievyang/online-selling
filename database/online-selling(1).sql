-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2013 at 12:08 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online-selling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `userAdmin` varchar(50) DEFAULT NULL,
  `passAdmin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `firstname`, `middlename`, `lastname`, `Gender`, `userAdmin`, `passAdmin`) VALUES
(1, 'Ivy', 'Salidaga', 'Rebuyas', 'female', '654321', '*2A032F7C5BA932872F0F045E0CF6B53CF702F2C5');

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
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart` (`customer_id`),
  KEY `fk_cart_item` (`item_id`)
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
  `profile_picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `address`, `contact`, `password`, `username`, `profile_picture`) VALUES
(29, 'andres', 'mabini', 'bonifacio', 'male', 15, 'PALO', 2147483647, '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '123456', 'QP29-myphone.jpg'),
(30, '1', '1', '1', '1', 1, '1', 1, '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '1', NULL),
(31, '1', '1', '1!', '1!', 1, '1!', 0, '*4C3DFB2FB3E0FA1B5B0A854D1A341A425A764F3D', 'w', NULL),
(32, 'wrwr', 'wrwrw', 'rwrw', 'rwrwrw', 0, 'male', 0, 'wrwrw', 'password(44343)', NULL),
(33, 'wrwr', 'wrwrw', 'rwrw', 'rwrwrw', 0, 'male', 0, 'wrwrw', 'password(44343)', NULL),
(34, 'wrwr', 'wrwrw', 'rwrw', 'rwrwrw', 0, 'male', 0, '4343434343', 'password(434344343)', NULL),
(35, 'wrwr', 'wrwrw', 'rwrw', 'rwrwrw', 0, 'male', 0, '4343434343', 'password(434344343)', NULL),
(36, 'Maria Stephanie', 'Corro ', 'Lampong', 'Palompon, Leyte', 16, 'female', 2147483647, 'johnie', 'password(infinity)', NULL),
(37, 'lorizza ame', 'lombog', 'ignacio', 'palo', 16, 'female', 46437537, 'lorie', 'password(loriza)', NULL),
(38, 'John Rey ', 'Lago', 'Gerez', 'Palo', 18, 'male', 2147483647, 'uEkie', 'password(1438)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE IF NOT EXISTS `gadgets` (
  `gadget_id` int(11) NOT NULL AUTO_INCREMENT,
  `gadget_name` varchar(50) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `features` varchar(500) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`gadget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=221 ;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`gadget_id`, `gadget_name`, `brand`, `category`, `quantity`, `color`, `features`, `price`, `date_added`) VALUES
(153, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 09:20:19'),
(154, 'myphone B-12 DUO', 'samsung', NULL, 0, NULL, 'mao na iya feature .. ', 1500, '2013-05-18 09:20:29'),
(155, 'Myphone A898 DUO (BLACK) ', 'samsung', NULL, 0, NULL, '\n\n    4.3" WVGA IPS capacitive touchscreen\n    Android 4.0 Ice Cream Sandwich\n    2.5GB internal memory\n    1GHz Dual Core processor\n    Bluetooth, Wi-Fi, USB, GPS capable\n    5MP Camera, Autofocus\n    Dual SIM, Dual Standby\n\n', 5490, '2013-05-18 09:20:42'),
(156, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 11:02:35'),
(157, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 11:08:06'),
(158, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 11:08:48'),
(159, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 11:08:50'),
(160, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 11:13:51'),
(161, '4242424', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 2424, '2013-05-18 12:08:09'),
(162, 'QTV20-myphone', 'samsung', NULL, 100, NULL, 'FEATURES Type: Dual SIM Qwerty TV phone Data Connection: GSM / GPRS Class 12 Frequency Range: 900/1800/1900MHz Display: 2.2â€œ 220X176 pixels TFT Browser: WAP 2.0 Messaging: SMS, MMS, EMS, Chat Ringing Melody: MP3, True Tones, MIDI, WAV Applications: MSN, Yahoo messenger, Facebook, Twitter, Games, World Clock, Health, Stopwatch, E-book reader Connectivity: Bluetooth / USB Imaging: VGA camera Phonebook: 500 entries Card slot: microSD (TransFlash) up to 4GB SPECIFICATIONS Weight: 100g Dimensions: ', 2488, '2013-05-18 12:26:36'),
(187, 'dsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 43434, '2013-05-18 13:27:37'),
(188, '32323', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 43434, '2013-05-18 13:29:00'),
(189, '23232', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 3232323, '2013-05-18 14:53:25'),
(190, '23232', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 545454354355, '2013-05-18 15:02:40'),
(191, '23232', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 545454354355, '2013-05-18 15:04:11'),
(192, '23232', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 545454354355, '2013-05-18 15:04:21'),
(193, '23232', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 545454354355, '2013-05-18 15:04:23'),
(194, 'trt45454', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 564645, '2013-05-18 15:04:47'),
(195, 'desdsds', 'samsung', NULL, 100, NULL, 'mao ni ang features niya', 23232323, '2013-05-18 15:33:24'),
(196, 'sasa', 'samsung', NULL, 100, '1', 'mao ni ang features niya', 545454354355, '2013-05-18 16:43:20'),
(197, 'fdfdfd', 'samsung', NULL, 100, NULL, 'fdfd', 3423434343, '2013-05-20 17:27:46'),
(198, '434343', 'samsung', NULL, 100, NULL, 'fdfdrerre', 3423434343, '2013-05-20 17:28:10'),
(199, 'QW28-Actual-Product2', 'samsung', NULL, 100, NULL, '  This beauty from my!phone is dual sim and costs only PhP 5,990 and is feature-packed.  Infact it claims to do what blackberry does in a cheaper manner.  I like this one better if only it comes in red. It boasts of a 3.2 megapixel camera, bluetooth connectivity, and wifi.  What else would you need?\n\n    But really i have been itching to buy an underwater camera for sometime.  Not that, i have any plans of scuba diving soon.  My children are mermaids.  Abby particularly, sometimes wears her pink', 5999, '2013-05-23 12:57:48'),
(200, 'QW28-Actual-Product2', 'samsung', NULL, 100, NULL, '  This beauty from my!phone is dual sim and costs only PhP 5,990 and is feature-packed.  Infact it claims to do what blackberry does in a cheaper manner.  I like this one better if only it comes in red. It boasts of a 3.2 megapixel camera, bluetooth connectivity, and wifi.  What else would you need?\n\n    But really i have been itching to buy an underwater camera for sometime.  Not that, i have any plans of scuba diving soon.  My children are mermaids.  Abby particularly, sometimes wears her pink', 5999, '2013-05-23 12:58:07'),
(201, 'QW28-Actual-Product2 ', 'samsung', NULL, 100, NULL, '  This beauty from my!phone is dual sim and costs only PhP 5,990 and is feature-packed.  Infact it claims to do what blackberry does in a cheaper manner.  I like this one better if only it comes in red. It boasts of a 3.2 megapixel camera, bluetooth connectivity, and wifi.  What else would you need?\n\n    But really i have been itching to buy an underwater camera for sometime.  Not that, i have any plans of scuba diving soon.  My children are mermaids.  Abby particularly, sometimes wears her pink', 5990, '2013-05-23 12:59:40'),
(202, 'Canon PowerShot A2300', 'samsung', NULL, 100, NULL, ' * 16.0 mega pixel sensor\n* 5x optical zoom lens (35mm equiv: 28-140mm)\n* Digital Image Stabilisation\n* 2.7 inch touch LCD screen\n* Smart Auto (32 scenes)\n* 720p HD video recording\n* ISO 100-1600\n* 3cm minimum focusing distance\n* Several creative modes\n* Available in black, silver, pink and blue.\n* Built-in help guide\n* Available in a good range of colours\n* Good creative modes\n* Images have really good colour reproduction\n* Easy to use ', 15000, '2013-05-23 13:04:13'),
(203, 'Canon PowerShot A2300', 'samsung', NULL, 100, NULL, ' * 16.0 mega pixel sensor\n* 5x optical zoom lens (35mm equiv: 28-140mm)\n* Digital Image Stabilisation\n* 2.7 inch touch LCD screen\n* Smart Auto (32 scenes)\n* 720p HD video recording\n* ISO 100-1600\n* 3cm minimum focusing distance\n* Several creative modes\n* Available in black, silver, pink and blue.\n* Built-in help guide\n* Available in a good range of colours\n* Good creative modes\n* Images have really good colour reproduction\n* Easy to use ', 15000, '2013-05-23 13:04:20'),
(204, 'Canon EOS 650D 18.0 MP DSLR Camera w/ 18-55mm Lens', 'samsung', NULL, 100, NULL, '  * 18.0 Megapixels APS-C CMOS sensor\n* Full-HD movies\n* 3" LCD screen\n* 5 fps continuous shooting\n* ISO 100-12,800 sensitivity, extendable to ISO 25,600\n* 9-point wide-area AF\n* Integrated Speedlit\n* Available only in this color. ', 25000, '2013-05-23 13:05:24'),
(205, 'QW28-Actual-Product2', 'samsung', NULL, 100, NULL, '  This beauty from my!phone is dual sim and costs only PhP 5,990 and is feature-packed.  Infact it claims to do what blackberry does in a cheaper manner.  I like this one better if only it comes in red. It boasts of a 3.2 megapixel camera, bluetooth connectivity, and wifi.  What else would you need?\n\n    But really i have been itching to buy an underwater camera for sometime.  Not that, i have any plans of scuba diving soon.  My children are mermaids.  Abby particularly, sometimes wears her pink', 5990, '2013-05-23 13:06:05'),
(206, 'Samsung WB250F 14.2 MP Digital Camera (Black) ', 'samsung', NULL, 100, NULL, '* 14.2 Megapixels 1/2.33" BSI CMOS sensor * 18x optical/up to 5x digital/2x Intelli-zoom/up to 90x total zoom * 3" color touch-screen TFT-LCD display * High-definition video mode * Optical image stabilization * Auto shooting modes * Continuous shooting * Face detection * White balance controls * Built-in flash * Smart Filter photo effects * TTL (through-the-lens) autofocus * Wi-Fi connectivity * Available Colors White, ', 7499, '2013-05-23 13:09:11'),
(207, ' Olympus Waterproof Digital Camera TG-320 14 MP (R', 'samsung', NULL, 100, NULL, '  * 14 Megapixels\n* 3.6x wide optical zoom\n* 6.9cm/ 2.7" LCD 230,000 dot color LCD\n* 720 P HD Movie and HDMI Control\n* iAuto and AF tracking\n* 3D Photo shooting mode\n* Li-42B Lithium Ion Battery\n', 10000, '2013-05-23 13:10:30'),
(208, 'A919i Duo ', 'samsung', NULL, 100, NULL, '  Specs is not just specifications, but is spectacular for the new MyPhone A919i. Powered by a high-speed 1.2 GHz Quad-core processor, this newest and most powerful offer, yet, from MyPhone will surely give you the best out of your Android experience. Ka-MyPhoneâ€™s will surely get their eyes mesmerized with this deviceâ€™s wide 5â€ IPS High-Definition LCD. Userâ€™s long wait for the Android Jelly Bean OS comes to an end with the coming of this phone. Capturing every moment is a perfect picture', 1988, '2013-05-23 13:12:18'),
(209, ' Fujifilm Finepix XP50 14.0 MP Waterproof Digital ', 'samsung', NULL, 100, NULL, '  * 14.0MP CMOS* 2.7" TFT-LCD Monitor* 5x Optical Zoom Lens* Full HD Movies* CMOS - Shift Image Stabilization* Sensitivity: ISO3200* 6 Scene SR AUTO* 4-Proof Protection: Waterproof 16.5'', Shockproof 5'', Freezeproof 14, Dustproof', 7599, '2013-05-23 14:02:25'),
(210, 'Acer-Aspire-A5560-7414 ', 'samsung', NULL, 100, NULL, '  Our pick: Acer Aspire A5560-7414 Specs at a glance: Acer Aspire A5560-7414 Screen 1366x768 at 15.6" (100 ppi) OS Windows 7 Home Premium 64-bit CPU 1.5GHz AMD A6-3420M (Turbo up to 2.4GHz) RAM 4GB 1066MHz DDR3 (officially supports up to 8GB) GPU AMD Radeon HD 6520G (integrated) HDD 2.5â€ 5400RPM 500GB hard drive Networking Gigabit Ethernet, 2.4 GHz 802.11n Ports 2x USB 2.0, VGA, HDMI, card reader, headphones and microphone Size 15" x 0.99-1.3" x 9.96" Weight 5.74 lbs Battery 6-cell 4400 mAH Li', 50000, '2013-05-23 14:05:02'),
(211, 'HP 15.6" LED Window 8, AMD Dual-Core, 4GB RAM, 500', 'samsung', NULL, 100, NULL, '  Windows 8 operating system Combines speed, reliability and an all-new app interface Do more with apps - apps can work together and share info, making it easier for you to do what you want Built-in app store to browse and download apps Sign in to any of your devices running Windows 8 and your personalized settings and apps are right there Easily connect with your friends and family Quickly connect to your files and photos across Windows 8 devices Intuitive interface with tabs and navigation con', 49000, '2013-05-23 14:08:37'),
(212, '15.6" LCD, Windows 8, AMD Dual-Core APU, 4GB RAM, ', 'samsung', NULL, 100, NULL, '  Windows 8 operating system Combines speed, reliability and an all-new app interface Do more with apps - apps can work together and share info, making it easier for you to do what you want Built-in app store to browse and download apps Sign in to any of your devices running Windows 8 and your personalized settings and apps are right there Easily connect with your friends and family Quickly connect to your files and photos across Windows 8 devices Intuitive interface with tabs and navigation con', 4500, '2013-05-23 14:18:49'),
(213, 'Myphone-s60-bb-standby', 'samsung', NULL, 100, NULL, '  You can turn your Nokia S60 phone into an iPhone with MMMOOOâ€™s My Phone. you can check out our review of MyPhone .FoneArena has teamed up with creators of this awesome application to giveaway 10 free copies to FoneArena readers. 2.20 of the software was released recently and it has some new features including iPhone like SMS conversations.', 5000, '2013-05-23 14:22:25'),
(214, ' Myphone a919 DUO-white', 'samsung', NULL, 100, NULL, '  If youâ€™ve been holding out for an affordable dual-core, dual-SIM smartphone with a big-ass display, then youâ€™re in luck. Say hello to the Samsung Galaxy S IIIâ€™s cousin MyPhone A919 Duo, the forthcoming 5-inch Android variant from the guys responsible for the 4.3-inch MyPhone A878 Duo. Officially priced cheaper than most kids on the block, especially considering how massive this thing is, the A919 Duo will retail at P7,999. Designed to go toe-to-toe with other China-bred Android heavyweig', 7990, '2013-05-23 14:24:33'),
(215, 'qafref', 'sdfs', NULL, NULL, NULL, '  sdfsdf', 564363456, '2013-05-25 17:19:09'),
(216, 'arzh', 'ryre', NULL, NULL, NULL, '  gjtjtd', 8686, '2013-05-27 09:37:25'),
(217, '111', '11', NULL, NULL, NULL, '  qewqw', 23332, '2013-05-27 14:51:41'),
(218, 'myphone B-12 DUO', 'samsung', NULL, NULL, NULL, 'mao na iya feature .. ', 1500, '2013-05-28 09:22:25'),
(219, 'myphone B-12 DUO', 'myphone', NULL, NULL, NULL, '  mao ni iya feature ..', 1999, '2013-05-28 09:40:33'),
(220, 'samsung camera BLACK', 'samsung', NULL, NULL, NULL, '  ambot unsai feature ana .. ', 8990, '2013-05-28 09:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `gadget_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `link_to_gadgets` (`gadget_id`),
  KEY `link_to_picture` (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `gadget_id`, `pic_id`) VALUES
(58, 155, 77),
(65, 162, 84),
(104, 201, 123),
(105, 202, 124),
(107, 204, 126),
(110, 207, 129),
(112, 209, 131),
(113, 210, 132),
(114, 211, 133),
(117, 214, 136),
(119, 217, 139),
(121, 219, 141),
(122, 220, 142);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `large_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `large_pic`) VALUES
(30, 'myphone-3582-92164-1-product.jpg'),
(34, 'myphone-3582-92164-1-product.jpg'),
(35, 'myphone-3582-92164-1-product.jpg'),
(36, 'myphone-3582-92164-1-product.jpg'),
(37, 'myphone-3582-92164-1-product.jpg'),
(44, 'myphone-3582-92164-1-product.jpg'),
(45, 'myphone-3582-92164-1-product.jpg'),
(46, 'myphone-3582-92164-1-product.jpg'),
(47, 'myphone-3582-92164-1-product.jpg'),
(48, 'myphone-3582-92164-1-product.jpg'),
(49, 'myphone-3582-92164-1-product.jpg'),
(50, 'myphone-3582-92164-1-product.jpg'),
(51, 'myphone-3582-92164-1-product.jpg'),
(52, 'myphone-3582-92164-1-product.jpg'),
(53, 'myphone-3582-92164-1-product.jpg'),
(54, 'myphone-3582-92164-1-product.jpg'),
(55, 'myphone-3582-92164-1-product.jpg'),
(56, 'myphone-3582-92164-1-product.jpg'),
(57, 'myphone-3582-92164-1-product.jpg'),
(58, 'myphone-3582-92164-1-product.jpg'),
(59, 'myphone-3582-92164-1-product.jpg'),
(60, 'myphone-3582-92164-1-product.jpg'),
(61, 'myphone-3582-92164-1-product.jpg'),
(62, 'myphone-3582-92164-1-product.jpg'),
(63, 'myphone-3582-92164-1-product.jpg'),
(64, 'myphone-3582-92164-1-product.jpg'),
(65, 'myphone-3582-92164-1-product.jpg'),
(66, 'myphone-3582-92164-1-product.jpg'),
(67, 'myphone-3582-92164-1-product.jpg'),
(68, 'myphone-3582-92164-1-product.jpg'),
(69, 'myphone-3582-92164-1-product.jpg'),
(70, 'myphone-3582-92164-1-product.jpg'),
(71, 'myphone-3582-92164-1-product.jpg'),
(72, 'myphone-3582-92164-1-product.jpg'),
(73, 'myphone-3582-92164-1-product.jpg'),
(74, 'myphone-3582-92164-1-product.jpg'),
(75, 'myphone-3582-92164-1-product.jpg'),
(76, 'A919 Duo.png'),
(77, 'myphone-3585-42164-1-product.jpg'),
(78, 'myphone-3582-92164-1-product.jpg'),
(79, 'myphone-3582-92164-1-product.jpg'),
(80, 'myphone-3582-92164-1-product.jpg'),
(81, 'myphone-3582-92164-1-product.jpg'),
(82, 'myphone-3582-92164-1-product.jpg'),
(83, 'myphone-3582-92164-1-product.jpg'),
(84, 'QTV20-myphone.jpg'),
(85, 'myphone-3582-92164-1-product.jpg'),
(86, 'myphone-3582-92164-1-product.jpg'),
(87, 'myphone-3582-92164-1-product.jpg'),
(88, 'myphone-3582-92164-1-product.jpg'),
(89, 'myphone-3582-92164-1-product.jpg'),
(90, 'myphone-3582-92164-1-product.jpg'),
(91, 'myphone-3582-92164-1-product.jpg'),
(92, 'myphone-3582-92164-1-product.jpg'),
(93, 'myphone-3582-92164-1-product.jpg'),
(94, 'myphone-3582-92164-1-product.jpg'),
(95, 'myphone-3582-92164-1-product.jpg'),
(96, 'myphone-3582-92164-1-product.jpg'),
(97, 'myphone-3582-92164-1-product.jpg'),
(98, 'myphone-3582-92164-1-product.jpg'),
(99, 'myphone-3582-92164-1-product.jpg'),
(100, 'myphone-3582-92164-1-product.jpg'),
(101, 'myphone-3582-92164-1-product.jpg'),
(102, 'myphone-3582-92164-1-product.jpg'),
(103, 'myphone-3582-92164-1-product.jpg'),
(104, 'myphone-3582-92164-1-product.jpg'),
(105, 'myphone-3582-92164-1-product.jpg'),
(106, 'myphone-3582-92164-1-product.jpg'),
(107, 'myphone-3582-92164-1-product.jpg'),
(108, 'myphone-3582-92164-1-product.jpg'),
(109, 'myphone-3582-92164-1-product.jpg'),
(110, 'myphone-3582-92164-1-product.jpg'),
(111, 'myphone-3582-92164-1-product.jpg'),
(112, 'myphone-3582-92164-1-product.jpg'),
(113, 'myphone-3582-92164-1-product.jpg'),
(114, 'myphone-3582-92164-1-product.jpg'),
(115, 'myphone-3582-92164-1-product.jpg'),
(116, 'myphone-3582-92164-1-product.jpg'),
(117, 'myphone-3582-92164-1-product.jpg'),
(118, 'myPhone.jpg'),
(119, 'deleteStud.png'),
(120, 'pic-project_leyte.jpg'),
(121, 'QW28-Actual-Product2.jpg'),
(122, 'QW28-Actual-Product2.jpg'),
(123, 'QW29-myphone.jpg'),
(124, 'canonpowershot_a2300_lens_extended_1341993609.jpg'),
(125, 'canon_powershot_a2300_front_1341993524.jpg'),
(126, 'canon-0569-41085-1-zoom.jpg'),
(127, 'canon-0569-41085-1-zoom.jpg'),
(128, 'A919i Duo.png'),
(129, 'olympus-8457-36725-1-zoom.jpg'),
(130, 'A919i Duo.png'),
(131, 'fujifilm-3326-73695-1-zoom.jpg'),
(132, 'samsung-4909-91795-1-zoom.jpg'),
(133, 'hp-156-amd-e1-1200-4gb-ram-500gb-laptop-d-2012103117125149~6970872w.jpg'),
(134, 'myPhone.jpg'),
(135, 'myPhone.jpg'),
(136, 'myPhone.jpg'),
(137, '1-5-2011msigt783-1325782097.jpg'),
(138, 'mik_box-2.jpg'),
(139, '1-5-2011msigt783-1325782097.jpg'),
(140, '9909817-shopping-cart-icon.jpg'),
(141, 'B12-myphone.jpg'),
(142, 'samsung-4914-91795-4-zoom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `date_to_be_deliver` varchar(50) DEFAULT NULL,
  `date_delivered` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `link_to_item` (`item_id`),
  KEY `link_to_sales` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_id`, `customer_id`, `total_quantity`, `date_to_be_deliver`, `date_delivered`, `address`) VALUES
(10, 58, 29, 1, NULL, NULL, NULL),
(13, 58, 29, 1, NULL, NULL, NULL),
(17, 65, 29, 1, NULL, NULL, NULL),
(18, 58, 29, 1, NULL, NULL, NULL),
(24, 110, 29, 2, NULL, NULL, '323'),
(25, 58, 29, 1545, NULL, NULL, '5454'),
(26, 105, 29, 1, NULL, NULL, NULL),
(27, 58, 29, 1, NULL, NULL, ''),
(29, 58, 29, 2, NULL, NULL, 'dsds'),
(30, 58, 29, 4, NULL, NULL, 'dado for sale');

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
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `link_to_gadgets` FOREIGN KEY (`gadget_id`) REFERENCES `gadgets` (`gadget_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_picture` FOREIGN KEY (`pic_id`) REFERENCES `picture` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `link_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_sales` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
