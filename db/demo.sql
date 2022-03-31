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
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nomeCargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Chefe'),(2,'Funcionário');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codigopostal`
--

DROP TABLE IF EXISTS `codigopostal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codigopostal` (
  `id` int(11) NOT NULL,
  `codigoPostal` varchar(45) DEFAULT NULL,
  `localidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigopostal`
--

LOCK TABLES `codigopostal` WRITE;
/*!40000 ALTER TABLE `codigopostal` DISABLE KEYS */;
INSERT INTO `codigopostal` VALUES (1,'4990-144','Ponte de Lima');
/*!40000 ALTER TABLE `codigopostal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nomeDepartamento` varchar(45) NOT NULL,
  `abreviaturaDepartamento` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Programação','PR'),(2,'Recursos Humanos','RH');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias` (
  `idFuncionario` int(11) NOT NULL,
  `diasferiasdisponiveis` int(11) DEFAULT '22',
  `diasferiasgozados` int(11) DEFAULT '0',
  `diasmedicasgozados` int(11) DEFAULT '0',
  `diasoutrosgozados` int(11) DEFAULT '0',
  PRIMARY KEY (`idFuncionario`),
  KEY `fk_dias_funcionario1_idx` (`idFuncionario`),
  CONSTRAINT `fk_dias_funcionario1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
INSERT INTO `dias` VALUES (0,22,0,0,0),(1,22,0,0,0),(2,22,0,0,0),(3,22,0,0,0);
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docidentificacao`
--

DROP TABLE IF EXISTS `docidentificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docidentificacao` (
  `id` int(11) NOT NULL,
  `nomeDocidentificacao` varchar(45) NOT NULL,
  `abreviaturaDocidentificacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docidentificacao`
--

LOCK TABLES `docidentificacao` WRITE;
/*!40000 ALTER TABLE `docidentificacao` DISABLE KEYS */;
INSERT INTO `docidentificacao` VALUES (1,'Cartão de Cidadão','CC'),(2,'Passaporte','PASS'),(3,'Cartão Militar','CM');
/*!40000 ALTER TABLE `docidentificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadomarcacao`
--

DROP TABLE IF EXISTS `estadomarcacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadomarcacao` (
  `id` int(11) NOT NULL,
  `nomeEstadomarcacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadomarcacao`
--

LOCK TABLES `estadomarcacao` WRITE;
/*!40000 ALTER TABLE `estadomarcacao` DISABLE KEYS */;
INSERT INTO `estadomarcacao` VALUES (0,'Pendente'),(1,'Aceite'),(2,'Recusado');
/*!40000 ALTER TABLE `estadomarcacao` ENABLE KEYS */;
UNLOCK TABLES;

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
  `idDias` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_codigopostal1_idx` (`idCodigoPostal`),
  KEY `fk_funcionario_DocIdentificacao1_idx` (`idDocIdentificacao`),
  KEY `fk_funcionario_genero1_idx` (`idGenero`),
  KEY `fk_funcionario_dias1_idx` (`idDias`),
  CONSTRAINT `fk_funcionario_DocIdentificacao1` FOREIGN KEY (`idDocIdentificacao`) REFERENCES `docidentificacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_codigopostal1` FOREIGN KEY (`idCodigoPostal`) REFERENCES `codigopostal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_dias1` FOREIGN KEY (`idDias`) REFERENCES `dias` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_genero1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (0,'Rodrigo Alves',NULL,NULL,'rodrigoalves@xpertgo.com','PFP-1.png',1,1,1,0),(1,'Joana Silva',NULL,NULL,'joanasilva@xpertgo.com','default-avatar.png',1,1,2,0),(2,'Armando Adalberto Silva',NULL,NULL,'armandoadalberto@xpertgo.com','PFP-3.jpg',1,2,3,0),(3,'teste','teste','0000-00-00','teste@teste.com','default-avatar.png',1,2,1,0);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_has_cargos`
--

DROP TABLE IF EXISTS `funcionario_has_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_has_cargos` (
  `funcionario_id` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL,
  PRIMARY KEY (`funcionario_id`,`cargos_id`),
  KEY `fk_funcionario_has_cargos_cargos1_idx` (`cargos_id`),
  KEY `fk_funcionario_has_cargos_funcionario1_idx` (`funcionario_id`),
  CONSTRAINT `fk_funcionario_has_cargos_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_has_cargos_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_has_cargos`
--

LOCK TABLES `funcionario_has_cargos` WRITE;
/*!40000 ALTER TABLE `funcionario_has_cargos` DISABLE KEYS */;
INSERT INTO `funcionario_has_cargos` VALUES (0,1),(1,2),(2,1),(3,1);
/*!40000 ALTER TABLE `funcionario_has_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_has_departamento`
--

DROP TABLE IF EXISTS `funcionario_has_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_has_departamento` (
  `funcionario_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  PRIMARY KEY (`funcionario_id`,`departamento_id`),
  KEY `fk_funcionario_has_departamento_departamento1_idx` (`departamento_id`),
  KEY `fk_funcionario_has_departamento_funcionario1_idx` (`funcionario_id`),
  CONSTRAINT `fk_funcionario_has_departamento_departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_has_departamento_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_has_departamento`
--

LOCK TABLES `funcionario_has_departamento` WRITE;
/*!40000 ALTER TABLE `funcionario_has_departamento` DISABLE KEYS */;
INSERT INTO `funcionario_has_departamento` VALUES (0,1),(1,2),(2,1),(3,2);
/*!40000 ALTER TABLE `funcionario_has_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nomeGenero` varchar(45) DEFAULT NULL,
  `abreviaturaGenero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Masculino','M'),(2,'Feminino','F'),(3,'Outro','O');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `marcacao` VALUES (0,'2022-03-17','2022-03-17','2022-03-17',0,0,0),(1,'2022-03-17','2022-03-20','2022-03-17',0,0,0),(2,'2022-03-17','2022-03-20','2022-03-17',0,0,0),(3,'2022-03-17','2022-03-20','2022-03-17',0,0,0),(4,'2022-03-17','2022-03-18','2022-03-17',1,1,0),(5,'2022-03-20','2022-04-20','2022-03-19',1,1,0),(6,'2022-03-10','2022-03-20','2022-03-14',1,1,0),(7,'2022-04-10','2022-05-10','2022-04-12',1,1,0),(8,'2022-05-10','2022-06-10','2022-05-10',1,2,0),(9,'2022-06-10','2022-07-10','2022-05-10',1,2,0),(10,'2022-07-10','2022-08-10','2022-05-10',1,2,0),(11,'2022-08-10','2022-09-10','2022-05-10',1,2,0);
/*!40000 ALTER TABLE `marcacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposmarcacao`
--

DROP TABLE IF EXISTS `tiposmarcacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposmarcacao` (
  `id` int(11) NOT NULL,
  `nomeTiposmarcacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposmarcacao`
--

LOCK TABLES `tiposmarcacao` WRITE;
/*!40000 ALTER TABLE `tiposmarcacao` DISABLE KEYS */;
INSERT INTO `tiposmarcacao` VALUES (0,'Férias'),(1,'Consulta Médica');
/*!40000 ALTER TABLE `tiposmarcacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `numFuncionario` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `group` int(1) NOT NULL,
  PRIMARY KEY (`numFuncionario`),
  KEY `fk_user_funcionario1_idx` (`numFuncionario`),
  CONSTRAINT `fk_user_funcionario1` FOREIGN KEY (`numFuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'202cb962ac59075b964b07152d234b70',1),(1,'202cb962ac59075b964b07152d234b70',0),(2,'202cb962ac59075b964b07152d234b70',1);
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

-- Dump completed on 2022-03-31 15:31:30
