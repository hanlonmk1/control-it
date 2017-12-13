-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2017 at 12:49 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(4, 'mh1', '$2y$10$iUKfGZysZnT8NZvgce6Nq...1j2/fYCI880H3KeJR6gRjFhnEAJnO', '2017-11-19 18:45:59'),
(5, 'mh2', '$2y$10$JjzX2HCf94dkr.gZK1FDUu1VITRA0JXrZHxesiTFDRM39FZDqdqRq', '2017-11-19 19:06:26'),
(6, 'mh3', '$2y$10$jaBITylA61v4yPZou9wrH.mmYUjjQd7Rnx.DVWe8TjQr6bUJr1teK', '2017-11-19 19:11:31'),
(7, 'mh4', '$2y$10$BbCRFGV6xeFXtKSIg/V1qOKO5gwaYY0rIGcrVtSi8PJvzXXhO2Vvu', '2017-11-19 20:38:18'),
(8, 'mh5', '$2y$10$1d1SzEfQOGBTC0SEJIx1h.GSEhKMNccHpxSJlsQwz5nsNdQKpGtze', '2017-11-21 10:30:48'),
(9, 'John Peterson', '$2y$10$AwU1ygeHE7rTo5XnDcbzruJsum3KO5Je02lB8y2wXchLywDlbfLLK', '2017-11-22 12:13:55'),
(10, 'Pete Johnson', '$2y$10$h8V0OUFqZ21fNAMw0dY4fO9Qszh/lnki6UCAp8YakCPG/9xUKq/YW', '2017-11-22 12:31:22'),
(11, 'Ruby Gold', '$2y$10$7WqPBVdXDQmkFCJx8L7O5ef.im.CJCrlk2x.TwPrpNb5VMV3UTCb.', '2017-11-22 18:39:31'),
(12, 'Ivy Green', '$2y$10$QdMeaHlrivJbsXH.i99ewe0QcYvryvSe33zH1ZTqs7D6CvOQaIe0S', '2017-11-28 00:07:20'),
(13, 'T_Bradley', '$2y$10$JIzFYevMjf.uuf5Fm4ILKOm6SYvbki6qLxokSt4H279N/yPhL5GcS', '2017-11-30 00:16:27'),
(14, 'Brad_Teeley', '$2y$10$Ked4TwrTTBmX5JSM5FXgS.QRzFd2Ogjnj7vnlujLbTkWwAxeyw9Pu', '2017-11-30 14:52:00'),
(15, 'mildred_p', '$2y$10$.C8ctVuNg.SNbVeFdVGwlu1fCop5imBX4os9sEtULkpb6Phy0vxWC', '2017-12-03 10:50:56'),
(16, 'mildred_q', '$2y$10$lm.dsPBeWWbHroCNZ6wLIurxS2UkWaeJhxjMXdJ8wtu6ZwsG9qU9C', '2017-12-03 13:43:45'),
(17, 'mildred_r', '$2y$10$GRTSykm.oS8gZCpnIlHg4OsFAALBItaDz6Thebrqe/9MAOyEAHkdi', '2017-12-03 13:48:41'),
(18, 'mildred_s', '$2y$10$S6hl4KcKM.RVMa1OJ0jbYe9HRa3p19k6wpaedkEhtHZ6rGdXb03PC', '2017-12-03 14:08:42'),
(19, 'mildred_t', '$2y$10$fGcevQDci0GD4WHpPUp7GezWmlW.DUnNN1bYJxVyALF78AUF204w6', '2017-12-03 14:25:49'),
(20, 'mildred_u', '$2y$10$7BUZCo/UtJGk0NfI2qMD/OFa90bG.pLBibd7bsEcPmeh2RqH/dZBm', '2017-12-03 14:56:36'),
(21, 'mildred_v', '$2y$10$WBdgoneS82TNPAt6M4dt6OFlSy/QlqVfoKOWJTrjTQFr7X0VFUcv2', '2017-12-03 17:34:05'),
(22, 'mildred_w', '$2y$10$tUim9rYwqSS3oqxaSjGxCOGj/P8i3zcQ2ld4xK6Z86uKxq9p1jNeC', '2017-12-03 17:49:43'),
(23, 'mildred_x', '$2y$10$5HFVnib7SXpnWNmX.G2/FO41LE.CbMrQyR2ToNcKoTdO4hrgXTeKy', '2017-12-03 18:06:52'),
(24, 'mildred_y', '$2y$10$wO9/YnWuKmEIHGyM0/Pi2.TsNHQ.sBpF8YT8APstlmDf/aOL02Uia', '2017-12-04 09:58:32'),
(25, 'Doctor_adm', '$2y$10$evIzHH4qHSd3c.Y4dxNZhucNmFUhWt.wLuk6cTMkQDXWvUvBXRoGG', '2017-12-06 10:41:52'),
(26, 'Nurse_adm', '$2y$10$nB6FJqdAKaz1kMY9hib7L.31DmfCnsu2qW5pdxhEDifGKxXlnPKEW', '2017-12-06 10:51:13'),
(27, 'mike_d', '$2y$10$n5dYXsxqZ4lq/UX1sz19UOeoPKNBlF55zOm7caILdIbdDbe9Mntui', '2017-12-06 19:48:06'),
(28, 'mildred_1', '$2y$10$LEnYFoBuRrp/hKadCTk6peMlL83WC3RbB8s9VaIrJzXkljMr7p/3W', '2017-12-07 19:51:20'),
(29, 'ControlDoc', '$2y$10$.0tUg8U5W6d1/qln/QWwfuwjkJ6OVYYLigbBp7yIQ4dPnmsDW9pDK', '2017-12-08 21:07:30'),
(30, 'ControlNurse', '$2y$10$w7T6HGu9ZdxglfYEM9FxCu8zq5Sn7qka8w2liFaG2E/lUU.hTh.JS', '2017-12-08 21:10:06'),

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
