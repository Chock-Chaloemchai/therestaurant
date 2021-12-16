-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 11:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `therestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `catPic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catPic`) VALUES
(1, 'รายการทอด', 'catimg2.jpg'),
(2, 'รายการผัด', 'catimg1.jpg'),
(3, 'เครื่องดื่ม', 'catimg3.jpg'),
(14, 'ก๋วยเตี๊ยว', 'ร้านก๋วยเตี๋ยวเรือลุงจุนขายสูตรลับระดับตำนาน-สร้างอาชีพให้รวยรุ่นสู่รุ่น.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cust_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(2) NOT NULL,
  `report_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `cust_id`, `status_id`, `report_id`) VALUES
(1, '2020-11-24 15:26:16', '13', 0, '2011-24-0000'),
(2, '2020-11-24 15:27:19', '13', 1, '2011-24-0001'),
(3, '2020-11-24 15:39:20', '13', 1, '2011-24-0002'),
(4, '2020-11-24 15:40:14', '15', 1, '2011-24-0003'),
(5, '2020-11-24 15:42:49', '13', 1, '2011-24-0004'),
(6, '2020-11-24 15:43:44', '13', 1, '2011-24-0005');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_process_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`, `status_process_id`) VALUES
(1, 1, '45.00', 1, 1, 0),
(2, 1, '50.00', 2, 1, 0),
(3, 1, '45.00', 1, 2, 0),
(4, 1, '50.00', 2, 2, 0),
(5, 2, '35.00', 5, 3, 0),
(6, 1, '35.00', 7, 4, 0),
(7, 1, '45.00', 1, 5, 0),
(8, 1, '50.00', 2, 5, 0),
(9, 1, '45.00', 1, 6, 0),
(10, 1, '50.00', 2, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `catId` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`, `qty`, `catId`, `dateadd`, `status_id`) VALUES
(1, '1', 'ผัดกระเพรา', 'หมู , ทะเล , เนื้อ , ไก่', '03_413485.jpg', '45.00', 385, '2', '2020-11-24 08:43:44', 0),
(2, '2', 'ข้าวผัด', 'หมู , ทะเล , เนื้อ , ไก่', 'RBS31728010.jpg', '50.00', 386, '2', '2020-11-24 08:43:44', 0),
(5, 'P3', 'เฟรนฟราย', 'เฟราฟรานทอด', 'download.jpg', '35.00', -6, '1', '2020-11-24 08:39:20', 0),
(6, '03', 'ก๋วยเตี๊ยวเรือ', 'ก๋วยเตี๊ยวเรือ', 'download (1).jpg', '50.00', -2, '14', '2020-11-03 04:40:21', 0),
(7, 'P4', 'tester', 'tester', '122810772_389214879094088_3808334803476836030_n.jpg', '35.00', -1, '14', '2020-11-24 08:40:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_cash`
--

CREATE TABLE `status_cash` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_cash`
--

INSERT INTO `status_cash` (`status_id`, `status_name`, `color`) VALUES
(0, 'ยังไม่ได้ชำระ', '#FF6666'),
(1, 'ชำระเงินแล้ว', '#FF9966');

-- --------------------------------------------------------

--
-- Table structure for table `tbltable`
--

CREATE TABLE `tbltable` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbltable`
--

INSERT INTO `tbltable` (`id`, `name`, `status_id`, `dateadd`) VALUES
(1, 1, 0, '2020-11-24 08:28:18'),
(2, 2, 1, '2020-11-24 08:50:28'),
(3, 3, 1, '2020-11-24 08:50:26'),
(4, 4, 1, '2020-11-24 08:50:24'),
(5, 5, 1, '2020-11-24 08:50:21'),
(6, 6, 0, '2020-11-24 08:28:18'),
(7, 7, 0, '2020-11-24 08:28:18'),
(8, 8, 0, '2020-11-24 08:28:18'),
(9, 9, 0, '2020-11-24 08:28:18'),
(10, 10, 0, '2020-11-24 08:28:18'),
(11, 11, 0, '2020-11-24 08:28:18'),
(12, 12, 0, '2020-11-24 08:28:18'),
(13, 13, 2, '2020-11-24 08:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinces_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `amphures_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `districts_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `custTel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(10) NOT NULL,
  `userscoin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `username`, `useremail`, `provinces_id`, `amphures_id`, `districts_id`, `custTel`, `password`, `regdate`, `role_id`, `userscoin`) VALUES
(2, 'test', 'noppakunp', 'natee@gmail.com', '17', '204', '260307', '', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-02 13:02:40', 0, 50000),
(4, 'admin', 'admin', 'admin@akara.co.th', '17', '204', '260307', '', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-25 06:08:53', 1, 12500),
(23, 'testadd', 'testadd', 'testadd@gmail.com', '1', '2', '100203', '', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-02 13:05:13', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_cash`
--
ALTER TABLE `status_cash`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbltable`
--
ALTER TABLE `tbltable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_cash`
--
ALTER TABLE `status_cash`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltable`
--
ALTER TABLE `tbltable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
