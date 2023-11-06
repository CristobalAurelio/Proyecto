-- MySQL Script generated by MySQL Workbench
-- Mon Oct 23 20:04:47 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema floreria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema floreria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `floreria` DEFAULT CHARACTER SET utf8 ;
USE `floreria` ;

-- -----------------------------------------------------
-- Table `floreria`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `floreria`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `edad` VARCHAR(2) NOT NULL,
  `correo` VARCHAR(60) NOT NULL,
  `pass` VARCHAR(60) NOT NULL,
  `tel` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `rango` TINYINT(1) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_actualizacion` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;