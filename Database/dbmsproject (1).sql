-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 09:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmsproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData` (IN `name` VARCHAR(255), IN `email` VARCHAR(255), IN `comments` VARCHAR(1000))  INSERT INTO feedback(name,email,feedback) VALUES (name, email,comments)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `created_at`) VALUES
(2, 'raghavkulkarni242000@gmail.com', '$2y$10$qE831O.4WUzle3is0iq81ejTQSBiJ1D7giXwlJAih6CFR1jAfVe2W', '2020-12-19 17:00:01'),
(3, 'Raghav Kulkarni', '$2y$10$pgPHgxP2Koqb8RZqHX9DQ.ehCuW6E64nojcRKUTKFKpEdGtnF6/sy', '2021-01-14 14:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'mobiles'),
(2, 'laptops'),
(3, 'tv'),
(4, 'camera'),
(5, 'gaming'),
(6, 'headphone'),
(7, 'speaker'),
(8, 'projector');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'Raghav', 'raghavkulkarni242000@gmail.com', 'Good'),
(3, 'Rajesh', 'raj@gmail.com', 'Very Convenient and affordable'),
(4, 'Ramesh', 'ramesh@ymail.com', 'Nice experience');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `p_id`, `p_name`, `action`, `date`) VALUES
(4, 59, 'Acer', 'INSERTED', '2021-01-15 17:47:54'),
(5, 59, 'Acer', 'UPDATED', '2021-01-15 17:48:11'),
(6, 59, 'Acer', 'DELETED', '2021-01-15 17:48:15'),
(7, 36, 'Vivo', 'UPDATED', '2021-01-15 18:21:05'),
(8, 16, 'Iphone 12', 'UPDATED', '2021-01-16 12:49:15'),
(9, 19, 'Canon DSLR', 'UPDATED', '2021-01-16 12:49:21'),
(10, 20, 'Canon DSLR', 'UPDATED', '2021-01-16 12:49:32'),
(11, 24, 'Play station 5', 'UPDATED', '2021-01-16 12:49:45'),
(12, 27, 'Sony Bravia', 'UPDATED', '2021-01-16 12:49:53'),
(13, 25, 'Poco Phone', 'UPDATED', '2021-01-16 12:50:01'),
(14, 28, 'Sony Speakers', 'UPDATED', '2021-01-16 12:50:07'),
(15, 29, 'Samsung Galaxy ', 'UPDATED', '2021-01-16 12:50:14'),
(16, 31, 'Sony Headphones', 'UPDATED', '2021-01-16 12:50:20'),
(17, 33, 'Lenovo Laptop', 'UPDATED', '2021-01-16 12:50:42'),
(18, 16, 'Iphone 12', 'DELETED', '2021-01-16 12:50:45'),
(19, 60, 'Iphone 12', 'INSERTED', '2021-01-16 12:52:12'),
(20, 34, 'Boat Headphone', 'UPDATED', '2021-01-16 13:59:06'),
(21, 35, 'Samsung TV', 'UPDATED', '2021-01-16 13:59:15'),
(22, 36, 'Vivo', 'UPDATED', '2021-01-16 13:59:26'),
(23, 37, 'HP ', 'UPDATED', '2021-01-16 13:59:35'),
(24, 38, 'Asus ROG', 'UPDATED', '2021-01-16 13:59:44'),
(25, 39, 'JBL Headphones', 'UPDATED', '2021-01-16 14:00:01'),
(26, 40, 'Apple Airpods Max', 'UPDATED', '2021-01-16 14:00:09'),
(27, 41, 'MI Smart Speaker', 'UPDATED', '2021-01-16 14:00:20'),
(28, 42, 'Philips Speaker', 'UPDATED', '2021-01-16 14:00:27'),
(29, 43, 'MI TV', 'UPDATED', '2021-01-16 14:00:36'),
(30, 44, 'LG TV', 'UPDATED', '2021-01-16 14:00:49'),
(31, 45, 'XBOX Controller', 'UPDATED', '2021-01-16 14:00:59'),
(32, 46, 'Play station Control', 'UPDATED', '2021-01-16 14:01:09'),
(33, 47, 'JBL Speaker', 'UPDATED', '2021-01-16 14:01:17'),
(34, 48, 'XBOX', 'UPDATED', '2021-01-16 14:01:27'),
(35, 51, 'Acer Aspire 5s', 'UPDATED', '2021-01-16 14:01:35'),
(36, 53, 'Samsung Galaxy', 'UPDATED', '2021-01-16 14:01:42'),
(37, 57, 'Epson Projector', 'UPDATED', '2021-01-16 14:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `due_date`, `products`, `amount_paid`) VALUES
(3, 4, 'Raghav Kulkarni', 'raghav@gmail.com', '8861537515', 'Bengaluru', 'cod', '2021-02-20', 'Play station 5(1), Samsung Galaxy (1)', '8000'),
(4, 2, 'Raghavendra H K', 'raghavkulkarni242000@gmail.com', '9986556874', 'Bengaluru', 'netbanking', '2021-03-25', 'Sony Bravia(1), Sony Speakers(1), Iphone 12(1)', '13200');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `cat_num` int(2) NOT NULL,
  `p_image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `qty`, `price`, `description`, `cat_num`, `p_image`) VALUES
(19, 'Canon DSLR', 1, 550, 'DSLR camera', 4, 'img/camera.jfif'),
(20, 'Canon DSLR', 1, 550, 'DSLR camera', 4, 'img/dslr.jpg'),
(24, 'Play station 5', 1, 4500, 'AMD RDNA 2 GPU 36 CUs @ 2.23GHz ', 5, 'img/gaming.jpg'),
(25, 'Poco Phone', 1, 1100, 'Snapdragon 845', 1, 'img/poco.jfif'),
(27, 'Sony Bravia', 1, 5700, '49 Inch 4K TV', 3, 'img/sony.jpg'),
(28, 'Sony Speakers', 1, 2500, '60W speakers', 7, 'img/speakers.png'),
(29, 'Samsung Galaxy ', 1, 3500, 'Exynos processor', 1, 'img/samsung.jfif'),
(31, 'Sony Headphones', 1, 1700, '40mm driver with full bass', 6, 'img/headphones.jpg'),
(33, 'Lenovo Laptop', 1, 2000, 'Intel i7', 2, 'img/lenovo.jfif'),
(34, 'Boat Headphone', 1, 250, 'Boat Bass headphones', 6, 'img/boat.jpg'),
(35, 'Samsung TV', 1, 3000, '43 Inch UHD TV', 3, 'img/samsung tv.webp'),
(36, 'Vivo', 1, 1150, 'Mediatek Helio G35', 1, 'img/vivo1.jpeg'),
(37, 'HP ', 1, 3000, ' Intel i5, 7th gen', 2, 'img/hp.webp'),
(38, 'Asus ROG', 1, 5000, 'intel i9, 10th gen', 2, 'img/rog.jfif'),
(39, 'JBL Headphones', 1, 500, 'Bass Headphones', 6, 'img/jblhead.jpg'),
(40, 'Apple Airpods Max', 1, 3000, '50mm driver', 6, 'img/airpodsmax.jfif'),
(41, 'MI Smart Speaker', 1, 2000, 'Smart Speaker with Alexa built in', 7, 'img/smartsp.png'),
(42, 'Philips Speaker', 1, 1500, '2.1 Speakers', 7, 'img/philipsp.jpg'),
(43, 'MI TV', 1, 2300, '43 Inch 4k TV', 3, 'img/mitv.jpg'),
(44, 'LG TV', 1, 2500, '43 Inch 4k TV', 3, 'img/lgtv.jpg'),
(45, 'XBOX Controller', 1, 500, 'microsoft gaming controller', 5, 'img/xboxc.jpg'),
(46, 'Play station Controller', 1, 500, 'Sony Gaming Controller', 5, 'img/psc.jpg'),
(47, 'JBL Speaker', 1, 1200, 'Computer Speakers', 7, 'img/jbl.webp'),
(48, 'XBOX', 1, 4500, '3.2 GHz IBM PowerPC tri-core CPU', 5, 'img/xbox2.jfif'),
(51, 'Acer Aspire 5s', 1, 5000, 'Intel i5', 2, 'img/ac.webp'),
(53, 'Samsung Galaxy', 1, 4000, 'Snapdragon 855', 1, 'img/sam.jfif'),
(57, 'Epson Projector', 1, 5000, '4K projector', 8, 'img/projector.jpg'),
(60, 'Iphone 12', 1, 5000, 'Apple Bionic chipset', 1, 'img/i.jfif');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `deletelog` AFTER DELETE ON `products` FOR EACH ROW INSERT INTO logs VALUES(null,OLD.p_id,OLD.p_name,'DELETED',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlog` AFTER INSERT ON `products` FOR EACH ROW INSERT INTO logs VALUES (null, NEW.p_id,NEW.p_name,'INSERTED',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `products` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.p_id,NEW.p_name,'UPDATED',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Raghavendra', '$2y$10$S/p87OZaR.mZiqzMk1O/r.1h/hIbG6CYwDRZEyyl0cCKqU3ZO.Mte', '2020-12-15 00:02:02'),
(2, 'Raghavendra H K', '$2y$10$3hFbneE4HEJNjgMqPiL3fOkhgELRIoSVaLanTE07BN0MX.irMl2U2', '2020-12-15 00:10:49'),
(4, 'Raghav Kulkarni', '$2y$10$cWD.bozqKFmgq43SYSxJDehMO6oVh6dNTIEfghb7IBP9cAYfzmWNq', '2020-12-15 20:14:20'),
(5, 'hitman5545', '$2y$10$vrT7vMJYkFcioxURqQLU8OBpEHwM5sSKsTn4aYDq.SmiV0N6mNUhW', '2020-12-16 19:38:17'),
(6, 'chetan', '$2y$10$.cYiQyKm57UeTnzQhDs7xuOfsKD0cSM4LH0.2ne0txYBCrtN7Yel.', '2021-01-03 15:38:10'),
(7, 'kashyap', '$2y$10$//zGkg4rEe3m65XCtyAkgOnlCBHb4L/Uhltxz6ZxC/NM4kIWDIpe2', '2021-01-09 21:46:44'),
(8, 'Naveen', '$2y$10$q2ep58FETWs3xkGS1fcHuu2gLrbDoHddBfOZRXx6kWkmpJW7M09qK', '2021-01-09 21:52:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_num` (`cat_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk` FOREIGN KEY (`cat_num`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
