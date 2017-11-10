-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Current Database: `blog`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blog`;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `text` text,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Dusan','super tekst!',1),(3,'Gojko','kull post',2),(4,'Sanela','odlican tekst',4),(5,'JelenaIlic',':D',2),(6,'mile',':)',3),(8,'milan','kull',4),(9,'zeljko',':)',1),(10,'jelena','blabla',1),(11,'jelena','blablabla',1),(12,'dusan','super',4),(14,'jelena','super',3);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `body` text,
  `author` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Post title','Lorem ipsum dolor sit amet, mel ex eleifend scripserit. Legere fabulas nostrum id usu, mei velit officiis ne. Cum ut falli meliore tincidunt, nullam tritani dissentias quo ne. Omnis admodum his an, sint deterruisset vel te, laboramus intellegat vel eu.\n\nMinim persius appellantur qui eu, nec omnis option argumentum eu, id prompta eloquentiam duo. Nam dolore fabulas ei, perfecto eleifend est an, est ex sint facete. Sea tale suavitate disputando ea. Id sed integre ornatus dignissim, et dicam ullamcorper ius, graeco principes no eos. Ut sea eius verterem vituperatoribus.\n\nId possit scaevola vis. Te veniam possim imperdiet cum, est in ullum debet. Eam suas tritani eleifend an, euismod vulputate ea has, pri modo denique et. Ei mel diam civibus eligendi. Nam dicunt elaboraret ei, te mea dictas fuisset pertinacia.','JelenaV','2017-11-08 16:47:00'),(2,'Another post title','Lorem ipsum dolor sit amet, mel ex eleifend scripserit. Legere fabulas nostrum id usu, mei velit officiis ne. Cum ut falli meliore tincidunt, nullam tritani dissentias quo ne. Omnis admodum his an, sint deterruisset vel te, laboramus intellegat vel eu.\n\nMinim persius appellantur qui eu, nec omnis option argumentum eu, id prompta eloquentiam duo. Nam dolore fabulas ei, perfecto eleifend est an, est ex sint facete. Sea tale suavitate disputando ea. Id sed integre ornatus dignissim, et dicam ullamcorper ius, graeco principes no eos. Ut sea eius verterem vituperatoribus.\n\nId possit scaevola vis. Te veniam possim imperdiet cum, est in ullum debet. Eam suas tritani eleifend an, euismod vulputate ea has, pri modo denique et. Ei mel diam civibus eligendi. Nam dicunt elaboraret ei, te mea dictas fuisset pertinacia.','JelenaV','2017-11-07 13:27:00'),(3,'Some other post title','Minim persius appellantur qui eu, nec omnis option argumentum eu, id prompta eloquentiam duo. Nam dolore fabulas ei, perfecto eleifend est an, est ex sint facete. Sea tale suavitate disputando ea. Id sed integre ornatus dignissim, et dicam ullamcorper ius, graeco principes no eos. Ut sea eius verterem vituperatoribus.\n\nId possit scaevola vis. Te veniam possim imperdiet cum, est in ullum debet. Eam suas tritani eleifend an, euismod vulputate ea has, pri modo denique et. Ei mel diam civibus eligendi. Nam dicunt elaboraret ei, te mea dictas fuisset pertinacia.\n\nCum ut quem reque voluptaria. Debet incorrupte et vim, ne molestiae ullamcorper eum. No mei diam mutat, eam dico fierent scripserit cu, mea possit fabulas tractatos ex. Malis accumsan est an. Sit quas elitr ad, everti impetus nusquam vim ea.\n\nId ridens prompta accusam nec, cu liber movet scribentur est, quas vidisse argumentum ei duo. Lobortis pertinacia ea has, honestatis reprehendunt et pro. Ad duo wisi quidam, ei utamur mnesarchum qui. Corpora sententiae nam eu, eos no modo scripta. Vix dicta mundi simul ut, congue consulatu in vim. Sapientem adversarium cum ad, in sit case impedit.','JelenaV','2017-11-01 10:21:00'),(4,'Some other post title','Nam dolore fabulas ei, perfecto eleifend est an, est ex sint facete. Sea tale suavitate disputando ea. Id sed integre ornatus dignissim, et dicam ullamcorper ius, graeco principes no eos. Ut sea eius verterem vituperatoribus.\n\nId possit scaevola vis. Te veniam possim imperdiet cum, est in ullum debet. Eam suas tritani eleifend an, euismod vulputate ea has, pri modo denique et. Ei mel diam civibus eligendi. Nam dicunt elaboraret ei, te mea dictas fuisset pertinacia.\n\nCum ut quem reque voluptaria. Debet incorrupte et vim, ne molestiae ullamcorper eum. No mei diam mutat, eam dico fierent scripserit cu, mea possit fabulas tractatos ex. Malis accumsan est an. Sit quas elitr ad, everti impetus nusquam vim ea.\n\nId ridens prompta accusam nec, cu liber movet scribentur est, quas vidisse argumentum ei duo. Lobortis pertinacia ea has, honestatis reprehendunt et pro. Ad duo wisi quidam, ei utamur mnesarchum qui. Corpora sententiae nam eu, eos no modo scripta. Vix dicta mundi simul ut, congue consulatu in vim. Sapientem adversarium cum ad, in sit case impedit.','JelenaV','2017-10-27 10:00:00'),(8,'New post','Lorem ipsum dolor sit amet, no duo nisl iudico, sed omnes fuisset cotidieque te. Ad per dolorum elaboraret. Pro an utroque scribentur, per nonumes conceptam an. Ad eos alii insolens, voluptaria voluptatum sed eu, ne error melius qui. Tale sensibus ea has, brute animal mentitum et nec. At vide solum affert mei.\r\n\r\nEst no audire facilis instructior, ne aperiam deseruisse vel. Vel ex luptatum scribentur, ea nam nostro erroribus, adipiscing reprehendunt in his. Te ferri porro sapientem qui. Graeco mentitum ei qui, eu saepe virtute rationibus duo. Erant dictas offendit et duo, sed ne debitis laboramus. Veniam audiam adipiscing pro eu, duo luptatum tractatos consulatu ad, vis esse legere id.\r\n\r\nAt nobis iracundia sit, his esse blandit ei, sea dicta nostrud rationibus at. Vix ceteros honestatis no, te movet imperdiet conclusionemque est. Solum doming vituperatoribus quo no, no pro inani omnesque, nibh labores sea eu. Duo ad aperiri constituam, mea at epicurei consectetuer, ludus veniam labores ius no.\r\n\r\nVis ne admodum denique expetenda, atqui partem ius an. Malis nominati nec ut, cu esse tation his. Sale semper quo ea, ei volutpat splendide instructior nec, ei reque erroribus mnesarchum duo. Veritus senserit convenire his ut. Eros impetus omnesque eu duo, erant persius eos ut.\r\n\r\nEx quod magna constituto vix, his clita melius no, id wisi intellegam eos. Duo et quas quidam, eruditi veritus euripidis mei ea. Ad virtute honestatis quo, te per odio vitae molestie. Affert suavitate id eum, pertinax definitionem eu vel, sit dico luptatum senserit in. Sit commodo dignissim te, in vim regione assueverit dissentiunt, errem possit civibus ea eos.','JelenaV','2017-11-11 21:59:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-10 22:19:11
