-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema orleans_bde
-- -----------------------------------------------------


-- -----------------------------------------------------
-- Table `orleans_bde`.`Catégorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Catégorie` (
  `Id_categorie` INT NOT NULL AUTO_INCREMENT,
  `Designation` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_categorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Article` (
  `Id_article` INT NOT NULL AUTO_INCREMENT,
  `Cout` FLOAT NOT NULL,
  `Titre` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL DEFAULT NULL,
  `Image` VARCHAR(20) NOT NULL,
  `Nbr_achats` INT NOT NULL,
  `Catégorie` VARCHAR(45) NOT NULL,
  `Stock` INT NOT NULL DEFAULT 0,
  `Id_categorie` INT NOT NULL,
  PRIMARY KEY (`Id_article`),
  INDEX `fk_Article_Catégorie1_idx` (`Id_categorie` ASC),
  CONSTRAINT `fk_Article_Catégorie1`
    FOREIGN KEY (`Id_categorie`)
    REFERENCES `orleans_bde`.`Catégorie` (`Id_categorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Centre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Centre` (
  `idCentre` INT NOT NULL AUTO_INCREMENT,
  `Designation` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCentre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Genre` (
  `Id_genre` INT NOT NULL AUTO_INCREMENT,
  `Désignation` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_genre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Status` (
  `Id_Status` INT NOT NULL AUTO_INCREMENT,
  `Designation` VARCHAR(45) NULL,
  PRIMARY KEY (`Id_Status`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Utilisateur` (
  `Id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(50) NOT NULL,
  `Prenom` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Mdp` VARCHAR(100) NOT NULL,
  `Id_centre` INT NOT NULL,
  `Id_genre` INT NOT NULL,
  `Id_Status` INT NOT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  INDEX `fk_Utilisateur_Centre1_idx` (`Id_centre` ASC),
  INDEX `fk_Utilisateur_Genre1_idx` (`Id_genre` ASC),
  INDEX `fk_Utilisateur_Status1_idx` (`Id_Status` ASC),
  CONSTRAINT `fk_Utilisateur_Centre1`
    FOREIGN KEY (`Id_centre`)
    REFERENCES `orleans_bde`.`Centre` (`idCentre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Genre1`
    FOREIGN KEY (`Id_genre`)
    REFERENCES `orleans_bde`.`Genre` (`Id_genre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Status1`
    FOREIGN KEY (`Id_Status`)
    REFERENCES `orleans_bde`.`Status` (`Id_Status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Reccurrences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Reccurrences` (
  `Id_recurrence` INT NOT NULL AUTO_INCREMENT,
  `Reccurrence` VARCHAR(45) NULL,
  PRIMARY KEY (`Id_recurrence`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Status_date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Status_date` (
  `Id_status_date` INT NOT NULL AUTO_INCREMENT,
  `Designation` VARCHAR(45) NULL,
  PRIMARY KEY (`Id_status_date`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`StatusAccessibilite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`StatusAccessibilite` (
  `Id_status_accessibilite` INT NOT NULL AUTO_INCREMENT,
  `Designation` VARCHAR(45) NULL,
  PRIMARY KEY (`Id_status_accessibilite`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Evenement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Evenement` (
  `Id_evenement` INT NOT NULL AUTO_INCREMENT,
  `Titre` VARCHAR(50) NOT NULL,
  `Date_evenement` DATE NOT NULL,
  `Date_de_creation` DATE NOT NULL,
  `Date_de_fin` DATE NOT NULL,
  `Heure` TIME NOT NULL,
  `Description` TEXT NOT NULL,
  `Cout` FLOAT NOT NULL,
  `Nbr_participants` INT NOT NULL,
  `URL_photo` VARCHAR(255) NOT NULL,
  `Nbr_votes` INT NOT NULL,
  `Lieu` VARCHAR(50) NOT NULL,
  `Id_utilisateur` INT NOT NULL,
  `Id_reccurrence` INT NULL,
  `Is_idea` TINYINT NOT NULL,
  `Id_status_date` INT NOT NULL,
  `Id_status_accessibilite` INT NOT NULL,
  PRIMARY KEY (`Id_evenement`),
  INDEX `Evenement_Utilisateur_FK` (`Id_utilisateur` ASC),
  INDEX `fk_Evenement_Reccurrences1_idx` (`Id_reccurrence` ASC),
  INDEX `fk_Evenement_Status_date1_idx` (`Id_status_date` ASC),
  INDEX `fk_Evenement_StatusAccessibilite1_idx` (`Id_status_accessibilite` ASC),
  CONSTRAINT `Evenement_Utilisateur_FK`
    FOREIGN KEY (`Id_utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`),
  CONSTRAINT `fk_Evenement_Reccurrences1`
    FOREIGN KEY (`Id_reccurrence`)
    REFERENCES `orleans_bde`.`Reccurrences` (`Id_recurrence`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evenement_Status_date1`
    FOREIGN KEY (`Id_status_date`)
    REFERENCES `orleans_bde`.`Status_date` (`Id_status_date`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evenement_StatusAccessibilite1`
    FOREIGN KEY (`Id_status_accessibilite`)
    REFERENCES `orleans_bde`.`StatusAccessibilite` (`Id_status_accessibilite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Photo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Photo` (
  `Id_photo` INT NOT NULL AUTO_INCREMENT,
  `Date` DATE NOT NULL,
  `Heure` TIME NOT NULL,
  `Status` INT NOT NULL,
  `ID_auto_Utilisateur` INT NOT NULL,
  `ID_auto_Evenement` INT NOT NULL,
  `Nbr_like` INT NOT NULL DEFAULT 0,
  `URL_photo` VARCHAR(100) NULL COMMENT '/uploads/img/events/nom.extension',
  PRIMARY KEY (`Id_photo`),
  INDEX `Photo_Utilisateur_FK` (`ID_auto_Utilisateur` ASC),
  INDEX `Photo_Evenement0_FK` (`ID_auto_Evenement` ASC),
  CONSTRAINT `Photo_Utilisateur_FK`
    FOREIGN KEY (`ID_auto_Utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`),
  CONSTRAINT `Photo_Evenement0_FK`
    FOREIGN KEY (`ID_auto_Evenement`)
    REFERENCES `orleans_bde`.`Evenement` (`Id_evenement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Commentaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Commentaire` (
  `Id_commentaire` INT NOT NULL AUTO_INCREMENT,
  `Texte` TEXT NOT NULL,
  `Date` DATE NOT NULL,
  `Heure` TIME NOT NULL,
  `Id_Utilisateur` INT NOT NULL,
  `Id_photo` INT NOT NULL,
  PRIMARY KEY (`Id_commentaire`),
  INDEX `Commentaire_Utilisateur0_FK` (`Id_Utilisateur` ASC),
  INDEX `fk_Commentaire_Photo1_idx` (`Id_photo` ASC),
  CONSTRAINT `Commentaire_Utilisateur0_FK`
    FOREIGN KEY (`Id_Utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`),
  CONSTRAINT `fk_Commentaire_Photo1`
    FOREIGN KEY (`Id_photo`)
    REFERENCES `orleans_bde`.`Photo` (`Id_photo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Participant_evenement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Participant_evenement` (
  `Id_utilisateur` INT NOT NULL,
  `Id_evenement` INT NOT NULL,
  PRIMARY KEY (`Id_utilisateur`, `Id_evenement`),
  INDEX `Participant_evenement_Evenement0_FK` (`Id_evenement` ASC),
  CONSTRAINT `Participant_evenement_Utilisateur_FK`
    FOREIGN KEY (`Id_utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`),
  CONSTRAINT `Participant_evenement_Evenement0_FK`
    FOREIGN KEY (`Id_evenement`)
    REFERENCES `orleans_bde`.`Evenement` (`Id_evenement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Commande` (
  `Id_commande` INT NOT NULL AUTO_INCREMENT,
  `Id_utilisateur` INT NOT NULL,
  `Cout_total` INT NOT NULL,
  `Nbr_article` INT NOT NULL,
  `Date` DATE NULL,
  `Heure` DATETIME NULL,
  `Commande_payee` TINYINT NOT NULL,
  PRIMARY KEY (`Id_commande`),
  CONSTRAINT `Commande_Utilisateur_FK`
    FOREIGN KEY (`Id_utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`LikePhoto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`LikePhoto` (
  `Id_photo` INT NOT NULL,
  `Id_utilisateur` INT NOT NULL,
  INDEX `fk_LikePhoto_Photo1_idx` (`Id_photo` ASC),
  INDEX `fk_LikePhoto_Utilisateur1_idx` (`Id_utilisateur` ASC),
  PRIMARY KEY (`Id_photo`, `Id_utilisateur`),
  CONSTRAINT `fk_LikePhoto_Photo1`
    FOREIGN KEY (`Id_photo`)
    REFERENCES `orleans_bde`.`Photo` (`Id_photo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LikePhoto_Utilisateur1`
    FOREIGN KEY (`Id_utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`VoteIdea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`VoteIdea` (
  `Id_evenement` INT NOT NULL,
  `Id_utilisateur` INT NOT NULL,
  INDEX `fk_VoteIdea_Evenement1_idx` (`Id_evenement` ASC),
  PRIMARY KEY (`Id_evenement`, `Id_utilisateur`),
  INDEX `fk_VoteIdea_Utilisateur1_idx` (`Id_utilisateur` ASC),
  CONSTRAINT `fk_VoteIdea_Evenement1`
    FOREIGN KEY (`Id_evenement`)
    REFERENCES `orleans_bde`.`Evenement` (`Id_evenement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VoteIdea_Utilisateur1`
    FOREIGN KEY (`Id_utilisateur`)
    REFERENCES `orleans_bde`.`Utilisateur` (`Id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `orleans_bde`.`Article_par_commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orleans_bde`.`Article_par_commande` (
  `Id_commande` INT NOT NULL,
  `Id_article` INT NOT NULL,
  `Quantite` VARCHAR(45) NULL,
  INDEX `fk_Article_par_commande_Commande1_idx` (`Id_commande` ASC),
  PRIMARY KEY (`Id_commande`),
  INDEX `fk_Article_par_commande_Article1_idx` (`Id_article` ASC),
  CONSTRAINT `fk_Article_par_commande_Commande1`
    FOREIGN KEY (`Id_commande`)
    REFERENCES `orleans_bde`.`Commande` (`Id_commande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_par_commande_Article1`
    FOREIGN KEY (`Id_article`)
    REFERENCES `orleans_bde`.`Article` (`Id_article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
