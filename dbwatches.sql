-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 08:44 PM
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
-- Database: `dbwatches`
--

-- --------------------------------------------------------

--
-- Table structure for table `buylist`
--

CREATE TABLE `buylist` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `name`, `brand`, `description`, `price`, `image`) VALUES
(1, 'Ultra-1 Series', 'Apple watches', 'It features a rugged titanium case, a larger and brighter display, and an enhanced battery life compared to standard models.', 110.00, 'applewatch1.png'),
(2, 'Ultra-2 Seris', 'Apple watch', ' enhanced water resistance, and advanced health and fitness tracking capabilities. With a long-lasting battery, precision GPS, and specialized apps for outdoor exploration, diving, and athletics,', 150.00, 'applewatch2.webp'),
(3, 'Apple watch 7', 'Applewatch', ' It\'s perfect for extreme sports, diving, and everyday use with robust health monitoring and seamless integration with the Apple ecosystem.', 200.00, 'applewatch3.jpg'),
(4, 'Series 8', 'Apple watch', 'he Apple Watch Ultra is a high-performance smartwatch built for adventurers and athletes. It boasts a durable titanium build, a bright and expansive Retina display, ', 180.00, 'applewatch4.jpg'),
(9, 'Galaxy Watch Series', 'Samsung', 'offer fitness tracking, heart rate monitoring, GPS, and smart notifications.', 199.99, 'samsung1.webp'),
(10, 'Galaxy Fit 2', 'Samsung', 'Samsung Gear S3 (Classic/Frontier), Smartwatch with Rotating Bezel', 150.00, 'samsung2.jpg'),
(11, 'Samsung Gear Fit 2 Pro', 'Samsung', ' Access to Google Play apps and services, Changeable straps and watch faces.', 220.00, 'samsung2.jpg'),
(12, 'Samsung Gear S2 ', 'Samsung', ' Large curved display, 3G connectivity for calls without a phone.', 300.00, 'samsung4.webp'),
(13, 'Rolex', 'Rolex', 'offering elegant designs tailored to diverse tastes. From classic analog timepieces to modern smartwatches, ', 100.00, 'womanwatch1.webp'),
(14, 'Oyster', 'Rolex', 'Oyster, 36 mm, yellow gold and diamonds\r\n\r\nReference 128348RBR', 450.00, 'womanwacth2.avif'),
(15, 'Gucci YA125409', 'Gucci', 'Gucci YA125409 Ladies G-Gucci Rose Gold Watch', 180.00, 'womanwatch3.webp'),
(16, 'Yellow Gold G', 'Gucci', 'Yellow Gold G-Timeless Watch, 27mm | GUCCI® AE', 300.00, 'womanwatch4.jpg'),
(17, 'Calatrava', 'Patek Philippe\r\n', 'Patek Philippe is a Swiss luxury watchmaker renowned for its exceptional craftsmanship, timeless designs, and technical innovation', 450.00, 'classic1.jpg'),
(18, 'Omega watch', 'Omega', 'mega is a prestigious Swiss watch brand known for its precision, innovation, and timeless designs.', 240.00, 'classic2.jpg'),
(19, 'Patrimony', 'Vacheron Constantin', 'Vacheron Constantin is one of the oldest Swiss watchmakers,', 150.00, 'classic3.jpb'),
(20, 'Classics', 'Frederique Constant', 'Elegant, affordable luxury with innovative features.', 300.00, 'classicwatch1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buylist`
--
ALTER TABLE `buylist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watch_id` (`watch_id`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buylist`
--
ALTER TABLE `buylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buylist`
--
ALTER TABLE `buylist`
  ADD CONSTRAINT `buylist_ibfk_1` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
