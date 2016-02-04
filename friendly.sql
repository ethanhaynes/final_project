-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: friendly
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `interest` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_symbol` (`user_id`,`interest`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (3,63,'coffee'),(1,63,'friends');
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `sender_id` int(11) unsigned NOT NULL,
  `read` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (4,67,'there','hey',67,-1),(5,67,'message','hey',63,-1),(6,9,'there','hey',9,-1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `tagline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_symbol` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,9,'a tagline (or tag line) is a small amount of text which serves to clarify a thought for, or designed with a form of, dramatic effect.'),(2,8,'this is a tagline'),(3,63,'Today is a good day!'),(4,67,'This is a tagline');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,9,'first post','hello, world!','2015-12-01 01:38:45'),(3,8,'new post','This is a post','2015-12-01 22:36:05'),(4,9,'this is a title ','this is a message','2015-12-02 00:58:38'),(5,9,'this is a title','this is not','2015-12-02 00:59:19'),(6,9,'this is a title','this is not','2015-12-02 01:00:01'),(7,9,'hey','how','2015-12-02 01:03:44'),(8,9,'this is another title ','this is a really cool message','2015-12-02 01:24:35'),(10,67,'the walking dead','Would anyone like to share their thoughts on last week\'s midseason finale? I thought it was great, especially the promo for the next episode.','2015-12-06 13:18:02'),(11,9,'hey','there','2015-12-06 14:00:59'),(13,63,'first post','Happy to be here!','2015-12-06 15:36:41');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `post_id` int(11) unsigned NOT NULL,
  `poster_id` int(11) unsigned NOT NULL,
  `reply_id` int(11) unsigned NOT NULL,
  `reply` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,9,1,8,0,'Hello to you too','2015-12-01 02:02:05'),(2,9,1,9,1,'hi there','2015-12-01 02:20:58'),(3,9,1,8,0,'...','2015-12-01 15:05:33'),(60,8,1,9,0,'hey there','2015-12-01 23:32:05'),(61,9,3,9,0,'hey there','2015-12-02 01:02:08'),(62,9,4,9,0,'woah','2015-12-02 01:02:14'),(63,9,1,9,0,'this is a reply','2015-12-02 01:24:51'),(65,9,6,9,0,'cool!!!','2015-12-02 01:26:17'),(66,9,1,9,0,'woah, this is a great post','2015-12-02 01:26:30'),(71,9,6,9,0,'cool!!!','2015-12-02 01:29:20'),(72,9,6,9,0,'hey','2015-12-02 01:31:02'),(73,9,6,9,0,'osdifsodisiod','2015-12-02 01:36:22'),(74,9,6,9,0,'','2015-12-03 17:29:21'),(75,9,6,9,0,'','2015-12-03 17:30:05'),(76,9,6,9,0,'woah!','2015-12-03 17:30:28'),(77,9,6,9,0,'woah!','2015-12-03 17:43:32'),(78,9,6,9,0,'woah!','2015-12-03 18:05:54'),(79,9,6,9,0,'Woah','2015-12-03 18:23:15'),(80,9,6,9,0,'<iframe src=\"//giphy.com/embed/xeWd5LK7D8Rws\" width=\"480\" height=\"172\" frameBorder=\"0\" class=\"giphy-embed\" allowFullScreen></iframe><p><a href=\"http://giphy.com/gifs/forest-pixel-xeWd5LK7D8Rws\">via GIPHY</a></p>','2015-12-04 15:26:44'),(81,9,6,9,0,'A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.','2015-12-04 15:29:34'),(82,8,1,9,0,'<iframe src=\"//giphy.com/embed/aCpvwi2tuFQUE\" width=\"480\" height=\"230\" frameBorder=\"0\" class=\"giphy-embed\" allowFullScreen></iframe><p><a href=\"http://giphy.com/gifs/penguin-madagascar-penguins-of-aCpvwi2tuFQUE\"></a></p>','2015-12-04 15:32:01'),(83,8,1,9,0,'<iframe src=\"//giphy.com/embed/aCpvwi2tuFQUE\" width=\"480\" height=\"230\" frameBorder=\"0\" class=\"giphy-embed\" allowFullScreen></iframe><p><a href=\"http://giphy.com/gifs/penguin-madagascar-penguins-of-aCpvwi2tuFQUE\"></a></p>','2015-12-04 15:32:09'),(84,9,5,63,0,'nice','2015-12-06 09:09:11'),(85,0,0,63,0,'','2015-12-06 13:50:04'),(86,0,0,63,0,'','2015-12-06 13:53:07'),(87,0,0,63,0,'','2015-12-06 13:54:53'),(88,0,0,63,0,'','2015-12-06 13:55:25'),(89,0,0,9,0,'','2015-12-06 14:04:54'),(93,67,1,63,0,'Looks like a interesting turn for the cast! Can\'t wait!','2015-12-06 15:37:13');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS'),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa'),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW'),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G'),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe'),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy'),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK'),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2'),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK'),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e'),(63,'ethan','$2y$10$qlwTf1.tGPzKKzA0WYhTJOAFcIt2EqyNvEp6jXo6nMlD2xn5d7BH6'),(67,'ben','$2y$10$5EX7wcCgxA6e3rU3AKr.g.RioyRBcya/LyJY9186ADqRiq5mxJor6');
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

-- Dump completed on 2015-12-06 16:04:38
