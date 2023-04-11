DROP DATABASE IF EXISTS sistema_academico;
CREATE DATABASE sistema_academico;
USE sistema_academico;
CREATE TABLE users(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `access_level` INT NOT NULL
);

CREATE TABLE guardians(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `cellphone` VARCHAR(20) NOT NULL,
    `tellphone` VARCHAR(20) NULL,
    `born_date` VARCHAR(10) NOT NULL,
    `cpf` CHAR(11) NOT NULL,
    `rg` VARCHAR(9) NOT NULL,
    `payment` FLOAT NOT NULL
);

CREATE TABLE students(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `cpf` CHAR(11) NOT NULL,
    `rg` VARCHAR(9) NOT NULL,
    `grade` INT NOT NULL,
    `rm` INT NOT NULL
);
