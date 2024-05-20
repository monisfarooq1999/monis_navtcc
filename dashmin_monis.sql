-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashmin_monis`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL,
  `catImg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catName`, `catImg`) VALUES
(1, 'Fashion', '150x150-01.png'),
(2, 'Food', '350x150-01-2.png'),
(4, 'Marketing', '2023-toyota-prius-launched-in-japan-costs-way-less-than-the-us-variant-208059_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productqty` int(11) NOT NULL,
  `productregprice` varchar(20) NOT NULL,
  `productsaleprice` varchar(20) NOT NULL,
  `productdesc` varchar(300) NOT NULL,
  `productimg` varchar(300) NOT NULL,
  `productcatid` int(11) NOT NULL,
  `prodgallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productqty`, `productregprice`, `productsaleprice`, `productdesc`, `productimg`, `productcatid`, `prodgallery`) VALUES
(1, 'Kurta Shalwar', 11, '2000', '1900', 'Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus.', '150x150-01-1.png', 1, ''),
(2, 'Pant Shirt', 82, '5000', '2400', 'Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus.', 'WhatsApp Image 2024-05-04 at 00.11.59_c2be1f03.jpg', 2, ''),
(3, 'Kurta Shalwar 3', 23, '3000', '2900', 'Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus.', 'image2.png', 4, ''),
(4, 'Gallery Image Product', 12, '3000', '2500', 'Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus.', 'CertezaDualHeadStethoscopeCR3002_ef83087e-f586-4d5d-966e-a5cf7faebe67_1024x.jpg', 4, '[]'),
(5, 'Gallery Image Product Test', 12, '3000', '2500', 'Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus.', 'qrCode.png', 1, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `reviewid` int(11) NOT NULL,
  `fromname` varchar(50) NOT NULL,
  `fromemail` varchar(75) NOT NULL,
  `review` varchar(400) NOT NULL,
  `reviewrating` int(11) NOT NULL,
  `prodfor` int(11) NOT NULL,
  `fromuserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`reviewid`, `fromname`, `fromemail`, `review`, `reviewrating`, `prodfor`, `fromuserid`) VALUES
(2, 'Monis Farooq', 'farooq.ayubie@gmail.com', ' Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos ', 5, 2, 1),
(4, 'Monis Farooq Ayubi', 'monis@monis.com', ' Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos ', 5, 1, 12),
(5, 'Farooq Sethi', 'farooqsethi@gmail.com', ' Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. ', 5, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userphone` varchar(13) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `userrole` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `useremail`, `userphone`, `userpass`, `userrole`) VALUES
(1, 'Monis', 'Farooq', 'farooq.ayubie@gmail.com', '03412105345', '$2y$10$GqTuLilyRftuUAJSA9ZdLeqYvzvrK4F2vwHhhT2M6K5l.oWobJPIO', 'superadmin'),
(2, 'Farooq', 'Sethi', 'farooqsethi21@gmail.com', '1231212321321', '$2y$10$1lEnn9xEGwxf/MZP0JDfK.8WgntAHTI2BZNhzHhD7n0M6KcGQGoP.', 'customer'),
(7, 'Arham', 'Sethi', 'areham@arem.com', '1231212321321', '$2y$10$lzmIRfk15xJz2QBt6QOs9OwBZVpujjYMsOPyNy863hWaSyo1C/C3a', 'shop_manager'),
(8, 'Siddiq', 'Sethi', 'aslkdj@agkl.com', '1231212321321', '$2y$10$Gu4MWtbm89MhMJuxTSbkg.FRCY7Cj9jlvUf/.vaVh0xxVAAJ6BGJW', 'sales_person'),
(9, 'Ahmed', 'Sethi', 'admin@madin.com', '1231212321321', '$2y$10$IRk8VuXA1NSnEkz2qF8xEuftHNUmUzGc.7gzuQj11iQFSXRIUqxQG', 'admin'),
(10, 'Siddiq', 'Hash Dashboard', 'hashdashboard@gmail.com', '123123123', '$2y$10$XT0lHfXL5APwJd81CnIo.OJexT7bqOxw2PLEU5s6mHwV/EOaRiBYC', 'shop_manager'),
(11, '123', '123', '123@com', '123', '$2y$10$e0n/XcWpsramV9lom1Fx1umC1b7Aga0UKVEmbXWkHV3dheeaBYMiC', 'customer'),
(12, 'Guest', 'Customer', 'guestcustomer@monis.com', '123123123', '123', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `roleid` int(11) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `roleaccess` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`roleid`, `roles`, `roleaccess`) VALUES
(1, 'Customer', 'customer'),
(2, 'Shop Manager', 'store_manager'),
(3, 'Counter Agent', 'sales_agent'),
(4, 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `productcatid` (`productcatid`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `prodfor` (`prodfor`),
  ADD KEY `userid` (`fromuserid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`productcatid`) REFERENCES `categories` (`catid`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`prodfor`) REFERENCES `products` (`productid`),
  ADD CONSTRAINT `product_review_ibfk_2` FOREIGN KEY (`fromuserid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
