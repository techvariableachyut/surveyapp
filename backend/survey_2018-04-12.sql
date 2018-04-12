# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: survey
# Generation Time: 2018-04-12 08:26:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surveyId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done` int(2) DEFAULT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;

INSERT INTO `answers` (`id`, `surveyId`, `answer`, `created_at`, `updated_at`, `token`, `done`, `email`)
VALUES
	(2,'5acf11288a664','{\"currentPageNo\":\"0\",\"data\":{\"question1\":\"item1\",\"question2\":\"dsadAdad\"}}','2018-04-12 07:56:54','2018-04-12 07:56:54',NULL,NULL,NULL),
	(3,'5acf11288a664','{\"currentPageNo\":\"0\",\"data\":{\"question1\":\"item1\",\"question2\":\"zcC\"}}','2018-04-12 07:59:13','2018-04-12 07:59:13','5acf11d1329f5',1,NULL),
	(4,'5acf11288a664','{\"currentPageNo\":\"0\",\"data\":{\"question2\":\"czx\",\"question1\":\"item1\"}}','2018-04-12 07:59:26','2018-04-12 07:59:26','5acf11de23efc',1,NULL),
	(5,'5acf11ff60e25','{\"currentPageNo\":\"0\",\"data\":{\"question2\":\"item3\",\"question3\":\"item3\",\"question5\":\"item1\",\"question8\":\"item2\"}}','2018-04-12 08:00:33','2018-04-12 08:00:33','5acf1221a39fe',1,NULL);

/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_04_03_070754_create_questions_table',1),
	(4,'2018_04_03_071202_create_sections_table',1),
	(5,'2018_04_04_082032_create_dropdownvalues_table',2),
	(6,'2018_04_12_064308_create_answers_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `json` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `token`, `title`, `json`, `created_at`, `updated_at`)
VALUES
	(34,'5acf11288a664','Test','[{\"name\":\"page1\",\"elements\":[{\"type\":\"comment\",\"name\":\"question2\"},{\"type\":\"radiogroup\",\"name\":\"question1\",\"choices\":[\"item1\",\"item2\",\"item3\"]}]}]','2018-04-12 07:56:32','2018-04-12 07:56:39'),
	(35,'5acf11ff60e25','5acf11ff60e25','[{\"name\":\"page1\",\"elements\":[{\"type\":\"text\",\"name\":\"question1\"},{\"type\":\"dropdown\",\"name\":\"question2\",\"choices\":[\"item1\",\"item2\",\"item3\"]},{\"type\":\"dropdown\",\"name\":\"question3\",\"choices\":[\"item1\",\"item2\",\"item3\"]},{\"type\":\"html\",\"name\":\"question4\"},{\"type\":\"radiogroup\",\"name\":\"question5\",\"choices\":[\"item1\",\"item2\",\"item3\"]},{\"type\":\"radiogroup\",\"name\":\"question6\",\"choices\":[\"item1\",\"item2\",\"item3\"]},{\"type\":\"dropdown\",\"name\":\"question7\",\"choices\":[\"item1\",\"item2\",\"item3\"]},{\"type\":\"dropdown\",\"name\":\"question8\",\"choices\":[\"item1\",\"item2\",\"item3\"]}]}]','2018-04-12 08:00:02','2018-04-12 08:00:15');

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@gmail.com','$2y$10$FaItqC3AZ4lvsWSLbTzXz.bnJxKl9CyhmfyQ4vyDoJN07bThz0eVW','SdS7mdwumSiqTevbjxvWDMDiEw62G41dnKis4n7fq8BGguozd5ilrupETgv6','2018-04-10 19:40:53','2018-04-10 19:40:53'),
	(2,'','','',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
