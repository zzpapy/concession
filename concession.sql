-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour vehicules
CREATE DATABASE IF NOT EXISTS `vehicules` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `vehicules`;

-- Listage de la structure de la table vehicules. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `Id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `origine` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Id_marque`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table vehicules.marque : ~2 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`Id_marque`, `origine`, `nom`) VALUES
	(1, 'italie', 'FIAT'),
	(2, 'france', 'RENAULT');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. t1
CREATE TABLE IF NOT EXISTS `t1` (
  `jdoc` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table vehicules.t1 : ~0 rows (environ)
/*!40000 ALTER TABLE `t1` DISABLE KEYS */;
INSERT INTO `t1` (`jdoc`) VALUES
	('[{"Test1": {"Val1": "37", "Val2": "25"}}, {"Test2": {"Val1": "25", "Val2": "27"}}]'),
	('[{"Test1": {"Val1": "37", "Val2": "25"}}, {"Test2": {"Val1": "25", "Val2": "27"}}]'),
	('[{"toto": "tata"}]');
/*!40000 ALTER TABLE `t1` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. vehicule
CREATE TABLE IF NOT EXISTS `vehicule` (
  `Id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `immat` varchar(10) COLLATE utf8_bin NOT NULL,
  `modele` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `couleur` json DEFAULT NULL,
  `marque` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_marque`),
  UNIQUE KEY `immat` (`immat`),
  KEY `vehicule_marque_FK` (`marque_id`),
  CONSTRAINT `vehicule_marque_FK` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`Id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table vehicules.vehicule : ~3 rows (environ)
/*!40000 ALTER TABLE `vehicule` DISABLE KEYS */;
INSERT INTO `vehicule` (`Id_marque`, `immat`, `modele`, `couleur`, `marque`, `marque_id`) VALUES
	(2, 'ET-336-RX', 'panda', NULL, 'FIAT', 1),
	(5, 'ET-337-RX', 'punto', NULL, 'FIAT', 1),
	(8, 'ET-339-RX', 'clio', NULL, 'renault', 2);
/*!40000 ALTER TABLE `vehicule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
