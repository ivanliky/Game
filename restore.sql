-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: box
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `drzave`
--

DROP TABLE IF EXISTS `drzave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drzave` (
  `id_drzave` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `broj_vojnika` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `budzet` int(11) DEFAULT NULL,
  `broj_tenkova` int(11) DEFAULT NULL,
  `broj_aviona` int(11) DEFAULT NULL,
  `broj_topova` int(11) DEFAULT NULL,
  `koficijent_drzave` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_drzave`),
  KEY `style_id` (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drzave`
--

LOCK TABLES `drzave` WRITE;
/*!40000 ALTER TABLE `drzave` DISABLE KEYS */;
INSERT INTO `drzave` VALUES (1,'Srbija',20000,1,22000,250,100,1500,46000),(2,'n2',40000,2,95000,500,200,3000,92000),(3,'n3',80000,2,170000,1000,400,6000,184000),(4,'n4',160000,2,350000,2000,800,12000,368000),(5,'n5',320000,2,700000,4000,1600,24000,736000),(6,'n6',640000,2,1200000,8000,3200,48000,1472000);
/*!40000 ALTER TABLE `drzave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igrac`
--

DROP TABLE IF EXISTS `igrac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igrac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `slika` blob,
  `ime_slike` varchar(2048) DEFAULT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igrac`
--

LOCK TABLES `igrac` WRITE;
/*!40000 ALTER TABLE `igrac` DISABLE KEYS */;
INSERT INTO `igrac` VALUES (1,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(2,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(3,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(4,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(5,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(6,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(7,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(8,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(9,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(10,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(11,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(12,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(13,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(14,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg'),(15,'Ivan','Mitic',NULL,NULL,'camper-cipele.jpg');
/*!40000 ALTER TABLE `igrac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodavnica`
--

DROP TABLE IF EXISTS `prodavnica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodavnica` (
  `regrutovani_vojnici` int(11) DEFAULT NULL,
  `tenkovi` int(11) DEFAULT NULL,
  `avioni` int(11) DEFAULT NULL,
  `topovi` int(11) DEFAULT NULL,
  `granate` int(11) DEFAULT NULL,
  `mun_za_pistolj` int(11) DEFAULT NULL,
  `mun_za_automat` int(11) DEFAULT NULL,
  `rakete_za_avion` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodavnica`
--

LOCK TABLES `prodavnica` WRITE;
/*!40000 ALTER TABLE `prodavnica` DISABLE KEYS */;
/*!40000 ALTER TABLE `prodavnica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `height` int(11) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` VALUES (1,40,'green'),(2,40,'red');
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-23 13:36:56
