CREATE DATABASE db_motorsage;
use db_barberia;
#TABLA USUARIOS
CREATE TABLE `usuario` (
  `idusuario` smallint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(50) NOT NULL,
  `edad` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `celular` varchar(13),
  `edad` tinyint,
  `experiencia` boolean DEFAULT false
  `presupuesto` double(10)
  `roll` boolean DEFAULT false,
  `estado` boolean DEFAULT true
);
#TABLA MOTOS
CREATE TABLE `moto` (
  `idmoto` smallint PRIMARY KEY AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL UNIQUE,7
  `precio` double(10) NOT NULL,
  `cilindraje` varchar(10) NOT NULL,
  `estado` boolean DEFAULT true,
  `disponibilidad` smallint NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `concesionario` smallint
);
#TABLA COMENTARIOS
CREATE TABLE `comentario` (
  `idcomentario` smallint PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `usuario` smallint,
  `moto` smallint
);
#TABLA CRITICAS
CREATE TABLE `critica` (
  `idcritica` smallint PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `usuario` smallint
);
#TABLA CONCESIONARIOS
CREATE TABLE `concesionario` (
  `idconsecionario` smallint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
);
#TABLA SEDES
CREATE TABLE `sede` (
  `idsede` smallint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `concesionario` smallint
);
#TABLA PREFERENCIAS
CREATE TABLE `preferencia` (
  `idpreferencia` smallint PRIMARY KEY AUTO_INCREMENT,
  `usuario` smallint,
  `moto` smallint
);
#LLAVES FORANEAS
ALTER TABLE `moto` ADD FOREIGN KEY (`concesionario`) REFERENCES `concesionario` (`idconcesionario`);
ALTER TABLE `comentario` ADD FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);
ALTER TABLE `comentario` ADD FOREIGN KEY (`moto`) REFERENCES `moto` (`idmoto`);
ALTER TABLE `critica` ADD FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);
ALTER TABLE `sede` ADD FOREIGN KEY (`concesionario`) REFERENCES `concesionario` (`idconcesionario`);
ALTER TABLE `preferencia` ADD FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);
ALTER TABLE `preferencia` ADD FOREIGN KEY (`moto`) REFERENCES `moto` (`idmoto`);