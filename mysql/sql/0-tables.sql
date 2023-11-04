-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: webctf
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `conti_bancari`
--

DROP TABLE IF EXISTS `conti_bancari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conti_bancari` (
  `id_conto` int(11) NOT NULL AUTO_INCREMENT,
  `nCarta` varchar(20) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `data_scadenza` varchar(7) NOT NULL,
  `titolare` varchar(100) NOT NULL,
  `saldo` double NOT NULL,
  `utente` int(11) NOT NULL,
  PRIMARY KEY (`id_conto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conti_bancari`
--

LOCK TABLES `conti_bancari` WRITE;
/*!40000 ALTER TABLE `conti_bancari` DISABLE KEYS */;
INSERT INTO `conti_bancari` VALUES (2,'111144440000','148','10/2022','Mario Rossi',10,1);
/*!40000 ALTER TABLE `conti_bancari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(100) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `data` date NOT NULL,
  `img` varchar(100) NOT NULL,
  `target` varchar(50) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'News 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies quam vitae diam mattis facilisis. Donec in mi luctus metus placerat lacinia quis et libero. Nunc varius eu leo nec eleifend. Morbi porttitor, est et maximus egestas, magna dui congue dui, vel dictum magna sapien quis justo. Curabitur fermentum eros aliquet mauris dictum vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec at est consequat, fringilla metus at, aliquam torto','2019-03-02','news-template-img.jpg','news'),(2,'News 2',':Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies quam vitae diam mattis facilisis. Donec in mi luctus metus placerat lacinia quis et libero. Nunc varius eu leo nec eleifend. Morbi porttitor, est et maximus egestas, magna dui congue dui, vel dictum magna sapien quis justo. Curabitur fermentum eros aliquet mauris dictum vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec at est consequat, fringilla metus at, aliquam tort','2019-03-02','news-template-img.jpg','app'),(3,'News 3',':Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies quam vitae diam mattis facilisis. Donec in mi luctus metus placerat lacinia quis et libero. Nunc varius eu leo nec eleifend. Morbi porttitor, est et maximus egestas, magna dui congue dui, vel dictum magna sapien quis justo. Curabitur fermentum eros aliquet mauris dictum vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec at est consequat, fringilla metus at, aliquam tort','2019-03-02','news-template-img.jpg','app'),(4,'News 4',':Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies quam vitae diam mattis facilisis. Donec in mi luctus metus placerat lacinia quis et libero. Nunc varius eu leo nec eleifend. Morbi porttitor, est et maximus egestas, magna dui congue dui, vel dictum magna sapien quis justo. Curabitur fermentum eros aliquet mauris dictum vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec at est consequat, fringilla metus at, aliquam tort','2019-03-02','news-template-img.jpg','bank');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_utente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'weak@bank.it','{th1s_is_n0t_the_f1ag}',0),(2,'adm1n@weakbank.it','weak_password',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14 23:51:11
