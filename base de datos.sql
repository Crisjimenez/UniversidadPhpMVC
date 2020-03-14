SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `UniversidadBD` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `UniversidadBD` ;

-- -----------------------------------------------------
-- Table `UniversidadBD`.`carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`carrera` (
  `car_codigo` VARCHAR(6) NOT NULL ,
  `car_nombre` VARCHAR(100) NOT NULL ,
  `car_numero_creditos` INT NOT NULL ,
  `car_valor_semestre` DOUBLE NOT NULL ,
  `car_numero_semestre` INT NOT NULL ,
  PRIMARY KEY (`car_codigo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`rol` (
  `rol_codigo` INT NOT NULL ,
  `rol_nombre` VARCHAR(100) NOT NULL ,
  `rol_descripcion` VARCHAR(300) NOT NULL ,
  PRIMARY KEY (`rol_codigo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`persona` (
  `per_codigo` INT NOT NULL ,
  `per_nombre_compl` VARCHAR(120) NOT NULL ,
  `per_fecha_nacimiento` DATE NOT NULL ,
  `per_email` VARCHAR(120) NOT NULL ,
  `per_usuario` VARCHAR(35) NOT NULL ,
  `per_password` VARCHAR(100) NOT NULL ,
  `rol_rol_codigo` INT NOT NULL ,
  PRIMARY KEY (`per_codigo`) ,
  INDEX `fk_persona_rol1_idx` (`rol_rol_codigo` ASC) ,
  CONSTRAINT `fk_persona_rol1`
    FOREIGN KEY (`rol_rol_codigo` )
    REFERENCES `UniversidadBD`.`rol` (`rol_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`docente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`docente` (
  `doc_codigo` INT NOT NULL AUTO_INCREMENT ,
  `doc_oficina` VARCHAR(45) NOT NULL ,
  `doc_telefono` VARCHAR(45) NOT NULL ,
  `doc_categoria` INT NOT NULL ,
  `persona_per_codigo` INT NOT NULL ,
  PRIMARY KEY (`doc_codigo`) ,
  INDEX `fk_docente_persona_idx` (`persona_per_codigo` ASC) ,
  CONSTRAINT `fk_docente_persona`
    FOREIGN KEY (`persona_per_codigo` )
    REFERENCES `UniversidadBD`.`persona` (`per_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`Materia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`Materia` (
  `mat_codigo` VARCHAR(6) NOT NULL ,
  `mat_nombre` VARCHAR(100) NOT NULL ,
  `mat_numero_creditos` INT NOT NULL ,
  `mat_ciclo` VARCHAR(100) NOT NULL ,
  `mat_aula` VARCHAR(100) NOT NULL ,
  `mat_descripcion` VARCHAR(300) NULL ,
  `mat_horas_semanales` INT NOT NULL ,
  `mat_cupos_disponibles` INT NOT NULL ,
  `carrera_car_codigo` VARCHAR(6) NOT NULL ,
  `docente_doc_codigo` INT NOT NULL ,
  PRIMARY KEY (`mat_codigo`) ,
  INDEX `fk_Materia_carrera1_idx` (`carrera_car_codigo` ASC) ,
  INDEX `fk_Materia_docente1_idx` (`docente_doc_codigo` ASC) ,
  CONSTRAINT `fk_Materia_carrera1`
    FOREIGN KEY (`carrera_car_codigo` )
    REFERENCES `UniversidadBD`.`carrera` (`car_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Materia_docente1`
    FOREIGN KEY (`docente_doc_codigo` )
    REFERENCES `UniversidadBD`.`docente` (`doc_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`estudiante` (
  `est_codigo` INT NOT NULL AUTO_INCREMENT ,
  `est_apodo` VARCHAR(50) NOT NULL ,
  `persona_per_codigo` INT NOT NULL ,
  `carrera_car_codigo` VARCHAR(6) NOT NULL ,
  PRIMARY KEY (`est_codigo`) ,
  INDEX `fk_estudiante_persona1_idx` (`persona_per_codigo` ASC) ,
  INDEX `fk_estudiante_carrera1_idx` (`carrera_car_codigo` ASC) ,
  CONSTRAINT `fk_estudiante_persona1`
    FOREIGN KEY (`persona_per_codigo` )
    REFERENCES `UniversidadBD`.`persona` (`per_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_carrera1`
    FOREIGN KEY (`carrera_car_codigo` )
    REFERENCES `UniversidadBD`.`carrera` (`car_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UniversidadBD`.`inscripcion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `UniversidadBD`.`inscripcion` (
  `ins_codigo` INT NOT NULL AUTO_INCREMENT ,
  `ins_nota_corte_1` DOUBLE NOT NULL ,
  `ins_nota_corte_2` DOUBLE NOT NULL ,
  `ins_nota_corte_3` DOUBLE NOT NULL ,
  `Materia_mat_codigo` VARCHAR(6) NOT NULL ,
  `estudiante_est_codigo` INT NOT NULL ,
  PRIMARY KEY (`ins_codigo`) ,
  INDEX `fk_inscripcion_Materia1_idx` (`Materia_mat_codigo` ASC) ,
  INDEX `fk_inscripcion_estudiante1_idx` (`estudiante_est_codigo` ASC) ,
  CONSTRAINT `fk_inscripcion_Materia1`
    FOREIGN KEY (`Materia_mat_codigo` )
    REFERENCES `UniversidadBD`.`Materia` (`mat_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_estudiante1`
    FOREIGN KEY (`estudiante_est_codigo` )
    REFERENCES `UniversidadBD`.`estudiante` (`est_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `UniversidadBD` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


--
-- Estructura para la vista `usuario`
--

CREATE VIEW usuario AS 
select p.per_codigo AS per_codigo,p.per_nombre_compl AS per_nombre_compl,p.per_fecha_nacimiento AS per_fecha_nacimiento,
p.per_usuario AS per_usuario,r.rol_codigo AS rol_codigo,r.rol_nombre AS rol_nombre,'' AS est_apodo,
'' AS doc_oficina,'' AS doc_telefono,'' AS doc_categoria,'' AS est_codigo,'' AS doc_codigo,'' AS car_codigo
from persona p, rol r
where r.rol_codigo = p.rol_rol_codigo and r.rol_codigo = 1
union 
select p.per_codigo AS per_codigo,p.per_nombre_compl AS per_nombre_compl,p.per_fecha_nacimiento AS per_fecha_nacimiento,
p.per_usuario AS per_usuario,r.rol_codigo AS rol_codigo,r.rol_nombre AS rol_nombre,'' AS est_apodo,
d.doc_oficina AS doc_oficina,d.doc_telefono AS doc_telefono,d.doc_categoria AS doc_categoria,'' AS est_codigo,d.doc_codigo AS doc_codigo,'' AS car_codigo
from persona p, docente d, rol r
where d.persona_per_codigo = p.per_codigo
and r.rol_codigo = p.rol_rol_codigo
union 
select p.per_codigo AS per_codigo,p.per_nombre_compl AS per_nombre_compl,p.per_fecha_nacimiento AS per_fecha_nacimiento,
p.per_usuario AS per_usuario,r.rol_codigo AS rol_codigo,r.rol_nombre AS rol_nombre,e.est_apodo AS est_apodo,
'' AS doc_oficina,'' AS doc_telefono,'' AS doc_categoria,e.est_codigo AS est_codigo,'' AS doc_codigo,e.carrera_car_codigo AS car_codigo 
from persona p, estudiante e, rol r
where e.persona_per_codigo = p.per_codigo and r.rol_codigo = p.rol_rol_codigo;



-- inserts 
-- Roles
INSERT INTO `UniversidadBD`.`rol` (`rol_codigo`, `rol_nombre`, `rol_descripcion`) 
VALUES ('1', 'Administrador', 'Administrador de la aplicación'), 
('2', 'Docente', 'Docente dicta materias'), 
('3', 'Estudiante', 'Estudiante');

-- Administador Docente y estudiante
INSERT INTO `UniversidadBD`.`persona` (`per_codigo`, `per_nombre_compl`, `per_fecha_nacimiento`, `per_email`, `per_usuario`, `per_password`, `rol_rol_codigo`) 
VALUES ('1026147293', 'Ana Cristina', '1992-08-26', 'ana@universidad.edu.co', 'ana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
('123456', 'Docente', '2015-04-14', 'docente@universidad.edu.co', 'docente', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'), 
('654321', 'Estudiante', '2015-04-15', 'estudiante@universidad.edu.co', 'estudiante', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '3');

-- Docente
INSERT INTO `UniversidadBD`.`docente` (`doc_codigo`, `doc_oficina`, `doc_telefono`, `doc_categoria`, `persona_per_codigo`) 
VALUES ('1', '004', '6564123', '1', '123456');

-- carreras
INSERT INTO `UniversidadBD`.`carrera` (`car_codigo`, `car_nombre`, `car_numero_creditos`, `car_valor_semestre`, `car_numero_semestre`) 
VALUES ('INGSIS', 'Ingenieria de Sistemas', '22', '2000000', '10'), ('INGIND', 'Ingenieria Industrial', '20', '1850000', '10');

-- estudiante 
INSERT INTO `UniversidadBD`.`estudiante` (`est_codigo`, `est_apodo`, `persona_per_codigo`, `carrera_car_codigo`) 
VALUES ('1', 'don cesar', '654321', 'INGSIS');

-- materia
INSERT INTO `UniversidadBD`.`materia` (`mat_codigo`, `mat_nombre`, `mat_numero_creditos`, `mat_ciclo`, `mat_aula`, `mat_descripcion`, `mat_horas_semanales`, `mat_cupos_disponibles`, `carrera_car_codigo`, `docente_doc_codigo`) 
VALUES ('CONT1', 'Contabilidad', '3', 'ni idea q es esto', '002', 'contabilidad para carrera contabilidad', '3', '20', 'INGIND', '1');


INSERT INTO `UniversidadBD`.`persona` (`per_codigo`, `per_nombre_compl`, `per_fecha_nacimiento`, `per_email`, `per_usuario`, `per_password`, `rol_rol_codigo`) 
VALUES ('55552', 'Deyson Estrada', '2015-04-14', 'deysondocente@universidad.edu.co', 'deysondocente', '123', '2');






