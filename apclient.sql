-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table apclient.category
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`idcategory`, `category`) VALUES
	(1, 'Quotation');
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
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.client: ~2 rows (approximately)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`idclient`, `nama`, `email`, `tagihan`, `password`, `auth_key`, `status`, `user_create`, `date_create`) VALUES
	('001', 'Demo', 'demo@apadvocate.com', 100000000, '$2y$13$NbRr9gm4PLioLQ.mz.viUOxAekagzzppSZ3oY0nAQbeVVzmEUsbO6', 'LbbfafvtqD11-dQALAcOlfggTcWAmEMI', 'N', '', '0000-00-00 00:00:00'),
	('client', 'adinugraha', 'muhamadadinugraha@gmail.com', 100000, '$2y$13$g4g5SjBvrIy4uaJnXjaFMe2oU01R/F8k9NvYL6FRvUVNeL5SNSqfy', 'u4sncBiKnrWdrm2Y9kAp1L_-oq2Ga1AN', 'Y', 'admin', '2018-08-30 05:05:42');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Dumping structure for table apclient.dokument
CREATE TABLE IF NOT EXISTS `dokument` (
  `iddokumen` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  `idclient` char(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_upload` varchar(50) NOT NULL,
  PRIMARY KEY (`iddokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.dokument: ~4 rows (approximately)
/*!40000 ALTER TABLE `dokument` DISABLE KEYS */;
INSERT INTO `dokument` (`iddokumen`, `kategori`, `idclient`, `filename`, `tanggal`, `user_upload`) VALUES
	(1, 'Quotation', 'client', '884-1-6281-1-10-20170814.pdf', '2018-08-30 00:00:00', 'admin'),
	(2, 'Quotation', 'client', 'Chrysanthemum.jpg', '2018-09-14 09:45:16', 'admin'),
	(3, 'Cases', 'client', 'Desert.jpg', '2018-09-14 10:42:40', 'admin'),
	(4, 'Invoice', 'client', 'Tulips.jpg', '2018-09-14 10:44:28', 'admin');
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
  `bukti_transfer` varchar(50) DEFAULT NULL,
  `user_approve` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`idpayment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table apclient.payment: ~1 rows (approximately)
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`idpayment`, `idclient`, `keterangan`, `nominal`, `bukti_transfer`, `user_approve`, `status`, `tanggal`) VALUES
	('BILL488129', 'client', 'dsf', 234, '', '', 0, '2018-09-14 11:21:30'),
	('BILL806762', 'client', 'Pembayaran Ke 5', 1000000, 'Lighthouse.jpg', 'admin', 1, '2018-09-14 11:33:13'),
	('BILL951571', 'client', 'asdasd', 34234, 'Desert.jpg', '', 0, '2018-09-14 11:31:41');
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
