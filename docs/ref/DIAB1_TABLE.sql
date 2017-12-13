-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2017 at 12:52 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `DIAB1_TABLE`
--

CREATE TABLE `DIAB1_TABLE` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `AM` decimal(3,1) NOT NULL,
  `PM` decimal(3,1) NOT NULL,
  `d_avg` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DIAB1_TABLE`
--

INSERT INTO `DIAB1_TABLE` (`ID`, `username`, `Date`, `AM`, `PM`, `d_avg`) VALUES
(71, 'mh4', '2017-11-21', '5.5', '7.5', '0.00'),
(72, 'mh2', '2017-11-20', '4.5', '8.5', '0.00'),
(73, 'mh5', '2017-11-21', '6.0', '7.0', '0.00'),
(76, 'John Peterson', '2017-11-22', '6.0', '8.0', '0.00'),
(86, 'Pete Johnson', '2017-11-07', '4.6', '7.5', '0.00'),
(119, 'Ruby Gold', '2017-11-15', '4.8', '7.7', '0.00'),
(149, 'Ruby Gold', '2017-11-25', '5.0', '7.5', '0.00'),
(161, 'Pete Johnson', '2017-11-26', '5.0', '7.0', '0.00'),
(166, 'Ivy Green', '2017-11-28', '4.5', '8.0', '0.00'),
(176, 'John Peterson', '2017-11-29', '5.0', '7.5', '6.25'),
(185, 'John Peterson', '2017-12-03', '4.1', '7.9', '6.00'),
(187, 'Brad_Teeley', '2017-12-03', '6.5', '11.0', '8.75'),
(189, 'Brad_Teeley', '2017-12-01', '4.0', '8.5', '6.25'),
(1798, 'Brad_Teeley', '2017-12-04', '5.0', '8.0', '6.50'),
(1799, 'John Peterson', '2017-12-06', '2.4', '4.7', '3.55'),
(1800, 'John Peterson', '2017-12-01', '1.6', '3.9', '2.75'),
(1801, 'John Peterson', '2017-12-02', '1.7', '2.8', '2.25'),
(1803, 'John Peterson', '2017-12-04', '3.1', '4.4', '3.75'),
(1804, 'John Peterson', '2017-12-05', '3.4', '4.6', '4.00'),
(1807, 'Ivy Green', '2017-12-06', '7.4', '10.2', '8.80'),
(1808, 'Ivy Green', '2017-12-05', '3.9', '6.3', '5.10'),
(1809, 'Pete Johnson', '2017-12-03', '4.1', '8.6', '6.35'),
(1810, 'Pete Johnson', '2017-12-06', '5.3', '6.6', '5.95'),
(1811, 'Brad_Teeley', '2017-12-06', '5.5', '6.7', '6.10'),
(1812, 'Ivy Green', '2017-12-07', '3.6', '11.3', '7.45'),
(1814, 'John Peterson', '2017-12-07', '5.0', '7.5', '6.25'),
(1815, 'Pete Johnson', '2017-12-08', '2.4', '5.8', '4.10'),
(1837, 'Ivy Green', '2017-12-08', '3.0', '7.0', '5.00'),
(1838, 'Ivy Green', '2017-12-03', '5.0', '7.5', '6.25'),
(1842, 'Ivy Green', '2017-12-01', '4.0', '7.5', '5.75'),
(1843, 'John Peterson', '2017-12-08', '5.0', '7.5', '6.25'),
(1844, 'Brad_Teeley', '1970-01-01', '5.6', '8.0', '6.80'),
(1845, 'Brad_Teeley', '2017-12-08', '3.8', '8.4', '6.10'),
(1855, 'Ivy Green', '2017-12-09', '5.0', '7.5', '6.25'),
(1856, 'Ivy Green', '2017-12-10', '5.0', '7.5', '6.25'),
(1857, 'Brad_Teeley', '2017-12-11', '5.0', '7.5', '6.25'),
(1858, 'John Peterson', '2017-12-12', '3.5', '5.4', '4.45'),
(1859, 'John Peterson', '2017-12-10', '4.0', '5.4', '4.70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DIAB1_TABLE`
--
ALTER TABLE `DIAB1_TABLE`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`,`Date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DIAB1_TABLE`
--
ALTER TABLE `DIAB1_TABLE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1864;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
