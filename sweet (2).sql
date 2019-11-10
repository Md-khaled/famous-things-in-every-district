-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 04:26 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `mobile`, `email`, `city`, `zipcode`, `address`) VALUES
(1, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(2, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(3, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(4, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(5, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(6, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(7, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(8, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(9, 'rakib', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(10, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(11, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(12, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(13, 'khaledd', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(14, 'khaled', '01817579013', 'mahmud@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(15, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(16, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(17, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `lebel` tinyint(4) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `image`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `lebel`) VALUES
(1, '', 'khaled mahmud', 'khaled', 'khaled@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `colorName` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sId`, `product_id`, `productName`, `colorName`, `size`, `price`, `quantity`, `image`) VALUES
(15, '99oggd3pvsl886jisefev5fkl4', 1, 'Camera mine', '', '', 500, 1, 'upload/aef0b028a9.png'),
(2, 'sqot298tvtid139p05u3fv94q3', 3, 'flower', '', '', 90, 5, 'upload/ac235ac821.png'),
(16, '29l72c8k97rcv10p6da9gkna24', 1, 'Camera mine', '', '', 500, 1, 'upload/aef0b028a9.png'),
(40, 'nto3b7c0gjoa0scss2pgofc2l2', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(45, 'oo8klsag1596ir0inguvnidv43', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(46, 'domqcea96b6mpp32hklfg00p15', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(47, 'domqcea96b6mpp32hklfg00p15', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(48, 'mkplpm75muus08ope60s9r7l27', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(49, '5bu9sdbmgdlmm6bsqdel6qc053', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(54, 'd0922m2aneam5h6dajkbps4csi', 43, 'check', NULL, NULL, 33, 2, 'upload/5da8be822d482-97.png'),
(55, 'd0922m2aneam5h6dajkbps4csi', 44, 'qweqw', 'White', 'midium', 23, 1, 'upload/5dab46d537ff5-91.jpg'),
(57, 'rb5odso63hq36kdo6he0722prc', 43, 'check', NULL, NULL, 33, 2, 'upload/5da8be822d482-97.png'),
(85, 'lf9cj5jgivhl7ckpvg1u4g72g2', 48, 'sdds', NULL, NULL, 23, 1, 'upload/5db32b8c3c0b0-0.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phone'),
(6, 'cloths'),
(79, 'fine');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colorName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `colorName`) VALUES
(1, 'White'),
(2, 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

DROP TABLE IF EXISTS `compare`;
CREATE TABLE IF NOT EXISTS `compare` (
  `comId` int(11) NOT NULL AUTO_INCREMENT,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`comId`),
  KEY `productId` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `name`, `mobileNo`, `email`, `body`, `status`, `date`) VALUES
(1, 'khaled', 'mahmud', 'ss@c.com', 'bbbbb', 1, '2017-02-13 11:28:07'),
(5, 'mojjamel', 'haque', 'dnight950@gmail.com', 'iiuuuuuuuuuuuuuuuuuu\r\nkkkkkkkkkkkkk', 0, '2017-02-13 18:13:36'),
(4, 'salauddin', 'rahman', 'kh@d.co', 'fdfdsagdfgdfg dfdafgsd dfgadfg', 1, '2017-02-13 17:50:39'),
(6, 'md khaled', '8976867', 'kh@d.co', 'yygbyhhb', 0, '2017-03-03 02:37:18'),
(7, 'khaled', '01817579013', 'rakibul9200@gmail.com', 'ffdgdfgdf', 0, '2019-10-23 14:44:34'),
(8, 'khaled', '01817579013', 'rakibul9200@gmail.com', 'your product is good', 0, '2019-11-05 21:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `district`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'kld', 'address', 'city', 'district', 'zip', 'phone', 'email', '123'),
(2, 'sha', 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'shawon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

DROP TABLE IF EXISTS `cus_order`;
CREATE TABLE IF NOT EXISTS `cus_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `cusId` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`orderId`, `cusId`, `address_id`, `amount`, `payment_type`, `transaction_id`, `date`, `status`) VALUES
(21, 5, 6, 66, 'Cash', '', '2019-10-20 23:54:07', 0),
(22, 5, 6, 69, 'Cash', '', '2019-10-20 23:54:07', 1),
(23, 5, 7, 290.4, 'Bkash', '1098', '2019-10-23 17:33:31', 0),
(24, 5, 8, 290.4, 'Bkash', '1098', '2019-10-23 17:34:21', 1),
(25, 5, 9, 220, 'Bkash', '111', '2019-10-23 18:09:08', 0),
(26, 5, 10, 145.2, 'Cash', '', '2019-10-23 18:22:34', 0),
(27, 5, 11, 36.3, 'Cash', '', '2019-10-23 18:31:28', 1),
(28, 5, 12, 110, 'Bkash', '1098', '2019-10-23 18:48:25', 1),
(29, 5, 13, 36.3, 'Cash', '', '2019-10-23 18:49:56', 0),
(30, 6, 14, 36.3, 'Cash', '', '2019-10-23 18:51:53', 0),
(31, 5, 15, 110, 'Cash', '', '2019-10-23 18:53:58', 0),
(32, 6, 16, 36.3, 'Cash', '', '2019-10-23 19:00:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

DROP TABLE IF EXISTS `delivery_order`;
CREATE TABLE IF NOT EXISTS `delivery_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`id`, `order_id`, `user_id`, `delivery_date`) VALUES
(1, 19, 5, '2019-10-04 18:00:00'),
(2, 22, 5, '2019-10-18 18:00:00'),
(3, 27, 10, '2019-11-13 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `multi_img`
--

DROP TABLE IF EXISTS `multi_img`;
CREATE TABLE IF NOT EXISTS `multi_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_img`
--

INSERT INTO `multi_img` (`id`, `product_id`, `alt_img`) VALUES
(1, 36, 'p'),
(2, 36, 'l'),
(3, 36, 'o'),
(4, 36, 'a'),
(5, 37, 'upload/5da8bba921705-14.png'),
(6, 37, 'upload/5da8bba921902-78.png'),
(7, 37, 'upload/5da8bba921ad6-21.png'),
(8, 38, 'upload/5da8bbd305a8d-6.png'),
(9, 38, 'upload/5da8bbd305c38-45.png'),
(10, 38, 'upload/5da8bbd305ddd-31.png'),
(11, 42, 'upload/5da8bdadae566-56.png'),
(12, 42, 'upload/5da8bdadae73b-7.png'),
(13, 43, 'upload/5da8be822d6c4-93.png'),
(14, 43, 'upload/5da8be822d8e7-58.png'),
(15, 44, 'upload/5dab46d539dd0-62.jpg'),
(16, 44, 'upload/5dab46d539fb9-14.png'),
(17, 45, 'upload/5db00664476a1-31.png'),
(18, 52, 'upload/5db30ad2df6ab-49.png'),
(19, 52, 'upload/5db30ad2df83b-40.png'),
(20, 52, 'upload/5db30ad2df9ce-14.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `colorName` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `productName`, `colorName`, `size`, `quantity`, `price`, `image`) VALUES
(1, 19, 43, 'gddg', 'black', 'small', 2, 100, 'upload/5dab46d537ff5-91.jpg'),
(2, 21, 42, 'dgdg', 'green', 'large', 3, 300, 'upload/5da8b90974d5d-32.png'),
(3, 5, 46, 'sweet', '', '', 2, 264, 'upload/5db00a3c8c6da-91.png'),
(4, 25, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(5, 0, 47, 'towel', '', '', 2, 200, 'upload/5db00aace1f92-47.png'),
(6, 26, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(7, 0, 46, 'sweet', '', '', 1, 132, 'upload/5db00a3c8c6da-91.png'),
(8, 27, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(9, 0, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(10, 28, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(11, 28, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(12, 29, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(13, 29, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(14, 0, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(15, 0, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(16, 31, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(17, 31, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(18, 32, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png'),
(19, 33, 47, 'towel', '', '', 1, 100, 'upload/5db00aace1f92-47.png'),
(20, 33, 45, 'new', '', '', 1, 33, 'upload/5db0066440c4c-30.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `colorName` varchar(255) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `cat_id`, `colorName`, `cityName`, `size`, `body`, `price`, `qty`, `image`, `status`) VALUES
(46, 'coconut', 3, 'Green', 'comilla', 'large', '                                     hgfhgfhf                                ', 132, 30, 'upload/5db829fadceec-65.jpg', 'active'),
(47, 'towel', 3, 'Green', 'comilla', 'small,midium', '                                     tjdjdgfhfdghdfh                                ', 100, 10, 'upload/5db829556e489-32.jpg', 'active'),
(48, 'curd', 6, 'White', 'noyakhali', 'small', '                                                                                                                                                                                         fhfgh                                                                                                                                                                ', 23, 26, 'upload/5db828a6a7289-28.jpg', 'active'),
(49, 'sweet', 6, 'Green', 'comilla', 'small', '                                     fsdfds                                ', 100, 0, 'upload/5db828f0ac1fe-26.jpg', 'active'),
(56, 'sdds', 6, 'White', 'comilla', 'large', '                                                                                                                                                                                                                                                                   fhfgh                                                                                                                                                                                                                                ', 23, 1, 'upload/5db82852f35c3-54.jpg', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `user_id`, `name`, `email`, `rating`, `review`, `created_at`) VALUES
(1, 49, '5', 'khaled', 'admin@gmail.com', 5, 'fsfsdafasf', '2019-10-21 10:43:48'),
(2, 47, '', 'rakib', 'rakibul9200@gmail.com', 3, 'gdgd', '2019-10-24 09:46:31'),
(3, 47, '5', 'khaled', 'rakibul9200@gmail.com', 4, 'gfhsgdsf', '2019-10-24 09:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `homeimg` varchar(255) DEFAULT NULL,
  `otherimg` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `homeimg`, `otherimg`, `status`) VALUES
(7, 'Curd', 'upload/5db81c8bac696-24.jpg', NULL, 'active'),
(11, 'sweet', 'upload/5dc2f3bae4416-89.png', NULL, 'active'),
(10, 'rosmolai', 'upload/5dc2f333cda23-51.png', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `typeofuser` varchar(255) DEFAULT 'general',
  `role` int(11) NOT NULL DEFAULT '1',
  `block` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `employeeid`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`, `typeofuser`, `role`, `block`) VALUES
(1, 'khaled', NULL, 'bi-baria,dkhaka', 'dhaka', 'bangladesh', '20-d', '6475675474', 'editor@gmail.com', '202cb962ac59075b964b07152d234b70', 'editor', 1, '1'),
(2, 'shawon', NULL, 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'editor@gmail.com', '202cb962ac59075b964b07152d234b70', 'editor', 1, '1'),
(3, 'khaleddddd', NULL, 'dasdasd', 'dhaka', '', '', '', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 0, '0'),
(5, 'staff', '00123', '&lt;p&gt;b-baria&lt;/p&gt;', 'comilla', NULL, NULL, NULL, 'staff@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff', 2, '0'),
(9, 'khaled', NULL, 'fdsfsd', 'tret', '34534', 'e242', '2343', 'golam@gmail.com', '202cb962ac59075b964b07152d234b70', 'general', 1, '0'),
(10, 'khaled', 'a123', NULL, 'comilla', NULL, NULL, NULL, 'rakibul9200@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wlist`
--

DROP TABLE IF EXISTS `wlist`;
CREATE TABLE IF NOT EXISTS `wlist` (
  `wId` int(11) NOT NULL AUTO_INCREMENT,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`wId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compare`
--
ALTER TABLE `compare`
  ADD CONSTRAINT `compare_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
