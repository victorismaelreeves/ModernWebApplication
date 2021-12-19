# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.42)
# Database: books
# Generation Time: 2021-08-12 4:04:30 PM +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
                           `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                           `full_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `full_name`, `created_at`, `updated_at`)
VALUES
    (1,'Leo Tolstoy','2019-09-01 00:00:00','2019-09-02 15:03:20'),
    (2,'Gustave Flaubert','2019-09-01 00:00:00',NULL),
    (3,'F. Scott Fitzgerald','2019-09-01 00:00:00',NULL),
    (4,'Vladimir Nabokov','2019-09-01 00:00:00',NULL),
    (5,'George Eliot','2019-09-01 00:00:00',NULL),
    (6,'Pushkin Alexander','2019-09-02 14:58:56','2019-09-02 14:58:56');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                         `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `author_id` bigint(20) unsigned NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         KEY `books_author_id_foreign` (`author_id`),
                         CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `title`, `author_id`, `created_at`, `updated_at`)
VALUES
    (2,'Anna Karenina',1,'2019-09-01 00:00:00',NULL),
    (3,'War and Peace',1,'2019-09-01 00:00:00',NULL),
    (5,'Madame Bovary',2,'2019-09-01 00:00:00',NULL),
    (6,' The Great Gatsby',3,'2019-09-01 00:00:00',NULL),
    (7,'Lolita',4,'2019-09-01 00:00:00',NULL),
    (8,'Middlemarch',5,NULL,'2019-09-02 14:46:13');

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int(11) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
    (1,'2014_10_12_000000_create_users_table',1),
    (2,'2014_10_12_100000_create_password_resets_table',1),
    (6,'2019_09_01_140345_create_authors_table',2),
    (7,'2019_09_01_140740_create_books_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
