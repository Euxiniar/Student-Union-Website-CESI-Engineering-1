-- --------------------------------------------------------
-- Host:                         orleans.bde.studisys.net
-- Server version:               10.3.12-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for orleans_bde
DROP DATABASE IF EXISTS `orleans_bde`;
CREATE DATABASE IF NOT EXISTS `orleans_bde` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `orleans_bde`;

-- Dumping structure for table orleans_bde.article
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Id_article` int(11) NOT NULL AUTO_INCREMENT,
  `Cout` float NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `Nbr_achats` int(11) NOT NULL,
  `Stock` int(11) NOT NULL DEFAULT 0,
  `Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_article`),
  KEY `fk_Article_Catégorie1_idx` (`Id_categorie`),
  CONSTRAINT `fk_Article_Catégorie1` FOREIGN KEY (`Id_categorie`) REFERENCES `catégorie` (`Id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.article: ~5 rows (approximately)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
REPLACE INTO `article` (`Id_article`, `Cout`, `Titre`, `Description`, `Image`, `Nbr_achats`, `Stock`, `Id_categorie`) VALUES
	(1, 25, 'Clé USB cubes', 'Espace de stockage : 32Go   -   Vitesse de lecture : 100Mo/s', '../assets/img/articles/-2019-01-29-21-25-23-cle.jpg', 0, 42, 10),
	(2, 15, 'Tasse magique', 'Tasse magique ! Le texte apparaît quand c\'est chaud ! :p', '../assets/img/articles/16-2019-01-29-21-27-04-51RMcof12hL._SX466_.jpg', 0, 50, 1),
	(3, 1, '4 couleurs', 'Une description est elle nécessaire ?', '../assets/img/articles/16-2019-01-29-21-27-53-90131.jpg', 0, 115, 3),
	(4, 10, 'T-Shirt Blanc', 'Taille S seulement !', '../assets/img/articles/16-2019-01-29-21-28-48-white-tshirt.jpg', 0, 21, 1),
	(5, 10, 'T-Shirt Orange', 'Taille M seulement !', '../assets/img/articles/16-2019-01-29-21-29-27-téléchargement.jpg', 0, 18, 1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.article_par_commande
DROP TABLE IF EXISTS `article_par_commande`;
CREATE TABLE IF NOT EXISTS `article_par_commande` (
  `Id_commande` int(11) NOT NULL,
  `Id_article` int(11) NOT NULL,
  `Quantite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_commande`,`Id_article`),
  KEY `fk_Article_par_commande_Commande1_idx` (`Id_commande`),
  KEY `fk_Article_par_commande_Article1_idx` (`Id_article`),
  CONSTRAINT `fk_Article_par_commande_Article1` FOREIGN KEY (`Id_article`) REFERENCES `article` (`Id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_par_commande_Commande1` FOREIGN KEY (`Id_commande`) REFERENCES `commande` (`Id_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- Dumping structure for table orleans_bde.catégorie
DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.catégorie: ~11 rows (approximately)
/*!40000 ALTER TABLE `catégorie` DISABLE KEYS */;
REPLACE INTO `catégorie` (`Id_categorie`, `Designation`) VALUES
	(1, 'Vetement'),
	(2, 'Bracelet'),
	(3, 'Stylo'),
	(4, 'Mug'),
	(5, 'Gobelet'),
	(6, 'Feutre'),
	(7, 'Lunettes'),
	(8, 'Collier'),
	(9, 'Porte-clés'),
	(10, 'Clé USB'),
	(13, 'test');
/*!40000 ALTER TABLE `catégorie` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.centre
DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `idCentre` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) NOT NULL,
  PRIMARY KEY (`idCentre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.centre: ~0 rows (approximately)
/*!40000 ALTER TABLE `centre` DISABLE KEYS */;
REPLACE INTO `centre` (`idCentre`, `Designation`) VALUES
	(1, 'Orléans');
/*!40000 ALTER TABLE `centre` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.commande
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `Id_utilisateur` int(11) NOT NULL,
  `Cout_total` float NOT NULL,
  `Nbr_article` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `Commande_payee` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id_commande`),
  KEY `Commande_Utilisateur_FK` (`Id_utilisateur`),
  CONSTRAINT `Commande_Utilisateur_FK` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;


-- Dumping structure for table orleans_bde.commentaire
DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Texte` text NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Id_status` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_photo` int(11) NOT NULL,
  `Id_evenement` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_commentaire`),
  KEY `Commentaire_Utilisateur0_FK` (`Id_utilisateur`),
  KEY `fk_Commentaire_Photo1_idx` (`Id_photo`),
  KEY `Id_evenement_idx` (`Id_evenement`),
  CONSTRAINT `Commentaire_Utilisateur0_FK` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`),
  CONSTRAINT `fk_Commentaire_Photo1` FOREIGN KEY (`Id_photo`) REFERENCES `photo` (`Id_photo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



-- Dumping structure for table orleans_bde.evenement
DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `Id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) NOT NULL,
  `Date_evenement` date NOT NULL,
  `Date_de_creation` date NOT NULL,
  `Date_de_fin` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `Description` text NOT NULL,
  `Cout` float NOT NULL,
  `Nbr_participants` int(11) NOT NULL,
  `URL_photo` varchar(255) NOT NULL,
  `Nbr_votes` int(11) DEFAULT 0,
  `Lieu` varchar(50) DEFAULT '1 allé du titane',
  `Id_utilisateur` int(11) NOT NULL,
  `Id_reccurrence` int(11) DEFAULT NULL,
  `Is_idea` tinyint(4) NOT NULL,
  `Id_status_date` int(11) DEFAULT NULL,
  `Id_status_accessibilite` int(11) NOT NULL,
  PRIMARY KEY (`Id_evenement`),
  KEY `Evenement_Utilisateur_FK` (`Id_utilisateur`),
  KEY `fk_Evenement_Reccurrences1_idx` (`Id_reccurrence`),
  KEY `fk_Evenement_Status_date1_idx` (`Id_status_date`),
  KEY `fk_Evenement_StatusAccessibilite1_idx` (`Id_status_accessibilite`),
  CONSTRAINT `Evenement_Utilisateur_FK` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`),
  CONSTRAINT `fk_Evenement_Reccurrences1` FOREIGN KEY (`Id_reccurrence`) REFERENCES `recurrences` (`Id_recurrence`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evenement_StatusAccessibilite1` FOREIGN KEY (`Id_status_accessibilite`) REFERENCES `statusaccessibilite` (`Id_status_accessibilite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evenement_Status_date1` FOREIGN KEY (`Id_status_date`) REFERENCES `status_date` (`Id_status_date`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



-- Dumping structure for table orleans_bde.genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `Id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.genre: ~2 rows (approximately)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
REPLACE INTO `genre` (`Id_genre`, `Designation`) VALUES
	(1, 'Homme'),
	(2, 'Femme'),
	(3, 'Autre');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.likephoto
DROP TABLE IF EXISTS `likephoto`;
CREATE TABLE IF NOT EXISTS `likephoto` (
  `Id_photo` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_photo`,`Id_utilisateur`),
  KEY `fk_LikePhoto_Photo1_idx` (`Id_photo`),
  KEY `fk_LikePhoto_Utilisateur1_idx` (`Id_utilisateur`),
  CONSTRAINT `fk_LikePhoto_Photo1` FOREIGN KEY (`Id_photo`) REFERENCES `photo` (`Id_photo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_LikePhoto_Utilisateur1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- Dumping structure for table orleans_bde.participant_evenement
DROP TABLE IF EXISTS `participant_evenement`;
CREATE TABLE IF NOT EXISTS `participant_evenement` (
  `Id_utilisateur` int(11) NOT NULL,
  `Id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`Id_utilisateur`,`Id_evenement`),
  CONSTRAINT `Participant_evenement_Utilisateur_FK` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table orleans_bde.photo
DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `Id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Status` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_evenement` int(11) NOT NULL,
  `Nbr_like` int(11) NOT NULL DEFAULT 0,
  `URL_photo` varchar(100) DEFAULT NULL COMMENT '/uploads/img/events/nom.extension',
  PRIMARY KEY (`Id_photo`),
  KEY `Photo_Utilisateur_FK` (`Id_utilisateur`),
  KEY `Photo_Evenement0_FK` (`Id_evenement`),
  CONSTRAINT `Photo_Evenement0_FK` FOREIGN KEY (`Id_evenement`) REFERENCES `evenement` (`Id_evenement`),
  CONSTRAINT `Photo_Utilisateur_FK` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



-- Dumping structure for table orleans_bde.recurrences
DROP TABLE IF EXISTS `recurrences`;
CREATE TABLE IF NOT EXISTS `recurrences` (
  `Id_recurrence` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_recurrence`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.recurrences: ~2 rows (approximately)
/*!40000 ALTER TABLE `recurrences` DISABLE KEYS */;
REPLACE INTO `recurrences` (`Id_recurrence`, `Designation`) VALUES
	(1, 'Toutes les semaines'),
	(2, 'Tous les mois'),
	(3, 'Tous les ans'),
	(4, 'Aucune Reccurrence');
/*!40000 ALTER TABLE `recurrences` ENABLE KEYS */;

-- Dumping structure for procedure orleans_bde.spd_commentaire_by_id
DROP PROCEDURE IF EXISTS `spd_commentaire_by_id`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_commentaire_by_id`(id INT)
BEGIN
	DELETE FROM commentaire
	WHERE Id_commentaire = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_commentaire_by_id_photo
DROP PROCEDURE IF EXISTS `spd_commentaire_by_id_photo`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_commentaire_by_id_photo`(id INT)
BEGIN
	DELETE FROM commentaire
	WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_delete_article_from_store
DROP PROCEDURE IF EXISTS `spd_delete_article_from_store`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_delete_article_from_store`(IN IDArticleInput INT)
BEGIN
	DELETE art
    FROM article art
	WHERE art.Id_article = IDArticleInput;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_delete_item_from_cart_by_id_user_and_article
DROP PROCEDURE IF EXISTS `spd_delete_item_from_cart_by_id_user_and_article`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_delete_item_from_cart_by_id_user_and_article`(IN IDUserInput INT, IN IDArticleInput INT)
BEGIN
	DELETE apc
    FROM article_par_commande apc
    JOIN commande com ON com.Id_commande = apc.Id_commande
	WHERE IDArticleInput = apc.Id_article AND com.Commande_payee = 0 AND IDUserInput = com.Id_utilisateur;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_evenement_by_id
DROP PROCEDURE IF EXISTS `spd_evenement_by_id`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_evenement_by_id`(id INT)
BEGIN
	DELETE FROM evenement
	WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_likephoto
DROP PROCEDURE IF EXISTS `spd_likephoto`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_likephoto`(id_user INT, id_photo INT)
BEGIN
	DELETE FROM likephoto
	WHERE Id_utilisateur = id_user AND
    Id_photo = id_photo;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_likephoto_by_id_photo
DROP PROCEDURE IF EXISTS `spd_likephoto_by_id_photo`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_likephoto_by_id_photo`(id INT)
BEGIN
	DELETE FROM likephoto
	WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_participant_evenement
DROP PROCEDURE IF EXISTS `spd_participant_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_participant_evenement`(id_user INT, id_event INT)
BEGIN
	DELETE FROM participant_evenement
	WHERE Id_utilisateur = id_user AND
    Id_evenement = id_event;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_photo_by_id
DROP PROCEDURE IF EXISTS `spd_photo_by_id`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_photo_by_id`(id INT)
BEGIN
	DELETE FROM photo
	WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_voteidea
DROP PROCEDURE IF EXISTS `spd_voteidea`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_voteidea`(id_user INT, id_event INT)
BEGIN
	DELETE FROM voteidea
	WHERE Id_utilisateur = id_user AND
    Id_evenement = id_event;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spd_voteidea_by_evenement
DROP PROCEDURE IF EXISTS `spd_voteidea_by_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spd_voteidea_by_evenement`(IN id_event INT)
BEGIN
	DELETE FROM voteidea
	WHERE Id_evenement = id_event;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_cart
DROP PROCEDURE IF EXISTS `spe_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_cart`(
IN IdUser INT,
IN Quantity INT,
IN Id_Article INT
)
BEGIN
update article_par_commande apc
INNER JOIN commande com ON apc.Id_commande = com.Id_commande
SET 
	apc.id_article = Id_Article,
	apc.Quantite = Quantity
    WHERE com.Id_commande = IdUser;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_cart_add_qty_item_in_cart
DROP PROCEDURE IF EXISTS `spe_cart_add_qty_item_in_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_cart_add_qty_item_in_cart`(IN IdOrder INT, IN IdArticle INT, IN Quantity INT)
BEGIN
	UPDATE article_par_commande apc
    SET apc.Quantite = Quantity
    WHERE apc.Id_commande = IdOrder AND apc.Id_article = IdArticle;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_cart_set_order_paid
DROP PROCEDURE IF EXISTS `spe_cart_set_order_paid`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_cart_set_order_paid`(IN idUser INT)
BEGIN
	UPDATE commande com
    SET Commande_payee = 1
    WHERE Id_utilisateur = idUser AND Commande_payee = 0;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_commande_item_quantity
DROP PROCEDURE IF EXISTS `spe_commande_item_quantity`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_commande_item_quantity`(IN OrderID INT, IN QuantityToAdd INT, IN ArticleID INT)
BEGIN
	UPDATE article_par_commande
	SET Quantite = Quantite + QuantityToAdd
	WHERE Id_commande = OrderID AND Id_article = ArticleID;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_commentaire_status
DROP PROCEDURE IF EXISTS `spe_commentaire_status`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_commentaire_status`(id INT)
BEGIN
UPDATE commentaire
SET Id_status = CASE WHEN Id_status=4 THEN 1 ELSE 4 END
WHERE Id_commentaire = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_edit_article
DROP PROCEDURE IF EXISTS `spe_edit_article`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_edit_article`(
	id INT ,
	Titre VARCHAR(50) ,
	Description TEXT ,
	Cout  FLOAT,
	Image VARCHAR(255) ,
	stock INT,
	Nbr_achats INT,
	Id_categorie INT 
  )
BEGIN
update `orleans_bde`.`article`
SET

	`Titre`= Titre,
	`Description`= Description,
	`Cout`= Cout,
	`Image`= Image,
	`stock` = stock,
	`Nbr_achats`= Nbr_achats,
	`Id_categorie`= Id_categorie
    WHERE Id_article = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_evenement
DROP PROCEDURE IF EXISTS `spe_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_evenement`(
  id INT,
  Titre VARCHAR(50) ,
  Date_evenement date ,
  Date_de_creation date ,
  Date_de_fin date ,
  Heure TIME,
  Description TEXT ,
  Cout  FLOAT,
  Nbr_participants INT  ,
  URL_photo VARCHAR(255) ,
  Nbr_votes INT ,
  Lieu VARCHAR(50) ,
  Id_utilisateur INT  ,
  Id_reccurrence INT ,
  Is_idea BOOL ,
  Id_status_date INT ,
  Id_status_accessibilite INT 
)
BEGIN
update `orleans_bde`.`evenement`
SET
	`Titre` = Titre,
	`Date_evenement` = Date_evenement,
	`Date_de_creation` = Date_de_creation,
	`Date_de_fin`= Date_de_fin,
	`Heure` = Heure,
	`Description`= Description,
	`Cout`= Cout,
	`Nbr_participants`= Nbr_participants,
	`URL_photo`= URL_photo,
	`Nbr_votes`= Nbr_votes,
	`Lieu`= Lieu,
	`Id_utilisateur`= Id_utilisateur,
	`Id_reccurrence`= Id_reccurrence,
	`Is_idea`= Is_idea,
	`Id_status_date` = Id_status_date,
	`Id_status_accessibilite`= Id_status_accessibilite
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_evenement_idea_to_tocome
DROP PROCEDURE IF EXISTS `spe_evenement_idea_to_tocome`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_evenement_idea_to_tocome`(id INT)
BEGIN
update evenement
set Is_idea = 0,
	Id_status_date = 1
WHERE Id_evenement=id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_evenement_status
DROP PROCEDURE IF EXISTS `spe_evenement_status`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_evenement_status`(id INT)
BEGIN
UPDATE evenement
SET Id_status_accessibilite = CASE WHEN Id_status_accessibilite=4 THEN 1 ELSE 4 END
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_evenement_tocome_to_passed
DROP PROCEDURE IF EXISTS `spe_evenement_tocome_to_passed`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_evenement_tocome_to_passed`(id INT)
BEGIN
update evenement
set Id_status_date = 2
WHERE Id_evenement=id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_likephoto_decrement
DROP PROCEDURE IF EXISTS `spe_nbr_likephoto_decrement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_likephoto_decrement`(id INT)
BEGIN
UPDATE photo
SET Nbr_like = Nbr_like - 1
WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_likephoto_increment
DROP PROCEDURE IF EXISTS `spe_nbr_likephoto_increment`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_likephoto_increment`(id INT)
BEGIN
UPDATE photo
SET Nbr_like = Nbr_like + 1
WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_participants_decrement
DROP PROCEDURE IF EXISTS `spe_nbr_participants_decrement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_participants_decrement`(id INT)
BEGIN
UPDATE evenement
SET Nbr_participants = Nbr_participants - 1
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_participants_increment
DROP PROCEDURE IF EXISTS `spe_nbr_participants_increment`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_participants_increment`(id INT)
BEGIN
UPDATE evenement
SET Nbr_participants = Nbr_participants + 1
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_votes_decrement
DROP PROCEDURE IF EXISTS `spe_nbr_votes_decrement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_votes_decrement`(id INT)
BEGIN
UPDATE evenement
SET Nbr_votes = Nbr_votes - 1
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_nbr_votes_increment
DROP PROCEDURE IF EXISTS `spe_nbr_votes_increment`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_nbr_votes_increment`(id INT)
BEGIN
UPDATE evenement
SET Nbr_votes = Nbr_votes + 1
WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_photo_status
DROP PROCEDURE IF EXISTS `spe_photo_status`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_photo_status`(id INT)
BEGIN
UPDATE photo
SET status = CASE WHEN status=4 THEN 1 ELSE 4 END
WHERE Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spe_update_item_quantity_in_cart
DROP PROCEDURE IF EXISTS `spe_update_item_quantity_in_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spe_update_item_quantity_in_cart`(IN UserID INT, IN Quantity INT, IN ArticleID INT)
BEGIN
	UPDATE article_par_commande apc
	JOIN commande com ON com.Id_commande = apc.Id_commande
	SET apc.Quantite = Quantity
	WHERE apc.Id_article = ArticleID AND com.Id_utilisateur = UserID AND Commande_payee = 0;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_article
DROP PROCEDURE IF EXISTS `spi_article`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_article`(
  Titre VARCHAR(50) ,
  Description TEXT ,
  Cout  FLOAT,
  Image VARCHAR(255) ,
  stock INT,
  Nbr_achats INT,
  Id_categorie INT 
  )
BEGIN
INSERT INTO `orleans_bde`.`article`
	(
	`Titre`,
	`Description`,
	`Cout`,
	`Image`,
	`stock`,
	`Nbr_achats`,
	`Id_categorie`)
VALUES
(	  
	Titre  ,
	Description  ,
	Cout  ,
	Image  ,
    stock ,
	Nbr_achats ,
	Id_categorie
    );
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_cart_add_new_item_to_cart
DROP PROCEDURE IF EXISTS `spi_cart_add_new_item_to_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_cart_add_new_item_to_cart`(IN IdOrder INT, IN IdArticle INT, IN Quantity INT)
BEGIN
	INSERT INTO article_par_commande (Id_commande,Id_article, Quantite) VALUES (IdOrder, IdArticle, Quantity);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_cart_create_new_cart
DROP PROCEDURE IF EXISTS `spi_cart_create_new_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_cart_create_new_cart`(IN IdUser INT, IN TotalCost INT, IN ArticleNumber INT, IN CartDate DATE, CartTime TIME, IN CommandePayee INT)
BEGIN
    INSERT INTO commande (Id_commande, Id_utilisateur, Cout_total, Nbr_article, Date, Heure, Commande_payee) VALUES (NULL, IdUser, TotalCost, ArticleNumber, CartDate, CartTime, CommandePayee);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_category
DROP PROCEDURE IF EXISTS `spi_category`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_category`(
	Category VARCHAR(50)
)
BEGIN
INSERT INTO `orleans_bde`.`catégorie`
(
	`Designation`
)
VALUES
(	  
	Category
    );
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_commentaire
DROP PROCEDURE IF EXISTS `spi_commentaire`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_commentaire`(newText TEXT, newDate DATE, newhour TIME, Id_status INT, Id_utilisateur INT, Id_photo INT)
BEGIN
INSERT INTO `orleans_bde`.`commentaire`
	(Texte,
	Date,
	Heure,
	Id_status,
	Id_utilisateur,
	Id_photo)
VALUES(
 newText ,
 newDate ,
 newhour ,
 Id_status ,
 Id_utilisateur ,
 Id_photo);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_evenement
DROP PROCEDURE IF EXISTS `spi_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_evenement`(
  Titre VARCHAR(50) ,
  Date_evenement date ,
  Date_de_creation date ,
  Date_de_fin date ,
  Heure TIME,
  Description TEXT ,
  Cout  FLOAT,
  Nbr_participants INT  ,
  URL_photo VARCHAR(255) ,
  Nbr_votes INT ,
  Lieu VARCHAR(50) ,
  Id_utilisateur INT  ,
  Id_reccurrence INT ,
  Is_idea BOOL ,
  Id_status_accessibilite INT 
)
BEGIN
INSERT INTO `orleans_bde`.`evenement`
	(
	`Titre`,
	`Date_evenement`,
	`Date_de_creation`,
	`Date_de_fin`,
    `Heure`,
	`Description`,
	`Cout`,
	`Nbr_participants`,
	`URL_photo`,
	`Nbr_votes`,
	`Lieu`,
	`Id_utilisateur`,
	`Id_reccurrence`,
	`Is_idea`,
	`Id_status_accessibilite`)
VALUES
(	  
	Titre  ,
	Date_evenement  ,
	Date_de_creation  ,
	Date_de_fin  ,
    Heure,
	Description  ,
	Cout  ,
	Nbr_participants  ,
	URL_photo  ,
	Nbr_votes  ,
	Lieu  ,
	Id_utilisateur  ,
	Id_reccurrence  ,
	Is_idea  ,
	Id_status_accessibilite  
    );
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_evenement_tocome
DROP PROCEDURE IF EXISTS `spi_evenement_tocome`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_evenement_tocome`(
  Titre VARCHAR(50) ,
  Date_evenement date ,
  Date_de_creation date ,
  Date_de_fin date ,
  Heure TIME,
  Description TEXT ,
  Cout  FLOAT,
  Nbr_participants INT  ,
  URL_photo VARCHAR(255) ,
  Nbr_votes INT ,
  Lieu VARCHAR(50) ,
  Id_utilisateur INT  ,
  Id_reccurrence INT ,
  Is_idea BOOL ,
  Id_status_date INT ,
  Id_status_accessibilite INT 
)
BEGIN
INSERT INTO `orleans_bde`.`evenement`
	(
	`Titre`,
	`Date_evenement`,
	`Date_de_creation`,
	`Date_de_fin`,
	`Heure`,
	`Description`,
	`Cout`,
	`Nbr_participants`,
	`URL_photo`,
	`Nbr_votes`,
	`Lieu`,
	`Id_utilisateur`,
	`Id_reccurrence`,
	`Is_idea`,
    `Id_status_date`, 
	`Id_status_accessibilite`)
VALUES
(	  
	Titre  ,
	Date_evenement  ,
	Date_de_creation  ,
	Date_de_fin  ,
	Heure,
	Description  ,
	Cout  ,
	Nbr_participants  ,
	URL_photo  ,
	Nbr_votes  ,
	Lieu  ,
	Id_utilisateur  ,
	Id_reccurrence  ,
	Is_idea  ,
    Id_status_date,
	Id_status_accessibilite  
    );
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_likephoto
DROP PROCEDURE IF EXISTS `spi_likephoto`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_likephoto`(id_user INT, id_photo INT)
BEGIN
INSERT INTO likephoto
VALUES (id_photo, id_user);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_participant_evenement
DROP PROCEDURE IF EXISTS `spi_participant_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_participant_evenement`(id_user INT, id_event INT)
BEGIN
INSERT INTO participant_evenement
VALUES (id_user, id_event);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_photo
DROP PROCEDURE IF EXISTS `spi_photo`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_photo`(
  Date date,
  Heure time ,
  status int ,
  idUtilisateur int ,
  idEvenement int ,
  Nbr_like  int,
  URL_photo VARCHAR(255)
)
BEGIN
INSERT INTO `orleans_bde`.`photo`
(Date,
Heure,
Status,
Id_utilisateur,
Id_evenement,
Nbr_like,
URL_photo
)
VALUES
(	  
	Date  ,
	Heure  ,
	status  ,
	idUtilisateur  ,
	idEvenement  ,
	Nbr_like  ,
	URL_photo
    );
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_user
DROP PROCEDURE IF EXISTS `spi_user`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_user`(F_Name VARCHAR(40), L_Name VARCHAR(40), Email VARCHAR(255), mdp VARCHAR(255),
                                                      ID_Campus INT, ID_Gender INT, ID_Role INT)
BEGIN
  INSERT INTO `orleans_bde`.utilisateur
  (Prenom,
   Nom,
   Email,
   mdp,
   Id_centre,
   Id_genre,
   Id_Status)
  VALUES
  (F_Name, L_Name , Email , Mdp,
   ID_Campus , ID_Gender , ID_Role);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spi_voteidea
DROP PROCEDURE IF EXISTS `spi_voteidea`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spi_voteidea`(id_user INT, id_event INT)
BEGIN
INSERT INTO voteidea
VALUES (id_event, id_user);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_commentaires_by_photo
DROP PROCEDURE IF EXISTS `spl_commentaires_by_photo`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_commentaires_by_photo`(id INT)
BEGIN
	SELECT *
    FROM commentaire
    WHERE Id_photo =id
    ORDER BY Date desc, Heure desc;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_evenements_idea
DROP PROCEDURE IF EXISTS `spl_evenements_idea`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_evenements_idea`()
BEGIN
	SELECT *
    FROM evenement
    WHERE Is_idea = 1
    ORDER BY Nbr_votes DESC;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_evenement_passed
DROP PROCEDURE IF EXISTS `spl_evenement_passed`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_evenement_passed`()
BEGIN
	SELECT *
    FROM evenement
    WHERE id_status_date = 2
    order by Nbr_participants desc
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_evenement_passed_public
DROP PROCEDURE IF EXISTS `spl_evenement_passed_public`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_evenement_passed_public`()
BEGIN
	SELECT *
    FROM evenement
    WHERE id_status_date = 2 AND Id_status_accessibilite=1
	order by Nbr_participants desc
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_evenement_to_come
DROP PROCEDURE IF EXISTS `spl_evenement_to_come`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_evenement_to_come`()
BEGIN
	SELECT *
    FROM evenement
    WHERE id_status_date = 1
	order by Date_evenement desc
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_evenement_to_come_public
DROP PROCEDURE IF EXISTS `spl_evenement_to_come_public`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_evenement_to_come_public`()
BEGIN
	SELECT *
    FROM evenement
    WHERE id_status_date = 1 AND Id_status_accessibilite=1
    order by Date_evenement desc
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_list_category
DROP PROCEDURE IF EXISTS `spl_list_category`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_list_category`()
BEGIN
	SELECT *
    FROM catégorie;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_order_by_user_and_order_status
DROP PROCEDURE IF EXISTS `spl_order_by_user_and_order_status`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_order_by_user_and_order_status`(IN idUser INT)
BEGIN
SELECT article.Titre, article.Description, article.Cout, article.Image, article_par_commande.Quantite, article_par_commande.Id_article, article_par_commande.Id_commande, commande.Cout_total, article.Stock
    FROM article, commande, article_par_commande
    WHERE idUser = commande.Id_utilisateur AND article_par_commande.Id_article = article.Id_article AND Commande_payee = 0 AND article_par_commande.Id_commande = commande.Id_commande;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_order_empty_cart
DROP PROCEDURE IF EXISTS `spl_order_empty_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_order_empty_cart`(IN idUser INT, IN idCommande INT)
BEGIN
	DELETE apc FROM article_par_commande apc JOIN commande com ON com.Id_Commande = idCommande WHERE com.Id_Utilisateur = idUser AND apc.Id_commande = com.Id_commande AND Commande_payee = 0;
    DELETE com FROM commande com WHERE com.Id_Utilisateur = idUser AND com.Id_commande = idCommande AND Commande_payee = 0;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_participant_evenement
DROP PROCEDURE IF EXISTS `spl_participant_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_participant_evenement`()
BEGIN
select *
from participant_evenement;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_photo_by_evenement
DROP PROCEDURE IF EXISTS `spl_photo_by_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_photo_by_evenement`(id_event int)
BEGIN
	SELECT *
    FROM photo
    WHERE Id_evenement = id_event;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_photo_by_evenement_public
DROP PROCEDURE IF EXISTS `spl_photo_by_evenement_public`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_photo_by_evenement_public`(id_event int)
BEGIN
	SELECT *
    FROM photo
    WHERE status=1 AND Id_evenement = id_event;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spl_utilisateur_bde
DROP PROCEDURE IF EXISTS `spl_utilisateur_bde`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spl_utilisateur_bde`()
BEGIN
	SELECT *
    FROM utilisateur
    WHERE Id_Status = 2;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_article
DROP PROCEDURE IF EXISTS `sps_article`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_article`()
BEGIN
	SELECT *
	FROM article
    ORDER BY Nbr_achats DESC;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_cart_check_if_already_in_cart
DROP PROCEDURE IF EXISTS `sps_cart_check_if_already_in_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_cart_check_if_already_in_cart`(IN IdUser INT, IN IdArticle INT)
BEGIN
	SELECT *
    FROM article_par_commande apc
    INNER JOIN commande com ON com.Id_commande = apc.Id_commande
    WHERE apc.Id_article = IdArticle AND com.Id_utilisateur = IdUser;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_cart_list_order_not_paid
DROP PROCEDURE IF EXISTS `sps_cart_list_order_not_paid`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_cart_list_order_not_paid`(IN IdUser INT)
BEGIN
	SELECT *
    FROM commande com
    WHERE com.Id_utilisateur = IdUser AND Commande_payee = 0;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_centre
DROP PROCEDURE IF EXISTS `sps_centre`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_centre`(id INT)
BEGIN
	SELECT Designation
    FROM centre
    WHERE idCentre=id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_commande
DROP PROCEDURE IF EXISTS `sps_commande`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_commande`(IN id INT)
BEGIN
	SELECT *
    FROM commande
    WHERE Id_commande = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_commentaire
DROP PROCEDURE IF EXISTS `sps_commentaire`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_commentaire`(id INT)
BEGIN
	SELECT *
    FROM commentaire
    WHERE Id_commentaire = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_edit_article
DROP PROCEDURE IF EXISTS `sps_edit_article`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_edit_article`(id INT)
BEGIN
	SELECT *
    FROM article
    WHERE Id_article = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_evenement
DROP PROCEDURE IF EXISTS `sps_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_evenement`(id INT)
BEGIN
	SELECT *
    FROM evenement
    WHERE Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_event
DROP PROCEDURE IF EXISTS `sps_event`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_event`(id_event INT)
BEGIN
SELECT *
    FROM evenement
WHERE Id_evenement = id_event
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_event_passed
DROP PROCEDURE IF EXISTS `sps_event_passed`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_event_passed`(id_event INT)
BEGIN
SELECT *
    FROM evenement
    WHERE id_status_date = 2
    AND Id_evenement = id_event
    LIMIT 20;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_genre
DROP PROCEDURE IF EXISTS `sps_genre`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_genre`(id INT)
BEGIN
	SELECT Designation
    FROM genre
    WHERE Id_genre = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_get_article_based_on_search_filters
DROP PROCEDURE IF EXISTS `sps_get_article_based_on_search_filters`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_get_article_based_on_search_filters`(IN searchBarInput VARCHAR(255), IN category INT, IN ordre INT)
BEGIN
	IF searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " THEN
		SELECT *
		FROM article
		WHERE category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category;
	ELSE IF ordre = 1 THEN 
		SELECT *
		FROM article
		-- WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		-- AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category
        ORDER BY Cout ASC;
    
    ELSE IF category = 0 THEN
		SELECT *
		FROM article
        WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%');
    ELSE IF ordre = 0 THEN 
		SELECT *
		FROM article;
		-- WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		-- AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category;
	ELSE IF ordre = 2 THEN 
    SELECT *
		FROM article
		ORDER BY Cout DESC;
	ELSE
		SELECT *
		FROM article
		WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category;
    END IF;
    END IF;
    END IF;
    END IF;
    END IF;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_get_article_based_on_search_filters2
DROP PROCEDURE IF EXISTS `sps_get_article_based_on_search_filters2`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_get_article_based_on_search_filters2`( IN ordre INT)
BEGIN
    IF ordre = 0 THEN 
		SELECT *
		FROM article;
		-- WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		-- AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category;
    ELSE IF ordre = 1 THEN 
		SELECT *
		FROM article
		-- WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		-- AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category
        ORDER BY Cout ASC;
	ELSE IF ordre = 2 THEN 
    SELECT *
		FROM article
		ORDER BY Cout DESC;
	ELSE
		SELECT *
		FROM article
		WHERE searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%')
		AND category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category;
    END IF;
    END IF;
    END IF;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_get_article_based_on_search_filters3
DROP PROCEDURE IF EXISTS `sps_get_article_based_on_search_filters3`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_get_article_based_on_search_filters3`(IN searchBarInput VARCHAR(255), IN category INT)
BEGIN
    SELECT *
    FROM article
    WHERE (searchBarInput = NULL OR searchBarInput = "" OR searchBarInput = " " OR article.Titre LIKE CONCAT('%', searchBarInput , '%'))
    AND (category = 0 OR category = "" OR category = " " OR category = NULL OR article.Id_categorie = category);
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_get_total_price
DROP PROCEDURE IF EXISTS `sps_get_total_price`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_get_total_price`(IN idUser INT)
BEGIN
	SELECT DISTINCT article_par_commande.Quantite*article.Cout as TOTAL
    FROM article_par_commande, article, commande
    WHERE article.Id_article = article_par_commande.Id_article AND commande.Id_utilisateur = idUser AND commande.Commande_payee = 0;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_participant_evenement
DROP PROCEDURE IF EXISTS `sps_participant_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_participant_evenement`(id int)
BEGIN
select * 
from participant_evenement
where Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_photo
DROP PROCEDURE IF EXISTS `sps_photo`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_photo`(id INT)
BEGIN
SELECT * 
from photo
where Id_photo = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_photo_by_evenement
DROP PROCEDURE IF EXISTS `sps_photo_by_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_photo_by_evenement`(id INT)
BEGIN
SELECT * 
from photo
where Id_evenement = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_recurrence
DROP PROCEDURE IF EXISTS `sps_recurrence`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_recurrence`(id INT)
BEGIN
	SELECT Designation
    FROM recurrences
    WHERE Id_recurrence = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_status
DROP PROCEDURE IF EXISTS `sps_status`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_status`(id INT)
BEGIN
	SELECT Designation
    FROM status
    WHERE Id_status=id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_statusaccessibilite
DROP PROCEDURE IF EXISTS `sps_statusaccessibilite`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_statusaccessibilite`(id INT)
BEGIN
	SELECT Designation
    FROM statusaccessibilite
    WHERE Id_status_accessibilite=id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_user
DROP PROCEDURE IF EXISTS `sps_user`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_user`(id INT)
BEGIN
	SELECT *
    FROM utilisateur
    WHERE Id_Utilisateur = id;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.sps_user_by_email
DROP PROCEDURE IF EXISTS `sps_user_by_email`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `sps_user_by_email`(mail VARCHAR(255))
BEGIN
	SELECT *
    FROM utilisateur
    WHERE Email=mail;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_cart
DROP PROCEDURE IF EXISTS `spt_cart`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_cart`(IN id_article INT,IN id_commande INT)
BEGIN
	SELECT COUNT(*)
    FROM article_par_commande;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_date_event
DROP PROCEDURE IF EXISTS `spt_date_event`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_date_event`(IN id_evenement INT)
BEGIN
    
    SELECT DATEDIFF(Date_evenement, CURRENT_DATE()) 
	FROM orleans_bde.evenement
	WHERE Id_evenement = 18;



END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_email
DROP PROCEDURE IF EXISTS `spt_email`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_email`(newEmail VARCHAR(255))
BEGIN
	SELECT count(Id_utilisateur) as nbrEmail
    FROM utilisateur
    WHERE Email = newEmail;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_evenement_date
DROP PROCEDURE IF EXISTS `spt_evenement_date`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_evenement_date`(IN id INT)
BEGIN
	DECLARE ecartDate INT;
	DECLARE evenementPasse INT;
        
    SELECT DATEDIFF(Date_evenement, CURRENT_DATE()) into ecartDate
	FROM orleans_bde.evenement
    WHERE Id_evenement=id
    LIMIT 1;
    
	IF ecartDate <= 0 THEN 
		SELECT count(TIMEDIFF(Heure, CURTIME())) into evenementPasse
		FROM orleans_bde.evenement
		WHERE Id_evenement = id AND TIMEDIFF(Heure, CURTIME()) <= "00:00:00"
        LIMIT 1;

		IF (evenementPasse >= 1) THEN
			call spt_recursivite_by_evenement(id);
			call spe_evenement_tocome_to_passed(id);
			            
		END IF;
	END IF;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_evenement_idea
DROP PROCEDURE IF EXISTS `spt_evenement_idea`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_evenement_idea`()
BEGIN
	SELECT count
    FROM evenement
    WHERE Is_idea = 1;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_likephoto
DROP PROCEDURE IF EXISTS `spt_likephoto`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_likephoto`(id_user INT, id_ph INT)
BEGIN
SELECT COUNT(Id_photo) AS count
FROM likephoto
WHERE id_user = Id_utilisateur AND
id_ph = Id_photo;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_participant_evenement
DROP PROCEDURE IF EXISTS `spt_participant_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_participant_evenement`(id_user INT, id_event INT)
BEGIN
SELECT COUNT(Id_utilisateur) AS count
FROM participant_evenement
WHERE id_user = Id_utilisateur AND
id_event = Id_evenement;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_recursivite_by_evenement
DROP PROCEDURE IF EXISTS `spt_recursivite_by_evenement`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_recursivite_by_evenement`(in id_event INT)
BEGIN
	DECLARE recurrence INT;
    DECLARE nbr_jours INT;
    
    SET nbr_jours = 0;
    
	SELECT Id_reccurrence into recurrence
    FROM evenement
    WHERE Id_evenement = id_event;
    
    IF recurrence = 1 THEN 
		set nbr_jours = 7;
	ELSE if recurrence = 2 THEN
		set nbr_jours = 30;
	ELSE if recurrence = 3 THEN 
        set nbr_jours = 365;
    END IF;
    END IF;
    END IF;
    
    if nbr_jours > 0 THEN 
		INSERT INTO evenement
			(
			`Titre`,
			`Date_evenement`,
			`Date_de_creation`,
			`Date_de_fin`,
			`Description`,
			`Cout`,
			`Nbr_participants`,
			`URL_photo`,
			`Nbr_votes`,
			`Lieu`,
			`Id_utilisateur`,
			`Id_reccurrence`,
			`Is_idea`,
			`Id_status_date`, 
			`Id_status_accessibilite`)
		SELECT 	
			Titre  ,
			DATE_ADD(Date_evenement, INTERVAL nbr_jours DAY) as Date_evenement,
			Date_de_creation  ,
			Date_de_fin  ,
			Description  ,
			Cout  ,
			Nbr_participants  ,
			URL_photo  ,
			Nbr_votes  ,
			Lieu  ,
			Id_utilisateur  ,
			recurrence  ,
			Is_idea  ,
			Id_status_date, 
			Id_status_accessibilite  
		FROM evenement
		WHERE Id_evenement = id_event;
	END IF;
END//
DELIMITER ;

-- Dumping structure for procedure orleans_bde.spt_utilisateur_has_vote
DROP PROCEDURE IF EXISTS `spt_utilisateur_has_vote`;
DELIMITER //
CREATE DEFINER=`orleans_wadm`@`%` PROCEDURE `spt_utilisateur_has_vote`(id_user INT, id_event INT)
BEGIN
SELECT COUNT(Id_utilisateur) AS count
FROM voteidea
WHERE Id_utilisateur = id_user AND
Id_evenement = id_event ;
END//
DELIMITER ;

-- Dumping structure for table orleans_bde.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `Id_Status` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
REPLACE INTO `status` (`Id_Status`, `Designation`) VALUES
	(1, 'Eleve'),
	(2, 'Membre BDE'),
	(3, 'Personnel CESI');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.statusaccessibilite
DROP TABLE IF EXISTS `statusaccessibilite`;
CREATE TABLE IF NOT EXISTS `statusaccessibilite` (
  `Id_status_accessibilite` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_status_accessibilite`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.statusaccessibilite: ~2 rows (approximately)
/*!40000 ALTER TABLE `statusaccessibilite` DISABLE KEYS */;
REPLACE INTO `statusaccessibilite` (`Id_status_accessibilite`, `Designation`) VALUES
	(1, 'Public'),
	(2, 'Réservé au BDE'),
	(3, 'Réservé au CESI'),
	(4, 'Privé');
/*!40000 ALTER TABLE `statusaccessibilite` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.status_date
DROP TABLE IF EXISTS `status_date`;
CREATE TABLE IF NOT EXISTS `status_date` (
  `Id_status_date` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_status_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.status_date: ~2 rows (approximately)
/*!40000 ALTER TABLE `status_date` DISABLE KEYS */;
REPLACE INTO `status_date` (`Id_status_date`, `Designation`) VALUES
	(1, 'A Venir'),
	(2, 'Passé');
/*!40000 ALTER TABLE `status_date` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mdp` varchar(100) NOT NULL,
  `Id_centre` int(11) NOT NULL,
  `Id_genre` int(11) NOT NULL,
  `Id_Status` int(11) NOT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  KEY `fk_Utilisateur_Centre1_idx` (`Id_centre`),
  KEY `fk_Utilisateur_Genre1_idx` (`Id_genre`),
  KEY `fk_Utilisateur_Status1_idx` (`Id_Status`),
  CONSTRAINT `fk_Utilisateur_Centre1` FOREIGN KEY (`Id_centre`) REFERENCES `centre` (`idCentre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Genre1` FOREIGN KEY (`Id_genre`) REFERENCES `genre` (`Id_genre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Status1` FOREIGN KEY (`Id_Status`) REFERENCES `status` (`Id_Status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table orleans_bde.utilisateur: ~5 rows (approximately)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
REPLACE INTO `utilisateur` (`Id_utilisateur`, `Nom`, `Prenom`, `Email`, `Mdp`, `Id_centre`, `Id_genre`, `Id_Status`) VALUES
	(1, 'CESI', 'Elève', 'demo.eleve@viacesi.fr', '031b19a5909ba860175a1975b5671c6e', 1, 2, 1), /* Password - Mot de passe : 123456CCC */
	(2, 'BDE', 'Membre', 'demo.bde@viacesi.fr', '031b19a5909ba860175a1975b5671c6e', 1, 2, 2),  /* Password - Mot de passe : 123456CCC */
	(3, 'CESI', 'Personnel', 'demo.cesi@viacesi.fr', '031b19a5909ba860175a1975b5671c6e', 1, 2, 3),  /* Password - Mot de passe : 123456CCC */
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Dumping structure for table orleans_bde.voteidea
DROP TABLE IF EXISTS `voteidea`;
CREATE TABLE IF NOT EXISTS `voteidea` (
  `Id_evenement` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_evenement`,`Id_utilisateur`),
  KEY `fk_VoteIdea_Evenement1_idx` (`Id_evenement`),
  KEY `fk_VoteIdea_Utilisateur1_idx` (`Id_utilisateur`),
  CONSTRAINT `fk_VoteIdea_Evenement1` FOREIGN KEY (`Id_evenement`) REFERENCES `evenement` (`Id_evenement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VoteIdea_Utilisateur1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
