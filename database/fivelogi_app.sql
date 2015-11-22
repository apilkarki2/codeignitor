-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2015 at 11:00 PM
-- Server version: 5.5.46-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fivelogi_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_data`
--

CREATE TABLE IF NOT EXISTS `app_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) NOT NULL DEFAULT '',
  `regIID` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `app_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `app_data`
--

INSERT INTO `app_data` (`id`, `app_name`, `regIID`, `country`, `app_id`) VALUES
(1, 'uuuu', 'eCZErMf3Olc:APA91bFaP9NgNGKgJzWMfW8JPnsfz6393-65c4V-BbJrhuIeHspActlD6l1pwgNz2PaY2I1UZtB2tzlNGcw5LtHZZbP0_htcKGKNgLewkNw4ZXKhlLWx2EfUAZb7Kmn-C_gild-B2bny', 'pk', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(2, 'asdf', 'eCZErMf3Olc:APA91bFaP9NgNGKgJzWMfW8JPnsfz6393-65c4V-BbJrhuIeHspActlD6l1pwgNz2PaY2I1UZtB2tzlNGcw5LtHZZbP0_htcKGKNgLewkNw4ZXKhlLWx2EfUAZb7Kmn-C_gild-B2bny', 'pk', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(3, 'yyyy', 'eCZErMf3Olc:APA91bFaP9NgNGKgJzWMfW8JPnsfz6393-65c4V-BbJrhuIeHspActlD6l1pwgNz2PaY2I1UZtB2tzlNGcw5LtHZZbP0_htcKGKNgLewkNw4ZXKhlLWx2EfUAZb7Kmn-C_gild-B2bny', 'Ak', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(4, 'app_name', 'userregid', 'pk', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(5, 'app_name', 'userregid', 'country', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(6, 'GCM_TEST', 'eCZErMf3Olc:APA91bFaP9NgNGKgJzWMfW8JPnsfz6393-65c4V-BbJrhuIeHspActlD6l1pwgNz2PaY2I1UZtB2tzlNGcw5LtHZZbP0_htcKGKNgLewkNw4ZXKhlLWx2EfUAZb7Kmn-C_gild-B2bny', 'PK', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY'),
(7, 'GCM_TEST', 'eCZErMf3Olc:APA91bFaP9NgNGKgJzWMfW8JPnsfz6393-65c4V-BbJrhuIeHspActlD6l1pwgNz2PaY2I1UZtB2tzlNGcw5LtHZZbP0_htcKGKNgLewkNw4ZXKhlLWx2EfUAZb7Kmn-C_gild-B2bny', 'pk', 'AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
