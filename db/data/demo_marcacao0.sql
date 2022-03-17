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
-- Table structure for table `marcacao`
--

DROP TABLE IF EXISTS `marcacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcacao` (
  `id` int(11) NOT NULL,
  `diainicioMarcacao` date DEFAULT NULL,
  `diafimMarcacao` date DEFAULT NULL,
  `diapedidoMarcacao` date DEFAULT NULL,
  `idTiposmarcacao` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idEstadomarcacao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marcacoes_tiposmarcacao1_idx` (`idTiposmarcacao`),
  KEY `fk_marcacoes_funcionario1_idx` (`idFuncionario`),
  KEY `fk_marcacao_estadomarcacao1_idx` (`idEstadomarcacao`),
  CONSTRAINT `fk_marcacao_estadomarcacao1` FOREIGN KEY (`idEstadomarcacao`) REFERENCES `estadomarcacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_marcacoes_funcionario1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_marcacoes_tiposmarcacao1` FOREIGN KEY (`idTiposmarcacao`) REFERENCES `tiposmarcacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcacao`
--

LOCK TABLES `marcacao` WRITE;
/*!40000 ALTER TABLE `marcacao` DISABLE KEYS */;
INSERT INTO `marcacao` VALUES (0,'2022-03-17','2022-03-17','2022-03-17',0,0,0),(1,'2022-03-17','2022-03-20','2022-03-17',0,0,0),(2,'2022-03-17','2022-03-20','2022-03-17',0,0,1),(3,'2022-03-17','2022-03-20','2022-03-17',0,0,2),(4,'2022-03-17','2022-03-18','2022-03-17',1,0,0),(5,'2022-03-20','2022-04-20','2022-03-19',1,0,0),(6,'2022-03-10','2022-03-20','2022-03-14',1,0,1),(7,'2022-04-10','2022-05-10','2022-04-12',1,0,1),(8,'2022-05-10','2022-06-10','2022-05-10',1,0,1),(9,'2022-06-10','2022-07-10','2022-05-10',1,0,1),(10,'2022-07-10','2022-08-10','2022-05-10',1,0,1),(11,'2022-08-10','2022-09-10','2022-05-10',1,0,1);
/*!40000 ALTER TABLE `marcacao` ENABLE KEYS */;
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
