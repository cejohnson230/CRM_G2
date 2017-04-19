-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 06:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `street_address` varchar(45) DEFAULT NULL,
  `address_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `apt_number` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `zip4` int(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `address_type` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`street_address`, `address_id`, `customer_id`, `apt_number`, `city`, `state`, `zip`, `zip4`, `country`, `address_type`) VALUES
('Ap #865-7024 Tellus St.', 3000, 1, 865, 'Vienna', 'AL', 7800, 7581, 'US', 'HOME'),
('4691 Sed St.', 3001, 2, NULL, 'Lauco', 'AK', 8043, 1925, 'US', 'BUSINESS '),
('9352 Nunc Road', 3002, 3, NULL, 'Lustenau', 'GA', 5445, 3705, 'US', 'HOME'),
('P.O. Box 548, 2270 Non, Rd.', 3003, 4, NULL, 'Quesada', 'GA', 2206, 9112, 'US', 'HOME'),
('P.O. Box 981, 3852 Scelerisque Rd.', 3004, 5, NULL, 'Manfredonia', 'GA', 8782, 5169, 'US', 'BUSINESS '),
('315-6252 Fermentum Av.', 3005, 6, NULL, 'El Tabo', 'FL', 2849, 1535, 'US', 'BUSINESS '),
('P.O. Box 238, 4827 Lorem Road', 3006, 7, NULL, 'Kayseri', 'MI', 6034, 3051, 'US', 'HOME'),
('P.O. Box 481, 2052 Mauris Road', 3007, 8, NULL, 'Cornwall', 'MA', 5037, 4986, 'US', 'BUSINESS '),
('901-1517 Ut Street', 3008, 9, NULL, 'Waiheke Island', 'HI', 7872, 9716, 'US', 'BUSINESS '),
('971-4603 Etiam Ave', 3009, 10, NULL, 'Suruç', 'ID', 1924, 8742, 'US', 'HOME'),
('145-5459 Odio. St.', 3010, 11, NULL, 'Orhangazi', 'AL', 2367, 1303, 'US', 'BUSINESS '),
('Ap #564-7377 Nec, Avenue', 3011, 12, 564, 'Vienna', 'AK', 7569, 6098, 'US', 'HOME'),
('491-8061 Feugiat Rd.', 3012, 13, NULL, 'San José de Maipo', 'GA', 8222, 8269, 'US', 'BUSINESS '),
('Ap #464-7299 Inceptos Street', 3013, 14, 464, 'Vienna', 'GA', 9644, 6049, 'US', 'HOME'),
('Ap #284-5310 A Av.', 3014, 15, 284, 'Piotrków Trybunalski', 'GA', 5171, 9256, 'US', 'BUSINESS '),
('3013 Libero Avenue', 3015, 16, NULL, 'Gävle', 'FL', 3536, 5807, 'US', 'HOME'),
('778-7965 Velit. Ave', 3016, 17, NULL, 'Okene', 'MI', 9227, 2539, 'US', 'BUSINESS '),
('140-9244 Enim Av.', 3017, 18, NULL, 'Campinas', 'MA', 5692, 3084, 'US', 'BUSINESS '),
('695-6322 Ultricies Avenue', 3018, 19, NULL, 'Jaboatão dos Guararapes', 'HI', 6713, 5276, 'US', 'HOME'),
('3138 Eget, Rd.', 3019, 20, NULL, 'Geertruidenberg', 'ID', 6043, 6878, 'US', 'BUSINESS ');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `amount_due` double DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `bill_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`amount_due`, `created_date`, `due_date`, `bill_id`, `customer_id`) VALUES
(100.22, '2017-04-11', '2017-04-29', 1, 1),
(40, '2017-04-14', '2017-04-30', 2, 1),
(20.66, '2017-04-01', '2017-04-28', 4, 2),
(10, '2017-04-05', '2017-04-21', 5, 3),
(30.33, '2017-04-01', '2017-04-07', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `product` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tax_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `customer_products_id` varchar(20) DEFAULT NULL,
  `bill_id` varchar(20) DEFAULT NULL,
  `charge_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `contact` varchar(120) DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`contact`, `customer_id`, `fname`, `lname`, `mname`) VALUES
('604-2324-244', 1, 'Elizabeth', 'Blackburn', NULL),
('404-234-234', 2, 'Anna ', 'Behrensmeyer', 'K.'),
('900-234-642', 3, 'Blaise', 'Pascal', NULL),
('324-234-5677', 4, 'Caroline', 'Herschel', NULL),
('898-234-123', 5, 'Chien-Shiung', 'Wu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `customer_product_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`customer_product_id`, `customer_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 1, 5),
(5, 2, 2),
(6, 2, 7),
(7, 3, 6),
(8, 1, 2),
(9, 3, 1),
(10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user`, `pass`) VALUES
(1, 'root1', '123'),
(3, 'root', '123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proudct_id` int(20) NOT NULL,
  `pname` varchar(45) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proudct_id`, `pname`, `rate`, `quantity`, `status`) VALUES
(1, 'Hagen CatIt Hooded Cat Litter Box', 3.4, 24, NULL),
(2, 'Star Wars The Black Series 40th Anniversary ', 2, 13, NULL),
(3, 'Star Wars The Black Series 40th Anniversary ', 1.3, 13, NULL),
(4, 'TV Instant 20/20 Adjustable Glasses', 2.6, 14, NULL),
(5, 'Mighty Mug Biggie Tumbler', 4.4, 15, NULL),
(6, 'iPhone 7 Plus Case', 5, 16, NULL),
(7, 'Ultra-Fine Point Ink Pens', 2.3, 18, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`charge_id`),
  ADD KEY `bill_id_idx` (`bill_id`),
  ADD KEY `customer_id_idx` (`customer_id`),
  ADD KEY `customer_products_id_idx` (`customer_products_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`customer_product_id`),
  ADD KEY `customer_id_idx` (`customer_id`),
  ADD KEY `product_id_idx` (`product_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proudct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3020;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `customer_product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proudct_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
