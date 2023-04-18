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

CREATE TABLE students(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `born_date` VARCHAR(10) NOT NULL,
    `cpf` VARCHAR(20) NOT NULL,
    `rg` VARCHAR(20) NOT NULL,
    `schooling` VARCHAR(30) NOT NULL,
    `period` VARCHAR(20) NOT NULL,
    `grade` INT NOT NULL,
    `rm` INT NOT NULL
);


CREATE TABLE guardians(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `cellphone` VARCHAR(20) NOT NULL,
    `tellphone` VARCHAR(20) NULL,
    `born_date` VARCHAR(10) NOT NULL,
    `cpf` VARCHAR(20) NOT NULL,
    `rg` VARCHAR(20) NOT NULL,
    `frequency` INT NOT NULL,
    `payment` FLOAT NOT NULL,
    `student_id` INT NOT NULL,
    CONSTRAINT fk_guardians_student_id
    FOREIGN KEY (student_id)
    REFERENCES students (id)
    ON DELETE CASCADE
);

