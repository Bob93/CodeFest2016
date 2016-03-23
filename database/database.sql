-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: overzicht_test
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `afdeling`
--

DROP TABLE IF EXISTS `afdeling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afdeling` (
  `afdeling_ID` int(8) NOT NULL AUTO_INCREMENT,
  `beschrijving` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`afdeling_ID`),
  UNIQUE KEY `afdeling_ID_UNIQUE` (`afdeling_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afdeling`
--

LOCK TABLES `afdeling` WRITE;
/*!40000 ALTER TABLE `afdeling` DISABLE KEYS */;
INSERT INTO `afdeling` VALUES (1,'Helpdesk');
/*!40000 ALTER TABLE `afdeling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `person_ID` int(8) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(30) DEFAULT NULL,
  `tussenvoegsel` varchar(12) DEFAULT NULL,
  `achternaam` varchar(50) DEFAULT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `afdeling_ID` int(8) NOT NULL,
  `deeltijdfactor` double NOT NULL,
  `type_ID` int(8) NOT NULL,
  `geboortedatum` datetime DEFAULT NULL,
  `geslacht` enum('m','v') DEFAULT NULL,
  `werknemernummer` int(11) NOT NULL,
  `datum_in_dienst` datetime DEFAULT NULL,
  PRIMARY KEY (`person_ID`),
  UNIQUE KEY `Person_ID_UNIQUE` (`person_ID`),
  UNIQUE KEY `gebruikersnaam_UNIQUE` (`gebruikersnaam`),
  UNIQUE KEY `werknemernummer_UNIQUE` (`werknemernummer`),
  KEY `fk_Person_Type_werknemer_idx` (`type_ID`),
  KEY `fk_Person_Afdeling1_idx` (`afdeling_ID`),
  CONSTRAINT `fk_Person_Afdeling1` FOREIGN KEY (`afdeling_ID`) REFERENCES `afdeling` (`afdeling_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Person_Type_werknemer` FOREIGN KEY (`type_ID`) REFERENCES `type_werknemer` (`type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'Bob',NULL,'Goossen','BGoossen','Welkom01',1,0.8,1,'1993-11-16 00:00:00','m',212651,'2015-01-02 00:00:00'),(2,'Danny',NULL,'Schot','DSchot','Welkom01',1,0.2,2,'1992-01-30 00:00:00','m',244211,'2016-02-05 00:00:00'),(3,'Gabor',NULL,'Groninger','GGroninger','Welkom01',1,1,1,'1997-07-24 00:00:00','m',451245,'2014-01-05 00:00:00');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `project_ID` int(8) NOT NULL AUTO_INCREMENT,
  `beschrijving` varchar(255) DEFAULT NULL,
  `naam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`project_ID`),
  UNIQUE KEY `project_ID_UNIQUE` (`project_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Een mysterieus project','Project X'),(2,'Keihard knokken voor een prachtresultaat','Codefest'),(3,'Eerstejaars zijn niet slim','ROBO');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `aantal_dagen_voor_invoer` int(3) NOT NULL,
  `prijs_inkoop_vrijedagen` int(3) NOT NULL,
  `aantal_ziekte_dagen` int(3) NOT NULL,
  `settings_ID` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`settings_ID`),
  UNIQUE KEY `settings_UNIQUE` (`settings_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (20,200,6,1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_werknemer`
--

DROP TABLE IF EXISTS `type_werknemer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_werknemer` (
  `type_ID` int(8) NOT NULL AUTO_INCREMENT,
  `beschrijving` varchar(255) NOT NULL,
  PRIMARY KEY (`type_ID`),
  UNIQUE KEY `type_ID_UNIQUE` (`type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_werknemer`
--

LOCK TABLES `type_werknemer` WRITE;
/*!40000 ALTER TABLE `type_werknemer` DISABLE KEYS */;
INSERT INTO `type_werknemer` VALUES (1,'Werknemer'),(2,'Manager');
/*!40000 ALTER TABLE `type_werknemer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uren`
--

DROP TABLE IF EXISTS `uren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uren` (
  `uren_ID` int(8) NOT NULL AUTO_INCREMENT,
  `werknemernummer` int(8) NOT NULL,
  `aantal_uren` int(24) NOT NULL,
  `aantal_overuren` int(11) DEFAULT NULL,
  `project_ID` int(8) NOT NULL,
  `datum` datetime DEFAULT NULL,
  PRIMARY KEY (`uren_ID`),
  UNIQUE KEY `uren_ID_UNIQUE` (`uren_ID`),
  KEY `fk_Uren_Project1` (`project_ID`),
  KEY `fk_Uren_Person1` (`werknemernummer`),
  CONSTRAINT `fk_Uren_Person1` FOREIGN KEY (`werknemernummer`) REFERENCES `person` (`werknemernummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Uren_Project1` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uren`
--

LOCK TABLES `uren` WRITE;
/*!40000 ALTER TABLE `uren` DISABLE KEYS */;
INSERT INTO `uren` VALUES (2,212651,32,2,3,'2016-03-23 00:00:00');
/*!40000 ALTER TABLE `uren` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ziekte_en_verlof`
--

DROP TABLE IF EXISTS `ziekte_en_verlof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ziekte_en_verlof` (
  `verlof_ID` int(8) NOT NULL AUTO_INCREMENT,
  `type_Verlof` enum('Vakantie','Ziekte','Bijzonder verlof') DEFAULT NULL,
  `van_Datum` datetime NOT NULL,
  `tot_Datum` datetime DEFAULT NULL,
  `werknemernummer` int(8) NOT NULL,
  PRIMARY KEY (`verlof_ID`),
  UNIQUE KEY `verlof_ID_UNIQUE` (`verlof_ID`),
  KEY `fk_Verlof_Person1` (`werknemernummer`),
  CONSTRAINT `fk_Verlof_Person1` FOREIGN KEY (`werknemernummer`) REFERENCES `person` (`werknemernummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ziekte_en_verlof`
--

LOCK TABLES `ziekte_en_verlof` WRITE;
/*!40000 ALTER TABLE `ziekte_en_verlof` DISABLE KEYS */;
INSERT INTO `ziekte_en_verlof` VALUES (1,'Vakantie','2016-04-01 00:00:00','2016-04-08 00:00:00',212651);
/*!40000 ALTER TABLE `ziekte_en_verlof` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-23 18:59:40
