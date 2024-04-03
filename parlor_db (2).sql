-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 06:15 AM
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
(3, 'facial', 'uploads/20240306154005.jpeg', 'facial'),
(5, 'hair_cut', 'uploads/20240402164417.jpg', 'Hair Cut'),
(6, 'hair_smoothening', 'uploads/20240402164511.jpg', 'Hair Smoothening'),
(7, 'spa', 'uploads/20240402164622.jpeg', 'Spa'),
(8, 'nail_art', 'uploads/20240402164648.jpg', 'Nail Art'),
(9, 'waxing', 'uploads/20240402164715.png', 'Waxing'),
(10, 'bridal_makeup', 'uploads/20240402164811.png', 'Bridal Makeup'),
(11, 'threading', 'uploads/20240402183206.jpg', 'Threading');

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
(8, 'Site', 'Admin', 'Admin', 'images/default/profile.jpg', 'admin@admin.com', '1234', '', 0, '', '', '', '', '', '', '', '', 'Admin', 'Active'),
(30, 'priya', 'n', 'priya', 'images/default/profile.jpg', 'priya@gmail.com', '1234', '', 0, '', '', '545478785457', 'chennai', 'chennai', 'chennai', 'chennai', '5454', 'Owner', 'Active'),
(31, 'Diya', 'Shree', 'diya', 'images/default/profile.jpg', 'diya@gmail.com', '1234', '30', 21, '', '', '789456456', 'chennai', 'chennai', 'chennai', 'chennai', '656', 'Staff', 'Reset'),
(32, 'Fathima', '', 'fathima', 'images/default/profile.jpg', 'fathima@gmail.com', '1234', '30', 21, '', '', '7894533652', 'chennai', 'chennai', 'chennai', 'chennai', '54', 'Staff', 'Reset'),
(33, 'Loki', '', 'loki', 'images/default/profile.jpg', 'loki@gmail.com', '1234', '30', 21, '', '', '87878787874', 'chennai', 'chennai', 'chennai', 'chennai', '745', 'Staff', 'Reset'),
(34, 'Guvi', '', 'guvi', 'images/default/profile.jpg', 'guvi@gmail.com', '1234', '30', 21, '', '', '7855666254', 'chennai', 'chennai', 'chennai', 'chennai', '5', 'Staff', 'Reset'),
(35, 'Preethi', '', 'preethi', 'images/default/profile.jpg', 'preethi@gmail.com', '1234', '30', 21, '', '', '7899556455', 'chennai', 'chennai', 'chennai', 'chennai', '65', 'Staff', 'Reset'),
(36, 'Keerthi', '', 'keerthi', 'images/default/profile.jpg', 'keerthi@gmail.com', '1234', '30', 21, '', '', '7899456665', 'chennai', 'chennai', 'chennai', 'chennai', '654', 'Staff', 'Reset'),
(37, 'Sharmi', '', 'sharmi', 'images/default/profile.jpg', 'sharmi@gmail.com', '1234', '30', 21, '', '', '65454548454', 'chennai', 'chennai', 'chennai', 'chennai', '4', 'Staff', 'Reset'),
(38, 'Nikitha', '', 'niki', 'images/default/profile.jpg', 'nikitha@gmail.com', '1234', '30', 21, '', '', '6544545454', 'chennai', 'chennai', 'chennai', 'chennai', '656', 'Staff', 'Reset'),
(39, 'fida', 's', 'fida', 'images/default/profile.jpg', 'fida@gmail.com', '1234', '', 0, '', '', '8646656125', 'chennai', 'chennai', 'chennai', 'chennai', '5656', 'Owner', 'Active'),
(40, 'gita', 'm', 'gita', 'images/default/profile.jpg', 'gita@gmail.com', '1234', '', 0, '', '', '656335656', 'ch', 'ch', 'ch', 'ch', '32', 'Owner', 'Active'),
(41, 'jo', 'j', 'jp', 'images/default/profile.jpg', 'jo@gmail.com', '1234', '', 0, '', '', '542', 'cg', 'cg', 'cg', 'cg', '54', 'Owner', 'Active');

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
(35, '1', '1', '12', 'home', 'Purchased', '2024-04-01 07:04:23', '2', 'Assigned', 10),
(39, '1', '1', '2', 'store', 'Purchased', '2024-04-02 11:06:23', '3', 'Paid', 0),
(40, '1', '1', '11', 'store', 'Purchased', '2024-04-02 11:06:25', '3', 'Paid', 0);

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
(28, 9, 1, 1, '', '', '', 'NA', 0, 'NA', 0),
(29, 30, 21, 1, 'hd_glow_makeup_look', 'uploads/20240402164923.jpg', 'HD Glow Makeup Look', 'NA', 0, 'Y', 899),
(30, 30, 21, 1, 'matte_makeup_look', 'uploads/20240402165001.jpg', 'Matte Makeup Look', 'NA', 0, 'Y', 500),
(31, 30, 21, 1, 'glass_skin_look', 'uploads/20240402165206.jpg', 'Glass Skin Look', 'NA', 0, 'Y', 600),
(32, 30, 21, 5, 'feather_cut', 'uploads/20240402165259.jpg', 'Feather Cut', 'Y', 800, 'Y', 500),
(33, 30, 21, 5, 'bob_cut', 'uploads/20240402172445.jpg', 'Bob Cut', 'NA', 0, 'Y', 150),
(34, 30, 21, 6, 'hair_smoothening', 'uploads/20240402181625.jpeg', 'Hair Smoothening', 'Y', 5000, 'Y', 5000),
(35, 30, 21, 8, 'nail_art', 'uploads/20240402181756.jpeg', 'Nail Art', 'NA', 0, 'Y', 40),
(36, 30, 21, 9, 'waxing', 'uploads/20240402182405.png', 'Waxing', 'Y', 500, 'Y', 200),
(37, 30, 21, 10, 'bridal_makeup_look', 'uploads/20240402182736.jpeg', 'Bridal MakeUp Look', 'Y', 10000, 'NA', 0),
(38, 30, 21, 11, 'threading', 'uploads/20240402183307.jpg', 'Threading', 'NA', 0, 'Y', 123);

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
(21, 30, 'Naturals', 876, 'naturals', 'chennai', 'cchennai', 'chennai', 'chennai', 656, 45458765464, 'uploads/banner_20240402163018.jpg', 'uploads/20240402163018.png', 'Open', 0, '2024-04-02 16:30:19'),
(22, 39, 'Prime & Polished', 78556, 'Prime & Polished', 'chennai', 'chennai', 'chennai', 'chennai', 54, 545778787, 'uploads/banner_20240402183928.jpg', 'uploads/20240402183928.png', 'Open', 0, '2024-04-02 18:39:29'),
(23, 40, 'Looks Salon', 54, 'Looks Salon', 'ch', 'ch', 'ch', 'ch', 21, 12, 'uploads/banner_20240402191926.jpg', 'uploads/20240402191926.png', 'Open', 0, '2024-04-02 19:19:26'),
(24, 41, 'Christian Dior', 4141, 'Christian Dior', 'cg', 'cg', 'cg', 'cg', 342, 54488555, 'uploads/banner_20240402193824.jpg', 'uploads/20240402193824.jpg', 'Open', 0, '2024-04-02 19:38:24');

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
(2, '1', '1', 'pay_NtEkeiHWQE6IQb', 2949, '2024-04-01 07:07:42', 'Pending'),
(3, '1', '1', 'pay_NthN4vKCaReWEd', 10973, '2024-04-02 11:07:33', 'Pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
