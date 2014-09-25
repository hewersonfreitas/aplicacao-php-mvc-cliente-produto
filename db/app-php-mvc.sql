SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `app-php-mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `app-php-mvc` ;

-- -----------------------------------------------------
-- Table `app-php-mvc`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `app-php-mvc`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome_usuario` VARCHAR(50) NOT NULL ,
  `email_usuario` VARCHAR(45) NOT NULL ,
  `senha_usuario` VARCHAR(45) NOT NULL ,
  `data_nasc_usuario` DATE NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `app-php-mvc`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `app-php-mvc`.`produtos` (
  `id_produtos` INT NOT NULL AUTO_INCREMENT ,
  `nome_produtos` VARCHAR(45) NOT NULL ,
  `qtd_produtos` INT NOT NULL ,
  `valor_produtos` DOUBLE NOT NULL ,
  PRIMARY KEY (`id_produtos`) )
ENGINE = InnoDB;

USE `app-php-mvc` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
