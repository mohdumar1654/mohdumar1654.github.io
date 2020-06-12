-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2020 at 04:28 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `brand` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `size` varchar(5) NOT NULL,
  `tags` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`brand`, `color`, `size`, `tags`) VALUES
('', '', '', 'Backpack'),
('', 'Black', 'XS', 'Dresses'),
('Calvin Klein', 'Red', 'L', 'Towel'),
('Diesel', 'Green', '', 'Shoes'),
('Polo', 'Violet', '', 'Coat'),
('Tommy Hilfiger', 'Blue', 'S', 'Trousers'),
('Vero Moda', 'Yellow', 'M', 'Men\'s Hat');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sku` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sale_price` int(20) NOT NULL,
  `brand` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `original_price` int(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `tags` varchar(20) NOT NULL,
  `flag` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sku`, `name`, `sale_price`, `brand`, `category`, `size`, `color`, `quantity`, `original_price`, `image`, `tags`, `flag`, `rating`) VALUES
(101, 'Cotton towel\'s', 700, 'Diesel', 'Men', 'M', 'Red', 4, 900, 'towel1.jpg', 'Towel', 0, 5),
(102, 'Sport Shoe', 500, 'Diesel', 'Women', 'XS', 'Yellow', 2, 750, 'shoeyellow2.jpg', 'Shoes', 0, 2),
(103, 'Solid Jacket', 1100, 'Tommy Hilfiger', 'Men', 'L', 'Yellow', 2, 1150, 'coatyellow1.jpg', 'Coat', 0, 3),
(104, 'Cotton Dress', 1000, 'Calvin Klein', 'Kids', 'S', 'Red', 2, 1100, 'dressred1.jpg', 'Dresses', 0, 1),
(105, 'Trouser', 3000, 'Polo', 'Women', 'L', 'Blue', 6, 3200, 'trouser1.jpg', 'Trousers', 0, 4),
(106, 'Men\'s camper Hat', 1300, 'Tommy Hilfiger', 'Men', 'L', 'Blue', 4, 1020, 'hatblue1.jpg', 'Mens Hat', 0, 3),
(107, 'Heavy Foam Jacket', 2323, 'Tommy Hilfiger', 'Men', 'S', 'Yellow', 2, 2626, 'bagyellow1.jpg', 'Backpack', 0, 5),
(108, 'Pullover', 2800, 'Calvin Klein', 'Women', 'M', 'Yellow', 12, 3100, 'banner-2.jpg', 'Coat', 0, 1),
(109, 'Kids Towel', 1500, 'Polo', 'Kids', 'M', 'White', 2, 2200, 'towel2.jpg', 'Towel', 0, 2),
(110, 'Mens Denim Jacket', 1700, 'Diesel', 'Men', 'XXL', 'Pink', 2, 3000, 'coat2.jpg', 'Coat', 0, 4),
(111, 'Jogger Shoe', 2500, 'Calvin Klein', 'Women', 'M', 'Purple', 2, 3000, 'shoe2.jpg', 'Shoes', 0, 3),
(112, 'Kid Pullover', 2100, 'Polo', 'Kids', 'XS', 'Yellow', 20, 2400, 'banner-3.jpg', 'Coat', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`) VALUES
(1, 'umar', '1234', 'admin', 'umar@company.com'),
(2, 'shadab', '1234', 'user', 'shadab@company.com'),
(3, 'armaan', '1234', 'admin', 'armaan@bbd.com'),
(6, 'John', 'Doe', 'user', 'john@deere.com'),
(7, 'sanjay', '1234', 'user', 'sanjay@abc.com'),
(8, 'shadab', '4545', 'user', 'shadab@example.com'),
(9, 'manisha', '232335', 'admin', 'manisha @php.com'),
(11, 'Rick', '1234', 'user', 'rickylaal@kaalbinkalen.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD UNIQUE KEY `brand` (`brand`,`color`,`size`),
  ADD UNIQUE KEY `brand_2` (`brand`,`color`,`size`),
  ADD KEY `brand_3` (`brand`,`color`,`size`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
