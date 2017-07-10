-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 06:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebacon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacon_categories`
--

CREATE TABLE `bacon_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bacon_customers`
--

CREATE TABLE `bacon_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_username` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_email_address` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact_number` int(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_customers`
--

INSERT INTO `bacon_customers` (`customer_id`, `customer_name`, `customer_username`, `customer_password`, `customer_email_address`, `customer_address`, `customer_contact_number`, `role_id`) VALUES
(1, 'Mark Marasigan', 'kramlivingstone', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'kramlivingstone@yahoo.com.ph', 'Pasay City', 8898759, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bacon_orders`
--

CREATE TABLE `bacon_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `required_date` datetime NOT NULL,
  `date_shipped` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_comment` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bacon_order_details`
--

CREATE TABLE `bacon_order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price_each` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bacon_products`
--

CREATE TABLE `bacon_products` (
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_category_id` int(255) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_products`
--

INSERT INTO `bacon_products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_category_id`, `status_id`) VALUES
(000001, 'Big Hero 6 T-Shirt', 'Big Hero Six', '../img/bighero6.jpg', '400', 0, 1),
(000002, 'Cool Daddy T-Shirt', 'Cool Shirt', '../img/cooldaddy.jpg', '400', 1, 1),
(000003, 'Football Shirt', 'Football Shirt', '../img/football.jpg', '400', 1, 1),
(000004, 'Football Heartbeat Shirt', 'Test Descriptiopn', '../img/footballbeat.jpg', '400', 1, 1),
(000005, 'Goalkeeper Shirt', 'Test Description', '../img/goalkeeper.jpg', '400', 1, 1),
(000006, 'Popeye', 'Popeye', '../img/popeye.jpg', '400', 1, 1),
(000007, 'Run T-Shirt', 'Run Shirt', '../img/run.jpg', '400', 1, 1),
(000008, 'Test', 'test', '', '400', 1, 2),
(000009, 'Shades and Shakas T-Shirt', 'Test Description', '../img/shadesnshakas.jpg', '400', 0, 1),
(000010, 'Surf T-Shirt', 'Test Description', '../img/surf.jpg', '400', 1, 1),
(000011, 'Test', 'test', '', '400', 1, 2),
(000012, 'Test 2', 'Test Description', '', '400', 1, 2),
(000013, 'Test 3', 'test', '', '400', 1, 2),
(000014, 'Test 4', 'test 4', '', '400', 1, 2),
(000015, 'Test 5', 'test', '', '400', 1, 2),
(000016, 'Test', 'test', '', '400', 1, 2),
(000017, 'Test', 'test', '', '400', 1, 2),
(000018, 'Last Test', 'Test', '../img/15390879_10202584028399082_9201180596158742948_n.jpg', '400', 1, 2),
(000019, 'Test', 'test', '', '400', 1, 2),
(000020, 'Test', 'test', '', '400', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bacon_role`
--

CREATE TABLE `bacon_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_role`
--

INSERT INTO `bacon_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `bacon_sizes`
--

CREATE TABLE `bacon_sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_abbreviation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_sizes`
--

INSERT INTO `bacon_sizes` (`size_id`, `size_name`, `size_abbreviation`) VALUES
(1, 'Extra Small', 'XS'),
(2, 'Small', 'S'),
(3, 'Medium', 'M'),
(4, 'Large', 'L'),
(5, 'Extra Large', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `bacon_status`
--

CREATE TABLE `bacon_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_status`
--

INSERT INTO `bacon_status` (`status_id`, `status_name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `bacon_users`
--

CREATE TABLE `bacon_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacon_users`
--

INSERT INTO `bacon_users` (`user_id`, `username`, `password`, `email`, `full_name`, `role_id`, `status_id`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'email', 'Administrator', 1, 1),
(3, 'markmarasigan', 'c242e1253737a872dec5b6bf0e9a5a8a4cf53b88', 'kramlivingstone@yahoo.com.ph', 'Mark Marasigan', 1, 1),
(4, 'anntaba', '09d8e14fb117cf25f4aa823fb28ea7328f197cd6', 'test@thebacon.com', 'Maryann Adaya', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacon_categories`
--
ALTER TABLE `bacon_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `bacon_customers`
--
ALTER TABLE `bacon_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `bacon_orders`
--
ALTER TABLE `bacon_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `bacon_products`
--
ALTER TABLE `bacon_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bacon_role`
--
ALTER TABLE `bacon_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `bacon_sizes`
--
ALTER TABLE `bacon_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `bacon_status`
--
ALTER TABLE `bacon_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `bacon_users`
--
ALTER TABLE `bacon_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacon_categories`
--
ALTER TABLE `bacon_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bacon_customers`
--
ALTER TABLE `bacon_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bacon_orders`
--
ALTER TABLE `bacon_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bacon_products`
--
ALTER TABLE `bacon_products`
  MODIFY `product_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `bacon_role`
--
ALTER TABLE `bacon_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bacon_sizes`
--
ALTER TABLE `bacon_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bacon_status`
--
ALTER TABLE `bacon_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bacon_users`
--
ALTER TABLE `bacon_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
