DROP DATABASE IF EXISTS `dbcars`;
CREATE DATABASE `dbcars`;
USE `dbcars`;

-- -----------------------------------------------------
-- Table `dbcars`.`cars`
-- -----------------------------------------------------
CREATE TABLE `cars` (
	`name` VARCHAR(50) NULL DEFAULT NULL,
   `description` VARCHAR(50) NULL DEFAULT NULL,
   `link` VARCHAR(50) NULL DEFAULT NULL,
   `ID` INT(11) NOT NULL AUTO_INCREMENT,
   PRIMARY KEY (`ID`) USING HASH
	)
   AUTO_INCREMENT=8;
