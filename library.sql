-- MySQL dump 10.16  Distrib 10.1.30-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `book_code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`book_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_book`
--

DROP TABLE IF EXISTS `lend_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_book` (
  `email` varchar(50) NOT NULL,
  `book_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`,`book_code`),
  KEY `book_code_fk` (`book_code`),
  CONSTRAINT `book_code_fk` FOREIGN KEY (`book_code`) REFERENCES `book` (`book_code`),
  CONSTRAINT `book_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_book`
--

LOCK TABLES `lend_book` WRITE;
/*!40000 ALTER TABLE `lend_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `lend_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_magazine`
--

DROP TABLE IF EXISTS `lend_magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_magazine` (
  `email` varchar(50) NOT NULL,
  `magazine_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`,`magazine_code`),
  KEY `magazine_code_fk` (`magazine_code`),
  CONSTRAINT `magazine_code_fk` FOREIGN KEY (`magazine_code`) REFERENCES `magazine` (`magazine_code`),
  CONSTRAINT `magazine_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_magazine`
--

LOCK TABLES `lend_magazine` WRITE;
/*!40000 ALTER TABLE `lend_magazine` DISABLE KEYS */;
/*!40000 ALTER TABLE `lend_magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_software`
--

DROP TABLE IF EXISTS `lend_software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_software` (
  `email` varchar(50) NOT NULL,
  `software_code` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `late_day` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`,`software_code`),
  KEY `software_code_fk` (`software_code`),
  CONSTRAINT `software_code_fk` FOREIGN KEY (`software_code`) REFERENCES `software` (`software_code`),
  CONSTRAINT `software_email_fk` FOREIGN KEY (`email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_software`
--

LOCK TABLES `lend_software` WRITE;
/*!40000 ALTER TABLE `lend_software` DISABLE KEYS */;
/*!40000 ALTER TABLE `lend_software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `magazine` (
  `magazine_code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`magazine_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazine`
--

LOCK TABLES `magazine` WRITE;
/*!40000 ALTER TABLE `magazine` DISABLE KEYS */;
/*!40000 ALTER TABLE `magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software` (
  `software_code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `availability` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`software_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software`
--

LOCK TABLES `software` WRITE;
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
/*!40000 ALTER TABLE `software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `role` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('non_teacher','Peter Kuan','kuan@gmail.com',123456,0),('teacher','Ken Li','li@gmail.com',123456,10),('student','Ng Pui Lam','npl@gmail.com',123456,10),('alumni','Taylor Swift','sift@gmail.com',123456,0),('alumni','Troyel Steve','steve@gmail.com',123456,10),('non_teacher','Marry Sui','sui@gmail.com',123456,10),('student','Terry Fung','terry@gmail.com',123456,0),('teacher','Wong Ton','tong@gmail.com',123456,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-18 16:26:44
