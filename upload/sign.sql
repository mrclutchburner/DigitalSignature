-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 09:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_sign`
--

CREATE TABLE `employee_sign` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `acctnum` varchar(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `signature_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_sign`
--

INSERT INTO `employee_sign` (`id`, `name`, `address`, `acctnum`, `contact`, `signature_img`) VALUES
(6, 'Francis John A. Marcellana', 'Pagdugue, Dumangas, Iloilo', '05-004-0014', '09277023844', 'upload/Francis John A. Marcellana_65c1e68f68ce8.png'),
(7, 'John Paul III', 'Cau-ayan, Pototan, Iloilo', '00-002-0004', '09109855019', 'upload/John Paul III_65c33a73b7a91.png'),
(8, 'John Micheal Bucais', 'Cansilayan, Barotac Nuevo, Iloilo', '00-002-0006', '09109855020', 'upload/John Micheal Bucais_65c460cf890c3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_sign`
--
ALTER TABLE `employee_sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_sign`
--
ALTER TABLE `employee_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
