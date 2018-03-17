-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema diabetic-notes
-- -----------------------------------------------------
-- 糖尿病患者のためのデータ管理

-- -----------------------------------------------------
-- Schema diabetic-notes
--
-- 糖尿病患者のためのデータ管理
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `diabetic-notes` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `diabetic-notes` ;

-- -----------------------------------------------------
-- Table `diabetic-notes`.`my_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`my_categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(45) NOT NULL,
  `categories_type` ENUM('string', 'numeric', 'noe', 'select') NOT NULL,
  `value` VARCHAR(255) NULL,
  `unit` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `users_id` INT NOT NULL,
  `my_categories_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notes_categories1_idx` (`my_categories_id` ASC),
  INDEX `fk_notes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_notes_categories1`
    FOREIGN KEY (`my_categories_id`)
    REFERENCES `diabetic-notes`.`my_categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `diabetic-notes`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`numeric_value_notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`numeric_value_notes` (
  `notes_id` INT NOT NULL,
  `value` INT NOT NULL,
  INDEX `fk_table1_notes1_idx` (`notes_id` ASC),
  CONSTRAINT `fk_table1_notes1`
    FOREIGN KEY (`notes_id`)
    REFERENCES `diabetic-notes`.`notes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`done_notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`done_notes` (
  `notes_id` INT NOT NULL,
  INDEX `fk_table1_notes2_idx` (`notes_id` ASC),
  CONSTRAINT `fk_table1_notes2`
    FOREIGN KEY (`notes_id`)
    REFERENCES `diabetic-notes`.`notes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`select_notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`select_notes` (
  `notes_id` INT NOT NULL,
  `value` INT NOT NULL,
  INDEX `fk_select_notes_notes1_idx` (`notes_id` ASC),
  CONSTRAINT `fk_select_notes_notes1`
    FOREIGN KEY (`notes_id`)
    REFERENCES `diabetic-notes`.`notes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diabetic-notes`.`string_value_notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `diabetic-notes`.`string_value_notes` (
  `notes_id` INT NOT NULL,
  `value` VARCHAR(255) NOT NULL,
  INDEX `fk_table1_notes1_idx` (`notes_id` ASC),
  CONSTRAINT `fk_table1_notes10`
    FOREIGN KEY (`notes_id`)
    REFERENCES `diabetic-notes`.`notes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
