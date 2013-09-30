SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `macspa` ;
CREATE SCHEMA IF NOT EXISTS `macspa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `macspa` ;

-- -----------------------------------------------------
-- Table `macspa`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL ,
  `correo` VARCHAR(45) NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`servicio` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`servicio` (
  `idservicio` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `idcategoria` INT NULL ,
  `precio` DECIMAL(10,0) NULL ,
  PRIMARY KEY (`idservicio`) ,
  INDEX `fk_servicio_categoria_idx` (`idcategoria` ASC) ,
  CONSTRAINT `fk_servicio_categoria`
    FOREIGN KEY (`idcategoria` )
    REFERENCES `macspa`.`categoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`cliente` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT ,
  `nombres` VARCHAR(60) NULL ,
  `apellidos` VARCHAR(60) NULL ,
  `dni` VARCHAR(45) NULL ,
  `correo` VARCHAR(45) NULL ,
  `celular` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `login` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`local`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`local` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`local` (
  `idlocal` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `telefono` VARCHAR(20) NULL ,
  PRIMARY KEY (`idlocal`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`personal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`personal` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`personal` (
  `idPersonal` INT NOT NULL ,
  `nombres` VARCHAR(45) NULL ,
  `apellidos` VARCHAR(45) NULL ,
  `dni` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `fechaNacimiento` DATETIME NULL ,
  `correo` VARCHAR(45) NULL ,
  `celular` VARCHAR(20) NULL ,
  `telefono` VARCHAR(20) NULL ,
  `idlocal` INT NULL ,
  `flg_activo` TINYINT(1) NULL DEFAULT true ,
  PRIMARY KEY (`idPersonal`) ,
  INDEX `fk_personal_local1_idx` (`idlocal` ASC) ,
  CONSTRAINT `fk_personal_local1`
    FOREIGN KEY (`idlocal` )
    REFERENCES `macspa`.`local` (`idlocal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`personal_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`personal_servicio` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`personal_servicio` (
  `idPersonal` INT NOT NULL ,
  `idservicio` INT NOT NULL ,
  `flg_activo` TINYINT(1) NULL DEFAULT true ,
  PRIMARY KEY (`idPersonal`, `idservicio`) ,
  INDEX `fk_personal_has_servicio_servicio1_idx` (`idservicio` ASC) ,
  INDEX `fk_personal_has_servicio_personal1_idx` (`idPersonal` ASC) ,
  CONSTRAINT `fk_personal_has_servicio_personal1`
    FOREIGN KEY (`idPersonal` )
    REFERENCES `macspa`.`personal` (`idPersonal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personal_has_servicio_servicio1`
    FOREIGN KEY (`idservicio` )
    REFERENCES `macspa`.`servicio` (`idservicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`promocion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`promocion` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`promocion` (
  `idpromocion` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL ,
  `contenido` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fch_inicio` DATETIME NULL ,
  `fch_fin` DATETIME NULL ,
  `orden` SMALLINT NULL ,
  `flg_activo` TINYINT(1) NULL DEFAULT false ,
  PRIMARY KEY (`idpromocion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`promocion_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`promocion_servicio` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`promocion_servicio` (
  `idpromocion` INT NOT NULL ,
  `idservicio` INT NOT NULL ,
  `flg_activo` TINYINT(1) NULL ,
  `precio_promo` DECIMAL(10,0) NULL ,
  PRIMARY KEY (`idpromocion`, `idservicio`) ,
  INDEX `fk_promocion_has_servicio_servicio1_idx` (`idservicio` ASC) ,
  INDEX `fk_promocion_has_servicio_promocion1_idx` (`idpromocion` ASC) ,
  CONSTRAINT `fk_promocion_has_servicio_promocion1`
    FOREIGN KEY (`idpromocion` )
    REFERENCES `macspa`.`promocion` (`idpromocion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promocion_has_servicio_servicio1`
    FOREIGN KEY (`idservicio` )
    REFERENCES `macspa`.`servicio` (`idservicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`seccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`seccion` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`seccion` (
  `idseccion` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `contenido` TEXT NULL ,
  `div_id` VARCHAR(45) NULL ,
  `flg_activo` TINYINT(1) NULL DEFAULT true ,
  `idusuario` INT NULL ,
  PRIMARY KEY (`idseccion`) ,
  INDEX `fk_seccion_Usuario1_idx` (`idusuario` ASC) ,
  CONSTRAINT `fk_seccion_Usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `macspa`.`usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`reserva` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`reserva` (
  `idreserva` INT NOT NULL AUTO_INCREMENT,
  `idcliente` INT NULL ,
  `fch_programada` DATETIME NULL ,
  `fch_alternativa` DATETIME NULL ,
  `fch_registro` DATETIME NULL ,
  `precio_total` DECIMAL(10,0) NULL ,
  `estado` CHAR(1) NULL COMMENT 'R -> Registrado\nV -> Vencido\nA -> Atendido\nN -> Anulado\n' ,
  `idlocal` INT NULL ,
  PRIMARY KEY (`idreserva`) ,
  INDEX `fk_reserva_cliente1_idx` (`idcliente` ASC) ,
  INDEX `fk_reserva_local1_idx` (`idlocal` ASC) ,
  CONSTRAINT `fk_reserva_cliente1`
    FOREIGN KEY (`idcliente` )
    REFERENCES `macspa`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_local1`
    FOREIGN KEY (`idlocal` )
    REFERENCES `macspa`.`local` (`idlocal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`local_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`local_servicio` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`local_servicio` (
  `local_idlocal` INT NOT NULL ,
  `servicio_idservicio` INT NOT NULL ,
  PRIMARY KEY (`local_idlocal`, `servicio_idservicio`) ,
  INDEX `fk_local_has_servicio_servicio1_idx` (`servicio_idservicio` ASC) ,
  INDEX `fk_local_has_servicio_local1_idx` (`local_idlocal` ASC) ,
  CONSTRAINT `fk_local_has_servicio_local1`
    FOREIGN KEY (`local_idlocal` )
    REFERENCES `macspa`.`local` (`idlocal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_local_has_servicio_servicio1`
    FOREIGN KEY (`servicio_idservicio` )
    REFERENCES `macspa`.`servicio` (`idservicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`reserva_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`reserva_servicio` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`reserva_servicio` (
  `reserva_idreserva` INT NOT NULL ,
  `servicio_idservicio` INT NOT NULL ,
  PRIMARY KEY (`reserva_idreserva`, `servicio_idservicio`) ,
  INDEX `fk_reserva_has_servicio_servicio1_idx` (`servicio_idservicio` ASC) ,
  INDEX `fk_reserva_has_servicio_reserva1_idx` (`reserva_idreserva` ASC) ,
  CONSTRAINT `fk_reserva_has_servicio_reserva1`
    FOREIGN KEY (`reserva_idreserva` )
    REFERENCES `macspa`.`reserva` (`idreserva` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_has_servicio_servicio1`
    FOREIGN KEY (`servicio_idservicio` )
    REFERENCES `macspa`.`servicio` (`idservicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`galeria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`galeria` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`galeria` (
  `idgaleria` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(100) NULL ,
  `fch_creacion` DATETIME NULL,
  PRIMARY KEY (`idgaleria`)  
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `macspa`.`foto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `macspa`.`foto` ;

CREATE  TABLE IF NOT EXISTS `macspa`.`foto` (
  `idfoto` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL ,
  `img_orig` VARCHAR(100) NULL ,
  `img_small` VARCHAR(100) NULL ,
  `fch_creacion` DATETIME NULL ,
  `idgaleria` INT NULL ,
  PRIMARY KEY (`idfoto`) ,
  INDEX `fk_foto_galeria_idx` (`idgaleria` ASC) ,
  CONSTRAINT `fk_foto_galeria`
    FOREIGN KEY (`idgaleria` )
    REFERENCES `macspa`.`galeria` (`idgaleria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


USE `macspa` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
