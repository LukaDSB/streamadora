-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: streamadora
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmes` (
  `filmes_id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `anoLancamento` varchar(255) DEFAULT NULL,
  `duracaoLocacao` tinyint DEFAULT NULL,
  `duracaoFilme` smallint DEFAULT NULL,
  `idioma` varchar(255) DEFAULT NULL,
  `precoLocacao` decimal(4,2) DEFAULT NULL,
  `classificacao` varchar(255) DEFAULT NULL,
  `idioma_id` tinyint DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`filmes_id`),
  KEY `idioma_id_idx` (`idioma_id`),
  CONSTRAINT `idioma_id` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`idioma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (1,'ACADEMY DINOSAUR','Um filme épico','2006',6,86,'1',0.99,'PG',1,'1.jpg'),(2,'BECOMING ICE','Uma aventura congelante','2008',7,95,'2',1.50,'PG',NULL,'2.jpg'),(3,'CARIBBEAN MYSTERY','Mistério nas águas do Caribe','2010',5,120,'1',2.99,'PG-13',NULL,'3.jpg'),(4,'DESERT ADVENTURE','Aventura em pleno deserto','2012',6,105,'2',3.50,'R',NULL,'4.jpg'),(5,'EXPLORING MARS','Exploração no planeta vermelho','2015',4,130,'2',4.50,'PG',NULL,'5.jpg'),(6,'FIRE MOUNTAIN','Uma luta pela sobrevivência em um vulcão','2011',7,88,'3',2.00,'PG-13',NULL,'6.jpg'),(7,'GALACTIC ODYSSEY','Uma jornada pelo espaço','2018',5,150,'1',5.00,'PG',NULL,'7.jpg'),(8,'HEROES OF HISTORY','Heróis que mudaram o mundo','2019',6,110,'1',2.99,'PG-13',NULL,'8.jpg'),(9,'JOURNEY TO THE FUTURE','Uma viagem ao futuro distante','2021',4,90,'1',3.50,'PG',NULL,'9.jpg'),(10,'KINGDOM OF THE SEA','Uma história de reis e mares','2020',5,100,'2',3.99,'PG-13',NULL,'10.jpg'),(11,'LEGENDS OF THE JUNGLE','Mitos e lendas da selva','2023',6,115,'3',4.50,'R',NULL,'11.jpg'),(12,'teste','teste','2000',1,133,'1',4.50,'R',NULL,'12.jpg');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-23 13:59:02
