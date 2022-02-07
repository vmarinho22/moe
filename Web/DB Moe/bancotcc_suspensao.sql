CREATE DATABASE  IF NOT EXISTS `bancotcc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bancotcc`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: bancotcc.mysql.dbaas.com.br    Database: bancotcc
-- ------------------------------------------------------
-- Server version	5.6.35-81.0-log

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
-- Table structure for table `suspensao`
--

DROP TABLE IF EXISTS `suspensao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suspensao` (
  `matricula` varchar(250) NOT NULL,
  `ata` varchar(250) NOT NULL,
  `data` varchar(250) NOT NULL,
  `relato` varchar(250) NOT NULL,
  `periodo` int(11) NOT NULL,
  `diascumpridos` varchar(250) NOT NULL,
  `horafinal` varchar(250) NOT NULL,
  `pagina` int(11) NOT NULL,
  `unidade` int(11) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `horagerada` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `idSuspensao` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idSuspensao`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-16 13:18:16
