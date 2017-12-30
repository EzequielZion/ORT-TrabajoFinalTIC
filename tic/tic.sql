CREATE DATABASE  IF NOT EXISTS `tic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tic`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: tic
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `idMensajes` int(11) NOT NULL AUTO_INCREMENT,
  `idEnvia` varchar(45) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `idRecibe` varchar(45) NOT NULL,
  `fechayhora` varchar(255) NOT NULL,
  PRIMARY KEY (`idMensajes`),
  UNIQUE KEY `idMensajes_UNIQUE` (`idMensajes`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (1,'1','Ian puto','2','22/11/2017 - 20:35'),(2,'2','Hola','1','22/11/2017 - 20:50'),(12,'4','hola soy gonza bienvenidos','4','28/11/2017 - 12:24'),(14,'4','hola','2','28/11/2017 - 12:25'),(15,'4','asdasd','3','28/11/2017 - 12:25'),(16,'3','dieguitooooo','1','28/11/2017 - 12:26'),(17,'3','iannnnnnnnnnnnnnnnnnnnnnnnnnn ain','2','28/11/2017 - 12:26'),(18,'3','diegolazooo','1','28/11/2017 - 12:31'),(19,'3','hola mennn','3','28/11/2017 - 12:31');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `Foto` text NOT NULL,
  `birthday` date NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `Bio` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `Username_UNIQUE` (`user`),
  UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'diego','123456','Diego','Pertierra','diego@hotmail.com','img/f131c28c1d066160e11baac936a0242de1cd18ad.jpg','1999-07-13',0,'Holaaaaaa a a a a a a a a a a'),(2,'ianfrossi','54321','Ian','Rossi','ian@mail.com','img/1a152e9f6312265e315bec9727b1b55894136520.jpg','2000-03-31',0,'Holaaaaaaa a aa aaaa a a'),(3,'fercho','123456','Fermín','Blum','fermin@blum.com','img/bd36c3334b4fe5ec5df1713f7d71ff39a6459ccf.jpg','1999-12-09',0,'hola jorge'),(4,'gonzi','123456','Gonzalo','Rosen','gonza@rosen.com','img/ba934816d9dd908451b5c436d582c14cfc8e484c.jpg','2000-03-14',0,'me gusta la coca'),(5,'zion','123456','Ezequiel','Zion','eze@zion.com','img/8807ec60f2c86acd362771a40b971eba066c8bd6.jpg','2000-01-01',0,'aguante programar'),(6,'zanti','123456','Santiago','Ravaglia','santi@rava.com','img/0019e7a5a1819bab55fdf3722d33bebacaff1c67.jpg','2000-06-23',0,'tardo 10 en terminar una oracion');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-28  9:33:54
