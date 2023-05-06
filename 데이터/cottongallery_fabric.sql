-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: cottongallery
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `fabric`
--

DROP TABLE IF EXISTS `fabric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fabric` (
  `fabric_id` char(5) NOT NULL,
  `material` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `producer` varchar(20) DEFAULT NULL,
  `pattern` varchar(20) DEFAULT NULL,
  `count_of_yarn` decimal(3,0) DEFAULT NULL,
  `photo` mediumblob,
  PRIMARY KEY (`fabric_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabric`
--

LOCK TABLES `fabric` WRITE;
/*!40000 ALTER TABLE `fabric` DISABLE KEYS */;
INSERT INTO `fabric` VALUES ('C-501','cotton-100%','natural','Canvas',NULL,10,NULL),('C-502','cotton-100%','snow white','Canvas',NULL,10,NULL),('C-503','cotton-100%','while ivory','Canvas',NULL,10,NULL),('C-504','cotton-100%','egg shell','Canvas',NULL,10,NULL),('C-505','cotton-100%','yellow','Canvas',NULL,10,NULL),('C-506','cotton-100%','light gold','Canvas',NULL,10,NULL),('C-507','cotton-100%','gold','Canvas',NULL,10,NULL),('C-508','cotton-100%','natural green','Canvas',NULL,10,NULL),('C-509','cotton-100%','mung bean green','Canvas',NULL,10,NULL),('C-510','cotton-100%','peach green','Canvas',NULL,10,NULL),('C-511','cotton-100%','grass green','Canvas',NULL,10,NULL),('C-512','cotton-100%','khaki','Canvas',NULL,10,NULL),('C-513','cotton-100%','tender green','Canvas',NULL,10,NULL),('C-514','cotton-100%','green','Canvas',NULL,10,NULL),('C-515','cotton-100%','d.green','Canvas',NULL,10,NULL),('C-516','cotton-100%','lime olive','Canvas',NULL,10,NULL),('C-517','cotton-100%','olive','Canvas',NULL,10,NULL),('C-518','cotton-100%','light khaki','Canvas',NULL,10,NULL),('C-519','cotton-100%','raw umber khaki','Canvas',NULL,10,NULL),('C-520','cotton-100%','terra khaki','Canvas',NULL,10,NULL),('C-521','cotton-100%','dark khaki','Canvas',NULL,10,NULL),('C-522','cotton-100%','deep green','Canvas',NULL,10,NULL),('C-523','cotton-100%','lawn green','Canvas',NULL,10,NULL),('C-524','cotton-100%','light beige','Canvas',NULL,10,NULL),('C-525','cotton-100%','yellow beige','Canvas',NULL,10,NULL),('C-526','cotton-100%','milk beige','Canvas',NULL,10,NULL),('C-527','cotton-100%','drab beige','Canvas',NULL,10,NULL),('C-528','cotton-100%','moss beige','Canvas',NULL,10,NULL),('C-529','cotton-100%','camel','Canvas',NULL,10,NULL),('C-530','cotton-100%','caramel beige','Canvas',NULL,10,NULL),('C-531','cotton-100%','brown','Canvas',NULL,10,NULL),('C-532','cotton-100%','chocalate','Canvas',NULL,10,NULL),('C-533','cotton-100%','depp brown','Canvas',NULL,10,NULL),('C-534','cotton-100%','dark brown','Canvas',NULL,10,NULL),('C-535','cotton-100%','ash pink','Canvas',NULL,10,NULL),('C-536','cotton-100%','wee pink','Canvas',NULL,10,NULL),('C-537','cotton-100%','skin pink','Canvas',NULL,10,NULL),('C-538','cotton-100%','tan pink','Canvas',NULL,10,NULL),('C-539','cotton-100%','salmon','Canvas',NULL,10,NULL),('C-540','cotton-100%','baby pink','Canvas',NULL,10,NULL),('C-541','cotton-100%','light pink','Canvas',NULL,10,NULL),('C-542','cotton-100%','pink','Canvas',NULL,10,NULL),('C-543','cotton-100%','opera pink','Canvas',NULL,10,NULL),('C-544','cotton-100%','hot pink','Canvas',NULL,10,NULL),('C-545','cotton-100%','deep pink','Canvas',NULL,10,NULL),('C-546','cotton-100%','peach puff','Canvas',NULL,10,NULL),('C-547','cotton-100%','yellow red','Canvas',NULL,10,NULL),('C-548','cotton-100%','scarlet','Canvas',NULL,10,NULL),('C-549','cotton-100%','red','Canvas',NULL,10,NULL),('C-550','cotton-100%','crimson','Canvas',NULL,10,NULL),('C-551','cotton-100%','dark red','Canvas',NULL,10,NULL),('C-552','cotton-100%','red violet','Canvas',NULL,10,NULL),('C-553','cotton-100%','megenta','Canvas',NULL,10,NULL),('C-554','cotton-100%','dark violet','Canvas',NULL,10,NULL),('C-555','cotton-100%','blue violet','Canvas',NULL,10,NULL),('C-556','cotton-100%','sky','Canvas',NULL,10,NULL),('C-557','cotton-100%','pale blue','Canvas',NULL,10,NULL),('C-558','cotton-100%','spearmint','Canvas',NULL,10,NULL),('C-559','cotton-100%','pearl apua','Canvas',NULL,10,NULL),('C-560','cotton-100%','medium blue','Canvas',NULL,10,NULL),('C-561','cotton-100%','honeydew blue','Canvas',NULL,10,NULL),('C-562','cotton-100%','turkey blue','Canvas',NULL,10,NULL),('C-563','cotton-100%','silver blue','Canvas',NULL,10,NULL),('C-564','cotton-100%','qing blue','Canvas',NULL,10,NULL),('C-565','cotton-100%','fresca blue','Canvas',NULL,10,NULL),('C-566','cotton-100%','cerulean blue','Canvas',NULL,10,NULL),('C-567','cotton-100%','dazzing blue','Canvas',NULL,10,NULL),('C-568','cotton-100%','cobalt','Canvas',NULL,10,NULL),('C-569','cotton-100%','bink gray','Canvas',NULL,10,NULL),('C-570','cotton-100%','bink green','Canvas',NULL,10,NULL),('C-571','cotton-100%','maroon blue','Canvas',NULL,10,NULL),('C-572','cotton-100%','silver','Canvas',NULL,10,NULL),('C-573','cotton-100%','light gray','Canvas',NULL,10,NULL),('C-574','cotton-100%','gray','Canvas',NULL,10,NULL),('C-575','cotton-100%','space','Canvas',NULL,10,NULL),('C-576','cotton-100%','deep gray','Canvas',NULL,10,NULL),('C-577','cotton-100%','neutral gray','Canvas',NULL,10,NULL),('C-578','cotton-100%','cherry gray','Canvas',NULL,10,NULL),('C-579','cotton-100%','charcoal','Canvas',NULL,10,NULL),('C-580','cotton-100%','ink gray','Canvas',NULL,10,NULL),('C-581','cotton-100%','dark brown gray','Canvas',NULL,10,NULL),('C-582','cotton-100%','navy','Canvas',NULL,10,NULL),('C-583','cotton-100%','dark navy','Canvas',NULL,10,NULL),('C-584','cotton-100%','ink navy','Canvas',NULL,10,NULL),('C-585','cotton-100%','black','Canvas',NULL,10,NULL);
/*!40000 ALTER TABLE `fabric` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03 14:33:39
