CREATE DATABASE  IF NOT EXISTS `swhelper` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `swhelper`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: swhelper
-- ------------------------------------------------------
-- Server version	5.5.43

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
-- Table structure for table `afiliation`
--

DROP TABLE IF EXISTS `afiliation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiliation` (
  `idafiliation` tinyint(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idafiliation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliation`
--

LOCK TABLES `afiliation` WRITE;
/*!40000 ALTER TABLE `afiliation` DISABLE KEYS */;
INSERT INTO `afiliation` VALUES (1,'Imperio'),(2,'Republica');
/*!40000 ALTER TABLE `afiliation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `idcharacter` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `class_idclass` int(11) NOT NULL,
  PRIMARY KEY (`idcharacter`,`class_idclass`),
  KEY `fk_personaje_clases1_idx` (`class_idclass`),
  CONSTRAINT `fk_personaje_clases1` FOREIGN KEY (`class_idclass`) REFERENCES `class` (`idclass`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Shonblam','',1),(2,'Vasm','nota1',5);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `idclass` int(11) NOT NULL AUTO_INCREMENT,
  `afiliation_idafiliation` tinyint(4) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idclass`,`afiliation_idafiliation`),
  KEY `fk_clases_afiliacion1_idx` (`afiliation_idafiliation`),
  CONSTRAINT `fk_clases_afiliacion1` FOREIGN KEY (`afiliation_idafiliation`) REFERENCES `afiliation` (`idafiliation`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,1,'Juggernaut'),(2,1,'Marauder'),(3,1,'Assasin'),(4,1,'Sorcerer'),(5,1,'Operative'),(6,1,'Sniper'),(7,1,'Powertech'),(8,1,'Mercenary'),(9,2,'Guardian'),(10,2,'Sentinel'),(11,2,'Sage'),(12,2,'Shadow'),(13,2,'Gunslinger'),(14,2,'Scoundrel'),(15,2,'Vanguard'),(16,2,'Commando');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historic`
--

DROP TABLE IF EXISTS `historic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historic` (
  `idhistoric` int(11) NOT NULL AUTO_INCREMENT,
  `characters_idcharacters` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `mission_idmission` int(11) NOT NULL,
  PRIMARY KEY (`idhistoric`,`characters_idcharacters`,`mission_idmission`),
  KEY `fk_historico_personaje1_idx` (`characters_idcharacters`),
  KEY `fk_historico_mision1_idx` (`mission_idmission`),
  CONSTRAINT `fk_historico_mision1` FOREIGN KEY (`mission_idmission`) REFERENCES `mission` (`idmision`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_personaje1` FOREIGN KEY (`characters_idcharacters`) REFERENCES `characters` (`idcharacter`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historic`
--

LOCK TABLES `historic` WRITE;
/*!40000 ALTER TABLE `historic` DISABLE KEYS */;
INSERT INTO `historic` VALUES (1,1,'2015-05-04 17:00:00',1),(2,2,'2015-05-04 00:00:00',4),(3,2,'2015-05-04 00:00:00',3);
/*!40000 ALTER TABLE `historic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `idlocation` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idlocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission`
--

DROP TABLE IF EXISTS `mission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mission` (
  `idmision` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `mission_type_idmission_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`idmision`,`mission_type_idmission_type`),
  KEY `fk_mision_tipomision1_idx` (`mission_type_idmission_type`),
  CONSTRAINT `fk_mision_tipomision1` FOREIGN KEY (`mission_type_idmission_type`) REFERENCES `mission_type` (`idmission_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission`
--

LOCK TABLES `mission` WRITE;
/*!40000 ALTER TABLE `mission` DISABLE KEYS */;
INSERT INTO `mission` VALUES (1,'CZ-198',1),(2,'CZ-198',2),(3,'Yavin',1),(4,'Yavin',2);
/*!40000 ALTER TABLE `mission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission_type`
--

DROP TABLE IF EXISTS `mission_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mission_type` (
  `idmission_type` tinyint(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idmission_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission_type`
--

LOCK TABLES `mission_type` WRITE;
/*!40000 ALTER TABLE `mission_type` DISABLE KEYS */;
INSERT INTO `mission_type` VALUES (1,'Daily'),(2,'Weekly');
/*!40000 ALTER TABLE `mission_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-07 23:31:34
