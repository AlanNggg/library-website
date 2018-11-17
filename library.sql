-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2018 at 06:44 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lend_book`
--

CREATE TABLE `lend_book` (
  `email` varchar(50) NOT NULL,
  `book_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lend_magazine`
--

CREATE TABLE `lend_magazine` (
  `email` varchar(50) NOT NULL,
  `magazine_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lend_software`
--

CREATE TABLE `lend_software` (
  `email` varchar(50) NOT NULL,
  `software_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `magazine_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `software_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `role` varchar(20) NOT NULL,
  `name` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `role_cc` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
IF role NOT IN('teaching staff','non-teaching staff','student','alumni') THEN
SIGNAL SQLSTATE '45000'   
SET MESSAGE_TEXT = 'Cannot add or update row: not correct role';
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_code`);

--
-- Indexes for table `lend_book`
--
ALTER TABLE `lend_book`
  ADD PRIMARY KEY (`email`,`book_code`),
  ADD KEY `book_code_fk` (`book_code`);

--
-- Indexes for table `lend_magazine`
--
ALTER TABLE `lend_magazine`
  ADD PRIMARY KEY (`email`,`magazine_code`),
  ADD KEY `magazine_code_fk` (`magazine_code`);

--
-- Indexes for table `lend_software`
--
ALTER TABLE `lend_software`
  ADD PRIMARY KEY (`email`,`software_code`),
  ADD KEY `software_code_fk` (`software_code`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`magazine_code`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`software_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `magazine_code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_code` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lend_book`
--
ALTER TABLE `lend_book`
  ADD CONSTRAINT `book_code_fk` FOREIGN KEY (`book_code`) REFERENCES `book` (`book_code`),
  ADD CONSTRAINT `book_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `lend_magazine`
--
ALTER TABLE `lend_magazine`
  ADD CONSTRAINT `magazine_code_fk` FOREIGN KEY (`magazine_code`) REFERENCES `magazine` (`magazine_code`),
  ADD CONSTRAINT `magazine_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `lend_software`
--
ALTER TABLE `lend_software`
  ADD CONSTRAINT `software_code_fk` FOREIGN KEY (`software_code`) REFERENCES `software` (`software_code`),
  ADD CONSTRAINT `software_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
