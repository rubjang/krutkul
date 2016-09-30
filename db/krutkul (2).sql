-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2016 at 08:23 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krutkul`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_member`
--

CREATE TABLE `shop_member` (
  `id_shop_member` int(5) NOT NULL,
  `user_shop` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass_shop` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_shop` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sex_shop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address_shop` text COLLATE utf8_unicode_ci NOT NULL,
  `tel_shop` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_shop` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_member`
--

INSERT INTO `shop_member` (`id_shop_member`, `user_shop`, `pass_shop`, `name_shop`, `sex_shop`, `address_shop`, `tel_shop`, `email_shop`) VALUES
(5, 'admin', 'go9ifu', 'phiphat', 'on', 'ซีคอนสแควร์', '0870115291', 'rubjang@hotmail.com'),
(7, 'rubjang', 'go9ifu', 'theyoi', 'on', 'sdfsdaf', 'sdfasd', 'asfasd');

-- --------------------------------------------------------

--
-- Table structure for table `shop_webboard`
--

CREATE TABLE `shop_webboard` (
  `id_webboard` int(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `today` date NOT NULL,
  `view` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_webboard`
--

INSERT INTO `shop_webboard` (`id_webboard`, `id_member`, `title`, `message`, `name`, `email`, `today`, `view`) VALUES
(7, 5, 'ทดสอบตั้งกระทู้เว็บบอร์ด', 'ทดสอบตั้งกระทู้เว็บบอร์ด\r\nทดสอบตั้งกระทู้เว็บบอร์ด\r\nทดสอบตั้งกระทู้เว็บบอร์ด\r\nทดสอบตั้งกระทู้เว็บบอร์ด', 'admin', 'rubjang@hotmail.com', '2016-08-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_webboard_reply`
--

CREATE TABLE `shop_webboard_reply` (
  `id_reply` int(10) NOT NULL,
  `id_webboard` int(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `today` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_member`
--
ALTER TABLE `shop_member`
  ADD PRIMARY KEY (`id_shop_member`);

--
-- Indexes for table `shop_webboard`
--
ALTER TABLE `shop_webboard`
  ADD PRIMARY KEY (`id_webboard`);

--
-- Indexes for table `shop_webboard_reply`
--
ALTER TABLE `shop_webboard_reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_member`
--
ALTER TABLE `shop_member`
  MODIFY `id_shop_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop_webboard`
--
ALTER TABLE `shop_webboard`
  MODIFY `id_webboard` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop_webboard_reply`
--
ALTER TABLE `shop_webboard_reply`
  MODIFY `id_reply` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
