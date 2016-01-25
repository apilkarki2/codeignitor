-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 06:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zaheer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL DEFAULT '',
  `regIID` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `app_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_data`
--

INSERT INTO `app_data` (`id`, `app_name`, `regIID`, `country`, `app_id`) VALUES
(6, 'Api_Test_Project', 'eCIjgVk0tLk:APA91bF4KlXENcYMIstPjrxTqLmWMII9EMvLfR2uo9BNapxfmRaJBxOiR37XSBGdG55DF1rj_X8UBI_LxpfSnKepB30u2ssDGMfStJ-2PcGKNauHDP3RMKU2M9w1G7qutmEOi8JtEvjM', 'pk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM'),
(7, 'Api_Test_Project2', 'eCIjgVk0tLk:APA91bF4KlXENcYMIstPjrxTqLmWMII9EMvLfR2uo9BNapxfmRaJBxOiR37XSBGdG55DF1rj_X8UBI_LxpfSnKepB30u2ssDGMfStJ-2PcGKNauHDP3RMKU2M9w1G7qutmEOi8JtEvjM', 'Tk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM'),
(8, 'Api_Test_Project', 'cHivEi2pndo:APA91bFrfWlQ2_9XPNtT8q1QWkgbUPGp09Td1JUq1C1S4r0nkorBA12hj7R5eRzvJu3-UcZga74lhb8b7BHWIs-rzfeAOJzTPpq_gwxJs70y40CI7BJbtjCZbvHNFSiR67fcNtNSMZUk', 'pk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM'),
(9, 'Api_Test_Project', 'c6_6e7o2A54:APA91bH8lG9MIMw-SATh55hzUbWNQb4LIDUeBkxbxwUkigQVeT44GHCIvjO-h8td9Yz44u4T4OYPRUZ0clZOcg1AkamP_mj7jz9gT8_vgfoEEDIvzNm-xW0cw6nMop9V_N6P1b4XdB4W', 'pk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM'),
(10, 'Api_Test_Project', 'feZr0nVIdVY:APA91bG2d70VZ2Eg7PWgQ7CjXRTal7a7bRdeukeirunD44R2xy9gXsMe4UH-AT_p2UFE0tq4amOt72Ofr0CRdapDsQiqaTdxBldIXYFNUqzjiqzxrlNVMcgLyt37C6hmpjvEn3M-q2xN', 'pk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM'),
(11, 'Api_Test_Project', 'dy8Yo1ky33E:APA91bEA9jv777V4tjibKKmJKliSmssdmA7ePCcOlhflh9qq1hEeRaUxQMBPI5GBiLQ5FMxYCA8c0Lj_6Lacu83v6J2NYrIrCm1PTAJhmpRVlqrJ9Cvj_3WjyNpuN075zx7jVwYoltFM', 'pk', 'AIzaSyDQclnVfyMgEJL6-C_Q0jwDrTCxOCpIHsM');

-- --------------------------------------------------------

--
-- Table structure for table `message_send_logs`
--

CREATE TABLE IF NOT EXISTS `message_send_logs` (
`id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `app_name` varchar(256) NOT NULL,
  `regid` varchar(256) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `gcm_message` longtext NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_data`
--
ALTER TABLE `app_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_send_logs`
--
ALTER TABLE `message_send_logs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_data`
--
ALTER TABLE `app_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `message_send_logs`
--
ALTER TABLE `message_send_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
