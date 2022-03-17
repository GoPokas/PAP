-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nomeFuncionario` varchar(45) NOT NULL,
  `moradaFuncionario` varchar(100) DEFAULT NULL,
  `dataNascimentoFuncionario` date DEFAULT NULL,
  `emailFuncionario` varchar(80) NOT NULL,
  `avatarFuncionario` varchar(20) DEFAULT 'default-avatar.png',
  `idCodigoPostal` int(11) NOT NULL,
  `idDocIdentificacao` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_codigopostal1_idx` (`idCodigoPostal`),
  KEY `fk_funcionario_DocIdentificacao1_idx` (`idDocIdentificacao`),
  KEY `fk_funcionario_genero1_idx` (`idGenero`),
  CONSTRAINT `fk_funcionario_DocIdentificacao1` FOREIGN KEY (`idDocIdentificacao`) REFERENCES `docidentificacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_codigopostal1` FOREIGN KEY (`idCodigoPostal`) REFERENCES `codigopostal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_genero1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (0,'Rodrigo Alves',NULL,NULL,'rodrigoalves@xpertgo.com','PFP-1.png',1,1,1),(1,'Joana Silva',NULL,NULL,'joanasilva@xpertgo.com','default-avatar.png',1,1,2),(2,'Armando Adalberto Silva',NULL,NULL,'armandoadalberto@xpertgo.com','PFP-3.jpg',1,2,3),(3,'teste','teste','0000-00-00','teste@teste.com','default-avatar.png',1,2,1);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-17 17:01:54
