-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 08:09 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'personal'),
(2, 'tools'),
(3, 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `total_price` varchar(30) DEFAULT NULL,
  `product_id` varchar(1000) DEFAULT NULL,
  `order_time` varchar(100) DEFAULT NULL,
  `quantity` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `address`, `city`, `country`, `email`, `phone`, `order_status`, `total_price`, `product_id`, `order_time`, `quantity`) VALUES
(1, 1, 'asdada', 'dasda', 'dada', 'dadadad', 'adad@sdd.cc', '01682103738', 'completed', '600', '["2"]', '17 Mar 2015 8:40:15 am', '["1"]'),
(2, 2, 'mahmud rahman', 'khulna', 'khulna', 'Bangladesh', 'mahmudkuet11@gmail.com', '01671536101', 'completed', '160', '["6"]', '08 Jun 2015 11:54:41 pm', '["2"]');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image_link` varchar(200) DEFAULT NULL,
  `sell` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `availability`, `model`, `manufacturer`, `category`, `image_link`, `sell`, `view`, `featured`) VALUES
(1, 'Doll', 'this is a cute doll', 300, 50, 'doll-12', 'Local', 'personal', 'http://localhost/project/upload/4139542313307.jpg', 0, 2, 'yes'),
(2, 'Hammer', 'very useful tool for various works. keep one near your hand and use.', 600, 22, 'hammer-16', 'Local', 'tools', 'http://localhost/project/upload/4139542277001.jpg', 3, 9, 'yes'),
(3, 'Shoe', 'Smart looking shoes. super flexible and very comfortable', 2000, 60, 'bata-1C23', 'Bata', 'personal', 'http://localhost/project/upload/4139542292004.jpg', 0, 1, 'yes'),
(4, 'Laptop', 'Intel core i3 3.0 GHz,4GB DDR3 RAM,15 inch color monitor,500 GB hard disk', 40000, 200, 'DELL-800', 'Dell', 'electronics', 'http://localhost/project/upload/4139542305006.jpg', 0, 0, 'yes'),
(5, 'Table fan', 'Rechargeable table fan with charger light. Long lasting battery. Smart looking.', 3500, 30, '1C23DE', 'National Fan Industries', 'electronics', 'http://localhost/project/upload/4139542260403.jpg', 0, 0, 'yes'),
(6, 'Paper Weight', 'this is a paper weight', 80, 58, 'no', 'Local', 'personal', 'http://localhost/project/upload/4139542320205.jpg', 2, 6, 'yes'),
(7, 'sdada', 'dasd', 200, 20, 'adasd', 'aaa', 'personal', 'http://localhost/project/upload/114337867093g.jpg', NULL, 1, 'no'),
(8, 'dasfdasd', 'sadad', 500, 20, 'dadad', 'aaa', 'personal', 'http://localhost/project/upload/114337867492015.jpg', NULL, 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `newsletter_activation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `newsletter_activation`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'mahmud@gmail.com', ''),
(2, 'raju', '81dc9bdb52d04dc20036dbd8313ed055', 'raju@gmail.com', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
