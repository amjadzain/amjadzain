-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 أكتوبر 2019 الساعة 10:27
-- إصدار الخادم: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Motorola'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- بنية الجدول `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_id`) VALUES
(1, 'Samsung Galaxy A9', 1),
(2, 'Samsung Galaxy S7', 1),
(3, 'Samsung Galaxy S6 edge', 1),
(4, 'Xperia Z5 Premium', 2),
(5, 'Xperia M5 Dual', 2),
(6, 'Xperia C5 uplta', 2),
(7, 'Moto G Turbo', 3),
(8, 'Moto X Force', 3),
(9, 'Redmi 3 Pro', 4),
(10, 'Mi 5', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `parent_category_id`) VALUES
(2, 'Chemicals', 0),
(3, 'Inorganic chemicals', 2),
(4, 'Organic Chemicals', 2),
(5, 'Electronics', 0),
(6, 'Laptop', 5),
(7, 'Dell', 6),
(8, 'i3 Processor', 7),
(9, 'i5 Processors', 7),
(10, 'i7 Processors', 7),
(11, 'HP', 6),
(12, 'Acer', 6),
(13, 'Engineering', 0),
(14, 'Civil', 13);

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userProfession` varchar(50) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `test_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userProfession`, `userPic`, `test_dt`) VALUES
(1, 'Amjad', 'Software Engineer', '275123.jpg', '2019-09-01 12:10:38'),
(2, 'Ahmad', 'Computer Engineer', '807186.jpg', '2019-09-05 20:10:38'),
(3, 'Wasan', 'Computer Science', '482161.jpg', '2019-09-09 10:10:38'),
(4, 'Shatha', 'CIS', '406718.jpg', '2019-09-17 21:10:38');

-- --------------------------------------------------------

--
-- بنية الجدول `testtable`
--

CREATE TABLE `testtable` (
  `test_ID` int(11) NOT NULL,
  `test_Name` varchar(100) NOT NULL,
  `test_DT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `test_Desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `testtable`
--

INSERT INTO `testtable` (`test_ID`, `test_Name`, `test_DT`, `test_Desc`) VALUES
(1, 'John', '2019-08-02 09:37:22', 'Doe'),
(2, 'Lory', '2019-08-02 10:58:50', 'Sebastian'),
(3, 'Amjad', '2019-08-03 12:17:52', 'Jamal'),
(4, 'RoRo', '2019-08-03 12:19:06', 'Mijo'),
(5, 'Jihan', '2019-08-03 16:09:02', 'Beben'),
(6, 'gogo', '2019-08-03 16:10:03', 'jiji'),
(7, 'tulip', '2019-08-03 16:10:34', 'sibahi'),
(8, 'Jihan', '2019-08-16 22:49:17', 'Beben');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$tiMS2takQBQwSGwaDxSGNO2RiitS/GhvWjKpJA/JKIMDeLr2z7SLm'),
(2, 'email123@email.com', '$2y$10$9OOFy5W.Vz0VapyS5U.ZqujRiXnklh48Nhc3qGfdSKxLbXRH3i87m'),
(3, 'amjad@email.com', '$2y$10$KGeRW.AZxxGdMmRMFRd4C.StpVMxaRqc4MYpKzhLDnPynE6VKRKgq'),
(4, 'soso@yahoo.com', '$2y$10$mixDl5Ysc4UGasVtqY7hAOpQix6B90zFogWi/M0InahJkLFjI3p.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `testtable`
--
ALTER TABLE `testtable`
  ADD PRIMARY KEY (`test_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testtable`
--
ALTER TABLE `testtable`
  MODIFY `test_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
