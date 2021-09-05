-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 01:10 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`email`, `password`, `time`) VALUES
('abisheksai@gmail.com', 'd4eb5147bd700a089d765d3758607363', '2017-01-22 19:03:44'),
('yeshwanthgunasekaran@gmail.com', 'dad4f20e0569f7dbe51a2b9b549a3195', '2017-01-22 19:37:31'),
('yeshwanth_93@yahoo.com', '9c7c0d68b95acd1eda85105f57aa459c', '2017-01-19 21:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(128) NOT NULL,
  `items` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category` varchar(128) NOT NULL,
  `sub_category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`, `sub_category`) VALUES
('Biryani rice', 'Broken rice'),
('Biryani rice', 'Full rice'),
('Biryani rice', 'Seeraga Samba'),
('Boiled rice', 'Ponni B.P.T'),
('Boiled rice', 'Sona (Karnataka)'),
('Boiled rice', 'White ponni'),
('Kerala rice (Rosekar)', 'ignore'),
('Organic rice', 'ignore'),
('Raw rice', 'Broken rice'),
('Raw rice', 'P.L Raw rice (Maavu)'),
('Raw rice', 'Pongal rice (Seasonal)'),
('Raw rice', 'Sona Ponni'),
('Steam rice', 'Broken rice'),
('Steam rice', 'Sona ponni'),
('Tiffin rice', 'ADT-36'),
('Tiffin rice', 'Idly rice'),
('Tiffin rice', 'Puttu rice');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `items` varchar(1024) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` int(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` int(6) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `items`, `payment_type`, `time`, `cost`, `phone`, `address`, `pincode`, `status`) VALUES
(29, 'yeshwanth', 'yeshwanth_93@yahoo.com', '["1","2"]', 'COD', '2017-01-15 01:41:07', 2500, '9003196365', 'C-38 Sunny vale apartments 351-353\r\nKonnur High road, Ayanavaram\r\nChennai, Tamil Nadu. India', 76010, 3),
(30, 'hemanth', 'yeshwanth_93@yahoo.com', '["2","3","2","2","2","2","2","2","2","2"]', 'COD', '2017-01-15 02:13:12', 12560, '9003196365', '105 E Mitchell street\r\nApt 136', 76010, 1),
(31, 'yeshwanth', 'yeshwanth_93@yahoo.com', '[1,1,1,1,1]', 'COD', '2017-01-15 23:40:47', 6050, '9003196365', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai, Tamil Nadu. India', 76010, 0),
(33, 'yeshwanth', 'yeshwanth_93@yahoo.com', '["2"]', 'COD', '2017-01-16 18:19:17', 1300, '9003196365', 'C-38 Sunny vale apartments 351-353\r\nKonnur High road, Ayanavaram\r\nChennai, Tamil Nadu. India', 76010, 2),
(34, 'yeshwanth', 'yeshwanth_93@yahoo.com', '[1]', 'COD', '2017-01-19 01:24:14', 1250, '9003196365', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai.', 76010, 0),
(35, 'yeshwanth', 'yeshwanth_93@yahoo.com', '["6"]', 'COD', '2017-01-19 07:13:17', 2462, '9003196365', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai.', 76010, 1),
(36, 'UniVErsity of texas at arlington', 'yeshwanth_93@yahoo.com', '["2"]', 'COD', '2017-01-22 19:35:37', 1330, '9003196365', '701 S Nedderman Dr, Arlington', 600023, 0),
(37, 'UniVErsity of texas at arlington', 'yeshwanth_93@yahoo.com', '["2"]', 'COD', '2017-01-22 19:36:16', 1330, '9003196365', '701 S Nedderman Dr, Arlington', 600023, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `pincode` int(6) NOT NULL,
  `cost` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`pincode`, `cost`) VALUES
(76010, 50),
(600023, 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `category` varchar(128) NOT NULL,
  `sub_category` varchar(128) NOT NULL,
  `old_price` int(10) NOT NULL,
  `new_price` int(10) NOT NULL,
  `new_product` tinyint(1) NOT NULL,
  `featured_product` tinyint(1) NOT NULL,
  `quantity` int(5) NOT NULL,
  `popularity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `category`, `sub_category`, `old_price`, `new_price`, `new_product`, `featured_product`, `quantity`, `popularity`) VALUES
(1, 'Chennai Gate', 'SLM gold is a Premium quality rice available in 10kg and 25kg bags.', 'Steam rice', 'Broken rice', 1200, 1230, 0, 1, 25, 6),
(2, 'SLM Gold-Five star', 'SLM gold is a Premium quality rice available in 10kg and 25kg bags.', 'Organic rice', 'ignore', 1200, 1230, 0, 1, 25, 6),
(3, 'Classic Supreme', 'Classic Supreme is a Premium quality rice available in 10kg and 25kg bags.', 'Raw rice', 'Broken rice', 1260, 1275, 1, 1, 25, 6),
(4, 'India Gate - Classic', 'India gate-classic is a Premium quality rice available in 10kg and 25kg bags.', 'Biryani rice', 'Full rice', 1275, 1260, 1, 1, 25, 9),
(5, 'India Gate-super', 'India Gate-super Premium quality rice available in 10kg and 25kg bags.', 'Kerala rice (Rosekar)', 'ignore', 1270, 1275, 1, 1, 25, 7),
(6, 'rice1', 'sadbdsmfjvdasfhbnf', 'Kerala rice (Rosekar)', 'ignore', 2244, 2412, 1, 1, 75, 0),
(13, 'gnchn', 'gnghfg', 'Tiffin rice', 'Idly rice', 424524, 5245, 1, 0, 100, 9);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `query` varchar(2000) NOT NULL,
  `replied` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email`, `query`, `replied`, `time`) VALUES
(1, 'yeshwanth', 'yeshwanth_93@yahoo.com', 'sfsfasdfdasf', 0, '2017-01-19 02:14:58'),
(2, 'yeshwanth', 'yeshwanth_93@yahoo.com', 'sfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasfsfsfasdfdasf', 0, '2017-01-19 02:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `order_id` int(10) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `add_pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `phone`, `password`, `address`, `add_pincode`) VALUES
('abisheksai@gmail.com', 'abishek', '9600055333', '96120d0d542e8996907b1651d231737a', 'korattur', 600076),
('yeshwanthgunasekaran@gmail.com', 'yeshwanth', '9003196365', '9c7c0d68b95acd1eda85105f57aa459c', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai, Tamil Nadu. India', 600023),
('yeshwanth_1993@yahoo.com', 'yeshwanth', '9003196365', '9c7c0d68b95acd1eda85105f57aa459c', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai, Tamil Nadu. India', 600023),
('yeshwanth_93@yahoo.com', 'yeshwanth', '9003196365', '9c7c0d68b95acd1eda85105f57aa459c', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai.', 600023),
('yeshwanth_93@yahoo.comq', 'yeshwanth', '9003196365', '93122a9e4abcba124d5a7d4beaba3f89', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai, Tamil Nadu. India', 600023),
('yeshwdfanth_93@yahoo.com', 'yeshwanth', '9003196365', '9c7c0d68b95acd1eda85105f57aa459c', 'C-38 Sunny vale apartments 351-353, Konnur High road, Ayanavaram, Chennai, Tamil Nadu. India', 600023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category`,`sub_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`email`,`pincode`),
  ADD KEY `email` (`email`),
  ADD KEY `orders_ibfk_1` (`pincode`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`pincode`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`,`category`,`sub_category`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pincode`) REFERENCES `pin` (`pincode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
