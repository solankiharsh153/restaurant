-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 01:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(3, 'Harsh Solanki', '   harsh1533', '202cb962ac59075b964b07152d234b70'),
(8, 'Karan Doshi', 'Karan8663', 'df8ba7a7260cbbe18e4eb806bcaf1f29'),
(9, 'Demo', 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(12, 'Pizza', 'Food_Category_138.jpg', 'Yes', 'Yes'),
(15, 'Momos', 'Food_Category_810.jpg', 'Yes', 'Yes'),
(16, 'Burger', 'Food_Category_779.jpg', 'Yes', 'Yes'),
(17, 'Mojito', 'Food_Category_413.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `first_name`, `last_name`, `email`, `mobile`, `msg`) VALUES
(6, 'Harsh', 'Solanki', 'harshsolanki5000@gmail.com', 2147483647, 'wer'),
(7, 'Harsh', 'Solanki', 'harshsolanki5000@gmail.com', 2147483647, 'wer'),
(8, 'Harsh', 'Solanki', 'harshsolanki5000@gmail.com', 2147483647, 'wer'),
(9, 'Harsh', 'Solanki', 'harshsolanki5000@gmail.com', 2147483647, 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(10, 'Mexican Pizza', '  Pepper, chilli.  ', 199.00, 'Food_Name_7318.avif', 12, 'Yes', 'Yes'),
(15, 'Burgir', '          Double Cheese          ', 399.00, 'Food_Name_7517.avif', 16, 'Yes', 'Yes'),
(16, 'Peri Peri', ' Spicy ', 999.00, 'Food_Name_6057.avif', 16, 'Yes', 'Yes'),
(17, 'Gravy Momos', 'Hot & Spicy', 149.00, 'Food_Name_5539.jpg', 15, 'Yes', 'Yes'),
(21, 'Virgin Mojito', 'refreshing, tart, lightly sweet,', 149.00, 'Food_Name_3285.jpg', 17, 'Yes', 'Yes'),
(22, 'Tandoori Momos', ' Momos coated in tandoori paste ', 249.00, 'Food_Name_8733.jpeg', 15, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(4, 'Peri Peri', 999.00, 6, 5994.00, '2023-08-04 05:52:26', 'Delivered', 'Maisie Kennedy', '+1 (789) 798-5574', 'risowi@mailinator.com', '   Blanko '),
(5, 'Mexican Pizza', 199.00, 4, 398.00, '2023-08-04 06:03:44', 'Delivered', 'Harsh Solanki', '6351261615', 'harshsolanki5000@gmail.com', '  123, Queensland'),
(6, 'Gravy Momos', 149.00, 25, 3725.00, '2023-08-05 07:06:18', 'Delivered', 'Joelle Lott', '+1 (755) 529-5075', 'bazacabob@mailinator.com', ' Sit alias deleniti  '),
(7, 'Mexican Pizza', 199.00, 5, 995.00, '2023-08-05 07:07:09', 'Delivered', 'Orlando Conrad', '+1 (734) 925-1272', 'ryjewyt@mailinator.com', ' Sunt dolores nulla q '),
(8, 'Peri Peri', 999.00, 20, 19980.00, '2023-08-05 07:07:37', 'Delivered', 'Ayanna Valdez', '+1 (536) 345-2459', 'duco@mailinator.com', ' Sunt nihil veniam o '),
(9, 'Virgin Mojito', 149.00, 12, 1788.00, '2023-08-05 07:10:36', 'Delivered', 'Cameran Kane', '+1 (401) 312-9551', 'xilizad@mailinator.com', ' Eveniet ut eum null ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
