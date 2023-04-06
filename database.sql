CREATE DATABASE sistema_academico;
USE sistema_academico;
CREATE TABLE users(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `born_date` VARCHAR(255) NOT NULL,
    `cpf` VARCHAR(255) NOT NULL,
    `rg` VARCHAR(255) NOT NULL,
    `access_level` INT NOT NULL,
);