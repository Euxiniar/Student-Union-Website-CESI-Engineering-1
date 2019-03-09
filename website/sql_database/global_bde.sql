-- --------------------------------------------------------
-- Host:                         global.bde.studisys.net
-- Server version:               10.3.12-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for global_bde
DROP DATABASE IF EXISTS `global_bde`;
CREATE DATABASE IF NOT EXISTS `global_bde` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `global_bde`;

-- Dumping structure for table global_bde.campus
DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `ID_Campus` int(11) NOT NULL AUTO_INCREMENT,
  `Campus` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Campus`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table global_bde.campus: ~25 rows (approximately)
/*!40000 ALTER TABLE `campus` DISABLE KEYS */;
REPLACE INTO `campus` (`ID_Campus`, `Campus`) VALUES
	(1, 'Orléans'),
	(2, 'Lille'),
	(3, 'Arras'),
	(4, 'Rouen'),
	(5, 'Caen'),
	(6, 'Reims'),
	(7, 'Paris-Nanterre'),
	(8, 'Nancy'),
	(9, 'Strasbourg'),
	(10, 'Dijon'),
	(11, 'Lyon'),
	(12, 'Grenoble'),
	(13, 'Nice'),
	(14, 'Aix-en-Provence'),
	(15, 'Montpellier'),
	(16, 'Toulouse'),
	(17, 'Pau'),
	(18, 'Bordeaux'),
	(19, 'Angoulême'),
	(20, 'La Rochelle'),
	(21, 'Châteauroux'),
	(22, 'Le Mans'),
	(23, 'Nantes'),
	(24, 'Saint-Nazaire'),
	(25, 'Brest');
/*!40000 ALTER TABLE `campus` ENABLE KEYS */;

-- Dumping structure for table global_bde.gender
DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `ID_Gender` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Gender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table global_bde.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
REPLACE INTO `gender` (`ID_Gender`, `Gender`) VALUES
	(1, 'Male'),
	(2, 'Female'),
	(3, 'Other');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for procedure global_bde.RecupInfo
DROP PROCEDURE IF EXISTS `RecupInfo`;
DELIMITER //
CREATE DEFINER=`global_wadm`@`%` PROCEDURE `RecupInfo`(IN idCampus INT, IN idRole INT ,OUT Camp VARCHAR(45), OUT R VARCHAR(45))
BEGIN
  SELECT Campus INTO Camp
  FROM campus
  WHERE ID_Campus=idCampus;

  SELECT Role INTO R
  FROM role
  WHERE ID_Role=idRole;

END//
DELIMITER ;

-- Dumping structure for table global_bde.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_Role` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table global_bde.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
REPLACE INTO `role` (`ID_Role`, `Role`) VALUES
	(1, 'Student'),
	(2, 'Staff'),
	(3, 'Cesi');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for procedure global_bde.spi_user
DROP PROCEDURE IF EXISTS `spi_user`;
DELIMITER //
CREATE DEFINER=`global_wadm`@`%` PROCEDURE `spi_user`(F_Name VARCHAR(40), L_Name VARCHAR(40), Email VARCHAR(255),
 ID_Campus INT, ID_Gender INT, ID_Role INT)
BEGIN
INSERT INTO `global_bde`.users
(F_Name,
L_Name,
Email,
ID_Campus,
ID_Gender,
ID_Role)
VALUES
(F_Name, L_Name , Email ,
 ID_Campus , ID_Gender , ID_Role);
END//
DELIMITER ;

-- Dumping structure for procedure global_bde.spl_user_by_email
DROP PROCEDURE IF EXISTS `spl_user_by_email`;
DELIMITER //
CREATE DEFINER=`global_wadm`@`%` PROCEDURE `spl_user_by_email`(mail VARCHAR(255))
BEGIN
	SELECT *
    FROM users
    WHERE Email=mail;
END//
DELIMITER ;

-- Dumping structure for table global_bde.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_Users` int(11) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(50) NOT NULL,
  `L_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ID_Campus` int(11) NOT NULL,
  `ID_Gender` int(11) NOT NULL,
  `ID_Role` int(11) NOT NULL,
  PRIMARY KEY (`ID_Users`),
  KEY `users_campus_FK` (`ID_Campus`),
  KEY `users_gender0_FK` (`ID_Gender`),
  KEY `users_role1_FK` (`ID_Role`),
  CONSTRAINT `users_campus_FK` FOREIGN KEY (`ID_Campus`) REFERENCES `campus` (`ID_Campus`),
  CONSTRAINT `users_gender0_FK` FOREIGN KEY (`ID_Gender`) REFERENCES `gender` (`ID_Gender`),
  CONSTRAINT `users_role1_FK` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table global_bde.users: ~15 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`ID_Users`, `F_Name`, `L_Name`, `Email`, `ID_Campus`, `ID_Gender`, `ID_Role`) VALUES
	(13, 'Elève', 'CESI', 'demo.eleve@viacesi.fr', 1, 2, 1),
	(14, 'Membre', 'BDE', 'demo.bde@viacesi.fr', 1, 1, 2),
	(15, 'Personnel ', 'CESI', 'demo.cesi@cesi.fr', 1, 2, 3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
