SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `alux` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
CREATE SCHEMA IF NOT EXISTS `new_schema1` ;
USE `alux` ;

-- -----------------------------------------------------
-- Table `alux`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(20) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `contrasena` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `fax` VARCHAR(45) NULL ,
  `empresa` VARCHAR(60) NULL ,
  `cp` VARCHAR(15) NULL ,
  `pais` VARCHAR(45) NOT NULL ,
  `ciudad` VARCHAR(45) NOT NULL ,
  `esAdmin` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`tipo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`tipo` (
  `id` INT UNSIGNED NOT NULL ,
  `nombre_tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`modelo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`producto` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `tipo` INT UNSIGNED NOT NULL ,
  `precio` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `color` VARCHAR(15) NOT NULL ,
  `descripcion` VARCHAR(200) NOT NULL ,
  `id_modelo` INT UNSIGNED NOT NULL ,
  `imagen` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `tipo_idx` (`tipo` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `tipo`
    FOREIGN KEY (`tipo` )
    REFERENCES `alux`.`tipo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_modelo`
    FOREIGN KEY (`id_modelo` )
    REFERENCES `alux`.`modelo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`historial`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`historial` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `id_usuarios` INT UNSIGNED NOT NULL ,
  `id_productos` INT UNSIGNED NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `fecha` VARCHAR(15) NOT NULL,
  `cantidad` INT(10) UNSIGNED NOT NULL,
  `total` INT(10) UNSIGNED NOT NULL,
  `talla` varchar(45) NOT NULL,
  `precio` int(10) unsigned NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `id_usuario_idx` (`id_usuarios` ASC) ,
  INDEX `id_pedido_idx` (`id_productos` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `id_usuarios`
    FOREIGN KEY (`id_usuarios` )
    REFERENCES `alux`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_productos`
    FOREIGN KEY (`id_productos` )
    REFERENCES `alux`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`cesta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`cesta` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT UNSIGNED NOT NULL ,
  `id_productos_his` INT UNSIGNED NOT NULL ,
  `total` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_usuario_idx` (`id_usuario` ASC) ,
  INDEX `id_producto_idx` (`id_productos_his` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `alux`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_producto_his`
    FOREIGN KEY (`id_productos_his` )
    REFERENCES `alux`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alux`.`talla`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `alux`.`talla` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `id_producto` INT UNSIGNED NOT NULL ,
  `talla1` VARCHAR(45) NULL ,
  `cantidad1` INT UNSIGNED NULL ,
  `talla2` VARCHAR(45) NULL ,
  `cantidad2` INT UNSIGNED NULL ,
  `talla3` VARCHAR(45) NULL ,
  `cantidad3` INT UNSIGNED NULL ,
  `talla4` VARCHAR(45) NULL ,
  `cantidad4` INT UNSIGNED NULL ,
  `talla5` VARCHAR(45) NULL ,
  `cantidad5` INT UNSIGNED NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `id_producto_idx` (`id_producto` ASC) ,
  CONSTRAINT `id_producto`
    FOREIGN KEY (`id_producto` )
    REFERENCES `alux`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `new_schema1` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
