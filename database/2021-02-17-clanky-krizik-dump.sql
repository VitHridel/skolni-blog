CREATE DATABASE  IF NOT EXISTS `clanky-krizik` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `clanky-krizik`;
-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: clanky-krizik
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `idautor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `heslo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idautor`),
  UNIQUE KEY `idautor_UNIQUE` (`idautor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Pepa','Vomáčka','pepa.vomacka@email.cz','29d847ffce86b63c39a756a25b198751'),(2,'František','Novotný','frantisek.novotny@email.cz','29d847ffce86b63c39a756a25b198751'),(3,'Jarmila','Moudrá','jarmila.moudra@email.cz','29d847ffce86b63c39a756a25b198751'),(4,'Anička','Nejedlá','anicka.nejedla@email.cz','29d847ffce86b63c39a756a25b198751'),(5,'Kryštof','Pohádka','krystof.pohadka@email.cz','29d847ffce86b63c39a756a25b198751');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clanky`
--

DROP TABLE IF EXISTS `clanky`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clanky` (
  `idclanky` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulek` varchar(255) NOT NULL,
  `obsah` text NOT NULL,
  `idkategorie` int(10) unsigned NOT NULL,
  `idautor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idclanky`,`idkategorie`,`idautor`),
  UNIQUE KEY `idclanky_UNIQUE` (`idclanky`),
  UNIQUE KEY `titulek_UNIQUE` (`titulek`),
  KEY `fk_clanky_kategorie_idx` (`idkategorie`),
  KEY `fk_clanky_autor1_idx` (`idautor`),
  CONSTRAINT `fk_clanky_autor1` FOREIGN KEY (`idautor`) REFERENCES `autor` (`idautor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clanky_kategorie` FOREIGN KEY (`idkategorie`) REFERENCES `kategorie` (`idkategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clanky`
--

LOCK TABLES `clanky` WRITE;
/*!40000 ALTER TABLE `clanky` DISABLE KEYS */;
INSERT INTO `clanky` VALUES (1,'Připojení k databázi',' Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam eget nisl. Fusce consectetuer risus a nunc. Nullam dapibus fermentum ipsum. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Maecenas lorem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Maecenas lorem. Suspendisse nisl. Duis risus. Et harum quidem rerum facilis est et expedita distinctio. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nullam at arcu a est sollicitudin euismod. Etiam dictum tincidunt diam. Aenean vel massa quis mauris vehicula lacinia. Nulla non lectus sed nisl molestie malesuada. In convallis. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. ',1,4),(2,'Jak projít k maturitě',' Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer pellentesque quam vel velit. Aliquam ornare wisi eu metus. Maecenas sollicitudin. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Curabitur bibendum justo non orci. Integer pellentesque quam vel velit. Suspendisse sagittis ultrices augue. Mauris tincidunt sem sed arcu. Nulla non lectus sed nisl molestie malesuada. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Phasellus rhoncus. Nulla quis diam. ',3,5),(3,'Úspěšný život po maturitě',' Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam dapibus fermentum ipsum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Aliquam ornare wisi eu metus. Nunc dapibus tortor vel mi dapibus sollicitudin. Donec iaculis gravida nulla. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Mauris tincidunt sem sed arcu. Integer tempor. ',4,3),(4,'Cesta na pracák',' Quisque porta. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Duis viverra diam non justo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis risus. Proin mattis lacinia justo. Integer malesuada. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Curabitur vitae diam non enim vestibulum interdum. Aliquam erat volutpat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Integer pellentesque quam vel velit. Pellentesque sapien. Integer in sapien. Pellentesque sapien. Fusce suscipit libero eget elit. Duis risus. ',2,2),(5,'Jak se odborně vzdělávat',' Quisque porta. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Duis viverra diam non justo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis risus. Proin mattis lacinia justo. Integer malesuada. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Curabitur vitae diam non enim vestibulum interdum. Aliquam erat volutpat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Integer pellentesque quam vel velit. Pellentesque sapien. Integer in sapien. Pellentesque sapien. Fusce suscipit libero eget elit. Duis risus. ',1,2);
/*!40000 ALTER TABLE `clanky` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `idkategorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazev` varchar(255) NOT NULL,
  PRIMARY KEY (`idkategorie`),
  UNIQUE KEY `idkategorie_UNIQUE` (`idkategorie`),
  UNIQUE KEY `nazev_UNIQUE` (`nazev`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
INSERT INTO `kategorie` VALUES (4,'Databaze'),(2,'Elektro'),(1,'IT'),(3,'Programovani');
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-17 10:57:52
