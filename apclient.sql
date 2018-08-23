-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for apclient
CREATE DATABASE IF NOT EXISTS `apclient` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `apclient`;


-- Dumping structure for table apclient.category
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table apclient.client
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tagihan` double NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(50) DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.client: ~0 rows (approximately)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`idclient`, `nama`, `email`, `tagihan`, `password`, `auth_key`, `status`) VALUES
	('001', 'Demo', 'demo@apadvocate.com', 100000000, '$2y$13$NbRr9gm4PLioLQ.mz.viUOxAekagzzppSZ3oY0nAQbeVVzmEUsbO6', 'LbbfafvtqD11-dQALAcOlfggTcWAmEMI', 'Y');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Dumping structure for table apclient.dokument
CREATE TABLE IF NOT EXISTS `dokument` (
  `iddokumen` int(11) NOT NULL AUTO_INCREMENT,
  `idcategory` int(11) NOT NULL,
  `idclient` char(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_upload` varchar(50) NOT NULL,
  PRIMARY KEY (`iddokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.dokument: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokument` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokument` ENABLE KEYS */;


-- Dumping structure for table apclient.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1533397697),
	('m130524_201442_init', 1533397701);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table apclient.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `idpayment` char(20) NOT NULL,
  `idclient` char(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nominal` double NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`idpayment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.payment: ~1 rows (approximately)
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`idpayment`, `idclient`, `keterangan`, `nominal`, `bukti_transfer`, `user_input`, `tanggal`) VALUES
	('BIL001', '001', 'Term Pembayaran 1', 500000000, 'upload.jpg', 'Rico', '2018-08-07 22:56:40');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


-- Dumping structure for table apclient.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apclient.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'LbbfafvtqD11-dQALAcOlfggTcWAmEMI', '$2y$13$NbRr9gm4PLioLQ.mz.viUOxAekagzzppSZ3oY0nAQbeVVzmEUsbO6', NULL, 'admin@apadvocates.com', 10, 1533571642, 1533571642);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
