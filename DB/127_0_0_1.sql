-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 02:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sonia`
--
CREATE DATABASE IF NOT EXISTS `sonia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sonia`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_user` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `a_pass` varchar(100) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_user`, `a_pass`) VALUES
(1, 'papal', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_fullname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `c_mobile` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `c_address` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `c_post_code` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `c_product_names` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `c_price` int(100) NOT NULL,
  `c_fish` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `c_dtime` int(100) NOT NULL,
  `c_ip` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `c_archive` int(10) NOT NULL,
  `c_confirm_price` int(10) NOT NULL,
  `c_method_send` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `c_post_code_product` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `c_confrim_send` int(10) NOT NULL,
  `c_back_archive` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_fullname`, `c_mobile`, `c_address`, `c_post_code`, `c_product_names`, `c_price`, `c_fish`, `c_dtime`, `c_ip`, `c_archive`, `c_confirm_price`, `c_method_send`, `c_post_code_product`, `c_confrim_send`, `c_back_archive`) VALUES
(1, 'پیام حیاتی', '09163014614', 'ایران،اهواز، انتهای خیابان آزادگان (24متری)، بین شمخانی و نبی ئی', '6136946151', 'سشلوار کردی و دمپایی ', 159500, '8376-1-min.jpg', 1627213384, '::1', 0, 1, 'پست', '1212121', 1, 1),
(2, 'Pouya', '09163014614', 'erwere', '6136946151', 'erwer', 1212, '39584-photo_2018-12-15_21-26-00.jpg', 1627372978, '::1', 0, 0, '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
