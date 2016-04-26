-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aufdevco_maraton
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aufdevco_maraton
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aufdevco_maraton` DEFAULT CHARACTER SET latin1 ;
USE `aufdevco_maraton` ;

-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `updated` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`questions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `question_text` TINYTEXT NULL DEFAULT NULL,
  `correct` INT(11) NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  `categories_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `categories_id`),
  INDEX `fk_questions_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_questions_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `aufdevco_maraton`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`answers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `answer_text` TINYTEXT NULL DEFAULT NULL,
  `index` INT(11) NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  `questions_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `questions_id`),
  INDEX `fk_answers_questions_idx` (`questions_id` ASC),
  CONSTRAINT `fk_answers_questions`
    FOREIGN KEY (`questions_id`)
    REFERENCES `aufdevco_maraton`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `score` INT(11) NOT NULL DEFAULT '0',
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`friends` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_from` INT(11) NOT NULL,
  `user_to` INT(11) NOT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_friendships_users1_idx` (`user_from` ASC),
  INDEX `fk_friendships_users2_idx` (`user_to` ASC),
  CONSTRAINT `fk_friendships_users1`
    FOREIGN KEY (`user_from`)
    REFERENCES `aufdevco_maraton`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_friendships_users2`
    FOREIGN KEY (`user_to`)
    REFERENCES `aufdevco_maraton`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aufdevco_maraton`.`games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aufdevco_maraton`.`games` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `player1` INT(11) NOT NULL,
  `player2` INT(11) NOT NULL,
  `p1Score` INT NOT NULL DEFAULT 0,
  `p2Score` INT NOT NULL DEFAULT 0,
  `ingoranciaScore` INT NOT NULL DEFAULT 0,
  `p1turn` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`, `player1`, `player2`),
  INDEX `fk_Game_users1_idx` (`player1` ASC),
  INDEX `fk_Game_users2_idx` (`player2` ASC),
  CONSTRAINT `fk_Game_users1`
    FOREIGN KEY (`player1`)
    REFERENCES `aufdevco_maraton`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Game_users2`
    FOREIGN KEY (`player2`)
    REFERENCES `aufdevco_maraton`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
