-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2021 at 03:30 AM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro-dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(7) NOT NULL,
  `key_name` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key_name`, `value`) VALUES
(1, 'TIME_ZONE', 'America/Sao_Paulo');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(7) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `purchase_type` varchar(200) NOT NULL,
  `requisition_number` varchar(200) NOT NULL,
  `date_year` varchar(200) NOT NULL,
  `lucky_number` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `full_name`, `cpf`, `telephone`, `email`, `purchase_type`, `requisition_number`, `date_year`, `lucky_number`, `created_at`) VALUES
(1, 'Bishoy Romany', '111.111.111-11', '(011) 5866-7189', '7bishoyromany7@gmail.com', 'Bishoy-Test', '4444 4444 4444 4444', '10/2222', '222', '2021-05-19 22:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cookie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cookie`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bbcdedf5397c45b528ab2a0b623cdf07fec722fe');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(7) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `host_of_ip` varchar(200) NOT NULL,
  `useragnt` varchar(200) NOT NULL,
  `asn` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `host_of_ip`, `useragnt`, `asn`, `country`, `created_at`) VALUES
(1, '127.0.0.1', 'default.nginx', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'Please Install Pecl To Use geoip_asnum_by_name Function', 'Please Install Pecl To Use geoip_country_name_by_name Function', '2021-05-19 21:32:15'),
(2, '127.0.0.1', 'default.nginx', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'Please Install Pecl To Use geoip_asnum_by_name Function', 'Please Install Pecl To Use geoip_country_name_by_name Function', '2021-05-19 21:32:24'),
(3, '127.0.0.1', 'default.nginx', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'Please Install Pecl To Use geoip_asnum_by_name Function', 'Please Install Pecl To Use geoip_country_name_by_name Function', '2021-05-19 22:06:01'),
(4, '127.0.0.1', 'default.nginx', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'Please Install Pecl To Use geoip_asnum_by_name Function', 'Please Install Pecl To Use geoip_country_name_by_name Function', '2021-05-19 22:06:08'),
(5, '127.0.0.1', 'default.nginx', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'Please Install Pecl To Use geoip_asnum_by_name Function', 'Please Install Pecl To Use geoip_country_name_by_name Function', '2021-05-19 22:06:17'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
