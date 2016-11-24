DROP DATABASE igs;
CREATE DATABASE IF NOT EXISTS igs
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE igs;

DROP TABLE IF EXISTS medida;
CREATE TABLE IF NOT EXISTS medida(

  id INT NOT NULL AUTO_INCREMENT,
  date DATETIME,
  image LONGBLOB,
  temperature FLOAT,
  humidity FLOAT,
  moisture FLOAT,

  CONSTRAINT pk_medida PRIMARY KEY(id)

)DEFAULT charset = utf8;


DROP TABLE IF EXISTS control;
CREATE TABLE IF NOT EXISTS control(

  id INT NOT NULL AUTO_INCREMENT,
  start DATETIME,
  name VARCHAR(45),

  CONSTRAINT pk_control PRIMARY KEY(id)

)DEFAULT charset = utf8;


DROP TABLE IF EXISTS regular;
CREATE TABLE IF NOT EXISTS regular(

  id INT NOT NULL AUTO_INCREMENT,
  medida_id INT NOT NULL,
  control_id INT NOT NULL,

  CONSTRAINT pk_regular PRIMARY KEY(id),

  CONSTRAINT fk_regular_medida
  FOREIGN KEY(medida_id)
  REFERENCES medida(id)
  ON DELETE CASCADE,

  CONSTRAINT fk_regular_control
  FOREIGN KEY(control_id)
  REFERENCES control(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;
