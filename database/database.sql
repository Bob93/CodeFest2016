-- MySQL Script generated by MySQL Workbench
-- 03/23/16 15:42:40
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Type_werknemer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Type_werknemer` (
  `type_ID` INT(8) NOT NULL AUTO_INCREMENT,
  `beschrijving` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`type_ID`),
  UNIQUE INDEX `type_ID_UNIQUE` (`type_ID` ASC));


-- -----------------------------------------------------
-- Table `mydb`.`Afdeling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Afdeling` (
  `afdeling_ID` INT(8) NOT NULL AUTO_INCREMENT,
  `beschrijving` VARCHAR(255) NULL,
  PRIMARY KEY (`afdeling_ID`),
  UNIQUE INDEX `afdeling_ID_UNIQUE` (`afdeling_ID` ASC));


-- -----------------------------------------------------
-- Table `mydb`.`Person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Person` (
  `person_ID` INT(8) NOT NULL AUTO_INCREMENT,
  `voornaam` VARCHAR(30) NULL,
  `tussenvoegsel` VARCHAR(12) NULL,
  `achternaam` VARCHAR(50) NULL,
  `gebruikersnaam` VARCHAR(50) NOT NULL,
  `wachtwoord` VARCHAR(50) NOT NULL,
  `afdeling_ID` INT(8) NOT NULL,
  `deeltijdfactor` DOUBLE NOT NULL,
  `type_ID` INT(8) NOT NULL,
  `geboortedatum` DATETIME NULL,
  `geslacht` ENUM('m','v') NULL,
  `werknemernummer` INT(11) NOT NULL,
  `datum_in_dienst` DATETIME NULL,
  PRIMARY KEY (`person_ID`),
  UNIQUE INDEX `Person_ID_UNIQUE` (`person_ID` ASC),
  UNIQUE INDEX `gebruikersnaam_UNIQUE` (`gebruikersnaam` ASC),
  UNIQUE INDEX `wachtwoord_UNIQUE` (`wachtwoord` ASC),
  INDEX `fk_Person_Type_werknemer_idx` (`type_ID` ASC),
  INDEX `fk_Person_Afdeling1_idx` (`afdeling_ID` ASC),
  UNIQUE INDEX `type_ID_UNIQUE` (`type_ID` ASC),
  UNIQUE INDEX `afdeling_ID_UNIQUE` (`afdeling_ID` ASC),
  UNIQUE INDEX `werknemernummer_UNIQUE` (`werknemernummer` ASC),
  CONSTRAINT `fk_Person_Type_werknemer`
    FOREIGN KEY (`type_ID`)
    REFERENCES `mydb`.`Type_werknemer` (`type_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Person_Afdeling1`
    FOREIGN KEY (`afdeling_ID`)
    REFERENCES `mydb`.`Afdeling` (`afdeling_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Ziekte_en_Verlof`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ziekte_en_Verlof` (
  `verlof_ID` INT(8) NOT NULL AUTO_INCREMENT,
  `type_Verlof` (255) NULL,
  `van_Datum` DATETIME(20) NOT NULL,
  `tot_Datum` DATETIME(20) NULL,
  `werknemernummer` INT(8) NOT NULL,
  PRIMARY KEY (`verlof_ID`),
  UNIQUE INDEX `verlof_ID_UNIQUE` (`verlof_ID` ASC),
  UNIQUE INDEX `Person_ID_UNIQUE` (`werknemernummer` ASC),
  CONSTRAINT `fk_Verlof_Person1`
    FOREIGN KEY (`werknemernummer`)
    REFERENCES `mydb`.`Person` (`werknemernummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Project` (
  `project_ID` INT(8) NOT NULL,
  `beschrijving` VARCHAR(255) NULL,
  `naam` VARCHAR(45) NULL,
  PRIMARY KEY (`project_ID`),
  UNIQUE INDEX `project_ID_UNIQUE` (`project_ID` ASC));


-- -----------------------------------------------------
-- Table `mydb`.`Uren`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Uren` (
  `uren_ID` INT(8) NOT NULL AUTO_INCREMENT,
  `werknemernummer` INT(8) NOT NULL,
  `aantal_uren` INT(24) NOT NULL,
  `aantal_overuren` INT(11) NULL,
  `project_ID` INT(8) NOT NULL,
  `datum` DATETIME NULL,
  PRIMARY KEY (`uren_ID`),
  UNIQUE INDEX `uren_ID_UNIQUE` (`uren_ID` ASC),
  UNIQUE INDEX `Person_ID_UNIQUE` (`werknemernummer` ASC),
  UNIQUE INDEX `project_ID_UNIQUE` (`project_ID` ASC),
  CONSTRAINT `fk_Uren_Project1`
    FOREIGN KEY (`project_ID`)
    REFERENCES `mydb`.`Project` (`project_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Uren_Person1`
    FOREIGN KEY (`werknemernummer`)
    REFERENCES `mydb`.`Person` (`werknemernummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Settings` (
  `aantal_dagen_voor_invoer` INT(11) NOT NULL,
  `prijs_inkoop_vrijedagen` INT(11) NOT NULL,
  `aantal_ziekte_dagen` INT(11) NOT NULL);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
