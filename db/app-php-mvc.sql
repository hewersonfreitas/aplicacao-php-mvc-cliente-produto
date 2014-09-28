SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `app-php-mvc` DEFAULT CHARACTER SET utf8 ;
USE `app-php-mvc` ;

-- -----------------------------------------------------
-- Table `app-php-mvc`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `app-php-mvc`.`produtos` (
  `id_produtos` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome_produtos` VARCHAR(50) NOT NULL ,
  `qtd_produtos` INT(11) NOT NULL ,
  `valor_produtos` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`id_produtos`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `app-php-mvc`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `app-php-mvc`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome_usuario` VARCHAR(50) NOT NULL ,
  `email_usuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `senha_usuario` VARCHAR(45) NOT NULL ,
  `data_nasc_usuario` DATE NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `app-php-mvc` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
