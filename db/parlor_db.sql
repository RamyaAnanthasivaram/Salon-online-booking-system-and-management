-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parlor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_image` varchar(250) NOT NULL,
  `category_pretty_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_image`, `category_pretty_name`) VALUES
(1, 'makeup', 'uploads/20231218101332.jpg', 'Makeup'),
(2, 'pedicure', 'uploads/20240306153942.png', 'pedicure'),
(3, 'facial', 'uploads/20240306154005.jpeg', 'facial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `incharge` varchar(100) NOT NULL,
  `store` int(100) NOT NULL,
  `expert` varchar(500) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `first_name`, `last_name`, `username`, `image`, `email`, `password`, `incharge`, `store`, `expert`, `experience`, `mobile`, `address`, `city`, `state`, `country`, `zip`, `type`, `status`) VALUES
(1, '', '', 'ramya', 'uploads/20231209065837.png', 'ramya@gmail.com', '3112', '', 0, '', '', '9600082299', 'right', 'chennai', 'tamil nadu', 'india', '600015', 'Customer', 'Active'),
(6, '', '', 'ramya', 'uploads/20231209065857.png', 'ramya@gmail.com', '753951', '', 0, '', '', '9600082299', 'right', 'chennai', 'tamil nadu', 'india', '600015', 'Owner', 'Active'),
(7, 'Deepa', 'Laxmi', 'deepa', 'images/default/profile.jpg', 'deepa@gmail.com', '753841', '', 0, '', '', '8512364798', 'goa', 'chennai', 'tamilnadu', 'india', '6000258', 'Customer', 'Active'),
(8, 'Site', 'Admin', 'Admin', 'images/default/profile.jpg', 'admin@admin.com', '1234', '', 0, '', '', '', '', '', '', '', '', 'Admin', 'Active'),
(9, 'Kim', 'Bell', 'Kim', 'images/default/profile.jpg', 'kb@mail.com', '3112', '', 0, '', '', '9988776655', '123', 'Chennai', 'Tamil Nadu', 'India', '600045', 'Owner', 'Active'),
(10, 'Pretty', 'Ji', 'Pretty', 'images/default/profile.jpg', 'pj@mail.com', '3112', '9', 1, 'Hair Stylist', '10', '', '12', 'Chennai', 'Tamil Nadu', 'India', '600044', 'Staff', 'Active'),
(11, 'Mittal', 'Prey', 'Mittal', 'images/default/profile.jpg', 'mp@mail.com', '3112', '', 0, '', '', '9988776655', '123', 'Chennai', 'Tamil Nadu', 'India', '600045', 'Owner', 'Active'),
(13, 'Ajith', 'Khan', 'AK', 'images/default/profile.jpg', 'ak@k.com', '3112', '9', 1, '', '', 'EDFR', 'qwe', 'che', 'TN', 'I', '600044', 'Staff', 'Active'),
(28, '', '', '', 'images/default/profile.jpg', '', '1234', '9', 0, '', '', '', '', '', '', '', '', 'Staff', 'Reset');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `store` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Basket',
  `order_date` datetime NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `action` varchar(250) NOT NULL,
  `staff` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `store`, `user`, `service`, `type`, `status`, `order_date`, `transaction_id`, `action`, `staff`) VALUES
(32, '1', '1', '1', 'home', 'Purchased', '2024-04-01 07:00:04', '2', 'Paid', 0),
(35, '1', '1', '12', 'home', 'Purchased', '2024-04-01 07:04:23', '2', 'Paid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `owner` int(100) NOT NULL,
  `store` int(100) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `pretty_name` varchar(200) NOT NULL,
  `at_home` varchar(250) NOT NULL DEFAULT 'NA',
  `at_home_price` int(250) NOT NULL DEFAULT 0,
  `at_store` varchar(250) NOT NULL DEFAULT 'Y',
  `at_store_price` int(250) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `owner`, `store`, `category`, `name`, `image`, `pretty_name`, `at_home`, `at_home_price`, `at_store`, `at_store_price`) VALUES
(1, 9, 1, 1, 'facial_makeup', 'uploads/20231216072343.jpg', 'Facial Makeup', 'Y', 1999, 'N', 1499),
(2, 9, 1, 1, 'bridal_makeup', 'uploads/20231219041521.jpg', 'Bridal Makeup', 'N', 9999, 'Y', 8999),
(9, 9, 1, 2, 'nail_art', 'uploads/20240306154109.jpg', 'nail art', 'Y', 230, 'Y', 230),
(10, 9, 1, 2, 'waxing', 'uploads/20240306154146.png', 'waxing', 'NA', 0, 'Y', 300),
(11, 9, 1, 1, '5_mins_makeup', 'uploads/20240306154251.jpg', '5mins makeup', 'NA', 0, 'Y', 300),
(12, 9, 1, 1, 'water_proof_makeup', 'uploads/20240306154403.jpeg', 'water proof makeup', 'Y', 500, 'Y', 500),
(13, 9, 1, 2, 'nail_art', 'uploads/20240313053522.jpg', 'Nail Art', 'Y', 100, 'Y', 100),
(14, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(15, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(16, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(17, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(18, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(19, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(20, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(21, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(22, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(23, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(24, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(25, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(26, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(27, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(28, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `id` int(11) NOT NULL,
  `owner` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gst` int(100) NOT NULL,
  `businessname` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` int(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `banner` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Closed',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`id`, `owner`, `name`, `gst`, `businessname`, `address`, `city`, `state`, `country`, `zip`, `phone`, `banner`, `logo`, `status`, `is_deleted`, `created_on`) VALUES
(1, 9, 'Loreal Paris', 0, 'Loreal Paris India Pvt Ltd', '1223', 'Chennai', 'Tamil Nadu', 'India', 600045, 2345678923, 'uploads/loreal1.jpg', 'uploads/partner-1.jpg', 'Open', 0, '2023-12-15 06:08:07'),
(2, 11, 'CLARINS PARIS', 0, 'Clarins Paris India Pvt Ltd', '1223', 'Chennai', 'Tamil Nadu', 'India', 600045, 2345678923, 'uploads/20231215095310.jpg', 'uploads/20231215095310.jpg', 'Closed', 1, '2023-12-15 09:53:10'),
(12, 20, 'sjjkf', 30, 'kjfk', 'kfkj', 'kfm', 'kf', 'jnf', 55555555, 9555, 'uploads/banner_20240323073445.jpg', '', 'Closed', 0, '2024-03-23 07:34:45'),
(19, 27, 'pretty', 123, 'hello', 'hjk', 'gjklk', 'uhijokl', 'fyguhijo', 5652, 154548784545, 'uploads/banner_20240323101152.png', 'uploads/20240323101152.png', 'Closed', 0, '2024-03-23 10:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `store` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `payment_id` varchar(250) NOT NULL,
  `amount` int(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `store`, `user`, `payment_id`, `amount`, `created_on`, `status`) VALUES
(1, '1', '7', 'pay_NGsxfBLo5lekXW', 12978, '2023-12-26 08:06:50', 'Pending'),
(2, '1', '1', 'pay_NtEkeiHWQE6IQb', 2949, '2024-04-01 07:07:42', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
