DROP DATABASE IF EXISTS `openpresentations` ;
CREATE DATABASE IF NOT EXISTS `openpresentations`;
USE `openpresentations` ;

-- -----------------------------------------------------
-- Table `openpresentations`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`user` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`user` (
  `id` INT NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `firstname` VARCHAR(45) NULL ,
  `name` VARCHAR(45) NULL ,
  `profile_picture` VARCHAR(45) NULL ,
  `member_since` DATE NOT NULL ,
  `email` VARCHAR(256) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`presentation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`presentation` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`presentation` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `share` ENUM('public','group','private') NOT NULL ,
  `owner` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_presentation_user` (`owner` ASC) ,
  CONSTRAINT `fk_presentation_user`
    FOREIGN KEY (`owner` )
    REFERENCES `openpresentations`.`user` (`id` )
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`group` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`group` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `share` ENUM('public','private') NOT NULL ,
  `admin` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_group_user1` (`admin` ASC) ,
  CONSTRAINT `fk_group_user1`
    FOREIGN KEY (`admin` )
    REFERENCES `openpresentations`.`user` (`id` )
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`user_has_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`user_has_group` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`user_has_group` (
  `user_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  INDEX `fk_user_has_group_group1` (`group_id` ASC) ,
  INDEX `fk_user_has_group_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_user_has_group_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `openpresentations`.`user` (`id` ),
  CONSTRAINT `fk_user_has_group_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `openpresentations`.`group` (`id` )
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`slide`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`slide` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`slide` (
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
    REFERENCES `openpresentations`.`presentation` (`id` )
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openpresentations`.`group_has_presentation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openpresentations`.`group_has_presentation` ;

CREATE  TABLE IF NOT EXISTS `openpresentations`.`group_has_presentation` (
  `group_id` INT NOT NULL ,
  `presentation_id` INT NOT NULL ,
  PRIMARY KEY (`group_id`, `presentation_id`) ,
  INDEX `fk_group_has_presentation_presentation1` (`presentation_id` ASC) ,
  INDEX `fk_group_has_presentation_group1` (`group_id` ASC) ,
  CONSTRAINT `fk_group_has_presentation_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `openpresentations`.`group` (`id` ),
  CONSTRAINT `fk_group_has_presentation_presentation1`
    FOREIGN KEY (`presentation_id` )
    REFERENCES `openpresentations`.`presentation` (`id` )
)
ENGINE = InnoDB;
