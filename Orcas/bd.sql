CREATE DATABASE IF NOT EXISTS orcas;

USE orcas;


CREATE TABLE `usuarios` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`nome` VARCHAR(255),
	`email` VARCHAR(100) NOT NULL UNIQUE,
	`senha` VARCHAR(60) NOT NULL,
	`data_criacao` TIMESTAMP DEFAULT current_timestamp,
	PRIMARY KEY(`id`)
);


CREATE TABLE `categorias_despesa` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`descricao` VARCHAR(255) NOT NULL UNIQUE,
	`data_criacao` TIMESTAMP NOT NULL DEFAULT current_timestamp,
	PRIMARY KEY(`id`)
);


CREATE TABLE `categorias_receita` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`descricao` VARCHAR(255) NOT NULL UNIQUE,
	`data_criacao` TIMESTAMP NOT NULL DEFAULT current_timestamp,
	PRIMARY KEY(`id`)
);


CREATE TABLE `receitas` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`descricao` VARCHAR(255) NOT NULL,
	`categoria_id` INTEGER NOT NULL,
	`data_criacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(`id`)
);


CREATE TABLE `receitas_parcela` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`valor` DECIMAL NOT NULL,
	`data` DATE NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	`receita_id` INTEGER NOT NULL,
	PRIMARY KEY(`id`)
);


CREATE TABLE `despesas` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`descricao` VARCHAR(255) NOT NULL,
	`categoria_id` INTEGER NOT NULL,
	`data_criacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(`id`)
);


CREATE TABLE `despesas_parcela` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`valor` DECIMAL NOT NULL,
	`data` DATE NOT NULL,
	`status` VARCHAR(255),
	`despesa_id` INTEGER,
	PRIMARY KEY(`id`)
);


ALTER TABLE `receitas`
ADD FOREIGN KEY(`categoria_id`) REFERENCES `categorias_receita`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `receitas_parcela`
ADD FOREIGN KEY(`receita_id`) REFERENCES `receitas`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `despesas`
ADD FOREIGN KEY(`categoria_id`) REFERENCES `categorias_despesa`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `despesas_parcela`
ADD FOREIGN KEY(`despesa_id`) REFERENCES `despesas`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;