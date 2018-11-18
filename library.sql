-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 11 月 18 日 10:24
-- 伺服器版本: 10.1.34-MariaDB
-- PHP 版本： 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `library`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `book_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'true',
  `rate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`book_code`, `name`, `author`, `picture`, `description`, `ISBN`, `availability`, `rate`) VALUES
(1, 'Eng Book', 'Chris Wong', './img/books/B01.jpg', 'It is a book about English.', NULL, 'true', 0),
(2, 'Chinese Book', 'Chris Wong', './img/books/B02.jpg', 'It is a book about Chinese.', NULL, 'true', 0),
(3, 'Maths Book', 'Chris Chan', './img/books/B03.jpg', 'It is a book about Mathematics.', NULL, 'true', 0),
(4, 'Biology Book', 'Cherry Fung', './img/books/B04.jpg', 'It is a book about Biology.', NULL, 'true', 0),
(5, 'Eng Book2', 'Chris Wong', './img/books/B05.jpg', 'It is a book about English.', NULL, 'true', 0),
(6, 'Chinese Book2', 'Chris Wong', './img/books/B06.jpg', 'It is a book about Chinese.', NULL, 'true', 0),
(7, 'Maths Book2', 'Chris Chan', './img/books/B07.jpg', 'It is a book about Mathematics.', NULL, 'true', 0),
(8, 'Biology Book2', 'Cherry Fung', './img/books/B08.jpg', 'It is a book about Biology.', NULL, 'true', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `lend_book`
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
-- 資料表結構 `lend_magazine`
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
-- 資料表結構 `lend_software`
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
-- 資料表結構 `magazine`
--

CREATE TABLE `magazine` (
  `magazine_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'true',
  `rate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `magazine`
--

INSERT INTO `magazine` (`magazine_code`, `name`, `company`, `picture`, `description`, `ISBN`, `availability`, `rate`) VALUES
(1, 'Eng Magazine', 'ABC News', './img/magazines/M01.jpg', 'It is a magazine about English.', NULL, 'true', 0),
(2, 'Chinese Magazine', 'ABC News', './img/magazines/M02.jpg', 'It is a magazine about Chinese.', NULL, 'true', 0),
(3, 'Maths Magazine', 'ABC News', './img/magazines/M03.jpg', 'It is a magazine about Mathematics.', NULL, 'true', 0),
(4, 'Biology Magazine', 'ABC News', './img/magazines/M04.jpg', 'It is a magazine about Biology.', NULL, 'true', 0),
(5, 'Eng Magazine2', 'ABC News', './img/magazines/M05.jpg', 'It is a magazine about English.', NULL, 'true', 0),
(6, 'Chinese Magazine2', 'ABC News', './img/magazines/M06.jpg', 'It is a magazine about Chinese.', NULL, 'true', 0),
(7, 'Maths Magazine2', 'ABC News', './img/magazines/M07.jpg', 'It is a magazine about Mathematics.', NULL, 'true', 0),
(8, 'Biology Magazine2', 'ABC News', './img/magazines/M08.jpg', 'It is a magazine about Biology.', NULL, 'true', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `software`
--

CREATE TABLE `software` (
  `software_code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'true',
  `rate` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `software`
--

INSERT INTO `software` (`software_code`, `name`, `company`, `picture`, `description`, `availability`, `rate`) VALUES
(1, 'Eng Software', 'ABC Company', './img/software/S01.jpg', 'It is a software about English.', 'true', 0),
(2, 'Chinese Software', 'ABC Company', './img/software/S02.jpg', 'It is a software about Chinese.', 'true', 0),
(3, 'Maths Software', 'ABC Company', './img/software/S03.jpg', 'It is a software about Mathematics.', 'true', 0),
(4, 'Biology Software', 'ABC Company', './img/software/S04.jpg', 'It is a software about Biology.', 'true', 0),
(5, 'Eng Software2', 'ABC Company', './img/software/S05.jpg', 'It is a software about English.', 'true', 0),
(6, 'Chinese Software2', 'ABC Company', './img/software/S06.jpg', 'It is a software about Chinese.', 'true', 0),
(7, 'Maths Software2', 'ABC Company', './img/software/S07.jpg', 'It is a software about Mathematics.', 'true', 0),
(8, 'Biology Software2', 'ABC Company', './img/software/S08.jpg', 'It is a software about Biology.', 'true', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `role` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`role`, `name`, `email`, `password`, `login_count`) VALUES
('non_teacher', 'Peter Kuan', 'kuan@gmail.com', 123456, 0),
('teacher', 'Ken Li', 'li@gmail.com', 123456, 10),
('student', 'Ng Pui Lam', 'npl@gmail.com', 123456, 10),
('alumni', 'Taylor Swift', 'sift@gmail.com', 123456, 0),
('alumni', 'Troyel Steve', 'steve@gmail.com', 123456, 10),
('non_teacher', 'Marry Sui', 'sui@gmail.com', 123456, 10),
('student', 'Terry Fung', 'terry@gmail.com', 123456, 0),
('teacher', 'Wong Ton', 'tong@gmail.com', 123456, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_code`);

--
-- 資料表索引 `lend_book`
--
ALTER TABLE `lend_book`
  ADD PRIMARY KEY (`email`,`book_code`),
  ADD KEY `book_code_fk` (`book_code`);

--
-- 資料表索引 `lend_magazine`
--
ALTER TABLE `lend_magazine`
  ADD PRIMARY KEY (`email`,`magazine_code`),
  ADD KEY `magazine_code_fk` (`magazine_code`);

--
-- 資料表索引 `lend_software`
--
ALTER TABLE `lend_software`
  ADD PRIMARY KEY (`email`,`software_code`),
  ADD KEY `software_code_fk` (`software_code`);

--
-- 資料表索引 `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`magazine_code`);

--
-- 資料表索引 `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`software_code`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `book_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `magazine`
--
ALTER TABLE `magazine`
  MODIFY `magazine_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `software`
--
ALTER TABLE `software`
  MODIFY `software_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `lend_book`
--
ALTER TABLE `lend_book`
  ADD CONSTRAINT `book_code_fk` FOREIGN KEY (`book_code`) REFERENCES `book` (`book_code`),
  ADD CONSTRAINT `book_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `lend_magazine`
--
ALTER TABLE `lend_magazine`
  ADD CONSTRAINT `magazine_code_fk` FOREIGN KEY (`magazine_code`) REFERENCES `magazine` (`magazine_code`),
  ADD CONSTRAINT `magazine_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `lend_software`
--
ALTER TABLE `lend_software`
  ADD CONSTRAINT `software_code_fk` FOREIGN KEY (`software_code`) REFERENCES `software` (`software_code`),
  ADD CONSTRAINT `software_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
