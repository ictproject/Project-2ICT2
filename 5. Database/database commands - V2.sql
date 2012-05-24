DROP DATABASE IF EXISTS `openpresentations` ;
CREATE DATABASE IF NOT EXISTS `openpresentations` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `openpresentations` ;

-- -----------------------------------------------------
-- Table `openpresentations`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`users` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `firstname` VARCHAR(45) NULL ,
  `name` VARCHAR(45) NULL ,
  `profile_picture` VARCHAR(100) NULL ,
  `member_since` DATE NOT NULL ,
  `email` VARCHAR(256) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`presentations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`presentations` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`presentations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `share` ENUM('public','group','private') NOT NULL ,
  `owner` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_presentation_user` (`owner` ASC) ,
  CONSTRAINT `fk_presentation_user`
    FOREIGN KEY (`owner` )
    REFERENCES `openpresentations`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`groups` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `share` ENUM('public','private') NOT NULL ,
  `admin` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_group_user1` (`admin` ASC) ,
  CONSTRAINT `fk_group_user1`
    FOREIGN KEY (`admin` )
    REFERENCES `openpresentations`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`users_has_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`users_has_groups` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`users_has_groups` (
  `user_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  INDEX `fk_user_has_group_group1` (`group_id` ASC) ,
  INDEX `fk_user_has_group_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_user_has_group_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `openpresentations`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_group_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `openpresentations`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`slides`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`slides` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`slides` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nr` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `content` TEXT NULL ,
  `image` VARCHAR(100) NULL ,
  `video` VARCHAR(100) NULL ,
  `template` ENUM('title','content','image','video') NOT NULL ,
  `presentation_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_slide_presentation1` (`presentation_id` ASC) ,
  CONSTRAINT `fk_slide_presentation1`
    FOREIGN KEY (`presentation_id` )
    REFERENCES `openpresentations`.`presentations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`groups_has_presentations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`groups_has_presentations` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`groups_has_presentations` (
  `group_id` INT NOT NULL ,
  `presentation_id` INT NOT NULL ,
  PRIMARY KEY (`group_id`, `presentation_id`) ,
  INDEX `fk_group_has_presentation_presentation1` (`presentation_id` ASC) ,
  INDEX `fk_group_has_presentation_group1` (`group_id` ASC) ,
  CONSTRAINT `fk_group_has_presentation_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `openpresentations`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_presentation_presentation1`
    FOREIGN KEY (`presentation_id` )
    REFERENCES `openpresentations`.`presentations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
