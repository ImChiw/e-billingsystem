-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 05:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `img_url` varchar(250) DEFAULT NULL,
  `count1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `address`, `password`, `img_url`, `count1`) VALUES
(4, 'charl ace fuentes', 'charl', 'Poblacion Muntinlupa City', '$2y$10$TrfSP5XLyfZdv8J6zSVauO3BnSgU0e4geHHqB.GQiHNDs/QlriK5K', 'IMG-623320c323ade5.62378073.jpg', 7),
(6, 'marvin abilong', 'marvin', '352 Zone 4 Sitio pagkakaisa Sucat Muntinlupa City', '$2y$10$f/fqeFo2vQoLis7cJhUDn.NShJUPXY4fJkn.0giHKb5XIHLeiw2Wq', 'IMG-62342210c4b1f7.39803665.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `charl`
--

CREATE TABLE `charl` (
  `id` int(11) NOT NULL,
  `card` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `previous` varchar(250) NOT NULL,
  `recent` varchar(250) NOT NULL,
  `consume` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charl`
--

INSERT INTO `charl` (`id`, `card`, `date`, `previous`, `recent`, `consume`, `price`, `paid`) VALUES
(1, '', '2022-03-24', '2222', '2567', '345', '3347.4315', 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `lord`
--

CREATE TABLE `lord` (
  `id` int(11) NOT NULL,
  `card` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `previous` varchar(250) NOT NULL,
  `recent` varchar(250) NOT NULL,
  `consume` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lord`
--

INSERT INTO `lord` (`id`, `card`, `date`, `previous`, `recent`, `consume`, `price`, `paid`) VALUES
(1, '', '2022-04-07', '12333', '12666', '333', '3230.9991', 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `lovel`
--

CREATE TABLE `lovel` (
  `id` int(11) NOT NULL,
  `card` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `previous` varchar(250) NOT NULL,
  `recent` varchar(250) NOT NULL,
  `consume` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lovel`
--

INSERT INTO `lovel` (`id`, `card`, `date`, `previous`, `recent`, `consume`, `price`, `paid`) VALUES
(1, '', '2022-04-20', '1234', '1445', '211', '2047.2697', 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `marvin`
--

CREATE TABLE `marvin` (
  `id` int(11) NOT NULL,
  `card` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `previous` varchar(250) NOT NULL,
  `recent` varchar(250) NOT NULL,
  `consume` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marvin`
--

INSERT INTO `marvin` (`id`, `card`, `date`, `previous`, `recent`, `consume`, `price`, `paid`) VALUES
(56, '2341324', '2022-03-15', '1500', '1998', '498', '4831.9446', 'PAID'),
(57, '18125673', '2022-03-15', '1998', '2581', '583', '5656.6741', 'PAID'),
(58, '21412312', '2022-03-17', '5332', '5643', '311', '3017.5397', 'PAID'),
(59, '', '2022-03-15', '5675', '5987', '312', '3027.2424', 'UNPAID'),
(60, '', '2022-03-17', '12333', '12555', '222', '2153.9994', 'UNPAID'),
(61, '', '2022-03-17', '2222', '3333', '1111', '10779.6997', 'UNPAID'),
(62, '', '2022-03-17', '2344', '2633', '289', '2804.0803', 'UNPAID'),
(63, '', '2022-03-18', '12345', '14567', '2222', '21559.3994', 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `rhealyn`
--

CREATE TABLE `rhealyn` (
  `id` int(11) NOT NULL,
  `card` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `previous` varchar(250) NOT NULL,
  `recent` varchar(250) NOT NULL,
  `consume` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `paid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rhealyn`
--

INSERT INTO `rhealyn` (`id`, `card`, `date`, `previous`, `recent`, `consume`, `price`, `paid`) VALUES
(1, '', '2022-04-04', '1200', '1450', '250', '2425.675', 'UNPAID'),
(2, '1192837', '2022-04-06', '2938', '3598', '660', '6403.782', 'PAID'),
(3, '', '2022-04-06', '2938', '3598', '660', '6403.782', 'UNPAID'),
(4, '', '2022-04-06', '344', '455', '111', '1076.9997', 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `img_url` varchar(250) NOT NULL,
  `count2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `username`, `address`, `password`, `img_url`, `count2`) VALUES
(1, 'marvin abilong', 'marvin', '352 Zone 4 Sitio pagkakaisa Sucat Muntinlupa City', '$2y$10$PH9YPPprQgsyNneCgtIvO.leS1dhDU90vlkIf17TOlRNczesQ7H7C', 'IMG-622c654fe80987.59720896.jpg', 3),
(6, 'charl ace fuentes ', 'charl', 'Poblacion Muntinlupa City', '$2y$10$k4C7hJcjPyRgpFz2y0Aip.Ru9Y1HxMyeCvYqebuklgDJt3u9aHbgy', 'IMG-623429107b91f0.10008435.jpg', 0),
(8, 'rhealyn bolanos', 'rhealyn', 'Poblacion Muntinlupa City', '$2y$10$zeZg0PgeibZkmabgpTxu/upo21vG5rsgztd0VA6jEP/ZQBEiPvF3S', 'IMG-624aa6fe1f2887.47241119.png', 1),
(9, 'lord edgardian tavu', 'lord', 'ilaya alabang', '$2y$10$H96sbxeLLxGDvPiczHLcduv0BzJiVY.7zpgeewC/5oPowxy9TuwrO', 'IMG-624d184d4bf982.98383153.png', 0),
(10, 'lovel iverson linan', 'lovel', 'laspinas city', '$2y$10$IyWVXeMn1Lt5PitKhvLXXe5tRNEfwvaBVCvcBhxRPW602tzkzFTGG', 'IMG-624e3ffa05ccc1.93695203.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charl`
--
ALTER TABLE `charl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lord`
--
ALTER TABLE `lord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lovel`
--
ALTER TABLE `lovel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marvin`
--
ALTER TABLE `marvin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rhealyn`
--
ALTER TABLE `rhealyn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `charl`
--
ALTER TABLE `charl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lord`
--
ALTER TABLE `lord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lovel`
--
ALTER TABLE `lovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marvin`
--
ALTER TABLE `marvin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `rhealyn`
--
ALTER TABLE `rhealyn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
